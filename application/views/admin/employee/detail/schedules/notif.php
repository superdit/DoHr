<?php if (count($notif) > 0): ?>
<table class="table table-hover valign-middle" id="table-notif">
    <tr>
    	<th width="4%" class="th-border-bottom-5"></th>
        <th width="80%" class="th-border-bottom-5">Messages</th>
        <th class="th-border-bottom-5"></th>
    </tr>
    <?php foreach($notif as $not): ?>
    <tr id="tr_not_<?php echo $not->id; ?>" class="tr-hover">
    	<td><input type="checkbox"/></td>
        <td id="not_name_<?php echo $not->id; ?>" class="font-300"><?php echo $not->message; ?></td>
        <td>
        	<div id="box_btn_notif_<?php echo $not->id; ?>" class="display-none">
        		<a href="" class="pull-right btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
        	</div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
$(function() {
    $(".btn-delete-toff").click(function() {
        var notif_id = $(this).attr("id").replace("toff_delete_", "");
        $("#link_delete_timeoff").attr("href", "<?php echo site_url('admin/schedule/delete'); ?>/" + timeoff_id + "/timeoff");
    });

    var id;

    $("#table-notif .tr-hover").mouseover(function() {
        id = $(this).attr("id").replace("tr_not_", "");
        $("#box_btn_notif_" + id).show();
    });

    $("#table-notif .tr-hover").mouseout(function() {
        $("#box_btn_notif_" + id).hide();
    });
});
</script>

<?php else: ?>
<div class="callout callout-info">
    <h4 class="text-center">No notification yet ....</h4>
</div>
<?php endif;?>