<?php
/**
 * Atom: Input
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'type'        => 'text',
    'name'        => 'input-name',
    'id'          => '',
    'value'       => '',
    'placeholder' => '',
    'label'       => '',
    'required'    => false,
    'class'       => '',
    'error'       => '',
    'help'        => '',
    'autocomplete' => '',
];
$args = wp_parse_args( $args, $defaults );

$id = $args['id'] ?: $args['name'];
$error_id = $id . '-error';
$help_id = $id . '-help';
$has_error = ! empty( $args['error'] );
$has_help = ! empty( $args['help'] );

// Build aria-describedby
$described_by = [];
if ( $has_error ) {
    $described_by[] = $error_id;
}
if ( $has_help ) {
    $described_by[] = $help_id;
}
?>

<div class="<?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( ! empty( $args['label'] ) ) : ?>
        <label for="<?php echo esc_attr( $id ); ?>" class="block text-sm font-medium text-gray-700 mb-1">
            <?php echo esc_html( $args['label'] ); ?>
            <?php if ( $args['required'] ) : ?>
                <span class="text-red-500" aria-hidden="true">*</span>
                <span class="sr-only">(必須)</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>

    <input type="<?php echo esc_attr( $args['type'] ); ?>"
           name="<?php echo esc_attr( $args['name'] ); ?>"
           id="<?php echo esc_attr( $id ); ?>"
           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm <?php echo $has_error ? 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : ''; ?>"
           placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
           value="<?php echo esc_attr( $args['value'] ); ?>"
           <?php echo $args['required'] ? 'required aria-required="true"' : ''; ?>
           <?php echo $has_error ? 'aria-invalid="true"' : ''; ?>
           <?php echo ! empty( $described_by ) ? 'aria-describedby="' . esc_attr( implode( ' ', $described_by ) ) . '"' : ''; ?>
           <?php echo ! empty( $args['autocomplete'] ) ? 'autocomplete="' . esc_attr( $args['autocomplete'] ) . '"' : ''; ?>>
    
    <?php if ( $has_help && ! $has_error ) : ?>
        <p class="mt-2 text-sm text-gray-500" id="<?php echo esc_attr( $help_id ); ?>"><?php echo esc_html( $args['help'] ); ?></p>
    <?php endif; ?>
    
    <?php if ( $has_error ) : ?>
        <p class="mt-2 text-sm text-red-600" id="<?php echo esc_attr( $error_id ); ?>" role="alert"><?php echo esc_html( $args['error'] ); ?></p>
    <?php endif; ?>
</div>

