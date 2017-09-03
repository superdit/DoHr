<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LIB_Timeoff {

	protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function get_timeoff_taken($from_date, $to_date)
    {
        // get timeoff taken formula
        $_arr_days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');

        $this->CI->db->where('hr_key', 'workweek');
        $setting = $this->CI->db->get(TBL_HR_SETTING)->row();
        $workweek = explode(',', $setting->hr_value);

        // get total event holiday
        foreach ($_arr_days as $key => $value) 
        {
            if (!in_array($value, $workweek)) 
            {
                $number_day_in_week = date('N', strtotime($value));
                $this->CI->db->where('WEEKDAY(from_datetime) + 1 != ', $number_day_in_week);
            }
        }

        $this->CI->db->where('from_datetime >=', $from_date);
        $this->CI->db->where('to_datetime <=', $to_date);
        $this->CI->db->where('type', 'Holiday');
        $total_event_holiday = $this->CI->db->count_all_results(TBL_HR_EVENT);
        
        $datediff = strtotime($to_date) - strtotime($from_date);
        $ddiff = floor($datediff/(60*60*24)) + 1;
        
        $from = strtotime($from_date);
        $to = strtotime($to_date);
        
        $begin = new DateTime( $from_date );
        $end = new DateTime( $to_date );

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ( $period as $dt ) 
        {
            $day = strtolower($dt->format( "l" ));
            if (!in_array($day, $workweek))
                $ddiff--;
        }

        $timeoff_taken = intval($ddiff - $total_event_holiday); 
        return $timeoff_taken;
    }

}