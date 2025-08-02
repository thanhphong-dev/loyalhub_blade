import { submitAjaxForm } from "../../helpers/ajax-helper.js";
$(document).ready(function(){
    $("#create-service-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#create-service-form",
            modalSelector: "#create-service",
            reload: true,
        });
    });

    $(".btn-edit-service").on("click", function(){
        const service = $(this).data("service");

        $("#edit-id").val(service.id);
        $("#edit-name").val(service.name);
        $("#edit-price").val(parseInt(service.price));
        $("#edit-status").val(service.status);
        $("#edit-category_id").val(service.category_id);
        $("#edit-description").val(service.description);

        $("#update-service").modal("show");
    });

    $("#update-service-form").on("submit", function(e){
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#update-service-form",
            modalSelector: "#update-service",
            reload:true,
        });
    });

    $(".delete-service").on("click", function () {
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
})
