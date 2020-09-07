<?php
/**
 * Template for Single post
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

?>

<div <?php wiz_blog_layout_class( 'single-layout-1' ); ?>>

	<?php wiz_single_header_before(); ?>

	<header class="entry-header <?php wiz_entry_header_class(); ?>">

		<?php wiz_single_header_top(); ?>

		<?php wiz_single_post_thumbnai_and_title_order(); ?>

		<?php wiz_single_header_bottom(); ?>

	</header><!-- .entry-header -->

	<?php wiz_single_header_after(); ?>

	<div class="entry-content clear" itemprop="text">

		<?php wiz_entry_content_before(); ?>

		<?php the_content(); ?>

		<?php
			wiz_edit_post_link(

				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'wiz' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>

		<?php wiz_entry_content_after(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html( wiz_theme_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
		?>
	</div><!-- .entry-content .clear -->
</div>
