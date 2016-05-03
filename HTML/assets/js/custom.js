$(function(){	
	var clickActive=false;
        
	$('.get-Quote-form .section-heading').on('click', function(){
          var isHomepage =  $("div#get_quote_home").length;
          if($(window).width() < 768 ) {
            if(isHomepage){
                $(this).parents("div#get_quote_home").toggleClass("activeGetQuote");
            } else {
                $(this).parents("div#form_box").toggleClass("activeGetQuote");
            }
          }
            
	});
	 $(".search-btn").click(function(){
	 	if(clickActive || $(window).width() < 768){
		 	$("#search_resource").slideToggle();
		 }
		 else {
		 	$("#search_resource").show();
		 }
		 });
	

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


	function activeSliders(prev, next, currentIndex, remain) {
        console.log(prev);
        if (currentIndex == 0) {
            prev.removeClass("active");
        } else {
            var isACtive = prev.hasClass("active");
            if (!isACtive) {
                prev.addClass("active");
            };

        }

        if (remain == -1) {
            next.removeClass("active");
        } else {
            var isACtive = next.hasClass("active")
            if (!isACtive) {
                next.addClass("active");
            }
            ;
        }
    }

//testimonial slider start
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

                    var current = property.item.index;
                    var shownItems = property.page.size            
                    // total number of slides
                    var total = property.relatedTarget.items().length - 1
                    // how many slides to go?
                    var remain = total - (shownItems + current);
                    activeSliders($(".prev"), $(".next"), current, remain);
                });		
		//custom next and prev. events 
		$(".next").click(function(){
			testimonial.trigger("next.owl.carousel");
		});

		$(".prev").click(function(){
			testimonial.trigger("prev.owl.carousel");
		});
//testimonial slider end

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
			            items:2,
			            nav:true,
			            navText: ["<span class='icon-sprite feature-left-icon'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
			            dots: true
			        },
                                992:{
			            items:3,
			            nav:true,
			            navText: ["<span class='icon-sprite feature-left-icon'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
			            dots: true
			        }
			},
			onInitialize: function () {
					
			}
		});

		featureSlider.on('changed.owl.carousel', function (property) {
                var current = property.item.index;
                var shownItems = property.page.size
                // total number of slides
                var total = property.relatedTarget.items().length - 1
                // how many slides to go?
                var remain = total - (shownItems + current);
                activeSliders($(".feature-left-icon"), $(".feature-right-icon"), current, remain);
                activeSliders($(".slide-prev"), $(".slide-next"), current, remain);
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
                    var current = property.item.index;
                    var shownItems = property.page.size            
                    // total number of slides
                    var total = property.relatedTarget.items().length - 1
                    // how many slides to go?
                    var remain = total - (shownItems + current);
                    activeSliders($(".ratting-left-icon"), $(".ratting-right-icon"), current, remain);

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
                communitySlider.on('changed.owl.carousel',function(property){
                    var current = property.item.index;
                    var shownItems = property.page.size            
                    // total number of slides
                    var total = property.relatedTarget.items().length - 1
                    // how many slides to go?
                    var remain = total - (shownItems + current);
                    activeSliders($(".ratting-left-icon"), $(".ratting-right-icon"), current, remain); 
                    activeSliders($(".slide-prev"), $(".slide-next"), current, remain);
                })
                
//    infograpic slider how it works               
               var infoGraphSlider = $("#infografic_carousel");    
		infoGraphSlider.owlCarousel({
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
			            dots: true
			        }
			}

		});
                infoGraphSlider.on('changed.owl.carousel', function (property) {
                    var current = property.item.index;
                    var shownItems = property.page.size;
                    // total number of slides
                    var total = property.relatedTarget.items().length - 1;
                    // how many slides to go?
                    var remain = total - (shownItems + current);
                    activeSliders($(".feature-left-icon"), $(".feature-right-icon"), current, remain);
                    activeSliders($(".slide-prev"), $(".slide-next"), current, remain);
                    
                });
