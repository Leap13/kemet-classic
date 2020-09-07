<?php
/**
 * Footer Layout 2
 *
 * @since   Wiz 1.0.0
 */

/**
 * Hide main footer markup if:
 *
 * - User is not logged in. [AND]
 * - All widgets are not active.
 */
if ( ! is_user_logged_in() ) {
	if (
		! is_active_sidebar( 'main-footer-widget-1' ) &&
		! is_active_sidebar( 'main-footer-widget-2' ) 
	) {
		return;
	}
}

$classes[] = 'wiz-footer';
$classes[] = 'wiz-footer-layout-2';
if(wiz_get_option('enable-footer-content-center')) {
	$classes[] = 'wiz-footer-align-center';
}
$classes   = implode( ' ', $classes );
?>

<div class="<?php echo esc_attr( $classes ); ?>">
	<div class="wiz-footer-overlay">
		<div class="wiz-container">
			<div class="wiz-row">
				<div class="wiz-col-lg-6 wiz-col-md-6 wiz-col-sm-12 wiz-col-xs-12 wiz-footer-widget wiz-footer-widget-1">
					<?php wiz_get_footer_widget( 'main-footer-widget-1' ); ?>
				</div>
				<div class="wiz-col-lg-6 wiz-col-md-6 wiz-col-sm-12 wiz-col-xs-12 wiz-footer-widget wiz-footer-widget-2">
					<?php wiz_get_footer_widget( 'main-footer-widget-2' ); ?>
				</div>
			</div><!-- .wiz-row -->
		</div><!-- .wiz-container -->
	</div><!-- .wiz-footer-overlay-->
</div><!-- .wiz-theme-footer .wiz-footer-layout-2 -->
