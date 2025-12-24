<?php
/**
 * Atom: Spinner
 *
 * Loading indicator.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'size'  => 'md',   // sm, md, lg
    'color' => 'blue', // blue, white, gray
    'class' => '',
];
$args = wp_parse_args( $args, $defaults );

$color_classes = [
    'blue'  => 'text-blue-600',
    'white' => 'text-white',
    'gray'  => 'text-gray-500',
];

$classes = implode( ' ', array_filter( [
    'animate-spin',
    $color_classes[ $args['color'] ] ?? $color_classes['blue'],
    $args['class'],
] ) );
?>

<?php get_template_part('parts/atoms/icon', null, [
    'name'  => 'spinner', 
    'size'  => $args['size'], 
    'class' => $classes
]); ?>
