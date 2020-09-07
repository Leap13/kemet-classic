<?php
/**
 * Elementor Compatibility File.
 *
 * @package Wiz
 */

namespace Elementor;

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) || ! class_exists( 'ElementorPro\Modules\ThemeBuilder\Module' )  ) {
	return;
}

namespace ElementorPro\Modules\ThemeBuilder\ThemeSupport;

use Elementor\TemplateLibrary\Source_Local;
use ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager;
use ElementorPro\Modules\ThemeBuilder\Module;

/**
 * Wiz Elementor Compatibility
 */
if ( ! class_exists( 'Wiz_Elementor_Pro' ) ) :

	/**
	 * Wiz Elementor Compatibility
	 *
	 * @since 1.0.6
	 */
	class Wiz_Elementor_Pro {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

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
		function __construct() {
            add_action( 'elementor/theme/register_locations', array($this , 'register_elementor_locations') );
            add_action( 'wiz_header', array( $this, 'replace_header' ), 0 );
            add_action( 'wiz_footer', array( $this, 'replace_footer' ), 0 );
            add_filter( 'post_class', array( $this, 'remove_theme_post_class' ), 99 );
            add_action( 'wiz_404_page', array( $this, 'replace_template_part_404' ), 0 );
            add_action( 'wiz_template_parts_content_top', array( $this, 'replace_template_parts' ), 0 );
		}

        /**
         * Registering all core locations.
         */
        function register_elementor_locations( $elementor_theme_manager ) {

            $elementor_theme_manager->register_all_core_location();

        }

        /**
		 * Header Support
		 * @return void
		 */
		public function replace_header() {
			$did_location = Module::instance()->get_locations_manager()->do_location( 'header' );
			if ( $did_location ) {
				remove_action( 'wiz_header', 'wiz_header_markup' );
			}
		}

		/**
		 * Footer Support
		 * @return void
		 */
		public function replace_footer() {
            $did_location = Module::instance()->get_locations_manager()->do_location( 'footer' );
            
			if ( $did_location ) {
				remove_action( 'wiz_footer', 'wiz_footer_markup' );
			}
		}

        /**
		 * Remove theme post's default classes when Elementor's template builder is activated.
		 *
		 * @param  array $classes Post Classes.
		 * @return array
		 */
		public function remove_theme_post_class( $classes ) {
			$post_class = array( 'elementor-post elementor-grid-item', 'elementor-portfolio-item' );
			$result     = array_intersect( $classes, $post_class );

			if ( count( $result ) > 0 ) {
				$classes = array_diff(
					$classes,
					array(
						// Wiz common grid.
						'wiz-col-xs-1',
						'wiz-col-xs-2',
						'wiz-col-xs-3',
						'wiz-col-xs-4',
						'wiz-col-xs-5',
						'wiz-col-xs-6',
						'wiz-col-xs-7',
						'wiz-col-xs-8',
						'wiz-col-xs-9',
						'wiz-col-xs-10',
						'wiz-col-xs-11',
						'wiz-col-xs-12',
						'wiz-col-sm-1',
						'wiz-col-sm-2',
						'wiz-col-sm-3',
						'wiz-col-sm-4',
						'wiz-col-sm-5',
						'wiz-col-sm-6',
						'wiz-col-sm-7',
						'wiz-col-sm-8',
						'wiz-col-sm-9',
						'wiz-col-sm-10',
						'wiz-col-sm-11',
						'wiz-col-sm-12',
						'wiz-col-md-1',
						'wiz-col-md-2',
						'wiz-col-md-3',
						'wiz-col-md-4',
						'wiz-col-md-5',
						'wiz-col-md-6',
						'wiz-col-md-7',
						'wiz-col-md-8',
						'wiz-col-md-9',
						'wiz-col-md-10',
						'wiz-col-md-11',
						'wiz-col-md-12',
						'wiz-col-lg-1',
						'wiz-col-lg-2',
						'wiz-col-lg-3',
						'wiz-col-lg-4',
						'wiz-col-lg-5',
						'wiz-col-lg-6',
						'wiz-col-lg-7',
						'wiz-col-lg-8',
						'wiz-col-lg-9',
						'wiz-col-lg-10',
						'wiz-col-lg-11',
						'wiz-col-lg-12',
						'wiz-col-xl-1',
						'wiz-col-xl-2',
						'wiz-col-xl-3',
						'wiz-col-xl-4',
						'wiz-col-xl-5',
						'wiz-col-xl-6',
						'wiz-col-xl-7',
						'wiz-col-xl-8',
						'wiz-col-xl-9',
						'wiz-col-xl-10',
						'wiz-col-xl-11',
                        'wiz-col-xl-12',
                        // Wiz Blog / Single Post.
						'wiz-article-post',
						'wiz-article-single',
                    )
				);
			}

			return $classes;
        }

        /**
		 * Override 404 page
		 *
		 * @return void
		 */
		public function replace_template_part_404() {
			if ( is_404() ) {

				// Is Single?
				$did_location = Module::instance()->get_locations_manager()->do_location( 'single' );
				if ( $did_location ) {
					remove_action( 'wiz_404_page', 'wiz_404_page_template' );
				}
			}
        }
        /**
		 * Template Parts Support
		 * @return void
		 */
		public function replace_template_parts() {
			// Is Archive?
			$did_location = Module::instance()->get_locations_manager()->do_location( 'archive' );
			
			if ( $did_location ) {
				// Search and default.
				remove_action( 'wiz_template_parts_content', array( \Wiz_Loop::get_instance(), 'template_parts_search' ) );
				remove_action( 'wiz_template_parts_content', array( \Wiz_Loop::get_instance(), 'template_parts_default' ) );

				// Remove pagination.
				remove_action( 'wiz_pagination', 'wiz_number_pagination' );
				remove_action( 'wiz_entry_after', 'wiz_single_post_navigation_markup' );

				// Content.
				remove_action( 'wiz_entry_content_single', 'wiz_entry_content_single_template' );
			}

			// IS Single?
			$did_location = Module::instance()->get_locations_manager()->do_location( 'single' );
			
			if ( $did_location ) {
                
				remove_action( 'wiz_page_template_parts_content', array( \Wiz_Loop::get_instance(), 'template_parts_comments' ), 15 );
				remove_action( 'wiz_page_template_parts_content', array( \Wiz_Loop::get_instance(), 'template_parts_page' ) );
				remove_action( 'wiz_template_parts_content', array( \Wiz_Loop::get_instance(), 'template_parts_post' ) );
                remove_action( 'wiz_template_parts_content', array( \Wiz_Loop::get_instance(), 'template_parts_comments' ), 15 );
            }
        }
	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Wiz_Elementor_Pro::get_instance();
