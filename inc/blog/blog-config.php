<?php
/**
 * Blog Config File
 * Common Functions for Blog and Single Blog
 *
 * @package Kemet
 */

/**
 * Common Functions for Blog and Single Blog
 *
 * @return  post meta
 */
if ( ! function_exists( 'kemet_get_post_meta' ) ) {

	/**
	 * Post meta
	 *
	 * @param  string $post_meta Post meta.
	 * @param  string $separator Separator.
	 * @return string            post meta markup.
	 */
	function kemet_get_post_meta( $post_meta, $separator = '/' ) {

		$output_str = '';
		$loop_count = 1;

		foreach ( $post_meta as $meta_value ) {

			switch ( $meta_value ) {

				case 'author':
					$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
					$output_str .= esc_html( kemet_default_strings( 'string-blog-meta-author-by', false ) ) . kemet_post_author();
					break;

				case 'date':
					$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
					$output_str .= kemet_post_date();
					break;

				case 'category':
					$category = kemet_post_categories();
					if ( '' != $category ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $category;
					}
					break;

				case 'tag':
					$tags = kemet_post_tags();
					if ( '' != $tags ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $tags;
					}
					break;

				case 'comments':
					$comment = kemet_post_comments();
					if ( '' != $comment ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $comment;
					}
					break;
				default:
					$output_str = apply_filters( 'kemet_meta_case_' . $meta_value, $output_str, $loop_count, $separator );

			}

			$loop_count ++;
		}

		return $output_str;
	}
}

/**
 * Function to get Date of Post
 *
 * @return html
 */
if ( ! function_exists( 'kemet_post_date' ) ) {

	/**
	 * Function to get Date of Post
	 *
	 * @return html
	 */
	function kemet_post_date() {

		$output        = '';
		$format        = apply_filters( 'kemet_post_date_format', '' );
		$time_string   = esc_html( get_the_date( $format ) );
		$modified_date = esc_html( get_the_modified_date( $format ) );
		$posted_on     = sprintf(
			esc_html( '%s' ),
			$time_string
		);
		$modified_on   = sprintf(
			esc_html( '%s' ),
			$modified_date
		);
		$output       .= '<span class="posted-on">';
		$output       .= '<span class="published" itemprop="datePublished"> ' . $posted_on . '</span>';
		$output       .= '<span class="updated" itemprop="dateModified"> ' . $modified_on . '</span>';
		$output       .= '</span>';
		return apply_filters( 'kemet_post_date', $output );
	}
}

/**
 * Function to get Author of Post
 *
 * @return html
 */
if ( ! function_exists( 'kemet_post_author' ) ) {

	/**
	 * Function to get Author of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function kemet_post_author( $output_filter = '' ) {
		$output = '';

		$byline = sprintf(
			esc_html( '%s' ),
			'<a class="url fn n" title="View all posts by ' . esc_attr( get_the_author() ) . '" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" itemprop="url"> <span class="author-name" itemprop="name">' . esc_html( get_the_author() ) . '</span> </a>'
		);

		$output .= '<span class="posted-by vcard author" itemtype="https://schema.org/Person" itemscope="itemscope" itemprop="author"> ' . $byline . '</span>';

		return apply_filters( 'kemet_post_author', $output, $output_filter );
	}
}

/**
 * Function to get Read More Link of Post
 *
 * @return html
 */
if ( ! function_exists( 'kemet_post_link' ) ) {

	/**
	 * Function to get Read More Link of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function kemet_post_link( $output_filter = '' ) {

		$enabled = apply_filters( 'kemet_post_link_enabled', '__return_true' );
		if ( ( is_admin() && ! wp_doing_ajax() ) || ! $enabled ) {
			return $output_filter;
		}

		$read_more_text    = apply_filters( 'kemet_post_read_more', __( 'Read More &raquo;', 'kemet' ) );
		$read_more_classes = apply_filters( 'kemet_post_read_more_class', array() );

		$post_link = sprintf(
			esc_html( '%s' ),
			'<a class="' . implode( ' ', $read_more_classes ) . '" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . $read_more_text . '</a>'
		);

		$output = ' &hellip;<p class="read-more"> ' . $post_link . '</p>';

		return apply_filters( 'kemet_post_link', $output, $output_filter );
	}
}
add_filter( 'excerpt_more', 'kemet_post_link', 1 );

/**
 * Function to get Number of Comments of Post
 *
 * @return html
 */
if ( ! function_exists( 'kemet_post_comments' ) ) {

	/**
	 * Function to get Number of Comments of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function kemet_post_comments( $output_filter = '' ) {

		$output = '';

		ob_start();
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			?>
			<span class="comments-link">
				<?php
				/**
				 * Get Comment Link
				 *
				 * @see kemet_default_strings()
				 */
				comments_popup_link( kemet_default_strings( 'string-blog-meta-leave-a-comment', false ), kemet_default_strings( 'string-blog-meta-one-comment', false ), kemet_default_strings( 'string-blog-meta-multiple-comment', false ) );
				?>

				<!-- Comment Schema Meta -->
				<span itemprop="interactionStatistic" itemscope itemtype="https://schema.org/InteractionCounter">
					<meta itemprop="interactionType" content="https://schema.org/CommentAction" />
					<meta itemprop="userInteractionCount" content="<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>" />
				</span>
			</span>

			<?php
		}

		$output = ob_get_clean();

		return apply_filters( 'kemet_post_comments', $output, $output_filter );
	}
}

