<?php
get_header();
$meta = get_post_meta(get_the_ID());
/*
 * Fetch testimonials respective to merchant category
 */

global $post;
$listings = new WP_Query();
$listings->query('post_type=video-testimonial&posts_per_page=-1,&order=ASC');

/*
 * Fetch loan keypoints
 */
$loan_keypoints = get_post_meta($post->ID, 'wpcf-loan_keypoints', false);

/*
 * Fetch loan terms
 */
$loan_terms = get_post_meta($post->ID, 'wpcf-loan_terms', false);

/*
 * Fetch loan payments
 */
$loan_payments = get_post_meta($post->ID, 'wpcf-loan_payments', false);

/*
 * Fetch loan uses
 */
$loan_uses = get_post_meta($post->ID, 'wpcf-loan_uses', false);
?>
<!--Financial Products -->
<section  id="financial_product" class="gradient-one">
    <div class="container">
        <div class="financial-product-item">
            <?php
            /*
             * Fetch featured thumnail
             */
            if (has_post_thumbnail($post->ID)):
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                ?>
                <div class="category-icon"> <img src="<?php echo $image[0]; ?>" alt="installation icon image"> </div>
            <?php endif; ?>
            <h5 class="section-heading"><?php echo get_the_title($post->ID); ?></h5>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($loan_keypoints as $key => $value) { ?>
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
            <img src="<?php echo esc_url(get_post_meta($post->ID, 'wpcf-graph_image', true)); ?>" alt="Terms loan graph">
        </div>	
    </div>
    <!---to display trust badges-->
    <?php if (is_active_sidebar('trust-badge')) : ?>
        <div class="widget-area trust-badge" role="complementary">
            <div class= "container">
                <div class="bottom-margin-80">
                    <?php dynamic_sidebar('trust-badge'); ?>
                </div>
            </div>
        </div><!-- .widget-area -->
    <?php endif; ?>	
    <!--trust badge widget ends here-->
</section>
<!--Financial Products -->

<!-- Terms loan details -->
<section id="details_termsloan">
    <div class="container">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-loan-detail-headline', true); ?> </h2>
        <div class="col-md-6 col-sm-6 border-right-1">
            <div class="row">
                <h3 class='sub-heading'>Terms</h3>
                <ul class="details-point">
                    <?php foreach ($loan_terms as $key => $value) { ?>
                        <li><?php echo $value; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="paymment-point">
                    <h3 class='sub-heading'>Payments</h3>
                    <ul class="details-point">
                        <?php foreach ($loan_payments as $key => $value) { ?>
                            <li><?php echo $value; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if ((count($loan_terms) > 4 ) || (count($loan_payments) > 4)): ?>
        <div class="show-more-terms show-more-termDetail-loan">
            <a href="javascript:void(0)" title="show more user terms of loan"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
        </div>
    <?php endif; ?>
    <div class="show-more-terms show-less-termDetail-loan">
        <a href="javascript:void(0)" title="show more user terms of loan"> SHOW LESS <i class="glyphicon glyphicon-chevron-up"></i> </a>

    </div>
</section>
<!-- Terms loan details -->
<!-- Use terms loan -->
<section id="use_termloan_for">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-term-loan-use-headli', true); ?> </h2>
                <ul class="list-term-use termloan-use-point">
                    <?php foreach ($loan_uses as $key => $value) { ?>
                        <li class="col-sm-4"><p><?php echo $value; ?></p></li> <?php } ?>
                </ul>
                <?php if (count($loan_uses) > 6): ?>
                    <div class="show-more-terms show-more-term-loan">
                        <a href="javascript:void(0)" title="show more user terms of loan"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                    </div>
                <?php endif; ?>
                <div class="show-more-terms show-less-term-loan">
                    <a href="javascript:void(0)" title="show more user terms of loan"> SHOW LESS <i class="glyphicon glyphicon-chevron-up"></i> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Use Terms loan -->
<!-- Loan calculator -->
<section id="loan_calculator">
    <div class="container">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-calculator-headline', true); ?> </h2>
        <p class="loan-calculator-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not </p>
    </div>
</section>
<!-- Loan calculator -->
<!-- community of success -->
<section id="success_community">
    <div class="container">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-community-headline', true); ?> </h2>
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
                    $video = wp_get_attachment_url($meta['id']);
                    ?>
                    <div class="item">
                       
                        <div class="video-player"> 

                            <a href="<?php echo $video; ?>" data-webm="<?php echo $video; ?>" class="html5lightbox"><?php echo get_the_post_thumbnail($post->ID); ?><div class="video-play-icon"><i></i></div></a>
                        
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
    </div>			
</section>
<!-- community of success -->
<!-- member benefit -->
<?php if (is_active_sidebar('memberbenefit')) : ?>
    <div class="widget-area memberbenefit" role="complementary">
        <?php dynamic_sidebar('memberbenefit'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!-- member benefit -->	
<section class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?> </h2>
        <h3> <?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?> </h3>
        <!-- applynow widget section -->
        <?php if (is_active_sidebar('applynow')) : ?>
            <div class="widget-area applynow" role="complementary">
                <?php dynamic_sidebar('applynow'); ?>
            </div><!-- .widget-area -->
        <?php endif; ?>	
        <!--applynow widget ends here-->
    </div>
</section>
<?php get_footer(); ?>