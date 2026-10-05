<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$assets = get_template_directory_uri() . '/assets/images/';
?>

<main class="emozioni-page">
    <section class="emozioni-hero" aria-labelledby="emozioni-title">
        <div class="emozioni-hero-copy">
            <span class="emozioni-kicker"><?php esc_html_e('Emozioni', 'angel-candles'); ?></span>
            <h1 id="emozioni-title"><?php esc_html_e('Ogni candela racconta un’emozione', 'angel-candles'); ?></h1>
            <p><?php esc_html_e('Una luce può cambiare l’atmosfera di una stanza, accompagnare un ricordo o rendere speciale un gesto semplice. AngelCandles nasce da questa idea: dare forma a piccoli momenti da custodire.', 'angel-candles'); ?></p>
        </div>
        <figure class="emozioni-hero-image">
            <img src="<?php echo esc_url($assets . '4f753.png'); ?>" alt="<?php esc_attr_e('Candela accesa in un’atmosfera floreale', 'angel-candles'); ?>">
        </figure>
    </section>

    <section class="emozioni-manifesto" aria-labelledby="emozioni-manifesto-title">
        <p class="emozioni-eyebrow"><?php esc_html_e('Il cuore di AngelCandles', 'angel-candles'); ?></p>
        <h2 id="emozioni-manifesto-title"><?php esc_html_e('Non solo cera e luce. Piccoli gesti che diventano ricordi.', 'angel-candles'); ?></h2>
        <p><?php esc_html_e('Ogni creazione parte da qualcosa di semplice: un colore, un fiore, un’occasione, una sensazione. Da lì nasce una candela pensata per avere un significato, prima ancora che una forma.', 'angel-candles'); ?></p>
    </section>

    <section class="emozioni-valori" aria-label="<?php esc_attr_e('I valori AngelCandles', 'angel-candles'); ?>">
        <article class="emozione-valore">
            <span>01</span>
            <h2><?php esc_html_e('Cura', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('La bellezza vive nei dettagli: nelle forme, negli abbinamenti e in tutto ciò che rende ogni creazione diversa dalla precedente.', 'angel-candles'); ?></p>
        </article>
        <article class="emozione-valore">
            <span>02</span>
            <h2><?php esc_html_e('Unicità', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Il fatto a mano porta con sé piccole differenze. Non sono imperfezioni, ma il segno che ogni candela ha una storia tutta sua.', 'angel-candles'); ?></p>
        </article>
        <article class="emozione-valore">
            <span>03</span>
            <h2><?php esc_html_e('Atmosfera', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Una fiamma accesa trasforma lo spazio intorno a sé e rende più intimi i momenti che scegliamo di vivere e ricordare.', 'angel-candles'); ?></p>
        </article>
    </section>

    <section class="emozioni-quote">
        <div class="emozioni-quote-inner">
            <span aria-hidden="true">“</span>
            <blockquote><?php esc_html_e('Creata per accendere un momento speciale.', 'angel-candles'); ?></blockquote>
        </div>
    </section>

    <section class="emozioni-finale">
        <figure class="emozioni-finale-image">
            <img src="<?php echo esc_url($assets . 'e49e5.png'); ?>" alt="<?php esc_attr_e('Creazione AngelCandles tra fiori e lavanda', 'angel-candles'); ?>">
        </figure>
        <div class="emozioni-finale-copy">
            <p class="emozioni-eyebrow"><?php esc_html_e('Da un’idea a una luce', 'angel-candles'); ?></p>
            <h2><?php esc_html_e('La tua emozione può diventare una creazione', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Un regalo, una ricorrenza, un evento o semplicemente un pensiero. A volte basta raccontare l’idea da cui vuoi partire.', 'angel-candles'); ?></p>
            <a class="emozioni-button" href="<?php echo esc_url(home_url('/#contatti')); ?>"><?php esc_html_e('Raccontami la tua idea', 'angel-candles'); ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
