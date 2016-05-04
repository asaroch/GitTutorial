<?php
// Include header file
get_header();

// Include resource search template
get_template_part('resource-search-template');

// Fetch taxonomy details
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

// Fetch all resources of a particular topic
$args = array(
    'post_type'      => 'resource',
    'post_status'    => 'publish',
    'posts_per_page' => $show_more_limit,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query'      => array(array(
        'taxonomy'   => 'resource-topic',
        'field'      => 'id',
        'terms'      => $term->term_id
    ))
);

$resources = new WP_Query($args);

//create a object to show estimated reading time for a post.
$estimated_time = new EstimatedPostReadingTime();
?>
<section class="topics-bg">
    <div class="container">
        <div class="row voffset-bottom3">
            <div class="col-md-12 clearfix">
                <h3 class="section-heading"><?php echo $term->name; ?></h3>
            </div>
        </div>
    </div>
</section>
<?php 
if ($resources->have_posts()) {
    ?>
    <div id="all_resources_block">
        <div class="container">
            <div class="row">
                <div class="col-md-9 resource-container" id="listing-resources">						
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="section-heading">All Listing</h2>
                        </div>
                    </div>
                    <?php 
                    while ($resources->have_posts()) : $resources->the_post();
                        
                         // Sponsored By
                        $sponsored_by = get_post_meta($post->ID, 'wpcf-sponsored-by', true);
                        $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;
                        
                        // Reading time
                        $reading_time = $estimated_time->estimate_time_shortcode($post);
                        ?>
                        <div class="row">
                            <div class="col-sm-12 resource-list">								
                                <?php
                                if (has_post_thumbnail($post->ID)) {
                                    $featured_image_or_video = get_post_meta($post->ID, 'wpcf-featured_image_video', true);
                                    $meta = get_post_meta($post->ID, '_fvp_video', true);
                                    $video = wp_get_attachment_url($meta['id']);
                                    if ($featured_image_or_video == 'video' && $video != '') { // Fetch video thumbmail
                                        if ($video != '') {
                                            $src = video_thumbnail($video, '267x200', $post);
                                            ?>
                                            <div class="resource-image">
                                              <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><img src="<?php echo $src; ?>" /></a>
                                            </div>
                                            <?php
                                        }
                                    } else {    // Fetch image src
                                        ?>
                                        <div class="resource-image">
                                            <a href="<?php get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                                <?php echo get_the_post_thumbnail($post->ID); ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                                <div class="resource-content">
                                    <p class="read-date"><?php echo get_the_date('F j, Y', $post->ID); ?> in <b><?php echo $term->name; ?></b></p>
                                    <p class="featured-title">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo esc_attr(strlen($post->post_title) >= 75 ? substr($post->post_title, 0, 75) . ' ...' : $post->post_title); ?></a>
                                    </p>
                                    <p><?php echo strlen($post->post_content) >= 145 ? substr($post->post_content, 0, 145) . ' ...' : $post->post_content; ?></p>
                                    <?php
                                    if ($reading_time) {
                                        ?>
                                        <p class="read-time"><?php echo $reading_time; ?> Read</p>
                                        <?php
                                    }
                                    
                                    if ( $sponsored_by != '' ) {
                                        ?>
                                        <div class="sponsored">
                                            <p>Sponsored By <?php echo $sponsored_by; ?></p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-12"> 
                                <?php
                                $author     = get_userdata($post->post_author);
                                $user_title = get_user_meta($post->post_author, 'wpcf-user-title', true); 
                                ?>
                                <div class="client-testimonials">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <?php echo get_avatar($post->post_author, '50*50'); ?> 
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo get_the_author_posts_link(); ?></h4>
                                            <?php 
                                            if ( $user_title != '' ) {
                                                ?>
                                                <h5><?php echo $user_title; ?></h5>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                    <?php
                    if ( $resources->found_posts > $show_more_limit ) {
                        ?>
                        <div class="show-more-terms paginate-topic-listing">
                            <a href="javascript:void(0)" title="show more user terms of loan"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                            <form>
                                <input type="hidden" id="paginate-listing-resources-offset"  value="2" name="paginate_resource_listing_offset" />
                                <input type="hidden" id="resource-topic-term"  value="<?php echo $term->term_id; ?>" name="resource_topic_term" />
                            </form>
                        </div>
                        <div id="loader-conatiner">
                            <img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" style="display:none;"/>
                        </div>
                        <?php       
                    }
                    ?>
                </div>
               <?php get_template_part('resource-sidebar'); ?>
            </div>
        </div>				
    </div>
    <?php   
}
?>
<!-- Related Articles section -->
<?php 
// Fetured resources
$args = array(
    'post_type'       => 'resource',
    'post_status'     => 'publish',
    'posts_per_page'  => 3,
    'meta_query'      => array(array(
            'key'     => '_is_featured',
            'value'   => 'yes'
        )),
    'orderby'         => 'menu_order date',
    'order'           => 'ASC'
);
 $resources = new WP_Query($args);

    if ($resources->have_posts()) {
    ?>
    <section id="articles">
        <div class="related-articles">
            <div class="container">
                <div class="row">
                    <h2 class="section-heading"> Related Articles</h2>
                    <?php
                    while ($resources->have_posts()) : $resources->the_post();
                        // Fetch topic of a resource
                        $resource_topics = wp_get_post_terms($post->ID, 'resource-topic', array("fields" => "names"));
                        if (!empty($resource_topics)) {
                            $topics = implode(", ", $resource_topics);
                            $topics = strlen($topics) >= 30 ? substr($topics, 0, 30) . ' ...' : $topics;
                        } else {
                            $topics = '';
                        }

                        // Reading time
                        $reading_time = $estimated_time->estimate_time_shortcode($post);
                        ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <?php
                                if (has_post_thumbnail(get_the_ID())) {
                                    $featured_image_or_video = get_post_meta(get_the_ID(), 'wpcf-featured_image_video', true);
                                    if ($featured_image_or_video == 'video') {
                                        $meta = get_post_meta(get_the_ID(), '_fvp_video', true);
                                        $video = wp_get_attachment_url($meta['id']);
                                        if ($video != '') {
                                            $src = video_thumbnail($video, '360x155', $featured_resources[0]);
                                            ?>
                                            <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                                <img src="<?php echo $src; ?>" title="<?php echo get_the_title(); ?>" />
                                            </a>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                        <?php
                                        echo get_the_post_thumbnail(get_the_ID(), 'related-articles', array('class' => 'img-responsive hidden-xs'));
                                        ?>
                                        </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                <div class="caption">
                                    <p class="read-date"><span><?php echo $topics; ?></span> • <?php echo get_the_date('F j, Y', $post->ID); ?></p>
                                    <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo esc_attr(strlen(get_the_title()) >= 40 ? substr(get_the_title(), 0, 40) . ' ...' : get_the_title()); ?></a></h3>
                                    <p class="hidden-xs"><?php echo strlen(get_the_content()) >= 145 ? substr(get_the_content(), 0, 145) . ' ...' : get_the_content(); ?></p>
        <?php
        if (isset($reading_time) && $reading_time != '') {
            ?>
                                        <p class="read-time hidden-xs"><?php echo $reading_time; ?> Min Read</p>
                                        <?php }
                                    ?>
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
    <?php
}
?>
<!-- Related Articles section -->
<section class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo get_post_meta( 121, 'wpcf-cta-title', true ); ?> </h2>
        <h3> <?php echo get_post_meta( 121, 'wpcf-cta-description', true ); ?> </h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>