<?php
/**
 * Template for Blog Thumbnail Style
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

?>
<div <?php kemet_blog_layout_class( 'blog-layout-1' ); ?>>
	<div class="post-content kmt-col-md-12 <?php echo 'thumbnail-image-'.kemet_get_option('thumbnail-image-position');?>">
        <?php
            // Featured Image
			do_action( 'kemet_blog_archive_featured_image_before' );
            kemet_get_blog_post_thumbnail( 'archive' );
            do_action( 'kemet_blog_archive_featured_image_after' );
        ?>
		<div class="blog-entry-content">
            <?php
                do_action( 'kemet_blog_archive_title_meta_before' );
                kemet_get_blog_post_title_meta();
                do_action( 'kemet_blog_archive_title_meta_after' );
            ?>
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
        </div><!-- .blog-entry-content -->
    </div><!-- .post-content -->
</div> <!-- .blog-layout-1 -->
