import flatpickr from "flatpickr";
import { Vietnamese } from "flatpickr/dist/l10n/vn.js";

$(document).ready(function(){
    flatpickr("#start_date", {
        disableMobile: true,
        locale: Vietnamese
    });

    flatpickr("#end_date", {
        disableMobile: true,
        locale: Vietnamese
    });
});


