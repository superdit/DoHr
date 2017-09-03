  <!-- Modal Add BTrip -->
<div class="modal fade" id="modal_add_btrip" tabindex="-1" role="dialog" aria-labelledby="modal_add_btrip_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo site_url('admin/schedule/add_business_trip'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_add_btrip_label">New Business Trip</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <input type="hidden" name="employee_id" value="<?php echo $emp->id; ?>"/>
                    <input type="hidden" name="emp_number" value="<?php echo $emp->emp_number; ?>"/>
                    <input type="hidden" name="depart_date" id="inputDepartDate" value="<?php echo date("Y-m-d 00:00:00"); ?>" />
                    <input type="hidden" name="return_date" id="inputReturnDate" value="<?php echo date("Y-m-d 23:59:00"); ?>" />
                    <div class="form-group">
                        <label for="inputTime" class="col-sm-3 control-label">From - Until</label>
                        <div class="col-sm-8">
                            <div id="btriptime" class="btn" style="display: inline-block; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>
                            </div>

                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#btriptime span').html(moment().subtract(29, 'days').format('MMMM D, YYYY HH:mm') + ' - ' + moment().format('MMMM D, YYYY HH:mm'));

                                $('#btriptime').daterangepicker({
                                    opens: 'center',
                                    timePicker: true,
                                    timePickerIncrement: 10
                                });

                                $('#btriptime').on('apply.daterangepicker', function(ev, picker) {
                                    $('#btriptime span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputDepartDate').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputReturnDate').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });

                                $('#btriptime').on('hide.daterangepicker', function(ev, picker) {
                                    $('#btriptime span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputDepartDate').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputReturnDate').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });
                            });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDestination" class="col-sm-3 control-label">Destination</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="destination" id="inputDestination"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCost" class="col-sm-3 control-label">Cost</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="cost" id="inputCost"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputVehicle" class="col-sm-3 control-label">Vehicle</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="inputReason" name="reason">
                                <option value="Bus / Travel Mini Fan">Bus / Travel Mini Fan</option>
                                <option value="Office Vehicle">Office Vehicle</option>
                                <option value="Personal Vehicle">Personal Vehicle</option>
                                <option value="Plane">Plane</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNote" class="col-sm-3 control-label">Note</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="5" id="inputNote" name="note"></textarea>
                        </div>
                    </div>
                </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_add_timeoff_close">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" name="btn_submit"/>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal Add Timeoff -->
<div class="modal fade" id="modal_add_timeoff" tabindex="-1" role="dialog" aria-labelledby="modal_add_timeoff_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo site_url('admin/schedule/add_timeoff'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_add_timeoff_label">Request Time Off</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <input type="hidden" name="employee_id" value="<?php echo $emp->id; ?>"/>
                    <input type="hidden" name="emp_number" value="<?php echo $emp->emp_number; ?>"/>
                    <input type="hidden" name="from_date" id="inputFromDate" value="<?php echo date("Y-m-d 00:00:00"); ?>" />
                    <input type="hidden" name="to_date" id="inputToDate" value="<?php echo date("Y-m-d 23:59:00"); ?>" />
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Reason</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="inputReason" name="reason">
                                <option value="Education">Education</option>
                                <option value="Family">Family</option>
                                <option value="Sick">Sick</option>
                                <option value="Religion">Religion</option>
                                <option value="Vacation">Vacation</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTime" class="col-sm-3 control-label">From - Until</label>
                        <div class="col-sm-8">
                            <div id="timeoff" class="btn" style="display: inline-block; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>
                            </div>

                            <script type="text/javascript">
                            function getFormatDate(d){
                                return d.getMonth()+1 + '/' + d.getDate() + '/' + d.getFullYear()
                            }

                            $(document).ready(function() {
                                $('#timeoff span').html(moment().subtract(29, 'days').format('MMMM D, YYYY HH:mm') + ' - ' + moment().format('MMMM D, YYYY HH:mm'));

                                var minDate = getFormatDate(new Date()),
                                mdTemp = new Date();

                                $('#timeoff').daterangepicker({
                                    opens: 'center',
                                    timePicker: true,
                                    timePickerIncrement: 10,
                                    minDate: minDate
                                });

                                $('#timeoff').on('apply.daterangepicker', function(ev, picker) {
                                    $('#timeoff span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputFromDate').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputToDate').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });

                                $('#timeoff').on('hide.daterangepicker', function(ev, picker) {
                                    console.log(ev, picker);
                                    $('#timeoff span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputFromDate').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputToDate').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });
                            });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNote" class="col-sm-3 control-label">Note</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="5" id="inputNote" name="note"></textarea>
                        </div>
                    </div>
                </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_add_timeoff_close">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" name="btn_submit"/>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">                    
        <li class="pull-left header"><i class="fa fa-calendar"></i> Schedules</li>
    </ul>

    <div class="tab-content">
		<div class="row">
			
	        <div class="col-md-12">
	            <?php $tab = $this->session->flashdata('tab'); ?>
	            <div class="nav-tabs-custom">
	                <ul class="nav nav-tabs">
	                    <!-- <li class="<?php //if ($tab == 'calendar' || is_null($tab)): ?>active<?php //endif; ?>"><a href="#tab_emp_schedules_calendar" data-toggle="tab">Calendar</a></li> -->
	                    <li class="<?php if ($tab == 'timeoff' || $tab == 'qtimeoff' || is_null($tab)): ?>active<?php endif; ?>"><a href="#tab_emp_schedules_timeoff" data-toggle="tab">Time Off</a></li>
	                    <li class="<?php if ($tab == 'btrip'|| $tab == 'qbtrip'): ?>active<?php endif; ?>"><a href="#tab_emp_schedules_btrip" data-toggle="tab">Business Trip</a></li>
                        <li class=""><a href="#tab_emp_notification" data-toggle="tab">
                            Notification
                            <?php 
                                $unread_notif = $this->session->userdata('logged_unread_notif'); 
                                $logged_id = $this->session->userdata('logged_id'); 
                            ?>
                            <?php if ($unread_notif > 0 && $logged_id == $emp->id) : ?>
                            &nbsp;<span class="label label-success pull-right"><?php echo $unread_notif; ?></span>
                            <?php endif; ?>
                            </a>
                        </li>
                        <?php if ($emp->status != 'resign') : ?>
	                    <li class="dropdown pull-right">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-plus"></i> New Schedule <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#modal_add_timeoff" data-backdrop="static" href="#">Request Time Off</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#modal_add_btrip" data-backdrop="static" href="#">Add Business Trip</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
	                </ul>
	                <div class="tab-content">
	                    <!--<div class="tab-pane <?php if ($tab == 'calendar' || is_null($tab)): ?>active<?php endif; ?>" id="tab_emp_schedules_calendar">
	                        <?php //$this->load->view('admin/employee/detail/schedules/calendar'); ?>
	                    </div>-->
	                    <!-- /.tab-pane -->
	                    <div class="tab-pane <?php if ($tab == 'timeoff' || $tab == 'qtimeoff' || is_null($tab)): ?>active<?php endif; ?>" id="tab_emp_schedules_timeoff">
	                    	<?php $this->load->view('admin/employee/detail/schedules/timeoff'); ?>
	                    </div>
	                    <div class="tab-pane <?php if ($tab == 'btrip' || $tab == 'qbtrip'): ?>active<?php endif; ?>" id="tab_emp_schedules_btrip">
	                    	<?php $this->load->view('admin/employee/detail/schedules/business_trip'); ?>
	                    </div>
                        <div class="tab-pane" id="tab_emp_notification">
                            <?php $this->load->view('admin/employee/detail/schedules/notif'); ?>
                        </div>
	                </div>
	            </div><!-- nav-tabs-custom -->
	        </div><!-- /.col -->

	    </div> <!-- /.row -->
    </div>
</div>

<script>
$(function() {
    <?php $openmodal = $this->session->flashdata('openmodal'); ?>
    <?php if ($openmodal && $tab == 'qtimeoff'): ?>
        $("#modal_add_timeoff").modal("show");
    <?php endif; ?>
    <?php if ($openmodal && $tab == 'qbtrip'): ?>
        $("#modal_add_btrip").modal("show");
    <?php endif; ?>
});
</script>