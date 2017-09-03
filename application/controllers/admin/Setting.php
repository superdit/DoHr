<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->db->order_by('name');
		// $data["salaries"] = $this->db->get(TBL_SALARIES)->result();

		$this->db->order_by('short_name');
		$data["countries"] = $this->db->get(TBL_COUNTRIES)->result();

		$setting = $this->db->get(TBL_HR_SETTING)->result();
		foreach ($setting as $key => $value) 
			$data["setting"][$value->hr_key] = $value->hr_value;

		$data["setting"]['workweek'] = explode(',', $data["setting"]['workweek']);

		$data["page_title"] = "App Setting | DoHR";
		$data["tpl_path"] = 'admin/setting/index';
		$this->load->view('admin/layout', $data);
	}

	public function update()
	{
		$workweek = '';

        if (!is_null($this->input->post('workweek_monday'))) $workweek .= 'monday,';
        if (!is_null($this->input->post('workweek_tuesday'))) $workweek .= 'tuesday,';
        if (!is_null($this->input->post('workweek_wednesday'))) $workweek .= 'wednesday,';
        if (!is_null($this->input->post('workweek_thursday'))) $workweek .= 'thursday,';
        if (!is_null($this->input->post('workweek_friday'))) $workweek .= 'friday,';
        if (!is_null($this->input->post('workweek_saturday'))) $workweek .= 'saturday,';
        if (!is_null($this->input->post('workweek_sunday'))) $workweek .= 'sunday,';

        if (empty($workweek))
        {
        	echo 'workweek cannot be empty'; exit;
        }

        $workweek = substr($workweek, 0, strlen($workweek) - 1);

		$this->db->trans_start();
		$updated_at = date("Y-m-d H:i:s");
		foreach ($this->input->post() as $key => $value) 
        {
            if (strpos($key, 'btn_') === false)
            {
				$this->db->where('hr_key', $key);
				$this->db->update(TBL_HR_SETTING, array(
					'hr_value' 		=> $value, 
					'updated_at' 	=> $updated_at,
					'updated_by_id' => $this->session->userdata('logged_id')
					)
				);
            }
        }
        
		$this->db->where('hr_key', 'workweek');
		$this->db->update(TBL_HR_SETTING, array('hr_value' => $workweek, 'updated_at' => $updated_at));

        $this->db->trans_complete();

        redirect('admin/setting');
	}

	public function downbackup()
	{
		$prefs = array(
		        'tables'        => array(TBL_HR_SETTING),   // Array of tables to backup.
		        'ignore'        => array(),                     // List of tables to omit from the backup
		        'format'        => 'txt',                       // gzip, zip, txt
		        'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
		        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
		        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
		        'newline'       => "\n"                         // Newline character used in backup file
		);

		// Load the DB utility class
		$this->load->dbutil($prefs);

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup();

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('mybackup.gz', $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('mybackup.gz', $backup);
	}
}