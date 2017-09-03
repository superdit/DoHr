<?php

class Salary_model extends CI_Model {

	public $error_messages 	= array();
    public $error_count 	= 0;
    public $fields          = array();
    public $search_count    = 0;
    public $search_result;  

    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_fields()
    {
        foreach ($this->input->post() as $key => $value) 
        {
            if (strpos($key, 'btn_') === false)
                $this->fields[$key] = $value;
        }
    }

    public function validate($action = "create")
    {
        if (isset($this->fields['name']))
        {
            if (strlen($this->fields['name']) < 1) 
                $this->error_messages['name'] = 'salary name cannot be empty';

            if ($action == "create")
            {
                $country_check = $this->db->get_where(TBL_EMPLOYEE_SALARIES, array('name' => $this->fields['name'], 'employee_id' => $this->fields['employee_id']));
                if ($country_check->num_rows() > 0) 
                    $this->error_messages['name'] = 'salary name already in use';
            } 
            else
            {
                if ($this->fields['name'] != $this->fields['name2']) {
                    $country_check = $this->db->get_where(TBL_EMPLOYEE_SALARIES, array('name' => $this->fields['name'], 'employee_id' => $this->fields['employee_id']));
                    if ($country_check->num_rows() > 0) 
                        $this->error_messages['name'] = 'name "' . $this->fields['name'] . '" already in use';
                }
                unset($this->fields['name2']);
            }
        }

        if (isset($this->fields['amount']))
        {
            if ($this->fields['amount'] == 0) 
                $this->error_messages['amount'] = 'amount cannot be zero';

            if (!is_numeric($this->fields['amount'])) 
                $this->error_messages['amount'] = 'amount must be numeric';
        }

        $this->error_count = count($this->error_messages);
    }

    public function create()
    {
    	$this->fetch_fields();
    	$this->validate();

    	if (count($this->error_messages) == 0)
        {
            $this->db->insert(TBL_EMPLOYEE_SALARIES, $this->fields);
        }
        else 
        {
            $this->error_count = count($this->error_messages);
        }
    }

    public function edit()
    {
        $this->fetch_fields();
        $this->validate("edit");

        if ($this->error_count == 0)
        {
            $this->db->where('id', $this->fields['id']);
            $this->db->update(TBL_EMPLOYEE_SALARIES, $this->fields);
        }
        else 
        {
            $this->error_count = count($this->error_messages);
        }   
    }

    // public function get_employee_salaries($employee_id)
    // {
    //     $this->db->select('a.id, a.name, a.amount, a.note, a.paid, b.employee_id');
    //     $this->db->from(TBL_SALARIES . ' a');
    //     $this->db->join(TBL_EMPLOYEE_SALARY . ' b', 'a.id = b.salary_id');
    //     $this->db->where('b.employee_id', $employee_id);
    //     return $this->db->get()->result();
    // }
}