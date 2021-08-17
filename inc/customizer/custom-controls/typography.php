<?php

class Kemet_Fonts_Manager {
	private $matching_fonts_collection = [];
	public static $google_fonts = array();


	public function get_all_fonts() {
		return apply_filters('kemet_typography_font_sources', [
			'system' => [
				'type' => 'system',
				'families' => $this->get_system_fonts(),
			],

			'google' => [
				'type' => 'google',
				'families' => $this->get_googgle_fonts()
				// 'families' => []
			]
		]);
	}

	public function process_matching_typography($value) {
		$family_to_push = 'Default';
		$variation_to_push = 'Default';

		if ($value && isset($value['family'])) {
			$family_to_push = $value['family'];
		}

		if ($value && isset($value['variation'])) {
			$variation_to_push = $value['variation'];
		}

		if (! isset($this->matching_fonts_collection[$family_to_push])) {
			$this->matching_fonts_collection[$family_to_push] = [$variation_to_push];
		} else {
			$this->matching_fonts_collection[$family_to_push][] = $variation_to_push;
		}

		$this->matching_fonts_collection[$family_to_push] = array_unique(
			$this->matching_fonts_collection[$family_to_push]
		);
	}

	public function get_matching_google_fonts() {
		$matching_fonts_collection = $this->matching_fonts_collection;

		$matching_google_fonts = [];

		$all_fonts = $this->get_system_fonts();

		$system_fonts_families = [];

		foreach ($all_fonts as $single_google_font) {
			$system_fonts_families[] = $single_google_font['family'];
		}

		$default_family = get_theme_mod(
			'rootTypography',
			kemet_typography_default_values([
				'family' => 'System Default',
				'variation' => 'n4',
				'size' => '16px',
				'line-height' => '1.65',
				'letter-spacing' => '0em',
				'text-transform' => 'none',
				'text-decoration' => 'none',
			])
		);

		$default_variation = $default_family['variation'];
		$default_family = $default_family['family'];

		$all_google_fonts = $this->get_googgle_fonts(true);

		foreach ($matching_fonts_collection as $family => $variations) {
			foreach ($variations as $variation) {
				$family_to_use = $family;
				$variation_to_use = $variation;

				if ($family_to_use === 'Default') {
					$family_to_use = $default_family;
				}

				if ($variation_to_use === 'Default') {
					$variation_to_use = $default_variation;
				}

				if (
					in_array($family_to_use, $system_fonts_families)
					||
					$family_to_use === 'Default'
					||
					! isset($all_google_fonts[$family_to_use])
				) {
					continue;
				}

				if (! isset($matching_google_fonts[$family_to_use])) {
					$matching_google_fonts[$family_to_use] = [$variation_to_use];
				} else {
					$matching_google_fonts[$family_to_use][] = $variation_to_use;
				}

				$matching_google_fonts[$family_to_use] = array_unique(
					$matching_google_fonts[$family_to_use]
				);
			}
		}

		return $matching_google_fonts;
	}

	public function load_dynamic_google_fonts($matching_google_fonts) {
		$has_dynamic_google_fonts = apply_filters(
			'kemet:typography:google:use-remote',
			true
		);

		if (! $has_dynamic_google_fonts) {
			return;
		}

		$url = $this->get_google_fonts_url($matching_google_fonts);

		if (! empty($url)) {
			wp_register_style('kemet-fonts-font-source-google', $url, [], null);
			wp_enqueue_style('kemet-fonts-font-source-google');
		}
	}

	public function load_editor_fonts() {
		return;

		$has_dynamic_google_fonts = apply_filters(
			'kemet:typography:google:use-remote',
			true
		);

		if (! $has_dynamic_google_fonts) {
			return;
		}

		$url = $this->get_google_fonts_url($google_fonts, $font_subset );

		if (! empty($url)) {
			wp_register_style('kemet-fonts-font-source-google', $url);
			wp_enqueue_style('kemet-fonts-font-source-google');
		}
	}

public static function get_google_fonts_url( $fonts, $subsets = array() ) {

		/* URL */
		$base_url  = '//fonts.googleapis.com/css';
		$font_args = array();
		$family    = array();

		$fonts = apply_filters( 'kemet_google_fonts', $fonts );

		/* Format Each Font Family in Array */
		foreach ( $fonts as $font_name => $font_weight ) {
			$font_name = str_replace( ' ', '+', $font_name );
			if ( ! empty( $font_weight ) ) {
				if ( is_array( $font_weight ) ) {
					$font_weight = implode( ',', $font_weight );
				}
				$font_family = explode( ',', $font_name );
				$font_family = str_replace( "'", '', kemet_prop( $font_family, 0 ) );
				$family[]    = trim( $font_family . ':' . rawurlencode( trim( $font_weight ) ) );
			} else {
				$family[] = trim( $font_name );
			}
		}

		/* Only return URL if font family defined. */
		if ( ! empty( $family ) ) {

			/* Make Font Family a String */
			$family = implode( '|', $family );

			/* Add font family in args */
			$font_args['family'] = $family;

			/* Add font subsets in args */
			if ( ! empty( $subsets ) ) {

				/* format subsets to string */
				if ( is_array( $subsets ) ) {
					$subsets = implode( ',', $subsets );
				}

				$font_args['subset'] = rawurlencode( trim( $subsets ) );
			}

			return add_query_arg( $font_args, $base_url );
		}

		return '';
	}

