<?php
/**
 * Overlay Header Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Overlay_Header_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'overlay-header';
		$register_options = array(
			'focus-' . self::$prefix . '-section'      => array(
				'section'       => 'section-header-builder-layout',
				'priority'      => 10,
				'type'          => 'kmt-focus-button',
				'button_params' => array(
					'title'   => __( 'Overlay Header', 'kemet' ),
					'section' => 'section-' . self::$prefix,
				),
			),
			self::$prefix . '-controls-tabs'           => array(
				'section'  => 'section-' . self::$prefix,
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			self::$prefix . '-enable'                  => array(
				'type'     => 'kmt-switcher',
				'section'  => 'section-' . self::$prefix,
				'priority' => 5,
				'label'    => __( 'Enable Overlay Header', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			self::$prefix . '-bg-color'                => array(
				'section'   => 'section-' . self::$prefix,
				'priority'  => 10,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Background Overlay', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-menu-colors-group'       => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 15,
				'label'    => __( 'Menu Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-menu-link-color'         => array(
				'parent-id' => self::$prefix . '-menu-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-menu-bg-color'           => array(
				'parent-id' => self::$prefix . '-menu-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-menu-link-h-color'       => array(
				'parent-id' => self::$prefix . '-menu-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 3,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-colors-group'    => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 20,
				'label'    => __( 'Submenu Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-color'      => array(
				'parent-id' => self::$prefix . '-submenu-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-bg-color'        => array(
				'parent-id' => self::$prefix . '-submenu-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-h-color'    => array(
				'parent-id' => self::$prefix . '-submenu-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 3,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-bg-h-color'      => array(
				'parent-id' => self::$prefix . '-submenu-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 3,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-colors-group'     => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 20,
				'label'    => __( 'Search Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-icon-color'       => array(
				'parent-id' => self::$prefix . '-search-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-bg-color'         => array(
				'parent-id' => self::$prefix . '-search-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-input-bg-color'   => array(
				'parent-id' => self::$prefix . '-search-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 3,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Input Background Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-text-color'       => array(
				'parent-id' => self::$prefix . '-search-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 4,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-border-color'     => array(
				'parent-id' => self::$prefix . '-search-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 4,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Border Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-icon-h-color'     => array(
				'parent-id' => self::$prefix . '-search-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 4,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-box-colors-group' => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 20,
				'label'    => __( 'Search Box Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-box-icon-color'   => array(
				'parent-id' => self::$prefix . '-search-box-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-box-bg-color'     => array(
				'parent-id' => self::$prefix . '-search-box-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-box-text-color'   => array(
				'parent-id' => self::$prefix . '-search-box-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 4,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-box-border-color' => array(
				'parent-id' => self::$prefix . '-search-box-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 4,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Border Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-search-box-icon-h-color' => array(
				'parent-id' => self::$prefix . '-search-box-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 4,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-widget-colors-group'     => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 30,
				'label'    => __( 'Widget Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-widget-title-color'      => array(
				'parent-id' => self::$prefix . '-widget-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Title Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-widget-content-color'    => array(
				'parent-id' => self::$prefix . '-widget-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Content Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-widget-link-color'       => array(
				'parent-id' => self::$prefix . '-widget-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 3,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-widget-link-h-color'     => array(
				'parent-id' => self::$prefix . '-widget-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 3,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-html-colors-group'       => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 35,
				'label'    => __( 'Html Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-html-text-color'         => array(
				'parent-id' => self::$prefix . '-html-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Text', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-html-link-color'         => array(
				'parent-id' => self::$prefix . '-html-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-html-link-h-color'       => array(
				'parent-id' => self::$prefix . '-html-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-toggle-colors-group'     => array(
				'section'   => 'section-' . self::$prefix,
				'priority'  => 40,
				'transport' => 'postMessage',
				'type'      => 'kmt-responsive-color',
				'label'     => __( 'Toggle Colors', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-toggle-icon-color'       => array(
				'parent-id' => self::$prefix . '-toggle-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-toggle-bg-color'         => array(
				'parent-id' => self::$prefix . '-toggle-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-toggle-border-color'     => array(
				'parent-id' => self::$prefix . '-toggle-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 4,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Border Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
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
				'priority' => 55,
				'title'    => __( 'Overlay Header', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $register_sections );

	}
}


new Kemet_Overlay_Header_Customizer();


