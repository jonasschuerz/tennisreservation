var popUpEvent;
$(function () {
    var calendarReservation = $('#calendarReservation');
    calendarReservation.fullCalendar({
        locale: 'de',
        height: 500,
        windowResizeDelay: 0,
        allDaySlot: false,
        minTime: "00:00:00",
        maxTime: "23:59:00",
        timeFormat: 'HH:mm',
        eventLimit: true,
        defaultView: $(window).width() < 768 ? 'listMonth' : 'month',
        header: $(window).width() < 768 ? { left: 'today', center: false, right: 'prev,next'} :
            { center: 'month,agendaWeek,listMonth' },
        events: {
                url: 'Back-End/refreshReservation.php',
                type: 'POST',
                data: {},
                error: function () {
                    $.growl.error({message: "Reservierungen konnten nicht geladen werden", size: "large", duration: 4500});
                },
                editable: true,
                color: 'white',
                textColor: 'grey'
        },
        views:
            {
            month: {
                titleFormat: 'MMMM D YYYY'
            },
            agenda: {
                eventLimit: 5
            }
        },
        eventClick: function (event, jsEvent, view) {
            popUpEvent = event;
            var start = $('#startPopup').datepicker().data('datepicker');
            var end = $('#endPopup').datepicker().data('datepicker');
            var date = $('#datePopup').datepicker().data('datepicker');
            start.selectDate(new Date(0,0,0,popUpEvent.start._i.substring(11,13),popUpEvent.start._i.substr(14,2),0));
            end.selectDate(new Date(0,0,0,popUpEvent.end._i.substring(11,13),popUpEvent.end._i.substr(14,2),0));
            var year = popUpEvent.start._i.substring(0,4);
            var month = popUpEvent.start._i.substring(5,7);
            var day = popUpEvent.start._i.substring(8,10);
            date.selectDate(new Date(year, month-1, day));
            $('#placePopup').value = popUpEvent.title;
            $("#popup").addClass("is-active");
        },
        windowResize: function() {
            var ww = $(window).width();
            var view = (ww <= 767) ? 'listMonth' : 'month';
            var currentView = calendarReservation.fullCalendar('getView');
            if(view != currentView){
                calendarReservation.fullCalendar('changeView',view);
            }
            if(ww <= 768){
                calendarReservation.fullCalendar('option', 'header', { left: 'today', center: false, right: 'prev,next'})
            }else{
                calendarReservation.fullCalendar('option', 'header', {center: 'month,agendaWeek,listMonth'} )
            }
        }
    });
    $('#addReservation').on('click', function () {
        var registration = {
            date: $('#date').val(),
            startTime: $('#startTime').val(),
            endTime: $('#endTime').val(),
            place: $('#place').val(),
        }
        $('#addReservation').addClass('is-loading');
        $.ajax({
            type: "Post",
            url: "Back-End/addReservation.php",
            data: registration,
            success: function (value) {
                $('#calendarReservation').fullCalendar('refetchEvents');
                value = JSON.parse(value);
                if(value['error'] === true){
                    $.growl.error({message: value['description'], size: "large", duration: 4500});
                }
                else if(value['error'] === "false") {
                    $.growl.notice({title: "Erfolgreich",message: value['description'],style: "notice", size: "large",duration: 4500 });
                }
                $('#addReservation').removeClass('is-loading');
            }
        })
    })
    $( "#cancelPopup" ).on( "click", function() {
        $("#popup").removeClass("is-active");
    });
    $( "#deletePopup" ).on( "click", function() {
        $('#calendarReservation').fullCalendar('removeEvents',popUpEvent._id);
        updateData();
        $("#popup").removeClass("is-active");
    });
    $( "#savePopup" ).on( "click", function() {
        var date = $("#datePopup").val().replace(/\./g , "-");
        var year = date.substring(6,10);
        var month = date.substring(3,5);
        var day = date.substring(0,2);
        date = year + "-" + month + "-" + day;
        var start =  date + $("#startPopup").val().substr(1)+":00";
        var end = date +  $("#endPopup").val().substr(1)+":00";
        popUpEvent.start = start;
        popUpEvent.end = end;
        $('#calendarReservation').fullCalendar('updateEvent', popUpEvent);
        updateData();
        $("#popup").removeClass("is-active");
    });
});


function updateData() {
    var data = $('#calendarReservation').fullCalendar('clientEvents');
    var events = [];
    for(var i=0; data.length > i; i++){
        events.push({'id': data[i].id, 'place': data[i].title, 'start': data[i].start.format("DD-MM-YYYY HH:mm:SS"), 'end': data[i].end.format("DD-MM-YYYY HH:mm:SS")})
    }
    var jsonString = JSON.stringify(events);
    $.ajax({
        type: "Post",
        url: "Back-End/updatereservation.php",
        data: {data : jsonString},
        success: function (value) {
            $('#calendarReservation').fullCalendar('refetchEvents');
            value = JSON.parse(value);
            if(value['error'] === true){
                $.growl.error({message: value['description'], size: "large", duration: 4500});
            }
            else if(value['error'] === false) {
                $.growl({title: "Erfolgreich",message: value['description'],style: "notice", size: "large",duration: 4500 });
            }
        }
    })
}
