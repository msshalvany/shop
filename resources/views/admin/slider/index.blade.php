
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
                        <td>عکس اسلاید</td>
                        <td>حذف</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slide as $item)
                        <tr>
                            <td><img style="width: 100px;height: 100px;" src="{{$item->image}}" alt=""></td>
                            <form action="{{ route('slider.destroy', ['slider'=>$item->id])}}" method="POST">
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
</div

<h1 class="pageLables">افزودن اسلاید جدید</h1>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <section class="panel">
            <header class="panel-heading">
                Basic Forms
            </header>
            <div class="panel-body">
                <form role="form" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">pic</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div>
                    <button style="margin-top: 12px;" type="submit" name="btn" class="btn btn-info">اضافه کردن</button>
                </form>
                @error('image')
                <div class="alert alert-danger">عکس را صحیح وارد کنید</div>
                @enderror
            </div>
        </section>
    </div>
</div>

@endsection
