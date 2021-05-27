<?php
/**
 * Template part for displaying the header menu
 *
 * @package kemet
 */

$slug = wp_parse_args(
	$args,
	array(
		'type' => 'primary-menu',
	)
);
$slug = explode( '-', $slug['type'] )[1];
?>
<div class="kmt-header-item kmt-header-item-menu">
	<?php
	/**
	 * Kemet Header Menu
	 *
	 * Hooked kemet_header_menu
	 */
	do_action( 'kemet_header_menu', $slug );
	?>
</div>
