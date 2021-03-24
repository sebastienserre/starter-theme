<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

add_action( 'init', 'create_nav_menu' );
function create_nav_menu() {
	register_nav_menus(
		array(
			'vertical'     => __( 'Vertical', 'nd-grace' ),
			'social'       => __( 'Social Network', 'nd-grace' ),
			'footer'       => __( 'Footer', 'nd-grace' ),
		)
	);
}

add_filter( 'wp_nav_menu_objects', 'cot_wp_nav_menu_items', 10, 2 );

function cot_wp_nav_menu_items( $items, $args ) {
	/*if ( 'vertical' === $args->menu_id ){
		return $items;
	}*/
	foreach ( $items as $item ) {
		$icon = get_field( 'footer_menu_icon', $item );
		// append icon
		if ( $icon ) {
			$title = $item->title;
			$item->title = $icon . ' <span class="fontawesome-text">' . $title . '</span>';
		}
	}
	return $items;
}
