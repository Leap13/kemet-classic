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
<div class="kmt-header-item kmt-<?php echo esc_attr( $widget ); ?>-item builder-item-focus" data-section="<?php echo kemet_has_widget_editor() ? 'kemet-sidebar-widgets-' . $widget : 'sidebar-widgets-' . $widget; ?>">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Widget
	 *
	 * Hooked kemet_header_widget
	 */
	do_action( 'kemet_header_widget', $widget );
	?>
</div>
