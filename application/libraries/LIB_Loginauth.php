<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LIB_Loginauth {

	protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->load->library('session');
        $this->CI->load->helper('url');

        $logged_id = $this->CI->session->userdata('logged_id');

        if (is_null($logged_id))
        {
        	if ($this->CI->uri->segment(1) != 'auth')
        	{
        		redirect('auth/signin');
        	}
        }
        else
        {
            $this->CI->db->select('unread_notif');
            $this->CI->db->where('id', $logged_id);
            $notif = $this->CI->db->get(TBL_EMPLOYEE)->row()->unread_notif;

            $this->CI->session->set_userdata('logged_unread_notif', $notif);

            // get last clock in            
            $last_clock_inout = $this->CI->db->query("SELECT * FROM " . TBL_EMPLOYEE_ATTEND . " WHERE employee_id = " . $logged_id . " ORDER BY created_at DESC LIMIT 1;")->row();
            $today_clock_inout = $this->CI->db->query("SELECT * FROM " . TBL_EMPLOYEE_ATTEND . " WHERE employee_id = " . $logged_id . " AND created_at LIKE CONCAT('%', DATE(NOW()), '%') ORDER BY created_at DESC LIMIT 1;")->row();
            $this->CI->session->set_userdata('last_clock_inout', $last_clock_inout);
            $this->CI->session->set_userdata('today_clock_inout', $today_clock_inout);
            //@mysqli_next_result($this->CI->db->conn_id);
        }
    }

    // https://zapranblues.wordpress.com/2014/11/06/stored-procedure-dan-query-standard-di-codeigniter/
    // http://forum.codeigniter.com/thread-5935-page-2.html?highlight=Commands+out+of+sync
    // public function clean_mysqli_connection( $dbc )
    // {
    //     while( mysqli_more_results($dbc) )
    //     {
    //         if(mysqli_next_result($dbc))
    //         {
    //             $result = mysqli_use_result($dbc);
                
    //             if( get_class($result) == 'mysqli_stmt' )
    //             {
    //                 mysqli_stmt_free_result($result);
    //             }
    //             else
    //             {
    //                 unset($result);
    //             }
    //         } 
    //     }
    // }

}