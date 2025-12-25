<?php
/**
 * Molecule: Toast
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'         => '',
    'message'    => '',
    'type'       => 'info',      // info, success, warning, error
    'position'   => 'top-right', // top-right, top-left, bottom-right, bottom-left, top-center, bottom-center
    'duration'   => 5000,        // Auto-dismiss in ms (0 = manual close only)
    'dismissible' => true,
    'icon'       => true,
    'class'      => '',
];
$args = wp_parse_args( $args, $defaults );

$toast_id = $args['id'] ?: 'toast-' . wp_unique_id();

$type_styles = [
    'info' => [
        'bg'   => 'bg-blue-50 border-blue-200',
        'text' => 'text-blue-800',
        'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>',
    ],
    'success' => [
        'bg'   => 'bg-green-50 border-green-200',
        'text' => 'text-green-800',
        'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>',
    ],
    'warning' => [
        'bg'   => 'bg-yellow-50 border-yellow-200',
        'text' => 'text-yellow-800',
        'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>',
    ],
    'error' => [
        'bg'   => 'bg-red-50 border-red-200',
        'text' => 'text-red-800',
        'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>',
    ],
];

$position_classes = [
    'top-right'     => 'top-4 right-4',
    'top-left'      => 'top-4 left-4',
    'bottom-right'  => 'bottom-4 right-4',
    'bottom-left'   => 'bottom-4 left-4',
    'top-center'    => 'top-4 left-1/2 -translate-x-1/2',
    'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2',
];

$style = $type_styles[ $args['type'] ] ?? $type_styles['info'];
$pos_class = $position_classes[ $args['position'] ] ?? $position_classes['top-right'];
?>

<div 
    id="<?php echo esc_attr( $toast_id ); ?>"
    class="fixed z-50 <?php echo esc_attr( $pos_class ); ?> transform transition-all duration-300 translate-y-0 opacity-100 <?php echo esc_attr( $args['class'] ); ?>"
    role="alert"
    data-duration="<?php echo esc_attr( $args['duration'] ); ?>"
>
    <div class="flex items-start gap-3 min-w-[300px] max-w-md p-4 border rounded-lg shadow-lg <?php echo esc_attr( $style['bg'] ); ?>">
        <?php if ( $args['icon'] ) : ?>
            <span class="flex-shrink-0 <?php echo esc_attr( $style['text'] ); ?>">
                <?php echo $style['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </span>
        <?php endif; ?>
        
        <div class="flex-1 <?php echo esc_attr( $style['text'] ); ?>">
            <?php echo esc_html( $args['message'] ); ?>
        </div>
        
        <?php if ( $args['dismissible'] ) : ?>
            <button 
                type="button"
                class="flex-shrink-0 <?php echo esc_attr( $style['text'] ); ?> hover:opacity-70 transition-opacity"
                onclick="dismissToast('<?php echo esc_attr( $toast_id ); ?>')"
                aria-label="閉じる"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        <?php endif; ?>
    </div>
</div>

<script>
(function() {
    const toastId = '<?php echo esc_js( $toast_id ); ?>';
    const toast = document.getElementById(toastId);
    const duration = parseInt(toast.dataset.duration);
    
    if (duration > 0) {
        setTimeout(() => dismissToast(toastId), duration);
    }
})();

function dismissToast(id) {
    const toast = document.getElementById(id);
    if (toast) {
        toast.classList.add('opacity-0', 'translate-y-2');
        setTimeout(() => toast.remove(), 300);
    }
}

function showToast(message, type = 'info', position = 'top-right') {
    // This function can be called from JS to show new toasts dynamically
    console.log('Toast:', message, type, position);
}
</script>
