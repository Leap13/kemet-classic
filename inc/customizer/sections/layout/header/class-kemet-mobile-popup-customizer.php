<?php
/**
 * Mobile Popup Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_mobile_Popup_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$mobile_popup_options = array(
			'header-popup-controls-tabs'          => array(
				'section'  => 'section-popup-header-builder',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'mobile-popup-layout'                 => array(
				'type'     => 'select',
				'section'  => 'section-popup-header-builder',
				'priority' => 5,
				'label'    => __( 'Layout', 'kemet' ),
				'choices'  => array(
					'slide' => __( 'Slide', 'kemet' ),
					'full'  => __( 'Full', 'kemet' ),
				),
			),
			'mobile-popup-slide-width'            => array(
				'type'        => 'kmt-slider',
				'section'     => 'section-popup-header-builder',
				'priority'    => 10,
				'label'       => __( 'Enter Width', 'kemet' ),
				'suffix'      => '%',
				'input_attrs' => array(
					'min'  => 10,
					'step' => 1,
					'max'  => 100,
				),
				'context'     => array(
					array(
						'setting' => 'mobile-popup-layout',
						'value'   => 'slide',
					),
				),
			),
			'mobile-popup-slide-side'             => array(
				'type'     => 'select',
				'section'  => 'section-popup-header-builder',
				'priority' => 15,
				'label'    => __( 'Slide-Out Side', 'kemet' ),
				'choices'  => array(
					'left'  => __( 'Left', 'kemet' ),
					'right' => __( 'Right', 'kemet' ),
				),
				'context'  => array(
					array(
						'setting' => 'mobile-popup-layout',
						'value'   => 'slide',
					),
				),
			),
			'mobile-popup-content-align'          => array(
				'type'     => 'select',
				'section'  => 'section-popup-header-builder',
				'priority' => 20,
				'label'    => __( 'Content Align', 'kemet' ),
				'choices'  => array(
					'left'   => __( 'Left', 'kemet' ),
					'center' => __( 'Center', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
				),
			),
			'mobile-popup-content-vertical-align' => array(
				'type'     => 'select',
				'section'  => 'section-popup-header-builder',
				'priority' => 25,
				'label'    => __( 'Content Vertical Align', 'kemet' ),
				'choices'  => array(
					'top'    => __( 'Top', 'kemet' ),
					'center' => __( 'Center', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
				),
			),
		);

		return array_merge( $options, $mobile_popup_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$mobile_popup_sections = array(
			'section-popup-header-builder' => array(
				'priority' => 35,
				'title'    => __( 'Mobile Popup', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $mobile_popup_sections );

	}
}


new Kemet_mobile_Popup_Customizer();

