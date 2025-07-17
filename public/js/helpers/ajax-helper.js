export function submitAjaxForm(config) {
    console.log("🔍 submitAjaxForm chạy");
    const form = document.querySelector(config.formSelector);
    const modal = document.querySelector(config.modalSelector);
    const action = form.getAttribute('action');
    const method = form.getAttribute('method') || 'POST';

    // Xóa lỗi cũ
    form.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

    fetch(action, {
        method: method,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: new URLSearchParams(new FormData(form))
    })
    .then(response => {
        if (response.status === 422) {
            return response.json().then(data => {
                const errors = data.errors;
                for (const field in errors) {
                    const errorEl = form.querySelector(`.error-${field}`);
                    if (errorEl) errorEl.textContent = errors[field][0];
                }
            });
        } else if (!response.ok) {
            return response.json().then(data => {
                console.error('Error:', data.message);
            });
        } else {
            return response.json().then(data => {
                modal?.classList.remove('show'); // hoặc $(modal).modal('hide') nếu dùng jQuery
                form.reset();
                // if (config.reload) location.reload();
            });
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}
