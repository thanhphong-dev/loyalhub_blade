import moment from "moment";
import * as FullCalendar from "@fullcalendar/core";

$(document).ready(function () {


    // get data customer appointment
    const fetchCustomerAppointments = () => {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "customer-appointment/get-all",
                type: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (responsive) {
                    if (responsive.status) {
                        resolve(responsive.data);
                    }
                },
                error: function () {
                    reject(getFailure);
                },
            });
        });
    };

    const getCustomersForAppointments = (appointmentId) => {
        $.ajax({
            url: `customer-appointment/get-customer/${ appointmentId }`,
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (responsive) {
                if (responsive.status) {
                    resolve(responsive.data);
                }
            },
            error: function () {
                reject(getFailure);
            },
        });
    };


    var calendarEl = document.getElementById("calendar2");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "prev,next",
            center: "title",
            right: "today",
        },
        defaultView: "month",
        navLinks: true,
        businessHours: true,
        editable: true,
        selectable: true,
        selectMirror: true,
        droppable: true,

        select: function (arg) {

            //show modal
            const modalEl = document.getElementById('customer-appointment');
            const modal = new bootstrap.Modal(modalEl);
            modal.show();

            calendar.unselect();
        },
        eventClick: function (arg) {
            console.log("click");
        },

        editable: true,
        dayMaxEvents: true,
        eventSources: [],
    });
    calendar.render();
});
