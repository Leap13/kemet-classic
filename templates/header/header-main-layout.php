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

$header_layout = apply_filters( 'kemet_primary_header_layout', kemet_get_option( 'header-layouts' ) );
$classes       = apply_filters( 'header_container_classes', array() );
$header_width  = apply_filters( 'kemet_header_width', kemet_get_option( 'header-main-layout-width' ) );
?>
<?php do_action( 'kemet_before_main_header' ); ?>
<div class="main-header-bar-wrap">
	<div class="main-header-bar">
		<?php
		kemet_main_header_bar_top();
		if ( 'header-main-layout-3' == $header_layout && 'stretched' == $header_width ) {
			echo wp_kses( "<div class='main-header-content'>", kemet_allowed_html( array( 'div' ) ) );
		}
		?>
		<div class="kmt-container">
			<div class="kmt-flex main-header-container <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<?php if ( ( 'header-main-layout-2' == $header_layout ) && kemet_get_option( 'header-right-section' ) != 'none' ) { ?>
				<div class="kmt-header-logo-right-section">
					<?php kemet_site_branding_markup(); ?>
					<?php kemet_header_get_right_section(); ?>
					<?php kemet_toggle_buttons_markup(); ?>
				</div>
					<?php
				} else {
					kemet_site_branding_markup();
					kemet_toggle_buttons_markup();
				}
				?>
				<?php kemet_primary_navigation_markup(); ?>
				<?php if ( 'header-main-layout-3' != $header_layout ) { ?>
					<?php echo kemet_header_custom_item_outside_menu(); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php } ?>
			</div><!-- Main Header Container -->
		</div><!-- kmt-row -->
		<?php
		kemet_main_header_bar_bottom();
		if ( 'header-main-layout-3' == $header_layout && 'stretched' == $header_width ) {
			echo '<div/>';
		}
		?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
<?php do_action( 'kemet_after_main_header' ); ?>
