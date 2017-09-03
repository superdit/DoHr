<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('admin/salary_model', 'salary');
    }

    public function create()
    {
    	if ($this->input->post('btn_submit'))
		{
			$this->salary->create();

			if ($this->salary->error_count != 0)
			{
				$this->session->set_flashdata('tab', 'salary');
				$this->session->set_flashdata('action', 'add_failed');
				$this->session->set_flashdata('show_modal', 'create');
				$this->session->set_flashdata('fields', $this->salary->fields);
				$this->session->set_flashdata('errors', $this->salary->error_messages);
				redirect('admin/setting');
			}
			else
			{
				$this->session->set_flashdata('tab', 'salary');
				$this->session->set_flashdata('action', 'add');
				redirect('admin/setting');
			}
		}
    }

    public function delete($id)
	{
		$this->db->delete(TBL_SALARIES, array('id' => $id));
		$this->session->set_flashdata('tab', 'salary');
		$this->session->set_flashdata('action', 'delete');
		redirect('admin/setting');
	}

	public function edit()
	{
		if ($this->input->post('btn_submit'))
		{
			$this->salary->edit();

			if ($this->salary->error_count != 0)
			{
				$this->session->set_flashdata('tab', 'salary');
				$this->session->set_flashdata('action', 'add_failed');
				$this->session->set_flashdata('show_modal', 'edit');
				$this->session->set_flashdata('fields', $this->db->get_where(TBL_SALARIES, array('id' => $this->input->post('id')))->row_array());
				$this->session->set_flashdata('errors', $this->salary->error_messages);
				redirect('admin/setting');
			}
			else
			{
				$this->session->set_flashdata('tab', 'salary');
				$this->session->set_flashdata('action', 'edit');
				redirect('admin/setting');	
			}
		}
	}

	public function add_to_employee()
	{
		// $this->db->where('salary_id', $this->input->post('salary_id'));
		// $this->db->where('employee_id', $this->input->post('employee_id'));

		// $is_exist = $this->db->get(TBL_EMPLOYEE_SALARY)->row();

		$emp_number = $this->input->post('emp_number');
		unset($_POST['emp_number']);

		if ($this->input->post('btn_submit'))
		{
			$this->salary->create();

			if ($this->salary->error_count != 0)
			{
				$this->session->set_flashdata('show_modal', TRUE);
				$this->session->set_flashdata('fields', $this->salary->fields);
				$this->session->set_flashdata('errors', $this->salary->error_messages);
			}
			else
			{
				$this->session->set_flashdata('action', 'add_success');
			}

			// if (count($is_exist) == 0)
			// {
			
			// 	$this->session->set_flashdata('action', 'add_success');
			// }
			// else
			// {
			// 	$this->session->set_flashdata('action', 'add_failed');
			// }

			redirect('admin/employee/salary/' . $emp_number);
		}
		else
		{

		}

	}

	public function delete_from_employee($salary_id, $employee_id)
	{
		$this->db->where('id', $salary_id);
		$this->db->where('employee_id', $employee_id);
		$this->db->delete(TBL_EMPLOYEE_SALARIES);

		$this->db->select('emp_number');
		$emp = $this->db->get_where(TBL_EMPLOYEE, array('id' => $employee_id))->row();

		$this->session->set_flashdata('action', 'delete_success');

		redirect('admin/employee/salary/' . $emp->emp_number);
	}
}