<?php
/**
 * Footer Widget Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Widget_Customizer extends Kemet_Customizer_Register {

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
		self::$widget_items = apply_filters( 'kemet_footer_widget_items', array( 'footer-widget-1', 'footer-widget-2', 'footer-widget-3', 'footer-widget-4', 'footer-widget-5', 'footer-widget-6' ) );
		$register_options   = array();
		foreach ( self::$widget_items as $widget ) {
			$prefix         = $widget;
			$selector       = '.kmt-' . $prefix . '-area';
			$num            = explode( 'footer-widget-', $prefix )[1];
			$widget_options = array(
				$prefix . '-tabs' => array(
					'type' => 'kmt-tabs',
					'tabs' => array(
						'general' => array(
							'title'   => __( 'General', 'kemet' ),
							'options' => array(
								$prefix . '-horizontal-align' => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-radio',
									'responsive' => true,
									'divider'    => true,
									'label'      => __( 'Horizontal Alignment', 'kemet' ),
									'choices'    => array(
										'flex-start' => __( 'Left', 'kemet' ),
										'center'     => __( 'Center', 'kemet' ),
										'flex-end'   => __( 'Right', 'kemet' ),
									),
									'preview'    => array(
										'selector'   => $selector,
										'property'   => '--justifyContnet',
										'responsive' => true,
									),
								),
								$prefix . '-vertical-align' => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-radio',
									'responsive' => true,
									'divider'    => true,
									'label'      => __( 'Vertical Alignment', 'kemet' ),
									'choices'    => array(
										'flex-start' => __( 'Top', 'kemet' ),
										'center'     => __( 'Center', 'kemet' ),
										'flex-end'   => __( 'Bottom', 'kemet' ),
									),
									'preview'    => array(
										'selector'   => $selector,
										'property'   => '--alignItems',
										'responsive' => true,
									),
								),
							),
						),
						'design'  => array(
							'title'   => __( 'Design', 'kemet' ),
							'options' => array(
								$prefix . '-content-color' => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Content Color', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
									'label'     => __( 'Link Colors', 'kemet' ),
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
								$prefix . '-margin'        => array(
									'type'           => 'kmt-spacing',
									'transport'      => 'postMessage',
									'label'          => __( 'Margin', 'kemet' ),
									'responsive'     => true,
									'divider'        => true,
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
										'property'   => 'margin',
										'responsive' => true,
									),
								),
							),
						),
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
			$num            = explode( 'footer-widget-', $prefix )[1];
			$section_name   = kemet_has_widget_editor() ? 'kemet-sidebar-widgets-' . $prefix : 'sidebar-widgets-' . $prefix;
			$widget_section = array(
				$section_name => array(
					'priority' => 65,
					'title'    => sprintf( __( 'Widget %s', 'kemet' ), $num ),
					'panel'    => 'panel-footer-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $widget_section );
		}

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Footer_Widget_Customizer();


