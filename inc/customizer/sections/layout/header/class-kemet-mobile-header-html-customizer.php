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
				$prefix . '-colors-group'     => array(
					'type'     => 'kmt-group',
					'section'  => 'section-' . $prefix,
					'priority' => 2,
					'label'    => __( 'Colors', 'kemet' ),
					'context'  => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-color'            => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Text Color', 'kemet' ),
					'tab'       => __( 'Normal', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-link-color'       => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Color', 'kemet' ),
					'tab'       => __( 'Normal', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-link-hover-color' => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 10,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Color', 'kemet' ),
					'tab'       => __( 'Hover', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-font-size'        => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-header-' . $prefix,
					'priority'     => 12,
					'label'        => __( 'Font Size', 'kemet' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 200,
						),
						'em' => array(
							'min'  => 0.1,
							'step' => 0.1,
							'max'  => 10,
						),
					),
					'context'      => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-font-family'      => array(
					'type'      => 'kmt-font-family',
					'transport' => 'postMessage',
					'label'     => __( 'Font Family', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 15,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-weight]',
				),
				$prefix . '-font-weight'      => array(
					'type'      => 'kmt-font-weight',
					'transport' => 'postMessage',
					'label'     => __( 'Font Weight', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 20,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-family]',
				),
				$prefix . '-text-transform'   => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Text Transform', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 25,
					'choices'   => array(
						''           => __( 'Default', 'kemet' ),
						'none'       => __( 'None', 'kemet' ),
						'capitalize' => __( 'Capitalize', 'kemet' ),
						'uppercase'  => __( 'Uppercase', 'kemet' ),
						'lowercase'  => __( 'Lowercase', 'kemet' ),
					),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-font-style'       => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Font Style', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 30,
					'choices'   => array(
						'inherit' => __( 'Inherit', 'kemet' ),
						'normal'  => __( 'Normal', 'kemet' ),
						'italic'  => __( 'Italic', 'kemet' ),
						'oblique' => __( 'Oblique', 'kemet' ),
					),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-line-height'      => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 35,
					'label'        => __( 'Line Height', 'kemet' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 0,
							'step' => 1,
							'max'  => 100,
						),
						'em' => array(
							'min'  => 0,
							'step' => 1,
							'max'  => 10,
						),
					),
					'context'      => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-letter-spacing'   => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 40,
					'label'        => __( 'Letter Spacing', 'kemet' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 0.1,
							'step' => 0.1,
							'max'  => 10,
						),
					),
					'context'      => array(
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
					'title'    => sprintf( __( 'Header Mobile Html %s', 'kemet' ), $num ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $html_section );
		}

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Mobile_Header_Html1_Customizer();

