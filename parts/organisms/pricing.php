<?php
/**
 * Organism: Pricing
 *
 * Pricing tables.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => 'Simple, transparent pricing',
    'description' => 'Choose the plan that fits your needs.',
    'plans'       => [], // Array of plan details
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );
?>

<section class="py-16 <?php echo esc_attr( $args['class'] ); ?>">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo esc_html( $args['title'] ); ?>
            </h2>
            <p class="mt-4 text-lg text-gray-600">
                <?php echo esc_html( $args['description'] ); ?>
            </p>
        </div>
        
        <div class="grid gap-8 lg:grid-cols-3 lg:gap-8 justify-center">
            <?php foreach ( $args['plans'] as $plan ) : 
                $is_featured = !empty($plan['featured']) && $plan['featured'];
            ?>
                <div class="rounded-2xl p-8 flex flex-col h-full bg-white <?php echo $is_featured ? 'ring-2 ring-blue-600 shadow-xl scale-105' : 'border border-gray-200 shadow-sm'; ?>">
                    <h3 class="text-lg font-semibold text-gray-900">
                        <?php echo esc_html( $plan['name'] ); ?>
                    </h3>
                    <p class="mt-4 flex items-baseline text-gray-900">
                        <span class="text-4xl font-bold tracking-tight"><?php echo esc_html( $plan['price'] ); ?></span>
                        <?php if ( ! empty( $plan['period'] ) ) : ?>
                            <span class="ml-1 text-sm font-semibold text-gray-500">/<?php echo esc_html( $plan['period'] ); ?></span>
                        <?php endif; ?>
                    </p>
                    <p class="mt-6 text-gray-500">
                        <?php echo esc_html( $plan['description'] ); ?>
                    </p>
                    
                    <ul role="list" class="mt-8 space-y-3 mb-8 flex-grow">
                        <?php foreach ( $plan['features'] as $feature ) : ?>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-5 h-5 text-blue-600">
                                    <?php get_template_part('parts/atoms/icon', null, ['name' => 'check', 'size' => 'sm']); ?>
                                </span>
                                <span class="ml-3 text-sm text-gray-700"><?php echo esc_html( $feature ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <?php get_template_part('parts/atoms/button', null, [
                        'text'    => $plan['button_text'] ?? 'Get started',
                        'url'     => $plan['button_url'] ?? '#',
                        'variant' => $is_featured ? 'primary' : 'outline',
                        'size'    => 'lg',
                        'class'   => 'w-full justify-center',
                    ]); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
