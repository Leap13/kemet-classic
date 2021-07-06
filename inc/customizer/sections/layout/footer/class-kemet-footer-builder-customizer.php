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
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$footer_builder_options = array(
			// Footer Builder
			'footer-builder-controls-tabs'  => array(
				'section'    => 'section-footer-builder',
				'type'       => 'kmt-tabs',
				'priority'   => 0,
				'tabs_type'  => 'builder-controls',
				'responsive' => false,
			),
			'footer-desktop-items'          => array(
				'section'     => 'section-footer-builder',
				'priority'    => 1,
				'label'       => __( 'Footer Layout Builder', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-builder',
				'choices'     => apply_filters(
					'footer_desktop_items',
					array(
						'footer-menu'    => array(
							'name'    => __( 'Footer Menu', 'kemet' ),
							'icon'    => 'menu',
							'section' => 'section-footer-primay-menu',
						),
						'button'          => array(
							'name'    => __( 'Button', 'kemet' ),
							'icon'    => 'button',
							'section' => 'section-footer-button',
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
							'section' => 'section-footer-widget-1',
						),
						'footer-widget-2' => array(
							'name'    => __( 'Widget 2', 'kemet' ),
							'icon'    => 'wordpress-alt',
							'section' => 'section-footer-widget-2',
						),
					)
				),
				'partial'     => array(
					'selector'            => '#colophon',
					'container_inclusive' => true,
					'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'footer_markup' ),
				),
				'input_attrs' => array(
					'group' => 'footer-desktop-items',
					'rows'  => array( 'top', 'main', 'bottom' ),
					'columns' => array(
						'top'    => kemet_get_option( 'top-footer-columns' ),
						'main'   => kemet_get_option( 'main-footer-columns' ),
						'bottom' => kemet_get_option( 'bottom-footer-columns' ),
					),
					'partial'               => array(
						'selector'            => '#colophon',
						'container_inclusive' => true,
						'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'footer_markup' ),
					),
					'zones' => array(

						'top'    => array(
							'top_1' => 'Top - 1',
							'top_2' => 'Top - 2',
							'top_3' => 'Top - 3',
							'top_4' => 'Top - 4',
							'top_5' => 'Top - 5',
							'top_6' => 'Top - 6',
						),
						'main'   => array(
							'main_1' => 'Main - 1',
							'main_2' => 'Main - 2',
							'main_3' => 'Main - 3',
							'main_4' => 'Main - 4',
							'main_5' => 'Main - 5',
							'main_6' => 'Main - 6',
						),
						'bottom' => array(
							'bottom_1' => 'Bottom - 1',
							'bottom_2' => 'Bottom - 2',
							'bottom_3' => 'Bottom - 3',
							'bottom_4' => 'Bottom - 4',
							'bottom_5' => 'Bottom - 5',
							'bottom_6' => 'Bottom - 6',
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
			'footer-builder-tabs'           => array(
				'section'  => 'section-footer-builder-layout',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'footer-availble-items' => array(
				'section'     => 'section-footer-builder-layout',
				'priority'    => 1,
				'label'       => __( 'Available Items', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-available',
				'input_attrs' => array(
					'group' => 'footer-desktop-items',
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
		);

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
				'priority' => 8,
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
}

new Kemet_Footer_Builder_Customizer();


