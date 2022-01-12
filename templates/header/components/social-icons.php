<?php
/**
 * Template part for displaying the header social icons
 *
 * @package kemet
 */

?>
<div class="kmt-header-item kmt-header-item-social-icons kmt-item-focus" data-section="section-header-social-icons">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Search
	 *
	 * Hooked kemet_header_social_icons
	 */
	do_action( 'kemet_header_social_icons' );
	?>
</div>
