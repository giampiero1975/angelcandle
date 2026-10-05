<?php

if (!defined('ABSPATH')) { exit; }

function angel_candles_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array('primary' => __('Menu principale', 'angel-candles')));
}
add_action('after_setup_theme', 'angel_candles_setup');

function angel_candles_assets(): void
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('angel-candles-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $version);

    if (is_post_type_archive('angel_creazione') || is_singular('angel_creazione') || is_tax('angel_creazione_categoria')) {
        wp_enqueue_style('angel-candles-creazioni', get_template_directory_uri() . '/assets/css/creazioni.css', array('angel-candles-theme'), $version);
        wp_enqueue_script('angel-candles-creazioni', get_template_directory_uri() . '/assets/js/creazioni.js', array(), $version, true);
    }
    if (is_page('candele') || is_page_template('page-candele.php')) {
        wp_enqueue_style('angel-candles-candele', get_template_directory_uri() . '/assets/css/candele.css', array('angel-candles-theme'), $version);
    }
    if (is_page('eventi') || is_page_template('page-eventi.php')) {
        wp_enqueue_style('angel-candles-eventi', get_template_directory_uri() . '/assets/css/eventi.css', array('angel-candles-theme'), $version);
    }
    if (is_page('emozioni') || is_page_template('page-emozioni.php')) {
        wp_enqueue_style('angel-candles-emozioni', get_template_directory_uri() . '/assets/css/emozioni.css', array('angel-candles-theme'), $version);
    }
    if (is_page('contatti') || is_page_template('page-contatti.php')) {
        wp_enqueue_style('angel-candles-contatti', get_template_directory_uri() . '/assets/css/contatti.css', array('angel-candles-theme'), $version);
    }
    if (is_page(array('privacy', 'cookie', 'note-legali')) || is_page_template(array('page-privacy.php', 'page-cookie.php', 'page-note-legali.php'))) {
        wp_enqueue_style('angel-candles-legal', get_template_directory_uri() . '/assets/css/legal.css', array('angel-candles-theme'), $version);
    }
}
add_action('wp_enqueue_scripts', 'angel_candles_assets');

function angel_candles_menu_fallback(): void
{
    $creazioni_url = get_post_type_archive_link('angel_creazione');
    echo '<nav class="main-nav" aria-label="' . esc_attr__('Navigazione principale', 'angel-candles') . '">';
    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    echo '<a href="' . esc_url(home_url('/candele/')) . '">Candele</a>';
    echo '<a href="' . esc_url($creazioni_url ?: home_url('/creazioni/')) . '">Creazioni</a>';
    echo '<a href="' . esc_url(home_url('/eventi/')) . '">Eventi</a>';
    echo '<a href="' . esc_url(home_url('/emozioni/')) . '">Emozioni</a>';
    echo '<a href="' . esc_url(home_url('/contatti/')) . '">Contatti</a>';
    echo '</nav>';
}
