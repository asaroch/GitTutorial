<?php
/*
Template Name: help center
*/
get_header();
// Fetured resources
$args = array(
    'post_type' => 'help-centre',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC'
);
$help_center = new WP_Query( $args );

// Description block CTA

$cta_description = get_post_meta(get_the_ID(), 'wpcf-cta-description1', true);
$cta_button_text = get_post_meta(get_the_ID(), 'wpcf-cta-button-text', true);
$cta_button_url = get_post_meta(get_the_ID(), 'wpcf-cta-url', true);

// Chat block
$cta_chat_head = get_post_meta(get_the_ID(), 'wpcf-chat-questions-head', true);
$cta_chat_button = get_post_meta(get_the_ID(), 'wpcf-chat-phone-number', true);

// tutorial carousel
$args = array(	'post_status' => 'publish' , 
                'post_type'   => 'help-center-video',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order'       => 'ASC'
             );
$help_center_video = new WP_Query( $args );


$question_answer_arr = array();
while ($help_center->have_posts()) : $help_center->the_post();
$chart_topics = wp_get_post_terms(get_the_ID(), 'help-centre-category', array("fields" => "all"));
foreach($chart_topics as $key => $value){
    // get the menu order for post.
    $post_order = get_post_field( 'menu_order', get_the_ID());
    $question_answer_arr[$value->name][$post_order][get_the_title()] = get_the_content();
}
endwhile;
//prx($question_answer_arr);
?>
<!--Process Block -->
		<section id="faq-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="section-heading">Frequently Asked Questions</h2>
                                <div class="accordion" id="accordion1">
                                    <?php 
                                    $cnt = 0;
                                    $collapse = 0; 
                                    foreach($question_answer_arr as $category => $menu_order_arr){
                                        $cnt++;
                                        ?>
                                    <div class="accordion-group">
                                      <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $cnt; ?>">
                                        <?php echo $category; ?> <i class="glyphicon glyphicon-menu-down"></i>
                                        </a>
                                      </div>
                                      <div id="collapse<?php echo $cnt; ?>" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <!-- Here we insert another nested accordion -->
                                          <div class="accordion" id="accordion1">
                                            <?php 
                                            foreach($menu_order_arr as $menu_order => $question_answer_arr){
                                               
                                            foreach($question_answer_arr as $question => $answers){
                                                $collapse++;
                                                ?>
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $cnt; ?>" href="#collapseInner<?php echo $collapse; ?>">
                                                    <?php if($menu_order == 1){ ?><span class="top-quest">TOP QUESTION</span> <?php } echo $question; ?>  <i class="glyphicon glyphicon-menu-down"></i>                               
                                                  </a>
                                                </div>
                                                <div id="collapseInner<?php echo $collapse; ?>" class="accordion-body collapse">
                                                  <div class="accordion-inner">
                                                    <p>
                                                        <?php echo $answers; ?>
                                                    </p>
                                                  </div>
                                                </div>
                                            </div>
                                            <?php }} ?>
                                          </div>
                                          <!-- Inner accordion ends here -->


                                        </div>
                                      </div>
                                    </div>
                                    <?php } ?>
                                  </div>
                               
                        </div>	
                    </div>
		</section>
		<!--Process Block -->
                <section id="help-log" class="gradient-two">
			<div class="container text-center">
				<p><?php echo $cta_description; ?></p>
				<a href="<?php echo $cta_button_url; ?>" title="Sign In"  class="btn btn-purple-style"><?php echo $cta_button_text; ?></a>
			</div>
		</section>
		<!-- Email Us -->
		<section class="live-chat gray-bg">
			<div class="container text-center">
                            <h2 class="section-heading"><?php echo $cta_chat_head; ?></h2>
				<h5 class="call-us"> Call us: </h5>
				<h3 class='call-number'> <?php echo $cta_chat_button; ?> </h3>
				<span class='divider-line'>  </span>
				<a href="javascript:void(0);" title="APPLY NOW" class="btn btn-blue-bg"> Live Chat <i class="glyphicon glyphicon-play"></i></a>
			</div>
		</section>
		<!-- Email Us --> 
                <!-- Infografic carousel -->
		<section id="infografic_product" class="tutorials">
			<div class="container">
				<h2 class="section-heading">Tutorials </h2>
                                <div id="infografic_carousel" class="owl-carousel owl-theme">
                                <?php
                                if ($help_center_video->found_posts > 0) {
                                while ($help_center_video->have_posts()) : $help_center_video->the_post();
                                $featured_image_video = get_post_meta(get_the_ID(), 'wpcf-featured_image_video', true);                             
                                ?>
                                    <div class="item">
                                        <div class="col-sm-12 tutorial-section">
                                            <div class="col-sm-7">
                                                <?php if (has_post_thumbnail($post->ID)): ?>
                                                <div class="video-player">
                                                    <?php echo  get_the_post_thumbnail($post->ID); ?>
                                                </div>					
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="tutorial-description">
                                                    <h3><?php echo get_the_title(); ?></h3>
                                                    <p><?php echo get_the_content(); ?></p>
                                                </div>                                                    
                                            </div>
                                        </div>
                                    </div>
                                  
				
                                <?php                               
                                endwhile;
                                }
                                ?>
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
			</div>
		</section>
		<!-- Infografic carousel -->		
                <section class="search-resource-center gray-bg">
			<div class="container text-center">
                            <h2 class="section-heading">Looking for more? <b>Search our Resource Center </b></h2>
				<form action="#" method="post">
                                    <div class="row"> 
                                            <div class="col-sm-5 col-md-6">
                                                    <div class="form-group">
                                                        <fieldset>
                                                            <input type="text" class="form-control" placeholder="Search Resources by Keyword">
                                                        </fieldset>
                                                    </div>
                                            </div>
                                            <div class="col-sm-1 option-text hidden-xs">
                                                    <p>and / or</p>
                                            </div>
                                            <div class="col-sm-4 col-md-3 hidden-xs">
                                                    <div class="select-topic">
                                                            <select class="form-control">
                                                                    <option value="">Business Type</option>
                                                                    <option value="">Business Type</option>
                                                                    <option value="">Business Type</option>
                                                            </select>
                                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>
                                                    </div>
                                            </div>
                                            <div class="col-sm-2 hidden-xs">
                                                    <div class="form-group">
                                                            <button class="btn btn-blue-bg btn-go field-style">Go</button>
                                                    </div>
                                            </div>
                                    </div>
				</form>
			</div>
		</section>
                <section  class="get-funded">
			<div class="container text-center">
				<h2 class="section-heading"> Get Funded </h2>
				<h3> Smart, Simple & Fast. </h3>
				<a href="javascript:void(0);" title="APPLY NOW" class="btn btn-blue-bg"> APPLY NOW <i class="glyphicon glyphicon-play"></i></a>
			</div>
		</section>

<?php get_footer(); ?>

