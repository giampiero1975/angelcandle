document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.ac-header');
    const toggle = document.querySelector('.ac-menu-toggle');

    if (!header || !toggle) return;

    toggle.addEventListener('click', function () {
        const open = header.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
});
