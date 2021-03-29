<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

function render_social_menu(){
	if ( ! function_exists( 'get_field' ) ){
		return;
	}
	// search bar
	$search_bar = get_field( 'search_bar', 'options' );
	if ( 'null' === $search_bar ){
		$search_bar = false;
	}

	//Social network
	$network = get_field( 'reseau', 'options' );

	ob_start();
	?>
	<div class="social-network">
		<?php
		if ( $search_bar ){
			get_search_form();
		}
		if ( !empty( $network ) ){
			render_social_network( $network );
		}
		?>

	</div>
<?php
	return ob_get_clean();
}

function render_social_network( $networks ){
	?>
	<div class="social-buttons">
		<?php
		foreach ( $networks as $network ){
			$name = strtolower( $network['nom'] );
			?>
			<a href="<?php echo $network['url'];?>">
				<i class="fab fa-<?php echo strtolower( $network['nom'] ); ?>"></i>
			</a>
			<?php
		}
		?>
	</div>
<?php
}