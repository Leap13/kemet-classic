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
			$headings_color           = kemet_get_sub_option( 'headings-color', 'initial' );
			$global_links_color       = kemet_get_sub_option( 'links-color', 'initial' );
			$global_links_h_color     = kemet_get_sub_option( 'links-color', 'hover', $theme_color );
			$text_meta_color          = kemet_get_sub_option( 'text-meta-color', 'initial' );
			$global_border_color      = kemet_get_sub_option( 'global-border-color', 'initial' );
			$global_bg_color          = kemet_get_sub_option( 'global-background-color', 'initial' );
			$global_footer_text_color = kemet_get_sub_option( 'global-footer-text-color', 'initial' );
			$global_footer_bg_color   = kemet_get_sub_option( 'global-footer-bg-color', 'initial' );
			$color_pallet             = kemet_get_option( 'colorPalette' );
			$site_content_width       = kemet_get_option( 'site-content-width' );

			// Site Background Color.
			$box_bg_obj = apply_filters(
				'kemet_site_layout_outside_bg',
				kemet_get_option(
					'site-layout-outside-bg-obj',
					array(
						'desktop' => array( 'background-color' => kemet_color_brightness( $global_bg_color, 0.97, 'dark' ) ),
						'tablet'  => array(),
						'mobile'  => array(),
					)
				)
			);

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
			$box_bg_inner_boxed             = apply_filters(
				'kemet_site_boxed_inner_bg',
				kemet_get_option(
					'site-boxed-inner-bg',
					array(
						'desktop' => array(
							'background-type'  => 'color',
							'background-color' => $global_border_color,
						),
						'tablet'  => array(),
						'mobile'  => array(),
					)
				)
			);
			$container_inner_spacing        = kemet_get_option( 'container-inner-spacing' );
			$content_padding                = apply_filters( 'kemet_content_padding', kemet_get_option( 'content-padding' ) );
			$single_content_separator_color = kemet_get_sub_option( 'content-separator-color', 'initial', kemet_color_brightness( $global_border_color, 0.955, 'dark' ) );
			$sidebar_separator_color        = kemet_get_sub_option( 'sidebar-separator-color', 'initial', kemet_color_brightness( $global_border_color, 0.955, 'dark' ) );

			// Typography.
			$body_typography                  = kemet_get_option( 'body-typography' );
			$body_font_size                   = $body_typography['size'];
			$body_letter_spacing              = kemet_get_option( 'letter-spacing-body' );
			$body_line_height                 = kemet_get_option( 'body-line-height' );
			$para_margin_bottom               = kemet_get_option( 'para-margin-bottom' );
			$body_text_transform              = kemet_get_option( 'body-text-transform' );
			$body_font_style                  = kemet_get_option( 'body-font-style' );
			$headings_font_family             = kemet_get_option( 'headings-font-family' );
			$headings_font_weight             = kemet_get_option( 'headings-font-weight' );
			$headings_text_transform          = kemet_get_option( 'headings-text-transform' );
			$single_post_title_font_size      = kemet_get_option( 'font-size-entry-title' );
			$single_post_title_letter_spacing = kemet_get_option( 'letter-spacing-entry-title' );
			$single_post_title_font_color     = kemet_get_sub_option( 'font-color-entry-title', 'initial', $headings_color );
			$single_post_meta_color           = kemet_get_sub_option( 'single-post-meta-color', 'initial', kemet_color_brightness( $text_meta_color, 0.7, 'light' ) );
			$comment_button_spacing           = kemet_get_option( 'comment-button-spacing' );

			// Content Heading Color.
			$heading_h1_font_color = kemet_get_sub_option( 'font-color-h1', 'initial' );
			$heading_h2_font_color = kemet_get_sub_option( 'font-color-h2', 'initial' );
			$heading_h3_font_color = kemet_get_sub_option( 'font-color-h3', 'initial' );
			$heading_h4_font_color = kemet_get_sub_option( 'font-color-h4', 'initial' );
			$heading_h5_font_color = kemet_get_sub_option( 'font-color-h5', 'initial' );
			$heading_h6_font_color = kemet_get_sub_option( 'font-color-h6', 'initial' );

			// Button Styling.
			$btn_border_radius = kemet_get_option( 'button-radius' );
			$btn_padding       = kemet_get_option( 'button-spacing' );

			// Content.
			$content_text_color   = kemet_get_sub_option( 'content-text-color', 'initial' );
			$content_link_color   = kemet_get_sub_option( 'content-link-color', 'initial' );
			$content_link_h_color = kemet_get_sub_option( 'content-link-color', 'hover' );

			// Listing Post Page.
			$listing_post_title_color       = kemet_get_sub_option( 'listing-post-title-color', 'initial' );
			$listing_post_title_hover_color = kemet_get_sub_option( 'listing-post-title-color', 'hover' );
			$listing_post_content_color     = kemet_get_option( 'post-content-color' );
			$main_entry_content_color       = kemet_get_sub_option( 'main-entry-content-color', 'initial' );
			$meta_color                     = kemet_get_sub_option( 'listing-post-meta-color', 'initial' );
			$meta_hover_color               = kemet_get_sub_option( 'listing-post-meta-color', 'hover' );
			$pagination_padding             = kemet_get_option( 'pagination-padding' );

			// Footer widget Meta color.
			$kemet_footer_widget_meta_color = kemet_get_option( 'footer-widget-meta-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );

			// Footer Bar Colors.
			$footer_bg_obj      = kemet_get_option( 'footer-bar-bg-obj', array( 'background-color' => kemet_color_brightness( $global_footer_bg_color, 0.8, 'dark' ) ) );
			$footer_bar_spacing = kemet_get_option( 'footer-bar-padding' );
			$footer_color       = kemet_get_option( 'footer-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );

			// Footer Button color.
			$footer_button_color          = kemet_get_sub_option( 'footer-button-color', 'initial', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_button_hover_color    = kemet_get_sub_option( 'footer-button-color', 'hover', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_button_bg_color       = kemet_get_sub_option( 'footer-button-bg-color', 'initial', kemet_color_brightness( $global_footer_bg_color, 0.82, 'dark' ) );
			$footer_button_bg_h_color     = kemet_get_sub_option( 'footer-button-bg-color', 'hover', kemet_color_brightness( $global_footer_bg_color, 0.9, 'dark' ) );
			$footer_button_border_radius  = kemet_get_option( 'footer-button-radius' );
			$footer_button_border_width   = kemet_get_option( 'footer-button-border-width' );
			$footer_button_border_color   = kemet_get_sub_option( 'footer-button-border-color', 'initial', kemet_color_brightness( $global_footer_bg_color, 0.8, 'dark' ) );
			$footer_button_border_h_color = kemet_get_sub_option( 'footer-button-border-color', 'hover', $footer_button_border_color );

			// Footer Input Color.
			$footer_input_color         = kemet_get_option( 'footer-input-color', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
			$footer_input_bg_color      = kemet_get_option( 'footer-input-bg-color', kemet_color_brightness( $global_footer_bg_color, 0.82, 'dark' ) );
			$footer_input_border_color  = kemet_get_option( 'footer-input-border-color', kemet_color_brightness( $global_footer_bg_color, 0.9, 'dark' ) );
			$footer_input_border_size   = kemet_get_option( 'footer-input-border-size' );
			$footer_input_border_radius = kemet_get_option( 'footer-input-border-radius' );
			$footer_input_padding       = kemet_get_option( 'footer-widget-input-padding' );

			// sidebar input color.
			$sidebar_input_color         = kemet_get_sub_option( 'sidebar-input-color', 'initial' );
			$sidebar_input_bg_color      = kemet_get_sub_option( 'sidebar-input-bg-color', 'initial' );
			$sidebar_input_border_color  = kemet_get_sub_option( 'sidebar-input-border-color', 'initial' );
			$sidebar_input_border_radius = kemet_get_option( 'sidebar-input-border-radius' );
			$sidebar_input_border_size   = kemet_get_option( 'sidebar-input-border-size' );

			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = kemet_get_sub_option( 'button-text-color', 'initial', '#ffffff' );

			// sidebar.
			$sidebar_bg_obj            = kemet_get_option( 'sidebar-bg-obj' );
			$sidebar_padding           = kemet_get_option( 'sidebar-padding' );
			$sidebar_text_color        = kemet_get_sub_option( 'sidebar-text-color', 'initial' );
			$sidebar_link_color        = kemet_get_sub_option( 'sidebar-link-color', 'initial' );
			$sidebar_link_h_color      = kemet_get_sub_option( 'sidebar-link-color', 'hover' );
			$widget_bg_color           = kemet_get_sub_option( 'widget-bg-color', 'initial' );
			$space_widget              = kemet_get_option( 'widget-padding' );
			$widget_margin_bottom      = kemet_get_option( 'widget-margin-bottom' );
			$sidebar_content_font_size = kemet_get_option( 'sidebar-content-font-size' );

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

			// Blog Post Title Typography Options.
			$single_post_max           = kemet_get_option( 'blog-single-width' );
			$single_post_max_width     = kemet_get_option( 'blog-single-max-width' );
			$blog_width                = kemet_get_option( 'blog-width' );
			$blog_max_width            = kemet_get_option( 'blog-max-width' );
			$blog_layout2_border_width = kemet_get_option( 'layout-2-post-border-size' );
			$blog_layout_border_color  = kemet_get_option( 'blog-posts-border-color', $global_border_color );
			$overlay_color             = kemet_get_sub_option( 'overlay-image-bg-color', 'initial', $theme_color );
			$overlay_icon_color        = kemet_get_sub_option( 'overlay-icon-color', 'initial', $global_border_color );
			$title_meta_poistion       = kemet_get_option( 'title-meta-position' );
			$content_alignment         = kemet_get_option( 'content-alignment' );
			$padding_inside_container  = kemet_get_option( 'padding-inside-container' );

			// Go top
			$go_top_size          = kemet_get_option( 'go-top-icon-size' );
			$go_top_side_offset   = kemet_get_option( 'go-top-side-offset' );
			$go_top_bottom_offset = kemet_get_option( 'go-top-bottom-offset' );
			$go_top_radius        = kemet_get_option( 'go-top-radius' );
			$go_top_color         = kemet_get_sub_option( 'go-top-icon-color', 'initial' );
			$go_top_h_color       = kemet_get_sub_option( 'go-top-icon-color', 'hover' );
			$go_top_bgcolor       = kemet_get_sub_option( 'go-top-icon-bgcolor', 'initial' );
			$go_top_h_bgcolor     = kemet_get_sub_option( 'go-top-icon-bgcolor', 'hover' );
			$go_top_bordercolor   = kemet_get_sub_option( 'go-top-border-color', 'initial' );
			$go_top_h_bordercolor = kemet_get_sub_option( 'go-top-border-color', 'hover' );

			$css_output = array();

			if ( is_array( $body_font_size ) ) {
				$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
			} else {
				$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
			}

			// Selection.
			$highlight_link_color  = kemet_get_foreground_color( $color_pallet['color1'] );
			$highlight_theme_color = kemet_get_foreground_color( $color_pallet['color1'] );

			$css_output = array(
				':root'                                   => array(
					'--paletteColor1'              => $color_pallet['color1'],
					'--paletteColor2'              => $color_pallet['color2'],
					'--paletteColor3'              => $color_pallet['color3'],
					'--paletteColor4'              => $color_pallet['color4'],
					'--paletteColor5'              => $color_pallet['color5'],
					'--paletteColor6'              => $color_pallet['color6'],
					'--paletteColor7'              => $color_pallet['color7'],
					'--themeColor'                 => esc_attr( $theme_color ),
					'--textColor'                  => esc_attr( $text_meta_color ),
					'--headingColor'               => esc_attr( $headings_color ),
					'--linksColor'                 => esc_attr( $global_links_color ),
					'--linksHoverColor'            => esc_attr( $global_links_h_color ),
					'--borderColor'                => esc_attr( $global_border_color ),
					'--globalBackgroundColor'      => esc_attr( $global_bg_color ),
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
					'--contentWidth'               => kemet_slider( $site_content_width ),
					'--buttonShadow'               => 'none',
					'--overlayColor'               => esc_attr( $overlay_color ),
					'--overlayIconColor'           => esc_attr( $overlay_icon_color ),
				),
				// Gutenberg Support.
				'.kmt-single-post .has-primary-color'     => array(
					'color' => 'var(--paletteColor1)',
				),
				'.kmt-single-post .has-footer-text-color' => array(
					'color' => 'var(--paletteColor6)',
				),
				'.kmt-single-post .has-footer-bg-color'   => array(
					'color' => 'var(--paletteColor7)',
				),
				'.kmt-single-post .wp-block-separator'    => array(
					'border-color'     => 'var(--borderColor)',
					'background-color' => 'var(--borderColor)',
				),
				'.kmt-single-post .has-global-border-color' => array(
					'color' => 'var(--paletteColor4)',
				),
				'.kmt-single-post .has-text-meta-color'   => array(
					'color' => 'var(--paletteColor3)',
				),
				'.kmt-single-post .has-global-bg-color'   => array(
					'background-color' => 'var(--paletteColor5)',
				),
				'.kmt-single-post .has-headings-links-color , .kmt-single-post .wp-block-cover-image-text a, .kmt-single-post .wp-block-cover-text a, .kmt-single-post section.wp-block-cover-image h2 a, .kmt-single-post section.wp-block-cover-image h2 a:active, .kmt-single-post section.wp-block-cover-image h2 a:focus, section.wp-block-cover-image h2 a:hover' => array(
					'color' => 'var(--paletteColor2)',
				),
				'.kmt-single-post .wp-block-cover-text a:hover, .kmt-single-post .wp-block-cover-text a:active, .kmt-single-post .wp-block-cover-image-text a:active, .kmt-single-post .wp-block-cover-image-text a:focus, .kmt-single-post .wp-block-cover-image-text a:hover' => array(
					'color' => 'var(--paletteColor1)',
				),
				'.wp-block-cover .wp-block-cover-text:not(.has-text-color)' => array(
					'color' => esc_attr( '#fff' ),
				),
				'.kmt-single-post .has-primary-background-color' => array(
					'background-color' => 'var(--paletteColor1)',
				),
				'.kmt-single-post .has-headings-background-color' => array(
					'background-color' => 'var(--paletteColor2)',
				),
				'.kmt-single-post .has-text-meta-background-color' => array(
					'background-color' => 'var(--paletteColor3)',
				),
				'.kmt-single-post .has-global-border-background-color' => array(
					'background-color' => 'var(--paletteColor4)',
				),
				'.kmt-single-post .has-global-bg-background-color' => array(
					'background-color' => 'var(--paletteColor5)',
				),
				'.kmt-single-post .has-footer-text-background-color' => array(
					'background-color' => 'var(--paletteColor6)',
				),
				'.kmt-single-post .has-footer-bg-background-color' => array(
					'background-color' => 'var(--paletteColor7)',
				),
				'code'                                    => array(
					'background-color' => kemet_color_brightness( $global_bg_color, 0.94, 'dark' ),
				),
				'.wp-block-code code'                     => array(
					'color' => 'var(--textColor)',
				),
				'.kmt-single-post .wp-block-table td, .kmt-single-post .wp-block-table th' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.wp-block:not([data-align="wide"]):not([data-align="full"]), .wp-block:not([data-align="wide"]):not([data-align="full"]) > * ' => array(
					'max-width' => 'calc( var(--contentWidth) + 40px )',
				),
				// HTML.
				'html'                                    => array(
					'font-size'  => 'var(--fontSize)',
					'--fontSize' => kemet_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				'a'                                       => array(
					'color' => 'var(--linksColor)',
				),
				'a:hover, a:focus'                        => array(
					'color' => 'var(--linksHoverColor)',
				),
				'.widget_search .search-form:after'       => array(
					'color' => 'var(--inputColor)',
				),
				'body'                                    => array(
					'background-color' => 'var(--globalBackgroundColor)',
					'color'            => 'var(--textColor)',
				),
				'body, div, button, input, select, textarea, .button, a.wp-block-button__link' => array(
					'font-family'     => 'var(--fontFamily, -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif)',
					'font-weight'     => 'var(--fontWeight)',
					'font-size'       => 'var(--fontSize)',
					'letter-spacing'  => 'var(--letterSpacing)',
					'line-height'     => 'var(--lineHeight)',
					'text-transform'  => 'var(--textTransform)',
					'font-style'      => 'var(--fontStyle)',
					'text-decoration' => 'var(--textDecoration)',
				),
				'p, .entry-content p'                     => array(
					'--marginBottom' => kemet_slider( $para_margin_bottom ),
				),
				'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a' => array(
					'--fontFamily'     => kemet_get_css_value( $headings_font_family, 'font' ),
					'--fontWeight'     => kemet_get_css_value( $headings_font_weight, 'font' ),
					'--textTransform)' => esc_attr( $headings_text_transform ),
				),
				'figcaption'                              => array(
					'--textColor' => esc_attr( kemet_color_brightness( $text_meta_color, 0.88, 'light' ) ),
				),
				'.blog-posts-container .entry-meta'       => array(
					'color'        => 'var(--textColor)',
					'--textColor'  => esc_attr( $meta_color ),
					'--linksColor' => 'var(--textColor)',
				),
				'.comment-reply-title'                    => array(
					'--fontSize' => kemet_get_font_css_value( (int) $body_font_size_desktop * 1.66666 ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'--fontSize'      => kemet_responsive_slider( $body_font_size, 'desktop' ),
					'--letterSpacing' => kemet_responsive_slider( $body_letter_spacing, 'desktop' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'--headingColor' => esc_attr( $heading_h1_font_color ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'--headingColor' => esc_attr( $heading_h2_font_color ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'--headingColor' => esc_attr( $heading_h3_font_color ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'--headingColor' => esc_attr( $heading_h4_font_color ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'--headingColor' => esc_attr( $heading_h5_font_color ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'--headingColor' => esc_attr( $heading_h6_font_color ),
				),
				'.kmt-single-post .entry-header .entry-title' => array(
					'--fontSize'      => kemet_responsive_slider( $single_post_title_font_size, 'desktop' ),
					'--letterSpacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'desktop' ),
					'--headingColor'  => esc_attr( $single_post_title_font_color ),
				),
				'.kmt-single-post .entry-meta'            => array(
					'color'        => 'var(--textColor)',
					'--linksColor' => esc_attr( $single_post_meta_color ),
					'--textColor'  => 'var(--linksColor)',
				),
				'.comments-area .form-submit input[type="submit"]' => array(
					'--margin' => kemet_responsive_spacing( $comment_button_spacing, 'all', 'desktop' ),
				),
				// Global CSS.
				'::selection'                             => array(
					'background-color' => 'var(--linksColor)',
					'color'            => esc_attr( $color_pallet['color2'] ),
				),
				'h1, .entry-content h1, h2, .entry-content h2, h3, .entry-content h3, h4, .entry-content h4, h5, .entry-content h5, h6, .entry-content h6' => array(
					'color' => 'var(--headingColor)',
				),
				// Input.
				'input[type="text"], input[type="email"], input[type=number], input[type="tel"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit]), .wpcf7 form textarea' => array(
					'padding'          => 'var(--padding, 0.75em)',
					'color'            => 'var(--inputColor)',
					'background-color' => 'var(--inputBackgroundColor)',
					'border-color'     => 'var(--inputBorderColor)',
					'border-radius'    => 'var(--inputBorderRadius)',
					'border-width'     => 'var(--inputBorderWidth, 1px)',
					'border-style'     => 'var(--inputBorderStyle, solid)',
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
				'form label'                              => array(
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
					'border-color'     => 'var(--linksColor)',
					'background-color' => 'var(--linksColor)',
					'box-shadow'       => 'none',
				),
				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => 'var(--linksColor)',
					'border-color' => 'var(--linksColor)',
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'--padding' => kemet_responsive_spacing( $footer_bar_spacing, 'all', 'desktop' ),
				),

				'.site-footer .post-date'                 => array(
					'color' => esc_attr( $kemet_footer_widget_meta_color ),
				),

				'.site-footer button, .site-footer .button, .site-footer .kmt-button, .site-footer input[type=button], .site-footer input[type=reset] ,.site-footer input[type="submit"], .site-footer .wp-block-button a.wp-block-button__link, .site-footer .wp-block-search button.wp-block-search__button' => array(
					'--buttonColor'                => esc_attr( $footer_button_color ),
					'--buttonBackgroundColor'      => esc_attr( $footer_button_bg_color ),
					'--borderColor'                => esc_attr( $footer_button_border_color ),
					'--buttonBorderRadius'         => kemet_responsive_spacing( $footer_button_border_radius, 'all', 'desktop' ),
					'--borderWidth'                => kemet_spacing( $footer_button_border_width, 'all' ),
					'--buttonHoverColor'           => esc_attr( $footer_button_hover_color ),
					'--buttonBackgroundHoverColor' => esc_attr( $footer_button_bg_h_color ),
					'--borderHoverColor'           => esc_attr( $footer_button_border_h_color ),
				),
				'.site-footer'                            => array(
					'color'       => 'var(--textColor)',
					'--textColor' => esc_attr( $footer_color ),
				),
				'.site-footer input[type="text"], .site-footer input[type="email"], .site-footer input[type="url"], .site-footer input[type="password"], .site-footer input[type="reset"], .site-footer input[type="search"], .site-footer textarea, .site-footer select, .site-footer .wpcf7 form input:not([type=submit])' => array(
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
				// Single Post Meta.
				'.kmt-comment-meta'                       => array(
					'--lineHeight' => '1.666666667',
					'--fontSize'   => kemet_get_font_css_value( (int) $body_font_size_desktop * 0.8571428571 ),
				),
				'.single .nav-links .nav-previous, .single .nav-links .nav-next, .single .kmt-author-details .author-title, .kmt-comment-meta' => array(
					'--textColor' => esc_attr( $global_links_color ),
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
					'--borderWidth'      => kemet_spacing( $btn_border_size, 'all' ),
					'--padding'          => kemet_responsive_spacing( $btn_padding, 'all', 'desktop' ),
					'--buttonShadow'     => $btn_effect ? '2px 2px 10px -3px var(--buttonBackgroundColor)' : 'none',
				),
				'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover' => array(
					'color'            => 'var(--buttonHoverColor, var(--buttonColor))',
					'background-color' => 'var(--buttonBackgroundHoverColor, var(--buttonBackgroundColor))',
					'border-color'     => 'var(--borderHoverColor)',
					'box-shadow'       => 'var(--buttonShadow)',
					'--buttonShadow'   => $btn_hover_effect ? '2px 2px 10px -3px var(--buttonBackgroundHoverColor,var(--buttonBackgroundColor))' : 'none',
				),
				// Content.
				'.entry-content'                          => array(
					'--textColor' => esc_attr( $content_text_color ),
				),
				// Content Link color.
				'.entry-content a'                        => array(
					'--linksColor'      => esc_attr( $content_link_color ),
					'--linksHoverColor' => esc_attr( $content_link_h_color ),
				),
				// Listing Post Page.
				'.content-area .entry-title a'            => array(
					'--linksColor'      => esc_attr( $listing_post_title_color ),
					'--linksHoverColor' => esc_attr( $listing_post_title_hover_color ),
				),
				'.content-area .entry-content'            => array(
					'--textColor' => esc_attr( $main_entry_content_color ),
				),
				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *'              => array(
					'--textColor' => esc_attr( kemet_color_brightness( $text_meta_color, 0.7, 'light' ) ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'--linksHoverColor' => esc_attr( $meta_hover_color ),
				),
				'.single .entry-header'                   => array(
					'text-align' => esc_attr( $title_meta_poistion ),
				),
				'.single-post .kmt-article-single, .single-post .comments-area .comment-respond , .single-post .kmt-author-box-info , .single-post .kmt-comment-list li' => array(
					'padding' => kemet_responsive_spacing( $padding_inside_container, 'all', 'desktop' ),
				),
				'.single .entry-content , .single .comments-area , .single .comments-area .comment-form-textarea textarea' => array(
					'text-align' => esc_attr( $content_alignment ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'--linksHoverColor' => esc_attr( $theme_color ),
				),
				'div.sidebar-main'                        => array(
					'padding' => kemet_responsive_spacing( $sidebar_padding, 'all', 'desktop' ),
				),
				'.sidebar-main'                           => array(
					'--textColor' => esc_attr( $sidebar_text_color ),
				),
				'.sidebar-main a'                         => array(
					'--linksColor'      => esc_attr( $sidebar_link_color ),
					'--linksHoverColor' => esc_attr( $sidebar_link_h_color ),
				),
				'#secondary .sidebar-main'                => array(
					'--fontSize' => kemet_responsive_slider( $sidebar_content_font_size, 'desktop' ),
				),
				'.kmt-separate-container.kmt-two-container #secondary div.widget, #secondary div.widget' => array(
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

				// Widget Spacing.
				'.sidebar-main .widget'                   => array(
					'margin-bottom' => kemet_slider( $widget_margin_bottom ),
					'padding'       => kemet_responsive_spacing( $space_widget, 'all', 'desktop' ),
				),
				// Blockquote Text Color.
				'blockquote p , blockquote em'            => array(
					'--fontSize' => kemet_responsive_slider( $body_font_size, 'desktop' ),
				),
				'.kmt-single-post blockquote, .kmt-single-post blockquote a,.kmt-single-post .wp-block-pullquote blockquote' => array(
					'--textColor'  => esc_attr( kemet_color_brightness( $global_links_color, 0.75, 'darken' ) ),
					'--linksColor' => esc_attr( kemet_color_brightness( $global_links_color, 0.75, 'darken' ) ),
				),
				'.kmt-single-post blockquote ,.kmt-single-post .wp-block-pullquote blockquote' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.kmt-single-post  blockquote, .kmt-single-post .wp-block-quote , .kmt-single-post .wp-block-quote.has-text-align-right' => array(
					'border-color' => 'var(--borderColor)',
				),

				// 404 Page.
				'.kmt-404-layout .kmt-404-text'           => array(
					'--fontSize' => kemet_get_font_css_value( '200' ),
				),

				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
					'--textColor'  => esc_attr( $global_links_color ),
					'--linksColor' => esc_attr( $global_links_color ),
				),
				'.secondary .calendar_wrap #today, .kmt-progress-val span' => array(
					'background' => esc_attr( $global_links_color ),
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => 'var(--linksColor)',
					'border-color' => 'var(--linksColor)',
				),
				'.calendar_wrap #today > a'               => array(
					'--linksColor' => kemet_get_foreground_color( $color_pallet['color1'] ),
				),

				// Pagination.
				'.kmt-pagination a, .page-links .page-link, .single .post-navigation a' => array(
					'--linksColor'      => esc_attr( $global_links_color ),
					'--linksHoverColor' => esc_attr( $theme_color ),
				),
				'.site-content .kmt-pagination'           => array(
					'--padding' => kemet_responsive_spacing( $pagination_padding, 'all', 'desktop' ),
				),
				'body:not(.kmt-separate-container) .kmt-article-post:not(.product) > div,.kmt-separate-container .kmt-article-post ,body #primary,body #secondary, .single-post:not(.kmt-separate-container) .post-navigation ,.single-post:not(.kmt-separate-container) .comments-area ,.single-post:not(.kmt-separate-container) .kmt-author-box-info , .single-post:not(.kmt-separate-container) .comments-area .kmt-comment , .kmt-left-sidebar #secondary , .kmt-left-sidebar #primary' => array(
					'border-color' => esc_attr( $single_content_separator_color ),
				),
				'body #primary,body #secondary, .kmt-left-sidebar #secondary , .kmt-left-sidebar #primary' => array(
					'border-color' => esc_attr( $sidebar_separator_color ),
				),
				'.comments-area'                          => array(
					'border-top-color' => esc_attr( $global_border_color ),
				),
				'.single .post-navigation'                => array(
					'border-color' => esc_attr( $global_border_color ),
				),
				/**
				 * Content Spacing Desktop
				 */
				'.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li' => array(
					'padding' => kemet_responsive_spacing( $container_inner_spacing, 'all', 'desktop' ),
				),
				'.site-content #primary'                  => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'desktop' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'desktop' ),
				),
				// Widgets
				'.widget ul > li,.widget.yith-woocompare-widget ul.products-list li:not( .list_empty )' => array(
					'border-bottom-style' => 'var(--borderBottomStyle)',
					'border-bottom-width' => 'var(--borderBottomWidth)',
					'border-bottom-color' => 'var(--borderBottomColor)',
				),
				'.widget .widget-head'                    => array(
					'border-bottom-style' => 'var(--borderBottomStyle)',
					'border-bottom-width' => 'var(--borderBottomWidth)',
					'border-bottom-color' => 'var(--borderBottomColor)',
				),

				// Blog Layouts
				'.blog-layout-2 .blog-post-layout-2 , body:not(.kmt-separate-container) .blog-layout-2 .kmt-article-post' => array(
					'--borderWidth' => kemet_responsive_spacing( $blog_layout2_border_width, 'all', 'desktop' ),
					'border-color'  => kemet_get_sub_option( 'blog-posts-border-color', 'initial', $global_border_color ),
				),
				'.squares .overlay-image .overlay-color .section-1:before ,.squares .overlay-image .overlay-color .section-1:after ,.squares .overlay-image .overlay-color .section-2:before ,.squares .overlay-image .overlay-color .section-2:after , .bordered .overlay-color ,.framed .overlay-color' => array(
					'background-color' => 'var(--overlayColor)',
				),
				'.overlay-image .post-details a:before, .overlay-image .post-details a:after' => array(
					'background-color' => 'var(--overlayIconColor)',
				),
				'.bordered .overlay-color .color-section-1 .color-section-2:after, .bordered .overlay-color .color-section-1 .color-section-2:before' => array(
					'border-color' => 'var(--overlayIconColor)',
				),
				// Go Top Button
				'#kmt-go-top, #kmt-go-top span'           => array(
					'font-size' => kemet_responsive_slider( $go_top_size, 'desktop' ),
				),
				'.kmt-go-top-button.go-top-right, .kmt-go-top-button.go-top-left' => array(
					'--sideOffset' => kemet_responsive_slider( $go_top_side_offset, 'desktop' ),
				),
				'.kmt-go-top-button'                      => array(
					'bottom'        => kemet_responsive_slider( $go_top_bottom_offset, 'desktop' ),
					'border-radius' => kemet_responsive_slider( $go_top_radius, 'desktop' ),
				),
				'.kmt-go-top-button span'                 => array(
					'color' => esc_attr( $go_top_color ),
				),
				'.kmt-go-top-button:hover span'           => array(
					'color' => esc_attr( $go_top_h_color ),
				),
				'#kmt-go-top'                             => array(
					'background-color' => esc_attr( $go_top_bgcolor ),
					'border-color'     => esc_attr( $go_top_bordercolor ),
				),
				'#kmt-go-top:hover'                       => array(
					'background-color' => esc_attr( $go_top_h_bgcolor ),
					'border-color'     => esc_attr( $go_top_h_bordercolor ),
				),
			);

			/* Parse CSS from array() */
			$parse_css                = kemet_parse_css( $css_output );
			$enable_sidebar_separator = kemet_get_option( 'enable-sidebar-separator' );
			if ( ! $enable_sidebar_separator ) {
				$sidebar_seperator = array(
					'body #primary,body #secondary, .kmt-left-sidebar #secondary , .kmt-left-sidebar #primary' => array(
						'border' => '0 !important;',
					),
				);
				$parse_css        .= kemet_parse_css( $sidebar_seperator );
			}

			// Typography.
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'body', ':root' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'headings', 'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h1', 'h1, .entry-content h1, .entry-content h1 a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h2', 'h2, .entry-content h2, .entry-content h2 a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h3', 'h3, .entry-content h3, .entry-content h3 a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h4', 'h4, .entry-content h4, .entry-content h4 a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h5', 'h5, .entry-content h5, .entry-content h5 a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h6', 'h6, .entry-content h6, .entry-content h6 a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'inputs', 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit])' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'buttons', 'button, .button, .kmt-button, input[type=button], input[type=reset] ,input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'post-title', '.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'post-meta', '.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *' );
			// Read More.
			$readmore_text_color     = kemet_get_sub_option( 'readmore-text-color', 'initial' );
			$readmore_text_h_color   = kemet_get_sub_option( 'readmore-text-color', 'hover' );
			$readmore_padding        = kemet_get_option( 'readmore-padding' );
			$readmore_bg_color       = kemet_get_sub_option( 'readmore-bg-color', 'initial' );
			$readmore_bg_h_color     = kemet_get_sub_option( 'readmore-bg-color', 'hover' );
			$readmore_border_radius  = kemet_get_option( 'read-more-border-radius' );
			$readmore_border_size    = kemet_get_option( 'read-more-border-size' );
			$readmore_border_color   = kemet_get_sub_option( 'readmore-border-color', 'initial' );
			$readmore_border_h_color = kemet_get_sub_option( 'readmore-border-color', 'hover' );
			$readmore_style          = array(
				'.content-area .read-more .button'     => array(
					'--buttonColor'                => esc_attr( $readmore_text_color ),
					'--buttonBackgroundColor'      => esc_attr( $readmore_bg_color ),
					'--borderColor'                => esc_attr( $readmore_border_color ),
					'--borderRadius'               => kemet_responsive_slider( $readmore_border_radius, 'desktop' ),
					'--borderWidth'                => kemet_responsive_slider( $readmore_border_size, 'desktop' ),
					'--buttonHoverColor'           => esc_attr( $readmore_text_h_color ),
					'--buttonBackgroundHoverColor' => esc_attr( $readmore_bg_h_color ),
					'--borderHoverColor'           => esc_attr( $readmore_border_h_color ),
					'--padding'                    => kemet_responsive_spacing( $readmore_padding, 'all', 'desktop' ),
				),
				'.content-area .read-more[data-align]' => array(
					'display'         => 'flex',
					'justify-content' => 'flex-start',
				),
				'.content-area .read-more[data-align="center"]' => array(
					'display'         => 'flex',
					'justify-content' => 'center',
				),
				'.content-area .read-more[data-align="right"]' => array(
					'display'         => 'flex',
					'justify-content' => 'flex-end',
				),
			);

			$parse_css .= kemet_parse_css( $readmore_style );

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
			$parse_css .= kemet_get_responsive_background_obj( '.kmt-sticky-footer #content', $box_bg_obj );
			// sidebar.
			$parse_css  .= kemet_get_background_obj( '.sidebar-main', $sidebar_bg_obj );
			$parse_css  .= kemet_get_responsive_background_obj( '.kmt-separate-container .kmt-article-post,.kmt-separate-container .kmt-article-single ,.kmt-separate-container .comment-respond ,.kmt-separate-container .kmt-author-box-info , .kmt-separate-container .kmt-woocommerce-container ,.kmt-separate-container .kmt-comment-list li ,.kmt-separate-container .comments-count-wrapper ,.kmt-separate-container.kmt-two-container #secondary div.widget', $box_bg_inner_boxed );
			$parse_css  .= kemet_get_responsive_background_obj( 'body, .kmt-separate-container , .entry-layout.blog-large-modern .entry-content', $box_bg_obj );
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
				);
			}

			/* Tablet Typography */
			$tablet_typography = array(
				':root'                         => array(
					'--fontSize'          => kemet_responsive_slider( $body_font_size, 'tablet' ),
					'--inputBorderRadius' => kemet_responsive_slider( $input_border_radius, 'tablet' ),
					'--inputBorderWidth'  => kemet_responsive_slider( $input_border_size, 'tablet' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'--fontSize'      => kemet_responsive_slider( $body_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $body_letter_spacing, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $body_line_height, 'tablet' ),
				),
				'blockquote p, blockquote em'   => array(
					'--fontSize' => kemet_responsive_slider( $body_font_size, 'tablet' ),
				),
				'.content-area .read-more a'    => array(
					'border-radius' => kemet_responsive_slider( $readmore_border_radius, 'tablet' ),
					'border-width'  => kemet_responsive_slider( $readmore_border_size, 'tablet' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'--padding' => kemet_responsive_spacing( $footer_bar_spacing, 'all', 'tablet' ),
				),
				'.site-footer input,.site-footer input[type="text"],.site-footer input[type="email"],.site-footer input[type="url"],.site-footer input[type="password"],.site-footer input[type="reset"],.site-footer input[type="search"],.site-footer textarea' => array(
					'--inputBorderWidth'  => kemet_responsive_slider( $footer_input_border_size, 'tablet' ),
					'--inputBorderRadius' => kemet_responsive_slider( $footer_input_border_radius, 'tablet' ),
					'--padding'           => kemet_responsive_spacing( $footer_input_padding, 'top', 'tablet' ),
				),
				// Input.
				'input[type="text"], input[type="email"], input[type=number], input[type="url"], input[type="tel"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit]), .wpcf7 form textarea' => array(
					'--padding'       => kemet_responsive_spacing( $input_spacing, 'all', 'tablet' ),
					'--fontSize'      => kemet_responsive_slider( $input_font_size, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $input_line_height, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $input_letter_spacing, 'tablet' ),
				),
				// Sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'--inputBorderRadius' => kemet_responsive_slider( $sidebar_input_border_radius, 'tablet' ),
				),
				'#secondary .sidebar-main'      => array(
					'--fontSize' => kemet_responsive_slider( $sidebar_content_font_size, 'tablet' ),
				),
				// Button Typography.
				'button, .button, .kmt-button, input[type=button], input[type=reset] ,input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'--padding' => kemet_responsive_spacing( $btn_padding, 'all', 'mobile' ),
				),
				// Sidebar Spacing.
				'.sidebar-main'                 => array(
					'--padding' => kemet_responsive_spacing( $sidebar_padding, 'all', 'tablet' ),
				),

				// Widget Spacing.
				'.sidebar-main .widget'         => array(
					'padding' => kemet_responsive_spacing( $space_widget, 'all', 'tablet' ),
				),
				// post readmore spacing.
				'.content-area p.read-more a'   => array(
					'--padding' => kemet_responsive_spacing( $readmore_padding, 'all', 'tablet' ),
				),
				'.kmt-single-post entry-header .entry-title, .page-title' => array(
					'--fontSize'      => kemet_responsive_slider( $single_post_title_font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'tablet' ),
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
				'.site-content #primary'        => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'tablet' ),
				),
				// Main Footer.
				'.site-footer button, .site-footer .button, .site-footer a.button, .site-footer a.button:hover, .site-footer .kmt-button,.site-footer .button, .site-footer .button, .site-footer input#submit, .site-footer input[type=button], .site-footer input[type=submit], .site-footer input[type=reset]' => array(
					'--buttonBorderRadius' => kemet_responsive_spacing( $footer_button_border_radius, 'all', 'tablet' ),
				),
				'.site-content .kmt-pagination' => array(
					'--padding' => kemet_responsive_spacing( $pagination_padding, 'all', 'tablet' ),
				),
				// Blog Layouts
				'.blog-layout-2 .blog-post-layout-2 , body:not(.kmt-separate-container) .blog-layout-2 .kmt-article-post' => array(
					'--borderWidth' => kemet_responsive_spacing( $blog_layout2_border_width, 'all', 'tablet' ),
				),
				'.single-post .kmt-article-single, .single-post .comments-area .comment-respond , .single-post .kmt-author-box-info , .single-post .kmt-comment-list li' => array(
					'padding' => kemet_responsive_spacing( $padding_inside_container, 'all', 'tablet' ),
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
				);
			}

			/* Mobile Typography */
			$mobile_typography = array(
				':root'                         => array(
					'--fontSize'          => kemet_responsive_slider( $body_font_size, 'mobile' ),
					'--inputBorderRadius' => kemet_responsive_slider( $input_border_radius, 'mobile' ),
					'--inputBorderWidth'  => kemet_responsive_slider( $input_border_size, 'mobile' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'--fontSize'      => kemet_responsive_slider( $body_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $body_letter_spacing, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $body_line_height, 'mobile' ),
				),
				'blockquote p, blockquote em'   => array(
					'--fontSize' => kemet_responsive_slider( $body_font_size, 'tablet' ),
				),
				'.site-footer input,.site-footer input[type="text"],.site-footer input[type="email"],.site-footer input[type="url"],.site-footer input[type="password"],.site-footer input[type="reset"],.site-footer input[type="search"],.site-footer textarea' => array(
					'--inputBorderWidth'  => kemet_responsive_slider( $footer_input_border_size, 'mobile' ),
					'--inputBorderRadius' => kemet_responsive_slider( $footer_input_border_radius, 'mobile' ),
					'--padding'           => kemet_responsive_spacing( $footer_input_padding, 'top', 'mobile' ),
				),
				// Input.
				'input[type="text"], input[type="email"], input[type=number], input[type="url"], input[type="tel"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit]), .wpcf7 form textarea' => array(
					'--padding'       => kemet_responsive_spacing( $input_spacing, 'all', 'mobile' ),
					'--fontSize'      => kemet_responsive_slider( $input_font_size, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $input_line_height, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $input_letter_spacing, 'mobile' ),
				),
				// Sidebar input style.
				'.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select' => array(
					'--borderRadius' => kemet_responsive_slider( $sidebar_input_border_radius, 'mobile' ),
				),
				'.content-area .read-more a'    => array(
					'border-radius' => kemet_responsive_slider( $readmore_border_radius, 'mobile' ),
					'border-width'  => kemet_responsive_slider( $readmore_border_size, 'mobile' ),
				),
				// Widget Spacing.
				'.sidebar-main .widget'         => array(
					'padding' => kemet_responsive_spacing( $space_widget, 'all', 'mobile' ),
				),
				// Button Typography.
				'button, .button, .kmt-button, input[type=button], input[type=reset] ,input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button' => array(
					'--padding' => kemet_responsive_spacing( $btn_padding, 'all', 'mobile' ),
				),
				// post readmore spacing.
				'.content-area p.read-more a'   => array(
					'--padding' => kemet_responsive_spacing( $readmore_padding, 'all', 'mobile' ),
				),

				// Main Footer.
				'.site-footer button, .site-footer .button, .site-footer a.button, .site-footer a.button:hover, .site-footer .kmt-button,.site-footer .button, .site-footer .button, .site-footer input#submit, .site-footer input[type=button], .site-footer input[type=submit], .site-footer input[type=reset]' => array(
					'--buttonBorderRadius' => kemet_responsive_spacing( $footer_button_border_radius, 'all', 'mobile' ),
				),
				'.kmt-single-post entry-header .entry-title, .page-title' => array(
					'--fontSize'      => kemet_responsive_slider( $single_post_title_font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $single_post_title_letter_spacing, 'mobile' ),
				),
				'.kmt-footer-copyright .kmt-footer-copyright-content' => array(
					'--padding' => kemet_responsive_spacing( $footer_bar_spacing, 'all', 'mobile' ),
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
				'.site-content #primary'        => array(
					'padding-top'    => kemet_responsive_spacing( $content_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $content_padding, 'bottom', 'mobile' ),
				),
				// Sidebar Spacing.
				'div.sidebar-main'              => array(
					'--padding' => kemet_responsive_spacing( $sidebar_padding, 'all', 'mobile' ),
				),
				'#secondary .sidebar-main'      => array(
					'--fontSize' => kemet_responsive_slider( $sidebar_content_font_size, 'mobile' ),
				),

				// Footer Widget.
				'.site-content .kmt-pagination' => array(
					'--padding' => kemet_responsive_spacing( $pagination_padding, 'all', 'mobile' ),
				),
				// Blog Layouts
				'.blog-layout-2 .blog-post-layout-2 , body:not(.kmt-separate-container) .blog-layout-2 .kmt-article-post' => array(
					'--borderWidth' => kemet_responsive_spacing( $blog_layout2_border_width, 'all', 'mobile' ),
				),
				'.single-post .kmt-article-single, .single-post .comments-area .comment-respond , .single-post .kmt-author-box-info , .single-post .kmt-comment-list li' => array(
					'padding' => kemet_responsive_spacing( $padding_inside_container, 'all', 'tablet' ),
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

			/* Blog */
			if ( 'custom' === $blog_width ) :

				/* Site width Responsive */
				$blog_css   = array(
					'.blog .site-content > .kmt-container, .archive .site-content > .kmt-container, .search .site-content > .kmt-container' => array(
						'max-width' => kemet_slider( $blog_max_width ),
					),
				);
				$parse_css .= kemet_parse_css( $blog_css, '769' );
			endif;

			/* Single Blog */
			if ( 'custom' === $single_post_max ) :

				/* Site width Responsive */
				$single_blog_css = array(
					'.single-post .site-content > .kmt-container' => array(
						'max-width' => kemet_slider( $single_post_max_width ),
					),
				);
				$parse_css      .= kemet_parse_css( $single_blog_css, '769' );
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

			// Preview
			$customizer_preview_css = array(
				'.kmt-custom-partial-edit-shortcut.customize-partial-edit-shortcut button' => array(
					'visibility'            => 'hidden;',
					'top'                   => '0px;',
					'left'                  => '0px;',
					'width'                 => 'auto !important;',
					'height'                => '28px;',
					'padding'               => '0 13px;',
					'font-size'             => '10px;',
					'font-weight'           => '600;',
					'letter-spacing'        => '0.03em;',
					'text-transform'        => 'uppercase;',
					'background'            => '#0085ba;',
					'-webkit-border-radius' => '0 0 2px 0;',
					'border-radius'         => '0 0 2px 0;',
					'border'                => ' none !important;',
					'-webkit-box-shadow'    => 'none;',
					'box-shadow'            => 'none;',
				),
				'.kmt-custom-partial-edit.customize-partial-edit-shortcut button.edit-buidler-item' => array(
					'visibility' => 'hidden;',
				),
				'.kmt-item-focus:hover .kmt-custom-partial-edit.customize-partial-edit-shortcut button.edit-buidler-item' => array(
					'visibility' => 'visible;',
				),
				'.site-builder-focus-item'       => array(
					'outline'        => '1px solid transparent;',
					'position'       => 'relative;',
					'transition'     => 'outline 0.15s ease',
					'outline-offset' => '-1px',
				),
				'.site-builder-focus-item:hover' => array(
					'outline' => '1px solid #0085ba !important;',
				),
				'.site-builder-focus-item:hover .kmt-custom-partial-edit-shortcut.customize-partial-edit-shortcut button' => array(
					'visibility' => 'visible;',
				),
				'.site-footer .customize-partial-edit-shortcut button:hover' => array(
					'color' => '#fff;',
				),
				'.kmt-item-focus'                => array(
					'position' => 'relative;',
				),
				'.kmt-custom-partial-edit'       => array(
					'left' => '26px',
				),
			);

			if ( is_customize_preview() ) {
				$parse_css .= kemet_parse_css( $customizer_preview_css );
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
			$primary_width   = absint( 100 - intval( $secondary_width['value'] ) );
			$meta_style      = '';

			if ( 'no-sidebar' !== kemet_layout() ) :

				$meta_style = array(
					'#primary'   => array(
						'width' => kemet_get_css_value( $primary_width, '%' ),
					),
					'#secondary' => array(
						'width' => kemet_slider( $secondary_width ),
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
