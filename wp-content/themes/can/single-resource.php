<?php
// Include header file
get_header();

// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));

// Include search template
get_template_part('resource-search-template'); 

// Single page detail
while (have_posts()) : the_post();

    //create a object to show estimated reading time for a post.
    $estimated_time = new EstimatedPostReadingTime();
    // Reading time
    $reading_time = $estimated_time->estimate_time_shortcode($post);
    
    $src        = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(1144, 493), false, '');
    $image_src  = $src =  $src[0];
    
    $meta =  get_post_meta($post->ID, '_fvp_video', true);
   
    $label  = "Image";
    if ( is_array($meta) && array_key_exists('id',$meta ) ) {
        $src  = wp_get_attachment_url($meta['id']);
        $label  = "Video";
    }
    ?>
    <section id="resource_hero"><!-- Resource banner -->
         <?php
          if ( $image_src != NULL || $src != NULL ) {
              ?>
            <div class="img-block" style="background-image: url('<?php echo $image_src; ?>')"></div>
              <?php
          }
          ?>
        <!-- Button trigger modal -->
        <a href="<?php echo $src; ?>" data-webm="<?php echo $src; ?>" class="html5lightbox btn btn-default large-size-icon">See Full <?php echo $label; ?> <i class="glyphicon glyphicon-resize-full"></i></a>         
    </section>
       
    <!-- hero banner -->
    <!-- social media section -->
    <div id="social-media-section">
        <div class="social-media hidden-xs fixedElement">
            <h3>Share</h3>
            <ul>
                <li>
                    <a class="twitter-share-button"
                       href="https://twitter.com/share"
                       data-size="large"
                       data-url=https://www.cancapital.com/"
                       data-via="twitterdev"
                       data-related="twitterapi,twitter"
                       data-hashtags="example,demo"
                       data-text="custom share text" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/images/home/twitter_icon.png" alt="twitter share">
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" target="_blank" title="facebook" id="fb-share-button">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/home/facebook_icon.png" alt="facebook share">
                    </a>
                </li>
                <li>
                    <?php 
                    $linkedin_url = "http://www.linkedin.com/shareArticle?mini=true&url=" . get_the_permalink($post->ID) . "&summary=inQbation%20provides%20world%20class%20web%20sites%20that%20source=inqbation.com";
                    ?>
                    <a href="<?php echo $linkedin_url; ?>"  title="Linkdin" id="linkedin-share-button" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/home/linkedin_icon.png" alt="linkdin share">
                    </a>
                </li>
            </ul>
        </div>
        <?php
        // Fetch topic of a resource
        $resource_topics = wp_get_post_terms($post->ID, 'resource-topic', array("fields" => "names"));
        if (!empty($resource_topics)) {
            $topics = implode(", ", $resource_topics);
            //$topics = strlen($topics) >= 105 ? substr($topics, 0, 105) . ' ...' : $topics;
        } else {
            $topics = '';
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="featured-title"><?php echo strtoupper($topics); ?> <span> • <?php echo get_the_date('F j, Y', $post->ID); ?></span></p>
                    <h1 class="section-heading"><?php echo $post->post_title; ?></h1>
                    <?php
                    $author = get_userdata($post->post_author);
                    ?>
                    <h3 class="customer-info">By <?php echo $author->display_name; ?> </h3>
                    <?php
                    if ($reading_time) {
                        ?>
                        <p class="read-time"><?php echo $reading_time; ?> Read</p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-area">
                        <?php the_content(); ?>
                        <?php
                        // Fetch tags of a resource
                        $tags = get_the_terms($post->ID, 'resource-tag');
                        if (is_array($tags)) {
                            ?>
                            <div class="btn-block">
                                <?php
                                foreach ($tags as $tag) {
                                    ?>
                                    <button type="button" class="btn btn-theme" onclick="location.href = '<?php echo get_the_permalink(597); ?>?keyword=<?php echo $tag->name; ?>&business-type=';"><?php echo $tag->name; ?></button>
                                    <?php
                                }
                                ?>
                            </div>  <!-- buttons -->
                            <?php
                        }
                        
                        // Sponsored By
                        $sponsored_by = get_post_meta($post->ID, 'wpcf-sponsored-by', true);
                        if ( $sponsored_by != '' ) {
                            $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;
                            ?>
                            <div class="sponsored">
                                <p>Sponsored By <?php echo $sponsored_by; ?></p>
                            </div>
                            <?php
                        }
                      
                        ?>
                        <div class="social-media hidden-lg"><h3>Share</h3><ul>
                                <li>
                                   <a class="twitter-share-button"
                                        href="https://twitter.com/share"
                                        data-size="large"
                                        data-url=https://www.cancapital.com/"
                                        data-via="twitterdev"
                                        data-related="twitterapi,twitter"
                                        data-hashtags="example,demo"
                                        data-text="custom share text" target="_blank"> 
                                       <img src="<?php echo get_template_directory_uri(); ?>/images/home/twitter_icon.png" alt="twitter share">
                                     </a>
                                <li>
                                   <a href="javascript:void(0);" target="_blank" title="facebook" id="fb-share-button">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/home/facebook_icon.png" alt="facebook share"></a>
                                </li>
                                <li>
                                    <a href="<?php echo $linkedin_url; ?>"  title="Linkdin" id="linkedin-share-button" target="_blank">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/home/linkedin_icon.png" alt="linkdin share"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="client-testimonials">
        <div class="media">
            <div class="media-left">
                <?php echo get_avatar($post->post_author, '85'); ?> 
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php the_author_posts_link(); ?></h4>
                <?php 
                $user_title = get_user_meta($post->post_author, 'wpcf-user-title', true); 
                if ( $user_title != '' ) {
                    ?>
                    <h5><?php echo $user_title; ?></h5>
                    <?php
                }
                ?>
                <?php
                $author_description = get_user_meta($post->post_author, 'description', true);
                if ($author_description != '') {
                    echo $author_description;
                }
                ?>
            </div>
        </div>
    </div>
    <!-- social media section -->
    <!-- Related Articles section -->
    <?php
    $temp_tags = array();
    if (is_array($tags)) {
        foreach ($tags as $tag) {
            $temp_tags[] = $tag->term_id;
        }
    }

    $args = array(
        'post_type' => 'resource',
        'post_status' => 'publish',
        'showposts' => 3,
        'orderby' => 'menu_order date',
        'order' => 'DESC',
        'post__not_in' => array($post->ID),
        'tax_query' => array(array(
                'taxonomy' => 'resource-tag',
                'field' => 'id',
                'terms' => $temp_tags
            ))
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
                                        <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo esc_attr(strlen(get_the_title()) >= 45 ? substr(get_the_title(), 0, 45) . ' ...' : get_the_title()); ?></a></h3>
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
    wp_reset_postdata();
    ?>
    <!-- Related Articles section -->
    <!-- CAN Capital Newslette -->
    <?php
    // Newsletter
    $newsletter = get_option('news_letter_data');
    ?>
    <section class="gradient-one" id="cc-newslette">
        <div class="container">					
            <div class="row">
                <div class="col-sm-12">
    <?php
    if ($newsletter['heading'] != '') {
        ?>
                        <h3 class="section-heading news-letter-heading"><?php echo $newsletter['heading']; ?></h3>
                        <?php
                    }

                    if ($newsletter['description'] != '') {
                        ?>
                        <p><?php echo $newsletter['description']; ?></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <form method="post" id="newsletter-subscription">
                    <div class="col-sm-12">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <fieldset>
                                    <input type="text" class="form-control field-style" placeholder="Email Address" name="email">
                                    <fieldset>
                                        </div>
                                        <small>We never share your information</small>
                                        </div>
                                        <div class="col-sm-4 btn-left">
                                            <button type="submit" class="btn btn-blue-bg field-style newsletter-button" name="subscribe_newsletter">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
                                              <div id="newsltter-loader-conatiner">
                                                <img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/images/loading_blue_small.gif" style="display:none;" />
                                            </div>
                                        </div>						
                                        </div>
                                        </form>
                                        </div>					
                                        </div>
                                        </section>
                                        <!-- CAN Capital Newslette -->
                                        <!-- Get Funded -->
                                        <section class="get-funded">
                                            <div class="container text-center">
                                               <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
                                                <h3> <?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></h3>
                                                <?php dynamic_sidebar('applynow'); ?>
                                            </div>
                                        </section>
                                        <!-- Get Funded -->
    <?php
endwhile;
?>
                                    <?php get_footer(); ?>
