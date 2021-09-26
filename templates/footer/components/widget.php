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
<div class="kmt-footer-item kmt-<?php echo esc_attr( $widget ); ?>-item builder-item-focus" data-section="<?php echo kemet_has_widget_editor() ? 'kemet-sidebar-widgets-' . $widget : 'sidebar-widgets-' . $widget; ?>">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Widget
	 *
	 * Hooked kemet_footer_widget
	 */
	do_action( 'kemet_footer_widget', $widget );
	?>
</div>
