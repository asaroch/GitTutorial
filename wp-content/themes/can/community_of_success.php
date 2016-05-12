<?php
global $post;
$listings = new WP_Query();
$listings->query('post_type=video-testimonial&posts_per_page=-1&orderby=menu_order date&order=ASC');
?>

<!-- community of success -->
<section id="success_community" <?php if(($post->post_type == "campaign-product") || ($post->post_type == "campaign-all-product")){ ?> class="gray-bg" <?php } ?>>
    <div class="container">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-headline', true); ?> </h2>
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

                            <a href="<?php echo $video; ?>" data-webm="<?php echo $video; ?>" class="html5lightbox"><?php echo get_the_post_thumbnail($post->ID, array(515,307)); ?><div class="video-play-icon"><i></i></div></a>

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
        <div class="customNavigation visible-xs">
            <div class="text-center">
                <a title="prev" class="slide-prev"> <i class="glyphicon glyphicon-menu-left"></i></a>
                <span class="current-slider"> 1 </span>
                <span class="slider-ratio">/</span> 
                <span class="total-slider"> 16 </span>
                <a title="next" class="slide-next active"><i class="glyphicon glyphicon-menu-right"></i></a>
            </div>
        </div>
    </div>			
</section>
<!-- community of success -->