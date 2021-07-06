<?php
/**
 * Template part for displaying the footer html
 *
 * @package kemet
 */

$html = wp_parse_args(
	$args,
	array(
		'type' => 'footer-html-1',
	)
);
$html = $html['type'];
?>
<div class="kmt-footer-item kmt-<?php echo esc_attr( $html ); ?>-item">
	<?php
	/**
	 * Kemet Footer Html
	 *
	 * Hooked kemet_footer_html
	 */
	do_action( 'kemet_footer_html', $html );
	?>
</div>
