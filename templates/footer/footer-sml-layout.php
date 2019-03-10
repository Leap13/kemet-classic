<?php
/**
 * Template for Small Footer Layout 1
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

$section_1 = kemet_get_small_footer( 'footer-sml-section-1' );
$section_2 = kemet_get_small_footer( 'footer-sml-section-2' );

?>

<div class="kmt-small-footer footer-sml-layout-1">
	<div class="kmt-footer-overlay">
		<div class="kmt-container">
			<div class="kmt-small-footer-wrap" >
				<?php if ( $section_1 ) : ?>
					<div class="kmt-small-footer-section kmt-small-footer-section-1" >
                        <?php echo '<div class="kmt-flex">' . $section_1 . '</div>'; ?>
					</div>
				<?php endif; ?>

				<?php if ( $section_2 ) : ?>
					<div class="kmt-small-footer-section kmt-small-footer-section-2" >
						<?php echo '<div class="kmt-flex">' . $section_2 . '</div>'; ?>
					</div>
				<?php endif; ?>

			</div><!-- .kmt-row .kmt-small-footer-wrap -->
		</div><!-- .kmt-container -->
	</div><!-- .kmt-footer-overlay -->
</div><!-- .kmt-small-footer-->
