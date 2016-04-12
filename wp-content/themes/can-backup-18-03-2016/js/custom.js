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
})