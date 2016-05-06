<?php
/*
  Template Name: Get Quick Quote
 */
//get_header();
//get field option selected from admin
$fieldOptionValue = get_option('quick_quote_field_options');


// Save partner lead form
/* if (isset($_POST['getQuote'])) { 
  $url = $fieldOptionValue['post_url'];
  $name = $_POST['fname'];
  $email = $_POST['email'];
  $extraFieldValue = $_POST[$fieldOptionValue['extraFieldValue']];
  $postUrl = $url."?name=".$name."&email=".$email."&".$fieldOptionValue['extraFieldValue']."=".$extraFieldValue;

  } */
?>

<div class="container">
    <span class="down-arrow"></span>
    <h2 class="section-heading"> Get Your Quote </h2>
    <form method="POST" id="get_quote_submit_form" class="get-Quote-col">
        <div class="row">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <fieldset>
                            <input type="text" class="form-control" placeholder="Name" name="first_name" id="name">
                        </fieldset>
                    </div>
                    <div class="col-sm-3">
                        <fieldset>
                            <input type="text" class="form-control" placeholder="Email ID" name="email_address" id="email">
                        </fieldset>
                    </div>
                    <div class="col-sm-3">
                        <fieldset>
                            <input type="number" class="form-control" placeholder="Annual Revenue" name="annual_revenue" id="loan-amount" min="4500" max="500000">
                        </fieldset>
                    </div>
                    <div class="col-sm-3">
                        <fieldset>
                            <input type="text" class="form-control" placeholder="Phone Number" name="business_phone_number" id="phone">
                        </fieldset>
                    </div>
                </div>
            </div>	
            <div class="col-sm-2 border-left">
                <button type="submit" class="btn btn-blue-bg action-btn"> <?php echo $fieldOptionValue['submit_button']; ?> 
                    <i class="glyphicon glyphicon-play"></i>
                </button>					    
            </div>
        </div>
    </form>
</div>
