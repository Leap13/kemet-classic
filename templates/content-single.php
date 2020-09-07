<?php
/**
 * Template part for displaying single posts.
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

	<?php wiz_entry_content_single(); ?>

	<?php wiz_entry_bottom(); ?>

</article><!-- #post-## -->

<?php wiz_entry_after(); ?>
