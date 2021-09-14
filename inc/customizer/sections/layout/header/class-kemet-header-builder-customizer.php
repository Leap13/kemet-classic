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
		$builder_options = array(
			// Header Builder
			'header-builder-controls-tabs' => array(
				'type'       => 'kmt-builder-tabs',
				'responsive' => true,
			),
			'header-desktop-items'         => array(
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
						'primary-menu'    => array(
							'name'    => __( 'Primary Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-primary-menu',
						),
						'secondary-menu'  => array(
							'name'    => __( 'Secondary Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-secondary-menu',
						),
						'offcanvas-menu'  => array(
							'name'    => __( 'Off Canvas Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-offcanvas-menu',
						),
						'header-button-1' => array(
							'name'    => __( 'Button 1', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-header-button-1',
						),
						'header-button-2' => array(
							'name'    => __( 'Button 2', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-header-button-2',
						),
						'desktop-toggle'  => array(
							'name'    => __( 'Toggle Button', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-desktop-toggle-button',
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
							'section' => 'sidebar-widgets-header-widget-1',
						),
						'header-widget-2' => array(
							'name'    => __( 'Widget 2', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'sidebar-widgets-header-widget-2',
						),
					)
				),
				'input_attrs' => array(
					'group' => 'header-desktop-items',
					'rows'  => array( 'popup', 'top', 'main', 'bottom' ),
					'zones' => array(
						'popup'  => array(
							'popup_content' => 'Popup Content',
						),
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
			'header-mobile-items'          => array(
				'label'       => __( 'Header Layout Builder', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-builder',
				'choices'     => apply_filters(
					'header_mobile_items',
					array(
						'logo'                   => array(
							'name'    => __( 'Logo', 'kemet' ),
							'icon'    => 'admin-appearance',
							'section' => 'title_tagline',
						),
						'mobile-button'          => array(
							'name'    => __( 'Button', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-mobile-header-button',
						),
						'search'                 => array(
							'name'    => __( 'Search', 'kemet' ),
							'icon'    => 'search',
							'section' => 'section-header-search',
						),
						'search-box'             => array(
							'name'    => __( 'Search Box', 'kemet' ),
							'icon'    => 'search',
							'section' => 'section-header-search-box',
						),
						'offcanvas-menu'         => array(
							'name'    => __( 'Off Canvas Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-offcanvas-menu',
						),
						'mobile-toggle'          => array(
							'name'    => __( 'Toggle Button', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-mobile-toggle-button',
						),
						'header-mobile-html-1'   => array(
							'name'    => __( 'Html 1', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-header-mobile-html-1',
						),
						'header-mobile-html-2'   => array(
							'name'    => __( 'Html 2', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-header-mobile-html-2',
						),
						'header-mobile-button-1' => array(
							'name'    => __( 'Button 1', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-header-mobile-button-1',
						),
						'header-mobile-button-2' => array(
							'name'    => __( 'Button 2', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-header-mobile-button-2',
						),
						'primary-menu'           => array(
							'name'    => __( 'Primary Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-primary-menu',
						),
						'secondary-menu'         => array(
							'name'    => __( 'Secondary Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-header-secondary-menu',
						),
						'header-widget-1'        => array(
							'name'    => __( 'Widget 1', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'sidebar-widgets-header-widget-1',
						),
						'header-widget-2'        => array(
							'name'    => __( 'Widget 2', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'sidebar-widgets-header-widget-2',
						),
					)
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
		);
		$builder_options = array(
			'builder-options' => array(
				'section' => 'section-header-builder',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $builder_options,
				),
			),
		);
		$layout_options  = array(
			'header-desktop-popup-items'    => array(
				'default'   => false,
				'type'      => '',
				'transport' => 'postMessage',
			),
			/**
			 * Header Mobile popup items.
			 */
			'header-mobile-popup-items'     => array(
				'default'   => false,
				'type'      => '',
				'transport' => 'postMessage',
			),
			'header-desktop-availble-items' => array(
				'label'       => __( 'Available Items', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-available',
				'input_attrs' => array(
					'group' => 'header-desktop-items',
					'zones' => array( 'popup', 'top', 'main', 'bottom' ),
				),
				'context'     => array(
					array(
						'setting' => 'device',
						'value'   => 'desktop',
					),
				),
			),
			'header-mobile-availble-items'  => array(
				'label'       => __( 'Available Items', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-available',
				'input_attrs' => array(
					'group' => 'header-mobile-items',
					'zones' => array( 'popup', 'top', 'main', 'bottom' ),
				),
				'context'     => array(
					array(
						'setting'  => 'device',
						'operator' => 'in_array',
						'value'    => array( 'tablet', 'mobile' ),
					),
				),
			),
			'kemet-break-point'             => array(
				'type'         => 'kmt-slider',
				'label'        => __( 'Screen size to switch to mobile header', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 1200,
					),
				),
			),
			'focus-overlay-header-section'  => array(
				'type'          => 'kmt-focus-button',
				'button_params' => array(
					'title'   => __( 'Overlay Header', 'kemet' ),
					'section' => 'section-overlay-header',
				),
			),
			'foucs-sticky-section'          => array(
				'type'          => 'kmt-focus-button',
				'button_params' => array(
					'title'   => __( 'Sticky Header', 'kemet' ),
					'section' => 'section-sticky-header-options',
				),
			),
		);

		$layout_options         = array(
			'builder-layout-options' => array(
				'section' => 'section-header-builder-layout',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $layout_options,
				),
			),
		);
		$header_builder_options = array_merge( $builder_options, $layout_options );
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

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$new_partials                               = array_fill_keys(
			array( 'header-desktop-items', 'header-mobile-items' ),
			array(
				'selector'            => '#sitehead',
				'container_inclusive' => true,
				'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'header_markup' ),
			)
		);
		$new_partials['header-desktop-popup-items'] = array(
			'selector'            => '#kmt-desktop-popup',
			'container_inclusive' => true,
			'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'desktop_popup' ),
		);
		$new_partials['header-mobile-popup-items']  = array(
			'selector'            => '#kmt-mobile-popup',
			'container_inclusive' => true,
			'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'mobile_popup' ),
		);
		return array_merge( $partials, $new_partials );
	}
}

new Kemet_Header_Builder_Customizer();


