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
		 * Sanitize array.
		 *
		 * @access public
		 * @var array
		 */
		public $sanitize = array(
			'kmt-responsive-slider'  => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
			'kmt-font-family'        => 'sanitize_text_field',
			'kmt-font-weight'        => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
			'kmt-select'             => 'sanitize_text_field',
			'kmt-color'              => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			'kmt-background'         => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
			'kmt-responsive-select'  => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_select' ),
			'kmt-responsive-spacing' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
			'kmt-slider'             => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
			'kmt-reponsive-color'    => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_reponsive_color' ),
		);

		/**
		 * Controls array.
		 *
		 * @access public
		 * @var array
		 */
		public $custom_controls = array(
			'kmt-available'          => 'Kemet_Control_Available',
			'kmt-builder'            => 'Kemet_Control_Builder',
			'kmt-tabs'               => 'Kemet_Control_Tabs',
			'kmt-focus-button'       => 'Kemet_Control_Focus_Button',
			'kmt-slider'             => 'Kemet_Control_Slider',
			'kmt-sortable'           => 'Kemet_Control_Sortable',
			'kmt-title'              => 'Kemet_Control_Title',
			'kmt-responsive-slider'  => 'Kemet_Control_Responsive_Slider',
			'kmt-color'              => 'Kemet_Control_Color',
			'kmt-responsive-spacing' => 'Kemet_Control_Responsive_Spacing',
			'kmt-hidden'             => 'Kemet_Control_Hidden',
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

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-custmoizer-register.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init', array( $this, 'preview_init' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'sections_scripts' ) );
			add_action( 'customize_register', array( $this, 'kemet_notification_section' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_footer_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register_panel' ), 2 );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			add_action( 'customize_save_after', array( $this, 'customize_save' ) );
			add_action( 'customize_register', array( $this, 'register_customizer_options' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'load_dashicons_front_end' ) );
			add_filter( 'customize_dynamic_setting_args', array( $this, 'filter_dynamic_setting_args' ), 10, 2 );
			add_filter( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ), 999 );
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
		 * Add Customizer Controls
		 *
		 * @param object $wp_customize
		 * @return object
		 */
		public function register_customizer_options( $wp_customize ) {
			$options  = $this->get_controls_arr();
			$panels   = $this->get_panels_arr();
			$sections = $this->get_sections_arr();
			$defaults = Kemet_Theme_Options::defaults();

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
				$id        = $option_id;
				$option_id = KEMET_THEME_SETTINGS . '[' . $option_id . ']';

				if ( isset( $args['context'] ) ) {
					$this->update_contexts_arr( $option_id, $args['context'] );
				}

				if ( isset( $args['choices'] ) ) {
					self::$choices_arr[ $option_id ] = $args['choices'];
				}

				$settings = array(
					'default'           => isset( $defaults[ $id ] ) ? $defaults[ $id ] : '',
					'type'              => $this->get_control_prop( 'setting_type', $args, 'option' ),
					'sanitize_callback' => isset( $this->sanitize[ $args['type'] ] ) ? $this->sanitize[ $args['type'] ] : false,
					'transport'         => $this->get_control_prop( 'transport', $args, 'refresh' ),
				);

				$wp_customize->add_setting(
					$option_id,
					$settings
				);
				if ( isset( $this->custom_controls[ $args['type'] ] ) ) {
					$wp_customize->add_control(
						new $this->custom_controls[ $args['type'] ](
							$wp_customize,
							$option_id,
							$args
						)
					);
				} else {
					$wp_customize->add_control(
						$option_id,
						$args
					);
				}

				if ( '' != $this->get_control_prop( 'partial', $args ) ) {
					$partials = array(
						'selector'            => $this->get_control_prop( 'selector', $args['partial'] ),
						'render_callback'     => $this->get_control_prop( 'render_callback', $args['partial'] ),
						'container_inclusive' => $this->get_control_prop( 'container_inclusive', $args['partial'] ),
						'fallback_refresh'    => $this->get_control_prop( 'fallback_refresh', $args['partial'], true ),
					);
					$wp_customize->selective_refresh->add_partial(
						$option_id,
						$partials
					);
				}
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
			$css_prefix = '.min.css';
			$dir        = 'minified';
			if ( SCRIPT_DEBUG ) {
				$css_prefix = '.css';
				$dir        = 'unminified';
			}

			if ( is_rtl() ) {
				$css_prefix = '-rtl.min.css';
				if ( SCRIPT_DEBUG ) {
					$css_prefix = '-rtl.css';
				}
			}

			wp_localize_script(
				'kemet-react-custom-control-script',
				'KemetCustomizerData',
				array(
					'choices'  => self::get_choices_arr(),
					'contexts' => self::get_contexts_arr(),
					'setting'  => KEMET_THEME_SETTINGS . '[setting_name]',
				)
			);
			wp_enqueue_style(
				'kemet-react-customizer-controls-css',
				KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/css/' . $dir . '/builder-control' . $css_prefix,
				array( 'wp-components' ),
				KEMET_THEME_VERSION
			);
		}
		/**
		 * Section Scripts
		 */
		public function sections_scripts() {

			if ( ! class_exists( 'Kemet_Addons' ) ) {

				$uri = KEMET_THEME_URI . 'inc/customizer/notification/';

				wp_enqueue_script( 'kemet-customizer-notification', $uri . 'notification-helper.js', array(), KEMET_THEME_VERSION, true );
				wp_enqueue_style( 'kemet-customizer-notification-style', $uri . 'notification.css', null, KEMET_THEME_VERSION );
			}

		}
		/**
		 * Add upgrade link configurations controls.
		 *
		 * @since 1.0.4
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function kemet_notification_section( $wp_customize ) {
			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require KEMET_THEME_DIR . 'inc/customizer/notification/class-kemet-notification-helper.php';
			require KEMET_THEME_DIR . 'inc/customizer/notification/class-kemet-customizer-notification.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			$wp_customize->register_section_type( 'Kemet_Customizer_Notification' );
		}

		/**
		 * Print Footer Scripts
		 *
		 * @return void
		 */
		public function print_footer_scripts() {
			$output  = '<script type="text/javascript" id="test-footer-script">';
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
		 * Get Settings
		 *
		 * @param array  $setting_args control settings.
		 * @param string $setting_id control id.
		 * @return array
		 */
		public function filter_dynamic_setting_args( $setting_args, $setting_id ) {
			$dependency = array(
				'conditions' => array(),
			);
			if ( isset( $setting_args['dependency'] ) && ! empty( $setting_args['dependency'] ) ) {
				foreach ( $setting_args['dependency'] as $key => $values ) {

					switch ( $key ) {

						case 'controls':
							$split_controls = explode( '/', $values );
							$controls       = ! empty( $split_controls ) ? $split_controls : $values;
							break;
						case 'conditions':
							$split_conditions = explode( '/', $values );
							$conditions       = ! empty( $split_conditions ) ? $split_conditions : $values;

							break;
						case 'operators':
							$split_operators = explode( '/', $values );
							$operators       = ! empty( $split_operators ) ? $split_operators : $values;

							break;
						case 'values':
							$split_con_values = explode( '/', $values );
							$con_values       = ! empty( $split_con_values ) ? $split_con_values : $values;
							break;
					}
				}
				$controls_length = count( $controls );
				for ( $i = 0; $i <= $controls_length - 1; $i++ ) {
					$operator                   = ! empty( $operators ) && isset( $operators[ $i - 1 ] ) ? $operators[ $i - 1 ] : '||';
					$dependency['conditions'][] = array( $controls[ $i ], $conditions[ $i ], $con_values[ $i ], $operator );
				}
				self::$dependency_arr[ $setting_id ] = $dependency;
			}

			return $setting_args;
		}

		/**
		 * Get dependency Array.
		 *
		 * @return Array Dependencies discovered when registering controls and settings.
		 */
		private function get_dependency_arr() {
			return self::$dependency_arr;
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
		 * Update Contexts in the Contexts array.
		 *
		 * @param String $key name of the Setting/Control for which the Contexts is added.
		 * @param Array  $Controls Contexts of the $name Setting/Control.
		 * @return void
		 */
		private function update_contexts_arr( $key, $controls ) {
			self::$contexts_arr[ $key ] = $controls;
		}

		/**
		 * Get Contexts Array.
		 */
		private function get_contexts_arr() {
			return self::$contexts_arr;
		}

		/**
		 * Update Partials in the Partials array.
		 *
		 * @param String $key name of the Setting/Control for which the Partials is added.
		 * @param Array  $Controls Partials of the $name Setting/Control.
		 * @return void
		 */
		private function update_partials_arr( $key, $controls ) {
			self::$partials_arr[ $key ] = $controls;
		}

		/**
		 * Get Partials Array.
		 */
		private function get_partials_arr() {
			return self::$partials_arr;
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
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			/**
			 * Register controls
			 */
			$wp_customize->register_control_type( 'Kemet_Control_Sortable' );
			$wp_customize->register_control_type( 'Kemet_Control_Radio_Image' );
			$wp_customize->register_control_type( 'Kemet_Control_Slider' );
			$wp_customize->register_control_type( 'Kemet_Control_Icon_Select' );
			$wp_customize->register_control_type( 'Kemet_Control_Responsive_Slider' );
			$wp_customize->register_control_type( 'Kemet_Control_Responsive' );
			$wp_customize->register_control_type( 'Kemet_Control_Responsive_Spacing' );
			$wp_customize->register_control_type( 'Kemet_Control_Responsive_Select' );
			$wp_customize->register_control_type( 'Kemet_Control_Title' );
			$wp_customize->register_control_type( 'Kemet_Control_Color' );
			$wp_customize->register_control_type( 'Kemet_Control_Background' );
			$wp_customize->register_control_type( 'Kemet_Control_Smart_Skin' );
			$wp_customize->register_control_type( 'Kemet_Control_Responsive_Icon_Select' );
			$wp_customize->register_control_type( 'Kemet_Control_Responsive_Color' );
			$wp_customize->register_control_type( 'Kemet_Control_Group' );
			$wp_customize->register_control_type( 'Kemet_Control_Hidden' );
			$wp_customize->register_control_type( 'Kemet_Control_Select' );
			$wp_customize->register_control_type( 'Kemet_Control_Builder' );
			$wp_customize->register_control_type( 'Kemet_Control_Available' );
			$wp_customize->register_control_type( 'Kemet_Control_Tabs' );
			$wp_customize->register_control_type( 'Kemet_Control_Focus_Button' );

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			/**
			 * Helper files
			 */
			require KEMET_THEME_DIR . 'inc/customizer/customizer-controls.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-partials.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-callback.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-sanitizes.php';

			// Group Control Generator.
			require KEMET_THEME_DIR . 'inc/customizer/custom-controls/group/class-kemet-generate-control-group.php';
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
			require KEMET_THEME_DIR . 'inc/customizer/register-panels-and-sections.php';

			/**
			 * Sections
			 */
			require KEMET_THEME_DIR . 'inc/customizer/sections/site-identity/site-identity.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/container.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/mainmenu.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/content.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/footer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/blog.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/class-kemet-blog-single-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/sidebar.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/widgets.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/main-footer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/colors-background/body.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/buttons/buttons-fields.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-builder-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-mobile-popup-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-header-button-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-top-header-customizer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/header/class-kemet-bottom-header-customizer.php';
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
		 * Customizer Controls
		 *
		 * @return void
		 */
		public function controls_scripts() {
			global $wp_version;

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

			wp_enqueue_style( 'wp-color-picker' );

			// Customizer Core.
			wp_enqueue_script( 'kemet-customizer-dependency-js', KEMET_THEME_URI . 'assets/js/' . $dir . '/customizer-dependency' . $js_prefix, array(), KEMET_THEME_VERSION, true );

			// Extended Customizer Assets - Panel extended.
			wp_enqueue_style( 'kemet-extend-customizer-css', KEMET_THEME_URI . 'assets/css/' . $dir . '/extend-customizer' . $css_prefix, null, KEMET_THEME_VERSION );
			wp_enqueue_script( 'kemet-extend-customizer-js', KEMET_THEME_URI . 'assets/js/' . $dir . '/extend-customizer' . $js_prefix, array(), KEMET_THEME_VERSION, true );

			// Customizer Controls.
			wp_enqueue_style( 'kemet-customizer-controls-css', KEMET_THEME_URI . 'assets/css/' . $dir . '/customizer-controls' . $css_prefix, null, KEMET_THEME_VERSION );
			wp_localize_script(
				'kemet-customizer-dependency-js',
				'kemet',
				apply_filters(
					'kemet_theme_customizer_js_localize',
					array(
						'theme'              => array(
							'option' => KEMET_THEME_SETTINGS,
						),
						'config'             => $this->get_dependency_arr(),
						'font_family_select' => $this->font_family_select(),
					)
				)
			);
			// Extra Controls Script.
			wp_enqueue_style( 'kemet-custom-control-css', KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/css/' . $dir . '/custom-controls' . $css_prefix, null, KEMET_THEME_VERSION );
			wp_enqueue_script( 'kemet-custom-control-script', KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/js/' . $dir . '/custom-controls' . $js_prefix, array( 'jquery', 'customize-base', 'kemet-color-alpha', 'jquery-ui-tabs', 'jquery-ui-sortable' ), KEMET_THEME_VERSION, true );
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
				'kemet-custom-control-script',
				'kemetCustomizerControlBackground',
				array(
					'placeholder'  => __( 'No file selected', 'kemet' ),
					'lessSettings' => __( 'Less Settings', 'kemet' ),
					'moreSettings' => __( 'More Settings', 'kemet' ),
				)
			);
			// Select2.
			wp_enqueue_style( 'kemet-select2-css', KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/css/minified/select2.min.css', null, KEMET_THEME_VERSION );
			wp_enqueue_script( 'kemet-select2-script', KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/js/minified/select2.min.js', array( 'jquery' ), KEMET_THEME_VERSION, true );
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
