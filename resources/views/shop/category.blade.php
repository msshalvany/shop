@extends('shop.layout.index')
  
@section('css')
<link rel="stylesheet" href="shop/css\bootstrap.css" />
<link rel="stylesheet" href="shop/css\owl.carousel.min.css" />
<link rel="stylesheet" href="shop/css\owl.theme.default.min.css" />
<link rel="stylesheet" href="shop/css\style.css" />
<link rel="stylesheet" href="shop/css\mdia.css" />
<link rel="stylesheet" href="shop/css\styl_grop.css" />
<link rel="stylesheet" href="shop/css\mdia_grop.css" />
<link rel="stylesheet" href="shop/css\icon.css" />
<style>
    .pagination {
        display: flex;
        width: 40%;
        justify-content: space-around;
        margin: 32px auto;
    }
    .pagination li {
        padding: 12px 20px;
    }
    .pagination li.active {
        background-color: #ed5314;
        border-radius: 10%;
       cursor: pointer;
    }
    .pagination li:nth-child(1), .pagination li:nth-last-child(1){
        background-color: #ed5314;
        border-radius: 50%;
        cursor: pointer;
    }
   .header_nav_botten1 li:nth-child({{$categoryNumber}}) {
      box-shadow: #ed5314 0px 0px 10px inset;
      border-radius: 30%;
      cursor: pointer;

   }
</style>
<!--================css======================-->
@endsection

@section('content')
@if ($productDis->hasPages())
<ul class="pagination pagination" style="display: flex">
    {{-- Previous Page Link --}}
    @if ($productDis->onFirstPage())
        <li class="disabled"><span>«</span></li>
    @else
        <li><a href="{{ $productDis->previousPageUrl() }}" rel="prev">«</a></li>
    @endif

    @if($productDis->currentPage() > 3)
        <li class="hidden-xs"><a href="{{ $productDis->url(1) }}">1</a></li>
    @endif
    @if($productDis->currentPage() > 4)
        <li><span>...</span></li>
    @endif
    @foreach(range(1, $productDis->lastPage()) as $i)
        @if($i >= $productDis->currentPage() - 2 && $i <= $productDis->currentPage() + 2)
            @if ($i == $productDis->currentPage())
                <li class="active"><span>{{ $i }}</span></li>
            @else
                <li><a href="{{ $productDis->url($i) }}">{{ $i }}</a></li>
            @endif
        @endif
    @endforeach
    @if($productDis->currentPage() < $productDis->lastPage() - 3)
        <li><span>...</span></li>
    @endif
    @if($productDis->currentPage() < $productDis->lastPage() - 2)
        <li class="hidden-xs"><a href="{{ $productDis->url($productDis->lastPage()) }}">{{ $productDis->lastPage() }}</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($productDis->hasMorePages())
        <li><a href="{{ $productDis->nextPageUrl() }}" rel="next">»</a></li>
    @else
        <li class="disabled"><span>»</span></li>
    @endif
</ul>
@endif
<div class="section_grop">
    <div class="section_grop1">
      <div class="grop_dasta">
        <p>دسته بندی بر اساس :</p>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="#a" class="nav-link active" role="tab" data-toggle="tab">گران ترین</a
            >
          </li>
          <li class="nav-item">
            <a href="#b" class="nav-link" data-toggle="tab">پرفروش ها</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#c" class="nav-link" data-toggle="tab">ارزان ترین</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#d" class="nav-link" data-toggle="tab">تخفیفات</a>
          </li>
        </ul>
      </div>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade active show" id="a">
            <ul>
                @foreach ($productExpi as $item)
                  <li>
                      <img class="pic_tag" src="{{$item->image}}">
                      <p>{{$item->description}}</p>
                      <a href="{{ route('bypage', ['id'=>$item->id]) }}"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price">{{$item->price}}$</span>
                      @if ($item->discount!=0)
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p>{{$item->discount}}%</p></div>
                      @endif
                   </li>
               @endforeach
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="b">
            <ul>
                @foreach ($productBy as $item)
                  <li>
                      <img class="pic_tag" src="{{$item->image}}">
                      <p>{{$item->description}}</p>
                      <a href="{{ route('bypage', ['id'=>$item->id]) }}"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price">{{$item->price}}$</span>
                      @if ($item->discount!=0)
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p>{{$item->discount}}%</p></div>
                      @endif
                   </li>
               @endforeach
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="c">
            <ul>
                @foreach ($productChi as $item)
                  <li>
                      <img class="pic_tag" src="{{$item->image}}">
                      <p>{{$item->description}}</p>
                      <a href="{{ route('bypage', ['id'=>$item->id]) }}"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price">{{$item->price}}$</span>
                      @if ($item->discount!=0)
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p>{{$item->discount}}%</p></div>
                      @endif
                   </li>
               @endforeach
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="d">
            <ul>
                @foreach ($productDis as $item)
                  <li>
                      <img class="pic_tag" src="{{$item->image}}">
                      <p>{{$item->description}}</p>
                      <a href="{{ route('bypage', ['id'=>$item->id]) }}"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price">{{$item->price}}$</span>
                      @if ($item->discount!=0)
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p>{{$item->discount}}%</p></div>
                      @endif
                   </li>
               @endforeach
            </ul>
        </div>
      </div>
    </div>

    <div class="section_grop2">
      <div class="section_grop2_1">
        <form>
        <p>جست و جو در نتایج :</p>
        <div class="grop_search">
          <input
            aria-label=""
            type="search"
            class="grop_search1"
            placeholder="نام کالا را وارد کنید......"
          />
          <div class="grop_search2">
            <i class="material-icons-outlined">search</i>
          </div>
        </div>
      </form>
      </div>
      <div class="section_grop2_2">
        <form action="">
        <label class="position-relative">
          <div>فقط موجودی ها:</div>
          <input type="checkbox" class="ios-switch" />
          <div>
            <div></div>
          </div>
        </label>
        <label class="position-relative">
          <div>فقط دارای تخفیف:</div>
          <input type="checkbox" class="ios-switch" />
          <div>
            <div></div>
          </div>
        </label>
        <br />
        <br />
        <label for="">نامه برند:</label>
        <select class="form-control" name="" id="">
          <option>همه</option>
          <option>اسیا تک</option>
          <option>پارس خزر</option>
          <option>ایران123</option>
        </select>
      </form>
        <div class="svg2">
          <div>
            <img src="shop/img/serv2.png" alt="" />
            <p>پرداخت درب منزل</p>
          </div>
          <div>
            <img src="shop/img/serv3.png" alt="" />
            <p>ضمانت اصل بودن کالا</p>
          </div>
          <div>
            <img src="shop/img/serv1.png" alt="" />
            <p>هفت روز صمانت بازگشت</p>
          </div>
          <div>
            <img src="shop/img/serv4.png" alt="" />
            <p>پشتیبانی همه روزه</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="svg">
    <div>
      <img src="img/serv3.png" alt="" />
      <p>ضمانت اصل بودن کالا</p>
    </div>
    <div>
      <img src="img/serv1.png" alt="" />
      <p>هفت روز صمانت بازگشت</p>
    </div>
    <div>
      <img src="img/serv2.png" alt="" />
      <p>پرداخت درب منزل</p>
    </div>
    <div>
      <img src="img/serv4.png" alt="" />
      <p>پشتیبانی همه روزه</p>
    </div>
  </div>
@endsection