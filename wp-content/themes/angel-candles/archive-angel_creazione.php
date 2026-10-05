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
            <button class="creazioni-filter active" data-filter="all">
                Tutte
            </button>

            <?php foreach ($categories as $category) : ?>
                <button
                    class="creazioni-filter"
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
                $terms = get_the_terms(
                    get_the_ID(),
                    'angel_creazione_categoria'
                );

                $slugs = [];

                if ($terms && !is_wp_error($terms)) {
                    $slugs = wp_list_pluck($terms, 'slug');
                }

                $gallery_ids = get_post_meta(
                    get_the_ID(),
                    '_angelcandle_gallery_ids',
                    true
                );

                if (!is_array($gallery_ids)) {
                    $gallery_ids = [];
                }

                $main_image = get_the_post_thumbnail_url(
                    get_the_ID(),
                    'large'
                );

                /*
                 * Se non è stata impostata un'immagine in evidenza,
                 * usa automaticamente la prima foto della galleria.
                 */
                if (!$main_image && !empty($gallery_ids)) {
                    $main_image = wp_get_attachment_image_url(
                        (int) $gallery_ids[0],
                        'large'
                    );
                }
                ?>

                <article
                    class="creazione-card"
                    data-categories="<?php echo esc_attr(implode(' ', $slugs)); ?>"
                >

                    <?php if ($main_image) : ?>

                        <div class="creazione-image">
                            <img
                                src="<?php echo esc_url($main_image); ?>"
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                                loading="lazy"
                            >
                        </div>

                    <?php endif; ?>

                    <div class="creazione-content">
                        <h2><?php the_title(); ?></h2>

                        <?php if ($terms && !is_wp_error($terms)) : ?>
                            <div class="creazione-category">
                                <?php
                                echo esc_html(
                                    implode(
                                        ' · ',
                                        wp_list_pluck($terms, 'name')
                                    )
                                );
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if (has_excerpt()) : ?>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                    </div>

                </article>

            <?php endwhile; ?>

        <?php else : ?>

            <p class="creazioni-empty">
                Le nuove creazioni arriveranno presto.
            </p>

        <?php endif; ?>

    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const filters = document.querySelectorAll('.creazioni-filter');
    const cards = document.querySelectorAll('.creazione-card');

    filters.forEach(function (filter) {

        filter.addEventListener('click', function () {

            const selected = this.dataset.filter;

            filters.forEach(function (button) {
                button.classList.remove('active');
            });

            this.classList.add('active');

            cards.forEach(function (card) {

                if (
                    selected === 'all' ||
                    card.dataset.categories
                        .split(' ')
                        .includes(selected)
                ) {
                    card.hidden = false;
                } else {
                    card.hidden = true;
                }

            });

        });

    });

});
</script>

<?php get_footer(); ?>