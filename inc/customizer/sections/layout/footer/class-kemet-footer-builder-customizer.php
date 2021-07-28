<?php
/**
 * Bottom Footer Options for Kemet Theme.
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
		$builder_options = array(
			'footer-items' => array(
				'label'       => __( 'Footer Layout Builder', 'kemet' ),
				'transport'   => 'postMessage',
				'type'        => 'kmt-builder',
				'choices'     => apply_filters(
					'footer_items',
					array()
				),
				'input_attrs' => array(
					'group'   => 'footer-items',
					'rows'    => array( 'top', 'main', 'bottom' ),
					'columns' => array(
						'top'    => kemet_get_option( 'top-footer-columns' ),
						'main'   => kemet_get_option( 'main-footer-columns' ),
						'bottom' => kemet_get_option( 'bottom-footer-columns' ),
					),
					'layouts' => array(
						'top'    => kemet_get_option( 'top-footer-layout' ),
						'main'   => kemet_get_option( 'main-footer-layout' ),
						'bottom' => kemet_get_option( 'bottom-footer-layout' ),
					),
					'zones'   => array(
						'top'    => array(
							'top_1' => 'Top - 1',
							'top_2' => 'Top - 2',
							'top_3' => 'Top - 3',
							'top_4' => 'Top - 4',
							'top_5' => 'Top - 5',
						),
						'main'   => array(
							'main_1' => 'Main - 1',
							'main_2' => 'Main - 2',
							'main_3' => 'Main - 3',
							'main_4' => 'Main - 4',
							'main_5' => 'Main - 5',
						),
						'bottom' => array(
							'bottom_1' => 'Bottom - 1',
							'bottom_2' => 'Bottom - 2',
							'bottom_3' => 'Bottom - 3',
							'bottom_4' => 'Bottom - 4',
							'bottom_5' => 'Bottom - 5',
						),
					),
				),
			),
		);

		$builder_options = array(
			'footer-builder-options' => array(
				'section' => 'section-footer-builder',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $builder_options,
				),
			),
		);
		return array_merge( $options, $builder_options );
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
				'priority' => 60,
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
		$partials['footer-items'] = array(
			'selector'            => '#colophon',
			'container_inclusive' => true,
			'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'footer_markup' ),
		);
		return $partials;
	}
}

new Kemet_Footer_Builder_Customizer();
