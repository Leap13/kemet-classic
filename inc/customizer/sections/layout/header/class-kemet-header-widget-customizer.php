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
			$selector       = '.kmt-' . $prefix . '-area';
			$num            = explode( 'header-widget-', $prefix )[1];
			$widget_options = array(
				$prefix . '-title-color'    => array(
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Title Color', 'kemet' ),
					'pickers'   => array(
						array(
							'title' => __( 'Text', 'kemet' ),
							'id'    => 'initial',
						),
					),
					'preview'   => array(
						'initial' => array(
							'selector' => $selector . ' .widget-title',
							'property' => '--headingLinksColor',
						),
					),
				),
				$prefix . '-content-color'  => array(
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Content Color', 'kemet' ),
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
				$prefix . '-link-color'     => array(
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
				$prefix . '-font-size'      => array(
					'type'         => 'kmt-responsive-slider',
					'responsive'   => true,
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
					'preview'      => array(
						'selector' => $selector,
						'property' => '--fontSize',
					),
				),
				// $prefix . '-font-family'    => array(
				// 'default'   => 'inherit',
				// 'type'      => 'kmt-font-family',
				// 'transport' => 'postMessage',
				// 'label'     => __( 'Font Family', 'kemet' ),
				// 'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-weight]',
				// ),
				// $prefix . '-font-weight'    => array(
				// 'default'   => 'inherit',
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
				$prefix . '-font-style'     => array(
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
				$prefix . '-line-height'    => array(
					'type'         => 'kmt-responsive-slider',
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
						'selector' => $selector,
						'property' => '--lineHeight',
					),
				),
				$prefix . '-letter-spacing' => array(
					'type'         => 'kmt-responsive-slider',
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
						'selector' => $selector,
						'property' => '--letterSpacing',
					),
				),

			);

			$section_name   = kemet_has_widget_editor() ? 'kemet-sidebar-widgets-' . $prefix : 'sidebar-widgets-' . $prefix;
			$widget_options = array(
				$prefix . '-options' => array(
					'section' => $section_name,
					'type'    => 'kmt-options',
					'data'    => array(
						'options' => $widget_options,
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
			$section_name   = kemet_has_widget_editor() ? 'kemet-sidebar-widgets-' . $prefix : 'sidebar-widgets-' . $prefix;
			$widget_section = array(
				$section_name => array(
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


