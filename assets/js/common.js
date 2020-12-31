$(function () {
    var App = {
        height: $(window).height(),
        width: $(window).width(),
        navHeight: 50,
    }


    function resize_services_block() {
        // sizes
        var windowHeight = App.height - App.navHeight;
        var navItemSize = windowHeight / 3;
        // nav
        var navContent = $(".slider_services__nav");
        var navItemContent = $(".slider_services__nav__item_content");
        // content
        var servicesContent = $(".slider_services__content");
        var servicesItem = $(".slider_services__content__item");
        var servicesHolder = $(".slider_services__content__item-holder");

        // 1
        navContent.width(navItemSize);
        navItemContent.width(navItemSize);
        navItemContent.height(navItemSize);
        // 2
        servicesItem.height(windowHeight);
        servicesHolder.css("maxHeight", windowHeight - 40);
        servicesContent.css("marginLeft", navItemSize + 20).height(windowHeight);
    }

    simpleModal.init();


    AOS.init({
        offset: 200,
        duration: 600,
        disable: 'mobile'
    });

    if ($("#fn__sigle_blog__actions__wrap").length) {
        blog__float_bar();
        sigle_blog__banners();
    }


    // blog__float_bar
    function blog__float_bar() {
        var sigle_blog__actions__wrap = $("#fn__sigle_blog__actions__wrap");
        var sigle_blog__actions = $("#fn__sigle_blog__actions");
        var eHeight = sigle_blog__actions.outerHeight();

        var eTop = sigle_blog__actions.offset().top;
        var offsetRelWin = eTop - $(window).scrollTop();

        var containerBottom = $(sigle_blog__actions__wrap).offset().top - $(window).scrollTop() + $(sigle_blog__actions__wrap).outerHeight();

        set_block();

        function set_block() {
            containerBottom = $(sigle_blog__actions__wrap).offset().top - $(window).scrollTop() + $(sigle_blog__actions__wrap).outerHeight();
            offsetRelWin = eTop - $(window).scrollTop();

            if (containerBottom < eHeight + 140) {
                sigle_blog__actions.css({
                    top: 'auto',
                    bottom: '30px',
                    position: 'absolute',
                });
            } else if (offsetRelWin < 110) {
                sigle_blog__actions.css({
                    top: '110px',
                    position: 'fixed'
                });
            } else {
                sigle_blog__actions.css({
                    top: 'auto',
                    bottom: 'auto',
                    position: 'absolute'
                });
            }
        }

        $(window).scroll(function () {
            set_block();
        });
    }


    // sigle_blog__banners
    function sigle_blog__banners() {
        var sigle_blog__actions__wrap = $("#fn__sigle_blog__banners_holder");
        var sigle_blog__actions = $("#fn__sigle_blog__banners");
        var eHeight = sigle_blog__actions.outerHeight();

        var eTop = sigle_blog__actions.offset().top;
        var offsetRelWin = eTop - $(window).scrollTop();

        var containerBottom = $(sigle_blog__actions__wrap).offset().top - $(window).scrollTop() + $(sigle_blog__actions__wrap).outerHeight();

        set_block();

        function set_block() {
            containerBottom = $(sigle_blog__actions__wrap).offset().top - $(window).scrollTop() + $(sigle_blog__actions__wrap).outerHeight();
            offsetRelWin = eTop - $(window).scrollTop();

            if (containerBottom < eHeight + 140) {
                sigle_blog__actions.css({
                    top: 'auto',
                    bottom: '30px',
                    position: 'absolute',
                });
            } else if (offsetRelWin < 110) {
                sigle_blog__actions.css({
                    top: '110px',
                    position: 'fixed'
                });
            } else {
                sigle_blog__actions.css({
                    top: 'auto',
                    bottom: 'auto',
                    position: 'absolute'
                });
            }
        }

        $(window).scroll(function () {
            set_block();
        });
    }


    function setBlockMaxHeight(element, navHeight, mod, block) {
        var windowRealHeight = App.height;
        if (block) {
            windowRealHeight = $(block).height();
        }
        var windowHeight = windowRealHeight - navHeight;
        if (mod) {
            windowHeight *= mod;
        }
        //$(element).height( windowHeight );
        $(element).css("maxHeight", windowHeight);
    }


    // top_navigate_mobile 2.0
    function top_navigate_mobile() {

        var main_wrap = $('#main_wrapper_js');
        var header__nav_btn = $('#header__nav_btn');
        var header__nav_btn_mobile = $('#header__nav_btn_mobile')
        var header__nav = $('#header__nav_wrap');
        var header__nav_mobile = $('#header__nav_wrap_mobile');
        var openClass = "open_nav";

        /*
        var delay = 0.1;
        header__nav.find('li').each(function () {
          delay += 0.1;
          $(this).css({
              transitionDelay: delay + 's'
          });
        });
        */

        // header__nav for mobile


        $("body").on("click", '#header__nav_btn_mobile', function () {
            if (!header__nav_mobile.data('open')) {
                menu_open_mobile();
            } else {
                menu_close_mobile();
            }
        });




        function menu_open_mobile() {
            header__nav_mobile.addClass(openClass);
            header__nav_btn_mobile.addClass(openClass);
            $(main_wrap).addClass(openClass);
            header__nav_mobile.data('open', true);

            $("html").addClass(openClass);
            $("body").addClass(openClass);

            $("body").on("mousedown", '#main_wrapper_js', function () {
                menu_close();
            });
            $("body").on("touchmove", '#main_wrapper_js', function () {
                menu_close();
            });
            $("body").on("touchstart", '#main_wrapper_js', function () {
                menu_close();
            });

        }

        function menu_close_mobile() {
            header__nav_mobile.removeClass(openClass);
            header__nav_btn_mobile.removeClass(openClass);
            main_wrap.removeClass(openClass);
            header__nav_mobile.data('open', false);

            $("html").removeClass(openClass);
            $("body").removeClass(openClass);
        }
    }

    //Анимация подменю
    function menu_animate_submenu() {
       var sub_menu_id

        $("#menu-mobile-menu li").click(function () {
            if ($(this).attr('id') !== sub_menu_id) {

                $('.sub-menu').stop().slideUp(40);

                sub_menu_id = $(this).attr('id');
                $('.sub-menu', this).stop().slideDown(400);
            } else {

                $('.sub-menu').stop().slideUp(400);
                sub_menu_id = undefined;
            }
        })
        $("#menu-mobile-menu-en li").click(function () {
            if ($(this).attr('id') !== sub_menu_id) {

                $('.sub-menu').stop().slideUp(40);

                sub_menu_id = $(this).attr('id');
                $('.sub-menu', this).stop().slideDown(400);
            } else {

                $('.sub-menu').stop().slideUp(400);
                sub_menu_id = undefined;
            }
        })
    }


    // вернет позицию элемента InViewport
    function positionInViewport(element) {
        element.startPoint = element.offset().top;
        element.endPoint = element.offset().top + element.height();

        var viewport = {
            top: $(window).scrollTop(),
            bottom: $(window).scrollTop() + $(window).innerHeight()
        }
        var precent = 1 - ((viewport.bottom - element.startPoint) / $(window).innerHeight()) * -100;
        return precent;
    }


    // элемент, которому задаем высоту / высота навигации, если есть / процент / блок
    function setBlockHeight(element, navHeight, mod, block) {
        var windowRealHeight = App.height;
        if (block) {
            windowRealHeight = $(block).height();
        }
        var windowHeight = windowRealHeight - navHeight;
        if (mod) {
            windowHeight *= mod;
        }
        $(element).height(windowHeight);
        $(element).css("maxHeight", windowHeight);
    }


    function parallax(e, target, mod) {
        $(target).addClass("no_delay");
        // new position
        var mod_x = (e.pageX * mod) / 100;
        var mod_y = (e.pageY * mod) / 100;
        $(target).css({
            '-webkit-transform': 'translate3d(' + mod_y + 'px,' + mod_x + 'px, 0 )',
            '-moz-transform': 'translate3d(' + mod_y + 'px,' + mod_x + 'px, 0 )',
            '-ms-transform': 'translate3d(' + mod_y + 'px,' + mod_x + 'px, 0 )',
            '-o-transform': 'translate3d(' + mod_y + 'px,' + mod_x + 'px, 0 )',
            'transform': 'translate3d(' + mod_y + 'px,' + mod_x + 'px, 0 )',
        });
    };



    // float_block 2.0
    function float_block(block, add_class, false_block) {
        // param
        var this_b = $(block);
        // var block_t = $(this_b).offset().top;
        var block_h = this_b.outerHeight();
        // if need false block
        if (false_block) {
            var block_n = "float_block_" + block;
            var false_b = "<div class='" + block_n + "' style='height:" + block_h + "px;' ></div>";
            this_b.wrap(false_b);
        }
        // in load page
        var doc_r = $(window).scrollTop();
        if (doc_r + block_h > block_h) {
            this_b.addClass(add_class);
        }
        // in scroll
        $(window).on('scroll', function () {
            var doc_r = $(window).scrollTop();
            if (doc_r + block_h > block_h) {
                this_b.addClass(add_class);
            } else {
                this_b.removeClass(add_class);
            }
        });
    }


    function scrollToBlock(element, offset) {
        var block_t = $(element).offset().top - offset;
        $('html, body').animate({scrollTop: block_t}, 600);
    };

    $("body").on("click", "[data-scroll_to_block]", function () {
        var element = $(this).data("scroll_to_block") ? $(this).data("scroll_to_block") : "";
        var offset = $(this).data("scroll_to_block_offset") ? $(this).data("scroll_to_block_offset") : 0;
        var block_t = $(element).offset().top - offset;
        $('html, body').animate({scrollTop: block_t}, 600);
    });


    // scrollToTop 2.0
    $.fn.scrollToTop = function () {
        if ($(window).scrollTop() != "0") {
            $(this).addClass("show");
        }
        var scrollDiv = $(this);
        $(window).scroll(function () {
            if ($(window).scrollTop() == "0") {
                $(scrollDiv).removeClass("show");
            } else {
                $(scrollDiv).addClass("show");
            }
        });
        $(this).click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, "fast");
        });
    };
    $("#goTop").scrollToTop();



    $(".fn__period__select").change(function(){
        var val = $(this).val();
        var item = $(this).closest(".subscribe__tarif__item__content");
        var tarif = item.find('.info__tarif__holder__item__'+val);
        item.find(".info__tarif__holder__item").removeClass("active");
        tarif.addClass('active');
    });

    $(".fn__subscribe__tarif__item").hover(function(){
        var image_block = $(this).find(".fn__subscribe__tarif__image");
        var gif_url = image_block.attr('data-gif');
        var image_url = image_block.attr('data-image');
        image_block.find('img').attr('src', gif_url);
    }, function(){
        var image_block = $(this).find(".fn__subscribe__tarif__image");
        var gif_url = image_block.attr('data-gif');
        var image_url = image_block.attr('data-image');
        image_block.find('img').attr('src', image_url);
    });



    /* masked input */
    //var mask = "+7 (999) 999-99-99";
    //var placeholder = {'placeholder':'+7 (___) ___ __ __'};
    var mask = "+38(099) 999-99-99";
    var placeholder = {'placeholder': '+38(0__) ___-__-__'};
    var user_phone = $('.user_phone_mask');

    user_phone.each(function () {
        $(this).mask(mask);
    });
    user_phone.attr(placeholder);


    function contact_us__form() {
        var form_wrap = $("#contact_us__form__wrap__js");
        var form = $("#contact_us__form");
        var nav = $("#contact_us__form__nav");
        var form_btn = $("#contact_us__form__btn");

        $(nav).on("click", "li", function () {

            var step = $(this).data("step");
            $(".contact_us__slide").removeClass("active");

            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                if (step == 3) {
                    $(this).prev().addClass("active");
                    $(".contact_us__slide_" + (step - 1)).addClass("active");
                } else {
                    $(".contact_us__slide_" + (step + 1)).addClass("active");
                    $(this).next().addClass("active");
                }
                return false;
            }

            $(".contact_us__slide_" + step).addClass("active");
            nav.find("li").removeClass("active");
            $(this).addClass("active");
        });
    }

    function scrollToNextBlock(block, offset) {
        var block = block.closest("section");
        var next = block.next();
        var block_t = $(next).offset().top - offset;
        $('html, body').animate({scrollTop: block_t}, 1000);
    };

    // command slider
    if (App.width >= 1000) {
        // command__slide
        $(".command__slide").height(App.width / 2);
    }

    if (App.width <= 1000 && App.width >= 800) {
        // command__slide
        $(".command__slide").height(App.width);

    }

    if (App.width >= 800) {

        //setBlockToViewport();

        // works block
        setBlockHeight('.works__rside', App.navHeight);
        setBlockHeight('.works__header', App.navHeight, .8);
        setBlockHeight('.works__footer__item__holder', App.navHeight, .2);
        setBlockHeight('.works__rside__item_holder', App.navHeight);
    }

    if (App.width >= 600) {
        // korporative site config
        resize_services_block();
    }
    (function ($) {
        $.fn.appSlider = function (options) {

            // settings
            var settings = $.extend({
                dost: false,
                arrows: false,
                prevArrow: '<button type="button" class="app_slider-prev" >Previous</button>',
                nextArrow: '<button type="button" class="app_slider-next" >Next</button>',
                // general
                classWrap: "app_slider",
                classWrapDots: "app_slider_dots",
            }, options);


            // methods
            var methods = {
                init: function () {

                },
                refreshSlider: function (n) {
                    var n = parseInt(n);
                    // slider
                    console.log(n);
                    slides.removeClass("active");
                    slides.each(function (index) {
                        if (index == n) {
                            $(this).addClass("active");
                        }
                    });
                    // dots
                    _.find($("." + settings.classWrapDots)).find("li").removeClass("active");
                    _.find($("." + settings.classWrapDots)).find("li:nth-child(" + (n + 1) + ")").addClass("active");
                },
                getActiveSlide: function () {
                    return parseInt(_.find(".active").attr("data-num"));
                },
                buildDots: function () {
                    var html = "";
                    html += "<div class='" + settings.classWrapDots + "'>";
                    html += "<ul>";
                    for (i = 0; i < count; i++) {
                        if (i == 0) {
                            html += "<li data-dots=" + i + " class='first active' ><span></span></li>";
                        } else if (i == (count - 1)) {
                            html += "<li data-dots=" + i + " class='last' ><span></span></li>";
                        } else {
                            html += "<li data-dots=" + i + " ><span></span></li>";
                        }
                    }
                    html += "</ul>";
                    html += "</div>";
                    _.append(html);

                    _.find($("." + settings.classWrapDots)).on("click", "li", function () {
                        var num = $(this).attr("data-dots");
                        methods.refreshSlider(num);
                    });
                },
                buildArrows: function () {
                    _.append(settings.prevArrow);
                    _.append(settings.nextArrow);

                    _.find(".app_slider-prev").click(function () {
                        var cur = methods.getActiveSlide();
                        if (cur <= 0) return false;
                        methods.refreshSlider(cur - 1);
                    });

                    _.find(".app_slider-next").click(function () {
                        var cur = methods.getActiveSlide();
                        if (cur >= (count - 1)) return false;
                        methods.refreshSlider(cur + 1);
                    });

                }
            }


            // Тут пишем функционал нашего плагина
            var _ = this;
            var slides = _.children();
            var count = slides.length;
            var curSlide = 0;

            _.wrapInner("<div class='" + settings.classWrap + "'></div>");

            slides.each(function (index) {
                if (index == 0) {
                    $(this).addClass("active");
                }
                $(this).attr("data-num", index);
            });


            // if dots
            if (settings.dots) {
                methods.buildDots();
            }

            // if arrows
            if (settings.arrows) {
                methods.buildArrows();
            }
            ;


        };
    })(jQuery);

    // actions
    $(window).on('resize', function () {

    });
    $(window).on('scroll', function () {

    });
    $(window).on('load', function () {

    });


    // если пользователь задействует прокрутку - остановить функции скрола
    /*
    $(window).on('mousewheel', function () {
      $('html, body').stop();
    });
    $(window).on('keydown', function () {
      $('html, body').stop();
    });
    */

    /* fn__register_form__user_root__checkbox */
    $(".fn__register_form__user_root__checkbox").change(function(){
        if (!this.checked){
            $(".fn__register_form__submit_btn").attr("disabled", true);
        } else {
            $(".fn__register_form__submit_btn").attr("disabled", false);
        }
    });


    // app slider
    $(".kontekst__b7__slider").appSlider({
        dots: true,
        arrows: true
    });

    $(".kontekst__b7__slider2").appSlider({
        dots: true,
        arrows: true
    });

    // other
    float_block('header', 'float', false);
    float_block('.single-blog-v3__control-panel', 'float', false);

    top_navigate_mobile();

    menu_animate_submenu()


    $("body").on("click", ".btn_below", function () {
        scrollToNextBlock($(this), App.navHeight);
    });

    // fn__float_sbscr_form
    $("body").on("click", ".fn__float_sbscr_form", function () {
        $(".fn__float_sbscr_form").toggleClass("active");
    });
    setTimeout(function(){
        var status = localStorage.getItem('subscr_msg');
        if ( !status ) {
            $(".fn__float_sbscr_form").addClass("active");
            localStorage.setItem("subscr_msg", "true");
        }
    }, 90000);


    // FAQ
    $("body").on( "click", ".fn__faq__item__header", function(){
        $(this).toggleClass("active");
        $(this).next(".fn__faq__item__content").slideToggle();
    });

    // contact us form
    contact_us__form();

    // main screen
    //setBlockHeight( '.main_screen__wrap', 0 );


    //new WOW().init();


    // if slick
    if (typeof $(this).slick == 'function') {

        // slider_services
        var slider_services__content = $('#slider_services__content');
        var slider_services__nav = $('#slider_services__nav');
        var slider_services_go_up = $("#slider_services_go_up");
        var sigle_blog__banners__slider = $('.fn_sigle_blog__banners__slider');

        sigle_blog__banners__slider.slick({
            slidesToShow: 1,
            arrows: false,
            focusOnSelect: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 5000,
        });

        slider_services__nav.slick({
            infinite: false,
            slidesToShow: 3,
            arrows: false,
            //centerMode: true,
            vertical: true,
            //adaptiveHeight: true,
            focusOnSelect: true,
            //verticalSwiping: true,
            asNavFor: slider_services__content,
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 5,
                        verticalSwiping: true,
                    }
                }
            ]
        });

        slider_services__content.slick({
            infinite: false,
            slidesToShow: 1,
            autoplay: true,
            adaptiveHeight: true,
            arrows: false,
            pauseOnHover: false,
            pauseOnFocus: false,
            swipe: false,
            autoplaySpeed: 50000,
            fade: true,
            dots: true,
            asNavFor: slider_services__nav,
        });

        slider_services__content.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var curSlide = $('.slider_services__content__item[data-slick-index="' + nextSlide + '"]');
            var height = curSlide.attr('data-height');
            var text = curSlide.attr('data-time');
            $(".slider_services__time__line").height(height);
            $(".slider_services__time__text").text(text);
        });


        // works__footer__slider
        var works__rside__slider = $("#works__rside__slider");
        var works__footer__slider = $("#works__footer__slider");
        var works__footer__slider__prev = $("#works__footer__slider__prev__js");
        var works__footer__slider__next = $("#works__footer__slider__next__js");

        works__footer__slider.slick({
            infinite: true,
            slidesToShow: 2,
            arrows: false,
            focusOnSelect: true,
            asNavFor: works__rside__slider,
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        works__rside__slider.slick({
            infinite: true,
            slidesToShow: 1,
            arrows: false,
            focusOnSelect: false,
            swipe: false,
            asNavFor: works__footer__slider,
            fade: true,
            responsive: [
                {
                    breakpoint: 400,
                    settings: {
                        swipe: true,
                    }
                }
            ]
        });

        works__footer__slider__prev.click(function () {
            works__footer__slider.slick("slickPrev");
        });
        works__footer__slider__next.click(function () {
            works__footer__slider.slick("slickNext");
        });

        works__footer__slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var curSlide = $('.works__footer__slide[data-slick-index="' + nextSlide + '"]');
            var url_desctop = curSlide.attr('data-url_desctop');
            var url_mobile = curSlide.attr('data-url_mobile');
            var mobile = $("#mobile");
            var desctop = $("#desctop");
            //alert( height );
            mobile.attr("href", url_mobile);
            desctop.attr("href", url_desctop);
            mobile.find("img").attr("src", url_mobile);
            desctop.find("img").attr("src", url_desctop);
        });


        // command__slider
        var command__slider = $("#command__slider");
        var command__slider__prev = $("#command__slider__prev__js");
        var command__slider__next = $("#command__slider__next__js");

        command__slider.slick({
            infinite: true,
            slidesToShow: 2,
            arrows: false,
            focusOnSelect: false,
            swipe: false,
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 1,
                        swipe: true,
                    }
                }
            ]
        });


        command__slider__prev.click(function () {
            command__slider.slick("slickPrev");
        });
        command__slider__next.click(function () {
            command__slider.slick("slickNext");
        });

        // command__slider
        var advaudit_proces__slider = $("#advaudit_proces__slider");

        advaudit_proces__slider.slick({
            infinite: true,
            slidesToShow: 3,
            arrows: false,
            adaptiveHeight: true,
            focusOnSelect: false,
            swipe: true,
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 1,
                        swipe: true,
                    }
                }
            ]
        });


        // kontekst__b4__slider
        var kontekst__b4__slider = $("#kontekst__b4__slider");

        kontekst__b4__slider.slick({
            infinite: true,
            slidesToShow: 1,
            arrows: false,
            adaptiveHeight: true,
            swipe: true,
            dots: true,
        });


        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1,
            fade: !0,
            adaptiveHeight: true,
            asNavFor: ".slider-nav",
        });

        $(".slider-nav").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            adaptiveHeight: true,
            dots: false,
            focusOnSelect: true,
            verticalSwiping: true,
            centerMode: true,
            vertical: true,
            arrows: false,
            responsive: [{
                breakpoint: 992,
                settings: {slidesToShow: 1,
                    centerMode: !1,
                    dots: !1,
                    arrows: !0,
                    vertical: !1,
                    swipe: true,
                    verticalSwiping: false,
                }
            }]
        });

    }
    // END if slick



    $(".fn__members__preview").click(function(){
        $(this).toggleClass("active");
        $(".fn__members__dropdown").toggleClass("active");
    });


    // CodeMirror

    if ($(".fn_code_mirror").length) {
        $('.fn_code_mirror').each(function (index, elem) {
            CodeMirror.fromTextArea(elem, {
                mode: "javascript",
                lineNumbers: true,
                styleActiveLine: true,
                matchBrackets: false,
                enterMode: 'keep',
                indentWithTabs: false,
                indentUnit: 2,
                tabMode: 'classic',
                theme: 'monokai',
                readOnly: true
            });
        });
    }

    if ($("#fn_script_content").length) {
        var editor = CodeMirror.fromTextArea(document.getElementById("fn_script_content"), {
            mode: "javascript",
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: false,
            enterMode: 'keep',
            indentWithTabs: false,
            indentUnit: 2,
            tabMode: 'classic',
            theme: 'monokai',
            readOnly: true
        });
    }

    // sort blog
    $(".fn__blog_category__sort_by").change(function () {
        this.form.submit();
    });

    // progress bar
    if ($(".sigle_blog").length) {
        setProgresBar();

        function setProgresBar() {
            var post = $(".sigle_blog");
            var postH = post.height();
            var docT = $(window).scrollTop(); //  - $(window).height()
            var persent = (docT / postH ) * 100 | 0;
            $(".progress_bar span").css("width", persent + "%");
        }

        $(document).on("scroll", function () {
            setProgresBar();
        });
    }



    /* GA EVENTS */
    $('.ga_hub_login').click(function(){
        ga('send', 'event', {
            eventCategory: 'tool',
            eventAction: 'click',
        });
    });

    $('.ga__find').click(function(){
        ga('send', 'event', {
            eventCategory: 'tool',
            eventAction: 'click',
        });
    });

    $('.ga__utm').click(function(){
        ga('send', 'event', {
            eventCategory: 'tool',
            eventAction: 'click',
        });
    });

    /*
    $('.ga__search_words').click(function(){
        ga('send', 'event', 'find', 'click');
    });

    $('.ga__tarif__submit').click(function(){
        ga('send', 'event', 'rate', 'click');
    });

    $('.ga__actions__pay').click(function(){
        ga('send', 'event', 'payment', 'click');
    });

    function ga_register__successful(){
        ga('send', 'event', 'registration', 'click');
    }

    function ga_subscribe__successful(){
        ga('send', 'event', 'email', 'click');
    }
    */
    /* GA EVENTS END */



    /* REGISTER */
    function userRegisterPassView() {
        $(".site_register_form__pass__view").click(function () {
            if ($(".site_register_form__pass").attr("type") == "password") {
                $(".site_register_form__pass").attr("type", "text");
            } else {
                $(".site_register_form__pass").attr("type", "password");
            }

        });
    }

    userRegisterPassView();

    $(".site_register__allready_has_acc").click(function () {
        simpleModal.modalClose("site_register");
        simpleModal.modalOpen("site_login");
    });

    $(".fn_only_chars").on('keyup', function (e) {
        var val = $(this).val();
        if (val.match(/[^a-zA-Zа-яА-Я ]/g)) {
            $(this).val(val.replace(/[^a-zA-Zа-яА-Я ]/g, ''));
        }
    });

    $(".fn_only_numbers").on('keyup', function (e) {
        var val = $(this).val();
        if (val.match(/[^0-9]/g)) {
            $(this).val(val.replace(/[^0-9]/g, ''));
        }
    });

    /* register form submit */
    $(document).on("submit", ".fn__site_register_form", function (e) {
        e.preventDefault();

        var form_data = $(this).serialize();
        var btn_submit = $(this).find('[type=submit]');

        var data = {
            'action': 'userRegister',
            'form_data': form_data,
        };

        $.ajax({
            url: theme_ajax.url,
            dataType: 'json',
            type: 'POST',
            data: data,
            beforeSend: function () {
                $(".fn__site_register_form__errors").html("");
                btn_submit.addClass("load");
                btn_submit.prop('disabled', true);
            },
            success: function (data) {
                if (data.errors) {
                    // show errors
                    for (i = 0; i < data.errors.length; ++i) {
                        $(".fn__site_register_form__errors").append("<p>" + data.errors[i] + "</p>");
                    }
                } else if (data.success) {
                    // ga_register__successful();
                    window.location = "registration-step/?mail=" + data.success;
                }
                btn_submit.removeClass("load");
                btn_submit.prop('disabled', false);
            },
            error: function (data) {
                console.log('Register error. Have fun :)');
            }
        });
        return false;
    });




    /* LOGIN */

    /*$(".site_login__go_register").click(function () {
        simpleModal.modalClose("site_login");
        simpleModal.modalOpen("site_register");
    });*/

    /* login form submit */
    $(document).on("submit", ".fn__site_login_form", function (e) {
        e.preventDefault();

        var form_data = $(this).serialize();
        var btn_submit = $(this).find('[type=submit]');

        var data = {
            'action': 'userLogin',
            'form_data': form_data,
        };

        $.ajax({
            url: theme_ajax.url,
            dataType: 'json',
            type: 'POST',
            data: data,
            beforeSend: function () {
                $(".fn__site_login_form__errors").html("");
            },
            success: function (data) {
                if (data.errors) {
                    // show errors
                    for (i = 0; i < data.errors.length; ++i) {
                        $(".fn__site_login_form__errors").append("<p>" + data.errors[i] + "</p>");
                    }
                } else if (data.success) {
                    window.location = "user/";
                }
            },
            error: function (data) {
                console.log('Login error. Have fun :)');
            }
        });
        return false;
    });


    /* Subscribe form */
    $(document).on("submit", ".fn__site_subscribe_form", function (e) {
        e.preventDefault();

        var form_data = $(this).serialize();
        var btn_submit = $(this).find('[type=submit]');

        var data = {
            'action': 'userSubscribe',
            'form_data': form_data,
        };

        $.ajax({
            url: theme_ajax.url,
            dataType: 'json',
            type: 'POST',
            data: data,
            beforeSend: function () {
				btn_submit.prop('disabled', true);
            },
            success: function (data) {
                window.location.replace("subscribe-thankyou/");
            },
            error: function (data) {
                console.log('Subscribe error. Have fun :)');
            }
        });
        return false;
    });

    /* Subscribe form */
    $(document).on("submit", ".fn__blog_subscribe_form", function (e) {
        e.preventDefault();

        var form_data = $(this).serialize();
        var btn_submit = $(this).find('[type=submit]');

        var data = {
            'action': 'blogSubscribe',
            'form_data': form_data,
        };

        $.ajax({
            url: theme_ajax.url,
            dataType: 'json',
            type: 'POST',
            data: data,
            beforeSend: function () {
                btn_submit.prop('disabled', true);
            },
            success: function (data) {
                window.location.replace("spasibo-za-obrashhenie/");
            },
            error: function (data) {
                console.log('Subscribe error. Have fun :)');
            }
        });
        return false;
    });



    /* Dispatch form */
    $(document).on("submit", ".fn__site_dispatch_form", function (e) {
        ga('send', 'event', {
            'eventCategory': 'email (ab)',
            'eventAction': 'click'
        });
        //ga('send', 'event', 'email (ab)', 'click');
       /* gtag('event', 'subscribe', {
            'event_category': 'email (ab)',
            'event_action': 'click'
        });*/


        e.preventDefault();
        $(this).find('button[type=submit]').attr('disabled',true);

        var form_data = $(this).serialize();
        var btn_submit = $(this).find('[type=submit]');

        var data = {
            'action': 'userDispatch',
            'form_data': form_data,
        };

        $.ajax({
            url: theme_ajax.url,
            dataType: 'json',
            type: 'POST',
            data: data,
            beforeSend: function () {
                $(this).find('button[type=submit]').attr('disabled',true);
            },
            success: function (data) {
                $(this).find('button[type=submit]').removeAttr('disabled');
                window.location = 'subscribe-thankyou/';
            },
            error: function (data) {
                $(this).find('button[type=submit]').removeAttr('disabled');
                console.log('Dispatch error. Have fun :)');
            }
        });
        return false;
    });




    /*Delete project from LK */
    $(document).on('click','.fn_delete_project',function () {
        var elem = $(this);
        var data = {
            'action': 'deleteProject',
            'delete_project_id': elem.data('id'),
        };

        if (confirm("Вы уверены ?")) {
            $.ajax({
                url: theme_ajax.url,
                dataType: 'json',
                type: 'POST',
                data: data,
                success: function (data) {
                    if(data.success) {
                        elem.parent().remove();
                    } else {
                        console.log('delete error');
                    }
                },
                error: function (data) {
                    console.log('Shit error...');
                }
            });
        }
    });

    var related_slider_prev = $("#works__footer__slider__prev__js");
    var related_slider_next = $("#works__footer__slider__next__js");

    related_slider_prev.click(function () {
        related_slider.slick("slickPrev");
    });
    related_slider_next.click(function () {
        related_slider.slick("slickNext");
    });
    var related_slider = $(".fn_related_blog_slider");

    if(related_slider.length) {
        related_slider.slick({
            infinite: true,
            slidesToShow: 3,
            arrows: false,
            autoplay: true,
            //asNavFor: related_slider,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }



    var utm_slide = $(".fn_utm_slider");

    if(utm_slide.length) {
        utm_slide.slick({
            infinite: true,
            slidesToShow: 1,
            arrows: false,
            autoplay: true,
            dots:true,
            //asNavFor: related_slider,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    if($("#phone").length) {
        var telInput = $("#phone"),
            errorMsg = $("#error-msg"),
            validMsg = $("#valid-msg");

        telInput.intlTelInput({
            onlyCountries: [ "ua", "ru", "by", "kz"],
            utilsScript: "wp-content/themes/pengstud_v2/assets/libs/intl-tel/js/utils.js"
        });

        var reset = function() {
            telInput.removeClass("error");
            errorMsg.addClass("hide");
            validMsg.addClass("hide");
        };

        telInput.on('blur change',function () {
            reset();
            if ($.trim(telInput.val())) {
                if (telInput.intlTelInput("isValidNumber")) {
                    validMsg.removeClass("hide");
                } else {
                    telInput.addClass("error");
                    errorMsg.removeClass("hide");
                    setTimeout(function() {
                        //telInput.val('');
                    }, 1000);


                }
            }
        });

        telInput.on("keyup change", reset);
    }




    /* UTM */
    /*
    $('body').on('click', ".utm_button", function(){

        var data = {
            'action': 'add_utm_click',
        };

        $.ajax({
            url: theme_ajax.url,
            type: 'POST',
            data: data,
            success: function (data) {
                console.log(data);
                console.log("success");
            },
            error: function (data) {
                console.log(data);
                console.log('Shit error...');
            }
        });

        return;
    });
    */

    /* coockie */
    $('body').on('click', '.fn__allow_penguin_cookies', function(){

        $(".fn__coockie_message__holder").slideUp();

        var status = $(this).attr('data-status');

        var data = {
            'action': 'allow_penguin_cookies',
            'status': status
        };

        $.ajax({
            url: theme_ajax.url,
            type: 'POST',
            data: data,
            success: function (data) {
                console.log("success");
            },
            error: function (data) {
                console.log('Shit error...');
            }
        });

        return;
    });

    /* fn__sigle_blog__read_more */
    $('body').on('click', '.fn__sigle_blog__read_more', function() {
        var url = $(this).data('link');
        sessionStorage.setItem('page_url', url);
    });

    /* auth_page__login_user */
    if ( $('.auth_page__login_user').length ) {
        var url = sessionStorage.getItem('page_url');
        if (url && url !== '') {
            setTimeout(function() {
                sessionStorage.removeItem('page_url');
                window.location.href = url;
            });
        }
    };

    var btrforms = $('.fn_subscribe__form');

    btrforms.on('submit', function (event) {
    var form = $(this);
    event.preventDefault();

    var serialize_data = $(this).serialize();

    //console.log('serialize_data: ' + serialize_data);

    $.ajax({
      url: '/bitrix.php',
      type: 'POST',
      data: serialize_data,
      dataType: 'json',
      beforeSend: function () {

      },
      success: function (data) {
        form.trigger('reset');
        // style success
        form.addClass('success');
        // clear styles success
        setTimeout(function(){
          form.removeClass('success');
        }, 2500);
        console.log('success');

        window.location.href = '/spasibo-za-obrashhenie/';
      },
      error: function (data) {

      }
    });
  });

  new WOW({mobile: !1}).init();

  $('.fn_ask_question').on('click', function () {
      let person = $(this).data('toperson');
      $('.fn_person').val(person);
  });

  $("#navToggle").click(function () {
      $(this).toggleClass("active"), $(".overlay").toggleClass("open"), $("body").toggleClass("locked")
  });


  // open vacancy_popup
  $('body').on('click', '#vacancy_popup', function() {
      simpleModal.modalOpen( "vacancy_popup" );
  });

 // open vacancy_popup
  $('body').on('click', '#send_resume_popup', function() {
      simpleModal.modalOpen( "send_resume_popup" );
  });


  /* fn__site_conference_form form submit */
  $(document).on("submit", ".fn__site_conference_form", function (e) {
    e.preventDefault();

    var form = $(this);
    var form_data = $(this).serialize();
    var btn_submit = $(this).find('[type=submit]');

    var data = {
      'action': 'conferenceForm',
      'form_data': form_data,
    };


    $.ajax({
      url: theme_ajax.url,
      dataType: 'json',
      type: 'POST',
      data: data,
      beforeSend: function () {
        btn_submit.prop('disabled', true);
      },
      success: function (data) {

        form.addClass('success');
        // clear styles success
        setTimeout(function(){
          btn_submit.prop('disabled', false);
          form.removeClass('success');
          // console.log('success', data);
        }, 5000);
      },
      error: function (data) {
        console.log('Conference form error. Have fun :)');
      }
    });
    return false;
  });

  $('#widget_form_modal').submit(function(eventObject){
  	console.log('Форма отправлена')
  })

});
