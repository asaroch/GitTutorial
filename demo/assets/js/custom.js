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

	onResize = function(){	

		if($(window).width() < 768){
			clickActive=true;
		}
		else
		{
			clickActive=false;
			$(".get-Quote-form form").show();
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
	   	 	testimonial.trigger("owl.next");
	    })

	    $(".prev").click(function(){
		    testimonial.trigger("owl.next");
		})

		//var sliderFeatureProduct = $("#slider_feature_product");
		$("#slider_feature_product").owlCarousel({
			loop:true,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
			responsive:{
			        0:{
			            items:1,
			            nav:true,
			            dots: false
			        },
			        768:{
			            items:3,
			            nav:true,
			            dots: true
			        }
			    }

		});

		var navbar = $("#main_navigationbar"),
		distance = navbar.offset().top,
		$window = $(window);

		 $window.scroll(function() {
	        if ($window.scrollTop() >= distance) {
	            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top').addClass("navbar-scroll-bg");
	          	$(".top-heading").css("padding-top", "60px");
	        } else {
	            navbar.removeClass('navbar-fixed-top').removeClass("navbar-scroll-bg");
	            $(".top-heading").css("padding-top", "0px");
	        }
	    });

})