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
        .button_add {
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

        .button_add:hover {
            background: #ed5314;
            color: #262626;
        }

    </style>
    <!--================css======================-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="login">
        <p>مشخصات خود را وراد کنید:</p><br>
        <form class="form-group form_login" action="<?php echo e(route('StoreUser')); ?>" enctype="multipart/form-data"
            method="POST">
            <?php echo csrf_field(); ?>
            <label>نام کاربری:</label>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control name" aria-label=""><br>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger">نام را صحیح وارد کنید</div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <label>ایمیل:</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control email" aria-label=""><br>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger">ایمسل را صحیح وارد کنید</div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <label>رمز عبور:</label>
            <input type="password" name="password" class="form-control password" aria-label=""><br>
            <label> تکرار رمز عبور:</label>
            <input type="password" name="password2" class="form-control password2" aria-label=""><br>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger">شماره را صحیح وارد کنید</div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <p class="passwordER" style="display: none;margin:10px 45px 10px 0 "> رمز ها یکی نیست </p>
            <label>شماره تماس:</label><br>
            <input style="width: 50%" type="tel" name="phon" value="<?php echo e(old('phon')); ?>" aria-label="" class="form-control phon_number">
            <?php $__errorArgs = ['phon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger">رمز را صحیح وارد کنید</div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input type="file" id="file-1" name="image" class="inputfile inputfile-1"
                data-multiple-caption="{count} فایل انتخاب شد." style="display: none;" />
            <label for="file-1"><span>انتخاب فایل</span></label>
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger">فایل را صحیح وارد کنید</div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div style="display: flex;align-items: center">
                <input class="button_add" type="submit" value="ثبت نام">
                <input type="button" class="button_cancel" value="cancel">
                <p class="login_erore" style="display: none;margin-top: 20px">لطفا فرم را کامل پر کنید</p>
            </div>
            <script>
                $('.button_add').click(function(e) {
                    if ($('.login .password').val() != $('.login .password2').val()) {
                        e.preventDefault();
                        $('.passwordER').fadeIn();
                        setTimeout(() => {
                            $('.passwordER').fadeOut();
                        }, 1700);
                    }
                });
                $('.button_cancel').click(function(e) {
                    location.href='/'
                });
            </script>
        </form>
    </div>    
<?php $__env->stopSection(); ?>
<?php if(session('status')): ?>
    <script>alert('شما قبلا ثبن نام کرده اید')</script>
<?php endif; ?>
<?php echo $__env->make('shop.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/madhi/Documents/shop/resources/views/shop/user/regester.blade.php ENDPATH**/ ?>