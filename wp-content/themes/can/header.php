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
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php 
        global $show_more_limit;
        $show_more_limit = get_option('posts_per_page'); ?>
        <div class="wrapper">
            <?php
            if (is_front_page()) {
                ?>
                <div class="water-mark-image"></div>
                <?php
            }
            ?>
            <nav class="navbar" role="navigation">
                <div class="utility-navigation hidden-xs">
                    <div class="container">
                        <div class="collapse navbar-collapse2">		    	
                            <?php
                            // Call utility header
                            $args = array('menu' => 'Utility Navigation', 'menu_class' => 'nav navbar-nav navbar-right', 'container' => false);
                            wp_nav_menu($args);
                            ?>	
                        </div>
                    </div>  
                </div>
                <div id="main_navigationbar" class="primary-nav">
                    <div class="container">
                        <div class="navbar-header ">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="navbar-brand"><img src="<?php echo get_header_image(); ?>" /></a>
                        </div>
                        <div class="collapse navbar-collapse mob-main-menu">
                            <div class="row visible-xs">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="row">
                                            <p class='label-main-menu'>Main Menu</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="row">
                                            <button class="btn-close-menu pull-right"  data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>		    	  
                            <?php
                            // Call header main menu
                            $args = array('menu' => 'header menu', 'menu_class' => 'nav navbar-nav navbar-right', 'container' => false, 'submenu_class' => 'dropdown-menu');
                            wp_nav_menu($args);
                            ?>	
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
                <?php 
               $top_headline = get_post_meta($post->ID,'wpcf-page-headline-title', true);
                ?>
                <div class="container">
                    <div class="top-heading"><?php echo $top_headline; ?><button class="glyphicon glyphicon-search search-btn visible-xs"></button>
                    </div>	
                </div><!-- /.container-fluid -->		  
            </nav>
            <?php
            if (!is_front_page()) {
                ?>
                <div id="get_quote">
                    <div id="form_box" class="gradient-one get-Quote-form">
                        <div class="container">	
                            <span class="down-arrow"></span>
                            <h2 class="section-heading"> Get Your Quote </h2>
                            <form class="" role="form">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control" placeholder="Email ID">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control" placeholder="Email ID">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control" placeholder="Email ID">
                                            </div>
                                        </div>
                                    </div>	
                                    <div class="col-sm-2 border-left">
                                        <button type="submit" class="btn btn-blue-bg action-btn"> GET STARTED 
                                            <i class="glyphicon glyphicon-play"></i>
                                        </button>					    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>