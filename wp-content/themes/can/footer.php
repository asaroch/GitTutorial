<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<footer class="gradient-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 footer-links">
                <div class="row">
                    <div class="col-sm-3 col-md-4">
                        <div class="foot-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/home/CAN_logo_footer.png" alt="CAN CAPITAL LOGO">
                        </div>						
                    </div>
                    <div class="col-sm-3 col-md-3 badges">
                        <a href="#" title="APPLY NOW" class="btn btn-blue-bg"> APPLY NOW <i class="glyphicon glyphicon-play"></i> </a>
                        <ul class="badges-container">
                            <li>
                                <a href="#" title="Small Business Funding"> 
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/home/TRUSTe_icon.png" alt="TRUSTe link"> 
                                </a>
                            </li>
                            <li>
                                <a href="#" title="Small Business Funding"> 
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/home/bbb_icon.png" alt="accredited Business "> 
                                </a>
                            </li>
                        </ul>	
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <div class="row">
                            <div class="col-sm-7">		
                                <?php
                                // Call footer left menu
                                $args = array('menu' => 'Footer Left', 'menu_class' => 'footer-navigation', 'container' => false);
                                wp_nav_menu($args);
                                ?>		
                            </div>
                            <div class="col-sm-5 dashed-border-left">
                                <?php
                                // Call footer right menu
                                $args = array('menu' => 'Footer Right', 'menu_class' => 'footer-navigation', 'container' => false);
                                wp_nav_menu($args);
                                ?>		
                            </div>
                        </div>
                    </div>
                    <?php 
                    $linkedin_url = get_option( 'linkedin_url');
                    $facebook_url = get_option( 'facebook_url');
                    $twitter_url  = get_option( 'twitter_url');
                    $youtube_url  = get_option( 'youtube_url');
                     ?>
                    <div class="social-links">
                        <ul>
                            <li>
                                <a href="<?php echo isset($twitter_url) && $twitter_url != '' ? $twitter_url : 'javascript:void(0)'; ?>" <?php echo isset($twitter_url) && $twitter_url != '' ? 'target=_blank' : ''; ?> title="Twitter">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/home/twitter_icon.png" alt="twitter share">
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo isset($facebook_url) && $facebook_url != '' ? $facebook_url : 'javascript:void(0)'; ?>" <?php echo isset($facebook_url) && $facebook_url != '' ? 'target=_blank' : ''; ?> title="Facebook">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/home/facebook_icon.png" alt="facebook share">
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo isset($linkedin_url) && $linkedin_url != '' ? $linkedin_url: 'javascript:void(0)'; ?>" <?php echo isset($linkedin_url)  && $linkedin_url != '' ? 'target=_blank' : ''; ?> title="LinkedIn">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/home/linkedin_icon.png" alt="linkdin share">
                                </a>
                            </li>
                            <li>
                                <a href=<?php echo isset($youtube_url) && $youtube_url != '' ? $youtube_url : 'javascript:void(0)'; ?>" <?php echo isset($youtube_url) && $youtube_url != '' ? 'target=_blank' : ''; ?> title="YouTube">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/home/youtube_icon.png" alt="youtube share">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="footer-note">
                    <?php
                    $footerText =  get_post_meta($post->ID , 'wpcf-footer-text');
                   echo  $footerText[0];
                    ?>
                </div>	
            </div>
        </div>		
    </div>
</footer>
</div>
<?php wp_footer(); ?>


<!-- included external js files -->

<script type="text/javascript">

    $(document).ready(function () {
        var awardSlider = $('#awardSlider');
        awardSlider.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            navigation: true,
            navigationText: [
                "<i class='glyphicon glyphicon-chevron-left'></i>",
                "<i class='glyphicon glyphicon-chevron-right'></i>"
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 5,
                    nav: true
                }
            }
        })



        var featurePost = $("#featurePost");
        featurePost.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            navigation: true,
            navigationText: [
                "<i class='icon-chevron-left icon-white'></i>",
                "<i class='icon-chevron-right icon-white'></i>"
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 4,
                    nav: true
                }
            }

        });

        var testimonial = $("#sliderTestimonial");
        testimonial.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            navigation: true,
            navigationText: [
                "<i class='icon-chevron-left icon-white'></i>",
                "<i class='icon-chevron-right icon-white'></i>"
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                }
            }

        });

        //var sliderFeatureProduct = $("#sliderFeatureProduct");
        $("#sliderFeatureProduct").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            pagination: true,
            navigation: true,
            navigationText: [
                "<i class='glyphicon glyphicon-chevron-left'></i>",
                "<i class='glyphicon glyphicon-chevron-right'></i>"
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    dots: false,
                },
                768: {
                    items: 3,
                    nav: true,
                    dots: true,
                }
            }

        });

    });

</script>

</body>
</html>
