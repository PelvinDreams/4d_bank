/**
  * isMobile
  * responsiveMenu
  * headerFixed
  * ajaxContactForm
  * alertBox
  * TopSearch
  * ajaxSubscribe
  * VideoPopup
  * Effectdiv
  * detectViewport
  * counter
  * Blancediv
  * flatFilterPrice
  * Countdown
  * FullScreen
  * blogCarousel
  * blogCarousellist
  * googleMap
  * FlatFlexTestimonial
  * flatTestimonials
  * flatCarousel
  * flatAccordion
  * tabs
  * swClick
  * goTop
  * retinaLogos
  * parallax
  * removePreloader
*/

;(function($) {

   'use strict'

    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

	var responsiveMenu = function() {
        var menuType = 'desktop';

        $(window).on('load resize', function() {
            var currMenuType = 'desktop';

            if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                currMenuType = 'mobile';
            }

            if ( currMenuType !== menuType ) {
                menuType = currMenuType;

                if ( currMenuType === 'mobile' ) {
                    var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                    var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

                    $('#header').after($mobileMenu);
                    hasChildMenu.children('ul').hide();
                    hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                    $('.btn-menu').removeClass('active');
                } else {
                    var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

                    $desktopMenu.find('.submenu').removeAttr('style');
                    $('#header').find('.nav-wrap').append($desktopMenu);
                    $('.btn-submenu').remove();
                }
            }
        });

        $('.btn-menu').on('click', function() {         
            $('#mainnav-mobi').slideToggle(300);
            $(this).toggleClass('active');
        });

        $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
            $(this).toggleClass('active').next('ul').slideToggle(300);
            e.stopImmediatePropagation()
        });
    };

    var headerFixed = function() {
        if ( $('body').hasClass('header_sticky') ) {
            var nav = $('#header');

            if ( nav.size() !== 0 ) {
                var offsetTop = $('#header').offset().top,
                    headerHeight = $('#header').height(),
                    injectSpace = $('<div />', { height: headerHeight }).insertAfter(nav);   
                    injectSpace.hide();                 

                $(window).on('load scroll', function(){
                    if ( $(window).scrollTop() > offsetTop ) {
                        if ( $('#header').hasClass('header-classic') ) {
                            injectSpace.show();
                        }
                        $('#header').addClass('downscrolled');                        
                    } else {
                        $('#header').removeClass('header-small downscrolled');
                        injectSpace.hide();
                    }                    
                })
            }
        }
    };

    var TopSearch = function () {
        $(document).on('click', function(e) {   
            var clickID = e.target.id;   
            if ( ( clickID !== 'input-search' ) ) {
                $('.top-search').removeClass('show');                
            } 
        });

        $('.show-search').on('click', function(event){
            event.stopPropagation();
        });

        $('.search-form').on('click', function(event){
            event.stopPropagation();
        });        

        $('.show-search').on('click', function (event) {
            if(!$('.top-search').hasClass( "show" )) {
                $('.top-search').addClass('show');  
                event.preventDefault();                
            }
                
            else
                $('.top-search').removeClass('show');
                event.preventDefault();

            if( !$('.show-search' ).hasClass( "active" ) )
                $( '.show-search' ).addClass( 'active' );
            else
                $( '.show-search' ).removeClass( 'active' );
        });   
    };

    var ajaxContactForm = function() {  
        $('#contactform').each(function() {
            $(this).validate({
                submitHandler: function( form ) {
                    var $form = $(form),
                        str = $form.serialize(),
                        loading = $('<div />', { 'class': 'loading' });

                    $.ajax({
                        type: "POST",
                        url:  $form.attr('action'),
                        data: str,
                        beforeSend: function () {
                            $form.find('.form-submit').append(loading);
                        },
                        success: function( msg ) {
                            var result, cls;                            
                            if ( msg === 'Success' ) {result = 'Message Sent Successfully To Email Administrator. ( You can change the email management a very easy way to get the message of customers in the user manual )'; cls = 'msg-success'; } else {result = 'Error sending email.'; cls = 'msg-error'; } $form.prepend(
                                $('<div />', {
                                    'class': 'flat-alert ' + cls,
                                    'text' : result
                                }).append(
                                    $('<a class="close" href="#"><i class="fa fa-close"></i></a>')
                                )
                            );

                            $form.find(':input').not('.submit').val('');
                        },
                        complete: function (xhr, status, error_thrown) {
                            $form.find('.loading').remove();
                        }
                    });
                }
            });
        }); // each contactform
    };   

    var alertBox = function() {
        $(document).on('click', '.close', function(e) {
            $(this).closest('.flat-alert').remove();
            e.preventDefault();
        })     
    };  

    var ajaxSubscribe = {
        obj: {
            subscribeEmail    : $('#subscribe-email'),
            subscribeButton   : $('#subscribe-button'),
            subscribeMsg      : $('#subscribe-msg'),
            subscribeContent  : $("#subscribe-content"),
            dataMailchimp     : $('#subscribe-form').attr('data-mailchimp'),
            success_message   : '<div class="notification_ok">Thank you for joining our mailing list! Please check your email for a confirmation link.</div>',
            failure_message   : '<div class="notification_error">Error! <strong>There was a problem processing your submission.</strong></div>',
            noticeError       : '<div class="notification_error">{msg}</div>',
            noticeInfo        : '<div class="notification_error">{msg}</div>',
            basicAction       : 'mail/subscribe.php',
            mailChimpAction   : 'mail/subscribe-mailchimp.php'
        },

        eventLoad: function() {
            var objUse = ajaxSubscribe.obj;

            $(objUse.subscribeButton).on('click', function() {
                if ( window.ajaxCalling ) return;
                var isMailchimp = objUse.dataMailchimp === 'true';

                if ( isMailchimp ) {
                    ajaxSubscribe.ajaxCall(objUse.mailChimpAction);
                } else {
                    ajaxSubscribe.ajaxCall(objUse.basicAction);
                }
            });
        },

        ajaxCall: function (action) {
            window.ajaxCalling = true;
            var objUse = ajaxSubscribe.obj;
            var messageDiv = objUse.subscribeMsg.html('').hide();
            $.ajax({
                url: action,
                type: 'POST',
                dataType: 'json',
                data: {
                   subscribeEmail: objUse.subscribeEmail.val()
                },
                success: function (responseData, textStatus, jqXHR) {
                    if ( responseData.status ) {
                        objUse.subscribeContent.fadeOut(500, function () {
                            messageDiv.html(objUse.success_message).fadeIn(500);
                        });
                    } else {
                        switch (responseData.msg) {
                            case "email-required":
                                messageDiv.html(objUse.noticeError.replace('{msg}','Error! <strong>Email is required.</strong>'));
                                break;
                            case "email-err":
                                messageDiv.html(objUse.noticeError.replace('{msg}','Error! <strong>Email invalid.</strong>'));
                                break;
                            case "duplicate":
                                messageDiv.html(objUse.noticeError.replace('{msg}','Error! <strong>Email is duplicate.</strong>'));
                                break;
                            case "filewrite":
                                messageDiv.html(objUse.noticeInfo.replace('{msg}','Error! <strong>Mail list file is open.</strong>'));
                                break;
                            case "undefined":
                                messageDiv.html(objUse.noticeInfo.replace('{msg}','Error! <strong>undefined error.</strong>'));
                                break;
                            case "api-error":
                                objUse.subscribeContent.fadeOut(500, function () {
                                    messageDiv.html(objUse.failure_message);
                                });
                        }
                        messageDiv.fadeIn(500);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Connection error');
                },
                complete: function (data) {
                    window.ajaxCalling = false;
                }
            });
        }
    };

    var VideoPopup =  function() {
        $(".fancybox").on("click", function(){
            $.fancybox({
              href: this.href,
              type: $(this).data("type")
            }); // fancybox
            return false   
        }); // on
    };

    var Effectdiv = function() {
        $(function() {
                $(' #data-effect > li ').each( function() { $(this).hoverdir(); } );
            });
    };

    var Animation = function() {
        $('.effect-animation').each( function() {
            var $this = $(this),
                animateClass  = $this.data('animation'),
                animateDelay  = $this.data('animation-delay'),
                animateOffset = $this.data('animation-offset');

            $this.css({
                '-webkit-animation-delay':  animateDelay,
                '-moz-animation-delay':     animateDelay,
                'animation-delay':          animateDelay
            });
        
            $this.waypoint(function() {
                $this.addClass('animated ' + animateClass);
                },{
                    triggerOnce: true,
                    offset: animateOffset
            });
        });
    };

    var detectViewport = function() {
        $('[data-waypoint-active="yes"]').waypoint(function() {
            $(this).trigger('on-appear');
        }, { offset: '90%', triggerOnce: true });

        $(window).on('load', function() {
            setTimeout(function() {
                $.waypoints('refresh');
            });
        });
    };   

    var counter = function() {       
        $('.flat-counter').on('on-appear', function() {             
            $(this).find('.numb-count').each(function() { 
                var to = parseInt( ($(this).attr('data-to')),10 ), speed = parseInt( ($(this).attr('data-speed')),10 );
                if ( $().countTo ) {
                    $(this).countTo({
                        to: to,
                        speed: speed
                    });
                }
            });
       });
    }; 

    var Blancediv = function() {
        $(window).load(function() { 
            if ( matchMedia( 'only screen and (min-width: 1199px)' ).matches ) {
                if ( $('section').hasClass('blancejqurey') ) {
                    $('.wrap-blance').each(function() {
                        var h = document.getElementById("blance1").offsetHeight;
                        document.getElementById("blance2").style.height = h + "px";
                    });
                };
                if ( $('section').hasClass('blancejqurey2') ) {
                    $('.wrap-blance').each(function() {
                        var h = document.getElementById("blance-s1").offsetHeight;
                        document.getElementById("blance-s2").style.height = h + "px";
                    });
                };
            }

            

        });
    };

    var flatFilterPrice = function() {
        if( $().slider ) {
            $( ".price_slider" ).slider({
                range: true,
                min: 607,
                max: 1140,
                values: [ 610, 980 ],
                slide: function( event, ui ) {
                    $( ".price_label > input " ).val( "$" + ui.values[ 0 ] + "  - $" + ui.values[ 1 ] );
                    }
            });

            $( ".price_label > input " ).val( "$" + $( ".price_slider" ).slider( "values", 0 ) +
            "  -  $" + $( ".price_slider" ).slider( "values", 1 ) );
            $( ".ui-slider-handle").append("<span class='shadow'></span>");
        }
    };

    var Countdown = function() {
        var before = '<div class="square"><div class="numb">',
            text = '</div><div class="text">';
            if ($().countdown) {
                $(".countdown").countdown('2018/12/25', function(event) {
                  $(this).html(event.strftime(before + '%D' + text + 'DAY</div></div>' + before + '%H' + text + 'HOURS</div></div>' + before + '%M' + text + 'MINS</div></div>' + before + '%S' + text + 'SECS</div>'));
                });
            }      
    };

    var FullScreen = function() {
        if ( $('section').hasClass('full-page') ) {
            function setDimensions(){
               var windowsHeight = $(window).height();
               $('.full-page').css('height', windowsHeight + 'px');
            }

            setDimensions();

            $(window).resize(function() {
                setDimensions();
            });
        }
    };

    var blogCarousel = function() {
        $('.blog-carosuel-wrap').each(function(){            
            if ( $().owlCarousel ) {
                $(this).find('.blog-shortcode').owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,
                    dots: false, 
                    auto:true,
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 2
                        },
                        767:{
                            items: 2
                        },
                        991:{
                            items: 3
                        }, 
                        1200:{
                            items: 3
                        }               
                    }
                });
            }            
        });
    };     

    var blogCarousellist = function() {
        $('.blog-carosuel-wrap2').each(function(){            
            if ( $().owlCarousel ) {
                $(this).find('.blog-shortcode').owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,
                    dots: false, 
                    auto:true,
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 2
                        },
                        767:{
                            items: 2
                        },
                        991:{
                            items: 2
                        }, 
                        1200:{
                            items: 2
                        }               
                    }
                });
            }            
        });
    }; 
  
    var googleMap = function() {
            
        // Gmap Defaults
        if ( $().gmap3 ){
                var data = JSON.parse('[{"address":"Baria Sreet,  NewYork City","content":""}]');
                var data2 = JSON.parse('[{"address":"Harvard Yard, Cambridge, Massachusetts, Hoa Kỳ","content":""}]');
            $('.maps').gmap3({
                map:{
                    options:{
                        center:[40.6777899, -73.9981382],
                        mapTypeId: 'Consuloan',
                        mapTypeControlOptions: {
                                mapTypeIds: ['Consuloan', google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID]},
                        zoom: 16,
                    },
                    navigationControl: true,
                   scrollwheel: false,
                   streetViewControl: true
                }
            });

            $('.maps2').gmap3({
                map:{
                    options:{
                        center:[42.3738858, -71.1164816],
                        mapTypeId: 'Consuloan',
                        mapTypeControlOptions: {
                                mapTypeIds: ['Consuloan', google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID]},
                        zoom: 16,
                    },
                    navigationControl: false,
                   scrollwheel: false,
                   streetViewControl: false
                }
            });
        }

        // Json Loop
        $.each(data, function(key, val) {
                $('.maps').gmap3({
                    marker:{
                        values:[{
                            address:val.address,
                            options:{icon: "images/maps/1.png"},
                            events: {
                                mouseover: function() {
                                    $(this).gmap3({
                                        overlay:{
                                            address:val.address,
                                            options:{
                                                content:  "<div class='infobox clearfix'><div class='img-map float-left'><img src='images/maps/f1.jpg' alt='image'></div><div class='info-map'><h5>40 Baria Sreet,<br> NewYork City, US</h5></div><div class='clearfix'></div></div>",
                                                offset:{
                                                    y:34,
                                                    x:-186
                                                }
                                            }
                                        }
                                    });
                                },
                                mouseout: function(){
                                $('.infobox').each(function() {
                                    $(this).remove();
                                });
                                }
                            }
                        }]
                    },
                    styledmaptype:{
                        id: "Consuloan",
                        options:{
                            name: "Consuloan Maps"
                        },
                        styles:[
                                {
                                    "featureType": "landscape",
                                    "elementType": "labels",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "transit",
                                    "elementType": "labels",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi",
                                    "elementType": "labels",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "water",
                                    "elementType": "labels",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road",
                                    "elementType": "labels.icon",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "stylers": [
                                        {
                                            "hue": "#00aaff"
                                        },
                                        {
                                            "saturation": -100
                                        },
                                        {
                                            "gamma": 2.15
                                        },
                                        {
                                            "lightness": 12
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road",
                                    "elementType": "labels.text.fill",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        },
                                        {
                                            "lightness": 24
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "lightness": 57
                                        }
                                    ]
                                }
                            ]
                    }
                });
        });

        // Json Loop
        $.each(data2, function(key, val) {
                $('.maps2').gmap3({
                    marker:{
                        values:[{
                            address:val.address,
                            options:{icon: "images/maps/2.png"},
                            events: {
                                mouseover: function() {
                                    $(this).gmap3({
                                        overlay:{
                                            address:val.address,
                                            options:{
                                                content:  "<div class='infobox style2 text-center'><div class='info-map'><h5>40 Baria Sreet, NewYork<br>City, US</h5></div><div class='clearfix'></div></div>",
                                                offset:{
                                                    y:26,
                                                    x:-137
                                                }
                                            }
                                        }
                                    });
                                },
                                mouseout: function(){
                                $('.infobox').each(function() {
                                    $(this).remove();
                                });
                                }
                            }
                        }]
                    },
                    styledmaptype:{
                        id: "Consuloan",
                        options:{
                            name: "Consuloan Maps"
                        },
                        styles:[
                                {
                                    "featureType": "administrative",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        },
                                        {
                                            "saturation": -100
                                        },
                                        {
                                            "lightness": 20
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        },
                                        {
                                            "saturation": -100
                                        },
                                        {
                                            "lightness": 40
                                        }
                                    ]
                                },
                                {
                                    "featureType": "water",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        },
                                        {
                                            "saturation": -10
                                        },
                                        {
                                            "lightness": 30
                                        }
                                    ]
                                },
                                {
                                    "featureType": "landscape.man_made",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "simplified"
                                        },
                                        {
                                            "saturation": -60
                                        },
                                        {
                                            "lightness": 10
                                        }
                                    ]
                                },
                                {
                                    "featureType": "landscape.natural",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "simplified"
                                        },
                                        {
                                            "saturation": -60
                                        },
                                        {
                                            "lightness": 60
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        },
                                        {
                                            "saturation": -100
                                        },
                                        {
                                            "lightness": 60
                                        }
                                    ]
                                },
                                {
                                    "featureType": "transit",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        },
                                        {
                                            "saturation": -100
                                        },
                                        {
                                            "lightness": 60
                                        }
                                    ]
                                }
                            ]
                    }
                });
        });
            
        // Function Clear Markers
        function gmap_clear_markers() {
            $('.infobox').each(function() {
                var args = {duration: 600};
                $(this).slideToggle(args).remove();
            });
        }
    };

    var FlatFlexTestimonial= function() {
         $('.wrap-testimonial').each(function(){
                 $(this).children('#testimonial-carousel').flexslider({
                     animation: "slide",
                     controlNav: false,
                     controldot: false,
                     animationLoop: true,
                     slideshow: false,
                     itemWidth: 194,
                     drag: true,
                     itemMargin: 0,
                     directionNav: false,
                     asNavFor: $(this).children('#testimonial-slider'),
                 });
                
                 $(this).children('#testimonial-slider').flexslider({
                     animation: "slide",
                     controlNav: false,
                     animationLoop: false,
                     slideshow: false,
                     directionNav: false,
                     sync: $(this).children('#testimonial-carousel'),
                 });
             });
    }

    var flatTestimonials = function() {
        $('.flat-row').each(function() {            
            if ( $().owlCarousel ) {
                $(this).find('.flat-testimonials').owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: $('.flat-testimonials').data('nav'),
                    dots: $('.flat-testimonials').data('dots'),                     
                    autoplay: $('.flat-testimonials').data('auto'),                    
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 1
                        },
                        767:{
                            items: 1
                        },
                        991:{
                            items: 1
                        },
                        1200: {
                            items: $('.flat-testimonials').data('item')
                        }
                    }
                });
            }
            if ( $().owlCarousel ) {
                $(this).find('.flat-testimonials2').owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: $('.flat-testimonials2').data('nav'),
                    dots: $('.flat-testimonials2').data('dots'),                     
                    autoplay: $('.flat-testimonials2').data('auto'),                    
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 1
                        },
                        767:{
                            items: 1
                        },
                        991:{
                            items: 2
                        },
                        1200: {
                            items: $('.flat-testimonials2').data('item')
                        }
                    }
                });
            }
        });
    };

    var flatCarousel = function() {
        $('.flat-row').each(function() {            
            if ( $().owlCarousel ) {
                $(this).find('.flat-carousel').owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: $('.flat-carousel').data('nav'),
                    dots: $('.flat-carousel').data('dots'),                     
                    autoplay: $('.flat-carousel').data('auto'),                    
                    responsive:{
                        0:{
                            items: 1
                        },
                        320: {
                            items: 1
                        },
                        480:{
                            items: 2
                        },
                        767:{
                            items: 2
                        },
                        991:{
                            items: 3
                        },
                        1200: {
                            items: $('.flat-carousel').data('item')
                        }
                    }
                });
            }
        });
    }; 

    var flatclient = function() {
        $('.flat-row').each(function() {            
            if ( $().owlCarousel ) {
                $(this).find('.flat-client').owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: $('.flat-client').data('nav'),
                    dots: $('.flat-client').data('dots'),                     
                    autoplay: $('.flat-client').data('auto'),                    
                    responsive:{
                        0:{
                            items: 1
                        },
                        320: {
                            items: 2
                        },
                        480:{
                            items: 3
                        },
                        767:{
                            items: 3
                        },
                        991:{
                            items: 4
                        },
                        1200: {
                            items: $('.flat-client').data('item')
                        }
                    }
                });
            }
        });
    }; 

    var flatAccordion = function() {
        var args = {duration: 600};
        $('.flat-toggle .toggle-title.active').siblings('.toggle-content').show();

        $('.flat-toggle.enable .toggle-title').on('click', function() {
            $(this).closest('.flat-toggle').find('.toggle-content').slideToggle(args);
            $(this).toggleClass('active');
        }); // toggle 

        $('.flat-accordion .toggle-title').on('click', function () {
            if( !$(this).is('.active') ) {
                $(this).closest('.flat-accordion').find('.toggle-title.active').toggleClass('active').next().slideToggle(args);
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            } else {
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            }     
        }); // accordion
    }; 

    var tabs = function() {
        $('.flat-tabs').each(function() {
            $(this).children('.content-tab').children().hide();
            $(this).children('.content-tab').children().first().show();
            $(this).find('.menu-tab').children('li').on('click', function(e) {  
                var liActive = $(this).index(),
                    contentActive = $(this).siblings().removeClass('active').parents('.flat-tabs').children('.content-tab').children().eq(liActive);

                contentActive.addClass('active').fadeIn('slow');
                contentActive.siblings().removeClass('active');
                $(this).addClass('active').parents('.flat-tabs').children('.content-tab').children().eq(liActive).siblings().hide();
                e.preventDefault();
            });
        });
    };

    var swClick = function () {
        function activeLayout () {
            $(".switcher-container" ).on( "click", "a.sw-light", function() {
                $(this).toggleClass( "active" );
                $('body').addClass('home-boxed');  
                $('body').css({'background': '#f6f6f6' });                
                $('.sw-pattern.pattern').css ({ "top": "100%", "opacity": 1, "z-index": "10"});
            }).on( "click", "a.sw-dark", function() {
                $('.sw-pattern.pattern').css ({ "top": "98%", "opacity": 0, "z-index": "-1"});
                $(this).removeClass('active').addClass('active');
                $('body').removeClass('home-boxed');
                $('body').css({'background': '#fff' });
                return false;
            })       
        }        

        function activePattern () {
            $('.sw-pattern').on('click', function () {
                $('.sw-pattern.pattern a').removeClass('current');
                $(this).addClass('current');
                $('body').css({'background': 'url("' + $(this).data('image') + '")', 'background-size' : '30px 30px', 'background-repeat': 'repeat' });
                return false
            })
        }

        activeLayout(); 
        activePattern();
    }; 
    
    var goTop = function() {
        $(window).scroll(function() {
            if ( $(this).scrollTop() > 800 ) {
                $('.go-top').addClass('show');
            } else {
                $('.go-top').removeClass('show');
            }
        }); 

        $('.go-top').on('click', function() {            
            $("html, body").animate({ scrollTop: 0 }, 1000 , 'easeInOutExpo');
            return false;
        });
    };   

    var retinaLogos = function() {
      var retina = window.devicePixelRatio > 1 ? true : false;
        if(retina) {
            $('.header .logo').find('img').attr({src:'./images/logo@2x.png',width:'217',height:'35'});   
        }

        if(retina) {
            $('.footer .logo').find('img').attr({src:'./images/logofooter@2x.png',width:'217',height:'35'});   
        }
    };    
    
    var parallax = function() {
        if ( $().parallax && isMobile.any() === null ) {
            $('.parallax1').parallax("50%", -0.6); 
            $('.parallax2').parallax("50%", 0.5);   
            $('.parallax3').parallax("50%", 0.5); 
            $('.parallax4').parallax("50%", -0.6); 
            $('.parallax5').parallax("50%", -0.6); 
            $('.parallax6').parallax("50%", 0.5); 
            $('.parallax7').parallax("50%", -0.5);         
        }
    };

    var removePreloader = function() {        
         $(window).on("load", function () {
            $(".loader").fadeOut();
            $("#loading-overlay").delay(300).fadeOut('slow',function(){
            $(this).remove();
          }); 
      });
    };

   	// Dom Ready
	$(function() {
        if ( matchMedia( 'only screen and (min-width: 991px)' ).matches ) {
            headerFixed(); 
        }    
        responsiveMenu();
        TopSearch();
        ajaxSubscribe.eventLoad();
        ajaxContactForm();
        detectViewport();
        flatTestimonials();
        FlatFlexTestimonial();
        VideoPopup(); 
        flatAccordion();  
        tabs();
        flatCarousel();
        flatclient();
        Effectdiv(); 
        counter();
        Blancediv();
        Animation();
        Countdown();
        FullScreen();
        googleMap(); 
        blogCarousel();
        blogCarousellist();
        flatFilterPrice();
        swClick(); 
        goTop(); 
        alertBox();  
        parallax();
        retinaLogos();   
        removePreloader();       
   	});
})(jQuery);