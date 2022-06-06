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
                        <td>عکس بروفایل</td>
                        <td>نام</td>
                        <td>ایمیل</td>
                        <td>رمز</td>
                        <td>سطح دسترسی</td>
                        <td>حذف</td>
                        <td>ویرایش</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $item)
                        <tr>
                            <td><img style="width: 100px;height: 100px;" src="{{$item->image}}" alt=""></td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->password}}</td>
                            <td>{{$item->levele}}</td>
                            <form action="{{ route('admins.destroy', ['admin'=>$item->id])}}" method="POST">
                                @csrf       
                                @method('DELETE')
                                <td><button class="btn btn-danger btn-xs"><i class="icon-pencil "></i></button></td>
                            </form>
                            <form action="{{ route('admins.edit', ['admin'=>$item->id])}}" method="GET">
                                @csrf       
                                <td><button class="btn btn-primary btn-xs"><i class="icon-pencil "></i></button></td>
                            </form>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection
