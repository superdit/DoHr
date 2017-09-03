 <div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">                    
        <li class="pull-left header"><i class="fa fa-th"></i> Personal</li>
    </ul>
    <div class="tab-content">
        <div>
            <form class="form-horizontal" role="form" action="<?php echo site_url(BACKEND_PATH. '/employee/personal/'.$emp->emp_number) ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header">
                            <h4 class="box-title"></h4>
                        </div><!-- /.box-header -->
                        <?php if ($this->session->flashdata('updated')) : ?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Success!</b> personal detail updated.
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
                        <input type="hidden" name="emp_number" value="<?php echo $emp->emp_number; ?>"?>

                        <div class="form-horizontal form-employee">
                            <div class="form-group">
                                <label for="inputBirthdate" class="col-sm-3 control-label">Birthdate</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inputBirthdate" name="birth_date" value="<?php echo $emp->birth_date; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                                <script>
                                $(function() {
                                    $("#inputBirthdate").datepicker({
                                        format: 'yyyy-mm-dd',
                                        startView: 2,
                                        todayBtn: "linked"
                                    });
                                });
                                </script>
                            </div>
                        	<div class="form-group">
                                <label for="inputMarital" class="col-sm-3 control-label">Marital Status</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="inputMarital" name="marital" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                        <option value="Single" <?php if ($emp->marital == 'Single'): ?>selected<?php endif; ?>>Single</option>
                                        <option value="Married" <?php if ($emp->marital == 'Married'): ?>selected<?php endif; ?>>Married</option>
                                        <option value="Divorced" <?php if ($emp->marital == 'Divorced'): ?>selected<?php endif; ?>>Divorced</option>
                                        <option value="Other" <?php if ($emp->marital == 'Other'): ?>selected<?php endif; ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputGender" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="inputGender" name="gender" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                        <option value="Male" <?php if ($emp->gender == 'Male'): ?>selected<?php endif; ?>>Male</option>
                                        <option value="Female" <?php if ($emp->gender == 'Female'): ?>selected<?php endif; ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress1" class="col-sm-3 control-label">Address 1</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputAddress1" name="address1" value="<?php echo $emp->address1; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-sm-3 control-label">Address 2</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" value="<?php echo $emp->address2; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCity" class="col-sm-3 control-label">City / Town</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo $emp->city; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputProvince" class="col-sm-3 control-label">Province / State</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputProvince" name="province" value="<?php echo $emp->province; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPostcode" class="col-sm-3 control-label">Postcode</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inputPostcode" name="postcode" value="<?php echo $emp->postcode; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCountry" class="col-sm-3 control-label">Country</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="inputCountry" name="country" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                        <?php foreach ($countries as $country) : ?>
                                        <option value="<?php echo $country->short_name; ?>" <?php if ($country->short_name == $emp->country) : ?> selected <?php endif; ?>><?php echo $country->short_name; ?></option>
                                    	<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group <?php if(isset($error_messages['personal_email'])): ?>has-error<?php endif; ?>">
                                <label for="inputPersonalEmail" class="col-sm-3 control-label">Personal Email</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputPersonalEmail" name="personal_email" value="<?php echo $emp->personal_email; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                                <?php if(isset($error_messages['personal_email'])): ?>
                                <br/><br/>
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <p class="help-block error-text"><small><?php echo $error_messages['personal_email']; ?></small></p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="inputHomePhone" class="col-sm-3 control-label">Home Phone</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputHomePhone" name="home_phone" value="<?php echo $emp->home_phone; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMobile" class="col-sm-3 control-label">Mobile</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputMobile" name="mobile_phone" value="<?php echo $emp->mobile_phone; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBankName" class="col-sm-3 control-label">Bank Name</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputBankName" name="bank_name" value="<?php echo $emp->bank_name; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBankBranch" class="col-sm-3 control-label">Bank Branch</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputBankBranch" name="bank_branch" value="<?php echo $emp->bank_branch; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBankAccountNumber" class="col-sm-3 control-label">Bank Account Number</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputBankAccountNumber" name="bank_account_number" value="<?php echo $emp->bank_account_number; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBankHolderName" class="col-sm-3 control-label">Bank Holder Name</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputBankHolderName" name="bank_holder_name" value="<?php echo $emp->bank_holder_name; ?>" <?php if ($emp->status == 'resign') : ?>disabled<?php endif; ?>>
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
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->