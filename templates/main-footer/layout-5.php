<?php
/**
 * Footer Layout 6
 *
 * @package Kemet Addon
 * @since   Kemet 1.0.0
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
		! is_active_sidebar( 'main-footer-widget-2' ) &&
		! is_active_sidebar( 'main-footer-widget-3' ) &&
		! is_active_sidebar( 'main-footer-widget-4' )
	) {
		return;
	}
}

$classes[] = 'footer-adv';
$classes[] = 'footer-adv-layout-6';
$classes   = implode( ' ', $classes );
?>

<div class="<?php echo esc_attr( $classes ); ?>">
	<div class="footer-adv-overlay">
		<div class="kmt-container">
			<div class="kmt-row">
				<div class="kmt-col-lg-12 kmt-col-md-12 kmt-col-sm-12 kmt-col-xs-12 footer-adv-widget footer-adv-widget-1">
					<?php kemet_get_footer_widget( 'main-footer-widget-1' ); ?>
                </div>
            </div>
            <div class="kmt-row">
				<div class="kmt-col-lg-4 kmt-col-md-4 kmt-col-sm-12 kmt-col-xs-12 footer-adv-widget footer-adv-widget-2">
					<?php kemet_get_footer_widget( 'main-footer-widget-2' ); ?>
				</div>
				<div class="kmt-col-lg-4 kmt-col-md-4 kmt-col-sm-12 kmt-col-xs-12 footer-adv-widget footer-adv-widget-3">
					<?php kemet_get_footer_widget( 'main-footer-widget-3' ); ?>
				</div>
				<div class="kmt-col-lg-4 kmt-col-md-4 kmt-col-sm-12 kmt-col-xs-12 footer-adv-widget footer-adv-widget-4">
					<?php kemet_get_footer_widget( 'main-footer-widget-4' ); ?>
				</div>
			</div><!-- .kmt-row -->
		</div><!-- .kmt-container -->
	</div><!-- .footer-adv-overlay-->
</div><!-- .kmt-theme-footer .footer-adv-layout-6 -->
