import { submitAjaxForm } from "../../helpers/ajax-helper.js";

$(document).ready(function () {

    function loadStatusCustomer(
        staffId,
        $statusSelect,
        selectedStatus,
        callback
    ) {
        $statusSelect
            .empty()
            .append('<option value="">-- Chọn trạng thái --</option>');
        if (staffId) {
            $.get(`/customers/assigned/${staffId}`, function (res) {
                res.data.forEach((st) => {
                    $statusSelect.append(
                        `<option value="${st.value}">${st.label}</option>`
                    );
                });

                if (selectedStatus != null) {
                    $statusSelect.val(String(selectedStatus));
                }

                if (typeof callback === "function") callback();
            });
        }
    }

    function loadCustomers(
        staffId,
        status,
        $cusSelect,
        selectedCustomers = [],
        taskId = null
    ) {
        $cusSelect.empty();
        if (staffId && status != null) {
            let url = `/customers/by-status/${staffId}/${status}`;
            if (taskId) {
                url += `/${taskId}`;
            }

            $.get(url, function (res) {
                res.data.forEach((c) => {
                    if (!selectedCustomers.includes(c.id)) {
                        $cusSelect.append(
                            `<option value="${c.id}">${c.fullname}</option>`
                        );
                    }
                });

                if (selectedCustomers.length) {
                    selectedCustomers.forEach((id) => {
                        if (
                            $cusSelect.find(`option[value="${id}"]`).length ===
                            0
                        ) {
                            $cusSelect.append(
                                `<option value="${id}" selected hidden>[Đã chọn] ${id}</option>`
                            );
                        }
                    });
                    $cusSelect.val(selectedCustomers).trigger("change");
                }
            });
        }
    }

    $("#create-tasks-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#create-tasks-form",
            modalSelector: "#create-tasks",
            reload: true,
        });
    });

    $("#assigned_staff_id").on("change", function () {
        let staffId = $(this).val();
        loadStatusCustomer(staffId, $("#status_customer"), null, () => {
            let status = $("#status_customer").val();
            if (status != null && status !== "") {
                loadCustomers(staffId, status, $("#customer_ids"), []);
            }
        });
    });

    $("#status_customer").on("change", function () {
        loadCustomers(
            $("#assigned_staff_id").val(),
            $(this).val(),
            $("#customer_ids"),
            []
        );
    });

    let firstStaffId = $("#assigned_staff_id option:first").val();
    if (firstStaffId) {
        $("#assigned_staff_id").val(firstStaffId).trigger("change");
    }

    $("#update-tasks-form").on("submit", function (e) {
        e.preventDefault();
        submitAjaxForm({
            formSelector: "#update-tasks-form",
            modalSelector: "#update-tasks",
            reload: true,
        });
    });

    $(".btn-edit-task").on("click", function () {
        const task = $(this).data("task");

        $("#edit-id").val(task.id);
        $("#edit-title").val(task.title);
        $("#edit-start_date").val(task.start_date);
        $("#edit-end_date").val(task.end_date);
        $("#edit-status").val(task.status);
        $("#edit-description").val(task.description);
        $("#edit-assigned_staff_id").val(task.assigned_staff_id);

        loadStatusCustomer(
            task.assigned_staff_id,
            $("#edit-status_customer"),
            task.status_customer,
            () => {
                if (task.status_customer != null) {
                    loadCustomers(
                        task.assigned_staff_id,
                        task.status_customer,
                        $("#edit-customer_ids"),
                        task.customer_ids,
                        task.id
                    );
                }
            }
        );

        $("#update-tasks").modal("show");
    });

    $("#edit-assigned_staff_id").on("change", function () {
        let staffId = $(this).val();
        loadStatusCustomer(staffId, $("#edit-status_customer"), null, () => {
            let status = $("#edit-status_customer").val();
            if (status != null && status !== "") {
                loadCustomers(staffId, status, $("#edit-customer_ids"), []);
            }
        });
    });

    $("#edit-status_customer").on("change", function () {
        loadCustomers(
            $("#edit-assigned_staff_id").val(),
            $(this).val(),
            $("#edit-customer_ids"),
            $("#edit-customer_ids").val() || []
        );
    });

    $(".delete-task").on("click", function () {
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
