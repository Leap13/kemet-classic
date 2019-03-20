<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kemet
 * @since 1.0.0
 */

?>

<?php kemet_entry_before(); ?>

<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php kemet_entry_top(); ?>
	<?php
		$display_page_title = kemet_get_option( 'display-page-title' );
		$page_align         = kemet_get_option( 'page-title-align' );
		if($display_page_title) { ?>

			<header class="entry-header kmt-page-title kmt-align-<?php echo $page_align ?> <?php kemet_entry_header_class(); ?>">

			<?php kemet_get_post_thumbnail(); ?>
	
			<?php kemet_the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

		    </header><!-- .entry-header -->
		<?php }
    ?>

	<div class="entry-content clear" itemprop="text">

		<?php kemet_entry_content_before(); ?>

		<?php the_content(); ?>

		<?php kemet_entry_content_after(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html( kemet_default_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
		?>

	</div><!-- .entry-content .clear -->

	<?php
		kemet_edit_post_link(

			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'kemet' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

	<?php kemet_entry_bottom(); ?>

</article><!-- #post-## -->

<?php kemet_entry_after(); ?>
