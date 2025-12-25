<?php
/**
 * Molecule: Pagination
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'current_page' => 1,
    'total_pages'  => 1,
    'base_url'     => '',
    'prev_text'    => '前へ',
    'next_text'    => '次へ',
    'show_first_last' => true,
    'max_visible'  => 5,
    'size'         => 'md', // sm, md, lg
    'class'        => '',
];
$args = wp_parse_args( $args, $defaults );

$current = max( 1, min( $args['current_page'], $args['total_pages'] ) );
$total   = max( 1, $args['total_pages'] );

if ( $total <= 1 ) {
    return;
}

$size_classes = [
    'sm' => 'px-2 py-1 text-xs min-w-[28px]',
    'md' => 'px-3 py-2 text-sm min-w-[36px]',
    'lg' => 'px-4 py-2.5 text-base min-w-[44px]',
];

$page_size = $size_classes[ $args['size'] ] ?? $size_classes['md'];

// Calculate visible page range
$half = floor( $args['max_visible'] / 2 );
$start = max( 1, $current - $half );
$end = min( $total, $start + $args['max_visible'] - 1 );
if ( $end - $start + 1 < $args['max_visible'] ) {
    $start = max( 1, $end - $args['max_visible'] + 1 );
}

/**
 * Generate page URL
 */
function get_page_url( $page, $base_url ) {
    if ( empty( $base_url ) ) {
        return get_pagenum_link( $page );
    }
    return add_query_arg( 'paged', $page, $base_url );
}
?>

<nav class="flex items-center justify-center gap-1 <?php echo esc_attr( $args['class'] ); ?>" role="navigation" aria-label="ページネーション">
    <!-- Previous Button -->
    <?php if ( $current > 1 ) : ?>
        <a href="<?php echo esc_url( get_page_url( $current - 1, $args['base_url'] ) ); ?>" 
           class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors"
           aria-label="前のページ">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="sr-only md:not-sr-only md:ml-1"><?php echo esc_html( $args['prev_text'] ); ?></span>
        </a>
    <?php else : ?>
        <span class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </span>
    <?php endif; ?>

    <!-- First Page + Ellipsis -->
    <?php if ( $args['show_first_last'] && $start > 1 ) : ?>
        <a href="<?php echo esc_url( get_page_url( 1, $args['base_url'] ) ); ?>" 
           class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
            1
        </a>
        <?php if ( $start > 2 ) : ?>
            <span class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> text-gray-500">…</span>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Page Numbers -->
    <?php for ( $i = $start; $i <= $end; $i++ ) : ?>
        <?php if ( $i === $current ) : ?>
            <span class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg bg-blue-600 text-white font-medium" aria-current="page">
                <?php echo esc_html( $i ); ?>
            </span>
        <?php else : ?>
            <a href="<?php echo esc_url( get_page_url( $i, $args['base_url'] ) ); ?>" 
               class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
                <?php echo esc_html( $i ); ?>
            </a>
        <?php endif; ?>
    <?php endfor; ?>

    <!-- Last Page + Ellipsis -->
    <?php if ( $args['show_first_last'] && $end < $total ) : ?>
        <?php if ( $end < $total - 1 ) : ?>
            <span class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> text-gray-500">…</span>
        <?php endif; ?>
        <a href="<?php echo esc_url( get_page_url( $total, $args['base_url'] ) ); ?>" 
           class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
            <?php echo esc_html( $total ); ?>
        </a>
    <?php endif; ?>

    <!-- Next Button -->
    <?php if ( $current < $total ) : ?>
        <a href="<?php echo esc_url( get_page_url( $current + 1, $args['base_url'] ) ); ?>" 
           class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors"
           aria-label="次のページ">
            <span class="sr-only md:not-sr-only md:mr-1"><?php echo esc_html( $args['next_text'] ); ?></span>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    <?php else : ?>
        <span class="inline-flex items-center justify-center <?php echo esc_attr( $page_size ); ?> rounded-lg border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </span>
    <?php endif; ?>
</nav>
