<?php
/*
  Template Name: Resources
 */
get_header();

// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));

// Popular Topics
$popular_topics = get_terms('business-type', array(
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
    'order'   => 'ASC'
);
$featured_resources = query_posts($args);
?>
<section id='search_resource'><!-- Search Resource -->
    <div class="container">
            <div class="row"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search Resources by Keyword" name="s">
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
                            <select class="form-control">
                                <option value="">Filter by Topic</option>
                                <?php
                                foreach ($business_types as $business_type) {
                                    ?>
                                    <option value="<?php echo $business_type->term_id; ?>"><?php echo $business_type->name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
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
    </div>
</section><!-- Search Resource -->
<?php
if (!empty($featured_resources)) {
    // Fetch topic of a resource
    $resource_topics = wp_get_post_terms($featured_resources[0]->ID, 'business-type', array("fields" => "names"));
    if ( !empty($resource_topics) ) {
        $topics = 'in '.implode(", ", $resource_topics);
    }
    else {
       $topics = ''; 
    }
    // Reading time
    $reading_time = get_post_meta($featured_resources[0]->ID, 'wpcf-reading-minutes', true);
    // Sponsored By
    $sponsored_by = get_post_meta($featured_resources[0]->ID, 'wpcf-sponsored-by', true);
    ?>
    <section id="resource_hero"><!-- Resource banner -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="resource-content">
                        <div class="featured-tag gradient-one">
                            <p>FEATURED</p>
                        </div>
                        <p class="read-date"><?php echo get_the_date('F j, Y', $featured_resources[0]->ID); ?> <b><?php echo $topics; ?></b></p>
                        <p class="featured-title"><a href="<?php echo get_the_permalink($featured_resources[0]->ID); ?>" ><?php echo $featured_resources[0]->post_title; ?></a></p>
                        <p><?php echo $featured_resources[0]->post_excerpt; ?></p>
                        <?php
                        if (isset($reading_time) && $reading_time != '') {
                            ?>
                            <p class="read-time"><?php echo $reading_time; ?> Min Read</p>
                            <?php
                        }
                        
                        if ( isset($sponsored_by) && $sponsored_by != '' ) {
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
                    $resource_topics = wp_get_post_terms($resource->ID, 'business-type', array("fields" => "names"));
                    if ( !empty($resource_topics) ) {
                        $topics = 'in '.implode(", ", $resource_topics);
                    }
                    else {
                       $topics = ''; 
                    }

                    // Reading time
                    $reading_time = get_post_meta($resource->ID, 'wpcf-reading-minutes', true);
                    
                    // Sponsored By
                    $sponsored_by = get_post_meta($resource->ID, 'wpcf-sponsored-by', true);
                    if (!has_post_thumbnail($resource->ID)) {
                        ?>
                        <div class="col-md-4 featured-article">
                            <div class="resource-content">
                                <p class="read-date"><?php echo get_the_date('F j, Y', $resource->ID); ?> <b><?php echo $topics; ?></b></p>
                                <p class="featured-title"><a href="<?php echo get_the_permalink($resource->ID); ?>"><?php echo $resource->post_title; ?></a></p>
                                <p><?php echo $resource->post_excerpt; ?></p>
                                <?php
                                if (isset($reading_time) && $reading_time != '') {
                                    ?>
                                    <p class="read-time"><?php echo $reading_time; ?> Min Read</p>
                                    <?php
                                }
                                
                                if ( isset($sponsored_by) && $sponsored_by != '' ) {
                                    ?>
                                    <div class="sponsored">
                                        <p>Sponsored By <?php echo $sponsored_by; ?></p>
                                     </div>
                                    <?php
                                }
                                ?>
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
                                       ?>
                                        <div class="featured-story-image">
                                            <?php echo get_the_post_thumbnail($resource->ID, 'large'); ?> 
                                        </div>
                                       <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-7 col-7-overide">
                                    <div class="resource-content">
                                        <p class="read-date"><?php echo get_the_date('F j, Y', $resource->ID); ?> <b><?php echo $topics; ?></b></p>
                                        <p class="featured-title"><a href="<?php echo get_the_permalink($resource->ID); ?>"><?php echo $resource->post_title; ?></a></p>
                                        <p><?php echo $resource->post_excerpt; ?></p>
                                        <?php
                                        if (isset($reading_time) && $reading_time != '') {
                                            ?>
                                            <p class="read-time"><?php echo $reading_time; ?> Min Read</p>
                                            <?php
                                        }
                                        
                                        if ( isset($sponsored_by) && $sponsored_by != '' ) {
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
    'post_type'      => 'resource',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC'
);

if (isset($search) && $search != NULL ) {
    $args['tax_query'] = array(array(
            'taxonomy' => 'business-type',
            'field'    => 'id',
            'terms'    => $search
    ));
}
$resources = query_posts($args);
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
                                    foreach ($business_types as $business_type) {
                                        ?>
                                        <option value="<?php echo $business_type->term_id; ?>" <?php echo ($business_type->term_id == $selected) ? 'selected' : ''; ?>><?php echo $business_type->name; ?></option>
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
                        $resource_topics = wp_get_post_terms($resource->ID, 'business-type', array("fields" => "names"));
                          if ( !empty($resource_topics) ) {
                            $topics = 'in '.implode(", ", $resource_topics);
                        }
                        else {
                           $topics = ''; 
                        }

                        // Sponsored By
                        $sponsored_by = get_post_meta($resource->ID, 'wpcf-sponsored-by', true);

                        // Reading time
                        $reading_time = get_post_meta($resource->ID, 'wpcf-reading-minutes', true);
                        ?>
                        <div class="row">
                            <div class="col-sm-12 resource-list">
                                <?php
                                if ( has_post_thumbnail($resource->ID) ) {
                                    ?>
                                    <div class="resource-image">
                                     
                                            <?php echo get_the_post_thumbnail($resource->ID); ?>
                                     
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="resource-content">
                                    <p class="read-date"><?php echo get_the_date('F j, Y', $resource->ID); ?> <b><?php echo $topics; ?></b></p>
                                    <p class="featured-title"><a href="<?php echo get_the_permalink($resource->ID); ?>" ><?php echo esc_attr($resource->post_title); ?></a></p>
                                    <p><?php echo $resource->post_excerpt; ?></p>
                                    <?php
                                    if ($reading_time) {
                                        ?>
                                        <p class="read-time"><?php echo $reading_time; ?> Min Read</p>
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
                if ( count($resources) > $show_more_limit ) {
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
            <div class="col-sm-12 col-md-3">
                <div class="row sidebar">
                    <?php
                    // Call resources right sidebar widget area
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Resources right sidebar')) :
                    endif;
                    ?>
                    <div class="col-xs-12 post-section">
                        <h2 class="section-heading">CAN Capital Newsletter</h2>
                        <div class="col-xs-12 post-information">
                            <p>Stay up to date with the latest financial advice.</p>
                            <div class="news-letter-field">
                                <input type="text" class="form-control field-style" placeholder="Email Address">
                                <button type="submit" class="btn btn-blue-bg field-style">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 post-section hidden-xs">
                        <h2 class="section-heading">Get Funded</h2>
                        <div class="col-xs-12 post-information">
                            <p>Smart, simple & fast</p>
                            <div class="get-funded">
                                <a href="#" class="btn btn-blue-bg field-style">APPLY NOW <i class="glyphicon glyphicon-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        <h1 class="section-heading"> Get Funded </h1>
        <h3> Smart, Simple & Fast. </h3>
        <a href="javascript:void(0);" title="APPLY NOW" class="btn btn-blue-bg"> APPLY NOW <i class="glyphicon glyphicon-play"></i></a>
    </div>
</section>
<section class="get-e-book">
    <div class="container">					
        <div class="row">
            <div class="col-sm-12">
                <h3 class="section-heading">Reach Your Financial Goals With The E-book</h3>
                <p>The free e-book comes with a weekly newsletter on business funding.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control field-style" placeholder="Email Address">
                    </div>
                </div>
                <div class="col-sm-4 text-left">
                    <button type="submit" class="btn btn-blue-bg field-style">GET E-BOOK <i class="glyphicon glyphicon-play"></i></button>
                </div>						
            </div>
        </div>					
    </div>
</section>	
<?php get_footer(); ?>