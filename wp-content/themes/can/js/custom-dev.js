$(function () {
    //$('#main_navigationbar').tabs( "select" , index );
    if (var_object.search) {
        $('html, body').animate({scrollTop: $('#resource_list_container .featured-content').offset().top}, 'slow');
    }
    $(".resource-landing .row:gt(" + var_object.show_more_limit + ")").hide();

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
   /*jQuery("#phone").focusout(function() {
        var element = $(this);
        element.unmask();
         phone = element.val().replace(/\D/g, '');
         alert(phone.length);
    if(phone.length < 10) {
         $( '<label id="phone-error" class="error" for="phone" style="display:block;">Phone number is not valid.</label>').insertAfter( "#phone" );
    }
    else
    {
        $('#phone-error').remove();
    }
});*/

    $('#newsletter-subscription').validate({
        // Specify the validation rules
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        // Specify the validation error messages
        messages: {
            email: {
                required: "This field is required",
                email: "Invalid Email",
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            var email = $(form).find('input[type="text"]').val();
            $.ajax({
                url: var_object.ajax_url,
                dataType: 'json',
                type: 'post',
                data: {
                    action: 'newsletter_subscribe',
                    email: email
                },
                beforeSend: function () {
                    $(form).find('button').prop('disabled', true);
                },
                success: function (response) {
                    if (response.msg == 'Sucess') {
                        $(response.data).insertBefore(".news-letter-heading");
                        $(form).find('button').prop('disabled', false);
                    }
                }
            });
        }
    });

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
    if (var_object.resourceFilteredParameters.businessTypes || var_object.resourceFilteredParameters.searchKeyword) {
        $('.btn-go').prop('disabled', false);
    } else {
        $('.btn-go').prop('disabled', true);
    }

    // Enable go button if user has entered text
    $('#resource-search input[type="text"]').keyup(function () {
        if ($(this).val() != '') {
            $('.btn-go').prop('disabled', false);
        } else {
            if ($('#business-type').val() == '') {
                $('.btn-go').prop('disabled', true);
            } else {
                $('.btn-go').prop('disabled', false);
            }
        }
    });

    $('#business-type').change(function () {
        if ($(this).val() != '') {
            $('.btn-go').prop('disabled', false);
        } else {
            if ($('#resource-search input[type="text"]').val() == '') {
                $('.btn-go').prop('disabled', true);
            } else {
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
    $('#get_quote_submit_form').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            email_address: {
                required: true,
                email: true
            },
            business_phone_number: {
                required: true,
                minlength: 10
            },
            annual_revenue: {
                required: true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.quickQuotevalidationsErrs.firstname_required,
                minlength: var_object.quickQuotevalidationsErrs.first_name_min_chars,
                lettersonly: var_object.quickQuotevalidationsErrs.first_name_min_chars
            },
            email_address: {
                required: var_object.quickQuotevalidationsErrs.email_required,
                email: var_object.quickQuotevalidationsErrs.email,
            },
            business_phone_number: {
                required: var_object.quickQuotevalidationsErrs.phone_required,
                minlength: "Minimum 10 numbers are allowed",
            },
            annual_revenue: {
                required: var_object.quickQuotevalidationsErrs.anuualrevenue_required,
                min: var_object.quickQuotevalidationsErrs.loan_amount,
                max: var_object.quickQuotevalidationsErrs.loan_amount
            }
        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            $(form).ajaxSubmit({
                type: "GET",
                url: var_object.fieldOptionValue.post_url,
                success: function () {
                    alert("Success");
                },
                error: function () {
                    //$('#get_quote_submit_form').fadeTo( "slow", 0.15, function() {
                    //$('#error').fadeIn();
                    // });
                }
            });
        }
    });

    $('#fb-share-button').click(function (e) {
        e.preventDefault();
        FB.ui({
            method: 'share',
            href: var_object.resourceURL
        }, function (response) {
        });
    });

    // Paginate resource listing
    $('.paginate-topic-listing').click(function (e) {
        $this = $(this);
        e.preventDefault();
        var offset = $("#paginate-listing-resources-offset").val();
        var term = $('#resource-topic-term').val();
        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_resources_listing_pagination',
                offset: offset,
                term: term
            },
            beforeSend: function () { // show loader before ajax success
                $("#loading-image").show();
                $('.show-more-terms').hide();
            },
            success: function (response) {
                $("#loading-image").hide();
                if (response.status == 'error') {
                    $('.show-more-terms').hide();
                } else {
                    $('.show-more-terms').show();
                    $('#paginate-listing-resources-offset').val(++offset);
                }
                $(response.data).insertBefore(".paginate-topic-listing");
            }
        });
    });

    // Paginate author listing
    $('.paginate-author-listing').click(function (e) {
        $this = $(this);
        e.preventDefault();
        var offset = $("#paginate-author-offset").val();

        var author = $('#author-id').val();
        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_author_listing_pagination',
                offset: offset,
                author: author
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
                    $('#paginate-author-offset').val(++offset);
                }
                $(response.data).insertBefore(".paginate-author-listing");
                //$('#listing-resources').append(response.data);
            }
        });
    });

    // Contact Us validations
    $('#contact_form').validate({
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
                required: var_object.contact_us_validations_error_msg.firstname_required,
                minlength: var_object.contact_us_validations_error_msg.first_name_min_chars,
                lettersonly: var_object.contact_us_validations_error_msg.first_name_min_chars
            },
            last_name: {
                required: var_object.contact_us_validations_error_msg.lastname_required,
                minlength: var_object.contact_us_validations_error_msg.last_name_min_chars,
                lettersonly: var_object.contact_us_validations_error_msg.last_name_min_chars
            },
            email: {
                required: var_object.contact_us_validations_error_msg.email_required,
                email: var_object.contact_us_validations_error_msg.email,
            },
            phone: {
                required: var_object.contact_us_validations_error_msg.phone_required,
                minlength: "Minimum 10 numbers are allowed",
            },
            business_name: {
                required: var_object.contact_us_validations_error_msg.business_required
            },
            title: {
                required: var_object.contact_us_validations_error_msg.title_required
            },
            message: {
                required: var_object.contact_us_validations_error_msg.message_required
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    jQuery("#phone_no").mask("(999) 999-9999",{autoclear: false});

    // Glossary show more
    $('.glossary-filter-paging').click(function (e) {
        $this = $(this);
        e.preventDefault();
        var offset = $("#glossary-filtered-resources-offset").val();

        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_glossary_pagination',
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
                    $('#glossary-filtered-resources-offset').val(++offset);
                }

                if ($("#mostRecentGlossary div.row:last").find('.section-heading').html() == $(response.data).find('.section-heading').html()) {
                    var resource_title = $(response.data).filter("div.row:first");

                    //var resource_title = $(response.data).find('div').first();
                    var resource = $(resource_title).find('p');
                    $("#mostRecentGlossary div.row:last .col-sm-12").append(resource);
                    var last_element = $(response.data).filter("div.row:not(:first)");
                    $(last_element).insertBefore(".glossary-show-more");
                } else {
                    $(response.data).insertBefore(".glossary-show-more");
                }
            }
        });
    });
    
    $(document).on('keyup',function(evt) {
    if (evt.keyCode == 9) {
       $("#tabcontrol").focus();
        evt.preventDefault();
        return false;
    }
});


});
