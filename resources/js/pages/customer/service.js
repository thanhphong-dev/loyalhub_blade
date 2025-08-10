import { submitAjaxForm } from "../../helpers/ajax-helper.js";
import flatpickr from "flatpickr";
import { Vietnamese } from "flatpickr/dist/l10n/vn.js";

let startDatePicker, endDatePicker ;

$(document).ready(function () {
    startDatePicker = flatpickr("#start_date", {
        disableMobile: true,
        locale: Vietnamese,
    });

    endDatePicker = flatpickr("#end_date", {
        disableMobile: true,
        locale: Vietnamese,
    });

    $(".btn-edit-customer-service").on("click", function (e) {
        e.preventDefault();

        const customer = $(this).data("customer");
        const customerService = $(this).data("customer_service");
        console.log(customerService);

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
        $("#customer_service_id").val(customerService.id);
        $("#edit-status_payment").val(customerService.status_payment);
        $("#edit-total_paid").val(customerService.total_paid);

        if (startDatePicker)
            startDatePicker.setDate(customerService.start_date, true, "Y-m-d");
        if(endDatePicker)
            endDatePicker.setDate(customerService.end_date, true, "Y-m-d");


        $("#update-customer-service").modal("show");
    });

    $("#update-customer-service-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#update-customer-service-form",
            modalSelector: "#update-customer-service",
            reload: true,
        });
    });

    $(".delete-customer-service").on("click", function (e) {
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
