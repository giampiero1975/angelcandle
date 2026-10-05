<?php
/**
 * Plugin Name: AngelCandle Core
 * Description: Logica applicativa specifica di AngelCandle: personalizzazioni, eventi e futuro magazzino materie prime.
 * Version: 0.1.0
 * Author: AngelCandle
 * Text Domain: angelcandle-core
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ANGELCANDLE_CORE_VERSION', '0.1.0');

/*
 * Regola architetturale:
 * WooCommerce gestisce catalogo, carrello, checkout, ordini, pagamenti,
 * clienti, spedizioni e stock dei prodotti finiti.
 *
 * Questo plugin contiene esclusivamente funzionalita specifiche AngelCandle.
 */

/**
 * Custom Post Type: Creazioni
 */
function angelcandle_register_creazioni_post_type(): void
{
    $labels = [
        'name'               => 'Creazioni',
        'singular_name'      => 'Creazione',
        'menu_name'          => 'Creazioni',
        'name_admin_bar'     => 'Creazione',
        'add_new'            => 'Aggiungi nuova',
        'add_new_item'       => 'Aggiungi nuova creazione',
        'new_item'           => 'Nuova creazione',
        'edit_item'          => 'Modifica creazione',
        'view_item'          => 'Visualizza creazione',
        'all_items'          => 'Tutte le creazioni',
        'search_items'       => 'Cerca creazioni',
        'not_found'          => 'Nessuna creazione trovata',
        'not_found_in_trash' => 'Nessuna creazione nel cestino',
    ];

    register_post_type('angel_creazione', [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-art',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'creazioni'],
        'menu_position' => 20,
    ]);
}
add_action('init', 'angelcandle_register_creazioni_post_type');

/**
 * Tassonomia: Categorie Creazioni
 */
function angelcandle_register_creazioni_taxonomy(): void
{
    $labels = [
        'name' => 'Categorie creazioni',
        'singular_name' => 'Categoria creazione',
        'search_items' => 'Cerca categorie',
        'all_items' => 'Tutte le categorie',
        'edit_item' => 'Modifica categoria',
        'update_item' => 'Aggiorna categoria',
        'add_new_item' => 'Aggiungi nuova categoria',
        'new_item_name' => 'Nome nuova categoria',
        'menu_name' => 'Categorie',
    ];

    register_taxonomy('angel_creazione_categoria', ['angel_creazione'], [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'creazioni/categoria'],
    ]);
}
add_action('init', 'angelcandle_register_creazioni_taxonomy');

require_once __DIR__ . '/includes/creazioni-gallery.php';
require_once __DIR__ . '/includes/contact-form.php';
