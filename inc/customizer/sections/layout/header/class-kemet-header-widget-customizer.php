<?php
/**
 * Header Widget Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Widget_Customizer extends Kemet_Customizer_Register {

	/**
	 * Widget Items
	 *
	 * @access private
	 * @var array
	 */
	private static $widget_items;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$widget_items = apply_filters( 'kemet_header_widget_items', array( 'header-widget-1', 'header-widget-2' ) );
		$register_options   = array();
		foreach ( self::$widget_items as $widget ) {
			$prefix         = $widget;
			$num            = explode( 'header-widget-', $prefix )[1];
			$widget_options = array(
				$prefix . '-colors-group'     => array(
					'type'     => 'kmt-group',
					'section'  => 'sidebar-widgets-' . $prefix,
					'priority' => 10,
					'label'    => __( 'Colors', 'kemet' ),
				),
				$prefix . '-title-color'      => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 1,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Title Color', 'kemet' ),
					'tab'       => __( 'Normal', 'kemet' ),
				),
				$prefix . '-content-color'    => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 2,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Content Color', 'kemet' ),
					'tab'       => __( 'Normal', 'kemet' ),
				),
				$prefix . '-link-color'       => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 3,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Color', 'kemet' ),
					'tab'       => __( 'Normal', 'kemet' ),
				),
				$prefix . '-link-h-color'     => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 4,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Color', 'kemet' ),
					'tab'       => __( 'Hover', 'kemet' ),
				),
				$prefix . '-typography-group' => array(
					'type'     => 'kmt-group',
					'section'  => 'sidebar-widgets-' . $prefix,
					'priority' => 15,
					'label'    => __( 'Typography', 'kemet' ),
				),
				$prefix . '-font-size'        => array(
					'parent-id'    => $prefix . '-typography-group',
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'sidebar-widgets-' . $prefix,
					'priority'     => 5,
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
				),
				$prefix . '-font-family'      => array(
					'parent-id' => $prefix . '-typography-group',
					'default'   => 'inherit',
					'type'      => 'kmt-font-family',
					'transport' => 'postMessage',
					'label'     => __( 'Font Family', 'kemet' ),
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 10,
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-weight]',
				),
				$prefix . '-font-weight'      => array(
					'parent-id' => $prefix . '-typography-group',
					'default'   => 'inherit',
					'type'      => 'kmt-font-weight',
					'transport' => 'postMessage',
					'label'     => __( 'Font Weight', 'kemet' ),
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 15,
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-family]',
				),
				$prefix . '-text-transform'   => array(
					'parent-id' => $prefix . '-typography-group',
					'type'      => 'kmt-select',
					'transport' => 'postMessage',
					'label'     => __( 'Text Transform', 'kemet' ),
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 20,
					'choices'   => array(
						''           => __( 'Default', 'kemet' ),
						'none'       => __( 'None', 'kemet' ),
						'capitalize' => __( 'Capitalize', 'kemet' ),
						'uppercase'  => __( 'Uppercase', 'kemet' ),
						'lowercase'  => __( 'Lowercase', 'kemet' ),
					),
				),
				$prefix . '-font-style'       => array(
					'parent-id' => $prefix . '-typography-group',
					'type'      => 'kmt-select',
					'transport' => 'postMessage',
					'label'     => __( 'Font Style', 'kemet' ),
					'section'   => 'sidebar-widgets-' . $prefix,
					'priority'  => 25,
					'choices'   => array(
						'inherit' => __( 'Inherit', 'kemet' ),
						'normal'  => __( 'Normal', 'kemet' ),
						'italic'  => __( 'Italic', 'kemet' ),
						'oblique' => __( 'Oblique', 'kemet' ),
					),
				),
				$prefix . '-line-height'      => array(
					'parent-id'    => $prefix . '-typography-group',
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'sidebar-widgets-' . $prefix,
					'priority'     => 30,
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
				),
				$prefix . '-letter-spacing'   => array(
					'parent-id'    => $prefix . '-typography-group',
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'sidebar-widgets-' . $prefix,
					'priority'     => 35,
					'label'        => __( 'Letter Spacing', 'kemet' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 0.1,
							'step' => 0.1,
							'max'  => 10,
						),
					),
				),
			);

			$register_options = array_merge( $register_options, $widget_options );
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
		foreach ( self::$widget_items as $widget ) {
			$prefix         = $widget;
			$num            = explode( 'header-widget-', $prefix )[1];
			$widget_section = array(
				'sidebar-widgets-' . $prefix => array(
					'priority' => 65,
					'title'    => sprintf( __( 'Widget %s', 'kemet' ), $num ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $widget_section );
		}

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Header_Widget_Customizer();


