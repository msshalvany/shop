<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/shop/css/bootstrap.css">
    <link rel="stylesheet" href="/shop/css/style.css">
    <script src="/shop/js\jquery.js"></script>
    <title>Document</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            background: #262626;
            padding: 10px;
            border: #ed5314 4px solid;
        }

        .login {
            direction: rtl;
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
</head>

<body>
    <div class="login">
        <p>کد بیامک شده دا وارد کنید</p><br>
        <form class="form-group form_login" action="{{ route('StoreUser') }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <label>کد :</label>
            <input type="text" name="code" class="form-control code" value="123" aria-label=""><br>
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
                            location.href='/'
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
</body>

</html>
