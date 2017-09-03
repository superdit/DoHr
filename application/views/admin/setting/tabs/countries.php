<!-- Modal Create Country -->
<div class="modal fade" id="modal_create_country" tabindex="-1" role="dialog" aria-labelledby="modal_create_country_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="<?php echo site_url('admin/country/create'); ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="modal_create_country_label">Add New Country</h4>
				</div>
				<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="inputShortName" class="col-sm-3 control-label">Short Name</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputShortName" name="short_name" value="<?php if (isset($fields["short_name"])) echo $fields["short_name"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLongName" class="col-sm-3 control-label">Long Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputLongName" name="long_name" value="<?php if (isset($fields["long_name"])) echo $fields["long_name"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputCallingCode" class="col-sm-3 control-label">Calling Code</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputCallingCode" name="calling_code" value="<?php if (isset($fields["calling_code"])) echo $fields["calling_code"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputISO2" class="col-sm-3 control-label">ISO2</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputISO2" name="iso2" value="<?php if (isset($fields["iso2"])) echo $fields["iso2"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputISO3" class="col-sm-3 control-label">ISO3</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputISO3" name="iso3" value="<?php if (isset($fields["iso3"])) echo $fields["iso3"]; ?>">
						</div>
					</div>
					<div class="form-group">
	                    <label for="inputUNMember" class="col-sm-3 control-label">UN Member</label>
	                    <div class="col-sm-2">
	                        <select class="form-control" id="inputUNMember" name="un_member">
	                            <option value="yes">yes</option>
	                            <option value="no">no</option>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group">
						<label for="inputCCTLD" class="col-sm-3 control-label">CCTLD</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputCCTLD" name="cctld" value="<?php if (isset($fields["cctld"])) echo $fields["cctld"]; ?>">
						</div>
					</div>
					<div>&nbsp;</div>
				</div>   
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="modal_create_close">Close</button>
					<input type="submit" class="btn btn-primary" value="Save changes" name="btn_submit"/>
				</div>

			</form>
		</div>
	</div>
</div>

<!-- Modal Edit Country -->
<div class="modal fade" id="modal_edit_country" tabindex="-1" role="dialog" aria-labelledby="modal_edit_country_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="<?php echo site_url('admin/country/edit'); ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="modal_create_country_label">Edit Country</h4>
				</div>
				<div class="modal-body">
				<div class="form-horizontal">
					<input type="hidden" name="id" id="inputId"/>
					<input type="hidden" name="short_name2" id="inputShortName2"/>
					<div class="form-group">
						<label for="inputShortName" class="col-sm-3 control-label">Short Name</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputShortName" name="short_name" value="<?php if (isset($fields["short_name"])) echo $fields["short_name"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLongName" class="col-sm-3 control-label">Long Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputLongName" name="long_name" value="<?php if (isset($fields["long_name"])) echo $fields["long_name"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputCallingCode" class="col-sm-3 control-label">Calling Code</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputCallingCode" name="calling_code" value="<?php if (isset($fields["calling_code"])) echo $fields["calling_code"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputISO2" class="col-sm-3 control-label">ISO2</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputISO2" name="iso2" value="<?php if (isset($fields["iso2"])) echo $fields["iso2"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputISO3" class="col-sm-3 control-label">ISO3</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputISO3" name="iso3" value="<?php if (isset($fields["iso3"])) echo $fields["iso3"]; ?>">
						</div>
					</div>
					<div class="form-group">
	                    <label for="inputUNMember" class="col-sm-3 control-label">UN Member</label>
	                    <div class="col-sm-2">
	                        <select class="form-control" id="inputUNMember" name="un_member">
	                            <option value="yes">yes</option>
	                            <option value="no">no</option>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group">
						<label for="inputCCTLD" class="col-sm-3 control-label">CCTLD</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputCCTLD" name="cctld" value="<?php if (isset($fields["cctld"])) echo $fields["cctld"]; ?>">
						</div>
					</div>
					<div>&nbsp;</div>
				</div>   
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="modal_edit_close">Close</button>
					<input type="submit" class="btn btn-primary" value="Save changes" name="btn_submit"/>
				</div>

			</form>
		</div>
	</div>
</div>

<!-- Modal Delete Country -->
<div class="modal fade" id="modal_delete_country" tabindex="-1" role="dialog" aria-labelledby="modal_delete_country_label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="modal_delete_country_label">Confirmation</h4>
			</div>
			<div class="modal-body text-center">
				<h4>Delete <span id="country_to_delete"><span> </h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="" id="link_delete_country" class="btn btn-danger">Delete</a>
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

<?php if (!is_null($action) && is_null($show_modal) && $tab == 'country'): ?>
<div class="alert alert-success alert-dismissable margin-top-20">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <b>Success!</b> country <?php if ($action == 'add') :?>added<?php elseif ($action == 'edit') : ?>updated<?php elseif ($action == 'delete') : ?>deleted<?php endif; ?>.
</div>
<?php endif; ?>

<div class="margin-bottom-10">	
	<button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal_create_country"><i class="fa fa-plus"></i> &nbsp;Add New Country</button>
</div>

<table class="table table-hover table-bordered valign-middle">
    <tr>
        <th width="26%">Short Name</th>
        <th width="40%">Long Name</th>
        <th width="10%">Calling Code</th>
        <th width="7%">ISO2</th>
        <th width="7%">ISO3</th>
        <th></th>
    </tr>
    <?php foreach($countries as $country): ?>
    <tr>
        <td id="country_short_name_<?php echo $country->id; ?>"><?php echo $country->short_name; ?></td>
        <td id="country_long_name_<?php echo $country->id; ?>"><?php echo $country->long_name; ?></td>
        <td id="country_calling_code_<?php echo $country->id; ?>"><?php echo $country->calling_code; ?></td>
        <td id="country_iso2_<?php echo $country->id; ?>"><?php echo $country->iso2; ?></td>
        <td id="country_iso3_<?php echo $country->id; ?>"><?php echo $country->iso3; ?></td>
        <td class="text-center">
        	<input type="hidden" id="country_cctld_<?php echo $country->id; ?>" value="<?php echo $country->cctld; ?>"/>
        	<input type="hidden" id="country_un_member_<?php echo $country->id; ?>" value="<?php echo $country->un_member; ?>"/>
        	<a href="" class="btn btn-sm btn-primary btn-edit" id="country_edit_<?php echo $country->id; ?>" data-toggle="modal" data-target="#modal_edit_country"><i class="fa fa-pencil-square-o"></i></a>
        	<a href="" class="btn btn-sm btn-danger btn-delete" id="country_delete_<?php echo $country->id; ?>" data-toggle="modal" data-target="#modal_delete_country"><i class="fa fa-trash-o"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
$(function() {
	$(".btn-delete").click(function() {
		var country_id = $(this).attr("id").replace("country_delete_", "");
		var country_short_name_ = $("#country_short_name_" + country_id).text();
		$("#country_to_delete").html("\"" + country_short_name_ + "\" ?");
		$("#link_delete_country").attr("href", "<?php echo site_url('admin/country/delete'); ?>/" + country_id);
	});

	$(".btn-edit").click(function() {
		var country_id = $(this).attr("id").replace("country_edit_", "");
		$("#inputId").val(country_id);
		$("#modal_edit_country #inputShortName").val($("#country_short_name_" + country_id).text());
		$("#modal_edit_country #inputShortName2").val($("#country_short_name_" + country_id).text());
		$("#modal_edit_country #inputLongName").val($("#country_long_name_" + country_id).text());
		$("#modal_edit_country #inputCallingCode").val($("#country_calling_code_" + country_id).text());
		$("#modal_edit_country #inputISO2").val($("#country_iso2_" + country_id).text());
		$("#modal_edit_country #inputISO3").val($("#country_iso3_" + country_id).text());
		$("#modal_edit_country #inputUNMember").val($("#country_un_member_" + country_id).val());
		$("#modal_edit_country #inputCCTLD").val($("#country_cctld_" + country_id).val());
	});

	$("#modal_create_close").click(function () {
		$("#modal_create_country #inputShortName").parent().parent().removeClass("has-error");
		$("#modal_create_country #inputShortName").parent().next().remove();
	});

	$("#modal_edit_close").click(function () {
		$("#modal_edit_country #inputShortName").parent().parent().removeClass("has-error");
		$("#modal_edit_country #inputShortName").parent().next().remove();
	});

	<?php if ($show_modal == 'create'): ?>
		$("#modal_create_country").modal("show");
		<?php if (isset($error_messages['short_name'])): ?>
			$("#modal_create_country #inputShortName").parent().parent().addClass("has-error");
			$("#modal_create_country #inputShortName").parent().after('<div><br/><br/>'+
				'<label class="col-sm-3 control-label"></label>'+
				'<div class="col-sm-8">'+
					'<p class="help-block error-text"><small><?php echo $error_messages['short_name']; ?></small></p>'+
				'</div></div>');
		<?php endif; ?>

		$("#modal_create_country #inputShortName").val("<?php echo $fields['short_name']; ?>");
		$("#modal_create_country #inputLongName").val("<?php echo $fields['long_name']; ?>");
		$("#modal_create_country #inputCallingCode").val("<?php echo $fields['calling_code']; ?>"); $("#modal_create_country #inputISO2").val("<?php echo $fields['iso2']; ?>");
		$("#modal_create_country #inputISO3").val("<?php echo $fields['iso3']; ?>");
		$("#modal_create_country #inputUNMember").val("<?php echo $fields['un_member']; ?>");
		$("#modal_create_country #inputCCTLD").val("<?php echo $fields['cctld']; ?>");
	<?php endif; ?>

	<?php if ($show_modal == 'edit'): ?>
		$("#modal_edit_country").modal("show");
		<?php if (isset($error_messages['short_name'])): ?>
			$("#modal_edit_country #inputShortName").parent().parent().addClass("has-error");
			$("#modal_edit_country #inputShortName").parent().after('<div><br/><br/>'+
				'<label class="col-sm-3 control-label"></label>'+
				'<div class="col-sm-8">'+
					'<p class="help-block error-text"><small><?php echo $error_messages['short_name']; ?></small></p>'+
				'</div></div>');
		<?php endif; ?>

		$("#modal_edit_country #inputId").val("<?php echo $fields['id']; ?>");
		$("#modal_edit_country #inputShortName").val("<?php echo $fields['short_name']; ?>");
		$("#modal_edit_country #inputShortName2").val("<?php echo $fields['short_name']; ?>");
		$("#modal_edit_country #inputLongName").val("<?php echo $fields['long_name']; ?>");
		$("#modal_edit_country #inputCallingCode").val("<?php echo $fields['calling_code']; ?>");
		$("#modal_edit_country #inputISO2").val("<?php echo $fields['iso2']; ?>");
		$("#modal_edit_country #inputISO3").val("<?php echo $fields['iso3']; ?>");
		$("#modal_edit_country #inputUNMember").val("<?php echo $fields['un_member']; ?>");
		$("#modal_edit_country #inputCCTLD").val("<?php echo $fields['cctld']; ?>");
	<?php endif; ?>
});
</script>