<?php
/*
  Template Name: Product
 */
get_header();
$meta = get_post_meta(get_the_ID()); 
/*
 * Fetch testimonials respective to merchant category
 */

global $post;
$listings = new WP_Query();
$listings->query('post_type=testimonial&testimonial-category=merchant&order=ASC');
?>
<!--Financial Products -->
<section  id="financial_product" class="gradient-one">
    <div class="container">
        <div class="financial-product-item">
            <div class="category-icon"> <img src="<?php echo esc_url(get_post_meta($post->ID, 'wpcf-term_loan_main_image', true)); ?>" alt="installation icon image"> </div>
            <h5 class="section-heading">Terms Loans</h5>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach (get_post_meta($post->ID, 'wpcf-term', false) as $key => $value) { ?>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="loan-item">
                            <span class="glyphicon glyphicon-ok"> </span>
                            <p> <?php echo $value; ?> </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div id="term_loan_graph">
            <img src="<?php echo get_template_directory_uri(); ?>/images/termsloan/chart.png" alt="Terms loan graph">
        </div>	
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

<!-- Terms loan details -->
<section id="details_termsloan">
    <div class="container">
        <h1 class="section-heading"> Term Loan Details </h1>
        <div class="col-md-6 col-sm-6 border-right-1">
            <div class="row">
                <h3 class='sub-heading'>Terms</h3>
                <ul class="details-point">
                    <?php echo get_post_meta($post->ID, 'wpcf-terms', true); ?>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="paymment-point">
                    <h3 class='sub-heading'>Payments</h3>
                    <ul class="details-point">
                        <?php echo get_post_meta($post->ID, 'wpcf-payment', true); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Terms loan details -->
<!-- Use terms loan -->
<section id="use_termloan_for">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="section-heading"> I Can Use A Term Loan For: </h1>
                <ul class="list-term-use termloan-use-point">
                    <?php foreach (get_post_meta($post->ID, 'wpcf-term_loan_for', false) as $key => $value) { ?>
                        <li class="col-sm-4"><p><?php echo $value; ?></p></li> <?php } ?>
                </ul>
                <?php if(count(get_post_meta($post->ID, 'wpcf-term_loan_for', false)) > 6):?>
                <div class="show-more-terms">
                    <a href="#" title="show more user terms of loan"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Use Terms loan -->
<!-- Loan calculator -->
<section id="loan_calculator">
    <div class="container">
        <h1 class="section-heading"> Term Loan Calculator </h1>
        <p class="loan-calculator-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not </p>

        <div class="show-more-terms">

        </div>
    </div>
</section>
<!-- Loan calculator -->
<!-- community of success -->
<section id="success_community">
    <div class="container">
        <h1 class="section-heading"> Community of Success </h1>
        <!--Display testimonials for merchants-->
        <?php
        if ($listings->found_posts > 0){
            while ($listings->have_posts()) {
                $listings->the_post();
        ?>
        <!--Testimonials ends here-->
        <div class="col-md-6 col-sm-6">
            <div class="video-player">
                <?php echo get_the_post_thumbnail($post->ID); ?>
            </div>
            <p class="marchent-name"> <?php echo get_the_title(); ?> </p>
            <p class="business-label"> <?php echo get_post_meta($post->ID,'wpcf-business_name',true); ?> </p>
            <p class="business-name"> <?php echo get_post_meta($post->ID,'wpcf-topic',true); ?> </p>
            <p class="success-description"> <?php echo get_the_content(); ?> </p>					
        </div>
        <?php } } ?>
    </div>			
</section>
<!-- community of success -->
<!-- member benefit -->
        <?php if ( is_active_sidebar( 'memberbenefit' ) ) : ?>
                <div class="widget-area memberbenefit" role="complementary">
                        <?php dynamic_sidebar( 'memberbenefit' ); ?>
                </div><!-- .widget-area -->
        <?php endif; ?>	
<!-- member benefit -->	
<section  id="about_us" class="gradient-two">
    <div class="container text-center">
        <p>Supporting small business for <b>18 years</b> with over <b>$6 billion</b> in working capital.</p>
        <a href="javascript:void(0);" title="ABOUT US"  class="btn btn-purple-style">ABOUT US</a>
    </div>
</section>
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> Get Funded </h2>
        <h3> Smart, Simple & Fast. </h3>
     <!-- applynow widget section -->
        <?php if ( is_active_sidebar( 'applynow' ) ) : ?>
                <div class="widget-area applynow" role="complementary">
                        <?php dynamic_sidebar( 'applynow' ); ?>
                </div><!-- .widget-area -->
        <?php endif; ?>	
     <!--applynow widget ends here-->
    </div>
</section>
<?php get_footer(); ?>
