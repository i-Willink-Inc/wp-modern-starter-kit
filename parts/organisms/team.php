<?php
/**
 * Organism: Team
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => '',
    'description' => '',
    'members'     => [], // [ ['name' => '', 'role' => '', 'image' => '', 'bio' => '', 'social' => []], ... ]
    'columns'     => 3,  // 2, 3, 4
    'variant'     => 'default', // default, card, centered
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$columns_classes = [
    2 => 'grid-cols-1 sm:grid-cols-2',
    3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
    4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
];

$grid_classes = 'grid gap-8 ' . ( $columns_classes[ $args['columns'] ] ?? $columns_classes[3] );
?>

<section class="py-12 <?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( $args['title'] || $args['description'] ) : ?>
        <div class="text-center mb-12">
            <?php if ( $args['title'] ) : ?>
                <h2 class="text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html( $args['title'] ); ?></h2>
            <?php endif; ?>
            <?php if ( $args['description'] ) : ?>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?php echo esc_html( $args['description'] ); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr( $grid_classes ); ?>">
        <?php foreach ( $args['members'] as $member ) : ?>
            <?php if ( $args['variant'] === 'card' ) : ?>
                <!-- Card Variant -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                    <?php if ( ! empty( $member['image'] ) ) : ?>
                        <div class="aspect-square overflow-hidden">
                            <img 
                                src="<?php echo esc_url( $member['image'] ); ?>"
                                alt="<?php echo esc_attr( $member['name'] ?? '' ); ?>"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    <?php endif; ?>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900"><?php echo esc_html( $member['name'] ?? '' ); ?></h3>
                        <?php if ( ! empty( $member['role'] ) ) : ?>
                            <p class="text-sm text-blue-600 font-medium mb-3"><?php echo esc_html( $member['role'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $member['bio'] ) ) : ?>
                            <p class="text-sm text-gray-600 line-clamp-3"><?php echo esc_html( $member['bio'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $member['social'] ) ) : ?>
                            <div class="flex gap-3 mt-4">
                                <?php foreach ( $member['social'] as $social ) : ?>
                                    <a 
                                        href="<?php echo esc_url( $social['url'] ?? '#' ); ?>"
                                        class="text-gray-400 hover:text-gray-600 transition-colors"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="<?php echo esc_attr( $social['label'] ?? '' ); ?>"
                                    >
                                        <?php echo $social['icon'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php elseif ( $args['variant'] === 'centered' ) : ?>
                <!-- Centered Variant -->
                <div class="text-center">
                    <?php if ( ! empty( $member['image'] ) ) : ?>
                        <div class="mx-auto w-40 h-40 rounded-full overflow-hidden mb-4 ring-4 ring-gray-100">
                            <img 
                                src="<?php echo esc_url( $member['image'] ); ?>"
                                alt="<?php echo esc_attr( $member['name'] ?? '' ); ?>"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    <?php endif; ?>
                    <h3 class="text-lg font-semibold text-gray-900"><?php echo esc_html( $member['name'] ?? '' ); ?></h3>
                    <?php if ( ! empty( $member['role'] ) ) : ?>
                        <p class="text-sm text-blue-600 font-medium mb-2"><?php echo esc_html( $member['role'] ); ?></p>
                    <?php endif; ?>
                    <?php if ( ! empty( $member['bio'] ) ) : ?>
                        <p class="text-sm text-gray-600 mt-2"><?php echo esc_html( $member['bio'] ); ?></p>
                    <?php endif; ?>
                    <?php if ( ! empty( $member['social'] ) ) : ?>
                        <div class="flex justify-center gap-3 mt-4">
                            <?php foreach ( $member['social'] as $social ) : ?>
                                <a 
                                    href="<?php echo esc_url( $social['url'] ?? '#' ); ?>"
                                    class="text-gray-400 hover:text-gray-600 transition-colors"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="<?php echo esc_attr( $social['label'] ?? '' ); ?>"
                                >
                                    <?php echo $social['icon'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php else : ?>
                <!-- Default Variant -->
                <div class="flex gap-4">
                    <?php if ( ! empty( $member['image'] ) ) : ?>
                        <div class="flex-shrink-0 w-24 h-24 rounded-xl overflow-hidden">
                            <img 
                                src="<?php echo esc_url( $member['image'] ); ?>"
                                alt="<?php echo esc_attr( $member['name'] ?? '' ); ?>"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    <?php endif; ?>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-semibold text-gray-900"><?php echo esc_html( $member['name'] ?? '' ); ?></h3>
                        <?php if ( ! empty( $member['role'] ) ) : ?>
                            <p class="text-sm text-blue-600 font-medium"><?php echo esc_html( $member['role'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $member['bio'] ) ) : ?>
                            <p class="text-sm text-gray-600 mt-2 line-clamp-2"><?php echo esc_html( $member['bio'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $member['social'] ) ) : ?>
                            <div class="flex gap-3 mt-3">
                                <?php foreach ( $member['social'] as $social ) : ?>
                                    <a 
                                        href="<?php echo esc_url( $social['url'] ?? '#' ); ?>"
                                        class="text-gray-400 hover:text-gray-600 transition-colors"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="<?php echo esc_attr( $social['label'] ?? '' ); ?>"
                                    >
                                        <?php echo $social['icon'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
