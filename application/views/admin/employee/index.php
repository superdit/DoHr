<?php
    $show_modal = $this->session->flashdata('show_modal'); 
    if (!is_null($show_modal)) {
        $fields = $this->session->flashdata('fields');
        $error_messages = $this->session->flashdata('errors');
    }
?>

<script>
$(document).ready(function() {
	$("#btn_search").click(function() {
		var term = $("#search_term").val();
		window.location = "<?php echo site_url("/admin/employee/search"); ?>/" + term;
	});

    $("#search_term").keypress(function(e) {
        if(e.which == 13) {
            var term = $("#search_term").val();
            window.location = "<?php echo site_url("/admin/employee/search"); ?>/" + term;
        }
    });

    <?php if ($show_modal): ?>
        $("#modal_add_employee").modal("show");
        <?php if (isset($error_messages['name'])): ?>
            $("#modal_add_employee #inputName").parent().parent().addClass("has-error");
            $("#modal_add_employee #inputName").parent().after('<div><br/><br/>'+
                '<label class="col-sm-4 control-label"></label>'+
                '<div class="col-sm-8">'+
                    '<p class="help-block error-text"><small><?php echo $error_messages['name']; ?></small></p>'+
                '</div></div>');
        <?php endif; ?>
        <?php if (isset($error_messages['emp_number'])): ?>
            $("#modal_add_employee #inputEmployeeNumber").parent().parent().addClass("has-error");
            $("#modal_add_employee #inputEmployeeNumber").parent().after('<div><br/><br/>'+
                '<label class="col-sm-4 control-label"></label>'+
                '<div class="col-sm-8">'+
                    '<p class="help-block error-text"><small><?php echo $error_messages['emp_number']; ?></small></p>'+
                '</div></div>');
        <?php endif; ?>
        <?php if (isset($error_messages['work_email'])): ?>
            $("#modal_add_employee #inputWorkEmail").parent().parent().addClass("has-error");
            $("#modal_add_employee #inputWorkEmail").parent().after('<div><br/><br/>'+
                '<label class="col-sm-4 control-label"></label>'+
                '<div class="col-sm-8">'+
                    '<p class="help-block error-text"><small><?php echo $error_messages['work_email']; ?></small></p>'+
                '</div></div>');
        <?php endif; ?>
        <?php if (isset($error_messages['password'])): ?>
            $("#modal_add_employee #inputPassword").parent().parent().addClass("has-error");
            $("#modal_add_employee #inputPassword").parent().after('<div><br/><br/>'+
                '<label class="col-sm-4 control-label"></label>'+
                '<div class="col-sm-8">'+
                    '<p class="help-block error-text"><small><?php echo $error_messages['password']; ?></small></p>'+
                '</div></div>');
        <?php endif; ?>

        $("#modal_add_employee #inputName").val("<?php echo $fields['name']; ?>");
        $("#modal_add_employee #inputEmployeeNumber").val("<?php echo $fields['emp_number']; ?>");
        $("#modal_add_employee #inputWorkEmail").val("<?php echo $fields['work_email']; ?>");
    <?php endif; ?>

    $("#btn_add_employee_close").click(function () {
        $("#modal_add_employee #inputName, #modal_add_employee #inputEmployeeNumber, " +
            "#modal_add_employee #inputWorkEmail, #modal_add_employee #inputPassword").parent().parent().removeClass("has-error");
        $("#modal_add_employee #inputName, #modal_add_employee #inputEmployeeNumber, " +
            "#modal_add_employee #inputWorkEmail, #modal_add_employee #inputPassword").parent().next().remove();
    });

    $("#inputStatus").change(function() {
        var status = $(this).val();

        if (status == "<?php echo EMP_STATUS_TEMP; ?>") {
            $("#group-contract-date").removeClass("hide");
            $("#group-contract-timeoff").removeClass("hide");
        }
        else { 
            $("#group-contract-date").addClass("hide");
            $("#group-contract-timeoff").addClass("hide");
        }
    });

    $('#btn_adv_search').click(function() {
        if ($('#advSearchPanel').is(':visible')) {
            $(this).removeClass('active');
            $(this).css('background', '');
            $(this).css('color', '');
            $('#advSearchPanel').slideUp();
        } else {
            $(this).addClass('active');
            $(this).css('background', '#f4f4f4');
            $(this).css('color', '#a3a3a3');
            $('#advSearchPanel').slideDown();
        }
    });

    <?php if (isset($more_search)): ?>
        $('#btn_adv_search').addClass('active');
        $('#btn_adv_search').css('background', '#f4f4f4');
        $('#btn_adv_search').css('color', '#a3a3a3');
    <?php endif; ?>

    $('#btnAvdSearchReset').click(function(e) {
        e.preventDefault();
        $('#formAdvSearch input[name="emp_number"], #formAdvSearch input[name="name"]').val('');
        $('#formAdvSearch select[name="emp_status"], #formAdvSearch select[name="job_id"]').val('');
    });

    $('#btnAdvSearch').click(function(e) {
        e.preventDefault();
        var emp_number = $('#formAdvSearch input[name="emp_number"]').val();
        var name = $('#formAdvSearch input[name="name"]').val();
        var emp_status = $('#formAdvSearch select[name="emp_status"]').val();
        window.location = '<?php echo site_url('admin/employee/moresearch'); ?>?emp_number=' + emp_number + '&name=' + name + '&emp_status=' + emp_status
    });

    $('#btn_quick_add').click(function() {
        
    });
});
</script>

 <!-- Modal Add Employee -->
