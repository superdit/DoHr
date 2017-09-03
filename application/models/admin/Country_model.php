<?php

class Country_model extends CI_Model {

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
        if (isset($this->fields['short_name']))
        {
            if (strlen($this->fields['short_name']) < 1) 
                $this->error_messages['short_name'] = 'short name cannot be empty';

            if ($action == "create")
            {
                $country_check = $this->db->get_where(TBL_COUNTRIES, array('short_name' => $this->fields['short_name']));
                if ($country_check->num_rows() > 0) 
                    $this->error_messages['short_name'] = 'short name already in use';
            } 
            else
            {
                if ($this->fields['short_name'] != $this->fields['short_name2']) {
                    $country_check = $this->db->get_where(TBL_COUNTRIES, array('short_name' => $this->fields['short_name']));
                    if ($country_check->num_rows() > 0) 
                        $this->error_messages['short_name'] = 'short name "' . $this->fields['short_name'] . '" already in use';
                }
                unset($this->fields['short_name2']);
            }
        }

        $this->error_count = count($this->error_messages);
    }

    public function create()
    {
    	$this->fetch_fields();
    	$this->validate();

    	if (count($this->error_messages) == 0)
        {
            $this->db->insert(TBL_COUNTRIES, $this->fields);
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
            $this->db->update(TBL_COUNTRIES, $this->fields);
        }
        else 
        {
            $this->error_count = count($this->error_messages);
        }   
    }
}