<?php
/**
 * Header Divider Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2021, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Divider_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix    = 'divider';
		$selector        = '.kmt-divider-container';
		$divider_options = array(
			self::$prefix . '-item-style' => array(
				'type'      => 'kmt-radio',
				'default'   => 'divider-vertical',
				'transport' => 'postMessage',
				'label'     => __( 'Divider Style', 'kemet' ),
				'choices'   => array(
					'divider-vertical'   => __( 'Vertical', 'kemet' ),
					'divider-horizontal' => __( 'Horizontal', 'kemet' ),
				),
			),
			self::$prefix . '-width'      => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-border',
				'default'   => array(
					'style' => 'solid',
					'width' => 1,
					'color' => 'var(--borderColor)',
				),
				'label'     => __( 'Style', 'kemet' ),
				'preview'   => array(
					'selector' => $selector,
					'property' => '--border',
				),
			),
			self::$prefix . '-size'       => array(
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'default'      => Kemet_Customizer::responsive_default_value( 20, 'px' ),
				'transport'    => 'postMessage',
				'label'        => __( 'Size', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 200,
					),
				),
				'preview'      => array(
					'selector'   => $selector,
					'property'   => '--size',
					'responsive' => true,
				),
			),
			self::$prefix . '-margin'     => array(
				'type'           => 'kmt-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'label'          => __( 'Margin', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => $selector,
					'property'   => 'margin',
					'sides'      => false,
					'responsive' => true,
				),
			),
		);

		$divider_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-header-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $divider_options,
				),
			),
		);

		return array_merge( $options, $divider_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$divider_sections = array(
			'section-header-' . self::$prefix => array(
				'title' => __( 'Divider', 'kemet' ),
				'panel' => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $divider_sections );

	}
}


new Kemet_Header_Divider_Customizer();


