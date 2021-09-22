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
				$prefix . '-content-color' => array(
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
				$prefix . '-link-color'    => array(
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
				$prefix . '-typography'    => array(
					'type'      => 'kmt-typography',
					'transport' => 'postMessage',
					'label'     => __( 'Typography', 'kemet' ),
					'preview'   => array(
						'selector' => $selector,
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


