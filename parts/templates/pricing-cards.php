<?php
/**
 * Template: Pricing Cards
 * 
 * 3-column pricing cards with features.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'       => 'Pricing',
    'subtitle'    => 'Choose the right plan for you',
    'description' => 'Choose an affordable plan that\'s packed with the best features for engaging your audience.',
    'plans'       => [
        [
            'name'        => 'Hobby',
            'price'       => '$19',
            'period'      => '/month',
            'description' => 'The essentials to provide your best work for clients.',
            'features'    => [
                '5 products',
                'Up to 1,000 subscribers',
                'Basic analytics',
                '48-hour support response time',
            ],
            'cta'         => [
                'text' => 'Get started',
                'url'  => '#',
            ],
            'highlighted' => false,
        ],
        [
            'name'        => 'Professional',
            'price'       => '$49',
            'period'      => '/month',
            'description' => 'A plan that scales with your rapidly growing business.',
            'features'    => [
                '25 products',
                'Up to 10,000 subscribers',
                'Advanced analytics',
                '24-hour support response time',
                'Marketing automations',
            ],
            'cta'         => [
                'text' => 'Get started',
                'url'  => '#',
            ],
            'highlighted' => true,
        ],
        [
            'name'        => 'Enterprise',
            'price'       => '$99',
            'period'      => '/month',
            'description' => 'Dedicated support and infrastructure for your company.',
            'features'    => [
                'Unlimited products',
                'Unlimited subscribers',
                'Advanced analytics',
                '1-hour support response time',
                'Marketing automations',
                'Custom integrations',
            ],
            'cta'         => [
                'text' => 'Contact sales',
                'url'  => '#',
            ],
            'highlighted' => false,
        ],
    ],
];
$args = wp_parse_args( $args ?? [], $defaults );
?>

<section class="bg-white py-24 sm:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <?php if ( ! empty( $args['title'] ) ) : ?>
                <p class="text-base font-semibold leading-7 text-blue-600">
                    <?php echo esc_html( $args['title'] ); ?>
                </p>
            <?php endif; ?>
            
            <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo esc_html( $args['subtitle'] ?? '' ); ?>
            </h2>
            
            <p class="mt-6 text-lg leading-8 text-gray-600">
                <?php echo esc_html( $args['description'] ?? '' ); ?>
            </p>
        </div>

        <div class="mt-16 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?php if ( ! empty( $args['plans'] ) ) : ?>
                <?php foreach ( $args['plans'] as $plan ) : 
                    $card_classes = $plan['highlighted'] 
                        ? 'bg-gray-900 ring-2 ring-gray-900' 
                        : 'bg-white ring-1 ring-gray-200';
                    $title_color = $plan['highlighted'] ? 'text-blue-400' : 'text-blue-600';
                    $price_color = $plan['highlighted'] ? 'text-white' : 'text-gray-900';
                    $text_color = $plan['highlighted'] ? 'text-gray-300' : 'text-gray-600';
                    $feature_color = $plan['highlighted'] ? 'text-gray-300' : 'text-gray-600';
                    $check_color = $plan['highlighted'] ? 'text-blue-400' : 'text-blue-600';
                    $btn_classes = $plan['highlighted'] 
                        ? 'bg-blue-500 text-white hover:bg-blue-400' 
                        : 'bg-blue-600 text-white hover:bg-blue-700';
                ?>
                    <div class="<?php echo esc_attr( $card_classes ); ?> rounded-3xl p-8 xl:p-10 flex flex-col">
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 class="text-lg font-semibold leading-8 <?php echo esc_attr( $title_color ); ?>">
                                <?php echo esc_html( $plan['name'] ); ?>
                            </h3>
                            <?php if ( $plan['highlighted'] ) : ?>
                                <span class="rounded-full bg-blue-500 px-2.5 py-1 text-xs font-semibold text-white">
                                    Most popular
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <p class="mt-4 text-sm leading-6 <?php echo esc_attr( $text_color ); ?>">
                            <?php echo esc_html( $plan['description'] ); ?>
                        </p>
                        
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight <?php echo esc_attr( $price_color ); ?>">
                                <?php echo esc_html( $plan['price'] ); ?>
                            </span>
                            <span class="text-sm font-semibold leading-6 <?php echo esc_attr( $text_color ); ?>">
                                <?php echo esc_html( $plan['period'] ); ?>
                            </span>
                        </p>

                        <a href="<?php echo esc_url( $plan['cta']['url'] ); ?>" 
                           class="mt-6 block w-full rounded-lg px-3 py-2 text-center text-sm font-semibold leading-6 transition-colors <?php echo esc_attr( $btn_classes ); ?>">
                            <?php echo esc_html( $plan['cta']['text'] ); ?>
                        </a>

                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 <?php echo esc_attr( $feature_color ); ?> flex-1">
                            <?php foreach ( $plan['features'] as $feature ) : ?>
                                <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none <?php echo esc_attr( $check_color ); ?>" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    <?php echo esc_html( $feature ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
