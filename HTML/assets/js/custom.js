$(function(){	
	var clickActive=false;
//var getQuoteHieght = $(window).innerWidth();
	$('.get-Quote-form .section-heading').on('click', function(){
            
            if($(window).width() < 768 ) {
                
                 $(this).parents("div#get_quote_home").toggleClass("activeGetQuote");
            }
            
               
	/*	if(clickActive || $(window).width() < 768){

			$(".get-Quote-form form").slideToggle("slow");
		}
		else{
			$(".get-Quote-form form").show();
		}
            */
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


	function activeSliders (prev, next, currentIndex, totalSlides) {

			if (currentIndex == 0) {
		    	prev.removeClass("active"); 
		    } else  {
		    	 var isACtive = prev.hasClass("active")
		    	 if (!isACtive) {
		    	 	prev.addClass("active"); 
		    	 };

		    }

		     if (currentIndex == (totalSlides - 1) ) {
		    	next.removeClass("active"); 
		    } else  {
		    	 var isACtive = next.hasClass("active")
		    	 if (!isACtive) {
		    	 	next.addClass("active"); 
		    	 };
		    }

		}


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

		testimonial.on('changed.owl.carousel',function(property){
			var totalSlides = $("#slider_testimonial .owl-item ").length;
                        var current = property.item.index;
		    activeSliders($(".prev"), $(".next"), current, totalSlides);

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
		var featureSlider = $("#slider_feature_product");
			featureSlider.owlCarousel({
			loop:false,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
			responsive:{
			        0:{
			            items:1,
			            nav:true,
			            navText: ["<span class='icon-sprite feature-left-icon'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
			            dots: false
			        },
			        768:{
			            items:3,
			            nav:true,
			            navText: ["<span class='icon-sprite feature-left-icon'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
			            dots: true
			        }
			},
			onInitialize: function () {
					
			}

		});

		featureSlider.on('changed.owl.carousel',function(property){
			var totalSlides = $("#slider_feature_product .owl-item ").length;
		    var current = property.item.index;
		    activeSliders($(".feature-left-icon"), $(".feature-right-icon"), current, totalSlides);

		});
		

		var sliderUserRatting = $("#user_rettings_slider");
			sliderUserRatting.owlCarousel({
			loop:false,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
			responsive:{
			        0:{
			            items:1,
			            nav:true,
			            navText: ["<span class='icon-sprite ratting-left-icon'></span>","<span class='icon-sprite ratting-right-icon active'></span>"],
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

		sliderUserRatting.on('changed.owl.carousel',function(property){
			var totalSlides = $("#user_rettings_slider .owl-item ").length;
		    var current = property.item.index;
		    activeSliders($(".ratting-left-icon"), $(".ratting-right-icon"), current, totalSlides);

		});


		var communitySlider = $("#success_community .owl-carousel")
			communitySlider.owlCarousel({
			loop:false,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
			responsive:{
			        0:{
			            items:1,
			            nav:true,
			            navText: ["<span class='icon-sprite ratting-left-icon'></span>","<span class='icon-sprite ratting-right-icon active'></span>"],
			            dots: false
			        },
			        768:{
			            items:2,
			            nav:true,
			            navText: ["<span class='icon-sprite ratting-left-icon'></span>","<span class='icon-sprite ratting-right-icon active'></span>"],
			            dots: true
			        }
			}

		});

	/*	communitySlider.on('changed.owl.carousel',function(property){
			var totalSlides = $("#success_community .owl-item ").length;
		    var current = property.item.index;
		    activeSliders($(".ratting-left-icon"), $(".ratting-right-icon"), current, totalSlides);

		});
*/


		$("#infografic_carousel").owlCarousel({
			loop:true,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
			responsive:{
			        0:{
			            items:1,
			            nav:true,
			            navText: ["<span class='icon-sprite feature-left-icon active'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
			            dots: true
			        }
			}

		});

		var resourceSlider = $("#resource_slider");
			resourceSlider.owlCarousel({
				loop:false,
			    margin:10,
			    responsiveClass:true,
			    pagination : true,
			    navigation:true,
				responsive:{
				        0:{
				            items:1,
				            nav:true,
				            navText: ["<span class='icon-sprite resource-left-icon active'></span>","<span class='icon-sprite resource-right-icon active'></span>"],
				            dots: false
				        }
				}

			});

			resourceSlider.on('changed.owl.carousel',function(property){
				var totalSlides = $("#resource_slider .owl-item ").length;
			    var current = property.item.index;
			    activeSliders($(".slide-prev"), $(".slide-next"), current, totalSlides);

			});



		//resource section on home next and prev. events 
		$(".slide-next").click(function(){
			resourceSlider.trigger("next.owl.carousel");
		})

		$(".slide-prev").click(function(){
			resourceSlider.trigger("prev.owl.carousel");
		})



		//STICKY MAIN NAVIGATION BAR WHEN SCROLL THE WINDOW.
		var navbar = $("#main_navigationbar"),
                main_navigation_height = 30;
                $window = $(window),
                isSlider = 0;
                if($(window).width() > 768 ) {
                    isSlider = 85;
                } else {
                     isSlider = 30;
                }
	
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
	       			$("#get_quote_home").removeClass('navbar-fixed-top').addClass('navbar-fixed-top get-quote-style');
	        		//console.log("home 1");
	        	} else if ($window.scrollTop() < isSlider && isGetQuoteFixed == true) {
	        		 $("#get_quote_home").removeClass('navbar-fixed-top get-quote-style');
	       			//console.log("home 2");
	        	}
                    }

		});

		

})