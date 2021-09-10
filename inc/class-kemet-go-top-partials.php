<?php
/**
 * Go Top Partials
 *
 * @package Kemet Addons
 */

if ( ! class_exists( 'Kemet_Go_Top_Partials' ) ) {

	/**
	 * Go top partial class
	 */
	class Kemet_Go_Top_Partials {

		/**
		 * Member Variable
		 *
		 * @var object instance
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
		 *  Constructor
		 */
		public function __construct() {
			add_action( 'kemet_footer', array( $this, 'kemet_go_top_markup' ) );
		}

		/**
		 * Go top markup
		 *
		 * @return void
		 */
		public function kemet_go_top_markup() {
			/**
			 * Template for Go Top Template
			 *
			 * @package Kemet Addons
			 */

			$display_go_top   = apply_filters( 'display_go_top_icon', kemet_get_option( 'go-top-display' ) );
			$gotop_position   = kemet_get_option( 'go-top-position' );
			$gotop_icon_style = kemet_get_option( 'go-top-style' );
			if ( $display_go_top ) {
				?>
			<button class="kmt-go-top-button go-top-<?php echo esc_attr( $gotop_position ); ?>" id="kmt-go-top">
				<span><?php echo Kemet_Svg_Icons::get_icons( $gotop_icon_style ); ?></span>
			</button>
				<?php
			}
		}

	}
}
Kemet_Go_Top_Partials::get_instance();
