<?php
/**
 * The template for displaying all single posts
 *
 * @package WP_Modern_Starter_Kit
 */

get_header(); ?>

<div class="container mx-auto px-4 py-12">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-3xl mx-auto'); ?>>
            
            <header class="mb-10 text-center">
                <?php
                // Categories
                $categories = get_the_category();
                if ( ! empty( $categories ) ) : ?>
                    <div class="flex justify-center gap-2 mb-6">
                        <?php foreach ( $categories as $category ) : ?>
                            <?php get_template_part('parts/atoms/badge', null, [
                                'text'  => $category->name,
                                'color' => 'blue',
                                'rounded' => 'full',
                            ]); ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php the_title( '<h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6 leading-tight">', '</h1>' ); ?>

                <div class="flex items-center justify-center gap-4 text-gray-500 text-sm">
                    <div class="flex items-center gap-2">
                        <?php get_template_part('parts/atoms/icon', null, ['name' => 'user', 'size' => 'sm']); ?>
                        <span><?php echo get_the_author(); ?></span>
                    </div>
                    <span>&bull;</span>
                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="mb-12 rounded-2xl overflow-hidden shadow-lg">
                    <?php the_post_thumbnail( 'full', ['class' => 'w-full h-auto'] ); ?>
                </div>
            <?php endif; ?>

            <div class="prose prose-lg prose-blue mx-auto">
                <?php the_content(); ?>
            </div>

            <footer class="mt-16 pt-8 border-t border-gray-100">
                <?php
                // Tags
                $tags = get_the_tags();
                if ( $tags ) : ?>
                    <div class="flex flex-wrap gap-2 mb-8">
                        <?php foreach ( $tags as $tag ) : ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="text-sm text-gray-600 bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full transition-colors">
                                #<?php echo esc_html( $tag->name ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Post Navigation -->
                <div class="flex justify-between items-center py-8">
                    <div class="w-1/2 pr-4">
                        <?php 
                        $prev_post = get_previous_post();
                        if ( $prev_post ) : ?>
                            <span class="block text-xs text-gray-500 uppercase tracking-wider mb-1">Previous</span>
                            <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="font-semibold text-gray-900 hover:text-blue-600 transition-colors">
                                &larr; <?php echo get_the_title( $prev_post->ID ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="w-1/2 pl-4 text-right">
                        <?php 
                        $next_post = get_next_post();
                        if ( $next_post ) : ?>
                            <span class="block text-xs text-gray-500 uppercase tracking-wider mb-1">Next</span>
                            <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="font-semibold text-gray-900 hover:text-blue-600 transition-colors">
                                <?php echo get_the_title( $next_post->ID ); ?> &rarr;
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </footer>

        </article>

    <?php endwhile; // End of the loop.
    ?>
</div>

<?php
get_footer();
