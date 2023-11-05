// $(document).ready(function() {
//     $('#calendar').fullCalendar({
//         header: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'month,basicWeek,basicDay'
//         },
//         navLinks: true,
//         events: 'api/get_announcement_data.php'
        
//     });
// });


$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        navLinks: true,
        events: 'api/get_announcement_calendar.php'
    });
});