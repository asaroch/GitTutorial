<?php
get_header();

// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));
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
$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(1144, 493), false, '');
?>
<section id="resource_hero" style="background-image: url('<?php echo $src[0]; ?>')" ><!-- Resource banner -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-default large-size-icon hidden-xs" data-toggle="modal" data-target="#myModal">
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
    <div class="social-media hidden-xs"><h3>Share</h3><ul>
            <li>
                <a href="javascript:void(0);" target="_blank" title="twitter">
                    <img src="<?php echo get_template_directory_uri (); ?>/images/home/twitter_icon.png" alt="twitter share">
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" target="_blank" title="facebook">
                    <img src="<?php echo get_template_directory_uri (); ?>/images/home/facebook_icon.png" alt="facebook share">
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" target="_blank" title="Linkdin">
                    <img src="<?php echo get_template_directory_uri (); ?>/images/home/linkedin_icon.png" alt="linkdin share">
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="featured-title">HUMAN RESOURCES <span> • Feb 10, 2016</span></p>
                <h1 class="section-heading"><?php echo $post->post_title; ?></h1>
                <?php 
                $author = get_userdata( $post->post_author );
                ?>
                <h3 class="customer-info">By <?php echo $author->user_login; ?> </h3>
                <?php 
                // Reading time
                $reading_time = get_post_meta($post->ID, 'wpcf-reading-minutes', true);
                if ( $reading_time != '' ) {
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
                    <?php echo $post->post_content; ?>
                    <?php 
                    // Fetch tags of a resource
                    $tags = get_the_terms ( $post->ID, 'resource-tag' );
                    if ( count( $tags ) ) {
                        ?>
                        <div class="btn-block">
                            <button type="button" class="btn btn-theme"> Tag </button>
                            <?php 
                            foreach ( $tags as $tag ) {
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
                                    <img src="<?php echo get_template_directory_uri (); ?>/images/home/twitter_icon.png" alt="twitter share"></a></li>
                            <li>
                                <a href="javascript:void(0);" target="_blank" title="facebook">
                                    <img src="<?php echo get_template_directory_uri (); ?>/images/home/facebook_icon.png" alt="facebook share"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" target="_blank" title="Linkdin">
                                    <img src="<?php echo get_template_directory_uri (); ?>/images/home/linkedin_icon.png" alt="linkdin share"></a>
                            </li>
                        </ul>
                    </div>                              
                    <div class="client-testimonials">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo get_template_directory_uri (); ?>/images/resources/fox_headshot.png" alt="..." width="60" height="60px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $author->user_login; ?></h4>
                                Jen is a lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dictum aliquet
                                nulla. Phasellus arcu risus, bibendum id porta ut, aliquet eu ante
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
<section id="articles">
    <div class="related-articles">
        <div class="container">
            <div class="row">
                <h2 class="section-heading"> Related Articles</h2>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo get_template_directory_uri (); ?>/images/resources/main_featured_image.jpg" alt="..." class="img-responsive hidden-xs">
                        <div class="caption">
                            <p class="read-date"><span>TOPIC</span> • Mar , </p>
                            <h3>The Unbundling of
                                Finance</h3>
                            <p class="hidden-xs">In a world where everything is being
                                unbundled, allowing consumers to pick ...</p>
                            <p class="read-time hidden-xs">8 Min Read</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="read-date"><span>TOPIC</span> • Mar 12, 2016</p>
                            <h3>Small Business Loans:
                                Options Along The
                                Financing Spectrum</h3>
                            <p class="hidden-xs">Small businesses, startups, and the
                                self-employed have never had the easiest
                                time getting financing, but most experts
                                agree it became downright difficult ...</p>
                            <p class="read-time hidden-xs">8 Min Read</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="read-date"><span>TOPIC</span> • Mar , </p>
                            <h3>CAN Capital Wins Five
                                American Business
                                Awardse</h3>
                            <p class="hidden-xs">CAN Capital, Inc., the market share leader
                                in alternative small business finance,
                                announced today that the company won
                                top awards across five categories in the ...</p>
                            <p class="read-time hidden-xs">8 Min Read</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Articles section -->
<!-- CAN Capital Newslette -->
<section class="gradient-one" id="cc-newslette">
    <div class="container">					
        <div class="row">
            <div class="col-sm-12">
                <h3 class="section-heading">CAN Capital Newslette</h3>
                <p>Stay up-to-date withe the latest financial advice</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control field-style" placeholder="Email">
                    </div>
                    <small>We never share your information</small>
                </div>
                <div class="col-sm-4 btn-left">
                    <button type="submit" class="btn btn-blue-bg field-style">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
                </div>						
            </div>
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
<!-- Footer start here -->
<?php get_footer(); ?>