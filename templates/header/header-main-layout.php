<?php
/**
 * Template for Primary Header
 *
 * The header layout 2 for Kemet Theme. ( No of sections - 1 [ Section 1 limit - 3 )
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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

<div class="main-header-bar-wrap">
	<div class="main-header-bar">
		<?php kemet_main_header_bar_top(); ?>
		<div class="kmt-container">

			<div class="kmt-flex main-header-container">
				<?php kemet_masthead_content(); ?>
			</div><!-- Main Header Container -->
		</div><!-- kmt-row -->
		<?php kemet_main_header_bar_bottom(); ?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
