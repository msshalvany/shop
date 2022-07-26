<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--================css======================-->
    @yield('css')
    <script src="/shop/js\jquery.js"></script>
    <!--================css======================-->
    <title>digital market</title>
</head>

<body>
    <!--===================head============================-->
    <header>
        @php
        if (session()->get('User')) {
            $box_product =json_decode(session()->get('User')->box_product_id);
        }
        @endphp
        @if (session()->get('User'))
        <script>
            function get_pro_box() { 
                $.ajaxSetup({
               headers: {
                   "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               },
           });
           $.ajax({
               type: "post",
               url: "{{ route('get_pro_box') }}",
               data: {id:"{{session()->get('User')->id}}"},
               success: function (response) {
                   let obj_pro_box = JSON.parse(response)
                   obj_pro_box.forEach(element => {
                    $('.box_shop').append(`
                    <ul class="list-box">
                        <li>${element.name}</li>
                        <li><a href='bypage/${element.id}'><img width="120px" height='120px' src="${element.image}" alt=""></a></li>
                        <li><button onclick="del_pro_box(event)" id="${element.id}" class="del-pro-box">حدف</button></li>
                    </ul>
                       `);
                   });
                 ;
               }
           });
        }
       get_pro_box()
       </script>
        <div  class="box_shop">
            <div class="cancel_shop_bax">&bigotimes;</div>
            <div class="empty_shop_bax"></div>
        </div>
        <script>
            function del_pro_box(e) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('del_pro_box') }}",
                    data: {
                    user:{{session()->get('User')->id}},
                    pro:e.target.id
                    },
                    success: function (response) {
                      $('.list-box').remove();
                      get_pro_box()
                    }
                });
            }
          
        </script>
        @endif

        <div style="height: 325px" class="login2" id="login2">
            <form method="POST" action="{{ route('LoginUser') }}">
                @csrf
                <label>ایمیل:</label>
                <input name="email" style="width: 90%;" type="email" class="form-control email email_log"
                    aria-label=""><br>
                <label>رمز:</label>
                <input name="password" style="width: 70%;" type="password" class="form-control email pass_log"
                    aria-label=""><br>
                <input type="submit" class="button_login2" value="ارسال نظر">
                <input type="button" class="button_login2-2" value="cancel">
                <div style="display: none" class="login_su">با موفقیت وارد شدید</div>
                <div style="display: none" class="login_er">ایمیل یا رمز عبور صحیح نیست</div>
                <a class="link-recovery-pasword" href="#">بازیابی رمز عبو</a>
            </form>
            <script>
                $('.button_login2').click(function(e) {
                    if ($('.email_log').val() == "" && $('.pass_log').val() == "") {
                        e.preventDefault();
                    } else {
                        e.preventDefault();
                        let email = $('.email_log').val();
                        let pass = $('.pass_log').val();
                        $.ajax({
                            type: "post",
                            url: "{{ route('LoginUser') }}",
                            data: {
                                password: pass,
                                email: email
                            },
                            success: function(response) {
                                if (response == 1) {
                                    $('.login_su').fadeIn();
                                    setTimeout(() => {
                                        $('.login_su').fadeOut();
                                    }, 1000);   
                                    setTimeout(() => {
                                        location.href = location.pathname;
                                    }, 1200);          
                                } else if (response == 0) {
                                    $('.login_er').fadeIn();
                                    setTimeout(() => {
                                        $('.login_er').fadeOut();
                                    }, 1800);   
                                }
                            }
                        });
                    }
                });
            </script>
        </div>

        {{-- --}}
        </div>
        <div class="mask"></div>
        <div class="header_nav_top">
            <div class="header_navbar_top">
                <ul>
                    @if (!session()->get('User'))
                    <li><a  href="{{ route('RegesterUser') }}" class="loginlink">ثبت نام و عضویت<i class="material-icons-outlined ">person_add</i></a>
                    </li>
                    @endif
                    @if (!session()->get('User'))
                        <li><a id="loginlink2" class="loginlink2"> ورود به حساب کاربری <i class="material-icons-outlined ">account_circle</i></a></li>
                    @else
                        <form method="POST" action="{{ route('logoutUser') }}">
                            @csrf
                            <li><button style="background-color: transparent;color: white;border: none;" class="">خروج از حساب<i class="material-icons-outlined ">account_circle</i></button></li>
                        </form>
                    @endif
                </ul>
            </div>
            <div class="header_nav_top_link">
                <a href="/" class="a"><i class="material-icons-outlined ">language</i>www.digitalmarket.com</a>
            </div>
        </div>

        <div class="header_section">
            <div class="header_section_right">
                <div class="header_by">
                    @if (session()->get('User'))
                        <div class="header_by1">2</div>
                        <div class="header_by2">سبد خرید<i class="material-icons-outlined">shopping_cart</i></div>
                    @endif
                    @if (!session()->get('User'))
                    <div class="add loginlink"><a href="{{ route('RegesterUser') }}"> ثبت نام و عضویت</a><i style="vertical-align: -8px; margin-right: 6px;"
                    class="material-icons-outlined ">person_add</i>
                    </div>
                    @endif
                </div>
                <form action="/search" method="GET">
                    <div class="header_search">
                        <input name="search" aria-label="" type="text" class="header_search1"
                            placeholder="نام کالا را وارد کنید......">
                        <input type="submit" value="جست وجو" class="header_search2">
                    </div>
                </form>
            </div>
            <div class="header_logo"></div>
        </div>
        <div class="header_nav_botten">
            <ul class="header_nav_botten1">
                <li><a href="{{ route('category', ['category' => 'mobile']) }}">موبایل و تبلت</a></li>
                <li><a href="{{ route('category', ['category' => 'computer']) }}">لپ تاپ و کامپیوتر</a></li>
                <li><a href="{{ route('category', ['category' => 'homeApp']) }}">لوازم خانگی</a></li>
                <li><a href="{{ route('category', ['category' => 'asidApp']) }}">لوازم جانبی</a></li>
                <li><a href="{{ route('category', ['category' => 'game']) }}">کنسول بازی و سرگرمی</a></li>
            </ul>
            <i class="material-icons-outlined header_nav_botten2_btn">book</i>
            <div class="header_nav_botten2">
                <ul>
                    <li><a href="{{ route('category', ['category' => 'mobile']) }}">موبایل و تبلت</a></li>
                    <li><a href="{{ route('category', ['category' => 'computer']) }}">لپ تاپ و کامپیوتر</a></li>
                    <li><a href="{{ route('category', ['category' => 'homeApp']) }}">لوازم خانگی</a></li>
                    <li><a href="{{ route('category', ['category' => 'asidApp']) }}">لوازم جانبی</a></li>
                    <li><a href="{{ route('category', ['category' => 'game']) }}">کنسول بازی و سرگرمی</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!--===================head============================-->

    <!--===================section============================-->
    @yield('content')
    <!--===================section============================-->


    <!--===================footer============================-->


    <footer>

        <div class="footer1_1">
            <h4>فروشگاه اینترنتی دیجی کالا بررسی انتخاب و خرید آنلاین</h4>
            <p>یجی‌کالا به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با پایبندی به سه اصل
                کلیدی، پرداخت در محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا، موفق شده تا همگام با فروشگاه‌های
                معتبر جهان، به بزرگ‌ترین فروشگاه اینترنتی ایران تبدیل شود. به محض ورود به دیجی‌کالا با یک سایت پر از
                کالا رو به رو می‌شوید! هر آنچه
                که نی از دارید و به ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
            </p>
        </div>
        <div class="footer1_2">
            <ul>
                <li><a class="loginlink">ثبت نام و عضویت<i class="material-icons-outlined ">person_add</i></a></li>
                <li><a>مشارکت در کسب و کار<i class="material-icons-outlined ">thumb_up</i></a></li>
                <li><a class="loginlink2">تماس با ما<i class="material-icons-outlined ">phone</i></a></li>
            </ul>
        </div>
        <div class="footer1_3">
            <div class="footer_logo"></div>
            <h5 style="color: #ed5314">ما را در شبکه اجتماعی دنبال کنید:</h5>
            <div class="footer1_3_img">
                <img src="shop/img/Twitter-2.png" alt="">
                <img src="shop/img/Layer-9.png" alt="">
                <img src="shop/img/Layer-8.png" alt="">
            </div>
        </div>
        <div class="footer_buten">
            <div class="footer_nav_top_link">
                <a href="#" class="a"><i
                        class="material-icons-outlined ">language</i>www.digitalmarket.com</a>
            </div>
            <p>تنها هدف ما جلب رضایت مشتری است</p>
        </div>
    </footer>
    <!--================javascript======================-->
    <script src="/shop/js\jquery.js"></script>
    <script src="/shop/js\bootstrap.min.js"></script>
    <script src="/shop/js\script.js"></script>
    <script src="/shop/js\owl.carousel.js"></script>
    <!--================javascript======================-->
    <!--===================footer============================-->
</body>

</html>
