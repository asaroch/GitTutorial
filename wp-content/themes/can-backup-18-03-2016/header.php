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
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<header>
			<div class="water-mark-image"></div>
			<nav class="navbar" role="navigation">
			<div class="utilityNavigation hidden-xs">
				<div class="collapse navbar-collapse2">		    	
			     	<?php 
					// Call utility header
					$args = array( 'menu' => 'Utility Navigation' , 'menu_class' => 'nav navbar-nav navbar-right' , 'container' => false  ); 
					wp_nav_menu ( $args ); ?>		
			   </div>  
			</div>
		  	<div class="container-fluid">			  	
		  		<div id="main_navigationbar" class="row primary-nav">  	
				    <div class="navbar-header ">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a href="#" title="CANCAPITAL" class="navbar-brand" href="<?php echo site_url(); ?>"> <img src="<?php echo get_template_directory_uri (); ?>/images/CAN-logo.png" alt="CAN CAPITAL LOGO"> </a>
				    </div>
				    <div class="collapse navbar-collapse mob-main-menu">
				    	<div class="row visible-xs">
				    		<div class="col-xs-12">		    		
			        			<div class="col-xs-6"><p>Main Menu</p></div>
			        			<div class="col-xs-6"><button class="glyphicon glyphicon-remove btn-close-menu pull-right"></button></div>
			        		</div>
				        </div>		    	  
				      	<?php 
						// Call header main menu
						$args = array( 'menu' => 'header menu' , 'menu_class' => 'nav navbar-nav navbar-right' , 'container' => false , 'submenu_class' => 'dropdown-menu' ); 
						wp_nav_menu ( $args ); ?>	
				    </div><!-- /.navbar-collapse -->
				</div>
				<div class="top-heading">Get the <strong>working</strong> capital you need</div>
			    <span class="down-arrow"></span>	
			</div><!-- /.container-fluid -->		  
			</nav>
		</header>