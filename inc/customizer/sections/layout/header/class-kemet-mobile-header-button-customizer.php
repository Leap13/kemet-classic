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
									'default'   => __( 'Click Here', 'kemet' ),
									'transport' => 'postMessage',
									'label'     => __( 'Text', 'kemet' ),
								),
								$prefix . '-url'           => array(
									'type'      => 'kmt-text',
									'default'   => '#',
									'divider'   => true,
									'transport' => 'postMessage',
									'label'     => __( 'URL', 'kemet' ),
								),
								$prefix . '-open-new-tab'  => array(
									'type'      => 'kmt-switcher',
									'divider'   => true,
									'transport' => 'postMessage',
									'label'     => __( 'Open in New Tab?', 'kemet' ),
								),
								$prefix . '-link-nofollow' => array(
									'type'      => 'kmt-switcher',
									'divider'   => true,
									'transport' => 'postMessage',
									'label'     => __( 'Set link to nofollow?', 'kemet' ),
								),
								$prefix . '-link-sponsored' => array(
									'type'      => 'kmt-switcher',
									'divider'   => true,
									'transport' => 'postMessage',
									'label'     => __( 'Set link attribute Sponsored?', 'kemet' ),
								),
								$prefix . '-link-download' => array(
									'type'      => 'kmt-switcher',
									'divider'   => true,
									'transport' => 'postMessage',
									'label'     => __( 'Set link to Download?', 'kemet' ),
								),
							),
						),
						'design'  => array(
							'title'   => __( 'Design', 'kemet' ),
							'options' => array(
								$prefix . '-typography'   => array(
									'type'      => 'kmt-typography',
									'transport' => 'postMessage',
									'label'     => __( 'Typography', 'kemet' ),
									'preview'   => array(
										'selector' => $selector,
									),
								),
								$prefix . '-color'        => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'divider'   => true,
									'label'     => __( 'Text Color', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'title' => __( 'Initial', 'kemet' ),
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
								$prefix . '-border-width' => array(
									'type'           => 'kmt-spacing',
									'transport'      => 'postMessage',
									'linked_choices' => true,
									'divider'        => true,
									'responsive'     => false,
									'label'          => __( 'Border Size', 'kemet' ),
									'unit_choices'   => array( 'px', 'em' ),
									'choices'        => array(
										'top'    => __( 'Top', 'kemet' ),
										'right'  => __( 'Right', 'kemet' ),
										'bottom' => __( 'Bottom', 'kemet' ),
										'left'   => __( 'Left', 'kemet' ),
									),
									'preview'        => array(
										'selector' => $selector,
										'property' => '--border',
										'sides'    => false,
									),
								),
								$prefix . '-border-color' => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Border Color', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
								$prefix . '-radius'       => array(
									'type'           => 'kmt-spacing',
									'transport'      => 'postMessage',
									'label'          => __( 'Border Radius', 'kemet' ),
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
										'property' => '--border-radius',
										'sides'    => false,
									),
								),
								$prefix . '-padding'      => array(
									'type'           => 'kmt-spacing',
									'transport'      => 'postMessage',
									'divider'        => true,
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
										'property' => 'margin',
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


