import { submitAjaxForm } from "../../helpers/ajax-helper.js";
import flatpickr from "flatpickr";

let datePicker, startPicker, endPicker;

$(document).ready(function () {
    datePicker = flatpickr("#date", { disableMobile: true });
    startPicker = flatpickr("#start_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true,
    });
    endPicker = flatpickr("#end_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true,
    });

    $(".btn-edit-customer-appointment").on("click", function (e) {
        e.preventDefault();

        const customer = $(this).data("customer");
        const customerAppointment = $(this).data("customer_appoinment");
        console.log(customerAppointment);

        $("#customer_id").val(customer.id);
        $("#edit-fullname").val(customer.fullname);
        $("#edit-email").val(customer.email);
        $("#edit-address").val(customer.address);
        $("#edit-phone_number").val(customer.phone_number);
        $("#edit-website").val(customer.website);
        $("#edit-service_id").val(customer.service_id);
        $("#edit-source").val(customer.source);
        $("#edit-status").val(customer.status);
        $("#edit-assigned_staff_id").val(customer.assigned_staff_id);
        $("#edit-logo").attr(
            "src",
            customer.logo
                ? `/storage/${customer.logo}`
                : "/images/employee/avatar.png"
        );
        $("#edit-file").attr(
            "href",
            customer.file ? `/storage/${customer.file}` : "#"
        );

        $("#customer_appointment_id").val(customerAppointment.id);
        $("#edit-title").val(customerAppointment.title);

        if (startPicker)
            startPicker.setDate(customerAppointment.start_time, true, "H:i");
        if (endPicker)
            endPicker.setDate(customerAppointment.end_time, true, "H:i");
        if (datePicker)
            datePicker.setDate(customerAppointment.date, true, "Y-m-d");

        $("#update-customer-appointment").modal("show");
    });

    $("#update-customer-appointment-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#update-customer-appointment-form",
            modalSelector: "#update-customer-appointment",
            reload: true,
        });
    });

    $(".btn-create-customer-service").on("click", function(e) {
        e.preventDefault();

        const customer = $(this).data("customer");

        $("#edit-id").val(customer.id);
        $("#edit-fullname").val(customer.fullname);
        $("#edit-email").val(customer.email);
        $("#edit-address").val(customer.address);
        $("#edit-phone_number").val(customer.phone_number);
        $("#edit-website").val(customer.website);
        $("#edit-service_id").val(customer.service_id);
        $("#edit-source").val(customer.source);
        $("#edit-status").val(customer.status);
        $("#edit-user_create").val(customer.user_create);
        $("#edit-assigned_staff_id").val(customer.assigned_staff_id);
        $("#edit-logo").attr(
            "src",
            customer.logo
                ? `/storage/${customer.logo}`
                : "/images/employee/avatar.png"
        );
        $("#edit-file").attr("href", `/storage/${customer.file}`);
        $("#create-customer-service").modal("show");
    });

    $("#create-customer-service-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#create-customer-service-form",
            modalSelector: "#create-customer-service",
            reload: true,
        });
    });

    $(".delete-customer-booked").on("click", function () {
        const url = $(this).data("url");

        Swal.fire({
            title: getNotification,
            text: getConfirm,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: btnSubmit,
            cancelButtonText: btnCancel,
        }).then((willDelete) => {
            if (willDelete.value) {
                $.ajax({
                    url: url,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function () {
                        notyf.success(getMessSuccess);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },
                    error: function () {
                        notyf.error(getMessError);
                    },
                });
            }
        });
    });
});
