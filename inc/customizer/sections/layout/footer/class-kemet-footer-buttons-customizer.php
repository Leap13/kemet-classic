<?php
/**
 * Footer Buttons Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Buttons ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Buttons_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$btn_selector     = '.site-footer button, .site-footer .button, .site-footer .kmt-button, .site-footer input[type=button], .site-footer input[type=reset] ,.site-footer input[type="submit"], .site-footer .wp-block-button a.wp-block-button__link, .site-footer .wp-block-search button.wp-block-search__button';
		$register_options = array(
			'footer-button-color'        => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Text Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => $btn_selector,
						'property' => '--buttonColor',
					),
					'hover'   => array(
						'selector' => $btn_selector,
						'property' => '--buttonHoverColor',
					),
				),
			),
			'footer-button-bg-color'     => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Background Color', 'kemet' ),
				'section'   => 'section-buttons-fields',
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => $btn_selector,
						'property' => '--buttonBackgroundColor',
					),
					'hover'   => array(
						'selector' => $btn_selector,
						'property' => '--buttonBackgroundHoverColor',
					),
				),
			),
			'footer-button-border-width' => array(
				'type'         => 'kmt-spacing',
				'divider'      => true,
				'responsive'   => false,
				'transport'    => 'postMessage',
				'label'        => __( 'Border Size', 'kemet' ),
				'unit_choices' => array( 'px', 'em' ),
				'choices'      => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'      => array(
					'selector' => $btn_selector,
					'property' => '--borderWidth',
					'sides'    => false,
				),
			),
			'footer-button-border-color' => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Border Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => $btn_selector,
						'property' => '--borderColor',
					),
					'hover'   => array(
						'selector' => $btn_selector,
						'property' => '--borderHoverColor',
					),
				),
			),
			'footer-button-radius'       => array(
				'type'           => 'kmt-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'label'          => __( 'Border Radius', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => $btn_selector,
					'property'   => '--borderRadius',
					'sides'      => false,
					'responsive' => true,
				),
			),
		);

		$register_options = array(
			'footer-buttons-options' => array(
				'section' => 'section-footer-buttons',
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
			'section-footer-buttons' => array(
				'priority' => 85,
				'title'    => __( 'Buttons', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Footer_Buttons_Customizer();


