<?php
/**
 * Template part for displaying the header button
 *
 * @package kemet
 */

$button = wp_parse_args(
	$args,
	array(
		'type' => 'header-mobile-button-1',
	)
);
$button = $button['type'];
?>
<div class="kmt-header-item kmt-mobile-button-item builder-item-focus" data-section="section-mobile-toggle-button">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Button
	 *
	 * Hooked kemet_header_mobile_button
	 */
	do_action( 'kemet_header_mobile_button', $button );
	?>
</div>
