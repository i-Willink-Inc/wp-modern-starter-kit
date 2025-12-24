<?php
/**
 * The template for displaying archive pages
 *
 * @package WP_Modern_Starter_Kit
 */

get_header(); ?>

<div class="container mx-auto px-4 py-12">
    <header class="mb-12 text-center max-w-3xl mx-auto">
        <?php
        the_archive_title( '<h1 class="text-4xl font-bold text-gray-900 mb-4">', '</h1>' );
        the_archive_description( '<div class="text-lg text-gray-600">', '</div>' );
        ?>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                
                // Prepare data for the Card organism
                $badge_text = '';
                $badge_color = 'gray';
                
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    $badge_text = $categories[0]->name;
                    // basic color logic based on ID or name hash could go here, defaulting to blue for now
                    $badge_color = 'blue'; 
                }

                get_template_part('parts/organisms/card', null, [
                    'title'       => get_the_title(),
                    'description' => get_the_excerpt(),
                    'image_url'   => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: '', // Fallback or empty
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
                'prev_text' => '<span class="sr-only">Previous</span>' . 
                               '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>',
                'next_text' => '<span class="sr-only">Next</span>' . 
                               '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
                'class'     => 'flex gap-2'
            ) );
            ?>
        </div>

    <?php else : ?>

        <div class="text-center py-20 bg-gray-50 rounded-xl">
            <?php get_template_part('parts/atoms/heading', null, [
                'text'  => 'Nothing Found',
                'level' => 2,
                'size'  => 'xl',
                'class' => 'mb-4',
            ]); ?>
            <p class="text-gray-600 mb-8">It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
            
            <div class="max-w-md mx-auto">
                <?php get_template_part('parts/molecules/search-form'); ?>
            </div>
        </div>

    <?php endif; ?>

</div>

<?php
get_footer();
