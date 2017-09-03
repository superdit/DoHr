<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('admin/employee_model', 'employee');
    }

    public function index()
    {
    	$this->db->select('to.*, emp.name, emp.nick_name, emp.emp_number');
		$this->db->from(TBL_EMPLOYEE_TIMEOFF . ' as to');
		$this->db->join(TBL_EMPLOYEE . ' as emp', 'emp.id = to.employee_id');
		$this->db->where('to.status', 'waiting approval'); 

        $data["page_title"] = "Notification | DoHR";
    	$data["notif"] = $this->db->get()->result();
    	$data["tpl_path"] = 'admin/notif/index';
		$this->load->view('admin/layout', $data);
    }

    public function ajax_reject_timeoff()
    {
        $this->db->trans_start();

        // update employee total notification
        $this->db->where('id', $this->input->post('id'));
        $timeoff = $this->db->get(TBL_EMPLOYEE_TIMEOFF)->row();
        $this->db->query('UPDATE '.TBL_EMPLOYEE.' SET unread_notif = unread_notif + 1 WHERE id = '.$timeoff->employee_id.'');

        // update status total notification
        $employee = $this->db->get_where(TBL_EMPLOYEE, array('id' => $timeoff->employee_id))->row();

        // insert new notification => need to be reviewed
        $emp_notif = array(
            'type' => 'time off',
            'employee_id' => $timeoff->employee_id,
            'time_off_id' => $this->input->post('id'),
            'message' => 'Time off request rejected',
            'created_at' => date("Y-m-d H:i:s")
        );
        $this->db->insert(TBL_EMPLOYEE_NOTIF, $emp_notif);

        // update time off request message
        $this->db->where('id', $this->input->post('id'));
        $this->db->update(TBL_EMPLOYEE_TIMEOFF, array('status' => 'rejected', 'reject_reason' => $this->input->post('reject_reason')));
        
        // update total notification for "hr manager" and "administrator"
        $this->db->query('UPDATE '.TBL_HR_SETTING.' SET hr_value = hr_value - 1, updated_at = \''.date("Y-m-d H:i:d").'\' WHERE hr_key = \'timeoff_requested\'');

        $this->db->trans_complete();
    }

    public function ajax_approve_timeoff()
    {
        $this->db->trans_start();

        // get detail timeoff
        $this->db->where('id', $this->input->post('id'));
        $timeoff = $this->db->get(TBL_EMPLOYEE_TIMEOFF)->row();
        $this->db->query('UPDATE '.TBL_EMPLOYEE.' SET unread_notif = unread_notif + 1 WHERE id = '.$timeoff->employee_id.'');

        // get employee contract
        $this->db->where('employee_id', $timeoff->employee_id);
        $contract = $this->db->get(TBL_EMPLOYEE_CONTRACT)->row();

        $new_timeoff = array();

        if ($contract->type == 'full-time') 
        {
            $year_from = substr($timeoff->from_date, 0, 4);
            $year_to = substr($timeoff->to_date, 0, 4);

            $list_avail_timeoff = json_decode($contract->available_timeoff, TRUE);

            // get default timeoff per year
            $this->db->where('hr_key', 'timeoff_per_year');
            $timeoff_per_year = $this->db->get(TBL_HR_SETTING)->row();

            if ($year_to == $year_from)
            {
                $to_taken = $this->lib_timeoff->get_timeoff_taken($timeoff->from_date, $timeoff->to_date); 

                if (!array_key_exists($year_to, $list_avail_timeoff))
                    $list_avail_timeoff[$year_to] = (int) $timeoff_per_year->hr_value - $to_taken;
                else
                    $list_avail_timeoff[$year_to] = $list_avail_timeoff[$year_to] - $to_taken;
            }
            else
            {
                if (!array_key_exists($year_from, $list_avail_timeoff)) 
                    $list_avail_timeoff[$year_from] = (int) $timeoff_per_year->hr_value;

                if (!array_key_exists($year_to, $list_avail_timeoff)) 
                    $list_avail_timeoff[$year_to] = (int) $timeoff_per_year->hr_value;

                // calculate timeoff taken on first year
                $first_to_taken = $this->lib_timeoff->get_timeoff_taken($timeoff->from_date, $year_from . '-12-31 23:59:00'); 

                // calculate timeoff taken on second year
                $second_to_taken = $this->lib_timeoff->get_timeoff_taken($year_to . '-01-01 00:00:00', $timeoff->to_date); 

                $list_avail_timeoff[$year_from] = $list_avail_timeoff[$year_from] - $first_to_taken;
                $list_avail_timeoff[$year_to] = $list_avail_timeoff[$year_to] - $second_to_taken;

                $to_taken = $this->lib_timeoff->get_timeoff_taken($timeoff->from_date, $timeoff->to_date); 
            }

            $new_timeoff = array('available_timeoff' => json_encode($list_avail_timeoff));
        }
        else
        {
            // calculate timeoff taken
            $to_taken = $this->lib_timeoff->get_timeoff_taken($timeoff->from_date, $timeoff->to_date); 

            $new_timeoff = array('available_timeoff' => $contract->available_timeoff - $to_taken);
        }

        // update available timeoff
        $this->db->where('id', $contract->id);
        $this->db->update(TBL_EMPLOYEE_CONTRACT, $new_timeoff);

        $emp_notif = array(
            'type' => 'time off',
            'employee_id' => $timeoff->employee_id,
            'time_off_id' => $this->input->post('id'),
            'message' => 'Time off request approved',
            'created_at' => date("Y-m-d H:i:s")
        );
        $this->db->insert(TBL_EMPLOYEE_NOTIF, $emp_notif);
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update(TBL_EMPLOYEE_TIMEOFF, array('status' => 'approved'));

        $this->db->query('UPDATE '.TBL_HR_SETTING.' SET hr_value = hr_value - 1, updated_at = \''.date("Y-m-d H:i:d").'\' WHERE hr_key = \'timeoff_requested\'');

        $this->db->trans_complete();
    }
}