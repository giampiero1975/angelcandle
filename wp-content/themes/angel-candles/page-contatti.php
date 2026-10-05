<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$assets = get_template_directory_uri() . '/assets/images/';
$status = isset($_GET['contact']) ? sanitize_key(wp_unslash($_GET['contact'])) : '';
?>

<main class="contatti-page">
    <section class="contatti-hero" aria-labelledby="contatti-title">
        <div class="contatti-hero-copy">
            <span class="contatti-kicker"><?php esc_html_e('Contatti', 'angel-candles'); ?></span>
            <h1 id="contatti-title"><?php esc_html_e('Raccontami la tua idea', 'angel-candles'); ?></h1>
            <p><?php esc_html_e('Un regalo, un evento o una candela pensata per un momento speciale? Scrivi qualche dettaglio: da una semplice idea può nascere qualcosa di unico.', 'angel-candles'); ?></p>
        </div>
        <figure class="contatti-hero-image">
            <img src="<?php echo esc_url($assets . 'e49e5.png'); ?>" alt="<?php esc_attr_e('Creazione AngelCandles tra fiori e lavanda', 'angel-candles'); ?>">
        </figure>
    </section>

    <section class="contatti-content">
        <div class="contatti-form-wrap">
            <p class="contatti-eyebrow"><?php esc_html_e('Scrivi ad AngelCandles', 'angel-candles'); ?></p>
            <h2><?php esc_html_e('Parliamo della tua idea', 'angel-candles'); ?></h2>

            <?php if ($status === 'sent') : ?>
                <div class="contatti-alert contatti-alert-success" role="status"><?php esc_html_e('Messaggio inviato. Grazie! Ti risponderemo appena possibile.', 'angel-candles'); ?></div>
            <?php elseif ($status === 'error') : ?>
                <div class="contatti-alert contatti-alert-error" role="alert"><?php esc_html_e('Non è stato possibile inviare il messaggio. Riprova tra poco.', 'angel-candles'); ?></div>
            <?php endif; ?>

            <form class="contatti-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate>
                <input type="hidden" name="action" value="angelcandle_contact">
                <input type="hidden" name="form_started" value="<?php echo esc_attr(time()); ?>">
                <?php wp_nonce_field('angelcandle_contact_submit', 'angelcandle_contact_nonce'); ?>

                <div class="contatti-hp" aria-hidden="true">
                    <label for="website">Website</label>
                    <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
                </div>

                <div class="contatti-field-row">
                    <div class="contatti-field">
                        <label for="ac-name"><?php esc_html_e('Nome', 'angel-candles'); ?></label>
                        <input id="ac-name" name="name" type="text" maxlength="80" autocomplete="name" required>
                    </div>
                    <div class="contatti-field">
                        <label for="ac-email"><?php esc_html_e('Email', 'angel-candles'); ?></label>
                        <input id="ac-email" name="email" type="email" maxlength="160" autocomplete="email" required>
                    </div>
                </div>

                <div class="contatti-field">
                    <label for="ac-reason"><?php esc_html_e('Motivo del contatto', 'angel-candles'); ?></label>
                    <select id="ac-reason" name="reason" required>
                        <option value=""><?php esc_html_e('Seleziona…', 'angel-candles'); ?></option>
                        <option value="candela"><?php esc_html_e('Candela personalizzata', 'angel-candles'); ?></option>
                        <option value="evento"><?php esc_html_e('Evento o cerimonia', 'angel-candles'); ?></option>
                        <option value="regalo"><?php esc_html_e('Idea regalo', 'angel-candles'); ?></option>
                        <option value="altro"><?php esc_html_e('Altro', 'angel-candles'); ?></option>
                    </select>
                </div>

                <div class="contatti-field">
                    <label for="ac-message"><?php esc_html_e('Messaggio', 'angel-candles'); ?></label>
                    <textarea id="ac-message" name="message" rows="7" minlength="10" maxlength="3000" required></textarea>
                </div>

                <label class="contatti-privacy">
                    <input name="privacy" type="checkbox" value="1" required>
                    <span><?php esc_html_e('Ho letto l’informativa privacy e acconsento al trattamento dei dati necessari per rispondere alla richiesta.', 'angel-candles'); ?></span>
                </label>

                <?php if (function_exists('angelcandle_turnstile_site_key') && angelcandle_turnstile_site_key()) : ?>
                    <div class="cf-turnstile" data-sitekey="<?php echo esc_attr(angelcandle_turnstile_site_key()); ?>"></div>
                <?php endif; ?>

                <button class="contatti-submit" type="submit"><?php esc_html_e('Invia messaggio', 'angel-candles'); ?></button>
                <p class="contatti-security-note"><?php esc_html_e('Il modulo utilizza controlli automatici anti-spam e anti-abuso.', 'angel-candles'); ?></p>
            </form>
        </div>

        <aside class="contatti-side">
            <p class="contatti-eyebrow"><?php esc_html_e('AngelCandles', 'angel-candles'); ?></p>
            <h2><?php esc_html_e('Ogni richiesta parte da una storia diversa.', 'angel-candles'); ?></h2>
            <p><?php esc_html_e('Per aiutarti al meglio, racconta l’occasione, i colori che immagini, lo stile e — se già la conosci — la quantità indicativa. Non servono idee perfette: possiamo partire anche da pochi dettagli.', 'angel-candles'); ?></p>
            <div class="contatti-side-note">
                <strong><?php esc_html_e('Per eventi e cerimonie', 'angel-candles'); ?></strong>
                <span><?php esc_html_e('Indica anche la data prevista: aiuta a valutare tempi e possibilità di realizzazione.', 'angel-candles'); ?></span>
            </div>
        </aside>
    </section>
</main>

<?php get_footer(); ?>
