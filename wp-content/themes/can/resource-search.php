<?php 
/*
  Template Name: Resource Search
 */
get_header();

// Fetch Topics 
$topics = get_terms('resource-topic', array(
    'parent'        => '0',
    'hide_empty'    => 0
        ));

// Fetch filtered resources 
$search_term = esc_html($_GET['keyword']); 

// Most recent resources sorting array
$args = array(
    'post_type'   => 'resource',
    'post_status' => 'publish',
    'showposts'   => $show_more_limit,
    'orderby'     => 'menu_order date',
    'order'       => 'DESC'
);

// Most Popular sorting array
$most_popular_args = array(
            'posts_per_page'      => $show_more_limit,
            'post_status'         => 'publish',
            'meta_key'            => '_count-views_all', 
            'meta_value_num'      => '0',
            'meta_compare'        => '>',
            'orderby'             => 'meta_value_num',
            'order'               => 'DESC',
            's'                   => $search_term,
            'post_type'           => 'resource'
        );

if ($search_term != '') {
    $most_popular_args['s'] = $args['s'] = $search_term;
}

// If only business type selected
if (isset($_GET['business-type']) && $_GET['business-type'] != '') {
    $most_popular_args['tax_query'] = $args['tax_query'] = array(array(
            'taxonomy' => 'business-type',
            'field'    => 'id',
            'terms'    => $_GET['business-type']
    ));
}

$filtered_topics = isset($_GET['topics']) ? $_GET['topics'] : array();

// If only topics are selected	
if (count($filtered_topics)) {
    $most_popular_args['tax_query'] = $args['tax_query'] = array(array(
        'taxonomy' => 'resource-topic',
        'field'    => 'id',
        'terms'    => $filtered_topics
    ));
}

if ((isset($_GET['business-type']) && $_GET['business-type'] != '') && count($filtered_topics) ) {
    $most_popular_args['tax_query'] = $args['tax_query'] = array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'business-type',
            'field'    => 'id',
            'terms'    => $_GET['business-type']
        ),
        array(
            'taxonomy' => 'resource-topic',
            'field'    => 'id',
            'terms'    => $filtered_topics
        )
    );
}

$most_popular_resources = new WP_Query($most_popular_args);
?>
<?php get_template_part('resource-search-template'); ?>
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
                            foreach ($topics as $key => $value ) {
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
                            <h4 class="result-count"><strong><?php echo $most_popular_resources->found_posts; ?></strong> result<?php echo $resources->found_posts > 1 ? 's' : ''; ?></h4>
                            <div class="search-tab-button">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#mostPopular" aria-controls="mostPopular" role="tab" data-toggle="tab">Most Popular</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#mostRecent" aria-controls="mostRecent" role="tab" data-toggle="tab">Most Recent</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                                                    
                    <div class="col-xs-12 ">
                        <div class="resource-container">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="mostPopular">
                                    <?php
                                    if ($most_popular_resources->have_posts()) {
                                        while ($most_popular_resources->have_posts()) : $most_popular_resources->the_post();
                                            echo search_sort_resources_array( $post );
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
                                    
                                    if ( $most_popular_resources->found_posts > $show_more_limit ) {
                                        ?>
                                        <div class="show-more-terms">
                                            <a href="javascript:void(0);" title="Show more" class="resource-filter-paging"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                                            <input type="hidden" id="show-more-popular-resources"  value="2" name="show_more_popular_resources" />
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div id="loader-conatiner">
                                        <img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" style="display:none;" />
                                    </div>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="mostRecent">
                                    <?php
                                    wp_reset_postdata();
                                    $resources = new WP_Query($args);
                                  
                                    if ($resources->have_posts()) {
                                        while ($resources->have_posts()) : $resources->the_post();
                                           echo search_sort_resources_array( $post );
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
                                 
                                    if ( $resources->found_posts > $show_more_limit ) {
                                        ?>
                                        <div class="show-more-terms">
                                            <a href="javascript:void(0);" title="Show more" class="resource-filter-paging"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                                            <input type="hidden" id="show-more-most-recent-resources"  value="2" name="show_more_most_recent_resources" />
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div id="loader-conatiner">
                                        <img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" style="display:none;" />
                                    </div>
                                </div>
                            </div> 
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
