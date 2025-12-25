<?php
/**
 * Organism: Footer
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'logo'        => '',
    'description' => '',
    'columns'     => [], // [ ['title' => '', 'links' => [['label' => '', 'url' => ''], ...]], ... ]
    'social'      => [], // [ ['icon' => '', 'url' => '', 'label' => ''], ... ]
    'copyright'   => '',
    'variant'     => 'light', // light, dark
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$variant_classes = [
    'light' => [
        'bg'       => 'bg-gray-50',
        'border'   => 'border-gray-200',
        'title'    => 'text-gray-900',
        'text'     => 'text-gray-600',
        'link'     => 'text-gray-600 hover:text-gray-900',
        'social'   => 'text-gray-400 hover:text-gray-600',
    ],
    'dark' => [
        'bg'       => 'bg-gray-900',
        'border'   => 'border-gray-800',
        'title'    => 'text-white',
        'text'     => 'text-gray-400',
        'link'     => 'text-gray-400 hover:text-white',
        'social'   => 'text-gray-500 hover:text-gray-300',
    ],
];

$styles = $variant_classes[ $args['variant'] ] ?? $variant_classes['light'];

$copyright = $args['copyright'] ?: sprintf(
    '&copy; %s %s. All rights reserved.',
    date( 'Y' ),
    get_bloginfo( 'name' )
);
?>

<footer class="<?php echo esc_attr( $styles['bg'] ); ?> <?php echo esc_attr( $args['class'] ); ?>">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo min( 4, count( $args['columns'] ) + 1 ); ?> gap-8 lg:gap-12">
            <!-- Brand Column -->
            <div class="lg:col-span-1">
                <?php if ( $args['logo'] ) : ?>
                    <div class="mb-4">
                        <?php echo $args['logo']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                <?php else : ?>
                    <h3 class="text-xl font-bold <?php echo esc_attr( $styles['title'] ); ?> mb-4">
                        <?php bloginfo( 'name' ); ?>
                    </h3>
                <?php endif; ?>
                
                <?php if ( $args['description'] ) : ?>
                    <p class="<?php echo esc_attr( $styles['text'] ); ?> text-sm leading-relaxed mb-6">
                        <?php echo esc_html( $args['description'] ); ?>
                    </p>
                <?php endif; ?>

                <!-- Social Links -->
                <?php if ( ! empty( $args['social'] ) ) : ?>
                    <div class="flex items-center gap-4">
                        <?php foreach ( $args['social'] as $social ) : ?>
                            <a 
                                href="<?php echo esc_url( $social['url'] ?? '#' ); ?>" 
                                class="<?php echo esc_attr( $styles['social'] ); ?> transition-colors"
                                aria-label="<?php echo esc_attr( $social['label'] ?? '' ); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?php echo $social['icon'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Link Columns -->
            <?php foreach ( $args['columns'] as $column ) : ?>
                <div>
                    <?php if ( ! empty( $column['title'] ) ) : ?>
                        <h4 class="text-sm font-semibold <?php echo esc_attr( $styles['title'] ); ?> uppercase tracking-wider mb-4">
                            <?php echo esc_html( $column['title'] ); ?>
                        </h4>
                    <?php endif; ?>
                    
                    <?php if ( ! empty( $column['links'] ) ) : ?>
                        <ul class="space-y-3">
                            <?php foreach ( $column['links'] as $link ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $link['url'] ?? '#' ); ?>" class="text-sm <?php echo esc_attr( $styles['link'] ); ?> transition-colors">
                                        <?php echo esc_html( $link['label'] ?? '' ); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t <?php echo esc_attr( $styles['border'] ); ?>">
            <p class="text-sm <?php echo esc_attr( $styles['text'] ); ?> text-center">
                <?php echo wp_kses_post( $copyright ); ?>
            </p>
        </div>
    </div>
</footer>
