<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $data["page_title"] = "Event Calendar | DoHR";
    	$data["tpl_path"] = 'admin/calendar/index';
        $this->load->view('admin/layout', $data);
    }

    public function add_event()
    {
    	$data = array(
    		'name' => $this->input->post('name'),
    		'location' => $this->input->post('location'),
    		'type' => $this->input->post('type'),
            'from_datetime' => $this->input->post('from_date'),
            'to_datetime' => $this->input->post('to_date'),
    		'note' => $this->input->post('note'),
            'created_at' => date("Y-m-d H:i:s")
    	);

        if ($this->input->post('all_day') == 'on')
            $data["all_day"] = 1;
        else
            $data["all_day"] = 0;

        $this->db->insert(TBL_HR_EVENT, $data);

        $this->session->set_flashdata('event_created', $this->input->post('name'));

        redirect('admin/calendar');
    }

    public function edit_event()
    {
        var_dump($_POST);

        $data = array(
            'name' => $this->input->post('name'),
            'location' => $this->input->post('location'),
            'type' => $this->input->post('type'),
            'from_datetime' => $this->input->post('from_date'),
            'to_datetime' => $this->input->post('to_date'),
            'note' => $this->input->post('note'),
            'updated_at' => date("Y-m-d H:i:s")
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update(TBL_HR_EVENT, $data);

        redirect('admin/calendar');
    }

    public function delete_event($id)
    {
        $this->db->delete(TBL_HR_EVENT, array('id' => $id));

        redirect('admin/calendar');
    }

    private function get_event($year)
    {
        $from_date = date($year . "-01-01");
        $to_date = date($year + 1 . "-01-01");

        $this->db->where('from_datetime >=', $from_date);
        $this->db->where('to_datetime <', $to_date);
        $this->db->order_by('from_datetime', 'ASC');

        return $this->db->get(TBL_HR_EVENT)->result();
    }

    public function listview($year = 0)
    {
        if ($year == 0)
            $year = date('Y'); 

        $data["year"] = $year;
        $data["events"] = $this->get_event($year);
        $data["page_title"] = "Event List | DoHR";
        $data["tpl_path"] = 'admin/calendar/listview';
        $this->load->view('admin/layout', $data);
    }

    public function get_this_year_event($year)
    {
        $events = $this->get_event($year);

        $tmp_event = array();

        foreach ($events as $index => $event)
        {
            $tmp_event[$index]['id'] = $event->id;
            $tmp_event[$index]['note'] = $event->note;
            $tmp_event[$index]['location'] = $event->location;
            $tmp_event[$index]['type'] = $event->type;
            $tmp_event[$index]['title'] = $event->name;
            $tmp_event[$index]['start'] = $event->from_datetime;
            $tmp_event[$index]['end'] = $event->to_datetime;

            if ($event->all_day == 1)
                $tmp_event[$index]['allDay'] = TRUE;
            else
                $tmp_event[$index]['allDay'] = FALSE;

            switch ($event->type) 
            {
                case 'Holiday' : $color = "#f56954"; break; // blue
                case 'Gathering' : $color = "#00a65a"; break; // green
                case 'Other' : $color = "#f39c12"; break; // yellow
            }

            $tmp_event[$index]['backgroundColor'] = $color;
            $tmp_event[$index]['borderColor'] = $color;
        }

        echo json_encode($tmp_event);
    }
}