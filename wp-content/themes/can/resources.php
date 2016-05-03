<?php
/*
  Template Name: Resources
 */
get_header();

// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
        'parent'     => '0',
        'hide_empty' => 0
    ));

// Popular Topics
$popular_topics = get_terms('resource-topic', array(
    'parent' => '0',
    'hide_empty' => 0,
    'meta_query' => array
        (
        0 => array
            (
            'key' => 'wpcf-is_popular_topic',
            'value' => 1
        )
    )
        ));

// Fetured resources
$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => array(array(
            'key' => '_is_featured',
            'value' => 'yes'
        )),
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$featured_resources = query_posts($args);

//create a object to show estimated reading time for a post.
$estimated_time = new EstimatedPostReadingTime();
?>
<?php get_template_part('resource-search-template'); ?>
<?php
if (!empty($featured_resources)) {
    // Fetch topic of a resource
    $resource_topics = wp_get_post_terms($featured_resources[0]->ID, 'resource-topic', array("fields" => "names"));
    if (!empty($resource_topics)) {
        $topics = 'in ' . implode(", ", $resource_topics);
        $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
    } else {
        $topics = '';
    }
    
    // Reading time
    $reading_time =  $estimated_time->estimate_time_shortcode($featured_resources[0]);
   
    // Sponsored By
    $sponsored_by = get_post_meta($featured_resources[0]->ID, 'wpcf-sponsored-by', true);
    $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;
    
    $featured_image_or_video = get_post_meta($featured_resources[0]->ID, 'wpcf-featured_image_video', true);
    if ( $featured_image_or_video == 'video' ) {
        $meta  = get_post_meta($featured_resources[0]->ID, '_fvp_video', true);
        $video = wp_get_attachment_url($meta['id']);
        if ( $video != '' ) {
            $src = video_thumbnail( $video , '1144x493', $featured_resources[0] );
        }
    }
    else {
        $src = wp_get_attachment_image_src(get_post_thumbnail_id($featured_resources[0]->ID), array(1144, 493), false, '');
        $src = $src[0];
    }
    ?>
    <section id="resource_hero" style="background-image: url('<?php echo $src; ?>')" ><!-- Resource banner -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="resource-content">
                        <div class="featured-tag gradient-one">
                            <p>FEATURED</p>
                        </div>
                        <p class="read-date"><?php echo get_the_date('F j, Y', $featured_resources[0]->ID); ?> <b><?php echo $topics; ?></b></p>
                        <p class="featured-title"><a href="<?php echo get_the_permalink($featured_resources[0]->ID); ?>" title="<?php echo $featured_resources[0]->post_title; ?>"><?php echo strlen($featured_resources[0]->post_title) >= 60 ? substr($featured_resources[0]->post_title, 0, 60) . ' ...' : $featured_resources[0]->post_title; ?></a></p>
                        <p><?php echo strlen($featured_resources[0]->post_excerpt) >= 245 ? substr($featured_resources[0]->post_excerpt, 0, 245) . ' ...' : $featured_resources[0]->post_excerpt; ?></p>
                        <?php
                        if ( isset($reading_time) && $reading_time != '' ) {
                            ?>
                            <p class="read-time"><?php echo $reading_time; ?> Read</p>
                            <?php
                        }

                        if (isset($sponsored_by) && $sponsored_by != '') {
                            ?>
                            <div class="sponsored">
                                <p>Sponsored By <?php echo $sponsored_by; ?></p>
                            </div>
                            <?php
                        }
                        ?> 
                    </div>
                </div>	
            </div>				
        </div>
    </section><!-- hero banner -->
    <?php
}

unset($featured_resources[0]);

