<?php
/*
  Template Name: compaign-landing
 */
get_header('landing');

$page_id = get_the_ID();
// landing page The Query
$args = array('post_status' => 'publish',
    'post_type' => 'landing-page',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$landingpage = new WP_Query($args);
//prx($landingpage);
?>
<!--Financial Products -->
<?php if ($landingpage->have_posts()) : ?>
    <div class="container">
        <div id="slider_feature_product" class="owl-carousel owl-theme">
            <?php while ($landingpage->have_posts()) : $landingpage->the_post(); ?>
                <div class="item">
                    <div class="financial-product-item">
                        <?php
                        if (has_post_thumbnail(get_the_ID())):
                            ?>
                            <div class="category-icon"> 
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                            </div>
                            <?php
                        endif;
                        ?>
                        <h5><?php echo get_the_title(); ?></h5>
                        <p><?php echo get_the_excerpt(); ?></p>
                        <?php $learn_more = get_post_meta(get_the_ID(), 'wpcf-learn-more', true); ?>
                        <a href="<?php echo $learn_more; ?>" title="Learn more" class="learn-more-btn"> Learn more <i class="glyphicon glyphicon-play"></i></a>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
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
<?php endif; ?>	
<!-- capital_comparison_chart section -->
<?php if (is_active_sidebar('memberbenefit')) : ?>
    <div class="widget-area memberbenefit" role="complementary">
        <?php dynamic_sidebar('memberbenefit'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!-- video tutorial merchant -->	
<!-- we bring you the best section -->
<?php if (is_active_sidebar('can_capital_video_testimonial')) : ?>
    <div class="widget-area video_testimonial" role="complementary">
        <?php dynamic_sidebar('can_capital_video_testimonial'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!-- video tutorial merchant -->	
<!-- we bring you the best section -->
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> Get Funded </h2>
        <h3> Smart, Simple & Fast. </h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>