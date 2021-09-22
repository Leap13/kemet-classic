<?php
/**
 * Content Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Content_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$global_headings  = 'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a';
		$register_options = array(
			'kmt-content-styling-title' => array(
				'type'  => 'kmt-title',
				'label' => __( 'Body Content Style', 'kemet' ),
			),
			'content-text-color'        => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.entry-content',
						'property' => '--textColor',
					),
				),
			),
			'body-typography'           => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => ':root',
				),
			),
			'para-margin-bottom'        => array(
				'type'         => 'kmt-slider',
				'transport'    => 'postMessage',
				'label'        => __( 'Paragraph Margin Bottom', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 500,
					),
					'em' => array(
						'min'  => 0.5,
						'step' => 0.01,
						'max'  => 12,
					),
				),
				'preview'      => array(
					'selector' => 'p, .entry-content p',
					'property' => '--marginBottom',
					'unit'     => 'em',
				),
			),
			'content-link-color'        => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.entry-content a',
						'property' => '--headingLinksColor',
					),
					'hover'   => array(
						'selector' => '.entry-content a',
						'property' => '--linksHoverColor',
					),
				),
			),
			'kmt-heading-styling-title' => array(
				'type'  => 'kmt-title',
				'label' => __( 'Headings Style', 'kemet' ),
			),
			'headings-typography'       => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Headings Typography', 'kemet' ),
				'preview'   => array(
					'selector' => $global_headings,
				),
			),
			'kmt-heading-1'             => array(
				'type'  => 'kmt-title',
				'label' => __( 'Heading 1', 'kemet' ),
			),
			'font-color-h1'             => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => 'h1, .entry-content h1, .entry-content h1 a',
						'property' => '--headingLinksColor',
					),
				),
			),
			'h1-typography'             => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => 'h1, .entry-content h1, .entry-content h1 a',
				),
			),
			'kmt-heading-2'             => array(
				'type'  => 'kmt-title',
				'label' => __( 'Heading 2', 'kemet' ),
			),
			'font-color-h2'             => array(
				'type'      => 'kmt-color',
				'label'     => __( 'Font Color', 'kemet' ),
				'transport' => 'postMessage',
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => 'h2, .entry-content h2, .entry-content h2 a',
						'property' => '--headingLinksColor',
					),
				),
			),
			'h2-typography'             => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => 'h2, .entry-content h2, .entry-content h2 a',
				),
			),
			'kmt-heading-3'             => array(
				'type'  => 'kmt-title',
				'label' => __( 'Heading 3', 'kemet' ),
			),
			'font-color-h3'             => array(
				'type'      => 'kmt-color',
				'label'     => __( 'Font Color', 'kemet' ),
				'transport' => 'postMessage',
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => 'h3, .entry-content h3, .entry-content h3 a',
						'property' => '--headingLinksColor',
					),
				),
			),
			'h3-typography'             => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => 'h3, .entry-content h3, .entry-content h3 a',
				),
			),
			'kmt-heading-4'             => array(
				'type'  => 'kmt-title',
				'label' => __( 'Heading 4', 'kemet' ),
			),
			'font-color-h4'             => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => 'h4, .entry-content h4, .entry-content h4 a',
						'property' => '--headingLinksColor',
					),
				),
			),
			'h4-typography'             => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => 'h4, .entry-content h4, .entry-content h4 a',
				),
			),
			'kmt-heading-5'             => array(
				'type'  => 'kmt-title',
				'label' => __( 'Heading 5', 'kemet' ),
			),
			'font-color-h5'             => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => 'h5, .entry-content h5, .entry-content h5 a',
						'property' => '--headingLinksColor',
					),
				),
			),
			'h5-typography'             => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => 'h5, .entry-content h5, .entry-content h5 a',
				),
			),
			'kmt-heading-6'             => array(
				'type'  => 'kmt-title',
				'label' => __( 'Heading 6', 'kemet' ),
			),
			'font-color-h6'             => array(
				'type'      => 'kmt-color',
				'label'     => __( 'Font Color', 'kemet' ),
				'transport' => 'postMessage',
				'pickers'   => array(
					array(
						'title' => __( 'Text', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => 'h6, .entry-content h6, .entry-content h6 a',
						'property' => '--headingLinksColor',
					),
				),
			),
			'h6-typography'             => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => 'h6, .entry-content h6, .entry-content h6 a',
				),
			),
		);

		$register_options = array(
			'contents-options' => array(
				'section' => 'section-contents',
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
		$register_section = array(
			'section-contents' => array(
				'title'    => __( 'Content', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 25,
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Content_Customizer();
