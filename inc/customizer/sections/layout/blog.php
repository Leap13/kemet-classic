<?php
/**
 * Blog Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
			'priority' => 5,
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
				'priority'    => 10,
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
				'priority' => 15,
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
				'priority' => 20,
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
			'priority' => 25,
			'choices'  => array(
				'full-content' => __( 'Full Content', 'kemet' ),
				'excerpt'      => __( 'Excerpt', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-archive-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Archive Summary Box Title', 'kemet' ),
				'section'  => 'section-blog',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);
	
	/**
	 * Option: Archive Summary Box Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-archive-summary-title]', array(
			'default'           => kemet_get_option( 'font-size-archive-summary-title' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-archive-summary-title]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-blog',
				'priority'    => 35,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-blog-post-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Blog Post', 'kemet' ),
				'section'  => 'section-blog',
				'priority' => 44,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Blog - Post Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-page-title]', array(
			'default'           => kemet_get_option( 'font-size-page-title' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-page-title]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-blog',
				'priority'    => 45,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
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
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        )
    );
    $wp_customize->add_control(
        new Kemet_Control_Color(
            $wp_customize, KEMET_THEME_SETTINGS . '[listing-post-title-color]', array(
                'label'   => __( 'Listing Post Title Color', 'kemet' ),
                'priority'       => 50,
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
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        )
    );
    $wp_customize->add_control(
        new Kemet_Control_Color(
            $wp_customize, KEMET_THEME_SETTINGS . '[readmore-text-color]', array(
                'label'   => __( 'Read More Color', 'kemet' ),
                'priority'       => 55,
                'section' => 'section-blog',
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
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        )
    );
    $wp_customize->add_control(
        new Kemet_Control_Color(
            $wp_customize, KEMET_THEME_SETTINGS . '[readmore-text-h-color]', array(
                'label'   => __( 'Read More Hover Color', 'kemet' ),
                'priority'       => 60,
                'section' => 'section-blog',
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
				'section'        => 'section-blog',
				'priority'       => 65,
				'label'          => __( 'Read More Spacing', 'kemet' ),
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
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-bg-color]', array(
                'priority'       => 70,
                'section' => 'section-blog',
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
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-bg-h-color]', array(
                'priority'       => 75,
                'section' => 'section-blog',
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
            'priority'       => 80,
            'section' => 'section-blog',
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
	 * Option: Read More Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[readmore-border-size]', array(
			'default'           => kemet_get_option( 'readmore-border-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[readmore-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-blog',
			'priority'    => 85,
			'label'       => __( 'Read More Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
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
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-border-color]', array(
				'section'  => 'section-blog',
				'priority' => 90,
				'label'    => __( 'Read More Border Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Read More Border Color Hover
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[readmore-border-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[readmore-border-h-color]', array(
				'section'  => 'section-blog',
				'priority' => 95,
				'label'    => __( 'Read More Border Hover Color', 'kemet' ),
			)
		)
	);