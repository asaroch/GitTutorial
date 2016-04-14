<?php
/*
  Template Name: Partners
 */
get_header();

// The Query
$args = array('post_status' => 'publish',
    'post_type' => 'partner-type',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$partnerTypes = new WP_Query($args);
?>
<!-- Which partnership right for you section -->
<?php 
if ( $partnerTypes->have_posts() ) :
	?>
	<div  id="partnership" class="gradient-one">
		<div class="container">
			<div class="col-md-12">
                            <div class="row">
                                <h2 class="section-heading"><?php echo get_option('partner_types_heading'); ?> </h2>
                            </div>
			</div>	
			<div class="col-md-12">
				<div class="row">
					<?php 
					while ( $partnerTypes->have_posts() ) : $partnerTypes->the_post();
						?>
						<div class="col-md-3 col-sm-6">
							<div class="row">
								<div class="partnership-item">
									<h3 class="partnership-label"><?php echo get_the_title(); ?></h3>
									<p class="partnership-description"> <?php  echo get_the_content(); ?> </p>
									<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="learn-more-btn" title="<?php echo  get_the_title(); ?>"> LEARN MORE <i class="glyphicon glyphicon-play"></i></a>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					?>
				</div>
			</div>
		</div>
		<div class="container">
			<!---to display trust badges-->
			<?php if ( is_active_sidebar('trust-badge') ) : ?>
				<div class="widget-area trust-badge" role="complementary">
					<?php dynamic_sidebar('trust-badge'); ?>
				</div><!-- .widget-area -->
			<?php endif; ?>	
			<!--trust badge widget ends here-->
		</div>
	</div>
	<!-- Which partnership right for you section -->
	<?php
endif;
/* Restore original Post Data */
//wp_reset_postdata();
?>
<!-- we bring you the best section -->
<?php
// Partner Benefits The Query
$args = array('post_status' => 'publish',
    'post_type' => 'partner_benefit',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$partnerBenefits = new WP_Query($args);
if ($partnerBenefits->have_posts()) :
    ?>
    <section  id="we_bring_you_best">
        <div class="tranp-div-two"></div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <h2 class="section-heading"><?php echo get_option('partner_benefits'); ?> </h2>
                </div>
            </div>	
            <div class="col-md-12">
                <div class="row">
                    <?php
                    while ($partnerBenefits->have_posts()) : $partnerBenefits->the_post();
                        ?>
                        <div class="col-md-3 col-sm-3">
                            <div class="row">
                                <div class="bring-best-item">
                                    <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                        <div class="category-icon"> 
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'partners-expertise'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                    <h3 class="heading-label"> <?php echo get_the_title(); ?> </h3>
                                    <p class="description"><?php echo get_the_content(); ?> </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- we bring you the best section -->
    <?php
endif;
/* Restore original Post Data */
wp_reset_postdata();
?>
<!-- Partners list -->
<?php
// Partner Benefits The Query
$args = array('post_status' => 'publish',
    'post_type' => 'selected_partner',
    'orderby' => 'menu_order date',
    'order' => 'ASC'
);
$selectedPartners = new WP_Query($args);
if ($selectedPartners->have_posts()) :
    ?>
    <section id="partners">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <h2 class="section-heading"><?php echo get_option('selected_partners'); ?></h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <ul class="partners-list">
                        <?php
                        while ($selectedPartners->have_posts()) : $selectedPartners->the_post();
                            $link = get_post_meta( get_the_ID(), 'wpcf-link', true );
                            $link = isset($link)  && $link != '' ? $link : 'javascript:void(0)';
                             if (has_post_thumbnail(get_the_ID())):
                                ?>
                                <li class="col-md-4 col-sm-4">
                                    <a href="<?php echo $link; ?>" target="_blank" title="<?php echo get_the_title(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'selected-partners', array('class' => 'img-responsive')); ?></a>
                                </li>
                                <?php
                            endif;
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>		
    </section>
    <!-- Partners list -->
    <?php
endif;
?>	
<!-- Email Us -->	
<section id="email_us"  class="">
    <div class="container text-center">
        <h1 class="section-heading"> <?php echo get_option('call_to_action_heading'); ?></h1>
        <h5 class="call-us"> Call us: </h5>
        <h3 class='call-number'> <?php echo get_option('call_no'); ?> </h3>
        <span class='divider-line'>  </span>
        <a href="mailto:<?php echo get_option('call_to_action_email'); ?>" title="EMAIL US" class="btn btn-blue-bg"> EMAIL US <i class="glyphicon glyphicon-play"></i></a>
    </div>
</section>
<!-- Email Us -->	
<!-- CTA -->
<?php
// Partner Benefits The Query

$args = array(	'post_status' => 'publish' , 
				'post_type'   => 'industry_recognition',
				'orderby'     => 'menu_order date',
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
<?php get_footer(); ?>
