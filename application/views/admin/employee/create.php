<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employee
        <small>Add New</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url(BACKEND_PATH. '/employee') ?>">Employee</a></li>
        <li class="active">Add New</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	        	<form class="form-horizontal" role="form" action="<?php echo site_url(BACKEND_PATH. '/employee/create') ?>" method="post">
		        	<div class="row">
			        	<div class="col-md-6" style="border-right:1px solid #f4f4f4;">
				            <div class="box-header">
				                <h3 class="box-title">Profile</h3>
				            </div><!-- /.box-header -->

							<div class="form-horizontal">
								<div class="form-group">
									<label for="inputName" class="col-sm-4 control-label">Full Name</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="inputName" name="name" value="<?php if (isset($fields["name"])) echo $fields["name"]; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-4 control-label">Birth Date</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="inputName" name="birth_date" value="<?php if (isset($fields["birth_date"])) echo $fields["birth_date"]; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress" class="col-sm-4 control-label">Address</label>
									<div class="col-sm-7">
										<textarea class="form-control" id="inputAddress" rows="4" name="address"><?php if (isset($fields["address"])) echo $fields["address"]; ?></textarea>
									</div>
								</div>
								<div class="form-group">
                                    <label for="inputGender" class="col-sm-4 control-label">Gender</label>
                                    <div class="col-sm-7">
	                                    <select class="form-control" id="inputGender" name="gender">
	                                        <option value="Male">Male</option>
	                                        <option value="Female">Female</option>
	                                    </select>
	                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus" class="col-sm-4 control-label">Status</label>
                                    <div class="col-sm-7">
	                                    <select class="form-control" id="inputStatus" name="status">
	                                        <option value="Contract">Contract</option>
	                                        <option value="Intership">Intership</option>
	                                        <option value="Freelance">Freelance</option>
	                                        <option value="Permanent">Permanent</option>
	                                    </select>
	                                </div>
                                </div>
								<div>&nbsp;</div>
							</div>            
						</div>

						<div class="col-md-6">
							<div class="box-header">
				                <h3 class="box-title">Account Login</h3>
				            </div><!-- /.box-header -->

							<div class="form-horizontal">
								<div class="form-group">
									<label for="inputEmpNumber" class="col-sm-4 control-label">Employee Number</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="inputEmpNumber" name="emp_number" value="<?php if (isset($fields["emp_number"])) echo $fields["emp_number"]; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-sm-4 control-label">Email</label>
									<div class="col-sm-7">
										<input type="email" class="form-control" id="inputEmail" name="email" value="<?php if (isset($fields["email"])) echo $fields["email"]; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-4 control-label">Password</label>
									<div class="col-sm-7">
										<input type="password" class="form-control" id="inputPassword" name="password">
									</div>
								</div>
								<div class="form-group">
									<label for="inputCPassword" class="col-sm-4 control-label">Confirm Password</label>
									<div class="col-sm-7">
										<input type="password" class="form-control" id="inputCPassword" name="cpassword">
									</div>
								</div>
							</div>    
						</div>
					</div>
					<div class="box-footer">
                        <input type="submit" name="btn_submit" class="btn btn-primary" value="Submit"/>
                    </div>
				</form>
	        </div>
	    </div>

	</div>
                            

	<!-- <form method="post" action="<?php echo site_url(BACKEND_PATH. '/employee/create') ?>">
		Employee Number : <input type="text" name="emp_number"/><br/>
		Name : <input type="text" name="name"/><br/>
		Email : <input type="text" name="email"/><br/>
		Password : <input type="password" name="password"/><br/>
		<input type="submit" name="btn_submit" value="Submit"/>
	</form> -->
</section>