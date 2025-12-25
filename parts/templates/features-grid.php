<?php
/**
 * Template: Features Grid
 * 
 * 3-column grid with icons and descriptions.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'       => 'Everything you need',
    'subtitle'    => 'Features',
    'description' => 'Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit.',
    'features'    => [
        [
            'title'       => 'Push to Deploy',
            'description' => 'Morbi viverra dui mi arcu sed. Tellus semper adipiscing suspendisse semper morbi.',
            'icon'        => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>',
        ],
        [
            'title'       => 'SSL Certificates',
            'description' => 'Sit quis amet rutrum tellus ullamcorper ultricies libero dolor eget.',
            'icon'        => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>',
        ],
        [
            'title'       => 'Simple Queues',
            'description' => 'Quisque est vel vulputate cursus. Risus proin diam nunc commodo.',
            'icon'        => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>',
        ],
        [
            'title'       => 'Advanced Security',
            'description' => 'Arcu egestas dolor vel iaculis in ipsum mauris. Tincidunt mattis aliquet.',
            'icon'        => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>',
        ],
        [
            'title'       => 'Powerful API',
            'description' => 'Pellentesque sit elit congue ante nec amet. Dolor aenean curabitur viverra.',
            'icon'        => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>',
        ],
        [
            'title'       => 'Database Backups',
            'description' => 'Fringilla a sed at suspendisse ut enim volutpat. Rhoncus vel est tellus.',
            'icon'        => '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" /></svg>',
        ],
    ],
];
$args = wp_parse_args( $args ?? [], $defaults );
?>

<section class="bg-white py-24 sm:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center lg:text-left lg:mx-0">
            <?php if ( ! empty( $args['subtitle'] ) ) : ?>
                <p class="text-base font-semibold leading-7 text-blue-600">
                    <?php echo esc_html( $args['subtitle'] ); ?>
                </p>
            <?php endif; ?>
            
            <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo esc_html( $args['title'] ?? '' ); ?>
            </h2>
            
            <?php if ( ! empty( $args['description'] ) ) : ?>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    <?php echo esc_html( $args['description'] ); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10">
            <?php if ( ! empty( $args['features'] ) ) : ?>
                <?php foreach ( $args['features'] as $feature ) : ?>
                    <div class="relative pl-16">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600 text-white">
                            <?php echo $feature['icon']; // phpcs:ignore ?>
                        </div>
                        <h3 class="text-base font-semibold leading-7 text-gray-900">
                            <?php echo esc_html( $feature['title'] ); ?>
                        </h3>
                        <p class="mt-2 text-base leading-7 text-gray-600">
                            <?php echo esc_html( $feature['description'] ); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
