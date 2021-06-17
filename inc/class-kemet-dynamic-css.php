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
			$theme_color              = kemet_get_option( 'theme-color' );
			$headings_links_color     = kemet_get_option( 'headings-links-color' );
			$text_meta_color          = kemet_get_option( 'text-meta-color' );
			$global_border_color      = kemet_get_option( 'global-border-color' );
			$global_bg_color          = kemet_get_option( 'global-background-color' );
			$global_footer_text_color = kemet_get_option( 'global-footer-text-color' );
			$global_footer_bg_color   = kemet_get_option( 'global-footer-bg-color' );

			$site_content_width    = kemet_get_option( 'site-content-width', 1200 );
			$header_logo_width     = kemet_get_option( 'kmt-header-responsive-logo-width' );
			$site_identity_spacing = kemet_get_option( 'site-identity-spacing' );

			// Site Background Color.
			$box_bg_obj = kemet_get_option( 'site-layout-outside-bg-obj', array( 'background-color' => $global_bg_color ) );

			// Input Options.
			$input_font_size      = kemet_get_option( 'inputs-font-size' );
			$input_font_family    = kemet_get_option( 'inputs-font-family' );
			$input_font_weight    = kemet_get_option( 'inputs-font-weight' );
			$input_text_tranform  = kemet_get_option( 'inputs-text-transform' );
			$input_font_style     = kemet_get_option( 'inputs-font-style' );
			$input_line_height    = kemet_get_option( 'inputs-line-height' );
			$input_letter_spacing = kemet_get_option( 'inputs-letter-spacing' );
			$input_bg_color       = kemet_get_option( 'input-bg-color', kemet_color_brightness( $global_bg_color, 0.99, 'dark' ) );
			$input_text_color     = kemet_get_option( 'input-text-color' );
			$input_border_radius  = kemet_get_option( 'input-radius' );
			$input_border_size    = kemet_get_option( 'input-border-size' );
			$input_border_color   = kemet_get_option( 'input-border-color', $global_border_color );
			$input_label_color    = kemet_get_option( 'input-label-color' );
			$input_spacing        = kemet_get_option( 'input-spacing' );

			// Boxed inner Options.
			$box_bg_inner_boxed             = kemet_get_option( 'site-boxed-inner-bg', array( 'background-color' => kemet_color_brightness( $global_bg_color, 0.97, 'dark' ) ) );
			$container_inner_spacing        = kemet_get_option( 'container-inner-spacing' );
			$content_padding                = apply_filters( 'kemet_content_padding', kemet_get_option( 'content-padding' ) );
			$single_content_separator_color = kemet_get_option( 'content-separator-color', kemet_color_brightness( $global_border_color, 0.955, 'dark' ) );

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
			$site_title_font_size              = kemet_get_option( 'site-title-font-size' );
			$site_title_color                  = kemet_get_option( 'site-title-color' );
			$site_title_h_color                = kemet_get_option( 'site-title-h-color' );
			$tagline_color                     = kemet_get_option( 'tagline-color' );
			$site_tagline_font_size            = kemet_get_option( 'font-size-site-tagline' );
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
			$sidebar_input_border_color  = kemet_get_option( 'sidebar-input-border-color', $global_border_color );
			$sidebar_input_border_radius = kemet_get_option( 'sidebar-input-border-radius' );
			$sidebar_input_border_size   = kemet_get_option( 'sidebar-input-border-size' );

			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = kemet_get_option( 'button-color', '#ffffff' );

			// sidebar.
			$sidebar_bg_obj            = kemet_get_option( 'sidebar-bg-obj' );
			$sidebar_padding           = kemet_get_option( 'sidebar-padding' );
			$sidebar_text_color        = kemet_get_option( 'sidebar-text-color' );
			$sidebar_link_color        = kemet_get_option( 'sidebar-link-color' );
			$sidebar_link_h_color      = kemet_get_option( 'sidebar-link-h-color' );
			$widget_bg_color           = kemet_get_option( 'widget-bg-color' );
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
			$widget_title_color          = kemet_get_option( 'widget-title-color' );

			/**
			 * Apply text hover color depends on link hover color
			 */
			$btn_text_hover_color = kemet_get_option( 'button-h-color' );
			$btn_bg_color         = kemet_get_option( 'button-bg-color', $theme_color );
			$btn_border_size      = kemet_get_option( 'btn-border-size' );
			$btn_border_color     = kemet_get_option( 'btn-border-color' );
			$btn_border_h_color   = kemet_get_option( 'btn-border-h-color' );
			$btn_bg_hover_color   = kemet_get_option( 'button-bg-h-color', kemet_color_brightness( $theme_color, 0.8, 'dark' ) );

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

			// Search Style.
			$search_input_bg_color = kemet_get_option( 'search-input-bg-color', $global_bg_color );
			$search_input_color    = kemet_get_option( 'search-input-color' );
			$search_border_color   = kemet_get_option( 'search-border-color', $global_border_color );
			$search_btn_bg_color   = kemet_get_option( 'search-btn-bg-color' );
			$search_btn_h_bg_color = kemet_get_option( 'search-btn-h-bg-color' );
			$search_btn_color      = kemet_get_option( 'search-btn-color' );
			$search_border_size    = kemet_get_option( 'search-border-size' );
			$css_output            = array();
			// Body Font Family.
			$body_font_family = kemet_body_font_family();
			$body_font_weight = kemet_get_option( 'body-font-weight' );

			if ( is_array( $body_font_size ) ) {
				$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
			} else {
				$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
			}
			// Letter Spacing.
			$site_title_letter_spacing = kemet_get_option( 'site-title-letter-spacing' );
			$tagline_letter_spacing    = kemet_get_option( 'tagline-letter-spacing' );

			$css_output = array(
				// Gutenberg Support.
				'.kmt-single-post .has-global-color'       => array(
					'color' => esc_attr( $theme_color ),
				),
				'.kmt-single-post .wp-block-separator'     => array(
					'border-color'     => esc_attr( $global_border_color ),
					'background-color' => esc_attr( $global_border_color ),
				),
				'.kmt-single-post .has-global-border-color' => array(
					'color' => esc_attr( $global_border_color ),
				),
				'.kmt-single-post .has-text-meta-color'    => array(
					'color' => esc_attr( $text_meta_color ),
				),
				'.kmt-single-post .has-global-bg-color'    => array(
					'background-color' => esc_attr( $global_bg_color ),
				),
				'.kmt-single-post .has-headings-links-color , .kmt-single-post .wp-block-cover-image-text a, .kmt-single-post .wp-block-cover-text a, .kmt-single-post section.wp-block-cover-image h2 a, .kmt-single-post section.wp-block-cover-image h2 a:active, .kmt-single-post section.wp-block-cover-image h2 a:focus, section.wp-block-cover-image h2 a:hover' => array(
					'color' => esc_attr( $headings_links_color ),
				),
				'.kmt-single-post .wp-block-cover-text a:hover, .kmt-single-post .wp-block-cover-text a:active, .kmt-single-post .wp-block-cover-image-text a:active, .kmt-single-post .wp-block-cover-image-text a:focus, .kmt-single-post .wp-block-cover-image-text a:hover' => array(
					'color' => esc_attr( $theme_color ),
				),
				'.wp-block-cover .wp-block-cover-text:not(.has-text-color)' => array(
					'color' => esc_attr( '#fff' ),
				),
				'.kmt-single-post .has-global-background-color' => array(
					'background-color' => esc_attr( $theme_color ),
				),
				'.kmt-single-post .has-headings-links-background-color' => array(
					'background-color' => esc_attr( $headings_links_color ),
				),
				'.kmt-single-post .has-text-meta-background-color' => array(
					'background-color' => esc_attr( $text_meta_color ),
				),
				'.kmt-single-post .has-global-border-background-color' => array(
					'background-color' => esc_attr( $global_border_color ),
				),
				'.kmt-single-post .has-global-bg-background-color' => array(
					'background-color' => esc_attr( $global_bg_color ),
				),
				'code'                                     => array(
					'background-color' => kemet_color_brightness( $global_bg_color, 0.94, 'dark' ),
				),
				'.wp-block-code code'                      => array(
					'color' => esc_attr( $text_meta_color ),
				),
				'.kmt-single-post .wp-block-table td, .kmt-single-post .wp-block-table th' => array(
					'border-color' => esc_attr( $global_border_color ),
				),
				'.wp-block:not([data-align="wide"]):not([data-align="full"]), .wp-block:not([data-align="wide"]):not([data-align="full"]) > * ' => array(
					'max-width' => kemet_get_css_value( $site_content_width + 40, 'px' ),
				),
				// HTML.
				'html'                                     => array(
					'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				'a, .page-title'                           => array(
					'color' => esc_attr( $headings_links_color ),
				),
				'a:not(.button):hover, a:not(.button):focus , .widget_search .search-form:hover:after' => array(
					'color' => esc_attr( $theme_color ),
				),
				'body, button, input, select, textarea, .button, a.wp-block-button__link' => array(
					'font-family'    => kemet_get_font_family( $body_font_family ),
					'font-weight'    => esc_attr( $body_font_weight ),
					'font-size'      => kemet_responsive_slider( $body_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $body_letter_spacing, 'desktop' ),
					'line-height'    => kemet_responsive_slider( $body_line_height, 'desktop' ),
					'text-transform' => esc_attr( $body_text_transform ),
					'font-style'     => esc_attr( $body_font_style ),
				),
				'p, .entry-content p'                      => array(
					'margin-bottom' => kemet_get_css_value( $para_margin_bottom, 'em' ),
				),
				'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a' => array(
					'font-family'    => kemet_get_css_value( $headings_font_family, 'font' ),
					'font-weight'    => kemet_get_css_value( $headings_font_weight, 'font' ),
					'text-transform' => esc_attr( $headings_text_transform ),
				),
				'figcaption'                               => array(
					'color' => esc_attr( kemet_color_brightness( $text_meta_color, 0.88, 'light' ) ),
				),
				'.site-title'                              => array(
					'font-size' => kemet_responsive_slider( $site_title_font_size, 'desktop' ),
				),
				'.site-title a'                            => array(
					'color'          => esc_attr( $site_title_color ),
					'letter-spacing' => kemet_responsive_slider( $site_title_letter_spacing, 'desktop' ),
				),
				'.site-title a:hover'                      => array(
					'color' => esc_attr( $site_title_h_color ),
				),
				'#sitehead .site-logo-img .custom-logo-link img' => array(
					'max-width' => kemet_responsive_slider( $header_logo_width, 'desktop' ),
				),
				'.kemet-logo-svg'                          => array(
					'width' => kemet_responsive_slider( $header_logo_width, 'desktop' ),
				),
				/* Site Identity Spacing */
				'#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity' => array(
					'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'desktop' ),
				),
				'.site-header .site-description'           => array(
					'color'          => esc_attr( $tagline_color ),
					'font-size'      => kemet_responsive_slider( $site_tagline_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $tagline_letter_spacing, 'desktop' ),
				),
				'.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a' => array(
					'font-size'      => kemet_responsive_slider( $archive_post_title_font_size, 'desktop' ),
					'font-family'    => kemet_get_font_family( $archive_post_title_font_family ),
					'font-weight'    => kemet_get_css_value( $archive_post_title_font_weight, 'font' ),
					'line-height'    => kemet_responsive_slider( $archive_post_title_line_height, 'desktop' ),
					'text-transform' => esc_attr( $archive_post_title_text_transform ),
					'font-style'     => esc_attr( $archive_post_title_font_style ),
					'letter-spacing' => kemet_responsive_slider( $archive_post_title_letter_spacing, 'desktop' ),
				),
				'.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *' => array(
					'font-size'      => kemet_responsive_slider( $archive_post_meta_font_size, 'desktop' ),
					'font-family'    => kemet_get_font_family( $archive_post_meta_font_family ),
					'font-weight'    => kemet_get_css_value( $archive_post_meta_font_weight, 'font' ),
					'line-height'    => kemet_responsive_slider( $archive_post_meta_line_height, 'desktop' ),
					'text-transform' => esc_attr( $archive_post_meta_text_transform ),
					'font-style'     => esc_attr( $archive_post_meta_font_style ),
					'letter-spacing' => kemet_responsive_slider( $archive_post_meta_letter_spacing, 'desktop' ),
					'color'          => esc_attr( $meta_color ),
				),
				'.comment-reply-title'                     => array(
					'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 1.66666 ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'font-size'      => kemet_responsive_slider( $body_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $body_letter_spacing, 'desktop' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h1_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h1_letter_spacing, 'desktop' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h2_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h2_letter_spacing, 'desktop' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h3_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h3_letter_spacing, 'desktop' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h4_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h4_letter_spacing, 'desktop' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h5_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h5_letter_spacing, 'desktop' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h6_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h6_letter_spacing, 'desktop' ),
				),
				'.kmt-single-post .entry-header .entry-title' => array(
					'font-size'      => kemet_responsive_slider( $single_post_title_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'desktop' ),
					'color'          => esc_attr( $single_post_title_font_color ),
				),
				'.kmt-single-post  .entry-meta,.kmt-single-post .entry-meta *' => array(
					'color' => esc_attr( $single_post_meta_color ),
				),
				'.comments-area .form-submit input[type="submit"]' => array(
					'margin-top'    => kemet_responsive_spacing( $comment_button_spacing, 'top', 'desktop' ),
					'margin-right'  => kemet_responsive_spacing( $comment_button_spacing, 'right', 'desktop' ),
					'margin-bottom' => kemet_responsive_spacing( $comment_button_spacing, 'bottom', 'desktop' ),
					'margin-left'   => kemet_responsive_spacing( $comment_button_spacing, 'left', 'desktop' ),
				),
				// Global CSS.
				'::selection'                              => array(
					'background-color' => esc_attr( $theme_color ),
					'color'            => esc_attr( $highlight_theme_color ),
				),
				'h1, .entry-content h1, h2, .entry-content h2, h3, .entry-content h3, h4, .entry-content h4, h5, .entry-content h5, h6, .entry-content h6' => array(
					'color' => esc_attr( $headings_links_color ),
				),
				'body'                                     => array(
					'color' => esc_attr( $text_meta_color ),
				),
				// Input.
				'input, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .widget_search .search-field, .widget_search .search-field:focus, .kmt-single-post .wpcf7 input:not([type=submit]), .kmt-single-post .wpcf7 input:not([type=submit]):focus, .kmt-single-post .wpcf7 select:focus, .kmt-single-post .wpcf7 textarea:focus' => array(
					'color'            => esc_attr( $text_meta_color ),
					'background-color' => esc_attr( $input_bg_color ),
					'border-color'     => esc_attr( $input_border_color ),
					'border-radius'    => kemet_responsive_slider( $input_border_radius, 'desktop' ),
					'border-width'     => kemet_responsive_slider( $input_border_size, 'desktop' ),
					'padding-top'      => kemet_responsive_spacing( $input_spacing, 'top', 'desktop' ),
					'padding-bottom'   => kemet_responsive_spacing( $input_spacing, 'bottom', 'desktop' ),
					'padding-right'    => kemet_responsive_spacing( $input_spacing, 'right', 'desktop' ),
					'padding-left'     => kemet_responsive_spacing( $input_spacing, 'left', 'desktop' ),
					'font-size'        => kemet_responsive_slider( $input_font_size, 'desktop' ),
					'font-family'      => kemet_get_font_family( $input_font_family ),
					'font-weight'      => esc_attr( $input_font_weight ),
					'text-transform'   => esc_attr( $input_text_tranform ),
					'font-style'       => esc_attr( $input_font_style ),
					'line-height'      => kemet_responsive_slider( $input_line_height, 'desktop' ),
					'letter-spacing'   => kemet_responsive_slider( $input_letter_spacing, 'desktop' ),
				),
				'form label'                               => array(
					'color' => esc_attr( $input_label_color ),
				),
				// Typography.
				'.widget_product_tag_cloud .tagcloud a, .widget_tag_cloud .tagcloud a' => array(
					'border-color' => esc_attr( $global_border_color ),
				),

				'.kmt-footer .widget_tag_cloud .tagcloud a , .kmt-footer-copyright .widget_tag_cloud .widget_product_tag_cloud a' => array(
					'border-color' => esc_attr( kemet_color_brightness( $global_footer_bg_color, 0.9, 'light' ) ),
				),

				// Header - Main Header CSS.
				'.kmt-header-custom-item a'                => array(
					'color' => esc_attr( $headings_links_color ),
				),
				'.main-header-menu > li.menu-item > a, .main-header-menu > li.page_item > a' => array(
					'border-bottom-width' => kemet_get_css_value( $menu_link_border_bottom, 'px' ),
				),
				'.main-header-bar, .header-main-layout-4 .main-header-container.logo-menu-icon' => array(
					'border-bottom-width' => kemet_responsive_slider( $header_separator, 'desktop' ),
				),
				// Main - Menu Items.
				'.main-header-menu li:hover > a, .main-header-menu li:hover > .kmt-menu-toggle, .main-header-menu .kmt-sitehead-custom-menu-items a:not(.button):hover, .main-header-menu .current-menu-item > a, .main-header-menu .current-menu-ancestor > a, .main-header-menu .current_page_item > a' => array(
					'color' => esc_attr( $headings_links_color ),
				),
				// Mobile Menu Color.
				'.kmt-mobile-menu-buttons .menu-toggle .menu-toggle-icon ' => array(
					'color' => esc_attr( $mobile_menu_icon_color ),
				),
				'.kmt-mobile-menu-buttons .menu-toggle'    => array(
					'background-color' => esc_attr( $mobile_menu_icon_bg_color ),
				),
				'.kmt-mobile-menu-buttons .menu-toggle:hover, .kmt-mobile-menu-buttons .menu-toggle.toggled' => array(
					'background-color' => esc_attr( $mobile_menu_icon_bg_h_color ),
				),
				'.kmt-mobile-menu-buttons .menu-toggle:hover .menu-toggle-icon, .kmt-mobile-menu-buttons .menu-toggle.toggled .menu-toggle-icon' => array(
					'color' => esc_attr( $mobile_menu_icon_h_color ),
				),
				'.kmt-header-break-point .kmt-main-header-bar-alignment .main-header-menu a:not(.button), .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul li a ,.kmt-header-break-point .kmt-main-header-bar-alignment .main-header-menu .sub-menu li a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul.children li a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul.sub-menu li a' => array(
					'border-color'        => esc_attr( $mobile_menu_items_border_color ),
					'border-bottom-width' => kemet_get_css_value( $mobile_menu_items_border_size, 'px' ),
				),

				'input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb' => array(
					'border-color'     => esc_attr( $headings_links_color ),
					'background-color' => esc_attr( $headings_links_color ),
					'box-shadow'       => 'none',
				),
				// header menu.
				'.main-header-menu , .toggle-on .main-header-menu , .toggle-on .main-header-menu ul.sub-menu' => array(
					'background-color' => kemet_responsive_color( $menu_bg_color, 'desktop' ),
				),
				'.main-navigation ul.main-header-menu '    => array(
					'padding-top'    => kemet_responsive_spacing( $main_menu_spacing, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $main_menu_spacing, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $main_menu_spacing, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $main_menu_spacing, 'left', 'desktop' ),
				),
				'.main-header-menu li > a , .kmt-header-break-point .main-navigation ul li > a' => array(
					'color'          => kemet_responsive_color( $menu_link_color, 'desktop' ),
					'font-family'    => kemet_get_font_family( $menu_font_family ),
					'font-weight'    => esc_attr( $menu_font_weight ),
					'text-transform' => esc_attr( $menu_text_transform ),
					'font-style'     => esc_attr( $menu_font_style ),
					'font-size'      => kemet_responsive_slider( $menu_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $menu_letter_spacing, 'desktop' ),
					'padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'desktop' ),
				),
				'.site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)' => array(
					'color'          => kemet_responsive_color( $menu_link_color, 'desktop' ),
					'font-family'    => kemet_responsive_slider( $last_menu_font_family ),
					'font-weight'    => esc_attr( $last_menu_font_weight ),
					'text-transform' => esc_attr( $last_menu_text_transform ),
					'font-style'     => esc_attr( $last_menu_font_style ),
					'font-size'      => kemet_responsive_slider( $last_menu_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $last_menu_letter_spacing, 'desktop' ),
					'line-height'    => kemet_responsive_slider( $last_menu_line_height, 'desktop' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle' => array(
					'color' => kemet_responsive_color( $menu_link_color, 'desktop' ),
				),
				'.kmt-sitehead-custom-menu-items .kmt-search-icon .kemet-search-icon' => array(
					'color' => kemet_responsive_color( $menu_link_color, 'desktop' ),
				),
				'.kmt-sitehead-custom-menu-items .kmt-search-icon .kemet-search-icon:hover' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'desktop' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle::before, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle::before' => array(
					'font-size' => kemet_responsive_slider( $menu_font_size, 'desktop' ),
				),
				'.main-header-menu > .menu-item > a, .main-header-menu > .menu-item, .main-header-menu > .page_item > a, .main-header-menu > .page_item' => array(
					'line-height' => kemet_responsive_slider( $menu_line_height, 'desktop' ),
				),
				'.site-header .main-header-menu > .menu-item:hover > a,.site-header .main-header-menu > .page_item:hover > a' => array(
					'border-bottom-color' => esc_attr( $menu_link_bottom_border_color ),
				),
				'.main-header-menu li:hover > a, .main-header-menu .kmt-sitehead-custom-menu-items a:not(.button):hover , .kmt-header-break-point .main-navigation ul li:hover > a' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'desktop' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children:hover>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children:hover>.kmt-menu-toggle' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'desktop' ),
				),
				' .main-header-menu li.current-menu-item a, .main-header-menu li.current_page_item a, .main-header-menu .current-menu-ancestor > a' => array(
					'color'            => esc_attr( $menu_link_active_color ),
					'background-color' => esc_attr( $menu_link_active_bg_color ),
					'border-radius'    => kemet_responsive_slider( $menu_link_active_radius, 'desktop' ),
				),
				'.site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *' => array(
					'padding-top'    => kemet_responsive_spacing( $last_menu_items_spacing, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $last_menu_items_spacing, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $last_menu_items_spacing, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $last_menu_items_spacing, 'left', 'desktop' ),
				),
				// submenu.
				'.main-header-menu ul.sub-menu'            => array(
					'border-top-width' => kemet_get_css_value( $submenu_top_border_size, 'px' ),
					'border-top-color' => esc_attr( $submenu_top_border_color ),
				),
				'.main-header-menu ul.sub-menu li'         => array(
					'background-color' => esc_attr( $submenu_bg_color ),
				),
				'.main-header-menu ul.sub-menu li:hover'   => array(
					'background-color' => esc_attr( $submenu_bg_hover_color ),
				),
				'.main-header-menu ul.sub-menu li.menu-item-has-children:hover > ul, .main-header-menu ul.children li.page_item_has_children:hover > ul' => array(
					'top' => kemet_get_css_value( '-' . $submenu_top_border_size, 'px' ),
				),

				'.main-header-menu .sub-menu a , .main-header-menu .children a' => array(
					'border-bottom-width' => ( true == $display_submenu_border ) ? '1px' : '0px',
					'border-style'        => 'solid',
					'border-bottom-color' => esc_attr( $submenu_border_color ),
				),

				'.main-header-menu .sub-menu li a , .kmt-header-break-point .main-navigation ul.children li a' => array(
					'color'          => esc_attr( $submenu_link_color ),
					'font-family'    => kemet_get_font_family( $sub_menu_font_family ),
					'font-weight'    => esc_attr( $sub_menu_font_weight ),
					'text-transform' => esc_attr( $sub_menu_text_transform ),
					'font-style'     => esc_attr( $sub_menu_font_style ),
					'line-height'    => kemet_responsive_slider( $sub_menu_line_height, 'desktop' ),
					'font-size'      => kemet_responsive_slider( $submenu_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $submenu_letter_spacing, 'desktop' ),
					'padding-top'    => kemet_responsive_spacing( $submenu_link_spacing, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $submenu_link_spacing, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $submenu_link_spacing, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $submenu_link_spacing, 'left', 'desktop' ),
				),
				'body:not(.kmt-header-break-point) .main-header-menu ul.sub-menu' => array(
					'width' => kemet_get_css_value( $sub_menu_width, 'px' ),
				),
				'body:not(.kmt-header-break-point).rtl .main-header-menu li:hover li:hover > ul.sub-menu' => array(
					'right' => kemet_get_css_value( $sub_menu_width, 'px' ),
				),
				'.main-header-menu .sub-menu li:hover > a' => array(
					'color' => esc_attr( $submenu_link_h_color ),
				),

				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => esc_attr( $headings_links_color ),
					'border-color' => esc_attr( $headings_links_color ),
				),

				'.kmt-footer-copyright'                    => array(
					'color'          => esc_attr( $footer_color ),
					'font-size'      => kemet_responsive_slider( $footer_sml_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $footer_sml_letter_spacing, 'desktop' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'padding-top'    => kemet_responsive_spacing( $footer_bar_spacing, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_bar_spacing, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $footer_bar_spacing, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $footer_bar_spacing, 'left', 'desktop' ),
				),
				'.kmt-footer-copyright a'                  => array(
					'color' => esc_attr( $footer_link_color ),
				),
				'.kmt-footer-copyright a:hover'            => array(
					'color' => esc_attr( $footer_link_h_color ),
				),

				// main Fotter styling/colors/fonts.
				'.kemet-footer .widget-title,.kemet-footer .widget-head .widget-title,.kemet-footer .widget-head .widget-title a , .kmt-footer-copyright .widget-head .widget-title,.kmt-footer-copyright .widget-head .widget-title a' => array(
					'color' => esc_attr( $kemet_footer_widget_title_color ),
				),
				'.site-footer'                             => array(
					'color' => esc_attr( $kemet_footer_text_color ),
				),

				'.kemet-footer .post-date'                 => array(
					'color' => esc_attr( $kemet_footer_widget_meta_color ),
				),

				'.kemet-footer button, .kemet-footer .button, .kemet-footer a.button, .kemet-footer a.button:hover, .kemet-footer .kmt-button,.kemet-footer .button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=button], .kemet-footer input[type=submit], .kemet-footer input[type=reset]' => array(
					'color'            => esc_attr( $footer_button_color ),
					'background-color' => esc_attr( $footer_button_bg_color ),
					'border-color'     => esc_attr( $footer_button_border_color ),
					'border-radius'    => kemet_responsive_slider( $footer_button_border_radius, 'desktop' ),
					'border-width'     => kemet_responsive_slider( $footer_button_border_width, 'desktop' ),
				),

				'.kemet-footer'                            => array(
					'font-size'      => kemet_responsive_slider( $footer_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $footer_letter_spacing, 'desktop' ),
					'font-family'    => kemet_get_font_family( $footer_font_family ),
					'font-weight'    => esc_attr( $footer_font_weight ),
					'text-transform' => esc_attr( $footer_text_transform ),
					'font-style'     => esc_attr( $footer_font_style ),
					'line-height'    => kemet_responsive_slider( $footer_line_height, 'desktop' ),
				),

				'.kemet-footer button:focus, .kemet-footer button:hover, .kemet-footer .kmt-button:hover, .kemet-footer .button:hover, .kemet-footer a.button:hover, .kemet-footer input[type=reset]:hover, .kemet-footer input[type=reset]:focus, .kemet-footer input#submit:hover, .kemet-footer input#submit:focus, .kemet-footer input[type="button"]:hover, .kemet-footer input[type="button"]:focus, .kemet-footer input[type="submit"]:hover, .kemet-footer input[type="submit"]:focus' => array(
					'color'            => esc_attr( $footer_button_hover_color ),
					'background-color' => esc_attr( $footer_button_bg_h_color ),
					'border-color'     => esc_attr( $footer_button_border_h_color ),
				),
				// header spacing.
				'.site-header:not(.kmt-is-sticky) .main-header-bar' => array(
					'padding-top'    => kemet_responsive_spacing( $space_header, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $space_header, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $space_header, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $space_header, 'left', 'desktop' ),
				),

				'.kemet-footer .kemet-footer-overlay'      => array(
					'padding-top'    => kemet_responsive_spacing( $space_footer, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $space_footer, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $space_footer, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $space_footer, 'left', 'desktop' ),
				),

				'.kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title' => array(
					'font-size'      => kemet_responsive_slider( $kemet_footer_widget_title_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $kemet_footer_widget_title_letter_spacing, 'desktop' ),
					'font-family'    => kemet_get_font_family( $kemet_footer_wgt_title_font_family ),
					'font-weight'    => esc_attr( $kemet_footer_wgt_title_font_weight ),
					'text-transform' => esc_attr( $kemet_footer_wgt_title_text_transform ),
					'font-style'     => esc_attr( $kemet_footer_wgt_title_font_style ),
					'line-height'    => kemet_responsive_slider( $kemet_footer_wgt_title_line_height, 'desktop' ),
				),

				'.kemet-footer a'                          => array(
					'color' => esc_attr( $kemet_footer_link_color ),
				),

				'.kemet-footer a:hover, .kemet-footer .no-widget-text a:hover, .kemet-footer a:focus, .kemet-footer .no-widget-text a:focus' => array(
					'color' => esc_attr( $kemet_footer_link_h_color ),
				),
				'.kemet-footer .calendar_wrap #today, .kemet-footer a:hover + .post-count' => array(
					'background-color' => esc_attr( $kemet_footer_link_color ),
				),

				'.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea,.kmt-single-post .kemet-footer .wpcf7 input:not([type=submit]),.kmt-single-post .kemet-footer .wpcf7 input:not([type=submit]):focus,.kmt-single-post .kemet-footer .wpcf7 select:focus,.kmt-single-post .kemet-footer .wpcf7 textarea:focus, .kemet-footer .widget_search .search-field, .kemet-footer .widget_search .search-field:focus' => array(
					'color'          => esc_attr( $footer_input_color ),
					'background'     => esc_attr( $footer_input_bg_color ),
					'border-color'   => esc_attr( $footer_input_border_color ),
					'border-width'   => kemet_responsive_slider( $footer_input_border_size, 'desktop' ),
					'border-radius'  => kemet_responsive_slider( $footer_input_border_radius, 'desktop' ),
					'padding-top'    => kemet_responsive_spacing( $footer_input_padding, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_input_padding, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $footer_input_padding, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $footer_input_padding, 'left', 'desktop' ),
				),

				'.kemet-footer .kemet-footer-widget'       => array(
					'padding-top'    => kemet_responsive_spacing( $kemet_footer_space_widget, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $kemet_footer_space_widget, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $kemet_footer_space_widget, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $kemet_footer_space_widget, 'left', 'desktop' ),
				),
				'.kemet-footer .widget , .kmt-footer-copyright .widget' => array(
					'padding-top'      => kemet_responsive_spacing( $footer_widget_padding, 'top', 'desktop' ),
					'padding-bottom'   => kemet_responsive_spacing( $footer_widget_padding, 'bottom', 'desktop' ),
					'padding-right'    => kemet_responsive_spacing( $footer_widget_padding, 'right', 'desktop' ),
					'padding-left'     => kemet_responsive_spacing( $footer_widget_padding, 'left', 'desktop' ),
					'background-color' => esc_attr( $kemet_footer_widget_bg_color ),
				),
				// Single Post Meta.
				'.kmt-comment-meta'                        => array(
					'line-height' => '1.666666667',
					'font-size'   => kemet_get_font_css_value( (int) $body_font_size_desktop * 0.8571428571 ),
				),
				'.single .nav-links .nav-previous, .single .nav-links .nav-next, .single .kmt-author-details .author-title, .kmt-comment-meta' => array(
					'color' => esc_attr( $headings_links_color ),
				),

				// Button Typography.
				'.menu-toggle, button, a.button:hover, .button, .kmt-button, input[type=button], input[type=button]:focus, input[type=button]:hover, input[type=reset], input[type=reset]:focus, input[type=reset]:hover, input[type=submit], input[type=submit]:focus, input[type=submit]:hover, .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'border-radius'    => kemet_responsive_slider( $btn_border_radius, 'desktop' ),
					'color'            => esc_attr( $btn_text_color ),
					'background-color' => esc_attr( $btn_bg_color ),
					'border'           => 'solid',
					'border-color'     => esc_attr( $btn_border_color ),
					'border-width'     => kemet_get_css_value( $btn_border_size, 'px' ),
					'padding-top'      => kemet_responsive_spacing( $btn_padding, 'top', 'desktop' ),
					'padding-bottom'   => kemet_responsive_spacing( $btn_padding, 'bottom', 'desktop' ),
					'padding-right'    => kemet_responsive_spacing( $btn_padding, 'right', 'desktop' ),
					'padding-left'     => kemet_responsive_spacing( $btn_padding, 'left', 'desktop' ),
					'font-size'        => kemet_responsive_slider( $btn_font_size, 'desktop' ),
					'font-family'      => kemet_get_font_family( $btn_font_family ),
					'font-weight'      => esc_attr( $btn_font_weight ),
					'text-transform'   => esc_attr( $btn_text_tranform ),
					'font-style'       => esc_attr( $btn_font_style ),
					'line-height'      => kemet_responsive_slider( $btn_line_height, 'desktop' ),
					'letter-spacing'   => kemet_responsive_slider( $btn_letter_spacing, 'desktop' ),
				),

				'button:focus, a.button:hover, .menu-toggle:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, a.button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover' => array(
					'color'            => esc_attr( $btn_text_hover_color ),
					'border-color'     => esc_attr( $btn_border_h_color ),
					'background-color' => esc_attr( $btn_bg_hover_color ),
				),
				'.search-submit, .search-submit:hover, .search-submit:focus' => array(
					'color'            => kemet_get_foreground_color( $theme_color ),
					'background-color' => esc_attr( $headings_links_color ),
				),
				// Content.
				'.entry-content'                           => array(
					'color' => esc_attr( $content_text_color ),
				),
				// Content Link color.
				'.entry-content a'                         => array(
					'color' => esc_attr( $content_link_color ),
				),
				// Content Link Hover Color.
				'.entry-content a:not(.button):hover'      => array(
					'color' => esc_attr( $content_link_h_color ),
				),
				// Listing Post Page.
				'.content-area .entry-title a'             => array(
					'color' => esc_attr( $listing_post_title_color ),
				),
				'.content-area .entry-title a:hover'       => array(
					'color' => esc_attr( $listing_post_title_hover_color ),
				),
				'.content-area .entry-content'             => array(
					'color' => esc_attr( $main_entry_content_color ),
				),
				// Content Heading Color.
				' h1, .entry-content h1, .entry-content h1 a' => array(
					'color' => esc_attr( $heading_h1_font_color ),
				),
				' h2, .entry-content h2, .entry-content h2 a' => array(
					'color' => esc_attr( $heading_h2_font_color ),
				),
				' h3, .entry-content h3, .entry-content h3 a' => array(
					'color' => esc_attr( $heading_h3_font_color ),
				),
				' h4, .entry-content h4, .entry-content h4 a' => array(
					'color' => esc_attr( $heading_h4_font_color ),
				),
				' h5, .entry-content h5, .entry-content h5 a' => array(
					'color' => esc_attr( $heading_h5_font_color ),
				),
				' h6, .entry-content h6, .entry-content h6 a' => array(
					'color' => esc_attr( $heading_h6_font_color ),
				),

				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *'               => array(
					'color' => esc_attr( kemet_color_brightness( $text_meta_color, 0.7, 'light' ) ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'color' => esc_attr( $theme_color ),
				),
				'div.sidebar-main'                         => array(
					'padding-top'    => kemet_responsive_spacing( $sidebar_padding, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $sidebar_padding, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $sidebar_padding, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $sidebar_padding, 'left', 'desktop' ),
				),
				'.sidebar-main'                            => array(
					'color' => esc_attr( $sidebar_text_color ),
				),
				'.sidebar-main a'                          => array(
					'color' => esc_attr( $sidebar_link_color ),
				),
				'.sidebar-main a:hover'                    => array(
					'color' => esc_attr( $sidebar_link_h_color ),
				),
				'#secondary .sidebar-main'                 => array(
					'font-size' => kemet_responsive_slider( $sidebar_content_font_size, 'desktop' ),
				),
				'.kmt-separate-container.kmt-two-container #secondary div.widget , div.widget' => array(
					'background-color' => esc_attr( $widget_bg_color ),
				),
				// sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'color'         => esc_attr( $sidebar_input_color ),
					'background'    => esc_attr( $sidebar_input_bg_color ),
					'border-color'  => esc_attr( $sidebar_input_border_color ),
					'border-width'  => kemet_responsive_slider( $sidebar_input_border_size, 'desktop' ),
					'border-radius' => kemet_responsive_slider( $sidebar_input_border_radius, 'desktop' ),
				),

				// Widget Titles Sidebar.
				'.widget-head .widget-title , .widget-title' => array(
					'font-family'    => kemet_get_font_family( $widget_title_font_family ),
					'font-weight'    => esc_attr( $widget_title_font_weight ),
					'font-size'      => kemet_responsive_slider( $widget_title_font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $widget_title_letter_spacing, 'desktop' ),
					'line-height'    => kemet_responsive_slider( $widget_title_line_height, 'desktop' ),
					'text-transform' => esc_attr( $widget_title_text_transform ),
					'color'          => esc_attr( $widget_title_color ),
				),

				// Widget Spacing.
				'.sidebar-main .widget'                    => array(
					'margin-bottom'  => kemet_get_css_value( $widget_margin_bottom ),
					'padding-top'    => kemet_responsive_spacing( $space_widget, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $space_widget, 'bottom', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $space_widget, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $space_widget, 'left', 'desktop' ),
				),
				// Blockquote Text Color.
				'blockquote p , blockquote em'             => array(
					'font-size' => kemet_responsive_slider( $body_font_size, 'desktop' ),
				),
				'.kmt-single-post blockquote, .kmt-single-post blockquote a,.kmt-single-post .wp-block-pullquote blockquote' => array(
					'color' => esc_attr( kemet_color_brightness( $headings_links_color, 0.75, 'darken' ) ),
				),
				'.kmt-single-post blockquote ,.kmt-single-post .wp-block-pullquote blockquote' => array(
					'border-color' => esc_attr( $global_border_color ),
				),
				'.kmt-single-post  blockquote, .kmt-single-post .wp-block-quote , .kmt-single-post .wp-block-quote.has-text-align-right' => array(
					'border-color' => esc_attr( $global_border_color ),
				),

				// 404 Page.
				'.kmt-404-layout .kmt-404-text'            => array(
					'font-size' => kemet_get_font_css_value( '200' ),
				),

				// Widget Title.
				'.widget-title'                            => array(
					'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 1.428571429 ),
					'color'     => esc_attr( $headings_links_color ),
				),
				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
					'color' => esc_attr( $headings_links_color ),
				),
				'.secondary .calendar_wrap #today, .kmt-progress-val span' => array(
					'background' => esc_attr( $headings_links_color ),
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => esc_attr( $headings_links_color ),
					'border-color' => esc_attr( $headings_links_color ),
				),
				'.calendar_wrap #today > a'                => array(
					'color' => kemet_get_foreground_color( $theme_color ),
				),

				// Pagination.
				'.kmt-pagination a, .page-links .page-link, .single .post-navigation a' => array(
					'color' => esc_attr( $headings_links_color ),
				),
				'.kmt-pagination a:hover, .kmt-pagination a:focus, .kmt-pagination > span:hover:not(.dots), .kmt-pagination .nav-links > span.current, .page-links > .page-link, .page-links .page-link:hover, .post-navigation a:hover' => array(
					'color' => esc_attr( $theme_color ),
				),
				'.site-content .kmt-pagination'            => array(
					'padding-top'    => kemet_responsive_spacing( $pagination_padding, 'top', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $pagination_padding, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $pagination_padding, 'left', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $pagination_padding, 'bottom', 'desktop' ),
				),
				'body:not(.kmt-separate-container) .kmt-article-post:not(.product) > div,.kmt-separate-container .kmt-article-post ,body #primary,body #secondary, .single-post:not(.kmt-separate-container) .post-navigation ,.single-post:not(.kmt-separate-container) .comments-area ,.single-post:not(.kmt-separate-container) .kmt-author-box-info , .single-post:not(.kmt-separate-container) .comments-area .kmt-comment , .kmt-left-sidebar #secondary , .kmt-left-sidebar #primary' => array(
					'border-color' => esc_attr( $single_content_separator_color ),
				),
				'.comments-area'                           => array(
					'border-top-color' => esc_attr( $global_border_color ),
				),
				'.single .post-navigation'                 => array(
					'border-color' => esc_attr( $global_border_color ),
				),
				/**
				 * Content Spacing Desktop
				 */
				'.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li' => array(
					'padding-top'    => kemet_responsive_spacing( $container_inner_spacing, 'top', 'desktop' ),
					'padding-right'  => kemet_responsive_spacing( $container_inner_spacing, 'right', 'desktop' ),
					'padding-left'   => kemet_responsive_spacing( $container_inner_spacing, 'left', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $container_inner_spacing, 'bottom', 'desktop' ),
				),
				'.site-content #primary'                   => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'desktop' ),
				),
				// Search From Style.
				'.kmt-search-menu-icon form'               => array(
					'background-color' => esc_attr( $search_input_bg_color ),
					'color'            => esc_attr( $search_input_color ),
				),
				'.kmt-search-menu-icon form .search-field' => array(
					'border-color' => esc_attr( $search_border_color ),
				),
				'.kmt-search-menu-icon .search-submit'     => array(
					'background-color' => esc_attr( $search_btn_bg_color ),
					'color'            => esc_attr( $search_btn_color ),
				),
				'.kmt-search-menu-icon .search-submit:hover' => array(
					'background-color' => esc_attr( $search_btn_h_bg_color ),
				),
				'.search-box .kmt-search-menu-icon form .search-field, .top-bar-search-box .kemet-top-header-section .kmt-search-menu-icon .search-form .search-field' => array(
					'border-width' => kemet_get_css_value( $search_border_size, 'px', '1' ),
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
					'max-width'    => kemet_get_css_value( $site_content_width + 40, 'px' ),
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
			$parse_css .= kemet_get_background_obj( '.sidebar-main', $sidebar_bg_obj );
			// layout header.
			$parse_css  .= kemet_get_background_obj( '.site-header:not(.kmt-is-sticky) .main-header-bar ,.site-header:not(.kmt-is-sticky) .kemet-merged-top-bar-header', $header_bg_obj );
			$parse_css  .= kemet_get_background_obj( '.kmt-separate-container .kmt-article-post,.kmt-separate-container .kmt-article-single ,.kmt-separate-container .comment-respond ,.kmt-separate-container .kmt-author-box-info , .kmt-separate-container .kmt-woocommerce-container ,.kmt-separate-container .kmt-comment-list li ,.kmt-separate-container .comments-count-wrapper ,.kmt-separate-container.kmt-two-container #secondary div.widget', $box_bg_inner_boxed );
			$parse_css  .= kemet_get_background_obj( 'body, .kmt-separate-container , .entry-layout.blog-large-modern .entry-content', $box_bg_obj );
			$tablet_typo = array();

			if ( isset( $body_font_size['tablet'] ) && '' != $body_font_size['tablet'] ) {

				$tablet_typo = array(
					'.comment-reply-title' => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size['tablet'] * 1.66666, 'px', 'tablet' ),
					),
					// Single Post Meta.
					'.kmt-comment-meta'    => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size['tablet'] * 0.8571428571, 'px', 'tablet' ),
					),
					// Widget Title.
					'.widget-title'        => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size['tablet'] * 1.428571429, 'px', 'tablet' ),
					),
				);
			}

			/* Tablet Typography */
			$tablet_typography = array(
				'body, button, input, select, textarea, .button, a.wp-block-button__link' => array(
					'font-size'      => kemet_responsive_slider( $body_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $body_letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $body_line_height, 'tablet' ),
				),
				'.main-header-menu , .toggle-on .main-header-menu , .toggle-on .main-header-menu ul.sub-menu' => array(
					'background-color' => kemet_responsive_color( $menu_bg_color, 'tablet' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'font-size'      => kemet_responsive_slider( $body_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $body_letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $body_line_height, 'tablet' ),
				),
				'blockquote p, blockquote em'           => array(
					'font-size' => kemet_responsive_slider( $body_font_size, 'tablet' ),
				),
				'.main-header-menu > .menu-item > a, .main-header-menu > .menu-item, .main-header-menu > .page_item > a, .main-header-menu > .page_item' => array(
					'line-height' => kemet_responsive_slider( $menu_line_height, 'tablet' ),
				),
				'.site-title'                           => array(
					'font-size' => kemet_responsive_slider( $site_title_font_size, 'tablet' ),
				),
				'.kmt-footer-copyright'                 => array(
					'font-size'      => kemet_responsive_slider( $footer_sml_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $footer_sml_letter_spacing, 'tablet' ),
				),
				'.kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title' => array(
					'font-size'      => kemet_responsive_slider( $kemet_footer_widget_title_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $kemet_footer_widget_title_letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $kemet_footer_wgt_title_line_height, 'tablet' ),
				),
				'.widget-head .widget-title , .widget-title' => array(
					'font-size'      => kemet_responsive_slider( $widget_title_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $widget_title_letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $widget_title_line_height, 'tablet' ),
				),
				'#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity' => array(
					'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'tablet' ),
				),
				'.content-area .read-more a'            => array(
					'border-radius' => kemet_responsive_slider( $readmore_border_radius, 'tablet' ),
					'border-width'  => kemet_responsive_slider( $readmore_border_size, 'tablet' ),
				),
				'.site-header .kmt-sitehead-custom-menu-items > div , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > div' => array(
					'padding-top'    => kemet_responsive_spacing( $last_menu_items_spacing, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $last_menu_items_spacing, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $last_menu_items_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $last_menu_items_spacing, 'left', 'tablet' ),
				),
				'.main-navigation ul.main-header-menu ' => array(
					'padding-top'    => kemet_responsive_spacing( $main_menu_spacing, 'top', 'tablets' ),
					'padding-bottom' => kemet_responsive_spacing( $main_menu_spacing, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $main_menu_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $main_menu_spacing, 'left', 'tablet' ),
				),
				'.main-header-menu li:hover > a, .main-header-menu .kmt-sitehead-custom-menu-items a:not(.button):hover , .kmt-header-break-point .main-navigation ul li:hover > a' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'tablet' ),
				),
				'.main-header-menu li > a , .kmt-header-break-point .main-navigation ul li > a' => array(
					'color'          => kemet_responsive_color( $menu_link_color, 'tablet' ),
					'font-size'      => kemet_responsive_slider( $menu_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $menu_letter_spacing, 'tablet' ),
					'padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'tablet' ),
				),
				'.site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)' => array(
					'color'          => kemet_responsive_color( $menu_link_color, 'tablet' ),
					'font-size'      => kemet_responsive_slider( $last_menu_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $last_menu_letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $last_menu_line_height, 'tablet' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle' => array(
					'color' => kemet_responsive_color( $menu_link_color, 'tablet' ),
				),
				'.kmt-sitehead-custom-menu-items .kmt-search-icon .kemet-search-icon' => array(
					'color' => kemet_responsive_color( $menu_link_color, 'tablet' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children:hover>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children:hover>.kmt-menu-toggle' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'tablet' ),
				),
				'.kmt-sitehead-custom-menu-items .kmt-search-icon .kemet-search-icon:hover' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'tablet' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle::before, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle::before' => array(
					'font-size' => kemet_responsive_slider( $menu_font_size, 'tablet' ),
				),
				'.main-header-menu .sub-menu li a , .kmt-header-break-point .main-navigation ul.children li a, .kmt-header-break-point .main-navigation ul.sub-menu li a' => array(
					'font-size'      => kemet_responsive_slider( $submenu_font_size, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $sub_menu_line_height, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $submenu_letter_spacing, 'tablet' ),
					'padding-top'    => kemet_responsive_spacing( $submenu_link_spacing, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $submenu_link_spacing, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $submenu_link_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $submenu_link_spacing, 'left', 'tablet' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'padding-top'    => kemet_responsive_spacing( $footer_bar_spacing, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_bar_spacing, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $footer_bar_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $footer_bar_spacing, 'left', 'tablet' ),
				),
				'.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea' => array(
					'border-width'   => kemet_responsive_slider( $footer_input_border_size, 'tablet' ),
					'border-radius'  => kemet_responsive_slider( $footer_input_border_radius, 'tablet' ),
					'padding-top'    => kemet_responsive_spacing( $footer_input_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_input_padding, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $footer_input_padding, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $footer_input_padding, 'left', 'tablet' ),
				),
				// Input.
				'input, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .widget_search .search-field, .widget_search .search-field:focus, .kmt-single-post .wpcf7 input:not([type=submit]), .kmt-single-post .wpcf7 input:not([type=submit]):focus, .kmt-single-post .wpcf7 select:focus, .kmt-single-post .wpcf7 textarea:focus' => array(
					'border-radius'  => kemet_responsive_slider( $input_border_radius, 'tablet' ),
					'border-width'   => kemet_responsive_slider( $input_border_size, 'tablet' ),
					'padding-top'    => kemet_responsive_spacing( $input_spacing, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $input_spacing, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $input_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $input_spacing, 'left', 'tablet' ),
					'font-size'      => kemet_responsive_slider( $input_font_size, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $input_line_height, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $input_letter_spacing, 'tablet' ),
				),
				// Sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'border-radius' => kemet_responsive_slider( $sidebar_input_border_radius, 'tablet' ),
				),
				'#secondary .sidebar-main'              => array(
					'font-size' => kemet_responsive_slider( $sidebar_content_font_size, 'tablet' ),
				),
				// Button Typography.
				'.menu-toggle, button, .button , a.button, .kmt-button, input[type=button], input[type=button]:focus, input[type=button]:hover, input[type=reset], input[type=reset]:focus, input[type=reset]:hover, input[type=submit], input[type=submit]:focus, input[type=submit]:hover, a.button:focus, .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'border-radius'  => kemet_responsive_slider( $btn_border_radius, 'tablet' ),
					'font-size'      => kemet_responsive_slider( $btn_font_size, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $btn_line_height, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $btn_letter_spacing, 'tablet' ),
				),
				// Header.
				'.site-header:not(.kmt-is-sticky) .main-header-bar' => array(
					'padding-top'    => kemet_responsive_spacing( $space_header, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $space_header, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $space_header, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $space_header, 'left', 'tablet' ),
				),
				// Sidebar Spacing.
				'.sidebar-main'                         => array(
					'padding-top'    => kemet_responsive_spacing( $sidebar_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $sidebar_padding, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $sidebar_padding, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $sidebar_padding, 'left', 'tablet' ),
				),

				// Widget Spacing.
				'.sidebar-main .widget'                 => array(
					'padding-top'    => kemet_responsive_spacing( $space_widget, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $space_widget, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $space_widget, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $space_widget, 'left', 'tablet' ),
				),
				// post readmore spacing.
				'.content-area p.read-more a'           => array(
					'padding-top'    => kemet_responsive_spacing( $readmore_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $readmore_padding, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $readmore_padding, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $readmore_padding, 'left', 'tablet' ),
				),
				// Button Typography.
				'.menu-toggle, button, a.button, .kmt-button, .button, input[type=button], input[type=button]:focus, input[type=button]:hover, input[type=reset], input[type=reset]:focus, input[type=reset]:hover, input[type=submit], input[type=submit]:focus, input[type=submit]:hover, a.button:focus' => array(
					'padding-top'    => kemet_responsive_spacing( $btn_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $btn_padding, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $btn_padding, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $btn_padding, 'left', 'tablet' ),
				),
				'.site-header .site-description'        => array(
					'font-size'      => kemet_responsive_slider( $site_tagline_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $tagline_letter_spacing, 'desktop' ),
				),
				'.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a' => array(
					'font-size'      => kemet_responsive_slider( $archive_post_title_font_size, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $archive_post_title_line_height, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $archive_post_title_letter_spacing, 'tablet' ),
				),
				'.blog-posts-container .entry-meta , .blog-posts-container .entry-meta *, .category-blog .entry-meta *' => array(
					'font-size'      => kemet_responsive_slider( $archive_post_meta_font_size, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $archive_post_meta_line_height, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $archive_post_meta_letter_spacing, 'tablet' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h1_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h1_letter_spacing, 'tablet' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h2_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h2_letter_spacing, 'tablet' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h3_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h3_letter_spacing, 'tablet' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h4_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h4_letter_spacing, 'tablet' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h5_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h5_letter_spacing, 'tablet' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h6_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h6_letter_spacing, 'tablet' ),
				),
				'.kmt-single-post entry-header .entry-title, .page-title' => array(
					'font-size'      => kemet_responsive_slider( $single_post_title_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'tablet' ),
				),
				'#sitehead .site-logo-img .custom-logo-link img' => array(
					'max-width' => kemet_responsive_slider( $header_logo_width, 'tablet' ),
				),
				'.kemet-logo-svg'                       => array(
					'width' => kemet_responsive_slider( $header_logo_width, 'tablet' ),
				),
				'.kemet-footer'                         => array(
					'font-size'      => kemet_responsive_slider( $footer_font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $footer_letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $footer_line_height, 'tablet' ),
				),
				' .main-header-menu li.current-menu-item a, .main-header-menu li.current_page_item a, .main-header-menu .current-menu-ancestor > a' => array(
					'border-radius' => kemet_responsive_slider( $menu_link_active_radius, 'tablet' ),
				),

				/**
				 * Content Spacing Tablet
				 */
				'.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li ' => array(
					'padding-top'    => kemet_responsive_spacing( $container_inner_spacing, 'top', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $container_inner_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $container_inner_spacing, 'left', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $container_inner_spacing, 'bottom', 'tablet' ),
				),
				'.comments-area .form-submit input[type="submit"]' => array(
					'margin-top'    => kemet_responsive_spacing( $comment_button_spacing, 'top', 'tablet' ),
					'margin-right'  => kemet_responsive_spacing( $comment_button_spacing, 'right', 'tablet' ),
					'margin-bottom' => kemet_responsive_spacing( $comment_button_spacing, 'bottom', 'tablet' ),
					'margin-left'   => kemet_responsive_spacing( $comment_button_spacing, 'left', 'tablet' ),
				),
				'.site-content #primary'                => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'tablet' ),
				),
				'.kemet-footer .kemet-footer-overlay '  => array(
					'padding-top'    => kemet_responsive_spacing( $space_footer, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $space_footer, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $space_footer, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $space_footer, 'left', 'tablet' ),
				),
				// Footer Widget.
				'.kemet-footer .kemet-footer-widget'    => array(
					'padding-top'    => kemet_responsive_spacing( $kemet_footer_space_widget, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $kemet_footer_space_widget, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $kemet_footer_space_widget, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $kemet_footer_space_widget, 'left', 'tablet' ),
				),
				'.kemet-footer .widget , .kmt-footer-copyright .widget' => array(
					'padding-top'    => kemet_responsive_spacing( $footer_widget_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_widget_padding, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $footer_widget_padding, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $footer_widget_padding, 'left', 'tablet' ),
				),
				// Main Footer.
				'.kemet-footer button, .kemet-footer .button, .kemet-footer a.button, .kemet-footer a.button:hover, .kemet-footer .kmt-button,.kemet-footer .button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=button], .kemet-footer input[type=submit], .kemet-footer input[type=reset]' => array(
					'border-radius' => kemet_responsive_slider( $footer_button_border_radius, 'tablet' ),
					'border-width'  => kemet_responsive_slider( $footer_button_border_width, 'tablet' ),
				),
				'.site-content .kmt-pagination'         => array(
					'padding-top'    => kemet_responsive_spacing( $pagination_padding, 'top', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $pagination_padding, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $pagination_padding, 'left', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $pagination_padding, 'bottom', 'tablet' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( array_merge( $tablet_typo, $tablet_typography ), '', '768' );

			$mobile_typo = array();
			if ( isset( $body_font_size['mobile'] ) && '' != $body_font_size['mobile'] ) {
				$mobile_typo = array(
					'.comment-reply-title' => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size['mobile'] * 1.66666, 'px', 'mobile' ),
					),
					// Single Post Meta.
					'.kmt-comment-meta'    => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size['mobile'] * 0.8571428571, 'px', 'mobile' ),
					),
					// Widget Title.
					'.widget-title'        => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size['mobile'] * 1.428571429, 'px', 'mobile' ),
					),
				);
			}

			/* Mobile Typography */
			$mobile_typography = array(
				'body, button, input, select, textarea, .button, a.wp-block-button__link' => array(
					'font-size'      => kemet_responsive_slider( $body_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $body_letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $body_line_height, 'mobile' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'font-size'      => kemet_responsive_slider( $body_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $body_letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $body_line_height, 'mobile' ),
				),
				'blockquote p, blockquote em'          => array(
					'font-size' => kemet_responsive_slider( $body_font_size, 'tablet' ),
				),
				'.main-header-menu , .toggle-on .main-header-menu , .toggle-on .main-header-menu ul.sub-menu' => array(
					'background-color' => kemet_responsive_color( $menu_bg_color, 'mobile' ),
				),
				'.site-title'                          => array(
					'font-size' => kemet_responsive_slider( $site_title_font_size, 'mobile' ),
				),
				'.kmt-footer-copyright'                => array(
					'font-size'      => kemet_responsive_slider( $footer_sml_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $footer_sml_letter_spacing, 'mobile' ),
				),
				'.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea' => array(
					'border-width'   => kemet_responsive_slider( $footer_input_border_size, 'mobile' ),
					'border-radius'  => kemet_responsive_slider( $footer_input_border_radius, 'mobile' ),
					'padding-top'    => kemet_responsive_spacing( $footer_input_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_input_padding, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $footer_input_padding, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $footer_input_padding, 'left', 'mobile' ),
				),
				// Input.
				'input, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .widget_search .search-field, .widget_search .search-field:focus, .kmt-single-post .wpcf7 input:not([type=submit]), .kmt-single-post .wpcf7 input:not([type=submit]):focus, .kmt-single-post .wpcf7 select:focus, .kmt-single-post .wpcf7 textarea:focus' => array(
					'border-radius'  => kemet_responsive_slider( $input_border_radius, 'mobile' ),
					'border-width'   => kemet_responsive_slider( $input_border_size, 'mobile' ),
					'padding-top'    => kemet_responsive_spacing( $input_spacing, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $input_spacing, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $input_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $input_spacing, 'left', 'mobile' ),
					'font-size'      => kemet_responsive_slider( $input_font_size, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $input_line_height, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $input_letter_spacing, 'mobile' ),
				),
				// Sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'border-radius' => kemet_responsive_slider( $sidebar_input_border_radius, 'mobile' ),
				),
				'#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity' => array(
					'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'mobile' ),
				),
				'.content-area .read-more a'           => array(
					'border-radius' => kemet_responsive_slider( $readmore_border_radius, 'mobile' ),
					'border-width'  => kemet_responsive_slider( $readmore_border_size, 'mobile' ),
				),
				'.site-header .kmt-sitehead-custom-menu-items > div , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > div' => array(
					'padding-top'    => kemet_responsive_spacing( $last_menu_items_spacing, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $last_menu_items_spacing, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $last_menu_items_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $last_menu_items_spacing, 'left', 'mobile' ),
				),
				'.main-header-menu .sub-menu li a , .kmt-header-break-point .main-navigation ul.children li a, .kmt-header-break-point .main-navigation ul.sub-menu li a' => array(
					'font-size'      => kemet_responsive_slider( $submenu_font_size, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $sub_menu_line_height, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $submenu_letter_spacing, 'mobile' ),
					'padding-top'    => kemet_responsive_spacing( $submenu_link_spacing, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $submenu_link_spacing, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $submenu_link_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $submenu_link_spacing, 'left', 'mobile' ),
				),
				// Widget Spacing.
				'.sidebar-main .widget'                => array(
					'padding-top'    => kemet_responsive_spacing( $space_widget, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $space_widget, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $space_widget, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $space_widget, 'left', 'mobile' ),
				),
				// Button Typography.
				'.menu-toggle, button, .button, a.button, .kmt-button, input[type=button], input[type=button]:focus, input[type=button]:hover, input[type=reset], input[type=reset]:focus, input[type=reset]:hover, input[type=submit], input[type=submit]:focus, input[type=submit]:hover, a.button:focus' => array(
					'padding-top'    => kemet_responsive_spacing( $btn_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $btn_padding, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $btn_padding, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $btn_padding, 'left', 'mobile' ),
				),
				// Button Typography.
				'.menu-toggle, button, .button, a.button, .kmt-button, input[type=button], input[type=button]:focus, input[type=button]:hover, input[type=reset], input[type=reset]:focus, input[type=reset]:hover, input[type=submit], input[type=submit]:focus, input[type=submit]:hover, a.button:focus, .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'border-radius'  => kemet_responsive_slider( $btn_border_radius, 'mobile' ),
					'font-size'      => kemet_responsive_slider( $btn_font_size, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $btn_line_height, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $btn_letter_spacing, 'mobile' ),
				),
				// post readmore spacing.
				'.content-area p.read-more a'          => array(
					'padding-top'    => kemet_responsive_spacing( $readmore_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $readmore_padding, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $readmore_padding, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $readmore_padding, 'left', 'mobile' ),
				),

				// Main Footer.
				'.kemet-footer button, .kemet-footer .button, .kemet-footer a.button, .kemet-footer a.button:hover, .kemet-footer .kmt-button,.kemet-footer .button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=button], .kemet-footer input[type=submit], .kemet-footer input[type=reset]' => array(
					'border-radius' => kemet_responsive_slider( $footer_button_border_radius, 'mobile' ),
					'border-width'  => kemet_responsive_slider( $footer_button_border_width, 'mobile' ),
				),

				'.site-header .site-description'       => array(
					'font-size'      => kemet_responsive_slider( $site_tagline_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $tagline_letter_spacing, 'desktop' ),
				),
				'.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a' => array(
					'font-size'      => kemet_responsive_slider( $archive_post_title_font_size, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $archive_post_title_line_height, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $archive_post_title_letter_spacing, 'mobile' ),
				),
				'.blog-posts-container .entry-meta , .blog-posts-container .entry-meta *, .category-blog .entry-meta *' => array(
					'font-size'      => kemet_responsive_slider( $archive_post_meta_font_size, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $archive_post_meta_line_height, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $archive_post_meta_letter_spacing, 'mobile' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h1_font_size, 'mobile', 30 ),
					'letter-spacing' => kemet_responsive_slider( $heading_h1_letter_spacing, 'mobile' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h2_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h2_letter_spacing, 'mobile' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h3_font_size, 'mobile', 20 ),
					'letter-spacing' => kemet_responsive_slider( $heading_h3_letter_spacing, 'mobile' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h4_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h4_letter_spacing, 'mobile' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h5_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h5_letter_spacing, 'mobile' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'font-size'      => kemet_responsive_slider( $heading_h6_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $heading_h6_letter_spacing, 'mobile' ),
				),
				'.kmt-single-post entry-header .entry-title, .page-title' => array(
					'font-size'      => kemet_responsive_slider( $single_post_title_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'mobile' ),
				),
				'.kmt-header-break-point .site-branding img, .kmt-header-break-point #sitehead .site-logo-img .custom-logo-link img' => array(
					'max-width' => kemet_responsive_slider( $header_logo_width, 'mobile' ),
				),
				'.kemet-logo-svg'                      => array(
					'width' => kemet_responsive_slider( $header_logo_width, 'mobile' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'padding-top'    => kemet_responsive_spacing( $footer_bar_spacing, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_bar_spacing, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $footer_bar_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $footer_bar_spacing, 'left', 'mobile' ),
				),
				// Widget Font.
				'.widget .widget-head .widget-title , .widget-title' => array(
					'font-size'      => kemet_responsive_slider( $widget_title_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $widget_title_letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $widget_title_line_height, 'mobile' ),
				),
				' .main-header-menu li.current-menu-item a, .main-header-menu li.current_page_item a, .main-header-menu .current-menu-ancestor > a' => array(
					'border-radius' => kemet_responsive_slider( $menu_link_active_radius, 'mobile' ),
				),
				'.kemet-footer'                        => array(
					'font-size'      => kemet_responsive_slider( $footer_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $footer_letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $footer_line_height, 'mobile' ),
				),
				'.main-navigation ul.main-header-menu' => array(
					'padding-top'    => kemet_responsive_spacing( $main_menu_spacing, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $main_menu_spacing, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $main_menu_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $main_menu_spacing, 'left', 'mobile' ),
				),
				'.main-header-menu li > a , .kmt-header-break-point .main-navigation ul li > a' => array(
					'color'          => kemet_responsive_color( $menu_link_color, 'mobile' ),
					'font-size'      => kemet_responsive_slider( $menu_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $menu_letter_spacing, 'mobile' ),
					'padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'mobile' ),
				),
				'.site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)' => array(
					'color'          => kemet_responsive_color( $menu_link_color, 'mobile' ),
					'font-size'      => kemet_responsive_slider( $last_menu_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $last_menu_letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $last_menu_line_height, 'mobile' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle' => array(
					'color' => kemet_responsive_color( $menu_link_color, 'mobile' ),
				),
				'.kmt-sitehead-custom-menu-items .kmt-search-icon .kemet-search-icon' => array(
					'color' => kemet_responsive_color( $menu_link_color, 'mobile' ),
				),
				'.kmt-sitehead-custom-menu-items .kmt-search-icon .kemet-search-icon:hover' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'mobile' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle::before, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle::before' => array(
					'font-size' => kemet_responsive_slider( $menu_font_size, 'mobile' ),
				),
				'.main-header-menu li:hover > a, .main-header-menu .kmt-sitehead-custom-menu-items a:not(.button):hover , .kmt-header-break-point .main-navigation ul li:hover > a' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'mobile' ),
				),
				'.kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children:hover>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children:hover>.kmt-menu-toggle' => array(
					'color' => kemet_responsive_color( $menu_link_h_color, 'mobile' ),
				),
				/**
				 * Content Spacing Mobile
				 */
				'.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li' => array(
					'padding-top'    => kemet_responsive_spacing( $container_inner_spacing, 'top', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $container_inner_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $container_inner_spacing, 'left', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $container_inner_spacing, 'bottom', 'mobile' ),
				),
				'.comments-area .form-submit input[type="submit"]' => array(
					'margin-top'    => kemet_responsive_spacing( $comment_button_spacing, 'top', 'mobile' ),
					'margin-right'  => kemet_responsive_spacing( $comment_button_spacing, 'right', 'mobile' ),
					'margin-bottom' => kemet_responsive_spacing( $comment_button_spacing, 'bottom', 'mobile' ),
					'margin-left'   => kemet_responsive_spacing( $comment_button_spacing, 'left', 'mobile' ),
				),
				'.site-content #primary'               => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'mobile' ),
				),
				// Header spacing.
				'.site-header:not(.kmt-is-sticky) .main-header-bar' => array(
					'padding-top'    => kemet_responsive_spacing( $space_header, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $space_header, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $space_header, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $space_header, 'left', 'mobile' ),
				),
				// Sidebar Spacing.
				'div.sidebar-main'                     => array(
					'padding-top'    => kemet_responsive_spacing( $sidebar_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $sidebar_padding, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $sidebar_padding, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $sidebar_padding, 'left', 'mobile' ),
				),
				'#secondary .sidebar-main'             => array(
					'font-size' => kemet_responsive_slider( $sidebar_content_font_size, 'mobile' ),
				),
				'.kemet-footer .kemet-footer-overlay ' => array(
					'padding-top'    => kemet_responsive_spacing( $space_footer, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $space_footer, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $space_footer, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $space_footer, 'left', 'mobile' ),
				),

				// Footer Widget.
				'.kemet-footer .kemet-footer-widget'   => array(
					'padding-top'    => kemet_responsive_spacing( $kemet_footer_space_widget, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $kemet_footer_space_widget, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $kemet_footer_space_widget, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $kemet_footer_space_widget, 'left', 'mobile' ),
				),
				'.kemet-footer .widget , .kmt-footer-copyright .widget' => array(
					'padding-top'    => kemet_responsive_spacing( $footer_widget_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $footer_widget_padding, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $footer_widget_padding, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $footer_widget_padding, 'left', 'mobile' ),
				),
				'.kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title' => array(
					'font-size'      => kemet_responsive_slider( $kemet_footer_widget_title_font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $kemet_footer_widget_title_letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $kemet_footer_wgt_title_line_height, 'mobile' ),
				),
				'.site-content .kmt-pagination'        => array(
					'padding-top'    => kemet_responsive_spacing( $pagination_padding, 'top', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $pagination_padding, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $pagination_padding, 'left', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $pagination_padding, 'bottom', 'mobile' ),
				),
				'.main-header-menu > .menu-item > a, .main-header-menu > .menu-item, .main-header-menu > .page_item > a, .main-header-menu > .page_item' => array(
					'line-height' => kemet_responsive_slider( $menu_line_height, 'mobile' ),
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
						'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
				$parse_css             .= kemet_parse_css( $html_tablet_typography, '', '768' );
			}
			// Mobile Font Size for HTML tag.
			if ( '' == $body_font_size['mobile'] ) {
				$html_mobile_typography = array(
					'html' => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
			} else {
				$html_mobile_typography = array(
					'html' => array(
						'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
					),
				);
			}
			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $html_mobile_typography, '', '544' );

			/* Site width Responsive */
			$site_width = array(
				'.kmt-container' => array(
					'max-width' => kemet_get_css_value( $site_content_width + 40, 'px' ),
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
						'font-size' => kemet_get_font_css_value( 100 ),
					),
				),
				'',
				'920'
			);

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

			/**
			 * - Page Layout
			 *
			 *   - Sidebar Positions CSS
			 */
			$global_border_color = kemet_get_option( 'global-border-color' );
			$secondary_width     = kemet_get_option( 'site-sidebar-width' );
			$primary_width       = absint( 100 - $secondary_width );
			$meta_style          = '';

			// Header Separator.
			$header_separator_color = kemet_get_option( 'header-main-sep-color', $global_border_color );

			$meta_style = array(
				'.kmt-header-break-point .site-header .main-header-bar ,.kmt-header-break-point .header-main-layout-4 .main-header-container.logo-menu-icon' => array(
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css = kemet_parse_css( $meta_style );

			// Widget Title Border.
			$widget_title_border_size      = kemet_get_option( 'widget-title-border-size' );
			$widget_title_border_color     = kemet_get_option( 'widget-title-border-color', $global_border_color );
			$enable_widget_title_separator = kemet_get_option( 'enable-widget-title-separator' );

			if ( $enable_widget_title_separator ) {
				$widget_separator_style = array(
					'.widget .widget-head' => array(
						'border-bottom-style' => 'solid',
						'border-bottom-width' => kemet_get_css_value( $widget_title_border_size, 'px' ),
						'border-bottom-color' => esc_attr( $widget_title_border_color ),
					),
				);
				$parse_css             .= kemet_parse_css( $widget_separator_style );
			}

			// Widget list Border.
			$widget_list_border       = kemet_get_option( 'enable-widget-list-separator' );
			$widget_list_border_color = kemet_get_option( 'widget-list-border-color', $global_border_color );
			if ( $widget_list_border ) {
				$widget_list_style = array(
					'.widget ul > li,.widget.yith-woocompare-widget ul.products-list li:not( .list_empty )' => array(
						'border-bottom-style' => esc_attr( 'solid' ),
						'border-bottom-width' => esc_attr( '1px' ),
						'border-bottom-color' => esc_attr( $widget_list_border_color ),
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
			$global_footer_text_color        = kemet_get_option( 'global-footer-text-color' );
			$footer_widget_list_border       = kemet_get_option( 'enable-footer-widget-list-separator' );
			$global_footer_bg_color          = kemet_get_option( 'global-footer-bg-color' );
			$footer_widget_list_border_color = kemet_get_option( 'footer-widget-list-border-color', kemet_color_brightness( $global_footer_bg_color, 0.9, 'light' ) );
			if ( $footer_widget_list_border ) {
				$widget_list_style = array(
					'.kemet-footer .widget ul > li , .kmt-footer-copyright .widget ul > li' => array(
						'border-bottom-style' => esc_attr( 'solid' ),
						'border-bottom-width' => esc_attr( '1px' ),
						'border-bottom-color' => esc_attr( $footer_widget_list_border_color ),
					),
					'.kemet-footer .widget_shopping_cart .total, .kmt-footer-copyright .widget_shopping_cart .total' => array(
						'border-color' => esc_attr( $footer_widget_list_border_color ),
					),
				);
				$parse_css        .= kemet_parse_css( $widget_list_style );
			} elseif ( ! $footer_widget_list_border && $widget_list_border_color ) {
				$footer_widget_separator_style = array(
					'.kemet-footer .widget ul > li , .kmt-footer-copyright .widget ul > li, .kemet-footer .widget_shopping_cart .total, .kmt-footer-copyright .widget_shopping_cart .total' => array(
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
						'border-bottom-style' => 'solid',
						'border-bottom-width' => kemet_get_css_value( $footer_widget_title_border_size, 'px' ),
						'border-bottom-color' => esc_attr( $footer_widget_title_border_color ),
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

			$meta_style = array(
				'.main-header-bar, .header-main-layout-4 .main-header-container.logo-menu-icon' => array(
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css .= kemet_parse_css( $meta_style, '769' );

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
