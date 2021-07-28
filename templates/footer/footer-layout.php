<?php
/**
 * Template part for displaying the a row of the footer
 *
 * @package Kemet
 */

?>
<footer class="site-footer" id="colophon" role="contentinfo">
	<?php
		kemet_footer_content_top();

		/**
		 * Kemet Top Footer
		 */
		do_action( 'kemet_top_footer' );

		/**
		 * Kemet Main Footer
		 */
		do_action( 'kemet_main_footer' );

		/**
		 * Kemet Bottom Footer
		 */
		do_action( 'kemet_bottom_footer' );

		kemet_footer_content_bottom();
	?>
</footer><!-- #colophon -->
