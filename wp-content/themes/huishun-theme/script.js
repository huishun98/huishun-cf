jQuery(document).ready(function ($) {

    //dropdown
    const archiveDropdownActive = () => {
        document.getElementsByClassName("archive-dropdown")[0].style.zIndex = "10";
        $('.archive-dropdown').addClass('active');
    };
    const archiveDropdownInactive = () => {
        $('.archive-dropdown').removeClass('active');
        document.getElementsByClassName("archive-dropdown")[0].style.zIndex = "-1";
    }

    const archiveObj;

    $('.fixed-header .header-label').each((index, obj) => {
        // following line is problematic
        if ($(obj).html() == 'All posts') {
            archiveObj = $(obj).parent();
        }
    });

    if (archiveObj) {
        archiveObj.hover(() => {
            archiveDropdownActive();
        }, () => {
            archiveDropdownInactive();
        })
    }

    $('.archive-dropdown').hover(() => {
        archiveDropdownActive();
    }, () => {
        archiveDropdownInactive();
    })

    //recent posts
    // var recentPosts = () => {
    //     var topToTimeline = $('.timeline-section').offset().top - 20;
    //     $("html").animate({ scrollTop: topToTimeline }, 600);
    // }
    // $('.scroll-down').click(() => {
    //     recentPosts();
    // })

    //set youtube vids height 
    var resizeYoutube = () => {
        var youtubeWidth = $('.wp-block-embed-youtube').width();
        var youtubeHeight = 0;
        $('.wp-block-embed-youtube').each((index, obj) => {
            // console.log(obj);
            if ($(obj).hasClass('wp-embed-aspect-16-9')) {
                youtubeHeight = youtubeWidth * 9 / 16;
            }
            $(obj).find("iframe").css("height", youtubeHeight);
        })
    }
    resizeYoutube();
    $(window).resize(() => {
        resizeYoutube();
    })

    //View more function
    numOfPosts = 0;
    heightOfNewestPostsOuter = 0;
    showValue = 3;
    $('.timeline-item').each((index, obj) => {
        numOfPosts++;
        if (index < showValue) {
            heightOfNewestPostsOuter += $(obj).height();
        }
    });
    $('.newest-posts-outer').css('height', heightOfNewestPostsOuter + 'px');
    if (numOfPosts > showValue) {
        $('.view-more').css('display', 'block');
    }
    $('.view-more').click(() => {
        heightOfNewestPostsOuter = 0;
        if (showValue + 2 < numOfPosts) {
            showValue += 2;
        } else {
            showValue = numOfPosts;
        }
        $('.timeline-item').each((index, obj) => {
            if (index < showValue) {
                heightOfNewestPostsOuter += $(obj).height();
            }
        });
        $('.newest-posts-outer').css('height', heightOfNewestPostsOuter + 'px');
        if (showValue == numOfPosts) {
            $('.view-more').css('opacity', 0);
            const disappear = () => {
                $('.view-more').css('display', 'none');
            }
            setTimeout(disappear, 500);
        }
    })



    //hamburger function
    $('.mobile-navi-trigger').click(() => {

        if ($('.hamburger').hasClass('active')) {
            $('.hamburger-line').removeClass('active');
            $('.hamburger').removeClass('active');
            $('.mobile-navi-target-outer').removeClass('active');
            $('html').css('overflow', 'auto');
        } else {
            $('.hamburger-line').addClass('active');
            $('.hamburger').addClass('active');
            $('.mobile-navi-target-outer').addClass('active');
            $('html').css('overflow', 'hidden');
        }
    })


    //mailchimp   
    ajaxMailChimpForm($("#subscribe-form"), $("#subscribe-result"));

    // If resultElement is given, the subscribe result is set as html to that element.
    function ajaxMailChimpForm($form, $resultElement) {
        // Hijack the submission. We'll submit the form manually.
        $form.submit(function (e) {
            e.preventDefault();

            console.log('Checking if email is valid...')

            if (!isValidEmail($form)) {
                var error = "Please enter a valid email address.";
                $resultElement.html(error);
                $resultElement.css("color", "red");
            } else {
                $resultElement.css("color", "white");
                $resultElement.html("Subscribing...");
                submitSubscribeForm($form, $resultElement);
            }
        });
    }

    // Validate the email address in the form
    function isValidEmail($form) {
        // If email is empty, show error message.
        // contains just one @
        var email = $form.find("input[type='email']").val();
        if (!email || !email.length) {
            return false;
        } else if (email.indexOf("@") == -1) {
            return false;
        }
        return true;
    }

    // Submit the form with an ajax/jsonp request.
    //https://stackoverflow.com/questions/8425701/ajax-mailchimp-signup-form-integration
    function submitSubscribeForm($form, $resultElement) {
        console.log('submitting subscribe form...');
        $.ajax({
            type: "GET",
            url: 'http://huishun.us19.list-manage.com/subscribe/post-json?u=907ad9c3f71574ba68e8776d0&amp;id=30c7b181d5',
            data: $form.serialize(),
            cache: false,
            dataType: "jsonp",
            jsonp: "c", // trigger MailChimp to return a JSONP response
            contentType: "application/json; charset=utf-8",

            error: function (error) {
                // According to jquery docs, this is never called for cross-domain JSONP requests
            },

            success: function (data) {
                if (data.result != "success") {
                    var message = data.msg || "Unable to subscribe. Please try again later.";
                    $resultElement.css("color", "red");
                    if (data.msg && data.msg.indexOf("already subscribed") >= 0) {
                        message = "You're already subscribed. Thank you!";
                        $resultElement.css("color", "white");
                        $('#subscribe-form').css('display', 'none');
                    }
                    $resultElement.html(message);
                } else {
                    $resultElement.css("color", "white");
                    $resultElement.html("You have subscribed successfully. Thank you for subscribing!");
                    $('#subscribe-form').css('display', 'none');
                }
            }
        });
    }
}); 