<?php
/**
 * Template part for displaying the header cart
 *
 * @package kemet
 */

?>
<div class="kmt-header-item kmt-header-item-cart kmt-item-focus" data-section="section-woo-cart">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Cart
	 *
	 * Hooked kemet_header_cart
	 */
	do_action( 'kemet_header_cart' );
	?>
</div>
