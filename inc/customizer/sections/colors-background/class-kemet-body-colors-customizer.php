<?php
/**
 * Styling Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Body_Color_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$register_options = array(
			'colorPalette' => array(
					'label' => __( 'Global Color Palette', 'Kemet' ),
					'type'  => 'kmt-color-palettes',
					'value' =>array(
						'color1' => array(
							'color' => '#2872fa',
						),

						'color2' => array(
							'color' => '#1559ed',
						),

						'color3' => array(
							'color' => '#3A4F66',
						),

						'color4' => array(
							'color' => '#192a3d',
						),

						'color5' => array(
							'color' => '#e1e8ed',
						),

						'color6' => array(
							'color' => '#f2f5f7',
						),

						'color7' => array(
							'color' => '#FAFBFC',
						),

						'color8' => array(
							'color' => '#ffffff',
						),

						'current_palette' => 'palette-2',

						'palettes' => array(
							[
								'id' => 'palette-2',

								'color1' => [
									'color' => '#2872fa',
								],

								'color2' => [
									'color' => '#1559ed',
								],

								'color3' => [
									'color' => '#3A4F66',
								],

								'color4' => [
									'color' => '#192a3d',
								],

								'color5' => [
									'color' => '#e1e8ed',
								],

								'color6' => [
									'color' => '#f2f5f7',
								],

								'color7' => [
									'color' => '#FAFBFC',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],
							
							[
								'id' => 'palette-1',

								'color1' => [
									'color' => '#3eaf7c',
								],

								'color2' => [
									'color' => '#33a370',
								],

								'color3' => [
									'color' => '#415161',
								],

								'color4' => [
									'color' => '#2c3e50',
								],

								'color5' => [
									'color' => '#E2E7ED',
								],

								'color6' => [
									'color' => '#edeff2',
								],

								'color7' => [
									'color' => '#f8f9fb',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-3',

								'color1' => [
									'color' => '#FB7258',
								],

								'color2' => [
									'color' => '#F74D67',
								],

								'color3' => [
									'color' => '#6e6d76',
								],

								'color4' => [
									'color' => '#0e0c1b',
								],

								'color5' => [
									'color' => '#DFDFE2',
								],

								'color6' => [
									'color' => '#F4F4F5',
								],

								'color7' => [
									'color' => '#FBFBFB',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-4',

								'color1' => [
									'color' => '#98c1d9',
								],

								'color2' => [
									'color' => '#E84855',
								],

								'color3' => [
									'color' => '#475671',
								],

								'color4' => [
									'color' => '#293241',
								],

								'color5' => [
									'color' => '#E7E9EF',
								],

								'color6' => [
									'color' => '#f3f4f7',
								],

								'color7' => [
									'color' => '#FBFBFC',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-5',

								'color1' => [
									'color' => '#006466',
								],

								'color2' => [
									'color' => '#065A60',
								],

								'color3' => [
									'color' => '#7F8C9A',
								],

								'color4' => [
									'color' => '#ffffff',
								],

								'color5' => [
									'color' => '#1e2933',
								],

								'color6' => [
									'color' => '#0F141A',
								],

								'color7' => [
									'color' => '#141b22',
								],

								'color8' => [
									'color' => '#1B242C',
								],
							],

							[
								'id' => 'palette-6',

								'color1' => [
									'color' => '#007f5f',
								],

								'color2' => [
									'color' => '#55a630',
								],

								'color3' => [
									'color' => '#365951',
								],

								'color4' => [
									'color' => '#192c27',
								],

								'color5' => [
									'color' => '#E6F0EE',
								],

								'color6' => [
									'color' => '#F2F7F6',
								],

								'color7' => [
									'color' => '#FBFCFC',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-7',

								'color1' => [
									'color' => '#7456f1',
								],

								'color2' => [
									'color' => '#5e3fde',
								],

								'color3' => [
									'color' => '#4d5d6d',
								],

								'color4' => [
									'color' => '#102136',
								],

								'color5' => [
									'color' => '#E7EBEE',
								],

								'color6' => [
									'color' => '#F3F5F7',
								],

								'color7' => [
									'color' => '#FBFBFC',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-8',

								'color1' => [
									'color' => '#00509d',
								],

								'color2' => [
									'color' => '#003f88',
								],

								'color3' => [
									'color' => '#828487',
								],

								'color4' => [
									'color' => '#28292a',
								],

								'color5' => [
									'color' => '#e8ebed',
								],

								'color6' => [
									'color' => '#f4f5f6',
								],

								'color7' => [
									'color' => '#FBFBFC',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-9',

								'color1' => [
									'color' => '#84a98c',
								],

								'color2' => [
									'color' => '#52796f',
								],

								'color3' => [
									'color' => '#cad2c5',
								],

								'color4' => [
									'color' => '#84a98c',
								],

								'color5' => [
									'color' => '#384b56',
								],

								'color6' => [
									'color' => '#212b31',
								],

								'color7' => [
									'color' => '#29363d',
								],

								'color8' => [
									'color' => '#314149',
								],
							],

							[
								'id' => 'palette-10',

								'color1' => [
									'color' => '#ff6d00',
								],

								'color2' => [
									'color' => '#ff8500',
								],

								'color3' => [
									'color' => '#cfa9ef',
								],

								'color4' => [
									'color' => '#e3cbf6',
								],

								'color5' => [
									'color' => '#5a189a',
								],

								'color6' => [
									'color' => '#240046',
								],

								'color7' => [
									'color' => '#3c096c',
								],

								'color8' => [
									'color' => '#410a75',
								],
							],

							[
								'id' => 'palette-11',

								'color1' => [
									'color' => '#ffcd05',
								],

								'color2' => [
									'color' => '#fcb424',
								],

								'color3' => [
									'color' => '#504e4a',
								],

								'color4' => [
									'color' => '#0a0500',
								],

								'color5' => [
									'color' => '#edeff2',
								],

								'color6' => [
									'color' => '#f9fafb',
								],

								'color7' => [
									'color' => '#FDFDFD',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-12',

								'color1' => [
									'color' => '#a8977b',
								],

								'color2' => [
									'color' => '#7f715c',
								],

								'color3' => [
									'color' => '#3f4245',
								],

								'color4' => [
									'color' => '#111518',
								],

								'color5' => [
									'color' => '#eaeaec',
								],

								'color6' => [
									'color' => '#f4f4f5',
								],

								'color7' => [
									'color' => '#ffffff',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-13',

								'color1' => [
									'color' => '#48bca2',
								],

								'color2' => [
									'color' => '#25ad99',
								],

								'color3' => [
									'color' => '#4f4f4f',
								],

								'color4' => [
									'color' => '#0a0500',
								],

								'color5' => [
									'color' => '#EBEBEB',
								],

								'color6' => [
									'color' => '#F5F5F5',
								],

								'color7' => [
									'color' => '#ffffff',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-14',

								'color1' => [
									'color' => '#ff6310',
								],

								'color2' => [
									'color' => '#fd7c47',
								],

								'color3' => [
									'color' => '#687279',
								],

								'color4' => [
									'color' => '#111518',
								],

								'color5' => [
									'color' => '#E9EBEC',
								],

								'color6' => [
									'color' => '#F4F5F6',
								],

								'color7' => [
									'color' => '#ffffff',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-15',

								'color1' => [
									'color' => '#fca311',
								],

								'color2' => [
									'color' => '#23396c',
								],

								'color3' => [
									'color' => '#707070',
								],

								'color4' => [
									'color' => '#000000',
								],

								'color5' => [
									'color' => '#e0e0e0',
								],

								'color6' => [
									'color' => '#f1f1f1',
								],

								'color7' => [
									'color' => '#fafafa',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

						)
						),
				),
			'theme-color'              => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Primary Color', 'kemet' ),
				'description' => __( 'Used for buttons background (a darker shade from it used for mouseover), and hover color for links.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'headings-links-color'     => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Headings & Links Color', 'kemet' ),
				'description' => __( "Used for all titles from H1 to H6, widgets' title, main menu links, and all other body links.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'text-meta-color'          => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Body Text & Meta Color', 'kemet' ),
				'description' => __( "Used for body text, meta color, and forms' input text color.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-border-color'      => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Border & Separator Color', 'kemet' ),
				'description' => __( 'Used for all the borders and separators across the website.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-background-color'  => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Background Color', 'kemet' ),
				'description' => __( "Used for the body background color, a tint from it used for the input, page title, and widgets' background.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-footer-text-color' => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Footer Text Color', 'kemet' ),
				'description' => __( 'Used for footer titles, and links. Darker shades from it are used for input fields background, footer buttons, and copyright area.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-footer-bg-color'   => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Footer Background Color', 'kemet' ),
				'description' => __( 'Used for the footer background, and a darker shade from it is used for the input fields background, footer buttons, and copyright area.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
		);

		$register_options = array(
			'colors-options' => array(
				'section' => 'section-colors-body',
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
		$register_sections = array(
			'section-colors-body' => array(
				'title'    => __( 'Global Colors', 'kemet' ),
				'priority' => 15,
			),
		);

		return array_merge( $sections, $register_sections );
	}
}

new Kemet_Body_Color_Customizer();

