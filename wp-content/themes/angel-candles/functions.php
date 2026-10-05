<?php

if (!defined('ABSPATH')) {
    exit;
}

function angel_candles_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));

    register_nav_menus(
        array(
            'primary' => __('Menu principale', 'angel-candles'),
        )
    );
}
add_action('after_setup_theme', 'angel_candles_setup');

function angel_candles_assets(): void
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'angel-candles-theme',
        get_template_directory_uri() . '/assets/css/theme.css',
        array(),
        $version
    );

    if (
        is_post_type_archive('angel_creazione') ||
        is_singular('angel_creazione') ||
        is_tax('angel_creazione_categoria')
    ) {
        wp_enqueue_style(
            'angel-candles-creazioni',
            get_template_directory_uri() . '/assets/css/creazioni.css',
            array('angel-candles-theme'),
            $version
        );

        wp_enqueue_script(
            'angel-candles-creazioni',
            get_template_directory_uri() . '/assets/js/creazioni.js',
            array(),
            $version,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'angel_candles_assets');

function angel_candles_menu_fallback(): void
{
    echo '<nav class="main-nav" aria-label="' . esc_attr__('Navigazione principale', 'angel-candles') . '">';
    echo '<a href="#home">Home</a>';
    echo '<a href="#candele">Candele</a>';
    echo '<a href="#creazioni">Creazioni</a>';
    echo '<a href="#eventi">Eventi</a>';
    echo '<a href="#chi-sono">Chi sono</a>';
    echo '<a href="#contatti">Contatti</a>';
    echo '</nav>';
}
