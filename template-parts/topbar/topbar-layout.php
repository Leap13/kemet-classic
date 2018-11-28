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

$section_1 = kemet_get_top_section( 'top-section-1' );
$section_2 = kemet_get_top_section( 'top-section-2' );

//$section_1 = kemet_get_option( 'kemet_get_topbar' );
//$section_2 = kemet_get_option( 'kemet_get_topbar' );
$sections  = 0;

 if ( '' != $section_1 ) {
 	$sections++;
 }

 if ( '' != $section_2 ) {
 	$sections++;
 }

// switch ( $sections ) {

// 	case '2':
// 			$section_class = 'kmt-topbar-section-equally kmt-col-md-6 kmt-col-xs-12';
// 		break;

// 	case '1':
// 	default:
// 			$section_class = 'kmt-topbar-section-equally kmt-col-xs-12';
// 		break;
// }
 if ( empty( $section_1 ) && empty( $section_2 ) ) {
	return;
}

?>

<div class="kmt-above-header-wrap kmt-above-header-1" >
	<div class="kmt-above-header">hhhh
		<div class="kmt-container">
			<div class="kmt-flex kmt-above-header-section-wrap">
					<div class="kmt-above-header-section kmt-above-header-section-1 kmt-flex kmt-justify-content-flex-start mt-topbar-section-equally kmt-col-md-6 kmt-col-xs-12<?php echo esc_attr( $section_class ); ?>-above-header" >
						<?php 
                                                       echo $section_1 ; 
						?>
					</div>

					<div class="kmt-above-header-section kmt-above-header-section-2 kmt-flex kmt-justify-content-flex-end mt-topbar-section-equally kmt-col-md-6 kmt-col-xs-12<?php echo esc_attr( $section_class ); ?>-above-header" >
						<?php
                                                  echo $section_2; 
						?>
					</div>
			</div>
		</div><!-- .kmt-container -->
	</div><!-- .kmt-above-header -->
</div><!-- .kmt-above-header-wrap -->