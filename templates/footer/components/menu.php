<?php
/**
 * Template part for displaying the footer menu
 *
 * @package kemet
 */

$slug = wp_parse_args(
	$args,
	array(
		'type' => 'footer-menu',
	)
);
$slug = $slug['type'];
?>
<div class="kmt-footer-item kmt-footer-item-menu kmt-item-focus" data-section="section-<?php echo esc_attr( $slug ); ?>">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Footer Menu
	 *
	 * Hooked kemet_footer_menu
	 */
	do_action( 'kemet_footer_menu', $slug );
	?>
</div>
