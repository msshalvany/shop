
@extends('admin.layout.layout')
@section('content')
<img style="margin: 0 auto;display: block;" src="{{$product->image}}" alt="">
<table class="table">
    <thead>
      <tr>
        <th scope="col">نام</th>
        <th scope="col">تخفیف</th>
        <th scope="col">قسمت</th>
        <th scope="col">تپوضیحات</th>
        <th scope="col">تعداد</th>
        <th scope="col">بازدید</th>
        <th scope="col">خریداری شده</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">{{$product->name}}</td>
        <td>{{$product->discount}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
        <td scope="row">{{$product->count}}</td>
        <td>{{$product->viseted}}</td>
        <td>{{$product->byed}}</td>
      </tr>
    </tbody>
  </table>
  <h2>مشخصات فنی کالا</h2>
  <table class="table">
    <thead>
        <tr>
            <th scope="col">نام مشخصه</th>
            <th scope="col">مقدار مشخصه</th>
        </tr>
    </thead>
    <tbody id="table">
            @foreach ($attrbute as $item=>$key)
            <tr>
                <td>{{$item}}</td>
                <td>{{$key}}</td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection