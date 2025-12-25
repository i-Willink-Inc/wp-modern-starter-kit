<?php
/**
 * Atom: Tooltip
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'text'      => '',       // Tooltip text
    'content'   => '',       // Trigger element content (HTML)
    'position'  => 'top',    // top, bottom, left, right
    'variant'   => 'dark',   // dark, light
    'class'     => '',
];
$args = wp_parse_args( $args, $defaults );

$position_classes = [
    'top' => [
        'tooltip' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'arrow'   => 'top-full left-1/2 -translate-x-1/2 border-t-gray-900',
    ],
    'bottom' => [
        'tooltip' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'arrow'   => 'bottom-full left-1/2 -translate-x-1/2 border-b-gray-900',
    ],
    'left' => [
        'tooltip' => 'right-full top-1/2 -translate-y-1/2 mr-2',
        'arrow'   => 'left-full top-1/2 -translate-y-1/2 border-l-gray-900',
    ],
    'right' => [
        'tooltip' => 'left-full top-1/2 -translate-y-1/2 ml-2',
        'arrow'   => 'right-full top-1/2 -translate-y-1/2 border-r-gray-900',
    ],
];

$variant_classes = [
    'dark' => [
        'bg' => 'bg-gray-900 text-white',
        'arrow_color' => 'gray-900',
    ],
    'light' => [
        'bg' => 'bg-white text-gray-900 shadow-lg border border-gray-200',
        'arrow_color' => 'white',
    ],
];

$pos = $position_classes[ $args['position'] ] ?? $position_classes['top'];
$variant = $variant_classes[ $args['variant'] ] ?? $variant_classes['dark'];

// Arrow border classes based on position and variant
$arrow_base = 'absolute w-0 h-0 border-4 border-transparent';
$arrow_position_class = '';
switch ( $args['position'] ) {
    case 'top':
        $arrow_position_class = 'top-full left-1/2 -translate-x-1/2 border-t-' . $variant['arrow_color'];
        break;
    case 'bottom':
        $arrow_position_class = 'bottom-full left-1/2 -translate-x-1/2 border-b-' . $variant['arrow_color'];
        break;
    case 'left':
        $arrow_position_class = 'left-full top-1/2 -translate-y-1/2 border-l-' . $variant['arrow_color'];
        break;
    case 'right':
        $arrow_position_class = 'right-full top-1/2 -translate-y-1/2 border-r-' . $variant['arrow_color'];
        break;
}
?>

<div class="relative inline-block group <?php echo esc_attr( $args['class'] ); ?>">
    <!-- Trigger Element -->
    <span class="cursor-help">
        <?php echo $args['content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </span>
    
    <!-- Tooltip -->
    <div class="absolute z-50 <?php echo esc_attr( $pos['tooltip'] ); ?> opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 pointer-events-none">
        <div class="relative px-3 py-2 text-sm font-medium rounded-lg whitespace-nowrap <?php echo esc_attr( $variant['bg'] ); ?>">
            <?php echo esc_html( $args['text'] ); ?>
            <!-- Arrow -->
            <div class="<?php echo esc_attr( $arrow_base ); ?> <?php echo esc_attr( $arrow_position_class ); ?>" style="border-<?php echo esc_attr( $args['position'] ); ?>-color: <?php echo $args['variant'] === 'dark' ? '#111827' : '#fff'; ?>"></div>
        </div>
    </div>
</div>
