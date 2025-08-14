$(document).ready(function () {
    // get status customer by staff
    $("#assigned_staff_id").on("change", function () {
        let staffId = $(this).val();
        $("#status_customer").empty().append('<option value="">-- Chọn trạng thái --</option>');
        $("#customer_ids").empty();

        if (staffId) {
            $.get(`/customers/assigned/${staffId}`, function (response) {
                response.data.forEach((status) => {
                    $("#status_customer").append(
                        `<option value="${status.value}">${status.label}</option>`
                    );
                });
            });
        }
    });

    // get customer by staff for status
    $("#status_customer").on("change", function () {
        let staffId = $("#assigned_staff_id").val();
        let status = $(this).val();
        $("#customer_ids").empty();

        if (staffId && status) {
            $.get(`/customers/by-status/${staffId}/${status}`, function (response) {
                response.data.forEach((c) => {
                    $("#customer_ids").append(
                        `<option value="${c.id}">${c.fullname}</option>`
                    );
                });
            });
        }
    });

    // set default item assigned staff first
    let firstStaffId = $("#assigned_staff_id option:first").val();
    $("#assigned_staff_id").val(firstStaffId).trigger("change");
});
