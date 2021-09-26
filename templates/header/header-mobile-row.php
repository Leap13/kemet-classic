<?php
/**
 * Template part for displaying the a row of the header
 *
 * @package Kemet
 */

$row = get_query_var( 'row' );
if ( Kemet_Header_Markup::is_empty_row( $row, 'mobile' ) ) {
	return;
}

$helper    = new Kemet_Builder_Helper();
$has_sides = $helper::column_has_items( 'left', $row, 'header', 'mobile' ) || $helper::column_has_items( 'right', $row, 'header', 'mobile' );
$classes   = array();
if ( $has_sides ) {
	$classes[] = 'kmt-has-sides-items';
} elseif ( ! ( $has_sides ) && $helper::column_has_items( 'center', $row, 'header', 'mobile' ) ) {
	$classes[] = 'kmt-has-center-items-only';
}
if ( $helper::column_has_items( 'center', $row, 'header', 'mobile' ) ) {
	$classes[] = 'kmt-has-center-items';
} else {
	$classes[] = 'kmt-on-center-items';
}

$classes     = array_map( 'sanitize_html_class', $classes );
$bar_classes = apply_filters( 'kemet_mobile_header_' . $row . '_row_classes', array_map( 'sanitize_html_class', array() ) );
$layout      = kemet_get_option( $row . '-header-layout' );
?>

<div class="kmt-<?php echo esc_attr( $row ); ?>-header-wrap site-builder-focus-item" data-section="section-<?php echo esc_attr( $row ); ?>-header-builder">
<?php Kemet_Builder_Helper::customizer_row_edit_link(); ?>
	<div class="<?php echo esc_attr( $row ); ?>-header-bar <?php echo esc_attr( join( ' ', $bar_classes ) ); ?>">
		<div class="site-<?php echo esc_attr( $row ); ?>-header-wrap kmt-builder-grid-row-container kmt-container section-header-<?php echo esc_attr( $row ); ?>">
			<div class="<?php echo esc_attr( $row ); ?>-header-inner<?php echo ( 'stretched' === $layout || 'boxed' === $layout ) ? ' header-bar-content' : ''; ?>">
				<div class="kmt-grid-row <?php echo esc_attr( join( ' ', $classes ) ); ?>">
				<?php
				if ( $has_sides ) {
					?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left site-header-section kmt-flex site-header-section-left">
					<?php
					/**
					 * Kemet Render Header Column
					 */
					do_action( 'kemet_render_mobile_header_column', 'left', $row );
					?>
					</div>
				<?php } ?>
				<?php if ( $helper::column_has_items( 'center', $row, 'header', 'mobile' ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-center site-header-section kmt-flex site-header-section-center">
					<?php
					/**
					 * Kemet Render Header Column
					 */
					do_action( 'kemet_render_mobile_header_column', 'center', $row );
					?>
					</div>
				<?php } ?>
				<?php
				if ( $has_sides ) {
					?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right site-header-section kmt-flex site-header-section-right kmt-grid-right-section">
					<?php
					/**
					 * Kemet Render Header Column
					 */
					do_action( 'kemet_render_mobile_header_column', 'right', $row );
					?>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
