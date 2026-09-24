<?php

if (!defined('ABSPATH')) {
    exit;
}

function angelcandle_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

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
}
add_action('wp_enqueue_scripts', 'angelcandle_enqueue_assets');
