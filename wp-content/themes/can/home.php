<?php
/*
  Template Name: Home
 */
get_header();
global $post;
?>
<!--Financial Products -->
<div  id="financial_product" class="gradient-one">
    <div id="home_get_quote">
        <div id="get_quote_home" class="gradient-one get-Quote-form">
            <?php echo get_template_part('get-quick-quote'); ?>
        </div>
    </div>
    <?php if (is_active_sidebar('financial-product')) : ?>
        <div class="widget-area financial-product" role="complementary">
            <?php dynamic_sidebar('financial-product'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>

    <!---to display trust badges-->
    
    <?php if (is_active_sidebar('trust-badge')) : ?>
        <div class="widget-area trust-badge" role="complementary">
            <div class="container">
            <?php dynamic_sidebar('trust-badge'); ?>
            </div>
        </div><!-- .widget-area -->
    <?php endif; ?>	
    <!--trust badge widget ends here-->

</div>
<!--Financial Products -->

<!-- Testimonial section -->
<?php if (is_active_sidebar('testimonial')) : ?>
    <div class="widget-area testimonial" role="complementary">
        <?php dynamic_sidebar('testimonial'); ?>
    </div><!-- .widget-area -->
<?php endif;
 
// History of funding
$history_funding = get_post_meta($post->ID, 'wpcf-history-of-funding', true); 
$history_funding_button = get_post_meta($post->ID, 'wpcf-button-text', true); 
if ( $history_funding != '' ) { ?>
<section  id="about_us" class="gradient-two">
    <div class="container text-center">
       <p><?php echo get_post_meta($post->ID, 'wpcf-history-of-funding', true); ?></p>
       <a href="<?php echo get_the_permalink(208); ?>" title="ABOUT US"  class="btn btn-purple-style"><?php echo $history_funding_button; ?></a>
    </div>
</section>
    <?php
}
?>
<section id="ratting_others">
    <div class="container">
        <h2 class="section-heading">See what others are saying</h2>
        <div class="col-md-3 col-sm-3 average-ratting">
            <h3 class="overall-ratting"> Great </h3>
            <div class="star-overall">
                <ul>
                    <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                    <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                    <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                    <li class="icon-sprite"> <a href="javascript:void(0)"></a></li>
                    <li class="icon-sprite"> <a href="javascript:void(0)"></a></li>
                </ul>

            </div>
            <p>Based on <strong>211</strong> reviews<br> See some of the reviews here.</p>
            <div class="trust-pilot">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home/brand_image.jpg" alt="Trustpilot"/>
            </div>
        </div>
        <div class="col-md-9 col-sm-9">

            <div id="user_rettings_slider" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="user-ratting">  
                        <ul>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite"> <a href="javascript:void(0)"></a></li>
                        </ul>
                        <span class="date-time-label"> 20 Hour's ago</span>
                    </div>
                    <h3 class="rating-heading"> Beautiful result non </h3>
                    <p class="ratting-description"> Lorem ipsum dollar emet Lorem ipsum dollar emet </p>
                    <p class="ratting-user"> Barbara</p>
                </div>
                <div class="item">
                    <div class="user-ratting">  
                        <ul>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite"> <a href="javascript:void(0)"></a></li>
                        </ul>
                        <span class="date-time-label"> 20 Hour's ago</span>
                    </div>
                    <h3 class="rating-heading"> Beautiful result non </h3>
                    <p class="ratting-description"> Lorem ipsum dollar emet Lorem ipsum dollar emet </p>
                    <p class="ratting-user"> Barbara</p>
                </div>
                <div class="item">
                    <div class="user-ratting">  
                        <ul>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite"> <a href="javascript:void(0)"></a></li>
                        </ul>
                        <span class="date-time-label"> 20 Hour's ago</span>
                    </div>
                    <h3 class="rating-heading"> Beautiful result non </h3>
                    <p class="ratting-description"> Lorem ipsum dollar emet Lorem ipsum dollar emet </p>
                    <p class="ratting-user"> Barbara</p>
                </div>
                <div class="item">
                    <div class="user-ratting">  
                        <ul>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite active"> <a href="javascript:void(0)"></a></li>
                            <li class="icon-sprite"> <a href="javascript:void(0)"></a></li>
                        </ul>
                        <span class="date-time-label"> 20 Hour's ago</span>
                    </div>
                    <h3 class="rating-heading"> Beautiful result non </h3>
                    <p class="ratting-description"> Lorem ipsum dollar emet Lorem ipsum dollar emet </p>
                    <p class="ratting-user"> Barbara</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo get_template_part('resources_all'); ?> 

<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
        <h3> <?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>

