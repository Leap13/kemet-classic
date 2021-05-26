<?php
/**
 * Template part for displaying the a components of the header
 *
 * @package Kemet
 */

$component_args = wp_parse_args(
	$args,
	array(
		'item' => '',
	)
);
$item           = $component_args['item'];
?>

<div><?php echo $item; ?></div>
