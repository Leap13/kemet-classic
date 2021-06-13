<?php
/**
 * Header Account Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Account_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$account_options = array(
			'header-account-controls-tabs' => array(
				'section'  => 'section-header-account',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
		);

		return array_merge( $options, $account_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$account_sections = array(
			'section-header-account' => array(
				'priority' => 90,
				'title'    => __( 'Account', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $account_sections );

	}
}


new Kemet_Header_Account_Customizer();


