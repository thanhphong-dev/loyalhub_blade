(function () {
    "use strict";

    const startInput = document.getElementById("start_date");
    const endInput = document.getElementById("end_date");
    const renewedInput = document.getElementById("renewed_at");
    const newEndInput = document.getElementById("new_end_date");
    const parseDate = (str) => new Date(str + "T00:00:00");
    // Picker cho start_date
    const startDatePicker = flatpickr(startInput, {
        dateFormat: "Y-m-d",
        disableMobile: true,
        onChange: function (selectedDates, dateStr) {
            endDatePicker.set("minDate", dateStr);

            if (
                endInput.value &&
                new Date(dateStr) > new Date(endInput.value)
            ) {
                alert("Ngày bắt đầu không được lớn hơn ngày kết thúc!");
                startInput.value = "";
            }
        },
    });

    // Picker cho end_date
    const endDatePicker = flatpickr(endInput, {
        dateFormat: "Y-m-d",
        disableMobile: true,
        onChange: function (selectedDates, dateStr) {
            startDatePicker.set("maxDate", dateStr);

            if (
                startInput.value &&
                new Date(startInput.value) > new Date(dateStr)
            ) {
                alert("Ngày kết thúc không được nhỏ hơn ngày bắt đầu!");
                endInput.value = "";
            }
        },
    });

    // Picker cho renewed_at
    const renewedAtPicker = flatpickr(renewedInput, {
        dateFormat: "Y-m-d",
        disableMobile: true,
        clickOpens: false,
        defaultDate: new Date(),
        maxDate: new Date(),
    });

    // Picker cho new_end_date
    const getMaxExistingEndDate = (dates) => {
        return dates.reduce((max, curr) => {
            const d = parseDate(curr);
            return d > max ? d : max;
        }, new Date('1900-01-01'));
    };

    const maxExistingEndDate = getMaxExistingEndDate(existingEndDates);

    const newEndDatePicker = flatpickr(newEndInput, {
        dateFormat: "Y-m-d",
        disableMobile: true,
        onOpen: function () {
            const renewedDate = renewedInput.value;
            if (renewedDate) {
                this.set("minDate", renewedDate);
            }
        },
        disable: [
            function (date) {
                return date <= maxExistingEndDate;
            }
        ]
    });

    /* To choose date */
    flatpickr("#date", { disableMobile: true });

    /* To choose date and time */
    flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        disableMobile: true,
    });

    /* For Human Friendly dates */
    flatpickr("#humanfrienndlydate", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        disableMobile: true,
    });

    /* For Date Range Picker */
    flatpickr("#daterange", {
        mode: "range",
        dateFormat: "Y-m-d",
        disableMobile: true,
    });

    /* For Time Picker */
    flatpickr("#timepikcr", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true,
    });

    /* For Time Picker With 24hr Format */
    flatpickr("#timepickr1", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        disableMobile: true,
    });

    /* For Time Picker With Limits */
    flatpickr("#limittime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minTime: "16:00",
        maxTime: "22:30",
        disableMobile: true,
    });

    /* For DateTimePicker with Limited Time Range */
    flatpickr("#limitdatetime", {
        enableTime: true,
        minTime: "16:00",
        maxTime: "22:00",
        disableMobile: true,
    });

    /* For Inline Calendar */
    flatpickr("#inlinecalendar", {
        inline: true,
        disableMobile: true,
    });

    /* For Date Pickr With Week Numbers */
    flatpickr("#weeknum", {
        weekNumbers: true,
        disableMobile: true,
    });

    /* For Inline Time */
    flatpickr("#inlinetime", {
        inline: true,
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true,
    });

    /* For Preloading Time */
    flatpickr("#pretime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "13:45",
        disableMobile: true,
    });
})();
