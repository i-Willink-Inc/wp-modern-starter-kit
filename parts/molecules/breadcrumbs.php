<?php
/**
 * Component: Breadcrumbs
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'items' => [], // Array of ['label' => 'Home', 'url' => '/']
];
$args = wp_parse_args( $args, $defaults );

if ( empty( $args['items'] ) ) {
    return;
}
?>

<nav class="flex" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-2">
        <?php foreach ( $args['items'] as $index => $item ) : ?>
            <li>
                <div class="flex items-center">
                    <?php if ( $index > 0 ) : ?>
                        <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                    <?php endif; ?>
                    
                    <a href="<?php echo esc_url( $item['url'] ); ?>" class="text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors duration-150 ease-in-out <?php echo $index === count($args['items']) - 1 ? 'text-gray-800' : ''; ?>" <?php echo $index === count($args['items']) - 1 ? 'aria-current="page"' : ''; ?>>
                        <?php echo esc_html( $item['label'] ); ?>
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
