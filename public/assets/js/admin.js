//setting Quill
var quill; // Định nghĩa biến toàn cục

document.addEventListener("DOMContentLoaded", function () {
    quill = new Quill("#description-editor", {
        theme: "snow", // Hoặc "bubble" nếu bạn muốn giao diện khác
        placeholder: "nhập nội dung...",
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, 4, 5, 6, false] }],
                [{ font: [] }],
                ["bold", "italic", "underline", "strike"], // toggled buttons
                ["blockquote", "code-block"],

                [{ header: 1 }, { header: 2 }], // custom button values
                [{ list: "ordered" }, { list: "bullet" }],
                [{ script: "sub" }, { script: "super" }], // superscript/subscript
                [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
                [{ direction: "rtl" }], // text direction

                [{ size: ["small", false, "large", "huge"] }], // custom dropdown

                [{ color: [] }, { background: [] }], // dropdown with defaults from theme
                [{ align: [] }],

                ["image", "video"],
                ["clean"],
            ],
        },
    });
    var contentInput = document.querySelector("#content");

    quill.on("text-change", function () {
        contentInput.value = quill.root.innerHTML;
    });

    var form = document.querySelector("#editPostModal form");
    console.log("ok", form);
    form.addEventListener("submit", function () {
        var contentInput = document.querySelector(
            '#editPostModal input[name="content"]'
        );
        contentInput.value = quill.root.innerHTML;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        const successAlert = document.getElementById("success-alert");
        if (successAlert) {
            setTimeout(() => successAlert.remove(), 200);
        }
    }, 2000);
});

