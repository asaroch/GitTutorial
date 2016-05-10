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
<?php
/*
  Template Name: compaign-landing
 */
get_header('landing');

$page_id = get_the_ID();
global $post;
// cta_get_fund
$cta_cta_title = get_post_meta(get_the_ID(), 'wpcf-cta-title', true);
$cta_cta_desc = get_post_meta(get_the_ID(), 'wpcf-cta-description', true);
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
<?php
// Partner Benefits The Query
$args = array('post_status' => 'publish',
    'post_type' => 'partner_benefit',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$partnerBenefits = new WP_Query($args);
if ($partnerBenefits->have_posts()) :
    ?>
    <section  id="we_bring_you_best">
        <div class="tranp-div-two"></div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <h2 class="section-heading"><?php echo get_option('partner_benefits'); ?> </h2>
                </div>
            </div>	
            <div class="col-md-12">
                <div class="row">
                    <?php
                    while ($partnerBenefits->have_posts()) : $partnerBenefits->the_post();
                        ?>
                        <div class="col-md-3 col-sm-3">
                            <div class="row">
                                <div class="bring-best-item">
                                    <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                        <div class="category-icon"> 
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'partners-expertise'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                    <h3 class="heading-label"> <?php echo get_the_title(); ?> </h3>
                                    <p class="description"><?php echo get_the_content(); ?> </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- we bring you the best section -->
    <?php
endif;
/* Restore original Post Data */
wp_reset_postdata();
?>
<!-- Partners list -->	
<!-- we bring you the best section -->
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo $cta_cta_title; ?> </h2>
        <h3><?php echo $cta_cta_desc; ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>
