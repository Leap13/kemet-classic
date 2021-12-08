<?php
/**
 * Template part for displaying the header divider
 *
 * @package kemet
 */

?>
<div class="kmt-header-item kmt-header-item-divider kmt-item-focus" data-section="section-header-divider">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Divider
	 *
	 * Hooked kemet_header_divider
	 */
	do_action( 'kemet_header_divider' );
	?>
</div>