	public function get_system_fonts() {
		$system = [
			'System Default',
			'Arial', 'Verdana', 'Trebuchet', 'Georgia', 'Times New Roman',
			'Palatino', 'Helvetica', 'Myriad Pro',
			'Lucida', 'Gill Sans', 'Impact', 'Serif', 'monospace'
		];

		$result = [];

		foreach ($system as $font) {
			$result[] = [
				'source' => 'system',
				'family' => $font,
				'variations' => [],
				'all_variations' => $this->get_standard_variations_descriptors()
			];
		}

		return $result;
	}

	public function get_standard_variations_descriptors() {
		return [
			'n1', 'i1', 'n2', 'i2', 'n3', 'i3', 'n4', 'i4', 'n5', 'i5', 'n6',
			'i6', 'n7', 'i7', 'n8', 'i8', 'n9', 'i9'
		];
	}



	public static function get_google_fonts() {

		if ( empty( self::$google_fonts ) ) {

			$google_fonts_file = apply_filters( 'kemet_google_fonts_json_file', KEMET_THEME_DIR . 'assets/fonts/google-fonts.json' );

			if ( ! file_exists( KEMET_THEME_DIR . 'assets/fonts/google-fonts.json' ) ) {
				return array();
			}

			global $wp_filesystem;
			if ( empty( $wp_filesystem ) ) {
				require_once ABSPATH . '/wp-admin/includes/file.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
				WP_Filesystem();
			}

			$file_contants     = $wp_filesystem->get_contents( $google_fonts_file );
			$google_fonts_json = json_decode( $file_contants, 1 );

			foreach ( $google_fonts_json as $key => $font ) {
				$name = key( $font );
				foreach ( $font[ $name ] as $font_key => $single_font ) {

					if ( 'variants' === $font_key ) {

						foreach ( $single_font as $variant_key => $variant ) {

							if ( 'regular' == $variant ) {
								$font[ $name ][ $font_key ][ $variant_key ] = '400';
							}
						}
					}

					self::$google_fonts[ $name ] = array_values( $font[ $name ] );
				}
			}
		}

		return apply_filters( 'kemet_google_fonts', self::$google_fonts );
	}

	private function prepare_font_data($font) {
		$font['source'] = 'google';

		$font['variations'] = [];

		if (isset($font['variants'])) {
			$font['all_variations'] = $this->change_variations_structure($font['variants']);
		}

		unset($font['variants']);
		return $font;
	}

	private function change_variations_structure( $structure ) {
		$result = [];

		foreach($structure as $weight) {
			$result[] = $this->get_weight_and_style_key($weight);
		}

		return $result;
	}

	private function get_weight_and_style_key($code) {
		$prefix = 'n'; // Font style: italic = `i`, regular = n.
		$sufix = '4';  // Font weight: 1 -> 9.

		$value = strtolower(trim($code));
		$value = str_replace(' ', '', $value);

		# Only number.
		if (is_numeric($value) && isset($value[0])) {
			$sufix = $value[0];
			$prefix = 'n';
		}

		// Italic.
		if (preg_match("#italic#", $value)) {
			if ('italic' === $value) {
				$sufix = 4;
				$prefix = 'i';
			} else {
				$value = trim(str_replace('italic', '', $value));
				if (is_numeric($value) && isset($value[0])) {
					$sufix = $value[0];
					$prefix = 'i';
				}
			}
		}

		// Regular.
		if (preg_match("#regular|normal#", $value)) {
			if ('regular' === $value) {
				$sufix = 4;
				$prefix = 'n';
			} else {
				$value = trim(str_replace(array('regular', 'normal') , '', $value));

				if (is_numeric($value) && isset($value[0])) {
					$sufix = $value[0];
					$prefix = 'n';
				}
			}
		}

		return "{$prefix}{$sufix}";
	}
}

