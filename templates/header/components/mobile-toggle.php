<?php
/**
 * Template part for displaying the header Toggle Buttton
 *
 * @package kemet
 */

?>
<div class="kmt-header-item kmt-flex kmt-mobile-header-toggle builder-item-focus" data-section="section-desktop-toggle-button">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Mobile Toggle Button
	 *
	 * Hooked kemet_mobile_toggle
	 */
	do_action( 'kemet_mobile_toggle' );
	?>
</div>
