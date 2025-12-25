<?php
/**
 * Molecule: Tabs
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'      => '',
    'tabs'    => [], // [ ['id' => '', 'label' => '', 'content' => '', 'icon' => ''], ... ]
    'active'  => 0,  // Index of active tab (0-based)
    'variant' => 'underline', // underline, boxed, pills
    'size'    => 'md',        // sm, md, lg
    'class'   => '',
];
$args = wp_parse_args( $args, $defaults );

$container_id = $args['id'] ?: 'tabs-' . wp_unique_id();

$size_classes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg',
];

$tab_size = $size_classes[ $args['size'] ] ?? $size_classes['md'];

$variant_styles = [
    'underline' => [
        'container' => 'border-b border-gray-200',
        'tab'       => 'border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700',
        'active'    => 'border-blue-600 text-blue-600',
        'inactive'  => 'text-gray-500',
    ],
    'boxed' => [
        'container' => 'bg-gray-100 p-1 rounded-lg',
        'tab'       => 'rounded-md hover:bg-gray-200',
        'active'    => 'bg-white shadow-sm text-gray-900',
        'inactive'  => 'text-gray-600',
    ],
    'pills' => [
        'container' => 'gap-2',
        'tab'       => 'rounded-full hover:bg-gray-100',
        'active'    => 'bg-blue-600 text-white hover:bg-blue-700',
        'inactive'  => 'text-gray-600',
    ],
];

$styles = $variant_styles[ $args['variant'] ] ?? $variant_styles['underline'];
?>

<div id="<?php echo esc_attr( $container_id ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>">
    <!-- Tab List -->
    <div class="flex <?php echo esc_attr( $styles['container'] ); ?>" role="tablist">
        <?php foreach ( $args['tabs'] as $index => $tab ) : 
            $tab_id = $tab['id'] ?? $container_id . '-tab-' . $index;
            $panel_id = $tab['id'] ?? $container_id . '-panel-' . $index;
            $is_active = $index === $args['active'];
        ?>
            <button 
                type="button"
                id="<?php echo esc_attr( $tab_id ); ?>"
                class="inline-flex items-center justify-center gap-2 font-medium transition-colors <?php echo esc_attr( $tab_size ); ?> <?php echo esc_attr( $styles['tab'] ); ?> <?php echo $is_active ? esc_attr( $styles['active'] ) : esc_attr( $styles['inactive'] ); ?>"
                role="tab"
                aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                data-tab-target="#<?php echo esc_attr( $panel_id ); ?>"
                onclick="switchTab(this, '<?php echo esc_attr( $container_id ); ?>')"
            >
                <?php if ( ! empty( $tab['icon'] ) ) : ?>
                    <span class="flex-shrink-0"><?php echo $tab['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                <?php endif; ?>
                <?php echo esc_html( $tab['label'] ?? '' ); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Tab Panels -->
    <div class="mt-4">
        <?php foreach ( $args['tabs'] as $index => $tab ) : 
            $panel_id = $tab['id'] ?? $container_id . '-panel-' . $index;
            $tab_id = $tab['id'] ?? $container_id . '-tab-' . $index;
            $is_active = $index === $args['active'];
        ?>
            <div 
                id="<?php echo esc_attr( $panel_id ); ?>"
                class="<?php echo $is_active ? '' : 'hidden'; ?>"
                role="tabpanel"
                aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
                tabindex="0"
            >
                <?php echo $tab['content'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function switchTab(clickedTab, containerId) {
    const container = document.getElementById(containerId);
    const styles = <?php echo json_encode($styles); ?>;
    
    // Reset all tabs
    container.querySelectorAll('[role="tab"]').forEach(tab => {
        tab.setAttribute('aria-selected', 'false');
        tab.setAttribute('tabindex', '-1');
        tab.classList.remove(...styles.active.split(' '));
        tab.classList.add(...styles.inactive.split(' '));
        const targetPanel = document.querySelector(tab.dataset.tabTarget);
        if (targetPanel) targetPanel.classList.add('hidden');
    });
    
    // Activate clicked tab
    clickedTab.setAttribute('aria-selected', 'true');
    clickedTab.setAttribute('tabindex', '0');
    clickedTab.classList.remove(...styles.inactive.split(' '));
    clickedTab.classList.add(...styles.active.split(' '));
    const targetPanel = document.querySelector(clickedTab.dataset.tabTarget);
    if (targetPanel) targetPanel.classList.remove('hidden');
}

// Keyboard navigation for tabs
document.addEventListener('keydown', function(e) {
    const target = e.target;
    if (target.getAttribute('role') !== 'tab') return;
    
    const tablist = target.closest('[role="tablist"]');
    if (!tablist) return;
    
    const tabs = Array.from(tablist.querySelectorAll('[role="tab"]'));
    const currentIndex = tabs.indexOf(target);
    let newIndex = currentIndex;
    
    switch (e.key) {
        case 'ArrowLeft':
        case 'ArrowUp':
            e.preventDefault();
            newIndex = currentIndex === 0 ? tabs.length - 1 : currentIndex - 1;
            break;
        case 'ArrowRight':
        case 'ArrowDown':
            e.preventDefault();
            newIndex = currentIndex === tabs.length - 1 ? 0 : currentIndex + 1;
            break;
        case 'Home':
            e.preventDefault();
            newIndex = 0;
            break;
        case 'End':
            e.preventDefault();
            newIndex = tabs.length - 1;
            break;
        default:
            return;
    }
    
    if (newIndex !== currentIndex) {
        const containerId = tablist.closest('[id]').id;
        tabs[newIndex].focus();
        switchTab(tabs[newIndex], containerId);
    }
});
</script>

