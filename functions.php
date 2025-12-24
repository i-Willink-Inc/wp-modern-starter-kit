<?php
/**
 * Theme functions and definitions.
 *
 * @package WP_Modern_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
function wp_modern_starter_kit_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );
    $style_path    = get_template_directory() . '/dist/style.css';
    $style_uri     = get_template_directory_uri() . '/dist/style.css';

    // Basic check if file exists to avoid errors on fresh clone before build
    if ( file_exists( $style_path ) ) {
	    wp_enqueue_style( 'wp-modern-starter-kit-style', $style_uri, array(), filemtime($style_path) );
    } else {
        // Fallback or dev warning could go here
    }
}
add_action( 'wp_enqueue_scripts', 'wp_modern_starter_kit_scripts' );

/**
 * Theme setup.
 */
function wp_modern_starter_kit_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wp-modern-starter-kit' ),
		)
	);
}
add_action( 'after_setup_theme', 'wp_modern_starter_kit_setup' );
