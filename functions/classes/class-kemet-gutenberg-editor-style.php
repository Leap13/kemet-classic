<?php
/**
 * Gutenberg editor style
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://leap13.com
 */

if ( ! class_exists( 'Kemet_Gutenberg_Editor_Style' ) ) {
	/**
	 * Gutenberg Style
	 */
	class Kemet_Gutenberg_Editor_Style {

		/**
		 * Dynamic css
		 *
		 * @return string
		 */
		public static function dynamic_css() {
			global $pagenow;
			global $post;
			$post_id = kemet_get_post_id();

			// Global colors.
			$theme_color          = kemet_get_sub_option( 'theme-color', 'initial' );
			$headings_links_color = kemet_get_sub_option( 'headings-links-color', 'initial' );
			$text_meta_color      = kemet_get_sub_option( 'text-meta-color', 'initial' );
			$global_border_color  = kemet_get_sub_option( 'global-border-color', 'initial' );
			$global_bg_color      = kemet_get_sub_option( 'global-background-color', 'initial' );
			// container width.
			$site_content_width = kemet_get_option( 'site-content-width' );
			// Body.
			$body_typography      = kemet_get_option( 'body-typography' );
			$body_font_size       = $body_typography['size'];
			$body_letter_spacing  = kemet_get_option( 'letter-spacing-body' );
			$body_line_height     = kemet_get_option(
				'body-line-height',
				array(
					'desktop'      => esc_attr( '1.85714285714286' ),
					'tablet'       => esc_attr( '1.85714285714286' ),
					'mobile'       => esc_attr( '1.85714285714286' ),
					'desktop-unit' => 'em',
					'tablet-unit'  => 'em',
					'mobile-unit'  => 'em',
				)
			);
			$box_bg_obj           = kemet_get_option( 'site-layout-outside-bg-obj', array( 'background-color' => $global_bg_color ) );
			$content_text_color   = kemet_get_option( 'content-text-color', $text_meta_color );
			$content_link_color   = kemet_get_sub_option( 'content-link-color', 'initial', $headings_links_color );
			$content_link_h_color = kemet_get_sub_option( 'content-link-color', 'hover', $theme_color );
			// Headings.
			$single_post_title_font_size = kemet_get_option( 'font-size-entry-title' );
			$highlight_theme_color       = kemet_get_foreground_color( $theme_color );
			// Buttons.
			$btn_text_color       = kemet_get_sub_option( 'button-text-color', 'initial', '#ffffff' );
			$btn_text_hover_color = kemet_get_sub_option( 'button-text-color', 'hover' );
			$btn_bg_color         = kemet_get_sub_option( 'button-bg-color', 'initial', $theme_color );
			$btn_border_size      = kemet_get_option( 'btn-border-size' );
			$btn_border_color     = kemet_get_sub_option( 'btn-border-color', 'initial' );
			$btn_border_h_color   = kemet_get_sub_option( 'btn-border-color', 'hover' );
			$btn_bg_hover_color   = kemet_get_sub_option( 'button-bg-color', 'hover', kemet_color_brightness( $theme_color, 0.8, 'dark' ) );
			$btn_border_radius    = kemet_get_option( 'button-radius' );
			$btn_padding          = kemet_get_option( 'button-spacing' );
			// Input Options.
			$input_bg_color           = kemet_get_sub_option( 'input-bg-color', 'initial', kemet_color_brightness( $global_bg_color, 0.99, 'dark' ) );
			$input_text_color         = kemet_get_sub_option( 'input-text-color', 'initial' );
			$input_focus_bg_color     = kemet_get_sub_option( 'input-bg-color', 'focus' );
			$input_focus_text_color   = kemet_get_sub_option( 'input-text-color', 'focus' );
			$input_border_radius      = kemet_get_option( 'input-radius' );
			$input_border_size        = kemet_get_option( 'input-border-size' );
			$input_border_color       = kemet_get_sub_option( 'input-border-color', 'initial', $global_border_color );
			$input_focus_border_color = kemet_get_sub_option( 'input-border-color', 'focus' );
			$input_label_color        = kemet_get_sub_option( 'input-label-color', 'initial' );
			$input_spacing            = kemet_get_option(
				'input-spacing',
				array(
					'desktop'      => array(
						'top'    => '0.75',
						'right'  => '0.75',
						'bottom' => '0.75',
						'left'   => '0.75',
					),
					'tablet'       => array(
						'top'    => '0.75',
						'right'  => '0.75',
						'bottom' => '0.75',
						'left'   => '0.75',
					),
					'mobile'       => array(
						'top'    => '0.75',
						'right'  => '0.75',
						'bottom' => '0.75',
						'left'   => '0.75',
					),
					'desktop-unit' => 'em',
					'tablet-unit'  => 'em',
					'mobile-unit'  => 'em',
				)
			);
			// Site Background Color.
			$box_bg_obj = apply_filters( 'kemet_site_layout_outside_bg', kemet_get_option( 'site-layout-outside-bg-obj', array( 'background-color' => $global_bg_color ) ) );

			// Boxed inner Options.
			$box_bg_inner_boxed = apply_filters( 'kemet_site_boxed_inner_bg', kemet_get_option( 'site-boxed-inner-bg', array( 'background-color' => kemet_color_brightness( $global_bg_color, 0.97, 'dark' ) ) ) );

			if ( is_array( $body_font_size ) ) {
				$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
			} else {
				$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
			}

			// check the selection color incase of empty/no theme color.
			$selection_text_color = ( 'transparent' === $highlight_theme_color ) ? '' : $highlight_theme_color;

			$parse_css     = '';
			$parse_css    .= kemet_get_background_obj( '.kmt-separate-container .block-editor-writing-flow, .kmt-two-container .block-editor-writing-flow', $box_bg_inner_boxed );
			$parse_css    .= kemet_get_background_obj( '.edit-post-visual-editor__content-area, .block-editor-writing-flow', $box_bg_obj );
			$blocks_parent = version_compare( get_bloginfo( 'version' ), '5.6', '>' ) ? '.edit-post-visual-editor .edit-post-visual-editor__content-area' : '.edit-post-visual-editor.editor-styles-wrapper';
			$desktop_css   = array(
				':root'                                   => array(
					'--themeColor'                 => esc_attr( $theme_color ),
					'--textColor'                  => esc_attr( $text_meta_color ),
					'--headingLinksColor'          => esc_attr( $headings_links_color ),
					'--linksHoverColor'            => 'var(--themeColor)',
					'--borderColor'                => esc_attr( $global_border_color ),
					'--globalBackgroundColor'      => esc_attr( $global_bg_color ),
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
					'--buttonShadow'               => 'none',
				),
				'html'                                    => array(
					'font-size' => kemet_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				'.kmt-theme-container .edit-post-visual-editor__content-area>div' => array(
					'background-color' => 'transparent !important;',
				),
				'.edit-post-visual-editor__content-area'  => array(),
				'.edit-post-visual-editor .editor-styles-wrapper' => array(
					'margin'     => esc_attr( '0' ),
					'overflow-y' => esc_attr( 'visible' ),
				),
				'.kmt-separate-container .edit-post-visual-editor, .kmt-page-builder-template .edit-post-visual-editor, .kmt-plain-container .edit-post-visual-editor' => array(
					'padding' => esc_attr( '0' ),
				),
				$blocks_parent . ' .wp-block-categories ul[class*="wp-block-"], ' . $blocks_parent . ' .block-editor-block-list__block ul[class*="wp-block-"], ' . $blocks_parent . ' .block-editor-block-list__block ol[class*="wp-block-"]' => array(
					'padding-left' => esc_attr( '0' ),
				),
				$blocks_parent . ' .wp-block-latest-comments__comment-excerpt p' => array(
					'font-size'   => esc_attr( '0.875em' ),
					'line-height' => esc_attr( '1.8' ),
					'margin'      => esc_attr( '.36em 0 1.4em' ),
				),
				$blocks_parent . ' .wp-block-file .wp-block-file__button' => array(
					'line-height' => esc_attr( '1.8' ),
				),
				// Input.
				'.edit-post-visual-editor .block-editor-block-list__block input,input[type="text"],.edit-post-visual-editor .block-editor-block-list__block input[type="email"],.edit-post-visual-editor .block-editor-block-list__block input[type="url"],.edit-post-visual-editor .block-editor-block-list__block input[type="password"],.edit-post-visual-editor .block-editor-block-list__block input[type="reset"],.edit-post-visual-editor .block-editor-block-list__block input[type="search"], .edit-post-visual-editor .block-editor-block-list__block textarea , .edit-post-visual-editor .block-editor-block-list__block select,.edit-post-visual-editor .block-editor-block-list__block .widget_search .search-field,.edit-post-visual-editor .block-editor-block-list__block .widget_search .search-field:focus' => array(
					'padding'          => 'var(--padding, 0.75em)',
					'color'            => 'var(--inputColor)',
					'background-color' => 'var(--inputBackgroundColor)',
					'border-color'     => 'var(--inputBorderColor)',
					'border-radius'    => 'var(--inputBorderRadius, 2px)',
					'border-width'     => 'var(--inputBorderWidth, 1px)',
					'border-style'     => 'var(--inputBorderStyle, solid)',
					'--padding'        => kemet_responsive_spacing( $input_spacing, 'all', 'desktop' ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block a' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.edit-post-visual-editor blockquote a, .edit-post-visual-editor blockquote.block-editor-block-list__block a, .wp-block-freeform.block-library-rich-text__tinymce blockquote a' => array(
					'color' => esc_attr( kemet_color_brightness( $headings_links_color, 0.75, 'darken' ) ),
				),
				'.edit-post-visual-editor blockquote a:hover, .edit-post-visual-editor blockquote.block-editor-block-list__block a:hover, .wp-block-freeform.block-library-rich-text__tinymce blockquote a:hover' => array(
					'color' => 'var(--themeColor)',
				),
				'.wp-block-freeform.block-library-rich-text__tinymce blockquote' => array(
					'padding-left' => esc_attr( '1.2em' ),
					'margin'       => esc_attr( '1.5em auto' ),
				),
				'.wp-block-freeform.block-library-rich-text__tinymce blockquot a' => array(
					'color'           => 'var(--textColor)',
					'text-decoration' => esc_attr( 'none' ),
				),
				'.block-editor-block-list__layout .block-editor-block-list__block' => array(
					'width' => esc_attr( '100%' ),
				),
				'.block-editor-block-list__layout .block-editor-block-list__block.has-warning' => array(
					'margin-left'  => esc_attr( 'auto' ),
					'margin-right' => esc_attr( 'auto' ),
				),
				'.block-editor-block-list__layout .block-editor-block-list__block > div' => array(
					'overflow' => esc_attr( 'hidden' ),
				),
				'.block-editor-block-list__layout .wp-block[data-align=left]>*, .block-editor-block-list__layout .wp-block[data-align=right]>*' => array(
					'width' => esc_attr( 'auto' ),
				),
				'.edit-post-visual-editor a:hover, .edit-post-visual-editor a:hover , .wp-block-freeform.block-library-rich-text__tinymce a:hover' => array(
					'color' => 'var(--themeColor)',
				),
				'.edit-post-visual-editor p, ' . $blocks_parent . ' .wp-block-freeform.block-library-rich-text__tinymce pre' => array(
					'color' => 'var(--textColor)',
				),
				$blocks_parent . ' hr'                    => array(
					'border'           => esc_attr( 'none' ),
					'border-bottom'    => esc_attr( '2px solid' ),
					'border-color'     => 'var(--headingLinksColor)',
					'background-color' => 'var(--headingLinksColor)',
				),
				$blocks_parent . ' hr.is-style-wide'      => array(
					'border-bottom-width' => esc_attr( '1px' ),
				),
				'.kmt-theme-container .edit-post-visual-editor' => array(
					'background-color' => '#f0f0f1',
					'overflow'         => esc_attr( 'visible' ),
				),
				// Global selection CSS.
				'.block-editor-block-list__layout .block-editor-block-list__block ::selection,.block-editor-block-list__layout .block-editor-block-list__block.is-multi-selected .editor-block-list__block-edit:before' => array(
					'background-color' => 'var(--themeColor)',
				),
				'.block-editor-block-list__layout .block-editor-block-list__block ::selection,.block-editor-block-list__layout .block-editor-block-list__block.is-multi-selected .editor-block-list__block-edit' => array(
					'color' => esc_attr( $selection_text_color ),
				),
				'.editor-post-title__block,.editor-default-block-appender,.block-editor-block-list__block' => array(
					'max-width' => kemet_slider( $site_content_width ),
				),
				'.block-editor-block-list__block[data-align=wide]' => array(
					'max-width' => kemet_get_css_value( $site_content_width['value'] + 200, 'px' ),
				),
				$blocks_parent . ' p,.block-editor-block-list__block p, .block-editor-block-list__layout, .editor-post-title, ' . $blocks_parent . ' li' => array(
					'font-size' => kemet_responsive_slider( $body_font_size, 'desktop' ),
				),
				$blocks_parent . ' ul:not([class*="blocks"]), ' . $blocks_parent . ' ol:not([class*="blocks"]), ' . $blocks_parent . ' .wp-block-latest-posts.is-grid' => array(
					'padding-left' => esc_attr( 'calc(20px + 1.5em)' ),
				),
				$blocks_parent . ' li ul:not([class*="blocks"]), ' . $blocks_parent . ' li ol:not([class*="blocks"])' => array(
					'margin-left'  => esc_attr( '1.5em' ),
					'padding-left' => esc_attr( '0' ),
				),
				$blocks_parent . ' .wp-block-freeform.block-library-rich-text__tinymce .wpview' => array(
					'margin-bottom' => esc_attr( '0' ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block li>ul' => array(
					'list-style-type' => esc_attr( 'disc' ),
				),
				$blocks_parent . ' p.has-background'      => array(
					'padding' => esc_attr( '1.25em 2.375em' ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block .wp-block-freeform.block-library-rich-text__tinymce pre' => array(
					'font-family' => kemet_get_css_value( '"Courier 10 Pitch",Courier,monospace', 'font' ),
				),
				$blocks_parent . ' .wp-block-cover'       => array(
					'padding' => esc_attr( '1em' ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block .wp-block-freeform.block-library-rich-text__tinymce dl.wp-caption, .edit-post-visual-editor .block-editor-block-list__block .wp-block-freeform.block-library-rich-text__tinymce dl.wp-caption *' => array(
					'font-size'  => esc_attr( '13px' ),
					'color'      => esc_attr( kemet_color_brightness( $content_text_color, 0.88, 'light' ) ),
					'text-align' => esc_attr( 'center' ),
				),
				'.wp-block-freeform.block-library-rich-text__tinymce .gallery' => array(
					'padding' => esc_attr( '0' ),
				),
				$blocks_parent . ' .wp-block-freeform.block-library-rich-text__tinymce dl.wp-caption .wp-caption-dd' => array(
					'margin'      => esc_attr( '.8075em 0' ),
					'padding-top' => esc_attr( '0' ),
				),
				'.wp-block-freeform.block-library-rich-text__tinymce .gallery .gallery-item' => array(
					'padding' => esc_attr( '10px' ),
				),
				'.wp-block-freeform.block-library-rich-text__tinymce blockquote' => array(
					'border-width' => esc_attr( '5px' ),
				),
				$blocks_parent . ' .wp-block-quote.is-large, ' . $blocks_parent . ' .wp-block-quote.is-style-large' => array(
					'border' => esc_attr( 'none' ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block .wp-block-freeform.block-library-rich-text__tinymce dl.wp-caption.aligncenter' => array(
					'margin-left'  => esc_attr( 'auto' ),
					'margin-right' => esc_attr( 'auto' ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block .wp-block-freeform.block-library-rich-text__tinymce dl.wp-caption.alignleft' => array(
					'margin' => esc_attr( '.5em 1em .5em 0' ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block .wp-block-freeform.block-library-rich-text__tinymce dl.wp-caption.alignright' => array(
					'margin' => esc_attr( '.5em 0 .5em 1em' ),
				),
				$blocks_parent . ' .wp-block-embed, ' . $blocks_parent . ' .wp-block-image, ' . $blocks_parent . ' .wp-block-latest-comments__comment' => array(
					'margin-bottom' => esc_attr( '1em' ),
				),
				$blocks_parent . ' .block-editor-block-list__block .block-list-appender' => array(
					'margin-bottom' => esc_attr( '0' ),
				),
				$blocks_parent . ' .wp-block-rss'         => array(
					'padding-left' => esc_attr( '0' ),
				),
				$blocks_parent . ' .block-editor-block-list__block.wp-block-column.wp-block-column' => array(
					'margin-bottom' => esc_attr( '1.75em' ),
				),
				'.wp-block-freeform.block-library-rich-text__tinymce blockquote code' => array(
					'font'  => kemet_get_css_value( '15px Monaco,Consolas,"Andale Mono","DejaVu Sans Mono",monospace', 'font' ),
					'color' => esc_attr( kemet_color_brightness( $headings_links_color, 0.75, 'darken' ) ),
				),
				'.wp-block-freeform.block-library-rich-text__tinymce blockquote code, ' . $blocks_parent . ' code' => array(
					'font-family' => kemet_get_css_value( 'Monaco,Consolas,"Andale Mono","DejaVu Sans Mono",monospace', 'font' ),
				),
				'.block-editor-block-list__block, .wp-block-search .wp-block-search__label' => array(
					'color' => 'var(--textColor)',
				),
				/**
				 * Content base heading color.
				 */
				'.editor-post-title__block .editor-post-title__input, .wc-block-grid__product-title, .edit-post-visual-editor .block-editor-block-list__block h1, .edit-post-visual-editor .block-editor-block-list__block h2, .edit-post-visual-editor .block-editor-block-list__block h3, .edit-post-visual-editor .block-editor-block-list__block h4, .edit-post-visual-editor .block-editor-block-list__block h5, .edit-post-visual-editor .block-editor-block-list__block h6, .edit-post-visual-editor .wp-block-heading, .editor-post-title__block .editor-post-title__input' => array(
					'color' => 'var(--headingLinksColor)',
				),
				// Blockquote Text Color.
				'.edit-post-visual-editor blockquote'     => array(
					'color' => esc_attr( kemet_color_brightness( $headings_links_color, 0.75, 'darken' ) ),
				),
				'.edit-post-visual-editor blockquote .editor-rich-text__tinymce a, .edit-post-visual-editor blockquote a, .edit-post-visual-editor blockquote p' => array(
					'color' => esc_attr( kemet_color_brightness( $headings_links_color, 0.75, 'darken' ) ),
				),
				$blocks_parent . ' .wp-block-pullquote p' => array(
					'font-size'     => esc_attr( '1.75em' ),
					'margin-bottom' => esc_attr( '1.6em' ),
				),
				$blocks_parent . ' .wp-block-pullquote.alignright p, ' . $blocks_parent . ' .wp-block-pullquote.alignleft p' => array(
					'font-size' => esc_attr( '1.25em' ),
				),
				$blocks_parent . ' p, ' . $blocks_parent . ' blockquote p:last-child' => array(
					'margin-bottom' => esc_attr( '1.6em' ),
				),
				$blocks_parent . ' .wp-block-pullquote.is-style-solid-color blockquote p' => array(
					'margin-bottom' => esc_attr( '0' ),
				),
				$blocks_parent . ' .wp-block-pullquote'   => array(
					'margin-bottom' => esc_attr( '1.75em' ),
				),
				$blocks_parent . ' .wp-block-quote.is-large p, ' . $blocks_parent . ' .wp-block-quote.is-style-large p' => array(
					'font-size' => esc_attr( '1.5em' ),
				),
				$blocks_parent . ' .wp-block-gallery'     => array(
					'margin-bottom' => esc_attr( '20px' ),
				),
				$blocks_parent . ' .wp-block-cover__inner-container' => array(
					'max-width' => esc_attr( '840px' ),
				),
				'.block-editor-block-list__block .wp-block-quote:not(.is-large):not(.is-style-large), .edit-post-visual-editor .wp-block-pullquote blockquote, .wp-block-freeform.block-library-rich-text__tinymce blockquote ,.edit-post-visual-editor .wp-block-quote.has-text-align-right, ' . $blocks_parent . ' blockquote, ' . $blocks_parent . ' blockquote.wp-block-quote' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.wp-block-pullquote .wp-block-pullquote__citation' => array(
					'color'          => esc_attr( '#555' ),
					'text-transform' => esc_attr( 'uppercase' ),
					'font-size'      => esc_attr( '.8125em' ),
					'font-style'     => esc_attr( 'normal' ),
				),
				'.edit-post-visual-editor,  ' . $blocks_parent . ' code ,' . $blocks_parent . ' p, ' . $blocks_parent . ' address,.block-editor-block-list__block p, .wp-block-latest-posts a,.editor-default-block-appender textarea.editor-default-block-appender__content, .block-editor-block-list__block, .block-editor-block-list__block h1, .block-editor-block-list__block h2, .block-editor-block-list__block h3, .block-editor-block-list__block h4, .block-editor-block-list__block h5, .block-editor-block-list__block h6, .editor-post-title__block .editor-post-title__input, .edit-post-visual-editor .block-editor-block-list__block table, .edit-post-visual-editor .block-editor-block-list__block dl, ' . $blocks_parent . ' .wp-block-file .wp-block-file__textlink' => array(
					'font-family'     => 'var(--fontFamily, -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif)',
					'font-weight'     => 'var(--fontWeight)',
					'font-size'       => 'var(--fontSize)',
					'letter-spacing'  => 'var(--letterSpacing)',
					'line-height'     => 'var(--lineHeight)',
					'text-transform'  => 'var(--textTransform)',
					'font-style'      => 'var(--fontStyle)',
					'text-decoration' => 'var(--textDecoration)',
				),
				'.block-editor-block-list__block .wp-block-quote__citation' => array(
					'color'      => esc_attr( '#555' ),
					'font-size'  => esc_attr( '.8125em' ),
					'margin-top' => esc_attr( '1em' ),
					'font-style' => esc_attr( 'normal' ),
				),
				'.block-editor-block-list__block.is-large .wp-block-quote__citation' => array(
					'font-size' => esc_attr( '1.125em' ),
				),
				'.editor-post-title.editor-post-title__block .editor-post-title__input' => array(
					'font-family' => 'var(--fontFamily)',
					'font-size'   => kemet_responsive_slider( $single_post_title_font_size, 'desktop' ),
				),
				/**
				 * WooCommerce Grid Products compatibility.
				 */
				'.wc-block-grid__product-title'           => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.editor-styles-wrapper .wc-block-grid__products .wc-block-grid__product .wp-block-button__link, .wc-block-grid__product-onsale' => array(
					'background-color' => 'var(--themeColor)',
					'color'            => 'var(--buttonColor)',
				),
				'.wc-block-grid__products .wc-block-grid__product .wp-block-button__link:hover' => array(
					'color'            => 'var(--buttonHoverColor)',
					'border-color'     => 'var(--borderHoverColor)',
					'background-color' => 'var(--buttonBackgroundHoverColor, var(--buttonBackgroundColor))',

				),
				'.wc-block-grid__products .wc-block-grid__product .wp-block-button__link' => array(
					'border-radius' => kemet_responsive_spacing( $btn_border_radius, 'all', 'desktop' ),
					'padding'       => kemet_responsive_spacing( $btn_padding, 'all', 'desktop' ),
				),
			);

			$parse_css .= kemet_parse_css( $desktop_css );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'body', ':root' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h1', '.edit-post-visual-editor .block-editor-block-list__block h1, .wp-block-heading h1, .wp-block-freeform.block-library-rich-text__tinymce h1, .edit-post-visual-editor .wp-block-heading h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-post-title.editor-post-title__block .editor-post-title__input,.edit-post-visual-editor .block-editor-block-list__layout h1' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h2', '.edit-post-visual-editor .block-editor-block-list__block h2, .wp-block-heading h2, .wp-block-freeform.block-library-rich-text__tinymce h2, .edit-post-visual-editor .wp-block-heading h2, .wp-block-heading h2.editor-rich-text__tinymce,.edit-post-visual-editor .block-editor-block-list__layout h2' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h3', '.edit-post-visual-editor .block-editor-block-list__block h3, .wp-block-heading h3, .wp-block-freeform.block-library-rich-text__tinymce h3, .edit-post-visual-editor .wp-block-heading h3, .wp-block-heading h3.editor-rich-text__tinymce,.edit-post-visual-editor .block-editor-block-list__layout h3' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h4', '.edit-post-visual-editor .block-editor-block-list__block h4, .wp-block-heading h4, .wp-block-freeform.block-library-rich-text__tinymce h4, .edit-post-visual-editor .wp-block-heading h4, .wp-block-heading h4.editor-rich-text__tinymce,.edit-post-visual-editor .block-editor-block-list__layout h4' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h5', '.edit-post-visual-editor .block-editor-block-list__block h5, .wp-block-heading h5, .wp-block-freeform.block-library-rich-text__tinymce h5, .edit-post-visual-editor .wp-block-heading h5, .wp-block-heading h5.editor-rich-text__tinymce,.edit-post-visual-editor .block-editor-block-list__layout h5' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'h6', '.edit-post-visual-editor .block-editor-block-list__block h6, .wp-block-heading h6, .wp-block-freeform.block-library-rich-text__tinymce h6, .edit-post-visual-editor .wp-block-heading h6, .wp-block-heading h6.editor-rich-text__tinymce,.edit-post-visual-editor .block-editor-block-list__layout h6' );
			/**
			 * Global button CSS - Tablet.
			 */
			$css_prod_button_tablet = array(
				'.wc-block-grid__products .wc-block-grid__product .wp-block-button__link' => array(
					'padding' => kemet_responsive_spacing( $btn_padding, 'all', 'tablet' ),
				),
			);

			$parse_css .= kemet_parse_css( $css_prod_button_tablet, '', '768' );

			/**
			 * Global button CSS - Mobile.
			 */
			$css_prod_button_mobile = array(
				'.wc-block-grid__products .wc-block-grid__product .wp-block-button__link' => array(
					'padding' => kemet_responsive_spacing( $btn_padding, 'all', 'mobile' ),
				),
			);

			$parse_css .= kemet_parse_css( $css_prod_button_mobile, '', '544' );

			$button_desktop_css = array(
				/**
				 * Gutenberg button compatibility for default styling.
				 */
				$blocks_parent . ' input[type=reset].button' => array(
					'padding' => esc_attr( '.6em 1em' ),
				),
				'.wp-block-button .wp-block-button__link, .edit-post-visual-editor .block-editor-block-list__block .wp-block-search__button, ' . $blocks_parent . ' .button, ' . $blocks_parent . ' input[type=reset].button' => array(
					'color'              => 'var(--buttonColor)',
					'background-color'   => 'var(--buttonBackgroundColor)',
					'--borderHoverColor' => esc_attr( $btn_border_h_color ),
					'--borderRadius'     => kemet_responsive_spacing( $btn_border_radius, 'all', 'desktop' ),
					'--borderStyle'      => 'solid',
					'--borderColor'      => esc_attr( $btn_border_color ),
					'--borderWidth'      => kemet_slider( $btn_border_size ),
					'--padding'          => kemet_responsive_spacing( $btn_padding, 'all', 'desktop' ),
				),
				'.wp-block-button:not(.is-style-outline) .wp-block-button__link:hover, .wp-block-button:not(.is-style-outline) .wp-block-button__link:focus, ' . $blocks_parent . ' .button:hover, ' . $blocks_parent . ' input[type=reset]:hover' => array(
					'color'            => 'var(--buttonHoverColor, var(--buttonColor))',
					'background-color' => 'var(--buttonBackgroundHoverColor, var(--buttonBackgroundColor))',
					'border-color'     => 'var(--borderHoverColor)',

				),
				'.wp-block-button.is-style-outline .wp-block-button__link' => array(
					'border-width' => esc_attr( '2px' ),
				),
			);

			$parse_css .= kemet_parse_css( $button_desktop_css );

			/**
			 * Global button CSS - Tablet.
			 */
			$css_global_button_tablet = array(
				'.wp-block-button .wp-block-button__link, .edit-post-visual-editor .block-editor-block-list__block .wp-block-search__button,' . $blocks_parent . ' .button, ' . $blocks_parent . ' input[type=reset].button' => array(
					'border-radius' => kemet_responsive_spacing( $btn_border_radius, 'all', 'tablet' ),
					'padding'       => kemet_responsive_spacing( $btn_padding, 'all', 'tablet' ),
				),
			);

			$parse_css .= kemet_parse_css( $css_global_button_tablet, '', '768' );

			/**
			 * Global button CSS - Mobile.
			 */
			$css_global_button_mobile = array(
				'.wp-block-button .wp-block-button__link, .edit-post-visual-editor .block-editor-block-list__block .wp-block-search__button' . $blocks_parent . ' .button, ' . $blocks_parent . ' input[type=reset].button' => array(
					'border-radius' => kemet_responsive_spacing( $btn_border_radius, 'all', 'mobile' ),
					'padding'       => kemet_responsive_spacing( $btn_padding, 'all', 'mobile' ),
				),
			);

			$parse_css .= kemet_parse_css( $css_global_button_mobile, '', '544' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'buttons', '.wp-block-button .wp-block-button__link, .edit-post-visual-editor .block-editor-block-list__block .wp-block-search__button' . $blocks_parent . ' .button, ' . $blocks_parent . ' input[type=reset].button' );

			$desktop_screen_gb_css = array(
				'.wp-block-columns'                  => array(
					'margin-bottom' => 'unset',
				),
				'figure.size-full'                   => array(
					'margin' => '2rem 0',
				),
				'.wp-block-gallery'                  => array(
					'margin-bottom' => '1.6em',
				),
				'.wp-block-group'                    => array(
					'padding-top'    => '4em',
					'padding-bottom' => '4em',
				),
				'.wp-block-group__inner-container:last-child, .wp-block-table table' => array(
					'margin-bottom' => '0',
				),
				'.blocks-gallery-grid'               => array(
					'width' => '100%',
				),
				'.wp-block-navigation-link__content' => array(
					'padding' => '5px 0',
				),
				'.wp-block-group .wp-block-group .has-text-align-center, .wp-block-group .wp-block-column .has-text-align-center' => array(
					'max-width' => '100%',
				),
				'.has-text-align-center'             => array(
					'margin' => '0 auto',
				),
			);

			/* Parse CSS from array() -> Desktop CSS */
			$parse_css .= kemet_parse_css( $desktop_screen_gb_css );

			$middle_screen_min_gb_css = array(
				'.wp-block-cover__inner-container, .alignwide .wp-block-group__inner-container, .alignfull .wp-block-group__inner-container' => array(
					'max-width' => '1240px',
					'margin'    => '0 auto',
				),
				'.wp-block-group.alignnone, .wp-block-group.aligncenter, .wp-block-group.alignleft, .wp-block-group.alignright, .wp-block-group.alignwide, .wp-block-columns.alignwide' => array(
					'margin' => '2rem 0 1rem 0',
				),
			);

			/* Parse CSS from array() -> min-width: (1200)px CSS */
			$parse_css .= kemet_parse_css( $middle_screen_min_gb_css, '1200' );

			$middle_screen_max_gb_css = array(
				'.wp-block-group'                     => array(
					'padding' => '3em',
				),
				'.wp-block-group .wp-block-group'     => array(
					'padding' => '1.5em',
				),
				'.wp-block-columns, .wp-block-column' => array(
					'margin' => '1rem 0',
				),
			);

			/* Parse CSS from array() -> max-width: (1200)px CSS */
			$parse_css .= kemet_parse_css( $middle_screen_max_gb_css, '', '1200' );

			$tablet_screen_min_gb_css = array(
				'.wp-block-columns .wp-block-group' => array(
					'padding' => '2em',
				),
			);

			/* Parse CSS from array() -> min-width: (tablet-breakpoint)px CSS */
			$parse_css .= kemet_parse_css( $tablet_screen_min_gb_css, '768' );

			$mobile_screen_max_gb_css = array(
				'.wp-block-media-text .wp-block-media-text__content' => array(
					'padding' => '3em 2em',
				),
				'.wp-block-cover-image .wp-block-cover__inner-container, .wp-block-cover .wp-block-cover__inner-container' => array(
					'width' => 'unset',
				),
				'.wp-block-cover, .wp-block-cover-image' => array(
					'padding' => '2em 0',
				),
				'.wp-block-group, .wp-block-cover'       => array(
					'padding' => '2em',
				),
				'.wp-block-media-text__media img, .wp-block-media-text__media video' => array(
					'width'     => 'unset',
					'max-width' => '100%',
				),
				'.wp-block-media-text.has-background .wp-block-media-text__content' => array(
					'padding' => '1em',
				),
			);

			/* Parse CSS from array() -> max-width: (mobile-breakpoint)px CSS */
			$parse_css .= kemet_parse_css( $mobile_screen_max_gb_css, '', '544' );

			$tablet_css = array(
				'.editor-post-title__block .editor-post-title__input' => array(
					'font-size' => kemet_responsive_slider( $single_post_title_font_size, 'tablet', 30 ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block input,input[type="text"],.edit-post-visual-editor .block-editor-block-list__block input[type="email"],.edit-post-visual-editor .block-editor-block-list__block input[type="url"],.edit-post-visual-editor .block-editor-block-list__block input[type="password"],.edit-post-visual-editor .block-editor-block-list__block input[type="reset"],.edit-post-visual-editor .block-editor-block-list__block input[type="search"], .edit-post-visual-editor .block-editor-block-list__block textarea , .edit-post-visual-editor .block-editor-block-list__block select,.edit-post-visual-editor .block-editor-block-list__block .widget_search .search-field,.edit-post-visual-editor .block-editor-block-list__block .widget_search .search-field:focus' => array(
					'--padding' => kemet_responsive_spacing( $input_spacing, 'all', 'tablet' ),
				),
			);

			$parse_css .= kemet_parse_css( $tablet_css, '', '768' );

			$mobile_css = array(
				'.editor-post-title__block .editor-post-title__input' => array(
					'font-size' => kemet_responsive_slider( $single_post_title_font_size, 'mobile', 30 ),
				),
				'.edit-post-visual-editor .block-editor-block-list__block input,input[type="text"],.edit-post-visual-editor .block-editor-block-list__block input[type="email"],.edit-post-visual-editor .block-editor-block-list__block input[type="url"],.edit-post-visual-editor .block-editor-block-list__block input[type="password"],.edit-post-visual-editor .block-editor-block-list__block input[type="reset"],.edit-post-visual-editor .block-editor-block-list__block input[type="search"], .edit-post-visual-editor .block-editor-block-list__block textarea , .edit-post-visual-editor .block-editor-block-list__block select,.edit-post-visual-editor .block-editor-block-list__block .widget_search .search-field,.edit-post-visual-editor .block-editor-block-list__block .widget_search .search-field:focus' => array(
					'--padding' => kemet_responsive_spacing( $input_spacing, 'all', 'tablet' ),
				),
			);

			$parse_css .= kemet_parse_css( $mobile_css, '', '544' );

			$woo_global_button_css = array(
				'.editor-styles-wrapper .wc-block-grid__products .wc-block-grid__product .wp-block-button__link' => array(
					'border-color' => esc_attr( $btn_border_color ),
					'border-width' => kemet_slider( $btn_border_size ),
				),
				'.wc-block-grid__products .wc-block-grid__product .wp-block-button__link:hover' => array(
					'border-color' => 'var(--buttonBackgroundHoverColor, var(--buttonBackgroundColor))',
				),
			);
			$parse_css            .= kemet_parse_css( $woo_global_button_css );

			if ( version_compare( get_bloginfo( 'version' ), '5.4.99', '>=' ) ) {

				$page_builder_css = array(
					'.kmt-page-builder-template .editor-post-title__block, .kmt-page-builder-template .editor-default-block-appender' => array(
						'width'     => '100%',
						'max-width' => '100%',
					),
					'.kmt-page-builder-template .wp-block[data-align="right"] > *' => array(
						'max-width' => 'unset',
						'width'     => 'unset',
					),
					'.kmt-page-builder-template .block-editor-block-list__layout' => array(
						'padding-left'  => 0,
						'padding-right' => 0,
					),
					'.kmt-page-builder-template .editor-block-list__block-edit'   => array(
						'padding-left'  => '20px',
						'padding-right' => '20px',
					),
					'.kmt-page-builder-template .editor-block-list__block-edit .editor-block-list__block-edit' => array(
						'padding-left'  => '0',
						'padding-right' => '0',
					),
				);

			} else {

				$page_builder_css = array(
					'.kmt-page-builder-template .editor-post-title__block, .kmt-page-builder-template .editor-default-block-appender, .kmt-page-builder-template .block-editor-block-list__block' => array(
						'width'     => '100%',
						'max-width' => '100%',
					),
					'.kmt-page-builder-template .block-editor-block-list__layout' => array(
						'padding-left'  => 0,
						'padding-right' => 0,
					),
					'.kmt-page-builder-template .editor-block-list__block-edit'   => array(
						'padding-left'  => '20px',
						'padding-right' => '20px',
					),
					'.kmt-page-builder-template .editor-block-list__block-edit .editor-block-list__block-edit' => array(
						'padding-left'  => '0',
						'padding-right' => '0',
					),
				);
			}

			$parse_css .= kemet_parse_css( $page_builder_css );

			$aligned_full_content_css = array(
				'.kmt-page-builder-template .block-editor-block-list__layout .block-editor-block-list__block[data-align="full"] > .block-editor-block-list__block-edit, .kmt-plain-container .block-editor-block-list__layout .block-editor-block-list__block[data-align="full"] > .block-editor-block-list__block-edit' => array(
					'margin-left'  => '0',
					'margin-right' => '0',
				),
				'.kmt-page-builder-template .block-editor-block-list__layout .block-editor-block-list__block[data-align="full"], .kmt-plain-container .block-editor-block-list__layout .block-editor-block-list__block[data-align="full"]' => array(
					'margin-left'  => '0',
					'margin-right' => '0',
				),
			);

			$parse_css .= kemet_parse_css( $aligned_full_content_css );

			$boxed_container = array(
				'.kmt-separate-container .block-editor-writing-flow, .kmt-two-container .block-editor-writing-flow'       => array(
					'width'     => '100%',
					'max-width' => kemet_slider( $site_content_width ),
					'margin'    => '0 auto',
				),
				'.kmt-separate-container .gutenberg__editor, .kmt-two-container .gutenberg__editor'         => array(
					'background-color' => '#f5f5f5',
				),

				'.kmt-separate-container .block-editor-block-list__layout, .kmt-two-container .editor-block-list__layout' => array(
					'padding-top' => '0',
				),

				'.kmt-two-container .editor-post-title, .kmt-separate-container .block-editor-block-list__layout, .kmt-two-container .editor-post-title' => array(
					'padding-top'    => 'calc( 5.34em - 19px)',
					'padding-bottom' => '5.34em',
					'padding-left'   => 'calc( 6.67em - 28px )',
					'padding-right'  => 'calc( 6.67em - 28px )',
				),
				'.kmt-separate-container .block-editor-block-list__layout' => array(
					'padding-top'    => '0',
					'padding-bottom' => '5.34em',
					'padding-left'   => 'calc( 6.67em - 28px )',
					'padding-right'  => 'calc( 6.67em - 28px )',
				),
				'.kmt-separate-container .editor-post-title' => array(
					'padding-top'    => 'calc( 5.34em - 19px)',
					'padding-bottom' => '5.34em',
					'padding-left'   => 'calc( 6.67em - 28px )',
					'padding-right'  => 'calc( 6.67em - 28px )',
				),

				'.kmt-separate-container .editor-post-title, .kmt-two-container .editor-post-title'         => array(
					'padding-bottom' => '0',
				),
				'.kmt-separate-container .editor-block-list__block, .kmt-two-container .editor-block-list__block'  => array(
					'max-width' => 'calc(' . kemet_slider( $site_content_width ) . ' - 6.67em)',
				),
				'.kmt-separate-container .editor-block-list__block[data-align=full], .kmt-two-container .editor-block-list__block[data-align=full]' => array(
					'margin-left'  => '-6.67em',
					'margin-right' => '-6.67em',
				),
				'.kmt-separate-container .block-editor-block-list__layout .block-editor-block-list__block[data-align="full"], .kmt-separate-container .block-editor-block-list__layout .editor-block-list__block[data-align="full"] > .block-editor-block-list__block-edit, .kmt-two-container .block-editor-block-list__layout .editor-block-list__block[data-align="full"], .kmt-two-container .block-editor-block-list__layout .editor-block-list__block[data-align="full"] > .block-editor-block-list__block-edit' => array(
					'margin-left'  => '0',
					'margin-right' => '0',
				),
			);

			$parse_css .= kemet_parse_css( $boxed_container );

			// Manage the extra padding applied in the block inster preview of blocks.
			$block_inserter_css = array(
				'.kmt-separate-container .block-editor-inserter__preview .block-editor-block-list__layout' => array(
					'padding-top'    => '0px',
					'padding-bottom' => '0px',
					'padding-left'   => '0px',
					'padding-right'  => '0px',
				),
			);

			$parse_css .= kemet_parse_css( $block_inserter_css );

			// WP 5.5 compatibility fix the extra padding applied for the block patterns in the editor view.
			if ( version_compare( get_bloginfo( 'version' ), '5.4.99', '>=' ) ) {

				$block_pattern_css = array(
					'.kmt-separate-container .block-editor-inserter__panel-content .block-editor-block-list__layout' => array(
						'padding-top'    => '0px',
						'padding-bottom' => '0px',
						'padding-left'   => '0px',
						'padding-right'  => '0px',

					),
					'.block-editor-inserter__panel-content .block-editor-block-list__layout' => array(
						'margin-left'  => '60px',
						'margin-right' => '60px',
					),
					'.block-editor-inserter__panel-content .block-editor-block-list__layout .block-editor-block-list__layout' => array(
						'margin-left'  => '0px',
						'margin-right' => '0px',
					),
					'.kmt-page-builder-template .block-editor-inserter__panel-content .block-editor-block-list__layout' => array(
						'margin-left'  => '0px',
						'margin-right' => '0px',
					),
				);

				$parse_css .= kemet_parse_css( $block_pattern_css );
			} else {
				$full_width_streched_css = array(
					'.kmt-page-builder-template .block-editor-block-list__layout' => array(
						'margin-left'  => '60px',
						'margin-right' => '60px',
					),
					'.kmt-page-builder-template .block-editor-block-list__layout .block-editor-block-list__layout' => array(
						'margin-left'  => '0px',
						'margin-right' => '0px',
					),
				);

				$parse_css .= kemet_parse_css( $full_width_streched_css );
			}

			$kemet_gtn_mobile_css = array(
				'.kmt-separate-container .editor-post-title' => array(
					'padding-top'   => 'calc( 2.34em - 19px)',
					'padding-left'  => 'calc( 3.67em - 28px )',
					'padding-right' => 'calc( 3.67em - 28px )',
				),
				'.kmt-separate-container .block-editor-block-list__layout' => array(
					'padding-bottom' => '2.34em',
					'padding-left'   => 'calc( 3.67em - 28px )',
					'padding-right'  => 'calc( 3.67em - 28px )',
				),
				'.kmt-page-builder-template .block-editor-block-list__layout' => array(
					'margin-left'  => '30px',
					'margin-right' => '30px',
				),
				'.kmt-plain-container .block-editor-block-list__layout' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
				),
			);

			$parse_css .= kemet_parse_css( $kemet_gtn_mobile_css, '', '544' );

			if ( version_compare( get_bloginfo( 'version' ), '5.4.99', '>=' ) ) {
				$gtn_full_wide_image_css = array(
					'.wp-block[data-align="left"], .wp-block[data-align="right"]' => array(
						'max-width' => '100%',
					),
					'.wp-block[data-align="left"], .wp-block[data-align="right"], .wp-block[data-align="center"]' => array(
						'max-width' => '100%',
						'width'     => '100%',
					),
					'.kmt-separate-container .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > .wp-block[data-align="full"], .kmt-plain-container .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > .wp-block[data-align="full"]' => array(
						'margin-left'  => 'auto',
						'margin-right' => 'auto',
					),
					'.kmt-plain-container .block-editor-block-list__layout .wp-block[data-align="full"] figure.wp-block-image' => array(
						'max-width' => 'unset',
						'width'     => 'unset',
					),
					'.kmt-plain-container .wp-block[data-align="full"] .wp-block-cover' => array(
						'max-width' => 'unset',
						'width'     => 'unset',
					),
					'.kmt-separate-container .block-editor-block-list__layout .wp-block[data-align="full"] figure.wp-block-image' => array(
						'margin-left'  => '-4.8em',
						'margin-right' => '-4.81em',
						'max-width'    => 'unset',
						'width'        => 'unset',
					),
					'.kmt-separate-container .wp-block[data-align="full"] .wp-block-cover' => array(
						'margin-left'  => '-4.8em',
						'margin-right' => '-4.81em',
						'max-width'    => 'unset',
						'width'        => 'unset',
					),
					'.kmt-plain-container [class="wp-block"], .kmt-plain-container .wp-block[data-align="left"], .kmt-plain-container .wp-block[data-align="right"], .kmt-plain-container .wp-block[data-align="center"], .kmt-plain-container .wp-block[data-align="full"]' => array(
						'max-width' => kemet_slider( $site_content_width ),
					),
					'.kmt-plain-container .wp-block[data-align="wide"]' => array(
						'max-width' => kemet_slider( $site_content_width ),
					),
				);
			} else {
				$gtn_full_wide_image_css = array(
					'.kmt-separate-container .block-editor-block-list__layout .block-editor-block-list__block[data-align="full"] figure.wp-block-image' => array(
						'margin-left'  => '-4.8em',
						'margin-right' => '-4.81em',
						'max-width'    => 'unset',
						'width'        => 'unset',
					),
					'.kmt-separate-container .block-editor-block-list__block[data-align="full"] .wp-block-cover' => array(
						'margin-left'  => '-4.8em',
						'margin-right' => '-4.81em',
						'max-width'    => 'unset',
						'width'        => 'unset',
					),
					'.kmt-plain-container .block-editor-block-list__layout .wp-block[data-align="full"] figure.wp-block-image' => array(
						'max-width' => 'unset',
						'width'     => 'unset',
					),
					'.kmt-plain-container .wp-block[data-align="full"] .wp-block-cover' => array(
						'max-width' => 'unset',
						'width'     => 'unset',
					),
				);
			}

			$parse_css .= kemet_parse_css( $gtn_full_wide_image_css );

			if ( ( in_array( $pagenow, array( 'post-new.php' ) ) && ! isset( $post ) ) ) {

				$boxed_container = array(
					'.block-editor-writing-flow'       => array(
						'max-width'        => kemet_slider( $site_content_width ),
						'margin'           => '0 auto',
						'background-color' => '#fff',
					),
					'.gutenberg__editor'               => array(
						'background-color' => '#f5f5f5',
					),
					'.block-editor-block-list__layout, .editor-post-title' => array(
						'padding-top'    => 'calc( 5.34em - 19px)',
						'padding-bottom' => '5.34em',
						'padding-left'   => 'calc( 6.67em - 28px )',
						'padding-right'  => 'calc( 6.67em - 28px )',
					),
					'.block-editor-block-list__layout' => array(
						'padding-top' => '0',
					),
					'.editor-post-title'               => array(
						'padding-bottom' => '0',
					),
					'.block-editor-block-list__block'  => array(
						'max-width' => 'calc(' . kemet_slider( $site_content_width ) . ' - 6.67em)',
					),
					'.block-editor-block-list__block[data-align=full]' => array(
						'margin-left'  => '-6.67em',
						'margin-right' => '-6.67em',
					),
					'.block-editor-block-list__layout .block-editor-block-list__block[data-align="full"], .block-editor-block-list__layout .block-editor-block-list__block[data-align="full"] > .editor-block-list__block-edit' => array(
						'margin-left'  => '0',
						'margin-right' => '0',
					),
				);

				$parse_css .= kemet_parse_css( $boxed_container );

			}

			return $parse_css;
		}
	}
}
