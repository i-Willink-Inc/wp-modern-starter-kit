<?php
/**
 * Atom: Link
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'text'    => 'Link',
    'url'     => '#',
    'variant' => 'default', // default, muted, underline
    'target'  => '_self',
    'class'   => '',
];
$args = wp_parse_args( $args, $defaults );

$variant_classes = [
    'default'   => 'text-blue-600 hover:text-blue-800',
    'muted'     => 'text-gray-500 hover:text-gray-700',
    'underline' => 'text-blue-600 underline hover:text-blue-800',
];

$classes = implode( ' ', array_filter( [
    'transition-colors',
    $variant_classes[ $args['variant'] ] ?? $variant_classes['default'],
    $args['class'],
] ) );
?>

<a href="<?php echo esc_url( $args['url'] ); ?>" 
   class="<?php echo esc_attr( $classes ); ?>" 
   target="<?php echo esc_attr( $args['target'] ); ?>">
    <?php echo esc_html( $args['text'] ); ?>
</a>
