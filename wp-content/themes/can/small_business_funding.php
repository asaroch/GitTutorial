<?php
/*
Template Name: small business funding
*/
get_header();
// Fetured resources
$page_id = get_the_ID();
$args = array(
    'post_type' => 'hero-banner-slider',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => array(array(
            'key' => '_is_featured',
            'value' => 'yes'
        )),
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$small_business_funds = query_posts($args);

// great potentials slider

$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'business-funding-gra',
				'orderby'     => 'menu_order date',
                                'posts_per_page' => -1,
				'order'       => 'ASC'
			);
$greatPotentialProcess = new WP_Query( $args );


// CTA section 
$ctaheading = get_post_meta(get_the_ID(), 'wpcf-cta-description1', true);
$ctatext = get_post_meta(get_the_ID(), 'wpcf-cta-button-text', true);
$ctahref = get_post_meta(get_the_ID(), 'wpcf-cta-url', true);


// Fetching Business funding charts.

$args = array(	'post_status' => 'publish' , 
                                        'post_type'   => 'business-funding-cha',
                                        'orderby'     => 'menu_order date',
                                        'posts_per_page' => -1,
                                        'order'       => 'ASC'
                                );
$business_capital_chart = new WP_Query($args);
     
?>
<div id="sbf_hero" class="gradient-one">
			<span class="down-arrow"></span>
			<div class="container">
                           
				<div id="slider_testimonial" class="owl-carousel owl-theme">
                                     <?php 
                            foreach ($small_business_funds as $key => $value):  
                                if($key > 2){
                                    break;
                                }
                                $learnMore = get_post_meta($value->ID, 'wpcf-learn-more', true);
                                ?>
					<div class="item">
						<div class="row">
							<div class="col-md-4 col-md-push-8 col-sm-5 col-sm-push-7">
								<div class="user-icon"> 
								 <?php
                                                                if (has_post_thumbnail($value->ID)):
                                                                    echo get_the_post_thumbnail($value->ID, 'large');
                                                                endif;
                                                                ?>
								</div>
							</div>
							<div class="col-md-8 col-md-pull-4 col-sm-7 col-sm-pull-5">
							 	<div class="content-list-item">
									<p><?php echo $value->post_title; ?></p>
									<h3 class="heading-line"><?php echo $value->post_content; ?></h3>
									<h5 class="customer-info"><?php echo $value->post_excerpt; ?></h5>
									<a href="<?php echo $learnMore; ?>" class="btn btn-purple-style"> LEARN MORE </a>
								</div>
						   	</div>
						</div>
					</div>
					 <?php                            
                                endforeach; 
                            ?>
				</div>
                           
			</div>
                        <div class="loan-nav">
                            <div class="container">
                                <ul>
                                    <?php foreach ($small_business_funds as $key => $value):  
                                    switch($key):
                                    case 0:
                                    ?>
                                    
                                    <li class="col-xs-4 active"><a id="term_loan_btn" href="javascript:void(0)" class="navigation-item nav-right-border"> <?php echo $value->post_title; ?> </a></li>
                                    <?php break;
                                    case 1:
                                    ?>
                                    <li class="col-xs-4"><a id="trak_loan_btn" href="javascript:void(0)" class="navigation-item nav-right-border"> <?php echo $value->post_title; ?> </a></li>                   
                                    <?php break;
                                    case 2:
                                    ?>
                                    <li class="col-xs-4"><a id="installment_btn" href="javascript:void(0)" class="navigation-item"> <?php echo $value->post_title; ?> </a></li>
                                    <?php 
                                    break;
                                    endswitch;
                                    endforeach; ?>
                                </ul>
                            </div>
                        </div>
		</div>
		<!-- hero -->
		<!--Block Solution Built -->
		<section id="solution_built">
		<div class="fade-bg"></div>
			<div class="container">
				<h2 class='section-heading'>Solution build to work for you</h2>
				<div class="divtable accordion-xs gradient-one">
                                    <?php
                                     $data = get_terms('business-funding-hea', array(
                                        'parent' => '0',
                                        'hide_empty' => 0
                                    ));
                                    $logo = array();
                                    $name = array();
                                    
                                    foreach ($data as $key => $value) {
                                        $name[$key] = $data[$key]->name;
                                        $logo[$key] = get_term_meta($data[$key]->term_id, 'wpcf-logo', true);
                                    }
                                   
                                    ?>
					<div class="tr headings">
						<div class="th firstname"><span></span></div>
						<div class="th term-laon"><span>
                                                        <?php if($logo[1] != ""){ ?>
                                                        <img src="<?php echo $logo[1]; ?>" class="img-circle" alt="Testimonial user image">
                                                        <?php                                                                                                                                                    }
                                                        if($name[1] != ""){
                                                        ?>
                                                        <br> 
                                                        <?php echo $name[1];
                                                        } ?>
                                                    </span></div>
						<div class="th trak-laon"><span><?php if($logo[2] != ""){ ?>
                                                        <img src="<?php echo $logo[2]; ?>" class="img-circle" alt="Testimonial user image">
                                                        <?php                                                                                                                                                    }
                                                        if($name[2] != ""){
                                                        ?>
                                                        <br> 
                                                        <?php echo $name[2];
                                                        } ?></span></div>
						<div class="th installment-loan"><span><?php if($logo[0] != ""){ ?>
                                                        <img src="<?php echo $logo[0]; ?>" class="img-circle" alt="Testimonial user image">
                                                        <?php                                                                                                                                                    }
                                                        if($name[0] != ""){
                                                        ?>
                                                        <br> 
                                                        <?php echo $name[0];
                                                        } ?></span></div>
					</div>
                                        <?php 
                                        if ( $business_capital_chart->have_posts() ) :
                                            while ($business_capital_chart->have_posts()) : $business_capital_chart->the_post();
                                          
                                            $term_loan = get_post_meta(get_the_ID(), 'wpcf-business-term-loan', true); 
                                            $trakloan = get_post_meta(get_the_ID(), 'wpcf-business-trak-loan', true); 
                                            $installmentloan = get_post_meta(get_the_ID(), 'wpcf-business-installment', true); 
                                            
                                          
                                        ?>
					<div class="tr seprate-block">
                                            <div class="td firstname accordion-xs-toggle"><span><?php echo get_the_title(); ?></span></div>
						<div class="accordion-xs-collapse">
							<div class="inner">
									<div class="td term-laon"><?php echo $term_loan; ?></span></div>
									<div class="td trak-laon"><?php echo $trakloan; ?></div>
									<div class="td installment-loan"><?php echo $installmentloan; ?></div>
							</div>
						</div>
					</div>
                                    <?php endwhile;
                                          endif;
                                    ?>
				</div>
			</div>
		</section>
		<section class="gradient-two" id="making-payments">
			<div class="container text-center">
				<p><?php echo $ctaheading; ?></p>
				<a class="btn btn-purple-style" title="How it works" href="<?php echo $ctahref ?>"><?php echo $ctatext; ?></a>
			</div>
		</section>
		<!--Right Financial-->
		<section id="right-financing">
			<div class="container">
                            <h2 class="section-heading">
                              <?php echo get_post_meta($page_id, 'wpcf-graph-heading', true) ?></h2>
				<div id="infografic_carousel" class="owl-carousel owl-theme">
                                     <?php
                                    while ($greatPotentialProcess->have_posts()) : $greatPotentialProcess->the_post();
                                        ?>
					<div class="item">
						<div class="info-product-item">							
							<div class="graph1">
                                                        <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                            <?php echo get_the_post_thumbnail(get_the_ID(),'small'); ?>
                                       
                                        <?php
                                    endif;
                                    ?>
                                                        
                                                        </div>
						</div>
					</div>
                                     <?php endwhile; ?>
				</div>
			</div>
		</section>
		<!-- Right Financial -->
		<!--funding option-->
		 <!-- capital_comparison_chart section -->
                <?php if (is_active_sidebar('can_capital_comparison_chart')) : ?>
                <div class="widget-area trust-badge" role="complementary">
                    <?php dynamic_sidebar('can_capital_comparison_chart'); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>	
		<!--funding option-->
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
		<!-- Get Funded -->
		<section  class="get-funded">
			<div class="container text-center">
				<h2 class="section-heading"> Get Funded </h2>
				<h3> Smart, Simple & Fast. </h3>
				<?php dynamic_sidebar('applynow'); ?>
			</div>
		</section>
		<!-- Get Funded -->

<?php get_footer(); ?>

