<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header(); ?>
	<div class="container-fluid text-center">
		<!-- hero banner -->
		<!--Financial Products -->
		<?php if ( is_active_sidebar( 'home_page_widget' ) ) : ?>
		<?php dynamic_sidebar( 'home_page_widget' ); ?>
		<?php endif; ?>
		<!--Financial Products -->
		<!-- Testimonial section -->
		
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<ul class='footer-navigation'>
							<li><a href=""> Small Business Funding </a>
								<ul class='footer-sub-navigation'>
									<li>TrakLoan</li>
									<li>Installment Loan</li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="col-md-4  col-sm-4">
						<ul class='footer-navigation'>
							<li> <a href=""> Partner </a></li>
							<li> <a href=""> Investors </a></li>
							<li> <a href=""> Career </a></li>
							<li> <a href=""> Developer Tool </a></li>
						</ul>	
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="social-media">
							<ul class='social-badges'>
								<li>
									<a class='badges-img' href="#"> img  </a>
									<a  class='twitter-icon' href="#"> T  </a>
								</li>
								<li>
									<a class='badges-img' href="#"> img  </a>
									<a  class='facebook-icon' href="#"> F  </a>
								</li>
								<li>
									<a class='badges-img' href="#"> img  </a>
									<a  class='linkdin-icon' href="#"> IN  </a>
								</li>
							</ul>

							
						</div>
					</div>
				</div>
				<div class="row link-list-btns">
					<div class="col-sm-4"> <div class="award-list-item"> <a href="#" class=''> Help Center </a> </div> </div>
					<div class="col-sm-4"> <div class="award-list-item"> <a href="#" class=''> Contact Us </a> </div> </div>
					<div class="col-sm-4"> <div class="award-list-item"> <a href="#" class=''> Give feedback </a> </div> </div>
				</div>
			</div>
		</footer>
		<div class="container">
			<p id='copyright'> &copy; 2015 CAN Capital <a href="#"> Privacy Policy </a> | <a href="#"> Legal Notice </a></p>
		</div>

	</div>
