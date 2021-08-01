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
			'widget-tabs'        => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'widget-padding'       => array(
								'type'           => 'kmt-responsive-spacing',
								'transport'      => 'postMessage',
								'label'          => __( 'Spacing', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector' => '.sidebar-main .widget',
									'property' => 'padding',
									'sides'    => false,
								),
							),
							'widget-margin-bottom' => array(
								'type'        => 'kmt-slider',
								'transport'   => 'postMessage',
								'label'       => __( 'Margin Bottom (PX)', 'kemet' ),
								'suffix'      => '',
								'input_attrs' => array(
									'min'  => 10,
									'step' => 1,
									'max'  => 100,
								),
								'preview'     => array(
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
			'widget_title-title' => array(
				'type'  => 'kmt-title',
				'label' => __( 'Title Settings', 'kemet' ),
			),
			'widget-title-tabs'  => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'enable-widget-title-separator' => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Enable Widget Title Separator', 'kemet' ),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'widget-title-font-size'      => array(
								'transport'    => 'postMessage',
								'type'         => 'kmt-responsive-slider',
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
									'selector' => '.widget-head .widget-title , .widget-title',
									'property' => '--fontSize',
								),
							),
							// 'widget-title-font-family'      => array(
							// 'type'     => 'kmt-font-family',
							// 'label'    => __( 'Font Family', 'kemet' ),
							// 'connect'  => KEMET_THEME_SETTINGS . '[widget-title-font-weight]',
							// ),
							// 'widget-title-font-weight'      => array(
							// 'type'     => 'kmt-font-weight',
							// 'label'    => __( 'Font Weight', 'kemet' ),
							// 'connect'  => KEMET_THEME_SETTINGS . '[widget-title-font-family]',
							// ),
							'widget-title-text-transform' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-select',
								'label'     => __( 'Text Transform', 'kemet' ),
								'choices'   => array(
									''           => __( 'Default', 'kemet' ),
									'none'       => __( 'None', 'kemet' ),
									'capitalize' => __( 'Capitalize', 'kemet' ),
									'uppercase'  => __( 'Uppercase', 'kemet' ),
									'lowercase'  => __( 'Lowercase', 'kemet' ),
								),
								'preview'   => array(
									'selector' => '.widget-head .widget-title , .widget-title',
									'property' => '--textTransform',
								),
							),
							'widget-title-font-style'     => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-select',
								'label'     => __( 'Font Style', 'kemet' ),
								'choices'   => array(
									'inherit' => __( 'Inherit', 'kemet' ),
									'normal'  => __( 'Normal', 'kemet' ),
									'italic'  => __( 'Italic', 'kemet' ),
									'oblique' => __( 'Oblique', 'kemet' ),
								),
								'preview'   => array(
									'selector' => '.widget-head .widget-title , .widget-title',
									'property' => '--fontStyle',
								),
							),
							'widget-title-line-height'    => array(
								'transport'    => 'postMessage',
								'type'         => 'kmt-responsive-slider',
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
									'selector' => '.widget-head .widget-title , .widget-title',
									'property' => '--lineHeight',
								),
							),
							'widget-title-letter-spacing' => array(
								'transport'    => 'postMessage',
								'type'         => 'kmt-responsive-slider',
								'section'      => 'section-widgets',
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
									'selector' => '.widget-head .widget-title , .widget-title',
									'property' => '--letterSpacing',
								),
							),
							'widget-title-color'          => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Font Color', 'kemet' ),
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
							'widget-title-border-color'   => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Separator Color', 'kemet' ),
								'context'   => array(
									array(
										'setting' => 'enable-widget-list-separator',
										'value'   => true,
									),
								),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.widget .widget-head',
										'property' => '--borderBottomColor',
									),
								),
							),
							'widget-title-border-size'    => array(
								'type'        => 'kmt-slider',
								'transport'   => 'postMessage',
								'label'       => __( 'Separator Width', 'kemet' ),
								'input_attrs' => array(
									'min'  => 0,
									'step' => 1,
									'max'  => 600,
								),
								'context'     => array(
									array(
										'setting' => 'enable-widget-list-separator',
										'value'   => true,
									),
								),
								'preview'     => array(
									'selector' => '.widget .widget-head',
									'property' => '--borderBottomWidth',
								),
							),
						),
					),
				),
			),
			'widget_list-title'  => array(
				'type'  => 'kmt-title',
				'label' => __( 'List Settings', 'kemet' ),
			),
			'widget-list-tabs'   => array(
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