$(function () {

    $('#calendarReservation').fullCalendar({
        locale: 'de',
        height: 'auto',
        minTime: "07:00:00",
        maxTime: "21:00:00",
        header: {
            center: 'month,agendaWeek',
        },

        views: {
            month: {
                // name of view
                titleFormat: 'MMMM D YYYY'
                // other view-specific options here
            }
        }
    })
});

