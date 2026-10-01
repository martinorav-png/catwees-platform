<?php
/**
 * Catwees 2026 theme setup.
 */

if (!defined('ABSPATH')) {
    exit;
}

function catwees_2026_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));

    register_nav_menus(array(
        'primary' => __('Primary navigation', 'catwees-2026'),
    ));
}
add_action('after_setup_theme', 'catwees_2026_setup');

function catwees_2026_asset($filename) {
    return get_template_directory_uri() . '/assets/images/' . rawurlencode($filename);
}

function catwees_2026_enqueue_assets() {
    wp_enqueue_style(
        'catwees-2026-fonts',
        'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700;800&family=IBM+Plex+Sans+Condensed:wght@600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'catwees-2026-style',
        get_stylesheet_uri(),
        array('catwees-2026-fonts'),
        '0.1.0'
    );

    wp_enqueue_script(
        'catwees-2026-app',
        get_template_directory_uri() . '/assets/js/app.js',
        array(),
        '0.1.0',
        true
    );

    wp_enqueue_script(
        'catwees-2026-lang-ru',
        get_template_directory_uri() . '/assets/js/lang-ru.js',
        array('catwees-2026-app'),
        '0.1.0',
        true
    );

    wp_localize_script('catwees-2026-app', 'catweesTheme', array(
        'assetsUrl' => get_template_directory_uri() . '/assets/images/',
    ));
}
add_action('wp_enqueue_scripts', 'catwees_2026_enqueue_assets');
