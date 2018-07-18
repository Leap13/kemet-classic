<?php
/**
 * Template for Small Footer Layout 2
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

$section_1 = kemet_get_small_footer( 'footer-sml-section-1' );
$section_2 = kemet_get_small_footer( 'footer-sml-section-2' );
$sections  = 0;

if ( '' != $section_1 ) {
	$sections++;
}

if ( '' != $section_2 ) {
	$sections++;
}

switch ( $sections ) {

	case '2':
			$section_class = 'ast-small-footer-section-equally ast-col-md-6 ast-col-xs-12';
		break;

	case '1':
	default:
			$section_class = 'ast-small-footer-section-equally ast-col-xs-12';
		break;
}

?>

<div class="kmt-small-footer footer-sml-layout-2">
	<div class="kmt-footer-overlay">
		<div class="kmt-container">
			<div class="kmt-small-footer-wrap" >
					<div class="kmt-row ast-flex">

					<?php if ( $section_1 ) : ?>
						<div class="kmt-small-footer-section ast-small-footer-section-1 <?php echo esc_attr( $section_class ); ?>" >
							<?php
								echo $section_1; // WPCS: XSS OK.
							?>
						</div>
				<?php endif; ?>

					<?php if ( $section_2 ) : ?>
						<div class="kmt-small-footer-section ast-small-footer-section-2 <?php echo esc_attr( $section_class ); ?>" >
							<?php
								echo $section_2; // WPCS: XSS OK.
							?>
						</div>
				<?php endif; ?>

					</div> <!-- .kmt-row.kmt-flex -->
			</div><!-- .kmt-small-footer-wrap -->
		</div><!-- .kmt-container -->
	</div><!-- .kmt-footer-overlay -->
</div><!-- .kmt-small-footer-->
