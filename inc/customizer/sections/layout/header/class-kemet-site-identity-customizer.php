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
			'kmt-site-logo-title'   => array(
				'type'  => 'kmt-title',
				'label' => __( 'Site Identity', 'kemet' ),
			),
			'display-site-title'    => array(
				'type'      => 'kmt-switcher',
				'transport' => 'postMessage',
				'label'     => __( 'Display Site Title', 'kemet' ),
			),
			'display-site-tagline'  => array(
				'type'      => 'kmt-switcher',
				'divider'   => true,
				'transport' => 'postMessage',
				'label'     => __( 'Display Site Tagline', 'kemet' ),
			),
			'blogname'              => array(
				'override'  => true,
				'transport' => 'postMessage',
				'divider'   => true,
				'type'      => 'kmt-text',
				'label'     => __( 'Site Title', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'display-site-title',
						'value'   => true,
					),
				),
			),
			'site-title-typography' => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Title Typography', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'display-site-title',
						'value'   => true,
					),
				),
				'preview'   => array(
					'selector' => '.site-title',
				),
			),
			'site-title-color'      => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Site Title Color', 'kemet' ),
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
						'selector' => '.site-title',
						'property' => '--linksColor',
					),
					'hover'   => array(
						'selector' => '.site-title',
						'property' => '--linksHoverColor',
					),
				),
				'context'   => array(
					array(
						'setting' => 'display-site-title',
						'value'   => true,
					),
				),
			),
			'blogdescription'       => array(
				'override'  => true,
				'transport' => 'postMessage',
				'divider'   => true,
				'type'      => 'kmt-text',
				'label'     => __( 'Tagline', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'display-site-tagline',
						'value'   => true,
					),
				),
			),
			'tagline-typography'    => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Tagline Typography', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'display-site-tagline',
						'value'   => true,
					),
				),
				'preview'   => array(
					'selector' => '.site-header .site-description',
				),
			),
			'tagline-color'         => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Tagline Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.site-header .site-description',
						'property' => '--textColor',
					),
				),
				'context'   => array(
					array(
						'setting' => 'display-site-tagline',
						'value'   => true,
					),
				),
			),
			'site-identity-spacing' => array(
				'type'           => 'kmt-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'divider'        => true,
				'label'          => __( 'Padding', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => '.kmt-site-identity',
					'property'   => '--padding',
					'sides'      => false,
					'responsive' => true,
				),
			),
			'site-identity-margin'  => array(
				'type'           => 'kmt-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'divider'        => true,
				'label'          => __( 'Margin', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => '.kmt-site-identity',
					'property'   => '--margin',
					'sides'      => false,
					'responsive' => true,
				),
			),
		);

		$register_options = array(
			'site-identity-options'              => array(
				'section'  => 'title_tagline',
				'priority' => 80,
				'type'     => 'kmt-options',
				'data'     => array(
					'options' => $register_options,
				),
			),
			'kmt-header-retina-logo'             => array(
				'type'     => 'image',
				'section'  => 'title_tagline',
				'priority' => 65,
				'label'    => __( 'Retina Logo', 'kemet' ),
			),
			'different-logo-for-mobile-settings' => array(
				'section'  => 'title_tagline',
				'type'     => 'kmt-options',
				'priority' => 70,
				'data'     => array(
					'options' => array(
						'different-logo-for-mobile' => array(
							'type'      => 'kmt-switcher',
							'divider'   => true,
							'transport' => 'postMessage',
							'label'     => __( 'Different Logo for Mobile?', 'kemet' ),
							'context'   => array(
								array(
									'setting'  => 'device',
									'operator' => 'in_array',
									'value'    => array( 'tablet', 'mobile' ),
								),
							),
						),
					),
				),
			),
			'kmt-header-mobile-logo'             => array(
				'type'     => 'image',
				'section'  => 'title_tagline',
				'priority' => 70,
				'label'    => __( 'Mobile Logo', 'kemet' ),
				'context'  => array(
					array(
						'setting'  => 'device',
						'operator' => 'in_array',
						'value'    => array( 'tablet', 'mobile' ),
					),
					array(
						'setting' => 'different-logo-for-mobile',
						'value'   => true,
					),
				),
			),
			'site-identity-logo-settings'        => array(
				'section'  => 'title_tagline',
				'type'     => 'kmt-options',
				'priority' => 75,
				'data'     => array(
					'options' => array(
						'kmt-header-responsive-logo-width' => array(
							'type'         => 'kmt-slider',
							'responsive'   => true,
							'divider'      => true,
							'transport'    => 'postMessage',
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
									'max'  => 12,
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
							'preview'      => array(
								'selector'   => '#sitehead .site-logo-img .custom-logo-link img',
								'property'   => '--logoWidth',
								'responsive' => true,
							),
						),
					),
				),
			),
		);

		return array_merge( $options, $register_options );
	}

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$new_partials = array_fill_keys(
			array( 'kmt-header-mobile-logo', 'different-logo-for-mobile', 'display-site-title', 'display-site-tagline', 'custom_logo', 'blogname', 'blogdescription' ),
			array(
				'selector'            => '.kmt-header-item-logo',
				'container_inclusive' => false,
				'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'site_identity_markup' ),
			)
		);
		return array_merge( $partials, $new_partials );
	}
}


new Kemet_Site_Identity_Customizer();
