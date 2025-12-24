<?php
/**
 * Organism: Hero Split
 *
 * Hero section with 50/50 split layout (text/image).
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => 'Hero Title',
    'description' => 'Hero description text goes here.',
    'image_url'   => '',
    'image_alt'   => '',
    'image_position' => 'right', // right, left
    'button_text' => 'Get Started',
    'button_url'  => '#',
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$is_image_left = $args['image_position'] === 'left';
?>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 <?php echo esc_attr( $args['class'] ); ?>">
    <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
        <!-- Text Content -->
        <div class="<?php echo $is_image_left ? 'lg:order-2' : 'lg:order-1'; ?> mb-10 lg:mb-0">
            <?php get_template_part('parts/atoms/heading', null, [
                'text'  => $args['title'],
                'level' => 1,
                'size'  => '2xl',
                'class' => 'mb-6 tracking-tight',
            ]); ?>
            
            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                <?php echo esc_html( $args['description'] ); ?>
            </p>
            
            <div class="flex flex-wrap gap-4">
                <?php get_template_part('parts/atoms/button', null, [
                    'text'    => $args['button_text'],
                    'url'     => $args['button_url'],
                    'variant' => 'primary',
                    'size'    => 'lg',
                ]); ?>
                <?php get_template_part('parts/atoms/button', null, [
                    'text'    => 'Learn More',
                    'url'     => '#',
                    'variant' => 'outline',
                    'size'    => 'lg',
                ]); ?>
            </div>
        </div>
        
        <!-- Image Content -->
        <div class="relative <?php echo $is_image_left ? 'lg:order-1' : 'lg:order-2'; ?>">
            <?php if ( ! empty( $args['image_url'] ) ) : ?>
                <div class="relative rounded-2xl overflow-hidden shadow-xl ring-1 ring-gray-900/10">
                    <img src="<?php echo esc_url( $args['image_url'] ); ?>" 
                         alt="<?php echo esc_attr( $args['image_alt'] ); ?>" 
                         class="w-full h-auto object-cover">
                </div>
            <?php else : ?>
                <div class="aspect-video bg-gray-200 rounded-2xl flex items-center justify-center text-gray-400">
                    <?php get_template_part('parts/atoms/icon', null, ['name' => 'image', 'size' => 'xl']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
