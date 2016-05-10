$(function () {
    var clickActive = false;
    if (var_object.financialProductSlider) {
        financialProductSlider = true;
    } else {
        financialProductSlider = false;
    }
   
    if(var_object.testimonialSlider){
        testimonialSlider = true;
    }
    else{
        testimonialSlider = false;
    }
    if(var_object.heroSliderTestimonial){
        heroSliderTestimonial = true;
    }
    else{
        heroSliderTestimonial = false;
    }
//var getQuoteHieght = $(window).innerWidth();
    $('.get-Quote-form .section-heading').on('click', function(){
            
            if($(window).width() < 768 ) {
                
                 $(this).parents("div#get_quote_home, div#form_box").toggleClass("activeGetQuote");
            }
    })
    $(".search-btn").click(function () {
        if (clickActive || $(window).width() < 768) {
            $("#search_resource").slideToggle();
        } else {
            $("#search_resource").show();
        }
    })


    onResize = function () {

        if ($(window).width() < 768) {
            clickActive = true;
        } else
        {
            clickActive = false;
            $(".get-Quote-form form").show();
            $("#search_resource").show();
        }
    }


    $(window).bind('resize', onResize);


    var testimonial = $("#slider_testimonial");
    testimonial.owlCarousel({
        loop: false,
        margin: 10,
        responsiveClass: true,
        autoplay: heroSliderTestimonial,
        autoplayTimeout: 8000,
        navigation: false,
        mouseDrag : true,
        touchDrag : true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: false
            }

        }
    });

    /****Code to increment index of slider***/


    testimonial.on('translated.owl.carousel', onSlideTranslate);

    function onSlideTranslate(event) {
        var item = event.item.index + 1;
        console.log(event.item.index);
        $('.current-slider').html(item);
        var current = event.item.index;
        var shownItems = event.page.size
        // total number of slides
        var total = event.relatedTarget.items().length - 1
        // how many slides to go?
        var remain = total - (shownItems + current);
        activeSliders($(".prev"), $(".next"), current, remain);
    }

    //custom next and prev. events 
    $(".next").click(function () {
        testimonial.trigger("next.owl.carousel");
    })

    $(".prev").click(function () {
        testimonial.trigger("prev.owl.carousel");
    })


    function activeSliders(prev, next, currentIndex, remain) {
        if (currentIndex == 0) {
            prev.removeClass("active");
        } else {
            var isACtive = prev.hasClass("active")
            console.log(isACtive);

            if (!isACtive) {
                prev.addClass("active");
            }
            ;

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



    var featureSlider = $("#slider_feature_product");
    featureSlider.owlCarousel({
        loop: false,
        margin: 10,
        responsiveClass: true,
        pagination: true,
        navigation: true,
        autoplay: true,
        autoplayTimeout: 8000,
        mouseDrag : true,
        touchDrag : true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                navText: ["<span class='icon-sprite feature-left-icon'></span>", "<span class='icon-sprite feature-right-icon active'></span>"],
                dots: false
            },
            768: {
                items: 3,
                nav: financialProductSlider,
                navText: ["<span class='icon-sprite feature-left-icon'></span>", "<span class='icon-sprite feature-right-icon active'></span>"],
                dots: false
            },
            992:{
                items:3,
                nav:financialProductSlider,
                navText: ["<span class='icon-sprite feature-left-icon'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
                dots: true,
            }
        },
        onInitialize: function () {

        }

    });

    featureSlider.on('changed.owl.carousel', function (property) {
        var item = property.item.index + 1;
        $('.current-slider').html(item);
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
        loop: false,
        margin: 10,
        responsiveClass: true,
        pagination: true,
        navigation: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                navText: ["<span class='icon-sprite ratting-left-icon'></span>", "<span class='icon-sprite ratting-right-icon active'></span>"],
                dots: false
            },
            768: {
                items: 3,
                nav: true,
                navText: ["<span class='icon-sprite ratting-left-icon'></span>", "<span class='icon-sprite ratting-right-icon active'></span>"],
                dots: true
            }
        }

    });

    sliderUserRatting.on('changed.owl.carousel', function (property) {
        var current = property.item.index;
        var shownItems = property.page.size
        // total number of slides
        var total = property.relatedTarget.items().length - 1
        // how many slides to go?
        var remain = total - (shownItems + current);
        activeSliders($(".ratting-left-icon"), $(".ratting-right-icon"), current, remain);

    });
    
    var successCommunity = $("#success_community .owl-carousel");
        successCommunity.owlCarousel({
        loop: false,
        margin: 10,
        responsiveClass: true,
        pagination: true,
        navigation: true,
        autoplay: false,
       // autoplayTimeout: 8000,
        responsive: {
            0: {
                items: 1,
                nav: true,
                navText: ["<span class='icon-sprite feature-left-icon'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
                dots: false
            },
            768: {
                items: 2,
                nav: testimonialSlider,
                navText: ["<span class='icon-sprite feature-left-icon'></span>","<span class='icon-sprite feature-right-icon active'></span>"],
                dots: false
            }
        },
        onInitialize: function () {
        }
    });
    
    successCommunity.on('changed.owl.carousel', function (property) {
        var current = property.item.index;
        var shownItems = property.page.size
        // total number of slides
        var total = property.relatedTarget.items().length - 1
        // how many slides to go?
        var remain = total - (shownItems + current);
        activeSliders($(".feature-left-icon"), $(".feature-right-icon"), current, remain);
        activeSliders($(".slide-prev"), $(".slide-next"), current, remain);
    });
    
    // term loan
    $("#success_community .slide-next").click(function(){                    
            successCommunity.trigger("next.owl.carousel");
    });

    $("#success_community .slide-prev").click(function(){                        
            successCommunity.trigger("prev.owl.carousel");
    });


    var resourceSlider = $("#resource_slider");
    resourceSlider.owlCarousel({
        loop: false,
        margin: 10,
        responsiveClass: true,
        pagination: true,
        navigation: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                navText: ["<span class='icon-sprite resource-left-icon active'></span>", "<span class='icon-sprite resource-right-icon active'></span>"],
                dots: false
            }
        }
    });
    resourceSlider.on('changed.owl.carousel', function (property) {
        var item = property.item.index + 1;
        $('.current-slider').html(item);
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
    })

    $(".slide-prev").click(function(){
        resourceSlider.trigger("prev.owl.carousel");
    })

    //    infograpic slider how it works               
               var infoGraphSlider = $("#infografic_carousel")    
		infoGraphSlider.owlCarousel({
                    loop:false,
		    margin:10,
		    responsiveClass:true,
		    pagination : true,
		    navigation:true,
                    autoplay: true,
                    autoplayTimeout: 8000,
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
                    var item = property.item.index + 1;
                    $('.current-slider').html(item);
                    var current = property.item.index;
                    var shownItems = property.page.size;
                   
                    // total number of slides
                    var  total = property.relatedTarget.items().length - 1;
                     
                    // how many slides to go?
                    var remain = total - (shownItems + current);
                    activeSliders($(".feature-left-icon"), $(".feature-right-icon"), current, remain);
                    activeSliders($(".slide-prev"), $(".slide-next"), current, remain);
                });
