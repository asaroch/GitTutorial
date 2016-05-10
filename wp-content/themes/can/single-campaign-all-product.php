<?php
/*
  Template Name: compaign-landing
 */
global $post;
get_header('landing');

$page_id = get_the_ID();
// landing page The Query
$args = array('post_status' => 'publish',
    'post_type' => 'landing-page',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$landingpage = new WP_Query($args);

$listings = new WP_Query();
$listings->query('post_type=video-testimonial&posts_per_page=-1&orderby=menu_order date&order=ASC');
?>
<!--Financial Products -->
<div  id="financial_product" class="gradient-one">
<?php if (is_active_sidebar('financial-product')) : ?>
        <div class="widget-area financial-product" role="complementary">
            <?php dynamic_sidebar('financial-product'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>
<!---to display trust badges-->
<?php if (is_active_sidebar('trust-badge')) : ?>
    <div class="widget-area trust-badge" role="complementary">
        <?php dynamic_sidebar('trust-badge'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!--trust badge widget ends here-->
</div>
<!--Financial Products -->
<!-- capital_comparison_chart section -->
<?php if (is_active_sidebar('can_capital_comparison_chart')) : ?>
    <div class="widget-area trust-badge" role="complementary">
        <?php dynamic_sidebar('can_capital_comparison_chart'); ?>
    </div><!-- .widget-area -->
<?php endif; 
wp_reset_postdata();
                    //wp_reset_query();
?>	
<!-- capital_comparison_chart section -->
<!-- community of success -->
<section id="success_community">
    <div class="container">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-headline', true); ?> </h2>
        <div class="owl-carousel owl-theme">
            <!--Display testimonials for merchants-->
            <?php
           
            if ($listings->found_posts > 0) {
                while ($listings->have_posts()) {
                    $listings->the_post();
                    ?>
                    <!--Testimonials ends here-->
                    <?php
                    $meta = get_post_meta($post->ID, '_fvp_video', true);
                    $id = settype($meta['id'],"integer");
                    $video = wp_get_attachment_url($id);
                    ?>
                    <div class="item">

                        <div class="video-player"> 

                            <a href="<?php echo $video; ?>" data-webm="<?php echo $video; ?>" class="html5lightbox"><?php echo get_the_post_thumbnail($post->ID, 'single-post-thumbnail'); ?><div class="video-play-icon"><i></i></div></a>

                        </div>

                        <p class="marchent-name"> <?php echo get_the_title(); ?> </p>
                        <p class="business-label"> <?php echo get_post_meta($post->ID, 'wpcf-business', true); ?> </p>
                        <p class="business-name"> <?php echo get_post_meta($post->ID, 'wpcf-video_topic', true); ?> </p>
                        <p class="success-description"> <?php echo get_the_content(); ?> </p>					
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="customNavigation visible-xs">
            <div class="text-center">
                <a title="prev" class="slide-prev"> <i class="glyphicon glyphicon-menu-left"></i></a>
                <span class="current-slider"> 1 </span>
                <span class="slider-ratio">/</span> 
                <span class="total-slider"> 16 </span>
                <a title="next" class="slide-next active"><i class="glyphicon glyphicon-menu-right"></i></a>
            </div>
        </div>
    </div>			
</section>
<!-- community of success -->
<?php if (is_active_sidebar('memberbenefit')) : ?>
    <div class="widget-area memberbenefit" role="complementary">
        <?php dynamic_sidebar('memberbenefit'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
	
<!-- we bring you the best section -->
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> Get Funded </h2>
        <h3> Smart, Simple & Fast. </h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>