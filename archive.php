<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kemet
 *
 */

get_header(); ?>

<?php if ( wiz_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php wiz_content_class(); ?>>

		<?php wiz_primary_content_top(); ?>

		<?php wiz_archive_top_info(); ?>

		<?php wiz_content_loop(); ?>

		<?php wiz_pagination(); ?>

		<?php wiz_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( wiz_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
