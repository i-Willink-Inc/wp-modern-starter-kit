<?php
/**
 * Performance optimizations.
 *
 * @package WP_Modern_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add native lazy loading to images.
 *
 * @param string $content The post content.
 * @return string Modified content with lazy loading.
 */
function wpms_add_lazy_loading( $content ) {
	// Check if lazy loading is enabled in settings
	if ( ! get_option( 'wpms_lazy_loading', true ) ) {
		return $content;
	}

	// WordPress 5.5+ adds loading="lazy" by default, but ensure it's applied
	if ( ! preg_match( '/loading=["\']/', $content ) ) {
		$content = preg_replace(
			'/<img([^>]+)>/i',
			'<img$1 loading="lazy">',
			$content
		);
	}
	return $content;
}
add_filter( 'the_content', 'wpms_add_lazy_loading', 15 );
add_filter( 'post_thumbnail_html', 'wpms_add_lazy_loading', 15 );
add_filter( 'get_avatar', 'wpms_add_lazy_loading', 15 );

/**
 * Add fetchpriority="high" to above-the-fold images.
 *
 * @param array  $attr       Attributes for the image markup.
 * @param object $attachment Image attachment post.
 * @param string $size       Requested image size.
 * @return array Modified attributes.
 */
function wpms_add_fetchpriority( $attr, $attachment, $size ) {
	// Add fetchpriority for featured images on singular pages
	if ( is_singular() && in_the_loop() && is_main_query() ) {
		$attr['fetchpriority'] = 'high';
		$attr['loading'] = 'eager'; // Override lazy loading for hero images
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'wpms_add_fetchpriority', 10, 3 );

/**
 * Add resource hints for performance.
 */
function wpms_add_resource_hints() {
	// DNS Prefetch for common third-party services
	$dns_prefetch = array(
		'//www.google-analytics.com',
		'//www.googletagmanager.com',
	);

	// Add Google Fonts if enabled in settings
	if ( get_option( 'wpms_preconnect_google_fonts', true ) ) {
		$dns_prefetch[] = '//fonts.googleapis.com';
		$dns_prefetch[] = '//fonts.gstatic.com';
	}

	foreach ( $dns_prefetch as $url ) {
		echo '<link rel="dns-prefetch" href="' . esc_url( $url ) . '">' . "\n";
	}

	// Preconnect for Google Fonts if enabled
	if ( get_option( 'wpms_preconnect_google_fonts', true ) ) {
		echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
		echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	}
}
add_action( 'wp_head', 'wpms_add_resource_hints', 1 );

/**
 * Preload critical CSS.
 */
function wpms_preload_critical_assets() {
	$style_path = get_template_directory() . '/dist/style.css';
	$style_uri  = get_template_directory_uri() . '/dist/style.css';

	if ( file_exists( $style_path ) ) {
		echo '<link rel="preload" href="' . esc_url( $style_uri ) . '" as="style">' . "\n";
	}
}
add_action( 'wp_head', 'wpms_preload_critical_assets', 2 );

/**
 * Add defer/async to scripts.
 *
 * @param string $tag    Script HTML tag.
 * @param string $handle Script handle.
 * @param string $src    Script source URL.
 * @return string Modified script tag.
 */
function wpms_defer_scripts( $tag, $handle, $src ) {
	// Scripts to defer
	$defer_scripts = array(
		'comment-reply',
		'wp-embed',
	);

	// Scripts to load async
	$async_scripts = array();

	if ( in_array( $handle, $defer_scripts, true ) ) {
		return str_replace( ' src=', ' defer src=', $tag );
	}

	if ( in_array( $handle, $async_scripts, true ) ) {
		return str_replace( ' src=', ' async src=', $tag );
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'wpms_defer_scripts', 10, 3 );

/**
 * Remove unnecessary WordPress features for performance.
 */
function wpms_remove_bloat() {
	// Remove emoji scripts if enabled in settings
	if ( get_option( 'wpms_disable_emoji', true ) ) {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	}

	// Remove RSD link
	remove_action( 'wp_head', 'rsd_link' );

	// Remove Windows Live Writer manifest
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Remove WordPress version if enabled in settings
	if ( get_option( 'wpms_remove_wp_generator', true ) ) {
		remove_action( 'wp_head', 'wp_generator' );
	}

	// Remove shortlink
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );

	// Remove REST API link
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

	// Remove oEmbed discovery links
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'init', 'wpms_remove_bloat' );

/**
 * Disable emoji DNS prefetch if emoji is disabled.
 *
 * @param array  $urls          URLs to prefetch.
 * @param string $relation_type The relation type.
 * @return array Filtered URLs.
 */
function wpms_disable_emoji_dns_prefetch( $urls, $relation_type ) {
	if ( ! get_option( 'wpms_disable_emoji', true ) ) {
		return $urls;
	}

	if ( 'dns-prefetch' === $relation_type ) {
		$urls = array_filter( $urls, function( $url ) {
			return ! str_contains( $url, 'emoji' );
		});
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'wpms_disable_emoji_dns_prefetch', 10, 2 );

/**
 * Add decoding="async" to images.
 *
 * @param string $content The content.
 * @return string Modified content.
 */
function wpms_add_image_decoding( $content ) {
	if ( ! preg_match( '/decoding=["\']/', $content ) ) {
		$content = preg_replace(
			'/<img([^>]+)>/i',
			'<img$1 decoding="async">',
			$content
		);
	}
	return $content;
}
add_filter( 'the_content', 'wpms_add_image_decoding', 16 );
add_filter( 'post_thumbnail_html', 'wpms_add_image_decoding', 16 );
