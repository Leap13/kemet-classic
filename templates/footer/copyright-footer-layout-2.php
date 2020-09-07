<?php
/**
 * Template for Small Footer Layout 2
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

$section_1 = wiz_get_copyright_footer( 'footer-copyright-section-1' );
$section_2 = wiz_get_copyright_footer( 'footer-copyright-section-2' );
$sections  = 0;

if ( '' != $section_1 ) {
	$sections++;
}

if ( '' != $section_2 ) {
	$sections++;
}

switch ( $sections ) {

	case '2':
			$section_class = 'wiz-footer-copyright-section-equally wiz-col-md-6 wiz-col-xs-12';
		break;

	case '1':
	default:
			$section_class = 'wiz-footer-copyright-section-equally wiz-col-xs-12';
		break;
}

?>

<div class="wiz-footer-copyright copyright-footer-layout-2">
	<div class="wiz-footer-copyright-content">
		<div class="wiz-container">
			<div class="wiz-footer-copyright-wrap" >
					<div class="wiz-row wiz-flex">

					<?php if ( $section_1 ) : ?>
						<div class="wiz-footer-copyright-section wiz-footer-copyright-section-1 <?php echo esc_attr( $section_class ); ?>" >
							<?php echo $section_1; ?>
						</div>
				<?php endif; ?>

					<?php if ( $section_2 ) : ?>
						<div class="wiz-footer-copyright-section wiz-footer-copyright-section-2 <?php echo esc_attr( $section_class ); ?>" >
							<?php echo $section_2; ?>
						</div>
				<?php endif; ?>

					</div> <!-- .wiz-row.wiz-flex -->
			</div><!-- .wiz-footer-copyright-wrap -->
		</div><!-- .wiz-container -->
	</div><!-- .wiz-footer-copyright-content -->
</div><!-- .wiz-footer-copyright-->
