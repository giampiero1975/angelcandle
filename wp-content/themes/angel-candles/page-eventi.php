<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$assets = get_template_directory_uri() . '/assets/images/';
$creazioni_url = get_post_type_archive_link('angel_creazione');
?>

<main class="eventi-page">
    <section class="eventi-hero" aria-labelledby="eventi-title">
        <figure class="eventi-hero-image">
            <img src="<?php echo esc_url($assets . 'e49e5.png'); ?>" alt="<?php esc_attr_e('Candela confezionata per un evento tra fiori e lavanda', 'angel-candles'); ?>">
        </figure>
        <div class="eventi-hero-copy">
            <span class="eventi-kicker"><?php esc_html_e('Eventi & cerimonie', 'angel-candles'); ?></span>
            <h1 id="eventi-title"><?php esc_html_e('Un piccolo dettaglio per ricordare un giorno speciale', 'angel-candles'); ?></h1>
            <p><?php esc_html_e('Bomboniere e candele personalizzate, create a mano per accompagnare battesimi, comunioni, matrimoni, feste e tutti quei momenti che meritano di essere ricordati.', 'angel-candles'); ?></p>
            <a class="eventi-link" href="<?php echo esc_url($creazioni_url ?: home_url('/creazioni/')); ?>">
                <?php esc_html_e('Guarda le creazioni', 'angel-candles'); ?><span aria-hidden="true">→</span>
            </a>
        </div>
    </section>

    <section class="eventi-intro" aria-labelledby="eventi-intro-title">
        <p class="eventi-eyebrow"><?php esc_html_e('Pensate insieme', 'angel-candles'); ?></p>
        <h2 id="eventi-intro-title"><?php esc_html_e('Ogni occasione ha la sua storia', 'angel-candles'); ?></h2>
        <p><?php esc_html_e('Non esiste una bomboniera uguale per tutti. Colori, nastri, dettagli e confezione possono partire dall’atmosfera del tuo evento per creare qualcosa di semplice, armonioso e davvero personale.', 'angel-candles'); ?></p>
    </section>

    <section class="eventi-momenti" aria-label="<?php esc_attr_e('Occasioni per le creazioni AngelCandles', 'angel-candles'); ?>">
        <article class="evento-card evento-card-battesimi">
            <span>01</span>
            <h2><?php esc_html_e('Battesimi & comunioni', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Piccoli ricordi delicati, pensati per celebrare con dolcezza i momenti importanti della famiglia.', 'angel-candles'); ?></p>
        </article>
        <article class="evento-card evento-card-matrimoni">
            <span>02</span>
            <h2><?php esc_html_e('Matrimoni', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Candele e confezioni coordinate allo stile della giornata, da lasciare agli invitati come ricordo.', 'angel-candles'); ?></p>
        </article>
        <article class="evento-card evento-card-feste">
            <span>03</span>
            <h2><?php esc_html_e('Feste & ricorrenze', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Compleanni, anniversari e occasioni speciali da trasformare in un pensiero fatto a mano.', 'angel-candles'); ?></p>
        </article>
    </section>

    <section class="eventi-personalizzazione">
        <div class="eventi-personalizzazione-copy">
            <p class="eventi-eyebrow"><?php esc_html_e('Il tuo evento, i tuoi dettagli', 'angel-candles'); ?></p>
            <h2><?php esc_html_e('Dal colore del nastro alla confezione finale', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Possiamo partire da una palette, da un tema, da un fiore o semplicemente dall’idea che hai in mente. L’obiettivo è creare un insieme coerente con il tuo evento, senza perdere il carattere artigianale di ogni candela.', 'angel-candles'); ?></p>
            <div class="eventi-tags" aria-label="<?php esc_attr_e('Elementi personalizzabili', 'angel-candles'); ?>">
                <span><?php esc_html_e('Colori', 'angel-candles'); ?></span>
                <span><?php esc_html_e('Nastri', 'angel-candles'); ?></span>
                <span><?php esc_html_e('Etichette', 'angel-candles'); ?></span>
                <span><?php esc_html_e('Confezioni', 'angel-candles'); ?></span>
            </div>
        </div>
        <figure class="eventi-personalizzazione-image">
            <img src="<?php echo esc_url($assets . '4f753.png'); ?>" alt="<?php esc_attr_e('Candela decorativa floreale AngelCandles', 'angel-candles'); ?>">
        </figure>
    </section>

    <section class="eventi-cta">
        <div>
            <p class="eventi-eyebrow"><?php esc_html_e('Raccontami la tua idea', 'angel-candles'); ?></p>
            <h2><?php esc_html_e('Stai organizzando un momento speciale?', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Dimmi che occasione stai preparando e che atmosfera immagini. Da lì possiamo capire insieme colori, quantità, stile e dettagli.', 'angel-candles'); ?></p>
            <a class="eventi-button" href="<?php echo esc_url(home_url('/#contatti')); ?>"><?php esc_html_e('Parliamone', 'angel-candles'); ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
