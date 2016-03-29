$(function(){	
	var clickActive=false;
//var getQuoteHieght = $(window).innerWidth();
	$('.get-Quote-form .section-heading').on('click', function(){
		if(clickActive || $(window).width() < 768){

			$(".get-Quote-form form").slideToggle("slow");
		}
		else{
			$(".get-Quote-form form").show();
		}
	})
	 $(".search-btn").click(function(){
	 	if(clickActive || $(window).width() < 768){
		 	$("#search_resource").slideToggle();
		 }
		 else {
		 	$("#search_resource").show();
		 }
		 })
	

	onResize = function(){	

		if($(window).width() < 768){
			clickActive=true;
		}
		else
		{
			clickActive=false;
			$(".get-Quote-form form").show();
			$("#search_resource").show();
		}	
	}


	$(window).bind('resize', onResize);


	var testimonial  = $("#slider_testimonial");
		testimonial.owlCarousel({
			loop:false,
		    margin:10,
		    responsiveClass:true,
		    navigation:false,
			responsive:{
			        0:{
			            items:1,
			            nav:false,
			            dots: false
			        }

			    }
		});
		
		//custom next and prev. events 
		$(".next").click(function(){
			testimonial.trigger("next.owl.carousel");
		})

		$(".prev").click(function(){
			testimonial.trigger("prev.owl.carousel");
		})

		//var sliderFeatureProduct = $("#slider_feature_product");
		//var sliderFeatureProduct = $("#slider_feature_product");
		$("#slider_feature_product").owlCarousel({
			loop:false,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
			responsive:{
			        0:{
			            items:1,
			            nav:true,
			            navText: ["<img src='images/home/blue_arrow_left.png'>","<img src='images/home/blue_arrow_right.png'>"],
			            dots: false
			        },
			        768:{
			            items:3,
			            nav:true,
			            navText: ["<img src='images/home/blue_arrow_left.png'>","<img src='images/home/blue_arrow_right.png'>"],
			            dots: true
			        }
			}

		});
		$("#user_rettings_slider").owlCarousel({
			loop:true,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
			responsive:{
			        0:{
			            items:1,
			            nav:true,
			            navText: ["<img src='images/home/blue_arrow_left.png'>","<img src='images/home/blue_arrow_right.png'>"],
			            dots: false
			        },
			        768:{
			            items:3,
			            nav:true,
			            navText: ["<span class='icon-sprite ratting-left-icon'></span>","<span class='icon-sprite ratting-right-icon active'></span>"],
			            dots: true
			        }
			}

		});

		//STICKY MAIN NAVIGATION BAR WHEN SCROLL THE WINDOW.
		var navbar = $("#main_navigationbar"),
		main_navigation_height = 30;
		$window = $(window),
		isSlider = 160,
		isHomePage =   $("#home_get_quote");

		$window.scroll(function() {
			//console.log($window.scrollTop() +' ---   '+isSlider+ '   ' +isHomePage.length )
			 var isFixedMainNav = navbar.hasClass("navbar-fixed-top");
		    if ($window.scrollTop() >= main_navigation_height &&  isFixedMainNav != true) {
		        navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top').addClass("navbar-scroll-bg");
		        $(".top-heading").css("padding-top", "60px");
		        if (!isHomePage.length) {
		        	$("#get_quote").show("fast");
		        	$("#form_box").addClass("get-quote-style");
		        };
		    } else if ($window.scrollTop() < main_navigation_height && isFixedMainNav == true) {
		        navbar.removeClass('navbar-fixed-top').removeClass("navbar-scroll-bg");
		        $(".top-heading").css("padding-top", "0px");
		         if (!isHomePage.length) {
		        	$("#get_quote").hide("fast");
		        };
		    }
		     if ( isHomePage )  {
		     	var isGetQuoteFixed = $("#get_quote_home").hasClass("navbar-fixed-top");
	        	if ($window.scrollTop() >= isSlider   && isGetQuoteFixed != true ) {
	       			$("#get_quote_home").removeClass('navbar-fixed-top').addClass('navbar-fixed-top get-quote-style').css({"position":"fixed","top":"54px"});
	        		//console.log("home 1");
	        	} else if ($window.scrollTop() < isSlider && isGetQuoteFixed == true) {
	        		 $("#get_quote_home").removeClass('navbar-fixed-top get-quote-style').css({"position":"relative","top":"0px"});
	       			//console.log("home 2");
	        	}
	        }

		});

		 //CANCAPITAL LOGO HOVER FUNCTIONALITY SHOW THE GET YOUR QUOTE OVERLAY 
		/* $("#form_box, .navbar-brand").hover(function () {
		 	$(".get-hover-form").show();

		 }, function () {
		 	$(".get-hover-form").hide();

		 });*/

})