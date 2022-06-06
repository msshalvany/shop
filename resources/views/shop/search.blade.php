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
  
    </style>
@endsection
   
 
@section('content')
<div>
{{-- {{$product->appends(request()->input())->links();}} --}}
</div>
@if ($product->hasPages())
<ul class="pagination pagination" style="display: flex">
    {{-- Previous Page Link --}}
    @if ($product->onFirstPage())
        <li class="disabled"><span>«</span></li>
    @else
        <li><a href="{{ $product->appends(request()->input())->previousPageUrl() }}" rel="prev">«</a></li>
    @endif

    @if($product->currentPage() > 3)
        <li class="hidden-xs"><a href="{{ $product->appends(request()->input())->url(1) }}">1</a></li>
    @endif
    @if($product->currentPage() > 4)
        <li><span>...</span></li>
    @endif
    @foreach(range(1, $product->lastPage()) as $i)
        @if($i >= $product->currentPage() - 2 && $i <= $product->currentPage() + 2)
            @if ($i == $product->currentPage())
                <li class="active"><span>{{ $i }}</span></li>
            @else
                <li><a href="{{ $product->appends(request()->input())->url($i) }}">{{ $i }}</a></li>
            @endif
        @endif
    @endforeach
    @if($product->currentPage() < $product->lastPage() - 3)
        <li><span>...</span></li>
    @endif
    @if($product->currentPage() < $product->lastPage() - 2)
        <li class="hidden-xs"><a href="{{ $product->url($product->lastPage()) }}">{{ $product->lastPage() }}</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($product->hasMorePages())
        <li><a href="{{ $product->appends(request()->input())->nextPageUrl() }}" rel="next">»</a></li>
    @else
        <li class="disabled"><span>»</span></li>
    @endif
</ul>
@endif
    <div class="section_grop">
      <div class="section_grop1" style="width: 100%;">
        <div class="tab-content">
           @if (count($product)==0)
               <h2 style="margin: 20px 50px;display: inline-block">موردی سافت نشد</h2>
           @endif
          <div role="tabpanel" class="tab-pane fade active show" id="a">
            <ul>
                 @foreach ($product as $item)
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
    </div>
@endsection