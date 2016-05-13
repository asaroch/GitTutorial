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
// cta_get_fund
$cta_cta_title = get_post_meta(get_the_ID(), 'wpcf-cta-title', true);
$cta_cta_desc = get_post_meta(get_the_ID(), 'wpcf-cta-description', true);

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
           
wp_reset_query();
/************ community of success area ***********/
get_template_part('community_of_success');
/************ community of success area ***********/
?>
<!-- we bring you the best section -->
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo $cta_cta_title; ?> </h2>
        <h3><?php echo $cta_cta_desc; ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>
