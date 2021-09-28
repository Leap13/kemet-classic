<?php
/**
 * Breadcrumbs Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Breadcrumbs_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'breadcrumbs';
		$selector         = '.kemet-breadcrumb-trail';
		$register_options = array(
			self::$prefix . '-enabled'       => array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Enable Breadcrumbs', 'kemet' ),
			),
			self::$prefix . '-controls-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-show-item-title' => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Show Current Location', 'kemet' ),
							),
							'disable-' . self::$prefix . '-in-archive' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on Archive', 'kemet' ),
							),
							'disable-' . self::$prefix . '-in-single-post' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on Single Post', 'kemet' ),
							),
							'disable-' . self::$prefix . '-in-404-page' => array(
								'type'    => 'kmt-switcher',
								'divider' => true,
								'label'   => __( 'Disable on 404 Page', 'kemet' ),
							),
							self::$prefix . '-prefix'    => array(
								'type'    => 'kmt-text',
								'divider' => true,
								'label'   => __( 'Breadcrumbs Prefix Text', 'kemet' ),
							),
							self::$prefix . '-separator' => array(
								'type'    => 'kmt-text',
								'divider' => true,
								'label'   => __( 'Custom Levels Divider', 'kemet' ),
							),
							self::$prefix . '-home-item' => array(
								'type'    => 'kmt-select',
								'divider' => true,
								'label'   => __( 'Home Item', 'kemet' ),
								'choices' => array(
									'text' => esc_html__( 'Text', 'kemet' ),
									'icon' => esc_html__( 'Icon', 'kemet' ),
								),
							),
							self::$prefix . '-posts-taxonomy' => array(
								'type'        => 'kmt-select',
								'divider'     => true,
								'label'       => __( 'Posts Taxonomy', 'kemet' ),
								'choices'     => array(
									'category' => esc_html__( 'Category', 'kemet' ),
									'post_tag' => esc_html__( 'Tag', 'kemet' ),
									'blog'     => esc_html__( 'Blog Page', 'kemet' ),
								),
								'description' => esc_html__( 'Choose the Taxonomy Item Parent.', 'kemet' ),
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
									'selector' => $selector,
								),
							),
							self::$prefix . '-color'      => array(
								'type'      => 'kmt-color',
								'divider'   => true,
								'transport' => 'postMessage',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--textColor',
									),
								),
							),
							self::$prefix . '-link-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Link Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
									array(
										'id'    => 'hover',
										'title' => __( 'Hover', 'kemet' ),
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
								'divider'        => true,
								'transport'      => 'postMessage',
								'label'          => __( 'Breadcrumbs Padding', 'kemet' ),
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
									'selector'   => $selector,
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
		$register_section = array(
			'section-' . self::$prefix => array(
				'title'    => __( 'Breadcrumbs', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 50,
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Breadcrumbs_Customizer();
