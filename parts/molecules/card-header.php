<?php
/**
 * Molecule: Card Header
 *
 * Header section for a card with title and optional action/badge.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'      => '',
    'subtitle'   => '',
    'badge'      => '',
    'badge_color'=> 'blue',
    'action_text'=> '',
    'action_url' => '',
    'class'      => '',
];
$args = wp_parse_args( $args, $defaults );
?>

<div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between <?php echo esc_attr( $args['class'] ); ?>">
    <div>
        <div class="flex items-center gap-3">
            <h3 class="text-lg font-semibold text-gray-900">
                <?php echo esc_html( $args['title'] ); ?>
            </h3>
            <?php if ( ! empty( $args['badge'] ) ) : ?>
                <?php get_template_part('parts/atoms/badge', null, [
                    'text'  => $args['badge'],
                    'color' => $args['badge_color'],
                    'size'  => 'sm',
                ]); ?>
            <?php endif; ?>
        </div>
        <?php if ( ! empty( $args['subtitle'] ) ) : ?>
            <p class="text-sm text-gray-500 mt-1"><?php echo esc_html( $args['subtitle'] ); ?></p>
        <?php endif; ?>
    </div>

    <?php if ( ! empty( $args['action_text'] ) && ! empty( $args['action_url'] ) ) : ?>
        <div>
            <?php get_template_part('parts/atoms/button', null, [
                'text'    => $args['action_text'],
                'url'     => $args['action_url'],
                'variant' => 'ghost',
                'size'    => 'sm',
            ]); ?>
        </div>
    <?php endif; ?>
</div>
