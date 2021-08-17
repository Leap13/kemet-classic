<?php
/**
 * Footer Copyright Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Copyright_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix      = 'footer-copyright';
		$selector          = '.kmt-' . self::$prefix;
		$copyright_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-text' => array(
								'label'     => __( 'Copyright Text', 'kemet' ),
								'transport' => 'postMessage',
								'type'      => 'kmt-editor',
							),
							self::$prefix . '-horizontal-align' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-radio',
								'responsive' => true,
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
							self::$prefix . '-vertical-align' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-radio',
								'responsive' => true,
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
							self::$prefix . '-color'      => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--footerTextColor',
									),
								),
							),
							self::$prefix . '-link-color' => array(
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
						),
					),
				),
			),
		);

		$copyright_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $copyright_options,
				),
			),
		);

		return array_merge( $options, $copyright_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$copyright_sections = array(
			'section-' . self::$prefix => array(
				'priority' => 85,
				'title'    => __( 'Copyright', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $copyright_sections );
	}

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$partials[ self::$prefix . '-text' ] = array(
			'selector'            => '.kmt-' . self::$prefix,
			'container_inclusive' => true,
			'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'render_copyright' ),
		);
		return $partials;
	}
}


new Kemet_Footer_Copyright_Customizer();

