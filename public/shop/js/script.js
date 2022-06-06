$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(window).resize(function () {
        var w = innerWidth;
        var h = innerHeight;
        $(".madia").text(w + "+" + h);
    });

    $(".header_nav_botten2").slideUp();
    $(".header_nav_botten2_btn").click(function () {
        $(".header_nav_botten2").slideToggle();
    });

    $(".slide1").find("img").first().addClass("action");
    setInterval(function () {
        if ($(".action").next("img").length > 0) {
            $(".action").next("img").addClass("action");
            $(".action").first().removeClass("action");
        } else {
            $(".slide1").find("img").first().addClass("action");
            $(".action").last().removeClass("action");
        }
    }, 4000);
    $(".slide_next1 , .slid_img").click(function () {
        if ($(".action").next("img").length > 0) {
            $(".action").next("img").addClass("action");
            $(".action").first().removeClass("action");
        } else {
            $(".slide1").find("img").first().addClass("action");
            $(".action").last().removeClass("action");
        }
    });
    $(".slide_prev1").click(function () {
        if ($(".action").prev("img").length > 0) {
            $(".action").prev("img").addClass("action");
            $(".action").last().removeClass("action");
        } else {
            $(".slide1").find("img").last().addClass("action");
            $(".action").first().removeClass("action");
        }
    });
    $(".slide_toch2").owlCarousel({
        margin: 50,
        loop: true,
        items: 4,
        //slideBy:'page',
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        center: true,
        mouseDarg: true,
        touchDrag: true,
        //autoWidth:true,
        startPosition: 4,
        responsive: {
            300: {
                items: 2,
            },
            400: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        },
    });
    $(".slide_toch3").owlCarousel({
        margin: 40,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        center: true,
        mouseDarg: true,
        touchDrag: true,
        startPosition: 4,
        responsive: {
            300: {
                items: 2,
            },
            400: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        },
    });
    $(".slide_toch4").owlCarousel({
        margin: 100,
        loop: true,
        items: 4,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        center: true,
        mouseDarg: true,
        touchDrag: true,
        //autoWidth:true,
        //startPosition:4,
        responsive: {
            300: {
                items: 3,
            },
            600: {
                items: 4,
            },
            800: {
                items: 4,
            },
            1200: {
                items: 5,
            },
        },
    });
    $(".main_by").click(function () {
        $(".by_section2").fadeIn();
        var w = innerWidth;
        if (w >= 1000) {
            $("html,body").animate({ scrollTop: 950 }, "2000");
        } else {
            $("html,body").animate({ scrollTop: 1380 }, "2000");
        }
    });
    $(".button_cancel").click(function () {
        $(".by_section2").fadeOut();
        $.ajax({
            type: "post",
            url: "/IgnorStoreUser",
        });
    });

    $(".header_by2").click(function () {
        var w = innerWidth;
        var h = innerHeight;
        if (w >= 620) {
            $(".mask").fadeIn();
            $(".box_shop")
                .fadeIn()
                .css({
                    left: (w - 600) / 2,
                    top: (h - 300) / 2,
                });
        } else {
            $(".mask").fadeIn();
            $(".box_shop")
                .fadeIn()
                .css({
                    width: 350,
                    left: (w - 350) / 2,
                    top: (h - 300) / 2,
                });
        }
        $(window).resize(function () {
            var w = innerWidth;
            var h = innerHeight;
            if (w <= 620) {
                $(".box_shop").css({
                    width: 350,
                    left: (w - 350) / 2,
                    top: (h - 300) / 2,
                });
            } else {
                $(".box_shop").css({
                    width: 650,
                    left: (w - 650) / 2,
                    top: (h - 300) / 2,
                });
            }
        });
    });

    $(".button_add").click(function () {
        var value1 = $(".pass").val();
        var value2 = $(".email").val();
        var value3 = $(".phon_number").val();
        if (value1 === "" || value2 === "" || value3 === "") {
            $(".mask").fadeIn();
            $(".login").fadeIn();
        } else {
            $(".mask").fadeOut();
            $(".login").fadeOut();
        }
    });

    $(".button_add2").click(function () {
        var value1 = $(".name2").val();
        var value2 = $(".addres2").val();
        var value3 = $(".phon_number2").val();
        if (value1 === "" || value2 === "" || value3 === "") {
            $(".login_erore2").fadeIn();
        } else {
            $(".by_section2").fadeOut();
        }
    });
    $(".button_cancel2").click(function () {
        $(".by_section2").fadeOut();
        $(".login_erore2").fadeOut();
    });
    $(".button_cancel").click(function () {
        $(".mask").fadeOut();
        $(".login").fadeOut();
        $(".login_erore").fadeOut();
    });

    $(".loginlink2").click(function () {
        var w = innerWidth;
        var h = innerHeight;
        if (w >= 450) {
            $(".mask").fadeIn();
            $(".login2")
                .fadeIn()
                .css({
                    left: (w - 400) / 2,
                    top: (h - 300) / 2,
                });
        } else {
            $(".mask").fadeIn();
            $(".login2").css({
                width: 300,
                height: 300,
                left: (w - 300) / 2,
                top: (h - 300) / 2,
            });
            $(".login2").fadeIn();
        }
        $(window).resize(function () {
            var w = innerWidth;
            var h = innerHeight;
            if (w <= 450) {
                $(".login2").css({
                    width: 300,
                    height: 350,
                    left: (w - 300) / 2,
                    top: (h - 350) / 2,
                });
            } else {
                $(".login2").css({
                    width: 400,
                    height: 300,
                    left: (w - 400) / 2,
                    top: (h - 300) / 2,
                });
            }
        });
    });
    $(".button_login2-2").click(function () {
        $(".tamas").val("");
        $(".mask , .login2").fadeOut();
    });
    $('.cancel_shop_bax').click(function (e) { 
        $('.box_shop').fadeOut();
        $(".mask , .login2").fadeOut();
    });
});
