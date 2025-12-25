<?php
/**
 * Organism: Modal
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'           => '',
    'title'        => '',
    'content'      => '',
    'footer'       => '',       // Footer HTML (buttons, etc.)
    'size'         => 'md',     // sm, md, lg, xl, full
    'closable'     => true,
    'close_on_overlay' => true,
    'class'        => '',
];
$args = wp_parse_args( $args, $defaults );

$modal_id = $args['id'] ?: 'modal-' . wp_unique_id();

$size_classes = [
    'sm'   => 'max-w-sm',
    'md'   => 'max-w-md',
    'lg'   => 'max-w-lg',
    'xl'   => 'max-w-xl',
    'full' => 'max-w-4xl',
];

$modal_size = $size_classes[ $args['size'] ] ?? $size_classes['md'];
?>

<!-- Modal Backdrop -->
<div 
    id="<?php echo esc_attr( $modal_id ); ?>" 
    class="fixed inset-0 z-50 hidden" 
    role="dialog" 
    aria-modal="true"
    aria-labelledby="<?php echo esc_attr( $modal_id ); ?>-title"
>
    <!-- Overlay -->
    <div 
        class="fixed inset-0 bg-black/50 transition-opacity"
        <?php if ( $args['close_on_overlay'] ) : ?>
            onclick="closeModal('<?php echo esc_attr( $modal_id ); ?>')"
        <?php endif; ?>
    ></div>

    <!-- Modal Container -->
    <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Modal Content -->
            <div class="relative w-full <?php echo esc_attr( $modal_size ); ?> bg-white rounded-xl shadow-2xl transform transition-all <?php echo esc_attr( $args['class'] ); ?>">
                <!-- Header -->
                <?php if ( $args['title'] || $args['closable'] ) : ?>
                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                        <?php if ( $args['title'] ) : ?>
                            <h3 id="<?php echo esc_attr( $modal_id ); ?>-title" class="text-lg font-semibold text-gray-900">
                                <?php echo esc_html( $args['title'] ); ?>
                            </h3>
                        <?php else : ?>
                            <div></div>
                        <?php endif; ?>
                        
                        <?php if ( $args['closable'] ) : ?>
                            <button 
                                type="button" 
                                class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors"
                                onclick="closeModal('<?php echo esc_attr( $modal_id ); ?>')"
                                aria-label="閉じる"
                            >
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Body -->
                <div class="px-6 py-4">
                    <?php echo $args['content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>

                <!-- Footer -->
                <?php if ( $args['footer'] ) : ?>
                    <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-xl">
                        <?php echo $args['footer']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
let previouslyFocusedElement = null;

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    previouslyFocusedElement = document.activeElement;
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
    
    // Focus first focusable element
    const focusable = getFocusableElements(modal);
    if (focusable.length) focusable[0].focus();
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
    
    // Restore focus to previously focused element
    if (previouslyFocusedElement) {
        previouslyFocusedElement.focus();
        previouslyFocusedElement = null;
    }
}

function getFocusableElements(container) {
    return container.querySelectorAll(
        'button:not([disabled]), [href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
    );
}

// Handle keyboard events for modal
document.addEventListener('keydown', function(e) {
    const openModal = document.querySelector('[role="dialog"]:not(.hidden)');
    if (!openModal) return;
    
    // Close on Escape
    if (e.key === 'Escape') {
        closeModal(openModal.id);
        return;
    }
    
    // Focus trap on Tab
    if (e.key === 'Tab') {
        const focusable = getFocusableElements(openModal);
        if (focusable.length === 0) return;
        
        const firstElement = focusable[0];
        const lastElement = focusable[focusable.length - 1];
        
        if (e.shiftKey) {
            // Shift + Tab: cycle to last element if on first
            if (document.activeElement === firstElement) {
                e.preventDefault();
                lastElement.focus();
            }
        } else {
            // Tab: cycle to first element if on last
            if (document.activeElement === lastElement) {
                e.preventDefault();
                firstElement.focus();
            }
        }
    }
});
</script>
