import { submitAjaxForm } from "../../helpers/ajax-helper.js";

$(document).ready(function () {
    $("#create-permission-form").on("submit", function(e) {
        e.preventDefault();

        submitAjaxForm({
            formSelector: "#create-permission-form",
            modalSelector: "#create-permission",
            reload: true,
        });
    });

    $(".btn-edit-permission").on("click", function() {
        const permission = $(this).data("permission");
        $("#edit-id").val(permission.id);
        $("#edit-name").val(permission.name);
        $("#edit-slug").val(permission.slug);
        $("#edit-description").val(permission.description);

        $("#update-permission").modal("show");
    });

    $("#update-permission-form").on("submit", function(e) {
        e.preventDefault();

        submitAjaxForm({
            formSelector: "#update-permission-form",
            modalSelector: "#update-permission",
            reload: true,
        });
    });

    $(".delete-permission").on("click", function () {
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
