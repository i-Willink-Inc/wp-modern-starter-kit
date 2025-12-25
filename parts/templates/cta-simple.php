<?php
/**
 * Template: CTA Simple
 * 
 * Simple centered CTA with buttons.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'       => 'Ready to get started?',
    'description' => 'Start your free trial today and see how our platform can transform your business.',
    'primary_btn' => [
        'text' => 'Get started',
        'url'  => '#',
    ],
    'secondary_btn' => [
        'text' => 'Learn more',
        'url'  => '#',
    ],
    'variant'     => 'light', // light, dark, gradient
];
$args = wp_parse_args( $args ?? [], $defaults );

$variants = [
    'light' => [
        'bg'           => 'bg-gray-50',
        'title'        => 'text-gray-900',
        'description'  => 'text-gray-600',
        'primary'      => 'bg-blue-600 text-white hover:bg-blue-700',
        'secondary'    => 'text-gray-900 hover:text-gray-700',
    ],
    'dark' => [
        'bg'           => 'bg-gray-900',
        'title'        => 'text-white',
        'description'  => 'text-gray-300',
        'primary'      => 'bg-white text-gray-900 hover:bg-gray-100',
        'secondary'    => 'text-white hover:text-gray-300',
    ],
    'gradient' => [
        'bg'           => 'bg-gradient-to-r from-blue-600 to-indigo-700',
        'title'        => 'text-white',
        'description'  => 'text-blue-100',
        'primary'      => 'bg-white text-blue-600 hover:bg-blue-50',
        'secondary'    => 'text-white hover:text-blue-100',
    ],
];
$styles = $variants[ $args['variant'] ] ?? $variants['light'];
?>

<section class="<?php echo esc_attr( $styles['bg'] ); ?>">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <div class="text-center max-w-2xl mx-auto">
            <h2 class="text-3xl font-bold tracking-tight <?php echo esc_attr( $styles['title'] ); ?> sm:text-4xl">
                <?php echo esc_html( $args['title'] ); ?>
            </h2>
            
            <p class="mt-6 text-lg leading-8 <?php echo esc_attr( $styles['description'] ); ?>">
                <?php echo esc_html( $args['description'] ); ?>
            </p>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <?php if ( $args['primary_btn'] ) : ?>
                    <a href="<?php echo esc_url( $args['primary_btn']['url'] ); ?>" 
                       class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold rounded-lg shadow-sm transition-colors <?php echo esc_attr( $styles['primary'] ); ?>">
                        <?php echo esc_html( $args['primary_btn']['text'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $args['secondary_btn'] ) : ?>
                    <a href="<?php echo esc_url( $args['secondary_btn']['url'] ); ?>" 
                       class="text-base font-semibold leading-6 transition-colors <?php echo esc_attr( $styles['secondary'] ); ?>">
                        <?php echo esc_html( $args['secondary_btn']['text'] ); ?> 
                        <span aria-hidden="true">→</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
