<?php
/**
 * Main Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Main_Footer_Customizer extends Kemet_Customizer_Register {
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
		self::$prefix     = 'main-footer';
		$register_options = array(
			'main-footer-columns' => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Main Layout', 'kemet' ),
				'choices'   => array(
					'1' => __( '1', 'kemet' ),
					'2' => __( '2', 'kemet' ),
					'3' => __( '3', 'kemet' ),
					'4' => __( '4', 'kemet' ),
					'5' => __( '5', 'kemet' ),
				),
			),
		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix . '-builder',
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
		$main_footer_sections = array(
			'section-' . self::$prefix . '-builder' => array(
				'priority' => 45,
				'title'    => __( 'Main Footer', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $main_footer_sections );

	}
}

new Kemet_Main_Footer_Customizer();
