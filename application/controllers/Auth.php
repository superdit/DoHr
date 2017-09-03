<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
    	redirect('/auth/signin/');
    }
    
	public function signin()
	{
		$data = '';

		if ($this->input->post('btn_signin'))
		{
			if ($this->input->post('password', TRUE) != '')
			{
				$key = $this->config->item('encryption_key');
	            $encrypted_pass = $this->encrypt->encode($this->input->post('password', TRUE), $key);

	            $condition = array(
	            	'work_email' => $this->input->post('email', TRUE)
	            );

				$employee = $this->db->get_where(TBL_EMPLOYEE, $condition)->row();
				if (!is_null($employee))
				{
					$password = $this->encrypt->decode($employee->password, $key);

					if ($password == $this->input->post('password', TRUE)) 
					{
						$this->session->set_userdata('logged_id', $employee->id);
						$this->session->set_userdata('logged_name', $employee->name);
						$this->session->set_userdata('logged_emp_number', $employee->emp_number);
						$this->session->set_userdata('logged_account_role', $employee->account_role);

						$this->db->where('id', $employee->id);
						$this->db->update(TBL_EMPLOYEE, array('last_login' => date('Y-m-d H:i:s')));
						redirect('admin/dashboard');
					}
					else
						$data['signin_error'] = TRUE;
				}
				else
					$data['signin_error'] = TRUE;
			}
			else
				$data['signin_error'] = TRUE;
		}

		$this->load->view('auth/signin', $data);
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('auth/signin');
	}

	public function signup()
	{
		$this->load->view('auth/signup');
	}
}