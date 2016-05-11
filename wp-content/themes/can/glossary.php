<?php
/*
  Template Name: glossary
 */
get_header();
// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));

// Resources
$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
    'posts_per_page' => 20,
    'orderby' => 'post_title',
    'order' => 'asc'
);
$resources = new WP_Query($args);

$glossary = array();
if ($resources->have_posts()) :
    while ($resources->have_posts()) : $resources->the_post();
        if (preg_match("/^[a-zA-Z]+$/", substr(strtoupper(get_the_title()), 0, 1))) {
            $glossary[substr(strtoupper(get_the_title()), 0, 1)][] = get_the_title();
        } else {
            $glossary["#"][] = get_the_title();
        }

    endwhile;
endif;
?>
<?php get_template_part('resource-search-template'); ?>
<div id="all_resources_block" class="glossary-mob-top-border">
    <div class="container">
        <div class="row">
            <div class="col-md-9 resource-container resources-glossary" id="mostRecentGlossary">                                            <?php
                foreach ($glossary as $index => $valueArr) {
                    ?>
                    <div class="row glossary-row">
                        <div class="col-sm-12">
                            <h2 class="section-heading"><?php echo $index; ?></h2>
                            <?php foreach ($valueArr as $key => $value) { ?>
                            <p class="featured-title"><a href="<?php echo get_the_permalink($value->ID); ?>"><?php echo(strlen($value) > 50) ? substr($value, 0, 49) . "..." : $value; ?></a></p>
                            <?php } ?>
                        </div>
                    </div>   
                <?php }
                if ($resources->found_posts > $show_more_limit) {
                    ?>
                    <div class="show-more-terms glossary-show-more">
                        <a href="javascript:void(0);" title="Show more" class="glossary-filter-paging"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                        <input type="hidden" id="glossary-filtered-resources-offset"  value="2" name="glossary" />
                    </div>
                    <div id="loader-conatiner show-more-terms">
                        <img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" style="display:none;"/>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
            wp_reset_postdata();
            get_template_part('resource-sidebar'); 
            ?>
        </div>
    </div>				
</div>
<?php
get_footer();
