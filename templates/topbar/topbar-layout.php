<?php
/**
 * Template for Small Footer Layout 2
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

$section_1 = kemet_get_top_section( 'top-section-1' );
$section_2 = kemet_get_top_section( 'top-section-2' );

$sections  = 0;

 if ( '' != $section_1 ) {
 	$sections++;
 }

 if ( '' != $section_2 ) {
 	$sections++;
 }

 switch ( $sections ) {

 	case '2':
 			$section_class = 'kmt-topbar-section kmt-col-md-6 kmt-col-xs-12';
 		break;

 	case '1':
 	default:
 			$section_class = 'kmt-topbar-section kmt-col-xs-12';
 		break;
 }
 if ( empty( $section_1 ) && empty( $section_2 ) ) {
	return;
}

?>

<div class="kemet-top-header-wrap kemet-top-header-1" >
	<div class="kemet-top-header">
		<div class="kmt-container">
			<div class="kmt-flex kemet-top-header-section-wrap">
					<div class="kemet-top-header-section kemet-top-header-section-1 kmt-flex kmt-justify-content-flex-start mt-topbar-section-equally kmt-col-md-6 kmt-col-xs-12<?php echo esc_attr( $section_class ); ?>-above-header" >
						<?php echo '<div class="kmt-flex">'.$section_1.'</div>'; ?>
					</div>

					<div class="kemet-top-header-section kemet-top-header-section-2 kmt-flex kmt-justify-content-flex-end mt-topbar-section-equally kmt-col-md-6 kmt-col-xs-12<?php echo esc_attr( $section_class ); ?>-above-header" >
						<?php echo '<div class="kmt-flex">'.$section_2.'</div>'; ?>
					</div>
			</div>
		</div><!-- .kmt-container -->
	</div><!-- .kemet-top-header -->
</div><!-- .kemet-top-header-wrap -->