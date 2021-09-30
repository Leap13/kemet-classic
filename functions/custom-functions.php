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
		echo apply_filters( 'kemet_schema_body', "itemtype='https://schema.org/" . esc_attr( $result ) . "' itemscope='itemscope'" ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
		$classes[]   = $page_layout;

		// Footer.
		$kemet_sticky_footer = kemet_get_option( 'enable-sticky-footer' );

		if ( $kemet_sticky_footer ) {
			$classes[] = 'kmt-sticky-footer';
		}

		// Sticky sidebar.
		$kemet_sticky_sidebar        = kemet_get_option( 'enable-sticky-sidebar' );
		$kemet_sticky_sidebar_widget = kemet_get_option( 'only-stick-last-widget' );
		if ( $kemet_sticky_sidebar && ! $kemet_sticky_sidebar_widget ) {
			$classes[] = 'kmt-sticky-sidebar';
		}
		if ( $kemet_sticky_sidebar_widget && $kemet_sticky_sidebar ) {
			$classes[] = 'kmt-sticky-sidebar-widget';
		}

		return $classes;
	}
}

add_filter( 'body_class', 'kemet_body_classes' );

/**
 * Display sidebar as section
 */
if ( ! function_exists( 'kemet_activate_sidebar_section' ) ) {
	/**
	 * Display sidebar as section.
	 *
	 * @param bool   $active ios active.
	 * @param object $section section.
	 * @return bool
	 */
	function kemet_activate_sidebar_section( $active, $section ) {
		if ( 'sidebar-widgets-sidebar-1' === $section->id ) {
				$active = true;
		}
		return $active;
	}
}
add_filter( 'customize_section_active', 'kemet_activate_sidebar_section', 99, 2 );

/**
 * Kemet Pagination
 */
