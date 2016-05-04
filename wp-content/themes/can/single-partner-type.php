<?php   
get_header();
?>
<section class="sales-program gradient-one">
    <div class="container">
        <div class="row">
            <?php 
            $partner_heading = get_post_meta($post->ID, 'wpcf-partner-benefit-head', true);
            if ( $partner_heading != '' ) {
                ?>
                  <div class="section-heading"><?php echo $partner_heading; ?></div>
                <?php
            }
            ?>
            <?php
            $heading = get_post_meta($post->ID, 'wpcf-benefit-1-heading', true);
            $desc = get_post_meta($post->ID, 'wpcf-benefit-1-descriptio', true);

            if ($heading != '' || $desc != '') {
                ?>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="financial-product-item">
                            <div class="category-icon"> <img src="<?php echo get_template_directory_uri(); ?>/images/partner/check_icon_white-border.png" alt="check icon"> </div>
                            <h5><?php echo $heading; ?></h5>
                            <p><?php echo $desc; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
            $heading = get_post_meta($post->ID, 'wpcf-benefit-2-heading', true);
            $desc    = get_post_meta($post->ID, 'wpcf-benefit-2-descriptio', true);

            if ( $heading != '' || $desc != '' ) {
                ?>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="financial-product-item">
                            <div class="category-icon"> <img src="<?php echo get_template_directory_uri(); ?>/images/partner/check_icon_white-border.png" alt="check icon"> </div>
                            <h5><?php echo $heading; ?></h5>
                            <p><?php echo $desc; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
            $heading = get_post_meta($post->ID, 'wpcf-benefit-3-headings', true);
            $desc = get_post_meta($post->ID, 'wpcf-benefit-3-descriptio', true);

            if ($heading != '' || $desc != '') {
                ?>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="financial-product-item">
                            <div class="category-icon"> <img src="<?php echo get_template_directory_uri(); ?>/images/partner/check_icon_white-border.png" alt="check icon"> </div>
                            <h5><?php echo $heading; ?></h5>
                            <p><?php  echo $desc; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>	
    </div>
    <div class="container">
        <div class="col-xs-12 text-center">
            <a class="btn btn-purple-style text-uppercase" title="Become a sales partner" href="<?php echo esc_url(get_the_permalink(337)); ?>?partner=<?php echo $post->post_name; ?>">become a sales partner</a>
        </div>
    </div>
</section>
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
    <section id="referal_about_us" class="gradient-two">
        <div class="container text-center">
            <p><?php echo get_post_meta($post->ID, 'wpcf-history-of-funding', true); ?></p>
            <a href="<?php echo get_the_permalink(208); ?>" title="ABOUT US"  class="btn btn-purple-style"><?php echo $history_funding_button; ?></a>
        </div>
    </section>
<?php
}
?>
<!-- Email Us -->
<!-- Email Us -->	
<section id="email_us"  class="gray-bg">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo get_option('call_to_action_heading'); ?></h2>
        <h5 class="call-us"> Call us: </h5>
        <h3 class='call-number'> <?php echo get_option('call_no'); ?> </h3>
        <span class='divider-line'>  </span>
        <a href="mailto:<?php echo get_option('call_to_action_email'); ?>" title="EMAIL US" class="btn btn-blue-bg"> EMAIL US <i class="glyphicon glyphicon-play"></i></a>
    </div>
</section>
<!-- Email Us -->
<section  class="get-funded">
    <div class="container text-center">
        <h2> Earn value </h2>
        <h3> <strong>Deliver value</strong> </h3>
        <a href="<?php echo esc_url(get_the_permalink(337)); ?>?partner=<?php echo $post->post_name; ?>" title="APPLY NOW" class="btn btn-blue-bg"> Become a sales partner <i class="glyphicon glyphicon-play"></i></a>
    </div>
</section>
<?php
get_footer();
