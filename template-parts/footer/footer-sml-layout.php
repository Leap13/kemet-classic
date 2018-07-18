<?php
/**
 * Template for Small Footer Layout 1
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

$section_1 = kemet_get_small_footer( 'footer-sml-section-1' );
$section_2 = kemet_get_small_footer( 'footer-sml-section-2' );

?>

<div class="ast-small-footer footer-sml-layout-1">
	<div class="ast-footer-overlay">
		<div class="ast-container">
			<div class="ast-small-footer-wrap" >
				<?php if ( $section_1 ) : ?>
					<div class="ast-small-footer-section ast-small-footer-section-1" >
						<?php
							echo $section_1; // WPCS: XSS OK.
						?>
					</div>
				<?php endif; ?>

				<?php if ( $section_2 ) : ?>
					<div class="ast-small-footer-section ast-small-footer-section-2" >
						<?php
							echo $section_2; // WPCS: XSS OK.
						?>
					</div>
				<?php endif; ?>

			</div><!-- .ast-row .ast-small-footer-wrap -->
		</div><!-- .kmt-container -->
	</div><!-- .ast-footer-overlay -->
</div><!-- .ast-small-footer-->
