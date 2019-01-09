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
