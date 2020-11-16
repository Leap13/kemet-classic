<?php

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once KEMET_THEME_DIR.'functions/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'leap_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function leap_register_required_plugins() {

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'               => 'Leap Port Plugin',
            'slug'               => 'leap-port',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/leap-port.zip',
            'required'           => true,
            'version'            => '1.13.7',
            'force_activation'   => true,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'Revolution Slider Plugin',
            'slug'               => 'revslider',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/revslider.zip',
            'required'           => false,
            'version'            => '6.2.22',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => ''
        ),
        array(
            'name'               => 'Visual Composer: Page Builder for WordPress Plugin',
            'slug'               => 'js_composer',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/js_composer.zip',
            'required'           => true,
            'version'            => '6.3.0',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'Ultimate Addons for Visual Composer Plugin',
            'slug'               => 'Ultimate_VC_Addons',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/Ultimate_VC_Addons.zip',
            'required'           => true,
            'version'            => '3.19.6',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'One Page Navigator for Visual Composer Plugin',
            'slug'               => 'one-page-navigator',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/one-page-navigator.zip',
            'required'           => false,
            'version'            => '1.1.13',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'Easy Social Share Buttons 3 Plugin',
            'slug'               => 'easy-social-share-buttons3',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/easy-social-share-buttons3.zip',
            'required'           => false,
            'version'            => '7.3',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'Essential Grid Plugin',
            'slug'               => 'essential-grid',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/essential-grid.zip',
            'required'           => false,
            'version'            => '3.0.6',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'Envato Market to update automaticly',
            'slug'               => 'envato-market',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/envato-market.zip',
            'required'           => false,
            'version'            => '2.0.4',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'               => 'Popup Plugin for WordPress - Green Popups (formerly Layered Popups)',
            'slug'               => 'green-popups',
            'source'             => KEMET_THEME_DIR.'functions/tgm/plugins/halfdata-green-popups.zip',
            'required'           => false,
            'version'            => '7.08',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'     => 'WooCommerce - excelling eCommerce',
            'slug'     => 'woocommerce',
            'required' => false,
        ),
        array(
            'name'     => 'YITH WooCommerce Wishlist',
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name'     => 'YITH WooCommerce Compare',
            'slug'     => 'yith-woocommerce-compare',
            'required' => false,
        ),
        array(
            'name'     => 'Contact Form 7',
            'slug'     => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name'     => 'ShortPixelImage Optimizer',
            'slug'     => 'shortpixel-image-optimiser',
            'required' => false,
        ),
        array(
            'name'     => 'Classic Editor',
            'slug'     => 'classic-editor',
            'required' => false,
        ),
        array(
            'name'     => 'Premium Blocks For Gutenberg',
            'slug'     => 'premium-blocks-for-gutenberg',
            'required' => false,
        )
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     *
     * Some of the strings are wrapped in a sprintf(), so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'wiz', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php', // Parent menu slug.
        'capability'   => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => TRUE, // Show admin notices or not.
        'dismissable'  => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message'      => '', // Message to output right before the plugins table.
    );
    tgmpa( $plugins, $config );
}