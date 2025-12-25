<?php
/**
 * Organism: Drawer
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'        => '',
    'title'     => '',
    'content'   => '',
    'position'  => 'right',    // left, right
    'size'      => 'md',       // sm, md, lg, xl, full
    'overlay'   => true,
    'closable'  => true,
    'class'     => '',
];
$args = wp_parse_args( $args, $defaults );

$drawer_id = $args['id'] ?: 'drawer-' . wp_unique_id();

$size_classes = [
    'sm'   => 'max-w-sm',
    'md'   => 'max-w-md',
    'lg'   => 'max-w-lg',
    'xl'   => 'max-w-xl',
    'full' => 'max-w-full',
];

$position_classes = [
    'left'  => 'left-0 -translate-x-full',
    'right' => 'right-0 translate-x-full',
];

$size_class = $size_classes[ $args['size'] ] ?? $size_classes['md'];
$pos_class = $position_classes[ $args['position'] ] ?? $position_classes['right'];
$transform_open = $args['position'] === 'left' ? 'translate-x-0' : 'translate-x-0';
?>

<!-- Drawer Overlay -->
<div 
    id="<?php echo esc_attr( $drawer_id ); ?>-overlay"
    class="fixed inset-0 z-40 bg-black/50 hidden opacity-0 transition-opacity duration-300"
    <?php if ( $args['overlay'] ) : ?>
    onclick="closeDrawer('<?php echo esc_attr( $drawer_id ); ?>')"
    <?php endif; ?>
></div>

<!-- Drawer Panel -->
<div 
    id="<?php echo esc_attr( $drawer_id ); ?>"
    class="fixed top-0 z-50 h-full w-full <?php echo esc_attr( $size_class ); ?> <?php echo esc_attr( $pos_class ); ?> bg-white shadow-xl transform transition-transform duration-300 ease-in-out <?php echo esc_attr( $args['class'] ); ?>"
    role="dialog"
    aria-modal="true"
    aria-labelledby="<?php echo esc_attr( $drawer_id ); ?>-title"
>
    <!-- Header -->
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <h2 id="<?php echo esc_attr( $drawer_id ); ?>-title" class="text-lg font-semibold text-gray-900">
            <?php echo esc_html( $args['title'] ); ?>
        </h2>
        <?php if ( $args['closable'] ) : ?>
            <button 
                type="button"
                class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors"
                onclick="closeDrawer('<?php echo esc_attr( $drawer_id ); ?>')"
                aria-label="閉じる"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        <?php endif; ?>
    </div>
    
    <!-- Content -->
    <div class="flex-1 overflow-y-auto p-6">
        <?php echo wp_kses_post( $args['content'] ); ?>
    </div>
</div>

<script>
function openDrawer(id) {
    const drawer = document.getElementById(id);
    const overlay = document.getElementById(id + '-overlay');
    
    if (drawer && overlay) {
        overlay.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            drawer.classList.remove('-translate-x-full', 'translate-x-full');
            drawer.classList.add('translate-x-0');
        }, 10);
        document.body.style.overflow = 'hidden';
    }
}

function closeDrawer(id) {
    const drawer = document.getElementById(id);
    const overlay = document.getElementById(id + '-overlay');
    const isLeft = drawer.classList.contains('left-0');
    
    if (drawer && overlay) {
        overlay.classList.add('opacity-0');
        drawer.classList.remove('translate-x-0');
        drawer.classList.add(isLeft ? '-translate-x-full' : 'translate-x-full');
        
        setTimeout(() => {
            overlay.classList.add('hidden');
        }, 300);
        document.body.style.overflow = '';
    }
}

// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.querySelectorAll('[id$="-overlay"]:not(.hidden)').forEach(overlay => {
            const id = overlay.id.replace('-overlay', '');
            closeDrawer(id);
        });
    }
});
</script>
