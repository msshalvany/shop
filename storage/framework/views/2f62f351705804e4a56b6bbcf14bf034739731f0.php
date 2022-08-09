<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/shop/css\bootstrap.css" />
    <link rel="stylesheet" href="/shop/css\owl.carousel.min.css" />
    <link rel="stylesheet" href="/shop/css\owl.theme.default.min.css" />
    <link rel="stylesheet" href="/shop/css/style.css" />
    <link rel="stylesheet" href="/shop/css/style_by.css" />
    <link rel="stylesheet" href="/shop/css/mdia.css" />
    <link rel="stylesheet" href="/shop/css/mdia_by.css" />
    <link rel="stylesheet" href="/shop/css/icon.css" />
    <style>


        .login {
            width: 90%;
            direction: rtl;
            padding: 40px;
            margin: 20px auto;
            background: #262626;
            color: #ed5314;
        }

        .login input {
            padding: 4px;
        }

        .login input[type="text"],
        input[type="email"] {
            width: 65%;
        }

        .login button,
        input[type="button"],
        .button_add,.button_send_code {
            width: 100px;
            height: 35px;
            background: #262626;
            color: #ed5314;
            border: 2px solid #ed5314;
            cursor: pointer;
            margin: 26px 32px 0px 0px;
            transition: all 0.4s;
        }

        .login button,
        input[type="button"]:hover {
            background: #ed5314;
            color: #262626;
        }

        .button_add:hover,.button_send_code:hover{
            background: #ed5314;
            color: #262626;
        }

    </style>
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
    <div class="login">
        <form class="form-group form_login" action="<?php echo e(route('StoreUser')); ?>" enctype="multipart/form-data"
            method="POST">
            <?php echo csrf_field(); ?>
            <label>ایمیل خود را وارد کنید :</label>
            <input type="email" name="email" id="email" class="form-control code"  aria-label=""><br>
            <p style="display: none;color: #ed5314" class="erore">ایمیل موجوذ نیست</p>
            <input class="button_add" type="submit" value="send">
            <input type="button" class="button_cancel" value="cancel">
        </form>
             <form style="display: none" class="form-group form_login_codepass" action="<?php echo e(route('verifypass')); ?>" enctype="multipart/form-data"
                method="POST">
                <?php echo csrf_field(); ?>
                <label>کد به ایمیل ارسال شده را وارد کنید :</label>
                <input type="text" name="code" id="codepass" class="form-control code"  aria-label=""><br>
                <p style="display: none;color: #ed5314" class="erore-codepass"> اشتباه است</p>
                <input class="button_send_code" type="submit" value="ثبت نام">
                <input type="button" class="button_cancel" value="cancel">
            </form>
    </div>
    <script>
         $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
         });
        $('.button_add').click(function (e) { 
            e.preventDefault();
            $.ajax({
            type: "post",
            url: "<?php echo e(route('sendresetpass')); ?>",
            data: {email:$('#email').val()},
            success: function (response) {
               if (response==0) {
                $('.erore').fadeIn();
                setTimeout(() => {
                    $('.erore').fadeOut();
                }, 2000);
               }else{
                    $('.form_login').fadeOut();
                    $('.form_login_codepass').fadeIn();
               }
            }
        });
        });
        $('.button_send_code').click(function (e) { 
                e.preventDefault();
                $.ajax({
                type: "post",
                url: "<?php echo e(route('verifypass')); ?>",
                data: {codepass:$('#codepass').val()},
                success: function (response) {
                if (response==0) {
                  alert('کد اشتباه است')
                }else{
                    window.location.replace('/changpass')
                }
                }
            });
            });
    </script>
          
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/madhi/Documents/shop/resources/views/shop/user/resetpassword.blade.php ENDPATH**/ ?>