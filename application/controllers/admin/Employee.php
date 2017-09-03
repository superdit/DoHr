<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public $data = array();
	private $page_config = array();
	private $per_page = 12;

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('admin/employee_model', 'employee');
    }

    private function set_config_pagination()
    {
    	$this->page_config = array();
        $this->page_config['first_link']         = '&laquo; First';
        $this->page_config['first_tag_open']     = '<li>';
        $this->page_config['first_tag_close']    = '</li>';
        $this->page_config['last_link']          = 'Last &raquo;';
        $this->page_config['last_tag_open']      = '<li>';
        $this->page_config['last_tag_close']     = '</li>';
        $this->page_config['next_link']          = 'Next &rsaquo;';
        $this->page_config['next_tag_open']      = '<li>';
        $this->page_config['next_tag_close']     = '</li>';
        $this->page_config['prev_link']          = '&lsaquo; Prev';
        $this->page_config['prev_tag_open']      = '<li>';
        $this->page_config['prev_tag_close']     = '</li>';
        $this->page_config['cur_tag_open']       = '<li><a href="#" style="background:#f0f0f0;">';
        $this->page_config['cur_tag_close']      = '</a></li>';
        $this->page_config['num_tag_open']       = '<li>';
        $this->page_config['num_tag_close']      = '</li>';
        $this->page_config['per_page']			 = $this->per_page;
    }
    
    public function test()
    {
    	$data["tpl_path"] = 'admin/employee/test';
		$this->load->view('admin/layout', $data);
    }

    public function index($page = 0)
    {
		$this->load->library('pagination');
		$this->set_config_pagination();
		$this->page_config['base_url'] = base_url().'admin/employee/index/';
		$this->page_config['total_rows'] = $this->db->count_all_results(TBL_EMPLOYEE);;

		$this->pagination->initialize($this->page_config);

		$query = $this->db->limit($this->page_config['per_page'], $page)->get(TBL_EMPLOYEE);

		$data["suggested_employee_number"] = $this->employee->suggested_number();
		$data["page_title"] = "Employee Index | DoHR";
		$data["result"] = $query->result();
		$data["tpl_path"] = 'admin/employee/index';
		$this->load->view('admin/layout', $data);
	}

	public function quick_add()
	{
		if ($this->input->post('btn_submit'))
		{
			$this->db->trans_start();
			$this->employee->quick_add();
			$this->db->trans_complete();

			if ($this->employee->error_count != 0)
			{
				$this->session->set_flashdata('show_modal', TRUE);
				$this->session->set_flashdata('fields', $this->employee->fields);
				$this->session->set_flashdata('errors', $this->employee->error_messages);
				redirect('admin/employee');
			}
			else
			{
				redirect('admin/employee');
			}
		}
	}

	public function resign()
	{
		if ($this->input->post('btn_submit_resign'))
		{
			$data = array(
				"employee_id" => $this->input->post('employee_id'),
				"reason" => $this->input->post('reason'),
				"note" => $this->input->post('note'),
				"created_at" => date("Y-m-d H:i:s")
			);
			$this->db->trans_start();
			$this->db->insert(TBL_EMPLOYEE_RESIGNATION, $data);

			$this->db->where('id', $this->input->post('employee_id'));
			$this->db->update(TBL_EMPLOYEE, array('status' => 'resign'));
			$this->db->trans_complete();
		}
	}

	public function moresearch()
	{
		$this->employee->moresearch($this->input->get('per_page'), $this->per_page);

		$this->load->library('pagination');
		$this->set_config_pagination();

		$this->page_config['base_url'] = base_url().'admin/employee/advsearch?emp_number=&name=&emp_status=0';
		$this->page_config['total_rows'] = $this->employee->search_count;
		$this->page_config['uri_segment'] = 5;
		$this->page_config['page_query_string'] = TRUE;

		$this->pagination->initialize($this->page_config);

		$data["suggested_employee_number"] = $this->employee->suggested_number();
		$data["more_search"] = TRUE;
		$data["page_title"] = "Employee Search Result | DoHR";
		$data["result"] = $this->employee->search_result;
		$data["tpl_path"] = 'admin/employee/index';

		$data["key_number"] = $this->input->get('emp_number');
		$data["key_name"] = $this->input->get('name');
		$data["key_status"] = $this->input->get('emp_status');

		$this->load->view('admin/layout', $data);
	}

	public function search($term = "", $page = 0)
	{
		$this->employee->search($term, $page, $this->per_page);

		$this->load->library('pagination');
		$this->set_config_pagination();

		$this->page_config['base_url'] = base_url().'admin/employee/search/'.$term.'/';
		$this->page_config['total_rows'] = $this->employee->search_count;
		$this->page_config['uri_segment'] = 5;

		$this->pagination->initialize($this->page_config);

		$data["suggested_employee_number"] = $this->employee->suggested_number();
		$data["page_title"] = "Employee Search Result | DoHR";
		$data["result"] = $this->employee->search_result;
		$data["search_term"] = $term;
		$data["tpl_path"] = 'admin/employee/index';
		$this->load->view('admin/layout', $data);
	}

	public function ajax_search()
	{
		$this->db->select('id, emp_number, name, nick_name');
		$where = "(name LIKE '%" . $_POST['query'] . "%' OR nick_name LIKE '%" . $_POST['query'] . "%')";

		$this->db->where($where);

		if (isset($_POST['not_in_id']) && $_POST['not_in_id'] != '')
		{
			$ids = explode( ',', $_POST['not_in_id'] );
			$this->db->where_not_in('id', $ids);
		}

		$result = $this->db->get(TBL_EMPLOYEE)->result();
		echo json_encode($result);
	}

	public function overview($emp_number)
	{
		$data["emp"] = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();
		$data["page_title"] = $data["emp"]->name . " - Employee Overview | DoHR";
		$data["next_emp"] = $this->db->query("SELECT * FROM ".TBL_EMPLOYEE." WHERE id > ".$data["emp"]->id." ORDER BY id LIMIT 1")->row();
		$data["prev_emp"] = $this->db->query("SELECT * FROM ".TBL_EMPLOYEE." WHERE id < ".$data["emp"]->id." ORDER BY id DESC LIMIT 1")->row();
		$data["tpl_path"] = 'admin/employee/overview';
		$this->load->view('admin/layout', $data);
	}

	public function detail($emp_number)
	{
		$data["emp"] = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);
	}

	public function upload_picture()
	{
		$config['upload_path']          = 'assets/uploads/profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = TRUE;
        $config['file_name']			= $this->input->post('emp_number').'.jpg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('photo'))
        {
            $error = array('error' => $this->upload->display_errors());

			var_dump($error);
                //$this->load->view('upload_form', $error);
        }
        else
        {
        	$img_relative_path = $config['upload_path'] . $config['file_name'];

        	$update_employee_data = array(
        		'photo' => $img_relative_path
        	);

        	$this->db->where('emp_number', $this->input->post('emp_number'));
            $this->db->update(TBL_EMPLOYEE, $update_employee_data);

            $upload_result = $this->upload->data();

            $resize_config['image_library']  = 'gd2';
			$resize_config['source_image']   = $upload_result['full_path'];//'/path/to/image/mypic.jpg';
			$resize_config['create_thumb']   = FALSE;
			$resize_config['maintain_ratio'] = TRUE;
			$resize_config['width']          = 128;
			$resize_config['height']         = 128;

			$this->load->library('image_lib', $resize_config);

			$this->image_lib->resize();

            redirect('admin/employee/'.$this->input->post('redirect_path').'/'.$this->input->post('emp_number'));
        }
	}


    public function download_excel()
    {
		$this->db->select('emp_number, name, work_email, address1 as address, join_date');
		$result = $this->db->get(TBL_EMPLOYEE)->result_array();

		function cleanData(&$str)
		{
			$str = preg_replace("/\t/", "\\t", $str);
			$str = preg_replace("/\r?\n/", "\\n", $str);
			if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
		}

        // file name for download
		$filename = "employee_" . date('Ymd') . ".xls";

		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Type: application/vnd.ms-excel");

		$flag = false;
		foreach($result as $row) 
		{
			if (!$flag) 
			{
				// display field/column names as first row
				echo implode("\t", array_keys($row)) . "\n";
				$flag = true;
			}
			array_walk($row, 'cleanData');
			echo implode("\t", array_values($row)) . "\n";
		}

		exit;
    }
    
	/* BEGIN EMPLOYEE TABS */
	public function employment($emp_number)
	{
		if ($this->input->post('btn_submit'))
		{
			if ($this->employee->update())
			{
				$this->session->set_flashdata('updated', TRUE);
				redirect('admin/employee/employment/'.$this->employee->fields['emp_number']);
			}
			else
			{
				$data['error_count'] = $this->employee->error_count;
				$data['error_messages'] = $this->employee->error_messages;
			}
		}
		
		$data["emp"] = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();
		$data["page_title"] = $data["emp"]->name . " - Employment Edit | DoHR";
		$this->db->order_by('short_name');
		$data["countries"] = $this->db->get(TBL_COUNTRIES)->result();
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);
	}

	public function personal($emp_number)
	{
		if ($this->input->post('btn_submit'))
		{
			if ($this->employee->update())
			{
				$this->session->set_flashdata('updated', TRUE);
				redirect('admin/employee/personal/'.$this->employee->fields['emp_number']);
			}
			else
			{
				$data['error_count'] = $this->employee->error_count;
				$data['error_messages'] = $this->employee->error_messages;
			}
		}

		$data["emp"] = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();
		$data["page_title"] = $data["emp"]->name . " - Personal Edit | DoHR";
		$data["countries"] = $this->db->get(TBL_COUNTRIES)->result();
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);		
	}

	public function contact($emp_number)
	{
		$data["emp"] = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);
	}

	public function salary($emp_number)
	{
		$employee = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();

		//$this->load->model('admin/salary_model', 'salary');

		$data["countries"] = $this->db->get_where(TBL_COUNTRIES, array('currency_code != ' => null, 'currency_code != ' => ''))->result();
		$data["emp"] = $employee;
		$data["page_title"] = $data["emp"]->name . " - Salaries | DoHR";
		$data["emp_salaries"] = $this->db->get_where(TBL_EMPLOYEE_SALARIES, array('employee_id' => $employee->id))->result();
		//$data["salaries"] = $this->db->get(TBL_SALARIES)->result();
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);
	}

	public function document($emp_number, $page = 0)
	{
		$employee = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();

		$this->load->library('pagination');
		$this->set_config_pagination();
		$this->page_config['base_url'] = base_url().'admin/employee/document/'.$emp_number;
		$this->db->where('employee_id', $employee->id);
		$this->page_config['total_rows'] = $this->db->count_all_results(TBL_DOCUMENTS);;

		$this->pagination->initialize($this->page_config);

		$data["documents"] = $this->db->limit($this->page_config['per_page'], $page)
								->order_by('created_at', 'desc')
								->get_where(TBL_DOCUMENTS, array('employee_id' => $employee->id))
								->result();

		$data["emp"] = $employee;
		$data["page_title"] = $data["emp"]->name . " - Document | DoHR";
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);
	}

	public function schedules($emp_number, $year = "")
	{
		if ($year == "") $year = date("Y");

		$employee = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();

		// get business trip
		$data["btrips"] = $this->db->get_where(TBL_EMPLOYEE_BTRIP, array('employee_id' => $employee->id))->result();
		// get timeoff
		$to_cond = array(
			'employee_id' => $employee->id,
			'from_date >=' => (intval($year) - 1) . '-12-31 23:59:00',
			'to_date <=' => (intval($year) + 1) . '-01-01 00:00:00'
		);
		$data["timeoff"] = $this->db->get_where(TBL_EMPLOYEE_TIMEOFF, $to_cond)->result();

		// get timeoff notification
		$data["notif"] = $this->db->get_where(TBL_EMPLOYEE_NOTIF, array('employee_id' => $employee->id))->result();
		// get employee contract
		$data["contract"] = $this->db->get_where(TBL_EMPLOYEE_CONTRACT, array('employee_id' => $employee->id))->row();

		// get if there any available timeoff statistic for prev and next year
		$data["next_year"] = NULL;
		$data["prev_year"] = NULL;
		if ($data["contract"] != NULL)
		{
			$toff_array = json_decode($data["contract"]->available_timeoff, TRUE);
			$tmp_arr = $toff_array;		
			
			if ($employee->status == 'full-time')
			{
				$run_next = 1;
				foreach ($toff_array as $key => $toff) 
				{
					if ($key == $year) $run_next = 0;
					else if ($run_next == 1) next($tmp_arr);
				}

				$tmp2_arr = $tmp_arr;
				
				if (next($tmp_arr) !== FALSE) 
				{
					$data["next_year"] = key($tmp_arr);
					prev($tmp_arr);

					if (prev($tmp_arr) !== FALSE) $data["prev_year"] = key($tmp_arr);
					else $data["prev_year"] = NULL;
				}
				else
				{ 
					$data["next_year"] = NULL;

					if (prev($tmp2_arr) !== FALSE) $data["prev_year"] = key($tmp2_arr);
					else $data["prev_year"] = NULL;
				}
			}
		}

		$data["cur_year"] = $year;
		$data["emp"] = $employee;
		$data["page_title"] = $data["emp"]->name . " - Schedules | DoHR";
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);	
	}

	public function attendance($emp_number, $date = "", $show = "")
	{
		$employee = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $emp_number))->row();

		$data["emp"] = $employee;
		$data["page_title"] = $data["emp"]->name . " - Attendance | DoHR";
		$data["tpl_path"] = 'admin/employee/detail';
		$this->load->view('admin/layout', $data);
	}

	function ajax_get_attendance()
	{
		$this->db->where("employee_id", $this->input->post('employee_id'));
		$this->db->like('clock_in', $this->input->post('date'), 'after'); 
		$this->db->or_like('clock_out', $this->input->post('date'), 'after');

		$result = $this->db->get(TBL_EMPLOYEE_ATTEND)->result_array();

		echo json_encode($result);
	}

	/* END EMPLOYEE TABS */
}