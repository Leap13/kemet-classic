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

<div class="main-header-bar-wrap">
	<div class="main-header-bar">
		<?php kemet_main_header_bar_top(); ?>
		<div class="kmt-container">

			<div class="kmt-flex main-header-container">
				<?php if((kemet_get_option('header-layouts') == 'header-main-layout-3') && !empty(kemet_get_option( 'header-right-section' )) ){ ?>
				<div class="kmt-header-logo-right-section">
					<?php kemet_site_branding_markup(); ?>
					<?php kemet_header_get_right_section(); ?>
				</div>
				<?php }else{
					 kemet_site_branding_markup();
				} ?>
				<?php kemet_toggle_buttons_markup(); ?>
				<?php kemet_primary_navigation_markup(); ?>
			</div><!-- Main Header Container -->
		</div><!-- kmt-row -->
		<?php kemet_main_header_bar_bottom(); ?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
