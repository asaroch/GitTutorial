<?php
/*
  Template Name: how it works
 */
get_header();
$how_it_works_id = get_the_ID();
// page heading 
$effortlessHeading = get_post_meta($how_it_works_id, 'wpcf-effortless-applica', true);
$gatherBefore = get_post_meta($how_it_works_id, 'wpcf-gather-start', true);
$gettingFunds = get_post_meta($how_it_works_id, 'wpcf-getting-funds', true);
// How it work processes queries The Query
$args = array('post_status' => 'publish',
    'post_type' => 'how-it-work-process',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$howItWorksProcess = new WP_Query($args);

// How it work effortless application queries The Query
$args = array('post_status' => 'publish',
    'post_type' => 'how-it-work-effortle',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$howItWorksEffort = new WP_Query($args);

// How it work gather application queries The Query
$args = array('post_status' => 'publish',
    'post_type' => 'how-it-work-gather',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$howItWorksGather = new WP_Query($args);

// How it work direct deposit queries The Query
$args = array('post_status' => 'publish',
    'post_type' => 'how_getting_fund',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$how_getting_fund = new WP_Query($args);

// cta_get_fund
$cta_cta_title = get_post_meta(get_the_ID(), 'wpcf-cta-title', true);
$cta_cta_desc = get_post_meta(get_the_ID(), 'wpcf-cta-description', true);
if ($howItWorksProcess->have_posts()) :
    ?>
    <section class="process-block gradient-one">
        <div class="container">
            <div class="row">
                <?php
                $cnt = 0;
                $post_count = $howItWorksProcess->found_posts;
                $div_cnt=4;
                if($post_count == 4){
                    $div_cnt=3;
                }
                while ($howItWorksProcess->have_posts()) : $howItWorksProcess->the_post();
                    $cnt++;
                    ?>
                    <div class="col-md-<?php echo $div_cnt ?> col-sm-<?php echo $div_cnt ?>">
                        <div class="row">
                            <div class="financial-product-item">
                                <div class="category-icon"> 
                                    <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                        <div class="category-icon"> 
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                                <h4><?php echo $cnt; ?></h4>			
                                <h5><?php echo get_the_title(); ?></h5>
                                <p><?php echo get_the_content(); ?></p>
                                <?php if ($post_count > $cnt) {
                                    ?>
                                    <div class="process-arrow">
                                        <span>
                                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/how-it-works/process_arrow.png" alt="Get Started Icon">
                                        </span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
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
    <?php
endif;
?>

<!--Process Block -->
<!-- Effortless application -->
<section id="use_termloan_for">
    <div class="fade-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-heading"> <?php echo $effortlessHeading; ?> </h2>
                <ul class="list-term-use termloan-use-point">
                    <?php
                    if ($howItWorksEffort->have_posts()) :
                        while ($howItWorksEffort->have_posts()) : $howItWorksEffort->the_post();
                            ?>
                            <li class="col-sm-4"><p><?php echo get_the_title(); ?></p></li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Effortless application -->
<!-- Terms loan details -->
<section id="details_termsloan">
    <div class="container">
        <h2 class="section-heading"> <?php echo $gatherBefore; ?> </h2>
        <div class="col-sm-offset-4 col-sm-6">
            <div class="row">
                <ul class="details-point">
                    <?php
                    if ($howItWorksGather->have_posts()) :
                        while ($howItWorksGather->have_posts()) : $howItWorksGather->the_post();
                            ?>
                            <li><?php echo get_the_title(); ?></li>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Terms loan details -->
<!-- Infoegrafic carousel -->
<section id="infografic_product">
    <div class="container">
        <h2 class="section-heading"> <?php echo $gettingFunds; ?> </h2>
        <div id="infografic_carousel" class="owl-carousel owl-theme">
            <?php
            if ($how_getting_fund->have_posts()) :
                while ($how_getting_fund->have_posts()) : $how_getting_fund->the_post();
                    ?>
                    <div class="item">
                        <div class="info-product-item">
                            <p><?php echo get_the_content(); ?></p>
                            <div class="category-icon"> 
                                <?php
                                if (has_post_thumbnail(get_the_ID())):
                                    ?>
                                    <div class="category-icon"> 
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                                    </div>
                                    <?php
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>	
        </div>
    </div>
</section>
<!-- Infoegrafic carousel -->
<!-- About us -->
<section  id="about_us" class="gradient-two">
    <div class="container text-center">
<?php 
      $still_question_text = get_post_meta($how_it_works_id, 'wpcf-still_question', true);
      $still_question_button = get_post_meta($how_it_works_id, 'wpcf-how-it-work-button', true);
      $still_question_url = get_post_meta($how_it_works_id, 'wpcf-how-it-work-url', true);
?>
        <p><?php echo $still_question_text; ?></p>
        <a href="<?php echo get_the_permalink('633'); ?>" title="ABOUT US"  class="btn btn-purple-style"><?php echo $still_question_button; ?></a>
    </div>
</section>
<!--funding option-->
<!-- capital_comparison_chart section -->
    <?php if (is_active_sidebar('can_capital_comparison_chart')) : ?>
    <div class="widget-area trust-badge" role="complementary">
    <?php dynamic_sidebar('can_capital_comparison_chart'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!-- capital_comparison_chart section -->
<!--funding option-->

<?php echo get_template_part('resources_all'); ?> 
<!-- we bring you the best section -->
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo $cta_cta_title; ?> </h2>
        <h3><?php echo $cta_cta_desc; ?></h3>
<?php dynamic_sidebar('applynow'); ?>
    </div>
</section>

<!--Process ends here-->

<?php get_footer(); ?>
