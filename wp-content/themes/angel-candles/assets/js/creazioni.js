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
            const slug = this.dataset.filter;
            const base = window.location.origin + '/creazioni/';
            window.location.assign(slug === 'all' ? base : base + encodeURIComponent(slug) + '/');
        });
    });

    const segments = window.location.pathname.split('/').filter(Boolean);
    const selectedCategory = segments.length === 2 && segments[0] === 'creazioni'
        ? decodeURIComponent(segments[1])
        : 'all';
    applyFilter(selectedCategory);

    if (!lightbox) return;
    const image = lightbox.querySelector('.creazioni-lightbox-image');
    const title = lightbox.querySelector('.creazioni-lightbox-title');
    const caption = lightbox.querySelector('.creazioni-lightbox-caption');
    const description = lightbox.querySelector('.creazioni-lightbox-description');
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
        caption.textContent = slide.title || '';
        caption.hidden = !slide.title;
        description.textContent = slide.description || '';
        description.hidden = !slide.description;
        counter.textContent = (currentIndex + 1) + ' / ' + slides.length;
        const multiple = slides.length > 1;
        previous.hidden = !multiple;
        next.hidden = !multiple;
    }
    function openLightbox(card, trigger) {
        slides = Array.from(card.querySelectorAll('.creazione-gallery-data [data-src]')).map(function (node) {
            return {src: node.dataset.src, alt: node.dataset.alt || '', title: node.dataset.title || '', description: node.dataset.description || ''};
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
