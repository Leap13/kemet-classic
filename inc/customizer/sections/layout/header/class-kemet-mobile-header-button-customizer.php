<?php
/**
 * Header Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Mobile_Button_Customizer extends Kemet_Customizer_Register {

	/**
	 * Button Items
	 *
	 * @access private
	 * @var array
	 */
	private static $button_items;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$button_items = apply_filters( 'kemet_header_mobile_button_items', array( 'header-mobile-button-1', 'header-mobile-button-2' ) );
		$register_options   = array();
		foreach ( self::$button_items as $button ) {
			$prefix         = $button;
			$num            = explode( 'header-mobile-button-', $prefix )[1];
			$selector       = '.' . $button;
			$button_options = array(
				$prefix . '-tabs' => array(
					'type' => 'kmt-tabs',
					'tabs' => array(
						'general' => array(
							'title'   => __( 'General', 'kemet' ),
							'options' => array(
								$prefix . '-label'         => array(
									'type'      => 'kmt-text',
									'default'   => __( 'Button', 'kemet' ),
									'transport' => 'postMessage',
									'label'     => __( 'Label', 'kemet' ),
								),
								$prefix . '-url'           => array(
									'type'      => 'kmt-text',
									'transport' => 'postMessage',
									'label'     => __( 'URL', 'kemet' ),
								),
								$prefix . '-open-new-tab'  => array(
									'type'      => 'kmt-switcher',
									'transport' => 'postMessage',
									'label'     => __( 'Open in New Tab?', 'kemet' ),
								),
								$prefix . '-link-nofollow' => array(
									'type'      => 'kmt-switcher',
									'transport' => 'postMessage',
									'label'     => __( 'Set link to nofollow?', 'kemet' ),
								),
								$prefix . '-link-sponsored' => array(
									'type'      => 'kmt-switcher',
									'transport' => 'postMessage',
									'label'     => __( 'Set link attribute Sponsored?', 'kemet' ),
								),
								$prefix . '-link-download' => array(
									'type'      => 'kmt-switcher',
									'transport' => 'postMessage',
									'label'     => __( 'Set link to Download?', 'kemet' ),
								),
							),
						),
						'design'  => array(
							'title'   => __( 'Design', 'kemet' ),
							'options' => array(
								$prefix . '-color'        => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Text Color', 'kemet' ),
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
											'property' => '--buttonColor',
										),
										'hover'   => array(
											'selector' => $selector,
											'property' => '--buttonHoverColor',
										),
									),
								),
								$prefix . '-bg-color'     => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Background Color', 'kemet' ),
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
											'property' => '--buttonBackgroundColor',
										),
										'hover'   => array(
											'selector' => $selector,
											'property' => '--buttonBackgroundHoverColor',
										),
									),
								),
								$prefix . '-border-color' => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Border Color', 'kemet' ),
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
											'property' => '--borderColor',
										),
										'hover'   => array(
											'selector' => $selector,
											'property' => '--borderHoverColor',
										),
									),
								),
								$prefix . '-font-size'    => array(
									'type'         => 'kmt-slider',
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
										'selector' => $selector,
										'property' => '--fontSize',
									),
								),
								// $prefix . '-font-family'    => array(
								// 'type'      => 'kmt-font-family',
								// 'transport' => 'postMessage',
								// 'label'     => __( 'Font Family', 'kemet' ),
								// 'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-weight]',
								// ),
								// $prefix . '-font-weight'    => array(
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
								$prefix . '-font-style'   => array(
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
								$prefix . '-line-height'  => array(
									'type'         => 'kmt-slider',
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
										'selector' => $selector,
										'property' => '--lineHeight',
									),
								),
								$prefix . '-letter-spacing' => array(
									'type'         => 'kmt-slider',
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
										'selector' => $selector,
										'property' => '--letterSpacing',
									),
								),
								$prefix . '-border-width' => array(
									'type'         => 'kmt-slider',
									'default'      => 1,
									'transport'    => 'postMessage',
									'label'        => __( 'Border Size', 'kemet' ),
									'unit_choices' => array(
										'px' => array(
											'min'  => 0,
											'step' => 1,
											'max'  => 50,
										),
									),
									'preview'      => array(
										'selector' => $selector,
										'property' => '--borderWidth',
									),
								),
								$prefix . '-padding'      => array(
									'type'           => 'kmt-spacing',
									'transport'      => 'postMessage',
									'label'          => __( 'Padding', 'kemet' ),
									'linked_choices' => true,
									'unit_choices'   => array( 'px', 'em', '%' ),
									'choices'        => array(
										'top'    => __( 'Top', 'kemet' ),
										'right'  => __( 'Right', 'kemet' ),
										'bottom' => __( 'Bottom', 'kemet' ),
										'left'   => __( 'Left', 'kemet' ),
									),
									'preview'        => array(
										'selector' => $selector,
										'property' => '--padding',
										'sides'    => false,
									),
								),
								$prefix . '-margin'       => array(
									'type'           => 'kmt-spacing',
									'transport'      => 'postMessage',
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
										'selector' => $selector,
										'property' => '--margin',
										'sides'    => false,
									),
								),
							),
						),
					),
				),
			);

			$button_options = array(
				$prefix . '-options' => array(
					'section' => 'section-' . $prefix,
					'type'    => 'kmt-options',
					'data'    => array(
						'options' => $button_options,
					),
				),
			);

			$register_options = array_merge( $register_options, $button_options );
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
		foreach ( self::$button_items as $button ) {
			$prefix         = $button;
			$num            = explode( 'header-mobile-button-', $prefix )[1];
			$button_section = array(
				'section-' . $prefix => array(
					'priority' => 60,
					'title'    => sprintf( __( 'Header Mobile Button %s', 'kemet' ), $num ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $button_section );
		}

		return array_merge( $sections, $register_sections );

	}
}

new Kemet_Header_Mobile_Button_Customizer();


