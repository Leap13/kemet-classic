<?php
/**
 * Template part for displaying the header Toggle Buttton
 *
 * @package kemet
 */

?>
<div class="kmt-header-item kmt-flex kmt-desktop-header-toggle builder-item-focus" data-section="section-desktop-toggle-button">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Desktop Toggle Button
	 *
	 * Hooked kemet_desktop_toggle
	 */
	do_action( 'kemet_desktop_toggle' );
	?>
</div>
