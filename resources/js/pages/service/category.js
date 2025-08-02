import { submitAjaxForm } from "../../helpers/ajax-helper.js";
$(document).ready(function () {
    $("#create-service-category-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#create-service-category-form",
            modalSelector: "#create-service-category",
            reload: true,
        });
    });

    $(".btn-edit-service-category").on("click", function () {
        const serviceCategory = $(this).data("service_category");

        $("#edit-id").val(serviceCategory.id);
        $("#edit-name").val(serviceCategory.name);
        $("#edit-description").val(serviceCategory.description);

        $("#update-service-category").modal("show");
    });

    $("#update-service-category-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#update-service-category-form",
            modalSelector: "#update-service-category",
            reload: true,
        });
    });

    $(".delete-service-category").on("click", function () {
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
