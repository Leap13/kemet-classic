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
	 *
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
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_footer_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register_panel' ), 2 );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			add_action( 'customize_save_after', array( $this, 'customize_save' ) );
			add_filter( 'kemet_header_class', array( $this, 'header_classes' ), 10, 1 );
			add_filter( 'customize_dynamic_setting_args', array($this , 'filter_dynamic_setting_args') ,10 , 2 );
		}


		public function header_classes( $classes ) {
			$header_layouts = kemet_get_option('header-layouts');
			if($header_layouts == 'header-main-layout-1' || $header_layouts == 'header-main-layout-2' || $header_layouts == 'header-main-layout-3'){
				$menu_aglin 	= kemet_get_option('menu-alignment');
				$classes[] = $menu_aglin;
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
			$output 	.= Kemet_Fonts_Data::js();
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
			$wp_customize->register_panel_type( 'Kemet_WP_Customize_Panel' );
			$wp_customize->register_section_type( 'Kemet_WP_Customize_Section' );

			require KEMET_THEME_DIR . 'inc/customizer/extend-customizer/class-kemet-wp-customize-panel.php';
			require KEMET_THEME_DIR . 'inc/customizer/extend-customizer/class-kemet-wp-customize-section.php';

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

			/**
			 * Helper files
			 */
			require KEMET_THEME_DIR . 'inc/customizer/customizer-controls.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-partials.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-callback.php';
			require KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer-sanitizes.php';
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
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/blog-single.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/sidebar.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/widgets.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/layout/main-footer.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/colors-background/body.php';
			require KEMET_THEME_DIR . 'inc/customizer/sections/buttons/buttons-fields.php';

		}

		/**
		 * Customizer Controls
		 *
		 * @return void
		 */
		function controls_scripts() {

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

			//Extra Controls Script
			wp_enqueue_style( 'custom-control-css' , KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/css/minified/custom-controls' . '.min.css', null, KEMET_THEME_VERSION );
			wp_enqueue_script( 'custom-control-script', KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/js/minified/custom-controls'. '.min.js', array(), KEMET_THEME_VERSION, true );
			wp_localize_script(
				'custom-control-script', 'kemetCustomizerControlBackground', array(
					'placeholder'  => __( 'No file selected', 'kemet' ),
					'lessSettings' => __( 'Less Settings', 'kemet' ),
					'moreSettings' => __( 'More Settings', 'kemet' ),
				)
			);
			$kemet_typo_localize = array(
				'inherit' => __( 'Inherit', 'kemet' ),
				'100'     => __( 'Thin 100', 'kemet' ),
				'200'     => __( 'Extra-Light 200', 'kemet' ),
				'300'     => __( 'Light 300', 'kemet' ),
				'400'     => __( 'Normal 400', 'kemet' ),
				'500'     => __( 'Medium 500', 'kemet' ),
				'600'     => __( 'Semi-Bold 600', 'kemet' ),
				'700'     => __( 'Bold 700', 'kemet' ),
				'800'     => __( 'Extra-Bold 800', 'kemet' ),
				'900'     => __( 'Ultra-Bold 900', 'kemet' ),
			);

			wp_localize_script( 'custom-control-script', 'kemetTypo', $kemet_typo_localize );
			// Customizer Core.
			wp_enqueue_script( 'kemet-customizer-dependency', KEMET_THEME_URI . 'assets/js/' . $dir . '/customizer-dependency' . $js_prefix, array(), KEMET_THEME_VERSION, true );

			// Extended Customizer Assets - Panel extended.
			wp_enqueue_style( 'kemet-extend-customizer-css', KEMET_THEME_URI . 'assets/css/' . $dir . '/extend-customizer' . $css_prefix, null, KEMET_THEME_VERSION );
			wp_enqueue_script( 'kemet-extend-customizer-js', KEMET_THEME_URI . 'assets/js/' . $dir . '/extend-customizer' . $js_prefix, array(), KEMET_THEME_VERSION, true );
			
			// Customizer Controls.
			wp_enqueue_style( 'kemet-customizer-controls-css', KEMET_THEME_URI . 'assets/css/' . $dir . '/customizer-controls' . $css_prefix, null, KEMET_THEME_VERSION );

			wp_localize_script(
				'kemet-customizer-dependency', 'kemet', apply_filters(
					'kemet_theme_customizer_js_localize', array(
						'theme'      => array(
							'option' => KEMET_THEME_SETTINGS,
						),
						'config'     => $this->get_dependency_arr(),
					)
				)
			);

		}

		/**
		 * Customizer Preview Init
		 *
		 * @return void
		 */
		function preview_init() {

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

			wp_enqueue_script( 'kemet-customizer-preview-js', KEMET_THEME_URI . 'assets/js/' . $dir . '/customizer-preview' . $js_prefix, array( 'customize-preview' ), null, KEMET_THEME_VERSION );
		}

		/**
		 * Called by the customize_save_after action to refresh
		 * the cached CSS when Customizer settings are saved.
		 *
		 * @return void
		 */
		function customize_save() {

			// Update variables.
			Kemet_Theme_Options::refresh();

			/* Generate Header Logo */
			$custom_logo_id = get_theme_mod( 'custom_logo' );

			add_filter( 'intermediate_image_sizes_main', 'Kemet_Customizer::logo_image_sizes', 10, 2 );
			Kemet_Customizer::generate_logo_by_width( $custom_logo_id );

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
		static public function logo_image_sizes( $sizes, $metadata ) {

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
Kemet_Customizer::get_instance();
