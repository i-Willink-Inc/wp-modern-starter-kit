<?php
/**
 * The main template file.
 *
 * @package WP_Modern_Starter_Kit
 */

get_header();
?>

<main class="container mx-auto px-4 py-8">
    <div class="prose max-w-none">
        <h1 class="text-4xl font-bold text-gray-900">Modern WordPress Starter Kit</h1>
        <p class="mt-4 text-xl text-gray-600">
            Welcome to your new modern WordPress theme development utilizing Tailwind CSS.
        </p>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-8 p-6 bg-white rounded-lg shadow-sm' ); ?>>
                    <h2 class="text-2xl font-bold mb-2">
                        <a href="<?php the_permalink(); ?>" class="hover:text-blue-600"><?php the_title(); ?></a>
                    </h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No posts found.', 'wp-modern-starter-kit' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
