<?php
/**
 * Template: Hero Split
 * 
 * Split layout with content on left and image on right.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'       => 'Data to enrich your online business',
    'description' => 'Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.',
    'primary_btn' => [
        'text' => 'Get started',
        'url'  => '#',
    ],
    'secondary_btn' => [
        'text' => 'Learn more',
        'url'  => '#',
    ],
    'image'       => 'https://images.unsplash.com/photo-1498758536662-35b82cd15e29?ixlib=rb-4.0.3&auto=format&fit=crop&w=2102&q=80',
    'stats'       => [
        ['value' => '8K+', 'label' => 'Companies worldwide'],
        ['value' => '25K+', 'label' => 'Happy customers'],
        ['value' => '99.9%', 'label' => 'Uptime guarantee'],
    ],
];
$args = wp_parse_args( $args ?? [], $defaults );
?>

<section class="bg-white overflow-hidden">
    <div class="relative max-w-7xl mx-auto">
        <div class="relative z-10 lg:w-full lg:max-w-2xl">
            <svg class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-white lg:block" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="0,0 90,0 50,100 0,100" />
            </svg>

            <div class="relative px-4 sm:px-6 lg:px-8 py-12 lg:py-32 lg:pr-0">
                <div class="max-w-2xl lg:max-w-xl mx-auto lg:mx-0">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                        <?php echo esc_html( $args['title'] ?? '' ); ?>
                    </h1>

                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        <?php echo esc_html( $args['description'] ?? '' ); ?>
                    </p>

                    <div class="mt-10 flex items-center gap-4">
                        <?php if ( ! empty( $args['primary_btn'] ) ) : ?>
                            <a href="<?php echo esc_url( $args['primary_btn']['url'] ); ?>" 
                               class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 transition-colors">
                                <?php echo esc_html( $args['primary_btn']['text'] ); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $args['secondary_btn'] ) ) : ?>
                            <a href="<?php echo esc_url( $args['secondary_btn']['url'] ); ?>" 
                               class="text-base font-semibold leading-6 text-gray-900 hover:text-gray-700 transition-colors">
                                <?php echo esc_html( $args['secondary_btn']['text'] ); ?> 
                                <span aria-hidden="true">→</span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if ( ! empty( $args['stats'] ) ) : ?>
                        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-8 border-t border-gray-200 pt-10">
                            <?php foreach ( $args['stats'] as $stat ) : ?>
                                <div>
                                    <p class="text-3xl font-bold text-gray-900"><?php echo esc_html( $stat['value'] ); ?></p>
                                    <p class="mt-1 text-sm text-gray-500"><?php echo esc_html( $stat['label'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="aspect-[3/2] object-cover lg:aspect-auto lg:h-full lg:w-full" 
             src="<?php echo esc_url( $args['image'] ?? '' ); ?>" 
             alt=""
             loading="lazy">
    </div>
</section>