if ( ! function_exists( 'kemet_number_pagination' ) ) {

	/**
	 * Kemet Pagination
	 */
	function kemet_number_pagination() {
		global $numpages;
		$enabled = apply_filters( 'kemet_pagination_enabled', true );

		if ( isset( $numpages ) && $enabled ) {
			ob_start();
			echo "<div class='kmt-pagination'>";
			the_posts_pagination(
				array(
					'prev_text'    => kemet_theme_strings( 'string-blog-navigation-previous', false ),
					'next_text'    => kemet_theme_strings( 'string-blog-navigation-next', false ),
					'taxonomy'     => 'category',
					'in_same_term' => true,
				)
			);
			echo '</div>';
			$output = ob_get_clean();
			echo apply_filters( 'kemet_pagination_markup', $output ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
	 * @param boolean $echo echo or not.
	 * @return mixed echo or return markup.
	 */
	function kemet_logo( $echo = true ) {
		$display_site_tagline = kemet_get_option( 'display-site-tagline' );
		$display_site_title   = kemet_get_option( 'display-site-title' );
		$html                 = '';

		$has_custom_logo = apply_filters( 'kemet_has_custom_logo', has_custom_logo() );

		// Site logo.
		$html .= '<span class="site-logo-img">';
		if ( $has_custom_logo ) {
			$html .= get_custom_logo();
		}

		$html .= '</span>';

		if ( ! apply_filters( 'kemet_disable_site_identity', false ) ) {

			// Site Title.
			$tag = 'span';

			/**
			 * Filters the tags for site title.
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
			echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			return $html;
		}
	}
}

if ( ! function_exists( 'kemet_custom_logo' ) ) {
	/**
	 * Logo markup
	 *
	 * @param string $html logo html.
	 * @return string
	 */
	function kemet_custom_logo( $html ) {
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
			esc_url( home_url( '/' ) ),
			wp_get_attachment_image(
				apply_filters( 'kemet_custom_logo_id', get_theme_mod( 'custom_logo' ) ), // Attachment id.
				'kmt-logo-size', // Attachment size.
				false, // Attachment icon.
				array(
					'class' => 'custom-logo',
				)
			)
		);
		return $html;
	}
}

add_filter( 'get_custom_logo', 'kemet_custom_logo', 10, 2 );

/**
 * Function to get Small Footer Custom Text
 */
if ( ! function_exists( 'kemet_get_copyright_footer_custom_text' ) ) {

	/**
	 * Function to get Small Footer Custom Text
	 *
	 * @param string $option Custom text option name.
	 * @return mixed         Markup of custom text option.
	 */
	function kemet_get_copyright_footer_custom_text( $option = '' ) {
		$output = $option;

		if ( '' != $option ) {
			$output = kemet_get_option( $option );
			$output = str_replace( '[site_title]', '<span class="kmt-footer-site-title">' . get_bloginfo( 'name' ) . '</span>', $output );

			$theme_author = apply_filters(
				'kemet_theme_author',
				array(
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
 * Function to get site Header
 */
if ( ! function_exists( 'kemet_header_markup' ) ) {

	/**
	 * Site Header - <header>
	 */
	function kemet_header_markup() {
		?>

		<header itemtype="https://schema.org/WPHeader" itemscope="itemscope" id="sitehead" <?php kemet_header_classes(); ?> role="banner">

			<?php kemet_sitehead_top(); ?>

			<?php kemet_sitehead(); ?>

			<?php kemet_sitehead_bottom(); ?>

		</header><!-- #sitehead -->
		<?php
	}
}

add_action( 'kemet_header', 'kemet_header_markup' );

/**
 * Add svg icon if menu item has children.
 *
 * @since 1.2
 */
function kemet_dropdown_icon_to_menu_link( $title, $item, $args ) {

	$icon = '';
	if ( 'footer-menu' === $args->menu ) {
		return $title;
	}

	if ( isset( $args->container_class ) ) {
		$icon = Kemet_Svg_Icons::get_icons( 'dropdown-menu' );
	}

	if ( ! empty( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
		$title = $title . $icon;
	}

	return $title;

}

add_filter( 'nav_menu_item_title', 'kemet_dropdown_icon_to_menu_link', 10, 4 );

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
		$kemet_responsive_menu_point = kemet_get_option( 'kemet-break-point' );
		$kemet_responsive_menu_point = isset( $kemet_responsive_menu_point['value'] ) ? $kemet_responsive_menu_point['value'] : 921;

		return absint( apply_filters( 'kemet_responsive_menu_point', $kemet_responsive_menu_point ) );
	}
}
/**
 * Function to Add Header Breakpoint Style
 */
function kemet_header_breakpoint_style() {

	// Header Break Point.
	$header_break_point = kemet_header_break_point();

	ob_start();
	?>
	#kmt-mobile-header::before {
		content: '<?php echo esc_html( $header_break_point ); ?>';
	}

	@media all and ( min-width: <?php echo esc_html( $header_break_point ); ?>px ) {
		#kmt-mobile-header::before {
			content: '';
		}
	}
	<?php

	$dynamic_css = ob_get_clean();

	// trim white space for faster page loading.
	$dynamic_css = Kemet_Enqueue_Scripts::trim_css( $dynamic_css );

	wp_add_inline_style( 'kemet-theme-css', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'kemet_header_breakpoint_style' );

/**
 * Function to get Edit Post Link
 */
if ( ! function_exists( 'kemet_edit_post_link' ) ) {

	/**
	 * Function to get Edit Post Link
	 *
	 * @param string  $text link text.
	 * @param string  $before before link.
	 * @param string  $after after link.
	 * @param integer $id post id.
	 * @param string  $class class.
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
	 */
	function kemet_header_classes() {
		$classes           = array( 'site-header' );
		$logo_title_inline = kemet_get_option( 'logo-title-inline' );

		// Add class if Inline Logo & Site Title.
		if ( $logo_title_inline ) {
			$classes[] = 'kmt-logo-title-inline';
		}

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
	 */
	function kemet_footer_classes() {
		$classes = array_unique( apply_filters( 'kemet_footer_class', array( 'site-footer' ) ) );

		$kemet_sticky_effect = kemet_get_option( 'enable-sticky-footer' );

		if ( $kemet_sticky_effect ) {
			$classes[] = 'sticky-footer';
		}

		$classes = array_map( 'sanitize_html_class', $classes );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}

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
		'<label for="author" class="screen-reader-text">' . esc_html( kemet_theme_strings( 'string-comment-label-name', false ) ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" placeholder="' . esc_attr( kemet_theme_strings( 'string-comment-label-name', false ) ) . '" size="30"' . $aria_req . ' /></p>';
		$fields['email']  = '<p class="comment-form-email kmt-col-xs-12 kmt-col-sm-12 kmt-col-md-4 kmt-col-lg-4">' .
		'<label for="email" class="screen-reader-text">' . esc_html( kemet_theme_strings( 'string-comment-label-email', false ) ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" placeholder="' . esc_attr( kemet_theme_strings( 'string-comment-label-email', false ) ) . '" size="30"' . $aria_req . ' /></p>';
		$fields['url']    = '<p class="comment-form-url kmt-col-xs-12 kmt-col-sm-12 kmt-col-md-4 kmt-col-lg-4"><label for="url">' .
		'<label for="url" class="screen-reader-text">' . esc_html( kemet_theme_strings( 'string-comment-label-website', false ) ) . '</label><input id="url" name="url" type="text" value="' . esc_url( $commenter['comment_author_url'] ) .
		'" placeholder="' . esc_attr( kemet_theme_strings( 'string-comment-label-website', false ) ) . '" size="30" /></label></p></div>';

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
		$args['title_reply']       = kemet_theme_strings( 'string-comment-title-reply', false );
		$args['cancel_reply_link'] = kemet_theme_strings( 'string-comment-cancel-reply-link', false );
		$args['label_submit']      = kemet_theme_strings( 'string-comment-label-submit', false );
		$args['comment_field']     = '<div class="kmt-row comment-textarea"><fieldset class="comment-form-comment"><div class="comment-form-textarea kmt-col-lg-12"><label for="comment" class="screen-reader-text">' . esc_html( kemet_theme_strings( 'string-comment-label-message', false ) ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr( kemet_theme_strings( 'string-comment-label-message', false ) ) . '" cols="45" rows="8" aria-required="true"></textarea></div></fieldset></div>';

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
		$value          = false;
		$content_layout = '';
		$post_type      = get_post_type();

		if ( 'page' === $post_type ) {
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
 * Kemet entry header class.
 */
if ( ! function_exists( 'kemet_entry_header_class' ) ) {

	/**
	 * Kemet entry header class
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

		$featured_image = apply_filters( 'kemet_featured_image_enabled', $featured_image );

		$blog_post_thumb   = kemet_get_option( 'blog-post-structure' );
		$single_post_thumb = kemet_get_option( 'blog-single-post-structure' );

		if ( ( ( ! $check_is_singular && in_array( 'image', $blog_post_thumb ) ) || ( is_single() && in_array( 'single-image', $single_post_thumb ) ) || is_page() ) && has_post_thumbnail() ) {
			if ( $featured_image && ( ! ( $check_is_singular ) || ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) ) ) {
				$post_thumb = apply_filters(
					'kemet_featured_image_attrs',
					get_the_post_thumbnail(
						get_the_ID(),
						apply_filters( 'kemet_post_thumbnail_default_size', 'full' ),
						array(
							'itemprop' => 'image',
						)
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
			echo $before . $output . $after; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			return $before . $output . $after;
		}
	}
}

/**
 * Replace header logo.
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
 * Function to Replace the logo which in header
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

				// Replace header logo url to retina logo url.
				$attr['src']    = $retina_logo;
				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';
			}
		}

		remove_filter( 'wp_get_attachment_image_src', 'kemet_replace_header_logo', 10 );

		return apply_filters( 'kemet_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'kemet_replace_header_attr', 10, 3 );

if ( ! function_exists( 'kemet_prop' ) ) :

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
	function kemet_prop( $array, $prop, $default = null ) {
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

if ( ! function_exists( 'kemet_hex2rgba' ) ) {

	/**
	 * Convert hexdec color string to rgb(a) string
	 *
	 * @param string  $color color.
	 * @param boolean $opacity opacity.
	 * @param boolean $echo echo or not.
	 * @return string
	 */
	function kemet_hex2rgba( $color, $opacity = false, $echo = false ) {
		$default = 'rgb(0,0,0)';

		// Return default if no color provided.
		if ( empty( $color ) ) {
			return $default;
		}

		// Sanitize $color if "#" is provided.
		if ( '#' == $color[0] ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values.
		if ( strlen( $color ) == 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		// Convert hexadec to rgb.
		$rgb = array_map( 'hexdec', $hex );

		// Check if opacity is set(rgba or rgb).
		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}
			if ( $echo ) {
				$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
			} else {
				$rgb[]  = $opacity;
				$output = $rgb;
			}
		} else {
			if ( $echo ) {
				$output = 'rgb(' . implode( ',', $rgb ) . ')';
			} else {
				$output = $rgb;
			}
		}

		// Return rgb(a) color string.
		return $output;
	}
}

if ( ! function_exists( 'kemet_color_brightness' ) ) {

	/**
	 * Change color brightness to be darker or lighter
	 *
	 * @param string $hex color hex.
	 * @param float  $percent brightness percent from 0 to 1.
	 * @param string $brightness light or dark.
	 * @return string the new generated color hex.
	 */
	function kemet_color_brightness( $hex, $percent, $brightness = 'light' ) {
		if ( substr( $hex, 0, 5 ) === 'var(-' ) {
			return $hex;
		}
		if ( '' != $hex ) {
			if ( 'dark' == $brightness ) {
				$percent = $percent * -1;
			}
			if ( strpos( $hex, 'rgba' ) !== false ) {
				$order   = array( 'rgba', '(', ')' );
				$replace = '';
				$output  = str_replace( $order, $replace, $hex );
				$rgb     = explode( ',', $output );
				$rgb     = array_map( 'intval', $rgb );
			} else {
				$rgb = kemet_hex2rgba( $hex );
			}

			// CALCULATE.
			for ( $i = 0; $i < 3; $i++ ) {
				// See if brighter or darker.
				if ( $percent > 0 ) {
					// Lighter.
					$rgb[ $i ] = round( $rgb[ $i ] * $percent ) + round( 255 * ( 1 - $percent ) );
				} else {
					// Darker.
					$positive_percent = $percent - ( $percent * 2 );
					$rgb[ $i ]        = round( $rgb[ $i ] * $positive_percent ) + round( 0 * ( 1 - $positive_percent ) );
				}
				// In case rounding up causes us to go to 256.
				if ( $rgb[ $i ] > 255 ) {
					$rgb[ $i ] = 255;
				}
			}
			// RBG to Hex.
			$new_hex = '#';
			for ( $i = 0; $i < 3; $i++ ) {
				// Convert the decimal digit to hex.
				$hex_digit = dechex( $rgb[ $i ] );
				// Add a leading zero if necessary.
				if ( strlen( $hex_digit ) == 1 ) {
					$hex_digit = '0' . $hex_digit;
				}
				// Append to the hex string.
				$new_hex .= $hex_digit;
			}
			return $new_hex;
		} else {
			return;
		}
	}
}
if ( ! function_exists( 'kemet_enable_page_builder' ) ) :

	/**
	 * Allow filter to enable/disable page builder compatibility.
	 *
	 * @return  bool True - If the page builder compatibility is enabled. False - IF the page builder compatibility is disabled.
	 */
	function kemet_enable_page_builder() {
		return apply_filters( 'kemet_enable_page_builder', true );
	}

endif;

/**
 * Support upload svg
 *
 * @param object $mimes allowed mimes.
 * @return object
 */
function svg_upload_support( $mimes ) {
	// New allowed mime types.
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}

add_action( 'upload_mimes', 'svg_upload_support' );

/**
 * Get visibility class from option
 *
 * @param array $option.
 * @return string
 */
function get_visibility_class( $option ) {
	if ( empty( $option ) ) {
		$option = array();
	}
	$class   = array();
	$default = array(
		'desktop' => false,
		'tablet'  => false,
		'mobile'  => false,
	);
	$option  = array_merge( $default, $option );
	if ( ! $option['desktop'] ) {
		$class[] = 'hide-desktop';
	}
	if ( ! $option['tablet'] && ! $option['mobile'] ) {
		$class[] = 'hide-tablet-mobile';
	} else {
		if ( ! $option['tablet'] ) {
			$class[] = 'hide-tablet';
		}
		if ( ! $option['mobile'] ) {
			$class[] = 'hide-mobile';
		}
	}
	if ( empty( $class ) ) {
		$class[] = 'all-devices';
	}
	return implode( $class, ' ' );
}

add_action( 'upload_mimes', 'svg_upload_support' );

/**
 * Gutenberg Support
 *
 * @return void
 */
function gutenberg_support() {
	// Adding support for core block visual styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	/* Add support for responsive embedded content. */
	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'editor-styles' );

	add_editor_style( 'style-editor.css' );

	// Global Color.
	$theme_color          = kemet_get_sub_option( 'theme-color', 'initial' );
	$headings_color       = kemet_get_sub_option( 'headings-color', 'initial' );
	$global_links_color   = kemet_get_sub_option( 'links-color', 'initial' );
	$global_links_h_color = kemet_get_sub_option( 'links-color', 'hover', $theme_color );
	$text_meta_color      = kemet_get_sub_option( 'text-meta-color', 'initial' );
	$global_border_color  = kemet_get_sub_option( 'global-border-color', 'initial' );
	$global_bg_color      = kemet_get_sub_option( 'global-background-color', 'initial' );

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Global Color', 'kemet' ),
				'slug'  => 'global',
				'color' => $theme_color,
			),
			array(
				'name'  => __( 'Global Background Color', 'kemet' ),
				'slug'  => 'global-bg',
				'color' => $global_bg_color,
			),
			array(
				'name'  => __( 'Global Headings Color', 'kemet' ),
				'slug'  => 'headings',
				'color' => $headings_color,
			),
			array(
				'name'  => __( 'Global Links Color', 'kemet' ),
				'slug'  => 'links',
				'color' => $global_links_color,
			),
			array(
				'name'  => __( 'Global Links Hover Color', 'kemet' ),
				'slug'  => 'links-hover',
				'color' => $global_links_h_color,
			),
			array(
				'name'  => __( 'Global Text Color', 'kemet' ),
				'slug'  => 'text-meta',
				'color' => $text_meta_color,
			),
			array(
				'name'  => __( 'Global Border Color', 'kemet' ),
				'slug'  => 'global-border',
				'color' => $global_border_color,
			),
		)
	);
}

add_action( 'after_setup_theme', 'gutenberg_support', 10 );

if ( ! function_exists( 'kemet_wrap_embed_media' ) ) {
	/**
	 * Wrap video embeds with a generic class
	 *
	 * @param mixed $html embed html.
	 * @return mixed
	 */
	function kemet_wrap_embed_media( $html ) {

		// List of emebeds we want a responsive but auto height orientation.
		if ( false !== strpos( $html, 'twitter' ) ||
			false !== strpos( $html, 'facebook' ) ||
			false !== strpos( $html, 'mixcloud' ) ) {
			return '<div class="kmt-oembed-container relaxed">' . $html . '</div>';
		} else {
			// Widescreen responsive format.
			return '<div class="kmt-oembed-container">' . $html . '</div>';
		}
	}
}

add_filter( 'embed_oembed_html', 'kemet_wrap_embed_media' );

if ( ! function_exists( 'kemet_allowed_html' ) ) {
	/**
	 * Allowed HTML
	 *
	 * @param string $allowed_elements .
	 * @return mixed
	 */
	function kemet_allowed_html( $allowed_elements = '' ) {

		// bail early if parameter is empty.
		if ( empty( $allowed_elements ) ) {
			return array();
		}

		if ( 'post' == $allowed_elements ) {
			return wp_kses_allowed_html( 'post' );
		}

		if ( is_string( $allowed_elements ) ) {
			$allowed_elements = explode( ',', $allowed_elements );
		}

		$allowed_html = array();

		$allowed_tags = wp_kses_allowed_html( 'post' );
		$svg_args     = array();
		foreach ( $allowed_elements as $element ) {
			$element = trim( $element );
			if ( array_key_exists( $element, $allowed_tags ) ) {
				$allowed_html[ $element ] = $allowed_tags[ $element ];
			}
			if ( 'svg' === $element ) {
				$svg_args = array(
					'svg'   => array(
						'class'           => true,
						'aria-hidden'     => true,
						'aria-labelledby' => true,
						'role'            => true,
						'xmlns'           => true,
						'width'           => true,
						'height'          => true,
						'viewbox'         => true,
					),
					'g'     => array(
						'fill' => true,
					),
					'title' => array(
						'title' => true,
					),
					'path'  => array(
						'd'    => true,
						'fill' => true,
					),
				);
			}
		}
		if ( ! empty( $svg_args ) ) {
			$allowed_html = array_merge( $allowed_html, $svg_args );
		}
		return $allowed_html;
	}
}

if ( ! function_exists( 'kemet_excerpt_more' ) ) {
	/**
	 * kemet_excerpt_more
	 *
	 * @param  string $more
	 * @return string
	 */
	function kemet_excerpt_more( $more ) {
		$enable_read_more_button = kemet_get_option( 'readmore-as-button' );
		$class                   = $enable_read_more_button ? ' button' : '';
		$align                   = kemet_get_option( 'readmore-button-align', 'left' );
		$align_attr              = $enable_read_more_button ? 'data-align="' . esc_attr( $align ) . '"' : '';

		return sprintf(
			'<p class="read-more" ' . $align_attr . '><a href="%1$s" class="kmt-read-more%2$s">%3$s</a></p>',
			esc_url( get_permalink( get_the_ID() ) ),
			esc_attr( $class ),
			sprintf( __( 'Read More »%s', 'kemet' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	}
}

add_filter( 'excerpt_more', 'kemet_excerpt_more' );

if ( ! function_exists( 'kemet_has_widget_editor' ) ) {
	/**
	 * kemet_has_widget_editor
	 */
	function kemet_has_widget_editor() {
		return ( defined( 'GUTENBERG_VERSION' ) && version_compare( GUTENBERG_VERSION, '10.6.2', '>' ) ) || version_compare( substr( get_bloginfo( 'version' ), 0, 3 ), '5.8', '>=' );
	}
}

if ( ! function_exists( 'kemet_get_meta' ) ) {
	/**
	 * kemet_get_meta
	 */
	function kemet_get_meta( $key, $post_id = '' ) {
		if ( '' === $post_id ) {
			$post_id = isset( $_GET['post'] ) ? $_GET['post'] : get_the_id();
		}
		$meta = get_post_meta( $post_id, 'kemet_meta', true );
		$meta = json_decode( $meta, true );

		if ( ! empty( $meta ) && isset( $meta[ $key ] ) ) {
			return $meta[ $key ];
		}

		return false;
	}
}

if ( ! function_exists( 'kemet_update_meta' ) ) {
	/**
	 * kemet_get_meta
	 */
	function kemet_update_meta( $meta_key, $key, $value ) {
		$meta = get_post_meta( get_the_ID(), $meta_key, true );
		$meta = json_decode( $meta, true );

		$meta[ $key ] = $value;

		update_post_meta( get_the_ID(), $meta_key, wp_json_encode( $meta ) );
	}
}

/**
 * Kemet Sidebar
 */
if ( ! function_exists( 'kemet_dynamic_sidebar' ) ) {
	/**
	 * Kemet Sidebar
	 *
	 * @param int $sidebar_id sidebar id.
	 */
	function kemet_dynamic_sidebar( $sidebar_id ) {
		ob_start();
		dynamic_sidebar( $sidebar_id );
		echo apply_filters( 'kemet_' . $sidebar_id, ob_get_clean() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
