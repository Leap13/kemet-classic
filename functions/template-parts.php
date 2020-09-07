<?php
/**
 * Template parts
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

add_action( 'wiz_sitehead_toggle_buttons', 'wiz_sitehead_toggle_buttons_primary' );
add_action( 'wiz_sitehead', 'wiz_sitehead_primary_template' );
add_filter( 'wp_page_menu_args', 'wiz_sitehead_custom_page_menu_items', 10, 2 );
add_filter( 'wp_nav_menu_items', 'wiz_sitehead_custom_nav_menu_items', 10, 2 );
add_action( 'wiz_footer_content', 'wiz_footer_copyright_footer_template', 5 );
add_action( 'wiz_entry_content_single', 'wiz_entry_content_single_template' );
add_action( 'wiz_entry_content_blog', 'wiz_entry_content_blog_template' );
add_action( 'wiz_404_page', 'wiz_404_page_template' );
add_action( 'wiz_footer_content', 'wiz_main_footer_markup', 1 );
add_action( 'wiz_sitehead_content', 'wiz_header_custom_item_outside_menu', 10 );

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'wiz_sitehead_get_menu_items' ) ) :

	/**
	 * Custom Menu Item Markup
	 *
	 * => Used in hooks:
	 *
	 * @see wiz_sitehead_get_menu_items
	 * @see wiz_sitehead_custom_nav_menu_items
	 * @param boolean $display_outside_markup Outside / Inside markup.
	 *
	 */
	function wiz_sitehead_get_menu_items( $display_outside_markup = false ) {

		// Get selected custom menu items.
		$markup = '';
		$section                    = wiz_get_option( 'header-main-rt-section' );
		$sections                   = wiz_get_dynamic_header_content( 'header-main-rt-section' );
		$disable_primary_navigation = wiz_get_option( 'disable-primary-nav' );
		$html_element               = 'li';
		$search_style = wiz_get_option('search-style');
		$hide_mobile = wiz_get_option('disable-last-menu-items-on-mobile');
		$hide_classes = '';
		if($hide_mobile){
			$hide_classes = 'hide-on-mobile';
		}
		if ( $disable_primary_navigation || $display_outside_markup ) {
			$html_element = 'div';
		}
		
		if ( array_filter( $sections ) ) {
			ob_start();
			if(in_array('search' , $section)){
				$section[] = $search_style;
			}
			$menu_item_classes = apply_filters( 'wiz_sitehead_custom_menu_item', $section);
			?>
			<<?php echo esc_attr( $html_element ); ?> class="wiz-sitehead-custom-menu-items <?php echo $hide_classes . " " . esc_attr( join( ' ', $menu_item_classes ) ); ?>">				<?php
				foreach ( $sections as $key => $value ) {
					if ( ! empty( $value ) ) {
						echo ($value);
					}
				}
				?>
			</<?php echo esc_attr( $html_element ); ?>>
			<?php
			$markup = ob_get_clean();
		}

		return apply_filters( 'wiz_sitehead_get_menu_items', $markup );
	}