<div class="modal fade" id="modal_add_employee" tabindex="-1" role="dialog" aria-labelledby="modal_add_employee_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo site_url('admin/employee/quick_add'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_add_employee_label">Add New Employee</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <input type="hidden" name="employee_id" value=""/>
                    <input type="hidden" name="emp_number" value=""/>
                    <div class="form-group">
                        <label for="inputEmployeeNumber" class="col-sm-4 control-label">Employee Number</label>
                        <div class="col-sm-5">
                            <input type="text" readonly="true" class="form-control" id="inputEmployeeNumber" name="emp_number" value="<?php echo $suggested_employee_number; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Full Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="inputName" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputWorkEmail" class="col-sm-4 control-label">Work Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="inputWorkEmail" name="work_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="inputStatus" name="status">
                                <option value="<?php echo EMP_STATUS_TEMP; ?>" selected><?php echo EMP_STATUS_TEMP; ?></option>
                                <option selected value="<?php echo EMP_STATUS_PERMANENT; ?>"><?php echo EMP_STATUS_PERMANENT; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hide" id="group-contract-date">
                        <label for="inputHireDate" class="col-sm-4 control-label">Hire Date</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputHireDate" name="hire_date">
                        </div>
                        <label for="inputHireDate" class="col-sm-1 control-label">Untill</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputExpiredDate" name="expired_date">
                        </div>
                        <style>.datepicker{z-index:1151 !important;}</style>
                        <script>
                        $(function() {
                            $("#inputExpiredDate").datepicker({
                                format: 'yyyy-mm-dd',
                                todayBtn: "linked"
                            });
                            $("#inputHireDate").datepicker({
                                format: 'yyyy-mm-dd',
                                todayBtn: "linked"
                            });
                        });
                        </script>
                    </div>
                    <div class="form-group hide" id="group-contract-timeoff">
                        <label for="inputAvailableTimeoff" class="col-sm-4 control-label">Available Timeoff</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputAvailableTimeoff" name="available_timeoff" value="20">
                        </div>
                        <label for="inputAvailableTimeoff" class="col-sm-4 control-label" style="text-align:left !important;">Days</label>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCPassword" class="col-sm-4 control-label">Confirm Password</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" id="inputCPassword" name="cpassword">
                        </div>
                    </div>
                </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_add_employee_close">Close</button>
                    <input type="submit" class="btn btn-primary" value="Create" name="btn_submit"/>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employee
        <small>Index</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Employee</li>
    </ol>
</section>

