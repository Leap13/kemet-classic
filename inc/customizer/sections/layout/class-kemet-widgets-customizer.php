<?php
/**
 * Widget Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Widgets_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$register_options = array(
			'widget-tabs'       => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'widgets-style'        => array(
								'type'    => 'kmt-select',
								'label'   => __( 'Widgets Style', 'kemet' ),
								'choices' => array(
									'style1' => __( 'Style 1', 'kemet' ),
									'style2' => __( 'Style 2', 'kemet' ),
									'style3' => __( 'Style 3', 'kemet' ),
									'style4' => __( 'Style 4', 'kemet' ),
								),
							),
							'widget-padding'       => array(
								'type'           => 'kmt-spacing',
								'divider'        => true,
								'transport'      => 'postMessage',
								'responsive'     => true,
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
									'selector'   => '.sidebar-main .widget',
									'property'   => 'padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
							'widget-margin-bottom' => array(
								'type'         => 'kmt-slider',
								'divider'      => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Margin Bottom', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 10,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector' => '.sidebar-main .widget',
									'property' => 'margin-bottom',
									'unit'     => 'px',
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'widget-bg-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Widget Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kmt-separate-container.kmt-two-container #secondary div.widget , div.widget',
										'property' => 'background-color',
									),
								),
							),
						),
					),
				),
			),
			'widget_list-title' => array(
				'type'  => 'kmt-title',
				'label' => __( 'List Settings', 'kemet' ),
			),
			'widget-list-tabs'  => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'enable-widget-list-separator' => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Enable Widget List Separator', 'kemet' ),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'widget-list-border-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Separator Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.widget ul > li,.widget.yith-woocompare-widget ul.products-list li:not( .list_empty )',
										'property' => '--borderBottomColor',
									),
								),
							),
						),
					),
				),
			),
		);

		$register_options = array(
			'widgets-options' => array(
				'section' => 'section-widgets',
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
		$register_section = array(
			'section-widgets' => array(
				'title'    => __( 'Widgets', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 35,
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Widgets_Customizer();
