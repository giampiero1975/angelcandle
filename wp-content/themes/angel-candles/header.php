<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $angel_assets = get_template_directory_uri() . '/assets/images/'; ?>
<div class="site-shell">
    <header class="site-header">
        <div class="brand-row">
            <a class="brand-mark-link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="AngelCandles - Torna alla home"><img class="brand-mark" src="<?php echo esc_url($angel_assets . '26594.webp'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
            <a class="brand-wordmark-link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="AngelCandles - Torna alla home"><img class="brand-wordmark" src="<?php echo esc_url($angel_assets . '12b26-small.webp'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
            <div class="social-links" aria-label="<?php esc_attr_e('Canali social', 'angel-candles'); ?>">
                <a href="https://www.facebook.com/angelcandles.it" target="_blank" rel="noopener noreferrer" aria-label="Facebook AngelCandles"><img src="<?php echo esc_url($angel_assets . '2da19.webp'); ?>" alt=""></a>
                <a href="https://www.instagram.com/angelcandles.it/" target="_blank" rel="noopener noreferrer" aria-label="Instagram AngelCandles"><img src="<?php echo esc_url($angel_assets . '8246d.webp'); ?>" alt=""></a>
                <a href="https://wa.me/393476806154?text=Ciao%2C%20vorrei%20avere%20informazioni%20su%20una%20creazione%20AngelCandles" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp AngelCandles"><img src="<?php echo esc_url($angel_assets . '04409.webp'); ?>" alt=""></a>
            </div>
            <button class="mobile-menu-toggle" type="button" aria-controls="angel-primary-nav" aria-expanded="false" aria-label="Apri il menu"><span></span><span></span><span></span><span class="menu-toggle-label">Menu</span></button>
        </div>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'main-nav',
                'container_id' => 'angel-primary-nav',
                'container_aria_label' => __('Navigazione principale', 'angel-candles'),
                'fallback_cb' => 'angel_candles_menu_fallback',
                'items_wrap' => '<ul>%3$s</ul>',
            )
        );
        ?>
        <script>
        (function () {
            var button = document.querySelector('.mobile-menu-toggle');
            var nav = document.getElementById('angel-primary-nav') || document.querySelector('.main-nav');
            if (!button || !nav) return;
            nav.id = 'angel-primary-nav';
            button.addEventListener('click', function () {
                var open = button.getAttribute('aria-expanded') !== 'true';
                button.setAttribute('aria-expanded', String(open));
                button.setAttribute('aria-label', open ? 'Chiudi il menu' : 'Apri il menu');
                nav.classList.toggle('is-open', open);
            });
            nav.addEventListener('click', function (event) {
                if (event.target.closest('a')) {
                    nav.classList.remove('is-open');
                    button.setAttribute('aria-expanded', 'false');
                    button.setAttribute('aria-label', 'Apri il menu');
                }
            });
        }());
        </script>
    </header>
