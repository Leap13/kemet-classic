<?php
/**
 * Custom Styling output for Kemet Theme.
 *
 * @package     Kemet
 * @subpackage  Class
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamic CSS
 */
if ( ! class_exists( 'Kemet_Dynamic_CSS' ) ) {

	/**
	 * Dynamic CSS
	 */
	class Kemet_Dynamic_CSS {


		/**
		 * Return CSS Output
		 *
		 * @return string Generated CSS.
		 */
		public static function return_output() {

			$dynamic_css = '';

			/**
			 *
			 * Contents
			 * - Variable Declaration
			 * - Global CSS
			 * - Typography
			 * - Page Layout
			 *   - Sidebar Positions CSS
			 *      - Full Width Layout CSS
			 *   - Fluid Width Layout CSS
			 *   - Box Layout CSS
			 *   - Padded Layout CSS
			 * - Blog
			 *   - Single Blog
			 * - Typography of Headings
			 * - Header
			 * - Footer
			 *   - Main Footer CSS
			 *     - Small Footer CSS
			 *        - Go Top Link
			 * - 404 Page
			 * - Secondary
			 * - Global CSS
			 */

			/**
			 * - Variable Declaration
			 */
			// Color Options.
			$theme_color              = kemet_get_sub_option( 'theme-color', 'initial' );
			$headings_links_color     = kemet_get_sub_option( 'headings-links-color', 'initial' );
			$text_meta_color          = kemet_get_sub_option( 'text-meta-color', 'initial' );
			$global_border_color      = kemet_get_sub_option( 'global-border-color', 'initial' );
			$global_bg_color          = kemet_get_sub_option( 'global-background-color', 'initial' );
			$global_footer_text_color = kemet_get_sub_option( 'global-footer-text-color', 'initial' );
			$global_footer_bg_color   = kemet_get_sub_option( 'global-footer-bg-color', 'initial' );

			$site_content_width = kemet_get_option( 'site-content-width', 1200 );

			// Site Background Color.
			$box_bg_obj = kemet_get_option( 'site-layout-outside-bg-obj', array( 'background-color' => $global_bg_color ) );

			// Input Options.
			$input_font_size          = kemet_get_option( 'inputs-font-size' );
			$input_font_family        = kemet_get_option( 'inputs-font-family' );
			$input_font_weight        = kemet_get_option( 'inputs-font-weight' );
			$input_text_tranform      = kemet_get_option( 'inputs-text-transform' );
			$input_font_style         = kemet_get_option( 'inputs-font-style' );
			$input_line_height        = kemet_get_option( 'inputs-line-height' );
			$input_letter_spacing     = kemet_get_option( 'inputs-letter-spacing' );
			$input_bg_color           = kemet_get_sub_option( 'input-bg-color', 'initial', kemet_color_brightness( $global_bg_color, 0.99, 'dark' ) );
			$input_text_color         = kemet_get_sub_option( 'input-text-color', 'initial' );
			$input_focus_bg_color     = kemet_get_sub_option( 'input-bg-color', 'focus' );
			$input_focus_text_color   = kemet_get_sub_option( 'input-text-color', 'focus' );
			$input_border_radius      = kemet_get_option( 'input-radius' );
			$input_border_size        = kemet_get_option( 'input-border-size' );
			$input_border_color       = kemet_get_sub_option( 'input-border-color', 'initial', $global_border_color );
			$input_focus_border_color = kemet_get_sub_option( 'input-border-color', 'focus' );
			$input_label_color        = kemet_get_sub_option( 'input-label-color', 'initial' );
			$input_spacing            = kemet_get_option( 'input-spacing' );

			// Boxed inner Options.
			$box_bg_inner_boxed             = kemet_get_option( 'site-boxed-inner-bg', array( 'background-color' => kemet_color_brightness( $global_bg_color, 0.97, 'dark' ) ) );
			$container_inner_spacing        = kemet_get_option( 'container-inner-spacing' );
			$content_padding                = apply_filters( 'kemet_content_padding', kemet_get_option( 'content-padding' ) );
			$single_content_separator_color = kemet_get_sub_option( 'content-separator-color', 'initial', kemet_color_brightness( $global_border_color, 0.955, 'dark' ) );

			// Typography.
			$body_font_size                    = kemet_get_option( 'font-size-body' );
			$body_letter_spacing               = kemet_get_option( 'letter-spacing-body' );
			$body_line_height                  = kemet_get_option( 'body-line-height' );
			$para_margin_bottom                = kemet_get_option( 'para-margin-bottom' );
			$body_text_transform               = kemet_get_option( 'body-text-transform' );
			$body_font_style                   = kemet_get_option( 'body-font-style' );
			$headings_font_family              = kemet_get_option( 'headings-font-family' );
			$headings_font_weight              = kemet_get_option( 'headings-font-weight' );
			$headings_text_transform           = kemet_get_option( 'headings-text-transform' );
			$single_post_title_font_size       = kemet_get_option( 'font-size-entry-title' );
			$single_post_title_letter_spacing  = kemet_get_option( 'letter-spacing-entry-title' );
			$single_post_title_font_color      = kemet_get_option( 'font-color-entry-title', $headings_links_color );
			$single_post_meta_color            = kemet_get_option( 'single-post-meta-color', kemet_color_brightness( $text_meta_color, 0.7, 'light' ) );
			$comment_button_spacing            = kemet_get_option( 'comment-button-spacing' );
			$archive_post_title_font_size      = kemet_get_option( 'font-size-page-title' );
			$archive_post_title_font_weight    = kemet_get_option( 'post-title-font-weight' );
			$archive_post_title_text_transform = kemet_get_option( 'post-title-text-transform' );
			$archive_post_title_font_style     = kemet_get_option( 'post-title-font-style' );
			$archive_post_title_line_height    = kemet_get_option( 'post-title-line-height' );
			$archive_post_title_font_family    = kemet_get_option( 'post-title-font-family' );
			$archive_post_title_letter_spacing = kemet_get_option( 'letter-spacing-page-title' );
			$heading_h1_font_size              = kemet_get_option( 'font-size-h1' );
			$heading_h2_font_size              = kemet_get_option( 'font-size-h2' );
			$heading_h3_font_size              = kemet_get_option( 'font-size-h3' );
			$heading_h4_font_size              = kemet_get_option( 'font-size-h4' );
			$heading_h5_font_size              = kemet_get_option( 'font-size-h5' );
			$heading_h6_font_size              = kemet_get_option( 'font-size-h6' );
			$heading_h1_letter_spacing         = kemet_get_option( 'letter-spacing-h1' );
			$heading_h2_letter_spacing         = kemet_get_option( 'letter-spacing-h2' );
			$heading_h3_letter_spacing         = kemet_get_option( 'letter-spacing-h3' );
			$heading_h4_letter_spacing         = kemet_get_option( 'letter-spacing-h4' );
			$heading_h5_letter_spacing         = kemet_get_option( 'letter-spacing-h5' );
			$heading_h6_letter_spacing         = kemet_get_option( 'letter-spacing-h6' );

			// Menu Items.
			$menu_font_family    = kemet_get_option( 'menu-items-font-family' );
			$menu_font_weight    = kemet_get_option( 'menu-items-font-weight' );
			$menu_line_height    = kemet_get_option( 'menu-items-line-height' );
			$menu_text_transform = kemet_get_option( 'menu-items-text-transform' );
			$menu_font_style     = kemet_get_option( 'menu-items-font-style' );
			$menu_font_size      = kemet_get_option( 'menu-font-size' );
			$menu_letter_spacing = kemet_get_option( 'menu-letter-spacing' );
			$menu_link_spacing   = kemet_get_option( 'main-menu-item-spacing' );
			$main_menu_spacing   = kemet_get_option( 'main-menu-spacing' );

			// Sub Menu Typography.
			$sub_menu_font_family    = kemet_get_option( 'sub-menu-items-font-family' );
			$sub_menu_font_weight    = kemet_get_option( 'sub-menu-items-font-weight' );
			$sub_menu_line_height    = kemet_get_option( 'sub-menu-items-line-height' );
			$sub_menu_text_transform = kemet_get_option( 'sub-menu-items-text-transform' );
			$sub_menu_font_style     = kemet_get_option( 'sub-menu-items-font-style' );
			$sub_menu_width          = kemet_get_option( 'submenu-width' );
			$submenu_font_size       = kemet_get_option( 'submenu-font-size' );
			$submenu_letter_spacing  = kemet_get_option( 'submenu-letter-spacing' );
			$submenu_link_spacing    = kemet_get_option( 'sub-menu-item-spacing' );
			// Layout Header.
			$header_bg_obj    = kemet_get_option( 'header-bg-obj', array( 'background-color' => $global_bg_color ) );
			$space_header     = kemet_get_option( 'header-padding' );
			$header_separator = kemet_get_option( 'header-main-sep' );

			// header menu.
			$menu_bg_color                 = kemet_get_option( 'menu-bg-color' );
			$menu_link_color               = apply_filters( 'kemet_main_menu_link_color', kemet_get_option( 'menu-link-color', $headings_links_color ) );
			$menu_link_h_color             = apply_filters( 'kemet_main_menu_link_h_color', kemet_get_option( 'menu-link-h-color', $theme_color ) );
			$menu_link_bottom_border_color = kemet_get_option( 'menu-link-bottom-border-color', isset( $menu_link_h_color['desktop'] ) ? $menu_link_h_color['desktop'] : $menu_link_h_color );
			$menu_link_active_color        = kemet_get_option( 'menu-link-active-color', isset( $menu_link_h_color['desktop'] ) ? $menu_link_h_color['desktop'] : $menu_link_h_color );
			$menu_link_active_bg_color     = kemet_get_option( 'menu-link-active-bg-color' );
			$menu_link_active_radius       = kemet_get_option( 'menu-link-active-radius' );
			$last_menu_items_spacing       = kemet_get_option( 'last-menu-item-spacing' );
			$menu_link_border_bottom       = kemet_get_option( 'menu-item-border-bottom' );
			// Last Menu.
			$last_menu_font_family    = kemet_get_option( 'last-menu-items-font-family', $menu_font_family );
			$last_menu_font_weight    = kemet_get_option( 'last-menu-items-font-weight', $menu_font_weight );
			$last_menu_text_transform = kemet_get_option( 'last-menu-items-text-transform', $menu_text_transform );
			$last_menu_font_style     = kemet_get_option( 'last-menu-items-font-style', $menu_font_style );
			$last_menu_font_size      = kemet_get_option( 'last-menu-items-font-size', $menu_font_size );
			$last_menu_letter_spacing = kemet_get_option( 'last-menu-items-letter-spacing', $menu_letter_spacing );
			$last_menu_line_height    = kemet_get_option( 'last-menu-items-line-height', $menu_line_height );
			// SubMenu Top Border.
			$submenu_top_border_size  = kemet_get_option( 'submenu-top-border-size' );
			$submenu_top_border_color = kemet_get_option( 'submenu-top-border-color', $global_border_color );
			// Mobile Menu Options.
			$mobile_menu_icon_color         = kemet_get_option( 'mobile-menu-icon-color' );
			$mobile_menu_icon_bg_color      = kemet_get_option( 'mobile-menu-icon-bg-color' );
			$mobile_menu_icon_h_color       = kemet_get_option( 'mobile-menu-icon-h-color' );
			$mobile_menu_icon_bg_h_color    = kemet_get_option( 'mobile-menu-icon-bg-h-color' );
			$mobile_menu_items_border_color = kemet_get_option( 'mobile-menu-items-border-color', $global_border_color );
			$mobile_menu_items_border_size  = kemet_get_option( 'mobile-menu-items-border-size' );

			// header submenu.
			$submenu_bg_color       = kemet_get_option( 'submenu-bg-color', kemet_color_brightness( $global_bg_color, 0.99, 'dark' ) );
			$submenu_bg_hover_color = kemet_get_option( 'submenu-bg-hover-color' );
			$submenu_link_color     = kemet_get_option( 'submenu-link-color', $headings_links_color );
			$submenu_link_h_color   = kemet_get_option( 'submenu-link-h-color', $theme_color );
			$display_submenu_border = kemet_get_option( 'display-submenu-border' );
			$submenu_border_color   = kemet_get_option( 'submenu-border-color', $global_border_color );

			// Content Heading Color.
			$heading_h1_font_color = kemet_get_option( 'font-color-h1' );
			$heading_h2_font_color = kemet_get_option( 'font-color-h2' );
			$heading_h3_font_color = kemet_get_option( 'font-color-h3' );
			$heading_h4_font_color = kemet_get_option( 'font-color-h4' );
			$heading_h5_font_color = kemet_get_option( 'font-color-h5' );
			$heading_h6_font_color = kemet_get_option( 'font-color-h6' );

			// Button Styling.
			$btn_font_size         = kemet_get_option( 'buttons-font-size' );
			$btn_font_family       = kemet_get_option( 'buttons-font-family' );
			$btn_font_weight       = kemet_get_option( 'buttons-font-weight' );
			$btn_text_tranform     = kemet_get_option( 'buttons-text-transform' );
			$btn_font_style        = kemet_get_option( 'buttons-font-style' );
			$btn_line_height       = kemet_get_option( 'buttons-line-height' );
			$btn_letter_spacing    = kemet_get_option( 'buttons-letter-spacing' );
			$btn_border_radius     = kemet_get_option( 'button-radius' );
			$btn_padding           = kemet_get_option( 'button-spacing' );
			$highlight_link_color  = kemet_get_foreground_color( $theme_color );
			$highlight_theme_color = kemet_get_foreground_color( $theme_color );

			// Content.
			$content_text_color   = kemet_get_option( 'content-text-color' );
			$content_link_color   = kemet_get_option( 'content-link-color' );
			$content_link_h_color = kemet_get_option( 'content-link-h-color' );

			// Listing Post Page.
			$listing_post_title_color         = kemet_get_option( 'listing-post-title-color' );
			$listing_post_title_hover_color   = kemet_get_option( 'listing-post-title-hover-color' );
			$listing_post_content_color       = kemet_get_option( 'post-content-color' );
			$main_entry_content_color         = kemet_get_option( 'main-entry-content-color' );
			$archive_post_meta_font_size      = kemet_get_option( 'font-size-post-meta' );
			$archive_post_meta_font_family    = kemet_get_option( 'post-meta-font-family' );
			$archive_post_meta_font_weight    = kemet_get_option( 'post-meta-font-weight' );
			$archive_post_meta_text_transform = kemet_get_option( 'post-meta-text-transform' );
			$archive_post_meta_font_style     = kemet_get_option( 'post-meta-font-style' );
			$archive_post_meta_line_height    = kemet_get_option( 'post-meta-line-height' );
			$archive_post_meta_letter_spacing = kemet_get_option( 'letter-spacing-post-meta' );
			$meta_color                       = kemet_get_option( 'listing-post-meta-color' );
			$pagination_padding               = kemet_get_option( 'pagination-padding' );
			// Footer Font.
			$footer_font_family    = kemet_get_option( 'footer-font-family' );
			$footer_font_weight    = kemet_get_option( 'footer-font-weight' );
			$footer_text_transform = kemet_get_option( 'footer-text-transform' );
			$footer_font_style     = kemet_get_option( 'footer-font-style' );
			$footer_line_height    = kemet_get_option( 'footer-line-height' );
			$footer_font_size      = kemet_get_option( 'footer-font-size' );
			$footer_letter_spacing = kemet_get_option( 'footer-letter-spacing' );
			// Footer Styling.
			$space_footer                             = kemet_get_option( 'footer-padding' );
			$kemet_footer_widget_title_font_size      = kemet_get_option( 'footer-widget-title-font-size' );
			$kemet_footer_widget_title_letter_spacing = kemet_get_option( 'footer-widget-title-letter-spacing' );
			$kemet_footer_wgt_title_font_family       = kemet_get_option( 'footer-wgt-title-font-family' );
			$kemet_footer_wgt_title_font_weight       = kemet_get_option( 'footer-wgt-title-font-weight' );
			$kemet_footer_wgt_title_text_transform    = kemet_get_option( 'footer-wgt-title-text-transform' );
			$kemet_footer_wgt_title_font_style        = kemet_get_option( 'footer-wgt-title-font-style' );
			$kemet_footer_wgt_title_line_height       = kemet_get_option( 'footer-wgt-title-line-height' );
			// Footer widget Spacing.
			$kemet_footer_space_widget = kemet_get_option( 'footer-widget-padding' );
			$footer_widget_padding     = kemet_get_option( 'footer-inner-widget-padding' );

			// Footer widget Meta color.
			$kemet_footer_widget_meta_color = kemet_get_option( 'footer-widget-meta-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );

			// Footer Bar Colors.
			$footer_bg_obj       = kemet_get_option( 'footer-bar-bg-obj', array( 'background-color' => kemet_color_brightness( $global_footer_bg_color, 0.8, 'dark' ) ) );
			$footer_bar_spacing  = kemet_get_option( 'footer-bar-padding' );
			$footer_color        = kemet_get_option( 'footer-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_link_color   = kemet_get_option( 'copyright-link-color', $global_footer_text_color );
			$footer_link_h_color = kemet_get_option( 'copyright-link-h-color', $theme_color );

			// Footer Button color.
			$footer_button_color          = kemet_get_option( 'footer-button-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_button_hover_color    = kemet_get_option( 'footer-button-h-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_button_bg_color       = kemet_get_option( 'footer-button-bg-color', kemet_color_brightness( $global_footer_bg_color, 0.82, 'dark' ) );
			$footer_button_bg_h_color     = kemet_get_option( 'footer-button-bg-h-color', kemet_color_brightness( $global_footer_bg_color, 0.9, 'dark' ) );
			$footer_button_border_radius  = kemet_get_option( 'footer-button-radius' );
			$footer_button_border_width   = kemet_get_option( 'footer-button-border-width' );
			$footer_button_border_color   = kemet_get_option( 'footer-button-border-color', kemet_color_brightness( $global_footer_bg_color, 0.8, 'dark' ) );
			$footer_button_border_h_color = kemet_get_option( 'footer-button-border-h-color', $footer_button_border_color );

			// Footer Input Color.
			$footer_input_color         = kemet_get_option( 'footer-input-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_input_bg_color      = kemet_get_option( 'footer-input-bg-color', kemet_color_brightness( $global_footer_bg_color, 0.82, 'dark' ) );
			$footer_input_border_color  = kemet_get_option( 'footer-input-border-color', kemet_color_brightness( $global_footer_bg_color, 0.9, 'dark' ) );
			$footer_input_border_size   = kemet_get_option( 'footer-input-border-size' );
			$footer_input_border_radius = kemet_get_option( 'footer-input-border-radius' );
			$footer_input_padding       = kemet_get_option( 'footer-widget-input-padding' );
			// Footer Bar Font.
			$footer_sml_font_size      = kemet_get_option( 'footer-copyright-font-size' );
			$footer_sml_letter_spacing = kemet_get_option( 'footer-copyright-letter-spacing' );
			// Color.
			$kemet_footer_bg_obj             = kemet_get_option( 'footer-bg-obj', array( 'background-color' => $global_footer_bg_color ) );
			$kemet_footer_text_color         = kemet_get_option( 'footer-text-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$kemet_footer_widget_title_color = kemet_get_option( 'footer-wgt-title-color', $global_footer_text_color );
			$kemet_footer_link_color         = kemet_get_option( 'footer-link-color', $global_footer_text_color );
			$kemet_footer_link_h_color       = kemet_get_option( 'footer-link-h-color', $theme_color );
			$kemet_footer_widget_bg_color    = kemet_get_option( 'footer-wgt-bg-color' );

			// sidebar input color.
			$sidebar_input_color         = kemet_get_option( 'sidebar-input-color' );
			$sidebar_input_bg_color      = kemet_get_option( 'sidebar-input-bg-color' );
			$sidebar_input_border_color  = kemet_get_option( 'sidebar-input-border-color' );
			$sidebar_input_border_radius = kemet_get_option( 'sidebar-input-border-radius' );
			$sidebar_input_border_size   = kemet_get_option( 'sidebar-input-border-size' );

			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = kemet_get_sub_option( 'button-text-color', 'initial', '#ffffff' );

			// sidebar.
			$sidebar_bg_obj            = kemet_get_option( 'sidebar-bg-obj' );
			$sidebar_padding           = kemet_get_option( 'sidebar-padding' );
			$sidebar_text_color        = kemet_get_option( 'sidebar-text-color' );
			$sidebar_link_color        = kemet_get_option( 'sidebar-link-color' );
			$sidebar_link_h_color      = kemet_get_option( 'sidebar-link-h-color' );
			$widget_bg_color           = kemet_get_sub_option( 'widget-bg-color', 'initial' );
			$space_widget              = kemet_get_option( 'widget-padding' );
			$widget_margin_bottom      = kemet_get_option( 'widget-margin-bottom' );
			$sidebar_content_font_size = kemet_get_option( 'sidebar-content-font-size' );

			// Sidebar Widget Titles Sidebar.
			$widget_title_font_family    = kemet_get_option( 'widget-title-font-family' );
			$widget_title_font_weight    = kemet_get_option( 'widget-title-font-weight' );
			$widget_title_text_transform = kemet_get_option( 'widget-title-text-transform' );
			$widget_title_font_style     = kemet_get_option( 'widget-title-font-style' );
			$widget_title_line_height    = kemet_get_option( 'widget-title-line-height' );
			$widget_title_font_size      = kemet_get_option( 'widget-title-font-size' );
			$widget_title_letter_spacing = kemet_get_option( 'widget-title-letter-spacing' );
			$widget_title_color          = kemet_get_sub_option( 'widget-title-color', 'initial' );

			/**
			 * Apply text hover color depends on link hover color
			 */
			$btn_text_hover_color = kemet_get_sub_option( 'button-text-color', 'hover' );
			$btn_bg_color         = kemet_get_sub_option( 'button-bg-color', 'initial', $theme_color );
			$btn_border_size      = kemet_get_option( 'btn-border-size' );
			$btn_border_color     = kemet_get_sub_option( 'btn-border-color', 'initial' );
			$btn_border_h_color   = kemet_get_sub_option( 'btn-border-color', 'hover' );
			$btn_bg_hover_color   = kemet_get_sub_option( 'button-bg-color', 'hover', kemet_color_brightness( $theme_color, 0.8, 'dark' ) );
			$btn_effect           = kemet_get_option( 'button-effect' );
			$btn_hover_effect     = kemet_get_option( 'button-hover-effect' );

			// Spacing of Big Footer.
			$copyright_footer_divider_color = kemet_get_option( 'footer-copyright-divider-color', kemet_color_brightness( $global_footer_text_color, 0.22, 'dark' ) );
			$copyright_footer_divider       = kemet_get_option( 'footer-copyright-divider' );

			/**
			 * Small Footer Styling
			 */
			$copyright_footer_layout = kemet_get_option( 'copyright-footer-layout', 'copyright-footer-layout-1' );
			$kemet_footer_width      = kemet_get_option( 'footer-layout-width' );

			// Blog Post Title Typography Options.
			$single_post_max       = kemet_get_option( 'blog-single-width' );
			$single_post_max_width = kemet_get_option( 'blog-single-max-width' );
			$blog_width            = kemet_get_option( 'blog-width' );
			$blog_max_width        = kemet_get_option( 'blog-max-width' );

			$css_output = array();
			// Body Font Family.
			$body_font_family = kemet_body_font_family();
			$body_font_weight = kemet_get_option( 'body-font-weight' );

			if ( is_array( $body_font_size ) ) {
				$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
			} else {
				$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
			}

			$css_output = array(
				':root'                                 => array(
					'--fontFamily'                 => kemet_get_font_family( $body_font_family ),
					'--fontSize'                   => kemet_responsive_slider( $body_font_size, 'desktop' ),
					'--fontWeight'                 => esc_attr( $body_font_weight ),
					'--textTransform'              => 'none',
					'--textDecoration'             => 'none',
					'--lineHeight'                 => '1.85714285714286',
					'--letterSpacing'              => kemet_responsive_slider( $body_letter_spacing, 'desktop' ),
					'--fontStyle'                  => esc_attr( $body_font_style ),
					'--themeColor'                 => esc_attr( $theme_color ),
					'--textColor'                  => esc_attr( $text_meta_color ),
					'--headingLinksColor'          => esc_attr( $headings_links_color ),
					'--linksHoverColor'            => 'var(--themeColor)',
					'--borderColor'                => esc_attr( $global_border_color ),
					'--globalBackgroundColor'      => esc_attr( $global_bg_color ),
					'--footerTextColor'            => esc_attr( $global_footer_text_color ),
					'--footerBackgroundColor'      => esc_attr( $global_footer_bg_color ),
					'--buttonColor'                => esc_attr( $btn_text_color ),
					'--buttonHoverColor'           => esc_attr( $btn_text_hover_color ),
					'--buttonBackgroundColor'      => esc_attr( $btn_bg_color ),
					'--buttonBackgroundHoverColor' => esc_attr( $btn_bg_hover_color ),
					'--buttonBorderRadius'         => '0',
					'--inputColor'                 => esc_attr( $input_text_color ),
					'--inputBackgroundColor'       => esc_attr( $input_bg_color ),
					'--inputBorderColor'           => esc_attr( $input_border_color ),
					'--inputFocusColor'            => esc_attr( $input_focus_text_color ),
					'--inputFocusBackgroundColor'  => esc_attr( $input_focus_bg_color ),
					'--inputFocusBorderColor'      => esc_attr( $input_focus_border_color ),
					'--inputBorderRadius'          => kemet_responsive_slider( $input_border_radius, 'desktop' ),
					'--inputBorderWidth'           => kemet_responsive_slider( $input_border_size, 'desktop' ),
					'--contentWidth'               => kemet_get_css_value( $site_content_width, 'px' ),
					'--buttonShadow'               => 'none',
				),
				// Gutenberg Support.
				'.kmt-single-post .has-global-color'    => array(
					'color' => 'var(--themeColor)',
				),
				'.kmt-single-post .wp-block-separator'  => array(
					'border-color'     => 'var(--borderColor)',
					'background-color' => 'var(--borderColor)',
				),
				'.kmt-single-post .has-global-border-color' => array(
					'color' => 'var(--borderColor)',
				),
				'.kmt-single-post .has-text-meta-color' => array(
					'color' => 'var(--textColor)',
				),
				'.kmt-single-post .has-global-bg-color' => array(
					'background-color' => 'var(--backgroundColor)',
				),
				'.kmt-single-post .has-headings-links-color , .kmt-single-post .wp-block-cover-image-text a, .kmt-single-post .wp-block-cover-text a, .kmt-single-post section.wp-block-cover-image h2 a, .kmt-single-post section.wp-block-cover-image h2 a:active, .kmt-single-post section.wp-block-cover-image h2 a:focus, section.wp-block-cover-image h2 a:hover' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.kmt-single-post .wp-block-cover-text a:hover, .kmt-single-post .wp-block-cover-text a:active, .kmt-single-post .wp-block-cover-image-text a:active, .kmt-single-post .wp-block-cover-image-text a:focus, .kmt-single-post .wp-block-cover-image-text a:hover' => array(
					'color' => 'var(--themeColor)',
				),
				'.wp-block-cover .wp-block-cover-text:not(.has-text-color)' => array(
					'color' => esc_attr( '#fff' ),
				),
				'.kmt-single-post .has-global-background-color' => array(
					'background-color' => 'var(--themeColor)',
				),
				'.kmt-single-post .has-headings-links-background-color' => array(
					'background-color' => 'var(--headingLinksColor)',
				),
				'.kmt-single-post .has-text-meta-background-color' => array(
					'background-color' => 'var(--textColor)',
				),
				'.kmt-single-post .has-global-border-background-color' => array(
					'background-color' => 'var(--borderColor)',
				),
				'.kmt-single-post .has-global-bg-background-color' => array(
					'background-color' => 'var(--backgroundColor)',
				),
				'code'                                  => array(
					'background-color' => kemet_color_brightness( $global_bg_color, 0.94, 'dark' ),
				),
				'.wp-block-code code'                   => array(
					'color' => 'var(--textColor)',
				),
				'.kmt-single-post .wp-block-table td, .kmt-single-post .wp-block-table th' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.wp-block:not([data-align="wide"]):not([data-align="full"]), .wp-block:not([data-align="wide"]):not([data-align="full"]) > * ' => array(
					'max-width' => 'calc( var(--contentWidth) + 40px )',
				),
				// HTML.
				'html'                                  => array(
					'font-size'  => 'var(--fontSize)',
					'--fontSize' => kemet_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				'a'                                     => array(
					'color' => 'var(--headingLinksColor)',
				),
				'a:hover, a:focus'                      => array(
					'color' => 'var(--linksHoverColor)',
				),
				'.widget_search .search-form:after'     => array(
					'color' => 'var(--inputColor)',
				),
				'body, button, input, select, textarea, .button, a.wp-block-button__link' => array(
					'font-family'    => 'var(--fontFamily)',
					'font-weight'    => 'var(--fontWeight)',
					'font-size'      => 'var(--fontSize)',
					'letter-spacing' => 'var(--letterSpacing)',
					'line-height'    => 'var(--lineHeight)',
					'text-transform' => 'var(--textTransform)',
					'font-style'     => 'var(--fontStyle)',
				),
				'p, .entry-content p'                   => array(
					'--marginBottom' => kemet_get_css_value( $para_margin_bottom, 'em' ),
				),
				'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a' => array(
					'--fontFamily'     => kemet_get_css_value( $headings_font_family, 'font' ),
					'--fontWeight'     => kemet_get_css_value( $headings_font_weight, 'font' ),
					'--textTransform)' => esc_attr( $headings_text_transform ),
				),
				'figcaption'                            => array(
					'--textColor' => esc_attr( kemet_color_brightness( $text_meta_color, 0.88, 'light' ) ),
				),
				'.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a' => array(
					'--fontSize'      => kemet_responsive_slider( $archive_post_title_font_size, 'desktop' ),
					'--fontFamily'    => kemet_get_font_family( $archive_post_title_font_family ),
					'--fontWeight'    => kemet_get_css_value( $archive_post_title_font_weight, 'font' ),
					'--lineHeight'    => kemet_responsive_slider( $archive_post_title_line_height, 'desktop' ),
					'--textTransform' => esc_attr( $archive_post_title_text_transform ),
					'--fontStyle'     => esc_attr( $archive_post_title_font_style ),
					'--letterSpacing' => kemet_responsive_slider( $archive_post_title_letter_spacing, 'desktop' ),
				),
				'.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *' => array(
					'--fontSize'          => kemet_responsive_slider( $archive_post_meta_font_size, 'desktop' ),
					'--fontFamily'        => kemet_get_font_family( $archive_post_meta_font_family ),
					'--fontWeight'        => kemet_get_css_value( $archive_post_meta_font_weight, 'font' ),
					'--lineHeight'        => kemet_responsive_slider( $archive_post_meta_line_height, 'desktop' ),
					'--textTransform'     => esc_attr( $archive_post_meta_text_transform ),
					'--fontStyle'         => esc_attr( $archive_post_meta_font_style ),
					'--letterSpacing'     => kemet_responsive_slider( $archive_post_meta_letter_spacing, 'desktop' ),
					'--headingLinksColor' => esc_attr( $meta_color ),
					'--textColor'         => esc_attr( $meta_color ),
				),
				'.comment-reply-title'                  => array(
					'--fontSize' => kemet_get_font_css_value( (int) $body_font_size_desktop * 1.66666 ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'--fontSize'      => kemet_responsive_slider( $body_font_size, 'desktop' ),
					'--letterSpacing' => kemet_responsive_slider( $body_letter_spacing, 'desktop' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'--headingLinksColor' => esc_attr( $heading_h1_font_color ),
					'--fontSize'          => kemet_responsive_slider( $heading_h1_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $heading_h1_letter_spacing, 'desktop' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'--headingLinksColor' => esc_attr( $heading_h2_font_color ),
					'--fontSize'          => kemet_responsive_slider( $heading_h2_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $heading_h2_letter_spacing, 'desktop' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'--headingLinksColor' => esc_attr( $heading_h3_font_color ),
					'--fontSize'          => kemet_responsive_slider( $heading_h3_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $heading_h3_letter_spacing, 'desktop' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'--headingLinksColor' => esc_attr( $heading_h4_font_color ),
					'--fontSize'          => kemet_responsive_slider( $heading_h4_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $heading_h4_letter_spacing, 'desktop' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'--headingLinksColor' => esc_attr( $heading_h5_font_color ),
					'--fontSize'          => kemet_responsive_slider( $heading_h5_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $heading_h5_letter_spacing, 'desktop' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'--headingLinksColor' => esc_attr( $heading_h6_font_color ),
					'--fontSize'          => kemet_responsive_slider( $heading_h6_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $heading_h6_letter_spacing, 'desktop' ),
				),
				'.kmt-single-post .entry-header .entry-title' => array(
					'--fontSize'          => kemet_responsive_slider( $single_post_title_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $single_post_title_letter_spacing, 'desktop' ),
					'--headingLinksColor' => esc_attr( $single_post_title_font_color ),
				),
				'.kmt-single-post .entry-meta,.kmt-single-post .entry-meta *' => array(
					'--headingLinksColor' => esc_attr( $single_post_meta_color ),
					'--textColor'         => esc_attr( $single_post_meta_color ),
				),
				'.comments-area .form-submit input[type="submit"]' => array(
					'--margin' => kemet_responsive_spacing( $comment_button_spacing, 'all', 'desktop' ),
				),
				// Global CSS.
				'::selection'                           => array(
					'background-color' => 'var(--headingLinksColor)',
					'color'            => esc_attr( $highlight_theme_color ),
				),
				'h1, .entry-content h1, h2, .entry-content h2, h3, .entry-content h3, h4, .entry-content h4, h5, .entry-content h5, h6, .entry-content h6' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'body'                                  => array(
					'color' => 'var(--textColor)',
				),
				// Input.
				'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit]), .wpcf7 form textarea' => array(
					'padding'          => 'var(--padding, 0.75em)',
					'color'            => 'var(--inputColor)',
					'background-color' => 'var(--inputBackgroundColor)',
					'border-color'     => 'var(--inputBorderColor)',
					'border-radius'    => 'var(--inputBorderRadius, 2px)',
					'border-width'     => 'var(--inputBorderWidth, 1px)',
					'--padding'        => kemet_responsive_spacing( $input_spacing, 'all', 'desktop' ),
					'--fontSize'       => kemet_responsive_slider( $input_font_size, 'desktop' ),
					'--fontFamily'     => kemet_get_font_family( $input_font_family ),
					'--fontWeight'     => esc_attr( $input_font_weight ),
					'--textTransform'  => esc_attr( $input_text_tranform ),
					'--fontStyle'      => esc_attr( $input_font_style ),
					'--lineHeight'     => kemet_responsive_slider( $input_line_height, 'desktop' ),
					'--letterSpacing'  => kemet_responsive_slider( $input_letter_spacing, 'desktop' ),
				),
				'input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, textarea:focus, select:focus, .wpcf7 form input:not([type=submit]):focus, .wpcf7 form textarea:focus' => array(
					'color'            => 'var(--inputFocusColor, var(--inputColor))',
					'background-color' => 'var(--inputFocusBackgroundColor, var(--inputBackgroundColor))',
					'border-color'     => 'var(--inputFocusBorderColor, var(--inputBorderColor))',
				),
				'form label'                            => array(
					'--textColor' => esc_attr( $input_label_color ),
					'color'       => 'var(--textColor)',
				),
				// Typography.
				'.widget_product_tag_cloud .tagcloud a, .widget_tag_cloud .tagcloud a' => array(
					'border-color' => 'var(--borderColor)',
				),

				'.kmt-footer .widget_tag_cloud .tagcloud a , .kmt-footer-copyright .widget_tag_cloud .widget_product_tag_cloud a' => array(
					'border-color' => esc_attr( kemet_color_brightness( $global_footer_bg_color, 0.9, 'light' ) ),
				),
				'input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb' => array(
					'border-color'     => 'var(--headingLinksColor)',
					'background-color' => 'var(--headingLinksColor)',
					'box-shadow'       => 'none',
				),
				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => 'var(--headingLinksColor)',
					'border-color' => 'var(--headingLinksColor)',
				),

				'.kmt-footer-copyright'                 => array(
					'color'           => 'var(--footerTextColor)',
					'--fontSize'      => kemet_responsive_slider( $footer_sml_font_size, 'desktop' ),
					'--letterSpacing' => kemet_responsive_slider( $footer_sml_letter_spacing, 'desktop' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'--padding' => kemet_responsive_spacing( $footer_bar_spacing, 'all', 'desktop' ),
				),
				'.kmt-footer-copyright a'               => array(
					'--headingLinksColor' => esc_attr( $footer_link_color ),
				),
				'.kmt-footer-copyright a:hover'         => array(
					'--linksHoverColor' => esc_attr( $footer_link_h_color ),
				),

				// main Fotter styling/colors/fonts.
				'.kemet-footer .widget-title,.kemet-footer .widget-head .widget-title,.kemet-footer .widget-head .widget-title a , .kmt-footer-copyright .widget-head .widget-title,.kmt-footer-copyright .widget-head .widget-title a' => array(
					'--headingLinksColor' => esc_attr( $kemet_footer_widget_title_color ),
				),
				'.site-footer'                          => array(
					'--textColor' => esc_attr( $kemet_footer_text_color ),
				),

				'.kemet-footer .post-date'              => array(
					'color' => esc_attr( $kemet_footer_widget_meta_color ),
				),

				'.kemet-footer button, .kemet-footer .button, .kemet-footer .kmt-button, .kemet-footer input[type=button], .kemet-footer input[type=reset] ,.kemet-footer input[type="submit"], .kemet-footer .wp-block-button a.wp-block-button__link, .kemet-footer .wp-block-search button.wp-block-search__button' => array(
					'--buttonColor'                => esc_attr( $footer_button_color ),
					'--buttonBackgroundColor'      => esc_attr( $footer_button_bg_color ),
					'--borderColor'                => esc_attr( $footer_button_border_color ),
					'--buttonBorderRadius'         => kemet_responsive_slider( $footer_button_border_radius, 'desktop' ),
					'--borderWidth'                => kemet_responsive_slider( $footer_button_border_width, 'desktop' ),
					'--buttonHoverColor'           => esc_attr( $footer_button_hover_color ),
					'--buttonBackgroundHoverColor' => esc_attr( $footer_button_bg_h_color ),
					'--borderHoverColor'           => esc_attr( $footer_button_border_h_color ),
				),
				'.kemet-footer'                         => array(
					'--fontSize'      => kemet_responsive_slider( $footer_font_size, 'desktop' ),
					'--letterSpacing' => kemet_responsive_slider( $footer_letter_spacing, 'desktop' ),
					'--fontFamily'    => kemet_get_font_family( $footer_font_family ),
					'--fontWeight'    => esc_attr( $footer_font_weight ),
					'--textTransform' => esc_attr( $footer_text_transform ),
					'--fontStyle'     => esc_attr( $footer_font_style ),
					'--lineHeight'    => kemet_responsive_slider( $footer_line_height, 'desktop' ),
				),
				'.kemet-footer .kemet-footer-overlay'   => array(
					'--padding' => kemet_responsive_spacing( $space_footer, 'all', 'desktop' ),
				),
				'.kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title' => array(
					'--fontSize'      => kemet_responsive_slider( $kemet_footer_widget_title_font_size, 'desktop' ),
					'--letterSpacing' => kemet_responsive_slider( $kemet_footer_widget_title_letter_spacing, 'desktop' ),
					'--fontFamily'    => kemet_get_font_family( $kemet_footer_wgt_title_font_family ),
					'--fontWeight'    => esc_attr( $kemet_footer_wgt_title_font_weight ),
					'--textTransform' => esc_attr( $kemet_footer_wgt_title_text_transform ),
					'--fontStyle'     => esc_attr( $kemet_footer_wgt_title_font_style ),
					'--lineHeight'    => kemet_responsive_slider( $kemet_footer_wgt_title_line_height, 'desktop' ),
				),

				'.kemet-footer a'                       => array(
					'--headingLinksColor' => esc_attr( $kemet_footer_link_color ),
					'--linksHoverColor'   => esc_attr( $kemet_footer_link_h_color ),
				),
				'.kemet-footer .calendar_wrap #today, .kemet-footer a:hover + .post-count' => array(
					'background-color' => esc_attr( $kemet_footer_link_color ),
				),
				'.kemet-footer input[type="text"], .kemet-footer input[type="email"], .kemet-footer input[type="url"], .kemet-footer input[type="password"], .kemet-footer input[type="reset"], .kemet-footer input[type="search"], .kemet-footer textarea, .kemet-footer select, .kemet-footer .wpcf7 form input:not([type=submit])' => array(
					'--inputColor'                => esc_attr( $footer_input_color ),
					'--inputBackgroundColor'      => esc_attr( $footer_input_bg_color ),
					'--inputBorderColor'          => esc_attr( $footer_input_border_color ),
					'--inputBorderWidth'          => kemet_responsive_slider( $footer_input_border_size, 'desktop' ),
					'--inputBorderRadius'         => kemet_responsive_slider( $footer_input_border_radius, 'desktop' ),
					'--padding'                   => kemet_responsive_spacing( $footer_input_padding, 'all', 'desktop' ),
					'--inputFocusColor'           => '',
					'--inputFocusBackgroundColor' => '',
					'--inputFocusBorderColor'     => '',
				),

				'.kemet-footer .kemet-footer-widget'    => array(
					'--padding' => kemet_responsive_spacing( $kemet_footer_space_widget, 'all', 'desktop' ),
				),
				'.kemet-footer .widget , .kmt-footer-copyright .widget' => array(
					'--padding'        => kemet_responsive_spacing( $footer_widget_padding, 'all', 'desktop' ),
					'background-color' => esc_attr( $kemet_footer_widget_bg_color ),
				),
				// Single Post Meta.
				'.kmt-comment-meta'                     => array(
					'--lineHeight' => '1.666666667',
					'--fontSize'   => kemet_get_font_css_value( (int) $body_font_size_desktop * 0.8571428571 ),
				),
				'.single .nav-links .nav-previous, .single .nav-links .nav-next, .single .kmt-author-details .author-title, .kmt-comment-meta' => array(
					'--textColor' => esc_attr( $headings_links_color ),
				),

				// Button Typography.
				'button, .button, .kmt-button, input[type=button], input[type=reset] ,input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'color'              => 'var(--buttonColor)',
					'background-color'   => 'var(--buttonBackgroundColor)',
					'box-shadow'         => 'var(--buttonShadow)',
					'--borderHoverColor' => esc_attr( $btn_border_h_color ),
					'--borderRadius'     => kemet_responsive_spacing( $btn_border_radius, 'all', 'desktop' ),
					'--borderStyle'      => 'solid',
					'--borderColor'      => esc_attr( $btn_border_color ),
					'--borderWidth'      => kemet_get_css_value( $btn_border_size, 'px' ),
					'--padding'          => kemet_responsive_spacing( $btn_padding, 'all', 'desktop' ),
					'--fontSize'         => kemet_responsive_slider( $btn_font_size, 'desktop' ),
					'--fontFamily'       => kemet_get_font_family( $btn_font_family ),
					'--fontWeight'       => esc_attr( $btn_font_weight ),
					'--textTransform'    => esc_attr( $btn_text_tranform ),
					'--fontStyle'        => esc_attr( $btn_font_style ),
					'--lineHeight'       => kemet_responsive_slider( $btn_line_height, 'desktop' ),
					'--letterSpacing'    => kemet_responsive_slider( $btn_letter_spacing, 'desktop' ),
					'--buttonShadow'     => $btn_effect ? '2px 2px 10px -3px' : 'none',
				),
				'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover' => array(
					'color'            => 'var(--buttonHoverColor, var(--buttonColor))',
					'background-color' => 'var(--buttonBackgroundHoverColor, var(--buttonBackgroundColor))',
					'border-color'     => 'var(--borderHoverColor)',
					'box-shadow'       => 'var(--buttonShadow)',
					'--buttonShadow'   => $btn_hover_effect ? '2px 2px 10px -3px' : 'none',
				),
				// Content.
				'.entry-content'                        => array(
					'--textColor' => esc_attr( $content_text_color ),
				),
				// Content Link color.
				'.entry-content a'                      => array(
					'--headingLinksColor' => esc_attr( $content_link_color ),
					'--linksHoverColor'   => esc_attr( $content_link_h_color ),
				),
				// Listing Post Page.
				'.content-area .entry-title a'          => array(
					'--headingLinksColor' => esc_attr( $listing_post_title_color ),
					'--linksHoverColor'   => esc_attr( $listing_post_title_hover_color ),
				),
				'.content-area .entry-content'          => array(
					'--textColor' => esc_attr( $main_entry_content_color ),
				),
				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *'            => array(
					'--textColor' => esc_attr( kemet_color_brightness( $text_meta_color, 0.7, 'light' ) ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'--linksHoverColor' => esc_attr( $theme_color ),
				),
				'div.sidebar-main'                      => array(
					'padding' => kemet_responsive_spacing( $sidebar_padding, 'all', 'desktop' ),
				),
				'.sidebar-main'                         => array(
					'--textColor' => esc_attr( $sidebar_text_color ),
				),
				'.sidebar-main a'                       => array(
					'--headingLinksColor' => esc_attr( $sidebar_link_color ),
					'--linksHoverColor'   => esc_attr( $sidebar_link_h_color ),
				),
				'#secondary .sidebar-main'              => array(
					'--fontSize' => kemet_responsive_slider( $sidebar_content_font_size, 'desktop' ),
				),
				'.kmt-separate-container.kmt-two-container #secondary div.widget , div.widget' => array(
					'background-color' => esc_attr( $widget_bg_color ),
				),
				// sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'--inputColor'           => esc_attr( $sidebar_input_color ),
					'--inputBackgroundColor' => esc_attr( $sidebar_input_bg_color ),
					'--inputBorderColor'     => esc_attr( $sidebar_input_border_color ),
					'--inputBorderWidth'     => kemet_responsive_slider( $sidebar_input_border_size, 'desktop' ),
					'--inputBorderRadius'    => kemet_responsive_slider( $sidebar_input_border_radius, 'desktop' ),
				),

				// Widget Titles Sidebar.
				'.widget-head .widget-title , .widget-title' => array(
					'--fontFamily'        => kemet_get_font_family( $widget_title_font_family ),
					'--fontWeight'        => esc_attr( $widget_title_font_weight ),
					'--fontSize'          => kemet_responsive_slider( $widget_title_font_size, 'desktop' ),
					'--letterSpacing'     => kemet_responsive_slider( $widget_title_letter_spacing, 'desktop' ),
					'--lineHeight'        => kemet_responsive_slider( $widget_title_line_height, 'desktop' ),
					'--textTransform'     => esc_attr( $widget_title_text_transform ),
					'--headingLinksColor' => esc_attr( $widget_title_color ),
					'--fontStyle'         => esc_attr( $widget_title_font_style ),
				),

				// Widget Spacing.
				'.sidebar-main .widget'                 => array(
					'margin-bottom' => kemet_get_css_value( $widget_margin_bottom ),
					'padding'       => kemet_responsive_spacing( $space_widget, 'all', 'desktop' ),
				),
				// Blockquote Text Color.
				'blockquote p , blockquote em'          => array(
					'--fontSize' => kemet_responsive_slider( $body_font_size, 'desktop' ),
				),
				'.kmt-single-post blockquote, .kmt-single-post blockquote a,.kmt-single-post .wp-block-pullquote blockquote' => array(
					'--textColor'         => esc_attr( kemet_color_brightness( $headings_links_color, 0.75, 'darken' ) ),
					'--headingLinksColor' => esc_attr( kemet_color_brightness( $headings_links_color, 0.75, 'darken' ) ),
				),
				'.kmt-single-post blockquote ,.kmt-single-post .wp-block-pullquote blockquote' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.kmt-single-post  blockquote, .kmt-single-post .wp-block-quote , .kmt-single-post .wp-block-quote.has-text-align-right' => array(
					'border-color' => 'var(--borderColor)',
				),

				// 404 Page.
				'.kmt-404-layout .kmt-404-text'         => array(
					'--fontSize' => kemet_get_font_css_value( '200' ),
				),

				// Widget Title.
				'.widget-title'                         => array(
					'--fontSize'          => kemet_get_font_css_value( (int) $body_font_size_desktop * 1.428571429 ),
					'--headingLinksColor' => esc_attr( $headings_links_color ),
				),
				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
					'--textColor'         => esc_attr( $headings_links_color ),
					'--headingLinksColor' => esc_attr( $headings_links_color ),
				),
				'.secondary .calendar_wrap #today, .kmt-progress-val span' => array(
					'background' => esc_attr( $headings_links_color ),
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => 'var(--headingLinksColor)',
					'border-color' => 'var(--headingLinksColor)',
				),
				'.calendar_wrap #today > a'             => array(
					'--headingLinksColor' => kemet_get_foreground_color( $theme_color ),
				),

				// Pagination.
				'.kmt-pagination a, .page-links .page-link, .single .post-navigation a' => array(
					'--headingLinksColor' => esc_attr( $headings_links_color ),
					'--linksHoverColor'   => esc_attr( $theme_color ),
				),
				'.site-content .kmt-pagination'         => array(
					'--padding' => kemet_responsive_spacing( $pagination_padding, 'all', 'desktop' ),
				),
				'body:not(.kmt-separate-container) .kmt-article-post:not(.product) > div,.kmt-separate-container .kmt-article-post ,body #primary,body #secondary, .single-post:not(.kmt-separate-container) .post-navigation ,.single-post:not(.kmt-separate-container) .comments-area ,.single-post:not(.kmt-separate-container) .kmt-author-box-info , .single-post:not(.kmt-separate-container) .comments-area .kmt-comment , .kmt-left-sidebar #secondary , .kmt-left-sidebar #primary' => array(
					'border-color' => esc_attr( $single_content_separator_color ),
				),
				'.comments-area'                        => array(
					'border-top-color' => esc_attr( $global_border_color ),
				),
				'.single .post-navigation'              => array(
					'border-color' => esc_attr( $global_border_color ),
				),
				/**
				 * Content Spacing Desktop
				 */
				'.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li' => array(
					'padding' => kemet_responsive_spacing( $container_inner_spacing, 'all', 'desktop' ),
				),
				'.site-content #primary'                => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'desktop' ),
				),
				// Widgets
				'.widget ul > li,.widget.yith-woocompare-widget ul.products-list li:not( .list_empty )' => array(
					'border-bottom-style' => 'var(--borderBottomStyle)',
					'border-bottom-width' => 'var(--borderBottomWidth)',
					'border-bottom-color' => 'var(--borderBottomColor)',
				),
				'.widget .widget-head'                  => array(
					'border-bottom-style' => 'var(--borderBottomStyle)',
					'border-bottom-width' => 'var(--borderBottomWidth)',
					'border-bottom-color' => 'var(--borderBottomColor)',
				),
			);

			/* Parse CSS from array() */
			$parse_css = kemet_parse_css( $css_output );

			// Read More.
			$enable_read_more_button = kemet_get_option( 'readmore-as-button' );
			$readmore_text_color     = kemet_get_option( 'readmore-text-color', $btn_text_color );
			$readmore_text_h_color   = kemet_get_option( 'readmore-text-h-color', $btn_text_hover_color );
			$readmore_padding        = kemet_get_option( 'readmore-padding' );
			$readmore_bg_color       = kemet_get_option( 'readmore-bg-color', $btn_bg_color );
			$readmore_bg_h_color     = kemet_get_option( 'readmore-bg-h-color', $btn_bg_hover_color );
			$readmore_border_radius  = kemet_get_option( 'read-more-border-radius' );
			$readmore_border_size    = kemet_get_option( 'read-more-border-size' );
			$readmore_border_color   = kemet_get_option( 'readmore-border-color', kemet_color_brightness( $global_border_color, 0.955, 'dark' ) );
			$readmore_border_h_color = kemet_get_option( 'readmore-border-h-color' );
			if ( $enable_read_more_button ) {
				$readmore_style = array(
					'.content-area .read-more a:hover' => array(
						'color'            => esc_attr( $readmore_text_h_color ),
						'background-color' => esc_attr( $readmore_bg_h_color ),
						'border-color'     => esc_attr( $readmore_border_h_color ),
					),
					'.content-area .read-more a'       => array(
						'color'            => esc_attr( $readmore_text_color ),
						'padding-top'      => kemet_responsive_spacing( $readmore_padding, 'top', 'desktop' ),
						'padding-bottom'   => kemet_responsive_spacing( $readmore_padding, 'bottom', 'desktop' ),
						'padding-right'    => kemet_responsive_spacing( $readmore_padding, 'right', 'desktop' ),
						'padding-left'     => kemet_responsive_spacing( $readmore_padding, 'left', 'desktop' ),
						'background-color' => esc_attr( $readmore_bg_color ),
						'border-radius'    => kemet_responsive_slider( $readmore_border_radius, 'desktop' ),
						'border-style'     => 'solid',
						'border-color'     => esc_attr( $readmore_border_color ),
						'border-width'     => kemet_responsive_slider( $readmore_border_size, 'desktop' ),
					),
				);

				$parse_css .= kemet_parse_css( $readmore_style );
			}

			// Foreground color.
			if ( ! empty( $kemet_footer_link_color ) ) {
				$kemet_footer_tagcloud = array(
					'.kemet-footer .calendar_wrap #today' => array(
						'color' => kemet_get_foreground_color( $theme_color ),
					),
				);
				$parse_css            .= kemet_parse_css( $kemet_footer_tagcloud );
			}

			/* Width for Footer */
			if ( 'content' != $kemet_footer_width ) {
				$genral_global_responsive = array(
					'.kmt-footer-copyright .kmt-container' => array(
						'max-width'     => '100%',
						'padding-left'  => '35px',
						'padding-right' => '35px',
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $genral_global_responsive, '769' );
			}

			/* Width for Comments for Full Width / Stretched Template */
			$page_builder_comment = array(
				'.kmt-page-builder-template .comments-area, .single.kmt-page-builder-template .entry-header, .single.kmt-page-builder-template .post-navigation' => array(
					'max-width'    => 'calc( var(--contentWidth) + 40px )',
					'margin-left'  => 'auto',
					'margin-right' => 'auto',
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $page_builder_comment, '545' );

			// Bg Obj.
			$parse_css .= kemet_get_background_obj( '.kmt-footer-copyright > .kmt-footer-copyright-content', $footer_bg_obj );
			$parse_css .= kemet_get_background_obj( '.kmt-sticky-footer #content', $box_bg_obj );
			$parse_css .= kemet_get_background_obj( '.kemet-footer-overlay', $kemet_footer_bg_obj );
			// sidebar.
			$parse_css  .= kemet_get_background_obj( '.sidebar-main', $sidebar_bg_obj );
			$parse_css  .= kemet_get_background_obj( '.kmt-separate-container .kmt-article-post,.kmt-separate-container .kmt-article-single ,.kmt-separate-container .comment-respond ,.kmt-separate-container .kmt-author-box-info , .kmt-separate-container .kmt-woocommerce-container ,.kmt-separate-container .kmt-comment-list li ,.kmt-separate-container .comments-count-wrapper ,.kmt-separate-container.kmt-two-container #secondary div.widget', $box_bg_inner_boxed );
			$parse_css  .= kemet_get_background_obj( 'body, .kmt-separate-container , .entry-layout.blog-large-modern .entry-content', $box_bg_obj );
			$tablet_typo = array();

			if ( isset( $body_font_size['tablet'] ) && '' != $body_font_size['tablet'] ) {

				$tablet_typo = array(
					'.comment-reply-title' => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size['tablet'] * 1.66666, 'px', 'tablet' ),
					),
					// Single Post Meta.
					'.kmt-comment-meta'    => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size['tablet'] * 0.8571428571, 'px', 'tablet' ),
					),
					// Widget Title.
					'.widget-title'        => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size['tablet'] * 1.428571429, 'px', 'tablet' ),
					),
				);
			}

			/* Tablet Typography */
			$tablet_typography = array(
				':root'                                => array(
					'--fontSize'          => kemet_responsive_slider( $body_font_size, 'tablet' ),
					'--inputBorderRadius' => kemet_responsive_slider( $input_border_radius, 'tablet' ),
					'--inputBorderWidth'  => kemet_responsive_slider( $input_border_size, 'tablet' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'--fontSize'      => kemet_responsive_slider( $body_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $body_letter_spacing, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $body_line_height, 'tablet' ),
				),
				'blockquote p, blockquote em'          => array(
					'--fontSize' => kemet_responsive_slider( $body_font_size, 'tablet' ),
				),
				'.kmt-footer-copyright'                => array(
					'--fontSize'      => kemet_responsive_slider( $footer_sml_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $footer_sml_letter_spacing, 'tablet' ),
				),
				'.kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title' => array(
					'--fontSize'      => kemet_responsive_slider( $kemet_footer_widget_title_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $kemet_footer_widget_title_letter_spacing, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $kemet_footer_wgt_title_line_height, 'tablet' ),
				),
				'.widget-head .widget-title , .widget-title' => array(
					'--fontSize'      => kemet_responsive_slider( $widget_title_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $widget_title_letter_spacing, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $widget_title_line_height, 'tablet' ),
				),
				'.content-area .read-more a'           => array(
					'border-radius' => kemet_responsive_slider( $readmore_border_radius, 'tablet' ),
					'border-width'  => kemet_responsive_slider( $readmore_border_size, 'tablet' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'--padding' => kemet_responsive_spacing( $footer_bar_spacing, 'all', 'tablet' ),
				),
				'.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea' => array(
					'--inputBorderWidth'  => kemet_responsive_slider( $footer_input_border_size, 'tablet' ),
					'--inputBorderRadius' => kemet_responsive_slider( $footer_input_border_radius, 'tablet' ),
					'--padding'           => kemet_responsive_spacing( $footer_input_padding, 'top', 'tablet' ),
				),
				// Input.
				'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit]), .wpcf7 form textarea' => array(
					'--padding'       => kemet_responsive_spacing( $input_spacing, 'all', 'tablet' ),
					'--fontSize'      => kemet_responsive_slider( $input_font_size, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $input_line_height, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $input_letter_spacing, 'tablet' ),
				),
				// Sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'--inputBorderRadius' => kemet_responsive_slider( $sidebar_input_border_radius, 'tablet' ),
				),
				'#secondary .sidebar-main'             => array(
					'--fontSize' => kemet_responsive_slider( $sidebar_content_font_size, 'tablet' ),
				),
				// Button Typography.
				'button, .button, .kmt-button, input[type=button], input[type=reset] ,input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'--fontSize'      => kemet_responsive_slider( $btn_font_size, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $btn_line_height, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $btn_letter_spacing, 'tablet' ),
					'--padding'       => kemet_responsive_spacing( $btn_padding, 'all', 'mobile' ),
				),
				// Sidebar Spacing.
				'.sidebar-main'                        => array(
					'--padding' => kemet_responsive_spacing( $sidebar_padding, 'all', 'tablet' ),
				),

				// Widget Spacing.
				'.sidebar-main .widget'                => array(
					'padding' => kemet_responsive_spacing( $space_widget, 'all', 'tablet' ),
				),
				// post readmore spacing.
				'.content-area p.read-more a'          => array(
					'--padding' => kemet_responsive_spacing( $readmore_padding, 'all', 'tablet' ),
				),
				// Button Typography.
				'.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a' => array(
					'--fontSize'      => kemet_responsive_slider( $archive_post_title_font_size, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $archive_post_title_line_height, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $archive_post_title_letter_spacing, 'tablet' ),
				),
				'.blog-posts-container .entry-meta , .blog-posts-container .entry-meta *, .category-blog .entry-meta *' => array(
					'--fontSize'      => kemet_responsive_slider( $archive_post_meta_font_size, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $archive_post_meta_line_height, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $archive_post_meta_letter_spacing, 'tablet' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h1_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h1_letter_spacing, 'tablet' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h2_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h2_letter_spacing, 'tablet' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h3_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h3_letter_spacing, 'tablet' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h4_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h4_letter_spacing, 'tablet' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h5_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h5_letter_spacing, 'tablet' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h6_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h6_letter_spacing, 'tablet' ),
				),
				'.kmt-single-post entry-header .entry-title, .page-title' => array(
					'--fontSize'      => kemet_responsive_slider( $single_post_title_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'tablet' ),
				),
				'.kemet-footer'                        => array(
					'--fontSize'      => kemet_responsive_slider( $footer_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $footer_letter_spacing, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $footer_line_height, 'tablet' ),
				),
				/**
				 * Content Spacing Tablet
				 */
				'.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li ' => array(
					'padding' => kemet_responsive_spacing( $container_inner_spacing, 'all', 'tablet' ),
				),
				'.comments-area .form-submit input[type="submit"]' => array(
					'--margin' => kemet_responsive_spacing( $comment_button_spacing, 'all', 'tablet' ),
				),
				'.site-content #primary'               => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'tablet' ),
				),
				'.kemet-footer .kemet-footer-overlay ' => array(
					'--padding' => kemet_responsive_spacing( $space_footer, 'all', 'tablet' ),
				),
				// Footer Widget.
				'.kemet-footer .kemet-footer-widget'   => array(
					'--padding' => kemet_responsive_spacing( $kemet_footer_space_widget, 'all', 'tablet' ),
				),
				'.kemet-footer .widget , .kmt-footer-copyright .widget' => array(
					'--padding' => kemet_responsive_spacing( $footer_widget_padding, 'all', 'tablet' ),
				),
				// Main Footer.
				'.kemet-footer button, .kemet-footer .button, .kemet-footer a.button, .kemet-footer a.button:hover, .kemet-footer .kmt-button,.kemet-footer .button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=button], .kemet-footer input[type=submit], .kemet-footer input[type=reset]' => array(
					'--buttonBorderRadius' => kemet_responsive_slider( $footer_button_border_radius, 'tablet' ),
					'--borderWidth'        => kemet_responsive_slider( $footer_button_border_width, 'tablet' ),
				),
				'.site-content .kmt-pagination'        => array(
					'--padding' => kemet_responsive_spacing( $pagination_padding, 'all', 'tablet' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( array_merge( $tablet_typo, $tablet_typography ), '', '768' );

			$mobile_typo = array();
			if ( isset( $body_font_size['mobile'] ) && '' != $body_font_size['mobile'] ) {
				$mobile_typo = array(
					'.comment-reply-title' => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size['mobile'] * 1.66666, 'px', 'mobile' ),
					),
					// Single Post Meta.
					'.kmt-comment-meta'    => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size['mobile'] * 0.8571428571, 'px', 'mobile' ),
					),
					// Widget Title.
					'.widget-title'        => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size['mobile'] * 1.428571429, 'px', 'mobile' ),
					),
				);
			}

			/* Mobile Typography */
			$mobile_typography = array(
				':root'                                => array(
					'--fontSize'          => kemet_responsive_slider( $body_font_size, 'mobile' ),
					'--inputBorderRadius' => kemet_responsive_slider( $input_border_radius, 'mobile' ),
					'--inputBorderWidth'  => kemet_responsive_slider( $input_border_size, 'mobile' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'--fontSize'      => kemet_responsive_slider( $body_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $body_letter_spacing, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $body_line_height, 'mobile' ),
				),
				'blockquote p, blockquote em'          => array(
					'--fontSize' => kemet_responsive_slider( $body_font_size, 'tablet' ),
				),
				'.kmt-footer-copyright'                => array(
					'--fontSize'      => kemet_responsive_slider( $footer_sml_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $footer_sml_letter_spacing, 'mobile' ),
				),
				'.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea' => array(
					'--inputBorderWidth'  => kemet_responsive_slider( $footer_input_border_size, 'mobile' ),
					'--inputBorderRadius' => kemet_responsive_slider( $footer_input_border_radius, 'mobile' ),
					'--padding'           => kemet_responsive_spacing( $footer_input_padding, 'top', 'mobile' ),
				),
				// Input.
				'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit]), .wpcf7 form textarea' => array(
					'--padding'       => kemet_responsive_spacing( $input_spacing, 'all', 'mobile' ),
					'--fontSize'      => kemet_responsive_slider( $input_font_size, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $input_line_height, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $input_letter_spacing, 'mobile' ),
				),
				// Sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'--borderRadius' => kemet_responsive_slider( $sidebar_input_border_radius, 'mobile' ),
				),
				'.content-area .read-more a'           => array(
					'border-radius' => kemet_responsive_slider( $readmore_border_radius, 'mobile' ),
					'border-width'  => kemet_responsive_slider( $readmore_border_size, 'mobile' ),
				),
				// Widget Spacing.
				'.sidebar-main .widget'                => array(
					'padding' => kemet_responsive_spacing( $space_widget, 'all', 'mobile' ),
				),
				// Button Typography.
				'button, .button, .kmt-button, input[type=button], input[type=reset] ,input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'--fontSize'      => kemet_responsive_slider( $btn_font_size, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $btn_line_height, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $btn_letter_spacing, 'mobile' ),
					'--padding'       => kemet_responsive_spacing( $btn_padding, 'all', 'mobile' ),
				),
				// post readmore spacing.
				'.content-area p.read-more a'          => array(
					'--padding' => kemet_responsive_spacing( $readmore_padding, 'all', 'mobile' ),
				),

				// Main Footer.
				'.kemet-footer button, .kemet-footer .button, .kemet-footer a.button, .kemet-footer a.button:hover, .kemet-footer .kmt-button,.kemet-footer .button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=button], .kemet-footer input[type=submit], .kemet-footer input[type=reset]' => array(
					'--buttonBorderRadius' => kemet_responsive_slider( $footer_button_border_radius, 'mobile' ),
					'--buttonBorderWidth'  => kemet_responsive_slider( $footer_button_border_width, 'mobile' ),
				),
				'.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a' => array(
					'--fontSize'      => kemet_responsive_slider( $archive_post_title_font_size, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $archive_post_title_line_height, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $archive_post_title_letter_spacing, 'mobile' ),
				),
				'.blog-posts-container .entry-meta , .blog-posts-container .entry-meta *, .category-blog .entry-meta *' => array(
					'--fontSize'      => kemet_responsive_slider( $archive_post_meta_font_size, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $archive_post_meta_line_height, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $archive_post_meta_letter_spacing, 'mobile' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h1_font_size, 'mobile', 30 ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h1_letter_spacing, 'mobile' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h2_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h2_letter_spacing, 'mobile' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h3_font_size, 'mobile', 20 ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h3_letter_spacing, 'mobile' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h4_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h4_letter_spacing, 'mobile' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h5_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h5_letter_spacing, 'mobile' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'--fontSize'      => kemet_responsive_slider( $heading_h6_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $heading_h6_letter_spacing, 'mobile' ),
				),
				'.kmt-single-post entry-header .entry-title, .page-title' => array(
					'--fontSize'      => kemet_responsive_slider( $single_post_title_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'mobile' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'--padding' => kemet_responsive_spacing( $footer_bar_spacing, 'all', 'mobile' ),
				),
				// Widget Font.
				'.widget .widget-head .widget-title , .widget-title' => array(
					'--fontSize'      => kemet_responsive_slider( $widget_title_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $widget_title_letter_spacing, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $widget_title_line_height, 'mobile' ),
				),
				/**
				 * Content Spacing Mobile
				 */
				'.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li' => array(
					'padding' => kemet_responsive_spacing( $container_inner_spacing, 'all', 'mobile' ),
				),
				'.comments-area .form-submit input[type="submit"]' => array(
					'--margin' => kemet_responsive_spacing( $comment_button_spacing, 'all', 'mobile' ),
				),
				'.site-content #primary'               => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'mobile' ),
				),
				// Sidebar Spacing.
				'div.sidebar-main'                     => array(
					'--padding' => kemet_responsive_spacing( $sidebar_padding, 'all', 'mobile' ),
				),
				'#secondary .sidebar-main'             => array(
					'--fontSize' => kemet_responsive_slider( $sidebar_content_font_size, 'mobile' ),
				),
				'.kemet-footer .kemet-footer-overlay ' => array(
					'--padding' => kemet_responsive_spacing( $space_footer, 'all', 'mobile' ),
				),

				// Footer Widget.
				'.kemet-footer .kemet-footer-widget'   => array(
					'--padding' => kemet_responsive_spacing( $kemet_footer_space_widget, 'all', 'mobile' ),
				),
				'.kemet-footer .widget , .kmt-footer-copyright .widget' => array(
					'--padding' => kemet_responsive_spacing( $footer_widget_padding, 'all', 'mobile' ),
				),
				'.kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title' => array(
					'--fontSize'      => kemet_responsive_slider( $kemet_footer_widget_title_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $kemet_footer_widget_title_letter_spacing, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $kemet_footer_wgt_title_line_height, 'mobile' ),
				),
				'.site-content .kmt-pagination'        => array(
					'--padding' => kemet_responsive_spacing( $pagination_padding, 'all', 'mobile' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( array_merge( $mobile_typo, $mobile_typography ), '', '544' );

			/*
			 *  Responsive Font Size for Tablet & Mobile to the root HTML element
			 */

			// Tablet Font Size for HTML tag.
			if ( '' == $body_font_size['tablet'] ) {
				$html_tablet_typography = array(
					'html' => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
				$parse_css             .= kemet_parse_css( $html_tablet_typography, '', '768' );
			}
			// Mobile Font Size for HTML tag.
			if ( '' == $body_font_size['mobile'] ) {
				$html_mobile_typography = array(
					'html' => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
			} else {
				$html_mobile_typography = array(
					'html' => array(
						'--fontSize' => kemet_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
					),
				);
			}
			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $html_mobile_typography, '', '544' );

			/* Site width Responsive */
			$site_width = array(
				'.kmt-container' => array(
					'max-width' => 'calc( var(--contentWidth) + 40px )',
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $site_width, '769' );

			/**
			 * Kemet Fonts
			 */
			if ( apply_filters( 'kemet_enable_default_fonts', true ) ) {
				$kemet_fonts  = '@font-face {';
				$kemet_fonts .= 'font-family: "Kemet-font";';
				$kemet_fonts .= 'src: url( ' . KEMET_THEME_URI . 'assets/fonts/kemet-font.woff) format("woff"),';
				$kemet_fonts .= 'url( ' . KEMET_THEME_URI . 'assets/fonts/kemet-font.ttf) format("truetype"),';
				$kemet_fonts .= 'url( ' . KEMET_THEME_URI . 'assets/fonts/kemet-font.svg#kemet) format("svg");';
				$kemet_fonts .= 'font-weight: normal;';
				$kemet_fonts .= 'font-style: normal;';
				$kemet_fonts .= '}';
				$parse_css   .= $kemet_fonts;
			}

			/* Blog */
			if ( 'custom' === $blog_width ) :

				/* Site width Responsive */
				$blog_css   = array(
					'.blog .site-content > .kmt-container, .archive .site-content > .kmt-container, .search .site-content > .kmt-container' => array(
						'max-width' => kemet_get_css_value( $blog_max_width, 'px' ),
					),
				);
				$parse_css .= kemet_parse_css( $blog_css, '769' );
			endif;

			/* Single Blog */
			if ( 'custom' === $single_post_max ) :

				/* Site width Responsive */
				$single_blog_css = array(
					'.single-post .site-content > .kmt-container' => array(
						'max-width' => kemet_get_css_value( $single_post_max_width, 'px' ),
					),
				);
				$parse_css      .= kemet_parse_css( $single_blog_css, '769' );
			endif;

			/* Small Footer CSS */
			if ( 'disabled' != $copyright_footer_layout ) :
				$sml_footer_css = array(
					'.kmt-footer-copyright' => array(
						'border-top-style' => 'solid',
						'border-top-width' => kemet_get_css_value( $copyright_footer_divider, 'px' ),
						'border-top-color' => esc_attr( $copyright_footer_divider_color ),
					),
				);
				$parse_css     .= kemet_parse_css( $sml_footer_css );

				if ( 'copyright-footer-layout-2' != $copyright_footer_layout ) {
					$sml_footer_css = array(
						'.kmt-footer-copyright-wrap' => array(
							'text-align' => 'center',
						),
					);
					$parse_css     .= kemet_parse_css( $sml_footer_css );
				}
			endif;

			/* 404 Page */
			$parse_css .= kemet_parse_css(
				array(
					'.kmt-404-layout .kmt-404-text' => array(
						'--fontSize' => kemet_get_font_css_value( 100 ),
					),
				),
				'',
				'920'
			);

			// Widget Title Border.
			$widget_title_border_size      = kemet_get_option( 'widget-title-border-size' );
			$widget_title_border_color     = kemet_get_sub_option( 'widget-title-border-color', 'initial', $global_border_color );
			$enable_widget_title_separator = kemet_get_option( 'enable-widget-title-separator' );

			if ( $enable_widget_title_separator ) {
				$widget_separator_style = array(
					'.widget .widget-head' => array(
						'--borderBottomStyle' => 'solid',
						'--borderBottomWidth' => kemet_get_css_value( $widget_title_border_size, 'px' ),
						'--borderBottomColor' => esc_attr( $widget_title_border_color ),
					),
				);
				$parse_css             .= kemet_parse_css( $widget_separator_style );
			}

			// Widget list Border.
			$widget_list_border       = kemet_get_option( 'enable-widget-list-separator' );
			$widget_list_border_color = kemet_get_sub_option( 'widget-list-border-color', 'initial', $global_border_color );
			if ( $widget_list_border ) {
				$widget_list_style = array(
					'.widget ul > li,.widget.yith-woocompare-widget ul.products-list li:not( .list_empty )' => array(
						'--borderBottomStyle' => esc_attr( 'solid' ),
						'--borderBottomWidth' => esc_attr( '1px' ),
						'--borderBottomColor' => esc_attr( $widget_list_border_color ),
					),
					'.widget_shopping_cart .total' => array(
						'border-color' => esc_attr( $widget_list_border_color ),
					),
				);
				$parse_css        .= kemet_parse_css( $widget_list_style );
			} else {
				$widget_list_style = array(
					'#secondary .widget_shopping_cart .total' => array(
						'border' => esc_attr( 'none' ),
					),
				);
				$parse_css        .= kemet_parse_css( $widget_list_style );
			}

			// Footer Widget List Border.
			$global_footer_text_color        = kemet_get_sub_option( 'global-footer-text-color', 'initial' );
			$footer_widget_list_border       = kemet_get_option( 'enable-footer-widget-list-separator' );
			$global_footer_bg_color          = kemet_get_sub_option( 'global-footer-bg-color', 'initial' );
			$footer_widget_list_border_color = kemet_get_option( 'footer-widget-list-border-color', kemet_color_brightness( $global_footer_bg_color, 0.9, 'light' ) );
			if ( $footer_widget_list_border ) {
				$widget_list_style = array(
					'.kemet-footer .widget ul > li , .kmt-footer-copyright .widget ul > li' => array(
						'--borderBottomStyle' => esc_attr( 'solid' ),
						'--borderBottomWidth' => esc_attr( '1px' ),
						'--borderBottomColor' => esc_attr( $footer_widget_list_border_color ),
					),
					'.kemet-footer .widget_shopping_cart .total, .kmt-footer-copyright .widget_shopping_cart .total' => array(
						'border-color' => esc_attr( $footer_widget_list_border_color ),
					),
				);
				$parse_css        .= kemet_parse_css( $widget_list_style );
			} elseif ( ! $footer_widget_list_border && $widget_list_border_color ) {
				$footer_widget_separator_style = array(
					'.kemet-footer .widget ul > li ,.kmt-footer-copyright .widget ul > li, .kemet-footer .widget_shopping_cart .total, .kmt-footer-copyright .widget_shopping_cart .total' => array(
						'border' => 'none',
					),
				);
				$parse_css                    .= kemet_parse_css( $footer_widget_separator_style );
			}

			// Footer Widget Title Border.
			$footer_widget_title_border_size      = kemet_get_option( 'footer-widget-title-border-size' );
			$footer_widget_title_border_color     = kemet_get_option( 'footer-wgt-title-separator-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_enable_widget_title_separator = kemet_get_option( 'enable-footer-widget-title-separator' );
			if ( $footer_enable_widget_title_separator ) {
				$footer_widget_separator_style = array(
					'.kemet-footer .widget .widget-head , .kmt-footer-copyright .widget .widget-head' => array(
						'--borderBottomStyle' => 'solid',
						'--borderBottomWidth' => kemet_get_css_value( $footer_widget_title_border_size, 'px' ),
						'--borderBottomColor' => esc_attr( $footer_widget_title_border_color ),
					),
				);
				$parse_css                    .= kemet_parse_css( $footer_widget_separator_style );
			} elseif ( ! $footer_enable_widget_title_separator && $enable_widget_title_separator ) {
				$footer_widget_separator_style = array(
					'.kemet-footer .widget .widget-head , .kmt-footer-copyright .widget .widget-head' => array(
						'border' => 'none',
					),
				);
				$parse_css                    .= kemet_parse_css( $footer_widget_separator_style );
			}

			$dynamic_css = $parse_css;
			$custom_css  = kemet_get_option( 'custom-css' );

			if ( '' != $custom_css ) {
				$dynamic_css .= $custom_css;
			}

			// trim white space for faster page loading.
			$dynamic_css = Kemet_Enqueue_Scripts::trim_css( $dynamic_css );

			return $dynamic_css;
		}

		/**
		 * Return post meta CSS
		 *
		 * @param  boolean $return_css Return the CSS.
		 * @return mixed              Return on print the CSS.
		 */
		public static function return_meta_output( $return_css = false ) {
			$parse_css = '';
			/**
			 * - Page Layout
			 *
			 *   - Sidebar Positions CSS
			 */
			$secondary_width = kemet_get_option( 'site-sidebar-width' );
			$primary_width   = absint( 100 - $secondary_width );
			$meta_style      = '';

			if ( 'no-sidebar' !== kemet_layout() ) :

				$meta_style = array(
					'#primary'   => array(
						'width' => kemet_get_css_value( $primary_width, '%' ),
					),
					'#secondary' => array(
						'width' => kemet_get_css_value( $secondary_width, '%' ),
					),
				);

				$parse_css .= kemet_parse_css( $meta_style, '769' );

			endif;

			// Gutenberg Compat.
			$container_layout = kemet_get_option( 'site-content-layout' );
			if ( 'content-boxed-container' == $container_layout || 'boxed-container' == $container_layout ) {
				$parse_css .= kemet_parse_css(
					array(
						'.kmt-separate-container.kmt-right-sidebar .entry-content .wp-block-image.alignfull,.kmt-separate-container.kmt-left-sidebar .entry-content .wp-block-image.alignfull,.kmt-separate-container.kmt-right-sidebar .entry-content .wp-block-cover.alignfull,.kmt-separate-container.kmt-left-sidebar .entry-content .wp-block-cover.alignfull' => array(
							'margin-left'  => '-6.67em',
							'margin-right' => '-6.67em',
							'max-width'    => 'unset',
							'width'        => 'unset',
						),
						'.kmt-separate-container.kmt-right-sidebar .entry-content .wp-block-image.alignwide,.kmt-separate-container.kmt-left-sidebar .entry-content .wp-block-image.alignwide,.kmt-separate-container.kmt-right-sidebar .entry-content .wp-block-cover.alignwide,.kmt-separate-container.kmt-left-sidebar .entry-content .wp-block-cover.alignwide' => array(
							'margin-left'  => '-20px',
							'margin-right' => '-20px',
							'max-width'    => 'unset',
							'width'        => 'unset',
						),
					),
					'1200'
				);
			}

			$gtn_full_wide_image_css = array(
				'.wp-block-group .has-background' => array(
					'padding' => '20px',
				),
			);
			$parse_css              .= kemet_parse_css( $gtn_full_wide_image_css, '1200' );

			if ( 'no-sidebar' !== kemet_layout() ) {
				switch ( $container_layout ) {
					case 'content-boxed-container':
					case 'boxed-container':
						$parse_css .= kemet_parse_css(
							array(
								// With container - Sidebar.
								'.kmt-separate-container.kmt-right-sidebar .entry-content .wp-block-group.alignwide, .kmt-separate-container.kmt-left-sidebar .entry-content .wp-block-group.alignwide, .kmt-separate-container.kmt-right-sidebar .entry-content .wp-block-cover.alignwide, .kmt-separate-container.kmt-left-sidebar .entry-content .wp-block-cover.alignwide' => array(
									'margin-left'   => '-20px',
									'margin-right'  => '-20px',
									'padding-left'  => '20px',
									'padding-right' => '20px',
								),
								'.kmt-separate-container.kmt-right-sidebar .entry-content .alignfull, .kmt-separate-container.kmt-left-sidebar .entry-content .alignfull, .kmt-separate-container.kmt-right-sidebar .entry-content .wp-block-cover.alignfull, .kmt-separate-container.kmt-left-sidebar .entry-content .wp-block-cover.alignfull' => array(
									'margin-left'   => '-6.67em',
									'margin-right'  => '-6.67em',
									'padding-left'  => '6.67em',
									'padding-right' => '6.67em',
								),
							),
							'1200'
						);
						break;

					case 'plain-container':
						$parse_css .= kemet_parse_css(
							array(
								// Without container - Sidebar.
								'.kmt-plain-container.kmt-right-sidebar .entry-content .wp-block-group.alignwide, .kmt-plain-container.kmt-left-sidebar .entry-content .wp-block-groups.alignwide, .kmt-plain-container.kmt-right-sidebar .entry-content .wp-block-group.alignfull, .kmt-plain-container.kmt-left-sidebar .entry-content .wp-block-group.alignfull' => array(
									'padding-left'  => '20px',
									'padding-right' => '20px',
								),
							),
							'1200'
						);
						break;

					case 'page-builder':
						$parse_css .= kemet_parse_css(
							array(
								'.kmt-page-builder-template.kmt-left-sidebar .entry-content .wp-block-cover.alignwide, .kmt-page-builder-template.kmt-right-sidebar .entry-content .wp-block-cover.alignwide, .kmt-page-builder-template.kmt-left-sidebar .entry-content .wp-block-cover.alignfull, .kmt-page-builder-template.kmt-right-sidebar .entry-content .wp-block-cover.alignful' => array(
									'padding-right' => '0',
									'padding-left'  => '0',
								),
							),
							'1200'
						);
						break;
				}
			}
			$parse_css .= kemet_parse_css(
				array(
					'.wp-block-cover-image.alignwide .wp-block-cover__inner-container, .wp-block-cover.alignwide .wp-block-cover__inner-container, .wp-block-cover-image.alignfull .wp-block-cover__inner-container, .wp-block-cover.alignfull .wp-block-cover__inner-container' => array(
						'width' => '100%',
					),
				),
				'1200'
			);

			$dynamic_css = $parse_css;
			if ( false != $return_css ) {
				return $dynamic_css;
			}

			wp_add_inline_style( 'kemet-theme-css', $dynamic_css );
		}
	}
}
