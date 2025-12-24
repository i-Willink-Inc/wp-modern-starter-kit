<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package WP_Modern_Starter_Kit
 */

get_header();
?>

	<main class="container mx-auto px-4 py-20 text-center">
        <div class="max-w-xl mx-auto">
            <h1 class="text-6xl font-bold text-gray-900 mb-4">404</h1>
            <p class="text-2xl text-gray-600 mb-8"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-modern-starter-kit' ); ?></p>
            
            <p class="text-gray-500 mb-8">
                <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'wp-modern-starter-kit' ); ?>
            </p>

            <div class="max-w-md mx-auto">
                <?php get_search_form(); ?>
            </div>

            <div class="mt-12">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-blue-600 hover:text-blue-800 font-medium">
                    &larr; <?php esc_html_e( 'Back to Home', 'wp-modern-starter-kit' ); ?>
                </a>
            </div>
        </div>
	</main>

<?php
get_footer();
