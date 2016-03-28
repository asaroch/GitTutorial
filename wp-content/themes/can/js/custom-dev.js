$(function () {
    $(".resource-container .row:gt(2)").hide();

    $('.show-more-articles').click(function (e) {
        e.preventDefault();
        $(".resource-container .row:gt(2)").show();
        $(".show-more-articles").hide();
        $(".show-less-articles").show();
    });

    $('.show-less-articles').click(function (e) {
        e.preventDefault();
        $(".resource-container .row:gt(2)").hide();
        $(".show-more-articles").show();
        $(".show-less-articles").hide();
        $('html, body').animate({scrollTop: $('#all_resources_block').offset().top}, 'fast');
        //$('.resource-container').focus();
    });

    $('#filter_by_business_type select').change(function () {
        $("#filter_by_business_type").submit();
    });


});