<?php

class Document_model extends CI_Model {

	public $error_messages 	= array();
    public $error_count 	= 0;
    public $fields          = array();
    public $search_count    = 0;
    public $search_result;
    public $data			= array();  

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_parent_folder($parent_id, $counter = 0)
    {
        $folder = $this->db->get_where(TBL_HR_FOLDER, array('id' => $parent_id))->row_array();
        $this->data[$counter] = $folder;
        if (!is_null($folder))
	        if ($folder['parent_id'] != "0") 
	        {
	        	$counter++;
	        	$this->get_all_parent_folder($folder['parent_id'], $counter);
	        }
    }

    public function delete_hr_folder($id)
    {
        $this->db->trans_start();

        $folders = $this->db->get_where(TBL_HR_FOLDER, array('parent_id' => $id))->result();
        
        foreach ($folders as $f)
        {
            // get document
            $docs = $this->db->get_where(TBL_HR_DOCUMENT, array('hr_folder_id' => $f->id))->result();

            foreach ($docs as $doc) 
            {
                // delete document
                @unlink($doc->path);
                $this->db->where('id', $doc->id);
                $this->db->delete(TBL_HR_DOCUMENT);
            }

            // delete folder
            $this->db->where('id', $f->id);
            $this->db->delete(TBL_HR_FOLDER);

            $this->delete_hr_folder($f->id);
        }

        // get parent document
        $parent_docs = $this->db->get_where(TBL_HR_DOCUMENT, array('hr_folder_id' => $id))->result();

        foreach ($parent_docs as $doc) 
        {
            // delete parent document
            @unlink($doc->path);
            $this->db->where('id', $doc->id);
            $this->db->delete(TBL_HR_DOCUMENT);
        }

        // delete parent folder
        $this->db->where('id', $id);
        $this->db->delete(TBL_HR_FOLDER);

        $this->db->trans_complete();
    }
}