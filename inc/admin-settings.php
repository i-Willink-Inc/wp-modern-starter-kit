<?php
/**
 * Theme Settings Page.
 *
 * @package WP_Modern_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme settings page.
 */
function wpms_add_settings_page() {
	add_theme_page(
		__( 'Theme Settings', 'wp-modern-starter-kit' ),
		__( 'Theme Settings', 'wp-modern-starter-kit' ),
		'manage_options',
		'wpms-settings',
		'wpms_render_settings_page'
	);
}
add_action( 'admin_menu', 'wpms_add_settings_page' );

/**
 * Register settings.
 */
function wpms_register_settings() {
	// SEO Settings
	register_setting( 'wpms_settings', 'wpms_default_ogp_image' );
	register_setting( 'wpms_settings', 'wpms_twitter_username' );
	register_setting( 'wpms_settings', 'wpms_facebook_app_id' );

	// Analytics
	register_setting( 'wpms_settings', 'wpms_google_analytics_id' );
	register_setting( 'wpms_settings', 'wpms_gtm_container_id' );

	// Performance Settings
	register_setting( 'wpms_settings', 'wpms_disable_emoji', array(
		'default' => true,
	) );
	register_setting( 'wpms_settings', 'wpms_lazy_loading', array(
		'default' => true,
	) );
	register_setting( 'wpms_settings', 'wpms_preconnect_google_fonts', array(
		'default' => true,
	) );
	register_setting( 'wpms_settings', 'wpms_remove_wp_generator', array(
		'default' => true,
	) );

	// Add settings sections
	add_settings_section(
		'wpms_seo_section',
		__( 'SEO Settings', 'wp-modern-starter-kit' ),
		'wpms_seo_section_callback',
		'wpms-settings'
	);

	add_settings_section(
		'wpms_analytics_section',
		__( 'Analytics Settings', 'wp-modern-starter-kit' ),
		'wpms_analytics_section_callback',
		'wpms-settings'
	);

	add_settings_section(
		'wpms_performance_section',
		__( 'Performance Settings', 'wp-modern-starter-kit' ),
		'wpms_performance_section_callback',
		'wpms-settings'
	);

	// SEO Fields
	add_settings_field(
		'wpms_default_ogp_image',
		__( 'Default OGP Image', 'wp-modern-starter-kit' ),
		'wpms_ogp_image_field_callback',
		'wpms-settings',
		'wpms_seo_section'
	);

	add_settings_field(
		'wpms_twitter_username',
		__( 'Twitter Username', 'wp-modern-starter-kit' ),
		'wpms_twitter_field_callback',
		'wpms-settings',
		'wpms_seo_section'
	);

	add_settings_field(
		'wpms_facebook_app_id',
		__( 'Facebook App ID', 'wp-modern-starter-kit' ),
		'wpms_facebook_field_callback',
		'wpms-settings',
		'wpms_seo_section'
	);

	// Analytics Fields
	add_settings_field(
		'wpms_google_analytics_id',
		__( 'Google Analytics ID', 'wp-modern-starter-kit' ),
		'wpms_ga_field_callback',
		'wpms-settings',
		'wpms_analytics_section'
	);

	add_settings_field(
		'wpms_gtm_container_id',
		__( 'GTM Container ID', 'wp-modern-starter-kit' ),
		'wpms_gtm_field_callback',
		'wpms-settings',
		'wpms_analytics_section'
	);

	// Performance Fields
	add_settings_field(
		'wpms_disable_emoji',
		__( 'Remove Emoji Scripts', 'wp-modern-starter-kit' ),
		'wpms_emoji_field_callback',
		'wpms-settings',
		'wpms_performance_section'
	);

	add_settings_field(
		'wpms_lazy_loading',
		__( 'Lazy Loading Images', 'wp-modern-starter-kit' ),
		'wpms_lazy_field_callback',
		'wpms-settings',
		'wpms_performance_section'
	);

	add_settings_field(
		'wpms_preconnect_google_fonts',
		__( 'Google Fonts Preconnect', 'wp-modern-starter-kit' ),
		'wpms_preconnect_field_callback',
		'wpms-settings',
		'wpms_performance_section'
	);

	add_settings_field(
		'wpms_remove_wp_generator',
		__( 'Hide WordPress Version', 'wp-modern-starter-kit' ),
		'wpms_generator_field_callback',
		'wpms-settings',
		'wpms_performance_section'
	);
}
add_action( 'admin_init', 'wpms_register_settings' );

