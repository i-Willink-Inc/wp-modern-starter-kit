<?php
/**
 * Molecule: Steps
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'steps'       => [], // [ ['title' => '', 'description' => '', 'icon' => ''], ... ]
    'current'     => 0,  // 0-based index of current step
    'orientation' => 'horizontal', // horizontal, vertical
    'variant'     => 'default',    // default, numbered, icon
    'size'        => 'md',         // sm, md, lg
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$size_config = [
    'sm' => [
        'circle'    => 'h-8 w-8 text-sm',
        'title'     => 'text-sm',
        'desc'      => 'text-xs',
        'connector' => 'h-0.5',
    ],
    'md' => [
        'circle'    => 'h-10 w-10 text-base',
        'title'     => 'text-base',
        'desc'      => 'text-sm',
        'connector' => 'h-0.5',
    ],
    'lg' => [
        'circle'    => 'h-12 w-12 text-lg',
        'title'     => 'text-lg',
        'desc'      => 'text-base',
        'connector' => 'h-1',
    ],
];

$size = $size_config[ $args['size'] ] ?? $size_config['md'];
$is_vertical = $args['orientation'] === 'vertical';
?>

<div class="<?php echo $is_vertical ? 'flex flex-col' : 'flex items-start'; ?> <?php echo esc_attr( $args['class'] ); ?>">
    <?php foreach ( $args['steps'] as $index => $step ) : 
        $is_completed = $index < $args['current'];
        $is_current = $index === $args['current'];
        $is_upcoming = $index > $args['current'];
        $is_last = $index === count( $args['steps'] ) - 1;
    ?>
        <div class="<?php echo $is_vertical ? 'flex' : 'flex flex-col items-center'; ?> <?php echo ! $is_last && ! $is_vertical ? 'flex-1' : ''; ?>">
            <div class="<?php echo $is_vertical ? 'flex flex-col items-center' : 'flex items-center'; ?> <?php echo ! $is_last && ! $is_vertical ? 'w-full' : ''; ?>">
                <!-- Step Circle -->
                <div class="relative flex items-center justify-center <?php echo esc_attr( $size['circle'] ); ?> rounded-full font-semibold transition-colors
                    <?php if ( $is_completed ) : ?>
                        bg-blue-600 text-white
                    <?php elseif ( $is_current ) : ?>
                        bg-blue-600 text-white ring-4 ring-blue-100
                    <?php else : ?>
                        bg-gray-200 text-gray-500
                    <?php endif; ?>
                ">
                    <?php if ( $is_completed ) : ?>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    <?php elseif ( $args['variant'] === 'icon' && ! empty( $step['icon'] ) ) : ?>
                        <?php echo $step['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <?php else : ?>
                        <?php echo esc_html( $index + 1 ); ?>
                    <?php endif; ?>
                </div>

                <!-- Connector Line (not for last step) -->
                <?php if ( ! $is_last ) : ?>
                    <?php if ( $is_vertical ) : ?>
                        <div class="w-0.5 h-12 my-2 <?php echo $is_completed ? 'bg-blue-600' : 'bg-gray-200'; ?>"></div>
                    <?php else : ?>
                        <div class="flex-1 mx-4 <?php echo esc_attr( $size['connector'] ); ?> <?php echo $is_completed ? 'bg-blue-600' : 'bg-gray-200'; ?>"></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Step Content -->
            <div class="<?php echo $is_vertical ? 'ml-4 pb-8' : 'mt-3 text-center'; ?> <?php echo ! $is_last && ! $is_vertical ? 'flex-1' : ''; ?>">
                <?php if ( ! empty( $step['title'] ) ) : ?>
                    <p class="<?php echo esc_attr( $size['title'] ); ?> font-medium <?php echo $is_upcoming ? 'text-gray-400' : 'text-gray-900'; ?>">
                        <?php echo esc_html( $step['title'] ); ?>
                    </p>
                <?php endif; ?>
                
                <?php if ( ! empty( $step['description'] ) ) : ?>
                    <p class="mt-1 <?php echo esc_attr( $size['desc'] ); ?> <?php echo $is_upcoming ? 'text-gray-300' : 'text-gray-500'; ?>">
                        <?php echo esc_html( $step['description'] ); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
