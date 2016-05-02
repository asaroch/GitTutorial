$(function () {
    if (var_object.search) {
        $('html, body').animate({scrollTop: $('#resource_list_container .featured-content').offset().top}, 'slow');
    }
    $(".resource-container .row:gt(" + var_object.show_more_limit + ")").hide();

    $('.show-more-articles').click(function (e) {
        e.preventDefault();
        $(".resource-container .row:gt(" + var_object.show_more_limit + ")").show('slow');
        $(".show-more-articles").hide();
        $(".show-less-articles").show();
    });

    $('.show-less-articles').click(function (e) {
        e.preventDefault();
        $(".resource-container .row:gt(" + var_object.show_more_limit + ")").hide('slow');
        $(".show-more-articles").show();
        $(".show-less-articles").hide();
        $('html, body').animate({scrollTop: $('#all_resources_block').offset().top}, 'slow');
        //$('.resource-container').focus();
    });
    $('ul.termloan-use-point li:gt(5)').hide();

    $('.show-more-term-loan').click(function (e) {
        e.preventDefault();
        $('ul.termloan-use-point li:gt(5)').show('slow');
        $(".show-more-term-loan").hide();
        $(".show-less-term-loan").show();
        $('html, body').animate({scrollTop: $('#use_termloan_for').offset().top}, slow);
    });

    $('.show-less-term-loan').click(function (e) {
        e.preventDefault();
        $('ul.termloan-use-point li:gt(5)').hide('slow');
        $(".show-more-term-loan").show();
        $(".show-less-term-loan").hide();
        $('html, body').animate({scrollTop: $('#use_termloan_for').offset().top}, slow);
    });

    //show more and show hide for terms and payments section.
    $('ul.details-point').find('li:gt(3)').hide();
    $('.show-more-termDetail-loan').click(function (e) {
        e.preventDefault();
        $('ul.details-point').find('li:gt(3)').show('slow');
        $(".show-more-termDetail-loan").hide();
        $(".show-less-termDetail-loan").show();
        //$('html, body').animate({scrollTop: $('#details_termsloan').offset().top}, 1000);
    });

    $('.show-less-termDetail-loan').click(function (e) {
        e.preventDefault();
        $('ul.details-point').find('li:gt(3)').hide('slow');
        $(".show-more-termDetail-loan").show();
        $(".show-less-termDetail-loan").hide();
        // $('html, body').animate({scrollTop: $('#details_termsloan').offset().top}, slow);
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

    //for validating get a quote form

    jQuery(".submitButton").click(function () {
        var name = jQuery('#name').val();
        var strLenght = name.length;
        //var email = jQuery('#email').val();
        //var amount = jQuery('#amount').val();
        var nameReg = /^[a-zA-Z]+$/;
        //var emailReg = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if (strLenght != 0) {
            if ((strLenght < 2) || !nameReg.test(name)) {
                jQuery('.name').find('span').remove();
                jQuery('.name').append('<span class="wpcf7-not-valid-tip" role="alert">Please enter a valid name.</span>');
                return false;
            } else
            {
                $(".wpcf7-form").submit();
            }
        }
    });

    jQuery("#phone").mask("(999) 999-9999");

    // Partner lead generation validations
    $('#partner-lead-generation').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10,
                //maxlength   : 10 
            },
            business_name: {
                required: true
            },
            title: {
                required: true
            },
            message: {
                required: true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.validationsErrs.required,
                minlength: var_object.validationsErrs.first_name_min_chars,
                lettersonly: var_object.validationsErrs.first_name_min_chars
            },
            last_name: {
                required: var_object.validationsErrs.required,
                minlength: var_object.validationsErrs.last_name_min_chars,
                lettersonly: var_object.validationsErrs.last_name_min_chars
            },
            email: {
                required: var_object.validationsErrs.required,
                email: var_object.validationsErrs.email,
            },
            phone: {
                required: var_object.validationsErrs.required,
                minlength: "Minimum 10 numbers are allowed",
            },
            business_name: {
                required: var_object.validationsErrs.required
            },
            title: {
                required: var_object.validationsErrs.required
            },
            message: {
                required: var_object.validationsErrs.required
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "No number or special character allowed")


    $('.refine-by-topic-checkbox').on('change', function () {
        $('#refine-by-topic-form').submit();
    });
    
    if (var_object.resourceFilteredParameters.filteredTopics) {
        $(".clear-all").show("slow");
    }
    
    // Disable go button on page load
    if ( var_object.resourceFilteredParameters.businessTypes || var_object.resourceFilteredParameters.searchKeyword ) {
        $('.btn-go').prop('disabled', false);
    }
    else {
        $('.btn-go').prop('disabled', true);
    }
    
    // Enable go button if user has entered text
     $('#resource-search input[type="text"]').keyup(function() {
        if($(this).val() != '') {
           $('.btn-go').prop('disabled', false);
        }
        else {
            if ( $('#business-type').val() == '' ) {
                $('.btn-go').prop('disabled', true);
            }
            else {
               $('.btn-go').prop('disabled', false);
            }
        }
     });
     
    $('#business-type').change(function() {
         if( $(this).val() != '' ) {
           $('.btn-go').prop('disabled', false);
        }
        else {
            if ( $('#resource-search input[type="text"]').val() == '' ) {
                $('.btn-go').prop('disabled', true);
            }
            else {
               $('.btn-go').prop('disabled', false);
            }
        }
    });

    $('.resource-filter-paging').on('click', function (e) {
        $this = $(this);
        e.preventDefault();
        var offset = $("#show-more-filtered-resources-offset").val();
        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_resources_pagination',
                resourceFilteredParameters: var_object.resourceFilteredParameters,
                offset: offset
            },
            beforeSend: function () {
                $("#loading-image").show();
                $('.show-more-terms').hide();
            },
            success: function (response) {
                $("#loading-image").hide();
                if (response.status == 'error') {
                    $('.show-more-terms').hide();
                } else {
                    $('.show-more-terms').show();
                    $('#show-more-filtered-resources-offset').val(++offset);
                }
                $('#mostRecent').append(response.data);
            }
        });
    });
    
    // Quick Quote validations
    $('#ee').validate({
        // Specify the validation rules
        rules: {
            name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10,
                //maxlength   : 10 
            },
            business_name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            loan_amount: {
                required: true
            }
        },
        // Specify the validation error messages
        messages: {
            name: {
                required: var_object.quickQuotevalidationsErrs.required,
                minlength: var_object.quickQuotevalidationsErrs.first_name_min_chars,
                lettersonly: var_object.quickQuotevalidationsErrs.first_name_min_chars
            },
            last_name: {
                required: var_object.quickQuotevalidationsErrs.required,
                minlength: var_object.quickQuotevalidationsErrs.last_name_min_chars,
                lettersonly: var_object.quickQuotevalidationsErrs.last_name_min_chars
            },
            email: {
                required: var_object.quickQuotevalidationsErrs.required,
                email: var_object.quickQuotevalidationsErrs.email,
            },
            phone: {
                required: var_object.quickQuotevalidationsErrs.required,
                minlength: "Minimum 10 numbers are allowed",
            },
            business_name: {
                required: var_object.quickQuotevalidationsErrs.required,
                minlength: var_object.quickQuotevalidationsErrs.business_name_min_chars,
                lettersonly: var_object.quickQuotevalidationsErrs.business_name_min_chars
            },
            loan_amount: {
                required: var_object.quickQuotevalidationsErrs.required
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});