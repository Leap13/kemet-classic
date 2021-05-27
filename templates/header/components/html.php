<?php
/**
 * Template part for displaying the header html
 *
 * @package kemet
 */

$html = wp_parse_args(
	$args,
	array(
		'type' => 'html-1',
	)
);
$html = $html['type'];
?>
<div class="kmt-header-item kmt-header-item-<?php echo esc_attr( $html ); ?>">
	<?php
	/**
	 * Kemet Header Html
	 *
	 * Hooked kemet_header_html
	 */
	do_action( 'kemet_header_html', $html );
	?>
</div>
