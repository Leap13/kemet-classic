<?php
/**
 * Page Layout Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Page_Title_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'page-title';
		$register_options = array(
			self::$prefix . '-controls-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(),
					),
				),
			),
		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
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
		$register_section = array(
			// 'section-breadcrumbs'       => array(
			// 'title'    => __( 'Breadcrumbs', 'kemet' ),
			// 'panel'    => 'panel-layout',
			// 'priority' => 50,
			// ),
			'section-' . self::$prefix => array(
				'title'    => __( 'Page Title', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 45,
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Page_Title_Customizer();