if (! function_exists('kemet_output_font_css')) {
	function kemet_output_font_css($args = []) {
		$args = wp_parse_args(
			$args,
			[
				'css' => null,
				'tablet_css' => null,
				'mobile_css' => null,
				'font_value' => null,
				'selector' => ':root',
				'prefix' => ''
			]
		);

		if (! $args['css']) {
			throw new Error('css missing in args!');
		}

		if (! $args['tablet_css']) {
			throw new Error('tablet_css missing in args!');
		}

		if (! $args['mobile_css']) {
			throw new Error('mobile_css missing in args!');
		}

		$args['css']->process_matching_typography($args['font_value']);

		if ($args['font_value']['family'] === 'System Default') {
			$args['font_value']['family'] = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'";
		} else {
			$fonts_manager = new Kemet_Fonts_Manager();

			if (! in_array(
				$args['font_value']['family'],
				$fonts_manager->get_system_fonts()
			) && $args['font_value']['family'] !== 'Default') {
				$args['font_value']['family'] .= ", " . get_theme_mod(
					'font_family_fallback',
					'Sans-Serif'
				);
			}
		}

		if ($args['font_value']['family'] === 'Default') {
			$args['font_value']['family'] = 'CT_CSS_SKIP_RULE';
		}

		$correct_font_family = str_replace(
			'ct_typekit_',
			'',
			$args['font_value']['family']
		);

		$args['css']->put(
			$args['selector'],
			"--" . kemet_camel_case_prefix('fontFamily', $args['prefix']) . ": {$correct_font_family}"
		);

		$weight_and_style = kemet_get_css_for_variation(
			$args['font_value']['variation']
		);

		$args['css']->put(
			$args['selector'],
			"--" . kemet_camel_case_prefix('fontWeight', $args['prefix']) . ": {$weight_and_style['weight']}"
		);

		if ($weight_and_style['style'] !== 'normal') {
			$args['css']->put(
				$args['selector'],
				"--" . kemet_camel_case_prefix('fontStyle', $args['prefix']) . ": {$weight_and_style['style']}"
			);
		}

		$args['css']->put(
			$args['selector'],
			"--" . kemet_camel_case_prefix('textTransform', $args['prefix']) . ": {$args['font_value']['text-transform']}"
		);

		$args['css']->put(
			$args['selector'],
			"--" . kemet_camel_case_prefix('textDecoration', $args['prefix']) . ": {$args['font_value']['text-decoration']}"
		);

		kemet_output_responsive([
			'css' => $args['css'],
			'tablet_css' => $args['tablet_css'],
			'mobile_css' => $args['mobile_css'],
			'selector' => $args['selector'],
			'variableName' => kemet_camel_case_prefix('fontSize', $args['prefix']),
			'unit' => '',
			'value' => $args['font_value']['size']
		]);

		kemet_output_responsive([
			'css' => $args['css'],
			'tablet_css' => $args['tablet_css'],
			'mobile_css' => $args['mobile_css'],
			'selector' => $args['selector'],
			'variableName' => kemet_camel_case_prefix(
				'lineHeight',
				$args['prefix']
			),
			'unit' => '',
			'value' => $args['font_value']['line-height']
		]);

		kemet_output_responsive([
			'css' => $args['css'],
			'tablet_css' => $args['tablet_css'],
			'mobile_css' => $args['mobile_css'],
			'selector' => $args['selector'],
			'variableName' => kemet_camel_case_prefix(
				'letterSpacing',
				$args['prefix']
			),
			'unit' => '',
			'value' => $args['font_value']['letter-spacing']
		]);
	}
}

if (! function_exists('kemet_get_css_for_variation')) {
	function kemet_get_css_for_variation($variation, $should_output_normals = true) {
		$weight_and_style = [
			'style' => '',
			'weight' => '',
		];

		if ($variation === 'Default') {
			return [
				'style' => 'CT_CSS_SKIP_RULE',
				'weight' => 'CT_CSS_SKIP_RULE'
			];
		}

		if (preg_match(
			"#(n|i)(\d+?)$#",
			$variation,
			$matches
		)) {
			if ('i' === $matches[1]) {
				$weight_and_style['style'] = 'italic';
			} else {
				$weight_and_style['style'] = 'normal';
			}

			$weight_and_style['weight'] = (int) $matches[2] . '00';
		}

		return $weight_and_style;
	}
}



add_action( 'wp_ajax_kemet_get_fonts_list', function () {
	

	$m = new Kemet_Fonts_Manager();

	wp_send_json_success([
		'fonts' => $m->get_all_fonts()
	]);
});

