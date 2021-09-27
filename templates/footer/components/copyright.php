<?php
/**
 * Template part for displaying the footer copyright
 *
 * @package kemet
 */

?>
<div class="kmt-footer-item kmt-footer-item-copyright kmt-item-focus" data-section="section-footer-copyright">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Copyright
	 *
	 * Hooked kemet_footer_copyright
	 */
	do_action( 'kemet_footer_copyright' );
	?>
</div>
