<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kemet
 */

$sidebar = apply_filters( 'kemet_get_sidebar', 'sidebar-1' );

?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area secondary">

	<div class="sidebar-main">

	<?php kemet_sidebars_before(); ?>

		<?php if ( is_active_sidebar( $sidebar ) || apply_filters( 'kemet_' . $sidebar . '_hook', false ) ) : ?>

			<?php kemet_dynamic_sidebar( $sidebar ); ?>

		<?php endif; ?>

	<?php kemet_sidebars_after(); ?>

	</div><!-- .sidebar-main -->
</div><!-- #secondary -->
