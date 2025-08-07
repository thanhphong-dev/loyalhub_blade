import moment from "moment";
import viLocale from "@fullcalendar/core/locales/vi";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import { Calendar } from "@fullcalendar/core";

$(document).ready(function () {
    const csrfToken = $('meta[name="csrf-token"]').attr("content");

    const state = {
        allCustomers: [],
        bookedCustomerIds: [],
        eventsCache: [],
        loading: { customers: false, appointments: false },
    };

    const toStr = (v) => (typeof v === "number" ? String(v) : String(v));

    const showErrorFields = (errors) => {
        $(".text-danger").text("");
        if (!errors) return;
        for (const key in errors) {
            $(`.error-${key}`).text(errors[key][0]);
        }
    };

    const clearForm = () => {
        $("#calendar-id").val("");
        $("input[name='title']").val("");
        $("#select-customer").val("");
        $("#date").val("");
        $("#start_time").val("");
        $("#end_time").val("");
        $(".text-danger").text("");
    };

    const renderCustomerSelectOptions = (customers, selectedId = null) => {
        const $select = $("#select-customer");
        $select.empty();
        $select.append('<option value="">-- Chọn khách hàng --</option>');
        customers.forEach((c) => {
            const isBooked = state.bookedCustomerIds.includes(c.id);
            const isSelected = selectedId == c.id;
            const hiddenAttr =
                isBooked && !isSelected ? 'style="display:none;"' : "";
            $select.append(
                `<option value="${c.id}" ${
                    isSelected ? "selected" : ""
                } ${hiddenAttr}>
          ${c.fullname}
        </option>`
            );
        });
    };

    const fetchCustomersFromApi = (selectedId = null) => {
        state.loading.customers = true;
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "/customer-appointments/get-customer",
                type: "GET",
                headers: { "X-CSRF-TOKEN": csrfToken },
                success(res) {
                    state.loading.customers = false;
                    if (res.status && Array.isArray(res.data)) {
                        state.allCustomers = res.data.map((c) => ({
                            id: toStr(c.id),
                            fullname: c.fullname,
                        }));
                        renderCustomerSelectOptions(
                            state.allCustomers,
                            selectedId
                        );
                        resolve(state.allCustomers);
                    } else {
                        reject(new Error("No customers returned"));
                    }
                },
                error(err) {
                    state.loading.customers = false;
                    reject(err);
                },
            });
        });
    };

    const fetchCustomerAppointments = () => {
        state.loading.appointments = true;
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "/customer-appointments/get-all",
                type: "GET",
                headers: { "X-CSRF-TOKEN": csrfToken },
                success(response) {
                    state.loading.appointments = false;
                    if (response.status && Array.isArray(response.data)) {
                        state.eventsCache = response.data;
                        state.bookedCustomerIds = response.data.map((d) =>
                            toStr(d.customer_id)
                        );

                        const events = response.data.map((item) => ({
                            id: toStr(item.id),
                            title: item.title,
                            start: `${item.date}T${item.start_time}`,
                            end: `${item.date}T${item.end_time}`,
                            classNames: ["bg-purple-transparent"],
                            extendedProps: {
                                customer_id: toStr(item.customer_id),
                                date: item.date,
                                start_time: item.start_time,
                                end_time: item.end_time,
                            },
                        }));

                        resolve(events);
                    } else {
                        reject(
                            new Error("Invalid response from appointments API")
                        );
                    }
                },
                error() {
                    state.loading.appointments = false;
                    reject(new Error("Error loading events"));
                },
            });
        });
    };

    const updateStatusCustomer = (customerId, status) => {
        return $.ajax({
            url: `/customer/update-status/${customerId}`,
            type: "POST",
            data: { status },
            headers: { "X-CSRF-TOKEN": csrfToken },
        });
    };

    const getDataForCreateEdit = async (mode = "create", eventData = null) => {
        const selectedId =
            mode === "edit" && eventData
                ? toStr(eventData.extendedProps.customer_id)
                : null;

        await fetchCustomersFromApi(selectedId);
        await fetchCustomerAppointments();

        if (mode === "edit" && eventData) {
            $("#calendar-id").val(eventData.id);
            $("input[name='title']").val(eventData.title || "");
            $("#date").val(eventData.extendedProps.date);
            $("#start_time").val(eventData.extendedProps.start_time);
            $("#end_time").val(eventData.extendedProps.end_time);
        } else {
            clearForm();
        }
    };

    const submitAppointment = async () => {
        const id = $("#calendar-id").val();
        const url = id
            ? `/customer-appointments/update/${id}`
            : "/customer-appointments/create";
        const method = id ? "PUT" : "POST";

        const data = {
            title: $("input[name='title']").val(),
            customer_id: $("#select-customer").val(),
            date: $("#date").val(),
            start_time: $("#start_time").val(),
            end_time: $("#end_time").val(),
            _method: method,
        };

        $(".text-danger").text("");

        try {
            const res = await $.ajax({
                url,
                type: "POST",
                data,
                headers: { "X-CSRF-TOKEN": csrfToken },
            });

            if (res.status) {
                const savedCustomerId = toStr(data.customer_id);

                // Nếu tạo mới thì cập nhật trạng thái khách hàng
                if (!id) {
                    await updateStatusCustomer(savedCustomerId, 3);
                }

                // Cập nhật danh sách khách hàng đã đặt
                if (!state.bookedCustomerIds.includes(savedCustomerId)) {
                    state.bookedCustomerIds.push(savedCustomerId);
                }
                $(`#select-customer option[value='${savedCustomerId}']`).hide();

                const modal = bootstrap.Modal.getInstance(
                    document.getElementById("customer-appointments")
                );
                if (modal) modal.hide();
                calendar.refetchEvents();

                if (
                    typeof notyf !== "undefined" &&
                    typeof notyfCreateSuccess !== "undefined"
                ) {
                    notyf.success(notyfCreateSuccess);
                }
            } else {
                showErrorFields(res.errors || {});
            }
        } catch (xhr) {
            if (xhr?.responseJSON?.errors) {
                showErrorFields(xhr.responseJSON.errors);
            } else {
                console.error("Submit error", xhr);
            }
        }
    };

    // Xóa lịch hẹn
    const deleteAppointment = () => {
        const id = $("#calendar-id").val();
        if (!id) {
            notyf.error("Không tìm thấy lịch hẹn để xóa.");
            return;
        }

        const url = `/customer-appointments/delete/${id}`;

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
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    success: async function (res) {
                        if (res.status) {
                            notyf.success(getMessSuccess);

                            // Cập nhật danh sách khách hàng và sự kiện
                            await fetchCustomersFromApi();
                            await fetchCustomerAppointments();
                            calendar.refetchEvents();

                            // Ẩn modal
                            const modal = bootstrap.Modal.getInstance(
                                document.getElementById("customer-appointments")
                            );
                            if (modal) modal.hide();
                        } else {
                            notyf.error(getFailure);
                        }
                    },
                    error: function () {
                        notyf.error(getFailure);
                    },
                });
            }
        });
    };

    //new calendar
    const calendarEl = document.getElementById("calendar-appointment");
    let dropTimeout = null;

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        locale: viLocale,
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "prev,next",
            center: "title",
            right: "today",
        },
        navLinks: true,
        businessHours: true,
        editable: true,
        selectable: true,
        selectMirror: true,
        dayCellDidMount: function (info) {
        const cellDate = moment(info.date).startOf("day");
        const today = moment().startOf("day");

        if (cellDate.isBefore(today)) {
            // Ngày quá khứ từ thứ 2 đến CN
            info.el.style.backgroundColor = "#e0e0e0"; // xám nhạt
        }

        if (cellDate.isSame(today)) {
            // Ngày hôm nay
            info.el.style.backgroundColor = "#ffe0b2"; // cam nhạt
            info.el.style.border = "2px solid #ff9800"; // viền cam
        }
    },
        selectAllow: function (selectInfo) {
            const today = moment().startOf("day"); // hôm nay dạng moment

            return selectInfo.start >= today;
        },
        select: async function (arg) {
            try {
                await getDataForCreateEdit("create");
                $("#date").val(arg.startStr);
                new bootstrap.Modal(
                    document.getElementById("customer-appointments")
                ).show();
            } catch (e) {
                console.error(e);
                notyf.error(getFailure);
            } finally {
                calendar.unselect();
            }
        },

        eventClick: async function (arg) {
            try {
                await getDataForCreateEdit("edit", arg.event);
                new bootstrap.Modal(
                    document.getElementById("customer-appointments")
                ).show();
            } catch (e) {
                console.error(e);
                notyf.error(getFailure);
            }
        },

        eventContent: function (arg) {
            const start = moment(
                arg.event.extendedProps.start_time,
                "HH:mm"
            ).format("HH:mm");
            const end = moment(
                arg.event.extendedProps.end_time,
                "HH:mm"
            ).format("HH:mm");
            const title = arg.event.title || "";
            return { html: `${start} - ${end} ${title}` };
        },

        eventDrop: function (info) {
            clearTimeout(dropTimeout);

            const today = moment().startOf("day");
            if (info.event.start < today) {
                notyf.error(notyfErrorUpdateSchedule);
                info.revert();
                return;
            }

            dropTimeout = setTimeout(function () {
                const event = info.event;

                const data = {
                    title: event.title,
                    customer_id: event.extendedProps.customer_id,
                    date: moment(event.start).format("YYYY-MM-DD"),
                    start_time: moment(event.start).format("HH:mm"),
                    end_time: moment(event.end).format("HH:mm"),
                    _method: "PUT",
                };

                $.ajax({
                    url: `/customer-appointments/update/${event.id}`,
                    type: "POST",
                    data: data,
                    headers: { "X-CSRF-TOKEN": csrfToken },
                    success: function (res) {
                        if (res.status) {
                            notyf.success("Cập nhật thành công!");
                        } else {
                            notyf.error("Cập nhật thất bại!");
                            info.revert(); // quay lại thời gian cũ nếu lỗi
                        }
                    },
                    error: function () {
                        notyf.error("Lỗi khi cập nhật!");
                        info.revert();
                    },
                });
            }, 1500); // 1,5 giây
        },

        eventSources: [
            {
                events: async function (
                    fetchInfo,
                    successCallback,
                    failureCallback
                ) {
                    try {
                        const events = await fetchCustomerAppointments();
                        successCallback(events);
                    } catch (e) {
                        failureCallback(e);
                    }
                },
            },
        ],
    });

    calendar.render();

    $(document).on("click", "#save-appointment", function () {
        submitAppointment();
    });

    $(document).on("click", "#delte-customer-appointments", function () {
        deleteAppointment();
    });
});
