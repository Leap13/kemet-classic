<?php
/**
 * Custom Styling output for Kemet Theme.
 *
 * @package     Kemet
 * @subpackage  Class
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
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
		static public function return_output() {

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
			 * - 404 Page
			 * - Secondary
			 * - Global CSS
			 */

			/**
			 * - Variable Declaration
			 */
			$site_content_width = kemet_get_option( 'site-content-width', 1200 );
			$header_logo_width  = kemet_get_option( 'kmt-header-responsive-logo-width' );
         $site_identity_spacing = kemet_get_option( 'site-identity-spacing' );

			// Site Background Color.
			$box_bg_obj = kemet_get_option( 'site-layout-outside-bg-obj' );
            
         // Boxed inner Options
			$box_bg_inner_boxed = kemet_get_option( 'site-boxed-inner-bg' );
         $container_inner_spacing     = kemet_get_option( 'container-inner-spacing' );

			// Color Options.
			$text_color       = kemet_get_option( 'text-color' );
			$theme_color      = kemet_get_option( 'theme-color' );
			$link_color       = kemet_get_option( 'link-color', $theme_color );
			$link_hover_color = kemet_get_option( 'link-h-color' );

			// Typography.
			$body_font_size                  = kemet_get_option( 'font-size-body' );
			$body_line_height                = kemet_get_option( 'body-line-height' );
			$para_margin_bottom              = kemet_get_option( 'para-margin-bottom' );
			$body_text_transform             = kemet_get_option( 'body-text-transform' );
			$headings_font_family            = kemet_get_option( 'headings-font-family' );
			$headings_font_weight            = kemet_get_option( 'headings-font-weight' );
			$headings_text_transform         = kemet_get_option( 'headings-text-transform' );
			$site_title_font_size            = kemet_get_option( 'font-size-site-title' );
			$site_tagline_font_size          = kemet_get_option( 'font-size-site-tagline' );
			$single_post_title_font_size     = kemet_get_option( 'font-size-entry-title' );
            $single_post_title_font_color     = kemet_get_option( 'font-color-entry-title' );
			$archive_summary_title_font_size = kemet_get_option( 'font-size-archive-summary-title' );
			$archive_post_title_font_size    = kemet_get_option( 'font-size-page-title' );
			$heading_h1_font_size            = kemet_get_option( 'font-size-h1' );
			$heading_h2_font_size            = kemet_get_option( 'font-size-h2' );
			$heading_h3_font_size            = kemet_get_option( 'font-size-h3' );
			$heading_h4_font_size            = kemet_get_option( 'font-size-h4' );
			$heading_h5_font_size            = kemet_get_option( 'font-size-h5' );
			$heading_h6_font_size            = kemet_get_option( 'font-size-h6' );

			// Button Styling.
			$btn_border_radius      = kemet_get_option( 'button-radius' );
			$btn_vertical_padding   = kemet_get_option( 'button-v-padding' );
			$btn_horizontal_padding = kemet_get_option( 'button-h-padding' );
			$highlight_link_color   = kemet_get_foreground_color( $link_color );
			$highlight_theme_color  = kemet_get_foreground_color( $theme_color );
            
         // Footer Styling
		 $space_footer        = kemet_get_option('footer-padding');
		 //Footer Font
		 //Footer Font
		 $Footer_font_family            = kemet_get_option( 'Footer-font-family' );
		 $Footer_font_weight            = kemet_get_option( 'Footer-font-weight' );
		 $Footer_text_transform         = kemet_get_option( 'Footer-text-transform' );
		 $Footer_line_height            = kemet_get_option( 'Footer-line-height' );
		 $footer_font_size              = kemet_get_option( 'footer-font-size' );
		 $font_size_footer_title        = kemet_get_option( 'font-size-footer-title' );
		 // Footer widget Meta color
		 $footer_adv_wgt_meta_color = kemet_get_option( 'footer-adv-wgt-meta-color' );
		 
			// Footer Bar Colors.
			$footer_bg_obj       = kemet_get_option( 'footer-bg-obj' );
			$footer_color        = kemet_get_option( 'footer-color' );
			$footer_link_color   = kemet_get_option( 'footer-link-color' );
			$footer_link_h_color = kemet_get_option( 'footer-link-h-color' );
			// Footer Bar Font.
			$footer_sml_font_size        = kemet_get_option( 'footer-sml-font-size' );
			// Footer Button color 
			$footer_button_color       = kemet_get_option( 'footer-button-color' );
			$footer_button_hover_color = kemet_get_option( 'footer-button-h-color' );
			$footer_button_bg_color    = kemet_get_option( 'footer-button-bg-color' );
			$footer_button_bg_h_color  = kemet_get_option( 'footer-button-bg-h-color' );
			$footer_border_radius      = kemet_get_option( 'footer-button-radius' );

			// Footer input color 
			$footer_input_color        = kemet_get_option( 'footer-input-color' );
			$footer_input_bg_color     = kemet_get_option( 'footer-input-bg-color' );
			$footer_input_border_color     = kemet_get_option( 'footer-input-border-color' );
			// Color.
			$footer_adv_bg_obj             = kemet_get_option( 'footer-adv-bg-obj' );
			$footer_adv_text_color         = kemet_get_option( 'footer-adv-text-color' );
			$footer_adv_widget_title_color = kemet_get_option( 'footer-adv-wgt-title-color' );
			$footer_adv_link_color         = kemet_get_option( 'footer-adv-link-color' );
			$footer_adv_link_h_color       = kemet_get_option( 'footer-adv-link-h-color' );
			//sidebar background.
			$sidebar_bg_obj       = kemet_get_option( 'sidebar-bg-obj' );
			//sidebar color
			$sidebar_text_color         = kemet_get_option( 'sidebar-text-color' );
			$sidebar_link_color         = kemet_get_option( 'sidebar-link-color' );
			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = kemet_get_option( 'button-color' );
			if ( empty( $btn_text_color ) ) {
				$btn_text_color = kemet_get_foreground_color( $theme_color );
			}
			$btn_Footer_text_color = kemet_get_option( 'footer-button-color' );
			if ( empty( $btn_Footer_text_color ) ) {
				$btn_Footer_text_color = kemet_get_foreground_color( $theme_color );
			}

			/**
			 * Apply text hover color depends on link hover color
			 */
			$btn_text_hover_color = kemet_get_option( 'button-h-color' );
			if ( empty( $btn_text_hover_color ) ) {
				$btn_text_hover_color = kemet_get_foreground_color( $link_hover_color );
			}
			$btn_bg_color       = kemet_get_option( 'button-bg-color', $theme_color );
			$btn_bg_hover_color = kemet_get_option( 'button-bg-h-color', $link_hover_color );

			// Spacing of Big Footer.
			$small_footer_divider_color = kemet_get_option( 'footer-sml-divider-color' );
			$small_footer_divider       = kemet_get_option( 'footer-sml-divider' );

			/**
			 * Small Footer Styling
			 */
			$small_footer_layout = kemet_get_option( 'footer-sml-layout', 'footer-sml-layout-1' );
			$kemet_footer_width  = kemet_get_option( 'footer-layout-width' );

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

				// HTML.
				'html'                                    => array(
					'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				'a, .page-title'                          => array(
					'color' => esc_attr( $link_color ),
				),
				'a:hover, a:focus'                        => array(
					'color' => esc_attr( $link_hover_color ),
				),
				'body, button, input, select, textarea'   => array(
					'font-family'    => kemet_get_font_family( $body_font_family ),
					'font-weight'    => esc_attr( $body_font_weight ),
					'font-size'      => kemet_responsive_font( $body_font_size, 'desktop' ),
					'line-height'    => esc_attr( $body_line_height ),
					'text-transform' => esc_attr( $body_text_transform ),
				),
				'blockquote'                              => array(
					'border-color' => kemet_hex_to_rgba( $link_color, 0.05 ),
				),
				'p, .entry-content p'                     => array(
					'margin-bottom' => kemet_get_css_value( $para_margin_bottom, 'em' ),
				),
				'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a' => array(
					'font-family'    => kemet_get_css_value( $headings_font_family, 'font' ),
					'font-weight'    => kemet_get_css_value( $headings_font_weight, 'font' ),
					'text-transform' => esc_attr( $headings_text_transform ),
				),
				'.site-title'                             => array(
					'font-size' => kemet_responsive_font( $site_title_font_size, 'desktop' ),
				),
				'#masthead .site-logo-img .custom-logo-link img' => array(
					'max-width' => kemet_get_css_value( $header_logo_width['desktop'], 'px' ),
				),
				'.kemet-logo-svg'                         => array(
					'width' => kemet_get_css_value( $header_logo_width['desktop'], 'px' ),
				),
                /* Site Identity Spacing */
            '.site-header .kmt-site-identity'  => array(
                'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'desktop' ),
                'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'desktop' ),
                'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'desktop' ),
                'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'desktop' ),
            ),
				'.kmt-archive-description .kmt-archive-title' => array(
					'font-size' => kemet_responsive_font( $archive_summary_title_font_size, 'desktop' ),
				),
				'.site-header .site-description'          => array(
					'font-size' => kemet_responsive_font( $site_tagline_font_size, 'desktop' ),
				),
				'.entry-title'                            => array(
					'font-size' => kemet_responsive_font( $archive_post_title_font_size, 'desktop' ),
				),
				'.comment-reply-title'                    => array(
					'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 1.66666 ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'desktop' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'font-size' => kemet_responsive_font( $heading_h1_font_size, 'desktop' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'font-size' => kemet_responsive_font( $heading_h2_font_size, 'desktop' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'font-size' => kemet_responsive_font( $heading_h3_font_size, 'desktop' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'font-size' => kemet_responsive_font( $heading_h4_font_size, 'desktop' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'font-size' => kemet_responsive_font( $heading_h5_font_size, 'desktop' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'font-size' => kemet_responsive_font( $heading_h6_font_size, 'desktop' ),
				),
				'.kmt-single-post .entry-title, .page-title' => array(
					'font-size' => kemet_responsive_font( $single_post_title_font_size, 'desktop' ),
               'color' => kemet_hex_to_rgba( $single_post_title_font_color ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'desktop' ),
				),
				
				// Global CSS.
				'::selection'                             => array(
					'background-color' => esc_attr( $theme_color ),
					'color'            => esc_attr( $highlight_theme_color ),
				),
				'body, h1, .entry-title a, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a' => array(
					'color' => esc_attr( $text_color ),
				),

				// Typography.
				'.tagcloud a:hover, .tagcloud a:focus, .tagcloud a.current-item' => array(
					'color'            => kemet_get_foreground_color( $link_color ),
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
				),

				// Header - Main Header CSS.
				'.main-header-menu a, .kmt-header-custom-item a' => array(
					'color' => esc_attr( $text_color ),
				),

				// Main - Menu Items.
				'.main-header-menu li:hover > a, .main-header-menu li:hover > .kmt-menu-toggle, .main-header-menu .kmt-masthead-custom-menu-items a:hover, .main-header-menu li.focus > a, .main-header-menu li.focus > .kmt-menu-toggle, .main-header-menu .current-menu-item > a, .main-header-menu .current-menu-ancestor > a, .main-header-menu .current_page_item > a, .main-header-menu .current-menu-item > .kmt-menu-toggle, .main-header-menu .current-menu-ancestor > .kmt-menu-toggle, .main-header-menu .current_page_item > .kmt-menu-toggle' => array(
					'color' => esc_attr( $link_color ),
				),

				// Input tags.
				'input:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, textarea:focus' => array(
					'border-color' => esc_attr( $link_color ),
				),
				'input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb' => array(
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
					'box-shadow'       => 'none',
				),

				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),

				'.kmt-small-footer'                       => array(
					'color' => esc_attr( $footer_color ),
				),
				'.kmt-small-footer'                       => array(
					'font-size' => kemet_responsive_font( $footer_sml_font_size),
				),
				'.kmt-small-footer > .kmt-footer-overlay' => kemet_get_background_obj( $footer_bg_obj ),

				'.kmt-small-footer a'                     => array(
					'color' => esc_attr( $footer_link_color ),
				),
				'.kmt-small-footer a:hover'               => array(
					'color' => esc_attr( $footer_link_h_color ),
				),

				// Advanced Fotter styling/colors/fonts.
				'.footer-adv .widget-title,.footer-adv .widget-title a' => array(
					'color' => esc_attr( $footer_adv_widget_title_color ),
				),

				'.footer-adv'                             => array(
					'color' => esc_attr( $footer_adv_text_color ),
					'font-size' => kemet_responsive_font( $footer_font_size , 'desktop' ),
					'font-family'    => kemet_get_css_value( $Footer_font_family, 'font' ),
					'font-weight'    => kemet_get_css_value( $Footer_font_weight, 'font' ),
					'text-transform' => esc_attr( $Footer_text_transform ),
					'line-height'    => esc_attr( $Footer_line_height ),
				),
				'.footer-adv .post-date'=> array(
					'color' => esc_attr( $footer_adv_wgt_meta_color),
				),
				'.footer-adv .kmt-button,.footer-adv .button,.footer-adv input#submit,.footer-adv input[type="button"],.footer-adv input[type="submit"],.footer-adv input[type="reset"]'  => array(
					'color' => esc_attr( $footer_button_color),
					'background-color' => esc_attr( $footer_button_bg_color),
					'border-radius'    => kemet_get_css_value( $footer_border_radius, 'px' )
				),
				'.footer-adv button:focus,.footer-adv button:hover,.footer-adv .kmt-button:hover,.footer-adv .button:hover,.footer-adv input[type=reset]:hover,.footer-adv input[type=reset]:focus,.footer-adv input#submit:hover,.footer-adv input#submit:focus,.footer-adv input[type="button"]:hover,.footer-adv input[type="button"]:focus,.footer-adv input[type="submit"]:hover,.footer-adv input[type="submit"]:focus'  => array(
					'color' => esc_attr( $footer_button_hover_color),
					'background-color' => esc_attr( $footer_button_bg_h_color),
				),
				'.footer-adv input,.footer-adv input[type="text"],.footer-adv input[type="email"],.footer-adv input[type="url"],.footer-adv input[type="password"],.footer-adv input[type="reset"],.footer-adv input[type="search"],.footer-adv textarea,.footer-adv select'  => array(
					'color' => esc_attr( $footer_input_color),
					'background' => esc_attr( $footer_input_bg_color),
					'border-color' => esc_attr( $footer_input_border_color),
				),
				

            '.footer-adv .kmt-container ' => array(
            'padding-top'    => kemet_responsive_spacing( $space_footer, 'top', 'desktop' ),
            'padding-bottom' => kemet_responsive_spacing( $space_footer, 'bottom', 'desktop' ),
            'padding-right' => kemet_responsive_spacing( $space_footer, 'right', 'desktop' ),
            'padding-left'  => kemet_responsive_spacing( $space_footer, 'left', 'desktop' ),
			),
			'.footer-adv .widget-title'                           => array(
				'font-size' => kemet_responsive_font( $font_size_footer_title , 'desktop' ),
			),
			
                
				'.footer-adv a'                           => array(
					'color' => esc_attr( $footer_adv_link_color ),
				),

				'.footer-adv .tagcloud a:hover, .footer-adv .tagcloud a.current-item' => array(
					'border-color'     => esc_attr( $footer_adv_link_color ),
					'background-color' => esc_attr( $footer_adv_link_color ),
				),
				

				'.footer-adv a:hover, .footer-adv .no-widget-text a:hover, .footer-adv a:focus, .footer-adv .no-widget-text a:focus' => array(
					'color' => esc_attr( $footer_adv_link_h_color ),
				),

				'.footer-adv .calendar_wrap #today, .footer-adv a:hover + .post-count' => array(
					'background-color' => esc_attr( $footer_adv_link_color ),
				),

				'.footer-adv-overlay'                     => kemet_get_background_obj( $footer_adv_bg_obj ),
                

				// Single Post Meta.
				'.kmt-comment-meta'                       => array(
					'line-height' => '1.666666667',
					'font-size'   => kemet_get_font_css_value( (int) $body_font_size_desktop * 0.8571428571 ),
				),
				'.single .nav-links .nav-previous, .single .nav-links .nav-next, .single .kmt-author-details .author-title, .kmt-comment-meta' => array(
					'color' => esc_attr( $link_color ),
				),

				// Button Typography.
				'.menu-toggle, button, .kmt-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'border-radius'    => kemet_get_css_value( $btn_border_radius, 'px' ),
					'padding'          => kemet_get_css_value( $btn_vertical_padding, 'px' ) . ' ' . kemet_get_css_value( $btn_horizontal_padding, 'px' ),
					'color'            => esc_attr( $btn_text_color ),
					'border-color'     => esc_attr( $btn_bg_color ),
					'background-color' => esc_attr( $btn_bg_color ),
				),
				'.menu-toggle, button, .kmt-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'border-radius'    => kemet_get_css_value( $btn_border_radius, 'px' ),
					'padding'          => kemet_get_css_value( $btn_vertical_padding, 'px' ) . ' ' . kemet_get_css_value( $btn_horizontal_padding, 'px' ),
					'color'            => esc_attr( $btn_text_color ),
					'border-color'     => esc_attr( $btn_bg_color ),
					'background-color' => esc_attr( $btn_bg_color ),
				),
				'button:focus, .menu-toggle:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus' => array(
					'color'            => esc_attr( $btn_text_hover_color ),
					'border-color'     => esc_attr( $btn_bg_hover_color ),
					'background-color' => esc_attr( $btn_bg_hover_color ),
				),
				'.search-submit, .search-submit:hover, .search-submit:focus' => array(
					'color'            => kemet_get_foreground_color( $link_color ),
					'background-color' => esc_attr( $link_color ),
				),

				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *'              => array(
					'line-height' => '1.45',
					'color'       => esc_attr( $link_color ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'color' => esc_attr( $link_hover_color ),
				),
				//sidebar
				'.sidebar-main' => kemet_get_background_obj( $sidebar_bg_obj ),
				'.sidebar-main *' =>  array(
				'color' => esc_attr( $sidebar_text_color ),
				),
				'.sidebar-main a' =>  array(
					'color' => esc_attr( $sidebar_link_color ),
					),
				// Blockquote Text Color.
				'blockquote, blockquote a'                => array(
					'color' => kemet_adjust_brightness( $text_color, 75, 'darken' ),
				),

				// 404 Page.
				'.kmt-404-layout-1 .kmt-404-text'         => array(
					'font-size' => kemet_get_font_css_value( '200' ),
				),

				// Widget Title.
				'.widget-title'                           => array(
					'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 1.428571429 ),
					'color'     => esc_attr( $text_color ),
				),
				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
					'color' => esc_attr( $link_color ),
				),
				'.secondary .calendar_wrap #today, .kmt-progress-val span' => array(
					'background' => esc_attr( $link_color ),
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),
				'.calendar_wrap #today > a'               => array(
					'color' => kemet_get_foreground_color( $link_color ),
				),

				// Pagination.
				'.kmt-pagination a, .page-links .page-link, .single .post-navigation a' => array(
					'color' => esc_attr( $link_color ),
				),
				'.kmt-pagination a:hover, .kmt-pagination a:focus, .kmt-pagination > span:hover:not(.dots), .kmt-pagination > span.current, .page-links > .page-link, .page-links .page-link:hover, .post-navigation a:hover' => array(
					'color' => esc_attr( $link_hover_color ),
				),
            // Layout - Container
            '.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .kmt-woocommerce-container' => kemet_get_background_obj( $box_bg_inner_boxed ),
    
            /**
                * Content Spacing Desktop
                */
            '.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .kmt-woocommerce-container ' => array(
            'padding-top'    => kemet_responsive_spacing( $container_inner_spacing, 'top', 'desktop' ),
            'padding-bottom' => kemet_responsive_spacing( $container_inner_spacing, 'bottom', 'desktop' ),
            'padding-right' => kemet_responsive_spacing( $container_inner_spacing, 'right', 'desktop' ),
            'padding-left'  => kemet_responsive_spacing( $container_inner_spacing, 'left', 'desktop' ),
               ),
			);

			/* Parse CSS from array() */
			$parse_css = kemet_parse_css( $css_output );

			// Foreground color.
			if ( ! empty( $footer_adv_link_color ) ) {
				$footer_adv_tagcloud = array(
					'.footer-adv .tagcloud a:hover, .footer-adv .tagcloud a.current-item' => array(
						'color' => kemet_get_foreground_color( $footer_adv_link_color ),
					),
					'.footer-adv .calendar_wrap #today' => array(
						'color' => kemet_get_foreground_color( $footer_adv_link_color ),
					),
				);
				$parse_css          .= kemet_parse_css( $footer_adv_tagcloud );
			}

			/* Width for Footer */
			if ( 'content' != $kemet_footer_width ) {
				$genral_global_responsive = array(
					'.kmt-small-footer .kmt-container' => array(
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

			$separate_container_css = array(
				'body, .kmt-separate-container' => kemet_get_background_obj( $box_bg_obj ),
            
			);
			$parse_css             .= kemet_parse_css( $separate_container_css );

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
				'body, button, input, select, textarea' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'tablet' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'tablet' ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'tablet' ),
				),
				'.site-title'                           => array(
					'font-size' => kemet_responsive_font( $site_title_font_size, 'tablet' ),
				),
            '.site-header .kmt-site-identity'  => array(
                'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'tablet' ),
                'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'tablet' ),
                'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'tablet' ),
                'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'tablet' ),
            ),
				'.kmt-archive-description .kmt-archive-title' => array(
					'font-size' => kemet_responsive_font( $archive_summary_title_font_size, 'tablet', 40 ),
				),
				'.site-header .site-description'        => array(
					'font-size' => kemet_responsive_font( $site_tagline_font_size, 'tablet' ),
				),
				'.entry-title'                          => array(
					'font-size' => kemet_responsive_font( $archive_post_title_font_size, 'tablet', 30 ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'font-size' => kemet_responsive_font( $heading_h1_font_size, 'tablet', 30 ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'font-size' => kemet_responsive_font( $heading_h2_font_size, 'tablet', 25 ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'font-size' => kemet_responsive_font( $heading_h3_font_size, 'tablet', 20 ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'font-size' => kemet_responsive_font( $heading_h4_font_size, 'tablet' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'font-size' => kemet_responsive_font( $heading_h5_font_size, 'tablet' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'font-size' => kemet_responsive_font( $heading_h6_font_size, 'tablet' ),
				),
				'.kmt-single-post .entry-title, .page-title' => array(
					'font-size' => kemet_responsive_font( $single_post_title_font_size, 'tablet', 30 ),
				),
				'#masthead .site-logo-img .custom-logo-link img' => array(
					'max-width' => kemet_get_css_value( $header_logo_width['tablet'], 'px' ),
				),
				'.kemet-logo-svg'                       => array(
					'width' => kemet_get_css_value( $header_logo_width['tablet'], 'px' ),
				),
           /**
                * Content Spacing Tablet
                */
            '.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single ' => array(
                'padding-top'    => kemet_responsive_spacing( $container_inner_spacing, 'top', 'tablet' ),
                'padding-bottom' => kemet_responsive_spacing( $container_inner_spacing, 'bottom', 'tablet' ),
                'padding-right' => kemet_responsive_spacing( $container_inner_spacing, 'right', 'tablet' ),
                'padding-left'  => kemet_responsive_spacing( $container_inner_spacing, 'left', 'tablet' ),
            ),
            
            '.footer-adv .kmt-container ' => array(
                'padding-top'    => kemet_responsive_spacing( $space_footer, 'top', 'tablet' ),
                'padding-bottom' => kemet_responsive_spacing( $space_footer, 'bottom', 'tablet' ),
                'padding-right' => kemet_responsive_spacing( $space_footer, 'right', 'tablet' ),
                'padding-left'  => kemet_responsive_spacing( $space_footer, 'left', 'tablet' ),
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
				'body, button, input, select, textarea' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'mobile' ),
				),
				'.kmt-comment-list #cancel-comment-reply-link' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'mobile' ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => kemet_responsive_font( $body_font_size, 'mobile' ),
				),
				'.site-title'                           => array(
					'font-size' => kemet_responsive_font( $site_title_font_size, 'mobile' ),
				),
            '.site-header .kmt-site-identity'  => array(
                'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'mobile' ),
                'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'mobile' ),
                'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'mobile' ),
                'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'mobile' ),
            ),
				'.kmt-archive-description .kmt-archive-title' => array(
					'font-size' => kemet_responsive_font( $archive_summary_title_font_size, 'mobile', 40 ),
				),
				'.site-header .site-description'        => array(
					'font-size' => kemet_responsive_font( $site_tagline_font_size, 'mobile' ),
				),
				'.entry-title'                          => array(
					'font-size' => kemet_responsive_font( $archive_post_title_font_size, 'mobile', 30 ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'font-size' => kemet_responsive_font( $heading_h1_font_size, 'mobile', 30 ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'font-size' => kemet_responsive_font( $heading_h2_font_size, 'mobile', 25 ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'font-size' => kemet_responsive_font( $heading_h3_font_size, 'mobile', 20 ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'font-size' => kemet_responsive_font( $heading_h4_font_size, 'mobile' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'font-size' => kemet_responsive_font( $heading_h5_font_size, 'mobile' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'font-size' => kemet_responsive_font( $heading_h6_font_size, 'mobile' ),
				),
				'.kmt-single-post .entry-title, .page-title' => array(
					'font-size' => kemet_responsive_font( $single_post_title_font_size, 'mobile', 30 ),
				),
				'.kmt-header-break-point .site-branding img, .kmt-header-break-point #masthead .site-logo-img .custom-logo-link img' => array(
					'max-width' => kemet_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
				'.kemet-logo-svg'                       => array(
					'width' => kemet_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
           /**
                * Content Spacing Mobile
                */
            '.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single ' => array(
                'padding-top'    => kemet_responsive_spacing( $container_inner_spacing, 'top', 'mobile' ),
                'padding-bottom' => kemet_responsive_spacing( $container_inner_spacing, 'bottom', 'mobile' ),
                'padding-right' => kemet_responsive_spacing( $container_inner_spacing, 'right', 'mobile' ),
                'padding-left'  => kemet_responsive_spacing( $container_inner_spacing, 'left', 'mobile' ),
            ),
                
            '.footer-adv .kmt-container ' => array(
                'padding-top'    => kemet_responsive_spacing( $space_footer, 'top', 'mobile' ),
                'padding-bottom' => kemet_responsive_spacing( $space_footer, 'bottom', 'mobile' ),
                'padding-right' => kemet_responsive_spacing( $space_footer, 'right', 'mobile' ),
                'padding-left'  => kemet_responsive_spacing( $space_footer, 'left', 'mobile' ),
			),
			'.footer-adv '                           => array(
				'font-size' => kemet_responsive_font( $footer_font_size , 'mobile' ),
			),
			'.footer-adv .widget-title'                           => array(
				'font-size' => kemet_responsive_font( $font_size_footer_title , 'mobile' ),
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
				$kemet_fonts          = '@font-face {';
					$kemet_fonts     .= 'font-family: "Kemet";';
					$kemet_fonts     .= 'src: url( ' . KEMET_THEME_URI . 'assets/fonts/kemet.woff) format("woff"),';
						$kemet_fonts .= 'url( ' . KEMET_THEME_URI . 'assets/fonts/kemet.ttf) format("truetype"),';
						$kemet_fonts .= 'url( ' . KEMET_THEME_URI . 'assets/fonts/kemet.svg#kemet) format("svg");';
					$kemet_fonts     .= 'font-weight: normal;';
					$kemet_fonts     .= 'font-style: normal;';
				$kemet_fonts         .= '}';
				$parse_css           .= $kemet_fonts;
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
			if ( 'disabled' != $small_footer_layout ) :
				$sml_footer_css = array(
					'.kmt-small-footer' => array(
						'border-top-style' => 'solid',
						'border-top-width' => kemet_get_css_value( $small_footer_divider, 'px' ),
						'border-top-color' => esc_attr( $small_footer_divider_color ),
					),
				);
				$parse_css     .= kemet_parse_css( $sml_footer_css );

				if ( 'footer-sml-layout-2' != $small_footer_layout ) {
					$sml_footer_css = array(
						'.kmt-small-footer-wrap' => array(
							'text-align' => 'center',
						),
					);
					$parse_css     .= kemet_parse_css( $sml_footer_css );
				}
			endif;

			/* 404 Page */
			$parse_css .= kemet_parse_css(
				array(
					'.kmt-404-layout-1 .kmt-404-text' => array(
						'font-size' => kemet_get_font_css_value( 100 ),
					),
				), '', '920'
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
		static public function return_meta_output( $return_css = false ) {

			/**
			 * - Page Layout
			 *
			 *   - Sidebar Positions CSS
			 */
			$secondary_width = kemet_get_option( 'site-sidebar-width' );
			$primary_width   = absint( 100 - $secondary_width );
			$meta_style      = '';

			// Header Separator.
			$header_separator       = kemet_get_option( 'header-main-sep' );
			$header_separator_color = kemet_get_option( 'header-main-sep-color' );

			$meta_style = array(
				'.kmt-header-break-point .site-header' => array(
					'border-bottom-width' => kemet_get_css_value( $header_separator, 'px' ),
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css = kemet_parse_css( $meta_style );

			$meta_style = array(
				'.main-header-bar' => array(
					'border-bottom-width' => kemet_get_css_value( $header_separator, 'px' ),
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css .= kemet_parse_css( $meta_style, '769' );

			if ( 'no-sidebar' !== kemet_page_layout() ) :

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

			$dynamic_css = $parse_css;
			if ( false != $return_css ) {
				return $dynamic_css;
			}

			wp_add_inline_style( 'kemet-theme-css', $dynamic_css );
		}
	}
}
