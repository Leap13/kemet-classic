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
			'kmt-widget-settings'           => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Widget Settings', 'kemet' ),
				'section'  => 'section-widgets',
				'priority' => 0,
			),
			'widget-padding'                => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'section'        => 'section-widgets',
				'priority'       => 5,
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
			'widget-margin-bottom'          => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-widgets',
				'priority'    => 10,
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
			'kmt-widget-title'              => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Widget Title Style', 'kemet' ),
				'section'  => 'section-widgets',
				'priority' => 15,
			),
			'widget-bg-color'               => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'priority'  => 20,
				'section'   => 'section-widgets',
				'label'     => __( 'Widget Background Color', 'kemet' ),
				'preview'   => array(
					'selector' => '.kmt-separate-container.kmt-two-container #secondary div.widget , div.widget',
					'property' => 'background-color',
				),
			),
			'widget-title-color'            => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'priority'  => 25,
				'section'   => 'section-widgets',
				'preview'   => array(
					'selector' => '.kmt-separate-container.kmt-two-container #secondary div.widget , div.widget',
					'property' => 'background-color',
				),
			),
			'widget-title-font-size'        => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-widgets',
				'priority'     => 30,
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
			'widget-title-font-family'      => array(
				'type'     => 'kmt-font-family',
				'label'    => __( 'Font Family', 'kemet' ),
				'section'  => 'section-widgets',
				'priority' => 35,
				'connect'  => KEMET_THEME_SETTINGS . '[widget-title-font-weight]',
			),
			'widget-title-font-weight'      => array(
				'type'     => 'kmt-font-weight',
				'label'    => __( 'Font Weight', 'kemet' ),
				'section'  => 'section-widgets',
				'priority' => 40,
				'connect'  => KEMET_THEME_SETTINGS . '[widget-title-font-family]',
			),
			'widget-title-text-transform'   => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Text Transform', 'kemet' ),
				'section'   => 'section-widgets',
				'priority'  => 45,
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
			'widget-title-font-style'       => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Font Style', 'kemet' ),
				'section'   => 'section-widgets',
				'priority'  => 50,
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
			'widget-title-line-height'      => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-widgets',
				'transport'    => 'postMessage',
				'priority'     => 60,
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
			'widget-title-letter-spacing'   => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-widgets',
				'transport'    => 'postMessage',
				'section'      => 'section-widgets',
				'priority'     => 65,
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
			'enable-widget-list-separator'  => array(
				'section'  => 'section-widgets',
				'type'     => 'kmt-switcher',
				'priority' => 70,
				'label'    => __( 'Enable Widget List Separator', 'kemet' ),
			),
			'widget-list-border-color'      => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'section'   => 'section-widgets',
				'priority'  => 75,
				'label'     => __( 'Separator Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'enable-widget-list-separator',
						'value'   => true,
					),
				),
				'preview'   => array(
					'selector' => '.widget ul > li,.widget.yith-woocompare-widget ul.products-list li:not( .list_empty )',
					'property' => '--borderBottomColor',
				),
			),
			'enable-widget-title-separator' => array(
				'section'  => 'section-widgets',
				'type'     => 'kmt-switcher',
				'priority' => 80,
				'label'    => __( 'Enable Widget Title Separator', 'kemet' ),
			),
			'widget-title-border-color'     => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'section'   => 'section-widgets',
				'priority'  => 85,
				'label'     => __( 'Separator Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'enable-widget-list-separator',
						'value'   => true,
					),
				),
				'preview'   => array(
					'selector' => '.widget .widget-head',
					'property' => '--borderBottomColor',
				),
			),
			'widget-title-border-size'      => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-widgets',
				'priority'    => 90,
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
