<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'antialiased bg-gray-50 text-gray-900' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col">
	<a class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-white p-4 z-50 rounded" href="#primary">
		<?php esc_html_e( 'Skip to content', 'wp-modern-starter-kit' ); ?>
	</a>

	<header id="masthead" class="site-header bg-white shadow-sm sticky top-0 z-40">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="site-branding">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        ?>
                        <div class="text-xl font-bold">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-gray-900 no-underline hover:text-blue-600">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <nav id="site-navigation" class="main-navigation hidden md:block">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'flex space-x-6 text-sm font-medium text-gray-700',
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </nav>
                
                <div class="md:hidden">
                     <!-- Mobile menu button placeholder -->
                     <button class="p-2 text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                     </button>
                </div>
            </div>
        </div>
	</header>
