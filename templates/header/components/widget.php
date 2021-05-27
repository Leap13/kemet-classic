<?php
/**
 * Template part for displaying the header widget
 *
 * @package kemet
 */

$widget = wp_parse_args(
	$args,
	array(
		'type' => 'widget-1',
	)
);
$widget = explode( 'widget-', $widget['type'] )[1];

?>
<div class="kmt-header-item kmt-header-item-<?php echo esc_attr( $widget ); ?>">
	<?php
	/**
	 * Kemet Header Widget
	 *
	 * Hooked kemet_header_widget
	 */
	do_action( 'kemet_header_widget', $widget );
	?>
</div>
