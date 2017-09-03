<form class="form-horizontal" role="form" action="<?php echo site_url('admin/setting/update'); ?>" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div><!-- /.box-header -->

            <div class="form-horizontal form-employee">
                <div class="form-group">
                    <label for="inputWorkweek" class="col-sm-2 control-label">Workweek</label>
                    <div class="col-sm-10 padding-top-5">
                        <label><input type="checkbox" class="form-control" name="workweek_monday" <?php echo (in_array('monday', $setting['workweek']) ? 'checked' : ''); ?>/>&nbsp; Monday</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" class="form-control" name="workweek_tuesday" <?php echo (in_array('tuesday', $setting['workweek']) ? 'checked' : ''); ?>/>&nbsp; Tuesday</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" class="form-control" name="workweek_wednesday" <?php echo (in_array('wednesday', $setting['workweek']) ? 'checked' : ''); ?>/>&nbsp; Wednesday</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" class="form-control" name="workweek_thursday" <?php echo (in_array('thursday', $setting['workweek']) ? 'checked' : ''); ?>/>&nbsp; Thursday</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" class="form-control" name="workweek_friday" <?php echo (in_array('friday', $setting['workweek']) ? 'checked' : ''); ?>/>&nbsp; Friday</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" class="form-control" name="workweek_saturday" <?php echo (in_array('saturday', $setting['workweek']) ? 'checked' : ''); ?>/>&nbsp; Saturday</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" class="form-control" name="workweek_sunday" <?php echo (in_array('sunday', $setting['workweek']) ? 'checked' : ''); ?>/>&nbsp; Sunday</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputWorkHourPerDay" class="col-sm-2 control-label">Work hour per day</label>
                    <div class="col-sm-2 input-group padding-left-15" style="width:150px;">
                        <input type="text" class="form-control col-xs-2" id="inputWorkHourPerDay" name="work_hour_per_day" value="<?php echo $setting['work_hour_per_day']; ?>">
                        <span class="input-group-addon"><b>hour(s)</b></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmployeeNumberCode" class="col-sm-2 control-label">Employee Number</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputEmployeeNumberCode" name="employee_number_code" value="<?php echo $setting['employee_number_code']; ?>">
                    </div>

                    <div class="col-sm-2 input-group padding-left-15" style="width:110px;">
                        <input type="text" class="form-control col-xs-2" id="inputEmployeeNumberDigit" maxlength="1" name="employee_number_digit" value="<?php echo $setting['employee_number_digit']; ?>">
                        <span class="input-group-addon"><b>digit</b></span>
                    </div>

                    <label for="inputEmployeeNumberCode" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6 margin-top-10">
                        ex: <strong><span id="emp_code"><?php echo $setting['employee_number_code']; ?></span><span id="emp_digit">001</span></strong>
                    </div>

                    <script>
                    $(function() {
                        $("#inputEmployeeNumberCode").bind('keyup change blur', function() {
                            $("#emp_code").text($(this).val());
                        });
                        $("#inputEmployeeNumberDigit").bind('keyup change blur', function() {
                            $("#emp_digit").text(printDigit(parseInt($(this).val())));
                        });

                        function printDigit(loop) {
                            var digit = "";
                            for (i = 0; i < loop; i++) {
                                if (i == loop - 1) digit += "1";
                                else digit += "0";
                            }
                            return digit;
                        }

                        var defDigit = parseInt("<?php echo $setting['employee_number_digit']; ?>");
                        $("#emp_digit").text(printDigit(defDigit));
                    });
                    </script>
                </div>
                <div class="form-group">
                    <label for="inputTimeOffPerYear" class="col-sm-2 control-label">Time off per year</label>
                    <div class="col-sm-2 input-group padding-left-15" style="width:150px;">
                        <input type="text" class="form-control col-xs-2" id="inputTimeOffPerYear" name="timeoff_per_year" value="<?php echo $setting['timeoff_per_year']; ?>">
                        <span class="input-group-addon"><b>day(s)</b></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmailNotif" class="col-sm-2 control-label">Email Notification</label>
                    <div class="col-sm-2" style="width:100px;">
                        <select class="form-control" name="email_notif">
                            <option value="yes" <?php if ($setting['email_notif'] == 'yes') : ?>selected<?php endif; ?>>Yes</option>
                            <option value="no" <?php if ($setting['email_notif'] == 'no') : ?>selected<?php endif; ?>>No</option>
                        </select>
                    </div>
                </div>
            	<div class="form-group">
                    <label for="inputSMTPHost" class="col-sm-2 control-label">SMTP Host</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputSMTPHost" name="smtp_host" value="<?php echo $setting['smtp_host']; ?>">
                    </div>

                    <label for="inputSMTPPort" class="col-sm-2 control-label">SMTP Port</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputSMTPPort" name="smtp_port" value="<?php echo $setting['smtp_port']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSMTPUsername" class="col-sm-2 control-label">SMTP Username</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputSMTPUsername" name="smtp_username" value="<?php echo $setting['smtp_username']; ?>">
                    </div>

                    <label for="inputSMTPPassword" class="col-sm-2 control-label">SMTP Password</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputSMTPPassword" name="smtp_password" value="<?php echo $setting['smtp_password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMaksFileUpload" class="col-sm-2 control-label">Max File Upload</label>
                    <div class="col-sm-2 input-group padding-left-15" style="width:130px;">
                        <input type="text" class="form-control col-xs-2" id="inputMaksFileUpload" name="max_file_upload" value="<?php echo $setting['max_file_upload']; ?>"> 
                        <span class="input-group-addon"><b>MB</b></span>
                    </div>
                </div>
              
                <div>&nbsp;</div>
            </div>            
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" name="btn_submit" class="btn btn-primary btn-lg" value="Save Changes"/>
    </div>
</form>
