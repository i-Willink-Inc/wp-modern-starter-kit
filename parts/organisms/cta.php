<?php
/**
 * Organism: CTA (Call to Action)
 *
 * A section to prompt user action.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'           => 'Ready to get started?',
    'description'     => '',
    'button_text'     => 'Get Started',
    'button_url'      => '#',
    'button_variant'  => 'primary',
    'secondary_text'  => '',
    'secondary_url'   => '',
    'variant'         => 'default', // default, centered, dark
    'class'           => '',
];
$args = wp_parse_args( $args, $defaults );

$variant_classes = [
    'default'  => 'bg-gray-50',
    'centered' => 'bg-gray-50 text-center',
    'dark'     => 'bg-gray-900 text-white',
];

$container_classes = implode( ' ', array_filter( [
    'rounded-2xl px-6 py-12 sm:px-12 sm:py-16',
    $variant_classes[ $args['variant'] ] ?? $variant_classes['default'],
    $args['class'],
] ) );

$is_dark = $args['variant'] === 'dark';
?>

<section class="<?php echo esc_attr( $container_classes ); ?>">
    <div class="<?php echo $args['variant'] === 'centered' ? 'max-w-2xl mx-auto' : 'flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6'; ?>">
        <div class="<?php echo $args['variant'] === 'centered' ? 'mb-8' : ''; ?>">
            <h2 class="text-2xl sm:text-3xl font-bold <?php echo $is_dark ? 'text-white' : 'text-gray-900'; ?> mb-2">
                <?php echo esc_html( $args['title'] ); ?>
            </h2>
            <?php if ( ! empty( $args['description'] ) ) : ?>
                <p class="<?php echo $is_dark ? 'text-gray-300' : 'text-gray-600'; ?>">
                    <?php echo esc_html( $args['description'] ); ?>
                </p>
            <?php endif; ?>
        </div>
        
        <div class="flex flex-wrap gap-4 <?php echo $args['variant'] === 'centered' ? 'justify-center' : ''; ?>">
            <?php get_template_part('parts/atoms/button', null, [
                'text'    => $args['button_text'],
                'url'     => $args['button_url'],
                'variant' => $is_dark ? 'secondary' : $args['button_variant'],
                'size'    => 'lg',
            ]); ?>
            
            <?php if ( ! empty( $args['secondary_text'] ) && ! empty( $args['secondary_url'] ) ) : ?>
                <?php get_template_part('parts/atoms/button', null, [
                    'text'    => $args['secondary_text'],
                    'url'     => $args['secondary_url'],
                    'variant' => $is_dark ? 'ghost' : 'outline',
                    'size'    => 'lg',
                ]); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
