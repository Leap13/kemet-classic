<?php
/**
 * Blog Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$defaults = Kemet_Theme_Options::defaults();
/**
* Option: Blog Content Width
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[blog-width]',
	array(
		'default'           => $defaults['blog-width'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[blog-width]',
	array(
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
	KEMET_THEME_SETTINGS . '[blog-max-width]',
	array(
		'default'           => $defaults['blog-max-width'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[blog-width]',
			'conditions' => '==',
			'values'     => 'custom',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[blog-max-width]',
		array(
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
	KEMET_THEME_SETTINGS . '[blog-post-structure]',
	array(
		'default'           => $defaults['blog-post-structure'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Sortable(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[blog-post-structure]',
		array(
			'type'     => 'kmt-sortable',
			'section'  => 'section-blog',
			'priority' => 15,
			'label'    => __( 'Blog Post Structure', 'kemet' ),
			'choices'  => array(
				'image'            => __( 'Featured Image', 'kemet' ),
				'title-meta'       => __( 'Title & Blog Meta', 'kemet' ),
				'content-readmore' => __( 'Content & Readmore', 'kemet' ),
			),
		)
	)
);

/**
* Option: Display Post Meta
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[blog-meta]',
	array(
		'default'           => $defaults['blog-meta'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[blog-post-structure]',
			'conditions' => 'inarray',
			'values'     => 'title-meta',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Sortable(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[blog-meta]',
		array(
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
	KEMET_THEME_SETTINGS . '[blog-post-content]',
	array(
		'default'           => $defaults['blog-post-content'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[blog-post-content]',
	array(
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
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-blog-post-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Title and Meta Style', 'kemet' ),
			'section'  => 'section-blog',
			'priority' => 45,
			'settings' => array(),
		)
	)
);
/**
* Option: Typography
*/
$fields = array(
	/**
	* Option: Title Font Size
	*/
	array(
		'id'           => '[font-size-page-title]',
		'default'      => $defaults ['font-size-page-title'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-blog',
		'priority'     => 1,
		'label'        => __( 'Font Size', 'kemet' ),
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
	),
	/**
	* Option: Font Family
	*/
	array(
		'id'           => '[post-title-font-family]',
		'default'      => $defaults['post-title-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[post-title-font-weight]',
	),
	/**
	* Option: Font Weight
	*/
	array(
		'id'           => '[post-title-font-weight]',
		'default'      => $defaults['post-title-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[post-title-font-family]',
	),
	/**
	* Option: Title Text Transform
	*/
	array(
		'id'           => '[post-title-text-transform]',
		'default'      => $defaults['post-title-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Title Font Style
	*/
	array(
		'id'           => '[post-title-font-style]',
		'default'      => $defaults['post-title-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: Title Line Height
	*/
	array(
		'id'           => '[post-title-line-height]',
		'default'      => $defaults ['post-title-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-blog',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	* Option: Title Letter Spacing
	*/
	array(
		'id'           => '[letter-spacing-page-title]',
		'default'      => $defaults ['letter-spacing-page-title'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-blog',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kemet-post-titles-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Title Typography', 'kemet' ),
	'section'   => 'section-blog',
	'priority'  => 50,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Typography
*/
$fields = array(
	/**
	* Option: Title Font Size
	*/
	array(
		'id'           => '[font-size-post-meta]',
		'default'      => $defaults ['font-size-post-meta'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-blog',
		'priority'     => 1,
		'label'        => __( 'Font Size', 'kemet' ),
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
	),
	/**
	* Option: Font Family
	*/
	array(
		'id'           => '[post-meta-font-family]',
		'default'      => $defaults['post-meta-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[post-meta-font-weight]',
	),
	/**
	* Option: Font Weight
	*/
	array(
		'id'           => '[post-meta-font-weight]',
		'default'      => $defaults['post-meta-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[post-meta-font-family]',
	),
	/**
	* Option: Title Text Transform
	*/
	array(
		'id'           => '[post-meta-text-transform]',
		'default'      => $defaults['post-meta-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Post Meta Font Style
	*/
	array(
		'id'           => '[post-meta-font-style]',
		'default'      => $defaults['post-meta-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: Title Line Height
	*/
	array(
		'id'           => '[post-meta-line-height]',
		'default'      => $defaults ['post-meta-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-blog',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	* Option: Title Letter Spacing
	*/
	array(
		'id'           => '[letter-spacing-post-meta]',
		'default'      => $defaults ['letter-spacing-post-meta'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-blog',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kemet-post-meta-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Meta Typography', 'kemet' ),
	'section'   => 'section-blog',
	'priority'  => 55,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Colors
*/
$fields = array(

	/**
	* Option - Color
	*/
	array(
		'id'           => '[listing-post-title-color]',
		'default'      => $defaults ['listing-post-title-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Title Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-blog',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[listing-post-meta-color]',
		'default'      => $defaults ['listing-post-meta-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Meta Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-blog',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	* Option - Hover Color
	*/
	array(
		'id'           => '[listing-post-title-hover-color]',
		'default'      => $defaults ['listing-post-title-hover-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Title Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-blog',
		'tab'          => __( 'Hover', 'kemet' ),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-blog-title-meta-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Colors', 'kemet' ),
	'section'   => 'section-blog',
	'priority'  => 58,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );

/**
* Option:Post Main Content Entry Color
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[main-entry-content-color]',
	array(
		'default'           => $defaults['main-entry-content-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[main-entry-content-color]',
		array(
			'label'    => __( 'Main Content Entry Color', 'kemet' ),
			'priority' => 27,
			'section'  => 'section-blog',
		)
	)
);
/**
* Option: Title
*/
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-blog-readmore]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Read More Button Style', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[readmore-as-button]',
	array(
		'default'           => $defaults['readmore-as-button'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[readmore-as-button]',
	array(
		'type'     => 'kmt-switcher',
		'section'  => 'section-blog',
		'label'    => __( 'Enable Read More As Button', 'kemet' ),
		'priority' => 71,
	)
);
/**
* Option: Colors
*/
$fields = array(

	/**
	* Option - Color
	*/
	array(
		'id'           => '[readmore-text-color]',
		'default'      => $defaults ['readmore-text-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Text Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-blog',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[readmore-bg-color]',
		'default'      => $defaults ['readmore-bg-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-blog',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[readmore-border-color]',
		'default'      => $defaults ['readmore-border-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Border Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-blog',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	* Option - Hover Color
	*/
	array(
		'id'           => '[readmore-text-h-color]',
		'default'      => $defaults ['readmore-text-h-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Text Color', 'kemet' ),
		'priority'     => 4,
		'section'      => 'section-blog',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	array(
		'id'           => '[readmore-bg-h-color]',
		'default'      => $defaults ['readmore-bg-h-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 5,
		'section'      => 'section-blog',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	array(
		'id'           => '[readmore-border-h-color]',
		'default'      => $defaults ['readmore-border-h-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Border Color', 'kemet' ),
		'priority'     => 6,
		'section'      => 'section-blog',
		'tab'          => __( 'Hover', 'kemet' ),
	),
);
$group_settings = array(
	'parent_id'  => KEMET_THEME_SETTINGS . '[kmt-blog-read-more-colors]',
	'type'       => 'kmt-group',
	'label'      => __( 'Colors', 'kemet' ),
	'section'    => 'section-blog',
	'priority'   => 72,
	'settings'   => array(),
	'dependency' => array(
		'controls'   => KEMET_THEME_SETTINGS . '[readmore-as-button]',
		'conditions' => '==',
		'values'     => true,
	),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Read More Border Radius
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[read-more-border-radius]',
	array(
		'default'           => $defaults['read-more-border-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[readmore-as-button]',
			'conditions' => '==',
			'values'     => true,
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[read-more-border-radius]',
		array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-blog',
			'priority'     => 95,
			'label'        => __( 'Read More Border Radius', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 100,
				),
				'%'  => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 100,
				),
			),
		)
	)
);
/**
* Option: Read More Border Size
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[read-more-border-size]',
	array(
		'default'           => $defaults['read-more-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[readmore-as-button]',
			'conditions' => '==',
			'values'     => true,
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[read-more-border-size]',
		array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-blog',
			'priority'     => 100,
			'label'        => __( 'Read More Border Size', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 15,
				),
			),
		)
	)
);
/**
* Option - Read More Spacing
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[readmore-padding]',
	array(
		'default'           => $defaults['readmore-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[readmore-as-button]',
			'conditions' => '==',
			'values'     => true,
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[readmore-padding]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-blog',
			'priority'       => 115,
			'label'          => __( 'Read More Padding', 'kemet' ),
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
* Option - Pagination Spacing
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[pagination-padding]',
	array(
		'default'           => $defaults['pagination-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[pagination-padding]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-blog',
			'priority'       => 175,
			'label'          => __( 'Pagination Spacing', 'kemet' ),
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
