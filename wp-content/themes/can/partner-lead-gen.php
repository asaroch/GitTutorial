<?php
/*
  Template Name: Partner Lead Generation
 */
get_header();
?>
<section id="partner_lead_form"><!-- partner form -->
    <div class="container">
        <form novalidate="novalidate" class="form-section wpcf7-form invalid" method="post" action="">
            <div class="row">
                <div class="col-xs-12">
                    <h3>Partner Info</h3>
                </div>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="343" title="Partner Lead Gen"]'); ?>
        </form>
    </div>
</section><!-- partner form -->
<section class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
        <h3> <?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>

