<?php

if (!defined('ABSPATH')) {
    exit;
}

function angelcandle_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('custom-logo', [
        'height'      => 180,
        'width'       => 180,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => __('Menu principale', 'angelcandle'),
        'footer'  => __('Menu footer', 'angelcandle'),
    ]);
}
add_action('after_setup_theme', 'angelcandle_theme_setup');

function angelcandle_enqueue_assets(): void
{
    wp_enqueue_style(
        'angelcandle-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script(
        'angelcandle-theme',
        get_template_directory_uri() . '/assets/js/theme.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'angelcandle_enqueue_assets');

function angelcandle_primary_menu_fallback(): void
{
    $items = [
        ['HOME', home_url('/')],
        ['CANDELE', class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/shop/')],
        ['COLLEZIONI', home_url('/collezioni/')],
        ['PERSONALIZZA', home_url('/personalizza/')],
        ['EVENTI', home_url('/eventi/')],
        ['CHI SIAMO', home_url('/chi-siamo/')],
    ];

    echo '<ul class="ac-nav__menu">';
    foreach ($items as [$label, $url]) {
        printf(
            '<li><a href="%s">%s</a></li>',
            esc_url($url),
            esc_html($label)
        );
    }
    echo '</ul>';
}
