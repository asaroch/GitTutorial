<?php
/*
Template Name: how it works
*/
get_header();
// How it work processes queries The Query
$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'how-it-work-process',
				'orderby'     => 'menu_order date',
				'order'       => 'ASC'
			);
$howItWorksProcess = new WP_Query( $args );

// How it work effortless application queries The Query
$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'how-it-work-effortle',
				'orderby'     => 'menu_order date',
				'order'       => 'ASC'
			);
$howItWorksEffort = new WP_Query( $args );

// How it work gather application queries The Query
$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'how-it-work-gather',
				'orderby'     => 'menu_order date',
				'order'       => 'ASC'
			);
$howItWorksGather = new WP_Query( $args );

// How it work direct deposit queries The Query
$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'how_getting_fund',
				'orderby'     => 'menu_order date',
				'order'       => 'ASC'
			);
$how_getting_fund = new WP_Query( $args );

if ( $howItWorksProcess->have_posts() ) :
    ?>
        <section class="process-block gradient-one">
        <div class="container">
            <div class="row">
                <?php
                $cnt = 0;
                $post_count = $howItWorksProcess->found_posts;
                while ($howItWorksProcess->have_posts()) : $howItWorksProcess->the_post();
                    $cnt++;
                    ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="row">
                            <div class="financial-product-item">
                                <div class="category-icon"> 
                                    <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                        <div class="category-icon"> 
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                                <h4>1</h4>			
                                <h5><?php echo get_the_title(); ?></h5>
                                <p><?php echo get_the_content(); ?></p>
                                <?php if ($post_count > $cnt) {
                                    ?>
                                    <div class="process-arrow">
                                        <span>
                                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/how-it-works/process_arrow.png" alt="Get Started Icon">
                                        </span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
                <!---to display trust badges-->
    <?php if (is_active_sidebar('trust-badge')) : ?>
        <div class="widget-area trust-badge" role="complementary">
            <?php dynamic_sidebar('trust-badge'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>	
    <!--trust badge widget ends here-->
                </section>
    <?php
endif;
?>

		<!--Process Block -->
		<!-- Effortless application -->
		<section id="use_termloan_for">
		<div class="fade-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="section-heading"> Effortless Application </h1>
						<ul class="list-term-use termloan-use-point">
                                                    <?php
                                                    if ( $howItWorksEffort->have_posts() ) :
                                                        while ($howItWorksEffort->have_posts()) : $howItWorksEffort->the_post(); ?>
							<li class="col-sm-4"><p><?php echo get_the_title(); ?></p></li>
                                                         <?php endwhile;
                                                            endif;
                                                         ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- Effortless application -->
		<!-- Terms loan details -->
		<section id="details_termsloan">
			<div class="container">
				<h1 class="section-heading"> Gather Before You Start </h1>
				<div class="col-sm-offset-4 col-sm-6">
					<div class="row">
						<ul class="details-point">
                                                    <?php
                                                    if ( $howItWorksGather->have_posts() ) :
                                                    while ($howItWorksGather->have_posts()) : $howItWorksGather->the_post(); ?>
							<li><?php echo get_the_title(); ?></li>
                                                    <?php 
                                                    endwhile;
                                                    endif; 
                                                    ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- Terms loan details -->
		<!-- Infoegrafic carousel -->
                <section id="infografic_product">
                    <div class="container">
                        <h2 class="section-heading"> Getting Funds and Making Payments </h2>
                        <div id="infografic_carousel" class="owl-carousel owl-theme">
                            <?php
                            if ($how_getting_fund->have_posts()) :
                                while ($how_getting_fund->have_posts()) : $how_getting_fund->the_post();
                                    ?>
                                    <div class="item">
                                        <div class="info-product-item">
                                            <p><?php echo get_the_content(); ?></p>
                                            <div class="category-icon"> 
                                                <?php
                                                if (has_post_thumbnail(get_the_ID())):
                                                    ?>
                                                    <div class="category-icon"> 
                                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                                                    </div>
                                                    <?php
                                                endif;
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            ?>	
                        </div>
                    </div>
                </section>
		<!-- Infoegrafic carousel -->
		<!-- About us -->
		<section  id="about_us" class="gradient-two">
			<div class="container text-center">
				<p>Still having questions?<br> <b>Find Out More.</b></p>
				<a href="javascript:void(0);" title="ABOUT US"  class="btn btn-purple-style">HELP CENTER</a>
			</div>
		</section>
		<!--funding option-->
                
                <?php if (is_active_sidebar('can_capital_comparison_chart')) : ?>
                <div class="widget-area trust-badge" role="complementary">
                    <?php dynamic_sidebar('can_capital_comparison_chart'); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>	
    <!--trust badge widget ends here-->
		<section id="funding-option">
			<div class="container">
				<h2 class="section-heading">Experience a better funding option</h2>
				<div class="divtable accordion-xs gradient-one">
					<div class="tr headings">
						<div class="th firstname"><span></span></div>
						<div class="th term-laon"><span><img alt="" src="assets/images/home/CAN_logo_footer.png" width="140" height="20"></span></div>
						<div class="th trak-laon"><span>Bank Loan</span></div>
						<div class="th installment-loan"><span>Credit card</span></div>
					</div>
			
			
					<div class="tr seprate-block">
						<div class="td firstname accordion-xs-toggle"><span>Repeat Customer Benefits</span></div>
						<div class="accordion-xs-collapse" aria-expanded="false">
							<div class="inner">
								<div class="td term-laon"><span><img src="assets/images/termsloan/check_bullet.png" alt="Check"/></span></div>
								<div class="td trak-laon"></div>
								<div class="td installment-loan"><span><img src="assets/images/termsloan/check_bullet.png" alt="Check"/></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--funding option-->
		<section id="home_resource_list" class="hidden-xs">
                    <?php echo get_template_part( 'resources_all'); ?> 
                </section>
		<section  class="get-funded">
			<div class="container text-center">
				<h2 class="section-heading"> Get Funded </h2>
				<h3> Smart, Simple & Fast. </h3>
				<?php dynamic_sidebar('applynow'); ?>
			</div>
		</section>

<!--Process ends here-->

<?php get_footer(); ?>

