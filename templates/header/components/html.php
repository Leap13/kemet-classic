<?php
/**
 * Template part for displaying the header html
 *
 * @package kemet
 */

$html = wp_parse_args(
	$args,
	array(
		'type' => 'header-html-1',
	)
);
$html = $html['type'];
?>
<div class="kmt-header-item kmt-<?php echo esc_attr( $html ); ?>-item kmt-item-focus" data-section="section-<?php echo esc_attr( $html ); ?>">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Html
	 *
	 * Hooked kemet_header_html
	 */
	do_action( 'kemet_header_html', $html );
	?>
</div>
