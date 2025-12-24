<?php
/**
 * Organism: Card
 *
 * A flexible content card component.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => '',
    'description' => '',
    'image_url'   => '',
    'image_alt'   => '',
    'url'         => '',
    'badge'       => '',       // Optional badge text
    'badge_color' => 'blue',
    'variant'     => 'default', // default, horizontal
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$is_horizontal = $args['variant'] === 'horizontal';
?>

<article class="bg-white rounded-xl shadow-sm border overflow-hidden <?php echo $is_horizontal ? 'flex flex-col sm:flex-row' : ''; ?> <?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( ! empty( $args['image_url'] ) ) : ?>
        <div class="<?php echo $is_horizontal ? 'sm:w-1/3 flex-shrink-0' : ''; ?>">
            <?php if ( ! empty( $args['url'] ) ) : ?>
                <a href="<?php echo esc_url( $args['url'] ); ?>">
            <?php endif; ?>
            <img src="<?php echo esc_url( $args['image_url'] ); ?>" 
                 alt="<?php echo esc_attr( $args['image_alt'] ); ?>" 
                 class="w-full h-48 object-cover <?php echo $is_horizontal ? 'sm:h-full' : ''; ?>">
            <?php if ( ! empty( $args['url'] ) ) : ?>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <div class="p-6 flex flex-col flex-grow">
        <?php if ( ! empty( $args['badge'] ) ) : ?>
            <div class="mb-2">
                <?php get_template_part('parts/atoms/badge', null, [
                    'text'  => $args['badge'],
                    'color' => $args['badge_color'],
                    'size'  => 'sm',
                ]); ?>
            </div>
        <?php endif; ?>
        
        <?php if ( ! empty( $args['title'] ) ) : ?>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">
                <?php if ( ! empty( $args['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $args['url'] ); ?>" class="hover:text-blue-600 transition-colors">
                        <?php echo esc_html( $args['title'] ); ?>
                    </a>
                <?php else : ?>
                    <?php echo esc_html( $args['title'] ); ?>
                <?php endif; ?>
            </h3>
        <?php endif; ?>
        
        <?php if ( ! empty( $args['description'] ) ) : ?>
            <p class="text-gray-600 text-sm flex-grow"><?php echo esc_html( $args['description'] ); ?></p>
        <?php endif; ?>
    </div>
</article>
