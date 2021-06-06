<?php
/**
 * Template part for displaying the a row of the header
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

$bar_classes = apply_filters( 'kemet_header_' . $row . '_row_classes', array_map( 'sanitize_html_class', array() ) );
?>

<div class="kmt-<?php echo esc_attr( $row ); ?>-header-wrap">
	<div class="<?php echo esc_attr( $row ); ?>-header-bar <?php echo esc_attr( join( ' ', $bar_classes ) ); ?>">
		<div class="site-<?php echo esc_attr( $row ); ?>-header-wrap kmt-builder-grid-row-container kmt-container section-header-<?php echo esc_attr( $row ); ?>">
			<div class="kmt-grid-row <?php echo esc_attr( join( ' ', $classes ) ); ?>">
			<?php
			if ( $has_sides || $helper::column_has_items( 'left_center', $row ) ) {
				?>
				<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left site-header-section kmt-flex site-header-section-left">
				<?php
				/**
				 * Kemet Render Header Column
				 */
				do_action( 'kemet_render_header_column', 'left', $row );
				?>
				<?php if ( $helper::column_has_items( 'left_center', $row ) && $helper::column_has_items( 'center', $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left-center site-header-section kmt-flex kmt-grid-left-center-section">
					<?php
					/**
					 * Kemet Render Header Column
					 */
					do_action( 'kemet_render_header_column', 'left_center', $row );
					?>
					</div>
				<?php } ?>
				</div>
			<?php } ?>
			<?php if ( $helper::column_has_items( 'center', $row ) ) { ?>
				<div class="site-header-<?php echo esc_attr( $row ); ?>-section-center site-header-section kmt-flex site-header-section-center">
				<?php
				/**
				 * Kemet Render Header Column
				 */
				do_action( 'kemet_render_header_column', 'center', $row );
				?>
				</div>
			<?php } ?>
			<?php if ( $has_sides || $helper::column_has_items( 'right_center', $row ) ) { ?>
				<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right site-header-section kmt-flex site-header-section-right kmt-grid-right-section">
				<?php if ( $helper::column_has_items( 'right_center', $row ) && $helper::column_has_items( 'center', $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right-center site-header-section kmt-flex kmt-grid-right-center-section">
					<?php
					/**
					 * Kemet Render Header Column
					 */
					do_action( 'kemet_render_header_column', 'right_center', $row );
					?>
					</div>
				<?php } ?>
				<?php
				/**
				 * Kemet Render Header Column
				 */
				do_action( 'kemet_render_header_column', 'right', $row );
				?>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
