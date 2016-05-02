<?php
get_header();

// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));

$linkedin_url = "http://www.linkedin.com/shareArticle?mini=true&url=".get_the_permalink($post->ID)."&summary=inQbation%20provides%20world%20class%20web%20sites%20that%20source=inqbation.com";
?>
<section id='search_resource'><!-- Search Resource -->
    <div class="container">
        <div class="row"> 
            <form method="get" action="<?php echo get_the_permalink('597'); ?>" id="resource-search">
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
                    <div class="col-sm-3 hidden-xs">
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
            </form>
        </div>
    </div>
</section><!-- Search Resource -->
<?php
while ( have_posts() ) : the_post();
    $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(1144, 493), false, '');
    $src =  $src[0];
    $meta = get_post_meta($post->ID, '_fvp_video', true);

    $video = wp_get_attachment_url($meta['id']);
    if ( $video != '') {
        // Script to generate thumbnail from video* */
      $ffmpeg = 'ffmpeg';

      // where you'll save the image
      $upload_url = wp_upload_dir();
      $image = $upload_url['basedir'] . "/thumbnails/" . $post->ID . ".jpg";

      // default time to get the image
      $second = 1;

      // get the duration and a random place within that
      $cmd = "$ffmpeg -i $video 2>&1";
      if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
          $total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
          $second = rand(1, ($total - 1));
      }

      // get the screenshot
      $cmd = "$ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -s 1000x1000 -vcodec mjpeg -f mjpeg $image 2>&1";
      $return = `$cmd`;
      //Script Ends here* */
      $src = $upload_url['baseurl'] . "/thumbnails/" . $post->ID . ".jpg";
    }
      
    ?>
    <section id="resource_hero" style="background-image: url('<?php echo $src; ?>')" ><!-- Resource banner -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default large-size-icon" data-toggle="modal" data-target="#myModal">
            See Full Image <i class="glyphicon glyphicon-resize-full"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body text-center">
                        <?php echo get_the_post_thumbnail($post->ID, 'resource-featured', array('class' => 'img-responsive')); ?>
                        <small>Mauris ultrices velit consequat, imperdiet nisi in, rutrum mi. Morbi viverra vitae ante eu finibus. Photo by Laura Etellie</small>
                    </div>
                </div>
            </div>
        </div>                
    </section>
    <!-- hero banner -->
    <!-- social media section -->
    <div id="social-media-section">
        <div class="social-media hidden-xs">
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
                    <a href="<?php echo $linkedin_url;  ?>"  title="Linkdin" id="linkedin-share-button">
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
            //$topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
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
                    // Reading time
                    $reading_time = get_post_meta($post->ID, 'wpcf-reading-minutes', true);
                    if ($reading_time != '') {
                        ?>
                        <p class="read-time"><?php echo $reading_time; ?> Min Read</p>
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
                        if ( is_array($tags) ) {
                            ?>
                            <div class="btn-block">
                                <button type="button" class="btn btn-theme"> Tag </button>
                                <?php
                                foreach ($tags as $tag) {
                                    ?>
                                    <button type="button" class="btn btn-theme"><?php echo $tag->name; ?></button>
                                    <?php
                                }
                                ?>
                            </div>  <!-- buttons -->
                            <?php
                        }
                        ?>
                        <div class="social-media hidden-lg"><h3>Share</h3><ul>
                                <li>
                                    <a href="javascript:void(0);" target="_blank" title="twitter">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/home/twitter_icon.png" alt="twitter share"></a></li>
                                <li>
                                    <a href="javascript:void(0);" target="_blank" title="facebook">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/home/facebook_icon.png" alt="facebook share"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" target="_blank" title="Linkdin">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/home/linkedin_icon.png" alt="linkdin share"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="client-testimonials">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <?php echo get_avatar($post->post_author, 'thumbnail'); ?> 
                                    </a>
                                </div>
                                <div class="media-body">
                                    <?php the_author_posts_link(); ?>
                                    <h4 class="media-heading"><a href="<?php echo get_the_author_link(); ?>"><?php echo $author->display_name; ?></a></h4>
                                    <?php
                                    $author_description = get_user_meta($post->post_author, 'description', true);
                                    if ($author_description != '') {
                                        echo $author_description;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social media section -->
    <!-- Related Articles section -->
    <?php
    $temp_tags = array();
    if ( is_array($tags) ) {
        foreach ($tags as $tag) {
            $temp_tags[] = $tag->term_id;
        }
    }
   
    $args = array(
        'post_type'    => 'resource',
        'post_status'  => 'publish',
        'showposts'    => 3,
        'orderby'      => 'menu_order date',
        'order'        => 'DESC',
        'post__not_in' => array($post->ID),
        'tax_query'   => array(array(
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
                                $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
                            } else {
                                $topics = '';
                            }
                            
                             // Reading time
                             $reading_time = get_post_meta($post->ID, 'wpcf-reading-minutes', true);
                            ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <?php 
                                    if (has_post_thumbnail(get_the_ID())) {
                                        echo get_the_post_thumbnail(get_the_ID(), 'related-articles' , array('class' => 'img-responsive hidden-xs')); 
                                    } 
                                    ?>
                                    <div class="caption">
                                        <p class="read-date"><span><?php echo $topics; ?></span> • <?php echo get_the_date('F j, Y', $post->ID); ?></p>
                                        <h3><?php echo esc_attr(strlen(get_the_title()) >= 45 ? substr(get_the_title(), 0, 45) . ' ...' : get_the_title()); ?></h3>
                                        <p class="hidden-xs"><?php echo strlen(get_the_content()) >= 145 ? substr(get_the_content(), 0, 145) . ' ...' : get_the_content(); ?></p>
                                        <?php
                                        if (isset($reading_time) && $reading_time != '') {
                                            ?>
                                            <p class="read-time hidden-xs"><?php echo $reading_time; ?> Min Read</p>
                                            <?php
                                        } ?>
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
                    if ( $newsletter['heading'] != '' ) {
                        ?>
                        <h3 class="section-heading news-letter-heading"><?php echo $newsletter['heading']; ?></h3>
                        <?php
                    }
                    
                    if ( $newsletter['description'] != '' ) {
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
                                    <input type="text" class="form-control field-style" placeholder="Email" name="email">
                                <fieldset>
                            </div>
                            <small>We never share your information</small>
                        </div>
                        <div class="col-sm-4 btn-left">
                            <button type="submit" class="btn btn-blue-bg field-style" name="subscribe_newsletter">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
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
            <h2 class="section-heading"> Get Funded </h2>
            <h3> Smart, Simple & Fast. </h3>
            <a href="javascript:void(0);" title="APPLY NOW" class="btn btn-blue-bg"> APPLY NOW <i class="glyphicon glyphicon-play"></i></a>
        </div>
    </section>
    <!-- Get Funded -->
    <?php
endwhile; 
?>
<?php get_footer(); ?>
