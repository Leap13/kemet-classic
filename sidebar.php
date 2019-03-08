<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kemet
 * 
 */

$sidebar = apply_filters( 'kemet_get_sidebar', 'sidebar-1' );

?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" <?php kemet_secondary_class(); ?> role="complementary">

	<div class="sidebar-main">


		<?php if ( is_active_sidebar( $sidebar ) ) : ?>

			<?php dynamic_sidebar( $sidebar ); ?>

		<?php endif; ?>

	</div><!-- .sidebar-main -->
</div><!-- #secondary -->
