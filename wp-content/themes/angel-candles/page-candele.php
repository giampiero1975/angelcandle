<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$assets = get_template_directory_uri() . '/assets/images/';

$qualities = array(
    array('24d40.png', __('Fatte a mano', 'angel-candles'), __('Ogni candela nasce artigianalmente, con cura per i dettagli e per le piccole imperfezioni che rendono ogni pezzo unico.', 'angel-candles')),
    array('2ed11.png', __('Personalizzate', 'angel-candles'), __('Colori, dettagli e confezioni possono essere pensati per raccontare un momento, una persona o un’occasione speciale.', 'angel-candles')),
    array('d2538.png', __('Eventi & cerimonie', 'angel-candles'), __('Piccoli ricordi creati per battesimi, comunioni, matrimoni, feste e occasioni da celebrare.', 'angel-candles')),
    array('0c759.png', __('Atmosfere speciali', 'angel-candles'), __('Una luce calda e delicata per trasformare un angolo di casa e accompagnare i momenti da ricordare.', 'angel-candles')),
);
?>

<main class="candele-page">
    <section class="candele-hero" aria-labelledby="candele-title">
        <div class="candele-hero-copy">
            <span class="candele-kicker"><?php esc_html_e('AngelCandles', 'angel-candles'); ?></span>
            <h1 id="candele-title"><?php esc_html_e('Candele create per raccontare qualcosa di speciale', 'angel-candles'); ?></h1>
            <p><?php esc_html_e('Ogni candela prende forma a mano, una alla volta. Non nasce da una produzione in serie, ma da un’idea, da un dettaglio o da un momento che merita una luce tutta sua.', 'angel-candles'); ?></p>
            <a class="candele-link" href="<?php echo esc_url(get_post_type_archive_link('angel_creazione')); ?>">
                <?php esc_html_e('Scopri le mie creazioni', 'angel-candles'); ?>
                <span aria-hidden="true">→</span>
            </a>
        </div>
        <figure class="candele-hero-image">
            <img src="<?php echo esc_url($assets . '4f753.png'); ?>" alt="<?php esc_attr_e('Candela floreale accesa in un allestimento botanico', 'angel-candles'); ?>">
        </figure>
    </section>

    <section class="candele-intro" aria-labelledby="candele-intro-title">
        <p class="candele-eyebrow"><?php esc_html_e('Il valore delle piccole cose', 'angel-candles'); ?></p>
        <h2 id="candele-intro-title"><?php esc_html_e('Una candela può essere molto più di una candela', 'angel-candles'); ?></h2>
        <p><?php esc_html_e('Può diventare un ricordo, un regalo pensato davvero per qualcuno, un dettaglio che completa una festa o semplicemente una piccola atmosfera da accendere quando ne hai voglia.', 'angel-candles'); ?></p>
    </section>

    <section class="candele-qualities" aria-label="<?php esc_attr_e('Caratteristiche delle candele AngelCandles', 'angel-candles'); ?>">
        <?php foreach ($qualities as $quality) : ?>
            <article class="candele-quality">
                <div class="candele-quality-icon"><img src="<?php echo esc_url($assets . $quality[0]); ?>" alt=""></div>
                <h2><?php echo esc_html($quality[1]); ?></h2>
                <p><?php echo esc_html($quality[2]); ?></p>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="candele-feature">
        <figure class="candele-feature-image">
            <img src="<?php echo esc_url($assets . 'e49e5.png'); ?>" alt="<?php esc_attr_e('Candela confezionata tra lavanda e fiori', 'angel-candles'); ?>">
        </figure>
        <div class="candele-feature-copy">
            <p class="candele-eyebrow"><?php esc_html_e('Pensata per te', 'angel-candles'); ?></p>
            <h2><?php esc_html_e('Hai in mente qualcosa di particolare?', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Raccontami l’occasione, lo stile o l’idea che hai in mente. Possiamo partire da lì e immaginare insieme una candela che abbia davvero il tuo significato.', 'angel-candles'); ?></p>
            <a class="candele-cta" href="<?php echo esc_url(home_url('/#contatti')); ?>"><?php esc_html_e('Parliamone', 'angel-candles'); ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
