<?php
/**
 * Atom: Toggle
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
    'size'     => 'md',      // sm, md, lg
    'variant'  => 'primary', // primary, success, warning, error
    'class'    => '',
];
$args = wp_parse_args( $args, $defaults );

$id = $args['id'] ?: 'toggle-' . wp_unique_id();

$size_config = [
    'sm' => [
        'track'  => 'h-5 w-9',
        'thumb'  => 'h-4 w-4',
        'translate' => 'translate-x-4',
    ],
    'md' => [
        'track'  => 'h-6 w-11',
        'thumb'  => 'h-5 w-5',
        'translate' => 'translate-x-5',
    ],
    'lg' => [
        'track'  => 'h-7 w-14',
        'thumb'  => 'h-6 w-6',
        'translate' => 'translate-x-7',
    ],
];

$variant_classes = [
    'primary' => 'peer-checked:bg-blue-600 peer-focus:ring-blue-500',
    'success' => 'peer-checked:bg-green-600 peer-focus:ring-green-500',
    'warning' => 'peer-checked:bg-yellow-500 peer-focus:ring-yellow-500',
    'error'   => 'peer-checked:bg-red-600 peer-focus:ring-red-500',
];

$label_size_classes = [
    'sm' => 'text-sm',
    'md' => 'text-base',
    'lg' => 'text-lg',
];

$size = $size_config[ $args['size'] ] ?? $size_config['md'];
?>

<label class="inline-flex items-center gap-3 cursor-pointer <?php echo $args['disabled'] ? 'opacity-50 cursor-not-allowed' : ''; ?> <?php echo esc_attr( $args['class'] ); ?>">
    <div class="relative">
        <input 
            type="checkbox" 
            id="<?php echo esc_attr( $id ); ?>"
            <?php if ( $args['name'] ) : ?>
                name="<?php echo esc_attr( $args['name'] ); ?>"
            <?php endif; ?>
            class="peer sr-only"
            <?php checked( $args['checked'] ); ?>
            <?php disabled( $args['disabled'] ); ?>
        >
        <!-- Track -->
        <div class="<?php echo esc_attr( $size['track'] ); ?> rounded-full bg-gray-200 transition-colors peer-focus:ring-2 peer-focus:ring-offset-2 <?php echo esc_attr( $variant_classes[ $args['variant'] ] ?? $variant_classes['primary'] ); ?>"></div>
        <!-- Thumb -->
        <div class="absolute left-0.5 top-0.5 <?php echo esc_attr( $size['thumb'] ); ?> rounded-full bg-white shadow-sm transition-transform peer-checked:<?php echo esc_attr( $size['translate'] ); ?>"></div>
    </div>
    
    <?php if ( $args['label'] ) : ?>
        <span class="<?php echo esc_attr( $label_size_classes[ $args['size'] ] ?? 'text-base' ); ?> text-gray-700 select-none">
            <?php echo esc_html( $args['label'] ); ?>
        </span>
    <?php endif; ?>
</label>
