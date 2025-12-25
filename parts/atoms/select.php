<?php
/**
 * Atom: Select
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'          => '',
    'name'        => '',
    'label'       => '',
    'placeholder' => '選択してください',
    'options'     => [],  // [ ['value' => '', 'label' => ''], ... ]
    'selected'    => '',
    'disabled'    => false,
    'required'    => false,
    'size'        => 'md', // sm, md, lg
    'variant'     => 'default', // default, error
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$id = $args['id'] ?: 'select-' . wp_unique_id();

$size_classes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-4 py-3 text-lg',
];

$variant_classes = [
    'default' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500',
    'error'   => 'border-red-500 focus:border-red-500 focus:ring-red-500',
];

$select_classes = implode( ' ', array_filter( [
    'block w-full rounded-lg border bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-0 transition-colors appearance-none cursor-pointer',
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
    $variant_classes[ $args['variant'] ] ?? $variant_classes['default'],
    $args['disabled'] ? 'opacity-50 cursor-not-allowed bg-gray-100' : '',
    $args['class'],
] ) );

$label_size_classes = [
    'sm' => 'text-sm',
    'md' => 'text-sm',
    'lg' => 'text-base',
];
?>

<div class="w-full">
    <?php if ( $args['label'] ) : ?>
        <label 
            for="<?php echo esc_attr( $id ); ?>" 
            class="block <?php echo esc_attr( $label_size_classes[ $args['size'] ] ?? 'text-sm' ); ?> font-medium text-gray-700 mb-1"
        >
            <?php echo esc_html( $args['label'] ); ?>
            <?php if ( $args['required'] ) : ?>
                <span class="text-red-500">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>
    
    <div class="relative">
        <select 
            id="<?php echo esc_attr( $id ); ?>"
            <?php if ( $args['name'] ) : ?>
                name="<?php echo esc_attr( $args['name'] ); ?>"
            <?php endif; ?>
            class="<?php echo esc_attr( $select_classes ); ?>"
            <?php disabled( $args['disabled'] ); ?>
            <?php if ( $args['required'] ) : ?>
                required
            <?php endif; ?>
        >
            <?php if ( $args['placeholder'] ) : ?>
                <option value="" disabled <?php selected( empty( $args['selected'] ) ); ?>>
                    <?php echo esc_html( $args['placeholder'] ); ?>
                </option>
            <?php endif; ?>
            
            <?php foreach ( $args['options'] as $option ) : ?>
                <option 
                    value="<?php echo esc_attr( $option['value'] ?? '' ); ?>"
                    <?php selected( $args['selected'], $option['value'] ?? '' ); ?>
                    <?php if ( ! empty( $option['disabled'] ) ) : ?>
                        disabled
                    <?php endif; ?>
                >
                    <?php echo esc_html( $option['label'] ?? '' ); ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <!-- Custom arrow icon -->
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</div>
