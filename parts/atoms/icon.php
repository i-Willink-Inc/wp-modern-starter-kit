<?php
/**
 * Atom: Icon
 *
 * Renders an SVG icon.
 * In a real project, this might load from an SVG sprite or file.
 * For this starter kit, we'll use inline SVGs for demonstration.
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'name'  => 'check', // check, close, menu, user, search, arrow-right, spinner
    'size'  => 'md',    // sm, md, lg, xl
    'class' => '',
];
$args = wp_parse_args( $args, $defaults );

$size_classes = [
    'sm' => 'w-4 h-4',
    'md' => 'w-5 h-5',
    'lg' => 'w-6 h-6',
    'xl' => 'w-8 h-8',
];

$classes = implode( ' ', array_filter( [
    'inline-block fill-current',
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
    $args['class'],
] ) );

// Simple icon library (in production, use a more robust system)
$icons = [
    'check'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />',
    'close'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />',
    'menu'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />',
    'user'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />',
    'search'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />',
    'arrow-right' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />',
    'spinner'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />',
];

$icon_content = $icons[ $args['name'] ] ?? '';
?>

<?php if ( $icon_content ) : ?>
    <svg xmlns="http://www.w3.org/2000/svg" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke-width="1.5" 
         stroke="currentColor" 
         class="<?php echo esc_attr( $classes ); ?>">
        <?php echo $icon_content; // SVGs are safe here as they come from hardcoded array ?>
    </svg>
<?php endif; ?>
