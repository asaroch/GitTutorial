<?php
/*
  Template Name: compaign-landing
 */
get_header('landing');

$page_id = get_the_ID();
global $post;
?>

<!--Financial Products -->
<section  id="compaign_boarding_alt" class="gradient-one">
    <div class="container">
        <div class="financial-product-item">
            <?php
            $campaign_logo = get_post_meta(get_the_ID(), 'wpcf-campaign-logo-upload', true);
                      
            if (isset($campaign_logo) && ($campaign_logo != "")):
                ?>
                <div class="category-icon"> 
                   <img src="<?php echo $campaign_logo; ?>" alt="Campaign logo">
                </div>
                <?php
            endif;
            ?>
            <h5 class="section-heading"><?php echo get_the_title(); ?></h5>
            <?php if (have_posts()) : the_post(); ?>
                <p><?php echo the_content(); ?></b></p>  
            <?php endif; ?>                                       
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $compaign_topics = wp_get_post_terms(get_the_ID(), 'campaign-module', array("fields" => "names"));
            foreach ($compaign_topics as $key => $value):
                ?>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="loan-item">
                            <span class="glyphicon glyphicon-ok"> </span>
                            <p> <?php echo $value; ?> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php $learn_more = get_post_meta(get_the_ID(), 'wpcf-learn-more', true); ?>		
        </div>
        <div class="row text-center"><a class="btn btn-purple-style" href="<?php echo $learn_more; ?>"> LEARN MORE </a></div>
    </div>
    <!---to display trust badges-->
    <?php if (is_active_sidebar('trust-badge')) : ?>
        <div class="widget-area trust-badge" role="complementary">
            <?php dynamic_sidebar('trust-badge'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>	
    <!--trust badge widget ends here-->
</section>
</div>
<!--Financial Products -->
<!-- capital_comparison_chart section -->
<?php if (is_active_sidebar('can_capital_comparison_chart')) : ?>
    <div class="widget-area trust-badge" role="complementary">
        <?php dynamic_sidebar('can_capital_comparison_chart'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!-- capital_comparison_chart section -->
<!-- video tutorial merchant -->	
<!-- we bring you the best section -->
<?php if (is_active_sidebar('can_capital_video_testimonial')) : ?>
    <div class="widget-area video_testimonial" role="complementary">
        <?php dynamic_sidebar('can_capital_video_testimonial'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!-- video tutorial merchant -->
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