endif;

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'wiz_sitehead_custom_page_menu_items' ) ) :

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
	function wiz_sitehead_custom_page_menu_items( $args ) {

		$header_layout = apply_filters( 'wiz_primary_header_layout', wiz_get_option( 'header-layouts' ) );
		if ( isset( $args['theme_location'] ) && (! wiz_get_option( 'header-display-outside-menu' ) || $header_layout == 'header-main-layout-3')) {

			if ( 'primary' === $args['theme_location'] ) {

				$markup = wiz_sitehead_get_menu_items();

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
if ( ! function_exists( 'wiz_sitehead_custom_nav_menu_items' ) ) :

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
	function wiz_sitehead_custom_nav_menu_items( $items, $args ) {

		$header_layout = apply_filters( 'wiz_primary_header_layout', wiz_get_option( 'header-layouts' ) );
		if ( isset( $args->theme_location ) && (! wiz_get_option( 'header-display-outside-menu' ) || $header_layout == 'header-main-layout-3') ) {

			if ( 'primary' === $args->theme_location ) {

				$markup = wiz_sitehead_get_menu_items();

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
if ( ! function_exists( 'wiz_sitehead_toggle_buttons_primary' ) ) {

	/**
	 * Header toggle buttons
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 */
	function wiz_sitehead_toggle_buttons_primary() {

		$disable_primary_navigation = wiz_get_option( 'disable-primary-nav' );
		$custom_header_section      = wiz_get_option( 'header-main-rt-section' );
		$display_outside_menu       = wiz_get_option( 'header-display-outside-menu' );
		$header_layout = apply_filters( 'wiz_primary_header_layout', wiz_get_option( 'header-layouts' ) );
		if ( ! $disable_primary_navigation || ( 'none' != $custom_header_section && (! $display_outside_menu || $header_layout == 'header-main-layout-3') ) ) {
			$menu_title          = trim( apply_filters( 'wiz_main_menu_toggle_label', wiz_get_option( 'header-main-menu-label' ) ) );
			$menu_icon           = apply_filters( 'wiz_main_menu_toggle_icon', 'menu-toggle-icon' );
			$menu_label_class    = '';
			$screen_reader_title = __( 'Main Menu', 'wiz' );
			if ( '' !== $menu_title ) {
				$menu_label_class    = 'wiz-menu-label';
				$screen_reader_title = $menu_title;
			}
		?>
		<div class="wiz-button-wrap">			
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
if ( ! function_exists( 'wiz_footer_copyright_footer_template' ) ) {

	/**
	 * Small Footer
	 *
	 * => Used in files:
	 *
	 * /footer.php
	 *
	 */
	function wiz_footer_copyright_footer_template() {

        $copyright_footer_layout = wiz_get_option( 'copyright-footer-layout' );
		$copyright_footer_layout = apply_filters( 'wiz_footer_copyright_layout_disable', $copyright_footer_layout );
		
		if ( !apply_filters('wiz_footer_copyright_layout_disable', true)) {
			return;
		} else if('copyright-footer-layout-1' == $copyright_footer_layout ){
			get_template_part( 'templates/footer/copyright-footer-layout' );
		} else if('copyright-footer-layout-2' == $copyright_footer_layout) {
			get_template_part( 'templates/footer/copyright-footer-layout-2' );
		}
	}
}

/**
 * Header
 */
if ( ! function_exists( 'wiz_sitehead_primary_template' ) ) {

	/**
	 * Header
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 */
	function wiz_sitehead_primary_template() {
		$wiz_header_layout = apply_filters( 'wiz_primary_header_layout', wiz_get_option('header-layouts') );
		if ( $wiz_header_layout !== 'disable' ) {
			get_template_part( 'templates/header/header-main-layout' );
		}
	}
}

/**
 * Single post markup
 */
if ( ! function_exists( 'wiz_entry_content_single_template' ) ) {

	/**
	 * Single post markup
	 *
	 * => Used in files:
	 *
	 * /templates/content-single.php
	 *
	 */
	function wiz_entry_content_single_template() {
		get_template_part( 'templates/single/single-layout' );
	}
}

/**
 * Blog post list markup for blog & search page
 */
if ( ! function_exists( 'wiz_entry_content_blog_template' ) ) {

	/**
	 * Blog post list markup for blog & search page
	 *
	 * => Used in files:
	 *
	 * /templates/content-blog.php
	 * /templates/content-search.php
	 *
	 */
	function wiz_entry_content_blog_template() {
		get_template_part( 'templates/blog/blog-layout' );
	}
}

/**
 * 404 markup
 */
if ( ! function_exists( 'wiz_404_page_template' ) ) {

	/**
	 * 404 markup
	 *
	 * => Used in files:
	 *
	 * /templates/content-404.php
	 *
	 */
	function wiz_404_page_template() {
		get_template_part( 'templates/404/404-layout');
	}
}

/**
 * Footer widgets markup
 */
if ( ! function_exists( 'wiz_main_footer_markup' ) ) {

	/**
	 * Footer widgets markup
	 *
	 * Loads appropriate template file based on the style option selected in options panel.
	 *
	 */
	function wiz_main_footer_markup() {

		$main_footer_layout = wiz_get_option( 'footer-layout' );
        $main_footer_layout = apply_filters( 'wiz_main_footer_disable', $main_footer_layout );

		if ( !apply_filters( 'wiz_main_footer_disable', true ) ) {
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
if ( ! function_exists( 'wiz_header_custom_item_outside_menu' ) ) {

	/**
	 * Footer widgets markup
	 *
	 * Loads appropriate template file based on the style option selected in options panel.
	 *
	 */
	function wiz_header_custom_item_outside_menu() {
		$header_layout = apply_filters( 'wiz_primary_header_layout', wiz_get_option( 'header-layouts' ) );
		if ( wiz_get_option( 'header-display-outside-menu' ) &&  $header_layout != 'header-main-layout-3') {
			$markup = wiz_sitehead_get_menu_items( false );

			echo '<div class="wiz-outside-menu">' . $markup . '</div>';
		}
	}
}
