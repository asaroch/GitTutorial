<div class="col-sm-12 col-md-3 mob-grey-bg">
    <div class="row sidebar">
        <?php
// Call resources right sidebar widget area
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Resources right sidebar')) :
        endif;
        ?>
        <?php
        // Newsletter
        $newsletter = get_option('news_letter_data');
        ?>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0 post-section">
            <?php
            if ($newsletter['heading'] != '') {
                ?>
                <h2 class="section-heading news-letter-heading"><?php echo $newsletter['heading']; ?></h2>
                <?php
            }
            ?>
            <div class="col-xs-12 post-information">
                <?php
                if ($newsletter['description'] != '') {
                    ?>
                    <p><?php echo $newsletter['description']; ?></p>
                    <?php
                }
                ?>
                <form method="post" id="newsletter-subscription">
                    <div class="news-letter-field">
                        <fieldset>
                            <input type="text" class="form-control field-style" placeholder="Email Address" name="email">
                        </fieldset>
                        <button type="submit" class="btn btn-blue-bg field-style" name="subscribe_newsletter">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0 post-section hidden-xs">
            <h2 class="section-heading"><?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
            <div class="col-xs-12 post-information">
                <p><?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></p>
                <div class="get-funded">
                    <!-- applynow widget section -->
                    <?php if (is_active_sidebar('applynow')) : ?>
                        <div class="widget-area applynow" role="complementary">
                            <?php dynamic_sidebar('applynow'); ?>
                        </div><!-- .widget-area -->
                    <?php endif; ?>	
                    <!--applynow widget ends here-->
                </div>
            </div>
        </div>
    </div>
</div>
