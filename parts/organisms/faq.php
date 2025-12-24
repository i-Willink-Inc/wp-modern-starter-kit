<?php
/**
 * Organism: FAQ
 *
 * FAQ Accordion.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title' => 'Frequently asked questions',
    'items' => [], // Array of ['question' => '', 'answer' => '']
    'class' => '',
];
$args = wp_parse_args( $args, $defaults );
?>

<section class="py-16 <?php echo esc_attr( $args['class'] ); ?>">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">
            <?php echo esc_html( $args['title'] ); ?>
        </h2>
        
        <div class="space-y-4">
            <?php foreach ( $args['items'] as $item ) : ?>
                <details class="group bg-white rounded-lg border border-gray-200">
                    <summary class="flex items-center justify-between w-full p-6 text-left font-medium text-gray-900 cursor-pointer list-none focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                        <span><?php echo esc_html( $item['question'] ); ?></span>
                        <span class="ml-6 flex-shrink-0 transition-transform duration-200 group-open:rotate-180 text-gray-400">
                            <!-- Helper Arrow Icon -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-gray-600">
                        <?php echo esc_html( $item['answer'] ); ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
