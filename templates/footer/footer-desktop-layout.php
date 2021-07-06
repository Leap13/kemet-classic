<?php
/**
 * Template part for displaying the footer info.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kemet
 * @since 1.0.0
 */

?>

	<?php
		kemet_footer_content_top();
	?>
		<?php
		/**
		 * Kemet Top footer
		 */
		do_action( 'kemet_top_footer' );
		/**
		 * Kemet Middle footer
		 */
		do_action( 'kemet_primary_footer' );
		/**
		 * Kemet Bottom footer
		 */
		do_action( 'kemet_bottom_footer' );
		?>
	<?php
		kemet_footer_content_bottom();
	?>

