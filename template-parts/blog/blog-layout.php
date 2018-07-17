<?php
/**
 * Template for Blog
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

?>
<div <?php kemet_blog_layout_class( 'blog-layout-1' ); ?>>

	<div class="post-content ast-col-md-12">

		<?php kemet_blog_post_thumbnai_and_title_order(); ?>

		<div class="entry-content clear" itemprop="text">

			<?php kemet_entry_content_before(); ?>

			<?php kemet_the_excerpt(); ?>

			<?php kemet_entry_content_after(); ?>

			<?php
				wp_link_pages(
					array(
						'before'      => '<div class="page-links">' . esc_html( kemet_default_strings( 'string-blog-page-links-before', false ) ),
						'after'       => '</div>',
						'link_before' => '<span class="page-link">',
						'link_after'  => '</span>',
					)
				);
			?>
		</div><!-- .entry-content .clear -->
	</div><!-- .post-content -->

</div> <!-- .blog-layout-1 -->
