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
    'showposts' => -1,
    'orderby' => 'post_title',
    'order' => 'asc'
);
$resources = new WP_Query( $args );

$glossary = $glossaryInteger = array();
if ( $resources->have_posts() ) :
  while ($resources->have_posts()) : $resources->the_post();
        if(preg_match("/^[a-zA-Z]+$/",substr(strtoupper(get_the_title()), 0, 1))){
            $glossary[substr(strtoupper(get_the_title()), 0, 1)][] = get_the_title();
        }else{
            $glossaryInteger["#"][] = get_the_title();
        }
        
  endwhile;
endif;
ksort($glossary);
$mergeGlossary = array_merge($glossary,$glossaryInteger);

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
            <div id="all_resources_block" class="glossary-mob-top-border">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 resource-container resources-glossary" id="mostRecentGlossary">                                            <?php 
                        foreach($mergeGlossary as $index => $valueArr){
                        ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="section-heading"><?php echo $index; ?></h2>
                                    <?php foreach($valueArr as $key => $value){ ?>
                                    <p><?php echo(strlen($value) > 50)?substr($value,0,49)."...":$value; ?></p>
                                    <?php } ?>
                                </div>
                            </div>   
                        <?php }                    
/*if ($resources->found_posts > $show_more_limit) {   ?>
                            <div class="show-more-terms">
                                <a href="javascript:void(0);" title="Show more" class="glossary-filter-paging"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                                <input type="hidden" id="show-more-filtered-resources-offset"  value="2" name="resourceFilterPaging" />
                            </div>
    <?php
} */
?>
                        </div>

                        <div class="col-sm-12 col-md-3 mob-grey-bg">
                            <div class="row sidebar">
                    <?php
// Call resources right sidebar widget area
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Resources right sidebar')) :
                    endif;
                    ?>
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0 post-section">
                        <h2 class="section-heading">CAN Capital Newsletter</h2>
                        <div class="col-xs-12 post-information">
                            <p>Stay up to date with the latest financial advice.</p>
                            <div class="news-letter-field">
                                <input type="text" class="form-control field-style" placeholder="Email Address">
                                <button type="submit" class="btn btn-blue-bg field-style">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0 post-section hidden-xs">
                        <h2 class="section-heading"><?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
                        <div class="col-xs-12 post-information">
                            <p><?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></p>
                            <div class="get-funded">
                                <!-- applynow widget section -->
                                <?php if (is_active_sidebar('applynow')) : ?>
                                    <div class="widget-area applynow" role="complementary">
                                        <?php dynamic_sidebar('applynow'); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>	
                                <!--applynow widget ends here-->
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>				
            </div>
<?php
get_footer();