if (!empty($featured_resources)) {
    ?>
    <section id="resource_list_container">
        <div class="container">
            <div class="row">
                <?php
                foreach ($featured_resources as $resource) {
                    // Fetch topic of a resource
                    $resource_topics = wp_get_post_terms($resource->ID, 'resource-topic', array("fields" => "names"));
                    if (!empty($resource_topics)) {
                        $topics = 'in ' . implode(", ", $resource_topics);
                        $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
                    } else {
                        $topics = '';
                    }

                    // Reading time
                    $reading_time = $estimated_time->estimate_time_shortcode($resource);

                    // Sponsored By
                    $sponsored_by = get_post_meta($resource->ID, 'wpcf-sponsored-by', true);
                    $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;
                    if (!has_post_thumbnail($resource->ID)) {
                        ?>
                        <div class="col-md-4 featured-article resource-sm-height">
                            <div class="resource-content">
                                <p class="read-date"><?php echo get_the_date('F j, Y', $resource->ID); ?> <b><?php echo $topics; ?></b></p>
                                <p class="featured-title"><a href="<?php echo get_the_permalink($resource->ID); ?>" title="<?php echo $resource->post_title; ?>"><?php echo strlen($resource->post_title) >= 40 ? substr($resource->post_title, 0, 40) . ' ...' : $resource->post_title; ?></a></p>
                                <p class="featured-content"><?php echo strlen($resource->post_excerpt) >= 170 ? substr($resource->post_excerpt, 0, 170) . ' ...' : $resource->post_excerpt; ?></p>
                                <?php
                                if (isset($reading_time) && $reading_time != '') {
                                    ?>
                                    <p class="read-time"><?php echo $reading_time; ?> Read</p>
                                    <?php
                                }

                                if (isset($sponsored_by) && $sponsored_by != '') {
                                    ?>
                                    <div class="sponsored">
                                        <p>Sponsored By <?php echo $sponsored_by; ?></p>

                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-md-8 featured-article">
                            <div class="row">
                                <div class="col-sm-5 col-5-overide">
                                    <?php
                                    if ( has_post_thumbnail($resource->ID) ) {
                                        
                                        $featured_image_or_video = get_post_meta($resource->ID, 'wpcf-featured_image_video', true);
                                        // If video has been selected , fetch thumbnail
                                        if ( $featured_image_or_video == 'video' ) {
                                            $meta  = get_post_meta($resource->ID, '_fvp_video', true);
                                            $video = wp_get_attachment_url($meta['id']);
                                            if ( $video != '' ) {
                                                $src = video_thumbnail( $video , '272x200', $resource );
                                                ?>
                                                <div class="featured-story-image">
                                                    <a href="<?php echo get_the_permalink($resource->ID); ?>" title="<?php echo $resource->post_title; ?>"><img src="<?php echo $src; ?>" /><a>
                                                </div>
                                                <?php
                                            }
                                        }
                                        else { // Display Image
                                            ?>
                                            <div class="featured-story-image">
                                                <a href="<?php echo get_the_permalink($resource->ID); ?>"><?php echo get_the_post_thumbnail($resource->ID, 'large'); ?></a> 
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-7 col-7-overide">
                                    <div class="resource-content">
                                        <p class="read-date"><?php echo get_the_date('F j, Y', $resource->ID); ?> <b><?php echo $topics; ?></b></p>
                                        <p class="featured-title"><a href="<?php echo get_the_permalink($resource->ID); ?>" title="<?php echo $resource->post_title; ?>"><?php echo strlen($resource->post_title) >= 45 ? substr($resource->post_title, 0, 45) . ' ...' : $resource->post_title; ?></a></p>
                                        <p class="featured-content"><?php echo strlen($resource->post_excerpt) >= 200 ? substr($resource->post_excerpt, 0, 200) . ' ...' : $resource->post_excerpt; ?></p>
                                        <?php
                                        if (isset($reading_time) && $reading_time != '') {
                                            ?>
                                            <p class="read-time"><?php echo $reading_time; ?> Read</p>
                                            <?php
                                        }

                                        if (isset($sponsored_by) && $sponsored_by != '') {
                                            ?>
                                            <div class="sponsored">
                                                <p>Sponsored By <?php echo $sponsored_by; ?></p>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>						
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}

wp_reset_postdata();

// Fetch all  resources
$search = isset($_GET['search']) ? $_GET['search'] : NULL;

$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);

if (isset($search) && $search != NULL) {
    $args['tax_query'] = array(array(
            'taxonomy' => 'resource-topic',
            'field' => 'id',
            'terms' => $search
    ));
}
$resources = query_posts($args);

// Fetch Topics 
$topics = get_terms('resource-topic', array(
    'parent' => '0',
    'hide_empty' => 0
        ));
?>
<div id="all_resources_block">
    <div class="container">
        <div class="row">
            <div class="col-md-9 resource-container">						
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        $heading = !empty($resources) ? 'All Resources' : 'No Resource found!';

                        $selected = isset($_GET['search']) ? $_GET['search'] : '';
                        ?>
                        <h2 class="section-heading"><?php echo $heading; ?></h2>
                        <div class="select-topic">
                            <form method="get" id="filter_by_business_type">
                                <select class="form-control" name="search">
                                    <option value="">Filter by Topic</option>
                                    <?php
                                    foreach ($topics as $topic) {
                                        ?>
                                        <option value="<?php echo $topic->term_id; ?>" <?php echo ($topic->term_id == $selected) ? 'selected' : ''; ?>><?php echo $topic->name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </form>
                            <span class="glyphicon glyphicon-menu-down select-drop"></span>
                        </div>
                    </div>
                </div>
                <?php
                if (!empty($resources)) {
                    foreach ($resources as $resource) {

                        // Fetch topic of a resource
                        $resource_topics = wp_get_post_terms($resource->ID, 'resource-topic', array("fields" => "names"));
                        if (!empty($resource_topics)) {
                            $topics = 'in ' . implode(", ", $resource_topics);
                            $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
                        } else {
                            $topics = '';
                        }

                        // Sponsored By
                        $sponsored_by = get_post_meta($resource->ID, 'wpcf-sponsored-by', true);
                        $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;

                        // Reading time
                        $reading_time = $estimated_time->estimate_time_shortcode($resource);

                        //Fetch value from admin whether a video is selected or not.
                        $featured_image_video = get_post_meta($resource->ID, 'wpcf-featured_image_video', true);
                        ?>
                        <div class="row">
                            <div class="col-sm-12 resource-list">
                                <?php
                                if ( has_post_thumbnail($resource->ID) ) {
                                    // If video has been selected , fetch thumbnail
                                    if ( $featured_image_video == 'video' ) {
                                        $meta  = get_post_meta($resource->ID, '_fvp_video', true);
                                        $video = wp_get_attachment_url($meta['id']);
                                        if ( $video != '' ) {
                                            $src = video_thumbnail( $video , '272x200', $resource );
                                            ?>
                                            <div class="resource-image">
                                                <a href="<?php echo get_the_permalink($resource->ID); ?>" title="<?php echo $resource->post_title; ?>"><img src="<?php echo $src; ?>" /><a>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else { // Display Image
                                        ?>
                                        <div class="resource-image">
                                            <a href="<?php echo get_the_permalink($resource->ID); ?>" title="<?php echo $resource->post_title; ?>"><?php echo get_the_post_thumbnail($resource->ID, 'large'); ?></a> 
                                        </div>
                                        <?php
                                    }
                                }    
                                ?>
                                <div class="resource-content">
                                    <p class="read-date"><?php echo get_the_date('F j, Y', $resource->ID); ?> <b><?php echo $topics; ?></b></p>
                                    <p class="featured-title"><a href="<?php echo get_the_permalink($resource->ID); ?>" title="<?php echo $resource->post_title; ?>" ><?php echo esc_attr(strlen($resource->post_title) >= 75 ? substr($resource->post_title, 0, 75) . ' ...' : $resource->post_title); ?></a></p>
                                    <p><?php echo strlen($resource->post_excerpt) >= 145 ? substr($resource->post_excerpt, 0, 145) . ' ...' : $resource->post_excerpt; ?></p>
                                    <?php
                                    if ($reading_time) {
                                        ?>
                                        <p class="read-time"><?php echo $reading_time; ?> Read</p>
                                        <?php
                                    }

                                    if ($sponsored_by != '') {
                                        ?>
                                        <div class="sponsored">
                                            <p>Sponsored By <?php echo $sponsored_by; ?></p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }

                wp_reset_query();
                ?>
                <?php
                if (count($resources) > $show_more_limit) {
                    ?>
                    <div class="show-more-terms show-more-articles">
                        <a href="javascript:void(0)" title="Show More"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                    </div>
                    <?php
                }
                ?>
                <div class="show-less-articles show-more-terms">
                    <a href="javascript:void(0)" title="Show Less"> SHOW LESS <i class="glyphicon glyphicon-chevron-up"></i> </a>
                </div>
            </div>
            <?php get_template_part('resource-sidebar'); ?>
        </div>				
    </div>
</div>
<?php
// Popular topics
if (!empty($popular_topics)) {
    ?>
    <section class="popular-topics">
        <div class="container">					
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="section-heading">Popular Topics</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 topic-list">
                    <?php
                    foreach ($popular_topics as $topic) {
                        ?>
                        <div class="col-sm-4">						
                            <a href="<?php echo get_term_link($topic->term_id); ?>"><?php echo $topic->name; ?></a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>					
        </div>
    </section>
<?php }
?>
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
<?php 
$ebook_heading = get_post_meta($post->ID, 'wpcf-ebook-heading', true);
$ebook_desc    = get_post_meta($post->ID, 'wpcf-ebook-description', true);
?>
<section class="get-e-book">
    <div class="container">					
        <div class="row">
            <div class="col-sm-12">
                <h3 class="section-heading"><?php echo $ebook_heading; ?></h3>
                <p><?php echo $ebook_desc; ?></p>
            </div>
        </div>
        <form id="ebook-form" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <fieldset>
                                <input type="text" class="form-control field-style" placeholder="Email Address">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-sm-4 text-left">
                        <button type="submit" class="btn btn-blue-bg field-style">GET E-BOOK <i class="glyphicon glyphicon-play"></i></button>
                    </div>						
                </div>
            </div>	
        </form>
    </div>
</section>	
<?php get_footer(); ?>
