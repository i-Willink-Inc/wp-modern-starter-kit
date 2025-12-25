<?php
/**
 * Organism: Timeline
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'items'   => [], // [ ['date' => '', 'title' => '', 'description' => '', 'icon' => '', 'color' => ''], ... ]
    'variant' => 'default', // default, alternating
    'class'   => '',
];
$args = wp_parse_args( $args, $defaults );

$color_classes = [
    'blue'   => 'bg-blue-600',
    'green'  => 'bg-green-600',
    'red'    => 'bg-red-600',
    'yellow' => 'bg-yellow-500',
    'purple' => 'bg-purple-600',
    'gray'   => 'bg-gray-500',
];

$is_alternating = $args['variant'] === 'alternating';
?>

<div class="relative <?php echo esc_attr( $args['class'] ); ?>">
    <!-- Timeline Line -->
    <div class="absolute <?php echo $is_alternating ? 'left-1/2 transform -translate-x-1/2' : 'left-4 md:left-8'; ?> top-0 bottom-0 w-0.5 bg-gray-200"></div>

    <!-- Timeline Items -->
    <div class="space-y-8">
        <?php foreach ( $args['items'] as $index => $item ) : 
            $color = $color_classes[ $item['color'] ?? 'blue' ] ?? $color_classes['blue'];
            $is_right = $is_alternating && $index % 2 === 1;
        ?>
            <div class="relative <?php echo $is_alternating ? 'flex items-center' : ''; ?>">
                <?php if ( $is_alternating ) : ?>
                    <!-- Alternating Layout -->
                    <div class="w-1/2 <?php echo $is_right ? 'text-right pr-8' : 'order-last text-left pl-8'; ?>">
                        <?php if ( ! $is_right ) : ?>
                            <!-- Content for left side items -->
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                                <?php if ( $item['date'] ) : ?>
                                    <span class="inline-block text-sm font-medium text-blue-600 mb-2">
                                        <?php echo esc_html( $item['date'] ); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ( $item['title'] ) : ?>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                        <?php echo esc_html( $item['title'] ); ?>
                                    </h3>
                                <?php endif; ?>
                                
                                <?php if ( $item['description'] ) : ?>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        <?php echo esc_html( $item['description'] ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Center Dot -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-center w-10 h-10 rounded-full <?php echo esc_attr( $color ); ?> text-white shadow-lg z-10">
                        <?php if ( ! empty( $item['icon'] ) ) : ?>
                            <?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        <?php else : ?>
                            <div class="w-3 h-3 bg-white rounded-full"></div>
                        <?php endif; ?>
                    </div>

                    <div class="w-1/2 <?php echo $is_right ? 'order-last text-left pl-8' : 'text-right pr-8'; ?>">
                        <?php if ( $is_right ) : ?>
                            <!-- Content for right side items -->
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                                <?php if ( $item['date'] ) : ?>
                                    <span class="inline-block text-sm font-medium text-blue-600 mb-2">
                                        <?php echo esc_html( $item['date'] ); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ( $item['title'] ) : ?>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                        <?php echo esc_html( $item['title'] ); ?>
                                    </h3>
                                <?php endif; ?>
                                
                                <?php if ( $item['description'] ) : ?>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        <?php echo esc_html( $item['description'] ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php else : ?>
                    <!-- Default Left-aligned Layout -->
                    <div class="flex items-start gap-6 ml-12 md:ml-16">
                        <!-- Dot -->
                        <div class="absolute left-0 md:left-4 flex items-center justify-center w-8 h-8 rounded-full <?php echo esc_attr( $color ); ?> text-white shadow-lg">
                            <?php if ( ! empty( $item['icon'] ) ) : ?>
                                <?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php else : ?>
                                <div class="w-2 h-2 bg-white rounded-full"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                            <?php if ( $item['date'] ) : ?>
                                <span class="inline-block text-sm font-medium text-blue-600 mb-2">
                                    <?php echo esc_html( $item['date'] ); ?>
                                </span>
                            <?php endif; ?>
                            
                            <?php if ( $item['title'] ) : ?>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    <?php echo esc_html( $item['title'] ); ?>
                                </h3>
                            <?php endif; ?>
                            
                            <?php if ( $item['description'] ) : ?>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    <?php echo esc_html( $item['description'] ); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
