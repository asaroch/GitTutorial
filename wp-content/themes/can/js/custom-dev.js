$(function () {
    
    if ( var_object.search) {
       //$('html, body').animate({scrollTop: $('#all_resources_block').offset().top}, 'slow');
    }
    $(".resource-container .row:gt("+var_object.show_more_limit+")").hide();

    $('.show-more-articles').click(function (e) {
        e.preventDefault();
        $(".resource-container .row:gt("+var_object.show_more_limit+")").show();
        $(".show-more-articles").hide();
        $(".show-less-articles").show();
    });

    $('.show-less-articles').click(function (e) {
        e.preventDefault();
        $(".resource-container .row:gt("+var_object.show_more_limit+")").hide();
        $(".show-more-articles").show();
        $(".show-less-articles").hide();
        $('html, body').animate({scrollTop: $('#all_resources_block').offset().top}, 'slow');
        //$('.resource-container').focus();
    });
    $('ul.termloan-use-point li:gt(5)').hide();
    
    $('.show-more-term-loan').click(function (e) {
        e.preventDefault();
        $('ul.termloan-use-point li:gt(5)').show();
        $(".show-more-term-loan").hide();
        $(".show-less-term-loan").show();
    });

    $('.show-less-term-loan').click(function (e) {
        e.preventDefault();
        $('ul.termloan-use-point li:gt(5)').hide();
        $(".show-more-term-loan").show();
        $(".show-less-term-loan").hide();
       // $('html, body').animate({scrollTop: $('#all_resources_block').offset().top}, 'slow');
        //$('.resource-container').focus();
    });

    $('#filter_by_business_type select').change(function (e) {
        //e.preventDefault();
//        var data = {
//		'action' : 'resource_filter_callback',
//		'data'   : {}
//	};
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
//	jQuery.post(var_object.ajax_url, data, function(response) {
//		alert('Got this from the server: ' + response);
//	});
        $("#filter_by_business_type").submit();
    });


});