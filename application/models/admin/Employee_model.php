<?php

class Employee_model extends CI_Model {

	public $error_messages 	= array();
    public $error_count 	= 0;
    public $fields          = array();
    public $search_count    = 0;
    public $search_result;  

    public function __construct()
    {
        parent::__construct();
    }

    public function suggested_number()
    {
        $field_code = 'employee_number_code';
        $field_digit = 'employee_number_digit';

        $code = "";
        $digit = "";

        $this->db->where('hr_key', $field_code);
        $this->db->or_where('hr_key', $field_digit);  
        $result = $this->db->get(TBL_HR_SETTING)->result();

        foreach ($result as $key => $value) {
            if ($value->hr_key == $field_code)
                $code = $value->hr_value;
            else if ($value->hr_key == $field_digit)
                $digit = $value->hr_value;
        }

        // get last employee
        $this->db->like('emp_number', $code);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $last_employee = $this->db->get(TBL_EMPLOYEE)->row();

        $suggested_number = $code;

        if (is_null($last_employee))
        {
            for ($i = 1; $i < $digit; $i++) 
            {
                $suggested_number .= "0";
            }

            $suggested_number .= "1";
        }
        else
        {
            $current_digit = str_replace($code, '', $last_employee->emp_number, $code); 
            $new_digit = (int) $current_digit + 1;
            $digit_length = strlen((string) $new_digit);

            for ($i = 1; $i <= $digit - $digit_length; $i++)
            {
                $suggested_number .= "0";
            }

            $suggested_number .= $new_digit;
        }

        return $suggested_number;        
    }

    public function fetch_fields()
    {
        foreach ($this->input->post() as $key => $value) 
        {
            if (strpos($key, 'btn_') === false)
                $this->fields[$key] = $value;
        }
    }

