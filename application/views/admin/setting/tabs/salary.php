<!-- Modal Create Country -->
<div class="modal fade" id="modal_create_salary" tabindex="-1" role="dialog" aria-labelledby="modal_create_salary_label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form method="post" action="<?php echo site_url('admin/salary/create'); ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="modal_create_salary_label">Add New Salary</h4>
				</div>
				<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="inputName" class="col-sm-4 control-label">Name</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputName" name="name" value="<?php if (isset($fields["name"])) echo $fields["name"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAmount" class="col-sm-4 control-label">Amount</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputAmount" name="amount" value="<?php if (isset($fields["amount"])) echo $fields["amount"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPaid" class="col-sm-4 control-label">Paid</label>
						<div class="col-sm-6">
							<select class="form-control" id="inputPaid" name="paid">
								<option value="yearly">yearly</option>
								<option value="monthly">monthly</option>
								<option value="weekly">weekly</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputNote" class="col-sm-4 control-label">Note</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="5" id="inputNote" name="note"><?php if (isset($fields["note"])) echo $fields["note"]; ?></textarea>
						</div>
					</div>
				</div>   
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="btn_create_country_close">Close</button>
					<input type="submit" class="btn btn-primary" value="Save changes" name="btn_submit"/>
				</div>

			</form>
		</div>
	</div>
</div>

<!-- Modal Edit Salary -->
<div class="modal fade" id="modal_edit_salary" tabindex="-1" role="dialog" aria-labelledby="modal_edit_salary_label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form method="post" action="<?php echo site_url('admin/salary/edit'); ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="modal_edit_salary_label">Edit Salary</h4>
				</div>
				<div class="modal-body">
				<div class="form-horizontal">
					<input type="hidden" name="id" id="inputId"/>
					<input type="hidden" name="name2" id="inputName2"/>
					<div class="form-group">
						<label for="inputName" class="col-sm-4 control-label">Name</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputName" name="name" value="<?php if (isset($fields["name"])) echo $fields["name"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAmount" class="col-sm-4 control-label">Amount</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputAmount" name="amount" value="<?php if (isset($fields["amount"])) echo $fields["amount"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNote" class="col-sm-4 control-label">Note</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="5" id="inputNote" name="note"><?php if (isset($fields["note"])) echo $fields["note"]; ?></textarea>
						</div>
					</div>
				</div>   
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="btn_edit_country_close">Close</button>
					<input type="submit" class="btn btn-primary" value="Save changes" name="btn_submit"/>
				</div>

			</form>
		</div>
	</div>
</div>

<!-- Modal Delete Salary -->
<div class="modal fade" id="modal_delete_salary" tabindex="-1" role="dialog" aria-labelledby="modal_delete_salary_label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="modal_delete_salary_label">Confirmation</h4>
			</div>
			<div class="modal-body text-center">
				<h4>Delete <span id="salary_to_delete"><span> </h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="" id="link_delete_salary" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>

<?php
	$tab = $this->session->flashdata('tab'); 
	$action = $this->session->flashdata('action'); 
	$show_modal = $this->session->flashdata('show_modal'); 
	if (!is_null($show_modal)) {
		$fields = $this->session->flashdata('fields');
		$error_messages = $this->session->flashdata('errors');
	}
?>

<?php if (!is_null($action) && is_null($show_modal) && $tab == 'salary'): ?>
<div class="alert alert-success alert-dismissable margin-top-20">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <b>Success!</b> salary <?php if ($action == 'add') :?>added<?php elseif ($action == 'edit') : ?>updated<?php elseif ($action == 'delete') : ?>deleted<?php endif; ?>.
</div>
<?php endif; ?>

<div class="margin-bottom-10">	
	<button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal_create_salary"><i class="fa fa-plus"></i> &nbsp;Add New Salary</button>
</div>

<table class="table table-hover table-bordered valign-middle">
    <tr>
        <th width="20%">Name</th>
        <th width="10%">Amount</th>
        <th width="60%">Note</th>
        <th></th>
    </tr>
    <?php foreach($salaries as $salary): ?>
    <tr>
        <td id="salary_name_<?php echo $salary->id; ?>"><?php echo $salary->name; ?></td>
        <td id="salary_amount_<?php echo $salary->id; ?>"><?php echo $salary->amount; ?></td>
        <td id="salary_note_<?php echo $salary->id; ?>"><?php echo $salary->note; ?></td>
        <td class="text-center">
        	<a href="" class="btn btn-sm btn-primary btn-edit-salary" id="salary_edit_<?php echo $salary->id; ?>" data-toggle="modal" data-target="#modal_edit_salary"><i class="fa fa-pencil-square-o"></i></a>
        	<a href="" class="btn btn-sm btn-danger btn-delete-salary" id="salary_delete_<?php echo $salary->id; ?>" data-toggle="modal" data-target="#modal_delete_salary"><i class="fa fa-trash-o"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
$(function() {
	$(".btn-delete-salary").click(function() {
		var salary_id = $(this).attr("id").replace("salary_delete_", "");
		var salary_name = $("#salary_name_" + salary_id).text();
		$("#salary_to_delete").html("\"" + salary_name + "\" ?");
		$("#link_delete_salary").attr("href", "<?php echo site_url('admin/salary/delete'); ?>/" + salary_id);
	});

	$(".btn-edit-salary").click(function() {
		var salary_id = $(this).attr("id").replace("salary_edit_", "");
		$("#inputId").val(salary_id);
		$("#modal_edit_salary #inputName").val($("#salary_name_" + salary_id).text());
		$("#modal_edit_salary #inputName2").val($("#salary_name_" + salary_id).text());
		$("#modal_edit_salary #inputAmount").val($("#salary_amount_" + salary_id).text());
		$("#modal_edit_salary #inputNote").val($("#salary_note_" + salary_id).text());
	});

	$("#btn_create_country_close").click(function () {
		$("#modal_create_salary #inputName, #modal_create_salary #inputAmount").parent().parent().removeClass("has-error");
		$("#modal_create_salary #inputName, #modal_create_salary #inputAmount").parent().next().remove();
	});

	$("#btn_edit_country_close").click(function () {
		$("#modal_edit_salary #inputName, #modal_edit_salary #inputAmount").parent().parent().removeClass("has-error");
		$("#modal_edit_salary #inputName, #modal_edit_salary #inputAmount").parent().next().remove();
	});

	<?php if ($show_modal == 'create'): ?>
		$("#modal_create_salary").modal("show");
		<?php if (isset($error_messages['name'])): ?>
			$("#modal_create_salary #inputName").parent().parent().addClass("has-error");
			$("#modal_create_salary #inputName").parent().after('<div><br/><br/>'+
				'<label class="col-sm-4 control-label"></label>'+
				'<div class="col-sm-8">'+
					'<p class="help-block error-text"><small><?php echo $error_messages['name']; ?></small></p>'+
				'</div></div>');
		<?php endif; ?>
		<?php if (isset($error_messages['amount'])): ?>
			$("#modal_create_salary #inputAmount").parent().parent().addClass("has-error");
			$("#modal_create_salary #inputAmount").parent().after('<div><br/><br/>'+
				'<label class="col-sm-4 control-label"></label>'+
				'<div class="col-sm-8">'+
					'<p class="help-block error-text"><small><?php echo $error_messages['amount']; ?></small></p>'+
				'</div></div>');
		<?php endif; ?>

		$("#modal_create_salary #inputName").val("<?php echo $fields['name']; ?>");
		$("#modal_create_salary #inputAmount").val("<?php echo $fields['amount']; ?>");
		$("#modal_create_salary #inputNote").val("<?php echo $fields['note']; ?>"); 
	<?php endif; ?>

	<?php if ($show_modal == 'edit'): ?>
		$("#modal_edit_salary").modal("show");
		<?php if (isset($error_messages['name'])): ?>
			$("#modal_edit_salary #inputName").parent().parent().addClass("has-error");
			$("#modal_edit_salary #inputName").parent().after('<div><br/><br/>'+
				'<label class="col-sm-4 control-label"></label>'+
				'<div class="col-sm-8">'+
					'<p class="help-block error-text"><small><?php echo $error_messages['name']; ?></small></p>'+
				'</div></div>');
		<?php endif; ?>
		<?php if (isset($error_messages['amount'])): ?>
			$("#modal_edit_salary #inputAmount").parent().parent().addClass("has-error");
			$("#modal_edit_salary #inputAmount").parent().after('<div><br/><br/>'+
				'<label class="col-sm-4 control-label"></label>'+
				'<div class="col-sm-8">'+
					'<p class="help-block error-text"><small><?php echo $error_messages['amount']; ?></small></p>'+
				'</div></div>');
		<?php endif; ?>

		$("#modal_edit_salary #inputName").val("<?php echo $fields['name']; ?>");
		$("#modal_edit_salary #inputAmount").val("<?php echo $fields['amount']; ?>");
		$("#modal_edit_salary #inputNote").val("<?php echo $fields['note']; ?>"); 
	<?php endif; ?>
});
</script>