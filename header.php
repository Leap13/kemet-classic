<?php
/**
 * The header for Kemet Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kemet
 * @since 1.0.0
 */

?><!DOCTYPE html>
<?php kemet_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php kemet_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php kemet_head_bottom(); ?>
<?php wp_head(); ?>
</head>

<body <?php kemet_schema_body(); ?> <?php body_class(); ?>>

<?php kemet_body_top(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( kemet_default_strings( 'string-header-skip-link', false ) ); ?></a>

	<?php kemet_header_before(); ?>

	<?php kemet_header(); ?>

	<?php kemet_header_after(); ?>

	<?php kemet_content_before(); ?>

	<div id="content" class="site-content">

		<div class="kmt-container">

		<?php kemet_content_top(); ?>
