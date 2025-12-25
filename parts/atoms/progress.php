<?php
/**
 * Atom: Progress
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'value'       => 0,       // 0-100
    'max'         => 100,
    'label'       => '',
    'show_value'  => true,
    'size'        => 'md',    // sm, md, lg
    'variant'     => 'default', // default, gradient, striped
    'color'       => 'blue',  // blue, green, red, yellow, purple
    'animated'    => false,
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$percentage = min( 100, max( 0, ( $args['value'] / $args['max'] ) * 100 ) );

$size_classes = [
    'sm' => 'h-1.5',
    'md' => 'h-2.5',
    'lg' => 'h-4',
];

$color_classes = [
    'blue'   => 'bg-blue-600',
    'green'  => 'bg-green-600',
    'red'    => 'bg-red-600',
    'yellow' => 'bg-yellow-500',
    'purple' => 'bg-purple-600',
];

$gradient_classes = [
    'blue'   => 'bg-gradient-to-r from-blue-400 to-blue-600',
    'green'  => 'bg-gradient-to-r from-green-400 to-green-600',
    'red'    => 'bg-gradient-to-r from-red-400 to-red-600',
    'yellow' => 'bg-gradient-to-r from-yellow-400 to-yellow-600',
    'purple' => 'bg-gradient-to-r from-purple-400 to-purple-600',
];

$bar_classes = $args['variant'] === 'gradient' 
    ? ( $gradient_classes[ $args['color'] ] ?? $gradient_classes['blue'] )
    : ( $color_classes[ $args['color'] ] ?? $color_classes['blue'] );

if ( $args['variant'] === 'striped' ) {
    $bar_classes .= ' bg-[length:1rem_1rem] bg-[linear-gradient(45deg,rgba(255,255,255,.15)_25%,transparent_25%,transparent_50%,rgba(255,255,255,.15)_50%,rgba(255,255,255,.15)_75%,transparent_75%,transparent)]';
}

if ( $args['animated'] ) {
    $bar_classes .= ' animate-pulse';
}
?>

<div class="w-full <?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( $args['label'] || $args['show_value'] ) : ?>
        <div class="flex items-center justify-between mb-1">
            <?php if ( $args['label'] ) : ?>
                <span class="text-sm font-medium text-gray-700"><?php echo esc_html( $args['label'] ); ?></span>
            <?php endif; ?>
            <?php if ( $args['show_value'] ) : ?>
                <span class="text-sm font-medium text-gray-500"><?php echo esc_html( round( $percentage ) ); ?>%</span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <div 
        class="w-full bg-gray-200 rounded-full overflow-hidden <?php echo esc_attr( $size_classes[ $args['size'] ] ?? $size_classes['md'] ); ?>"
        role="progressbar"
        aria-valuenow="<?php echo esc_attr( $args['value'] ); ?>"
        aria-valuemin="0"
        aria-valuemax="<?php echo esc_attr( $args['max'] ); ?>"
    >
        <div 
            class="<?php echo esc_attr( $bar_classes ); ?> <?php echo esc_attr( $size_classes[ $args['size'] ] ?? $size_classes['md'] ); ?> rounded-full transition-all duration-500 ease-out"
            style="width: <?php echo esc_attr( $percentage ); ?>%"
        ></div>
    </div>
</div>
