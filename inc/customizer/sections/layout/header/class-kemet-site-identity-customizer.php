<?php
/**
 * Site Identity Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Site_Identity_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$register_options = array(
			'kmt-site-logo-title'              => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Site Identity', 'kemet' ),
				'section'  => 'title_tagline',
				'priority' => 0,
			),
			'display-site-title'               => array(
				'type'     => 'kmt-switcher',
				'section'  => 'title_tagline',
				'label'    => __( 'Display Site Title', 'kemet' ),
				'priority' => 15,
			),
			'display-site-tagline'             => array(
				'type'     => 'kmt-switcher',
				'section'  => 'title_tagline',
				'label'    => __( 'Display Site Tagline', 'kemet' ),
				'priority' => 20,
			),
			'site-title-font-size'             => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'title_tagline',
				'priority'     => 25,
				'label'        => __( 'Title Font Size', 'kemet' ),
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
				'context'      => array(
					array(
						'setting' => 'display-site-title',
						'value'   => true,
					),
				),
				'preview'      => array(
					'selector' => '.site-title',
					'property' => 'font-size',
				),
			),
			'font-size-site-tagline'           => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'title_tagline',
				'priority'     => 30,
				'label'        => __( 'Tagline Font Size', 'kemet' ),
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
				'context'      => array(
					array(
						'setting' => 'display-site-tagline',
						'value'   => true,
					),
				),
			),
			'site-title-letter-spacing'        => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'title_tagline',
				'priority'     => 30,
				'label'        => __( 'Tagline Font Size', 'kemet' ),
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
				'context'      => array(
					array(
						'setting' => 'display-site-title',
						'value'   => true,
					),
				),
			),
			'site-title-letter-spacing'        => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'title_tagline',
				'priority'     => 32,
				'label'        => __( 'Title Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'context'      => array(
					array(
						'setting' => 'display-site-title',
						'value'   => true,
					),
				),
			),
			'tagline-letter-spacing'           => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'title_tagline',
				'priority'     => 33,
				'label'        => __( 'Tagline Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'context'      => array(
					array(
						'setting' => 'display-site-tagline',
						'value'   => true,
					),
				),
			),
			'site-title-color'                 => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Site Title Color', 'kemet' ),
				'priority'  => 37,
				'section'   => 'title_tagline',
			),
			'site-title-h-color'               => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Site Title Hover Color', 'kemet' ),
				'priority'  => 38,
				'section'   => 'title_tagline',
			),
			'tagline-color'                    => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Tagline Color', 'kemet' ),
				'priority'  => 40,
				'section'   => 'title_tagline',
			),
			'site-identity-spacing'            => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'section'        => 'title_tagline',
				'priority'       => 50,
				'label'          => __( 'Padding', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
			),
			'kmt-site-logo-settings'           => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Logo Settings', 'kemet' ),
				'section'  => 'title_tagline',
				'priority' => 55,
			),
			'kmt-header-retina-logo'           => array(
				'type'     => 'image',
				'section'  => 'title_tagline',
				'priority' => 65,
				'label'    => __( 'Retina Logo', 'kemet' ),
			),
			'kmt-header-responsive-logo-width' => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'title_tagline',
				'priority'     => 70,
				'label'        => __( 'Logo Width', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 50,
						'step' => 1,
						'max'  => 600,
					),
					'em' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
					'%'  => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 100,
					),
				),
				'description'  => __( 'This option will not increase your uploaded logo width beyond its original size.', 'kemet' ),
				'context'      => array(
					array(
						'setting'  => 'kmt-header-retina-logo',
						'operator' => 'not_empty',
					),
					array(
						'setting'  => 'custom_logo',
						'operator' => 'not_empty',
					),
					'relation' => 'OR',
				),
			),
		);

		return array_merge( $options, $register_options );
	}
}


new Kemet_Site_Identity_Customizer();
