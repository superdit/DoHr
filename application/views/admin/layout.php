<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $page_title; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>assets/themes/online_files/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/themes/font-awesome-4.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>assets/themes/online_files/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <!--<link href="<?php echo base_url(); ?>assets/themes/css/morris/morris.css" rel="stylesheet" type="text/css" /> -->
        <!-- jvectormap -->
        <!--<link href="<?php echo base_url(); ?>assets/themes/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />-->
        <!-- Date Picker -->
        <link href="<?php echo base_url(); ?>assets/themes/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <!--<link href="<?php echo base_url(); ?>assets/themes/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />-->
        <!-- bootstrap wysihtml5 - text editor -->
        <!-- <link href="<?php echo base_url(); ?>assets/themes/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/themes/css/Fonts.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/themes/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/themes/css/form.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets/themes/online_files/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/online_files/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/themes/online_files/jquery-ui.min.js" type="text/javascript"></script>

        <!-- Bootstrap datetimepicker plugin -->
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstap-datetimepicker/js/moment.min.js"></script>    
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/bootstap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"></link>

        <!-- Bootstrap daterangepicker plugin -->
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

        <!-- Bootstrap filestyle plugin -->
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"></link>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Bootstrap Wizard -->
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-wizard/custom-wizard.css" rel="stylesheet"></link>
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-wizard/prettify.css" rel="stylesheet"></link>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-wizard/prettify.js"></script>

        <!-- Magic Suggest -->
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/magicsuggest/magicsuggest.css" rel="stylesheet"></link>
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/magicsuggest/magicsuggest-style.css" rel="stylesheet"></link>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/magicsuggest/magicsuggest.js"></script>

        <!-- Context.js -->
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/contextjs/context.standalone.css" rel="stylesheet"></link>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/contextjs/context.js"></script>

        <!-- Noty -->
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/noty/alert.css" rel="stylesheet"></link>
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/noty/animate.css" rel="stylesheet"></link>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>

        <!-- Select2 -->
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/select2/select2.min.css" rel="stylesheet"></link>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/select2/select2.min.js"></script>

        <!-- Sweet Alert -->
        <link href="<?php echo base_url(); ?>assets/themes/js/plugins/sweetalert/sweetalert.css" rel="stylesheet"></link>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/sweetalert/sweetalert.min.js"></script>

        <!-- autoNumeric -->
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/autoNumeric/autoNumeric.js"></script>

        <script>
        var BASE_URL = "<?php echo base_url(); ?>";
        var LOGGED_ID = "<?php echo $this->session->userdata("logged_id"); ?>";
        </script>

        <script src="<?php echo base_url(); ?>assets/themes/js/common.js"></script>
        <?php $dateNowPHP = new DateTime("now"); ?>
        <script>
        var nowDay = "<?php echo $dateNowPHP->format("d"); ?>";
        var nowMonth = parseInt("<?php echo $dateNowPHP->format("m"); ?>");
        var nowYear = "<?php echo $dateNowPHP->format("Y"); ?>";
        var nowHours = "<?php echo $dateNowPHP->format("H"); ?>";
        var nowMinutes = "<?php echo $dateNowPHP->format("i"); ?>";
        var nowSeconds = "<?php echo $dateNowPHP->format("s"); ?>";
        countDateTime('countDateTime', nowYear, nowMonth, nowDay, nowHours, nowMinutes, nowSeconds);
        </script>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <i class="fa fa-h-square"></i>&nbsp;&nbsp;DoHRM
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-left">
                    <ul class="nav navbar-nav">
                        <li>
                            <div class="padding-top-15 pull-left">
                                <strong>
                                    &nbsp;&nbsp;<span id="countDateTime"></span>
                                </strong>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                &nbsp;
                                <span><?php echo $this->session->userdata('logged_name'); ?> <i class="caret"></i></span>
                                <?php $unread_notif = $this->session->userdata('logged_unread_notif'); ?>
                                <?php if ($unread_notif > 0 ) : ?>
                                <span class="label label-success pull-right">
                                    <?php echo $unread_notif; ?>
                                </span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('admin/employee/overview/' . $this->session->userdata('logged_emp_number')); ?>"><i class="fa fa-user-plus"></i> My Profile</a></li>
                                <li class="divider"></li>
                                <?php if ($unread_notif > 0 ) : ?>
                                <li role="presentation">
                                    <a href="<?php echo site_url('admin/quick_action/notif'); ?>">
                                        Notification
                                        <span class="label label-success pull-right">
                                            <?php echo $unread_notif; ?>
                                        </span>
                                    </a> 
                                </li>
                                <li class="divider"></li>
                                <?php endif; ?>
                                <li role="presentation"><a href="<?php echo site_url('admin/quick_action/request_timeoff'); ?>">Request Time Off</a></li>
                                <li role="presentation"><a href="<?php echo site_url('admin/quick_action/create_btrip'); ?>">Add Business Trip</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('auth/signout'); ?>"><i class="fa fa-lock"></i> Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li>
                            <div class="padding-top-13 pull-left">
                                &nbsp;&nbsp;&nbsp;
                                <?php $today_clock_inout = $this->session->userdata("today_clock_inout"); ?>
                                <?php if ($today_clock_inout != NULL): ?>
                                    <?php if ($today_clock_inout->clock_in == NULL || ($today_clock_inout->clock_in != NULL && $today_clock_inout->clock_out != NULL)) : ?>
                                    <button class="btn btn-primary btn-xs" id="btn_clock_in"><i class="fa fa-arrow-circle-down"></i> &nbsp;Clock In</button>
                                    <button class="btn btn-primary btn-xs" disabled id="btn_clock_out"><i class="fa fa-arrow-circle-up"></i> &nbsp;Clock Out</button>
                                    <?php endif; ?>
                                    <?php if ($today_clock_inout->clock_out == NULL) : ?>
                                    <button class="btn btn-primary btn-xs" disabled id="btn_clock_in"><i class="fa fa-arrow-circle-down"></i> &nbsp;Clock In</button>
                                    <button class="btn btn-primary btn-xs" id="btn_clock_out"><i class="fa fa-arrow-circle-up"></i> &nbsp;Clock Out</button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button class="btn btn-primary btn-xs" id="btn_clock_in"><i class="fa fa-arrow-circle-down"></i> &nbsp;Clock In</button>
                                    <button class="btn btn-primary btn-xs" disabled id="btn_clock_out"><i class="fa fa-arrow-circle-up"></i> &nbsp;Clock Out</button>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?php if ($this->uri->segment(2) == 'dashboard') : ?>class="active"<?php endif; ?>>
                            <a href="<?php echo site_url("/admin/dashboard"); ?>">
                                <big><i class="fa fa-dashboard"></i> &nbsp;&nbsp;<span>Dashboard</span></big>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'employee') : ?>class="active"<?php endif; ?>>
                            <a href="<?php echo site_url("/admin/employee"); ?>">
                                <big><i class="fa fa-users"></i> &nbsp;&nbsp;&nbsp;<span>Employee</span></big>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'calendar') : ?>class="active"<?php endif; ?>>
                            <a href="<?php echo site_url("/admin/calendar"); ?>">
                                <big><i class="fa fa-calendar"></i> &nbsp;&nbsp;&nbsp;<span>Calendar</span></big>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'document') : ?>class="active"<?php endif; ?>>
                            <a href="<?php echo site_url("/admin/document"); ?>">
                                <big><i class="fa fa-file"></i> &nbsp;&nbsp;&nbsp;<span>Documents</span></big>
                            </a>
                        </li>
                        <?php 
                            $account_role = $this->session->userdata('logged_account_role');
                            if ($account_role == 'HR Manager' || $account_role == 'Administrator') 
                            {
                                $notif = $this->db->get_where(TBL_HR_SETTING, array('hr_key' => 'timeoff_requested'))->row();
                            }
                        ?>
                        <?php if ($account_role == 'HR Manager' || $account_role == 'Administrator') : ?>
                        <li <?php if ($this->uri->segment(2) == 'notif') : ?>class="active"<?php endif; ?>>
                            <a href="<?php echo site_url("/admin/notif"); ?>">
                                <big>&nbsp;<i class="fa fa-info"></i> &nbsp;&nbsp;&nbsp;&nbsp;<span>Notification</span></big>
                                <?php if ($notif->hr_value != 0) : ?>
                                <small class="badge pull-right bg-yellow" id="notif_count"><?php echo $notif->hr_value; ?></small>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'setting') : ?>class="active"<?php endif; ?>>
                            <a href="<?php echo site_url("/admin/setting"); ?>">
                                <big><i class="fa fa-gear"></i> &nbsp;&nbsp;&nbsp;<span>App Setting</span></big>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <?php $this->load->view($tpl_path); ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <!-- Morris.js charts -->
        <!-- <script src="<?php echo base_url(); ?>assets/themes/online_files/raphael-min.js"></script> -->
        <!--<script src="<?php echo base_url(); ?>assets/themes/js/plugins/morris/morris.min.js" type="text/javascript"></script>-->
        <!-- Sparkline -->
        <!--<script src="<?php echo base_url(); ?>assets/themes/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>-->
        <!-- jvectormap -->
        <!--
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        -->
        <!-- jQuery Knob Chart -->
        <!-- <script src="<?php echo base_url(); ?>assets/themes/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script> -->
        <!-- daterangepicker -->
        <!--<script src="<?php echo base_url(); ?>assets/themes/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <!--<script src="<?php echo base_url(); ?>assets/themes/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- slimScroll -->
        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/slimScroll/jquery.slimscroll.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/themes/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/themes/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/themes/js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>
