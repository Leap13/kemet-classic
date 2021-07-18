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
		$global_selectors = 'body, button, input, select, textarea, .button, a.wp-block-button__link';
		$global_headings  = 'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a';
		$register_options = array(
			'kmt-content-styling-title' => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Body Content Style', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 0,
			),
			'content-text-color'        => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'priority'  => 5,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => '.entry-content',
					'property' => '--textColor',
				),
			),
			'font-size-body'            => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 10,
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
					'selector' => $global_selectors,
					'property' => '--fontSize',
				),
			),
			'body-font-family'          => array(
				'type'     => 'kmt-font-family',
				'label'    => __( 'Font Family', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 15,
				'connect'  => KEMET_THEME_SETTINGS . '[body-font-weight]',
			),
			'body-font-weight'          => array(
				'type'     => 'kmt-font-weight',
				'label'    => __( 'Font Weight', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 20,
				'connect'  => KEMET_THEME_SETTINGS . '[body-font-family]',
			),
			'body-text-transform'       => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Text Transform', 'kemet' ),
				'section'   => 'section-contents',
				'priority'  => 25,
				'choices'   => array(
					''           => __( 'Default', 'kemet' ),
					'none'       => __( 'None', 'kemet' ),
					'capitalize' => __( 'Capitalize', 'kemet' ),
					'uppercase'  => __( 'Uppercase', 'kemet' ),
					'lowercase'  => __( 'Lowercase', 'kemet' ),
				),
				'preview'   => array(
					'selector' => $global_selectors,
					'property' => '--textTransform',
				),
			),
			'body-font-style'           => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __( 'Font Style', 'kemet' ),
				'section'   => 'section-contents',
				'priority'  => 30,
				'choices'   => array(
					'inherit' => __( 'Inherit', 'kemet' ),
					'normal'  => __( 'Normal', 'kemet' ),
					'italic'  => __( 'Italic', 'kemet' ),
					'oblique' => __( 'Oblique', 'kemet' ),
				),
				'preview'   => array(
					'selector' => $global_selectors,
					'property' => '--fontStyle',
				),
			),
			'body-line-height'          => array(
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-contents',
				'transport'    => 'postMessage',
				'priority'     => 35,
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
					'selector' => $global_selectors,
					'property' => '--lineHeight',
				),
			),
			'letter-spacing-body'       => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 40,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => $global_selectors,
					'property' => '--letterSpacing',
				),
			),
			'para-margin-bottom'        => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-contents',
				'priority'    => 45,
				'label'       => __( 'Paragraph Margin Bottom', 'kemet' ),
				'suffix'      => 'em',
				'input_attrs' => array(
					'min'  => 0.5,
					'step' => 0.01,
					'max'  => 5,
				),
				'preview'     => array(
					'selector' => 'p, .entry-content p',
					'property' => '--marginBottom',
					'unit'     => 'em',
				),
			),
			'content-link-color'        => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'priority'  => 50,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => '.entry-content a',
					'property' => '--headingLinksColor',
				),
			),
			'content-link-color'        => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Link Hover Color', 'kemet' ),
				'priority'  => 52,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => '.entry-content a',
					'property' => '--linksHoverColor',
				),
			),
			'kmt-heading-styling-title' => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Headings Style', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 55,
			),
			'headings-font-family'      => array(
				'type'     => 'kmt-font-family',
				'label'    => __( 'Font Family', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 60,
				'connect'  => KEMET_THEME_SETTINGS . '[headings-font-weight]',
			),
			'headings-font-weight'      => array(
				'type'        => 'kmt-font-weight',
				'kmt_inherit' => __( 'Default', 'kemet' ),
				'section'     => 'section-contents',
				'priority'    => 65,
				'label'       => __( 'Font Weight', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[headings-font-family]',
			),
			'headings-text-transform'   => array(
				'section'   => 'section-contents',
				'transport' => 'postMessage',
				'label'     => __( 'Text Transform', 'kemet' ),
				'type'      => 'kmt-select',
				'priority'  => 70,
				'choices'   => array(
					''           => __( 'Inherit', 'kemet' ),
					'none'       => __( 'None', 'kemet' ),
					'capitalize' => __( 'Capitalize', 'kemet' ),
					'uppercase'  => __( 'Uppercase', 'kemet' ),
					'lowercase'  => __( 'Lowercase', 'kemet' ),
				),
				'preview'   => array(
					'selector' => $global_headings,
					'property' => '--textTransform',
				),
			),
			'kmt-heading-1'             => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Heading 1', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 75,
			),
			'font-color-h1'             => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'priority'  => 80,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => 'h1, .entry-content h1, .entry-content h1 a',
					'property' => '--headingLinksColor',
				),
			),
			'font-size-h1'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 85,
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
					'selector' => 'h1, .entry-content h1, .entry-content h1 a',
					'property' => '--fontSize',
				),
			),
			'letter-spacing-h1'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 90,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => 'h1, .entry-content h1, .entry-content h1 a',
					'property' => '--letterSpacing',
				),
			),
			'kmt-heading-2'             => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Heading 2', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 95,
			),
			'font-color-h2'             => array(
				'type'      => 'kmt-color',
				'label'     => __( 'Font Color', 'kemet' ),
				'transport' => 'postMessage',
				'priority'  => 100,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => 'h2, .entry-content h2, .entry-content h2 a',
					'property' => '--headingLinksColor',
				),
			),
			'font-size-h2'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 105,
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
						'max'  => 20,
					),
				),
				'preview'      => array(
					'selector' => 'h2, .entry-content h2, .entry-content h2 a',
					'property' => '--fontSize',
				),
			),
			'letter-spacing-h2'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 110,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => 'h2, .entry-content h2, .entry-content h2 a',
					'property' => '--letterSpacing',
				),
			),
			'kmt-heading-3'             => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Heading 3', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 115,
			),
			'font-color-h3'             => array(
				'type'      => 'kmt-color',
				'label'     => __( 'Font Color', 'kemet' ),
				'transport' => 'postMessage',
				'priority'  => 120,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => 'h3, .entry-content h3, .entry-content h3 a',
					'property' => '--headingLinksColor',
				),
			),
			'font-size-h3'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 125,
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
						'max'  => 20,
					),
				),
				'preview'      => array(
					'selector' => 'h3, .entry-content h3, .entry-content h3 a',
					'property' => '--fontSize',
				),
			),
			'letter-spacing-h3'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 130,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => 'h3, .entry-content h3, .entry-content h3 a',
					'property' => '--letterSpacing',
				),
			),
			'kmt-heading-4'             => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Heading 4', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 135,
			),
			'font-color-h4'             => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'priority'  => 140,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => 'h4, .entry-content h4, .entry-content h4 a',
					'property' => '--headingLinksColor',
				),
			),
			'font-size-h4'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 145,
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
						'max'  => 20,
					),
				),
				'preview'      => array(
					'selector' => 'h4, .entry-content h4, .entry-content h4 a',
					'property' => '--fontSize',
				),
			),
			'letter-spacing-h4'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 150,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => 'h4, .entry-content h4, .entry-content h4 a',
					'property' => '--letterSpacing',
				),
			),
			'kmt-heading-5'             => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Heading 5', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 155,
			),
			'font-color-h5'             => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'priority'  => 156,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => 'h5, .entry-content h5, .entry-content h5 a',
					'property' => '--headingLinksColor',
				),
			),
			'font-size-h5'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 160,
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
						'max'  => 20,
					),
				),
				'preview'      => array(
					'selector' => 'h5, .entry-content h5, .entry-content h5 a',
					'property' => '--fontSize',
				),
			),
			'letter-spacing-h5'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 165,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => 'h5, .entry-content h5, .entry-content h5 a',
					'property' => '--letterSpacing',
				),
			),
			'kmt-heading-6'             => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Heading 6', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 170,
			),
			'font-color-h6'             => array(
				'type'      => 'kmt-color',
				'label'     => __( 'Font Color', 'kemet' ),
				'transport' => 'postMessage',
				'priority'  => 175,
				'section'   => 'section-contents',
				'preview'   => array(
					'selector' => 'h6, .entry-content h6, .entry-content h6 a',
					'property' => '--headingLinksColor',
				),
			),
			'font-size-h6'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 180,
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
						'max'  => 20,
					),
				),
				'preview'      => array(
					'selector' => 'h6, .entry-content h6, .entry-content h6 a',
					'property' => '--fontSize',
				),
			),
			'letter-spacing-h6'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-contents',
				'priority'     => 185,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => 'h6, .entry-content h6, .entry-content h6 a',
					'property' => '--letterSpacing',
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
