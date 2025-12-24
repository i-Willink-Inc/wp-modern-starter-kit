<?php
/**
 * The template for displaying all pages
 *
 * @package WP_Modern_Starter_Kit
 */

get_header(); ?>

<div class="container mx-auto px-4 py-12">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
            
            <?php if ( ! is_front_page() ) : ?>
                <header class="mb-10 text-center">
                    <?php the_title( '<h1 class="text-4xl font-bold text-gray-900 mb-6">', '</h1>' ); ?>
                </header>
            <?php endif; ?>

            <?php if ( has_post_thumbnail() && ! is_front_page() ) : ?>
                <div class="mb-12 rounded-2xl overflow-hidden shadow-lg">
                    <?php the_post_thumbnail( 'full', ['class' => 'w-full h-auto'] ); ?>
                </div>
            <?php endif; ?>

            <div class="prose prose-lg prose-blue mx-auto max-w-none">
                <?php the_content(); ?>
            </div>

        </article>

    <?php endwhile; // End of the loop.
    ?>
</div>

<?php
get_footer();
