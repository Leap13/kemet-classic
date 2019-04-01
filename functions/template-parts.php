<?php
/**
 * Template parts
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

add_action( 'kemet_sitehead_toggle_buttons', 'kemet_sitehead_toggle_buttons_primary' );
add_action( 'kemet_sitehead', 'kemet_sitehead_primary_template' );
add_filter( 'wp_page_menu_args', 'kemet_sitehead_custom_page_menu_items', 10, 2 );
add_filter( 'wp_nav_menu_items', 'kemet_sitehead_custom_nav_menu_items', 10, 2 );
add_filter( 'kemet_main_header_bar_top' , 'kemet_top_header_template', 10, 2);
add_action( 'kemet_footer_content', 'kemet_footer_copyright_footer_template', 5 );
add_action( 'kemet_entry_content_single', 'kemet_entry_content_single_template' );
add_action( 'kemet_entry_content_blog', 'kemet_entry_content_blog_template' );
add_action( 'kemet_404_page', 'kemet_404_page_template' );
add_action( 'kemet_footer_content', 'kemet_main_footer_markup', 1 );
add_action( 'kemet_sitehead_content', 'kemet_header_custom_item_outside_menu', 10 );

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'kemet_sitehead_get_menu_items' ) ) :

	/**
	 * Custom Menu Item Markup
	 *
	 * => Used in hooks:
	 *
	 * @see kemet_sitehead_get_menu_items
	 * @see kemet_sitehead_custom_nav_menu_items
	 * @param boolean $display_outside_markup Outside / Inside markup.
	 *
	 */
	function kemet_sitehead_get_menu_items( $display_outside_markup = false ) {

		// Get selected custom menu items.
		$markup = '';

		$section                    = kemet_get_option( 'header-main-rt-section' );
		$sections                   = kemet_get_dynamic_header_content( 'header-main-rt-section' );
		$disable_primary_navigation = kemet_get_option( 'disable-primary-nav' );
		$html_element               = 'li';

		if ( $disable_primary_navigation || $display_outside_markup ) {
			$html_element = 'div';
		}

		if ( array_filter( $sections ) ) {
			ob_start();
			$menu_item_classes = apply_filters( 'kemet_sitehead_custom_menu_item', $section);
			?>
			<<?php echo esc_attr( $html_element ); ?> class="kmt-sitehead-custom-menu-items <?php echo esc_attr( join( ' ', $menu_item_classes ) ); ?>">
				<?php
				foreach ( $sections as $key => $value ) {
					if ( ! empty( $value ) ) {
						printf ($value);
					}
				}
				?>
			</<?php echo esc_attr( $html_element ); ?>>
			<?php
			$markup = ob_get_clean();
		}

		return apply_filters( 'kemet_sitehead_get_menu_items', $markup );
	}

endif;

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'kemet_sitehead_custom_page_menu_items' ) ) :

	/**
	 * Header Custom Menu Item
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @param  array $args Array of arguments.
	 * @return array       Modified menu item array.
	 */
	function kemet_sitehead_custom_page_menu_items( $args ) {

		if ( isset( $args['theme_location'] ) && ! kemet_get_option( 'header-display-outside-menu' ) ) {

			if ( 'primary' === $args['theme_location'] ) {

				$markup = kemet_sitehead_get_menu_items();

				if ( $markup ) {
					$args['after'] = $markup . '</ul>';
				}
			}
		}

		return $args;
	}

endif;

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'kemet_sitehead_custom_nav_menu_items' ) ) :

	/**
	 * Header Custom Menu Item
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @param  array $items Nav menu item array.
	 * @param  array $args  Nav menu item arguments array.
	 * @return array       Modified menu item array.
	 */
	function kemet_sitehead_custom_nav_menu_items( $items, $args ) {

		if ( isset( $args->theme_location ) && ! kemet_get_option( 'header-display-outside-menu' ) ) {

			if ( 'primary' === $args->theme_location ) {

				$markup = kemet_sitehead_get_menu_items();

				if ( $markup ) {
					$items .= $markup;
				}
			}
		}

		return $items;
	}

endif;

/**
 * Header toggle buttons
 */
if ( ! function_exists( 'kemet_sitehead_toggle_buttons_primary' ) ) {

	/**
	 * Header toggle buttons
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 */
	function kemet_sitehead_toggle_buttons_primary() {

		$disable_primary_navigation = kemet_get_option( 'disable-primary-nav' );
		$custom_header_section      = kemet_get_option( 'header-main-rt-section' );
		$display_outside_menu       = kemet_get_option( 'header-display-outside-menu' );

		if ( ! $disable_primary_navigation || ( 'none' != $custom_header_section && ! $display_outside_menu ) ) {
			$menu_title          = trim( apply_filters( 'kemet_main_menu_toggle_label', kemet_get_option( 'header-main-menu-label' ) ) );
			$menu_icon           = apply_filters( 'kemet_main_menu_toggle_icon', 'menu-toggle-icon' );
			$menu_label_class    = '';
			$screen_reader_title = __( 'Main Menu', 'kemet' );
			if ( '' !== $menu_title ) {
				$menu_label_class    = 'kmt-menu-label';
				$screen_reader_title = $menu_title;
			}
		?>
		<div class="kmt-button-wrap">			
			<button type="button" class="menu-toggle main-header-menu-toggle <?php echo esc_attr( $menu_label_class ); ?>" rel="main-menu" data-target="#site-navigation" aria-controls='site-navigation' aria-expanded='false'>
				<span class="screen-reader-text"><?php echo esc_html( $screen_reader_title ); ?></span>
				<i class="<?php echo esc_attr( $menu_icon ); ?>"></i>
				<?php if ( '' != $menu_title ) { ?>

					<span class="mobile-menu-wrap">
						<span class="mobile-menu"><?php echo esc_html( $menu_title ); ?></span>
					</span>

				<?php } ?>
			</button>
		</div>
	<?php
		}
	}
}

