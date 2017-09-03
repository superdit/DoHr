<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('admin/document_model', 'document');
    }

    public function index()
    {
        $this->load->library('LIB_Loginauth');

        $data["folder"] = $this->db->where('parent_id', 0)
            ->order_by('name', 'ASC')
            ->get(TBL_HR_FOLDER)->result();

        $data["documents"] = $this->db->where('hr_folder_id', null)
            ->order_by('title', 'ASC')
            ->get(TBL_HR_DOCUMENT)->result();

        $data["parent_folder"] = null;
        $data["current_folder"] = null;

        $data["parent_id"] = 0;
        $data["page_title"] = "Shared Document | DoHR";
        $data["tpl_path"] = 'admin/document/index';
        $this->load->view('admin/layout', $data);
    }

    public function share_hr()
    {
        $folder_id = $this->input->post('folder_id');
        $document_id = $this->input->post('document_id');

        if ( !is_null($this->input->post('employee_ids')) || $this->input->post('radio_share_to') == 'employee')
        {
            $data['shared_to'] = '';

            foreach ($this->input->post('employee_ids') as $employee_id) {
                $data['shared_to'] .= "[" . $employee_id . "]";
            }
        }
        else
        {
            $data['shared_to'] = "everyone";
        }

        if ($folder_id != "")
        {
            $this->db->where('id', $folder_id);
            $this->db->update(TBL_HR_FOLDER, $data);

            $fol = $this->db->get_where(TBL_HR_FOLDER, array('id' => $folder_id))->row();

            $this->session->set_flashdata('shared_folder', $fol->name);
        }

        if ($document_id != "")
        {
            $this->db->where('id', $document_id);
            $this->db->update(TBL_HR_DOCUMENT, $data);

            $doc = $this->db->get_where(TBL_HR_DOCUMENT, array('id' => $document_id))->row();

            $this->session->set_flashdata('shared_doc', $doc->name);
        }
        
        redirect('admin/document');
    }

    public function download_hr_doc($id)
    {
        $document = $this->db->get_where(TBL_HR_DOCUMENT, array('id' => $id))->row();

        if (file_exists($document->path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $document->file_type);
            header('Content-Disposition: attachment; filename='.basename($document->name));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($document->path));
            readfile($document->path);
            exit;
        }
    }

    public function delete_hr_doc($id)
    {
        $document = $this->db->get_where(TBL_HR_DOCUMENT, array('id' => $id))->row();

        $account_role = $this->session->userdata('logged_account_role');
        $employee_id = $this->session->userdata('employee_id');

        if ($account_role == 'HR Manager' || $account_role == 'Administrator')
        {
            @unlink($document->path);
            $this->db->where('id', $id);
            $this->db->delete(TBL_HR_DOCUMENT);
            $this->session->set_flashdata('deleted_doc', $document->name);
            if (!is_null($document->hr_folder_id))
                redirect('admin/document/open_folder/' . $document->hr_folder_id);
            else
                redirect('admin/document/');
        }
        else 
        {
            redirect('admin/dashboard');
        }
    }

    public function delete_hr_folder($id)
    {
        $folder = $this->db->get_where(TBL_HR_FOLDER, array('id' => $id))->row();
        
        $this->session->set_flashdata('delete_folder', $folder->name);
        $this->document->delete_hr_folder($id);
        redirect('admin/document');
    }

    public function open_folder($id)
    {
        $data["folder"] = $this->db->where('parent_id', $id)
            ->order_by('name', 'ASC')
            ->get(TBL_HR_FOLDER)->result(); 

        $data["documents"] = $this->db->where('hr_folder_id', $id)
            ->order_by('title', 'ASC')
            ->get(TBL_HR_DOCUMENT)->result();

        $current_folder = $this->db->get_where(TBL_HR_FOLDER, array('id' => $id))->row();
        $this->document->get_all_parent_folder($current_folder->parent_id);
        $data["parent_folder"] = array_reverse($this->document->data, TRUE);
        $data["current_folder"] = $current_folder;

        $data["parent_id"] = $id;
        $data["tpl_path"] = 'admin/document/index';
        $this->load->view('admin/layout', $data);    
    }

    public function upload_hr()
    {
        $config['upload_path']          = 'assets/uploads/documents/';
        $config['allowed_types']        = 'css|html|xhtml|js|php|cs|gif|jpg|png|sql|txt|zip|doc|docx|xls|xlsx|ppt|pptx|pdf|rar|exe';
        $config['max_size']             = 100000;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload() )
        {
            $upload_data = $this->upload->data();

            $folder_id = $_POST['folder_id'];

            if ($_POST['folder_id'] == 0) {
                $folder_id = NULL;
            }

            $document = array(
                'hr_folder_id' => $folder_id,
                'name'         => $upload_data['file_name'],
                'title'        => $upload_data['file_name'],
                'file_size'    => $upload_data['file_size'],
                'file_type'    => $upload_data['file_type'],
                'file_ext'     => $upload_data['file_ext'],
                'path'         => $config['upload_path'] . $upload_data['file_name'],
                'created_at'   => date("Y-m-d H:i:s")
            );

            $this->db->insert(TBL_HR_DOCUMENT, $document);

            echo '{"files": [
                {
                    "name": "' . $upload_data['file_name'] . '",
                    "size": "' . $upload_data['file_size'] . '",
                    "url": "url",
                    "thumbnailUrl": "thumbnailUrl",
                    "deleteUrl": "deleteUrl",
                    "deleteType": "DELETE"
                }
                ]}';
        }
    }
    
	public function upload()
	{
		$config['upload_path']          = 'assets/uploads/documents/';
        $config['allowed_types']        = 'css|html|xhtml|js|php|cs|gif|jpg|png|sql|txt|zip|doc|docx|xls|xlsx|ppt|pptx|pdf|rar|exe';
        $config['max_size']             = 100000;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload() )
        {
            $upload_data = $this->upload->data();

            $document = array(
                'employee_id' => $this->input->post('employee_id'),
                'title'       => $upload_data['file_name'],
                'file_size'   => $upload_data['file_size'],
                'file_type'   => $upload_data['file_type'],
                'file_ext'    => $upload_data['file_ext'],
                'path'        => $config['upload_path'] . $upload_data['file_name'],
                'created_at'  => date("Y-m-d H:i:s")
            );

            $this->db->insert(TBL_DOCUMENTS, $document);

            echo '{"files": [
                {
                    "name": "' . $upload_data['file_name'] . '",
                    "size": "' . $upload_data['file_size'] . '",
                    "url": "url",
                    "thumbnailUrl": "thumbnailUrl",
                    "deleteUrl": "deleteUrl",
                    "deleteType": "DELETE"
                }
                ]}';
        }
	}

    public function delete($id)
    {
        $document = $this->db->get_where(TBL_DOCUMENTS, array('id' => $id))->row();
        $employee = $this->db->get_where(TBL_EMPLOYEE, array('id' => $document->employee_id))->row();

        $account_role = $this->session->userdata('logged_account_role');
        $employee_id = $this->session->userdata('employee_id');

        if ($document->employee_id == $employee_id || $account_role == 'HR Admin' || $account_role == 'Administrator')
        {
            unlink($document->path);
            $this->db->where('id', $id);
            $this->db->delete(TBL_DOCUMENTS);
            $this->session->set_flashdata('doc_delete', TRUE);
            redirect('admin/employee/document/' . $employee->emp_number);
        }
        else 
        {
            redirect('admin/dashboard');
        }
    }

    public function share()
    {
        if ( !is_null($this->input->post('employee_ids')) )
        {
            $data['shared_to'] = '';

            foreach ($this->input->post('employee_ids') as $employee_id) {
                $data['shared_to'] .= "[" . $employee_id . "]";
            }

            $this->db->where('id', $this->input->post('document_id'));
            $this->db->update(TBL_DOCUMENTS, $data);
            $this->session->set_flashdata('doc_shared', TRUE);
        }

        redirect('admin/employee/document/' . $this->input->post('emp_number'));
    }

    public function download($document_id)
    {
        $this->load->helper('download');
        $data = 'Here is some text!';
        $name = 'mytext.txt';
        //force_download('assets/uploads/documents/BC-19.txt', TRUE);
    }

    public function ajax_create_folder()
    {
        $this->db->where('name', $_POST['name']);
        $this->db->from(TBL_HR_FOLDER);
        $found = $this->db->count_all_results();
        
        $folder_name = $_POST['name'];

        if ($found > 0) 
        {
            $folder_name = $_POST['name']."(".date("YmdHis").")";
        }

        $data = array(
            'name' => $folder_name,
            'parent_id' => $_POST['parent_id'],
            'total_file' => 0,
            'created_at' => date("Y-m-d H:i:s")
        );

        $this->session->set_flashdata('new_folder', $folder_name);
        
        $this->db->insert(TBL_HR_FOLDER, $data);
    }
}