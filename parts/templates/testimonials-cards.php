<?php
/**
 * Template: Testimonials Cards
 * 
 * Grid of testimonial cards with avatars.
 *
 * @package WP_Modern_Starter_Kit
 */

$defaults = [
    'title'        => 'Loved by businesses worldwide',
    'subtitle'     => 'Testimonials',
    'description'  => 'Hear from some of our amazing customers who are building incredible businesses.',
    'testimonials' => [
        [
            'quote'   => 'This platform has completely transformed how we handle our business. The efficiency gains have been incredible.',
            'name'    => 'Sarah Johnson',
            'role'    => 'CEO at TechCorp',
            'avatar'  => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        ],
        [
            'quote'   => 'The customer support is outstanding. They helped us migrate our entire workflow in just a few days.',
            'name'    => 'Michael Chen',
            'role'    => 'CTO at StartupXYZ',
            'avatar'  => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        ],
        [
            'quote'   => 'We\'ve seen a 40% increase in productivity since switching to this platform. Highly recommended!',
            'name'    => 'Emily Davis',
            'role'    => 'Product Manager at DevCo',
            'avatar'  => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        ],
    ],
];
$args = wp_parse_args( $args ?? [], $defaults );
?>

<section class="bg-gray-50 py-24 sm:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
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

        <div class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-3">
            <?php if ( ! empty( $args['testimonials'] ) ) : ?>
                <?php foreach ( $args['testimonials'] as $testimonial ) : ?>
                    <div class="bg-white rounded-2xl p-8 shadow-sm ring-1 ring-gray-200 flex flex-col justify-between h-full">
                        <div>
                            <div class="flex gap-1 text-yellow-400 mb-6">
                                <?php for ( $i = 0; $i < 5; $i++ ) : ?>
                                    <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                <?php endfor; ?>
                            </div>

                            <blockquote class="text-gray-700 leading-relaxed">
                                "<?php echo esc_html( $testimonial['quote'] ); ?>"
                            </blockquote>
                        </div>

                        <div class="mt-6 flex items-center gap-4 pt-6 border-t border-gray-100">
                            <?php if ( ! empty( $testimonial['avatar'] ) ) : ?>
                                <img class="h-12 w-12 rounded-full object-cover bg-gray-50 bg-" 
                                     src="<?php echo esc_url( $testimonial['avatar'] ); ?>" 
                                     alt="<?php echo esc_attr( $testimonial['name'] ); ?>"
                                     loading="lazy">
                            <?php endif; ?>
                            <div>
                                <p class="font-semibold text-gray-900"><?php echo esc_html( $testimonial['name'] ); ?></p>
                                <p class="text-sm text-gray-500"><?php echo esc_html( $testimonial['role'] ); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