/**
 * Function to get Tags applied of Post
 *
 * @return html
 */
if ( ! function_exists( 'kemet_post_tags' ) ) {

	/**
	 * Function to get Tags applied of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function kemet_post_tags( $output_filter = '' ) {

		$output = '';

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'kemet' ) );

		if ( $tags_list ) {
			$output .= '<span class="tags-links">' . $tags_list . '</span>';
		}

		return apply_filters( 'kemet_post_tags', $output, $output_filter );
	}
}

/**
 * Function to get Categories of Post
 *
 * @return html
 */
if ( ! function_exists( 'kemet_post_categories' ) ) {

	/**
	 * Function to get Categories applied of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function kemet_post_categories( $output_filter = '' ) {

		$output = '';

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'kemet' ) );

		if ( $categories_list ) {
			$output .= '<span class="cat-links">' . $categories_list . '</span>';
		}

		return apply_filters( 'kemet_post_categories', $output, $output_filter );
	}
}

/**
 * Display classes for primary div
 *
 */
if ( ! function_exists( 'kemet_blog_layout_class' ) ) {

	/**
	 * Layout class
	 *
	 * @param  string $class Class.
	 */
	function kemet_blog_layout_class( $class = '' ) {

		// Separates classes with a single space, collates classes for body element.
		echo 'class="' . esc_attr( join( ' ', kemet_get_blog_layout_class( $class ) ) ) . '"';
	}
}

/**
 * Retrieve the classes for the body element as an array.
 *
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
if ( ! function_exists( 'kemet_get_blog_layout_class' ) ) {

	/**
	 * Retrieve the classes for the body element as an array.
	 *
	 * @param string $class Class.
	 */
	function kemet_get_blog_layout_class( $class = '' ) {

		// array of class names.
		$classes = array();

		$post_format = get_post_format();
		if ( $post_format ) {
			$post_format = 'standard';
		}

		$classes[] = 'kmt-post-format-' . $post_format;

		if ( ! has_post_thumbnail() || ! wp_get_attachment_image_src( get_post_thumbnail_id() ) ) {
			switch ( $post_format ) {

				case 'aside':
								$classes[] = 'kmt-no-thumb';
					break;

				case 'image':
								$has_image = kemet_get_first_image_from_post();
					if ( empty( $has_image ) || is_single() ) {
						$classes[] = 'kmt-no-thumb';
					}
					break;

				case 'video':
								$post_featured_data = kemet_get_video_from_post( get_the_ID() );
					if ( empty( $post_featured_data ) ) {
						$classes[] = 'kmt-no-thumb';
					}
					break;

				case 'quote':
								$classes[] = 'kmt-no-thumb';
					break;

				case 'link':
								$classes[] = 'kmt-no-thumb';
					break;

				case 'gallery':
								$post_featured_data = get_post_gallery();
					if ( empty( $post_featured_data ) || is_single() ) {
						$classes[] = 'kmt-no-thumb';
					}
					break;

				case 'audio':
								$has_audio = kemet_get_audios_from_post( get_the_ID() );
					if ( empty( $has_audio ) || is_single() ) {
						$classes[] = 'kmt-no-thumb';
					} else {
						$classes[] = 'kmt-embeded-audio';
					}
					break;

				case 'standard':
				default:
					if ( ! has_post_thumbnail() || ! wp_get_attachment_image_src( get_post_thumbnail_id() ) ) {
						$classes[] = 'kmt-no-thumb';
					}
					break;
			}
		}

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		/**
		 * Filter primary div class names
		 */
		$classes = apply_filters( 'kemet_blog_layout_class', $classes, $class );

		$classes = array_map( 'sanitize_html_class', $classes );

		return array_unique( $classes );
	}
}

/**
 * Function to get Content Read More Link of Post
 *
 * @return html
 */
if ( ! function_exists( 'kemet_the_content_more_link' ) ) {

	/**
	 * Filters the Read More link text.
	 *
	 * @param  string $more_link_element Read More link element.
	 * @param  string $more_link_text Read More text.
	 * @return html                Markup.
	 */
	function kemet_the_content_more_link( $more_link_element = '', $more_link_text = '' ) {

		$enabled = apply_filters( 'kemet_the_content_more_link_enabled', '__return_true' );
		if ( ( is_admin() && ! wp_doing_ajax() ) || ! $enabled ) {
			return $more_link_element;
		}

		$more_link_text    = apply_filters( 'kemet_the_content_more_string', __( 'Read More &raquo;', 'kemet' ) );
		$read_more_classes = apply_filters( 'kemet_the_content_more_link_class', array() );

		$post_link = sprintf(
			esc_html( '%s' ),
			'<a class="' . implode( ' ', $read_more_classes ) . '" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . $more_link_text . '</a>'
		);

		$more_link_element = ' &hellip;<p class="kmt-the-content-more-link"> ' . $post_link . '</p>';

		return apply_filters( 'kemet_the_content_more_link', $more_link_element, $more_link_text );
	}
}
add_filter( 'the_content_more_link', 'kemet_the_content_more_link', 10, 2 );
