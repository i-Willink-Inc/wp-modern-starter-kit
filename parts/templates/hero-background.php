<?php
/**
 * Template: Hero Background Image
 * 
 * Full-width hero with background image overlay.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'       => 'Transform your workflow',
    'description' => 'Start building your next great idea with our powerful platform.',
    'primary_btn' => [
        'text' => 'Get started for free',
        'url'  => '#',
    ],
    'secondary_btn' => [
        'text' => 'Watch demo',
        'url'  => '#',
    ],
    'image'       => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2830&q=80',
    'overlay'     => 'gradient', // gradient, dark, light
];
$args = wp_parse_args( $args ?? [], $defaults );

$overlay_classes = [
    'gradient' => 'bg-gradient-to-r from-gray-900/90 to-gray-900/40',
    'dark'     => 'bg-gray-900/70',
    'light'    => 'bg-white/80',
];
$overlay = $overlay_classes[ $args['overlay'] ] ?? $overlay_classes['gradient'];
$text_color = $args['overlay'] === 'light' ? 'text-gray-900' : 'text-white';
$text_muted = $args['overlay'] === 'light' ? 'text-gray-600' : 'text-gray-200';
?>

<section class="relative isolate overflow-hidden">
    <!-- Background Image -->
    <img src="<?php echo esc_url( $args['image'] ?? '' ); ?>" 
         alt="" 
         class="absolute inset-0 -z-10 h-full w-full object-cover"
         loading="lazy">

    <!-- Overlay -->
    <div class="absolute inset-0 -z-10 <?php echo esc_attr( $overlay ); ?>"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32 lg:py-48">
        <div class="max-w-2xl">
            <h1 class="text-4xl font-bold tracking-tight <?php echo esc_attr( $text_color ); ?> sm:text-5xl lg:text-6xl">
                <?php echo esc_html( $args['title'] ?? '' ); ?>
            </h1>

            <p class="mt-6 text-lg leading-8 <?php echo esc_attr( $text_muted ); ?>">
                <?php echo esc_html( $args['description'] ?? '' ); ?>
            </p>

            <div class="mt-10 flex flex-col sm:flex-row items-start gap-4">
                <?php if ( ! empty( $args['primary_btn'] ) ) : ?>
                    <a href="<?php echo esc_url( $args['primary_btn']['url'] ); ?>" 
                       class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-500 transition-colors w-full sm:w-auto">
                        <?php echo esc_html( $args['primary_btn']['text'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( ! empty( $args['secondary_btn'] ) ) : ?>
                    <a href="<?php echo esc_url( $args['secondary_btn']['url'] ); ?>" 
                       class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold <?php echo esc_attr( $text_color ); ?> hover:opacity-80 transition-opacity w-full sm:w-auto">
                        <svg class="mr-2 w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                        <?php echo esc_html( $args['secondary_btn']['text'] ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
