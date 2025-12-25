<?php
/**
 * Molecule: Stat
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => '',
    'value'       => '',
    'description' => '',
    'icon'        => '',
    'trend'       => '',       // up, down, neutral
    'trend_value' => '',       // e.g., "+12%"
    'variant'     => 'default', // default, bordered, colored
    'color'       => 'blue',    // blue, green, red, yellow, purple
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$color_classes = [
    'blue'   => 'bg-blue-50 text-blue-600',
    'green'  => 'bg-green-50 text-green-600',
    'red'    => 'bg-red-50 text-red-600',
    'yellow' => 'bg-yellow-50 text-yellow-600',
    'purple' => 'bg-purple-50 text-purple-600',
];

$trend_classes = [
    'up'      => 'text-green-600',
    'down'    => 'text-red-600',
    'neutral' => 'text-gray-500',
];

$trend_icons = [
    'up'   => '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>',
    'down' => '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>',
];

$variant_classes = [
    'default'  => 'bg-white',
    'bordered' => 'bg-white border border-gray-200',
    'colored'  => $color_classes[ $args['color'] ] ?? $color_classes['blue'],
];

$container_classes = implode( ' ', array_filter( [
    'p-6 rounded-xl',
    $variant_classes[ $args['variant'] ] ?? $variant_classes['default'],
    $args['class'],
] ) );
?>

<div class="<?php echo esc_attr( $container_classes ); ?>">
    <div class="flex items-start justify-between">
        <div class="flex-1">
            <?php if ( $args['title'] ) : ?>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                    <?php echo esc_html( $args['title'] ); ?>
                </p>
            <?php endif; ?>
            
            <p class="mt-2 text-3xl font-bold <?php echo $args['variant'] === 'colored' ? '' : 'text-gray-900'; ?>">
                <?php echo esc_html( $args['value'] ); ?>
            </p>
            
            <?php if ( $args['description'] || $args['trend'] ) : ?>
                <div class="mt-2 flex items-center gap-2">
                    <?php if ( $args['trend'] && $args['trend_value'] ) : ?>
                        <span class="inline-flex items-center gap-1 <?php echo esc_attr( $trend_classes[ $args['trend'] ] ?? $trend_classes['neutral'] ); ?>">
                            <?php echo isset( $trend_icons[ $args['trend'] ] ) ? $trend_icons[ $args['trend'] ] : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <span class="text-sm font-medium"><?php echo esc_html( $args['trend_value'] ); ?></span>
                        </span>
                    <?php endif; ?>
                    
                    <?php if ( $args['description'] ) : ?>
                        <span class="text-sm text-gray-500">
                            <?php echo esc_html( $args['description'] ); ?>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if ( $args['icon'] ) : ?>
            <div class="flex-shrink-0 p-3 rounded-lg <?php echo $args['variant'] !== 'colored' ? esc_attr( $color_classes[ $args['color'] ] ?? $color_classes['blue'] ) : 'bg-white/50'; ?>">
                <?php echo $args['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        <?php endif; ?>
    </div>
</div>
