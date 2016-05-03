<?php
/*
  Template Name: About Us
 */
get_header();

// heading block.
$about_us_heading = get_post_meta(get_the_ID(), 'wpcf-about-us-heading', true);
$about_us_desc = get_post_meta(get_the_ID(), 'wpcf-about-us-description', true);

//develop career block
$develop_career_text = get_post_meta(get_the_ID(), 'wpcf-develop-career-text', true);
$develop_career_button = get_post_meta(get_the_ID(), 'wpcf-develop-career-butto', true);
$develop_career_url = get_post_meta(get_the_ID(), 'wpcf-develop-career-url', true);

// compare funding block
$compare_funding_text = get_post_meta(get_the_ID(), 'wpcf-compare-funding-text', true);
$compare_funding_button = get_post_meta(get_the_ID(), 'wpcf-compare-funding-butt', true);
$compare_funding_url = get_post_meta(get_the_ID(), 'wpcf-develop-career-url', true);

// email us block
$email_us_text = get_post_meta(get_the_ID(), 'wpcf-email-us-text', true);
$email_us_number = get_post_meta(get_the_ID(), 'wpcf-email-us-number', true);
$email_us_button = get_post_meta(get_the_ID(), 'wpcf-email-us-button', true);

// Search heading
$search_heading = get_post_meta(get_the_ID(), 'wpcf-search-heading', true);

// cta_get_fund
$cta_cta_title = get_post_meta(get_the_ID(), 'wpcf-cta-title', true);
$cta_cta_desc = get_post_meta(get_the_ID(), 'wpcf-cta-description', true);

// great potentials slider

$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'leading-team',
				'orderby'     => 'date',
                                'posts_per_page' => -1,
				'order'       => 'ASC'
			);
$leading_team = new WP_Query( $args );

// News articles featured.
$args = array(
    'post_type' => 'news',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => array(array(
            'key' => '_is_featured',
            'value' => 'yes'
        )),
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$news_featured = new WP_Query($args);

// Press articles featured.
$args = array(
    'post_type' => 'press-releases',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => array(array(
            'key' => '_is_featured',
            'value' => 'yes'
        )),
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$press_featured = new WP_Query($args);
//create a object to show estimated reading time for a post.
            $estimated_time = new EstimatedPostReadingTime();

?>

<section class="sales-program gradient-one">
                <div class="container" id="about-us">
                    <div class="row">

                        <div class="col-md-12"><div class="section-heading"><?php echo $about_us_heading; ?></div>
                            <?php echo $about_us_desc; ?>
                        </div>

                    </div>	
                </div>
            </section>
            <!---Our Leading Team---->
            <section id="our-leading-team">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-heading">Our Leading Team</div>
                        </div>
                    </div>
                    <div class="row">
                        <?php while ($leading_team->have_posts()) : $leading_team->the_post(); ?>
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array("class" => "img-responsive","data-toggle" => "modal","data-target" => "#myModal_".get_the_ID())); ?>
                                        <?php
                                    endif;
                                    ?>
                                <div class="caption">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal_<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="thumbnail">
                                               <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array("class" => "img-responsive","data-toggle" => "modal","data-target" => "#myModal_".get_the_ID())); ?>
                                        <?php
                                    endif;
                                    ?>
                                                <div class="caption">
                                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                    <p class="content"><?php echo get_the_content(); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                       <?php endwhile; ?>

                    </div>                    
                </div>
            </section>
            <!---Our Leading Team---->
            <section id="referal_about_us" class="gradient-two">
                <div class="container text-center">
                    <p><?php echo $develop_career_text; ?></p>
                    <a href="<?php echo $develop_career_url; ?>" target="_blank" title="DEVELOP YOUR CAREER"  class="btn btn-purple-style"><?php echo $develop_career_button; ?></a>
                </div>
            </section>
            <!-- CTA -->	
           <?php
// Partner Benefits The Query

$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'industry_recognition',
				'orderby'     => 'menu_order date',
                                'posts_per_page' => -1,
				'order'       => 'ASC'
			);
$awards = new WP_Query( $args );
if ( $awards->have_posts() ) :
    ?>
    <section id="cta_block">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <h2 class="section-heading"><?php echo get_option('industry_recognition'); ?></h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <ul class="partners-list">
                        <?php 
                        while ( $awards->have_posts() ) : $awards->the_post();
							$award_resource_mapping_id = get_post_meta( $post->ID, 'resource_id', true );
							$external_link             = get_post_meta( $post->ID, 'wpcf-awars-external-link', true );
							$url = 'javascript:void(0)';
							if ( $award_resource_mapping_id != '' ) {
								$url = get_permalink($award_resource_mapping_id);
							}
							else if( $external_link != '' ) {
								$url = get_post_meta( $post->ID, 'wpcf-awars-external-link', true );
							}
                            ?>
                            <li class="col-md-3 col-sm-3">
                                <a href="<?php echo $url; ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'awards'); ?> </a>
                            </li> 
                            <?php
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>		
    </section>
    <?php