//infograpic slider how it works  end  

//help center slider prev next
                $("#infografic_product.tutorials .slide-next").click(function(){                    
			infoGraphSlider.trigger("next.owl.carousel");
		});

		$("#infografic_product.tutorials .slide-prev").click(function(){                        
			infoGraphSlider.trigger("prev.owl.carousel");
		});
//about us slider prev next
                $("#home_resource_list #articles .slide-next").click(function(){                    
			featureSlider.trigger("next.owl.carousel");
		});

		$("#home_resource_list #articles .slide-prev").click(function(){                        
			featureSlider.trigger("prev.owl.carousel");
		});


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
                if ($window.scrollTop() >= isSlider  && isGetQuoteFixed != true ) {
                    $("#get_quote_home").removeClass('navbar-fixed-top').addClass('navbar-fixed-top get-quote-style');
                    //console.log("home 1");
                } else if ($window.scrollTop() < isSlider && isGetQuoteFixed == true) {
                     $("#get_quote_home").removeClass('navbar-fixed-top get-quote-style');
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
            /* Small business funding slider */  
            $(".navigation-item").click(function(){
                var $this = $(this);
                var anchorParent = $this.parent();
                var parentSiblings = anchorParent.siblings("li.active");
                parentSiblings.removeClass("active");
                anchorParent.addClass("active");
            });
            
            // clear all - search resource
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
            
            // clear all - search resource 
//grayscale view                 
               $("#our-leading-team .thumbnail, #our-offices .thumbnail").mouseenter(function(){    
                   var $this = $(this);
                   $("#our-leading-team .thumbnail, #our-offices .thumbnail").addClass("gray-scale");
                   $this.removeClass("gray-scale");
               });
               
                $("#our-leading-team .thumbnail, #our-offices .thumbnail").mouseleave(function(){
                    $("#our-leading-team .thumbnail, #our-offices .thumbnail").removeClass("gray-scale");
                });
//grayscale view  end 
  
//sticky social icon on post
                    var top = $('#sidebar').offset().top - parseFloat($('#sidebar').css('marginTop').replace(/auto/, 0));
                    var footTop = $('#social-icon-remove').offset().top - parseFloat($('#social-icon-remove').css('marginTop').replace(/auto/, 0));

                    var maxY = footTop - $('#sidebar').outerHeight();

                    $(window).scroll(function (evt) {
                        var y = $(this).scrollTop();
                        if (y > top) {
                            if (y < maxY) {
                                $('#sidebar').addClass('fixed').removeAttr('style');
                            } else {
                                $('#sidebar').removeClass('fixed').css({
                                    position: 'absolute',
                                    top: (maxY - top) + 'px'
                                });
                            }
                        } else {
                            $('#sidebar').removeClass('fixed');
                        }
                    });
//sticky social icon on post ends
});

