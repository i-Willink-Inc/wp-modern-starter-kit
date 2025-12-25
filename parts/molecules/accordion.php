<?php
/**
 * Molecule: Accordion
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'items'      => [], // [ ['title' => '', 'content' => '', 'open' => false], ... ]
    'allow_multiple' => false, // Allow multiple panels open at once
    'variant'    => 'default', // default, bordered, separated
    'class'      => '',
];
$args = wp_parse_args( $args, $defaults );

$accordion_id = 'accordion-' . wp_unique_id();

$variant_classes = [
    'default' => [
        'container' => 'divide-y divide-gray-200',
        'item'      => '',
        'header'    => 'py-4',
    ],
    'bordered' => [
        'container' => 'border border-gray-200 rounded-lg divide-y divide-gray-200',
        'item'      => '',
        'header'    => 'px-4 py-4',
    ],
    'separated' => [
        'container' => 'space-y-3',
        'item'      => 'border border-gray-200 rounded-lg overflow-hidden',
        'header'    => 'px-4 py-4',
    ],
];

$styles = $variant_classes[ $args['variant'] ] ?? $variant_classes['default'];
?>

<div 
    class="<?php echo esc_attr( $styles['container'] ); ?> <?php echo esc_attr( $args['class'] ); ?>"
    id="<?php echo esc_attr( $accordion_id ); ?>"
    data-allow-multiple="<?php echo $args['allow_multiple'] ? 'true' : 'false'; ?>"
>
    <?php foreach ( $args['items'] as $index => $item ) : 
        $panel_id = $accordion_id . '-panel-' . $index;
        $is_open = ! empty( $item['open'] );
    ?>
        <div class="<?php echo esc_attr( $styles['item'] ); ?>">
            <!-- Header -->
            <button 
                type="button"
                class="flex items-center justify-between w-full text-left <?php echo esc_attr( $styles['header'] ); ?> hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
                aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                onclick="toggleAccordion(this, '<?php echo esc_attr( $accordion_id ); ?>')"
            >
                <span class="text-base font-medium text-gray-900">
                    <?php echo esc_html( $item['title'] ?? '' ); ?>
                </span>
                <svg 
                    class="h-5 w-5 text-gray-500 transform transition-transform duration-200 <?php echo $is_open ? 'rotate-180' : ''; ?>" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            
            <!-- Panel -->
            <div 
                id="<?php echo esc_attr( $panel_id ); ?>"
                class="overflow-hidden transition-all duration-300 ease-in-out <?php echo $is_open ? '' : 'hidden'; ?>"
                role="region"
            >
                <div class="<?php echo $args['variant'] !== 'default' ? 'px-4' : ''; ?> pb-4 text-gray-600">
                    <?php echo wp_kses_post( $item['content'] ?? '' ); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
function toggleAccordion(button, accordionId) {
    const accordion = document.getElementById(accordionId);
    const allowMultiple = accordion.dataset.allowMultiple === 'true';
    const panel = button.nextElementSibling;
    const isExpanded = button.getAttribute('aria-expanded') === 'true';
    const icon = button.querySelector('svg');
    
    // Close other panels if not allowing multiple
    if (!allowMultiple && !isExpanded) {
        accordion.querySelectorAll('[aria-expanded="true"]').forEach(otherButton => {
            if (otherButton !== button) {
                otherButton.setAttribute('aria-expanded', 'false');
                otherButton.nextElementSibling.classList.add('hidden');
                otherButton.querySelector('svg').classList.remove('rotate-180');
            }
        });
    }
    
    // Toggle current panel
    button.setAttribute('aria-expanded', !isExpanded);
    panel.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}
</script>
