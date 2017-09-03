<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*
|--------------------------------------------------------------------------
| Defined backend path
|--------------------------------------------------------------------------
*/
define('BACKEND_PATH', 'admin');

/*
|--------------------------------------------------------------------------
| Defined constant table name on database
|--------------------------------------------------------------------------
|
| These modes are used when working with query
| 
*/
define('TBL_DOCUMENTS', 'documents');
define('TBL_EMPLOYEE', 'employee');
define('TBL_EMPLOYEE_ATTEND', 'employee_attendance');
define('TBL_EMPLOYEE_TIMEOFF', 'employee_timeoff');
define('TBL_EMPLOYEE_TIMEOFF_STAT', 'employee_timeoff_statistic');
define('TBL_EMPLOYEE_BTRIP', 'employee_business_trip');
define('TBL_EMPLOYEE_SALARIES', 'employee_salaries');
define('TBL_EMPLOYEE_NOTIF', 'employee_notifications');
define('TBL_EMPLOYEE_CONTRACT', 'employee_contracts');
define('TBL_EMPLOYEE_RESIGNATION', 'employee_resignation');
define('TBL_COUNTRIES', 'countries');

define('TBL_HR_SETTING', 'hr_settings');
define('TBL_HR_FOLDER', 'hr_folder');
define('TBL_HR_DOCUMENT', 'hr_documents');
define('TBL_HR_EVENT', 'hr_events');

/*
|--------------------------------------------------------------------------
| Defined Employee Status Based on Contract
|--------------------------------------------------------------------------
*/
define('EMP_STATUS_PERMANENT', 'Permanent');
define('EMP_STATUS_TEMP', 'Temporary');
define('EMP_STATUS_RESIGN', 'Resign');

/*
|--------------------------------------------------------------------------
| Defined Employee Status Based on Daily Work
|--------------------------------------------------------------------------
*/
define('EMP_WORK_FULLTIME', 'Fulltime');
define('EMP_WORK_PARTTIME', 'Parttime');
define('EMP_WORK_CASUAL', 'Casual');

/*
|--------------------------------------------------------------------------
| Defined Employee Timeoff Status
|--------------------------------------------------------------------------
*/
define('TIMEOFF_APPROVED', 'Approved');
define('TIMEOFF_WAITING_APPROVAL', 'Waiting Approval');
define('TIMEOFF_REJECTED', 'Rejected');

/*
|--------------------------------------------------------------------------
| Defined Employee Timeoff Reason
|--------------------------------------------------------------------------
*/
define('TIMEOFF_REASON_EDUCATION', 'Education');
define('TIMEOFF_REASON_FAMILY', 'Family');
define('TIMEOFF_REASON_RELIGION', 'Religion');
define('TIMEOFF_REASON_SICK', 'Sick');
define('TIMEOFF_REASON_VACATION', 'Vacation');
define('TIMEOFF_REASON_OTHER', 'Other');

/*
|--------------------------------------------------------------------------
| Defined Salary Paid Interval
|--------------------------------------------------------------------------
*/
define('SALARY_PAID_HOUR', 'hourly');
define('SALARY_PAID_DAY', 'daily');
define('SALARY_PAID_WEEK', 'weekly');
define('SALARY_PAID_MONTH', 'monthly');
define('SALARY_PAID_YEAR', 'yearly');