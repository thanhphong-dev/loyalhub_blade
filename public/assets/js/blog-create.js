(function () {
    "use strict"

    // for blog content
    var toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'font': [] }],
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'align': [] }],

        ['image', 'video'],
        ['clean']                                         // remove formatting button
    ];
    var quill = new Quill('#blog-content', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    // Lấy thẻ input ẩn để đồng bộ dữ liệu
    var descriptionInput = document.querySelector('#content');

    console.log("cotent:", descriptionInput);

    // Lắng nghe sự kiện `text-change` của Quill để đồng bộ dữ liệu
    quill.on('text-change', function () {
        descriptionInput.value = quill.root.innerHTML; // Lấy nội dung HTML từ Quill
    });

    // Đồng bộ dữ liệu khi form được submit
    var form = document.querySelector('form');
    form.addEventListener('submit', function () {
        descriptionInput.value = quill.root.innerHTML; // Cập nhật lại trước khi gửi form
    });

    // for blog images
    const MultipleElement = document.querySelector('.blog-images');
    FilePond.create(MultipleElement,);

    // for publish date picker
    flatpickr("#publish-date", {});

    // for publish time
    flatpickr("#publish-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        disableMobile: true
    });

    // for blog tags
    // const multipleCancelButton1 = new Choices(
    //     '#blog-tags',
    //     {
    //         allowHTML: true,
    //         removeItemButton: true,
    //     }
    // );

})();
