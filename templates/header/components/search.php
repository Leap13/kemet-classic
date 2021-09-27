<?php
/**
 * Template part for displaying the header search
 *
 * @package kemet
 */

?>
<div class="kmt-header-item kmt-header-item-search kmt-item-focus" data-section="section-header-search">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Search
	 *
	 * Hooked kemet_header_search
	 */
	do_action( 'kemet_header_search' );
	?>
</div>
