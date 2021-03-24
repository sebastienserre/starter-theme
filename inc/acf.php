<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

if ( function_exists( 'acf_add_options_sub_page' ) ) {

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme General Settings',
		'menu_title'  => 'Theme Settings',
		'parent_slug' => 'themes.php',
	) );

}
