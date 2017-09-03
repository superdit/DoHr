<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attend extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function check_last_clock_out()
    {
    	$last_clock_out = $this->db->query("SELECT * FROM " . TBL_EMPLOYEE_ATTEND . " WHERE employee_id = " . $this->input->post("logged_id") . " AND clock_out LIKE CONCAT('%', DATE(NOW()), '%') ORDER BY created_at DESC LIMIT 1;")->row();

    	if ( is_null($last_clock_out) )
    		echo 0;
    	else
    		echo json_encode( (array)$last_clock_out );
    }

    public function add_clock_in()
    {
        $employee_id = $this->input->post("logged_id");

        $this->db->query("call insertClockIn(".$employee_id.", ".$employee_id.")");
    }

    public function check_last_clock_in()
    {
        $last_clock_in = $this->db->query("SELECT * FROM " . TBL_EMPLOYEE_ATTEND . " WHERE employee_id = " . $this->input->post("logged_id") . " AND clock_in LIKE CONCAT('%', DATE(NOW()), '%') ORDER BY created_at DESC LIMIT 1;")->row();

        if ( is_null($last_clock_in) )
            echo 0;
        else
            echo json_encode( (array)$last_clock_in );
    }

    public function add_clock_out()
    {
        $attend_id = $this->input->post("attend_id");
        $employee_id = $this->input->post("logged_id");

        $this->db->query("call insertClockOut(".$attend_id.", ".$employee_id.")");
    }
}