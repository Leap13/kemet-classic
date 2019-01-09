<?php
/**
 * Single Post Options for Kemet Theme.
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
	 * Option: Display Post Structure
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-single-post-structure]', array(
			'default'           => kemet_get_option( 'blog-single-post-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Sortable(
			$wp_customize, KEMET_THEME_SETTINGS . '[blog-single-post-structure]', array(
				'type'     => 'kmt-sortable',
				'section'  => 'section-blog-single',
				'priority' => 5,
				'label'    => __( 'Single Post Structure', 'kemet' ),
				'choices'  => array(
					'single-image'      => __( 'Featured Image', 'kemet' ),
					'single-title-meta' => __( 'Title & Blog Meta', 'kemet' ),
				),
			)
		)
	);

	/**
	 * Option: Single Post Meta
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-single-meta]', array(
			'default'           => kemet_get_option( 'blog-single-meta' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Sortable(
			$wp_customize, KEMET_THEME_SETTINGS . '[blog-single-meta]', array(
				'type'     => 'kmt-sortable',
				'section'  => 'section-blog-single',
				'priority' => 5,
				'label'    => __( 'Single Post Meta', 'kemet' ),
				'choices'  => array(
					'comments' => __( 'Comments', 'kemet' ),
					'category' => __( 'Category', 'kemet' ),
					'author'   => __( 'Author', 'kemet' ),
					'date'     => __( 'Publish Date', 'kemet' ),
					'tag'      => __( 'Tag', 'kemet' ),
				),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-styling-section-single-blog-layouts]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-blog-single',
				'priority' => 10,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Single Post Content Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-single-width]', array(
			'default'           => kemet_get_option( 'blog-single-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[blog-single-width]', array(
			'type'     => 'select',
			'section'  => 'section-blog-single',
			'priority' => 15,
			'label'    => __( 'Single Post Content Width', 'kemet' ),
			'choices'  => array(
				'default' => __( 'Default', 'kemet' ),
				'custom'  => __( 'Custom', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Enter Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-single-max-width]', array(
			'default'           => 1200,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[blog-single-max-width]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-blog-single',
				'priority'    => 20,
				'label'       => __( 'Enter Width', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 768,
					'step' => 1,
					'max'  => 1920,
				),
			)
		)
	);
	/**
      * Option:Post Content Color
      */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[post-content-color]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, KEMET_THEME_SETTINGS . '[post-content-color]', array(
                'label'   => __( 'Post Content Color', 'kemet' ),
                'priority'       => 27,
                'section' => 'section-blog-single',
            )
        )
    );
	/**
      * Option:Post Title Color
      */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[post-title-color]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, KEMET_THEME_SETTINGS . '[post-title-color]', array(
                'label'   => __( 'Post Title Color', 'kemet' ),
                'priority'       => 26,
                'section' => 'section-blog-single',
            )
        )
	);
	/**
      * Option:Post Read More Text Color
      */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[readmore-text-color]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, KEMET_THEME_SETTINGS . '[readmore-text-color]', array(
                'label'   => __( 'Read More Text Color', 'kemet' ),
                'priority'       => 28,
                'section' => 'section-blog-single',
            )
        )
	);
	/**
      * Option:Post Read More Text Color Hover
      */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[readmore-text-h-color]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, KEMET_THEME_SETTINGS . '[readmore-text-h-color]', array(
                'label'   => __( 'Read More Text Color', 'kemet' ),
                'priority'       => 29,
                'section' => 'section-blog-single',
            )
        )
	);
	/**
    * Option - Read More Spacing
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[readmore-padding]', array(
			'default'           => kemet_get_option( 'readmore-padding' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Spacing(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-padding]', array(
				'type'           => 'kmt-responsive-spacing',
				'section'        => 'section-blog-single',
				'priority'       => 30,
				'label'          => __( 'Read More', 'kemet' ),
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
	/**
	 * Option: Read More Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[readmore-bg-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-bg-color]', array(
                'priority'       => 31,
                'section' => 'section-blog-single',
				'label'   => __( 'Read More Background Color', 'kemet' ),
			)
		)
	);
	/**
	 * Option: Read More Background Color Hover
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[readmore-bg-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-bg-h-color]', array(
                'priority'       => 32,
                'section' => 'section-blog-single',
				'label'   => __( 'Read More Background Color Hover', 'kemet' ),
			)
		)
	);
		/**
	 * Option: Read More Border Radius
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[readmore-border-radius]', array(
			'default'           => kemet_get_option( 'readmore-border-radius' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[readmore-border-radius]', array(
            'priority'       => 33,
            'section' => 'section-blog-single',
			'label'       => __( 'Read More Border Radius', 'kemet' ),
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 200,
			),
		)
	);
	/**
	 * Option: Read More Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[readmore-border-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-border-color]', array(
				'section'  => 'section-blog-single',
				'priority' => 34,
				'label'    => __( 'Read More Border Color', 'kemet' ),
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
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-blog-single-more-feature-divider]', array(
					'type'     => 'kmt-divider',
					'section'  => 'section-blog-single',
					'priority' => 25,
					'settings' => array(),
				)
			)
		);
		/**
		 * Option: Learn More about Single Blog Pro
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-blog-single-more-feature-description]', array(
					'type'     => 'kmt-description',
					'section'  => 'section-blog-single',
					'priority' => 25,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Single Post in Kemet Pro!', 'kemet' ) . '</p><a href="' . kemet_get_pro_url( 'https://wpkemet.com/docs/single-post-blog-pro/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'kemet' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}
