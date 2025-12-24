<?php
/**
 * Atom: Alert
 *
 * Feedback message box.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'type'     => 'info', // info, success, warning, error
    'title'    => '',
    'message'  => '',
    'class'    => '',
];
$args = wp_parse_args( $args, $defaults );

$type_configs = [
    'info' => [
        'bg'   => 'bg-blue-50',
        'text' => 'text-blue-800',
        'icon' => 'bg-blue-800', // Just a placeholder for actual icon usage logic
    ],
    'success' => [
        'bg'   => 'bg-green-50',
        'text' => 'text-green-800',
    ],
    'warning' => [
        'bg'   => 'bg-yellow-50',
        'text' => 'text-yellow-800',
    ],
    'error' => [
        'bg'   => 'bg-red-50',
        'text' => 'text-red-800',
    ],
];

$config = $type_configs[ $args['type'] ] ?? $type_configs['info'];

$classes = implode( ' ', array_filter( [
    'rounded-md p-4',
    $config['bg'],
    $args['class'],
] ) );
?>

<div class="<?php echo esc_attr( $classes ); ?>">
    <div class="flex">
        <div class="flex-shrink-0">
            <!-- Ideally we'd map types to icons here -->
            <?php 
            $icon_name = match($args['type']) {
                'success' => 'check',
                'error'   => 'close',
                'warning' => 'search', // placeholder
                default   => 'search', // placeholder
            };
            get_template_part('parts/atoms/icon', null, ['name' => $icon_name, 'class' => $config['text']]); 
            ?>
        </div>
        <div class="ml-3">
            <?php if ( ! empty( $args['title'] ) ) : ?>
                <h3 class="text-sm font-medium <?php echo esc_attr( $config['text'] ); ?>">
                    <?php echo esc_html( $args['title'] ); ?>
                </h3>
            <?php endif; ?>
            
            <?php if ( ! empty( $args['message'] ) ) : ?>
                <div class="mt-2 text-sm <?php echo esc_attr( $config['text'] ); ?> opacity-90">
                    <p><?php echo esc_html( $args['message'] ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
