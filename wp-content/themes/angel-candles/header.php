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
            <img class="brand-mark" src="<?php echo esc_url($angel_assets . '26594.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <img class="brand-wordmark" src="<?php echo esc_url($angel_assets . '12b26.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <div class="social-links" aria-label="<?php esc_attr_e('Canali social', 'angel-candles'); ?>">
                <a href="#contatti" aria-label="Facebook"><img src="<?php echo esc_url($angel_assets . '2da19.png'); ?>" alt=""></a>
                <a href="#contatti" aria-label="Instagram"><img src="<?php echo esc_url($angel_assets . '8246d.png'); ?>" alt=""></a>
                <a href="#contatti" aria-label="Pinterest"><img src="<?php echo esc_url($angel_assets . '04409.png'); ?>" alt=""></a>
            </div>
        </div>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'main-nav',
                'container_aria_label' => __('Navigazione principale', 'angel-candles'),
                'fallback_cb' => 'angel_candles_menu_fallback',
                'items_wrap' => '<ul>%3$s</ul>',
            )
        );
        ?>
    </header>
