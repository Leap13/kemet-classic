<?php
/**
 * Template for 404
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

?>
<div class="wiz-404-layout">

	<?php wiz_the_title( '<header class="page-header"><h1 class="page-title">', '</h1></header><!-- .page-header -->' ); ?>

	<div class="page-content">

		<div class="page-sub-title">
			<?php echo esc_html( wiz_theme_strings( 'string-404-title', false ) ); ?>
		</div>

		<div class="wiz-404-search">
			<?php the_widget( 'WP_Widget_Search' ); ?>
		</div>

	</div><!-- .page-content -->
</div>
