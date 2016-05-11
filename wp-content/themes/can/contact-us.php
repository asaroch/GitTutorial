<?php
/*
  Template Name: Contact Us
 */
get_header();

/*
 * Fetch Offices list
 */
$our_offices = new WP_Query();
$our_offices->query('post_type=our-office&posts_per_page=-1&orderby=menu_order date&order=ASC');

// Newsletter
$newsletter = get_option('news_letter_data');

// Save partner lead form
if (isset($_POST['submit'])) {
    extract($_POST);
    //$table = $wpdb->prefix.'partner_lead_generations';

    /* $wpdb->insert( 
      $table,
      array(
      'first_name'    => $first_name,
      'last_name'     => $last_name,
      'email'         => $email,
      'phone'         => $phone,
      'business'      => $business_name,
      'title'         => $title,
      'message'       => $message,
      'partner_type'  => $sales,
      'created'       => date("Y-m-d H:i:s")
      ),
      array(
      '%s',
      '%s',
      '%s',
      '%s',
      '%s',
      '%s',
      '%s',
      '%s',
      '%s'
      )
      ); */

    // Fetch email format
    $emailFormat = get_option('contact_us_email_format');
    $headers[] = 'From: ' . get_option('admin_email');
    $headers[] = 'Content-Type: text/html; charset=UTF-8';

    $to_replace = array(
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone' => $phone,
        'business_name' => $business_name,
        'title' => $title,
        'message' => $message
    );
    foreach ($to_replace as $tag => $var) {
        $emailFormat['body'] = str_replace('[' . $tag . ']', $var, $emailFormat['body']);
    }

    if (wp_mail($email, $emailFormat['subject'], $emailFormat['body'], $headers)) {
        $location = get_the_permalink(518);
        wp_redirect($location, 302);
        exit;
    }
}
?>
<section id="partner_lead_form"><!-- partner form -->
    <div class="container">
        <form action="" method="post" class="form-section contact-from" id="contact_form">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="section-heading">Please tell us a little about yourself.</h2>
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="first_name" class="control-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="last_name" class="control-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="email_addr" class="control-label">Email address</label>
                            <input type="text" class="form-control" id="email_addr" name="email">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="phone_no" class="control-label">Phone number</label>
                            <input type="text" class="form-control" id="phone_no" name="phone">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="business_name" class="control-label">Business name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-12 margin-top">
                    <div class="form-group">
                        <fieldset>
                            <label for="title" class="control-label">Your message</label>
                            <textarea class="form-control" rows="10" cols="10" id="message" name="message" ></textarea>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="join-us">
                        <button type="submit" class="btn btn-blue-bg action-btn" name="submit"> SEND 
                            <i class="glyphicon glyphicon-play"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!-- partner form -->
<!-- About us -->
<section  id="about_us" class="gradient-two">
    <div class="container text-center">
        <p>Still having questions? <b>Find Out More.</b></p>
        <a href="help-center" title="ABOUT US"  class="btn btn-purple-style">HELP CENTER</a>
    </div>
</section>
<!-- Email Us -->
<section id="email_us" class="gray-bg">
    <div class="container text-center">
        <h2 class="section-heading text-capitalize"> Want to learn more about <br/> becoming a sales partner? </h2>
        <h5 class="call-us"> Call us: </h5>
        <h3 class='call-number'> 1-877-550-4731 </h3>
        <span class='divider-line'>  </span>
        <a href="javascript:void(0);" title="APPLY NOW" class="btn btn-blue-bg"> LIVE CHAT <i class="glyphicon glyphicon-play"></i></a>
    </div>
</section>
<!-- Email Us -->
<!-- our offices -->
<?php if ($our_offices->found_posts > 0): ?>
    <section id="our-offices">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">Our Offices</h2>
                <?php
                $office_count = wp_count_posts('our-office');
                if ($office_count->publish == 4):
                    $class = 'col-md-3';
                else:
                    $class = 'col-md-4';
                endif;
                while ($our_offices->have_posts()):
                    $our_offices->the_post();
                    ?>
                    <div class="col-sm-6 <?php echo $class; ?>">
                        <div class="thumbnail">
                            <?php
                            if (has_post_thumbnail($post->ID)):
                                echo get_the_post_thumbnail($post->ID, 'single-post-thumbnail', array('class' => 'img-responsive'));
                            endif;
                            ?>
                            <div class="caption text-center">
                                <h3><?php echo get_the_title(); ?></h3>
                                <p><?php echo get_the_content(); ?></p>
                                <a href="javascript:void();" class="learn-more-btn" title="JOB LISTING"> JOB LISTINGS <i class="glyphicon glyphicon-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- our offices -->
<!-- CAN Capital Newslette -->
<section class="gradient-one" id="cc-newslette">
    <div class="container">					
        <div class="row">
            <div class="col-sm-12">
                <?php
                if ($newsletter['heading'] != '') {
                    ?>
                    <h3 class="section-heading news-letter-heading"><?php echo $newsletter['heading']; ?></h3>
                    <?php
                }
                ?>
                <?php
                if ($newsletter['description'] != '') {
                    ?>
                    <p><?php echo $newsletter['description']; ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
        <form method="post" id="newsletter-subscription">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control field-style" placeholder="Email Address" name="email">
                        </div>
                        <small>We never share your information</small>
                    </div>
                    <div class="col-sm-4 btn-left">
                        <button type="submit" class="btn btn-blue-bg field-style" name="subscribe_newsletter">GET NEWSLETTER <i class="glyphicon glyphicon-play"></i></button>
                    </div>						
                </div>
            </div>
        </form>
    </div>
</section>
<!-- CAN Capital Newslette -->
<section class="get-funded">
    <div class="container text-center">
        <?php wp_reset_postdata(); ?>
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
        <h3> <?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>