/**
 * Enqueue media uploader for settings page.
 *
 * @param string $hook The current admin page.
 */
function wpms_admin_enqueue_scripts( $hook ) {
	if ( 'appearance_page_wpms-settings' !== $hook ) {
		return;
	}
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'wpms_admin_enqueue_scripts' );

// Section callbacks
function wpms_seo_section_callback() {
	echo '<p>' . esc_html__( 'Settings for SNS sharing meta tags and search engine optimization.', 'wp-modern-starter-kit' ) . '</p>';
}

function wpms_analytics_section_callback() {
	echo '<p>' . esc_html__( 'Configure tracking codes for analytics tools.', 'wp-modern-starter-kit' ) . '</p>';
}

function wpms_performance_section_callback() {
	echo '<p>' . esc_html__( 'Settings for page load speed optimization.', 'wp-modern-starter-kit' ) . '</p>';
}

// Field callbacks
function wpms_ogp_image_field_callback() {
	$image_id = get_option( 'wpms_default_ogp_image' );
	$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : '';
	$select_text = esc_attr__( 'Select Image', 'wp-modern-starter-kit' );
	$choose_text = esc_attr__( 'Choose OGP Image', 'wp-modern-starter-kit' );
	$use_text = esc_attr__( 'Use this image', 'wp-modern-starter-kit' );
	?>
	<div class="wpms-image-upload">
		<input type="hidden" name="wpms_default_ogp_image" id="wpms_default_ogp_image" value="<?php echo esc_attr( $image_id ); ?>">
		<div id="wpms-ogp-preview" style="margin-bottom: 10px;">
			<?php if ( $image_url ) : ?>
				<img src="<?php echo esc_url( $image_url ); ?>" style="max-width: 300px; height: auto;">
			<?php endif; ?>
		</div>
		<button type="button" class="button" id="wpms-upload-ogp"><?php esc_html_e( 'Select Image', 'wp-modern-starter-kit' ); ?></button>
		<button type="button" class="button" id="wpms-remove-ogp" <?php echo $image_id ? '' : 'style="display:none;"'; ?>><?php esc_html_e( 'Remove', 'wp-modern-starter-kit' ); ?></button>
		<p class="description"><?php esc_html_e( 'Default OGP image used when no featured image is available (Recommended: 1200x630px)', 'wp-modern-starter-kit' ); ?></p>
	</div>
	<script>
	jQuery(document).ready(function($) {
		var mediaUploader;
		$('#wpms-upload-ogp').on('click', function(e) {
			e.preventDefault();
			if (mediaUploader) {
				mediaUploader.open();
				return;
			}
			mediaUploader = wp.media({
				title: '<?php echo esc_js( $choose_text ); ?>',
				button: { text: '<?php echo esc_js( $use_text ); ?>' },
				multiple: false
			});
			mediaUploader.on('select', function() {
				var attachment = mediaUploader.state().get('selection').first().toJSON();
				$('#wpms_default_ogp_image').val(attachment.id);
				$('#wpms-ogp-preview').html('<img src="' + attachment.sizes.medium.url + '" style="max-width: 300px; height: auto;">');
				$('#wpms-remove-ogp').show();
			});
			mediaUploader.open();
		});
		$('#wpms-remove-ogp').on('click', function(e) {
			e.preventDefault();
			$('#wpms_default_ogp_image').val('');
			$('#wpms-ogp-preview').html('');
			$(this).hide();
		});
	});
	</script>
	<?php
}

