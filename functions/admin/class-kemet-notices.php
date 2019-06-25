<?php
/**
 * Kemet Admin Notice Class
 *
 * @package  woostify
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
		//	add_action( 'admin_notices', array( $this, 'kemet_admin_notice' ) );
			if ( ! did_action( 'premium-addons-for-elementor/loaded' ) ) {
				/* TO DO */
				add_action( 'admin_notices', array( $this, 'kemet_admin_notice' ) );
				return;
			}
		}

		/**
		 * Add admin notice
		 */
		public function kemet_admin_notice() {
			// For theme options box.
		//	if ( is_admin() && ! get_user_meta( get_current_user_id(), 'welcome_box' ) ) {
				?>
				<div class="notice is-dismissible">
						<div class="kemet-notice-logo">
						    <span class="kemet-kemet" style="font-size: 40px;"></span>
						</div>
						<div class="kemet-notice-text">
							<h3><?php esc_html_e( 'Thanks for installing Kemet Theme!', 'kemet' ); ?></h3>
                            <h5><?php esc_html_e( ' To fully take advantage of the best our theme we recommends the follKemet Addons plugin to be active.', 'kemet' ); ?></h5>
								<?php
                                    $plugin = 'premium-addons-for-elementor/premium-addons-for-elementor.php';

                                    if ( _is_addons_installed() ) {
                                        if ( ! current_user_can( 'activate_plugins' ) ) {
                                            return;
                                        }
                                        $action_url   = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
                                        $button_label = __( 'Activate Kemet Addons', 'kemet' );

                                    } else {
                                        if ( ! current_user_can( 'install_plugins' ) ) {
                                            return;
                                        }
                                        $action_url   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=premium-addons-for-elementor' ), 'install-plugin_premium-addons-for-elementor' );
                                        $button_label = __( 'Install Kemet Addons', 'kemet' );
                                    }

                                    $button = '<p><a href="' . $action_url . '" class="button-primary">' . $button_label . '</a></p><p></p>';

                                    printf( '<div>%1$s</div>', $button );
								?>
						</div>
					</div>

				<?php
			//}
		}


    }
         /**
         * Is elementor plugin installed.
         */
        if ( ! function_exists( '_is_addons_installed' ) ) {

            /**
             * Check if Elementor Pro is installed
             *
             * @since 1.0.0
             *
             * @access public
             */
            function _is_addons_installed() {
                $path    = 'premium-addons-for-elementor/premium-addons-for-elementor.php';
                $plugins = get_plugins();

                return isset( $plugins[ $path ] );
            }
        }

	Kmt_Admin_Notices::get_instance();

endif;
