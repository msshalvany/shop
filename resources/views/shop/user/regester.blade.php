@extends('shop.layout.index')

@section('css')
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
@endsection

@section('content')
    <div class="login">
        <p>مشخصات خود را وراد کنید:</p><br>
        <form class="form-group form_login" action="{{ route('StoreUser') }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <label>نام کاربری:</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control name" aria-label=""><br>
            @error('name')
                <div class="alert alert-danger">نام را صحیح وارد کنید</div>
            @enderror
            <label>ایمیل:</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control email" aria-label=""><br>
            @error('email')
                <div class="alert alert-danger">ایمسل را صحیح وارد کنید</div>
            @enderror
            <label>رمز عبور:</label>
            <input type="password" name="password" class="form-control password" aria-label=""><br>
            <label> تکرار رمز عبور:</label>
            <input type="password" name="password2" class="form-control password2" aria-label=""><br>
            @error('password')
                <div class="alert alert-danger">شماره را صحیح وارد کنید</div>
            @enderror
            <p class="passwordER" style="display: none;margin:10px 45px 10px 0 "> رمز ها یکی نیست </p>
            <label>شماره تماس:</label><br>
            <input style="width: 50%" type="tel" name="phon" value="{{old('phon')}}" aria-label="" class="form-control phon_number">
            @error('phon')
                <div class="alert alert-danger">رمز را صحیح وارد کنید</div>
            @enderror
            <input type="file" id="file-1" name="image" class="inputfile inputfile-1"
                data-multiple-caption="{count} فایل انتخاب شد." style="display: none;" />
            <label for="file-1"><span>انتخاب فایل</span></label>
            @error('image')
                <div class="alert alert-danger">فایل را صحیح وارد کنید</div>
            @enderror
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
@endsection
@if (session('status'))
    <script>alert('شما قبلا ثبن نام کرده اید')</script>
@endif