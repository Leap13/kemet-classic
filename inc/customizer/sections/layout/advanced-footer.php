<?php
/**
 * Bottom Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Footer Widgets Layout Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-adv]', array(
			'default'           => kemet_get_option( 'footer-adv' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Radio_Image(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-adv]', array(
				'type'    => 'kmt-radio-image',
				'label'   => __( 'Footer Widgets Layout', 'kemet' ),
            'priority'       => 1,
				'section' => 'section-footer-adv',
				'choices' => array(
					'disabled' => array(
						'label' => __( 'Disable', 'kemet' ),
						'path'  => KEMET_THEME_URI . '/assets/images/no-adv-footer-115x48.png',
					),
					'layout-4' => array(
						'label' => __( 'Layout 4', 'kemet' ),
						'path'  => KEMET_THEME_URI . '/assets/images/layout-4-115x48.png',
					),
				),
			)
		)
	);
    
    /**
    * Option - Footer Spacing
    */
   $wp_customize->add_setting(
       KEMET_THEME_SETTINGS . '[footer-padding]', array(
           'default'           => kemet_get_option( 'footer-padding' ),
           'type'              => 'option',
           'transport'         => 'postMessage',
           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
       )
   );
   $wp_customize->add_control(
       new Kemet_Control_Responsive_Spacing(
           $wp_customize, KEMET_THEME_SETTINGS . '[footer-padding]', array(
               'type'           => 'kmt-responsive-spacing',
               'section'        => 'section-footer-adv',
               'priority'       => 2,
               'label'          => __( 'Footer Padding', 'kemet' ),
               'linked_choices' => true,
               'unit_choices'   => array( 'px', 'em', '%' ),
               'choices'        => array(
                   'top'    => __( 'Top', 'kemet' ),
                   'right'  => __( 'Right', 'kemet' ),
                   'bottom' => __( 'Bottom', 'kemet' ),
                   'left'   => __( 'Left', 'kemet' ),
               ),
           )
       )
   );


	// Learn More link if Kemet Pro is not activated.
	if ( ! defined( 'KEMET_EXT_VER' ) ) {

		/**
		 * Option: Divider
		 */
		$wp_customize->add_control(
			new Kemet_Control_Divider(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-widget-more-feature-divider]', array(
					'type'     => 'kmt-divider',
					'section'  => 'section-footer-adv',
					'priority' => 20,
					'settings' => array(),
				)
			)
		);
        
    /**
      * Option: Widget Title Color
      */
     $wp_customize->add_setting(
         KEMET_THEME_SETTINGS . '[footer-adv-wgt-title-color]', array(
             'default'           => '',
             'type'              => 'option',
             'transport'         => 'postMessage',
             'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
         )
     );
     $wp_customize->add_control(
         new WP_Customize_Color_Control(
             $wp_customize, KEMET_THEME_SETTINGS . '[footer-adv-wgt-title-color]', array(
                 'label'   => __( 'Widget Title Color', 'kemet' ),
                                 'priority'       => 3,
                 'section' => 'section-footer-adv',
             )
         )
     );

		/**
		 * Option: Learn More about Footer Widget
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-widget-more-feature-description]', array(
					'type'     => 'kmt-description',
					'section'  => 'section-footer-adv',
					'priority' => 20,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Footer Widgets in Kemet Pro!', 'kemet' ) . '</p><a href="' . kemet_get_pro_url( 'https://wpkemet.com/docs/footer-widgets-kemet-pro/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'kemet' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}
