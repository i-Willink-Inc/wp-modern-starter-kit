<?php
/**
 * Atom: Radio
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'       => '',
    'name'     => '',
    'label'    => '',
    'checked'  => false,
    'disabled' => false,
    'required' => false,
    'value'    => '',
    'size'     => 'md',      // sm, md, lg
    'variant'  => 'primary', // primary, success, warning, error
    'class'    => '',
];
$args = wp_parse_args( $args, $defaults );

$id = $args['id'] ?: 'radio-' . wp_unique_id();

$size_classes = [
    'sm' => 'h-4 w-4',
    'md' => 'h-5 w-5',
    'lg' => 'h-6 w-6',
];

$variant_classes = [
    'primary' => 'text-blue-600 focus:ring-blue-500',
    'success' => 'text-green-600 focus:ring-green-500',
    'warning' => 'text-yellow-600 focus:ring-yellow-500',
    'error'   => 'text-red-600 focus:ring-red-500',
];

$label_size_classes = [
    'sm' => 'text-sm',
    'md' => 'text-base',
    'lg' => 'text-lg',
];

$radio_classes = implode( ' ', array_filter( [
    'border-gray-300 focus:ring-2 focus:ring-offset-2 transition-colors cursor-pointer',
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
    $variant_classes[ $args['variant'] ] ?? $variant_classes['primary'],
    $args['disabled'] ? 'opacity-50 cursor-not-allowed' : '',
    $args['class'],
] ) );
?>

<div class="flex items-center gap-2">
    <input 
        type="radio" 
        id="<?php echo esc_attr( $id ); ?>"
        <?php if ( $args['name'] ) : ?>
            name="<?php echo esc_attr( $args['name'] ); ?>"
        <?php endif; ?>
        value="<?php echo esc_attr( $args['value'] ); ?>"
        class="<?php echo esc_attr( $radio_classes ); ?>"
        <?php checked( $args['checked'] ); ?>
        <?php disabled( $args['disabled'] ); ?>
        <?php if ( $args['required'] ) : ?>
            required
        <?php endif; ?>
    >
    <?php if ( $args['label'] ) : ?>
        <label 
            for="<?php echo esc_attr( $id ); ?>" 
            class="<?php echo esc_attr( $label_size_classes[ $args['size'] ] ?? 'text-base' ); ?> text-gray-700 cursor-pointer select-none <?php echo $args['disabled'] ? 'opacity-50 cursor-not-allowed' : ''; ?>"
        >
            <?php echo esc_html( $args['label'] ); ?>
            <?php if ( $args['required'] ) : ?>
                <span class="text-red-500">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>
</div>
