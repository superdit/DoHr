<!-- Modal Delete Timeoff -->
<div class="modal fade" id="modal_delete_toff" tabindex="-1" role="dialog" aria-labelledby="modal_delete_timeoff_label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="modal_delete_timeoff_label">Confirmation</h4>
			</div>
			<div class="modal-body text-center">
				<h4>Delete selected timeoff ? <span id="timeoff_to_delete"><span> </h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="" id="link_delete_timeoff" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>

<?php $tab = $this->session->flashdata('tab'); ?>
<?php if (!is_null($tab) && $tab == 'timeoff' && !$this->session->flashdata('notif')) : ?>
    <div class="alert alert-success alert-dismissable margin-top-20">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Success!</b> timeoff schedule deleted.
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('notif') && $this->session->flashdata('notif') == 'add_timeoff_success') : ?>
<div class="alert alert-success alert-dismissable margin-top-20">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <b>Success!</b> time off request created, please wait for the approval.
</div>
<?php endif; ?>

<div class="row">

    <div class="col-md-12 margin-top-10">
        <div class="col-md-4 nopadding">
            <?php if (!is_null($prev_year)) : ?>
            <a class="btn btn-default" href="<?php echo site_url('admin/employee/schedules/'.$emp->emp_number.'/'.$prev_year); ?>">
                <i class="fa fa-chevron-left"></i> &nbsp;&nbsp;<?php echo $prev_year; ?>
            </a>
            <?php endif; ?>
        </div>
        <div class="col-md-4 nopadding text-center">
            <h2 class="nopadding font-300 padding-top-5"> Year <?php echo $cur_year; ?> </h2>
        </div>
        <div class="col-md-4 nopadding">
            <?php if (!is_null($next_year)) : ?>
            <a class="btn btn-default pull-right" href="<?php echo site_url('admin/employee/schedules/'.$emp->emp_number.'/'.$next_year); ?>">
                <?php echo $next_year; ?> &nbsp;&nbsp;<i class="fa fa-chevron-right"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>

    <br/>
    <?php if (count($timeoff) > 0): ?>
    <div class="col-md-12 margin-top-20 stat-bar">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <br/>
            <div id="canvas-holder" style="width:80%">
                <canvas id="chart-area" width="100" height="100"/>
            </div>
        </div>
        <div class="col-md-6 timeoff-pie-legend" id="timeoff-pie-legend">
            <?php 
                if ($contract->type == 'full-time') 
                    $avail_timeoff = json_decode($contract->available_timeoff, TRUE)[$cur_year];
                else 
                    $avail_timeoff = $contract->available_timeoff;
              ?>
            <br/>

        </div>
    </div>

    <div class="col-md-12 margin-top-10">
        <table class="table table-hover valign-middle font-16px" id="table-toff">
            <tr>
                <th width="25%" class="th-border-bottom-5">Reason</th>
                <th width="20%" class="th-border-bottom-5 text-right">From</th>
                <th width="20%" class="th-border-bottom-5 text-right">To</th>
                <th width="20%" class="th-border-bottom-5 text-center">Status</th>
                <th width="15%" class="th-border-bottom-5"></th>
            </tr>
            <?php 
                $education = 0; 
                $family = 0; 
                $sick = 0; 
                $religion = 0; 
                $vacation = 0; 
                $other = 0;
            ?>
            <?php foreach($timeoff as $toff): ?>
            <?php
            if ($toff->status == "approved")
            {
                    switch($toff->reason)
                {
                    case 'Education': $education = $education + $toff->total_days; break;
                    case 'Family': $family = $family + $toff->total_days; break;
                    case 'Sick': $sick = $sick + $toff->total_days; break;
                    case 'Religion': $religion = $religion + $toff->total_days; break;
                    case 'Vacation': $vacation = $vacation + $toff->total_days; break;
                    case 'Other': $other = $other + $toff->total_days; break;
                }
            }
            ?>
            <tr id="tr_toff_<?php echo $toff->id; ?>" class="tr-hover">
                <td id="toff_name_<?php echo $toff->id; ?>" class="font-300"><?php echo $toff->reason; ?></td>
                <td id="toff_from_to_<?php echo $toff->id; ?>" class="font-300">
                	<div class="pull-right"><?php echo date_format(date_create($toff->from_date), 'D M d, Y'); ?></div>
                </td>
                <td class="font-300">
                    <div class="pull-right"><?php echo date_format(date_create($toff->to_date), 'D M d, Y'); ?></div>
                </td>
                <td id="toff_status_<?php echo $toff->id; ?>" class="text-center">
                    <?php 
                        $label_style = '';
                        if ($toff->status == 'waiting approval') {
                            $label_style = 'label-default';
                        } else if ($toff->status == 'rejected') {
                            $label_style = 'label-danger';
                        } else {
                            $label_style = 'label-success';
                        }
                    ?>
                	<small class="label <?php echo $label_style; ?>"><?php echo $toff->status; ?></small>
                </td>
                <td class="text-center">
                    <div>
                        <div class="display-none" id="box_btn_<?php echo $toff->id; ?>">
                        <?php if ($toff->status == "waiting approval"): ?>
                    	   <a href="#" title="Cancel Time Off Request" class="btn-xs btn-danger btn-delete-toff pull-right" id="toff_delete_<?php echo $toff->id; ?>" data-toggle="modal" data-target="#modal_delete_toff"><i class="fa fa-trash-o"></i></a>
                        <?php else : ?>
                            <a href="#" class="btn-xs btn-default pull-right" id="toff_view_<?php echo $toff->id; ?>" data-toggle="modal" data-target="#"><i class="fa fa-external-link"></i></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <input type="hidden" id="count_education" value="<?php echo $education; ?>"/>
        <input type="hidden" id="count_family" value="<?php echo $family; ?>"/>
        <input type="hidden" id="count_vacation" value="<?php echo $vacation; ?>"/>
        <input type="hidden" id="count_sick" value="<?php echo $sick; ?>"/>
        <input type="hidden" id="count_religion" value="<?php echo $religion; ?>"/>
        <input type="hidden" id="count_other" value="<?php echo $other; ?>"/>

        <script src="<?php echo base_url(); ?>assets/themes/js/plugins/Chart.js/Chart.min.js"></script>

        <script>
        $("#sp_education").html($("#count_education").val() + " day(s)");
        $("#sp_sick").html($("#count_sick").val() + " day(s)");
        $("#sp_family").html($("#count_family").val() + " day(s)");
        $("#sp_other").html($("#count_other").val() + " day(s)");
        $("#sp_vacation").html($("#count_vacation").val() + " day(s)");
        $("#sp_religion").html($("#count_religion").val() + " day(s)");

        if (parseInt($("#count_education").val()) == 0 && parseInt($("#count_sick").val()) == 0 && 
            parseInt($("#count_family").val()) == 0 && parseInt($("#count_other").val()) == 0 && 
            parseInt($("#count_vacation").val()) == 0 && parseInt($("#count_religion").val()) == 0) {
            $(".stat-bar").hide();
        }

        var $id = function(id){
                return document.getElementById(id);
            },
            helpers = Chart.helpers;

        var canvasPie = $id('chart-area');
        var timeoffPielegend = $id('timeoff-pie-legend');

        var pieData = [
                {
                    value: parseInt($("#count_vacation").val()),
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Vacation"
                },
                {
                    value: parseInt($("#count_sick").val()),
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Sick"
                },
                {
                    value: parseInt($("#count_family").val()),
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Family"
                },
                {
                    value: parseInt($("#count_education").val()),
                    color: "#949FB1",
                    highlight: "#A8B3C5",
                    label: "Education"
                },
                {
                    value: parseInt($("#count_religion").val()),
                    color: "#5cb85c",
                    highlight: "#5fb73f",
                    label: "Religion"
                },
                {
                    value: parseInt($("#count_other").val()),
                    color: "#e3e3e3",
                    highlight: "#f3f3f3",
                    label: "Other"
                }

            ];

            window.onload = function(){
                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myPie = new Chart(canvasPie.getContext('2d')).Pie(pieData, 
                    {
                        responsive : true, 
                        animationEasing : "easeOut",
                        animationSteps : 30,
                        segmentStrokeWidth : 4,
                        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
                        tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>"
                    }
                );

                var legendHolder = document.createElement('div');
                legendHolder.innerHTML = window.myPie.generateLegend();
                // Include a html legend template after the module doughnut itself
                helpers.each(legendHolder.firstChild.childNodes, function(legendNode, index){
                helpers.addEvent(legendNode, 'mouseover', function(){
                var activeSegment = window.myPie.segments[index];
                activeSegment.save();
                activeSegment.fillColor = activeSegment.highlightColor;
                window.myPie.showTooltip([activeSegment]);
                activeSegment.restore();
            });
        });
        helpers.addEvent(legendHolder.firstChild, 'mouseout', function(){
            window.myPie.draw();
        });
        
        timeoffPielegend.appendChild(legendHolder.firstChild);
            };

        $(function() {
            $(".btn-delete-toff").click(function() {
                var timeoff_id = $(this).attr("id").replace("toff_delete_", "");
                $("#link_delete_timeoff").attr("href", "<?php echo site_url('admin/schedule/delete'); ?>/" + timeoff_id + "/timeoff");
            });

            var id;

            $("#table-toff .tr-hover").mouseover(function() {
                id = $(this).attr("id").replace("tr_toff_", "");
                $("#box_btn_" + id).show();
            });

            $("#table-toff .tr-hover").mouseout(function() {
                $("#box_btn_" + id).hide();
            });
        });
        </script>
    </div>
    <?php else: ?>
    <br/>
    <br/>
    <div class="col-md-12">
        <div class="callout callout-info">
            <h4 class="text-center">No timeoff recorded ....</h4>
            <?php if (date('Y') == $cur_year): ?>
            <p class="text-center">
                <a class="btn btn-info btn-lg font-300" data-toggle="modal" data-target="#modal_add_timeoff" data-backdrop="static" href="#">Request New Time Off</a>
            </p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif;?>

</div>