    public function quick_add()
    {
        $this->fetch_fields();

        if (strlen($this->fields['emp_number']) < 5) 
            $this->error_messages['emp_number'] = 'Employee number minimum 5 characters';
        else 
        {
            $emp_check = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $this->fields['emp_number']));
            if ($emp_check->num_rows() > 0) 
                $this->error_messages['emp_number'] = 'Employee number already in use';
        }

        if (isset($this->fields['name']))
        {
            if (strlen($this->fields['name']) < 3) 
                $this->error_messages['name'] = 'Employee name minimum 3 characters';
        }

        if (!filter_var($this->fields['work_email'], FILTER_VALIDATE_EMAIL)) 
            $this->error_messages['work_email'] = 'Email not valid';
        else 
        {
            $emp_check = $this->db->get_where(TBL_EMPLOYEE, array('work_email' => $this->fields['work_email']));
            if ($emp_check->num_rows() > 0) 
                $this->error_messages['work_email'] = 'Email already in use';
        }

        if ($this->fields['password'] == '' || $this->fields['cpassword'] == '')
            $this->error_messages['password'] = 'Password not match';
        else if ($this->fields['password'] != $this->fields['cpassword'])
            $this->error_messages['password'] = 'Password not match';        

        if (count($this->error_messages) == 0)
        {
            $key = $this->config->item('encryption_key');
            $this->fields['password'] = $this->encrypt->encode($this->fields['password'], $key);

            $about_me = 'Hello my name is '.$this->fields['name']. ', ' . 
                'call me on my contact info for any office work (project, meeting, company event), ' . 
                'I\'m available at office work time, nice to meet you and have a nice day.';

            $arr = explode(' ', trim($this->fields['name']));
            $nick_name = $arr[0] . $this->fields['emp_number'];
            $date_now = date("Y-m-d H:i:s");

            $data = array(
                'emp_number'    => $this->fields['emp_number'],
                'password'      => $this->fields['password'],
                'name'          => $this->fields['name'],
                'nick_name'     => $nick_name,
                'work_email'    => $this->fields['work_email'],
                'status'        => $this->fields['status'],
                'position'      => 'Employee',
                'created_at'    => $date_now,
                'created_by_id' => $this->session->userdata('logged_id'),
                'about_me'      => $about_me
            );

            $this->db->insert(TBL_EMPLOYEE, $data);
            $this->fields['id'] = $this->db->insert_id();

            // create contract
            $data_contract = array(
                'employee_id'   => $this->fields['id'],
                'type'          => $this->fields['status'],
                'created_at'    => $date_now,
                'created_by_id' => $this->session->userdata('logged_id')
            );

            if ($this->fields['status'] == EMP_STATUS_TEMP) 
            {
                $data_contract['hire_date'] = $this->fields['hire_date'];
                $data_contract['expired_date'] = $this->fields['expired_date'];
                $data_contract['available_timeoff'] = $this->fields['available_timeoff'];
            }
            else $data_contract['available_timeoff'] = '{"'.date("Y").'":12}';
            
            // create timeoff statistic TBL_EMPLOYEE_TIMEOFF_STAT
            $data_toff_stat = array(
                'employee_id'   => $this->fields['id'],       
                'created_at'    => $date_now,
                'created_by_id' => $this->session->userdata('logged_id')         
            );

            $this->db->insert(TBL_EMPLOYEE_CONTRACT, $data_contract);
        }
        else 
        {
            $this->error_count = count($this->error_messages);
        }
    }

    public function create()
    {
        $this->fetch_fields();

        if (strlen($this->fields['emp_number']) < 5) 
            $this->error_messages['emp_number'] = 'Employee number minimum 5 characters';
        else 
        {
            $emp_check = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $this->fields['emp_number']));
            if ($emp_check->num_rows() > 0) 
                $this->error_messages['emp_number'] = 'Employee number already in use';
        }

        if (!filter_var($this->fields['email'], FILTER_VALIDATE_EMAIL)) 
            $this->error_messages['email'] = 'Email not valid';
        else 
        {
            $emp_check = $this->db->get_where(TBL_EMPLOYEE, array('work_email' => $this->fields['email']));
            if ($emp_check->num_rows() > 0) 
                $this->error_messages['email'] = 'Email already in use';
        }

        if (count($this->error_messages) == 0)
        {
            $key = $this->config->item('encryption_key');
            $this->fields['password'] = $this->encrypt->encode($this->fields['password'], $key);

            $data = array(
                'emp_number'    => $this->fields['emp_number'],
                'password'      => $this->fields['password'],
                'name'          => $this->fields['name'],
                'work_email'    => $this->fields['email'],
                'status'        => $this->fields['status'],
                'gender'        => $this->fields['gender'],
                'address1'      => $this->fields['address']
            );

            $this->db->insert(TBL_EMPLOYEE, $data);
        }
        else 
        {
            $this->error_count = count($this->error_messages);
        }
    }

    public function validate()
    {
        if (isset($this->fields['emp_number']))
        {
            if (isset($this->fields['emp_number2']))
            {
                if (strlen($this->fields['emp_number']) < 3) 
                    $this->error_messages['emp_number'] = 'Employee number minimum 3 characters';
                else if ($this->fields['emp_number'] != $this->fields['emp_number2']) {
                    $emp_check = $this->db->get_where(TBL_EMPLOYEE, array('emp_number' => $this->fields['emp_number']));
                    if ($emp_check->num_rows() > 0) 
                        $this->error_messages['emp_number'] = 'Employee number "'.$this->fields['emp_number'].'" already in use';
                }
                unset($this->fields['emp_number2']);
            }
        }


        if (isset($this->fields['name']))
        {
            if (strlen($this->fields['name']) < 3) 
                $this->error_messages['name'] = 'Employee name minimum 3 characters';
        }

        if (isset($this->fields['nick_name']))
        {
            if (strlen($this->fields['nick_name']) < 3) 
                $this->error_messages['nick_name'] = 'Nick name minimum 3 characters';
        }

        if (isset($this->fields['work_email']))
        {
            if (!filter_var($this->fields['work_email'], FILTER_VALIDATE_EMAIL)) 
                $this->error_messages['work_email'] = 'Work email not valid';
        }

        if (isset($this->fields['personal_email']))
            if (!filter_var($this->fields['personal_email'], FILTER_VALIDATE_EMAIL) && 
                strlen($this->fields['personal_email']) > 0) 
                $this->error_messages['personal_email'] = 'Personal email not valid';

        if (isset($this->fields['password']))
        {
            if ($this->fields['password'] == '' && $this->fields['password2'] == '')
                unset($this->fields['password'], $this->fields['password2']);
            else if ($this->fields['password'] != $this->fields['password2'])
                $this->error_messages['password'] = 'Password not match';
            else
            {
                $key = $this->config->item('encryption_key');
                $this->fields['password'] = $this->encrypt->encode($this->fields['password'], $key);
                unset($this->fields['password2']);
            }
        }

        $this->error_count = count($this->error_messages);
    }

    public function update()
    {
        $this->fetch_fields();
        $this->validate();

        if ($this->error_count == 0)
        {
            $this->fields['updated_at'] = date("Y-m-d H:i:s");
            $this->fields['updated_by_id'] = $this->session->userdata('logged_id');
            $this->db->where('id', $this->fields['id']);
            $this->db->update(TBL_EMPLOYEE, $this->fields);

            return TRUE;
        }
        else
            return FALSE;
    }

    public function search($term = "", $start = 1, $per_page = 0)
    {
        $this->db->like('emp_number', $term); 
        $this->db->or_like('name', $term);
        $this->search_count = $this->db->count_all_results(TBL_EMPLOYEE);

        $this->db->like('emp_number', $term); 
        $this->db->or_like('name', $term);
        $this->db->limit($per_page, $start);
        $this->search_result = $this->db->get(TBL_EMPLOYEE)->result();
    }

    public function moresearch($start = 1, $per_page = 0)
    {
        if ($this->input->get('emp_number') != '')
            $this->db->like('emp_number', $this->input->get('emp_number'));

        if ($this->input->get('name') != '')
            $this->db->like('name', $this->input->get('name'));

        if ($this->input->get('emp_status') != '')
            $this->db->where('status', $this->input->get('emp_status'));

        $this->search_count = $this->db->count_all_results(TBL_EMPLOYEE);

        if ($this->input->get('emp_number') != '')
            $this->db->like('emp_number', $this->input->get('emp_number'));

        if ($this->input->get('name') != '')
            $this->db->like('name', $this->input->get('name'));

        if ($this->input->get('emp_status') != '')
            $this->db->where('status', $this->input->get('emp_status'));

        $this->db->limit($per_page, $start);
        $this->search_result = $this->db->get(TBL_EMPLOYEE)->result();
    }
}