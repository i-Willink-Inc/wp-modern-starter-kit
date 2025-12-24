<?php
/**
 * Molecule: Search Form
 *
 * A search form component using Input and Button atoms.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'placeholder' => 'Search...',
    'button_text' => 'Search',
    'action'      => home_url( '/' ),
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$unique_id = wp_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="flex gap-2 <?php echo esc_attr( $args['class'] ); ?>" action="<?php echo esc_url( $args['action'] ); ?>">
    <div class="flex-grow">
        <?php get_template_part('parts/atoms/input', null, [
            'name'        => 's',
            'id'          => $unique_id,
            'placeholder' => $args['placeholder'],
            'value'       => get_search_query(),
        ]); ?>
    </div>
    <div class="flex-shrink-0">
        <?php get_template_part('parts/atoms/button', null, [
            'type'    => 'submit',
            'text'    => $args['button_text'],
            'variant' => 'primary',
            'icon'    => 'search', // Assuming button supports icon if we updated it, or we rely on text
        ]); ?>
    </div>
</form>
