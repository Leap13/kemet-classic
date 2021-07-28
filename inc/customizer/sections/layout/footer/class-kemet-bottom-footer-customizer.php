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

class Kemet_Bottom_Footer_Customizer extends Kemet_Customizer_Register {
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
		self::$prefix     = 'bottom-footer';
		$register_options = array(
			'bottom-footer-columns' => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-radio',
				'label'     => __( 'Columns', 'kemet' ),
				'choices'   => array(
					'1' => __( '1', 'kemet' ),
					'2' => __( '2', 'kemet' ),
					'3' => __( '3', 'kemet' ),
					'4' => __( '4', 'kemet' ),
					'5' => __( '5', 'kemet' ),
				),
			),
			'bottom-footer-layout'  => array(
				'type'      => 'kmt-row-layout',
				'label'     => __( 'Layout', 'kemet' ),
				'transport' => 'postMessage',
				'row'       => 'main',
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
		$bottom_footer_sections = array(
			'section-' . self::$prefix . '-builder' => array(
				'priority' => 45,
				'title'    => __( 'Bottom Footer', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $bottom_footer_sections );

	}

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$new_partials = array_fill_keys(
			array( 'bottom-footer-columns', 'bottom-footer-layout' ),
			array(
				'selector'            => '#colophon',
				'container_inclusive' => true,
				'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'footer_markup' ),
			)
		);
		return array_merge( $partials, $new_partials );
	}
}

new Kemet_Bottom_Footer_Customizer();
