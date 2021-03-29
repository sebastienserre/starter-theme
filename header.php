<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_ Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#primary"><?php esc_html_e( 'Skip to content', 'starter-theme' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-container">
            <?php
            echo render_social_menu();
            ?>
            <div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                              rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				else :
					?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                             rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;
				$starter_theme_description = get_bloginfo( 'description', 'display' );
				if ( $starter_theme_description || is_customize_preview() ) :
					?>
                    <p class="site-description"><?php echo $starter_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?></p>
				<?php endif; ?>
            </div><!-- .site-branding -->
        </div> <!-- .header-container -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><i class="fas fa-bars"></i>
            </button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
        </nav><!-- #site-navigation -->
		<?php

		if ( has_nav_menu( 'vertical' ) ) {
			wp_nav_menu(
				array(
					'container_class' => 'menu-vertical-container',
					'theme_location'  => 'vertical',
					'menu_id'         => 'vertical',
					/*'walker'          => new Cot_Vertical_Walker(),*/
				)
			);
		}

		?>
    </header><!-- #masthead -->
