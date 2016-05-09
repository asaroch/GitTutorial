<?php
/**
 * Plugin Name: Partners
 * Description: Plugin displays error messages
 */
add_action('admin_menu', 'can_partners_add_pages');

/* * *********************************************************
 * Callback function of menu hook 
 * ********************************************************* */

function can_partners_add_pages() {
    add_menu_page('Partners', 'Partners', 6, 'partners', 'partners_callback_function', '', 6);
    add_submenu_page('partners', 'Partner Types', 'Partner Types', 5, 'edit.php?post_type=partner-type');
    add_submenu_page('partners', 'Selected Partners', 'Selected Partners', 5, 'edit.php?post_type=selected_partner');
    add_submenu_page('partners', 'Partner Benefits', 'Partner Benefits', 5, 'edit.php?post_type=partner_benefit');
    add_submenu_page('partners', 'Partners Lead Generation', 'Partners Lead Generation', 5, 'partner_lead_generation', 'partner_lead_generation');
    add_submenu_page('partners', 'Partners Lead Generation Email Format', 'Partners Lead Generation Email Format', 5, 'partner_lead_generation_email_format', 'partner_lead_generation_email_format');
}

function partner_lead_generation_email_format() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');
    // Save email format
    if ( isset($_POST['saveEmailFormat']) ) {
       extract($_POST);
       update_option( 'partners_lead_generations_email_format', $email );
    }
    
    // Fetch email format
    $emailFormat = get_option('partners_lead_generations_email_format');
    ?>
     <div class="row">
        <h3>Partner Lead Generation email format:</h3>
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
function partner_lead_generation() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');
    
    // Save validations error message
    if ( isset($_POST['saveValidationsErrorMessage']) ) {
        update_option( 'partners_lead_generations_validations_error_msg', $_POST['validations'] );
    }
    
    // Fetch option
    $validationsErr = get_option('partners_lead_generations_validations_error_msg');
    
    // Save affiliate data
    if ( isset($_POST['saveAffiliate']) ) {
        extract($_POST);
        update_option( 'partners_lead_affiliate_data', $affiliate );
    }
    
    // Fetch email format
    $affiliate = get_option('partners_lead_affiliate_data');
    ?>
    <div class="row">
        <h3>Partners Lead Generation validation error messages :</h3>
        <div class="col-md-8">
            <form role="form" method="post" >
                <div class="form-group">
                    <label for="required">Required:</label>
                    <input type="text" class="form-control" id="required" placeholder="This field is required" name="validations[required]" required value="<?php echo $validationsErr['required']; ?>" />
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
    <div class="row">
        <h3>Partner Lead Generation affiliate link:</h3>
        <div class="col-md-8">
            <form role="form" method="post" >
                <div class="form-group">
                    <label for="copy-text">Copy Text:</label>
                    <input type="text" class="form-control" id="copy-text" placeholder="Heading" name="affiliate[heading]" required value="<?php echo $affiliate['heading']; ?>" />
                </div>
                <div class="form-group">
                    <label for="external-link">External Link:</label>
                    <input type="text" class="form-control" id="external-link" placeholder="External Link" name="affiliate[link]" required value="<?php echo $affiliate['link']; ?>" />
                </div>
                <button type="submit" class="btn btn-primary" name="saveAffiliate">Save</button>
            </form>
        </div>
    </div>
   
    <?php
}

/* * *********************************************************
 * Callback function of hook to display partners page
 * ********************************************************* */

function partners_callback_function() {
    ?>
    <div class="wrap">
        <h1>Partner Options:</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("partners-section");
            do_settings_sections("partners");
            submit_button();
            ?>          
        </form>
    </div>
    <?php
}

function partner_types_heading() {
    ?>
    <textarea name="partner_types_heading" id="partner_types_heading"><?php echo get_option('partner_types_heading'); ?></textarea>
    <?php
}

function partner_benefits() {
    ?>
     <textarea name="partner_benefits" id="partner_benefits"><?php echo get_option('partner_benefits'); ?></textarea>
    <?php
}

function selected_partners() {
    ?>
     <textarea name="selected_partners" id="selected_partners"><?php echo get_option('selected_partners'); ?></textarea>
    <?php
}

function call_to_action_heading() {
    ?>
    <textarea name="call_to_action_heading" id="call_to_action_heading"><?php echo get_option('call_to_action_heading'); ?></textarea>
    <?php
}

function call_no() {
    ?>
    <textarea name="call_no" id="call_no"><?php echo get_option('call_no'); ?></textarea>
    <?php
}

function call_to_action_email() {
    ?>
    <textarea name="call_to_action_email" id="call_to_action_email"><?php echo get_option('call_to_action_email'); ?></textarea>
    <?php
}

function industry_recognition() {
    ?>
    <textarea name="industry_recognition" id="industry_recognition"><?php echo get_option('industry_recognition'); ?></textarea>
    <?php
}

function display_partner_panel_fields() {
    add_settings_section("partners-section", "Settings:", null, "partners");

    add_settings_field("Partner Types Heading", "Partner Types Heading", "partner_types_heading", "partners", "partners-section");
    add_settings_field("Partner Benefits", "Partner Benefits", "partner_benefits", "partners", "partners-section");
    add_settings_field("Selected Partners", "Selected Partners", "selected_partners", "partners", "partners-section");
    add_settings_field("Call to action heading", "Call to action heading", "call_to_action_heading", "partners", "partners-section");
    add_settings_field("Call No", "Call No", "call_no", "partners", "partners-section");
    add_settings_field("Email", "Email", "call_to_action_email", "partners", "partners-section");
    add_settings_field("Industry Recognition", "Industry Recognition", "industry_recognition", "partners", "partners-section");

    register_setting("partners-section", "partner_types_heading");
    register_setting("partners-section", "partner_benefits");
    register_setting("partners-section", "selected_partners");
    register_setting("partners-section", "call_to_action_heading");
    register_setting("partners-section", "call_no");
    register_setting("partners-section", "call_to_action_email");
    register_setting("partners-section", "industry_recognition");
}

add_action("admin_init", "display_partner_panel_fields");
