<?php
/**
 * Organism: Testimonials
 *
 * A grid or slider of user testimonials.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => 'Loved by developers',
    'description' => 'See what others are saying about our platform.',
    'items'       => [], // Array of ['content' => '', 'author' => '', 'role' => '', 'avatar_url' => '']
    'columns'     => 3,
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$grid_cols = match($args['columns']) {
    2       => 'sm:grid-cols-2',
    4       => 'sm:grid-cols-2 lg:grid-cols-4',
    default => 'sm:grid-cols-2 lg:grid-cols-3',
};
?>

<section class="py-16 bg-gray-50 <?php echo esc_attr( $args['class'] ); ?>">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo esc_html( $args['title'] ); ?>
            </h2>
            <?php if ( ! empty( $args['description'] ) ) : ?>
                <p class="mt-4 text-lg text-gray-600">
                    <?php echo esc_html( $args['description'] ); ?>
                </p>
            <?php endif; ?>
        </div>
        
        <div class="grid gap-8 <?php echo esc_attr( $grid_cols ); ?>">
            <?php foreach ( $args['items'] as $item ) : ?>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full">
                    <blockquote class="flex-grow text-gray-700 leading-relaxed mb-6">
                        "<?php echo esc_html( $item['content'] ); ?>"
                    </blockquote>
                    <div class="flex items-center gap-4 mt-auto">
                        <?php get_template_part('parts/atoms/avatar', null, [
                            'src'  => $item['avatar_url'] ?? '',
                            'alt'  => $item['author'],
                            'size' => 'md',
                        ]); ?>
                        <div>
                            <div class="font-semibold text-gray-900">
                                <?php echo esc_html( $item['author'] ); ?>
                            </div>
                            <?php if ( ! empty( $item['role'] ) ) : ?>
                                <div class="text-sm text-gray-500">
                                    <?php echo esc_html( $item['role'] ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
