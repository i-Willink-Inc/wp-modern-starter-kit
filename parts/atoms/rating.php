<?php
/**
 * Atom: Rating
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'value'     => 0,       // Current rating (can be decimal like 3.5)
    'max'       => 5,       // Maximum rating
    'readonly'  => true,
    'size'      => 'md',    // sm, md, lg
    'color'     => 'yellow', // yellow, red, blue, green
    'name'      => '',
    'class'     => '',
];
$args = wp_parse_args( $args, $defaults );

$rating_id = 'rating-' . wp_unique_id();

$size_classes = [
    'sm' => 'h-4 w-4',
    'md' => 'h-5 w-5',
    'lg' => 'h-6 w-6',
];

$color_classes = [
    'yellow' => 'text-yellow-400',
    'red'    => 'text-red-500',
    'blue'   => 'text-blue-500',
    'green'  => 'text-green-500',
];

$star_size = $size_classes[ $args['size'] ] ?? $size_classes['md'];
$star_color = $color_classes[ $args['color'] ] ?? $color_classes['yellow'];
?>

<div 
    class="inline-flex items-center gap-0.5 <?php echo esc_attr( $args['class'] ); ?>"
    role="img"
    aria-label="<?php echo esc_attr( sprintf( '%s out of %s stars', $args['value'], $args['max'] ) ); ?>"
>
    <?php for ( $i = 1; $i <= $args['max']; $i++ ) : 
        $fill_percentage = 0;
        if ( $args['value'] >= $i ) {
            $fill_percentage = 100;
        } elseif ( $args['value'] > $i - 1 ) {
            $fill_percentage = ( $args['value'] - ( $i - 1 ) ) * 100;
        }
    ?>
        <?php if ( ! $args['readonly'] ) : ?>
            <input 
                type="radio" 
                name="<?php echo esc_attr( $args['name'] ?: $rating_id ); ?>"
                value="<?php echo esc_attr( $i ); ?>"
                class="sr-only peer"
                id="<?php echo esc_attr( $rating_id . '-' . $i ); ?>"
                <?php checked( round( $args['value'] ), $i ); ?>
            >
            <label 
                for="<?php echo esc_attr( $rating_id . '-' . $i ); ?>"
                class="cursor-pointer hover:scale-110 transition-transform"
            >
        <?php endif; ?>
        
        <div class="relative <?php echo esc_attr( $star_size ); ?>">
            <!-- Empty star (background) -->
            <svg class="absolute inset-0 <?php echo esc_attr( $star_size ); ?> text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            <!-- Filled star (foreground with clip) -->
            <div class="overflow-hidden" style="width: <?php echo esc_attr( $fill_percentage ); ?>%">
                <svg class="<?php echo esc_attr( $star_size ); ?> <?php echo esc_attr( $star_color ); ?>" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
        </div>
        
        <?php if ( ! $args['readonly'] ) : ?>
            </label>
        <?php endif; ?>
    <?php endfor; ?>
</div>
