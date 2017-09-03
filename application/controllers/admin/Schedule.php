<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public $data = array();
	private $page_config = array();
	private $per_page = 10;

    public function __construct() 
    {
        parent::__construct();
    }

    public function delete($timeoff_id, $type = '')
    {
    	switch ($type) 
    	{
    		case 'timeoff' :
    			$this->db->trans_start();
		    	$timeoff = $this->db->get_where(TBL_EMPLOYEE_TIMEOFF, array('id' => $timeoff_id))->row();
		    	$employee = $this->db->get_where(TBL_EMPLOYEE, array('id' => $timeoff->employee_id))->row();

		    	$this->db->where('id', $timeoff_id);
		    	$this->db->delete(TBL_EMPLOYEE_TIMEOFF);

		    	$this->db->query('UPDATE '.TBL_HR_SETTING.' SET hr_value = hr_value - 1, updated_at = \''.date("Y-m-d H:i:d").'\' WHERE hr_key = \'timeoff_requested\'');

		    	$this->session->set_flashdata('tab', 'timeoff');
		    	$this->db->trans_complete();
		    	break;

		    case 'btrip' :
		    	$btrip = $this->db->get_where(TBL_EMPLOYEE_BTRIP, array('id' => $timeoff_id))->row();
		    	$employee = $this->db->get_where(TBL_EMPLOYEE, array('id' => $btrip->employee_id))->row();

		    	$this->db->where('id', $timeoff_id);
		    	$this->db->delete(TBL_EMPLOYEE_BTRIP);

		    	$this->session->set_flashdata('tab', 'btrip');
		    	break;
	    }

    	redirect('admin/employee/schedules/'.$employee->emp_number);
    }

    public function add_timeoff()
	{
		$to_taken = $this->lib_timeoff->get_timeoff_taken($this->input->post('from_date'), $this->input->post('to_date')); 

		$data = array(
			'employee_id' => $this->input->post('employee_id'),
			'from_date' => $this->input->post('from_date'),
			'to_date' => $this->input->post('to_date'),
			'reason' => $this->input->post('reason'),
			'note' => $this->input->post('note'),
			'total_days' => $to_taken,
			'created_at' => date("Y-m-d H:i:s")
		);

		$this->db->trans_start();
		$this->db->insert(TBL_EMPLOYEE_TIMEOFF, $data);
		$this->db->query('UPDATE '.TBL_HR_SETTING.' SET hr_value = hr_value + 1, updated_at = \''.date("Y-m-d H:i:d").'\' WHERE hr_key = \'timeoff_requested\'');
		$this->db->trans_complete();

		$this->session->set_flashdata('notif', 'add_timeoff_success');
		$this->session->set_flashdata('tab', 'timeoff');
		redirect('admin/employee/schedules/' . $this->input->post('emp_number'));
	}

	public function add_business_trip()
	{
		$data = array(
			'employee_id' => $this->input->post('employee_id'),
			'depart_date' => $this->input->post('depart_date'),
			'return_date' => $this->input->post('return_date'),
			'destination' => $this->input->post('destination'),
			'vehicle' => $this->input->post('vehicle'),
			'cost' => $this->input->post('cost'),
			'note' => $this->input->post('note')
		);

		$this->db->insert(TBL_EMPLOYEE_BTRIP, $data);
		$this->session->set_flashdata('notif', 'add_btrip_success');
		$this->session->set_flashdata('tab', 'btrip');
		redirect('admin/employee/schedules/' . $this->input->post('emp_number'));	
	}

}