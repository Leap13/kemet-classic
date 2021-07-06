<?php
/**
 * Template part for displaying the a row of the header
 *
 * @package Kemet
 */

$row       = get_query_var( 'row' );
$helper    = new Kemet_Builder_Helper();
//$columns      = kemet_get_option( $option . '-footer-column' );
$zones = ""; 

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

<div class="kmt-<?php echo esc_attr( $row ); ?>-footer-wrap">hhhhhh
	<div class="<?php echo esc_attr( $row ); ?>-footer-bar <?php echo esc_attr( join( ' ', $bar_classes ) ); ?>">
		<div class="site-<?php echo esc_attr( $row ); ?>-footer-wrap kmt-builder-grid-row-container kmt-container section-footer-<?php echo esc_attr( $row ); ?>">
			<div class="kmt-grid-row <?php echo esc_attr( join( ' ', $classes ) ); ?>">
				<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-left site-footer-section kmt-flex">
					<div class="site-footer-<?php echo esc_attr( $row ); ?>-section site-footer-section kmt-flex kmt-grid-left-center-section">
					<?php
					/**
					 * Kemet Render Footer Column
					 */
					do_action( 'kemet_render_footer_column' , $row, $zones);
                        do_action( "kemet_footer_{$row}_container_before" );
						do_action( 'kemet_render_footer_column', $row, $zones );
                        ?>
                            <div class="kmt-builder-footer-grid-columns site-<?php echo esc_attr( $row ); ?>-footer-inner-wrap kmt-builder-grid-row">
                            <?php for ( $zones = 1; $zones <= KEMET_Builder_Helper::$num_of_footer_columns; $zones++ ) { ?>
                                <?php
                                if ( $zones > $columns ) {
                                    break;
                                }
                                ?>
                                <div class="site-footer-<?php echo esc_attr( $row ); ?>-section-<?php echo esc_attr( $zones ); ?> site-footer-section site-footer-section-<?php echo esc_attr( $zones ); ?>">
                                    <?php do_action( 'kemet_render_footer_column', $row, $zones ); ?>hiiii
                                </div>
								<?php }?>
                            </div>
                        <?php
                        /**
                         * Kemet Render before Site container of Footer.
                         */
                        do_action( "kemet_footer_{$row}_container_after" );
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
