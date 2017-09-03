<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">                    
        <li class="pull-left header"><i class="fa fa-clock-o"></i> Attendance History</li>
        <li>

        </li>
    </ul>

    <div class="tab-content">
		<div class="row">
			
	        <div class="col-md-12">
		        <div class="input-group">
		        	<div class="input-append  input-group date" id="dpMonths" data-date="07/2015" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
		        		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input class="span2 form-control" id="month-attend" size="16" type="text" value="07/2015" readonly="">
					</div>
				</div>    
	        </div>

	        <div class="col-md-12">
	        	<br/>
				<table class="table table-bordered valign-middle" id="tbl-attend">
					<thead>
						<tr>
					        <th width="25%"><small>DAY</small></th>
					        <th width="10%"><small>IN</small></th>
					        <th width="10%"><small>OUT</small></th>
					        <th width="10%"><small>TOTAL</small></th>
					        <th></th>
					    </tr>
					</thead>
				    <tbody>
				    </tbody>
				</table>
	        </div>

	    </div> <!-- /.row -->
    </div>
</div>

<style>
#tbl-attend thead tr th {
	background: #f3f3f3;
}
</style>

<script>
var attendDate = new Date();
var attendDateMonth = (attendDate.getMonth()).toString();
attendDateMonth = (attendDateMonth.length == 1) ? "0" + attendDateMonth : attendDateMonth;

$(function() {

	getAttendancePerMonth(attendDate.getFullYear() + "-" + attendDateMonth);

	function getAttendancePerMonth(dateMonth) {
		$("#tbl-attend tbody").empty();

		$.ajax({
			method: "POST",
			data: { employee_id: "<?php echo $emp->id; ?>", date: dateMonth },
			url: "<?php echo site_url('admin/employee/ajax_get_attendance'); ?>",
			success: function(callback) {
				var data = $.parseJSON(callback);
				var arrDay = "";
				var prevDate = "";
				var displayDate = 1;
				var rowSpan = 0;
				if (data.length > 0) {

					for (i = 0; i < data.length; i++) {
						if (i == 0) arrDay += data[i].clock_in;
						else arrDay += "|" + data[i].clock_in;
					}
					
					for (i = 0; i < data.length; i++) {

						var cin_day = data[i].clock_in.substring(8, 10);
						var cin_month = data[i].clock_in.substring(5, 7);
						var cin_year = data[i].clock_in.substring(0, 4);
						var cin_hour = data[i].clock_in.substring(11, 13);
						var cin_minute = data[i].clock_in.substring(14, 16);
						var cin_second = data[i].clock_in.substring(17, 19);

						var cin_obj = new Date(cin_year, cin_month - 1, cin_day, cin_hour, cin_minute, cin_second);

						var dateString = cin_year + "-" + cin_month + "-" +cin_day;

						var re = new RegExp(dateString, 'g');
						rowSpan = arrDay.match(re).length;

						if (prevDate == "")
							prevDate = dateString;
						else {
							if (prevDate == dateString)
								displayDate = 0;
							else {
								displayDate = 1;
								prevDate = dateString;
							}
						}

						var dayName = moment(cin_obj).format("dddd");  
						var monthName = moment(cin_obj).format("MMM");  

						var clock_out_print = "-";
						var clock_out_day = "<strong>" + dayName + "</strong>, " + cin_day + " " + monthName;

						var total_hours = "-";
						if (data[i].total_hours != "" && data[i].total_hours != "null" && data[i].total_hours != null)
							total_hours = data[i].total_hours;

						if (data[i].clock_out != "" && data[i].clock_out != null && data[i].clock_out != "null") 
							clock_out_print = data[i].clock_out.substring(11, data[i].clock_out.length - 3);

						row = "<tr>";

						if (displayDate == 1)
							row += "<td rowSpan=\"" + rowSpan + "\">" + clock_out_day + "</td>";

						row += "<td class=\"clock_color\">" + data[i].clock_in.substring(11, data[i].clock_in.length - 3) + "</td>" + 
							"<td class=\"clock_color\">" + clock_out_print + "</td>" +
							"<td><small><strong>" + total_hours + "</strong></small></td>" +
							"<td></td>" +
							"</tr>";
						$("#tbl-attend tbody").append(row);
					}

					$(".clock_color").css("color", "#a3a3a3");
				} else {
					row = "<tr><td colspan=\"5\">No data found</td></tr>";
					$("#tbl-attend tbody").append(row);
				}
			}
		});
	}

	var tempAttendDate = $('#month-attend').val();

	$('#dpMonths').datepicker( {
	    format: "mm/yyyy",
	    startView: "months", 
	    minViewMode: "months"
	}).on('changeDate', function(ev){
		$('#dpMonths').datepicker('hide');

		if ($('#month-attend').val() != "") {
	    	var dateAttend = $('#month-attend').val().split("/");

	    	getAttendancePerMonth(dateAttend[1] + "-" + dateAttend[0]);
	    	tempAttendDate = $('#month-attend').val();
	    } 
	    else $('#month-attend').val(tempAttendDate);
    });
});
</script>