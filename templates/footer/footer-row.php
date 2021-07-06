<?php
/**
 * Template part for displaying the a row of the footer
 *
 * @package Kemet
 */

$row       = get_query_var( 'row' );
$helper    = new Kemet_Builder_Helper();
$has_sides = $helper::column_has_items( 'left', $row ) || $helper::column_has_items( 'right', $row );
$classes   = array();
if ( $has_sides ) {
	$classes[] = 'kmt-has-sides-items';
} elseif ( ! ( $has_sides ) && $helper::column_has_items( 'center', $row ) ) {
	$classes[] = 'kmt-has-center-items-only';
}
if ( $helper::column_has_items( 'center', $row ) ) {
	$classes[] = 'kmt-has-center-items';
} else {
	$classes[] = 'kmt-on-center-items';
}

$classes = array_map( 'sanitize_html_class', $classes );

$bar_classes = apply_filters( 'kemet_footer_' . $row . '_row_classes', array_map( 'sanitize_html_class', array() ) );
?>

<div class="kmt-<?php echo esc_attr( $row ); ?>-footer-wrap">
	<div class="<?php echo esc_attr( $row ); ?>-footer-bar <?php echo esc_attr( join( ' ', $bar_classes ) ); ?>">
		<div class="site-<?php echo esc_attr( $row ); ?>-footer-wrap kmt-builder-grid-row-container kmt-container section-footer-<?php echo esc_attr( $row ); ?>">
			<div class="kmt-grid-row <?php echo esc_attr( join( ' ', $classes ) ); ?>">
			<?php
			if ( $has_sides || $helper::column_has_items( 'left_center', $row ) ) {
				?>
				<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-left site-footer-section kmt-flex site-footer-section-left">
				<?php
				/**
				 * Kemet Render Foott Column
				 */
				do_action( 'kemet_render_footer_column', 'left', $row );
				?>
				<?php if ( $helper::column_has_items( 'left_center', $row ) && $helper::column_has_items( 'center', $row ) ) { ?>
					<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-left-center site-footer-section kmt-flex kmt-grid-left-center-section">
					<?php
					/**
					 * Kemet Render Footer Column
					 */
					do_action( 'kemet_render_footer_column', 'left_center', $row );
					?>
					</div>
				<?php } ?>
				</div>
			<?php } ?>
			<?php if ( $helper::column_has_items( 'center', $row ) ) { ?>
				<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-center site-footer-section kmt-flex site-footer-section-center">
				<?php
				/**
				 * Kemet Render Footer  Column
				 */
				do_action( 'kemet_render_footer_column', 'center', $row );
				?>
				</div>
			<?php } ?>
			<?php if ( $has_sides || $helper::column_has_items( 'right_center', $row ) ) { ?>
				<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-right site-footer-section kmt-flex site-footer-section-right kmt-grid-right-section">
				<?php if ( $helper::column_has_items( 'right_center', $row ) && $helper::column_has_items( 'center', $row ) ) { ?>
					<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-right-center site-footer-section kmt-flex kmt-grid-right-center-section">
					<?php
					/**
					 * Kemet Render Footer Column
					 */
					do_action( 'kemet_render_footer_column', 'right_center', $row );
					?>
					</div>
				<?php } ?>
				<?php
				/**
				 * Kemet Render Footer Column
				 */
				do_action( 'kemet_render_footer_column', 'right', $row );
				?>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