/**
 * Small Footer
 */
if ( ! function_exists( 'kemet_footer_copyright_footer_template' ) ) {

	/**
	 * Small Footer
	 *
	 * => Used in files:
	 *
	 * /footer.php
	 *
	 */
	function kemet_footer_copyright_footer_template() {

		$copyright_footer_layout = kemet_get_option_meta( 'copyright-footer-layout', 'copyright-footer-layout-2' );
		$copyright_footer_layout = apply_filters( 'kmt_footer_copyright_layout', $copyright_footer_layout );

		if ( 'disabled' != $copyright_footer_layout ) {

			$copyright_footer_layout = str_replace( 'copyright-footer-layout-', '', $copyright_footer_layout );

			// Default footer layout 1 is kmt-footer-layout.
			if ( '1' == $copyright_footer_layout ) {
				$copyright_footer_layout = '';
			}
			get_template_part( 'templates/footer/copyright-footer-layout', $copyright_footer_layout );
		}
	}
}
/**
 * Top Header
 */
if ( ! function_exists( 'kemet_top_header_template' ) ) {

	/**
	 * Top Header
	 *
	 *
	 * @since 1.0.0
	 */
	function kemet_top_header_template() {

			get_template_part( 'templates/topbar/topbar-layout');
		
	}
}

/**
 * Header
 */
if ( ! function_exists( 'kemet_sitehead_primary_template' ) ) {

	/**
	 * Header
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 */
	function kemet_sitehead_primary_template() {
		get_template_part( 'templates/header/header-main-layout' );
	}
}

/**
 * Single post markup
 */
if ( ! function_exists( 'kemet_entry_content_single_template' ) ) {

	/**
	 * Single post markup
	 *
	 * => Used in files:
	 *
	 * /templates/content-single.php
	 *
	 */
	function kemet_entry_content_single_template() {
		get_template_part( 'templates/single/single-layout' );
	}
}

/**
 * Blog post list markup for blog & search page
 */
if ( ! function_exists( 'kemet_entry_content_blog_template' ) ) {

	/**
	 * Blog post list markup for blog & search page
	 *
	 * => Used in files:
	 *
	 * /templates/content-blog.php
	 * /templates/content-search.php
	 *
	 */
	function kemet_entry_content_blog_template() {
		if(kemet_get_option( 'blog-style' ) === 'thumbnail')
		{
			get_template_part( 'templates/blog/thumbnail-layout' );
		}
		else{
			get_template_part( 'templates/blog/blog-layout' );
		}
		
	}
	
}

/**
 * 404 markup
 */
if ( ! function_exists( 'kemet_404_page_template' ) ) {

	/**
	 * 404 markup
	 *
	 * => Used in files:
	 *
	 * /templates/content-404.php
	 *
	 */
	function kemet_404_page_template() {
		get_template_part( 'templates/404/404-layout');
	}
}

/**
 * Footer widgets markup
 */
if ( ! function_exists( 'kemet_main_footer_markup' ) ) {

	/**
	 * Footer widgets markup
	 *
	 * Loads appropriate template file based on the style option selected in options panel.
	 *
	 */
	function kemet_main_footer_markup() {

		$main_footer_layout = kemet_get_option( 'kemet-footer' );
		$main_footer_meta   = kemet_get_option_meta( 'kemet-footer-display' );

		if ( apply_filters( 'kemet_main_footer_disable', false )  || 'disabled' == $main_footer_meta ) {
			return;
		} // Add markup.
		else if ( 'layout-1' == $main_footer_layout ) {
			get_template_part( 'templates/main-footer/layout-1' );
		}
		else if ( 'layout-2' == $main_footer_layout ) {
			get_template_part( 'templates/main-footer/layout-2' );
		}
		else if ( 'layout-3' == $main_footer_layout ) {
			get_template_part( 'templates/main-footer/layout-3' );
		}
		else if ( 'layout-4' == $main_footer_layout ) {
			get_template_part( 'templates/main-footer/layout-4' );
		}
		else if ( 'layout-5' == $main_footer_layout ) {
			get_template_part( 'templates/main-footer/layout-5' );
		}
		else if ( 'layout-6' == $main_footer_layout ) {
			get_template_part( 'templates/main-footer/layout-6' );
		}

	}
}


/**
 * Header menu item outside custom menu
 */
if ( ! function_exists( 'kemet_header_custom_item_outside_menu' ) ) {

	/**
	 * Footer widgets markup
	 *
	 * Loads appropriate template file based on the style option selected in options panel.
	 *
	 */
	function kemet_header_custom_item_outside_menu() {

		if ( kemet_get_option( 'header-display-outside-menu' ) ) {
			$markup = kemet_sitehead_get_menu_items( true );

			echo '<div>' . $markup . '</div>';
		}
	}
}
