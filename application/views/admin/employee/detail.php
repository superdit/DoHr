<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $emp->name; ?>
        <small>
            <?php echo $emp->emp_number; ?>
            <span class="text-red"><?php if ($emp->status == 'resign') : ?>(resign)<?php endif; ?></span>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url(BACKEND_PATH. '/employee') ?>">Employee</a></li>
        <li class="active">Detail</li>
    </ol>
</section>

<?php 
    $account_role = $this->session->userdata('logged_account_role');
    $emp_number = $this->session->userdata('logged_emp_number');
?>

<section class="content">
	<div class="row">
        <div class="col-md-2">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <div>
                    <div class="text-center">
                        <?php if ($emp->photo == ''): ?>
                        <img class="img-profile" src="<?php echo base_url() ?>assets/themes/img/no-picture.png"/>
                        <?php else: ?>
                        <img class="img-profile" src="<?php echo base_url().$emp->photo ?>"/>
                        <?php endif; ?>
                    </div><!-- /.tab-pane -->
                    <?php if ($emp_number == $emp->emp_number || $account_role == 'HR Manager' || $account_role == 'Administrator' || $emp->status): ?>
                    <?php if ($emp->status != 'resign'): ?>
                    <div class="form-group">
                        <form method="post" action="<?php echo site_url(BACKEND_PATH. '/employee/upload_picture') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="emp_number" value="<?php echo $emp->emp_number; ?>"/>
                            <input type="hidden" name="redirect_path" value="<?php echo $this->uri->segment(3); ?>"/>
                            <div class="fileinput-custom pull-left" style="margin-left:15px;">
                                <input type="file" class="filestyle" name="photo" data-input="false" data-badge="true" data-buttonText=" &nbsp;&nbsp;Pick" data-size="sm">
                            </div>
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary" title="Upload Photo"><i class="fa fa-upload"></i></button>
                        </form>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div><!-- /.tab-content -->
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" <?php if ($this->uri->segment(3) == "overview") :?>class="active"<?php endif; ?>>
                        <a href="<?php echo site_url(BACKEND_PATH. '/employee/overview/'.$emp->emp_number) ?>">Overview</a>
                    </li>
                    
                    <?php if ($emp_number == $emp->emp_number || $account_role == 'HR Manager' || $account_role == 'Administrator'): ?>
				    <li role="presentation" <?php if ($this->uri->segment(3) == "employment") :?>class="active"<?php endif; ?>>
                        <a href="<?php echo site_url(BACKEND_PATH. '/employee/employment/'.$emp->emp_number) ?>">Employment</a>
                    </li>
				    <li role="presentation" <?php if ($this->uri->segment(3) == "personal") :?>class="active"<?php endif; ?>>
                        <a href="<?php echo site_url(BACKEND_PATH. '/employee/personal/'.$emp->emp_number) ?>">Personal</a>
                    </li>
                    <li role="presentation" <?php if ($this->uri->segment(3) == "schedules") :?>class="active"<?php endif; ?>>
                        <a href="<?php echo site_url(BACKEND_PATH. '/employee/schedules/'.$emp->emp_number) ?>">Schedules</a>
                    </li>
                    <li role="presentation" <?php if ($this->uri->segment(3) == "attendance") :?>class="active"<?php endif; ?>>
                        <a href="<?php echo site_url(BACKEND_PATH. '/employee/attendance/'.$emp->emp_number) ?>">Attendance</a>
                    </li>

                    <!-- <span class="label label-success pull-right">4</span> -->
				    <!--<li role="presentation" <?php //if ($this->uri->segment(3) == "contact") :?>class="active"<?php //endif; ?>>
                        <a href="<?php //echo site_url(BACKEND_PATH. '/employee/contact/'.$emp->emp_number) ?>">Contact</a>
                    </li>-->
				    <li role="presentation" <?php if ($this->uri->segment(3) == "salary") :?>class="active"<?php endif; ?>>
                        <a href="<?php echo site_url(BACKEND_PATH. '/employee/salary/'.$emp->emp_number) ?>">Salary</a>
                    </li>
                    <li role="presentation" <?php if ($this->uri->segment(3) == "document") :?>class="active"<?php endif; ?>>
                        <a href="<?php echo site_url(BACKEND_PATH. '/employee/document/'.$emp->emp_number) ?>">Document</a>
                    </li>
                    <?php endif; ?>
				</ul>
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

        <div class="col-md-10">
            <!-- Custom Tabs (Pulled to the right) -->
            <?php 
            switch ($this->uri->segment(3)) {
                case 'overview': $this->load->view('admin/employee/detail/overview');  break;
                case 'employment': $this->load->view('admin/employee/detail/employment');  break;
                case 'personal': $this->load->view('admin/employee/detail/personal');  break;
                case 'schedules': $this->load->view('admin/employee/detail/schedules');  break;
                case 'attendance': $this->load->view('admin/employee/detail/attendance');  break;
                case 'contact': $this->load->view('admin/employee/detail/contact');  break;
                case 'salary': $this->load->view('admin/employee/detail/salary');  break;
                case 'document': $this->load->view('admin/employee/detail/document');  break;
                default: break;
            }
            ?>
        </div><!-- /.col -->
    </div> <!-- /.row -->
</section>