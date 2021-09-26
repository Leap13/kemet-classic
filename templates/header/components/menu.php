<?php
/**
 * Template part for displaying the header menu
 *
 * @package kemet
 */

$slug = wp_parse_args(
	$args,
	array(
		'type' => 'primary-menu',
	)
);
$slug = $slug['type'];
?>
<div class="kmt-header-item kmt-header-item-menu builder-item-focus" data-section="section-header-<?php echo esc_attr( $slug ); ?>">
	<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
	<?php
	/**
	 * Kemet Header Menu
	 *
	 * Hooked kemet_header_menu
	 */
	do_action( 'kemet_header_menu', $slug );
	?>
</div>
