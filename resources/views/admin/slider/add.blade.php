@extends('admin.layout.layout')
@section('content')
<h1 class="pageLables">افزودن منو جدید</h1>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <section class="panel">
            <header class="panel-heading">
                Basic Forms
            </header>
            <div class="panel-body">
                <form role="form" action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">price</label>
                        <input type="text" name="price" class="form-control" id="exampleInputPassword1" value="{{old('price')}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">discription</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1" value="{{old('description')}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">pic</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div>
                    <button style="margin-top: 12px;" type="submit" name="btn" class="btn btn-info">اضافه کردن</button>
                </form>
                @error('name')
                <div class="alert alert-danger">نام را صحیح وارد کنید</div>
                @enderror
                @error('price')
                <div class="alert alert-danger">قیمت را صحیح وارد کنید</div>
                @enderror
                @error('description')
                <div class="alert alert-danger">توضیحات را صحیح وارد کنید</div>
                @enderror
                @error('image')
                <div class="alert alert-danger">عکس را صحیح وارد کنید</div>
                @enderror
            </div>
        </section>
    </div>
</div>
@endsection