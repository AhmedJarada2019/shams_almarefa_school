$(document).ready(() => {

    // Check If Device Is Mobile Or No ...
    is_mobile();
    $(window).resize(function () {
        is_mobile();
    });
    function is_mobile() {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $("body").addClass("mobile");
        } else {
            $("body").removeClass("mobile");
        }
    }

    // When Scroll Down ...
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $("header").addClass("down");
        } else {
            $("header").removeClass("down");
        }
    }
    scrollFunction();

    // Hoverable Menu Header ...
    var timeout = 500;
    var closetimer = 0;
    var menu_opened = 0;

    function open_menu() {
        if ($(window).width() >= 992) {
            remove_timer();
            close_menu();
            menu_opened = $(this).find('ul:not(.clickable )').addClass("show")
        }
    }

    function close_menu() {
        if (menu_opened) menu_opened.removeClass("show");
    }

    function time_auto_close() { closetimer = window.setTimeout(close_menu, timeout); }

    function remove_timer() {
        if (closetimer) {
            window.clearTimeout(closetimer);
            closetimer = null;
        }
    }

    $(document).ready(function () {
        $('header .sub-menu:not(.clickable)').bind('mouseover', open_menu)
        $('header .sub-menu:not(.clickable)').bind('mouseout', time_auto_close)
    });

    document.onclick = (() => {
        close_menu()

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $('header .sub-menu>ul').removeClass("show-mobile");
        }
    });

    // Notification ...

    $(document).on("click", "header .notification>a", function () {
        $($(this).next("ul")).toggleClass("show");
        $(this).toggleClass("active");
    });

    $(document).mousedown(function (e) {
        var container = $(".notification>a");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $(".notification>a").removeClass("active");
            $(".notification>ul").removeClass("show");
        }
    });

    // Custom Menu Header Mobile ...

    $(document).on("click", "header .sub-menu>a", function (e) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            e.preventDefault();
            if (!$($(this).next("ul")).hasClass("show-mobile")) {
                $($("header .sub-menu").children("ul")).removeClass("show-mobile");
                $(this).next('ul').addClass("show-mobile");
            } else {
                $(this).next('ul').removeClass("show-mobile");
            }
        }
    });

    // Open Menu Mobile ...

    $(document).on("click", "header .hamburger", function () {
        $(this).toggleClass("is-active");
        $(".nav-links").slideToggle("medium")
    });

    // Focus & Blur .. ".box-input" ...
    $(document).on("input", ".box-input input", function () {
        if ($(this).val().length > 0) {
            $($(this).parents(".box-input")).addClass("has-value");
        } else {
            $($(this).parents(".box-input")).removeClass("has-value");
        }
    });

    $(document).on("focus", ".box-input input, .box-input select", function () {
        $($(this).parents(".box-input")).addClass("focused");
    });

    $(document).on("blur", ".box-input input, .box-input select", function () {
        $($(this).parents(".box-input")).removeClass("focused");
    });

    // (Show/Hide) Filters ...
    $(document).on("click", ".intro-pages .btn-filter", function () {
        $($($(this).parents(".intro-pages")).find("form")).addClass("show");
    });

    $(document).on("click", ".bg-form-mobile", function () {
        $($($(this).parents(".intro-pages")).find("form")).removeClass("show");
    });

    // Append Links In Box Course As A Link ...
    for (var i = 0; i < $(".box-course").length; i++) {
        $($($(".box-course")[i]).find(".action")).append($($(".box-course")[i]).siblings(".btn"));
        $($($(".box-course")[i]).find(".others")).prepend($($(".box-course")[i]).siblings(".type"));
        $($($(".box-course")[i]).find(".img")).append($($(".box-course")[i]).siblings(".trainer"));
        $($($(".box-course")[i]).find(".img")).append($($(".box-course")[i]).siblings(".love"));
    }

    // Active Btn Love ...
    $(document).on("click", ".box-course .love", function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
    });

    // Swiper Some Courses ...
    new Swiper('.some-courses .swiper', {
        loop: true,
        navigation: {
            nextEl: '.some-courses .swiper-button-next',
            prevEl: '.some-courses .swiper-button-prev',
        },
        breakpoints: {
            1: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        }
    });

    // Swiper Trainers ...
    new Swiper('.trainers .swiper', {
        loop: true,
        navigation: {
            nextEl: '.trainers .swiper-button-next',
            prevEl: '.trainers .swiper-button-prev',
        },
        breakpoints: {
            1: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            375: {
                slidesPerView: 1.4,
                spaceBetween: 20,
                centeredSlides: true,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        }
    });

    // Append Links Social In Box Trainer ...
    for (var i = 0; i < $(".box-trainer").length; i++) {
        $($($(".box-trainer")[i]).find(".img")).append($($(".box-trainer")[i]).siblings(".links-over"));
    }

    // Swiper Comments ...
    new Swiper('.comments .swiper', {
        loop: true,
        navigation: {
            nextEl: '.comments .swiper-button-next',
            prevEl: '.comments .swiper-button-prev',
        },
        breakpoints: {
            1: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            375: {
                slidesPerView: 1.4,
                spaceBetween: 20,
                centeredSlides: true,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30,
            }
        }
    });

    // Set Max Height For Text Box Rate ...
    Array.prototype.max = function () {
        return Math.max.apply(null, this);
    };

    $(window).resize(function () {
        get_max_height_p_box_rate();
    });

    function get_max_height_p_box_rate() {
        let heightTextBoxRate = [];
        $(".box-rate p").height("unset");
        for (let i = 0; i < $(".box-rate p").length; i++) {
            heightTextBoxRate.push($($(".box-rate p")[i]).height());
            if (i == $(".box-rate p").length - 1) {
                $(".box-rate p").height(heightTextBoxRate.max());
            }
        }
    }
    get_max_height_p_box_rate();

    // Make Nice Scroll ...
    // OverlayScrollbars(document.querySelector('.tabs:not(.no-scroll)'), {
    //     scrollbars: {
    //         autoHide: 'leave'
    //     }
    // });

    let ele_has_scroll = document.querySelectorAll('.OverlayScrollbars');
    if (ele_has_scroll.length > 0) {
        for (let i = 0; i < ele_has_scroll.length; i++) {

            var iHeight = $(ele_has_scroll[i]).height();
            var iScrollHeight = $(ele_has_scroll[i]).prop("scrollHeight");

            if (iScrollHeight - iHeight > 0) {
                OverlayScrollbars(ele_has_scroll[i], {
                    scrollbars: {
                        autoHide: 'leave'
                    }
                });
                $(ele_has_scroll[i]).addClass("py-4")
            }
        }
    }

    let ele_has_scroll2 = document.querySelectorAll('.OverlayScrollbars2');
    if (ele_has_scroll2.length > 0) {
        for (let i = 0; i < ele_has_scroll2.length; i++) {

            var iHeight = $(ele_has_scroll2[i]).width();
            var iScrollHeight = $(ele_has_scroll2[i]).prop("scrollWidth");

            if (iScrollHeight - iHeight > 0) {
                OverlayScrollbars(ele_has_scroll2[i], {
                    scrollbars: {
                        autoHide: 'leave'
                    }
                });
                $(ele_has_scroll2[i]).addClass("py-4")
            }
        }
    }

    // Append Links In Box Article As A Link ...
    for (var i = 0; i < $(".box-article").length; i++) {
        $($($(".box-article")[i]).find(".info p")).append($($(".box-article")[i]).siblings(".more"));
        $($($(".box-article")[i]).find(".info")).prepend($($(".box-article")[i]).siblings(".tags"));
        $($($(".box-article")[i]).find(".img")).append($($(".box-article")[i]).siblings(".writer"));
    }

    function check_val_input() {
        for (var i = 0; i < $(".box-input2").length; i++) {
            if ($($($(".box-input2")[i]).find("*:is(input, textarea)")).val().length > 0) {
                $($(".box-input2")[i]).addClass("hasValue");
            } else {
                $($(".box-input2")[i]).removeClass("hasValue");
            }
        }
    }
    check_val_input();

    $(document).on("input", ".box-input2 input, .box-input2 textarea", function () {
        if ($(this).val().length > 0) {
            $($(this).parents(".box-input2")).addClass("hasValue");
        } else {
            $($(this).parents(".box-input2")).removeClass("hasValue");
        }
    });

    $(document).on("focus", ".box-input2 input, .box-input2 textarea", function () {
        $($(this).parents(".box-input2")).addClass("focus");
    });

    $(document).on("blur", ".box-input2 input, .box-input2 textarea", function () {
        $($(this).parents(".box-input2")).removeClass("focus");
    });

    // Show/Hide Password ...

    $(document).on("click", "input~.icon", function () {
        $($(this).parents(".box-input2")).toggleClass("show-password");
        if ($($(this).siblings("input")).attr("type") == "text") {
            $($(this).siblings("input")).attr("type", "password");
        } else {
            $($(this).siblings("input")).attr("type", "text");
        }
    });

    if (document.querySelector("#telephone")) {
        var input = document.querySelector("#telephone");
        window.intlTelInput(input, ({
            preferredCountries: ["ps", "sa"],
        }));
    }

    // Video Single Course ...
    $(document).on("click", ".video svg#play", function () {
        $($($(this).parents(".video")).find("video"))[0].play();
        $($(this).parents(".video")).addClass("playing");
        $($(this).parents(".video")).removeClass("pausing");
    });

    $(document).on("click", ".video svg#pause", function () {
        $($($(this).parents(".video")).find("video"))[0].pause();
        $($(this).parents(".video")).addClass("pausing");
    });

    // Tabs Single Course ...
    OverlayScrollbars($(".sections-course")[0], {
        scrollbars: {
            autoHide: 'leave'
        }
    });

    // Slide Down/Up Lesson Course ...
    $(document).on("click", ".title-unit", function () {
        $(this).toggleClass("active");
        $($(this).next(".list-lesson")).slideToggle(333);
    });

    // Active Tabs By Section Visible ...
    var addClassOnScroll = function () {
        var windowTop = $(window).scrollTop();
        $('.single-section-course').each(function (index, elem) {
            var offsetTop = $(elem).offset().top;
            var outerHeight = $(this).outerHeight(true);

            if (windowTop > (offsetTop - 230) && windowTop < (offsetTop + outerHeight)) {
                var elemId = $(elem).attr('id');
                $(".sections-course-scroll a.active").removeClass('active');
                $(".sections-course-scroll a[href='#" + elemId + "']").addClass('active');
            }
        });
    };

    $(window).on('scroll', function () {
        addClassOnScroll();
    });

    $(document).on("click", ".sections-course-scroll a", function () {
        $('html, body').animate({
            scrollTop: $($(this).attr("href")).offset().top - 150
        }, 500);
    });

    // Progress Bar Circle ...

    for (let i = 0; i < $(".progress").length; i++) {
        var circle = new ProgressBar.Circle($(".progress")[i], {
            color: "#000",
            trailColor: "#fff",
            duration: 1000,
            easing: 'easeInOut',
            strokeWidth: 4
        });
        circle.animate($($(".progress")[i]).attr("data-num") / 100);
    }

    // Append Links Social In Box Trainer ...
    for (var i = 0; i < $(".list-lesson>a").length; i++) {
        $($(".list-lesson>a")[i]).append($($(".list-lesson>a")[i]).next(".attachment"));
    }

    // Active Tabs In Page Lesson ...
    function autoActiveTab() {
        for (var i = 0; i < $(".tabs a.tab[id-tab]").length; i++) {
            if ($($(".tabs a.tab[id-tab]")[i]).hasClass("active")) {
                $(".content-tabs").removeClass("show");
                $(".content-tabs[id-tab=" + $($(".tabs a.tab[id-tab]")[i]).attr("id-tab") + "]").addClass("show");
            }
        }
    }
    autoActiveTab();

    $(document).on("click", ".tabs a[id-tab]", function () {
        $($(this).siblings("a")).removeClass("active");
        $(this).addClass("active");
        autoActiveTab();
    });

    // Move Element From Place To Another By Device Width ...
    function moveContentCourse() {
        if ($(window).width() >= 992) {
            $(".all-unit-course").appendTo('.sec-content-course');
            $(".tabs a.tab[id-tab='comments']").addClass("active");
            $(".tabs a.tab[id-tab='content-course']").removeClass("active");
            autoActiveTab();
        } else {
            $(".all-unit-course").appendTo('.content-tabs[id-tab="content-course"]');
            $(".tabs a.tab[id-tab='content-course']").addClass("active");
            $(".tabs a.tab[id-tab='comments']").removeClass("active");
            autoActiveTab();
        }
    };
    moveContentCourse();

    $(window).resize(function () {
        moveContentCourse();
    });

    // Open Reply For Comment ...
    $(document).on("click", ".can-reply .edit-reply", function () {
        $($($(this).parents(".can-reply")).children("form")).addClass("show");
        $($($(this).parents(".can-reply")).children("div")).removeClass("show");
        $(".edit-delete-reply").removeClass("show");
    });

    // Close Reply For Comment ...
    $(document).on("click", ".can-reply .close-reply", function () {
        $($($(this).parents(".can-reply")).children("form")).removeClass("show");
        $($($(this).parents(".can-reply")).children("div")).addClass("show");
    });

    // Open Reply For Comment ...
    $(document).on("click", ".open-reply", function () {
        $($($(this).parents(".main-comment")).children("form")).addClass("show");
    });

    // Open Menu Edit Delete Reply ...
    $(document).on("click", ".open-edit-reply", function () {
        $($(this).next(".edit-delete-reply")).addClass("show");
    });

    // Close Menu Edit Delete Reply ...
    $(document).mousedown(function (e) {
        var container = $(".edit-delete-reply");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $(".edit-delete-reply").removeClass("show");
        }
    });

    // Close Reply ...
    $(document).on("click", ".close-reply", function () {
        $($(this).parent(".reply")).removeClass("show");
    });

    // Show All Reply ...
    $(document).on("click", ".num-reply", function () {
        $($($(this).parents(".main-comment")).children(".more-reply")).toggleClass("show");
    });

    // Btn Print ...
    $(document).on("click", ".btn-print", function () {
        window.print();
    });

    // Input Stars ...
    let submitStars = false;
    $(document).on("mouseover", ".input-stars .stars svg", function () {
        if (!submitStars) {
            $($(this).parents(".stars")).attr("rate", $(this).attr("num-star"));
        }
    });

    $(document).on("mouseout", ".input-stars .stars", function () {
        if (!submitStars) {
            $(this).attr("rate", 0);
        }
    });

    $(document).on("click", ".input-stars .stars svg", function () {
        $($(this).parents(".stars")).attr("rate", $(this).attr("num-star"));
        $($($(this).parents(".stars")).next("input")).val($(this).attr("num-star"));
        submitStars = true;
    });

    // Pop Up ...
    $(document).on("click", "[key-pop]", function () {
        $(`[id-pop="${$(this).attr("key-pop")}"]`).addClass("show");
        $("body").addClass("no-scroll");
    });

    $(document).on("click", ".close-pop-up", function () {
        $($(this).parents(".pop-up")).removeClass("show");
        $("body").removeClass("no-scroll");
        $($(".pop-up").find("video"))[0].pause();
        $($(".pop-up").find(".video")).addClass("pausing");
    });

    $(document).mousedown(function (e) {
        var container = $(".pop-up>div");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $(".pop-up").removeClass("show");
            $("body").removeClass("no-scroll");
        }
    });

});