<?php
/**
 * The template for displaying search results pages
 *
 * @package WP_Modern_Starter_Kit
 */

get_header(); ?>

<div class="container mx-auto px-4 py-12">
    <header class="mb-12 text-center max-w-3xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( 'Search Results for: %s', 'wp-modern-starter-kit' ), '<span>' . get_search_query() . '</span>' );
            ?>
        </h1>
        
        <div class="mt-8 max-w-xl mx-auto">
            <?php get_template_part('parts/molecules/search-form', null, ['placeholder' => 'Search again...']); ?>
        </div>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                
                // Similar logic to archive.php
                $badge_text = get_post_type(); // Default to post type
                $badge_color = 'gray';

                if ( 'post' === get_post_type() ) {
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        $badge_text = $categories[0]->name;
                        $badge_color = 'blue';
                    }
                }

                get_template_part('parts/organisms/card', null, [
                    'title'       => get_the_title(),
                    'description' => get_the_excerpt(),
                    'image_url'   => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: '',
                    'badge'       => ucfirst($badge_text),
                    'badge_color' => $badge_color,
                    'url'         => get_permalink(),
                ]);

            endwhile;
            ?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php
                the_posts_pagination( array(
                    'prev_text' => '<span class="sr-only">Previous</span>&larr;',
                    'next_text' => '<span class="sr-only">Next</span>&rarr;',
                    'class'     => 'flex gap-4 font-medium'
                ) );
            ?>
        </div>

    <?php else : ?>

        <div class="text-center py-20 bg-gray-50 rounded-xl">
            <?php get_template_part('parts/atoms/heading', null, [
                'text'  => 'No matches found',
                'level' => 2,
                'size'  => 'xl',
                'class' => 'mb-4',
            ]); ?>
            <p class="text-gray-600">Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
        </div>

    <?php endif; ?>

</div>

<?php
get_footer();
