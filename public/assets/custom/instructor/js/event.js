(function ($) {
    "use strict";

    $(document).on('click', '.eventView', function () {
        let id = $(this).data('id');
        let url = "event/view";
        let redirectUrl = url + "/" + id;
        window.location.replace(redirectUrl);
    });

    // get data
    document.addEventListener("DOMContentLoaded", function () {
        commonAjaxRequest('GET', $('#event-list-route').val(), getCalendarData, getCalendarData);

        function getCalendarData(response) {
            var data = [];
            for (let key in response) {
                if (response.hasOwnProperty(key)) {
                    data.push({
                        title: '<button class="eventView border-0 w-100 bg-transparent" type="button" data-id="' + response[key].encrypted_id + '">' + response[key].event_title.substring(0, 20) + '</button>',
                        start: response[key].date_time,
                    });
                }
            }
            calendarFunction(data);
        }

        // Define the calendarFunction
        function calendarFunction(data) {
            var calendarEl = document.getElementById("ctFullCalendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "today",
                    center: "prev,title,next",
                    right: "dayGridMonth,timeGridDay,timeGridWeek,listWeek",
                },
                buttonText: {
                    timeGridWeek: "Week",
                    dayGridMonth: "Month",
                    timeGridDay: "Day",
                    today: "Today",
                    listWeek: "List",
                },
                initialView: "dayGridMonth",
                allDaySlot: false,
                initialDate: new Date(),
                editable: true,
                selectable: true,
                height: 800,
                events: data,
                eventContent: function (info) {
                    return { html: info.event.title };
                },
            });
            calendar.render();
        }
    });

})(jQuery)
