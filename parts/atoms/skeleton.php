<?php
/**
 * Atom: Skeleton
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'type'     => 'text',     // text, circle, rectangle, card
    'width'    => '',         // Custom width (e.g., '200px', '100%')
    'height'   => '',         // Custom height
    'lines'    => 3,          // Number of lines for text type
    'animated' => true,
    'class'    => '',
];
$args = wp_parse_args( $args, $defaults );

$base_classes = 'bg-gray-200 rounded';
if ( $args['animated'] ) {
    $base_classes .= ' animate-pulse';
}

$style = '';
if ( $args['width'] ) {
    $style .= 'width: ' . esc_attr( $args['width'] ) . ';';
}
if ( $args['height'] ) {
    $style .= 'height: ' . esc_attr( $args['height'] ) . ';';
}
?>

<?php if ( $args['type'] === 'text' ) : ?>
    <div class="space-y-3 <?php echo esc_attr( $args['class'] ); ?>">
        <?php for ( $i = 0; $i < $args['lines']; $i++ ) : 
            $width = $i === $args['lines'] - 1 ? 'w-3/4' : 'w-full';
        ?>
            <div class="<?php echo esc_attr( $base_classes ); ?> <?php echo esc_attr( $width ); ?> h-4"></div>
        <?php endfor; ?>
    </div>

<?php elseif ( $args['type'] === 'circle' ) : ?>
    <div 
        class="<?php echo esc_attr( $base_classes ); ?> rounded-full <?php echo esc_attr( $args['class'] ); ?>"
        style="<?php echo $style ?: 'width: 48px; height: 48px;'; ?>"
    ></div>

<?php elseif ( $args['type'] === 'rectangle' ) : ?>
    <div 
        class="<?php echo esc_attr( $base_classes ); ?> <?php echo esc_attr( $args['class'] ); ?>"
        style="<?php echo $style ?: 'width: 100%; height: 200px;'; ?>"
    ></div>

<?php elseif ( $args['type'] === 'card' ) : ?>
    <div class="p-4 border border-gray-200 rounded-xl <?php echo esc_attr( $args['class'] ); ?>">
        <div class="flex items-center space-x-4 mb-4">
            <div class="<?php echo esc_attr( $base_classes ); ?> rounded-full w-12 h-12"></div>
            <div class="flex-1 space-y-2">
                <div class="<?php echo esc_attr( $base_classes ); ?> h-4 w-3/4"></div>
                <div class="<?php echo esc_attr( $base_classes ); ?> h-3 w-1/2"></div>
            </div>
        </div>
        <div class="space-y-3">
            <div class="<?php echo esc_attr( $base_classes ); ?> h-4 w-full"></div>
            <div class="<?php echo esc_attr( $base_classes ); ?> h-4 w-full"></div>
            <div class="<?php echo esc_attr( $base_classes ); ?> h-4 w-2/3"></div>
        </div>
    </div>
<?php endif; ?>
