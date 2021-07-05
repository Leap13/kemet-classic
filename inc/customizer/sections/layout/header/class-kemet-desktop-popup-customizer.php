<?php
/**
 * Desktop Popup Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Desktop_Popup_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$desktop_popup_options = array(
			'header-desktop-popup-controls-tabs'   => array(
				'section'  => 'section-desktop-popup-header-builder',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'desktop-popup-layout'                 => array(
				'type'      => 'select',
				'section'   => 'section-desktop-popup-header-builder',
				'transport' => 'postMessage',
				'priority'  => 5,
				'label'     => __( 'Layout', 'kemet' ),
				'choices'   => array(
					'slide' => __( 'Slide', 'kemet' ),
					'full'  => __( 'Full', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			'desktop-popup-slide-width'            => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-desktop-popup-header-builder',
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
						'setting' => 'desktop-popup-layout',
						'value'   => 'slide',
					),
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			'desktop-popup-slide-side'             => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'section'   => 'section-desktop-popup-header-builder',
				'priority'  => 15,
				'label'     => __( 'Slide-Out Side', 'kemet' ),
				'choices'   => array(
					'left'  => __( 'Left', 'kemet' ),
					'right' => __( 'Right', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'desktop-popup-layout',
						'value'   => 'slide',
					),
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			'desktop-popup-content-align'          => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'section'   => 'section-desktop-popup-header-builder',
				'priority'  => 20,
				'label'     => __( 'Content Align', 'kemet' ),
				'choices'   => array(
					'left'   => __( 'Left', 'kemet' ),
					'center' => __( 'Center', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			'desktop-popup-content-vertical-align' => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'section'   => 'section-desktop-popup-header-builder',
				'priority'  => 25,
				'label'     => __( 'Content Vertical Align', 'kemet' ),
				'choices'   => array(
					'top'    => __( 'Top', 'kemet' ),
					'center' => __( 'Center', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			'desktop-popup-background'             => array(
				'type'      => 'kmt-background',
				'transport' => 'postMessage',
				'section'   => 'section-mobile-popup-header-builder',
				'priority'  => 10,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'desktop-popup-close-btn-color'        => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'section'   => 'section-desktop-popup-header-builder',
				'priority'  => 35,
				'label'     => __( 'Close Icon Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => ' #kmt-desktop-popup .toggle-button-close',
					'property' => '--buttonColor',
				),
			),
		);

		return array_merge( $options, $desktop_popup_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$desktop_popup_sections = array(
			'section-desktop-popup-header-builder' => array(
				'priority' => 35,
				'title'    => __( 'Desktop Popup', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $desktop_popup_sections );

	}
}


new Kemet_Desktop_Popup_Customizer();


