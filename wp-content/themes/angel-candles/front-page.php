<?php
get_header();
$angel_assets = get_template_directory_uri() . '/assets/images/';
$features = array(
    array('24d40.webp', __('Fatte a mano', 'angel-candles')),
    array('2ed11.webp', __('Personalizzate', 'angel-candles')),
    array('d2538.webp', __('Eventi & cerimonie', 'angel-candles')),
    array('0c759.webp', __('Atmosfere speciali', 'angel-candles')),
);
$creations = array(
    array('f4286.webp', __('Decorative', 'angel-candles'), 'decorative'),
    array('f5852.webp', __('Bomboniere', 'angel-candles'), 'bomboniere'),
    array('26b64.webp', __('Festività', 'angel-candles'), 'festivita'),
    array('41f1f.webp', __('Idee regalo', 'angel-candles'), 'idee-regalo'),
);
$creazioni_url = get_post_type_archive_link('angel_creazione') ?: home_url('/creazioni/');
?>
<main id="home">
    <section class="hero" aria-labelledby="hero-title">
        <img src="<?php echo esc_url($angel_assets . '4f753.webp'); ?>" alt="<?php esc_attr_e('Candela floreale accesa in un allestimento botanico', 'angel-candles'); ?>" fetchpriority="high" loading="eager" decoding="async">
        <h1 id="hero-title"><span class="hero-accent"><?php esc_html_e('Create', 'angel-candles'); ?></span> <?php esc_html_e('per', 'angel-candles'); ?><br><?php esc_html_e('accendere un', 'angel-candles'); ?><br><?php esc_html_e('momento speciale.', 'angel-candles'); ?></h1>
    </section>

    <section class="features" aria-label="<?php esc_attr_e('Caratteristiche', 'angel-candles'); ?>">
        <?php foreach ($features as $feature) : ?>
            <article class="feature">
                <img src="<?php echo esc_url($angel_assets . $feature[0]); ?>" alt="">
                <p><?php echo esc_html($feature[1]); ?></p>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="creations" aria-labelledby="creations-title">
        <h2 id="creations-title"><?php esc_html_e('Le mie creazioni', 'angel-candles'); ?></h2>
        <div class="creation-grid">
            <?php foreach ($creations as $creation) : ?>
                <a class="creation-card" href="<?php echo esc_url(add_query_arg('categoria', $creation[2], $creazioni_url)); ?>">
                    <img src="<?php echo esc_url($angel_assets . $creation[0]); ?>" alt="<?php echo esc_attr(sprintf(__('Candela %s', 'angel-candles'), strtolower($creation[1]))); ?>" loading="lazy" decoding="async">
                    <h3><?php echo esc_html($creation[1]); ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="story" aria-labelledby="story-title">
        <img src="<?php echo esc_url($angel_assets . 'e49e5.webp'); ?>" alt="<?php esc_attr_e('Candela floreale confezionata tra lavanda e fiori', 'angel-candles'); ?>" loading="lazy" decoding="async">
        <div class="story-content">
            <h2 id="story-title"><?php esc_html_e('Ogni candela ha', 'angel-candles'); ?><br><?php esc_html_e('qualcosa da raccontare', 'angel-candles'); ?></h2>
            <a class="cta" href="<?php echo esc_url(home_url('/emozioni/')); ?>">
                <?php esc_html_e('Scopri Angelcandle', 'angel-candles'); ?>
                <img src="<?php echo esc_url($angel_assets . '2baf6.svg'); ?>" alt="" loading="lazy" decoding="async">
            </a>
        </div>
    </section>
</main>
<?php get_footer(); ?>