function wpms_twitter_field_callback() {
	$value = get_option( 'wpms_twitter_username' );
	?>
	<input type="text" name="wpms_twitter_username" value="<?php echo esc_attr( $value ); ?>" class="regular-text" placeholder="@username">
	<p class="description"><?php esc_html_e( 'Used for twitter:site in Twitter Cards (include @ symbol)', 'wp-modern-starter-kit' ); ?></p>
	<?php
}

function wpms_facebook_field_callback() {
	$value = get_option( 'wpms_facebook_app_id' );
	?>
	<input type="text" name="wpms_facebook_app_id" value="<?php echo esc_attr( $value ); ?>" class="regular-text" placeholder="1234567890">
	<p class="description"><?php esc_html_e( 'Used for fb:app_id in Facebook OGP', 'wp-modern-starter-kit' ); ?></p>
	<?php
}

function wpms_ga_field_callback() {
	$value = get_option( 'wpms_google_analytics_id' );
	?>
	<input type="text" name="wpms_google_analytics_id" value="<?php echo esc_attr( $value ); ?>" class="regular-text" placeholder="G-XXXXXXXXXX">
	<p class="description"><?php esc_html_e( 'Google Analytics 4 Measurement ID', 'wp-modern-starter-kit' ); ?></p>
	<?php
}

function wpms_gtm_field_callback() {
	$value = get_option( 'wpms_gtm_container_id' );
	?>
	<input type="text" name="wpms_gtm_container_id" value="<?php echo esc_attr( $value ); ?>" class="regular-text" placeholder="GTM-XXXXXXX">
	<p class="description"><?php esc_html_e( 'Google Tag Manager Container ID', 'wp-modern-starter-kit' ); ?></p>
	<?php
}

function wpms_emoji_field_callback() {
	$value = get_option( 'wpms_disable_emoji', true );
	?>
	<label>
		<input type="checkbox" name="wpms_disable_emoji" value="1" <?php checked( $value, true ); ?>>
		<?php esc_html_e( 'Remove emoji scripts to improve page speed', 'wp-modern-starter-kit' ); ?>
	</label>
	<?php
}

function wpms_lazy_field_callback() {
	$value = get_option( 'wpms_lazy_loading', true );
	?>
	<label>
		<input type="checkbox" name="wpms_lazy_loading" value="1" <?php checked( $value, true ); ?>>
		<?php esc_html_e( 'Add loading="lazy" to images', 'wp-modern-starter-kit' ); ?>
	</label>
	<?php
}

function wpms_preconnect_field_callback() {
	$value = get_option( 'wpms_preconnect_google_fonts', true );
	?>
	<label>
		<input type="checkbox" name="wpms_preconnect_google_fonts" value="1" <?php checked( $value, true ); ?>>
		<?php esc_html_e( 'Add preconnect for Google Fonts (recommended when using web fonts)', 'wp-modern-starter-kit' ); ?>
	</label>
	<?php
}

function wpms_generator_field_callback() {
	$value = get_option( 'wpms_remove_wp_generator', true );
	?>
	<label>
		<input type="checkbox" name="wpms_remove_wp_generator" value="1" <?php checked( $value, true ); ?>>
		<?php esc_html_e( 'Remove WordPress version from source code (improves security)', 'wp-modern-starter-kit' ); ?>
	</label>
	<?php
}

/**
 * Render settings page.
 */
function wpms_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error( 'wpms_messages', 'wpms_message', __( 'Settings saved.', 'wp-modern-starter-kit' ), 'updated' );
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<?php settings_errors( 'wpms_messages' ); ?>

		<form action="options.php" method="post">
			<?php
			settings_fields( 'wpms_settings' );
			do_settings_sections( 'wpms-settings' );
			submit_button( __( 'Save Settings', 'wp-modern-starter-kit' ) );
			?>
		</form>
	</div>
	<?php
}

/**
 * Helper function to get theme option.
 *
 * @param string $key     Option key.
 * @param mixed  $default Default value.
 * @return mixed Option value.
 */
function wpms_get_option( $key, $default = '' ) {
	return get_option( 'wpms_' . $key, $default );
}
