<!-- Modal Approval -->
<div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="myModalApproveLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalApproveLabel">Timeoff Approval</h4>
      </div>
      <div class="modal-body">
        <center><h4>Approve this employee timeoff?</h4></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-approve-to">Approve</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reject -->
<div class="modal fade" id="modalReject" tabindex="-1" role="dialog" aria-labelledby="myModalRejectLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalRejectLabel">Timeoff Approval</h4>
      </div>
      <div class="modal-body">
        <h4>Reject Reason</h4>
        <textarea class="form-control" rows="5" id="text_reject_reason"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-reject-to">Reject</button>
      </div>
    </div>
  </div>
</div>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Notification
        <small>Index</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Notification</li>
    </ol>
</section>

<section class="content">

    <div class="row">
        <div class="col-xs-2"></div>

        <div class="col-xs-8">
            <!-- Default box -->
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">
                        Time Off Request
                    </h3>
                    <div class="box-tools pull-right"></div>
                </div>
                <div class="box-body" id="body-notif">

                    <?php if (count($notif) == 0): ?>

                    <div class="callout callout-info">
                        <h4>No time off request yet!</h4>
                    </div>
                    
                    <?php else: ?>

                    <table class="table table-no-border table-hover table-valing-middle" id="table-notif">
                        <tr>
                            <th width="15%" class="th-border-bottom-5">Employee</th>
                            <th width="35%" class="th-border-bottom-5">Reason</th>
                            <th width="15%" class="th-border-bottom-5">From</th>
                            <th width="15%" class="th-border-bottom-5">To</th>
                            <th width="20%" class="th-border-bottom-5"></th>
                        </tr>
                        <?php foreach ($notif as $n): ?>
                        <?php
                        $date_from = new DateTime($n->from_date); 
                        $date_to = new DateTime($n->to_date); 
                        ?>
                        <tr id="tr_<?php echo $n->id; ?>">
                            <td><a href="<?php echo site_url('employee/employment/'.$n->emp_number); ?>"><?php echo $n->nick_name; ?></a></td>
                            <td><?php echo $n->reason; ?></td>
                            <td><?php echo $date_from->format('d M, Y'); ?></td>
                            <td><?php echo $date_to->format('d M, Y'); ?></td>
                            <td class="text-right">
                                <a href="" class="btn btn-default btn-sm btn-reject" id="to_id_<?php echo $n->id; ?>" data-toggle="modal" data-target="#modalReject">Reject</a>
                                <a href="" class="btn btn-default btn-sm btn-approve" id="to_id_app_<?php echo $n->id; ?>" data-toggle="modal" data-target="#modalApprove">Approve</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <?php endif; ?>
                    
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div>

        <div class="col-xs-2"></div>
    </div>
</section>

<script>

var id;
var no_notif_string = '<div class="callout callout-info"><h4>No time off request yet!</h4></div>';

$(function() {    

    $(".btn-reject").click(function(e) {
        e.preventDefault();

        id = $(this).attr("id").replace("to_id_", "");
    });

    $(".btn-approve").click(function(e) {
        e.preventDefault();

        id = $(this).attr("id").replace("to_id_app_", "");
    });

    $("#btn-reject-to").click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/notif/ajax_reject_timeoff'); ?>",
            data: { id: id, reject_reason : $("#text_reject_reason").val() },
            success: function(callback) {
                $("#modalReject").modal("hide");
                generateNoty('success', 'Timeoff rejected');

                $("#tr_" + id).remove();
                
                $("#notif_count").html(parseInt($("#notif_count").html()) - 1);

                if ( $("#table-notif tr").length == 1 ) {
                    $("#table-notif").hide();
                    $("#body-notif").prepend(no_notif_string);
                }
            }
        });
    });

    $("#btn-approve-to").click(function() {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/notif/ajax_approve_timeoff'); ?>",
            data: { id: id },
            success: function(callback) {
                $("#modalApprove").modal("hide");
                generateNoty('success', 'Timeoff approved');

                $("#tr_" + id).remove();
                
                $("#notif_count").html(parseInt($("#notif_count").html()) - 1);

                if ( $("#table-notif tr").length == 1 ) {
                    $("#table-notif").hide();
                    $("#body-notif").prepend(no_notif_string);
                }
            }
        });
    });
});
</script>