$(document).ready(function () {
    $(".btn-edit-permission").on("click", function () {
        var permissionId = $(this).data("id");
        var permissionName = $(this).data("name");
        var permissionSlug = $(this).data("slug");
        var permissionDescription = $(this).data("description");

        //value => modal
        $('#editPermissionModal input[name="id"]').val(permissionId);
        $('#editPermissionModal input[name="name"]').val(permissionName);
        $('#editPermissionModal input[name="slug"]').val(permissionSlug);
        $('#editPermissionModal textarea[name="description"]').val(
            permissionDescription
        );

        tinymce.remove("#mytextareaEditPermission");
        tinymce.init({
            selector: "#mytextareaEditPermission",
            height: 200,
            setup: function (editor) {
                editor.on("init", function () {
                    editor.setContent(permissionDescription); // Set nội dung TinyMCE khi mở modal
                });
            },
        });

        $("#editPermissionModal").modal("show");
    });

    $(".btn-edit-role").on("click", function () {
        // Lấy thông tin từ data attribute
        var roleId = $(this).data("id");
        var roleName = $(this).data("name");
        var roleDescription = $(this).data("description");
        var rolePermissions = $(this).data("permissions"); // Danh sách permission_id

        console.log("List role permission", rolePermissions);
        // Gán giá trị cho các input trong modal
        $('#editRoleModal input[name="id"]').val(roleId);
        $('#editRoleModal input[name="name"]').val(roleName);

        // Reset tất cả checkbox về unchecked
        $('#editRoleModal input[type="checkbox"]').prop("checked", false);

        // Đánh dấu các quyền đã lưu
        if (rolePermissions && Array.isArray(rolePermissions)) {
            rolePermissions.forEach(function (permissionId) {
                $('#editRoleModal input[value="' + permissionId + '"]').prop(
                    "checked",
                    true
                );
            });
        }

        tinymce.remove("#mytextareaEditRole");
        tinymce.init({
            selector: "#mytextareaEditRole",
            height: 200,
            setup: function (editor) {
                editor.on("init", function () {
                    editor.setContent(roleDescription); // Set nội dung TinyMCE khi mở modal
                });
            },
        });

        // Hiển thị modal
        $("#editRoleModal").modal("show");
    });

    $(".btn-edit-position").on("click", function () {
        var positionId = $(this).data("id");
        var positionName = $(this).data("name");
        var positionDescription = $(this).data("description");

        //value => modal
        $('#editPositionModal input[name="id"]').val(positionId);
        $('#editPositionModal input[name="name"]').val(positionName);

        tinymce.remove("#mytextareaEditPosition");
        tinymce.init({
            selector: "#mytextareaEditPosition",
            height: 200,
            setup: function (editor) {
                editor.on("init", function () {
                    editor.setContent(positionDescription); // Set nội dung TinyMCE khi mở modal
                });
            },
        });

        $("#editPositionModal").modal("show");
    });

    //edit user

    $(".btn-edit-user").on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var email = $(this).data("email");
        var type = $(this).data("type");


        $('#editEmployeeModal input[name="id"]').val(id);
        $('#editEmployeeModal input[name="name"]').val(name);
        $('#editEmployeeModal input[name="email"]').val(email);
        $('#editEmployeeModal select[name="type"]').val(type);

        const myModal = new bootstrap.Modal(
            document.getElementById("editEmployeeModal")
        );
        myModal.show();
    });

    //edit brand
    $(".btn-edit-brand").on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var description = $(this).data("description");
        var website = $(this).data("website");

        $('#editBrandModal input[name="id"]').val(id);
        $('#editBrandModal input[name="name"]').val(name);
        $('#editBrandModal textarea[name="description"]').val(description);
        $('#editBrandModal input[name="website"]').val(website);

        const myModal = new bootstrap.Modal(
            document.getElementById("editBrandModal")
        );
        myModal.show();
    });

    // edit service
    $(".btn-edit-service").on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var price = $(this).data("price");
        var brand_id = $(this).data("brand_id");
        var status = $(this).data("status");
        var description = $(this).data("description");

        $('#editServiceModal input[name="id"]').val(id);
        $('#editServiceModal input[name="name"]').val(name);
        $('#editServiceModal input[name="price"]').val(price);
        $('#editServiceModal select[name="brand_id"]').val(brand_id);
        $('#editServiceModal select[name="status"]').val(status);
        $('#editServiceModal textarea[name="description"]').val(description);

        const myModal = new bootstrap.Modal(
            document.getElementById("editServiceModal")
        );
        myModal.show();
    });

    //edit customer
    $(".btn-edit-customer").on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var email = $(this).data("email");
        var phone = $(this).data("phone");
        var address = $(this).data("address");
        var website = $(this).data("website");
        var type = $(this).data("type");
        var notes = $(this).data("notes");
        var logo = $(this).data("logo");

        $('#editCustomerModal input[name="id"]').val(id);
        $('#editCustomerModal input[name="name"]').val(name);
        $('#editCustomerModal input[name="email"]').val(email);
        $('#editCustomerModal input[name="phone"]').val(phone);
        $('#editCustomerModal input[name="address"]').val(address);
        $('#editCustomerModal input[name="website"]').val(website);
        $('#editCustomerModal textarea[name="notes"]').val(notes);
        $('#editCustomerModal select[name="type"]').val(type);

        const myModal = new bootstrap.Modal(
            document.getElementById("editCustomerModal")
        );
        myModal.show();
    });

    //create customer service
    $(".btn-customer-service").on("click", function () {
        var id = $(this).data("id");

        $('#editCustomerServiceModal input[name="customer_id"]').val(id);

        const myModal = new bootstrap.Modal(
            document.getElementById("editCustomerServiceModal")
        );
        myModal.show();
    });

    // update customer serivce
    $(".btn-update-customer-service").on("click", function () {
        var id = $(this).data("id");
        var customer_id = $(this).data("customer_id");
        var service_id = $(this).data("service_id");
        var start_date = $(this).data("start_date");
        var end_date = $(this).data("end_date");

        $('#updateCustomerServiceModal input[name="id"]').val(id);
        $('#updateCustomerServiceModal input[name="customer_id"]').val(
            customer_id
        );
        $('#updateCustomerServiceModal select[name="service_id"]').val(
            service_id
        );
        $('#updateCustomerServiceModal input[name="start_date"]').val(
            start_date
        );
        $('#updateCustomerServiceModal input[name="end_date"]').val(end_date);

        const myModal = new bootstrap.Modal(
            document.getElementById("updateCustomerServiceModal")
        );
        myModal.show();
    });
    //create customer renewals
    $(".btn-create-customer-renewals").on("click", function () {
        var customer_id = $(this).data("customer_id");
        var service_id = $(this).data("service_id");
        var amount_paid = $(this).data("price");

        $('#createCustomerRenewalModal input[name="customer_id"]').val(
            customer_id
        );
        $('#createCustomerRenewalModal input[name="service_id"]').val(
            service_id
        );
        $('#createCustomerRenewalModal select[name="service_id"]').val(
            service_id
        );
        $('#createCustomerRenewalModal input[name="amount_paid"]').val(
            amount_paid
        );

        const myModal = new bootstrap.Modal(
            document.getElementById("createCustomerRenewalModal")
        );
        myModal.show();
    });
    //create category post
    $(".btn-edit-category-post").on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var parent_id = $(this).data("parent_id");
        var note = $(this).data("note");

        $('#editCategoryPostModal input[name="id"]').val(id);
        $('#editCategoryPostModal input[name="name"]').val(name);
        $('#editCategoryPostModal select[name="parent_id"]').val(parent_id);
        $('#editCategoryPostModal textarea[name="note"]').val(note);

        const myModal = new bootstrap.Modal(
            document.getElementById("editCategoryPostModal")
        );
        myModal.show();
    });

    //edit section
    $(".btn-edit-section").on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var type = $(this).data("type");
        var key = $(this).data("key");

        $('#editSectionModal input[name="id"]').val(id);
        $('#editSectionModal input[name="name"]').val(name);
        $('#editSectionModal select[name="type"]').val(type);
        $('#editSectionModal input[name="key"]').val(key);

        const myModal = new bootstrap.Modal(
            document.getElementById("editSectionModal")
        );
        myModal.show();
    });

    //edit post
    $(".btn-edit-post").on("click", function () {
        var id = $(this).data("id");
        var title = $(this).data("title");
        var description = $(this).data("description");
        var content = $(this).data("content");
        var section_id = $(this).data("section_id");
        var category_id = $(this).data("category_id");
        var status = $(this).data("status");
        var type = $(this).data("type");
        console.log(title);

        $('#editPostModal input[name="id"]').val(id);
        $('#editPostModal input[name="title"]').val(title);
        $('#editPostModal textarea[name="description"]').val(description);
        if (quill) {
            quill.root.innerHTML = content; // Cập nhật nội dung
            $('#editPostModal input[name="content"]').val(content); // Đồng bộ input ẩn
        } else {
            console.error("Quill chưa được khởi tạo!");
        }
        $('#editPostModal select[name="section_id"]').val(section_id);
        $('#editPostModal select[name="category_id"]').val(category_id);
        $('#editPostModal select[name="status"]').val(status);
        $('#editPostModal select[name="type"]').val(type);


        const myModal = new bootstrap.Modal(
            document.getElementById("editPostModal")
        );
        myModal.show();
    });

    //edit image banner
    $(".btn-edit-image").on("click", function () {
        var id = $(this).data("id");
        var type = $(this).data("type");

        $('#editImageModal input[name="id"]').val(id);
        $('#editImageModal select[name="type"]').val(type);

        const myModal = new bootstrap.Modal(
            document.getElementById("editImageModal")
        );
        myModal.show();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("overlay");
    let deleteUrl = "";
    let userId = "";

    document.addEventListener("click", function (e) {
        if (e.target.closest(".btn-delete")) {
            e.preventDefault();
            const deleteBtn = e.target.closest(".btn-delete");

            deleteUrl = deleteBtn.getAttribute("href");
            userId = deleteBtn.getAttribute("data-id");

            overlay.classList.remove("d-none");
        }

        if (e.target.classList.contains("btn-cancel-delete")) {
            overlay.classList.add("d-none");
            deleteUrl = "";
        }

        if (e.target.classList.contains("btn-confirm-delete")) {
            if (deleteUrl) {
                window.location.href = deleteUrl;
            }
        }
    });
});
