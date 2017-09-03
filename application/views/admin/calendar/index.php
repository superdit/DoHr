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
                            <a type="button" class="btn btn-default btn-sm active"><i class="fa fa-calendar"></i></a>
                            <a type="button" href="<?php echo site_url('admin/calendar/listview'); ?>" class="btn btn-default btn-sm"><i class="fa fa-bars"></i></a>
                        </div>                            
                    </h3>
                </div>
            </div><!-- /. box -->

            <div class="box box-solid">
                 <div class="box-header margin-bottom-10">
                </div>
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendarx"></div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div><!-- /.col -->
        <div class="col-md-1"></div>
    </div><!-- /.row -->
</section>

<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />

<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.min.js" type="text/javascript"></script> -->

<link href="<?php echo base_url(); ?>assets/themes/js/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"></link>
<!-- <link href="<?php echo base_url(); ?>assets/themes/js/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet"></link> -->

<script src="<?php echo base_url(); ?>assets/themes/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<!-- Page specific script -->
<script type="text/javascript">
    
    $(function() {

        <?php if ( $this->session->flashdata('event_created') !== NULL) : ?>
        setTimeout(function() {
            generateNoty('success', 'Event "<?php echo $this->session->flashdata('event_created'); ?>" created.');
        }, 100);
        <?php endif; ?>

        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendarx').fullCalendar({
            eventClick: function(calEvent, jsEvent, view) {

                $("#modal_edit_event").modal("show");
                $("#modal_edit_event #inputName").val(calEvent.title);

                if (calEvent.allDay) {
                    $("#modal_edit_event #inputAllDay").attr('checked', 'checked');
                    $("#modal_edit_event .icheckbox_minimal").addClass('checked');
                } else {
                    $("#modal_edit_event #inputAllDay").removeAttr('checked');
                    $("#modal_edit_event .icheckbox_minimal").removeClass('checked');
                }

                $("#modal_edit_event #inputLocation").val(calEvent.location);
                $("#modal_edit_event #inputType").val(calEvent.type);
                $("#modal_edit_event #inputNote").val(calEvent.note);
                
                $("#inputFromDateedit").val(calEvent.start._i);
                $("#inputToDateedit").val(calEvent.end._i);
                $("#inputIdEdit").val(calEvent.id);

                $("#btn_delete_event").attr("href", "<?php echo site_url('admin/calendar/delete_event'); ?>/" + calEvent.id);

                console.log(calEvent, calEvent.start._i, jsEvent, view);

            },
            viewRender: function (view, element) {
                var title = view.title.split(" ");

                setTimeout(function() {
                    $("#calendarx").fullCalendar('removeEventSource', '<?php echo site_url('admin/calendar/get_this_year_event'); ?>/' + title[1]);
                    $("#calendarx").fullCalendar('addEventSource', '<?php echo site_url('admin/calendar/get_this_year_event'); ?>/' + title[1]);
                }, 300);
            },
            events: '<?php echo site_url('admin/calendar/get_this_year_event'); ?>/<?php echo date('Y'); ?>'
           
        });
    });
</script>