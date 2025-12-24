<?php
/**
 * Atom: Button
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'text'    => 'Button',
    'url'     => '#',
    'variant' => 'primary', // primary, secondary, outline, ghost
    'size'    => 'md',      // sm, md, lg
    'class'   => '',        // Additional custom classes
    'target'  => '_self',
];
$args = wp_parse_args( $args, $defaults );

$variant_classes = [
    'primary'   => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
    'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-300',
    'outline'   => 'border border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-blue-500',
    'ghost'     => 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:ring-gray-300',
];

$size_classes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg',
];

$classes = implode( ' ', array_filter( [
    'inline-flex items-center justify-center font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2',
    $variant_classes[ $args['variant'] ] ?? $variant_classes['primary'],
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
    $args['class'],
] ) );
?>

<a href="<?php echo esc_url( $args['url'] ); ?>" 
   class="<?php echo esc_attr( $classes ); ?>" 
   target="<?php echo esc_attr( $args['target'] ); ?>">
    <?php echo esc_html( $args['text'] ); ?>
</a>
