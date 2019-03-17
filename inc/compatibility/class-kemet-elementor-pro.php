<?php
/**
 * Elementor Compatibility File.
 *
 * @package Kemet
 */

namespace Elementor;

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) || ! class_exists( 'ElementorPro\Modules\ThemeBuilder\Module' ) ) {
	return;
}

namespace ElementorPro\Modules\ThemeBuilder\ThemeSupport;

use Elementor\TemplateLibrary\Source_Local;
use ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager;
use ElementorPro\Modules\ThemeBuilder\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Kemet Elementor Compatibility
 */
if ( ! class_exists( 'Kemet_Elementor_Pro' ) ) :

	/**
	 * Kemet Elementor Compatibility
	 *
	 */
	class Kemet_Elementor_Pro {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 */
		public function __construct() {
			// Add locations.
			add_action( 'elementor/theme/register_locations', array( $this, 'register_locations' ) );

			// Override theme templates.
			add_action( 'kemet_header', array( $this, 'do_header' ), 0 );
			add_action( 'kemet_footer', array( $this, 'do_footer' ), 0 );
			add_action( 'kemet_template_parts_content_top', array( $this, 'do_template_parts' ), 0 );
			add_action( 'kemet_404_page', array( $this, 'do_template_part_404' ), 0 );
		}

		/**
		 * Register Locations
		 *
		 * @param object $manager Location manager.
		 * @return void
		 */
		public function register_locations( $manager ) {
			$manager->register_all_core_location();
		}

		/**
		 * Template Parts Support
		 *
		 * @return void
		 */
		function do_template_parts() {
			// Is Archive?
			$did_location = Module::instance()->get_locations_manager()->do_location( 'archive' );
			if ( $did_location ) {
				// Search and default.
				remove_action( 'kemet_template_parts_content', array( \Kemet_Loop::get_instance(), 'template_parts_search' ) );
				remove_action( 'kemet_template_parts_content', array( \Kemet_Loop::get_instance(), 'template_parts_default' ) );

				// Remove pagination.
				remove_action( 'kemet_pagination', 'kemet_number_pagination' );
				remove_action( 'kemet_entry_after', 'kemet_single_post_navigation_markup' );

				// Content.
				remove_action( 'kemet_entry_content_single', 'kemet_entry_content_single_template' );
			}

			// IS Single?
			$did_location = Module::instance()->get_locations_manager()->do_location( 'single' );
			if ( $did_location ) {
				remove_action( 'kemet_page_template_parts_content', array( \Kemet_Loop::get_instance(), 'template_parts_page' ) );
				remove_action( 'kemet_template_parts_content', array( \Kemet_Loop::get_instance(), 'template_parts_post' ) );
				remove_action( 'kemet_template_parts_content', array( \Kemet_Loop::get_instance(), 'template_parts_comments' ), 15 );
				remove_action( 'kemet_page_template_parts_content', array( \Kemet_Loop::get_instance(), 'template_parts_comments' ), 15 );
			}
		}

		/**
		 * Override 404 page
		 *
		 * @return void
		 */
		function do_template_part_404() {
			if ( is_404() ) {

				// Is Single?
				$did_location = Module::instance()->get_locations_manager()->do_location( 'single' );
				if ( $did_location ) {
					remove_action( 'kemet_404_page', 'kemet_404_page_template' );
				}
			}
		}

		/**
		 * Header Support
		 *
		 * @return void
		 */
		public function do_header() {
			$did_location = Module::instance()->get_locations_manager()->do_location( 'header' );
			if ( $did_location ) {
				remove_action( 'kemet_header', 'kemet_header_markup' );
			}
		}

		/**
		 * Footer Support
		 *
		 * @return void
		 */
		public function do_footer() {
			$did_location = Module::instance()->get_locations_manager()->do_location( 'footer' );
			if ( $did_location ) {
				remove_action( 'kemet_footer', 'kemet_footer_markup' );
			}
		}

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Elementor_Pro::get_instance();

endif;

