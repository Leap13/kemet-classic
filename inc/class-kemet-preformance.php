<?php
/**
 * Kemet_Preformance
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 */

if ( ! class_exists( 'Kemet_Preformance' ) ) {

	/**
	 * Kemet_Preformance initial setup
	 */
	class Kemet_Preformance {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @return object
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
			add_action( 'init', array( $this, 'disable_emojis' ) );
		}

		/**
		 * disable_emojis
		 *
		 * @return void
		 */
		public function disable_emojis() {
			$disable_emojis = kemet_get_option( 'disable-emojis-script' );
			if ( $disable_emojis ) {
				remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
				remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
				remove_action( 'wp_print_styles', 'print_emoji_styles' );
				remove_action( 'admin_print_styles', 'print_emoji_styles' );
				remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
				remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
				remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
				add_filter( 'tiny_mce_plugins', array( $this, 'tiny_mce_plugins' ) );
				add_filter( 'wp_resource_hints', array( $this, 'wp_resource_hints' ), 10, 2 );
			}
		}

		/**
		 * tiny_mce_plugins
		 *
		 * @param  array $plugins
		 * @return array
		 */
		public function tiny_mce_plugins( $plugins ) {
			if ( is_array( $plugins ) ) {
				return array_diff( $plugins, array( 'wpemoji' ) );
			} else {
				return array();
			}
		}

		/**
		 * wp_resource_hints
		 *
		 * @param  array  $urls
		 * @param  string $relation_type
		 * @return array
		 */
		public function wp_resource_hints( $urls, $relation_type ) {
			if ( 'dns-prefetch' == $relation_type ) {
				/** This filter is documented in wp-includes/formatting.php */
				$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

				$urls = array_diff( $urls, array( $emoji_svg_url ) );
			}

			return $urls;
		}
	}
}

Kemet_Preformance::get_instance();
