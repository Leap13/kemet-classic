<?php
/**
 * Buttons for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Preformance_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$register_options = array(
			'disable-emojis-script' => array(
				'type'        => 'kmt-switcher',
				'label'       => __( 'Disable Emojis Script', 'kemet' ),
				'description' => __( 'Enable this option if you want to remove WordPress emojis script in order to improve the performance.', 'kemet' ),
			),
		);
		$register_options = array(
			'preformance-options' => array(
				'section' => 'section-preformance',
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
			'section-preformance' => array(
				'priority' => 65,
				'title'    => __( 'Preformance', 'kemet' ),
				'infoLink' => esc_url( 'https://kemet.io/docs/performance/' ),
			),
		);

		return array_merge( $sections, $register_sections );
	}
}

new Kemet_Preformance_Customizer();
