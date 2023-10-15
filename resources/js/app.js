import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('passwordResetForm');
    const spinner = document.getElementById('loadingSpinner');

    form.addEventListener('submit', function (event) {
        spinner.style.display = 'block';
    });
});

