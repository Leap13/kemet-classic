<?php
/**
 * Kemet Footer Markup
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Footer_Markup' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Footer_Markup {
		/**
		 * Instance
		 *
		 * @access private
		 * @var object
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
		public function __construct() {
			add_action( 'kemet_footer', array( $this, 'footer_markup' ) );
			add_action( 'kemet_top_footer', array( $this, 'top_footer' ) );
			add_action( 'kemet_main_footer', array( $this, 'main_footer' ) );
			add_action( 'kemet_bottom_footer', array( $this, 'bottom_footer' ) );
		}

		/**
		 * Function to get site Footer
		 */
		public function footer_markup() {
			get_template_part( 'templates/footer/footer-layout' );
		}

		/**
		 * Top Footer
		 */
		public function top_footer() {
			set_query_var( 'row', 'top' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'top',
				)
			);
		}

		/**
		 * Main Footer
		 */
		public function main_footer() {
			set_query_var( 'row', 'main' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'main',
				)
			);
		}

		/**
		 * Bottom Footer
		 */
		public function bottom_footer() {
			set_query_var( 'row', 'bottom' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'bottom',
				)
			);
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Footer_Markup::get_instance();
endif;
