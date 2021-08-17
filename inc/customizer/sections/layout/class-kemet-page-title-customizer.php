<?php
/**
 * Page Layout Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Page_Title_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'page-title';
		$selector         = '.kmt-page-title-content';
		$register_options = array(
			self::$prefix . '-controls-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-layouts'    => array(
								'label'   => __( 'Page Title Layouts', 'kemet' ),
								'type'    => 'kmt-radio-image',
								'choices' => array(
									'disable'             => array(
										'label' => __( 'Disable', 'kemet' ),
										'path'  => KEMET_THEME_URI . '/assets/images/disable-page-title.png',
									),
									'page-title-layout-1' => array(
										'label' => __( 'Page Title Layout 1', 'kemet' ),
										'path'  => KEMET_THEME_URI . '/assets/images/page-title-layout-01.png',
									),
									'page-title-layout-2' => array(
										'label' => __( 'Page Title Layout 2', 'kemet' ),
										'path'  => KEMET_THEME_URI . '/assets/images/page-title-layout-02.png',
									),
									'page-title-layout-3' => array(
										'label' => __( 'Page Title Layout 3', 'kemet' ),
										'path'  => KEMET_THEME_URI . '/assets/images/page-title-layout-03.png',
									),
								),
							),
							self::$prefix . '-alignment'  => array(
								'type'      => 'kmt-radio',
								'transport' => 'postMessage',
								'label'     => __( 'Page Title Alignment', 'kemet' ),
								'choices'   => array(
									'left'   => __( 'Left', 'kemet' ),
									'center' => __( 'Center', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
								),
								'preview'   => array(
									'selector' => '.kmt-page-title.page-title-layout-1',
									'property' => 'text-align',
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-layouts',
										'value'   => 'page-title-layout-1',
									),
								),
							),
							self::$prefix . '-merge-with-header' => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Merge/Combine Page Title With Main Header', 'kemet' ),
							),
							self::$prefix . '-responsive' => array(
								'type'    => 'kmt-select',
								'label'   => __( 'Page Title Visibility', 'kemet' ),
								'choices' => array(
									'all-devices'        => __( 'Show on All Devices', 'kemet' ),
									'hide-tablet'        => __( 'Hide on Tablet', 'kemet' ),
									'hide-mobile'        => __( 'Hide on Mobile', 'kemet' ),
									'hide-tablet-mobile' => __( 'Hide on Tablet and Mobile', 'kemet' ),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-background' => array(
								'type'       => 'kmt-background',
								'transport'  => 'postMessage',
								'label'      => __( 'Background', 'kemet' ),
								'responsive' => true,
								'preview'    => array(
									'selector'   => $selector . ', .kemet-merged-header-title',
									'responsive' => true,
								),
							),
							self::$prefix . '-border-right-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Page Title Divider Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Color', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.page-title-layout-3 .kmt-page-title-wrap',
										'property' => 'border-color',
									),
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-layouts',
										'value'   => 'page-title-layout-3',
									),
								),
							),
							self::$prefix . '-spacing'    => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'label'          => __( 'Padding', 'kemet' ),
								'responsive'     => true,
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector . ', .header-transparent ' . $selector . ',.merged-header-transparent ' . $selector,
									'responsive' => true,
									'sides'      => false,
									'property'   => '--padding',
								),
							),
							self::$prefix . '-color'      => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Font Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Color', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kemet-page-title',
										'property' => '--headingLinksColor',
									),
								),
							),
							self::$prefix . '-bottomline-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Separator Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Color', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kemet-page-title::after',
										'property' => 'background-color',
									),
								),
							),
							self::$prefix . '-bottomline-height' => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Separator Height', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 20,
									),
								),
								'preview'      => array(
									'selector' => '.kemet-page-title::after',
									'property' => 'height',
								),
							),
							self::$prefix . '-bottomline-width' => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Separator Width', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 300,
									),
								),
								'preview'      => array(
									'selector' => '.kemet-page-title::after',
									'property' => 'width',
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
		$register_section = array(
			'section-breadcrumbs'      => array(
				'title'    => __( 'Breadcrumbs', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 50,
			),
			'section-' . self::$prefix => array(
				'title'    => __( 'Page Title', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 45,
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Page_Title_Customizer();
