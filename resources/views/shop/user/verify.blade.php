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
@endsection

    @section('content')
    <div class="login">
        <p>کد بیامک شده دا وارد کنید</p><br>
        <form class="form-group form_login" action="{{ route('StoreUser') }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <label>کد :</label>
            <input type="text" name="code" class="form-control code"  aria-label=""><br>
            <input class="button_add" type="submit" value="ثبت نام">
            <input type="button" class="button_cancel" value="cancel">
        </form>
        <script>
            $('.button_add').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "{{ route('verifyUser') }}",
                    data: {
                        code: $('.code').val()
                    },
                    success: function(response) {
                        if (response==1) {
                            alert("عملیات موفق")
                        } else {
                            alert("عملیات نا موفق دو باره امتحان کنید")
                        }
                    }
                });
            });
            $('.button_cancel').click(function(e) {
                    location.href='/'
                });
        </script>
    </div>    
@endsection
