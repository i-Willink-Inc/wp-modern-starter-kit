<?php
/**
 * SEO optimizations.
 *
 * @package WP_Modern_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output meta description.
 */
function wpms_meta_description() {
	$description = '';

	if ( is_singular() ) {
		global $post;
		if ( has_excerpt( $post->ID ) ) {
			$description = get_the_excerpt( $post->ID );
		} else {
			$description = wp_trim_words( strip_shortcodes( $post->post_content ), 30, '...' );
		}
	} elseif ( is_home() || is_front_page() ) {
		$description = get_bloginfo( 'description' );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$description = term_description();
	} elseif ( is_author() ) {
		$description = get_the_author_meta( 'description' );
	}

	$description = wp_strip_all_tags( $description );

	if ( ! empty( $description ) ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'wpms_meta_description', 3 );

/**
 * Output canonical URL.
 */
function wpms_canonical_url() {
	$canonical = '';

	if ( is_singular() ) {
		$canonical = get_permalink();
	} elseif ( is_home() || is_front_page() ) {
		$canonical = home_url( '/' );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$canonical = get_term_link( get_queried_object() );
	} elseif ( is_author() ) {
		$canonical = get_author_posts_url( get_queried_object_id() );
	} elseif ( is_archive() ) {
		if ( is_date() ) {
			$canonical = get_year_link( get_query_var( 'year' ) );
		}
	}

	if ( ! empty( $canonical ) && ! is_wp_error( $canonical ) ) {
		echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'wpms_canonical_url', 4 );

/**
 * Output Open Graph meta tags.
 */
function wpms_open_graph_tags() {
	$og = array(
		'og:locale'    => get_locale(),
		'og:type'      => is_singular() ? 'article' : 'website',
		'og:site_name' => get_bloginfo( 'name' ),
	);

	// Title
	if ( is_singular() ) {
		$og['og:title'] = get_the_title();
		$og['og:url']   = get_permalink();
	} elseif ( is_home() || is_front_page() ) {
		$og['og:title'] = get_bloginfo( 'name' );
		$og['og:url']   = home_url( '/' );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$og['og:title'] = single_term_title( '', false );
		$og['og:url']   = get_term_link( get_queried_object() );
	}

	// Description
	if ( is_singular() ) {
		global $post;
		if ( has_excerpt( $post->ID ) ) {
			$og['og:description'] = get_the_excerpt( $post->ID );
		} else {
			$og['og:description'] = wp_trim_words( strip_shortcodes( $post->post_content ), 30, '...' );
		}
	} elseif ( is_home() || is_front_page() ) {
		$og['og:description'] = get_bloginfo( 'description' );
	}

	// Image
	if ( is_singular() && has_post_thumbnail() ) {
		$image_id   = get_post_thumbnail_id();
		$image_data = wp_get_attachment_image_src( $image_id, 'large' );
		if ( $image_data ) {
			$og['og:image']        = $image_data[0];
			$og['og:image:width']  = $image_data[1];
			$og['og:image:height'] = $image_data[2];
		}
	}

	// Article specific
	if ( is_singular( 'post' ) ) {
		$og['article:published_time'] = get_the_date( 'c' );
		$og['article:modified_time']  = get_the_modified_date( 'c' );
		$og['article:author']         = get_the_author();

		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$og['article:section'] = $categories[0]->name;
		}

		$tags = get_the_tags();
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				echo '<meta property="article:tag" content="' . esc_attr( $tag->name ) . '">' . "\n";
			}
		}
	}

	// Output
	foreach ( $og as $property => $content ) {
		if ( ! empty( $content ) && ! is_wp_error( $content ) ) {
			echo '<meta property="' . esc_attr( $property ) . '" content="' . esc_attr( wp_strip_all_tags( $content ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'wpms_open_graph_tags', 5 );

/**
 * Output Twitter Card meta tags.
 */
function wpms_twitter_card_tags() {
	$twitter = array(
		'twitter:card' => 'summary_large_image',
	);

	// Title
	if ( is_singular() ) {
		$twitter['twitter:title'] = get_the_title();
	} elseif ( is_home() || is_front_page() ) {
		$twitter['twitter:title'] = get_bloginfo( 'name' );
	}

	// Description
	if ( is_singular() ) {
		global $post;
		if ( has_excerpt( $post->ID ) ) {
			$twitter['twitter:description'] = get_the_excerpt( $post->ID );
		} else {
			$twitter['twitter:description'] = wp_trim_words( strip_shortcodes( $post->post_content ), 30, '...' );
		}
	} elseif ( is_home() || is_front_page() ) {
		$twitter['twitter:description'] = get_bloginfo( 'description' );
	}

	// Image
	if ( is_singular() && has_post_thumbnail() ) {
		$image_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		if ( $image_data ) {
			$twitter['twitter:image'] = $image_data[0];
		}
	}

	// Output
	foreach ( $twitter as $name => $content ) {
		if ( ! empty( $content ) ) {
			echo '<meta name="' . esc_attr( $name ) . '" content="' . esc_attr( wp_strip_all_tags( $content ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'wpms_twitter_card_tags', 6 );

/**
 * Output JSON-LD structured data.
 */
function wpms_json_ld_schema() {
	$schema = array();

	// WebSite schema (always)
	$schema[] = array(
		'@context' => 'https://schema.org',
		'@type'    => 'WebSite',
		'name'     => get_bloginfo( 'name' ),
		'url'      => home_url( '/' ),
		'potentialAction' => array(
			'@type'       => 'SearchAction',
			'target'      => home_url( '/?s={search_term_string}' ),
			'query-input' => 'required name=search_term_string',
		),
	);

	// Organization schema
	$schema[] = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Organization',
		'name'     => get_bloginfo( 'name' ),
		'url'      => home_url( '/' ),
		'logo'     => has_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '',
	);

	// Article schema for posts
	if ( is_singular( 'post' ) ) {
		global $post;
		$article = array(
			'@context'         => 'https://schema.org',
			'@type'            => 'Article',
			'headline'         => get_the_title(),
			'datePublished'    => get_the_date( 'c' ),
			'dateModified'     => get_the_modified_date( 'c' ),
			'author'           => array(
				'@type' => 'Person',
				'name'  => get_the_author(),
			),
			'publisher'        => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo( 'name' ),
			),
			'mainEntityOfPage' => get_permalink(),
		);

		if ( has_post_thumbnail() ) {
			$image_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			if ( $image_data ) {
				$article['image'] = array(
					'@type'  => 'ImageObject',
					'url'    => $image_data[0],
					'width'  => $image_data[1],
					'height' => $image_data[2],
				);
			}
		}

		if ( has_excerpt( $post->ID ) ) {
			$article['description'] = get_the_excerpt( $post->ID );
		}

		$schema[] = $article;
	}

	// BreadcrumbList schema
	if ( ! is_front_page() ) {
		$breadcrumbs = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => array(),
		);

		$position = 1;
		$breadcrumbs['itemListElement'][] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => __( 'ホーム', 'wp-modern-starter-kit' ),
			'item'     => home_url( '/' ),
		);

		if ( is_singular() ) {
			$breadcrumbs['itemListElement'][] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => get_the_title(),
				'item'     => get_permalink(),
			);
		}

		$schema[] = $breadcrumbs;
	}

	// Output
	foreach ( $schema as $item ) {
		if ( ! empty( $item['logo'] ) || $item['@type'] !== 'Organization' ) {
			echo '<script type="application/ld+json">' . wp_json_encode( $item, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
		}
	}
}
add_action( 'wp_head', 'wpms_json_ld_schema', 7 );

/**
 * Output robots meta tag.
 */
function wpms_robots_meta() {
	$robots = array();

	// Noindex for search results and archives to avoid duplicate content
	if ( is_search() ) {
		$robots[] = 'noindex';
		$robots[] = 'follow';
	}

	// Noindex for paginated pages beyond page 1
	if ( is_paged() ) {
		$robots[] = 'noindex';
		$robots[] = 'follow';
	}

	if ( ! empty( $robots ) ) {
		echo '<meta name="robots" content="' . esc_attr( implode( ', ', $robots ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'wpms_robots_meta', 8 );
