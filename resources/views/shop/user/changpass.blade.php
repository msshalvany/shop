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
@endsection

    @section('content')
    <div class="login">
        <form class="form-group form_login" action="{{ route('passwordchang') }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <label>  رمز خود را وارد کنید :</label>
            <input type="password" name="password" id="password" class="form-control"  aria-label=""><br>
            <label>   رمز را تکرار کنید:</label>
            <input type="password" name="password2" id="password2" class="form-control"  aria-label=""><br>
            <p style="color: #ed5314;display: none" class="eroer">رمز ها یکی نیست</p>
            <input class="button_add" type="submit" value="send">
            <input type="button" class="button_cancel" value="cancel">
        </form>
    </div>
    <script>
        $('.button_add').click(function (e) { 
            if ($('#password').val()!=$('#password2').val()) {
                e.preventDefault();
                $('.eroer').fadeIn();
            }else{
                alert('عملیات موفق')
            }
        });
    </script>
@endsection
