<?php

// check if the extension exists
if( ! function_exists('hfe_header_enabled') ){
    return;
}

/**
 * Wiz HFE Plugin Compatiblity
 */
class Wiz_HFE_Compat {

	/**
	 *  Initiator
	 */
	public function __construct() {
        
        add_action( 'wp', array( $this, 'hooks' ) );
        remove_action( 'init', array( \Header_Footer_Elementor::instance(), 'setup_unsupported_theme' ) );
	}

	/**
     * Disable footer from the theme.
     */
    public function setup_footer() {
        remove_action( 'wiz_footer', 'wiz_footer_markup'  );
        
    }

    /**
	 * Disable header from the theme.
	 */
	public function wiz_setup_header() {
		remove_action( 'wiz_header', 'wiz_header_markup' );
    }
    
    /**
     * Run all the Actions / Filters.
     */
    public function hooks() {

        if ( hfe_header_enabled() ) {
			add_action( 'template_redirect', array( $this, 'wiz_setup_header' ) );
			add_action( 'wiz_header', 'hfe_render_header' );
		}

		if ( hfe_footer_enabled() ) {
            add_action( 'template_redirect', array( $this, 'setup_footer' ) );
            add_action( 'wiz_footer', 'hfe_render_footer' );
        }        
    }

}

new Wiz_HFE_Compat();
