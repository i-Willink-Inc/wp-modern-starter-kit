<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Modern_Starter_Kit
 */

get_header(); ?>

<div class="container mx-auto px-4 py-12">
    <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="mb-12 text-center max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-900 mb-4"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                
                $categories = get_the_category();
                $badge_text = ! empty( $categories ) ? $categories[0]->name : 'Blog';
                $badge_color = 'blue';

                get_template_part('parts/organisms/card', null, [
                    'title'       => get_the_title(),
                    'description' => get_the_excerpt(),
                    'image_url'   => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: '',
                    'badge'       => $badge_text,
                    'badge_color' => $badge_color,
                    'url'         => get_permalink(),
                ]);

            endwhile;
            ?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php
            the_posts_pagination( array(
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
            ) );
            ?>
        </div>

    <?php else : ?>

        <div class="text-center py-20 bg-gray-50 rounded-xl">
            <p class="text-lg text-gray-600">Ready to publish your first post? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="text-blue-600 hover:underline">Get started here</a>.</p>
        </div>

    <?php endif; ?>

</div>

<?php
get_footer();
