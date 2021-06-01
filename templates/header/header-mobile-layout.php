<?php
/**
 * Template part for displaying header row.
 *
 * @package Kemet Theme
 */

?>
<div id="kmt-mobile-header">
	<?php
		kemet_main_header_bar_top();

		/**
		 * Kemet Top Header
		 */
		do_action( 'kemet_top_mobile_header' );

		/**
		 * Kemet Main Header
		 */
		do_action( 'kemet_main_mobile_header' );

		/**
		 * Kemet Bottom Header
		 */
		do_action( 'kemet_bottom_mobile_header' );

		kemet_main_header_bar_bottom();
	?>
</div> <!-- Main Header Bar Wrap -->
