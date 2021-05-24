<?php
/**
 * Template for Header
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

?>
<?php do_action( 'kemet_before_main_header' ); ?>
<div class="main-header-bar-wrap">
	<div class="main-header-bar">
		<?php
		/**
		 * Kemet Top Header
		 */
		do_action( 'kemet_top_header' );

		/**
		 * Kemet Main Header
		 */
		do_action( 'kemet_primary_header' );

		/**
		 * Kemet Bottom Header
		 */
		do_action( 'kemet_below_header' );
		?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
<?php do_action( 'kemet_after_main_header' ); ?>
