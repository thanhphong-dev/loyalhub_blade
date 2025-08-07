import flatpickr from "flatpickr";

$(document).ready(function(){
    flatpickr("#date", {disableMobile: true});

    flatpickr("#start_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true
    });

    flatpickr("#end_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true
    });
});

