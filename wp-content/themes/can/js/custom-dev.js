$(function () {
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
    if(phone.length < 10) {
        $('#phone').after('<label class="error">Phone number has to be 10 digits long.</label>');
        return false;
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
                    $('.newsletter-button').hide();
                    $('#loading-image').show();
                },
                success: function (response) {
                    if (response.msg == 'Sucess') {
                        $('#cc-newsletter').find('label:first').remove();
                        $(response.data).insertBefore(".news-letter-heading");
                        $('.newsletter-button').show();
                        $('#loading-image').hide();
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
                lettersonly: true,
                onlyspaces : true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces : true
            },
            email: {
                required: true,
                validateEmail: true,
                onlyspaces : true
            },
            phone: {
                required: true,
                minlength: 10,
                onlyspaces : true
                //maxlength   : 10 
            },
            business_name: {
                required: true,
                onlyspaces : true
            },
            title: {
                required: true,
                onlyspaces : true
            },
            message: {
                required: true,
                onlyspaces : true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required   : var_object.validationsErrs.first_name_required,
                minlength  : var_object.validationsErrs.first_name_min_chars,
                lettersonly: var_object.validationsErrs.first_name_min_chars,
                onlyspaces : var_object.validationsErrs.first_name_required
            },
            last_name: {
                required: var_object.validationsErrs.last_name_required,
                minlength: var_object.validationsErrs.last_name_min_chars,
                lettersonly: var_object.validationsErrs.last_name_min_chars,
                onlyspaces : var_object.validationsErrs.last_name_required
            },
            email: {
                required: var_object.validationsErrs.email_required,
                validateEmail: var_object.validationsErrs.email,
                onlyspaces : var_object.validationsErrs.email_required
            },
            phone: {
                required: var_object.validationsErrs.phone_no_required,
                minlength: "Minimum 10 numbers are allowed",
                onlyspaces : var_object.validationsErrs.phone_no_required
            },
            business_name: {
                required: var_object.validationsErrs.business_required,
                onlyspaces : var_object.validationsErrs.business_required
            },
            title: {
                required: var_object.validationsErrs.title_required,
                onlyspaces : var_object.validationsErrs.title_required
            },
            message: {
                required: var_object.validationsErrs.msg_required,
                onlyspaces : var_object.validationsErrs.msg_required
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "No number or special character allowed")

    jQuery.validator.addMethod("validateEmail", function (value, element) {
         var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(value);
    }, "Invalid Email")
    
    jQuery.validator.addMethod("onlyspaces", function (value, element) {
        if ( $.trim( value ).length == 0 ) {
            return false;
        }
        else {
            return true;
        }
    }, "Required")

    $('.refine-by-topic-checkbox').on('change', function () {
        $('#refine-by-topic-form').submit();
    });

    if (var_object.resourceFilteredParameters.filteredTopics) {
        $(".clear-all").show("slow");
    }
    
    //Resource search form validations
    $('#resource-search').submit(function(e) {
        var submit = true;
        var search_keyword = $('#search-keyword').val();
        var business_type  = $('#business-type').val();
       
        if ( search_keyword == '' && business_type == '' ) {
            $( '<label class="error">Please enter either search keyword or choose business type</label>' ).insertAfter( "#search-keyword" );
            e.preventDefault();
        }
    });
  
    // Get the active tab on resource sorting page
    var currentTab = "Most Popular";
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        currentTab = $(e.target).text(); // get current tab
    });

    $('.resource-filter-paging').on('click', function (e) {
        $this   = $(this);
        $insertbefore = $(this).parent();
        e.preventDefault();
        var offset = $this.next().val();
        $.ajax({
            url      : var_object.ajax_url,
            dataType : 'json',
            type     : 'post',
            data: {
                action                     : 'ajax_resources_pagination',
                resourceFilteredParameters : var_object.resourceFilteredParameters,
                offset                     : offset,
                currentTab                 : currentTab
            },
            beforeSend: function () {
                $insertbefore.next().find('#loading-image').show();
                $insertbefore.hide();
            },
            success: function (response) {
                $insertbefore.next().find('#loading-image').hide();
                if (response.status == 'error') {
                    $insertbefore.hide();
                } else {
                    $insertbefore.show();
                    $this.next().val(++offset);
                }
                $(response.data).insertBefore($insertbefore);
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
                lettersonly: true,
                onlyspaces : true
            },
            email_address: {
                required: true,
                validateEmail: true,
                onlyspaces : true
            },
            business_phone_number: {
                required: true,
                minlength: 10,
                onlyspaces : true
            },
            annual_revenue: {
                required: true,
                onlyspaces : true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.quickQuotevalidationsErrs.firstname_required,
                minlength: var_object.quickQuotevalidationsErrs.first_name_min_chars,
                lettersonly: var_object.quickQuotevalidationsErrs.first_name_min_chars,
                onlyspaces : var_object.quickQuotevalidationsErrs.firstname_required,
            },
            email_address: {
                required: var_object.quickQuotevalidationsErrs.email_required,
                email: var_object.quickQuotevalidationsErrs.email,
                onlyspaces : var_object.quickQuotevalidationsErrs.email_required,
            },
            business_phone_number: {
                required: var_object.quickQuotevalidationsErrs.phone_required,
                minlength: "Minimum 10 numbers are allowed",
                onlyspaces : var_object.quickQuotevalidationsErrs.phone_required,
            },
            annual_revenue: {
                required: var_object.quickQuotevalidationsErrs.anuualrevenue_required,
                min: var_object.quickQuotevalidationsErrs.loan_amount,
                max: var_object.quickQuotevalidationsErrs.loan_amount,
                onlyspaces : var_object.quickQuotevalidationsErrs.anuualrevenue_required,
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
                lettersonly: true,
                onlyspaces : true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces : true
            },
            email: {
                required: true,
                validateEmail: true,
                onlyspaces : true
            },
            phone: {
                required: true,
                minlength: 10,
                onlyspaces : true 
            },
            business_name: {
                required: true,
                onlyspaces : true
            },
            title: {
                required: true,
                onlyspaces : true
            },
            message: {
                required: true,
                onlyspaces : true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.contact_us_validations_error_msg.firstname_required,
                minlength: var_object.contact_us_validations_error_msg.first_name_min_chars,
                lettersonly: var_object.contact_us_validations_error_msg.first_name_min_chars,
                onlyspaces : var_object.contact_us_validations_error_msg.firstname_required
            },
            last_name: {
                required: var_object.contact_us_validations_error_msg.lastname_required,
                minlength: var_object.contact_us_validations_error_msg.last_name_min_chars,
                lettersonly: var_object.contact_us_validations_error_msg.last_name_min_chars,
                onlyspaces : var_object.contact_us_validations_error_msg.lastname_required
            },
            email: {
                required: var_object.contact_us_validations_error_msg.email_required,
                email: var_object.contact_us_validations_error_msg.email,
                onlyspaces : var_object.contact_us_validations_error_msg.email_required
            },
            phone: {
                required: var_object.contact_us_validations_error_msg.phone_required,
                minlength: "Minimum 10 numbers are allowed",
                onlyspaces : var_object.contact_us_validations_error_msg.phone_required
            },
            business_name: {
                required: var_object.contact_us_validations_error_msg.business_required,
                onlyspaces : var_object.contact_us_validations_error_msg.business_required
            },
            title: {
                required: var_object.contact_us_validations_error_msg.title_required,
                onlyspaces : var_object.contact_us_validations_error_msg.title_required
            },
            message: {
                required: var_object.contact_us_validations_error_msg.message_required,
                onlyspaces : var_object.contact_us_validations_error_msg.message_required
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    jQuery("#phone_no").mask("(999) 999-9999");

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
    
    $("#menu-item-214").append($(".boldchat"));


});
