export function submitAjaxForm(config) {
    const $form = $(config.formSelector);
    if ($form.length === 0) return;

    const $modal = $(config.modalSelector);

    $form.find('.text-danger').text('');

    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize(),
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                if ($modal.length) $modal.modal('hide');
                $form[0].reset();
                notyf.success(data.message || 'Thành công');

                if (config.reload) setTimeout(() => location.reload(), 1000);
            } else {
                notyf.error(data.message || 'Thất bại');
            }
        },
        error: function (xhr) {
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function (field, messages) {
                    $form.find(`.error-${field}`).text(messages[0]);
                });
            } else {
                console.error('Lỗi:', xhr.responseText);
                notyf.error(xhr.responseJSON?.message || 'Đã xảy ra lỗi.');
            }
        }
    });
}
