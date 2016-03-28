<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="col-sm-12 col-md-3">
    <div class="row sidebar">
        <?php
        // Call resources right sidebar widget area
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Resources right sidebar')) :
        endif;

        if (!empty($tools)) :
            ?>
            <div class="col-xs-12 post-section tools-block">
                <h2 class="section-heading">Tools</h2>
                <?php
                foreach ($tools as $tool) {
                    ?>
                    <div class="col-xs-12 post-information">
                        <div class="post-image">
                            <img src="<?php echo $tool['image']; ?>" width="66" height="66">
                        </div>	
                        <p class="post-content"><a href="<?php echo esc_url($tool['external_link']); ?>"><?php echo $tool['name']; ?></a></p>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        endif;
        ?>
        <div class="col-xs-12 post-section">
            <h2 class="section-heading">CAN Capital Newsletter</h2>
            <div class="col-xs-12 post-information">
                <p>Stay up to date with the latest financial advice.</p>
                <div class="news-letter-field">
                    <input type="text" class="form-control field-style" placeholder="Email">
                    <button type="submit" class="btn btn-blue-bg field-style">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
                </div>
            </div>
        </div>
        <div class="col-xs-12 post-section hidden-xs">
            <h2 class="section-heading">Get Funded</h2>
            <div class="col-xs-12 post-information">
                <p>Smart, simple & fast</p>
                <div class="get-funded">
                    <a href="#" class="btn btn-blue-bg field-style">APPLY NOW<i class="glyphicon glyphicon-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>