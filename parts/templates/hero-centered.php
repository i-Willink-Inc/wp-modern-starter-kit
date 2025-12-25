<?php
/**
 * Template: Hero Centered
 * 
 * Simple centered hero with heading, description, and CTA buttons.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'badge'       => '',
    'title'       => 'Build something amazing',
    'description' => 'Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.',
    'primary_btn' => [
        'text' => 'Get started',
        'url'  => '#',
    ],
    'secondary_btn' => [
        'text' => 'Learn more',
        'url'  => '#',
    ],
];
$args = wp_parse_args( $args ?? [], $defaults );
?>

<section class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="text-center max-w-3xl mx-auto">
            
            <?php if ( $args['badge'] ) : ?>
                <div class="mb-6">
                    <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 bg-blue-50 rounded-full">
                        <?php echo esc_html( $args['badge'] ); ?>
                    </span>
                </div>
            <?php endif; ?>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight leading-tight">
                <?php echo esc_html( $args['title'] ); ?>
            </h1>

            <p class="mt-6 text-lg sm:text-xl text-gray-600 leading-relaxed">
                <?php echo esc_html( $args['description'] ); ?>
            </p>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <?php if ( $args['primary_btn'] ) : ?>
                    <a href="<?php echo esc_url( $args['primary_btn']['url'] ); ?>" 
                       class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors w-full sm:w-auto">
                        <?php echo esc_html( $args['primary_btn']['text'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $args['secondary_btn'] ) : ?>
                    <a href="<?php echo esc_url( $args['secondary_btn']['url'] ); ?>" 
                       class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors w-full sm:w-auto">
                        <?php echo esc_html( $args['secondary_btn']['text'] ); ?>
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
