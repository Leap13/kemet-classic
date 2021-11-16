<?php
/**
 * Kemet Admin Notice Class
 *
 * @package  Kemet
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kemet_Admin_Notices' ) ) :
	/**
	 * The Admin Notice Class
	 */
	class Kemet_Admin_Notices {

		/**
		 * Instance
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Setup class.
		 */
		public function __construct() {
			if ( ! defined( 'KEMET_ADDONS_VERSION' ) ) {
				/* TO DO */
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
				add_action( 'admin_notices', array( $this, 'kemet_admin_notice' ) );
				return;
			}
		}

		/**
		 * Add admin notice
		 */
		public function kemet_admin_notice() {
			?>
			<div class="notice kmt-notice is-dismissible">
				<div class="kemet-notice-logo">
					<svg className="kmt-svg-icon" xmlns="http://www.w3.org/2000/svg" width="23" height="55" viewBox="0 0 23 58.04"><style>.cls-1{fill:#fab522;}</style><path class="cls-1" d="M1,28V44H2.59c7.46,0,12.71-7.16,14.79-20.15l.3-1.85H1v3H13.15C12,30.68,9.54,38.37,4,39.55V28Z" transform="translate(-1 0.04)" /><path class="cls-1" d="M4,12.36A8.32,8.32,0,0,1,5.79,7.2l5.11,5.32a2.56,2.56,0,0,0,1.65,1,1.5,1.5,0,0,0,1-.39l.14-.13L19.21,7.2A8.32,8.32,0,0,1,21,12.36V13h3v-.64A11.59,11.59,0,0,0,21.28,4.9L23.9,2.13,21.64,0,19,2.8A11.43,11.43,0,0,0,6,2.8C4.54,1.2,3.4,0,3.36,0L1.1,2.13,3.72,4.9A11.59,11.59,0,0,0,1,12.36V13H4Zm8.81-8.71A8.34,8.34,0,0,1,17.1,4.83L12.81,9.34,8.53,4.83A8.31,8.31,0,0,1,12.81,3.65Z" transform="translate(-1 0.04)" /><path class="cls-1" d="M18,55,14.64,44.92a29.1,29.1,0,0,0,6.53-11.44A60.5,60.5,0,0,0,24,17.59L24,16H1v3H20.92c-.45,6.17-3.13,28-18.35,28H1v3H2.55a18,18,0,0,0,3.78-.4L8.14,55H1v3H24V55ZM9.64,48.56A16.38,16.38,0,0,0,12.41,47l2.67,8H11.8Z" transform="translate(-1 0.04)" /></svg>
				</div>
				<div class="kemet-notice-text">
					<p><?php esc_html_e( 'Take full advantage of Kemet theme! Install Kemet Addons Plugin for tons of extra customization options.', 'kemet' ); ?></p>
						<?php
						if ( is_addons_installed() ) {
							if ( ! current_user_can( 'activate_plugins' ) ) {
								return;
							}

							$button_label = __( 'Activate Kemet Addons', 'kemet' );
							$status       = 'activate';
						} else {
							if ( ! current_user_can( 'install_plugins' ) ) {
								return;
							}

							$status       = 'install';
							$button_label = __( 'Install Kemet Addons', 'kemet' );
						}

						$button = '<a class="button-primary kmt-active-plugin"  data-status = ' . $status . '>' . $button_label . '</a>';

						printf( '<div>%1$s</div>', wp_kses( $button, kemet_allowed_html( array( 'a' ) ) ) );
						?>
				</div>
			</div>
			<?php
		}

		/**
		 * Admin scripts
		 */
		public function enqueue_scripts() {
			if ( ! is_customize_preview() ) {
				wp_enqueue_style( 'kmt-admin-notice', KEMET_THEME_URI . 'functions/admin/assets/css/style.css', array(), KEMET_THEME_VERSION );
				wp_enqueue_script( 'kmt-admin-notice', KEMET_THEME_URI . 'functions/admin/assets/js/main.js', array(), KEMET_THEME_VERSION );
				wp_localize_script(
					'kmt-admin-notice',
					'KemetNoteData',
					array(
						'ajax_url'             => admin_url( 'admin-ajax.php' ),
						'plugin_manager_nonce' => wp_create_nonce( 'kemet-plugins-manager' ),
						'path'                 => 'kemet-addons/kemet-addons.php',
						'slug'                 => 'kemet-addons',
					)
				);
			}
		}
	}

	if ( ! function_exists( 'is_addons_installed' ) ) {

		/**
		 * Check if Kemet Addons is installed
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		function is_addons_installed() {
			$path    = 'kemet-addons/kemet-addons.php';
			$plugins = get_plugins();

			return isset( $plugins[ $path ] );
		}
	}

	Kemet_Admin_Notices::get_instance();

endif;
