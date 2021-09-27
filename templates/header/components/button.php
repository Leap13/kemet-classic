<?php
/**
 * Template part for displaying the header button
 *
 * @package kemet
 */

$button = wp_parse_args(
	$args,
	array(
		'type' => 'header-button-1',
	)
);
$button = $button['type'];
?>
<div class="kmt-header-item kmt-header-item-button kmt-item-focus" data-section="section-<?php echo esc_attr( $button ); ?>">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Button
	 *
	 * Hooked kemet_header_button
	 */
	do_action( 'kemet_header_button', $button );
	?>
</div>
