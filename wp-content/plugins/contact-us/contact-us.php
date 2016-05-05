<?php
/**
 * Plugin Name: Contact Us
 * Description: Plugin displays error messages
 */
add_action('admin_menu', 'can_contact_us_add_pages');

/* * *********************************************************
 * Callback function of menu hook 
 * ********************************************************* */

function can_contact_us_add_pages() {
    add_menu_page('Contact Us', 'Contact US', 6, 'contact-us', 'contact_us_callback_function', '', 6);
    //add_submenu_page('partners', 'Partner Types', 'Partner Types', 5, 'edit.php?post_type=partner-type');
    add_submenu_page('contact-us', 'Contact Us Email Format', 'Contact Us Email Format', 5, 'contact_us_email_format', 'contact_us_email_format');
}

function contact_us_email_format() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');
    // Save email format
    if ( isset($_POST['saveEmailFormat']) ) {
       extract($_POST);
       update_option( 'contact_us_email_format', $email );
    }
    
    // Fetch email format
    $emailFormat = get_option('contact_us_email_format');
    ?>
     <div class="row">
        <h3>Contact Us Email Format:</h3>
        <div class="col-md-8">
            <form role="form" method="post" >
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" placeholder="Email Subject" name="email[subject]" required value="<?php echo $emailFormat['subject']; ?>" />
                </div>
                <div class="form-group">
                    <label for="email-body">Body:</label>
                  <?php 
                  $content = $emailFormat['body'];
                  wp_editor( $content, 'email-body', $settings = array('textarea_name' => 'email[body]') ); ?> 
                </div>
                <button type="submit" class="btn btn-primary" name="saveEmailFormat">Save</button>
            </form>
        </div>
    </div>
    <?php
}

/* * *********************************************************
 * Callback function of menu hook 
 * ********************************************************* */
function contact_us_callback_function() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');
    
    // Save validations error message
    if ( isset($_POST['saveValidationsErrorMessage']) ) {
        update_option( 'contact_us_validations_error_msg', $_POST['validations'] );
    }
    
    // Fetch option
    $validationsErr = get_option('contact_us_validations_error_msg');
    
    ?>
    <div class="row">
        <h3>Partners Lead Generation validation error messages :</h3>
        <div class="col-md-8">
            <form role="form" method="post" >
                <div class="form-group">
                    <label for="firstname_required">Required message for First Name:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[firstname_required]" required value="<?php echo $validationsErr['firstname_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="lastname_required">Required message for Last Name:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[lastname_required]" required value="<?php echo $validationsErr['lastname_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="email_required">Required message for Email Address:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[email_required]" required value="<?php echo $validationsErr['email_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="phone_required">Required message for Phone Number:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[phone_required]" required value="<?php echo $validationsErr['phone_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="business_required">Required message for Business Name:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[business_required]" required value="<?php echo $validationsErr['business_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="title_required">Required message for Title:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[title_required]" required value="<?php echo $validationsErr['title_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="message_required">Required message for Message:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[message_required]" required value="<?php echo $validationsErr['message_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="email-valid">Email valid:</label>
                    <input type="text" class="form-control" id="email-valid" placeholder="Invalid Email" name="validations[email]" required value="<?php echo $validationsErr['email']; ?>" />
                </div>
                 <div class="form-group">
                    <label for="first-name-minimum-chars">First name minimum characters allowed:</label>
                    <input type="text" class="form-control" id="first-name-minimum-chars" placeholder="Minimum of 2 characters and no numbers or special characters" name="validations[first_name_min_chars]" required value="<?php echo $validationsErr['first_name_min_chars']; ?>" />
                </div>
                 <div class="form-group">
                    <label for="last-name-minimum-chars">Last name minimum characters allowed:</label>
                    <input type="text" class="form-control" id="last-name-minimum-chars" placeholder="Minimum of 2 characters and no numbers or special characters" name="validations[last_name_min_chars]" required value="<?php echo $validationsErr['first_name_min_chars']; ?>" />
                </div>
                <button type="submit" class="btn btn-primary" name="saveValidationsErrorMessage">Save</button>
            </form>
        </div>
    </div>
   
    <?php
}


