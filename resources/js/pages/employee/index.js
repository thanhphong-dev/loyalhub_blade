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
});
