<?php

/*
  Template Name: Careers Page
 */
get_header();
$meta = get_post_meta(get_the_ID());
/*
 * Fetch Employee Spotlight testimonials
 */

global $post;
$employee_spotlight_listings = new WP_Query();
$employee_spotlight_listings->query('post_type=employee-spotlight&posts_per_page=-1,&order=ASC');

/*
 * Fetch Our Values
 */
$our_value_listings = new WP_Query();
$our_value_listings->query('post_type=our-value&posts_per_page=-1,&order=ASC');

/*
 * Fetch Offices list
 */
$our_offices = new WP_Query();
$our_offices->query('post_type=our-office&posts_per_page=-1,&order=ASC');

/*
 * Fetch headline for career section 1
 */
$headline_for_career = get_post_meta($post->ID, 'wpcf-headline-for-career', true);

/*
 * Fetch description for career section 1
 */
$description_for_care = get_post_meta($post->ID, 'wpcf-description-for-care', true);

/*
 * Fetch linkedin description
 */
$linkedin_description = get_post_meta($post->ID, 'wpcf-on-linkedin', true);
$linkedin_image = get_post_meta($post->ID, 'wpcf-linkedin_image', true);

/*
 * Fetch facebook description
 */
$facebook_description = get_post_meta($post->ID, 'wpcf-on-facebook', true);
$facebook_image = get_post_meta($post->ID, 'wpcf-facebook-image', true);

/*
 * Fetch twitter description
 */
$twitter_description = get_post_meta($post->ID, 'wpcf-on-twitter', true);
$twitter_image = get_post_meta($post->ID, 'wpcf-twitter-image', true);

/*
 * Fetch Employee Perks
 */
$emp_perks = get_post_meta($post->ID, 'wpcf-employee-perks', false);

/*
 * Fetch global URLs being used for social networks.
 */
