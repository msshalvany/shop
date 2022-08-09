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
        .boxall-cont{
            display: flex;
            justify-content: space-around;
            align-items: center
        }
        .section1{
            display: block;
        }
    </style>
    <!--================css======================-->
@endsection

@section('content')
    <section>
        <div class="section1">
            <table style="width: 100%">
                <thead>
                    <tr>
                    <td>نام محصول</td>
                    <td>قیمت محصول</td>
                    <td>عکس محصول</td>
                    <tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    <tr>
                      <td>{{$item->name}}</td>
                      <td>{{$item->price}}</td>
                      <td><img width="100px" height="100px" src="{{$item->image}}" alt=""></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          

           
        
          <div>
          <button class="main_by">سفارش مستقیم</button>
        </div>
        </div>
        <div class="svg">
            <div>
                <img src="/shop/img/serv3.png" alt="" />
                <p>ضمانت اصل بودن کالا</p>
            </div>
            <div>
                <img src="/shop/img/serv1.png" alt="" />
                <p>هفت روز صمانت بازگشت</p>
            </div>
            <div>
                <img src="/shop/img/serv2.png" alt="" />
                <p>پرداخت درب منزل</p>
            </div>
            <div>
                <img src="/shop/img/serv4.png" alt="" />
                <p>پشتیبانی همه روزه</p>
            </div>
        </div>
        <div class="by_section2">
            <h2>مشخصات خود را وراد کنید:</h2>
            <br />
            <form action="{{ route('bybox', ['id' =>session()->get('User')->id]) }}" class="form-group" method="POST">
                @csrf
                @method('put')
                <label>نام و نام خوانوادگی گیرنده:</label>
                <input type="text" name="name" class="name2 form-control" value="{{old('name')}}" aria-label="" /><br />
                <label>شهر محل سکونت:</label>
                <select name="city" aria-label="" class="form-control">
                    <option value="tehran">تهران</option>
                    <br />
                </select>
                <br />
                <label>ادرس محل سکونت</label>
                <br>
                <textarea name="address" style="margin: 0 0 12xx 0" class="form-control" value="{{old('address')}}"></textarea>
                <label> شماره تلفن</label>
                <input name="phon" style="width: 50%; margin-top: 16px" {{old('phon')}} type="tel" aria-label=""
                    class="form-control phon_number2" />
                <div class="button_form">
                    <button style="margin-top: 15px" class="button_add2">ارسال</button>
                    <button style="margin-top: 15px" onclick="event.preventDefault(false)" class="button_cancel2">
                        cancel
                    </button>
                    @error('name')
                        <p style="display: block" class="login_erore2">نام را صیحی وارد کنید</p>
                    @enderror
                    @error('phon')
                        <p style="display: block" class="login_erore2">شماره تلفن صحیح نمی باشد</p>
                    @enderror
                </div>
            </form>
        </div>
    @php
    if (session()->get('byed')) {
        echo '<script>
            alert(" برای تایید با شما تماس گرفته خواهد شد")
        </script>';
    }
    @endphp
    @error('phon')
        <script>
            $(".by_section2").fadeIn();
            var w = innerWidth;
            if (w >= 1000) {
                $("html,body").animate({
                    scrollTop: 950
                }, "2000");
            } else {
                $("html,body").animate({
                    scrollTop: 1380
                }, "2000");
            }
        </script>
    @enderror
@endsection
