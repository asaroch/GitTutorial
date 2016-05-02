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

// video section heading
$video_section_heading = get_post_meta(get_the_ID(), 'wpcf-video-section-head', true);
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
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb1.png" class="img-responsive" width="156" height="156" data-toggle="modal" data-target="#myModal">
                                <div class="caption">
                                    <h3>Dan Mateo</h3>
                                    <p>Chief Executive Officer</p>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="thumbnail">
                                                <img alt="" src="assets/images/aboutus/img_thumb1.png" class="img-responsive" width="156" height="156" data-toggle="modal" data-target="#myModal">
                                                <div class="caption">
                                                    <h3>Dan Mateo</h3>
                                                    <p>Chief Executive Officer</p>
                                                    <p class="content">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <!---1 Block---->
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb2.png" class="img-responsive" width="156" height="156">
                                <div class="caption">
                                    <h3>Parris Sanz, Esq.</h3>
                                    <p>Chief Legal Officer</p>
                                </div>
                            </div>

                        </div>
                        <!---2 Block---->
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb3.png" class="img-responsive" width="156" height="156">
                                <div class="caption">
                                    <h3>James Mendelsohn</h3>
                                    <p>Chief Marketing Officer</p>
                                </div>
                            </div>

                        </div>
                        <!---3 Block---->
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb4.png" class="img-responsive" width="156" height="156">
                                <div class="caption">
                                    <h3>DMandy Sebel</h3>
                                    <p>Chief People Officer</p>
                                </div>
                            </div>

                        </div>
                        <!---4 Block---->

                    </div>
                    <div class="row voffset4">
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb5.png" class="img-responsive" width="156" height="156">
                                <div class="caption">
                                    <h3>Kenneth Gang</h3>
                                    <p>Chief Risk Office</p>
                                </div>
                            </div>

                        </div>
                        <!---1 Block---->
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb6.png" class="img-responsive" width="156" height="156">
                                <div class="caption">
                                    <h3>Aman Verje</h3>
                                    <p>Chief Technology Officer</p>
                                </div>
                            </div>

                        </div>
                        <!---2 Block---->
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb7.png" class="img-responsive" width="156" height="156">
                                <div class="caption">
                                    <h3>David Dart</h3>
                                    <p>Chief Technology Office</p>
                                </div>
                            </div>

                        </div>
                        <!---3 Block---->
                        <div class="col-sm-3 text-center">
                            <div class="thumbnail">
                                <img alt="" src="assets/images/aboutus/img_thumb8.png" class="img-responsive" width="156" height="156">
                                <div class="caption">
                                    <h3>Ritesh Gupta</h3>
                                    <p>Chief Customer Operations
                                        Officere</p>
                                </div>
                            </div>
                        </div>
                        <!---4 Block---->
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
                    <a href="mailto:mailto:miranda@yourcompany.com?bcc=eventsteam@yourcompany.com&subject=Excited%20to%20meet%20at%20the%20event!&body=Hi%20Miranda," title="APPLY NOW" class="btn btn-blue-bg"> <?php echo $email_us_button; ?> <i class="glyphicon glyphicon-play"></i></a>
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
                                <div class="item">
                                    <div class="thumbnail">
                                        <img src="assets/images/resources/main_featured_image.jpg" alt="..." class="img-responsive hidden-xs">
                                        <div class="caption">
                                            <p class="topic">TOPIC</p>
                                            <p class="read-date">Mar 13, 2016</p>
                                            <h3>The Unbundling of
                                                Finance</h3>
                                            <p>In a world where everything is being
                                                unbundled, allowing consumers to pick ...</p>
                                            <p class="read-time">8 Min Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p class="topic">TOPIC</p>
                                            <p class="read-date">Mar 12, 2016</p>
                                            <h3>Small Business Loans:
                                                Options Along The
                                                Financing Spectrum</h3>
                                            <p>Small businesses, startups, and the
                                                self-employed have never had the easiest
                                                time getting financing, but most experts
                                                agree it became downright difficult ...</p>
                                            <p class="read-time">8 Min Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p class="topic">PRESS RELEASE</p>
                                            <p class="read-date">Mar , </p>
                                            <h3>CAN Capital Wins Five
                                                American Business
                                                Awards</h3>
                                            <p>CAN Capital, Inc., the market share leader
                                                in alternative small business finance,
                                                announced today that the company won
                                                top awards across five categories in the ...</p>
                                            <p class="read-time">8 Min Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p class="topic">PRESS RELEASE</p>
                                            <p class="read-date">Mar , </p>
                                            <h3>CAN Capital Wins Five
                                                American Business
                                                Awards</h3>
                                            <p>CAN Capital, Inc., the market share leader
                                                in alternative small business finance,
                                                announced today that the company won
                                                top awards across five categories in the ...</p>
                                            <p class="read-time">8 Min Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p class="topic">PRESS RELEASE</p>
                                            <p class="read-date">Mar , </p>
                                            <h3>CAN Capital Wins Five
                                                American Business
                                                Awards</h3>
                                            <p>CAN Capital, Inc., the market share leader
                                                in alternative small business finance,
                                                announced today that the company won
                                                top awards across five categories in the ...</p>
                                            <p class="read-time">8 Min Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p class="topic">PRESS RELEASE</p>
                                            <p class="read-date">Mar , </p>
                                            <h3>CAN Capital Wins Five
                                                American Business
                                                Awards</h3>
                                            <p>CAN Capital, Inc., the market share leader
                                                in alternative small business finance,
                                                announced today that the company won
                                                top awards across five categories in the ...</p>
                                            <p class="read-time">8 Min Read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customNavigation visible-xs">
                                <div class="text-center">
                                    <a title="prev" class="slide-prev"> <i class="glyphicon glyphicon-menu-left"></i></a>
                                    <span class="current-slider"> 1 </span>
                                    <span class="slider-ratio">/</span> 
                                    <span class="total-slider"> 16 </span>
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