$linkedin_url = get_option('linkedin_url');
$facebook_url = get_option('facebook_url');
$twitter_url = get_option('twitter_url');
?>
 <section class="connect-with-us gradient-one">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="section-heading"><?php echo $headline_for_career; ?></h2>
                            <h3><?php echo $description_for_care; ?></h3>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="row">
                                <div class="connect-through">
                                    <span><img src="<?php echo esc_url($linkedin_image); ?>" class="img-circle" alt="Testimonial user image"></span>			
                                    <h5>On LinkedIn</h5>
                                    <p><?php echo $linkedin_description; ?></p>
                                    <a href="<?php echo $linkedin_url; ?>" class="learn-more-btn" title="linkedin"> Go now <i class="glyphicon glyphicon-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="row">
                                <div class="connect-through">
                                    <span><img src="<?php echo esc_url($facebook_image); ?>"></span>			
                                    <h5>On Facebook</h5>
                                    <p><?php echo $facebook_description; ?></p>
                                    <a href="<?php echo $facebook_url; ?>" class="learn-more-btn" title="linkedin"> Go now <i class="glyphicon glyphicon-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="row">
                                <div class="connect-through">
                                    <span><img src="<?php echo esc_url($twitter_image); ?>" class="img-circle" alt="Testimonial user image"></span>			
                                    <h5>On Twitter</h5>
                                    <p><?php echo $twitter_description; ?></p>
                                    <a href="<?php echo $twitter_url; ?>" class="learn-more-btn" title="linkedin"> Go now <i class="glyphicon glyphicon-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </section>
            <!--Process Block -->
            <!-- testimonial -->
            <section id="testimonial">
                <div class="tranp-div-two"></div>
                <div class="tranp-div gradient-one"></div>
                <div class="container">
                    <div id="slider_testimonial" class="owl-carousel owl-theme">
                        <?php if($employee_spotlight_listings->found_posts > 0): 
                                while($employee_spotlight_listings->have_posts()):
                            $employee_spotlight_listings->the_post();
                            ?>
                        <div class="item">
                            <div class="row">	
                                <div class="col-sm-4">
                                    <div class="user-icon"> 
                                        <?php if (has_post_thumbnail($post->ID)):
                                         echo get_the_post_thumbnail($post->ID, 'single-post-thumbnail',array('class'=>'img-circle'));
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="testimonial-content career">
                                        <h4>Employee Spotlight</h4>
                                        <h2 class="section-heading"><?php echo get_the_title(); ?></h2>
                                        <h5><?php echo get_the_excerpt(); ?></h5>
                                        <p class="text-left"><?php echo get_the_content(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;
                                endif;
                          ?>
                    </div>
                    <div class="row slider-nav-control customNavigation">
                        <div class="col-md-4">
                            <a title="prev" class="prev"><i class="glyphicon glyphicon-menu-left"></i></a>
                            <span class="current-slider"> 1 </span>
                            <span class="slider-ratio">/</span> 
                            <span class="total-slider"> <?php echo wp_count_posts('employee-spotlight')->publish; ?> </span>
                            <a title="next" class="next active"><i class="glyphicon glyphicon-menu-right"></i></a>
                        </div>
                    </div>	
                </div>
            </section>
            <!-- testimonial -->
            <!-- member benefit -->
            <section id="member_benefit" class="career">
                <div class="col-xs-12">
                    <h2 class="section-heading"> Our values set the tone for day-to-day life at CAN Capital </h2>
                </div>
                <div class="container">
                     <?php if($our_value_listings->found_posts > 0): 
                                while($our_value_listings->have_posts()):
                            $our_value_listings->the_post();
                            ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="category-icon">
                           <?php if (has_post_thumbnail($post->ID)):
                                         echo get_the_post_thumbnail($post->ID, 'single-post-thumbnail',array('class'=>'img-circle'));
                                        endif; ?>
                        </div>
                        <p class="benefit-name"> <?php echo get_the_title(); ?> </p>
                        <p class="success-description"> <?php echo get_the_content(); ?> </p>					
                    </div>
                     <?php endwhile;
                                endif;
                          ?>
                </div>
            </section>
            <!-- member benefit -->
            <!-- employee perks -->
            <section id="termsloan_detail" class="career">
                <div class="container">
                    <h2 class="section-heading"> Employee Perks </h2>
                    <div class="col-sm-offset-4 col-sm-6">
                        <div class="row">
                            <ul class="details-point">
                                 <?php foreach ($emp_perks as $key => $value) { ?>
                                <li><?php echo $value; ?></li>
                                 <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- employee perks -->
            <!--Process Block -->
            <section id="faq-block" class="career">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="section-heading">Frequently Asked Questions</h2>
                            <p>Bring your “I CAN.” Apply directly through the job listing</p>
                            <div class="accordion" id="accordion1">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                            Marketing <i class="glyphicon glyphicon-menu-down"></i>
                                            <p>Create positive connections that support our brand promise while directly helping to grow our business</p>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="accordion-body collapse">
                                        <div class="row">
                                            <div class="col-xs-12">                                                    
                                                <div class="job-location">
                                                    <a href="javascript:void();">
                                                        <div class="col-xs-6">
                                                            <h3 class="job-post">Director of Marketing</h3>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <h3 class="city-name">Kennesaw, GA</h3>
                                                        </div>
                                                        <div class="col-xs-2">
                                                            <span class="glyphicon glyphicon-play pull-right"></span>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                     </a>
                                                </div>                                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                              
                        </div>	
                    </div>		
            </section>
            <!-- our offices -->
            <section id="our-offices">
                <div class="container">
                    <div class="row">
                        <h2 class="section-heading">Join One Of Our Offices</h2>
                          <?php if($our_offices->found_posts > 0): 
                                while($our_offices->have_posts()):
                            $our_offices->the_post();
                            ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <?php if (has_post_thumbnail($post->ID)):
                                         echo get_the_post_thumbnail($post->ID, 'single-post-thumbnail',array('class'=>'img-responsive'));
                                        endif; ?>
                                <div class="caption text-center">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p><?php echo get_the_content(); ?></p>
                                    <a href="javascript:void();" class="learn-more-btn" title="JOB LISTING"> JOB LISTINGS <i class="glyphicon glyphicon-play"></i></a>
                                </div>
                            </div>
                        </div>
                         <?php endwhile;
                                endif;
                          ?>
                    </div>
                </div>
            </section>
            <!-- our offices -->
<?php get_footer(); ?>