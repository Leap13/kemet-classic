<?php
/**
 * Template part for displaying the a row of the footer
 *
 * @package Kemet
 */

$row            = get_query_var( 'row' );
$columns        = kemet_get_option( $row . '-footer-columns' );
$desktop_layout = kemet_get_sub_option( $row . '-footer-layout', 'desktop' );
$tablet_layout  = kemet_get_sub_option( $row . '-footer-layout', 'tablet' );
$mobile_layout  = kemet_get_sub_option( $row . '-footer-layout', 'mobile' );

$classes     = array(
	'site-' . esc_attr( $row ) . '-footer-wrap',
	'kmt-builder-grid-row-container',
);
$row_classes = array(
	'row-columns-' . $columns,
	'row-layout-' . esc_attr( $desktop_layout ),
	'row-layout-tablet-' . esc_attr( $tablet_layout ),
	'row-layout-mobile-' . esc_attr( $mobile_layout ),
);
$zone        = 0;
?>

<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="kmt-builder-grid-row-container-inner">
		<div class="site-<?php echo esc_attr( $row ); ?>-footer-inner-wrap kmt-grid-row <?php echo esc_attr( implode( ' ', $row_classes ) ); ?>">
			<?php while ( $zone++ < $columns ) { ?>
				<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-<?php echo esc_attr( $zone ); ?> site-footer-section">
				<?php
				/**
				 * Kemet Render Footer Column
				 *
				 * Hooked kemet_render_footer_column
				 */
				do_action( 'kemet_render_footer_column', $row, $zone );
				?>
				</div>
			<?php } ?>
		</div>
	</div> 
</div>
