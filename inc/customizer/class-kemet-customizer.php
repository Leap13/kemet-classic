<?php
/**
 * Wiz Theme Customizer
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

/**
 * Customizer Loader
 */
if ( ! class_exists( 'Wiz_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 */
	class Wiz_Customizer {

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
		private static $_dependency_arr = array();
		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
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
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'sections_scripts' ) );
			add_action( 'customize_register', array( $this, 'wiz_notification_section' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_footer_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register_panel' ), 2 );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			add_action( 'customize_save_after', array( $this, 'customize_save' ) );
			add_filter( 'wiz_header_class', array( $this, 'header_classes' ), 10, 1 );
			add_action( 'wp_enqueue_scripts', array( $this,'load_dashicons_front_end') );
			add_filter( 'customize_dynamic_setting_args', array($this , 'filter_dynamic_setting_args') ,10 , 2 );
			
		}
		/**
		 * Section Scripts
		 */
		function sections_scripts(){

			if( ! class_exists('Wiz_Addons' ) ){
				
				$uri = WIZ_THEME_URI . 'inc/customizer/notification/';
				
				wp_enqueue_script( 'wiz-customizer-notification', $uri . 'notification-helper.js', array(), WIZ_THEME_VERSION, true );
				wp_enqueue_style( 'wiz-customizer-notification-style', $uri . 'notification.css', null, WIZ_THEME_VERSION );
			}

		}
		/**
		 * Add upgrade link configurations controls.
		 *
		 * @since 1.0.4
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function wiz_notification_section( $wp_customize ) {
			require WIZ_THEME_DIR . 'inc/customizer/notification/class-wiz-notification-helper.php';
			require WIZ_THEME_DIR . 'inc/customizer/notification/class-wiz-customizer-notification.php';
			$wp_customize->register_section_type( 'Wiz_Customizer_Notification' );
		}

		public function header_classes( $classes ) {
			$header_layouts = apply_filters( 'wiz_primary_header_layout', wiz_get_option('header-layouts') );
			if($header_layouts == 'header-main-layout-1' || $header_layouts == 'header-main-layout-2'){
				$menu_aglin 	= wiz_get_option('menu-alignment');

				$classes[] = $menu_aglin;
			}
			if($header_layouts == 'header-main-layout-1'){
				$logo_position 	= wiz_get_option('header-logo-position');
				$rtl_class = 'menu-rtl' ;
				
				if(is_rtl()){
					$rtl_logo_position = $logo_position == '' ? 'reverse' : ''; 
					$rtl_class = 'menu-ltr' ;
				}
			    $classes[] = $rtl_class;
				$classes[] = is_rtl() ? $rtl_logo_position : $logo_position;
			}

			return $classes;
		 }
		 
		/**
		 * Print Footer Scripts
		 *
		 * @return void
		 */
		public function print_footer_scripts() {
			$output      = '<script type="text/javascript">';
			$output 	.= Wiz_Fonts_Data::js();
			$output     .= '</script>';

			echo $output;
		}
		//Get Settings
		function filter_dynamic_setting_args( $setting_args, $setting_id ) {
			$dependency = array(
				'conditions' => array(),
			);
            if(isset($setting_args['dependency']) && !empty($setting_args['dependency'])){
				foreach($setting_args['dependency'] as $key => $values){

					switch ( $key ) {

						case 'controls':
							$split_controls = explode("/", $values);
							$controls = !empty($split_controls) ? $split_controls : $values;
							break;
						case 'conditions':
							$split_conditions = explode("/", $values);
							$conditions = !empty($split_conditions) ? $split_conditions : $values;
							
							break;
						case 'operators':
							$split_operators = explode("/", $values);
							$operators = !empty($split_operators) ? $split_operators : $values;
							
							break;	
						case 'values':
							$split_con_values = explode("/", $values);
							$con_values = !empty($split_con_values) ? $split_con_values : $values;
							break;		
					}

				}
				
				for($i = 0 ; $i <= count($controls)-1 ; $i++){
					$operator = !empty($operators) && isset($operators[$i-1]) ? $operators[$i-1] : '||'; 
					$dependency['conditions'][] = array($controls[$i] , $conditions[$i] , $con_values[$i] , $operator);
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
		private function update_dependency_arr( $key, $dependency ) {
			self::$_dependency_arr[ $key ] = $dependency;
		}

		/**
		 * Get dependency Array.
		 *
		 * @return Array Dependencies discovered when registering controls and settings.
		 */
		private function get_dependency_arr() {
			return self::$_dependency_arr;
		}
		
		/**
		 * Register custom section and panel.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register_panel( $wp_customize ) {

			/**
			 * Register Extended Panel
			 */
			$wp_customize->register_panel_type( 'Wiz_WP_Customize_Panel' );
			$wp_customize->register_section_type( 'Wiz_WP_Customize_Section' );

			require WIZ_THEME_DIR . 'inc/customizer/extend-customizer/class-wiz-wp-customize-panel.php';
			require WIZ_THEME_DIR . 'inc/customizer/extend-customizer/class-wiz-wp-customize-section.php';

			/**
			 * Register controls
			 */
			$wp_customize->register_control_type( 'Wiz_Control_Sortable' );
			$wp_customize->register_control_type( 'Wiz_Control_Radio_Image' );
			$wp_customize->register_control_type( 'Wiz_Control_Slider' );
			$wp_customize->register_control_type( 'Wiz_Control_Icon_Select' );
			$wp_customize->register_control_type( 'Wiz_Control_Responsive_Slider' );
			$wp_customize->register_control_type( 'Wiz_Control_Responsive' );
			$wp_customize->register_control_type( 'Wiz_Control_Responsive_Spacing' );
			$wp_customize->register_control_type( 'Wiz_Control_Responsive_Select' );
			$wp_customize->register_control_type( 'Wiz_Control_Title' );
			$wp_customize->register_control_type( 'Wiz_Control_Color' );
			$wp_customize->register_control_type( 'Wiz_Control_Background' );
			$wp_customize->register_control_type( 'Wiz_Control_Smart_Skin' );

			/**
			 * Helper files
			 */
			require WIZ_THEME_DIR . 'inc/customizer/customizer-controls.php';
			require WIZ_THEME_DIR . 'inc/customizer/class-wiz-customizer-partials.php';
			require WIZ_THEME_DIR . 'inc/customizer/class-wiz-customizer-callback.php';
			require WIZ_THEME_DIR . 'inc/customizer/class-wiz-customizer-sanitizes.php';
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register( $wp_customize ) {

			/**
			 * Override Defaults
			 */
			require WIZ_THEME_DIR . 'inc/customizer/override-defaults.php';

			/**
			 * Register Sections & Panels
			 */
			require WIZ_THEME_DIR . 'inc/customizer/register-panels-and-sections.php';

			/**
			 * Sections
			 */
			require WIZ_THEME_DIR . 'inc/customizer/sections/site-identity/site-identity.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/container.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/header.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/mainmenu.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/content.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/footer.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/blog.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/blog-single.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/sidebar.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/widgets.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/layout/main-footer.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/colors-background/body.php';
			require WIZ_THEME_DIR . 'inc/customizer/sections/buttons/buttons-fields.php';

		}
		
		//Dashicons
		function load_dashicons_front_end() {
		wp_enqueue_style( 'dashicons' );
		}
		/**
		 * Customizer Controls
		 *
		 * @return void
		 */
		function controls_scripts() {
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
			/*
			 * This is only needed in WordPress version >= 5.5 because wpColorPickerL10n has been removed.
			 *
			 * @see https://github.com/WordPress/WordPress/commit/7e7b70cd1ae5772229abb769d0823411112c748b
			 *
			 * This is should be removed once the issue is fixed from wp-color-picker-alpha repo.
			 * @see https://github.com/kallookoo/wp-color-picker-alpha/issues/35
			 */
			if ( version_compare( $wp_version, '5.4.99', '>=' ) ) {
				wp_localize_script(
					'wp-color-picker',
					'wpColorPickerL10n',
					array(
						'clear'            => __( 'Clear', 'wiz' ),
						'clearAriaLabel'   => __( 'Clear color', 'wiz' ),
						'defaultString'    => __( 'Default', 'wiz' ),
						'defaultAriaLabel' => __( 'Select default color', 'wiz' ),
						'pick'             => __( 'Select Color', 'wiz' ),
						'defaultLabel'     => __( 'Color value', 'wiz' ),
					)
				);
			}

			// Customizer Core.
			wp_enqueue_script( 'wiz-customizer-dependency-js', WIZ_THEME_URI . 'assets/js/' . $dir . '/customizer-dependency' . $js_prefix, array(), WIZ_THEME_VERSION, true );

			// Extended Customizer Assets - Panel extended.
			wp_enqueue_style( 'wiz-extend-customizer-css', WIZ_THEME_URI . 'assets/css/' . $dir . '/extend-customizer' . $css_prefix, null, WIZ_THEME_VERSION );
			wp_enqueue_script( 'wiz-extend-customizer-js', WIZ_THEME_URI . 'assets/js/' . $dir . '/extend-customizer' . $js_prefix, array(), WIZ_THEME_VERSION, true );
			
			// Customizer Controls.
			wp_enqueue_style( 'wiz-customizer-controls-css', WIZ_THEME_URI . 'assets/css/' . $dir . '/customizer-controls' . $css_prefix, null, WIZ_THEME_VERSION );
			wp_localize_script(
				'wiz-customizer-dependency-js', 'wiz', apply_filters(
					'wiz_theme_customizer_js_localize', array(
						'theme'      => array(
							'option' => WIZ_THEME_SETTINGS,
						),
						'config'     => $this->get_dependency_arr(),
					)
				)
			);
			//Extra Controls Script
			wp_enqueue_style( 'wiz-custom-control-css' , WIZ_THEME_URI . 'inc/customizer/custom-controls/assets/css/' . $dir . '/custom-controls' . $css_prefix , null, WIZ_THEME_VERSION );
			wp_enqueue_script( 'wiz-custom-control-script', WIZ_THEME_URI . 'inc/customizer/custom-controls/assets/js/' . $dir . '/custom-controls' .  $js_prefix , array( 'jquery', 'customize-base', 'wiz-color-alpha', 'jquery-ui-tabs', 'jquery-ui-sortable' ) , WIZ_THEME_VERSION, true );
		}

		/**
		 * Customizer Preview Init
		 *
		 * @return void
		 */
		function preview_init() {

			// Update variables.
			Wiz_Theme_Options::refresh();

         $js_prefix  = '.min.js';
			$css_prefix = '.min.css';
			$dir        = 'minified';
			if ( SCRIPT_DEBUG ) {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				$dir        = 'unminified';
			}

			wp_enqueue_script( 'wiz-customizer-preview-js', WIZ_THEME_URI . 'assets/js/' . $dir . '/customizer-preview' . $js_prefix, array( 'customize-preview' ), null, WIZ_THEME_VERSION );
		}

		/**
		 * Called by the customize_save_after action to refresh
		 * the cached CSS when Customizer settings are saved.
		 *
		 * @return void
		 */
		function customize_save() {

			// Update variables.
			Wiz_Theme_Options::refresh();

			/* Generate Header Logo */
			$custom_logo_id = get_theme_mod( 'custom_logo' );

			add_filter( 'intermediate_image_sizes_main', 'Wiz_Customizer::logo_image_sizes', 10, 2 );
			Wiz_Customizer::generate_logo_by_width( $custom_logo_id );

			do_action( 'wiz_customizer_save' );
		}

		/**
		 * Add logo image sizes in filter.
		 *
		 * @param array $sizes Sizes.
		 * @param array $metadata attachment data.
		 *
		 * @return array
		 */
		static public function logo_image_sizes( $sizes, $metadata ) {

			$logo_width = wiz_get_option( 'wiz-header-responsive-logo-width' );

			if ( is_array( $sizes ) && ( '' != $logo_width['desktop'] || '' != $logo_width['tablet'] | '' != $logo_width['mobile'] ) ) {
				$max_value              = max( $logo_width );
				$sizes['wiz-logo-size'] = array(
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
		static public function generate_logo_by_width( $custom_logo_id ) {
			if ( $custom_logo_id ) {

				$image = get_post( $custom_logo_id );

				if ( $image ) {
					$fullsizepath = get_attached_file( $image->ID );

					if ( false !== $fullsizepath || file_exists( $fullsizepath ) ) {

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

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Wiz_Customizer::get_instance();
