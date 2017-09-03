 <!-- Modal Add Salary -->
<div class="modal fade" id="modal_add_salary" role="dialog" aria-labelledby="modal_add_salary_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="<?php echo site_url('admin/salary/add_to_employee'); ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="modal_add_salary_label">Add Salary</h4>
				</div>
				<div class="modal-body">
				<div class="form-horizontal">
					<input type="hidden" name="employee_id" value="<?php echo $emp->id; ?>"/>
					<input type="hidden" name="emp_number" value="<?php echo $emp->emp_number; ?>"/>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputName" name="name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputCurrency" class="col-sm-3 control-label">Currency</label>
						<div class="col-sm-8">
							<select id="inputCurrency" name="currency" style="width: 75% !important;">
								<?php foreach ($countries as $country) : ?>
								<option value="<?php echo $country->currency_code; ?> (<?php echo $country->short_name; ?>)">
									<?php echo $country->currency_code; ?> (<?php echo $country->short_name; ?>)
								</option>	
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputAmount" class="col-sm-3 control-label">Amount</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputAmount" name="amount">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPaid" class="col-sm-3 control-label">Paid</label>
						<div class="col-sm-6">
							<select id="inputPaid" name="paid" class="form-control">
								<option value="<?php echo SALARY_PAID_HOUR; ?>"><?php echo SALARY_PAID_HOUR; ?></option>
								<option value="<?php echo SALARY_PAID_DAY; ?>"><?php echo SALARY_PAID_DAY; ?></option>
								<option value="<?php echo SALARY_PAID_WEEK; ?>"><?php echo SALARY_PAID_WEEK; ?></option>
								<option value="<?php echo SALARY_PAID_MONTH; ?>"><?php echo SALARY_PAID_MONTH; ?></option>
								<option value="<?php echo SALARY_PAID_YEAR; ?>"><?php echo SALARY_PAID_YEAR; ?></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputNote" class="col-sm-3 control-label">Note</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="5" id="inputNote" name="note"></textarea>
						</div>
					</div>
				</div>   
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="btn_add_salary_close">Close</button>
					<input type="submit" class="btn btn-primary" value="Add" name="btn_submit"/>
				</div>

			</form>
		</div>
	</div>
</div>

 <!-- Modal Delete Salary -->
<div class="modal fade" id="modal_delete_salary" role="dialog" aria-labelledby="modal_delete_salary_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modal_delete_salary_label">Delete Salary</h4>
            </div>
            <div class="modal-body">
                <center><h3>Delete this salary ?</h3></center>
            </div>   
                
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_delete_salary_close">Cancel</button>
                <a href="" class="btn btn-danger" name="btn_delete" id="btn_do_delete">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">                    
        <li class="pull-left header"><i class="fa fa-money"></i> Salary / Compensation</li>
    </ul>

    <div class="tab-content">
    	<?php $action = $this->session->flashdata('action'); ?>
    	<?php if (!is_null($action) && $action != 'add_failed'): ?>
    	<br/>
    	<div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Success!</b> Salary <?php echo ($action == 'add_success' ? 'added' : 'deleted'); ?>.
        </div>
    	<?php elseif (!is_null($action) && $action == 'add_failed'): ?>
    	<br/>
    	<div class="alert alert-info alert-dismissable">
            <i class="fa fa-info"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Info!</b> Salary already on the list.
        </div>
    	<?php endif; ?>

        <?php $account_role = $this->session->userdata('logged_account_role'); ?>
        <?php if ($account_role == 'HR Manager' || $account_role == 'Administrator') : ?>
    	<a href="" class="btn btn-sm btn-default margin-bottom-10"  data-toggle="modal" data-target="#modal_add_salary"><i class="fa fa-plus"></i> &nbsp;Add Salary</a>
        <?php endif; ?>
        
    	<?php if (count($emp_salaries) > 0): ?>
    	<table class="table table-bordered">
            <tr>
                <th width="20%">Salary</th>
                <th>Currency</th>
                <th width="15%">Amount</th>
                <th width="14%">Paid</th>
                <th width="8%"></th>
            </tr>
            <?php foreach ($emp_salaries as $sal): ?>
            <tr>
            	<td><?php echo $sal->name; ?></td>
            	<td><?php echo $sal->currency; ?></td>
            	<td><?php echo $sal->amount; ?></td>
            	<td><?php echo $sal->paid; ?></td>
            	<td class="text-center">
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default btn-xs"><span class="fa fa-edit"></span></button>
                        <button type="button" class="btn btn-default btn-xs delete-salary"><span class="fa fa-trash-o"></span></button>
                        <input type="hidden" name="id" value="<?php echo $sal->id; ?>"/>
                    </div>
                    <!-- <a href="" class="btn btn-success btn-sm"><span class="fa fa-trash-o"></span></a>
            		<a href="<?php echo site_url('admin/salary/delete_from_employee/'.$sal->id.'/'.$sal->employee_id); ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span></a> -->
            	</td>
            </tr>
        	<?php endforeach; ?>
        </table>
    	<?php else: ?>
    		<div class="callout callout-info">
                <h4>No salary added</h4>
                <p>Add salary by press "Add Salary" button</p>
            </div>
    	<?php endif; ?>
    </div>
</div>

<?php 

$show_modal = $this->session->userdata('show_modal'); 
if (!is_null($show_modal)) {
    $fields = $this->session->flashdata('fields');
    $error_messages = $this->session->flashdata('errors');
}

?>

<script>
$(function() {
    var employee_id = "<?php echo $emp->id; ?>";

    $('#inputAmount').autoNumeric('init');  

	$("#inputCurrency, #inputPaid").select2();

    $(".delete-salary").click(function() {
        var salary_id = $(this).next().val();
        $("#modal_delete_salary").modal("show");
        $("#btn_do_delete").attr("href", "<?php echo site_url('admin/salary/delete_from_employee'); ?>/" + salary_id + "/" + employee_id);
    });

	<?php if ($show_modal): ?>
        $("#modal_add_salary").modal("show");
        <?php if (isset($error_messages['name'])): ?>
            $("#modal_add_salary #inputName").parent().parent().addClass("has-error");
            $("#modal_add_salary #inputName").parent().after('<div><br/><br/>'+
                '<label class="col-sm-3 control-label"></label>'+
                '<div class="col-sm-8">'+
                    '<p class="help-block error-text"><small><?php echo $error_messages['name']; ?></small></p>'+
                '</div></div>');
        <?php endif; ?>
        <?php if (isset($error_messages['amount'])): ?>
            $("#modal_add_salary #inputAmount").parent().parent().addClass("has-error");
            $("#modal_add_salary #inputAmount").parent().after('<div><br/><br/>'+
                '<label class="col-sm-3 control-label"></label>'+
                '<div class="col-sm-8">'+
                    '<p class="help-block error-text"><small><?php echo $error_messages['amount']; ?></small></p>'+
                '</div></div>');
        <?php endif; ?>

        $("#modal_add_salary #inputName").val("<?php echo $fields['name']; ?>");
        $("#modal_add_salary #inputAmount").val("<?php echo $fields['amount']; ?>");
        $("#modal_add_salary #inputPaid").select2("val", "<?php echo $fields['paid']; ?>");
        $("#modal_add_salary #inputCurrency").select2("val", "<?php echo $fields['currency']; ?>");
        $("#modal_add_salary #inputNote").val("<?php echo $fields['note']; ?>");
    <?php endif; ?>
});
</script>