<?php
/**
 * Template: Contact Split
 * 
 * Contact form on left, info on right.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'       => 'Get in touch',
    'description' => 'Have questions? We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.',
    'info'        => [
        [
            'icon'  => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>',
            'title' => 'Visit us',
            'lines' => ['1234 Street Name', 'City, State 12345'],
        ],
        [
            'icon'  => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
            'title' => 'Email us',
            'lines' => ['hello@example.com', 'support@example.com'],
        ],
        [
            'icon'  => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>',
            'title' => 'Call us',
            'lines' => ['+1 (555) 123-4567'],
        ],
    ],
];
$args = wp_parse_args( $args ?? [], $defaults );
?>

<section class="bg-white py-24 sm:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Form -->
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    <?php echo esc_html( $args['title'] ?? '' ); ?>
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    <?php echo esc_html( $args['description'] ?? '' ); ?>
                </p>

                <form class="mt-8 space-y-6" action="#" method="POST">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">
                                <?php esc_html_e( 'First name', 'wp-modern-starter-kit' ); ?>
                            </label>
                            <input type="text" name="first-name" id="first-name" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   required>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">
                                <?php esc_html_e( 'Last name', 'wp-modern-starter-kit' ); ?>
                            </label>
                            <input type="text" name="last-name" id="last-name" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   required>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            <?php esc_html_e( 'Email', 'wp-modern-starter-kit' ); ?>
                        </label>
                        <input type="email" name="email" id="email" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                            <?php esc_html_e( 'Message', 'wp-modern-starter-kit' ); ?>
                        </label>
                        <textarea name="message" id="message" rows="5" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                  required></textarea>
                    </div>

                    <button type="submit" 
                            class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <?php esc_html_e( 'Send message', 'wp-modern-starter-kit' ); ?>
                    </button>
                </form>
            </div>

            <!-- Info -->
            <div class="lg:pl-8">
                <div class="bg-gray-50 rounded-2xl p-8 lg:p-12">
                    <h3 class="text-lg font-semibold text-gray-900 mb-8">
                        <?php esc_html_e( 'Contact information', 'wp-modern-starter-kit' ); ?>
                    </h3>
                    
                    <?php if ( ! empty( $args['info'] ) ) : ?>
                        <div class="space-y-8">
                            <?php foreach ( $args['info'] as $item ) : ?>
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                                        <?php echo $item['icon']; // phpcs:ignore ?>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">
                                            <?php echo esc_html( $item['title'] ); ?>
                                        </h4>
                                        <?php foreach ( $item['lines'] as $line ) : ?>
                                            <p class="text-gray-600"><?php echo esc_html( $line ); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <h4 class="font-medium text-gray-900 mb-4">
                            <?php esc_html_e( 'Follow us', 'wp-modern-starter-kit' ); ?>
                        </h4>
                        <div class="flex gap-4">
                            <!-- Social icons -->
                            <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
                            </a>
                            <!-- More icons... -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
