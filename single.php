<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wiz
 * 
 */

get_header(); ?>

<?php if ( wiz_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php wiz_content_class(); ?>>

		<?php wiz_content_loop(); ?>

	</div><!-- #primary -->

<?php if ( wiz_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
