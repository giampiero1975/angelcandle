<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$categories = get_terms([
    'taxonomy'   => 'angel_creazione_categoria',
    'hide_empty' => true,
]);
?>

<main class="creazioni-page">
    <section class="creazioni-header">
        <h1>Le mie creazioni</h1>
        <p>
            Ogni candela nasce da un'idea, da un'occasione
            o semplicemente dal desiderio di creare qualcosa di speciale.
        </p>
    </section>

    <?php if (!is_wp_error($categories) && $categories) : ?>
        <nav class="creazioni-filters" aria-label="Categorie creazioni">
            <button class="creazioni-filter active" type="button" data-filter="all">Tutte</button>

            <?php foreach ($categories as $category) : ?>
                <button
                    class="creazioni-filter"
                    type="button"
                    data-filter="<?php echo esc_attr($category->slug); ?>"
                >
                    <?php echo esc_html($category->name); ?>
                </button>
            <?php endforeach; ?>
        </nav>
    <?php endif; ?>

    <section class="creazioni-grid">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $terms = get_the_terms(get_the_ID(), 'angel_creazione_categoria');
                $slugs = [];

                if ($terms && !is_wp_error($terms)) {
                    $slugs = wp_list_pluck($terms, 'slug');
                }

                $gallery_ids = get_post_meta(get_the_ID(), '_angelcandle_gallery_ids', true);
                if (!is_array($gallery_ids)) {
                    $gallery_ids = [];
                }

                $featured_id = get_post_thumbnail_id(get_the_ID());
                $display_image_id = $featured_id ?: (!empty($gallery_ids) ? (int) $gallery_ids[0] : 0);

                $lightbox_ids = array_values(array_unique(array_filter(array_map('absint', $gallery_ids))));
                if ($featured_id && !in_array((int) $featured_id, $lightbox_ids, true)) {
                    array_unshift($lightbox_ids, (int) $featured_id);
                }

                $main_image = $display_image_id
                    ? wp_get_attachment_image_url($display_image_id, 'large')
                    : '';
                ?>

                <article
                    class="creazione-card"
                    data-categories="<?php echo esc_attr(implode(' ', $slugs)); ?>"
                >
                    <?php if ($main_image) : ?>
                        <button
                            class="creazione-image creazione-gallery-trigger"
                            type="button"
                            aria-label="Apri la galleria: <?php echo esc_attr(get_the_title()); ?>"
                        >
                            <img
                                src="<?php echo esc_url($main_image); ?>"
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                                loading="lazy"
                            >
                            <span class="creazione-image-overlay" aria-hidden="true">
                                <span>Guarda la creazione</span>
                            </span>
                        </button>
                    <?php endif; ?>

                    <div class="creazione-content">
                        <h2><?php the_title(); ?></h2>

                        <?php if ($terms && !is_wp_error($terms)) : ?>
                            <div class="creazione-category">
                                <?php echo esc_html(implode(' · ', wp_list_pluck($terms, 'name'))); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (has_excerpt()) : ?>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if ($lightbox_ids) : ?>
                        <div class="creazione-gallery-data" hidden>
                            <?php foreach ($lightbox_ids as $image_id) : ?>
                                <?php
                                $full = wp_get_attachment_image_url($image_id, 'full');
                                if (!$full) {
                                    continue;
                                }
                                ?>
                                <span
                                    data-src="<?php echo esc_url($full); ?>"
                                    data-alt="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: get_the_title()); ?>"
                                ></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="creazioni-empty">Le nuove creazioni arriveranno presto.</p>
        <?php endif; ?>
    </section>
</main>

<div class="creazioni-lightbox" hidden aria-hidden="true" role="dialog" aria-modal="true" aria-label="Galleria creazione">
    <div class="creazioni-lightbox-backdrop" data-lightbox-close></div>

    <div class="creazioni-lightbox-shell">
        <div class="creazioni-lightbox-topbar">
            <div>
                <p class="creazioni-lightbox-title"></p>
                <p class="creazioni-lightbox-counter"></p>
            </div>
            <button class="creazioni-lightbox-close" type="button" data-lightbox-close aria-label="Chiudi galleria">&times;</button>
        </div>

        <div class="creazioni-lightbox-stage">
            <button class="creazioni-lightbox-nav creazioni-lightbox-prev" type="button" aria-label="Immagine precedente">&#8249;</button>
            <img class="creazioni-lightbox-image" src="" alt="">
            <button class="creazioni-lightbox-nav creazioni-lightbox-next" type="button" aria-label="Immagine successiva">&#8250;</button>
        </div>
    </div>
</div>

<?php get_footer(); ?>