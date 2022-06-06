@extends('shop.layout.index')
  
@section('css')
      <!--================css======================-->
    <link rel="stylesheet" href="/shop/css\bootstrap.css">
    <link rel="stylesheet" href="/shop/css\owl.carousel.min.css">
    <link rel="stylesheet" href="/shop/css\owl.theme.default.min.css">
    <link rel="stylesheet" href="shop/css/style.css">
    <link rel="stylesheet" href="/shop/css\mdia.css">
    <link rel="stylesheet" href="/shop/css\icon.css"> 
    <!--================css======================-->
@endsection
@section('content')
    

<section>
    <div class="section1">
        <div class="section1_1">
            <h4 style="direction: rtl">تخفیفات  ویژه</h4>
            <div class="owl-carousel owl-theme slide_toch3">
                @foreach ($productDiscount as $item)
                <ul>
                    <li>
                        <img src="{{$item->image}}" alt="">
                    </li>
                    <li>
                        <p>{{$item->name}}</p>
                    </li>
                    <li>
                        <p>{{$item->description}}</p>
                    </li>
                    <li>
                        <span class="price2">{{$item->price}}$</span>
                    </li>
                    <li>
                        <a href="{{ route('bypage', ['id'=>$item->id]) }}"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                    </li>
                    @if ($item->discount!=0)
                    <li>
                        <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p>{{$item->discount}}%</p></div>
                    </li>
                @endif
                </ul>
                @endforeach
            </div>
        </div>
    </div>

    <div class="slide1">
        <div class="slide_next1">&lang;</div>
        @foreach ($slider as $item)
            <img src="{{$item->image}}"  class="slid_img">
        @endforeach
        <div class="slide_prev1">&lang;</div>
    </div>
    <div class="section2">
        <div class="section2_1">
            <h4 style="direction: rtl">پر فروش های هفته</h4>
            
            <div class="owl-carousel owl-theme slide_toch2">
                @foreach ($productByed as $item)  
                <ul>
                    <li>
                        <img src="{{$item->image}}" alt="">
                    </li>
                    <li>
                        <p>{{$item->name}}</p>
                    </li>
                    <li dir="rtl">
                        <p>{{$item->description}}</p>
                    </li>
                    <li>
                        <span class="price2">{{$item->price}}$</span>
                    </li>
                    <li>
                        <a href="{{ route('bypage', ['id'=>$item->id]) }}"><div class="section4_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                    </li>
                    @if ($item->discount!=0)
                    <li>
                        <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p>{{$item->discount}}%</p></div>
                    </li>
                @endif
                </ul>
                @endforeach

            </div>
        </div>
        <div class="section2_2">
			<div class="section2_2_img1"></div>
            <div class="section2_2_img2"></div>
        </div>
    </div>
    <div class="section3">
        <img src="shop/img/ads5.png" alt="">
        <img src="shop/img/ads6.png" alt="">
        <img src="shop/img/ads7.png" alt="">
        <img src="shop/img/ads8.png" alt="">
    </div>
    <div class="section_4">
        <h4 style="direction: rtl">پر بازدید ترین کالا ها</h4>
        <div class="owl-carousel owl-theme slide_toch3">
            @foreach ($producViseted as $item)  
            <ul>
                <li>
                    <img src="{{$item->image}}" alt="">
                </li>
                <li>
                    <p>{{$item->name}}</p>
                </li>
                <li dir="rtl">
                    <p>{{$item->description}}</p>
                </li>
                <li>
                    <span class="price2">{{$item->price}}$</span>
                </li>
                <li>
                    <a href="{{ route('bypage', ['id'=>$item->id]) }}"><div class="section4_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                </li>
                @if ($item->discount!=0)
                    <li>
                        <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p>{{$item->discount}}%</p></div>
                    </li>
                @endif
            </ul>
            @endforeach
        </div>
    </div>
    <div class="svg">
        <div>
            <img src="shop/img/serv3.png" alt="">
            <p>ضمانت اصل بودن کالا</p>       
         </div>
         <div>
            <img src="shop/img/serv1.png" alt="">
            <p> هفت روز صمانت بازگشت  </p>
        </div>
        <div>
            <img src="shop/img/serv2.png" alt="">
            <p>پرداخت درب منزل</p>        
        </div>
        <div>
            <img src="shop/img/serv4.png" alt="">
            <p>پشتیبانی همه روزه </p>        
        </div>
    </div>
    <div class="section_5">
        <h4 style="direction: rtl">برند های برتر</h4>
        <div class="owl-carousel owl-theme slide_toch4">
            <div class="slide_toch3_img1"></div>

            <div class="slide_toch3_img2"></div>

            <div class="slide_toch3_img3"></div>

            <div class="slide_toch3_img4"></div>

            <div class="slide_toch3_img5"></div>
        </div>
    </div>
</section>
@endsection
