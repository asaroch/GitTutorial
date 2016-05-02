<?php
/*
  Template Name: help center
 */
get_header();
// Fetured resources
$args = array(
    'post_type' => 'help-centre',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC'
);
$help_center = new WP_Query($args);

// Description block CTA

$cta_description = get_post_meta(get_the_ID(), 'wpcf-cta-description1', true);
$cta_button_text = get_post_meta(get_the_ID(), 'wpcf-cta-button-text', true);
$cta_button_url = get_post_meta(get_the_ID(), 'wpcf-cta-url', true);

// Chat block
$cta_chat_head = get_post_meta(get_the_ID(), 'wpcf-chat-questions-head', true);
$cta_chat_button = get_post_meta(get_the_ID(), 'wpcf-chat-phone-number', true);

// Search heading
$search_heading = get_post_meta(get_the_ID(), 'wpcf-search-heading', true);

// cta_get_fund
$cta_cta_title = get_post_meta(get_the_ID(), 'wpcf-cta-title', true);
$cta_cta_desc = get_post_meta(get_the_ID(), 'wpcf-cta-description', true);

// video section heading
$video_section_heading = get_post_meta(get_the_ID(), 'wpcf-video-section-head', true);

// tutorial carousel
$args = array('post_status' => 'publish',
    'post_type' => 'help-center-video',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$help_center_video = new WP_Query($args);


$question_answer_arr = array();
while ($help_center->have_posts()) : $help_center->the_post();
    $chart_topics = wp_get_post_terms(get_the_ID(), 'help-centre-category', array("fields" => "all"));
    foreach ($chart_topics as $key => $value) {
        // get the menu order for post.
        $post_order = get_post_field('menu_order', get_the_ID());
        $question_answer_arr[$value->name][$post_order][get_the_title()] = get_the_content();
    }
endwhile;

// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));
?>
<!--Process Block -->
<section id="faq-block">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="section-heading">Frequently Asked Questions</h2>
                <div class="accordion" id="accordion1">
                    <?php
                    $cnt = 0;
                    $collapse = 0;
                    foreach ($question_answer_arr as $category => $menu_order_arr) {
                        $cnt++;
                        ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $cnt; ?>">
                                    <?php echo $category; ?> <i class="glyphicon glyphicon-menu-down"></i>
                                </a>
                            </div>
                            <div id="collapse<?php echo $cnt; ?>" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <!-- Here we insert another nested accordion -->
                                    <div class="accordion" id="accordion1">
                                        <?php
                                        foreach ($menu_order_arr as $menu_order => $question_answer_arr) {

                                            foreach ($question_answer_arr as $question => $answers) {
                                                $collapse++;
                                                ?>
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $cnt; ?>" href="#collapseInner<?php echo $collapse; ?>">
                                                            <?php if ($menu_order == 1) { ?><span class="top-quest">TOP QUESTION</span> <?php } echo $question; ?>  <i class="glyphicon glyphicon-menu-down"></i>                               
                                                        </a>
                                                    </div>
                                                    <div id="collapseInner<?php echo $collapse; ?>" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <p>
                                                                <?php echo $answers; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                    <!-- Inner accordion ends here -->


                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>	
        </div>
</section>
<!--Process Block -->
<section id="help-log" class="gradient-two">
    <div class="container text-center">
        <p><?php echo $cta_description; ?></p>
        <a href="<?php echo $cta_button_url; ?>" title="Sign In"  class="btn btn-purple-style"><?php echo $cta_button_text; ?></a>
    </div>
</section>
<!-- Email Us -->
<section class="live-chat gray-bg">
    <div class="container text-center">
        <h2 class="section-heading"><?php echo $cta_chat_head; ?></h2>
        <h5 class="call-us"> Call us: </h5>
        <h3 class='call-number'> <?php echo $cta_chat_button; ?> </h3>
        <span class='divider-line'>  </span>
        <a href="javascript:void(0);" title="APPLY NOW" class="btn btn-blue-bg"> Live Chat <i class="glyphicon glyphicon-play"></i></a>
    </div>
</section>
<!-- Email Us --> 
<!-- Infografic carousel -->
<section id="infografic_product" class="tutorials">
    <div class="container">

        <h2 class="section-heading"><?php echo $video_section_heading; ?> </h2>
        <div id="infografic_carousel" class="owl-carousel owl-theme">
            <?php
            if ($help_center_video->found_posts > 0) {
                while ($help_center_video->have_posts()) : $help_center_video->the_post();
                    $featured_image_video = get_post_meta(get_the_ID(), 'wpcf-featured_image_video', true);
                    $meta = get_post_meta($post->ID, '_fvp_video', true);
                    $video = wp_get_attachment_url($meta['id']);
// Script to generate thumbnail from video* */
                    $ffmpeg = 'ffmpeg';

// where you'll save the image
                    $upload_url = wp_upload_dir();
                    $image = $upload_url['basedir'] . "/thumbnails/" . $post->ID . ".jpg";

// default time to get the image
                    $second = 1;

// get the duration and a random place within that
                    $cmd = "$ffmpeg -i $video 2>&1";

                    if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', $cmd, $time)) {
                        $total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
                        $second = rand(1, ($total - 1));
                    }

// get the screenshot
                    $cmd = "$ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $image 2>&1";
                    $return = `$cmd`;
//Script Ends here* */
                    ?>
                    <div class="item">
                        <div class="col-sm-12 tutorial-section">
                            <div class="col-sm-7">
                                <?php if (has_post_thumbnail($post->ID)): ?>
                                    <div class="video-player">
                                        <a href="<?php echo $video; ?>" data-webm="<?php echo $video; ?>" class="html5lightbox"><img src="<?php echo $upload_url['baseurl'] . "/thumbnails/" . $post->ID . ".jpg"; ?>" alt="video thumbnail"><div class="video-play-icon"><i></i></div></a>
                                    </div>					
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-5">
                                <div class="tutorial-description">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p><?php echo get_the_content(); ?></p>
                                </div>                                                    
                            </div>
                        </div>
                    </div>


                    <?php
                endwhile;
            }
            ?>
        </div>
        <div class="customNavigation visible-xs">
            <div class="text-center">
                <a title="prev" class="slide-prev"> <i class="glyphicon glyphicon-menu-left"></i></a>
                <span class="current-slider"> 1 </span>
                <span class="slider-ratio">/</span> 
                <span class="total-slider"> <?php echo $help_center_video->post_count; ?> </span>
                <a title="next" class="slide-next active"><i class="glyphicon glyphicon-menu-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Infografic carousel -->		
<section class="search-resource-center gray-bg">
    <div class="container text-center">
        <h2 class="section-heading"><?php echo $search_heading; ?></h2>
        <form method="get" action="<?php echo get_the_permalink('597'); ?>" id="resource-search">
            <div class="row"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <input type="text" class="form-control" placeholder="Search Resources by Keyword" name="keyword">
                        </fieldset>
                    </div>
                </div>
                <?php
                if (!empty($business_types)) {
                    ?>
                    <div class="col-sm-1 option-text hidden-xs">
                        <p>and / or</p>
                    </div>
                    <div class="col-sm-4 col-md-3 hidden-xs">
                        <div class="select-topic">
                            <fieldset>
                                <select class="form-control" name="business-type" id="business-type">
                                    <option value="">Filter by Business Type</option>
                                    <?php
                                    foreach ($business_types as $business_type) {
                                        ?>
                                        <option value="<?php echo $business_type->term_id; ?>"><?php echo $business_type->name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </fieldset>
                            <span class="glyphicon glyphicon-menu-down select-drop"></span>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-sm-2 hidden-xs">
                    <div class="form-group">
                        <button class="btn btn-blue-bg btn-go field-style">GO <i class="glyphicon glyphicon-play"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo $cta_cta_title; ?> </h2>
        <h3><?php echo $cta_cta_desc; ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>

<?php get_footer(); ?>

