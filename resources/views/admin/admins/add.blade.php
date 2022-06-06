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
                    <form role="form" action="{{ route('admins.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputPassword1"
                                 required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                               required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                required>
                        </div>
    
                        <div class="form-group">
                            <label for="exampleInputPassword1">سطح دسترسی</label>
                            <select name="levele" id="">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">image</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                        <button type="submit" name="btn" class="btn btn-info">اعمال تغیرات</button>
                    </form>
                </div>
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
            </section>
        </div>
    </div>
@endsection
