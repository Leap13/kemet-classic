<?php
/**
 * Wiz Admin Notice Class
 *
 * @package  Wiz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kmt_Admin_Notices' ) ) :
	/**
	 * The Admin Notice Class
	 */
	class Kmt_Admin_Notices {

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

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			if( ! defined('WIZ_ADDONS_VERSION' ) ){
				/* TO DO */
				add_action( 'admin_notices', array( $this, 'wiz_admin_notice' ) );
				return;
			}
		}

		/**
		 * Add admin notice
		 */
		public function wiz_admin_notice() {

				?>
				<div class="notice wiz-notice is-dismissible">
						<div class="wiz-notice-logo">
						    <span class="wizicon-AncientOwl" style="font-size: 55px;"></span>
						</div>
						<div class="wiz-notice-text">
							<p><?php esc_html_e( 'Take full advantage of Wiz theme! Install Wiz Addons Plugin for tons of extra customization options.', 'wiz' ); ?></p>
								<?php
									
                                    $plugin = 'wiz-addons/wiz-addons.php';
									$install_url   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=wiz-addons' ), 'install-plugin_wiz-addons' );
									$activate_url   = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
                                    if ( is_addons_installed() ) {
                                        if ( ! current_user_can( 'activate_plugins' ) ) {
                                            return;
										}
										
										$button_label = __( 'Activate Wiz Addons', 'wiz' );
										$status = 'activate';
                                    } else {
                                        if ( ! current_user_can( 'install_plugins' ) ) {
                                            return;
										}

										$status = 'install';
                                        $button_label = __( 'Install Wiz Addons', 'wiz' );
                                    }

                                    $button = '<a class="button-primary wiz-active-plugin"  data-status = '.$status.' data-url-install = '.$install_url.'  data-url-activate = '.$activate_url.' onclick="active_plugin(event)" >' . $button_label . '</a>';

									printf( '<div>%1$s</div>', $button );
									
								?>
						</div>
					</div>

				<?php
		}

		public function enqueue_scripts()  {
			wp_enqueue_style( 'wiz-admin-notice', WIZ_THEME_URI . 'functions/admin/assets/css/style.css', array(), WIZ_THEME_VERSION );
			wp_enqueue_script( 'wiz-admin-notice', WIZ_THEME_URI . 'functions/admin/assets/js/main.js', array(), WIZ_THEME_VERSION );
		}


    }
         /**
         * Is Wiz Addons plugin installed.
         */
        if ( ! function_exists( 'is_addons_installed' ) ) {

            /**
             * Check if Wiz Addons is installed
             *
             * @since 1.0.0
             *
             * @access public
             */
            function is_addons_installed() {
                $path    = 'wiz-addons/wiz-addons.php';
                $plugins = get_plugins();

                return isset( $plugins[ $path ] );
            }
        }

	Kmt_Admin_Notices::get_instance();

endif;
