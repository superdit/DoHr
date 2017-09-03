<!-- Modal Add Event -->
<div class="modal fade" id="modal_add_event" tabindex="-1" role="dialog" aria-labelledby="modal_add_event_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo site_url('admin/calendar/add_event'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_add_event_label">New Event</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="inputName"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTime" class="col-sm-3 control-label">From - Until</label>
                        <div class="col-sm-8">
                            <div id="eventtime" class="btn" style="display: inline-block; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>
                            </div>
                            <input type="hidden" name="from_date" id="inputFromDate" value="<?php echo date("Y-m-d 00:00:00"); ?>"/>
                            <input type="hidden" name="to_date" id="inputToDate" value="<?php echo date("Y-m-d 23:59:00"); ?>"/>

                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#eventtime span').html(moment().subtract(29, 'days').format('MMMM D, YYYY HH:mm') + ' - ' + moment().format('MMMM D, YYYY HH:mm'));

                                $('#eventtime').daterangepicker({
                                    opens: 'center',
                                    timePicker: true,
                                    timePickerIncrement: 10
                                });

                                $('#eventtime').on('apply.daterangepicker', function(ev, picker) {
                                    $('#eventtime span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputFromDate').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputToDate').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });

                                $('#eventtime').on('hide.daterangepicker', function(ev, picker) {
                                    $('#eventtime span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputFromDate').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputToDate').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });
                            });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAllDay" class="col-sm-3 control-label">All Day</label>
                        <div class="col-sm-6">
                            <input type="checkbox" class="form-control" name="all_day" id="inputAllDay"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputLocation" class="col-sm-3 control-label">Location</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="location" id="inputLocation"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputType" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="inputType" name="type">
                                <option value="Gathering">Gathering</option>
                                <option value="Holiday">Holiday</option>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_add_event_close">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" name="btn_submit"/>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- Modal Edit / Delete Event -->
<div class="modal fade" id="modal_edit_event" tabindex="-1" role="dialog" aria-labelledby="modal_edit_event_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo site_url('admin/calendar/edit_event'); ?>">
                <input type="hidden" name="id" id="inputIdEdit"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_edit_event_label">Edit Event</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="inputName"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTime" class="col-sm-3 control-label">From - Until</label>
                        <div class="col-sm-8">
                            <div id="eventtimeedit" class="btn" style="display: inline-block; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>
                            </div>
                            <input type="hidden" name="from_date" id="inputFromDateedit" />
                            <input type="hidden" name="to_date" id="inputToDateedit"/>

                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#eventtimeedit span').html(moment().subtract(29, 'days').format('MMMM D, YYYY HH:mm') + ' - ' + moment().format('MMMM D, YYYY HH:mm'));

                                $('#eventtimeedit').daterangepicker({
                                    opens: 'center',
                                    timePicker: true,
                                    timePickerIncrement: 10
                                });

                                $('#eventtimeedit').on('apply.daterangepicker', function(ev, picker) {
                                    $('#eventtimeedit span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputFromDateedit').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputToDateedit').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });

                                $('#eventtimeedit').on('hide.daterangepicker', function(ev, picker) {
                                    $('#eventtimeedit span').html(picker.startDate.format('MMMM DD, YYYY HH:mm') + ' - ' + picker.endDate.format('MMMM DD, YYYY HH:mm'));
                                    $('#inputFromDateedit').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                                    $('#inputToDateedit').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
                                });
                            });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAllDay" class="col-sm-3 control-label">All Day</label>
                        <div class="col-sm-6">
                            <input type="checkbox" class="form-control" name="all_day" id="inputAllDay"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputLocation" class="col-sm-3 control-label">Location</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="location" id="inputLocation"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputType" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="inputType" name="type">
                                <option value="Gathering">Gathering</option>
                                <option value="Holiday">Holiday</option>
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
                    <a type="button" class="btn btn-danger pull-left" title="delete event" id="btn_delete_event"><i class="fa fa-trash-o"></i></a>
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_edit_event_close">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Changes" name="btn_submit"/>
                </div>

            </form>
        </div>
    </div>
</div>
