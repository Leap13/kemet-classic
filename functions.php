<?php
/**
 * Kemet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kemet
 * 
 */

/**
 * Define Constants
 */
define( 'KEMET_THEME_VERSION', '1.0.0' );
define( 'KEMET_THEME_DIR', get_template_directory() . '/' );
define( 'KEMET_THEME_URI', get_template_directory_uri() . '/' );
define( 'KEMET_THEME_SETTINGS', 'kemet-settings' );

/**
 * Update theme
 */
require_once KEMET_THEME_DIR . 'inc/theme-update/class-kemet-theme-update.php';
require_once KEMET_THEME_DIR . 'inc/theme-update/class-kemet-pb-compatibility.php';

/**
 * Load theme hooks
 */
require_once KEMET_THEME_DIR . 'inc/core/class-kemet-theme-options.php';
require_once KEMET_THEME_DIR . 'inc/core/class-theme-strings.php';

/**
 * Fonts Files
 */
require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-font-families.php';
if ( is_admin() ) {
	require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-fonts-data.php';
}

require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-fonts.php';

require_once KEMET_THEME_DIR . 'inc/core/common-functions.php';
require_once KEMET_THEME_DIR . 'inc/core/class-kemet-enqueue-scripts.php';
require_once KEMET_THEME_DIR . 'inc/class-kemet-dynamic-css.php';

/**
 * Custom template tags for this theme.
 */
require_once KEMET_THEME_DIR . 'inc/template-tags.php';

require_once KEMET_THEME_DIR . 'inc/widgets.php';
require_once KEMET_THEME_DIR . 'inc/core/theme-hooks.php';
require_once KEMET_THEME_DIR . 'inc/admin-functions.php';
require_once KEMET_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once KEMET_THEME_DIR . 'inc/extras.php';
require_once KEMET_THEME_DIR . 'inc/blog/blog-config.php';
require_once KEMET_THEME_DIR . 'inc/blog/blog.php';
require_once KEMET_THEME_DIR . 'inc/blog/single-blog.php';
/**
 * Markup Files
 */
require_once KEMET_THEME_DIR . 'inc/template-parts.php';
require_once KEMET_THEME_DIR . 'inc/class-kemet-loop.php';

/**
 * Functions and definitions.
 */
require_once KEMET_THEME_DIR . 'inc/class-kemet-after-setup-theme.php';

// Required files.
require_once KEMET_THEME_DIR . 'inc/core/class-kemet-admin-helper.php';

if ( is_admin() ) {

	/**
	 * Admin Menu Settings
	 */
	require_once KEMET_THEME_DIR . 'inc/core/class-kemet-admin-settings.php';

}


/**
 * Customizer additions.
 */
require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer.php';


/**
 * Compatibility
 */
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-elementor.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-elementor-pro.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-contact-form-7.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/woocommerce/class-kemet-woocommerce.php';
