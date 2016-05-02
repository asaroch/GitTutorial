<?php
/*
  Template Name: Get Quick Quote
 */
get_header();
//get field option selected from admin
$fieldOptionValue = get_option('quick_quote_field_options');

// Save partner lead form
if (isset($_POST['getQuote'])) {
    print_r($_POST);die('here');
}
?>
    <div class="container">
        <span class="down-arrow"></span>
        <h2 class="section-heading"> Get Your Quote </h2>
        <form class="" role="form" method="POST" id="get_quote_submit_form">
            <div class="row">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <fieldset>
                                <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                            </fieldset>
                        </div>
                        <div class="col-sm-4">
                            <fieldset>
                                <input type="text" class="form-control" placeholder="Email ID" name="email" id="email">
                            </fieldset>
                        </div>
                        <div class="col-sm-4">
                            <fieldset>
                                <?php if(isset($fieldOptionValue['extraFieldValue']) && ($fieldOptionValue['extraFieldValue'] == 'business_name') ): ?>
                                <input type="text" class="form-control" placeholder="Business name" name="business_name" id="business-name">
                                <?php elseif(isset($fieldOptionValue['extraFieldValue']) && ($fieldOptionValue['extraFieldValue'] == 'loan_amount') ): ?>
                                <input type="text" class="form-control" placeholder="Loan amount" name="loan_amount" id="loan-amount">
                                <?php else: ?>
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone" id="phone">
                                <?php endif; ?>
                            </fieldset>
                        </div>
                    </div>
                </div>	
                <div class="col-sm-2 border-left">
                    <button type="submit" class="btn btn-blue-bg action-btn" name="getQuote"> <?php echo $fieldOptionValue['submit_button']; ?> 
                        <i class="glyphicon glyphicon-play"></i>
                    </button>					    
                </div>
            </div>
        </form>
    </div>
