<?php
/**
 * Template for Footer Copyright Layout 1
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

$section_1 = wiz_get_copyright_footer( 'footer-copyright-section-1' );
$section_2 = wiz_get_copyright_footer( 'footer-copyright-section-2' );

?>

<div class="wiz-footer-copyright copyright-footer-layout-1">
	<div class="wiz-footer-copyright-content">
		<div class="wiz-container">
			<div class="wiz-footer-copyright-wrap" >
				<?php if ( $section_1 ) : ?>
					<div class="wiz-footer-copyright-section wiz-footer-copyright-section-1" >
                        <?php echo $section_1; ?>
					</div>
				<?php endif; ?>

				<?php if ( $section_2 ) : ?>
					<div class="wiz-footer-copyright-section wiz-footer-copyright-section-2" >
						<?php echo $section_2; ?>
					</div>
				<?php endif; ?>

			</div><!-- .wiz-row .wiz-footer-copyright-wrap -->
		</div><!-- .wiz-container -->
	</div><!-- .wiz-footer-copyright-content -->
</div><!-- .wiz-footer-copyright-->
