<!-- Modal Delete Business Trip -->
<div class="modal fade" id="modal_delete_btrip" tabindex="-1" role="dialog" aria-labelledby="modal_delete_btrip_label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="modal_delete_btrip_label">Confirmation</h4>
			</div>
			<div class="modal-body text-center">
				<h4>Delete selected business trip ? <span id="timeoff_to_delete"><span> </h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="" id="link_delete_btrip" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>

<?php $tab = $this->session->flashdata('tab'); ?>
<?php if (!is_null($tab) && $tab == 'btrip' && !$this->session->flashdata('notif')) : ?>
    <div class="alert alert-success alert-dismissable margin-top-20">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Success!</b> business trip schedule deleted.
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('notif') && $this->session->flashdata('notif') == 'add_btrip_success') : ?>
<div class="alert alert-success alert-dismissable margin-top-20">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <b>Success!</b> new business trip created.
</div>
<?php endif; ?>

<?php if (count($btrips) > 0): ?>
<table class="table table-hover valign-middle">
    <tr>
        <th width="20%" class="th-border-bottom-5">Destination</th>
        <th class="th-border-bottom-5">Depart - Return</th>
        <th width="12%" class="th-border-bottom-5">Cost</th>
        <th width="10%" class="th-border-bottom-5"></th>
    </tr>
    <?php foreach($btrips as $btrip): ?>
    <tr>
        <td id="btrip_name_<?php echo $btrip->id; ?>"><?php echo $btrip->destination; ?></td>
        <td id="btrip_from_to_<?php echo $btrip->id; ?>">
        	<?php echo date_format(date_create($btrip->depart_date), 'F d, Y H:i'); ?> - <?php echo date_format(date_create($btrip->return_date), 'F d, Y H:i'); ?>
        </td>
        <td id="btrip_status_<?php echo $btrip->id; ?>">
        	<?php echo $btrip->cost; ?>
        </td>
        <td class="text-center">
        	<a href="" class="btn btn-sm btn-primary btn-edit-btrip" id="btrip_edit_<?php echo $btrip->id; ?>" data-toggle="modal" data-target="#modal_edit_btrip"><i class="fa fa-pencil-square-o"></i></a>
        	<a href="" class="btn btn-sm btn-danger btn-delete-btrip" id="btrip_delete_<?php echo $btrip->id; ?>" data-toggle="modal" data-target="#modal_delete_btrip"><i class="fa fa-trash-o"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
$(function() {
    $(".btn-delete-btrip").click(function() {
        var btrip_id = $(this).attr("id").replace("btrip_delete_", "");
        $("#link_delete_btrip").attr("href", "<?php echo site_url('admin/schedule/delete'); ?>/" + btrip_id + '/btrip');
    });
});
</script>

<?php else: ?>
<div class="callout callout-info">
    <h4 class="text-center">No bussiness trip added yet ....</h4>
    <p class="text-center">
        <a class="btn btn-info btn-lg font-300" data-toggle="modal" data-target="#modal_add_btrip" data-backdrop="static" href="#">Create New Business Trip</a>
    </p>
</div>
<?php endif;?>