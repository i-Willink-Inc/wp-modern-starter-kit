<?php
/**
 * Molecule: Dropdown
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'        => '',
    'trigger'   => 'メニュー',
    'items'     => [], // [ ['label' => '', 'url' => '', 'icon' => '', 'divider' => false], ... ]
    'position'  => 'bottom-left', // bottom-left, bottom-right, top-left, top-right
    'size'      => 'md',          // sm, md, lg
    'variant'   => 'default',     // default, primary
    'class'     => '',
];
$args = wp_parse_args( $args, $defaults );

$dropdown_id = $args['id'] ?: 'dropdown-' . wp_unique_id();

$size_classes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-5 py-2.5 text-lg',
];

$menu_size_classes = [
    'sm' => 'min-w-[160px]',
    'md' => 'min-w-[200px]',
    'lg' => 'min-w-[240px]',
];

$trigger_variants = [
    'default' => 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-blue-500',
    'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
];

$position_classes = [
    'bottom-left'  => 'top-full left-0 mt-2',
    'bottom-right' => 'top-full right-0 mt-2',
    'top-left'     => 'bottom-full left-0 mb-2',
    'top-right'    => 'bottom-full right-0 mb-2',
];

$trigger_classes = implode( ' ', array_filter( [
    'inline-flex items-center justify-center gap-2 font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2',
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
    $trigger_variants[ $args['variant'] ] ?? $trigger_variants['default'],
] ) );
?>

<div class="relative inline-block <?php echo esc_attr( $args['class'] ); ?>" id="<?php echo esc_attr( $dropdown_id ); ?>">
    <!-- Trigger Button -->
    <button 
        type="button"
        class="<?php echo esc_attr( $trigger_classes ); ?>"
        aria-haspopup="true"
        aria-expanded="false"
        onclick="toggleDropdown('<?php echo esc_attr( $dropdown_id ); ?>')"
    >
        <?php echo esc_html( $args['trigger'] ); ?>
        <svg class="h-4 w-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div 
        class="absolute hidden z-50 <?php echo esc_attr( $menu_size_classes[ $args['size'] ] ?? $menu_size_classes['md'] ); ?> <?php echo esc_attr( $position_classes[ $args['position'] ] ?? $position_classes['bottom-left'] ); ?> bg-white rounded-lg shadow-lg border border-gray-200 py-1"
        role="menu"
    >
        <?php foreach ( $args['items'] as $item ) : ?>
            <?php if ( ! empty( $item['divider'] ) ) : ?>
                <hr class="my-1 border-gray-200">
            <?php else : ?>
                <a 
                    href="<?php echo esc_url( $item['url'] ?? '#' ); ?>"
                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                    role="menuitem"
                >
                    <?php if ( ! empty( $item['icon'] ) ) : ?>
                        <span class="flex-shrink-0 text-gray-400"><?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <?php endif; ?>
                    <?php echo esc_html( $item['label'] ?? '' ); ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<script>
function toggleDropdown(dropdownId) {
    const container = document.getElementById(dropdownId);
    const menu = container.querySelector('[role="menu"]');
    const trigger = container.querySelector('[aria-haspopup]');
    const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
    
    // Close all other dropdowns
    document.querySelectorAll('[aria-haspopup]').forEach(btn => {
        btn.setAttribute('aria-expanded', 'false');
        btn.closest('.relative').querySelector('[role="menu"]').classList.add('hidden');
    });
    
    if (!isExpanded) {
        trigger.setAttribute('aria-expanded', 'true');
        menu.classList.remove('hidden');
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('[aria-haspopup], [role="menu"]')) {
        document.querySelectorAll('[aria-haspopup]').forEach(btn => {
            btn.setAttribute('aria-expanded', 'false');
            btn.closest('.relative').querySelector('[role="menu"]').classList.add('hidden');
        });
    }
});
</script>
