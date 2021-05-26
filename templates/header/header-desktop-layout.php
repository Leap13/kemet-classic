<?php
/**
 * Template part for displaying header row.
 *
 * @package Kemet Theme
 */

?>
<div id="kmt-desktop-header">
	<?php
		kemet_main_header_bar_top();

		/**
		 * Kemet Top Header
		 */
		do_action( 'kemet_top_header' );

		/**
		 * Kemet Main Header
		 */
		do_action( 'kemet_main_header' );

		/**
		 * Kemet Bottom Header
		 */
		do_action( 'kemet_bottom_header' );

		kemet_main_header_bar_bottom();
	?>
</div> <!-- Main Header Bar Wrap -->
