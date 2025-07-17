import { submitAjaxForm } from "../../helpers/ajax-helper.js";
$(document).ready(function () {
    $('#create-role-form').on('submit', function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: '#create-role-form',
            modalSelector: '#create-role',
            reload: true,
        });
    });

    $(".btn-edit-role").on("click", function () {
        const role = $(this).data("role"); // lấy JSON string
        console.log("role:", role);
        console.log("role id:", role.name);
        $("#edit-id").val(role.id);
        $("#edit-name").val(role.name);
        $("#edit-description").val(role.description);

        $("#update-role").modal("show");
    });
});
