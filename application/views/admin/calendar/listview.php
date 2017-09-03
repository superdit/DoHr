<?php $this->load->view('admin/calendar/event_modal'); ?>

<section class="content-header">
    <h1>
        Calendar
        <small>Company</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Calendar</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box box-solid">
                 <div class="box-header">
                    <h3 class="box-title">
                        <?php if ($this->session->userdata('logged_account_role') != 'Employee'): ?>
                        <button class="btn btn-sm btn-default pull-left" data-toggle="modal" data-target="#modal_add_event" id="btn_add"><i class="fa fa-plus"></i> Add Event</button>
                        <div class="pull-left">&nbsp;&nbsp;</div>
                        <?php endif; ?>
                        <div class="btn-group pull-left">
                            <a type="button" href="<?php echo site_url('admin/calendar'); ?>" class="btn btn-default btn-sm"><i class="fa fa-calendar"></i></a>
                            <a type="button" class="btn btn-default btn-sm active"><i class="fa fa-bars"></i></a>
                        </div>                    
                    </h3>
                </div>
            </div><!-- /. box -->

            <div class="box box-solid">
                <div class="box-header text-center">
                    <h3>
                        <div class="col-md-4">
                            <a href="<?php echo site_url('admin/calendar/listview/' . intval($year-1)); ?>" class="pull-left btn btn-default"><i class="fa fa-chevron-left"></i> &nbsp;Prev Year</a>
                        </div>
                        <div class="col-md-4 padding-top-5 font-300">
                            EVENT <?php echo $year; ?>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo site_url('admin/calendar/listview/' . intval($year+1)); ?>" class="pull-right btn btn-default">Next Year &nbsp;<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </h3>
                </div>
                <div class="box-body">

                    <?php if (count($events) == 0): ?>

                    <div class="callout callout-info margin-top-20">
                        <h4 class="text-center">No event created yet!</h4>
                    </div>
                    
                    <?php else: ?>

                    <table class="table table-no-border table-valing-middle table-hover" id="table-event">
                    <tr>
                        <th width="14%" class="th-border-bottom-5"></th>
                        <th width="8%" class="th-border-bottom-5"></th>
                        <th class="th-border-bottom-5">Event Name</th>
                        <th class="th-border-bottom-5" width="15%"></th>
                    </tr>
                    <?php foreach ($events as $event) : ?>
                    <?php 
                        $date_from = new DateTime($event->from_datetime); 
                        $date_to = new DateTime($event->to_datetime); 
                        switch ($event->type) {
                            case 'Holiday': $text_class = 'text-red'; break;
                            case 'Gathering': $text_class = 'text-green'; break;
                            case 'Other': $text_class = 'text-yellow'; break;
                            default: break;
                        }
                    ?>
                    <tr class="tr-hover" id="tr_event_<?php echo $event->id; ?>">
                        <td><h4 class="text-muted font-300"><?php echo strtoupper($date_from->format('F')); ?></h4></td>
                        <td><h4 class="<?php echo $text_class; ?> font-300"><?php echo strtoupper($date_from->format('d')); ?></h4></td>
                        <td><h4 class="font-300"><?php echo $event->name; ?></h4></td>
                        <td>
                            <button type="button" class="btn btn-default btn-xs pull-right display-none btn-view-event" id="btn_event_<?php echo $event->id; ?>">view &nbsp;<i class="fa fa-external-link-square"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </table>

                    <?php endif; ?>


                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div><!-- /.col -->
        <div class="col-md-1"></div>
    </div><!-- /.row -->
</section>

<script>
$(function() {
    var id;

    $("#table-event .tr-hover").mouseover(function() {
        id = $(this).attr("id").replace("tr_event_", "");
        $("#btn_event_" + id).show();
    });

    $("#table-event .tr-hover").mouseout(function() {
        $("#btn_event_" + id).hide();
    });

    $(".btn-view-event").click(function() {
        alert(34);
    });
});
</script>