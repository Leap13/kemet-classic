<?php
/**
 * Header Html Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_mobile_Header_Html_Customizer extends Kemet_Customizer_Register {

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
		self::$html_items = apply_filters( 'kemet_header_html_items', array( 'header-mobile-html-1', 'header-mobile-html-2' ) );

		$register_options = array();
		foreach ( self::$html_items as $html ) {
			$prefix       = $html;
			$selector     = '.kmt-' . $prefix;
			$html_options = array(
				$prefix . '-tabs' => array(
					'type' => 'kmt-tabs',
					'tabs' => array(
						'general' => array(
							'title'   => __( 'General', 'kemet' ),
							'options' => array(
								$prefix . '-text' => array(
									'label'     => __( 'Html', 'kemet' ),
									'transport' => 'postMessage',
									'type'      => 'kmt-editor',
								),
							),
						),
						'design'  => array(
							'title'   => __( 'Design', 'kemet' ),
							'options' => array(
								$prefix . '-color'       => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Text Color', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Text', 'kemet' ),
											'id'    => 'initial',
										),
									),
									'preview'   => array(
										'initial' => array(
											'selector' => $selector,
											'property' => '--textColor',
										),
									),
								),
								$prefix . '-link-color'  => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Link Color', 'kemet' ),
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
											'selector' => $selector,
											'property' => '--headingLinksColor',
										),
										'hover'   => array(
											'selector' => $selector,
											'property' => '--linksHoverColor',
										),
									),
								),
								$prefix . '-font-size'   => array(
									'type'         => 'kmt-slider',
									'responsive'   => true,
									'transport'    => 'postMessage',
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
									'preview'      => array(
										'selector'   => $selector,
										'property'   => '--fontSize',
										'responsive' => true,
									),
								),
								// $prefix . '-font-family'      => array(
								// 'type'      => 'kmt-font-family',
								// 'transport' => 'postMessage',
								// 'label'     => __( 'Font Family', 'kemet' ),
								// 'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-weight]',
								// ),
								// $prefix . '-font-weight'      => array(
								// 'type'      => 'kmt-font-weight',
								// 'transport' => 'postMessage',
								// 'label'     => __( 'Font Weight', 'kemet' ),
								// 'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-family]',
								// ),
								$prefix . '-text-transform' => array(
									'type'      => 'kmt-select',
									'transport' => 'postMessage',
									'label'     => __( 'Text Transform', 'kemet' ),
									'choices'   => array(
										''           => __( 'Default', 'kemet' ),
										'none'       => __( 'None', 'kemet' ),
										'capitalize' => __( 'Capitalize', 'kemet' ),
										'uppercase'  => __( 'Uppercase', 'kemet' ),
										'lowercase'  => __( 'Lowercase', 'kemet' ),
									),
									'preview'   => array(
										'selector' => $selector,
										'property' => '--textTransform',
									),
								),
								$prefix . '-font-style'  => array(
									'type'      => 'kmt-select',
									'transport' => 'postMessage',
									'label'     => __( 'Font Style', 'kemet' ),
									'choices'   => array(
										'inherit' => __( 'Inherit', 'kemet' ),
										'normal'  => __( 'Normal', 'kemet' ),
										'italic'  => __( 'Italic', 'kemet' ),
										'oblique' => __( 'Oblique', 'kemet' ),
									),
									'preview'   => array(
										'selector' => $selector,
										'property' => '--fontStyle',
									),
								),
								$prefix . '-line-height' => array(
									'type'         => 'kmt-slider',
									'responsive'   => true,
									'transport'    => 'postMessage',
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
									'preview'      => array(
										'selector'   => $selector,
										'property'   => '--lineHeight',
										'responsive' => true,
									),
								),
								$prefix . '-letter-spacing' => array(
									'type'         => 'kmt-slider',
									'responsive'   => true,
									'transport'    => 'postMessage',
									'label'        => __( 'Letter Spacing', 'kemet' ),
									'unit_choices' => array(
										'px' => array(
											'min'  => 0.1,
											'step' => 0.1,
											'max'  => 10,
										),
									),
									'preview'      => array(
										'selector'   => $selector,
										'property'   => '--letterSpacing',
										'responsive' => true,
									),
								),
							),
						),
					),
				),
			);

			$html_options = array(
				$prefix . '-options' => array(
					'section' => 'section-' . $prefix,
					'type'    => 'kmt-options',
					'data'    => array(
						'options' => $html_options,
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

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		foreach ( self::$html_items as $html ) {
			$prefix                        = $html;
			$num                           = explode( 'header-mobile-html-', $prefix )[1];
			$partials[ $prefix . '-text' ] = array(
				'selector'            => '.kmt-' . $prefix,
				'container_inclusive' => false,
				'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'render_html_mobile_' . $num ),
			);
		}

		return $partials;
	}
}


new Kemet_Mobile_Header_Html_Customizer();


