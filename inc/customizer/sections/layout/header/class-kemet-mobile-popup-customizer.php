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

class Kemet_Mobile_Popup_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$mobile_popup_options = array(
			'header-mobile-popup-controls-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'mobile-popup-layout'        => array(
								'type'      => 'kmt-select',
								'transport' => 'postMessage',
								'label'     => __( 'Layout', 'kemet' ),
								'choices'   => array(
									'slide' => __( 'Slide', 'kemet' ),
									'full'  => __( 'Full', 'kemet' ),
								),
							),
							'mobile-popup-slide-width'   => array(
								'type'         => 'kmt-slider',
								'divider'      => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Enter Width', 'kemet' ),
								'unit_choices' => array(
									'%' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'context'      => array(
									array(
										'setting' => 'mobile-popup-layout',
										'value'   => 'slide',
									),
								),
							),
							'mobile-popup-slide-side'    => array(
								'type'      => 'kmt-select',
								'divider'   => true,
								'transport' => 'postMessage',
								'label'     => __( 'Slide-Out Side', 'kemet' ),
								'choices'   => array(
									'left'  => __( 'Left', 'kemet' ),
									'right' => __( 'Right', 'kemet' ),
								),
								'context'   => array(
									array(
										'setting' => 'mobile-popup-layout',
										'value'   => 'slide',
									),
								),
							),
							'mobile-popup-content-align' => array(
								'type'      => 'kmt-select',
								'divider'   => true,
								'transport' => 'postMessage',
								'label'     => __( 'Content Align', 'kemet' ),
								'choices'   => array(
									'left'   => __( 'Left', 'kemet' ),
									'center' => __( 'Center', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
								),
							),
							'mobile-popup-content-vertical-align' => array(
								'type'      => 'kmt-select',
								'transport' => 'postMessage',
								'label'     => __( 'Content Vertical Align', 'kemet' ),
								'choices'   => array(
									'top'    => __( 'Top', 'kemet' ),
									'center' => __( 'Center', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'mobile-popup-background'      => array(
								'type'      => 'kmt-background',
								'transport' => 'postMessage',
								'label'     => __( 'Background', 'kemet' ),
								'preview'   => array(
									'selector' => '.kmt-mobile-popup-content',
								),
							),
							'mobile-popup-close-btn-color' => array(
								'type'      => 'kmt-color',
								'divider'   => true,
								'transport' => 'postMessage',
								'label'     => __( 'Close Icon Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => ' #kmt-mobile-popup .toggle-button-close',
										'property' => '--buttonColor',
									),
								),
							),
						),
					),
				),
			),
		);

		$mobile_popup_options = array(
			'mobile-popup-options' => array(
				'section' => 'section-mobile-popup-header-builder',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $mobile_popup_options,
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
			'section-mobile-popup-header-builder' => array(
				'priority' => 35,
				'title'    => __( 'Mobile Popup', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $mobile_popup_sections );

	}
}


new Kemet_Mobile_Popup_Customizer();


