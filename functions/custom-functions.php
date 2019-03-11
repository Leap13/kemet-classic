<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 */

add_action( 'wp_head', 'kemet_pingback_header' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function kemet_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

/**
 * Schema for <body> tag.
 */
if ( ! function_exists( 'kemet_schema_body' ) ) :

	/**
	 * Adds schema tags to the body classes.
	 *
	 */
	function kemet_schema_body() {

		// Check conditions.
		$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

		// Set up default itemtype.
		$itemtype = 'WebPage';

		// Get itemtype for the blog.
		$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

		// Get itemtype for search results.
		$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
		// Get the result.
		$result = apply_filters( 'kemet_schema_body_itemtype', $itemtype );

		// Return our HTML.
		echo apply_filters( 'kemet_schema_body', "itemtype='https://schema.org/" . esc_html( $result ) . "' itemscope='itemscope'" );
	}
endif;

/**
 * Adds custom classes to the array of body classes.
 */
if ( ! function_exists( 'kemet_body_classes' ) ) {

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function kemet_body_classes( $classes ) {

		if ( wp_is_mobile() ) {
			$classes[] = 'kmt-header-break-point';
		}

		// Apply separate container class to the body.
		$content_layout = kemet_get_content_layout();
		if ( 'content-boxed-container' == $content_layout ) {
			$classes[] = 'kmt-separate-container';
		} elseif ( 'boxed-container' == $content_layout ) {
			$classes[] = 'kmt-separate-container kmt-two-container';
		} elseif ( 'page-builder' == $content_layout ) {
			$classes[] = 'kmt-page-builder-template';
		} elseif ( 'plain-container' == $content_layout ) {
			$classes[] = 'kmt-plain-container';
		}
		// Sidebar location.
		$page_layout = 'kmt-' . kemet_layout();
		$classes[]   = esc_attr( $page_layout );

		// Current Kemet verion.
		$classes[] = esc_attr( 'kemet-' . KEMET_THEME_VERSION );

		$outside_menu = kemet_get_option( 'header-display-outside-menu' );

		if ( $outside_menu ) {
			$classes[] = 'kmt-header-custom-item-outside';
		} else {
			$classes[] = 'kmt-header-custom-item-inside';
		}

		return $classes;
	}
}

add_filter( 'body_class', 'kemet_body_classes' );


/**
 * Kemet Pagination
 */
if ( ! function_exists( 'kemet_number_pagination' ) ) {

	/**
	 * Kemet Pagination
	 *
	 */
	function kemet_number_pagination() {
		global $numpages;
		$enabled = apply_filters( 'kemet_pagination_enabled', true );

		if ( isset( $numpages ) && $enabled ) {
			ob_start();
			echo "<div class='kmt-pagination'>";
			the_posts_pagination(
				array(
					'prev_text'    => kemet_default_strings( 'string-blog-navigation-previous', false ),
					'next_text'    => kemet_default_strings( 'string-blog-navigation-next', false ),
					'taxonomy'     => 'category',
					'in_same_term' => true,
				)
			);
			echo '</div>';
			$output = ob_get_clean();
			echo apply_filters( 'kemet_pagination_markup', $output ); // WPCS: XSS OK.
		}
	}
}

add_action( 'kemet_pagination', 'kemet_number_pagination' );

/**
 * Return or echo site logo markup.
 */
if ( ! function_exists( 'kemet_logo' ) ) {

	/**
	 * Return or echo site logo markup.
	 *
	 * @return mixed echo or return markup.
	 */
	function kemet_logo( $echo = true ) {

		$display_site_tagline = kemet_get_option( 'display-site-tagline' );
		$display_site_title   = kemet_get_option( 'display-site-title' );
		$html                 = '';

		$has_custom_logo = apply_filters( 'kemet_has_custom_logo', has_custom_logo() );

		// Site logo.
		if ( $has_custom_logo ) {

			if ( apply_filters( 'kemet_replace_logo_width', true ) ) {
				add_filter( 'wp_get_attachment_image_src', 'kemet_replace_header_logo', 10, 4 );
			}

			$html .= '<span class="site-logo-img">';
			$html .= get_custom_logo();
			$html .= '</span>';
		}

		if ( ! apply_filters( 'kemet_disable_site_identity', false ) ) {

			// Site Title.
			$tag = 'span';
			if ( is_home() || is_front_page() ) {
				$tag = 'h1';
			}

			/**
			 * Filters the tags for site title.
			 *
			 *
			 * @param string $tags string containing the HTML tags for Site Title.
			 */
			$tag               = apply_filters( 'kemet_site_title_tag', $tag );
			$site_title_markup = '<' . $tag . ' itemprop="name" class="site-title"> <a href="' . esc_url( home_url( '/' ) ) . '" itemprop="url" rel="home">' . get_bloginfo( 'name' ) . '</a> </' . $tag . '>';

			// Site Description.
			$site_tagline_markup = '<p class="site-description" itemprop="description">' . get_bloginfo( 'description' ) . '</p>';

			if ( $display_site_title || $display_site_tagline ) {
				/* translators: 1: Site Title Markup, 2: Site Tagline Markup */
				$html .= sprintf(
					'<div class="kmt-site-title-wrap">
							%1$s
							%2$s
						</div>',
					( $display_site_title ) ? $site_title_markup : '',
					( $display_site_tagline ) ? $site_tagline_markup : ''
				);
			}
		}
		$html = apply_filters( 'kemet_logo', $html, $display_site_title, $display_site_tagline );

		/**
		 * Echo or Return the Logo Markup
		 */
		if ( $echo ) {
			echo wp_kses_post($html);
		} else {
			return $html;
		}
	}
}



/**
 * Return the selected sections
 */
if ( ! function_exists( 'kemet_get_dynamic_header_content' ) ) {

	/**
	 * Return the selected sections
	 *
	 * @param  string $option Custom content type. E.g. search, text-html etc.
	 * @return array         Array of Custom contents.
	 */
	function kemet_get_dynamic_header_content( $option ) {

		$output  = array();
		$section = kemet_get_option( $option );
                
                
         if ( is_array( $section ) ) {
			
			foreach ( $section as $sectionnn ) {

				switch ( $sectionnn ) {

			case 'search':
					$output[] = kemet_get_search( $option );
				break;

			case 'text-html':
					$output[] = kemet_get_custom_html( $option . '-html' );
				break;

			case 'widget':
					$output[] = kemet_get_custom_widget( $option );
				break;

			default:
					$output[] = apply_filters( 'kemet_get_dynamic_header_content', '', $option, $section );
				break;
		}
                        }
                }

		return $output;
	}
}

/**
 * Adding Wrapper for Search Form.
 */
if ( ! function_exists( 'kemet_get_search' ) ) {

	/**
	 * Adding Wrapper for Search Form.
	 *
	 * @param  string $option   Search Option name.
	 * @return mixed Search HTML structure created.
	 */
	function kemet_get_search( $option = '' ) {

		$search_html  = '<div class="kmt-search-icon"><a class="slide-search kemet-search-icon" href="#"><span class="screen-reader-text">' . esc_html__( 'Search', 'kemet' ) . '</span></a></div>
						<div class="kmt-search-menu-icon slide-search" id="kmt-search-form" >';
		$search_html .= get_search_form( false );
		$search_html .= '</div>';

		return apply_filters( 'kemet_get_search', $search_html, $option );
	}
}

/**
 * Get custom HTML added by user.
 */
if ( ! function_exists( 'kemet_get_custom_html' ) ) {

	/**
	 * Get custom HTML added by user.
	 *
	 * @param  string $option_name Option name.
	 * @return String TEXT/HTML added by user in options panel.
	 */
	function kemet_get_custom_html( $option_name = '' ) {

		$custom_html         = '';
		$custom_html_content = kemet_get_option( $option_name );

		if ( ! empty( $custom_html_content ) ) {
			$custom_html = '<div class="kmt-custom-html">' . do_shortcode( $custom_html_content ) . '</div>';
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			$custom_html = '<a href="' . esc_url( admin_url( 'customize.php?autofocus[control]=' . KEMET_THEME_SETTINGS . '[' . $option_name . ']' ) ) . '">' . __( 'Add Custom HTML', 'kemet' ) . '</a>';
		}

		return $custom_html;
	}
}

/**
 * Get Widget added by user.
 */
if ( ! function_exists( 'kemet_get_custom_widget' ) ) {

	/**
	 * Get custom widget added by user.
	 *
	 * @param  string $option_name Option name.
	 * @return Widget added by user in options panel.
	 */
	function kemet_get_custom_widget( $option_name = '' ) {

		ob_start();

		if ( 'header-main-rt-section' == $option_name ) {
			$widget_id = 'header-widget';
		}
		if ( 'footer-sml-section-1' == $option_name ) {
			$widget_id = 'footer-widget-1';
		} elseif ( 'footer-sml-section-2' == $option_name ) {
			$widget_id = 'footer-widget-2';
		}
		if ( 'top-section-1' == $option_name ) {
			$widget_id = 'top-widget-section1';
		} elseif ( 'top-section-2' == $option_name ) {
			$widget_id = 'top-widget-section2';
		}

		echo '<div class="kmt-' . esc_attr( $widget_id ) . '-area">';
				kemet_get_sidebar( $widget_id );
		echo '</div>';

		return ob_get_clean();
	}
}

/**
 * Function to get top section Left/Right Header
 */
/**
 * Function to get top section Left/Right Header
 */
if ( ! function_exists( 'kemet_get_top_section' ) ) {

	/**
	 * Function to get top section Left/Right Header
	 *
	 * @param string $section   Sections of Small Footer.
	 * @return mixed            Markup of sections.
	 */
	function kemet_get_top_section( $option ) {

		 $output  = '';
		 $section = kemet_get_option( $option );   
		  if ( is_array( $section ) ) {
			
			foreach ( $section as $sectionnn ) {

				switch ( $sectionnn ) {

			case 'search':
					$output .= kemet_get_search();
				break;

            case 'menu':
					$output .= kemet_get_top_menu();
				break;

			case 'widget':
					$output .= kemet_get_custom_widget($option);
			break;

			case 'text-html':
					$output .= kemet_get_custom_html( $option . '-html' );
			break;
			}
		}
			return $output;			
	}
	}
}

/**
 * Function to get Small Left/Right Footer
 */
if ( ! function_exists( 'kemet_get_small_footer' ) ) {

	/**
	 * Function to get Small Left/Right Footer
	 *
	 * @param string $section   Sections of Small Footer.
	 * @return mixed            Markup of sections.
	 */
	function kemet_get_small_footer( $section = '' ) {

		$small_footer_type = kemet_get_option( $section );
		$output            = null;

		switch ( $small_footer_type ) {
			case 'menu':
					$output = kemet_get_small_footer_menu();
				break;

			case 'custom':
					$output = kemet_get_small_footer_custom_text( $section . '-credit' );
				break;

			case 'widget':
					$output = kemet_get_custom_widget( $section );
				break;
		}

		return $output;
	}
}

/**
 * Function to get Small Footer Custom Text
 */
if ( ! function_exists( 'kemet_get_small_footer_custom_text' ) ) {

	/**
	 * Function to get Small Footer Custom Text
	 *
	 * @param string $option Custom text option name.
	 * @return mixed         Markup of custom text option.
	 */
	function kemet_get_small_footer_custom_text( $option = '' ) {

		$output = $option;

		if ( '' != $option ) {
			$output = kemet_get_option( $option );
			$output = str_replace( '[current_year]', date_i18n( 'Y' ), $output );
			$output = str_replace( '[site_title]', '<span class="kmt-footer-site-title">' . get_bloginfo( 'name' ) . '</span>', $output );

			$theme_author = apply_filters(
				'kemet_theme_author', array(
					'theme_name'       => __( 'Kemet', 'kemet' ),
					'theme_author_url' => 'https://kemet.io/',
				)
			);

			$output = str_replace( '[theme_author]', '<a href="' . esc_url( $theme_author['theme_author_url'] ) . '">' . $theme_author['theme_name'] . '</a>', $output );
		}

		return do_shortcode( $output );
	}
}

/**
 * Function to get Footer Menu
 */
if ( ! function_exists( 'kemet_get_small_footer_menu' ) ) {

	/**
	 * Function to get Footer Menu
	 *
	 * @return html
	 */
	function kemet_get_small_footer_menu() {

		ob_start();

		if ( has_nav_menu( 'footer_menu' ) ) {
			wp_nav_menu(
				array(
					'container'       => 'div',
					'container_class' => 'footer-primary-navigation',
					'theme_location'  => 'footer_menu',
					'menu_class'      => 'nav-menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 1,
				)
			);
		} else {
			if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {
				?>
					<a href="<?php echo esc_url( admin_url( '/nav-menus.php?action=locations' ) ); ?>"><?php esc_html_e( 'Assign Footer Menu', 'kemet' ); ?></a>
				<?php
			}
		}

		return ob_get_clean();
	}
}

/**
 * Function to get Top Menu
 */
if ( ! function_exists( 'kemet_get_top_menu' ) ) {

	/**
	 * Function to get Top Menu
	 *
	 * @return html
	 */
	function kemet_get_top_menu() {

		ob_start();

		if ( has_nav_menu( 'top_menu' ) ) {
			wp_nav_menu(
				array(
					'container'       => 'div',
					'container_class' => 'top-navigation',
					'theme_location'  => 'top_menu',
					'menu_class'      => 'nav-menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					//'depth'           => 1,
				)
			);
		} else {
			if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {
				?>
					<a href="<?php echo esc_url( admin_url( '/nav-menus.php?action=locations' ) ); ?>"><?php esc_html_e( 'Assign Top Menu', 'kemet' ); ?></a>
				<?php
			}
		}

		return ob_get_clean();
	}
}

/**
 * Function to get site Header
 */
if ( ! function_exists( 'kemet_header_markup' ) ) {

	/**
	 * Site Header - <header>
	 *
	 */
	function kemet_header_markup() {
		?>

		<header itemtype="https://schema.org/WPHeader" itemscope="itemscope" id="masthead" <?php kemet_header_classes(); ?> role="banner">

			<?php kemet_masthead_top(); ?>

			<?php kemet_masthead(); ?>

			<?php kemet_masthead_bottom(); ?>

		</header><!-- #masthead -->
		<?php
	}
}

add_action( 'kemet_header', 'kemet_header_markup' );



/**
 * Function to get site title/logo
 */
if ( ! function_exists( 'kemet_site_branding_markup' ) ) {

	/**
	 * Site Title / Logo
	 *
	 */
	function kemet_site_branding_markup() {
		?>

		<div class="site-branding">
			<div class="kmt-site-identity" itemscope="itemscope" itemtype="https://schema.org/Organization">
				<?php kemet_logo(); ?>
			</div>
		</div>
		<!-- .site-branding -->
		<?php
	}
}

add_action( 'kemet_masthead_content', 'kemet_site_branding_markup', 8 );

/**
 * Function to get Toggle Button Markup
 */
if ( ! function_exists( 'kemet_toggle_buttons_markup' ) ) {

	/**
	 * Toggle Button Markup
	 * 
	 */
	function kemet_toggle_buttons_markup() {
		$disable_primary_navigation = kemet_get_option( 'disable-primary-nav' );
		$custom_header_section      = kemet_get_option( 'header-main-rt-section' );
		$menu_bottons               = true;
		if ( $disable_primary_navigation && 'none' == $custom_header_section ) {
			$menu_bottons = false;
		}
		if ( apply_filters( 'kemet_enable_mobile_menu_buttons', $menu_bottons ) ) {
		?>
		<div class="kmt-mobile-menu-buttons">

			<?php kemet_masthead_toggle_buttons_before(); ?>

			<?php kemet_masthead_toggle_buttons(); ?>

			<?php kemet_masthead_toggle_buttons_after(); ?>

		</div>
		<?php
		}
	}
}

add_action( 'kemet_masthead_content', 'kemet_toggle_buttons_markup', 9 );

/**
 * Function to get Primary navigation menu
 */
if ( ! function_exists( 'kemet_primary_navigation_markup' ) ) {

	/**
	 * Site Title / Logo
	 *
	 */
	function kemet_primary_navigation_markup() {

		$disable_primary_navigation = kemet_get_option( 'disable-primary-nav' );
		$custom_header_section      = kemet_get_option( 'header-main-rt-section' );
      $header_layout      = kemet_get_option( 'header-layouts' );

		if ( $disable_primary_navigation ) {

			$display_outside = kemet_get_option( 'header-display-outside-menu' );

			if ( 'none' != $custom_header_section && ! $display_outside ) {
				echo '<div class="main-header-bar-navigation kmt-header-custom-item kmt-flex kmt-justify-content-flex-end">';
				echo kemet_masthead_get_menu_items();
				echo '</div>';
			}
		} else {

			$submenu_class = apply_filters( 'primary_submenu_border_class', ' submenu-with-border' );

			// Fallback Menu if primary menu not set.
			$fallback_menu_args = array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'main-navigation',
				'container'      => 'div',
				'before'         => '<ul class="main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class . '">',
				'after'          => '</ul>',
			);

			$items_wrap  = '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" role="navigation" aria-label="' . esc_attr( 'Site Navigation', 'kemet' ) . '">';
			$items_wrap .= '<div class="main-navigation">';
			$items_wrap .= '<ul id="%1$s" class="%2$s">%3$s</ul>';
			$items_wrap .= '</div>';
			$items_wrap .= '</nav>';

			// Primary Menu.
			$primary_menu_args = array(
				'theme_location'  => 'primary',
				'menu_id'         => 'primary-menu',
				'menu_class'      => 'main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class,
				'container'       => 'div',
				'container_class' => 'main-header-bar-navigation',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			);
            // Left Menu.
			$left_menu_args = array(
				'theme_location'  => 'left_menu',
				'menu_id'         => 'left-menu',
				'menu_class'      => 'main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class,
				'container'       => 'div',
				'container_class' => 'main-header-bar-navigation',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			);

			if ( has_nav_menu( 'primary' ) ) {
				// To add default alignment for navigation which can be added through any third party plugin.
				// Do not add any CSS from theme except header alignment.
				echo '<div class="kmt-main-header-bar-alignment">';
				echo '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" role="navigation" aria-label="' . esc_attr( 'Site Navigation', 'kemet' ) . '">';
				echo '<div class="main-navigation">';	
					wp_nav_menu( $primary_menu_args );
					if ( 'header-main-layout-4' == $header_layout ) {
					wp_nav_menu( $left_menu_args );
					}
				echo  '</div>';
				echo  '</nav>';
				echo  '</div>';
			} else {

				echo '<div class="main-header-bar-navigation">';
					echo '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" role="navigation" aria-label="' . esc_attr( 'Site Navigation', 'kemet' ) . '">';
						wp_page_menu( $fallback_menu_args );
					echo  '</nav>';
				echo  '</div>';
			}
		}

	}
}

