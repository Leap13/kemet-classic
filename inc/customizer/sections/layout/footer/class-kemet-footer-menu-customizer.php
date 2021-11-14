<?php
/**
 * Footer Menu Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Menu ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Menu_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'footer-menu';
		$selector         = has_nav_menu( self::$prefix ) ? '#' . self::$prefix : '#' . self::$prefix . ' > ul';
		$register_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-items-direction' => array(
								'type'      => 'kmt-radio',
								'transport' => 'postMessage',
								'default'   => 'initial',
								'label'     => __( 'Items Direction', 'kemet' ),
								'choices'   => array(
									'initial' => __( 'Horizontal', 'kemet' ),
									'100%'    => __( 'Vertical', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $selector . ' > li',
									'property' => '--itemsWidth',
								),
							),
							self::$prefix . '-items-align' => array(
								'type'      => 'kmt-icon-select',
								'transport' => 'postMessage',
								'default'   => 'flex-start',
								'label'     => __( 'Horizontal Alignment', 'kemet' ),
								'choices'   => array(
									'flex-start' => array(
										'icon' => 'dashicons-editor-alignleft',
									),
									'center'     => array(
										'icon' => 'dashicons-editor-aligncenter',
									),
									'flex-end'   => array(
										'icon' => 'dashicons-editor-alignright',
									),
								),
								'preview'   => array(
									'selector' => $selector,
									'property' => '--justifyContent',
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-items-direction',
										'value'   => '100%',
									),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-typography' => array(
								'type'      => 'kmt-typography',
								'label'     => __( 'Typography', 'kemet' ),
								'transport' => 'postMessage',
								'preview'   => array(
									'selector' => $selector . ' > li > a',
								),
							),
							self::$prefix . '-bg-color'   => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'divider'   => true,
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--backgroundColor',
									),
								),
							),
							self::$prefix . '-link-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Links Color', 'kemet' ),
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
										'property' => '--linksColor',
									),
									'hover'   => array(
										'selector' => $selector,
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-spacing'    => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'divider'        => true,
								'label'          => __( 'Menu Padding', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector,
									'property'   => '--padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
							self::$prefix . '-item-spacing' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'label'          => __( 'Menu Item Padding', 'kemet' ),
								'linked_choices' => true,
								'responsive'     => true,
								'divider'        => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector . ' li > a',
									'property'   => '--padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
						),

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
		$register_sections = array(
			'section-' . self::$prefix => array(
				'priority' => 85,
				'title'    => __( 'Footer Menu', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Footer_Menu_Customizer();


