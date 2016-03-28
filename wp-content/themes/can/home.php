<?php
/*
  Template Name: Home
 */
get_header();
?>
<!--Financial Products -->
<div  id="financial_product" class="gradient-one">
    <div id="home_get_quote">
        <div id="get_quote_home" class="gradient-one get-Quote-form">
            <div class="container">
                <span class="down-arrow"></span>
                <h2 class="section-heading"> Get Your Quote </h2>
                <form class="" role="form">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" placeholder="Email ID">
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" placeholder="Email ID">
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" placeholder="Email ID">
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-2 border-left">
                            <button type="submit" class="btn btn-blue-bg action-btn"> GET STARTED 
                                <i class="glyphicon glyphicon-play"></i>
                            </button>         
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (is_active_sidebar('financial-product')) : ?>
        <div class="widget-area financial-product" role="complementary">
            <?php dynamic_sidebar('financial-product'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>

    <!---to display trust badges-->
    <?php if (is_active_sidebar('trust-badge')) : ?>
        <div class="widget-area trust-badge" role="complementary">
            <?php dynamic_sidebar('trust-badge'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>	
    <!--trust badge widget ends here-->

</div>
<!--Financial Products -->

<!-- Testimonial section -->
<?php if (is_active_sidebar('testimonial')) : ?>
    <div class="widget-area testimonial" role="complementary">
        <?php dynamic_sidebar('testimonial'); ?>
    </div><!-- .widget-area -->
<?php endif; ?>	
<!--Testimonial widget ends here-->
<section  id="about_us" class="gradient-two">
    <div class="container text-center">
        <p>Supporting small business for <b>18 years</b> with over <b>$6 billion</b> in working capital.</p>
        <a href="javascript:void(0);" title="ABOUT US"  class="btn btn-purple-style">ABOUT US</a>
    </div>
</section>
<section  class="get-funded">
    <div class="container text-center">
        <h1 class="section-heading"> Get Funded </h1>
        <h3> Smart, Simple & Fast. </h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>



<script type="text/javascript">

    $(document).ready(function () {


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

