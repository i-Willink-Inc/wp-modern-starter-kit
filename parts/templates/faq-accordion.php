<?php
/**
 * Template: FAQ Accordion
 * 
 * Expandable accordion FAQ section.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'       => 'Frequently asked questions',
    'description' => 'Have a different question? Contact our support team.',
    'faqs'        => [
        [
            'question' => 'What\'s the best thing about Switzerland?',
            'answer'   => 'I don\'t know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        ],
        [
            'question' => 'How do I cancel my subscription?',
            'answer'   => 'You can cancel your subscription at any time from your account settings. Your access will continue until the end of your billing period.',
        ],
        [
            'question' => 'Can I change my plan later?',
            'answer'   => 'Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.',
        ],
        [
            'question' => 'Do you offer refunds?',
            'answer'   => 'We offer a 30-day money-back guarantee. If you\'re not satisfied, contact our support team for a full refund.',
        ],
        [
            'question' => 'Is there a free trial available?',
            'answer'   => 'Yes, we offer a 14-day free trial with full access to all features. No credit card required to start.',
        ],
    ],
];
$args = wp_parse_args( $args ?? [], $defaults );
$accordion_id = 'faq-' . wp_unique_id();
?>

<section class="bg-white py-24 sm:py-32">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo esc_html( $args['title'] ); ?>
            </h2>
            
            <?php if ( $args['description'] ) : ?>
                <p class="mt-4 text-lg text-gray-600">
                    <?php echo esc_html( $args['description'] ); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="divide-y divide-gray-200 border-t border-b border-gray-200">
            <?php foreach ( $args['faqs'] as $index => $faq ) : 
                $item_id = $accordion_id . '-' . $index;
                $is_open = $index === 0;
            ?>
                <div class="py-6">
                    <button type="button" 
                            class="flex w-full items-start justify-between text-left"
                            aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
                            aria-controls="<?php echo esc_attr( $item_id ); ?>"
                            onclick="toggleFaq(this, '<?php echo esc_attr( $item_id ); ?>')">
                        <span class="text-base font-semibold leading-7 text-gray-900">
                            <?php echo esc_html( $faq['question'] ); ?>
                        </span>
                        <span class="ml-6 flex h-7 items-center">
                            <svg class="faq-icon h-6 w-6 text-gray-400 transition-transform duration-200 <?php echo $is_open ? 'rotate-180' : ''; ?>" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div id="<?php echo esc_attr( $item_id ); ?>" 
                         class="faq-content mt-4 pr-12 <?php echo $is_open ? '' : 'hidden'; ?>">
                        <p class="text-base leading-7 text-gray-600">
                            <?php echo esc_html( $faq['answer'] ); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
function toggleFaq(button, contentId) {
    const content = document.getElementById(contentId);
    const icon = button.querySelector('.faq-icon');
    const isExpanded = button.getAttribute('aria-expanded') === 'true';
    
    button.setAttribute('aria-expanded', !isExpanded);
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}
</script>
