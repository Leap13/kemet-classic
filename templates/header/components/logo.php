<?php
/**
 * Template part for displaying the header identity/logo
 *
 * @package kemet
 */

?>
<div class="kmt-header-item kmt-flex kmt-header-item-logo builder-item-focus" data-section="title_tagline">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Site Identity
	 *
	 * Hooked kemet_site_identity
	 */
	do_action( 'kemet_site_identity' );
	?>
</div>
