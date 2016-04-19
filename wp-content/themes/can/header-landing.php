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
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php
        global $show_more_limit;
        $show_more_limit = get_option('posts_per_page');
        ?>
        <div class="wrapper">
            <div class="water-mark-image"></div>               
            <nav class="navbar" role="navigation" id="compaign-header">
                <div id="main_navigationbar" class="primary-nav">
                    <div class="container">
                        <div class="navbar-header ">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="navbar-brand" title="CAN CAPITAL"><img src="<?php echo get_header_image(); ?>" /></a> <p class="entrepreneur">Entrepreneur</p> </a><a title="CANCAPITAL" href="#" class="sub-logo"> 
                        <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                        <div class="category-icon"> 
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                        </a>
                        </div>
                        <div class="collapse navbar-collapse mob-main-menu">
                            <div class="row visible-xs">
                                <div class="col-xs-12 mob-style">
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
                            <ul class="nav navbar-nav navbar-right">		        	
                                <li class="text-center"><a href="#" title="APPLY NOW" class="apply-btn btn btn-blue-bg">APPLY NOW <i class="glyphicon glyphicon-play"></i></a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>  
                </div>
                <?php
                $top_headline = get_post_meta($post->ID, 'wpcf-page-headline-title', true);
                ?>
                <div class="container">
                    <h1><?php echo $top_headline; ?>
                </div>
                <!-- /.container-fluid -->		  
            </nav>
            <div  id="financial_product" class="gradient-one">
                <div id="get_quote">
                    <div id="form_box" class="gradient-one get-Quote-form">
                        <div class="container">	
                            <span class="down-arrow"></span>
                            <h2 class="section-heading"> Get Your Quote </h2>
                            <?php echo do_shortcode('[contact-form-7 id="315" title="Contact form 1"]'); ?>
                        </div>
                    </div>
                </div>

