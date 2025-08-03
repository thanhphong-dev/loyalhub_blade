import { submitAjaxForm } from "../../helpers/ajax-helper.js";

$(document).ready(function () {
    $("#create-customer-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#create-customer-form",
            modalSelector: "#create-customer",
            reload: true,
        });
    });

    $(".btn-edit-customer").on("click", function (e) {
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
        $("#update-customer").modal("show");
    });

    $("#update-customer-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#update-customer-form",
            modalSelector: "#update-customer",
            reload: true,
        });
    });

    $(".delete-customer").on("click", function () {
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

    $("#customer-logo").on("change", function (event) {
        const file = event.target.files[0];
        const preview = $("#edit-logo");

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});
