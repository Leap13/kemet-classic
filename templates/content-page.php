<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wiz
 * @since 1.0.0
 */

?>

<?php wiz_entry_before(); ?>

<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php wiz_entry_top(); ?>

	<header class="entry-header <?php wiz_entry_header_class(); ?>">

		<?php wiz_get_post_thumbnail(); ?>

		<?php wiz_the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content clear" itemprop="text">

		<?php wiz_entry_content_before(); ?>

		<?php the_content(); ?>

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

	<?php
		wiz_edit_post_link(

			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'wiz' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

	<?php wiz_entry_bottom(); ?>

</article><!-- #post-## -->

<?php wiz_entry_after(); ?>
