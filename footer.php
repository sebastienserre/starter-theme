<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_ Theme
 */

?>

	<footer id="colophon" class="site-footer">
        <?php
        if ( has_nav_menu( 'footer' ) ) {
	        wp_nav_menu(
		        array(
			        'container_class' => 'menu-footer-container',
			        'theme_location'  => 'footer',
			        'menu_id'         => 'footer',
		        )
	        );
        }
        ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'starter-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'starter-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'starter-theme' ), 'starter-theme', '<a href="https://thivinfo.com">thivinfo.com</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
