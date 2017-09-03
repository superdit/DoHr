<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('admin/country_model', 'country');
    }
    
	public function create()
	{
		if ($this->input->post('btn_submit'))
		{
			$this->country->create();

			if ($this->country->error_count != 0)
			{
				$this->session->set_flashdata('tab', 'country');
				$this->session->set_flashdata('action', 'add_failed');
				$this->session->set_flashdata('show_modal', 'create');
				$this->session->set_flashdata('fields', $this->country->fields);
				$this->session->set_flashdata('errors', $this->country->error_messages);
				redirect('admin/setting');
			}
			else
			{
				$this->session->set_flashdata('tab', 'country');
				$this->session->set_flashdata('action', 'add');
				redirect('admin/setting');
			}
		}
	}

	public function delete($id)
	{
		$this->db->delete(TBL_COUNTRIES, array('id' => $id));
		$this->session->set_flashdata('tab', 'country');
		$this->session->set_flashdata('action', 'delete');
		redirect('admin/setting');
	}

	public function edit()
	{
		if ($this->input->post('btn_submit'))
		{
			$this->country->edit();

			if ($this->country->error_count != 0)
			{
				$this->session->set_flashdata('tab', 'country');
				$this->session->set_flashdata('action', 'add_failed');
				$this->session->set_flashdata('show_modal', 'edit');
				$this->session->set_flashdata('fields', $this->db->get_where(TBL_COUNTRIES, array('id' => $this->input->post('id')))->row_array());
				$this->session->set_flashdata('errors', $this->country->error_messages);
				redirect('admin/setting');
			}
			else
			{
				$this->session->set_flashdata('tab', 'country');
				$this->session->set_flashdata('action', 'edit');
				redirect('admin/setting');	
			}
		}
	}
}