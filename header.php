<?php
/**
 * The header for Wiz Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wiz
 * 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wiz_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php wiz_schema_body(); ?> <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( wiz_theme_strings( 'string-header-skip-link', false ) ); ?></a>
    
    <?php wiz_before_header_block(); ?>

	<?php wiz_header(); ?>
    
    <?php wiz_after_header_block(); ?>

	<div id="content" class="site-content">

		<div class="wiz-container">
