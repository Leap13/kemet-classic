<?php
/**
 * Header Builder Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Builder_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$header_builder_options = array(
			// Header Builder
			'header-builder-controls-tabs'  => array(
				'section'    => 'section-header-builder',
				'type'       => 'kmt-tabs',
				'priority'   => 0,
				'tabs_type'  => 'builder-controls',
				'responsive' => true,
			),
			'header-desktop-items'          => array(
				'section'     => 'section-header-builder',
				'priority'    => 1,
				'label'       => __( 'Header Layout Builder', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-builder',
				'choices'     => apply_filters(
					'header_desktop_items',
					array(
						'logo'            => array(
							'name'    => __( 'Logo', 'kemet' ),
							'icon'    => 'admin-appearance',
							'section' => 'title_tagline',
						),
						'search'          => array(
							'name'    => __( 'Search', 'kemet' ),
							'icon'    => 'search',
							'section' => 'section-header-search',
						),
						'search-box'      => array(
							'name'    => __( 'Search Box', 'kemet' ),
							'icon'    => 'search',
							'section' => 'section-header-search-box',
						),
						'account'         => array(
							'name'    => __( 'Account', 'kemet' ),
							'icon'    => 'admin-users',
							'section' => 'section-header-account',
						),
						'primary-menu'    => array(
							'name'    => __( 'Primary Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-primay-menu',
						),
						'secondary-menu'  => array(
							'name'    => __( 'Secondary Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-secondary-menu',
						),
						'button'          => array(
							'name'    => __( 'Button', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-header-button',
						),
						'header-html-1'   => array(
							'name'    => __( 'Html 1', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-header-html-1',
						),
						'header-html-2'   => array(
							'name'    => __( 'Html 2', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-header-html-2',
						),
						'header-widget-1' => array(
							'name'    => __( 'Widget 1', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'section-header-widget-1',
						),
						'header-widget-2' => array(
							'name'    => __( 'Widget 2', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'section-header-widget-2',
						),
					)
				),
				'partial'     => array(
					'selector'            => '#sitehead',
					'container_inclusive' => true,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'header_markup' ),
				),
				'input_attrs' => array(
					'group' => 'header-desktop-items',
					'rows'  => array( 'top', 'main', 'bottom' ),
					'zones' => array(
						'top'    => array(
							'top_left'         => 'Top - Left',
							'top_left_center'  => 'Top - Left Center',
							'top_center'       => 'Top - Center',
							'top_right_center' => 'Top - Right Center',
							'top_right'        => 'Top - Right',
						),
						'main'   => array(
							'main_left'         => 'Main - Left',
							'main_left_center'  => 'Main - Left Center',
							'main_center'       => 'Main - Center',
							'main_right_center' => 'Main - Right Center',
							'main_right'        => 'Main - Right',
						),
						'bottom' => array(
							'bottom_left'         => 'Bottom - Left',
							'bottom_left_center'  => 'Bottom - Left Center',
							'bottom_center'       => 'Bottom - Center',
							'bottom_right_center' => 'Bottom - Right Center',
							'bottom_right'        => 'Bottom - Right',
						),
					),
				),
				'context'     => array(
					array(
						'setting' => 'device',
						'value'   => 'desktop',
					),
				),
			),
			'header-mobile-items'           => array(
				'section'     => 'section-header-builder',
				'priority'    => 1,
				'responsive'  => true,
				'label'       => __( 'Header Layout Builder', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-builder',
				'choices'     => apply_filters(
					'header_mobile_items',
					array(
						'logo'                 => array(
							'name'    => __( 'Logo', 'kemet' ),
							'icon'    => 'admin-appearance',
							'section' => 'title_tagline',
						),
						'mobile-button'        => array(
							'name'    => __( 'Button', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-mobile-header-button',
						),
						'search'               => array(
							'name'    => __( 'Search', 'kemet' ),
							'icon'    => 'search',
							'section' => 'section-header-search-menu',
						),
						'search-box'           => array(
							'name'    => __( 'Search Box', 'kemet' ),
							'icon'    => 'search',
							'section' => 'section-header-search-box',
						),
						'account'              => array(
							'name'    => __( 'Account', 'kemet' ),
							'icon'    => 'admin-users',
							'section' => 'section-header-account',
						),
						'mobile-menu'          => array(
							'name'    => __( 'Mobile Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-mobile-menu',
						),
						'mobile-toggle'        => array(
							'name'    => __( 'Toggle Button', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-mobile-header-toggle-button',
						),
						'header-html-mobile-1' => array(
							'name'    => __( 'Html 1', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-mobile-header-html-1',
						),
						'header-html-mobile-2' => array(
							'name'    => __( 'Html 2', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-mobile-header-html-2',
						),
						'header-widget-1'      => array(
							'name'    => __( 'Widget 1', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'section-header-widget-1',
						),
						'header-widget-2'      => array(
							'name'    => __( 'Widget 2', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'section-header-widget-2',
						),
					)
				),
				'partial'     => array(
					'selector'            => '#sitehead',
					'container_inclusive' => true,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'header_markup' ),
				),
				'input_attrs' => array(
					'group' => 'header-mobile-items',
					'rows'  => array( 'popup', 'top', 'main', 'bottom' ),
					'zones' => array(
						'popup'  => array(
							'popup_content' => 'Popup Content',
						),
						'top'    => array(
							'top_left'   => 'Top - Left',
							'top_center' => 'Top - Center',
							'top_right'  => 'Top - Right',
						),
						'main'   => array(
							'main_left'   => 'Main - Left',
							'main_center' => 'Main - Center',
							'main_right'  => 'Main - Right',
						),
						'bottom' => array(
							'bottom_left'   => 'Bottom - Left',
							'bottom_center' => 'Bottom - Center',
							'bottom_right'  => 'Bottom - Right',
						),
					),
				),
				'context'     => array(
					array(
						'setting'  => 'device',
						'operator' => 'in_array',
						'value'    => array( 'tablet', 'mobile' ),
					),
				),
			),
			// Header Layout
			/**
			 * Header Mobile popup items.
			 */
			'header-mobile-popup-items'     => array(
				'section'   => 'section-header-builder-layout',
				'default'   => false,
				'type'      => 'kmt-hidden',
				'priority'  => 0,
				'transport' => 'postMessage',
				'partial'   => array(
					'selector'            => '#kmt-mobile-popup',
					'container_inclusive' => true,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'mobile_popup' ),
				),
			),
			'header-builder-tabs'           => array(
				'section'  => 'section-header-builder-layout',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'header-desktop-availble-items' => array(
				'section'     => 'section-header-builder-layout',
				'priority'    => 1,
				'label'       => __( 'Available Items', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-available',
				'input_attrs' => array(
					'group' => 'header-desktop-items',
					'zones' => array( 'top', 'main', 'bottom' ),
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
					array(
						'setting' => 'device',
						'value'   => 'desktop',
					),
				),
			),
			'header-mobile-availble-items'  => array(
				'section'     => 'section-header-builder-layout',
				'priority'    => 1,
				'label'       => __( 'Available Items', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-available',
				'input_attrs' => array(
					'group' => 'header-mobile-items',
					'zones' => array( 'popup', 'top', 'main', 'bottom' ),
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
					array(
						'setting'  => 'device',
						'operator' => 'in_array',
						'value'    => array( 'tablet', 'mobile' ),
					),
				),
			),
			// Html 1
			'header-html-1-tabs'            => array(
				'section'  => 'section-header-html-1',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'header-html-1'                 => array(
				'section'   => 'section-header-html-1',
				'priority'  => 1,
				'label'     => __( 'Html', 'kemet' ),
				'transport' => 'postMessage',
				'type'      => 'textarea',
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
				'partial'   => array(
					'selector'            => '.kmt-header-html-1',
					'container_inclusive' => false,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'render_html_1' ),
				),
			),
			'header-html-mobile-1'          => array(
				'section'   => 'section-header-html-mobile-1',
				'priority'  => 1,
				'label'     => __( 'Html', 'kemet' ),
				'transport' => 'postMessage',
				'type'      => 'textarea',
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
				'partial'   => array(
					'selector'            => '.kmt-header-html-mobile-1',
					'container_inclusive' => false,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'render_html_mobile_1' ),
				),
			),
			// Html 2
			'header-html-2-tabs'            => array(
				'section'  => 'section-header-html-2',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'header-html-2'                 => array(
				'section'   => 'section-header-html-2',
				'priority'  => 1,
				'label'     => __( 'Html', 'kemet' ),
				'transport' => 'postMessage',
				'type'      => 'textarea',
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
				'partial'   => array(
					'selector'            => '.kmt-header-html-2',
					'container_inclusive' => false,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'render_html_2' ),
				),
			),
			'header-html-mobile-2'          => array(
				'section'   => 'section-header-html-mobile-2',
				'priority'  => 1,
				'label'     => __( 'Html', 'kemet' ),
				'transport' => 'postMessage',
				'type'      => 'textarea',
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
				'partial'   => array(
					'selector'            => '.kmt-header-html-mobile-2',
					'container_inclusive' => false,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'render_html_mobile_2' ),
				),
			),
		);

		return array_merge( $options, $header_builder_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$header_builder_sections = array(
			'section-header-builder'        => array(
				'priority' => 5,
				'title'    => __( 'Header Builder', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
			'section-header-builder-layout' => array(
				'priority' => 10,
				'title'    => __( 'Header Layout', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $header_builder_sections );
	}

	/**
	 * Register Panels
	 *
	 * @param array $panels panels.
	 * @return array
	 */
	public function register_panels( $panels ) {
		$header_builder_panels = array(
			'panel-header-builder-group' => array(
				'priority' => 10,
				'title'    => __( 'Header Builder', 'kemet' ),
			),
		);
		return array_merge( $panels, $header_builder_panels );

	}
}

new Kemet_Header_Builder_Customizer();


