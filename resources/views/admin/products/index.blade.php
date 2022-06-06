
@extends('admin.layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                لیست منو های اصلی وب سایت
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <td>نام محصول</td>
                        <td>قیمت محصول</td>
                        <td>توضیحات</td>
                        <td>عکس محصول</td>
                        <td>مشاهده محصول</td>
                        <td>ویرایش</td>
                        <td>حذف</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($product->hasPages())
                    <ul class="pagination pagination" style="display: flex">
                        {{-- Previous Page Link --}}
                        @if ($product->onFirstPage())
                            <li class="disabled"><span>«</span></li>
                        @else
                            <li><a href="{{ $product->previousPageUrl() }}" rel="prev">«</a></li>
                        @endif
                
                        @if($product->currentPage() > 3)
                            <li class="hidden-xs"><a href="{{ $product->url(1) }}">1</a></li>
                        @endif
                        @if($product->currentPage() > 4)
                            <li><span>...</span></li>
                        @endif
                        @foreach(range(1, $product->lastPage()) as $i)
                            @if($i >= $product->currentPage() - 2 && $i <= $product->currentPage() + 2)
                                @if ($i == $product->currentPage())
                                    <li class="active"><span>{{ $i }}</span></li>
                                @else
                                    <li><a href="{{ $product->url($i) }}">{{ $i }}</a></li>
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
                            <li><a href="{{ $product->nextPageUrl() }}" rel="next">»</a></li>
                        @else
                            <li class="disabled"><span>»</span></li>
                        @endif
                    </ul>
                @endif
                    @foreach ($product as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->description}}</td>
                            <td><img style="width: 100px;height: 100px;" src="{{$item->image}}" alt=""></td>
                            <td>
                                <form action="{{ route('Product.show', ['Product'=>$item->id ]) }}">
                                    <button class="btn btn-danger btn-xs">مشاهده محصول</button>
                                </form>
                            </td>
                            <form action="{{ route('Product.edit', ['Product'=>$item->id])}}" method="GET">
                                <td><button class="btn btn-primary btn-xs"><i class="icon-pencil "></i></button></td>
                            </form>
                            <form action="{{ route('Product.destroy', ['Product'=>$item->id])}}" method="POST">
                                @csrf       
                                @method('DELETE')
                                <td><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></td>
                            </form>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection