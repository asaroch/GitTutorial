<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/css/theme.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<div class="site-inner">
			<header id="masthead" class="site-header" role="banner">
				<div id="utilityNavigation" class='hidden-xs'><!-- utility navigation -->
				<nav class="navbar">
					<div class="container-fluid">
						<ul class="nav navbar-nav navbar-right">
						  <li><a href="#"> Help Center </a></li>
						  <li><a href="#"> Questions? Contact Us </a></li>
						  <li><a href="#"> Sign In </a></li> 
						</ul>
					</div>
				</nav>
			</div><!-- utility navigation -->
			<nav class="navbar navbar-default"> <!-- main navigation -->
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span> 
						</button>
						<a class="navbar-brand" href="#"> CAN Capital </a>
					</div>
					<div class="collapse navbar-collapse" id="mainNavigation">
						<ul class="nav navbar-nav navbar-right">
						  <li class="active"><a href="#"> Small Business Funding </a></li>
						  <li><a href="#"> How it Works </a></li>
						  <li><a href="#"> Resources </a></li> 
						  <li><a href="#"> Partners </a></li> 
						  <li><a href="#"> About Us </a></li> 
						  <li><a href="#"> Apply </a></li> 
						</ul>
					</div>	
				</div>
			</nav><!-- main navigation -->
			</header><!-- .site-header -->
			<div id="content" class="site-content">