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
