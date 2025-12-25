<?php
/**
 * Organism: Navbar
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'logo'          => '',       // Logo HTML or text
    'logo_url'      => home_url( '/' ),
    'menu_items'    => [],       // [ ['label' => '', 'url' => '', 'children' => []], ... ]
    'cta'           => [],       // [ 'text' => '', 'url' => '' ]
    'variant'       => 'light',  // light, dark, transparent
    'sticky'        => false,
    'class'         => '',
];
$args = wp_parse_args( $args, $defaults );

$navbar_id = 'navbar-' . wp_unique_id();

$variant_classes = [
    'light' => [
        'bg'    => 'bg-white border-b border-gray-200',
        'text'  => 'text-gray-700',
        'hover' => 'hover:text-blue-600',
        'logo'  => 'text-gray-900',
    ],
    'dark' => [
        'bg'    => 'bg-gray-900',
        'text'  => 'text-gray-300',
        'hover' => 'hover:text-white',
        'logo'  => 'text-white',
    ],
    'transparent' => [
        'bg'    => 'bg-transparent',
        'text'  => 'text-white',
        'hover' => 'hover:text-gray-200',
        'logo'  => 'text-white',
    ],
];

$styles = $variant_classes[ $args['variant'] ] ?? $variant_classes['light'];

$navbar_classes = implode( ' ', array_filter( [
    'w-full',
    $styles['bg'],
    $args['sticky'] ? 'sticky top-0 z-50' : '',
    $args['class'],
] ) );
?>

<nav class="<?php echo esc_attr( $navbar_classes ); ?>" id="<?php echo esc_attr( $navbar_id ); ?>">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="<?php echo esc_url( $args['logo_url'] ); ?>" class="flex items-center <?php echo esc_attr( $styles['logo'] ); ?>">
                    <?php if ( $args['logo'] ) : ?>
                        <?php echo $args['logo']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <?php else : ?>
                        <span class="text-xl font-bold"><?php bloginfo( 'name' ); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <?php foreach ( $args['menu_items'] as $item ) : ?>
                    <?php if ( ! empty( $item['children'] ) ) : ?>
                        <!-- Dropdown Menu Item -->
                        <div class="relative group">
                            <button class="flex items-center gap-1 <?php echo esc_attr( $styles['text'] ); ?> <?php echo esc_attr( $styles['hover'] ); ?> font-medium transition-colors">
                                <?php echo esc_html( $item['label'] ); ?>
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                                <?php foreach ( $item['children'] as $child ) : ?>
                                    <a href="<?php echo esc_url( $child['url'] ?? '#' ); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <?php echo esc_html( $child['label'] ?? '' ); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url( $item['url'] ?? '#' ); ?>" class="<?php echo esc_attr( $styles['text'] ); ?> <?php echo esc_attr( $styles['hover'] ); ?> font-medium transition-colors">
                            <?php echo esc_html( $item['label'] ?? '' ); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if ( ! empty( $args['cta']['text'] ) ) : ?>
                    <a href="<?php echo esc_url( $args['cta']['url'] ?? '#' ); ?>" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        <?php echo esc_html( $args['cta']['text'] ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button 
                    type="button" 
                    class="p-2 rounded-lg <?php echo esc_attr( $styles['text'] ); ?> hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onclick="toggleMobileMenu('<?php echo esc_attr( $navbar_id ); ?>')"
                    aria-label="メニューを開く"
                >
                    <svg class="h-6 w-6 menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden mobile-menu pb-4">
            <div class="flex flex-col gap-2 pt-4 border-t border-gray-200">
                <?php foreach ( $args['menu_items'] as $item ) : ?>
                    <?php if ( ! empty( $item['children'] ) ) : ?>
                        <div class="space-y-1">
                            <span class="block px-3 py-2 text-sm font-semibold text-gray-500 uppercase">
                                <?php echo esc_html( $item['label'] ); ?>
                            </span>
                            <?php foreach ( $item['children'] as $child ) : ?>
                                <a href="<?php echo esc_url( $child['url'] ?? '#' ); ?>" class="block px-6 py-2 text-base <?php echo esc_attr( $styles['text'] ); ?> hover:bg-gray-100 rounded-lg">
                                    <?php echo esc_html( $child['label'] ?? '' ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url( $item['url'] ?? '#' ); ?>" class="block px-3 py-2 text-base <?php echo esc_attr( $styles['text'] ); ?> hover:bg-gray-100 rounded-lg font-medium">
                            <?php echo esc_html( $item['label'] ?? '' ); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if ( ! empty( $args['cta']['text'] ) ) : ?>
                    <a href="<?php echo esc_url( $args['cta']['url'] ?? '#' ); ?>" class="mt-2 inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        <?php echo esc_html( $args['cta']['text'] ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<script>
function toggleMobileMenu(navbarId) {
    const navbar = document.getElementById(navbarId);
    const mobileMenu = navbar.querySelector('.mobile-menu');
    const menuIcon = navbar.querySelector('.menu-icon');
    const closeIcon = navbar.querySelector('.close-icon');
    
    mobileMenu.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
}
</script>
