import flatpickr from "flatpickr";
import { Vietnamese } from "flatpickr/dist/l10n/vn.js";

$(document).ready(function(){
    flatpickr("#date", {
        disableMobile: true,
        locale: Vietnamese
    });

    flatpickr("#start_date", {
        disableMobile: true,
        locale: Vietnamese
    });

    flatpickr("#end_date", {
        disableMobile: true,
        locale: Vietnamese
    });

    flatpickr("#edit-start_date", {
        disableMobile: true,
        locale: Vietnamese
    });

    flatpickr("#edit-end_date", {
        disableMobile: true,
        locale: Vietnamese
    });

    flatpickr("#start_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true,
        locale: Vietnamese
    });

    flatpickr("#end_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true,
        locale: Vietnamese
    });
});

