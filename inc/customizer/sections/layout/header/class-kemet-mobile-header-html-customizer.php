<?php
/**
 * Mobile Header Html1 Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Mobile_Header_Html1_Customizer extends Kemet_Customizer_Register {

	/**
	 * Html Items
	 *
	 * @access private
	 * @var array
	 */
	private static $html_items;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$html_items = apply_filters( 'kemet_header_mobile_html_items', array( 'header-mobile-html-1', 'header-mobile-html-2' ) );

		$register_options = array();
		foreach ( self::$html_items as $html ) {
			$prefix       = $html;
			$num          = explode( 'header-mobile-html-', $prefix )[1];
			$html_options = array(
				$prefix . '-controls-tabs'    => array(
					'section'  => 'section-' . $prefix,
					'type'     => 'kmt-tabs',
					'priority' => 0,
				),
				$prefix . '-text'             => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 1,
					'label'     => __( 'Html', 'kemet' ),
					'transport' => 'postMessage',
					'type'      => 'textarea',
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
					'partial'   => array(
						'selector'            => '.kmt-' . $prefix,
						'container_inclusive' => false,
						'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'render_html_mobile_' . $num ),
					),
				),
				$prefix . '-color'            => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Text Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-link-color'       => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-link-hover-color' => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 10,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Hover Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
			);

			$register_options = array_merge( $register_options, $html_options );
		}

		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$register_sections = array();
		foreach ( self::$html_items as $html ) {
			$prefix       = $html;
			$num          = explode( 'header-mobile-html-', $prefix )[1];
			$html_section = array(
				'section-' . $prefix => array(
					'priority' => 60,
					'title'    => sprintf( __( 'Header Html %s', 'kemet' ), $num ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $html_section );
		}

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Mobile_Header_Html1_Customizer();


