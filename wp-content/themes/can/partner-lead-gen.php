<?php
/*
  Template Name: Partner Lead Generation
 */
get_header();
?>
<section id="partner_lead_form"><!-- partner form -->
			<div class="container">
				<form action="#" method="post" class="form-section">
					<div class="row">
						<div class="col-xs-12">
							<h3>Partner Info</h3>
						</div>
					</div>
					<div class="row"> 
						<div class="col-sm-6">
							<div class="form-group">
								<label for="first_name">First name</label>
								<input type="text" class="form-control" id="first_name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="last_name">Last name</label>
								<input type="text" class="form-control" id="last_name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="email_addr">Email address</label>
								<input type="text" class="form-control" id="email_addr">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="phone_no">Phone number</label>
								<input type="text" class="form-control" id="phone_no">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="business_name">Business name</label>
								<input type="text" class="form-control" id="business_name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control" id="title">
							</div>
						</div>
						<div class="col-sm-12 margin-top">
							<div class="form-group">
								<label for="title">Your message</label>
								<textarea class="form-control" rows="10" cols="10"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<h3 class="heading-parter-type">Partner Type</h3>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 partner-type">
							<div class="form-group">															
								<input type="radio" class="form-control" id="distribution_sales" name="sales">
								<label for="distribution_sales"><span></span>Distribution Sales Partner<a href="javascript:void(0);" data-toggle="tooltip" title="Duis id efficitur tortor, sed pharetra nibh!" class="question-mark"></a></label>
								
							</div>
							<div class="form-group">														
								<input type="radio" class="form-control" id="referral_sales" name="sales">
								<label for="referral_sales"><span></span>Referral Sales Partner<a href="javascript:void(0);" data-toggle="tooltip" title="Duis id efficitur tortor, sed pharetra nibh!" class="question-mark"></a></label>
								
							</div>
							<div class="form-group">															
								<input type="radio" class="form-control" id="financial_platform" name="sales">
								<label for="financial_platform"><span></span>Financial Platform Sales Partner<a href="javascript:void(0);" data-toggle="tooltip" title="Duis id efficitur tortor, sed pharetra nibh!" class="question-mark"></a></label>
								
							</div>
							<div class="form-group">														
								<input type="radio" class="form-control" id="not_sure" name="sales">
								<label for="not_sure"><span></span>I'm not sure</label>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<h3 class="heading-beacome-partner">Looking to become an Affiliate Partner?</h3>
							<p>Join via the <a href="javascript:void(0);" class="know-more">CC Affiliate Network</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="join-us">
								<button type="submit" class="btn btn-blue-bg action-btn"> JOIN 
									<i class="glyphicon glyphicon-play"></i>
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section><!-- partner form -->
<section  class="get-funded">
    <div class="container text-center">
        <h1 class="section-heading"> Get Funded </h1>
        <h3> Smart, Simple & Fast. </h3>
        <?php dynamic_sidebar('applynow'); ?>
    </div>
</section>
<?php get_footer(); ?>

