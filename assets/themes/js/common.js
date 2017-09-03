function generateNoty(type, text)
{

    if (type == 'success') 
        text = '<div class="activity-item"> <i class="fa fa-check text-success"></i> <div class="activity"> ' + text + ' </div> </div>';

    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        layout      : 'topCenter',
        closeWith   : ['click'],
        theme       : 'relax',
        maxVisible  : 10,
        animation   : {
            open  : 'animated bounceInDown',
            close : 'animated bounceOutUp',
            easing: 'swing',
            speed : 500
        }
    });
}

function countDateTime(id, nowYear, nowMonth, nowDay, nowHours, nowMinutes, nowSeconds)
{
    var dateStr = nowYear + "/" + nowMonth + "/" + nowDay + " " + nowHours + ":" + nowMinutes + ":" + nowSeconds;
    var dateNowJS = new Date(dateStr);
    
    year = dateNowJS.getFullYear();
    month = dateNowJS.getMonth();
    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    d = dateNowJS.getDate();
    day = dateNowJS.getDay();
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    
    h = dateNowJS.getHours();
    if ( h < 10 ) h = "0"+h;
    
    m = dateNowJS.getMinutes();
    if ( m < 10 ) m = "0"+m;
    
    s = dateNowJS.getSeconds();
    if ( s < 10 ) s = "0"+s;

    result = ''+days[day]+', '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;

    $('#countDateTime').text(result);
    
    dateNowJS.setSeconds(dateNowJS.getSeconds() + 1);
    
    newYear = dateNowJS.getFullYear();
    newMonth = dateNowJS.getMonth() + 1;
    newDay = dateNowJS.getDate();
    newHours = dateNowJS.getHours();
    newMinutes = dateNowJS.getMinutes();    
    newSeconds = dateNowJS.getSeconds();

    setTimeout(function() {
        countDateTime(id, newYear, newMonth, newDay, newHours, newMinutes, newSeconds);
    }, '1000');
}

$(function() {

    $("#btn_clock_in").click(function() {
        $.ajax({
            url: BASE_URL + "admin/attend/check_last_clock_out",
            method: "POST",
            data: { logged_id : LOGGED_ID },
            success: function(data) {

                var last_check_out;

                if (data != 0)
                {
                    last_clock_out = jQuery.parseJSON(data);

                    swal({
                        title: "Clock in again, are you sure?",
                        text: "Your last clock out today on " + last_clock_out.clock_out.substring(11, last_clock_out.clock_out.length),
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#AEDEF4",
                        confirmButtonText: "Yes, Clock In",
                        cancelButtonText: "No, Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                    }, function ( isConfirm ) {
                        if ( isConfirm ) 
                        {
                            $.ajax({
                                url: BASE_URL + "admin/attend/add_clock_in",
                                method: "POST",
                                data: { logged_id : LOGGED_ID },
                                success: function(data) {
                                    $("#btn_clock_in").attr("disabled", "disabled");
                                    $("#btn_clock_out").removeAttr("disabled");
                                    swal("Success", "You are clocked in!", "success");
                                }
                            });
                        } 
                        else 
                        {
                            swal.close();
                        }
                    });
                }
                else 
                {
                    $.ajax({
                        url: BASE_URL + "admin/attend/add_clock_in",
                        method: "POST",
                        data: { logged_id : LOGGED_ID },
                        success: function(data) {
                            $("#btn_clock_in").attr("disabled", "disabled");
                            $("#btn_clock_out").removeAttr("disabled");
                            swal("Success", "You are clocked in!", "success");
                        }
                    });
                }
            }
        });
    });

    $("#btn_clock_out").click(function() {
        $.ajax({
            url: BASE_URL + "admin/attend/check_last_clock_in",
            method: "POST",
            data: { logged_id : LOGGED_ID },
            success: function(data) {
                var last_clock_in;

                if (data != 0)
                {
                    last_clock_in = jQuery.parseJSON(data);

                    swal({
                        title: "Clock out, are you sure?",
                        text: "Your last clock in today on " + last_clock_in.clock_in.substring(11, last_clock_in.clock_in.length),
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#AEDEF4",
                        confirmButtonText: "Yes, Clock Out",
                        cancelButtonText: "No, Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                    }, function ( isConfirm ) {
                        if ( isConfirm ) 
                        {
                            $.ajax({
                                url: BASE_URL + "admin/attend/add_clock_out",
                                method: "POST",
                                data: { attend_id : last_clock_in.id, logged_id : LOGGED_ID },
                                success: function(data) {
                                    $("#btn_clock_out").attr("disabled", "disabled");
                                    $("#btn_clock_in").removeAttr("disabled");
                                    swal("Success", "You are clocked out!", "success");
                                }
                            });
                        } 
                        else 
                        {
                            swal.close();                            
                        }
                    });
                }
                else 
                {
                    swal("Failed", "Your clock in not found)", "error");
                }
            }
        });
    });

});