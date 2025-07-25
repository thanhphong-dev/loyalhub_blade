import { submitAjaxForm } from "../../helpers/ajax-helper.js";

$(document).ready(function () {
    $("#create-employee-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#create-employee-form",
            modalSelector: "#create-employee",
            reload: true,
        });
    });

    $(".btn-edit-employee").on("click", function () {
        const employee = $(this).data("employee");

        $("#edit-id").val(employee.id);
        $("#edit-avatar_url").val(employee.avatar_url);
        $("#edit-frist_name").val(employee.frist_name);
        $("#edit-last_name").val(employee.last_name);
        $("#edit-phone_number").val(employee.phone_number);
        $("#edit-address").val(employee.address);
        $("#edit-email").val(employee.email);
        $("#edit-role_id").val(employee.role_id);
        $("#edit-avatar_url").attr("src", employee.avatar_url ? `/storage/${employee.avatar_url}` : "/images/employee/avatar.png");

        $("#update-employee").modal("show");
    });

    $("#update-employee-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#update-employee-form",
            modalSelector: "#update-employee",
            reload: true,
        });
    });

    $("#avatar_url").on("change", function (event) {
        const file = event.target.files[0];
        const preview = $("#edit-avatar_url");

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $(".delete-employee").on("click", function () {
        const id = $(this).data("id");
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
                    url: `employee/destroy/${id}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function () {
                        notyf.success(getMessSuccess);
                        setTimeout(() => {
                            window.location.href = "employees";
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
