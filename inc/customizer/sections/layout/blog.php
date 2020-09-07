<?php
/**
* Blog Options for Wiz Theme.
*
* @package     Wiz
* @author      Wiz
* @copyright   Copyright ( c ) 2019, Wiz
* @link        https://wiz.io/
* @since       Wiz 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$defaults = Wiz_Theme_Options::defaults();
/**
* Option: Blog Content Width
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-width]', array(
        'default'           => $defaults[ 'blog-width' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[blog-width]', array(
        'type'     => 'select',
        'section'  => 'section-blog',
        'priority' => 5,
        'label'    => __( 'Blog Content Width', 'wiz' ),
        'choices'  => array(
            'default' => __( 'Default', 'wiz' ),
            'custom'  => __( 'Custom', 'wiz' ),
        ),
    )
);

/**
* Option: Enter Width
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-max-width]', array(
        'default'           => $defaults[ 'blog-max-width' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[blog-width]', 
            'conditions' => '==', 
            'values' => 'custom',
        ), 
    )
);
$wp_customize->add_control(
    new Wiz_Control_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[blog-max-width]', array(
            'type'        => 'wiz-slider',
            'section'     => 'section-blog',
            'priority'    => 10,
            'label'       => __( 'Enter Width', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[blog-post-structure]', array(
        'default'           => $defaults[ 'blog-post-structure' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_multi_choices' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Sortable(
        $wp_customize, WIZ_THEME_SETTINGS . '[blog-post-structure]', array(
            'type'     => 'wiz-sortable',
            'section'  => 'section-blog',
            'priority' => 15,
            'label'    => __( 'Blog Post Structure', 'wiz' ),
            'choices'  => array(
                'image'      => __( 'Featured Image', 'wiz' ),
                'title-meta' => __( 'Title & Blog Meta', 'wiz' ),
                'content-readmore' => __( 'Content & Readmore', 'wiz' ),
            ),
        )
    )
);

/**
* Option: Display Post Meta
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-meta]', array(
        'default'           => $defaults[ 'blog-meta' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_multi_choices' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[blog-post-structure]', 
            'conditions' => 'inarray', 
            'values' => 'title-meta',
        ), 
    )
);
$wp_customize->add_control(
    new Wiz_Control_Sortable(
        $wp_customize, WIZ_THEME_SETTINGS . '[blog-meta]', array(
            'type'     => 'wiz-sortable',
            'section'  => 'section-blog',
            'priority' => 20,
            'label'    => __( 'Blog Meta', 'wiz' ),
            'choices'  => array(
                'comments' => __( 'Comments', 'wiz' ),
                'category' => __( 'Category', 'wiz' ),
                'author'   => __( 'Author', 'wiz' ),
                'date'     => __( 'Publish Date', 'wiz' ),
                'tag'      => __( 'Tag', 'wiz' ),
            ),
        )
    )
);

/**
* Option: Blog Post Content
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-post-content]', array(
        'default'           => $defaults[ 'blog-post-content' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[blog-post-content]', array(
        'section'  => 'section-blog',
        'label'    => __( 'Blog Post Content', 'wiz' ),
        'type'     => 'select',
        'priority' => 25,
        'choices'  => array(
            'full-content' => __( 'Full Content', 'wiz' ),
            'excerpt'      => __( 'Excerpt', 'wiz' ),
        ),
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-blog-post-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Title and Meta Style', 'wiz' ),
            'section'  => 'section-blog',
            'priority' => 45,
            'settings' => array(),
        )
    )
);
/**
* Option: Blog - Post Title Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-page-title]', array(
        'default'           => $defaults[ 'font-size-page-title' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-page-title]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-blog',
            'priority'       => 50,
            'label'          => __( 'Title Font Size', 'wiz' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 1,
                    'step' => 1,
                    'max' =>200,
                ),
                'em' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);
 /**
 * Option: Post Title Font Family
 */
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[post-title-font-family]', array(
        'default'           => $defaults[ 'page-title-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[post-title-font-family]', array(
            'type'     => 'wiz-font-family',
            'label'    => __( 'Title Font Family', 'wiz' ),
            'section'  => 'section-blog',
            'priority' => 51,
        )
    )
);
/**
* Option: Title Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-page-title]', array(
        'default'           => $defaults[ 'letter-spacing-page-title' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-page-title]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-blog',
            'priority'       => 57,
            'label'          => __( 'Title Letter Spacing', 'wiz' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);
/**
* Option:Post Title Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[listing-post-title-color]', array(
        'default'           => $defaults[ 'listing-post-title-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[listing-post-title-color]', array(
            'label'   => __( 'Title Font Color', 'wiz' ),
            'priority'       => 60,
            'section' => 'section-blog',
        )
    )
);
/**
* Option:Post Title Hover Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[listing-post-title-hover-color]', array(
        'default'           => $defaults[ 'listing-post-title-hover-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[listing-post-title-hover-color]', array(
            'label'   => __( 'Title Hover Color', 'wiz' ),
            'priority'       => 61,
            'section' => 'section-blog',
        )
    )
);
/**
* Option:Post Meta Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[listing-post-meta-color]', array(
        'default'           => $defaults[ 'listing-post-meta-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[listing-post-meta-color]', array(
            'label'   => __( 'Meta Font Color', 'wiz' ),
            'priority'       => 65,
            'section' => 'section-blog',
        )
    )
);

/**
* Option - Pagination Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[pagination-padding]', array(
        'default'           => $defaults[ 'pagination-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Spacing(
        $wp_customize, WIZ_THEME_SETTINGS . '[pagination-padding]', array(
            'type'           => 'wiz-responsive-spacing',
            'section'        => 'section-blog',
            'priority'       => 66,
            'label'          => __( 'Pagination Spacing', 'wiz' ),
            'linked_choices' => true,
            'unit_choices'   => array( 'px', 'em', '%' ),
            'choices'        => array(
                'top'    => __( 'Top', 'wiz' ),
                'right'  => __( 'Right', 'wiz' ),
                'bottom' => __( 'Bottom', 'wiz' ),
                'left'   => __( 'Left', 'wiz' ),
            ),
        )
    )
);
/**
* Option:Post Main Content Entry Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[main-entry-content-color]', array(
        'default'           => $defaults[ 'main-entry-content-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[main-entry-content-color]', array(
            'label'   => __( 'Main Content Entry Color', 'wiz' ),
            'priority'       => 66,
            'section' => 'section-blog',
        )
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-blog-readmore]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Read More Button Style', 'wiz' ),
            'section'  => 'section-blog',
            'priority' => 70,
            'settings' => array(),
        )
    )
);
/**
 * Option: Enable Read more as button
 */
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-as-button]', array(
        'default'           => $defaults[ 'readmore-as-button' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[readmore-as-button]', array(
        'type'            => 'checkbox',
        'section'         => 'section-blog',
        'label'           => __( 'Enable Read More As Button', 'wiz' ),
        'priority'        => 71,
    )
);
/**
* Option:Post Read More Text Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-text-color]', array(
        'default'           => $defaults[ 'readmore-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[readmore-text-color]', array(
            'label'   => __( 'Read More Color', 'wiz' ),
            'priority'       => 75,
            'section' => 'section-blog',
        )
    )
);

/**
* Option:Post Read More Text Color Hover
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-text-h-color]', array(
        'default'           => $defaults[ 'readmore-text-h-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[readmore-text-h-color]', array(
            'label'   => __( 'Read More Hover Color', 'wiz' ),
            'priority'       => 80,
            'section' => 'section-blog',
        )
    )
);

/**
* Option: Read More Background Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-bg-color]', array(
        'default'           => $defaults[ 'readmore-bg-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[readmore-bg-color]', array(
            'section'  => 'section-blog',
            'priority' => 85,
            'label'    => __( 'Read More Background Color', 'wiz' ),
        )
    )
);
/**
* Option: Read More Background Color Hover
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-bg-h-color]', array(
        'default'           => $defaults[ 'readmore-bg-h-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[readmore-bg-h-color]', array(
            'section'  => 'section-blog',
            'priority' => 90,
            'label'    => __( 'Read More Background Hover Color', 'wiz' ),
        )
    )
);
/**
* Option: Read More Border Radius
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[read-more-border-radius]', array(
        'default'           => $defaults[ 'read-more-border-radius' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[read-more-border-radius]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-blog',
				'priority'       => 95,
				'label'          => __( 'Read More Border Radius', 'wiz' ),
				'unit_choices'   => array(
					 'px' => array(
						 'min' => 1,
						 'step' => 1,
						 'max' => 100,
					 ),
					 'em' => array(
						 'min' => 0.1,
						 'step' => 0.1,
						 'max' => 10,
                     ),
                     '%' => array(
                        'min' => 1,
                        'step' => 1,
                        'max' => 100,
                    ),
                 ),
			)
		)
	);
/**
* Option: Read More Border Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[read-more-border-size]', array(
        'default'           => $defaults[ 'read-more-border-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[read-more-border-size]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-blog',
				'priority'       => 100,
				'label'          => __( 'Read More Border Size', 'wiz' ),
				'unit_choices'   => array(
					 'px' => array(
						 'min' => 1,
						 'step' => 1,
						 'max' => 15,
					 ),
                 ),
			)
		)
	);
/**
* Option: Read More Border Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-border-color]', array(
        'default'           => $defaults[ 'readmore-border-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[readmore-border-color]', array(
            'section'  => 'section-blog',
            'priority' => 105,
            'label'    => __( 'Read More Border Color', 'wiz' ),
        )
    )
);

/**
* Option: Read More Border Color Hover
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-border-h-color]', array(
        'default'           => $defaults[ 'readmore-border-h-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[readmore-border-h-color]', array(
            'section'  => 'section-blog',
            'priority' => 110,
            'label'    => __( 'Read More Border Hover Color', 'wiz' ),
        )
    )
);
/**
* Option - Read More Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[readmore-padding]', array(
        'default'           => $defaults[ 'readmore-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[readmore-as-button]', 
            'conditions' => '==', 
            'values' => true,
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Spacing(
        $wp_customize, WIZ_THEME_SETTINGS . '[readmore-padding]', array(
            'type'           => 'wiz-responsive-spacing',
            'section'        => 'section-blog',
            'priority'       => 115,
            'label'          => __( 'Read More Padding', 'wiz' ),
            'linked_choices' => true,
            'unit_choices'   => array( 'px', 'em', '%' ),
            'choices'        => array(
                'top'    => __( 'Top', 'wiz' ),
                'right'  => __( 'Right', 'wiz' ),
                'bottom' => __( 'Bottom', 'wiz' ),
                'left'   => __( 'Left', 'wiz' ),
            ),
        )
    )
);