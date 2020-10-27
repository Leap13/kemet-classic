<?php
/**
 * Kemet functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Define Constants.
 */
define('KEMET_THEME_VERSION', '1.1.4');
define('KEMET_THEME_DIR', get_template_directory().'/');
define('KEMET_THEME_URI', get_template_directory_uri().'/');
define('KEMET_THEME_SETTINGS', 'wiz-settings');

/**
 * Theme hooks.
 */
require_once KEMET_THEME_DIR.'functions/classes/class-wiz-theme-options.php';
require_once KEMET_THEME_DIR.'functions/classes/class-theme-strings.php';

/**
 * Fonts Files.
 */
require_once KEMET_THEME_DIR.'inc/customizer/class-wiz-font-families.php';
if (is_admin()) {
    require_once KEMET_THEME_DIR.'inc/customizer/class-wiz-fonts-data.php';
}

require_once KEMET_THEME_DIR.'inc/customizer/class-wiz-fonts.php';

/**
 * Functions.
 */
require_once KEMET_THEME_DIR.'functions/helper-options-functions.php';
require_once KEMET_THEME_DIR.'functions/classes/class-wiz-enqueue-scripts.php';
require_once KEMET_THEME_DIR.'inc/class-wiz-dynamic-css.php';
require_once KEMET_THEME_DIR.'functions/template-tags.php';
require_once KEMET_THEME_DIR.'inc/widgets.php';
require_once KEMET_THEME_DIR.'functions/theme-hooks.php';
require_once KEMET_THEME_DIR.'functions/admin/admin-functions.php';
require_once KEMET_THEME_DIR.'functions/sidebar-manager.php';
require_once KEMET_THEME_DIR.'functions/custom-functions.php';
require_once KEMET_THEME_DIR.'inc/blog/blog-config.php';
require_once KEMET_THEME_DIR.'inc/blog/blog.php';
require_once KEMET_THEME_DIR.'inc/blog/single-blog.php';
require_once KEMET_THEME_DIR.'functions/template-parts.php';
require_once KEMET_THEME_DIR.'functions/classes/class-wiz-loop.php';

require_once KEMET_THEME_DIR.'inc/class-wiz-after-setup-theme.php';

// Required files.
require_once KEMET_THEME_DIR.'functions/classes/class-wiz-admin-helper.php';

if (is_admin()) {
    /**
     * Admin Menu Settings.
     */
    require_once KEMET_THEME_DIR.'functions/classes/class-wiz-admin-settings.php';
    require_once KEMET_THEME_DIR. 'functions/admin/class-wiz-notices.php';
}

/**
 * Customizer.
 */
require_once KEMET_THEME_DIR.'inc/customizer/class-wiz-customizer.php';

/**
 * Compatibility.
 */
require_once KEMET_THEME_DIR.'inc/compatibility/woocommerce/class-wiz-woocommerce.php';
require_once KEMET_THEME_DIR.'inc/compatibility/class-wiz-contact-form-7.php';
require_once KEMET_THEME_DIR.'inc/compatibility/class-wiz-elementor.php';
require_once KEMET_THEME_DIR.'inc/compatibility/class-wiz-beaver-builder.php';
require_once KEMET_THEME_DIR.'inc/compatibility/class-wiz-elementor-pro.php';
require_once KEMET_THEME_DIR.'inc/compatibility/class-wiz-beaver-themer.php';
require_once KEMET_THEME_DIR.'inc/compatibility/class-wiz-header-footer-elementor.php';
