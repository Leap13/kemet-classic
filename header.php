<?php
/**
 * The header for Kemet Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kemet
 * 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php kemet_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php kemet_schema_body(); ?> <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( kemet_default_strings( 'string-header-skip-link', false ) ); ?></a>

	<?php kemet_header(); ?>

	<div id="content" class="site-content">

		<div class="kmt-container">
