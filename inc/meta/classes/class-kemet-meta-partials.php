<?php
/**
 * Kemet Theme Meta
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Meta Loader
 */
if ( ! class_exists( 'Kemet_Meta_Partials' ) ) {

	/**
	 * Meta Loader
	 */
	class Kemet_Meta_Partials {

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
			add_action( 'wp', array( $this, 'meta_options_hooks' ) );
		}

		/**
		 * Metabox Hooks
		 */
		public function meta_options_hooks() {

			if ( is_singular() ) {
				add_filter( 'kemet_content_padding', array( $this, 'content_padding' ) );
				add_filter( 'kemet_featured_image_enabled', array( $this, 'featured_img' ) );
			}

		}

		/**
		 * Content Padding
		 *
		 * @param object $defaults default spacing.
		 * @return object
		 */
		public function content_padding( $defaults ) {
			$padding = kemet_get_meta( 'kemet_meta', 'content-padding' );

			if ( $padding ) {
				$defaults = $padding;
			}

			return $defaults;
		}

		/**
		 * Disable Post / Page Featured Image
		 *
		 * @param boolean $defaults default value.
		 * @return boolean
		 */
		public function featured_img( $defaults ) {
			$featured_img = kemet_get_meta( 'kemet_meta', 'disable-featured-img' );

			if ( $featured_img ) {
				$defaults = false;
			}

			return $defaults;
		}
	}
}
/**
 *  Kicking this off by calling 'get_instance()' method
 */
Kemet_Meta_Partials::get_instance();