//    infograpic slider how it works  end 

    
    
    
//    Home resources slider   
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
                            var current = property.item.index;
                            var shownItems = property.page.size            
                            // total number of slides
                            var total = property.relatedTarget.items().length - 1
                            // how many slides to go?
                            var remain = total - (shownItems + current);
                            activeSliders($(".slide-prev"), $(".slide-next"), current, remain);
			});

		//resource section on home next and prev. events 
		$(".slide-next").click(function(){
			resourceSlider.trigger("next.owl.carousel");
		});

		$(".slide-prev").click(function(){
			resourceSlider.trigger("prev.owl.carousel");
		});
                //help center slider
                $("#infografic_product.tutorials .slide-next").click(function(){                    
			infoGraphSlider.trigger("next.owl.carousel");
		});

		$("#infografic_product.tutorials .slide-prev").click(function(){                        
			infoGraphSlider.trigger("prev.owl.carousel");
		});
                //about us slider
                $("#home_resource_list #articles .slide-next").click(function(){                    
			featureSlider.trigger("next.owl.carousel");
		});

		$("#home_resource_list #articles .slide-prev").click(function(){                        
			featureSlider.trigger("prev.owl.carousel");
		});
                // tern loan
                $("success_community .slide-next").click(function(){                    
			communitySlider.trigger("next.owl.carousel");
		});

		$("success_community .slide-prev").click(function(){                        
			communitySlider.trigger("prev.owl.carousel");
		});
//    Home resources slider end


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
                isExeptHomerPage =   $("#form_box");

		$window.scroll(function() {
                    console.log('working');
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
                   
                    if(isExeptHomerPage){
                        var isGetQuoteFixed = $("#form_box").hasClass("navbar-fixed-top");
	        	if ($window.scrollTop() >= isSlider   && isGetQuoteFixed != true ) {
	       			$("#form_box").removeClass('navbar-fixed-top').addClass('navbar-fixed-top get-quote-style');
	        		//console.log("home 1");
	        	} else if ($window.scrollTop() < isSlider && isGetQuoteFixed == true) {
	        		 $("#form_box").removeClass('navbar-fixed-top get-quote-style');
	       			//console.log("home 2");
	        	}                     
                        
                    }
                    
		});
                
          /* Small business funding slider */      
            var sbfSlider = $("#slider_testimonial");
            $("#installment_btn").click(function(){
                sbfSlider.trigger("to.owl.carousel", [2, 500, true]);                
            })
            $("#trak_loan_btn").click(function(){
                sbfSlider.trigger("to.owl.carousel", [1, 500, true]);
               
            })
            $("#term_loan_btn").click(function(){
                sbfSlider.trigger("to.owl.carousel", [0, 500, true])
            })
            /* Small business funding slider state */  
            $(".navigation-item").click(function(){
                var $this = $(this);
                var anchorParent = $this.parent();
                var parentSiblings = anchorParent.siblings("li.active");
                parentSiblings.removeClass("active");
                anchorParent.addClass("active");
            });
// custom checkbox 22-april  

            var checkbox = $(".search-result .sidebar input[type='checkbox']");
            $(checkbox).click(function(){
                if(checkbox.is(":checked")){
                    $(".clear-all").show("slow");
                }
                else {
                   $(".clear-all").hide("slow"); 
                }
            });
            $(".clear-all").click(function(){
                $(".search-result .sidebar input[type='checkbox']").attr('checked',false);
                $(".clear-all").hide("slow");
            })
            
    // custom checkbox 22-april      
        //    help center accordion
            $(".accordion a").on("click", function () {
                $(this).children(".glyphicon-menu-down, .glyphicon-menu-up").toggleClass("glyphicon-menu-down glyphicon-menu-up");
            });
            
//            location                 
               $("#our-leading-team img, #our-offices img").mouseenter(function(){    
                   var $this = $(this);
                   $("#our-leading-team img, #our-offices img").addClass("change-one");
                   $this.removeClass("change-one");
               });
               
                $("#our-leading-team img, #our-offices img").mouseleave(function(){
                    $("#our-leading-team img, #our-offices img").removeClass("change-one");
                });
              
            


$(window).scroll(function(e){ 
  var $el = $('.fixedElement'); 
  var isPositionFixed = ($el.css('position') == 'fixed');
  if ($(this).scrollTop() > 420 && !isPositionFixed){ 
    $('.fixedElement').css({'position': 'fixed', 'top': '220px', 'right': '6.8%'}); 
  }
    if ($(this).scrollTop() < 420 && isPositionFixed)
  {
    $('.fixedElement').css({'position': 'absolute', 'top': '30px', 'right': '20px'}); 
  } 
});
});