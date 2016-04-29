<?php 
/*
  Template Name: Resource Search
 */
get_header();

// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));

// Fetch Topics 
$topics = get_terms('resource-topic', array(
    'parent' => '0',
    'hide_empty' => 0
        ));

// Fetch filtered resources 
$search_term = $_GET['keyword'];
$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
    //'posts_per_page'   => $show_more_limit,
    //'offset'           => 1,
    'showposts' => $show_more_limit,
    // 's'                => $search_term,
    'orderby' => 'menu_order date',
    'order' => 'DESC'
);

if ($search_term != '') {
    $args['s'] = $search_term;
}

// If only business type selected
if (isset($_GET['business-type']) && $_GET['business-type'] != '') {
    $args['tax_query'] = array(array(
            'taxonomy' => 'business-type',
            'field' => 'id',
            'terms' => $_GET['business-type']
    ));
}

$filtered_topics = isset($_GET['topics']) ? $_GET['topics'] : array();


// If only topics are selected	
if (count($filtered_topics)) {
    $args['tax_query'] = array(array(
            'taxonomy' => 'resource-topic',
            'field' => 'id',
            'terms' => $filtered_topics
    ));
}

if ((isset($_GET['business-type']) && $_GET['business-type'] != '') && count($filtered_topics)) {
    $args['tax_query'] = array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'business-type',
            'field' => 'id',
            'terms' => $_GET['business-type']
        ),
        array(
            'taxonomy' => 'resource-topic',
            'field' => 'id',
            'terms' => $filtered_topics
        )
    );
}

$resources = new WP_Query($args);
//prx($resources);
?>
<section id="search_resource"><!-- Search Resource -->
    <div class="container">
        <form method="get" action="<?php echo get_the_permalink('597'); ?>" id="resource-search">
            <div class="row"> 
                <div class="col-sm-5 col-md-6">
                    <div class="form-group"> 
                        <fieldset>
                            <input type="text" class="form-control" placeholder="Search" value="<?php echo $_GET['keyword']; ?>" name="keyword" id="search-keyword" />
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
                                        <option value="<?php echo $business_type->term_id; ?>" <?php echo ($business_type->term_id == $_GET['business-type']) ? 'selected' : '';
                                        ?>><?php echo $business_type->name; ?></option>
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
                        <button class="btn btn-blue-bg btn-go field-style">Go</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!-- Search Resource -->
<div id="all_resources_block" class="search-result">
    <div class="container">
        <div class="row">
            <?php
            if (count($topics)) {
                ?>
                <div class="col-sm-12 col-md-3 hidden-xs">
                    <div class="sidebar">
                        <h3 class="section-heading">Refine By Topic</h3>
                        <form method="get" action="<?php echo get_the_permalink('597'); ?>" id="refine-by-topic-form">
                            <input type="hidden" name="keyword" value="<?php echo $_GET['keyword']; ?>" />
                            <input type="hidden" name="business-type" value="<?php echo $_GET['business-type']; ?>" />
                            <?php
                            foreach ($topics as $key => $value) {
                                $diabled = ($value->count == 0) ? "disabled" : '';
                                $checked = (in_array($value->term_id, $filtered_topics)) ? 'checked' : '';
                                ?>
                                <fieldset class="form-group">															
                                    <input type="checkbox" class="form-control refine-by-topic-checkbox" id="<?php echo $value->term_id; ?>" name="topics[]" value="<?php echo $value->term_id; ?>" <?php echo $diabled; ?> <?php echo $checked; ?> />
                                    <label for="<?php echo $value->term_id; ?>"><span></span><?php echo $value->name; ?> <i>. <?php echo $value->count; ?></i></label>								
                                </fieldset>
                                <?php
                            }
                            ?>
                        </form>

                    </div>
                    <div class="clear-all">
                        <button class="btn">Clear All</button>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-md-9 search-result-list">						
                <div class="row">
                    <div class="col-sm-12">
                        <div class="search-header">
                            <h4 class="result-count"><strong><?php echo $resources->found_posts; ?></strong> result<?php echo $resources->found_posts > 1 ? 's' : ''; ?></h4>
                            <div class="search-tab-button">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class=""><a href="#mostPopular" aria-controls="mostPopular" role="tab" data-toggle="tab">Most Popular</a></li>
                                    <li role="presentation" class="active"><a href="#mostRecent" aria-controls="mostRecent" role="tab" data-toggle="tab">Most Recent</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>                                                    
                    <div class="col-xs-12 ">
                        <div class="resource-container">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="mostPopular">
                                    <div class="row">
                                        <div class="col-sm-12 resource-list">								
                                            <h3 class="section-heading">Yet to integrate!</h3>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade  in active" id="mostRecent">
                                    <?php
                                    if ($resources->have_posts()) {
                                        while ($resources->have_posts()) : $resources->the_post();
                                            // Fetch topic of a resource
                                            $resource_topics = wp_get_post_terms($post->ID, 'resource-topic', array("fields" => "names"));
                                            if (!empty($resource_topics)) {
                                                $topics = 'in ' . implode(", ", $resource_topics);
                                                $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
                                            } else {
                                                $topics = '';
                                            }

                                            //Fetch value from admin whether a video is selected or not.
                                            $featured_image_video = get_post_meta($post->ID, 'wpcf-featured_image_video', true);

                                            // Sponsored By
                                            $sponsored_by = get_post_meta($post->ID, 'wpcf-sponsored-by', true);
                                            $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;

                                            // Reading time
                                            $reading_time = get_post_meta($post->ID, 'wpcf-reading-minutes', true);
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-12 resource-list">								
                                                    <?php
                                                    if ((has_post_video($post->ID) && $featured_image_video == 'video') || (has_post_thumbnail($post->ID) && $featured_image_video == 'image')) {
                                                        ?>
                                                        <div class="resource-image">

                                                            <?php echo get_the_post_thumbnail($post->ID); ?>

                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="resource-content">
                                                        <p class="read-date"><?php echo get_the_date('F j, Y', $post->ID); ?> <b><?php echo $topics; ?></b></p>
                                                        <p class="featured-title"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo esc_attr(strlen($post->post_title) >= 75 ? substr($post->post_title, 0, 75) . ' ...' : $post->post_title); ?></a></p>
                                                        <p><?php echo strlen($post->post_excerpt) >= 145 ? substr($post->post_excerpt, 0, 145) . ' ...' : $post->post_excerpt; ?></p>
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
                                        endwhile;
                                    } else {
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-12 resource-list">	
                                                <h3 class="section-heading">No resource found!</h3>
                                            </div>
                                        </div>
    <?php
}
?>
                                </div>
                            </div> 
                        </div>
<?php
if ($resources->found_posts > $show_more_limit) {
    ?>
                            <div class="show-more-terms">
                                <a href="javascript:void(0);" title="Show more" class="resource-filter-paging"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                                <input type="hidden" id="show-more-filtered-resources-offset"  value="2" name="resourceFilterPaging" />
                            </div>
    <?php
}
?>
                        <div id="loader-conatiner show-more-terms">
                            <img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/images/loader.png" style="display:none;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>				
</div>
</div>
<?php wp_reset_postdata(); ?>
<section  class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
        <h3> <?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>