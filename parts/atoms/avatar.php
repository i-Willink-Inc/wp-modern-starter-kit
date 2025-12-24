<?php
/**
 * Atom: Avatar
 *
 * User profile image or placeholder.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'src'   => '',
    'alt'   => 'Avatar',
    'size'  => 'md', // sm, md, lg, xl
    'class' => '',
];
$args = wp_parse_args( $args, $defaults );

$size_classes = [
    'sm' => 'w-8 h-8',
    'md' => 'w-10 h-10',
    'lg' => 'w-12 h-12',
    'xl' => 'w-16 h-16',
];

$container_classes = implode( ' ', array_filter( [
    'inline-block rounded-full overflow-hidden bg-gray-100',
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
    $args['class'],
] ) );
?>

<div class="<?php echo esc_attr( $container_classes ); ?>">
    <?php if ( ! empty( $args['src'] ) ) : ?>
        <img src="<?php echo esc_url( $args['src'] ); ?>" 
             alt="<?php echo esc_attr( $args['alt'] ); ?>" 
             class="w-full h-full object-cover">
    <?php else : ?>
        <div class="w-full h-full flex items-center justify-center text-gray-400">
            <?php get_template_part('parts/atoms/icon', null, ['name' => 'user', 'size' => $args['size']]); ?>
        </div>
    <?php endif; ?>
</div>
