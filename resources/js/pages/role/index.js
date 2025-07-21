import Swal from "sweetalert2";
import { submitAjaxForm } from "../../helpers/ajax-helper.js";
$(document).ready(function () {
    $("#create-role-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#create-role-form",
            modalSelector: "#create-role",
            reload: true,
        });
    });

    $(".btn-edit-role").on("click", function () {
        const role = $(this).data("role");

        $("#edit-id").val(role.id);
        $("#edit-name").val(role.name);
        $("#edit-description").val(role.description);

        $("#update-role-form").modal("show");
    });

    $("#update-role").on("submit", function (e) {
        e.preventDefault();

        submitAjaxForm({
            formSelector: "#update-role",
            modalSelector: "#update-role-form",
            reload: true,
        });
    });

    $(".delete-role").on("click", function () {
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
                    url: `roles/destroy/${id}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function () {
                        notyf.success(getMessSuccess);
                        setTimeout(() => {
                            window.location.href = "roles";
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
