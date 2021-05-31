<?php
/**
 * Template part for displaying the header widget
 *
 * @package kemet
 */

$widget = wp_parse_args(
	$args,
	array(
		'type' => 'header-widget-1',
	)
);

$widget = $widget['type'];
?>
<div class="kmt-header-item kmt-<?php echo esc_attr( $widget ); ?>-item">
	<?php
	/**
	 * Kemet Header Widget
	 *
	 * Hooked kemet_header_widget
	 */
	do_action( 'kemet_header_widget', $widget );
	?>
</div>