endif;
?>
            <!-- CTA -->
            <section class="gradient-two" id="referal_about_us">
                <div class="container text-center">
                    <p><?php echo $compare_funding_text; ?></p>
                    <a class="btn btn-purple-style" title="COMPARE FUNDING OPTIONS" href="<?php echo $compare_funding_url; ?>"><?php echo $compare_funding_button; ?></a>
                </div>
            </section>

            <!-- Email Us -->
            <section id="email_us" class="gray-bg">
                <div class="container text-center">
                    <h2 class="section-heading"> <?php echo $email_us_text; ?> </h2>
                    <h5 class="call-us"> Call us: </h5>
                    <h3 class='call-number'> <?php echo $email_us_number; ?> </h3>
                    <span class='divider-line'>  </span>
                    <a href="mailto:anirudh.sood@trantorinc.com?subject=Want%20to%20learn%20more&body=Hi%20,Anirudh" title="APPLY NOW" class="btn btn-blue-bg"> <?php echo $email_us_button; ?> <i class="glyphicon glyphicon-play"></i></a>
                </div>
            </section>
            <!-- Email Us -->
            <!-- Related Articles section -->
            <div id="home_resource_list">
                <section id="articles">
                    <div class="related-articles resource-list-bg gradient-three">
                        <div class="container">
                            <h2 class="section-heading">CAN Capital In the News</h2>
                            <div id="slider_feature_product" class="owl-carousel owl-theme">
                                <?php 
                                // generating post array
                                $post_array_object = $news_featured->get_posts();
                                $cnt=0;
                                if ($news_featured->found_posts > 0) {
                                while ($news_featured->have_posts()) : $news_featured->the_post();
                                $chart_topics = wp_get_post_terms(get_the_ID(), 'news-agency', array("fields" => "all"));
                                $category_logo = get_term_meta($chart_topics[0]->term_id,'wpcf-logo',true);
                                // Reading time
                               $reading_time =  $estimated_time->estimate_time_shortcode($post_array_object[$cnt]);

                                ?>
                                <div class="item">
                                    <div class="thumbnail">
                                        <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        echo get_the_post_thumbnail(get_the_ID(), 'large');
                                    endif;
                                    ?>
                                        
                                        <div class="caption">
                                            <p class="topic"><img src="<?php echo $category_logo; ?>" class="img-responsive" alt="News" /></p>
                                            <p class="read-date"><?php echo get_the_date(); ?></p>
                                            <h3><?php echo get_the_title(); ?></h3>
                                            <p><?php echo get_string_length(get_the_content(),'70'); ?></p>
                                             <?php
                        if ( isset($reading_time) && $reading_time != '' ) {
                            ?>
                            <p class="read-time"><?php echo $reading_time; ?> Read</p>
                            <?php
                        } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $cnt++;
                                endwhile;
                                }
                                // generating post array
                                $post_array_object = $press_featured->get_posts();
                                $cnt=0;
                                if ($press_featured->found_posts > 0) {
                                while ($press_featured->have_posts()) : $press_featured->the_post();
                                 // Reading time
                               $reading_time =  $estimated_time->estimate_time_shortcode($post_array_object[$cnt]);
                                ?>
                                <div class="item">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p class="topic"> <img src="<?php echo get_bloginfo('template_directory'); ?>/images/about-us/logo_press_release.png" alt="Press Release" class="img-responsive"></p>
                                            <p class="read-date"><?php echo get_the_date(); ?></p>
                                            <h3><?php echo get_the_title(); ?></h3>
                                            <p><?php echo get_string_length(get_the_content(),'70'); ?></p>
                                             <?php
                        if ( isset($reading_time) && $reading_time != '' ) {
                            ?>
                            <p class="read-time"><?php echo $reading_time; ?> Read</p>
                            <?php
                        } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $cnt++;
                                endwhile;
                                } ?>
                            </div>
                            <div class="customNavigation visible-xs">
                                <div class="text-center">
                                    <a title="prev" class="slide-prev"> <i class="glyphicon glyphicon-menu-left"></i></a>
                                    <span class="current-slider"> 1 </span>
                                    <span class="slider-ratio">/</span> 
                                    <span class="total-slider"> <?php echo ($news_featured->post_count+$press_featured->post_count); ?> </span>
                                    <a title="next" class="slide-next active"><i class="glyphicon glyphicon-menu-right"></i></a>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6 text-right">
                                        <a class="btn btn-purple-style" href="javascript:void(0);" title="SEE ALL NEWS"> ALL NEWS </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a class="btn btn-purple-style" href="javascript:void(0);" title="SEE ALL PRESS"> ALL PRESS </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Related Articles section -->
            <!-- CTA -->
		<!-- Get Funded -->
		<section  class="get-funded">
			<div class="container text-center">
				<h2 class="section-heading"> <?php echo $cta_cta_title; ?> </h2>
				<h3><?php echo $cta_cta_desc; ?></h3>
				<?php dynamic_sidebar('applynow'); ?>
			</div>
		</section>
		<!-- Get Funded -->
            <!-- footer -->

<?php get_footer(); ?>

