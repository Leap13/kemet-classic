<?php
/**
 * Template part for displaying the a row of the footer
 *
 * @package Kemet Builder
 */




if ( Kemet_Builder_Helper::is_footer_row_empty( $row ) ) {

	$row = get_query_var( 'row' );
	$option       = ( 'top' === $row ) ? 'fbt' : ( ( 'bottom' === $row ) ? 'fbb' : 'fb' );
	//$option       = ( 'above' === $row ) ? 'hba' : ( ( 'below' === $row ) ? 'hbb' : 'hb' );
	$columns      = kemet_get_option( $option . '-footer-column' );
	$layout       = kemet_get_option( $option . '-footer-layout' );
	$stack_layout = kemet_get_option( $option . '-stack' );

	$desk_layout = ( isset( $layout['desktop'] ) ) ? $layout['desktop'] : 'full';
	$tab_layout  = ( isset( $layout['tablet'] ) ) ? $layout['tablet'] : 'full';
	$mob_layout  = ( isset( $layout['mobile'] ) ) ? $layout['mobile'] : 'full';

	$desk_stack_layout = ( isset( $stack_layout['desktop'] ) ) ? $stack_layout['desktop'] : 'stack';
	$tab_stack_layout  = ( isset( $stack_layout['tablet'] ) ) ? $stack_layout['tablet'] : 'stack';
	$mob_stack_layout  = ( isset( $stack_layout['mobile'] ) ) ? $stack_layout['mobile'] : 'stack';

	$classes = array(
		'site-' . esc_attr( $row ) . '-footer-wrap',
		'kmt-builder-grid-row-container',
		'site-footer-focus-item',
		'kmt-builder-grid-row-' . esc_attr( $desk_layout ),
		'kmt-builder-grid-row-tablet-' . esc_attr( $tab_layout ),
		'kmt-builder-grid-row-mobile-' . esc_attr( $mob_layout ),
		'kmt-footer-row-' . esc_attr( $desk_stack_layout ),
		'kmt-footer-row-tablet-' . esc_attr( $tab_stack_layout ),
		'kmt-footer-row-mobile-' . esc_attr( $mob_stack_layout ),
	);
	?>
<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-section="section-<?php echo esc_attr( $row ); ?>-footer-builder">
	<div class="kmt-builder-grid-row-container-inner">
		<?php

		/**
		 * Kemet Render before Site container of Footer.
		 */
		do_action( "kemet_footer_{$row}_container_before" );
		?>
			<div class="kmt-builder-footer-grid-columns site-<?php echo esc_attr( $row ); ?>-footer-inner-wrap kmt-builder-grid-row">
			<?php for ( $zones = 1; $zones <= Kemet_Footer_Markup::$num_of_footer_columns; $zones++ ) { ?>
				<?php
				if ( $zones > $columns ) {
					break;
				}
				?>
				<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-<?php echo esc_attr( $zones ); ?> site-footer-section site-footer-section-<?php echo esc_attr( $zones ); ?>">
					<h1>oooooooooo</h1>
					<?php do_action( 'kemet_render_footer_column', $row, $zones ); ?>
				</div>
			<?php } ?>
			</div>
		<?php
		/**
		 * Kemet Render before Site container of Footer.
		 */
		do_action( "kemet_footer_{$row}_container_after" );
		?>
	</div>

</div>
<?php } ?>
