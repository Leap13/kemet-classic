<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wiz
 *
 */

get_header(); ?>

<?php if ( wiz_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php wiz_content_class(); ?>>

		<?php wiz_archive_top_info(); ?>

		<?php wiz_content_loop(); ?>

		<?php wiz_pagination(); ?>

	</div><!-- #primary -->

<?php if ( wiz_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
