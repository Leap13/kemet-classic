<?php
/**
 * Overlay Header Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Overlay_Header_Customizer extends Kemet_Customizer_Register {

	/**
	 * prefix
	 *
	 * @access private
	 * @var string
	 */
	private static $prefix;
	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$prefix        = 'overlay-header';
		$selector            = '.kmt-' . self::$prefix;
		$selector            = $selector . ' #sitehead';
		$menu_selector       = $selector . ' .main-header-menu';
		$search_selector     = $selector . ' .kmt-header-item-search';
		$search_box_selector = $selector . ' .kmt-header-item-search-box';
		$widget_selector     = $selector . ' .kmt-widget-area';
		$html_selector       = $selector . ' .kmt-custom-html';
		$toggle_selector     = $selector . ' .toggle-button';
		$register_options    = array(
			self::$prefix . '-controls-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-enable' => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Enable Overlay Header', 'kemet' ),
							),
							self::$prefix . '-disable-404-archive' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on 404, Search & Archives?', 'kemet' ),
								'context' => array(
									array(
										'setting' => self::$prefix . '-enable',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-disable-blog' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on Blog Page?', 'kemet' ),
								'context' => array(
									array(
										'setting' => self::$prefix . '-enable',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-disable-latest-posts' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on Latest Posts Page?', 'kemet' ),
								'context' => array(
									array(
										'setting' => self::$prefix . '-enable',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-disable-posts' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on Posts?', 'kemet' ),
								'context' => array(
									array(
										'setting' => self::$prefix . '-enable',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-disable-pages' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on Pages?', 'kemet' ),
								'context' => array(
									array(
										'setting' => self::$prefix . '-enable',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-enable-device' => array(
								'type'    => 'kmt-radio',
								'divider' => true,
								'default' => 'desktop_mobile',
								'label'   => __( 'Enable For', 'kemet' ),
								'choices' => array(
									'desktop'        => __( 'Desktop', 'kemet' ),
									'mobile'         => __( 'Mobile', 'kemet' ),
									'desktop_mobile' => __( 'Desktop & Mobile', 'kemet' ),
								),
								'context' => array(
									array(
										'setting' => self::$prefix . '-enable',
										'value'   => true,
									),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-bg-color'   => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Background Overlay', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $selector . ' .top-header-bar, ' . $selector . ' .main-header-bar, ' . $selector . ' .bottom-header-bar',
										'property' => 'background-color',
									),
								),
							),
							self::$prefix . '-menu-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Menu', 'kemet' ),
							),
							self::$prefix . '-menu-link-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Link Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $menu_selector . ' > li > a',
										'property' => '--headingLinksColor',
									),
									'hover'      => array(
										'selector' => $menu_selector . ' > li > a',
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-menu-bg-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Background Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $menu_selector,
										'property' => '--backgroundColor',
									),
								),
							),
							self::$prefix . '-submenu-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Submenu', 'kemet' ),
							),
							self::$prefix . '-submenu-link-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Link Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $menu_selector . ' > li ul > li > a',
										'property' => '--headingLinksColor',
									),
									'hover'      => array(
										'selector' => $menu_selector . ' > li ul > li > a',
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-submenu-bg-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Background Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $menu_selector . ' > li ul > li > a',
										'property' => '--backgroundColor',
									),
									'hover'      => array(
										'selector' => $menu_selector . ' > li ul > li > a:hover',
										'property' => '--backgroundColor',
									),
								),
							),
							self::$prefix . '-search-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Search', 'kemet' ),
							),
							self::$prefix . '-search-icon-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Icon Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $search_selector . ' .kemet-search-icon',
										'property' => '--headingLinksColor',
									),
									'hover'   => array(
										'selector' => $search_selector . ' .kemet-search-icon',
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-search-bg-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $search_selector . ' form',
										'property' => 'background-color',
									),
								),
							),
							self::$prefix . '-search-input-bg-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Input Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' .kmt-search-menu-icon form .search-field',
										'property' => '--inputBackgroundColor',
									),
								),
							),
							self::$prefix . '-search-text-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' .kmt-search-menu-icon form .search-field',
										'property' => '--inputColor',
									),
								),
							),
							self::$prefix . '-search-box-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Search Box', 'kemet' ),
							),
							self::$prefix . '-search-box-icon-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Icon Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $search_box_selector . ' .kmt-search-box-form .icon-search',
										'property' => '--iconColor',
									),
									'hover'   => array(
										'selector' => $search_box_selector . ' .kemet-search-svg-icon-wrap:hover .icon-search',
										'property' => '--iconColor',
									),
								),
							),
							self::$prefix . '-search-box-bg-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' .kmt-search-box-form .search-field',
										'property' => '--inputBackgroundColor',
									),
								),
							),
							self::$prefix . '-search-box-text-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' .kmt-search-box-form .search-field',
										'property' => '--inputColor',
									),
								),
							),
							self::$prefix . '-search-box-border-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' .kmt-search-box-form .search-field',
										'property' => '--inputBorderColor',
									),
								),
							),
							self::$prefix . '-widget-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Widget', 'kemet' ),
							),
							self::$prefix . '-widget-content-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Content Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $widget_selector,
										'property' => '--textColor',
									),
								),
							),
							self::$prefix . '-widget-link-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Link Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $widget_selector,
										'property' => '--headingLinksColor',
									),
									'hover'      => array(
										'selector' => $widget_selector,
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-html-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Html', 'kemet' ),
							),
							self::$prefix . '-html-text-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Text', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $html_selector,
										'property' => '--textColor',
									),
								),
							),
							self::$prefix . '-html-link-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Link Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $html_selector,
										'property' => '--headingLinksColor',
									),
									'hover'      => array(
										'selector' => $html_selector,
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-toggle-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Toggle', 'kemet' ),
							),
							self::$prefix . '-toggle-icon-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Icon Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $toggle_selector,
										'property' => '--buttonColor',
									),
								),
							),
							self::$prefix . '-toggle-bg-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'responsive' => true,
								'label'      => __( 'Background Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $toggle_selector,
										'property' => '--buttonBackgroundColor',
									),
								),
							),
						),
					),
				),
			),
		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $register_options,
				),
			),
		);

		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$register_sections = array(
			'section-' . self::$prefix => array(
				'priority' => 55,
				'title'    => __( 'Overlay Header', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $register_sections );

	}
}


new Kemet_Overlay_Header_Customizer();


