<?php
// Fetured resources
$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => array(array(
            'key' => '_is_featured',
            'value' => 'yes'
        )),
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$featured_resources = query_posts($args);
$mobile_featured_resources = array();
?>
<section id="home_resource_list" class="hidden-xs">
    <div class="resource-list-bg gradient-three ">
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="inspiration-content">
                        <h3 class="section-heading">Insights & <br/> Inspiration</h3>
                        <a class="btn btn-blue-bg see-all-resources" href="<?php echo get_the_permalink(121); ?>" title="SEE ALL RESOURCES"> SEE ALL RESOURCES </a>
                    </div>
                </div>
                <?php
                $top_featured_resource = $featured_resources[0];
                // Fetch topic of a resource
                $resource_topics = wp_get_post_terms($top_featured_resource->ID, 'business-type', array("fields" => "names"));
                if (!empty($resource_topics)) {
                    $topics = 'in ' . implode(", ", $resource_topics);
                } else {
                    $topics = '';
                }

                // Reading time
                $reading_time = get_post_meta($top_featured_resource->ID, 'wpcf-reading-minutes', true);

                // Sponsored By
                $sponsored_by = get_post_meta($top_featured_resource->ID, 'wpcf-sponsored-by', true);
                ?>
                <div class="col-md-8 clearfix">
                    <div class="row">
                        <div class="col-sm-5 col-5-overide">
                            <?php
                            if (has_post_thumbnail($top_featured_resource->ID)) {
                                ?>
                                <div class="featured-story-image">
                                    <?php echo get_the_post_thumbnail($top_featured_resource->ID, 'large'); ?> 
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-sm-7 col-7-overide">
                            <div class="resource-content">
                                <p class="read-date"><?php echo get_the_date('F j, Y', $top_featured_resource->ID); ?> <b><?php echo $topics; ?></b></p>
                                <p class="featured-title"><a href="<?php echo get_the_permalink($top_featured_resource->ID); ?>"><?php echo $resource->post_title; ?></a></p>
                                <p><?php echo $top_featured_resource->post_excerpt; ?></p>
                                <?php
                                if (isset($reading_time) && $reading_time != '') {
                                    ?>
                                    <p class="read-time"><?php echo $reading_time; ?> Min Read</p>
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
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                array_shift($featured_resources);
                foreach ($featured_resources as $resource) {
                    // Fetch topic of a resource
                    $resource_topics = wp_get_post_terms($resource->ID, 'business-type', array("fields" => "names"));
                    if (!empty($resource_topics)) {
                        $topics = 'in ' . implode(", ", $resource_topics);
                    } else {
                        $topics = '';
                    }

                    // Reading time
                    $reading_time = get_post_meta($resource->ID, 'wpcf-reading-minutes', true);

                    // Sponsored By
                    $sponsored_by = get_post_meta($resource->ID, 'wpcf-sponsored-by', true);
                    if (!has_post_thumbnail($resource->ID)) {
                        ?>
                        <div class="col-md-4 clearfix">
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
                                ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-md-8 clearfix">
                            <div class="row">
                                <div class="col-sm-5 col-5-overide">
                                    <?php
                                    if (has_post_thumbnail($resource->ID)) {
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
    </div>
</section>
<section id="home_resource_list" class="visible-xs">
    <div class="resource-list-bg gradient-three">
        <div class="container">
            <div>
                <h3 class="section-heading">Insights & <br/> Inspiration</h3>
            </div>
            <div id="resource_slider" class="owl-carousel owl-theme">
                <?php
                array_unshift($featured_resources, $top_featured_resource);

                foreach ($featured_resources as $resource) {
                    // Fetch topic of a resource
                    $resource_topics = wp_get_post_terms($resource->ID, 'business-type', array("fields" => "names"));
                    if (!empty($resource_topics)) {
                        $topics = 'in ' . implode(", ", $resource_topics);
                    } else {
                        $topics = '';
                    }

                    // Reading time
                    $reading_time = get_post_meta($resource->ID, 'wpcf-reading-minutes', true);

                    // Sponsored By
                    $sponsored_by = get_post_meta($resource->ID, 'wpcf-sponsored-by', true);
                    ?>
                    <div class="item">
                        <div class="resource-content">
                            <p class="read-date"><?php echo get_the_date('F j, Y', $resource->ID); ?> <b><?php echo $topics; ?></b></p>
                            <p class="featured-title"><a href="<?php echo get_the_permalink($resource->ID); ?>" title="<?php echo $resource->post_title; ?>"><?php echo $resource->post_title; ?></a></p>
                            <p><?php echo $resource->post_excerpt; ?></p>

                            <?php
                            if (isset($reading_time) && $reading_time != '') {
                                ?>
                                <p class="read-time"><?php echo $reading_time; ?> Min Read</p>
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
                }
                ?>
            </div>
            <div class="customNavigation">
                <div class="text-center">
                    <a title="prev" class="btn slide-prev"> <i class="glyphicon glyphicon-menu-left"></i></a>
                    <span class="current-slider"> 1 </span>
                    <span class="slider-ratio">/</span> 
                    <span class="total-slider"> <?php echo count($featured_resources); ?> </span>
                    <a title="next" class="btn slide-next active"><i class="glyphicon glyphicon-menu-right"></i></a>
                </div>
            </div>	
            <div class="text-center">
                <a class="btn btn-blue-bg see-all-resources" href="<?php echo get_the_permalink(121); ?>" title="SEE ALL RESOURCES"> SEE ALL RESOURCES </a>
            </div>
        </div>
    </div>
</section>