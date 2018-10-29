<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kemet
 * @since 1.0.0
 */

get_header(); ?>

<?php if ( kemet_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php kemet_primary_class(); ?>>

		<?php kemet_primary_content_top(); ?>

		<?php kemet_archive_header(); ?>

		<?php kemet_content_loop(); ?>

		<?php kemet_pagination(); ?>

		<?php kemet_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( kemet_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
