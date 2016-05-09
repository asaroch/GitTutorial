<?php
/*
  Template Name: Partner Lead Generation
 */
get_header();
// Save partner lead form
if ( isset($_POST['join']) ) {
    extract($_POST);
    $table = $wpdb->prefix.'partner_lead_generations';
    
    $wpdb->insert( 
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
    );
    
     // Fetch email format
    $emailFormat = get_option('partners_lead_generations_email_format');
    $headers[] = 'From: '.get_option('admin_email');
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    
    $to_replace = array(
                        'first_name'         => $first_name,
                        'last_name'         => $last_name,
                        'phone'            => $phone,
                        'business_name' => $business_name,
                        'title'      => $title,
                        'message' => $message
			);
    foreach ( $to_replace as $tag => $var ) {
            $emailFormat['body'] = str_replace( '[' . $tag . ']', $var, $emailFormat['body'] );
    }
   
    if ( wp_mail ( $email, $emailFormat['subject'], $emailFormat['body'], $headers) ) {
        $location = get_the_permalink(518);
        wp_redirect( $location, 302 );
        exit;
    }
}
?>
<section id="partner_lead_form"><!-- partner form -->
    <div class="container">
        <form method="post" class="form-section" id="partner-lead-generation" role="form">
            <div class="row">
                <div class="col-xs-12">
                    <h3>Partner Info</h3>
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="first_name" class="control-label">First name</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" />
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="last_name" class="control-label">Last name</label>
                            <input type="text" class="form-control" id="last-name" name="last_name">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="email_addr" class="control-label">Email address</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                            <label for="phone_no" class="control-label">Phone number</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        <fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <fieldset>
                             <label for="business_name" class="control-label">Business name</label>
                             <input type="text" class="form-control" id="business-name" name="business_name">
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
                            <textarea class="form-control" rows="10" cols="10" id="message" name="message"></textarea>
                        </fieldset>
                    </div>
                </div>
            </div>
            <?php 
            // Fetch partner types
            // The Query
            $args = array('post_status' => 'publish',
                'post_type'      => 'partner-type',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
                'posts_per_page' => -1
            );
            $partners = query_posts($args);
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="heading-parter-type">Partner Type</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 partner-type">
                    <?php 
                    foreach ( $partners as $partner ) {
                        if ( $partner->post_name != 'affiliate-partner' ) {
                            $help_text = get_post_meta($partner->ID, 'wpcf-help-text', true);
                            ?>
                            <div class="form-group">
                                <fieldset>
                                    <input type="radio" class="form-control" id="<?php echo $partner->post_name; ?>" name="sales" value="<?php echo $partner->post_title; ?>" <?php echo $_GET['partner'] && $_GET['partner'] == $partner->post_name ? 'checked=checked' : ''; ?>>
                                   <label for="<?php echo $partner->post_name; ?>"><span></span><?php echo $partner->post_title; ?><a href="javascript:void(0);" data-toggle="tooltip" title="<?php echo $help_text; ?>" class="question-mark"></a></label>
                                </fieldset>   
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="form-group">
                        <fieldset>
                            <input type="radio" class="form-control" id="not_sure" name="sales" value="none">
                           <label for="not_sure"><span></span>I'm not sure</label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <?php
            $affiliate_data = get_option('partners_lead_affiliate_data');
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="heading-beacome-partner required"><?php echo $affiliate_data['heading']; ?></h3>
                    <p>Join via the <a href="<?php echo $affiliate_data['link'] != '' ? $affiliate_data['link'] : 'javascript:void(0)' ; ?>" <?php echo $affiliate_data['link'] != '' ? 'target=_blank' : '';  ?> class="know-more">CC Affiliate Network</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="join-us">
                        <button type="submit" class="btn btn-blue-bg action-btn" name="join"> JOIN 
                            <i class="glyphicon glyphicon-play"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!-- partner form -->
<section class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> <?php echo get_post_meta($post->ID, 'wpcf-cta-title', true); ?></h2>
        <h3> <?php echo get_post_meta($post->ID, 'wpcf-cta-description', true); ?></h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>

