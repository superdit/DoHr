<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quick_action extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function request_timeoff()
    {
		$this->session->set_flashdata('tab', 'qtimeoff');
		$this->session->set_flashdata('openmodal', TRUE);
		redirect('admin/employee/schedules/' . $this->session->userdata('logged_emp_number'));
    }

    public function create_btrip()
    {
		$this->session->set_flashdata('tab', 'qbtrip');
		$this->session->set_flashdata('openmodal', TRUE);
		redirect('admin/employee/schedules/' . $this->session->userdata('logged_emp_number'));
    }

    public function notif()
    {
        redirect('admin/employee/schedules/' . $this->session->userdata('logged_emp_number'));    
    }

}