<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--================css======================-->
    <?php echo $__env->yieldContent('css'); ?>
    <script src="/shop/js\jquery.js"></script>
    <!--================css======================-->
    <title>digital market</title>
</head>

<body>
    <!--===================head============================-->
    <header>
        <?php
        if (session()->get('User')) {
            $box_product =json_decode(session()->get('User')->box_product_id);
        }
        ?>
        <?php if(session()->get('User')): ?>
            
      
        <div class="box_shop">
            <div class="cancel_shop_bax">&bigotimes;</div>
           <?php $__currentLoopData = $box_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <ul class="list-box">
                    <li><?php echo e($item->name); ?></li>
                    <li><img width="120px" height='120px' src="<?php echo e($item->image); ?>" alt=""></li>
                    <li><button id="<?php echo e($item->id); ?>" class="del-pro-box">حدف</button></li>
               </ul>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php if(empty($box_product)): ?>
              <div style="margin: 28px 40px 0 0"> موردی سافت نشد</div>
           <?php endif; ?>
           <script>
                $('.del-pro-box').click(function (e) { 
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('del_pro_box')); ?>",
                        data: {
                            user:<?php echo e(session()->get('User')->id); ?>,
                            pro:e.target.id
                        },
                        success: function (response) {
                           $(`#${e.target.id}`).parent().parent().fadeOut();
                        }
                    });
                });
           </script>
        </div>
        <?php endif; ?>
        <div style="height: 325px" class="login2" id="login2">
            <form method="POST" action="<?php echo e(route('LoginUser')); ?>">
                <?php echo csrf_field(); ?>
                <label>ایمیل:</label>
                <input name="email" style="width: 90%;" type="email" class="form-control email email_log"
                    aria-label=""><br>
                <label>رمز:</label>
                <input name="password" style="width: 70%;" type="password" class="form-control email pass_log"
                    aria-label=""><br>
                <input type="submit" class="button_login2" value="ارسال نظر">
                <input type="button" class="button_login2-2" value="cancel">
                <p style="display: none" class="login_su">با موفقیت وارد شدید</p>
                <p style="display: none" class="login_er">ایمیل یا رمز عبور صحیح نیست</p>
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
                            url: "<?php echo e(route('LoginUser')); ?>",
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

        
        </div>
        <div class="mask"></div>
        <div class="header_nav_top">
            <div class="header_navbar_top">
                <ul>
                    <li><a  href="<?php echo e(route('RegesterUser')); ?>" class="loginlink">ثبت نام و عضویت<i class="material-icons-outlined ">person_add</i></a>
                    </li>
                    <?php if(!session()->get('User')): ?>
                        <li><a id="loginlink2" class="loginlink2"> ورود به حساب کاربری <i class="material-icons-outlined ">account_circle</i></a></li>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('logoutUser')); ?>">
                            <?php echo csrf_field(); ?>
                            <li><button style="background-color: transparent;color: white;border: none;" class="">خروج از حساب<i class="material-icons-outlined ">account_circle</i></button></li>
                        </form>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="header_nav_top_link">
                <a href="/" class="a"><i class="material-icons-outlined ">language</i>www.digitalmarket.com</a>
            </div>
        </div>

        <div class="header_section">
            <div class="header_section_right">
                <div class="header_by">
                    <?php if(session()->get('User')): ?>
                        <div class="header_by1">2</div>
                        <div class="header_by2">سبد خرید<i class="material-icons-outlined">shopping_cart</i></div>
                    <?php endif; ?>
                    <div class="add loginlink"><a href="<?php echo e(route('RegesterUser')); ?>"> ثبت نام و عضویت</a><i style="vertical-align: -8px; margin-right: 6px;"
                            class="material-icons-outlined ">person_add</i></div>
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
                <li><a href="<?php echo e(route('category', ['category' => 'mobile'])); ?>">موبایل و تبلت</a></li>
                <li><a href="<?php echo e(route('category', ['category' => 'computer'])); ?>">لپ تاپ و کامپیوتر</a></li>
                <li><a href="<?php echo e(route('category', ['category' => 'homeApp'])); ?>">لوازم خانگی</a></li>
                <li><a href="<?php echo e(route('category', ['category' => 'asidApp'])); ?>">لوازم جانبی</a></li>
                <li><a href="<?php echo e(route('category', ['category' => 'game'])); ?>">کنسول بازی و سرگرمی</a></li>
            </ul>
            <i class="material-icons-outlined header_nav_botten2_btn">book</i>
            <div class="header_nav_botten2">
                <ul>
                    <li><a href="<?php echo e(route('category', ['category' => 'mobile'])); ?>">موبایل و تبلت</a></li>
                    <li><a href="<?php echo e(route('category', ['category' => 'computer'])); ?>">لپ تاپ و کامپیوتر</a></li>
                    <li><a href="<?php echo e(route('category', ['category' => 'homeApp'])); ?>">لوازم خانگی</a></li>
                    <li><a href="<?php echo e(route('category', ['category' => 'asidApp'])); ?>">لوازم جانبی</a></li>
                    <li><a href="<?php echo e(route('category', ['category' => 'game'])); ?>">کنسول بازی و سرگرمی</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!--===================head============================-->

    <!--===================section============================-->
    <?php echo $__env->yieldContent('content'); ?>
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
<?php /**PATH /home/madhi/Documents/shop/resources/views/shop/layout/index.blade.php ENDPATH**/ ?>