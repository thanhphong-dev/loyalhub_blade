$(document).on("change", ".check-all", function () {
    const moduleName = $(this).data("module");
    const isChecked = $(this).is(":checked");

    $(`.permission[data-module="${moduleName}"]`).prop("checked", isChecked);
});
