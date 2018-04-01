$(function () {
    var calendarReservation = $('#calendarReservation');
    calendarReservation.fullCalendar({
        locale: 'de',
        height: 500,
        windowResizeDelay: 0,
        allDaySlot: false,
        minTime: "00:00:00",
        maxTime: "23:59:00",
        eventLimit: true,
        defaultView: $(window).width() < 768 ? 'listMonth' : 'month',
        header: $(window).width() < 768 ? { left: 'today', center: false, right: 'prev,next'} :
            { center: 'month,agendaWeek,listMonth' },
        events:
            {
                url: 'Back-End/refreshReservation.php',
                type: 'POST',
                data: {},
                error: function () {
                    console.log("konnte nicht geladen werden");
                },
                editable: true,
                color: 'grey',
                textColor: 'white'
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
            console.log(event.id);
            window.alert("<?php echo base_url() ?>common/calendar/form_calendar");
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
            fromTime: $('#fromTime').val(),
            toTime: $('#toTime').val(),
            place: $('#place').val(),
        }
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
                else if(value['error'] === false) {
                    $.growl.notice({message: value['description'], size: "large",duration: 4500 });
                }
            }
        })
    })
});


function updateData() {
    var data = $('#calendarReservation').fullCalendar('clientEvents');
    var events = [];
    for(var i=0; data.length > i; i++){
        events.push({'id': data[i].id, 'place': data[i].title, 'start': data[i].start.format("YYYY-MM-DD HH:mm:SS"), 'end': data[i].end.format("YYYY-MM-DD HH:mm:SS")})
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
