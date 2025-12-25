<?php
/**
 * Molecule: Menu
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'items'    => [], // [ ['label' => '', 'url' => '', 'icon' => '', 'active' => false, 'badge' => '', 'children' => []], ... ]
    'variant'  => 'default', // default, compact, bordered
    'class'    => '',
];
$args = wp_parse_args( $args, $defaults );

$variant_classes = [
    'default' => [
        'container' => 'space-y-1',
        'item'      => 'flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors',
        'active'    => 'bg-blue-50 text-blue-700',
        'inactive'  => 'text-gray-700 hover:bg-gray-100',
    ],
    'compact' => [
        'container' => 'space-y-0.5',
        'item'      => 'flex items-center gap-2 px-3 py-1.5 text-sm rounded-md transition-colors',
        'active'    => 'bg-blue-50 text-blue-700',
        'inactive'  => 'text-gray-600 hover:bg-gray-100',
    ],
    'bordered' => [
        'container' => 'border border-gray-200 rounded-lg divide-y divide-gray-200',
        'item'      => 'flex items-center gap-3 px-4 py-3 text-sm font-medium transition-colors first:rounded-t-lg last:rounded-b-lg',
        'active'    => 'bg-blue-50 text-blue-700',
        'inactive'  => 'text-gray-700 hover:bg-gray-50',
    ],
];

$styles = $variant_classes[ $args['variant'] ] ?? $variant_classes['default'];
?>

<nav class="<?php echo esc_attr( $styles['container'] ); ?> <?php echo esc_attr( $args['class'] ); ?>">
    <?php foreach ( $args['items'] as $item ) : 
        $is_active = ! empty( $item['active'] );
        $has_children = ! empty( $item['children'] );
        $item_classes = $is_active ? $styles['active'] : $styles['inactive'];
    ?>
        <?php if ( $has_children ) : ?>
            <div class="space-y-1">
                <span class="flex items-center gap-3 px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    <?php if ( ! empty( $item['icon'] ) ) : ?>
                        <span class="flex-shrink-0"><?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <?php endif; ?>
                    <?php echo esc_html( $item['label'] ?? '' ); ?>
                </span>
                <?php foreach ( $item['children'] as $child ) : 
                    $child_active = ! empty( $child['active'] );
                    $child_classes = $child_active ? $styles['active'] : $styles['inactive'];
                ?>
                    <a 
                        href="<?php echo esc_url( $child['url'] ?? '#' ); ?>"
                        class="<?php echo esc_attr( $styles['item'] ); ?> <?php echo esc_attr( $child_classes ); ?> pl-6"
                    >
                        <?php if ( ! empty( $child['icon'] ) ) : ?>
                            <span class="flex-shrink-0 w-5 h-5"><?php echo $child['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                        <?php endif; ?>
                        <span class="flex-1"><?php echo esc_html( $child['label'] ?? '' ); ?></span>
                        <?php if ( ! empty( $child['badge'] ) ) : ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                <?php echo esc_html( $child['badge'] ); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <a 
                href="<?php echo esc_url( $item['url'] ?? '#' ); ?>"
                class="<?php echo esc_attr( $styles['item'] ); ?> <?php echo esc_attr( $item_classes ); ?>"
                <?php if ( $is_active ) : ?>aria-current="page"<?php endif; ?>
            >
                <?php if ( ! empty( $item['icon'] ) ) : ?>
                    <span class="flex-shrink-0 w-5 h-5"><?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                <?php endif; ?>
                <span class="flex-1"><?php echo esc_html( $item['label'] ?? '' ); ?></span>
                <?php if ( ! empty( $item['badge'] ) ) : ?>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                        <?php echo esc_html( $item['badge'] ); ?>
                    </span>
                <?php endif; ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>
