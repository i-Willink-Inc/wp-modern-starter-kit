<?php
/**
 * The template for displaying the footer.
 *
 * @package WP_Modern_Starter_Kit
 */
?>

	<footer id="colophon" class="site-footer bg-gray-900 text-white mt-auto py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4"><?php bloginfo( 'name' ); ?></h3>
                    <p class="text-gray-400"><?php bloginfo( 'description' ); ?></p>
                </div>
                <div>
                    <!-- Footer widgets or Menu -->
                </div>
                <div>
                    <!-- Social Links etc -->
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
                &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
            </div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
