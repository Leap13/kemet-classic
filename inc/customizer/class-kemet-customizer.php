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
		 * Customizer Configurations.
		 *
		 * @access Private
		 * @since 1.4.3
		 * @var Array
		 */
		private static $configuration;

		/**
		 * Customizer Dependency Array.
		 *
		 * @access Private
		 * @since 1.4.3
		 * @var array
		 */
		private static $_dependency_arr = array();

		/**
		 * Customizer Dependency Array.
		 *
		 * @access private
		 * @var array
		 */
		//private static $dependency_arr = array();
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
			add_action( 'customize_preview_init', array( $this, 'preview_init' ) );

			if ( is_admin() || is_customize_preview() ) {
				add_action( 'customize_register', array( $this, 'include_configurations' ), 20 );
				add_action( 'customize_register', array( $this, 'register_customizer_settings' ), 50 );
			}
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'sections_scripts' ) );
			add_action( 'customize_register', array( $this, 'kemet_notification_section' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_footer_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register_panel' ), 2 );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			add_action( 'customize_save_after', array( $this, 'customize_save' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'load_dashicons_front_end' ) );
			add_filter( 'customize_dynamic_setting_args', array( $this, 'filter_dynamic_setting_args' ), 10, 2 );

		}

		/**
		 * Process and Register Customizer Panels, Sections, Settings and Controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Reference to WP_Customize_Manager.
		 * @since 1.4.3
		 * @return void
		 */
		public function register_customizer_settings( $wp_customize ) {

			$configurations = $this->get_customizer_configurations( $wp_customize );

			foreach ( $configurations as $key => $config ) {
				$config = wp_parse_args( $config, $this->get_kemet_customizer_configuration_defaults() );

				switch ( $config['type'] ) {
					case 'panel':
						// Remove type from configuration.
						unset( $config['type'] );

						$this->register_panel( $config, $wp_customize );

						break;

					case 'section':
						// Remove type from configuration.
						unset( $config['type'] );

						$this->register_section( $config, $wp_customize );

						break;

					case 'control':
						// Remove type from configuration.
						unset( $config['type'] );

						$this->register_setting_control( $config, $wp_customize );

						break;
				}
			}

		}

		/**
		 * Filter and return Customizer Configurations.
		 *
		 * @param WP_Customize_Manager $wp_customize Reference to WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Customizer Configurations for registering Sections/Panels/Controls.
		 */
		private function get_customizer_configurations( $wp_customize ) {
			if ( ! is_null( self::$configuration ) ) {
				return self::$configuration;
			}

			return apply_filters( 'kemet_customizer_configurations', array(), $wp_customize );
		}

		/**
		 * Return default values for the Customize Configurations.
		 *
		 * @since 1.4.3
		 * @return Array default values for the Customizer Configurations.
		 */
		private function get_kemet_customizer_configuration_defaults() {
			return apply_filters(
				'kemet_customizer_configuration_defaults',
				array(
					'priority'             => null,
					'title'                => null,
					'label'                => null,
					'name'                 => null,
					'type'                 => null,
					'description'          => null,
					'capability'           => null,
					'datastore_type'       => 'option', // theme_mod or option. Default option.
					'settings'             => null,
					'active_callback'      => null,
					'sanitize_callback'    => null,
					'sanitize_js_callback' => null,
					'theme_supports'       => null,
					'transport'            => null,
					'default'              => null,
					'selector'             => null,
				)
			);
		}

		/**
		 * Register Customizer Panel.
		 *
		 * @param Array                $config Panel Configuration settings.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return void
		 */
		private function register_panel( $config, $wp_customize ) {
			$wp_customize->add_panel( new Kemet_WP_Customize_Panel( $wp_customize, astar( $config, 'name' ), $config ) );
		}

		/**
		 * Register Customizer Section.
		 *
		 * @param Array                $config Panel Configuration settings.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return void
		 */
		private function register_section( $config, $wp_customize ) {
			$wp_customize->add_section( new Kemet_WP_Customize_Section( $wp_customize, astar( $config, 'name' ), $config ) );
		}

		/**
		 * Register Customizer Control and Setting.
		 *
		 * @param Array                $config Panel Configuration settings.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return void
		 */
		private function register_setting_control( $config, $wp_customize ) {

			$wp_customize->add_setting(
				astar( $config, 'name' ), array(
					'default'           => astar( $config, 'default' ),
					'type'              => astar( $config, 'datastore_type' ),
					'transport'         => astar( $config, 'transport', 'refresh' ),
					'sanitize_callback' => astar( $config, 'sanitize_callback', Kemet_Customizer_Control_Base::get_sanitize_call( astar( $config, 'control' ) ) ),
				)
			);

			$instance = Kemet_Customizer_Control_Base::get_control_instance( astar( $config, 'control' ) );

			$config['label'] = astar( $config, 'title' );
			$config['type']  = astar( $config, 'control' );

			// For ast-font control font-weight and font-family is passed as param `font-type` which needs to be converted to `type`.
			if ( false !== astar( $config, 'font-type', false ) ) {
				$config['type'] = astar( $config, 'font-type', false );
			}

			if ( false !== $instance ) {
				$wp_customize->add_control(
					new $instance( $wp_customize, astar( $config, 'name' ), $config )
				);
			} else {
				$wp_customize->add_control( astar( $config, 'name' ), $config );
			}

			if ( astar( $config, 'partial', false ) ) {

				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						astar( $config, 'name' ), array(
							'selector'            => astar( $config['partial'], 'selector' ),
							'container_inclusive' => astar( $config['partial'], 'container_inclusive' ),
							'render_callback'     => astar( $config['partial'], 'render_callback' ),
						)
					);
				}
			}

			if ( false !== astar( $config, 'required', false ) ) {
				$this->update_dependency_arr( astar( $config, 'name' ), astar( $config, 'required' ) );
			}

		}

		// /**
		//  * Update dependency in the dependency array.
		//  *
		//  * @param String $key name of the Setting/Control for which the dependency is added.
		//  * @param Array  $dependency dependency of the $name Setting/Control.
		//  * @since 1.4.3
		//  * @return void
		//  */
		private function update_dependency_arr( $key, $dependency ) {
			self::$_dependency_arr[ $key ] = $dependency;
		}

		// /**
		//  * Get dependency Array.
		//  *
		//  * @since 1.4.3
		//  * @return Array Dependencies discovered when registering controls and settings.
		//  */
		private function get_dependency_arr() {
			return self::$_dependency_arr;
		}

		/**
		 * Include Customizer Configuration files.
		 *
		 * @since 1.4.3
		 * @return void
		 */
		public function include_configurations() {
			require  KEMET_THEME_DIR . 'inc/customizer/config/class-kemet-customizer-config-base.php';

			/**
			 * Register Sections & Panels
			 */
			
			require  KEMET_THEME_DIR . 'inc/customizer/config/class-kemet-customizer-register-sections-panels.php';
			require  KEMET_THEME_DIR . 'inc/customizer/config/class-kemet-customizer-buttons-fields-configs.php';



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
				$this->update_dependency_arr( $setting_id, $dependency );
			}

			return $setting_args;
		}
		/**
		 * Update dependency in the dependency array.
		 *
		 * @param String $key name of the Setting/Control for which the dependency is added.
		 * @param Array  $dependency dependency of the $name Setting/Control.
		 * @return void
		 */
		// private function update_dependency_arr( $key, $dependency ) {
		// 	self::$dependency_arr[ $key ] = $dependency;
		// }

		/**
		 * Get dependency Array.
		 *
		 * @return Array Dependencies discovered when registering controls and settings.
		 */
		// private function get_dependency_arr() {
		// 	return self::$dependency_arr;
		// }

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
			require  KEMET_THEME_DIR . 'inc/customizer/custom-controls/class-kemet-customizer-control-base.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			/**
			 * Register controls
			 */

			 /**
			 * Add Controls
			 */

			Kemet_Customizer_Control_Base::add_control(
				'color',
				array(
					'callback'         => 'WP_Customize_Color_Control',
					'santize_callback' => 'sanitize_hex_color',
				)
			);

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-sortable',
			// 	array(
			// 		'callback'         => 'Astra_Control_Sortable',
			// 		'santize_callback' => '',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-radio-image',
			// 	array(
			// 		'callback'         => 'Astra_Control_Radio_Image',
			// 		'santize_callback' => 'sanitize_choices',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-slider',
			// 	array(
			// 		'callback'         => 'Astra_Control_Slider',
			// 		'santize_callback' => '',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-responsive-slider',
			// 	array(
			// 		'callback'         => 'Astra_Control_Responsive_Slider',
			// 		'santize_callback' => 'sanitize_responsive_slider',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-responsive',
			// 	array(
			// 		'callback'         => 'Astra_Control_Responsive',
			// 		'santize_callback' => 'sanitize_responsive_typo',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-responsive-spacing',
			// 	array(
			// 		'callback'         => 'Astra_Control_Responsive_Spacing',
			// 		'santize_callback' => 'sanitize_responsive_spacing',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-divider',
			// 	array(
			// 		'callback'         => 'Astra_Control_Divider',
			// 		'santize_callback' => '',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-heading',
			// 	array(
			// 		'callback'         => 'Astra_Control_Heading',
			// 		'santize_callback' => '',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-color',
			// 	array(
			// 		'callback'         => 'Astra_Control_Color',
			// 		'santize_callback' => 'sanitize_alpha_color',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-description',
			// 	array(
			// 		'callback'         => 'Astra_Control_Description',
			// 		'santize_callback' => '',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-background',
			// 	array(
			// 		'callback'         => 'Astra_Control_Background',
			// 		'santize_callback' => 'sanitize_background_obj',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'image',
			// 	array(
			// 		'callback'         => 'WP_Customize_Image_Control',
			// 		'santize_callback' => 'esc_url_raw',
			// 	)
			// );

			// Astra_Customizer_Control_Base::add_control(
			// 	'ast-font',
			// 	array(
			// 		'callback'         => 'Astra_Control_Typography',
			// 		'santize_callback' => 'sanitize_text_field',
			// 	)
			// );


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
			//require KEMET_THEME_DIR . 'inc/customizer/register-panels-and-sections.php';

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
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/blog-single.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/sidebar.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/widgets.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/main-footer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/colors-background/body.php';
			//require KEMET_THEME_DIR . 'inc/customizer/sections/buttons/buttons-fields.php';
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
