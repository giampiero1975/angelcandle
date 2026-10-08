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
    $theme_css_path = get_template_directory() . '/assets/css/theme.css';
    $theme_css_version = file_exists($theme_css_path) ? (string) filemtime($theme_css_path) : $version;
    wp_enqueue_style('angel-candles-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme_css_version);

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

/**
 * Homepage experiment: inline the small main stylesheet to remove its
 * render-blocking network request without changing CSS order or appearance.
 * Other pages keep the normal, browser-cacheable stylesheet.
 */
function angel_candles_inline_home_css(string $html, string $handle): string
{
    if ($handle !== 'angel-candles-theme' || !is_front_page()) {
        return $html;
    }

    $path = get_template_directory() . '/assets/css/theme.css';
    if (!is_readable($path)) {
        return $html;
    }

    $css = file_get_contents($path);
    if ($css === false || $css === '') {
        return $html;
    }

    // Relative font URLs must resolve against the CSS directory even when inlined.
    $fonts_url = esc_url_raw(get_template_directory_uri() . '/assets/fonts/');
    $css = str_replace('../fonts/', $fonts_url, $css);

    return '<style id="angel-candles-theme-inline-css">' . str_ireplace('</style', '<\\/style', $css) . '</style>' . "\\n";
}
add_filter('style_loader_tag', 'angel_candles_inline_home_css', 10, 2);


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

/** Serve WebP variants for uploaded images when a matching file exists. */
function angel_candles_webp_upload_url(string $url): string
{
    if ($url === '') {
        return $url;
    }
    $uploads = wp_get_upload_dir();
    if (!empty($uploads['error'])) {
        return $url;
    }
    $base_url = rtrim($uploads['baseurl'], '/');
    $base_dir = rtrim($uploads['basedir'], '/');
    if (strpos($url, $base_url . '/') !== 0) {
        return $url;
    }
    $relative = substr($url, strlen($base_url));
    if (!preg_match('/\\.(?:png|jpe?g)$/i', $relative)) {
        return $url;
    }
    $webp_relative = preg_replace('/\\.(?:png|jpe?g)$/i', '.webp', $relative);
    if ($webp_relative && is_file($base_dir . $webp_relative)) {
        return $base_url . $webp_relative;
    }
    return $url;
}