add_action( 'kemet_masthead_content', 'kemet_primary_navigation_markup', 10 );

/**
 * Function to get site Footer
 */
if ( ! function_exists( 'kemet_footer_markup' ) ) {

	/**
	 * Site Footer - <footer>
	 *
	 */
	function kemet_footer_markup() {
		?>

		<footer itemtype="https://schema.org/WPFooter" itemscope="itemscope" id="colophon" <?php kemet_footer_classes(); ?> role="contentinfo">

			<?php kemet_footer_content_top(); ?>

			<?php kemet_footer_content(); ?>

			<?php kemet_footer_content_bottom(); ?>

		</footer><!-- #colophon -->
		<?php
	}
}

add_action( 'kemet_footer', 'kemet_footer_markup' );

/**
 * Function to get Header Breakpoint
 */
if ( ! function_exists( 'kemet_header_break_point' ) ) {

	/**
	 * Function to get Header Breakpoint
	 *
	 * @return number
	 */
	function kemet_header_break_point() {
		return absint( apply_filters( 'kemet_header_break_point', 921 ) );
	}
}

/**
 * Function to get Body Font Family
 */
if ( ! function_exists( 'kemet_body_font_family' ) ) {

	/**
	 * Function to get Body Font Family
	 *
	 * @return string
	 */
	function kemet_body_font_family() {

		$font_family = kemet_get_option( 'body-font-family' );

		// Body Font Family.
		if ( 'inherit' == $font_family ) {
			$font_family = '-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif';
		}

		return apply_filters( 'kemet_body_font_family', $font_family );
	}
}

