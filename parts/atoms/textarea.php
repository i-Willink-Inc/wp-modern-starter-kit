<?php
/**
 * Atom: Textarea
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'name'        => 'textarea-name',
    'id'          => '',
    'value'       => '',
    'placeholder' => '',
    'label'       => '',
    'required'    => false,
    'rows'        => 4,
    'class'       => '',
    'error'       => '',
];
$args = wp_parse_args( $args, $defaults );

$id = $args['id'] ?: $args['name'];
?>

<div class="<?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( ! empty( $args['label'] ) ) : ?>
        <label for="<?php echo esc_attr( $id ); ?>" class="block text-sm font-medium text-gray-700 mb-1">
            <?php echo esc_html( $args['label'] ); ?>
            <?php if ( $args['required'] ) : ?>
                <span class="text-red-500">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>

    <textarea name="<?php echo esc_attr( $args['name'] ); ?>"
              id="<?php echo esc_attr( $id ); ?>"
              rows="<?php echo esc_attr( $args['rows'] ); ?>"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm <?php echo $args['error'] ? 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : ''; ?>"
              placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
              <?php echo $args['required'] ? 'required' : ''; ?>><?php echo esc_textarea( $args['value'] ); ?></textarea>
    
    <?php if ( ! empty( $args['error'] ) ) : ?>
        <p class="mt-2 text-sm text-red-600"><?php echo esc_html( $args['error'] ); ?></p>
    <?php endif; ?>
</div>
