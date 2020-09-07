<?php
/**
 * Template for Header
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

$header_layout = apply_filters( 'wiz_primary_header_layout', wiz_get_option('header-layouts') );
$classes = apply_filters( 'header_container_classes', array());
?>
<?php do_action('wiz_before_main_header'); ?>
<div class="main-header-bar-wrap">
	<div class="main-header-bar">
		<?php wiz_main_header_bar_top(); ?>
		<div class="wiz-container">

			<div class="wiz-flex main-header-container <?php echo implode(" ",$classes); ?>">
				<?php if(($header_layout == 'header-main-layout-2') && wiz_get_option( 'header-right-section' ) != 'none' ){ ?>
				<div class="wiz-header-logo-right-section">
					<?php wiz_site_branding_markup(); ?>
					<?php wiz_header_get_right_section(); ?>
					<?php wiz_toggle_buttons_markup(); ?>
				</div>
				<?php }else{
					 wiz_site_branding_markup();
					 wiz_toggle_buttons_markup();
				} ?>
				<?php wiz_primary_navigation_markup(); ?>
				<?php if($header_layout != 'header-main-layout-3'){ ?>
				<?php echo wiz_header_custom_item_outside_menu(); ?>
				<?php } ?>
			</div><!-- Main Header Container -->
		</div><!-- wiz-row -->
		<?php wiz_main_header_bar_bottom(); ?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
<?php do_action('wiz_after_main_header'); ?>