/**
 * Function to get Edit Post Link
 */
if ( ! function_exists( 'kemet_edit_post_link' ) ) {

	/**
	 * Function to get Edit Post Link
	 *
	 * @return void
	 */
	function kemet_edit_post_link( $text, $before = '', $after = '', $id = 0, $class = 'post-edit-link' ) {

		if ( apply_filters( 'kemet_edit_post_link', false ) ) {
			edit_post_link( $text, $before, $after, $id, $class );
		}
	}
}

/**
 * Function to get Header Classes
 */
if ( ! function_exists( 'kemet_header_classes' ) ) {

	/**
	 * Function to get Header Classes
	 *
	 */
	function kemet_header_classes() {

		$classes                  = array( 'site-header' );
		$menu_logo_location       = kemet_get_option( 'header-layouts' );
		$mobile_header_alignment  = kemet_get_option( 'header-main-menu-align' );
		$primary_menu_disable     = kemet_get_option( 'disable-primary-nav' );
		$primary_menu_custom_item = kemet_get_option( 'header-main-rt-section' );
		$logo_title_inline        = kemet_get_option( 'logo-title-inline' );

		if ( $menu_logo_location ) {
			$classes[] = $menu_logo_location;
		}

		if ( $primary_menu_disable ) {

			$classes[] = 'kmt-primary-menu-disabled';

			if ( 'none' == $primary_menu_custom_item ) {
				$classes[] = 'kmt-no-menu-items';
			}
		}
		// Add class if Inline Logo & Site Title.
		if ( $logo_title_inline ) {
			$classes[] = 'kmt-logo-title-inline';
		}

		$classes[] = 'kmt-mobile-header-' . $mobile_header_alignment;

		$classes = array_unique( apply_filters( 'kemet_header_class', $classes ) );

		$classes = array_map( 'sanitize_html_class', $classes );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}

/**
 * Function to get Footer Classes
 */
if ( ! function_exists( 'kemet_footer_classes' ) ) {

	/**
	 * Function to get Footer Classes
	 *
	 */
	function kemet_footer_classes() {

		$classes = array_unique( apply_filters( 'kemet_footer_class', array( 'site-footer' ) ) );

		$classes = array_map( 'sanitize_html_class', $classes );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}

/**
 * Function to Add Header Breakpoint Style
 */
if ( ! function_exists( 'kemet_header_breakpoint_style' ) ) {

	/**
	 * Function to Add Header Breakpoint Style
	 *
	 */
	function kemet_header_breakpoint_style() {

		// Header Break Point.
		$header_break_point = kemet_header_break_point();

		ob_start();
		?>
		.main-header-bar-wrap::before {
			content: '<?php echo esc_html( $header_break_point ); ?>';
		}

		@media all and ( min-width: <?php echo esc_html( $header_break_point ); ?>px ) {
			.main-header-bar-wrap::before {
				content: '';
			}
		}
		<?php

		$kemet_header_width = kemet_get_option( 'header-main-layout-width' );

		/* Width for Header */
		if ( 'content' != $kemet_header_width ) {
			$genral_global_responsive = array(
				'#masthead .kmt-container' => array(
					'max-width'     => '100%',
					'padding-left'  => '35px',
					'padding-right' => '35px',
				),
			);

			/* Parse CSS from array()*/
			echo kemet_parse_css( $genral_global_responsive, $header_break_point );
		}

		$dynamic_css = ob_get_clean();

		// trim white space for faster page loading.
		$dynamic_css = Kemet_Enqueue_Scripts::trim_css( $dynamic_css );

		wp_add_inline_style( 'kemet-theme-css', $dynamic_css );
	}
}

add_action( 'wp_enqueue_scripts', 'kemet_header_breakpoint_style' );

/**
 * Function to filter comment form's default fields
 */
if ( ! function_exists( 'kemet_comment_form_default_fields_markup' ) ) {

	/**
	 * Function filter comment form's default fields
	 *
	 * @param array $fields Array of comment form's default fields.
	 * @return array        Comment form fields.
	 */
	function kemet_comment_form_default_fields_markup( $fields ) {

		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );

		$fields['author'] = '<div class="kmt-comment-formwrap kmt-row"><p class="comment-form-author kmt-col-xs-12 kmt-col-sm-12 kmt-col-md-4 kmt-col-lg-4">' .
					'<label for="author" class="screen-reader-text">' . esc_html( kemet_default_strings( 'string-comment-label-name', false ) ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" placeholder="' . esc_attr( kemet_default_strings( 'string-comment-label-name', false ) ) . '" size="30"' . $aria_req . ' /></p>';
		$fields['email']  = '<p class="comment-form-email kmt-col-xs-12 kmt-col-sm-12 kmt-col-md-4 kmt-col-lg-4">' .
					'<label for="email" class="screen-reader-text">' . esc_html( kemet_default_strings( 'string-comment-label-email', false ) ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
					'" placeholder="' . esc_attr( kemet_default_strings( 'string-comment-label-email', false ) ) . '" size="30"' . $aria_req . ' /></p>';
		$fields['url']    = '<p class="comment-form-url kmt-col-xs-12 kmt-col-sm-12 kmt-col-md-4 kmt-col-lg-4"><label for="url">' .
					'<label for="url" class="screen-reader-text">' . esc_html( kemet_default_strings( 'string-comment-label-website', false ) ) . '</label><input id="url" name="url" type="text" value="' . esc_url( $commenter['comment_author_url'] ) .
					'" placeholder="' . esc_attr( kemet_default_strings( 'string-comment-label-website', false ) ) . '" size="30" /></label></p></div>';

		return apply_filters( 'kemet_comment_form_default_fields_markup', $fields );
	}
}

add_filter( 'comment_form_default_fields', 'kemet_comment_form_default_fields_markup' );

/**
 * Function to filter comment form arguments
 */
if ( ! function_exists( 'kemet_comment_form_default_markup' ) ) {

	/**
	 * Function filter comment form arguments
	 *
	 * @param array $args   Comment form arguments.
	 * @return array
	 */
	function kemet_comment_form_default_markup( $args ) {

		$args['id_form']           = 'kmt-commentform';
		$args['title_reply']       = kemet_default_strings( 'string-comment-title-reply', false );
		$args['cancel_reply_link'] = kemet_default_strings( 'string-comment-cancel-reply-link', false );
		$args['label_submit']      = kemet_default_strings( 'string-comment-label-submit', false );
		$args['comment_field']     = '<div class="kmt-row comment-textarea"><fieldset class="comment-form-comment"><div class="comment-form-textarea kmt-col-lg-12"><label for="comment" class="screen-reader-text">' . esc_html( kemet_default_strings( 'string-comment-label-message', false ) ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr( kemet_default_strings( 'string-comment-label-message', false ) ) . '" cols="45" rows="8" aria-required="true"></textarea></div></fieldset></div>';

		return apply_filters( 'kemet_comment_form_default_markup', $args );

	}
}

add_filter( 'comment_form_defaults', 'kemet_comment_form_default_markup' );


/**
 * Function to filter comment form arguments
 */
if ( ! function_exists( 'kemet_404_page_layout' ) ) {

	/**
	 * Function filter comment form arguments
	 *
	 * @param array $layout     Comment form arguments.
	 * @return array
	 */
	function kemet_404_page_layout( $layout ) {

		if ( is_404() ) {
			$layout = 'no-sidebar';
		}

		return apply_filters( 'kemet_404_page_layout', $layout );
	}
}

add_filter( 'kemet_layout', 'kemet_404_page_layout', 10, 1 );

/**
 * Return current content layout
 */
if ( ! function_exists( 'kemet_get_content_layout' ) ) {

	/**
	 * Return current content layout
	 *
	 * @return boolean  content layout.
	 */
	function kemet_get_content_layout() {

		$value = false;

		if ( is_singular() ) {

			// If post meta value is empty,
			// Then get the POST_TYPE content layout.
			$content_layout = kemet_get_option_meta( 'site-content-layout', '', true );

			if ( empty( $content_layout ) ) {

				$post_type = get_post_type();

				if ( 'post' === $post_type || 'page' === $post_type ) {
					$content_layout = kemet_get_option( 'single-' . get_post_type() . '-content-layout' );
				}

				if ( 'default' == $content_layout || empty( $content_layout ) ) {
					$content_layout = kemet_get_option( 'site-content-layout', 'full-width' );
				}
			}
		} else {

			$content_layout = '';
			$post_type      = get_post_type();

			if ( 'post' === $post_type ) {
				$content_layout = kemet_get_option( 'archive-' . get_post_type() . '-content-layout' );
			}

			if ( is_search() ) {
				$content_layout = kemet_get_option( 'archive-post-content-layout' );
			}

			if ( 'default' == $content_layout || empty( $content_layout ) ) {
				$content_layout = kemet_get_option( 'site-content-layout', 'full-width' );
			}
		}

		return apply_filters( 'kemet_get_content_layout', $content_layout );
	}
}

/**
 * Display Blog Post Excerpt
 */
if ( ! function_exists( 'kemet_the_excerpt' ) ) {

	/**
	 * Display Blog Post Excerpt
	 *
	 */
	function kemet_the_excerpt() {

		$excerpt_type = kemet_get_option( 'blog-post-content' );

		do_action( 'kemet_the_excerpt_before', $excerpt_type );

		if ( 'full-content' == $excerpt_type ) {
			the_content();
		} else {
			the_excerpt();
		}

		do_action( 'kemet_the_excerpt_after', $excerpt_type );
	}
}

/**
 * Display Sidebars
 */
if ( ! function_exists( 'kemet_get_sidebar' ) ) {
	/**
	 * Get Sidebar
	 *
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function kemet_get_sidebar( $sidebar_id ) {
		if ( is_active_sidebar( $sidebar_id ) ) {
			dynamic_sidebar( $sidebar_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
		?>
			<div class="widget kmt-no-widget-row">
				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Add Widget', 'kemet' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Get Footer widgets
 */
if ( ! function_exists( 'kemet_get_footer_widget' ) ) {

	/**
	 * Get Footer Default Sidebar
	 *
	 * @param  string $sidebar_id   Sidebar Id..
	 * @return void
	 */
	function kemet_get_footer_widget( $sidebar_id ) {

		if ( is_active_sidebar( $sidebar_id ) ) {
			dynamic_sidebar( $sidebar_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {

			global $wp_registered_sidebars;
			$sidebar_name = '';
			if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
				$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
			}
			?>
			<div class="widget kmt-no-widget-row">
				<h2 class='widget-title'><?php echo esc_html( $sidebar_name ); ?></h2>

				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Click here to assign a widget for this area.', 'kemet' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Kemet entry header class.
 */
if ( ! function_exists( 'kemet_entry_header_class' ) ) {

	/**
	 * Kemet entry header class
	 *
	 */
	function kemet_entry_header_class() {

		$post_id          = kemet_get_post_id();
		$classes          = array();
		$title_markup     = kemet_the_title( '', '', $post_id, false );
		$thumb_markup     = kemet_get_post_thumbnail( '', '', false );
		$post_meta_markup = kemet_single_get_post_meta( '', '', false );

		if ( empty( $title_markup ) && empty( $thumb_markup ) && ( is_page() || empty( $post_meta_markup ) ) ) {
			$classes[] = 'kmt-header-without-markup';
		} else {

			if ( empty( $title_markup ) ) {
				$classes[] = 'kmt-no-title';
			}

			if ( empty( $thumb_markup ) ) {
				$classes[] = 'kmt-no-thumbnail';
			}

			if ( is_page() || empty( $post_meta_markup ) ) {
				$classes[] = 'kmt-no-meta';
			}
		}

		$classes = array_unique( apply_filters( 'kemet_entry_header_class', $classes ) );
		$classes = array_map( 'sanitize_html_class', $classes );

		echo esc_attr( join( ' ', $classes ) );
	}
}

/**
 * Kemet get post thumbnail image.
 */
if ( ! function_exists( 'kemet_get_post_thumbnail' ) ) {

	/**
	 * Kemet get post thumbnail image
	 *
	 * @param string  $before Markup before thumbnail image.
	 * @param string  $after  Markup after thumbnail image.
	 * @param boolean $echo   Output print or return.
	 * @return string|void
	 */
	function kemet_get_post_thumbnail( $before = '', $after = '', $echo = true ) {

		$output = '';

		$check_is_singular = is_singular();

		$featured_image = true;

		if ( $check_is_singular ) {
			$is_featured_image = kemet_get_option_meta( 'kmt-featured-img' );
		} else {
			$is_featured_image = kemet_get_option( 'kmt-featured-img' );
		}

		if ( 'disabled' === $is_featured_image ) {
			$featured_image = false;
		}

		$featured_image = apply_filters( 'kemet_featured_image_enabled', $featured_image );

		$blog_post_thumb   = kemet_get_option( 'blog-post-structure' );
		$single_post_thumb = kemet_get_option( 'blog-single-post-structure' );

		if ( ( ( ! $check_is_singular && in_array( 'image', $blog_post_thumb ) ) || ( is_single() && in_array( 'single-image', $single_post_thumb ) ) || is_page() ) && has_post_thumbnail() ) {

			if ( $featured_image && ( ! ( $check_is_singular ) || ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) ) ) {

				$post_thumb = get_the_post_thumbnail(
					get_the_ID(),
					apply_filters( 'kemet_post_thumbnail_default_size', 'full' ),
					array(
						'itemprop' => 'image',
					)
				);

				if ( '' != $post_thumb ) {
					$output .= '<div class="post-thumb-img-content post-thumb">';
					if ( ! $check_is_singular ) {
						$output .= '<a href="' . esc_url( get_permalink() ) . '" >';
					}
					$output .= $post_thumb;
					if ( ! $check_is_singular ) {
						$output .= '</a>';
					}
					$output .= '</div>';
				}
			}
		}

		if ( ! $check_is_singular ) {
			$output = apply_filters( 'kemet_blog_post_featured_image_after', $output );
		}

		$output = apply_filters( 'kemet_get_post_thumbnail', $output, $before, $after );

		if ( $echo ) {
			echo $before . $output . $after; // WPCS: XSS OK.
		} else {
			return $before . $output . $after;
		}
	}
}

/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'kemet_check_is_ie' ) ) :

	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function kemet_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'kemet_check_is_ie', $is_ie );
	}

endif;


/**
 * Replace heade logo.
 */
if ( ! function_exists( 'kemet_replace_header_logo' ) ) :

	/**
	 * Replace header logo.
	 *
	 * @param array  $image Size.
	 * @param int    $attachment_id Image id.
	 * @param sting  $size Size name.
	 * @param string $icon Icon.
	 *
	 * @return array Size of image
	 */
	function kemet_replace_header_logo( $image, $attachment_id, $size, $icon ) {

		$custom_logo_id = get_theme_mod( 'custom_logo' );

		if ( ! is_customize_preview() && $custom_logo_id == $attachment_id && 'full' == $size ) {

			$data = wp_get_attachment_image_src( $attachment_id, 'kmt-logo-size' );

			if ( false != $data ) {
				$image = $data;
			}
		}

		return apply_filters( 'kemet_replace_header_logo', $image );
	}

endif;

/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'kemet_replace_header_attr' ) ) :

	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function kemet_replace_header_attr( $attr, $attachment, $size ) {

		$custom_logo_id = get_theme_mod( 'custom_logo' );

		if ( $custom_logo_id == $attachment->ID ) {

			$attach_data = array();
			if ( ! is_customize_preview() ) {
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'kmt-logo-size' );

				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];

			if ( 'svg' == $file_extension ) {
				$attr['class'] = 'kemet-logo-svg';
			}

			$retina_logo = kemet_get_option( 'kmt-header-retina-logo' );

			$attr['srcset'] = '';

			if ( apply_filters( 'kemet_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if ( kemet_check_is_ie() ) {
					// Replace header logo url to retina logo url.
					$attr['src'] = $retina_logo;
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';

			}
		}

		return apply_filters( 'kemet_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'kemet_replace_header_attr', 10, 3 );

/**
 * Kemet Color Palletes.
 */
if ( ! function_exists( 'kemet_color_palette' ) ) :

	/**
	 * Kemet Color Palletes.
	 *
	 * @return array Color Palletes.
	 */
	function kemet_color_palette() {

		$color_palette = array(
			'#000000',
			'#ffffff',
			'#dd3333',
			'#dd9933',
			'#eeee22',
			'#81d742',
			'#1e73be',
			'#8224e3',
		);

		return apply_filters( 'kemet_color_palettes', $color_palette );
	}

endif;

if ( ! function_exists( 'kemet_get_theme_name' ) ) :

	/**
	 * Get theme name.
	 *
	 * @return string Theme Name.
	 */
	function kemet_get_theme_name() {

		$theme_name = __( 'Kemet', 'kemet' );

		return apply_filters( 'kemet_theme_name', $theme_name );
	}

endif;

if ( ! function_exists( 'kemet_strposa' ) ) :

	/**
	 * Strpos over an array.
	 *
	 * @param  String  $haystack The string to search in.
	 * @param  Array   $needles  Array of needles to be passed to strpos().
	 * @param  integer $offset   If specified, search will start this number of characters counted from the beginning of the string. If the offset is negative, the search will start this number of characters counted from the end of the string.
	 *
	 * @return bool            True if haystack if part of any of the $needles.
	 */
	function kemet_strposa( $haystack, $needles, $offset = 0 ) {

		if ( ! is_array( $needles ) ) {
			$needles = array( $needles );
		}

		foreach ( $needles as $query ) {

			if ( strpos( $haystack, $query, $offset ) !== false ) {
				// stop on first true result.
				return true;
			}
		}

		return false;
	}

endif;

if ( ! function_exists( 'astar' ) ) :

	/**
	 * Get a specific property of an array without needing to check if that property exists.
	 *
	 * Provide a default value if you want to return a specific value if the property is not set.
	 *
	 * @access public
	 * @author Gravity Forms - Easiest Tool to Create Advanced Forms for Your WordPress-Powered Website.
	 * @link  https://www.gravityforms.com/
	 *
	 * @param array  $array   Array from which the property's value should be retrieved.
	 * @param string $prop    Name of the property to be retrieved.
	 * @param string $default Optional. Value that should be returned if the property is not set or empty. Defaults to null.
	 *
	 * @return null|string|mixed The value
	 */
	function astar( $array, $prop, $default = null ) {

		if ( ! is_array( $array ) && ! ( is_object( $array ) && $array instanceof ArrayAccess ) ) {
			return $default;
		}

		if ( isset( $array[ $prop ] ) ) {
			$value = $array[ $prop ];
		} else {
			$value = '';
		}

		return empty( $value ) && null !== $default ? $default : $value;
	}

endif;
