<?php
/**
 * Atom: Divider
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'text'        => '',
    'orientation' => 'horizontal', // horizontal, vertical
    'variant'     => 'solid',      // solid, dashed, dotted
    'color'       => 'gray',       // gray, primary, light
    'spacing'     => 'md',         // sm, md, lg
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$color_classes = [
    'gray'    => 'border-gray-200',
    'primary' => 'border-blue-200',
    'light'   => 'border-gray-100',
];

$variant_classes = [
    'solid'  => 'border-solid',
    'dashed' => 'border-dashed',
    'dotted' => 'border-dotted',
];

$spacing_classes = [
    'sm' => 'my-2',
    'md' => 'my-4',
    'lg' => 'my-8',
];

$vertical_spacing_classes = [
    'sm' => 'mx-2',
    'md' => 'mx-4',
    'lg' => 'mx-8',
];

if ( $args['orientation'] === 'vertical' ) :
    $divider_classes = implode( ' ', array_filter( [
        'inline-block h-full border-l',
        $color_classes[ $args['color'] ] ?? $color_classes['gray'],
        $variant_classes[ $args['variant'] ] ?? $variant_classes['solid'],
        $vertical_spacing_classes[ $args['spacing'] ] ?? $vertical_spacing_classes['md'],
        $args['class'],
    ] ) );
    ?>
    <div class="<?php echo esc_attr( $divider_classes ); ?>" role="separator" aria-orientation="vertical"></div>
<?php else :
    if ( $args['text'] ) :
        $text_color = $args['color'] === 'primary' ? 'text-blue-500' : 'text-gray-500';
        ?>
        <div class="flex items-center <?php echo esc_attr( $spacing_classes[ $args['spacing'] ] ?? $spacing_classes['md'] ); ?> <?php echo esc_attr( $args['class'] ); ?>" role="separator">
            <div class="flex-1 border-t <?php echo esc_attr( $color_classes[ $args['color'] ] ?? $color_classes['gray'] ); ?> <?php echo esc_attr( $variant_classes[ $args['variant'] ] ?? $variant_classes['solid'] ); ?>"></div>
            <span class="px-4 text-sm <?php echo esc_attr( $text_color ); ?>">
                <?php echo esc_html( $args['text'] ); ?>
            </span>
            <div class="flex-1 border-t <?php echo esc_attr( $color_classes[ $args['color'] ] ?? $color_classes['gray'] ); ?> <?php echo esc_attr( $variant_classes[ $args['variant'] ] ?? $variant_classes['solid'] ); ?>"></div>
        </div>
    <?php else :
        $divider_classes = implode( ' ', array_filter( [
            'border-t',
            $color_classes[ $args['color'] ] ?? $color_classes['gray'],
            $variant_classes[ $args['variant'] ] ?? $variant_classes['solid'],
            $spacing_classes[ $args['spacing'] ] ?? $spacing_classes['md'],
            $args['class'],
        ] ) );
        ?>
        <hr class="<?php echo esc_attr( $divider_classes ); ?>" role="separator">
    <?php endif;
endif;
