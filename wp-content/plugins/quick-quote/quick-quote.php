<?php
/**
 * Plugin Name: Quick Quote 
 * Description: Plugin displays error messages
 */
add_action('admin_menu', 'can_quick_quote_add_pages');

/* * *********************************************************
 * Callback function of menu hook 
 * ********************************************************* */

function can_quick_quote_add_pages() {
    add_menu_page('Quick Quote', 'Quick Quote', 6, 'quick-quote', 'quick_quote', '', 6);
    add_submenu_page('quick-quote', 'Quick Quote Field Options', 'Quick Quote Field Options', 5, 'quick_quote_field_options', 'quick_quote_field_options');
}

/* * *********************************************************
 * Callback function of menu hook 
 * ********************************************************* */

function quick_quote() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');

    // Save validations error message
    if (isset($_POST['saveValidationsErrorMessage'])) {
        update_option('quick_quote_generations_validations_error_msg', $_POST['validations']);
    }

    // Fetch option
    $validationsErr = get_option('quick_quote_generations_validations_error_msg');
    ?>
    <div class="row">
        <h3>Quick Quote validation error messages :</h3>
        <div class="col-md-8">
            <form role="form" method="post" >
                <div class="form-group">
                    <label for="firstname_required">Required message for Name:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[firstname_required]" required value="<?php echo $validationsErr['firstname_required']; ?>" />
                </div>
                <div class="form-group">
                    <label for="anuualrevenue_required">Required message for Annual Revenue:</label>
                    <input type="text" class="form-control" placeholder="This field is required" name="validations[anuualrevenue_required]" required value="<?php echo $validationsErr['anuualrevenue_required']; ?>" />
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
                    <label for="email-valid">Email valid:</label>
                    <input type="text" class="form-control" id="email-valid" placeholder="Invalid Email" name="validations[email]" required value="<?php echo $validationsErr['email']; ?>" />
                </div>
                <div class="form-group">
                    <label for="first-name-minimum-chars">First name minimum characters allowed:</label>
                    <input type="text" class="form-control" id="first-name-minimum-chars" placeholder="Minimum of 2 characters and no numbers or special characters" name="validations[first_name_min_chars]" required value="<?php echo $validationsErr['first_name_min_chars']; ?>" />
                </div>
                <div class="form-group">
                    <label for="loan-amount">Annual Revenue range:</label>
                    <input type="text" class="form-control" id="loan-amount" placeholder="Minimum range for loan amount is 4500 and maximum is 500,000" name="validations[loan_amount]" required value="<?php echo $validationsErr['loan_amount']; ?>" />
                </div>
                <button type="submit" class="btn btn-primary" name="saveValidationsErrorMessage">Save</button>
            </form>
        </div>
    </div>


    <?php
}

/* * *********************************************************
 * Callback function of submenu hook 
 * ********************************************************* */

function quick_quote_field_options() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');

    // Save validations error message
    if (isset($_POST['saveFieldOptions'])) {
        update_option('quick_quote_field_options', $_POST);
    }

    // Fetch option
    $fieldOptionValue = get_option('quick_quote_field_options');
    ?>
    <div class="row">
        <h3>Quick Quote Field Options :</h3>
        <div class="col-md-8">
            <form role="form" method="post" >

                <div class="form-group">
                    <label for="post_url">Post URL:</label>
                    <input type="text" class="form-control" name="post_url" value="<?php echo $fieldOptionValue['post_url']; ?>"/>
                </div>

                <div class="form-group">
                    <label for="post_url">Label For Submit Button:</label>
                    <input type="text" class="form-control" name="submit_button" value="<?php echo $fieldOptionValue['submit_button']; ?>"/>
                </div>
                <button type="submit" class="btn btn-primary" name="saveFieldOptions">Save</button>
            </form>
        </div>
    </div>


    <?php
}
