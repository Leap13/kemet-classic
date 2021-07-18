<?php
/**
 * Footer Builder Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Builder_Customizer extends Kemet_Customizer_Register {
	/**
	 * Footer Zones.
	 *
	 * @var array
	 * @since 3.0.0
	 */
	public static $zones = array(
		'top'   => array(),
		'main' => array(),
		'bottom'   => array(),
	);

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$builder_options = array(
			// Footer Builder
			'footer-builder-controls-tabs' => array(
				'type' => 'kmt-builder-tabs',
			),
			'footer-desktop-items'         => array(
				'label'       => __( 'Footer Layout Builder', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-builder',
				'choices'     => apply_filters(
					'footer_desktop_items',
					array(
						'footer-button-1' => array(
							'name'    => __( 'Button 1', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-footer-button-1',
						),
						'footer-button-2' => array(
							'name'    => __( 'Button 2', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-footer-button-2',
						),
						'footer-html-1'   => array(
							'name'    => __( 'Html 1', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-footer-html-1',
						),
						'footer-html-2'   => array(
							'name'    => __( 'Html 2', 'kemet' ),
							'icon'    => 'text',
							'section' => 'section-footer-html-2',
						),
						'footer-widget-1' => array(
							'name'    => __( 'Widget 1', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'sidebar-widgets-footer-widget-1',
						),
						'footer-widget-2' => array(
							'name'    => __( 'Widget 2', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'sidebar-widgets-footer-widget-2',
						),
						'footer-widget-3' => array(
							'name'    => __( 'Widget 3', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'sidebar-widgets-footer-widget-2',
						),
						'footer-widget-4' => array(
							'name'    => __( 'Widget 4', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'sidebar-widgets-footer-widget-2',
						),
					)
				),
				'input_attrs' => array(
					'group' => 'footer-desktop-items',
					'rows'  => array( 'top', 'main', 'bottom' ),
					'zones'   => self::$zones,
					'layouts' => array(
						'top'   => array(
							'column' => kemet_get_option( 'hba-footer-column' ),
							'layout' => kemet_get_option( 'hba-footer-layout' ),
						),
						'main' => array(
							'column' => kemet_get_option( 'hb-footer-column' ),
							'layout' => kemet_get_option( 'hb-footer-layout' ),
						),
						'bottom'   => array(
							'column' => kemet_get_option( 'hbb-footer-column' ),
							'layout' => kemet_get_option( 'hbb-footer-layout' ),
						),
					),
					'status'  => array(
						'top'   => true,
						'main' => true,
						'bottom'   => true,
					),
				),
				// 'context'     => array(
				// 	array(
				// 		'setting' => 'device',
				// 		'value'   => 'desktop',
				// 	),
				// ),
			),
		);
		$builder_options = array(
			'builder-options' => array(
				'section' => 'section-footer-builder',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $builder_options,
				),
			),
		);
		$layout_options  = array(
			'footer-desktop-popup-items'    => array(
				'default'   => false,
				'type'      => '',
				'transport' => 'postMessage',
			),
			/**
			 * Footer Mobile popup items.
			 */
			'footer-mobile-popup-items'     => array(
				'default'   => false,
				'type'      => '',
				'transport' => 'postMessage',
			),
			'footer-desktop-availble-items' => array(
				'label'       => __( 'Available Items', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-available',
				'input_attrs' => array(
					'group' => 'footer-desktop-items',
					'zones' => array( 'top', 'main', 'bottom' ),
				),
				// 'context'     => array(
				// 	array(
				// 		'setting' => 'device',
				// 		'value'   => 'desktop',
				// 	),
				// ),
			),
		);

		$layout_options         = array(
			'builder-layout-options' => array(
				'section' => 'section-footer-builder-layout',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $layout_options,
				),
			),
		);
		$footer_builder_options = array_merge( $builder_options, $layout_options );
		return array_merge( $options, $footer_builder_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$footer_builder_sections = array(
			'section-footer-builder'        => array(
				'priority' => 5,
				'title'    => __( 'Footer Builder', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
			'section-footer-builder-layout' => array(
				'priority' => 10,
				'title'    => __( 'Footer Layout', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $footer_builder_sections );
	}

	/**
	 * Register Panels
	 *
	 * @param array $panels panels.
	 * @return array
	 */
	public function register_panels( $panels ) {
		$footer_builder_panels = array(
			'panel-footer-builder-group' => array(
				'priority' => 10,
				'title'    => __( 'Footer Builder', 'kemet' ),
			),
		);
		return array_merge( $panels, $footer_builder_panels );

	}

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$new_partials                               = array_fill_keys(
			array( 'footer-desktop-items' ),
			array(
				'selector'            => '#sitehead',
				'container_inclusive' => true,
				'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'footer_markup' ),
			)
		);
		return array_merge( $partials, $new_partials );
	}
}

new Kemet_Footer_Builder_Customizer();


