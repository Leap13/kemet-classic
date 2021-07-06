<?php
/**
 * Template part for displaying the footer widget
 *
 * @package kemet
 */

$widget = wp_parse_args(
	$args,
	array(
		'type' => 'footer-widget-1',
	)
);

$widget = $widget['type'];
?>
<div class="kmt-footer-item kmt-<?php echo esc_attr( $widget ); ?>-item">
	<?php
	/**
	 * Kemet Footer Widget
	 *
	 * Hooked kemet_footer_widget
	 */
	echo 'widgeeeeet';
	do_action( 'kemet_footer_widget', $widget );
	echo 'widgeeeeet';
	?>
</div>
