<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">                    
        <li class="pull-left header"><i class="fa fa-user"></i> Employment</li>
    </ul>
    <div class="tab-content">
        <div>            
            <form class="form-horizontal" role="form" action="<?php echo site_url(BACKEND_PATH. '/employee/employment/'.$emp->emp_number) ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div><!-- /.box-header -->
                        <?php if ($this->session->flashdata('updated')) : ?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Success!</b> employment detail updated.
                        </div>
                        <?php endif; ?>

                        <?php if (isset($error_count)): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Error!</b> someting not right, please check the submitted data.
                        </div>
                        <?php endif; ?>

                        <input type="hidden" name="id" value="<?php echo $emp->id; ?>"?>
                        <input type="hidden" name="emp_number2" value="<?php echo $emp->emp_number; ?>"?>

                        <div class="form-horizontal form-employee">
                            <div class="form-group <?php if(isset($error_messages['emp_number'])): ?>has-error<?php endif; ?>">
                                <label for="inputEmpNumber" class="col-sm-2 control-label">Emp. Number</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inputEmpNumber" name="emp_number" value="<?php echo $emp->emp_number; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>

                                <?php if(isset($error_messages['emp_number'])): ?>
                                <br/><br/>
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <p class="help-block error-text"><small><?php echo $error_messages['emp_number']; ?></small></p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php if(isset($error_messages['name'])): ?>has-error<?php endif; ?>">
                                <label for="inputName" class="col-sm-2 control-label">Full Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputName" name="name" value="<?php echo $emp->name; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>

                                <?php if(isset($error_messages['name'])): ?>
                                <br/><br/>
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <p class="help-block error-text"><small><?php echo $error_messages['name']; ?></small></p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php if(isset($error_messages['nick_name'])): ?>has-error<?php endif; ?>">
                                <label for="inputNickName" class="col-sm-2 control-label">Nick Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputNickName" name="nick_name" value="<?php echo $emp->nick_name; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>

                                <?php if(isset($error_messages['nick_name'])): ?>
                                <br/><br/>
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <p class="help-block error-text"><small><?php echo $error_messages['nick_name']; ?></small></p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="inputPosition" class="col-sm-2 control-label">Position</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputPosition" name="position" value="<?php echo $emp->position; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group <?php if(isset($error_messages['work_email'])): ?>has-error<?php endif; ?>">
                                <label for="inputWorkEmail" class="col-sm-2 control-label">Work Email</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputWorkEmail" name="work_email" value="<?php echo $emp->work_email; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>

                                <?php if(isset($error_messages['work_email'])): ?>
                                <br/><br/>
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <p class="help-block error-text"><small><?php echo $error_messages['work_email']; ?></small></p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="inputWorkPhone" class="col-sm-2 control-label">Work Phone</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputWorkPhone" name="work_phone" value="<?php echo $emp->work_phone; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputJoinDate" class="col-sm-2 control-label">Join Date</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inputJoinDate" name="join_date" value="<?php echo $emp->join_date; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                                <script>
                                $(function() {
                                    $("#inputJoinDate").datepicker({
                                        format: 'yyyy-mm-dd',
                                        startView: 2,
                                        todayBtn: "linked"
                                    });
                                });
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="inputStatus" name="status" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                        <!-- <option value="part-time" <?php if ($emp->status == 'part-Time'): ?>selected<?php endif; ?>>Part-Time</option> -->
                                        <option value="contract" <?php if ($emp->status == 'contract'): ?>selected<?php endif; ?>>Contract</option>
                                        <!-- <option value="intership" <?php if ($emp->status == 'intership'): ?>selected<?php endif; ?>>Intership</option>
                                        <option value="freelance" <?php if ($emp->status == 'freelance'): ?>selected<?php endif; ?>>Freelance</option>
                                        <option value="permanent" <?php if ($emp->status == 'permanent'): ?>selected<?php endif; ?>>Permanent</option> -->
                                        <option value="full-time" <?php if ($emp->status == 'full-time'): ?>selected<?php endif; ?>>Full-Time</option>
                                        <?php if ($emp->status == 'resign') : ?>
                                        <option value="full-time" <?php if ($emp->status == 'resign'): ?>selected<?php endif; ?>>Resign</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNationality" class="col-sm-2 control-label">Nationality</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="inputNationality" name="nationality" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                        <?php foreach ($countries as $country) : ?>
                                        <option value="<?php echo $country->short_name; ?>" <?php if ($country->short_name == $emp->nationality) : ?> selected <?php endif; ?>><?php echo $country->short_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkype" class="col-sm-2 control-label">Skype Account</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputSkype" name="skype" value="<?php echo $emp->skype; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="inputWebsites" class="col-sm-2 control-label">Websites / Blog</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputWebsites" name="websites" value="<?php echo $emp->websites; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAboutMe" class="col-sm-2 control-label">About Me</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="inputAboutMe" rows="7" name="about_me" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>><?php echo $emp->about_me; ?></textarea>
                                </div>
                            </div>
                            <?php $account_role = $this->session->userdata('logged_account_role'); ?>
                            <?php if ($account_role == 'HR Manager' || $account_role == 'Administrator') : ?>
                            <div class="form-group">
                                <label for="inputAccountRole" class="col-sm-2 control-label">Account Role</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="inputAccountRole" name="account_role" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                        <option value="Employee" <?php if ($emp->account_role == 'Employee'): ?>selected<?php endif; ?>>Employee</option>
                                        <option value="HR Manager" <?php if ($emp->account_role == 'HR Manager'): ?>selected<?php endif; ?>>HR Manager</option>
                                        <option value="Administrator" <?php if ($emp->account_role == 'Administrator'): ?>selected<?php endif; ?>>Administrator</option>
                                    </select>
                                </div>
                            </div>
                            <?php else : ?>
                            <div class="form-group">
                                <label for="inputAccountRole" class="col-sm-2 control-label">Account Role</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputAccountRole" name="account_role" value="<?php echo $emp->account_role; ?>" readonly="true" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="form-group <?php if(isset($error_messages['password'])): ?>has-error<?php endif; ?>">
                                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="inputPassword" name="password" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="inputPassword2" name="password2" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                                <?php if(isset($error_messages['password'])): ?>
                                <br/><br/>
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <p class="help-block error-text"><small><?php echo $error_messages['password']; ?></small></p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div>&nbsp;</div>
                        </div>            
                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" name="btn_submit" class="btn btn-primary btn-lg" value="Save Changes" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>/>
                    <a href="" class="btn btn-lg btn-danger pull-right" id="btn-resign" data-toggle="modal" data-target="#modal_resign_employee" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>Resignation</a>
                </div>
            </form>
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->

 <!-- Modal Confirm Employee Resignation -->
<div class="modal fade" id="modal_resign_employee" tabindex="-1" role="dialog" aria-labelledby="modal_resign_employee_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo site_url('admin/employee/resign'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_resign_employee_label">Employee Resignation</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <input type="hidden" name="employee_id" value="<?php echo $emp->id; ?>"/>
                    <div class="form-group">
                        <label for="inputEmployeeNumber" class="col-sm-3 control-label">Emp. Number</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputEmployeeNumber" name="emp_number" disabled="disabled" value="<?php echo $emp->emp_number; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Full Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="inputName" name="name" disabled="disabled" value="<?php echo $emp->name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputReason" class="col-sm-3 control-label">Reason</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="inputReason" name="reason">
                                <option value="change-job">Change Job</option>
                                <option value="education">Education</option>
                                <option value="family">Family</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNote" class="col-sm-3 control-label">Note</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="5" name="note" id="inputNote"></textarea>
                        </div>
                    </div>
                </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_resign_employee_close">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit Resignation" name="btn_submit_resign"/>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
$(function() {
});
</script>