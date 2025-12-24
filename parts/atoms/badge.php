<?php
/**
 * Atom: Badge
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'text'    => 'Badge',
    'color'   => 'gray', // gray, red, yellow, green, blue, indigo, purple, pink
    'size'    => 'md',   // sm, md
    'rounded' => 'full', // full, md
    'class'   => '',
];
$args = wp_parse_args( $args, $defaults );

$color_classes = [
    'gray'   => 'bg-gray-100 text-gray-800',
    'red'    => 'bg-red-100 text-red-800',
    'yellow' => 'bg-yellow-100 text-yellow-800',
    'green'  => 'bg-green-100 text-green-800',
    'blue'   => 'bg-blue-100 text-blue-800',
    'indigo' => 'bg-indigo-100 text-indigo-800',
    'purple' => 'bg-purple-100 text-purple-800',
    'pink'   => 'bg-pink-100 text-pink-800',
];

$size_classes = [
    'sm' => 'px-2 py-0.5 text-xs',
    'md' => 'px-2.5 py-0.5 text-sm',
];

$rounded_classes = [
    'full' => 'rounded-full',
    'md'   => 'rounded-md',
];

$classes = implode( ' ', array_filter( [
    'inline-flex items-center font-medium',
    $color_classes[ $args['color'] ] ?? $color_classes['gray'],
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
    $rounded_classes[ $args['rounded'] ] ?? $rounded_classes['full'],
    $args['class'],
] ) );
?>

<span class="<?php echo esc_attr( $classes ); ?>">
    <?php echo esc_html( $args['text'] ); ?>
</span>
