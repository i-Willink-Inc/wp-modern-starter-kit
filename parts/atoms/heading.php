<?php
/**
 * Atom: Heading
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'text'  => 'Heading',
    'level' => 2,        // 1-6
    'size'  => 'default', // sm, default, lg, xl, 2xl
    'class' => '',
];
$args = wp_parse_args( $args, $defaults );

$size_classes = [
    'sm'      => 'text-lg font-semibold',
    'default' => 'text-2xl font-bold',
    'lg'      => 'text-3xl font-bold',
    'xl'      => 'text-4xl font-bold tracking-tight',
    '2xl'     => 'text-5xl font-bold tracking-tight',
];

$classes = implode( ' ', array_filter( [
    'text-gray-900',
    $size_classes[ $args['size'] ] ?? $size_classes['default'],
    $args['class'],
] ) );

$tag = 'h' . intval( $args['level'] );
?>

<<?php echo esc_html( $tag ); ?> class="<?php echo esc_attr( $classes ); ?>">
    <?php echo esc_html( $args['text'] ); ?>
</<?php echo esc_html( $tag ); ?>>
