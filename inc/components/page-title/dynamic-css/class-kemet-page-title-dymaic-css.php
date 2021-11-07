<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Page_Title_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Page_Title_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$prefix   = 'page-title';
			$selector = '.kmt-page-title-content';

			$theme_color                  = kemet_get_sub_option( 'theme-color', 'initial' );
			$text_meta_color              = kemet_get_sub_option( 'text-meta-color', 'initial' );
			$global_bg_color              = kemet_get_sub_option( 'global-background-color', 'initial' );
			$page_title_bg                = kemet_get_option(
				$prefix . '-background',
				array(
					'desktop' => array(
						'background-color' => kemet_color_brightness( $global_bg_color, 0.9, 'dark' ),
						'background-type'  => 'color',
					),
				)
			);
			$page_title_space             = kemet_get_option( $prefix . '-spacing' );
			$page_title_color             = kemet_get_sub_option( $prefix . '-color', 'initial' );
			$page_title_bottomline_height = kemet_get_option( $prefix . '-bottomline-height' );
			$page_title_bottomline_color  = kemet_get_sub_option( $prefix . '-bottomline-color', 'initial', $theme_color );
			$page_title_bottomline_width  = kemet_get_option( $prefix . '-bottomline-width' );
			$layout3_border_right_color   = kemet_get_sub_option( $prefix . '-border-right-color', 'initial' );
			$page_title_algin             = kemet_get_option( $prefix . '-alignment' );

			// Breadcrumbs.
			$breadcrumbs_prefix       = 'breadcrumbs';
			$breadcrumbs_spacing      = kemet_get_option( $breadcrumbs_prefix . '-spacing' );
			$breadcrumbs_color        = kemet_get_sub_option( $breadcrumbs_prefix . '-color', 'initial', $page_title_color );
			$breadcrumbs_link_color   = kemet_get_sub_option( $breadcrumbs_prefix . '-link-color', 'initial', $page_title_color );
			$breadcrumbs_link_h_color = kemet_get_sub_option( $breadcrumbs_prefix . '-link-color', 'hover', $theme_color );
			// Subtitle
			$subtitle_color = kemet_get_sub_option( 'sub-title-color', 'initial', $page_title_color );
			$subtitle_color = apply_filters( 'sub_title_color', $subtitle_color );

			$css_content = array(
				$selector . ', .header-transparent ' . $selector . ',.merged-header-transparent ' . $selector => array(
					'--padding' => kemet_responsive_spacing( $page_title_space, 'all', 'desktop' ),
				),
				'.kemet-page-title'                   => array(
					'font-family'    => 'var(--fontFamily)',
					'--headingColor' => esc_attr( $page_title_color ),
				),
				'.taxonomy-description'               => array(
					'color' => 'var(--linksColor)',
				),
				'.kmt-page-title.page-title-layout-1' => array(
					'text-align' => esc_attr( $page_title_algin ),
				),
				'.kemet-page-title::after'            => array(
					'background-color' => esc_attr( $page_title_bottomline_color ),
					'height'           => kemet_slider( $page_title_bottomline_height ),
					'width'            => kemet_slider( $page_title_bottomline_width ),
				),
				'.page-title-layout-3 .kmt-page-title-wrap' => array(
					'border-color' => esc_attr( $layout3_border_right_color ),
				),
				'.kemet-breadcrumb-trail'             => array(
					'font-family'       => 'var(--fontFamily)',
					'--padding'         => kemet_responsive_spacing( $breadcrumbs_spacing, 'all', 'desktop' ),
					'--linksColor'      => esc_attr( $breadcrumbs_link_color ),
					'--linksHoverColor' => esc_attr( $breadcrumbs_link_h_color ),
					'--textColor'       => esc_attr( $breadcrumbs_color ),
				),
				'.kemet-page-sub-title'               => array(
					'--headingColor' => esc_attr( $subtitle_color ),
				),
			);

			$parse_css = kemet_parse_css( $css_content );
			// Background.
			$parse_css .= kemet_get_responsive_background_obj( $selector . ', .kemet-merged-header-title', $page_title_bg );

			$tablet = array(
				$selector . ', .header-transparent ' . $selector . ',.merged-header-transparent ' . $selector => array(
					'--padding' => kemet_responsive_spacing( $page_title_space, 'all', 'tablet' ),
				),
				'.kemet-breadcrumb-trail' => array(
					'--padding' => kemet_responsive_spacing( $breadcrumbs_spacing, 'all', 'tablet' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $tablet, '', '768' );

			$mobile = array(
				$selector . ', .header-transparent ' . $selector . ',.merged-header-transparent ' . $selector => array(
					'--padding' => kemet_responsive_spacing( $page_title_space, 'all', 'mobile' ),
				),
				'.kemet-breadcrumb-trail' => array(
					'--padding' => kemet_responsive_spacing( $breadcrumbs_spacing, 'all', 'mobile' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $mobile, '', '544' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'page-title', $selector . ' .kemet-page-title' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'sub-title', '.kemet-page-sub-title' );
			$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'breadcrumbs', '.kemet-breadcrumb-trail' );

			$dynamic_css .= $parse_css;

			return $dynamic_css;
		}
	}
}

new Kemet_Page_Title_Dynamic_Css();

