<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

		<?php wiz_404_content_template(); ?>

		<?php wiz_primary_content_bottom(); ?>	

	</div><!-- #primary -->

<?php if ( wiz_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
