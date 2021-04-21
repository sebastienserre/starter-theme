<?php

namespace StarterTheme\Acf;

use function apply_filters;
use function content_url;
use function fclose;
use function file_exists;
use function fwrite;
use function ob_get_clean;
use function ob_start;
use function sanitize_title;
use function wp_enqueue_style;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

add_action( 'after_setup_theme', 'StarterTheme\Acf\starter_theme_load_acf', 9999 );
function starter_theme_load_acf() {

	if ( function_exists( 'acf_add_options_sub_page' ) ) {

		acf_add_options_sub_page( array(
			'page_title'  => 'Theme General Settings',
			'menu_title'  => 'Theme Settings',
			'parent_slug' => 'themes.php',
		) );

	}
}

add_action( 'acf/save_post', 'StarterTheme\Acf\create_css_file'  );
function create_css_file ( $post_id ){
	if ( ! function_exists( 'get_field' ) || 'options' !== $post_id ){
		return;
	}
	$sitename = sanitize_title( get_bloginfo( 'name' ) );
	$css = array();
	$css['bg_menu'] = get_field( 'fond_menu', 'options' );
	$css['link-color'] = get_field( 'link-color', 'options' );


	if ( ! file_exists( WP_CONTENT_DIR . '/theme-css/' ) ){
		wp_mkdir_p( WP_CONTENT_DIR . '/theme-css/' );
	}
	$file = WP_CONTENT_DIR . '/theme-css/' . $sitename . '.css';

	$generated_css = generate_css( $css );
	$open = fopen( $file, 'w+' );
	fwrite( $open, $generated_css );
	fclose( $open );
}

add_action( 'wp_enqueue_scripts', 'StarterTheme\Acf\enqueue_style' );
function enqueue_style() {
    	$sitename = sanitize_title( get_bloginfo( 'name' ) );
	$url  = content_url( '/theme-css/' . $sitename . '.css' );
	if ( file_exists( WP_CONTENT_DIR . '/theme-css/' . $sitename . '.css') ){
		wp_enqueue_style( $sitename . '-style', $url );
	}
}

function generate_css( $css ){
	if ( empty( $css ) ){
		return;
	}
	ob_start();
	if ( ! empty( $css['bg_menu'] ) ) {
		?>
        #primary-menu,
        .menu-vertical-container ul li a,
        .message,
        .published-date,
        .main-navigation ul.sub-menu
        {
        background: <?php echo
		$css['bg_menu']; ?>
        }

        #colophon {
        border-top: 3px solid <?php echo
		$css['bg_menu']; ?>;
        }
		<?php
	}
	if ( ! empty( $css['link-color'] ) ){
	    ?>
        #primary-menu a,
        .menu-vertical-container ul li a,
        .message a,
        .published-date a,
        .sub-menu a
        {
        color: <?php echo
        $css['link-color']; ?>
        }
        <?php
    }
        ?>
<?php
	$generated_css = ob_get_clean();
	return apply_filters( 'StarterTheme\GeneratedCSS', $generated_css );
}