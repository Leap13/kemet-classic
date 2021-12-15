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
			'disable-emojis-script'     => array(
				'type'        => 'kmt-switcher',
				'label'       => __( 'Disable Emojis Script', 'kemet' ),
				'description' => __( 'Enable this option if you want to remove WordPress emojis script in order to improve the performance.', 'kemet' ),
			),
			'load-google-fonts-locally' => array(
				'type'      => 'kmt-switcher',
				'transport' => 'postMessage',
				'label'     => __( 'Load Google Fonts Locally', 'kemet' ),
			),
			'preload-google-fonts'      => array(
				'type'      => 'kmt-switcher',
				'transport' => 'postMessage',
				'label'     => __( 'Preload Local Fonts', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'load-google-fonts-locally',
						'value'   => true,
					),
				),
			),
			'clear-google-fonts-cache'  => array(
				'type'        => 'kmt-clear-cache',
				'transport'   => 'postMessage',
				'label'       => __( 'Flush Local Fonts Cache', 'kemet' ),
				'description' => __( 'Click the button to reset the local fonts cache.', 'kemet' ),
				'context'     => array(
					array(
						'setting' => 'load-google-fonts-locally',
						'value'   => true,
					),
				),
			),
			'dynamic-css-type'          => array(
				'type'        => 'kmt-radio',
				'default'     => 'inline',
				'transport'   => 'postMessage',
				'label'       => __( 'Dynamic CSS Output', 'kemet' ),
				'description' => __( 'The strategy of outputting the dynamic CSS. File - all the CSS code will be placed in a static file, otherwise it will be placed inline in head.', 'kemet' ),
				'choices'     => array(
					'inline' => __( 'Inline', 'kemet' ),
					'file'   => __( 'File', 'kemet' ),
				),
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
