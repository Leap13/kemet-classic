<?php
/**
 * Kemet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kemet
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'KEMET_THEME_VERSION', '0.0.1' );
define( 'KEMET_THEME_SETTINGS', 'kemet-settings' );
define( 'KEMET_THEME_DIR', get_template_directory() . '/' );
define( 'KEMET_THEME_URI', get_template_directory_uri() . '/' );

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

	/**
	 * Metabox additions.
	 */
	require_once KEMET_THEME_DIR . 'inc/metabox/class-kemet-meta-boxes.php';
}

require_once KEMET_THEME_DIR . 'inc/metabox/class-kemet-meta-box-operations.php';


/**
 * Customizer additions.
 */
require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer.php';


/**
 * Compatibility
 */
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-jetpack.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/woocommerce/class-kemet-woocommerce.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/lifterlms/class-kemet-lifterlms.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/class-kemet-learndash.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-beaver-builder.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-bb-ultimate-addon.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-contact-form-7.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-visual-composer.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-site-origin.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-gravity-forms.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-bne-flyout.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-ubermeu.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-elementor.php';
	require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-elementor-pro.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymus functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-beaver-themer.php';
}

/**
 * Load deprecated functions
 */
//require_once KEMET_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
//require_once KEMET_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
//require_once KEMET_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';
