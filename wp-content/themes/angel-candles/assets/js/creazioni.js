document.addEventListener('DOMContentLoaded', function () {
    const filters = document.querySelectorAll('.creazioni-filter');
    const cards = document.querySelectorAll('.creazione-card');
    const lightbox = document.querySelector('.creazioni-lightbox');

    function applyFilter(selected) {
        let matched = selected === 'all';
        filters.forEach(function (button) {
            const active = button.dataset.filter === selected;
            button.classList.toggle('active', active);
            if (active) matched = true;
        });
        if (!matched) {
            selected = 'all';
            filters.forEach(function (button) {
                button.classList.toggle('active', button.dataset.filter === 'all');
            });
        }
        cards.forEach(function (card) {
            card.hidden = !(selected === 'all' || card.dataset.categories.split(' ').includes(selected));
        });
    }

    filters.forEach(function (filter) {
        filter.addEventListener('click', function () {
            applyFilter(this.dataset.filter);
            const url = new URL(window.location.href);
            if (this.dataset.filter === 'all') url.searchParams.delete('categoria');
            else url.searchParams.set('categoria', this.dataset.filter);
            window.history.replaceState({}, '', url);
        });
    });

    const requestedCategory = new URLSearchParams(window.location.search).get('categoria');
    if (requestedCategory) applyFilter(requestedCategory);

    if (!lightbox) return;
    const image = lightbox.querySelector('.creazioni-lightbox-image');
    const title = lightbox.querySelector('.creazioni-lightbox-title');
    const counter = lightbox.querySelector('.creazioni-lightbox-counter');
    const previous = lightbox.querySelector('.creazioni-lightbox-prev');
    const next = lightbox.querySelector('.creazioni-lightbox-next');
    const closeButtons = lightbox.querySelectorAll('[data-lightbox-close]');
    let slides = [], currentIndex = 0, lastTrigger = null, touchStartX = 0;

    function renderSlide() {
        if (!slides.length) return;
        const slide = slides[currentIndex];
        image.src = slide.src;
        image.alt = slide.alt || title.textContent || '';
        counter.textContent = (currentIndex + 1) + ' / ' + slides.length;
        const multiple = slides.length > 1;
        previous.hidden = !multiple;
        next.hidden = !multiple;
    }
    function openLightbox(card, trigger) {
        slides = Array.from(card.querySelectorAll('.creazione-gallery-data [data-src]')).map(function (node) {
            return {src: node.dataset.src, alt: node.dataset.alt || ''};
        });
        if (!slides.length) return;
        currentIndex = 0;
        lastTrigger = trigger;
        title.textContent = card.querySelector('.creazione-content h2')?.textContent.trim() || '';
        renderSlide();
        lightbox.hidden = false;
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.classList.add('creazioni-lightbox-open');
        lightbox.querySelector('.creazioni-lightbox-close').focus();
    }
    function closeLightbox() {
        lightbox.hidden = true;
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('creazioni-lightbox-open');
        image.src = '';
        if (lastTrigger) lastTrigger.focus();
    }
    function goPrevious() { currentIndex = (currentIndex - 1 + slides.length) % slides.length; renderSlide(); }
    function goNext() { currentIndex = (currentIndex + 1) % slides.length; renderSlide(); }

    document.querySelectorAll('.creazione-gallery-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function () { openLightbox(this.closest('.creazione-card'), this); });
    });
    previous.addEventListener('click', goPrevious);
    next.addEventListener('click', goNext);
    closeButtons.forEach(function (button) { button.addEventListener('click', closeLightbox); });
    document.addEventListener('keydown', function (event) {
        if (lightbox.hidden) return;
        if (event.key === 'Escape') closeLightbox();
        else if (event.key === 'ArrowLeft' && slides.length > 1) goPrevious();
        else if (event.key === 'ArrowRight' && slides.length > 1) goNext();
    });
    lightbox.addEventListener('touchstart', function (event) { touchStartX = event.changedTouches[0].clientX; }, {passive:true});
    lightbox.addEventListener('touchend', function (event) {
        if (slides.length < 2) return;
        const delta = event.changedTouches[0].clientX - touchStartX;
        if (Math.abs(delta) < 50) return;
        if (delta > 0) goPrevious(); else goNext();
    }, {passive:true});
});
