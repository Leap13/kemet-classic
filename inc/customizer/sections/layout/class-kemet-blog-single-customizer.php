<?php
/**
 * Single Post Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Blog_Single_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$single_blog_options = array(
			'single-blog-controls-tabs'  => array(
				'section'  => 'section-blog-single',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'blog-single-width'          => array(
				'type'     => 'select',
				'section'  => 'section-blog-single',
				'priority' => 5,
				'label'    => __( 'Single Post Content Width', 'kemet' ),
				'choices'  => array(
					'default' => __( 'Default', 'kemet' ),
					'custom'  => __( 'Custom', 'kemet' ),
				),
			),
			'blog-single-max-width'      => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-blog-single',
				'priority'    => 10,
				'label'       => __( 'Enter Width', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 768,
					'step' => 1,
					'max'  => 1920,
				),
				'context'     => array(
					array(
						'setting' => 'blog-single-width',
						'value'   => 'custom',
					),
				),
			),
			'blog-single-post-structure' => array(
				'type'     => 'kmt-sortable',
				'section'  => 'section-blog-single',
				'priority' => 15,
				'label'    => __( 'Single Post Structure', 'kemet' ),
				'choices'  => array(
					'single-image'      => __( 'Featured Image', 'kemet' ),
					'single-title-meta' => __( 'Title & Blog Meta', 'kemet' ),
				),
			),
			'blog-single-meta'           => array(
				'type'     => 'kmt-sortable',
				'section'  => 'section-blog-single',
				'priority' => 20,
				'label'    => __( 'Single Post Meta', 'kemet' ),
				'choices'  => array(
					'author'   => __( 'Author', 'kemet' ),
					'category' => __( 'Category', 'kemet' ),
					'date'     => __( 'Publish Date', 'kemet' ),
					'comments' => __( 'Comments', 'kemet' ),
					'tag'      => __( 'Tags', 'kemet' ),
				),
				'context'  => array(
					array(
						'setting'  => 'blog-single-post-structure',
						'operator' => 'contain',
						'value'    => 'single-title-meta',
					),
				),
			),
			'kmt-single-post-style'      => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Title and Meta', 'kemet' ),
				'section'  => 'section-blog-single',
				'priority' => 30,
			),
			'font-size-entry-title'      => array(
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-blog-single',
				'transport'    => 'postMessage',
				'priority'     => 35,
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
			),
			'letter-spacing-entry-title' => array(
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-blog-single',
				'transport'    => 'postMessage',
				'priority'     => 38,
				'label'        => __( 'Title Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
			),
			'font-color-entry-title'     => array(
				'type'      => 'kmt-color',
				'section'   => 'section-blog-single',
				'transport' => 'postMessage',
				'priority'  => 40,
				'label'     => __( 'Post Title Font Color', 'kemet' ),
			),
			'single-post-meta-color'     => array(
				'type'      => 'kmt-color',
				'section'   => 'section-blog-single',
				'transport' => 'postMessage',
				'priority'  => 41,
				'label'     => __( 'Post Meta Color', 'kemet' ),

			),
			'comment-button-spacing'     => array(
				'type'           => 'kmt-responsive-spacing',
				'section'        => 'section-blog-single',
				'transport'      => 'postMessage',
				'priority'       => 70,
				'label'          => __( 'Comment Button Spacing', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
			),
		);

		return array_merge( $options, $single_blog_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$single_blog_sections = array(
			'section-blog-single' => array(
				'priority' => 10,
				'title'    => __( 'Single Post', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-blog-group',
			),
		);

		return array_merge( $sections, $single_blog_sections );

	}
}


new Kemet_Blog_Single_Customizer();


