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
class Kemet_Blog_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$register_options = array(
			'blog-controls-tabs'        => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'blog-width'          => array(
								'type'    => 'kmt-select',
								'label'   => __( 'Blog Content Width', 'kemet' ),
								'choices' => array(
									'default' => __( 'Default', 'kemet' ),
									'custom'  => __( 'Custom', 'kemet' ),
								),
							),
							'blog-max-width'      => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Enter Width', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 768,
										'step' => 1,
										'max'  => 1920,
									),
								),
								'preview'      => array(
									'selector' => '.blog .site-content > .kmt-container, .archive .site-content > .kmt-container, .search .site-content > .kmt-container',
									'property' => 'max-width',
								),
								'context'      => array(
									array(
										'setting' => 'blog-width',
										'value'   => 'custom',
									),
								),
							),
							'blog-post-structure' => array(
								'type'    => 'kmt-sortable',
								'label'   => __( 'Blog Post Structure', 'kemet' ),
								'choices' => array(
									'image'            => __( 'Featured Image', 'kemet' ),
									'title-meta'       => __( 'Title & Blog Meta', 'kemet' ),
									'content-readmore' => __( 'Content & Readmore', 'kemet' ),
								),
							),
							'blog-meta'           => array(
								'type'    => 'kmt-sortable',
								'label'   => __( 'Blog Meta', 'kemet' ),
								'choices' => array(
									'comments' => __( 'Comments', 'kemet' ),
									'category' => __( 'Category', 'kemet' ),
									'author'   => __( 'Author', 'kemet' ),
									'date'     => __( 'Publish Date', 'kemet' ),
									'tag'      => __( 'Tag', 'kemet' ),
								),
								'context' => array(
									array(
										'setting'  => 'blog-post-structure',
										'operator' => 'contain',
										'value'    => 'title-meta',
									),
								),
							),
							'blog-post-content'   => array(
								'label'   => __( 'Blog Post Content', 'kemet' ),
								'type'    => 'kmt-select',
								'choices' => array(
									'full-content' => __( 'Full Content', 'kemet' ),
									'excerpt'      => __( 'Excerpt', 'kemet' ),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'main-entry-content-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Main Content Entry Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.content-area .entry-content',
										'property' => '--textColor',
									),
								),
							),
							'pagination-padding'       => array(
								'transport'      => 'postMessage',
								'type'           => 'kmt-responsive-spacing',
								'responsive'     => true,
								'label'          => __( 'Pagination Spacing', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => '.site-content .kmt-pagination',
									'property'   => '--padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
						),
					),
				),
			),
			'kmt-blog-post-title'       => array(
				'type'  => 'kmt-title',
				'label' => __( 'Title and Meta Style', 'kemet' ),
			),
			'font-size-page-title'      => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-slider',
				'responsive'   => true,
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
				'preview'      => array(
					'selector'   => '.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a',
					'property'   => '--fontSize',
					'responsive' => true,
				),
			),
			// 'post-title-font-family'    => array(
			// 'type'    => 'kmt-font-family',
			// 'label'   => __( 'Font Family', 'kemet' ),
			// 'connect' => KEMET_THEME_SETTINGS . '[post-title-font-weight]',
			// ),
			// 'post-title-font-weight'    => array(
			// 'type'    => 'kmt-font-weight',
			// 'label'   => __( 'Font Weight', 'kemet' ),
			// 'connect' => KEMET_THEME_SETTINGS . '[post-title-font-family]',
			// ),
			'post-title-text-transform' => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Text Transform', 'kemet' ),
				'choices'   => array(
					''           => __( 'Default', 'kemet' ),
					'none'       => __( 'None', 'kemet' ),
					'capitalize' => __( 'Capitalize', 'kemet' ),
					'uppercase'  => __( 'Uppercase', 'kemet' ),
					'lowercase'  => __( 'Lowercase', 'kemet' ),
				),
				'preview'   => array(
					'selector' => '.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a',
					'property' => '--textTransform',
				),
			),
			'post-title-font-style'     => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Font Style', 'kemet' ),
				'section'   => 'section-blog',
				'priority'  => 5,
				'choices'   => array(
					'inherit' => __( 'Inherit', 'kemet' ),
					'normal'  => __( 'Normal', 'kemet' ),
					'italic'  => __( 'Italic', 'kemet' ),
					'oblique' => __( 'Oblique', 'kemet' ),
				),
				'preview'   => array(
					'selector' => '.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a',
					'property' => '--fontStyle',
				),
			),
			'post-title-line-height'    => array(
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'transport'    => 'postMessage',
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
				'preview'      => array(
					'selector'   => '.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a',
					'property'   => '--lineHeight',
					'responsive' => true,
				),
			),
			'letter-spacing-page-title' => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector'   => '.blog-posts-container .entry-title , .blog-posts-container .entry-title a , .category-blog .entry-title a',
					'property'   => '--letterSpacing',
					'responsive' => true,
				),
			),
			'font-size-post-meta'       => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-slider',
				'responsive'   => true,
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
				'preview'      => array(
					'selector'   => '.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *',
					'property'   => '--fontSize',
					'responsive' => true,
				),
			),
			// 'post-meta-font-family'     => array(
			// 'type'    => 'kmt-font-family',
			// 'label'   => __( 'Font Family', 'kemet' ),
			// 'connect' => KEMET_THEME_SETTINGS . '[post-meta-font-weight]',
			// ),
			// 'post-meta-font-weight'     => array(
			// 'type'    => 'kmt-font-weight',
			// 'label'   => __( 'Font Weight', 'kemet' ),
			// 'connect' => KEMET_THEME_SETTINGS . '[post-meta-font-family]',
			// ),
			'post-meta-text-transform'  => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Text Transform', 'kemet' ),
				'choices'   => array(
					''           => __( 'Default', 'kemet' ),
					'none'       => __( 'None', 'kemet' ),
					'capitalize' => __( 'Capitalize', 'kemet' ),
					'uppercase'  => __( 'Uppercase', 'kemet' ),
					'lowercase'  => __( 'Lowercase', 'kemet' ),
				),
				'preview'   => array(
					'selector' => '.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *',
					'property' => '--textTransform',
				),
			),
			'post-meta-font-style'      => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Font Style', 'kemet' ),
				'choices'   => array(
					'inherit' => __( 'Inherit', 'kemet' ),
					'normal'  => __( 'Normal', 'kemet' ),
					'italic'  => __( 'Italic', 'kemet' ),
					'oblique' => __( 'Oblique', 'kemet' ),
				),
				'preview'   => array(
					'selector' => '.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *',
					'property' => '--fontStyle',
				),
			),
			'post-meta-line-height'     => array(
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'transport'    => 'postMessage',
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
				'preview'      => array(
					'selector'   => '.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *',
					'property'   => '--lineHeight',
					'responsive' => true,
				),
			),
			'letter-spacing-post-meta'  => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector'   => '.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *',
					'property'   => '--letterSpacing',
					'responsive' => true,
				),
			),
			'listing-post-title-color'  => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Title Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.content-area .entry-title a',
						'property' => '--headingLinksColor',
					),
					'hover'   => array(
						'selector' => '.content-area .entry-title a',
						'property' => '--linksHoverColor',
					),
				),
			),
			'listing-post-meta-color'   => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Meta Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.blog-posts-container .entry-meta , .blog-posts-container .entry-meta * , .category-blog .entry-meta *',
						'property' => '--textColor',
					),
				),
			),
			'kmt-blog-readmore'         => array(
				'type'  => 'kmt-title',
				'label' => __( 'Read More Button Style', 'kemet' ),
			),
			'readmore-as-button'        => array(
				'type'      => 'kmt-switcher',
				'transport' => 'postMessage',
				'label'     => __( 'Enable Read More As Button', 'kemet' ),
			),
			'readmore-text-color'       => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.content-area .read-more a',
						'property' => '--buttonColor',
					),
					'hover'   => array(
						'selector' => '.content-area .read-more a',
						'property' => '--buttonHoverColor',
					),
				),
				'context'   => array(
					array(
						'setting' => 'readmore-as-button',
						'value'   => true,
					),
				),
			),
			'readmore-bg-color'         => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.content-area .read-more a',
						'property' => '--buttonBackgroundColor',
					),
					'hover'   => array(
						'selector' => '.content-area .read-more a',
						'property' => '--buttonBackgroundHoverColor',
					),
				),
				'context'   => array(
					array(
						'setting' => 'readmore-as-button',
						'value'   => true,
					),
				),
			),
			'readmore-border-color'     => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Border Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.content-area .read-more a',
						'property' => '--borderColor',
					),
					'hover'   => array(
						'selector' => '.content-area .read-more a',
						'property' => '--borderHoverColor',
					),
				),
				'context'   => array(
					array(
						'setting' => 'readmore-as-button',
						'value'   => true,
					),
				),
			),
			'read-more-border-radius'   => array(
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'transport'    => 'postMessage',
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
				'preview'      => array(
					'selector'   => '.content-area .read-more a',
					'property'   => '--borderRadius',
					'responsive' => true,
				),
				'context'      => array(
					array(
						'setting' => 'readmore-as-button',
						'value'   => true,
					),
				),
			),
			'read-more-border-size'     => array(
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'transport'    => 'postMessage',
				'label'        => __( 'Read More Border Size', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 15,
					),
				),
				'preview'      => array(
					'selector'   => '.content-area .read-more a',
					'property'   => '--borderWidth',
					'responsive' => true,
				),
				'context'      => array(
					array(
						'setting' => 'readmore-as-button',
						'value'   => true,
					),
				),
			),
			'readmore-padding'          => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'label'          => __( 'Read More Padding', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => '.content-area .read-more a',
					'property'   => '--padding',
					'sides'      => false,
					'responsive' => true,
				),
				'context'        => array(
					array(
						'setting' => 'readmore-as-button',
						'value'   => true,
					),
				),
			),
		);

		$register_options = array(
			'blog-options' => array(
				'section' => 'section-blog',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $register_options,
				),
			),
		);

		return array_merge( $options, $register_options );

	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$blog_sections = array(
			'section-blog-group' => array(
				'priority' => 40,
				'title'    => __( 'Blog', 'kemet' ),
				'panel'    => 'panel-layout',
			),
			'section-blog'       => array(
				'priority' => 5,
				'title'    => __( 'Blog/Archive', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-blog-group',
			),
		);

		return array_merge( $sections, $blog_sections );

	}
}
new Kemet_Blog_Customizer();

