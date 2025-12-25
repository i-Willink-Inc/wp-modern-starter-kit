<?php
/**
 * Molecule: Form Group
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'label'       => '',
    'name'        => '',
    'type'        => 'text',    // text, email, password, number, tel, url, textarea, select, checkbox, radio
    'placeholder' => '',
    'value'       => '',
    'options'     => [],        // For select/radio: [ ['value' => '', 'label' => ''], ... ]
    'required'    => false,
    'disabled'    => false,
    'error'       => '',
    'help'        => '',
    'size'        => 'md',      // sm, md, lg
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$field_id = $args['name'] ? $args['name'] : 'field-' . wp_unique_id();

$size_classes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-4 py-3 text-lg',
];

$label_size = [
    'sm' => 'text-sm',
    'md' => 'text-sm',
    'lg' => 'text-base',
];

$base_input_classes = 'block w-full rounded-lg border shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-0 transition-colors';
$input_classes = $base_input_classes . ' ' . ( $size_classes[ $args['size'] ] ?? $size_classes['md'] );

if ( $args['error'] ) {
    $input_classes .= ' border-red-500 focus:border-red-500 focus:ring-red-500';
} else {
    $input_classes .= ' border-gray-300 focus:border-blue-500 focus:ring-blue-500';
}

if ( $args['disabled'] ) {
    $input_classes .= ' bg-gray-100 cursor-not-allowed opacity-50';
}
?>

<div class="<?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( $args['label'] && ! in_array( $args['type'], [ 'checkbox', 'radio' ], true ) ) : ?>
        <label 
            for="<?php echo esc_attr( $field_id ); ?>" 
            class="block <?php echo esc_attr( $label_size[ $args['size'] ] ?? 'text-sm' ); ?> font-medium text-gray-700 mb-1"
        >
            <?php echo esc_html( $args['label'] ); ?>
            <?php if ( $args['required'] ) : ?>
                <span class="text-red-500">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>

    <?php if ( $args['type'] === 'textarea' ) : ?>
        <textarea 
            id="<?php echo esc_attr( $field_id ); ?>"
            name="<?php echo esc_attr( $args['name'] ); ?>"
            class="<?php echo esc_attr( $input_classes ); ?> resize-y min-h-[100px]"
            placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
            <?php disabled( $args['disabled'] ); ?>
            <?php if ( $args['required'] ) : ?>required<?php endif; ?>
        ><?php echo esc_textarea( $args['value'] ); ?></textarea>

    <?php elseif ( $args['type'] === 'select' ) : ?>
        <select 
            id="<?php echo esc_attr( $field_id ); ?>"
            name="<?php echo esc_attr( $args['name'] ); ?>"
            class="<?php echo esc_attr( $input_classes ); ?> appearance-none bg-white cursor-pointer"
            <?php disabled( $args['disabled'] ); ?>
            <?php if ( $args['required'] ) : ?>required<?php endif; ?>
        >
            <?php if ( $args['placeholder'] ) : ?>
                <option value="" disabled selected><?php echo esc_html( $args['placeholder'] ); ?></option>
            <?php endif; ?>
            <?php foreach ( $args['options'] as $option ) : ?>
                <option 
                    value="<?php echo esc_attr( $option['value'] ?? '' ); ?>"
                    <?php selected( $args['value'], $option['value'] ?? '' ); ?>
                >
                    <?php echo esc_html( $option['label'] ?? '' ); ?>
                </option>
            <?php endforeach; ?>
        </select>

    <?php elseif ( $args['type'] === 'checkbox' ) : ?>
        <div class="flex items-center gap-2">
            <input 
                type="checkbox"
                id="<?php echo esc_attr( $field_id ); ?>"
                name="<?php echo esc_attr( $args['name'] ); ?>"
                value="<?php echo esc_attr( $args['value'] ?: '1' ); ?>"
                class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition-colors cursor-pointer"
                <?php disabled( $args['disabled'] ); ?>
                <?php if ( $args['required'] ) : ?>required<?php endif; ?>
            >
            <?php if ( $args['label'] ) : ?>
                <label for="<?php echo esc_attr( $field_id ); ?>" class="<?php echo esc_attr( $label_size[ $args['size'] ] ?? 'text-sm' ); ?> text-gray-700 cursor-pointer">
                    <?php echo esc_html( $args['label'] ); ?>
                    <?php if ( $args['required'] ) : ?><span class="text-red-500">*</span><?php endif; ?>
                </label>
            <?php endif; ?>
        </div>

    <?php elseif ( $args['type'] === 'radio' ) : ?>
        <fieldset>
            <?php if ( $args['label'] ) : ?>
                <legend class="<?php echo esc_attr( $label_size[ $args['size'] ] ?? 'text-sm' ); ?> font-medium text-gray-700 mb-2">
                    <?php echo esc_html( $args['label'] ); ?>
                    <?php if ( $args['required'] ) : ?><span class="text-red-500">*</span><?php endif; ?>
                </legend>
            <?php endif; ?>
            <div class="space-y-2">
                <?php foreach ( $args['options'] as $index => $option ) : ?>
                    <div class="flex items-center gap-2">
                        <input 
                            type="radio"
                            id="<?php echo esc_attr( $field_id . '-' . $index ); ?>"
                            name="<?php echo esc_attr( $args['name'] ); ?>"
                            value="<?php echo esc_attr( $option['value'] ?? '' ); ?>"
                            class="h-5 w-5 border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer"
                            <?php checked( $args['value'], $option['value'] ?? '' ); ?>
                            <?php disabled( $args['disabled'] ); ?>
                            <?php if ( $args['required'] && $index === 0 ) : ?>required<?php endif; ?>
                        >
                        <label for="<?php echo esc_attr( $field_id . '-' . $index ); ?>" class="text-sm text-gray-700 cursor-pointer">
                            <?php echo esc_html( $option['label'] ?? '' ); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </fieldset>

    <?php else : ?>
        <input 
            type="<?php echo esc_attr( $args['type'] ); ?>"
            id="<?php echo esc_attr( $field_id ); ?>"
            name="<?php echo esc_attr( $args['name'] ); ?>"
            value="<?php echo esc_attr( $args['value'] ); ?>"
            class="<?php echo esc_attr( $input_classes ); ?>"
            placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
            <?php disabled( $args['disabled'] ); ?>
            <?php if ( $args['required'] ) : ?>required<?php endif; ?>
        >
    <?php endif; ?>

    <?php if ( $args['error'] ) : ?>
        <p class="mt-1 text-sm text-red-600">
            <?php echo esc_html( $args['error'] ); ?>
        </p>
    <?php elseif ( $args['help'] ) : ?>
        <p class="mt-1 text-sm text-gray-500">
            <?php echo esc_html( $args['help'] ); ?>
        </p>
    <?php endif; ?>
</div>
