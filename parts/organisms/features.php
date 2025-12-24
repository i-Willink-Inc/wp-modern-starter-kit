<?php
/**
 * Organism: Features
 *
 * A grid of feature items.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => '',
    'description' => '',
    'items'       => [], // Array of ['icon' => '', 'title' => '', 'description' => '']
    'columns'     => 3,  // 2, 3, 4
    'variant'     => 'default', // default, centered
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$column_classes = [
    2 => 'sm:grid-cols-2',
    3 => 'sm:grid-cols-2 lg:grid-cols-3',
    4 => 'sm:grid-cols-2 lg:grid-cols-4',
];

$is_centered = $args['variant'] === 'centered';
?>

<section class="py-12 <?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( ! empty( $args['title'] ) || ! empty( $args['description'] ) ) : ?>
        <div class="<?php echo $is_centered ? 'text-center' : ''; ?> mb-12 max-w-2xl <?php echo $is_centered ? 'mx-auto' : ''; ?>">
            <?php if ( ! empty( $args['title'] ) ) : ?>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    <?php echo esc_html( $args['title'] ); ?>
                </h2>
            <?php endif; ?>
            <?php if ( ! empty( $args['description'] ) ) : ?>
                <p class="text-lg text-gray-600">
                    <?php echo esc_html( $args['description'] ); ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <div class="grid gap-8 <?php echo esc_attr( $column_classes[ $args['columns'] ] ?? $column_classes[3] ); ?>">
        <?php foreach ( $args['items'] as $item ) : ?>
            <div class="<?php echo $is_centered ? 'text-center' : ''; ?>">
                <?php if ( ! empty( $item['icon'] ) ) : ?>
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-blue-100 text-blue-600 mb-4">
                        <?php echo $item['icon']; // SVG icon, should be sanitized before passing ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( ! empty( $item['title'] ) ) : ?>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        <?php echo esc_html( $item['title'] ); ?>
                    </h3>
                <?php endif; ?>
                
                <?php if ( ! empty( $item['description'] ) ) : ?>
                    <p class="text-gray-600">
                        <?php echo esc_html( $item['description'] ); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
