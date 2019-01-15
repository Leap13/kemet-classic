<?php
/**
 * Blog Options for Kemet Theme.
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
	 * Option: Blog Post Content
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-post-content]', array(
			'default'           => kemet_get_option( 'blog-post-content' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[blog-post-content]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Blog Post Content', 'kemet' ),
			'type'     => 'select',
			'priority' => 50,
			'choices'  => array(
				'full-content' => __( 'Full Content', 'kemet' ),
				'excerpt'      => __( 'Excerpt', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Display Post Structure
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-post-structure]', array(
			'default'           => kemet_get_option( 'blog-post-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Sortable(
			$wp_customize, KEMET_THEME_SETTINGS . '[blog-post-structure]', array(
				'type'     => 'kmt-sortable',
				'section'  => 'section-blog',
				'priority' => 100,
				'label'    => __( 'Blog Post Structure', 'kemet' ),
				'choices'  => array(
					'image'      => __( 'Featured Image', 'kemet' ),
					'title-meta' => __( 'Title & Blog Meta', 'kemet' ),
				),
			)
		)
	);

	/**
	 * Option: Display Post Meta
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-meta]', array(
			'default'           => kemet_get_option( 'blog-meta' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Sortable(
			$wp_customize, KEMET_THEME_SETTINGS . '[blog-meta]', array(
				'type'     => 'kmt-sortable',
				'section'  => 'section-blog',
				'priority' => 105,
				'label'    => __( 'Blog Meta', 'kemet' ),
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
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-styling-section-blog-width]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-blog',
				'priority' => 110,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Blog Content Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[blog-width]', array(
			'default'           => kemet_get_option( 'blog-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[blog-width]', array(
			'type'     => 'select',
			'section'  => 'section-blog',
			'priority' => 115,
			'label'    => __( 'Blog Content Width', 'kemet' ),
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
		KEMET_THEME_SETTINGS . '[blog-max-width]', array(
			'default'           => 1200,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[blog-max-width]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-blog',
				'priority'    => 120,
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
     * Option:Post Title Color
    */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[listing-post-title-color]', array(
            'default'           => kemet_get_option( 'listing-post-title-color' ),
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, KEMET_THEME_SETTINGS . '[listing-post-title-color]', array(
                'label'   => __( 'Listing Post Title Color', 'kemet' ),
                'priority'       => 26,
                'section' => 'section-blog',
            )
        )
	);
	/**
      * Option:Post Content Color
      */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[listing-post-content-color]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, KEMET_THEME_SETTINGS . '[listing-post-content-color]', array(
                'label'   => __( 'Listing Post Content Color', 'kemet' ),
                'priority'       => 27,
                'section' => 'section-blog',
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
                'label'   => __( 'Read More Color', 'kemet' ),
                'priority'       => 28,
                'section' => 'section-blog',
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
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-blog-more-feature-divider]', array(
					'type'     => 'kmt-divider',
					'section'  => 'section-blog',
					'priority' => 125,
					'settings' => array(),
				)
			)
		);
		/**
		 * Option: Learn More about Blog Pro
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-blog-more-feature-description]', array(
					'type'     => 'kmt-description',
					'section'  => 'section-blog',
					'priority' => 125,
					'label'    => '',
					'help'     => __( 'More Options Available for Blog in Kemet Pro!', 'kemet' ) . '<a href="' . kemet_get_pro_url( 'https://wpkemet.com/docs/blog-archive-blog-pro/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'kemet' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}
