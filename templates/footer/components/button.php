<?php
/**
 * Template part for displaying the footer button
 *
 * @package kemet
 */

$button = wp_parse_args(
	$args,
	array(
		'type' => 'footer-button-1',
	)
);
$button = $button['type'];
?>
<div class="kmt-footer-item kmt-footer-item-button">
	<?php
	/**
	 * Kemet Footer Button
	 *
	 * Hooked kemet_footer_button
	 */
	do_action( 'kemet_footer_button', $button );
	?>
</div>
