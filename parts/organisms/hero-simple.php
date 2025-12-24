<?php
/**
 * Component: Hero Simple
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => 'Default Title',
    'description' => 'Default description goes here.',
    'button_text' => 'Learn More',
    'button_url'  => '#',
    'image_url'   => '',
    'bg_color'    => 'bg-gray-100',
];
$args = wp_parse_args( $args, $defaults );
?>

<section class="relative <?php echo esc_attr( $args['bg_color'] ); ?> py-20 lg:py-32 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                <?php echo esc_html( $args['title'] ); ?>
            </h1>
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                <?php echo esc_html( $args['description'] ); ?>
            </p>
            <?php if ( ! empty( $args['button_text'] ) ) : ?>
                <a href="<?php echo esc_url( $args['button_url'] ); ?>" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-white rounded-lg bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out">
                    <?php echo esc_html( $args['button_text'] ); ?>
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
    
    <?php if ( ! empty( $args['image_url'] ) ) : ?>
        <div class="absolute inset-y-0 right-0 w-full lg:w-1/2 opacity-20 lg:opacity-100">
             <img src="<?php echo esc_url( $args['image_url'] ); ?>" class="w-full h-full object-cover" alt="">
             <!-- Gradient overlay for better text readability on mobile if needed -->
             <div class="absolute inset-0 bg-gradient-to-r from-gray-100 via-gray-100/80 to-transparent lg:hidden"></div>
        </div>
    <?php endif; ?>
</section>
