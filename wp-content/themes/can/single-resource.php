<?php
get_header();
// Start the loop.
while ( have_posts() ) : the_post();
    
    // Fetch topic of a resource
   $resource_topics = wp_get_post_terms(get_the_ID(), 'business-type', array("fields" => "names"));
   if ( !empty($resource_topics) ) {
       $topics = 'in '.implode(",", $resource_topics);
   }
   else {
      $topics = ''; 
   }
    ?>
    <div id="all_resources_block">
        <div class="container">
            <div class="row">
                <div class="col-md-9 resource-container">						
                    <div class="row">
                        <div class="col-sm-12 resource-list" id="post-article">								
                            <?php 
                            if (!has_post_thumbnail(get_the_ID())) {
                               ?>
                                 <div class="resource-image">
                                     <?php echo get_post_thumbnail(get_the_ID(), 'large'); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="resource-content">
                                <p class="read-date"><?php echo get_the_date('F j, Y', get_the_ID()); ?><b> <?php echo $topics; ?> </b></p>
                                <p class="featured-title"><a href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php echo $post->post_title; ?></a></p>
                                <p><?php echo get_the_content(); ?></p>
                                <p class="read-time">8 Min Read</p>
                                <div class="sponsored">
                                    <p>Sponsored By Company</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>				
        </div>
    </div>
    <?php 
endwhile;    
get_footer();