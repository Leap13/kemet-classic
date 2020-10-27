<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kemet
 * 
 */

$sidebar = apply_filters( 'wiz_get_sidebar', 'sidebar-1' );

?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area secondary" role="complementary">

	<div class="sidebar-main">

	<?php wiz_sidebars_before(); ?>
	
		<?php if ( is_active_sidebar( $sidebar ) ) : ?>

			<?php dynamic_sidebar( $sidebar ); ?>

		<?php endif; ?>

	<?php wiz_sidebars_after(); ?>

	</div><!-- .sidebar-main -->
</div><!-- #secondary -->