<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <!-- Default box -->
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">
                        <button class="btn btn-sm btn-default pull-left" data-toggle="modal" data-target="#modal_add_employee" id="btn_quick_add"><i class="fa fa-plus"></i> Quick Add</button>
                        <div class="pull-left">&nbsp;&nbsp;</div>
                        <div class="btn-group pull-left">
                            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-th-large"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="pull-left">&nbsp;&nbsp;</div>
                    </h3>
                    <h3 class="box-title pull-right">
                        <div class="input-group pull-left">
                            <input type="text" name="table_search" value="<?php if (isset($search_term)) echo $search_term; ?>" id="search_term" class="form-control input-sm pull-left" style="width: 150px;" placeholder="Search"/>
                            <div class="input-group-btn pull-left">
                                <button class="btn btn-sm btn-default pull-left" id="btn_search"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="btn-group pull-left">&nbsp;</div>
                        <?php if (isset($search_term)) : ?>
                        <div class="btn-group pull-left" style="margin-right:1px;">
                            <a href="<?php echo site_url('admin/employee'); ?>" class="btn btn-sm btn-default pull-left" title="clear search"><i class="fa fa-times"></i></a>
                        </div>
                        <?php endif; ?>

                        <div class="btn-group pull-left">
                            <a href="#" class="btn btn-sm btn-default pull-left" title="advanced search" id="btn_adv_search">
                                More Search
                            </a>

                            <a href="<?php echo site_url('admin/employee/download_excel'); ?>" class="btn btn-sm btn-default pull-left" title="export in excel search" id="btn_export_excel">
                                Download Excel
                            </a>
                        </div>
                    </h3>

                    <div class="box-tools pull-right"></div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advance Search Panel -->
                            <div class="panel panel-default" id="advSearchPanel" style="<?php echo (isset($more_search)) ? "" : "display:none;" ?>">
                                <div class="panel-heading">More Search Option</div>
                                <div class="panel-body">
                                    <form id="formAdvSearch" method="post" action="<?php echo site_url('admin/employee/advsearch'); ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="emp_number">Employee Number</label>
                                            <input type="text" class="form-control" name="emp_number" value="<?php echo (isset($key_number)) ? $key_number : "" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo (isset($key_name)) ? $key_name : "" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="emp_status">Employee Status</label>
                                            <select class="form-control" name="emp_status">
                                                <option <?php echo (isset($key_status) && $key_status == "") ? "selected" : "" ?> value="">-- All --</option>
                                                <option <?php echo (isset($key_status) && $key_status == "contract") ? "selected" : "" ?> value="contract">Contract</option>
                                                <option <?php echo (isset($key_status) && $key_status == "full-time") ? "selected" : "" ?> value="full-time">Full-Time</option>
                                                <option <?php echo (isset($key_status) && $key_status == "resign") ? "selected" : "" ?> value="resign">Resign</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-group">
                                            <label for="name">Job</label>
                                            <select class="form-control" name="job_id">
                                                <option value="0">-- All --</option>
                                                <option value="contract">Contract</option>
                                                <option value="full-time">Full-Time</option>
                                                <option value="resign">Resign</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label>&nbsp;</label><br/>
                                        <button type="submit" class="btn btn-primary btn-sm pull-right" id="btnAdvSearch"><i class="fa fa-search"></i> &nbsp;Search</button>
                                        <div class="pull-right">&nbsp;&nbsp;</div>
                                        <button class="btn btn-default btn-sm pull-right" id="btnAvdSearchReset">Reset</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Advance Search Panel -->
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($result as $row): ?>
                        <div class="col-md-2">
                            <div class="employee-photo-box">
                                <div class="text-center">

                                    <!-- <a href="#" class="btn btn-default btn-sm pull-right"><span class="fa fa-angle-down"></span></a> -->

                                    <div class="dropdown pull-right padding-5" style="position:absolute;left:140px;">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('admin/employee/overview/'.$row->emp_number); ?>">Overview</a></li>
                                            <li><a href="<?php echo site_url('admin/employee/employment/'.$row->emp_number); ?>">Employment</a></li>
                                            <li><a href="<?php echo site_url('admin/employee/personal/'.$row->emp_number); ?>">Personal</a></li>
                                            <li><a href="<?php echo site_url('admin/employee/schedule/'.$row->emp_number); ?>">Schedule</a></li>
                                            <li><a href="<?php echo site_url('admin/employee/attendance/'.$row->emp_number); ?>">Attendance</a></li>
                                            <li><a href="<?php echo site_url('admin/employee/salary/'.$row->emp_number); ?>">Salary</a></li>
                                            <li><a href="<?php echo site_url('admin/employee/document/'.$row->emp_number); ?>">Document</a></li>
                                        </ul>
                                    </div>

                                    <a href="<?php echo site_url('admin/employee/overview/'.$row->emp_number); ?>">
                                    <?php if ($row->photo == ''): ?>
                                    <img class="img-profile img-emp-round" src="<?php echo base_url() ?>assets/themes/img/no-picture.png"/>
                                    <?php else: ?>
                                    <img class="img-profile img-emp-round" src="<?php echo base_url().$row->photo ?>"/>
                                    <?php endif; ?>
                                    </a>
                                    <div><small><?php echo $row->name; ?></small></div>
                                    <div><strong><small>&nbsp;<?php echo $row->position; ?></small></strong></div>
                                    <p>&nbsp;</p>
                                </div><!-- /.tab-pane -->
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <ul class="pagination pagination-sm no-margin">
                        <?php echo $this->pagination->create_links(); ?>
                    </ul>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
<!-- 
	<div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List</h3>
                    <div class="box-tools">
                        <button class="btn btn-sm btn-default pull-right" id="btn_add"><i class="fa fa-plus"></i> Quick Add</button>
                        <div class="input-group">
                            <input type="text" name="table_search" id="search_term" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" id="btn_search"><i class="fa fa-search"></i></button>
                            </div>                            
                        </div>
                    </div>
                </div> --><!-- /.box-header -->
                <!-- <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                        	<th width="2%"></th>
                            <th width="15%">Emp. Number</th>
                            <th width="30%">Name</th>
                            <th width="25%">Email</th>
                            <th width="10%">Status</th>
                            <th></th>
                            <th width="1%"></th>
                        </tr>
                        <?php //foreach ($result as $row): ?>
                        <tr>
                        	<td></td>
                            <td><?php //echo $row->emp_number; ?></td>
                            <td><?php //echo $row->name; ?></td>
                            <td><?php //echo $row->work_email; ?></td>
                            <td><?php //echo $row->status; ?></td>
                            <td><a href="<?php //echo site_url(BACKEND_PATH. '/employee/employment/'.$row->emp_number) ?>">Detail</a></td>
                            <td></td>
                        </tr>
                    	<?php //endforeach; ?>
                    </table>
                </div><!-- /.box-body -->

                <!-- <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </ul>
			    </div>
            </div> --><!-- /.box -->
        <!-- </div> -->
    <!-- </div> -->
</section>