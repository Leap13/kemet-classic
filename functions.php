<?php
/**
 * Kemet functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kemet
 */

/**
 * Define Constants.
 */
define( 'KEMET_THEME_VERSION', '1.1.17' );
define( 'KEMET_THEME_DIR', get_template_directory() . '/' );
define( 'KEMET_THEME_URI', get_template_directory_uri() . '/' );
define( 'KEMET_THEME_SETTINGS', 'kemet-settings' );

/**
 * Theme hooks.
 */
require_once KEMET_THEME_DIR . 'functions/classes/class-kemet-theme-options.php';
require_once KEMET_THEME_DIR . 'functions/classes/class-theme-strings.php';

/**
 * Fonts Files.
 */
require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-font-families.php';
if ( is_admin() ) {
	require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-fonts-data.php';
}

require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-fonts.php';

require_once KEMET_THEME_DIR . 'functions/classes/class-kemet-gutenberg-editor-style.php';

/**
 * Kemet SVG Icons
 */
require_once KEMET_THEME_DIR . 'functions/classes/class-kemet-svg-icons.php';

/**
 * Functions.
 */
require_once KEMET_THEME_DIR . 'functions/helper-options-functions.php';
require_once KEMET_THEME_DIR . 'functions/classes/class-kemet-enqueue-scripts.php';
require_once KEMET_THEME_DIR . 'inc/class-kemet-dynamic-css.php';
require_once KEMET_THEME_DIR . 'inc/class-kemet-add-dynamic-css.php';
require_once KEMET_THEME_DIR . 'functions/template-tags.php';
require_once KEMET_THEME_DIR . 'inc/widgets.php';
require_once KEMET_THEME_DIR . 'functions/theme-hooks.php';
require_once KEMET_THEME_DIR . 'functions/sidebar-manager.php';
require_once KEMET_THEME_DIR . 'functions/custom-functions.php';
require_once KEMET_THEME_DIR . 'inc/blog/blog-config.php';
require_once KEMET_THEME_DIR . 'inc/blog/blog.php';
require_once KEMET_THEME_DIR . 'inc/blog/single-blog.php';
require_once KEMET_THEME_DIR . 'inc/blog/blog-helper.php';
require_once KEMET_THEME_DIR . 'inc/components/class-kemet-go-top-partials.php';
require_once KEMET_THEME_DIR . 'inc/builder/class-kemet-builder.php';
require_once KEMET_THEME_DIR . 'inc/components/page-title/class-kemet-page-title.php';
require_once KEMET_THEME_DIR . 'functions/template-parts.php';
require_once KEMET_THEME_DIR . 'functions/classes/class-kemet-loop.php';

require_once KEMET_THEME_DIR . 'inc/class-kemet-after-setup-theme.php';

// Required files.
require_once KEMET_THEME_DIR . 'functions/classes/class-kemet-admin-helper.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings.
	 */
	require_once KEMET_THEME_DIR . 'functions/classes/class-kemet-admin-settings.php';
	require_once KEMET_THEME_DIR . 'functions/admin/class-kemet-admin-notices.php';
}

/**
 * Options.
 */
require_once KEMET_THEME_DIR . 'inc/react-options/class-kemet-options.php';
/**
 * Customizer.
 */
require_once KEMET_THEME_DIR . 'inc/customizer/class-kemet-customizer.php';
require_once KEMET_THEME_DIR . 'inc/customizer/custom-controls/class-custom-controls-dynamic-css.php';

/**
 * Meta
 */
require_once KEMET_THEME_DIR . 'inc/meta/class-kemet-meta.php';

/**
 * Compatibility.
 */
require_once KEMET_THEME_DIR . 'inc/compatibility/woocommerce/class-kemet-woocommerce.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/class-kemet-learndash.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/bbpress/class-kemet-bbpress.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-contact-form-7.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-elementor.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-beaver-builder.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-elementor-pro.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-beaver-themer.php';
require_once KEMET_THEME_DIR . 'inc/compatibility/class-kemet-header-footer-elementor.php';
