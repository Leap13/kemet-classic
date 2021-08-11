<?php
/**
 * Kemet Theme Customizer
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Customizer Loader
 */
if ( ! class_exists( 'Kemet_Customizer' ) ) {

	/**
	 * Customizer Loader
	 */
	class Kemet_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Customizer Dependency Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $dependency_arr = array();

		/**
		 * Customizer Controls Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $controls_arr = array();

		/**
		 * Customizer Panels Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $panels_arr = array();

		/**
		 * Customizer Sections Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $sections_arr = array();

		/**
		 * Customizer Choices Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $choices_arr = array();

		/**
		 * Customizer Contexts Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $contexts_arr = array();

		/**
		 * Customizer Preview Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $preview_arr = array();

		/**
		 * Customizer partials Array.
		 *
		 * @access private
		 * @var array
		 */
		private static $partials_arr = array();

		/**
		 * Sanitize array.
		 *
		 * @access public
		 * @var array
		 */
		public $sanitize = array(
			'kmt-slider'            => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
			'kmt-font-family'       => 'sanitize_text_field',
			'kmt-font-weight'       => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
			'kmt-select'            => 'sanitize_text_field',
			'kmt-color'             => array( 'Kemet_Customizer_Sanitizes', 'sanitize_color' ),
			'kmt-responsive-select' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_select' ),
			'kmt-spacing'           => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
			'image'                 => 'esc_url_raw',
		);

		/**
		 * Controls array.
		 *
		 * @access public
		 * @var array
		 */
		public $custom_controls = array(
			'kmt-available'       => 'Kemet_Control_Available',
			'kmt-builder'         => 'Kemet_Control_Builder',
			'kmt-tabs'            => 'Kemet_Control_Tabs',
			'kmt-focus-button'    => 'Kemet_Control_Focus_Button',
			'kmt-slider'          => 'Kemet_Control_Slider',
			'kmt-sortable'        => 'Kemet_Control_Sortable',
			'kmt-title'           => 'Kemet_Control_Title',
			'kmt-slider'          => 'Kemet_Control_Responsive_Slider',
			'kmt-color'           => 'Kemet_Control_Color',
			'kmt-reponsive-color' => 'Kemet_Control_Responsive_Color',
			'kmt-spacing'         => 'Kemet_Control_Responsive_Spacing',
			'kmt-font-family'     => 'Kemet_Control_Typography',
			'kmt-font-weight'     => 'Kemet_Control_Typography',
			'kmt-background'      => 'Kemet_Control_Background',
			'image'               => 'WP_Customize_Image_Control',
			'kmt-switcher'        => 'Kemet_Control_Toggle',
			'kmt-test'            => 'Kemet_Control_Test',
		);

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-custmoizer-register.php'; // phpcs:ignore  WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			add_action( 'customize_preview_init', array( $this, 'preview_init' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_footer_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register_panel' ), 2 );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			add_action( 'customize_save_after', array( $this, 'customize_save' ) );
			add_action( 'customize_register', array( $this, 'register_customizer_options' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'load_dashicons_front_end' ) );
			add_filter( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ), 999 );
			add_action( 'customize_controls_print_footer_scripts', array( '_WP_Editors', 'force_uncompressed_tinymce' ), 1 );
			add_action( 'customize_controls_print_footer_scripts', array( '_WP_Editors', 'print_default_editor_scripts' ), 45 );
		}

		/**
		 * Add customizer Control
		 *
		 * @param object $control control args.
		 * @return void
		 */
		public function add_customizer( $options, $type = 'options' ) {
			if ( ! is_array( $options ) ) {
				return;
			}

			switch ( $type ) {
				case 'options':
					foreach ( $options as $control_id => $args ) {
						self::$controls_arr[ $control_id ] = $args;
					}
					break;
				case 'panels':
					foreach ( $options as $control_id => $args ) {
						self::$panels_arr[ $control_id ] = $args;
					}
					break;
				case 'sections':
					foreach ( $options as $control_id => $args ) {
						self::$sections_arr[ $control_id ] = $args;
					}
					break;
			}

		}

		/**
		 * Default Responsive value
		 *
		 * @param string $value value.
		 * @return array
		 */
		public static function responsive_default_value( $value, $unit = '' ) {
			if ( is_array( $value ) ) {
				return $value;
			}

			$responsive = array(
				'desktop' => $value,
				'tablet'  => '',
				'mobile'  => '',
			);

			if ( '' !== $unit ) {
				$responsive_units = array(
					'desktop-unit' => 'px',
					'tablet-unit'  => 'px',
					'mobile-unit'  => 'px',
				);
				$responsive       = array_merge( $responsive, $responsive_units );
			}
			return $responsive;
		}
		/**
		 * Add Customizer Controls
		 *
		 * @param object $wp_customize
		 * @return object
		 */
		public function register_customizer_options( $wp_customize ) {
			$options          = $this->get_controls_arr();
			$panels           = $this->get_panels_arr();
			$sections         = $this->get_sections_arr();
			$partials         = $this->get_partials_arr();
			$defautls_options = array( 'blogname', 'custom_logo', 'blogdescription' );
			$defaults         = Kemet_Theme_Options::defaults();

			foreach ( $panels as $panel_id => $args ) {
				$wp_customize->add_panel(
					new Kemet_WP_Customize_Panel(
						$wp_customize,
						$panel_id,
						$args
					)
				);
			}

			foreach ( $sections as $section_id => $args ) {
				$wp_customize->add_section(
					new Kemet_WP_Customize_Section(
						$wp_customize,
						$section_id,
						$args
					)
				);
			}

			foreach ( $options as $option_id => $args ) {

				if ( 'kmt-options' === $args['type'] ) {
					$this->add_options_settings( $args['data']['options'], $wp_customize );
				}

				$this->add_customizer_option( $option_id, $args, $wp_customize );
			}

			$this->add_customizer_partials( $partials, $wp_customize );
		}


		/**
		 * add_customizer_partials
		 *
		 * @param  mixed $partials
		 * @param  mixed $wp_customize
		 * @return void
		 */
		public function add_customizer_partials( $partials, $wp_customize ) {
			$defautls_options = array( 'blogname', 'custom_logo', 'blogdescription' );
			foreach ( $partials as $key => $settings ) {
				$option_id = ! in_array( $key, $defautls_options ) ? KEMET_THEME_SETTINGS . '[' . $key . ']' : $key;
				$wp_customize->selective_refresh->add_partial(
					$option_id,
					$settings
				);
			}
		}

		/**
		 * add_options_settings
		 *
		 * @param  mixed $options
		 * @param  mixed $wp_customize
		 * @return void
		 */
		public function add_options_settings( $options, $wp_customize ) {
			foreach ( $options as $option_id => $args ) {
				$this->add_customizer_option( $option_id, $args, $wp_customize );
			}
		}
		/**
		 * add_customizer_option
		 *
		 * @param  mixed $option_id
		 * @param  mixed $args
		 * @param  mixed $wp_customize
		 * @return void
		 */
		public function add_customizer_option( $option_id, $args, $wp_customize ) {
			$defaults  = Kemet_Theme_Options::defaults();
			$id        = $option_id;
			$option_id = ! isset( $args['override'] ) ? KEMET_THEME_SETTINGS . '[' . $option_id . ']' : $id;

			if ( isset( $args['context'] ) ) {
				self::$contexts_arr[ $option_id ] = $args['context'];
				unset( $args['context'] );
			}

			if ( isset( $args['choices'] ) ) {
				self::$choices_arr[ $option_id ] = $args['choices'];
			}

			if ( isset( $args['preview'] ) ) {
				if ( 'kmt-spacing' === $args['type'] ) {
					$args['preview']['choices'] = $args['choices'];
				}
				$args['preview']['type']         = $args['type'];
				self::$preview_arr[ $option_id ] = $args['preview'];
				unset( $args['preview'] );
			}

			if ( 'kmt-tabs' === $args['type'] ) {
					return $this->add_tabs_settings( $args['tabs'], $wp_customize );
			}

			$default = $this->get_default( $id, $args );

			$settings = array(
				'default'           => $default,
				'type'              => $this->get_control_prop( 'setting_type', $args, 'option' ),
				'sanitize_callback' => isset( $this->sanitize[ $args['type'] ] ) ? $this->sanitize[ $args['type'] ] : false,
				'transport'         => $this->get_control_prop( 'transport', $args, 'refresh' ),
			);

			$wp_customize->add_setting(
				$option_id,
				$settings
			);

			if ( 'image' === $args['type'] ) {
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						$option_id,
						$args
					)
				);
			}
			if ( 'kmt-options' === $args['type'] ) {
				$control                 = $wp_customize->add_control(
					$option_id,
					$args
				);
				$args['data']['options'] = $this->prepare_options( $args['data']['options'] );
				$control->json['data']   = $args['data'];
			}
		}


		/**
		 * get_default
		 *
		 * @param  string $option_id
		 * @param  array  $args
		 * @return mixed
		 */
		public function get_default( $option_id, $args ) {
			$defaults = Kemet_Theme_Options::defaults();
			$default  = isset( $args['default'] ) ? $args['default'] : '';
			if ( '' === $default && isset( $defaults[ $option_id ] ) ) {
				$default = $defaults[ $option_id ];
			}
			return $default;
		}

		/**
		 * prepare_options
		 *
		 * @param  mixed $options
		 * @return array
		 */
		function prepare_options( $options ) {

			foreach ( $options as $id => $args ) {
				if ( isset( $args['type'] ) && 'kmt-tabs' === $args['type'] ) {
					$options[ $id ]['tabs'] = $this->prepare_tabs_options( $args['tabs'] );
					return $options;
				}
				$options[ $id ]['default'] = $this->get_default( $id, $args );
			}
			return $options;
		}

		public function prepare_tabs_options( $tabs ) {
			foreach ( $tabs as $tab_id => $tab ) {
				$tabs[ $tab_id ]['options'] = $this->prepare_options( $tab['options'] );
			}

			return $tabs;
		}
		/**
		 * add_tabs_settings
		 *
		 * @param  mixed $tabs
		 * @param  mixed $wp_customize
		 * @return void
		 */
		public function add_tabs_settings( $tabs, $wp_customize ) {
			foreach ( $tabs as $tab ) {
				$options = $tab['options'];
				$this->add_tab_options( $options, $wp_customize );
			}
		}

		/**
		 * add_tab_options
		 *
		 * @param  mixed $options
		 * @param  mixed $wp_customize
		 * @return void
		 */
		public function add_tab_options( $options, $wp_customize ) {
			foreach ( $options as $option_id => $args ) {
				$this->add_customizer_option( $option_id, $args, $wp_customize );
			}
		}

		/**
		 * Get Control Proparity
		 *
		 * @param string $prop prop.
		 * @param array  $props props.
		 * @param mixed  $default default.
		 * @return mixed
		 */
		public function get_control_prop( $prop, $props, $default = null ) {
			if ( isset( $props[ $prop ] ) && ! empty( $props[ $prop ] ) ) {
				return $props[ $prop ];
			}

			if ( null != $default ) {
				return $default;
			}
			return '';
		}
		/**
		 * Customizer Scripts
		 */
		public function customize_controls_enqueue_scripts() {
			$js_prefix  = '.min.js';
			$css_prefix = '.min.css';
			$dir        = 'minified';
			if ( SCRIPT_DEBUG ) {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				$dir        = 'unminified';
			}

			if ( is_rtl() ) {
				$css_prefix = '-rtl.min.css';
				if ( SCRIPT_DEBUG ) {
					$css_prefix = '-rtl.css';
				}
			}

			wp_enqueue_script(
				'kemet-react-custom-control-script',
				KEMET_THEME_URI . 'inc/customizer/custom-controls/react/build/index.js',
				array(
					'wp-i18n',
					'wp-components',
					'wp-element',
					'wp-media-utils',
					'wp-block-editor',
				),
				KEMET_THEME_VERSION,
				true
			);

			wp_localize_script(
				'kemet-react-custom-control-script',
				'KemetCustomizerData',
				array(
					'choices'           => self::get_choices_arr(),
					'contexts'          => self::get_contexts_arr(),
					'setting'           => KEMET_THEME_SETTINGS . '[setting_name]',
					'has_widget_editor' => kemet_has_widget_editor(),
				)
			);

			wp_enqueue_style( 'kemet-custom-control-css', KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/css/' . $dir . '/custom-controls' . $css_prefix, array( 'wp-components' ), KEMET_THEME_VERSION );

			// Extended Customizer Assets - Panel extended.
			wp_enqueue_style( 'kemet-extend-customizer-css', KEMET_THEME_URI . 'assets/css/' . $dir . '/extend-customizer' . $css_prefix, null, KEMET_THEME_VERSION );
			wp_enqueue_script( 'kemet-extend-customizer-js', KEMET_THEME_URI . 'assets/js/' . $dir . '/extend-customizer' . $js_prefix, array(), KEMET_THEME_VERSION, true );
		}

		/**
		 * Print Footer Scripts
		 *
		 * @return void
		 */
		public function print_footer_scripts() {
			$output  = '<script type="text/javascript">';
			$output .= Kemet_Fonts_Data::js();
			$output .= '</script>';

			echo wp_kses(
				$output,
				array(
					'script' => array(
						'type' => true,
						'id'   => true,
					),
				)
			);
		}

		/**
		 * Get Choices Array.
		 *
		 * @return Array Dependencies discovered when registering controls and settings.
		 */
		private function get_controls_arr() {
			return apply_filters( 'kemet_customizer_options', self::$controls_arr );
		}

		/**
		 * Get Choices Array.
		 */
		private function get_choices_arr() {
			return self::$choices_arr;
		}

		/**
		 * Get Preview Array.
		 */
		private function get_preview_arr() {
			return self::$preview_arr;
		}

		/**
		 * Get Panels & Sections Array.
		 */
		private function get_panels_arr() {
			return apply_filters( 'kemet_customizer_panels', self::$panels_arr );
		}

		/**
		 * Get Panels & Sections Array.
		 */
		private function get_Sections_arr() {
			return apply_filters( 'kemet_customizer_sections', self::$sections_arr );
		}

		/**
		 * Get Partials Array.
		 */
		private function get_partials_arr() {
			return apply_filters( 'kemet_customizer_partials', self::$partials_arr );
		}

		/**
		 * Get Contexts Array.
		 */
		private function get_contexts_arr() {
			return self::$contexts_arr;
		}

		/**
		 * Register custom section and panel.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register_panel( $wp_customize ) {

			/**
			 * Register Extended Panel
			 */
			$wp_customize->register_panel_type( 'Kemet_WP_Customize_Panel' );
			$wp_customize->register_section_type( 'Kemet_WP_Customize_Section' );

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require KEMET_THEME_DIR . 'inc/customizer/extend-customizer/class-kemet-wp-customize-panel.php';
			require KEMET_THEME_DIR . 'inc/customizer/extend-customizer/class-kemet-wp-customize-section.php';
			/**
			 * Helper files
			 */
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-partials.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-callback.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-sanitizes.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register( $wp_customize ) {

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			/**
			 * Override Defaults
			 */
			require KEMET_THEME_DIR . 'inc/customizer/override-defaults.php';

			/**
			 * Register Sections & Panels
			 */
			// require KEMET_THEME_DIR . 'inc/customizer/register-panels-and-sections.php';

			/**
			 * Sections
			 */
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-site-identity-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/class-kemet-container-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/class-kemet-content-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/class-kemet-blog-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/class-kemet-blog-single-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/class-kemet-sidebar-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/class-kemet-widgets-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/colors-background/class-kemet-body-colors-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/buttons/class-kemet-buttons-fields-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-builder-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-mobile-popup-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-button-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-top-header-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-main-header-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-bottom-header-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-html-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-offcanvas-menu-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-menu-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-search-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-widget-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-mobile-header-button-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header//class-kemet-mobile-header-html-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-mobile-header-toggle-button-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-search-box-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-desktop-header-toggle-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-desktop-popup-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-overlay-header-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-sticky-header-customizer.php';
			// Footer.
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/footer/class-kemet-footer-builder-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/footer/class-kemet-top-footer-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/footer/class-kemet-main-footer-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/footer/class-kemet-bottom-footer-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/footer/class-kemet-footer-widget-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/footer/class-kemet-footer-copyright-customizer.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Load dashicons in front
		 *
		 * @return void
		 */
		public function load_dashicons_front_end() {
			wp_enqueue_style( 'dashicons' );
		}

		/**
		 * Font Family DropDown
		 */
		public function font_family_select() {

			ob_start();

			echo '<select>';
			echo '<option value="inherit">' . esc_html__( 'Inherit', 'kemet' ) . '</option>';
			echo '<optgroup label="Other System Fonts">';

			foreach ( Kemet_Font_Families::get_system_fonts() as $name => $variants ) {
				echo '<option value="' . esc_attr( $name ) . '">' . esc_attr( $name ) . '</option>';
			}

			// Add Custom Font List Into Customizer.
			do_action( 'kemet_customizer_font_list' );

			echo '<optgroup label="Google">';

			foreach ( Kemet_Font_Families::get_google_fonts() as $name => $single_font ) {
				$variants = kemet_prop( $single_font, '0' );
				$category = kemet_prop( $single_font, '1' );
				echo '<option value="\'' . esc_attr( $name ) . '\', ' . esc_attr( $category ) . '">' . esc_attr( $name ) . '</option>';
			}

			echo '</select>';

			return ob_get_clean();

		}

		/**
		 * Customizer Preview Init
		 *
		 * @return void
		 */
		public function preview_init() {

			// Update variables.
			Kemet_Theme_Options::refresh();

			$js_prefix  = '.min.js';
			$css_prefix = '.min.css';
			$dir        = 'minified';
			if ( SCRIPT_DEBUG ) {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				$dir        = 'unminified';
			}

			wp_enqueue_script( 'kemet-customizer-preview-js', KEMET_THEME_URI . 'assets/js/' . $dir . '/customizer-preview' . $js_prefix, array( 'customize-preview' ), KEMET_THEME_VERSION, null );
			$localize_data = apply_filters(
				'kemet_customizer_locatize',
				array(
					'googleFonts' => Kemet_Font_Families::get_google_fonts(),
					'preview'     => self::get_preview_arr(),
					'setting'     => KEMET_THEME_SETTINGS . '[setting_name]',
				)
			);
			wp_localize_script(
				'kemet-customizer-preview-js',
				'previewData',
				$localize_data
			);
		}

		/**
		 * Called by the customize_save_after action to refresh
		 * the cached CSS when Customizer settings are saved.
		 *
		 * @return void
		 */
		public function customize_save() {

			// Update variables.
			Kemet_Theme_Options::refresh();

			/* Generate Header Logo */
			$custom_logo_id = get_theme_mod( 'custom_logo' );

			add_filter( 'intermediate_image_sizes_main', 'Kemet_Customizer::logo_image_sizes', 10, 2 );
			self::generate_logo_by_width( $custom_logo_id );

			do_action( 'kemet_customizer_save' );
		}

		/**
		 * Add logo image sizes in filter.
		 *
		 * @param array $sizes Sizes.
		 * @param array $metadata attachment data.
		 *
		 * @return array
		 */
		public static function logo_image_sizes( $sizes, $metadata ) {

			$logo_width = kemet_get_option( 'kmt-header-responsive-logo-width' );

			if ( is_array( $sizes ) && ( '' != $logo_width['desktop'] || '' != $logo_width['tablet'] | '' != $logo_width['mobile'] ) ) {
				$max_value              = max( $logo_width );
				$sizes['kmt-logo-size'] = array(
					'width'  => (int) $max_value,
					'height' => 0,
					'crop'   => false,
				);
			}

			return $sizes;
		}

		/**
		 * Generate logo image by its width.
		 *
		 * @param int $custom_logo_id Logo id.
		 */
		public static function generate_logo_by_width( $custom_logo_id ) {
			if ( $custom_logo_id ) {

				$image = get_post( $custom_logo_id );

				if ( $image ) {
					$fullsizepath = get_attached_file( $image->ID );

					if ( false !== $fullsizepath || file_exists( $fullsizepath ) ) {
						if ( function_exists( 'wp_generate_attachment_metadata' ) ) {
							$metadata = wp_generate_attachment_metadata( $image->ID, $fullsizepath );
							if ( ! is_wp_error( $metadata ) && ! empty( $metadata ) ) {
								wp_update_attachment_metadata( $image->ID, $metadata );
							}
						}
					}
				}
			}
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Kemet_Customizer::get_instance();
