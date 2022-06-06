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
                 <form role="form" action="{{ route('Product.update', ['Product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                     <div class="form-group">
                         <label for="exampleInputPassword1">name</label>
                         <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{$product->name}}" required>
                     </div>

                     <div class="form-group">
                         <label for="exampleInputPassword1">price</label>
                         <input type="text" name="price" class="form-control" id="exampleInputPassword1" value="{{$product->price}}" required>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">dedcrption</label>
                         <input type="text" name="description" class="form-control" id="exampleInputPassword1" value="{{$product->description }}" required>
                     </div>
                     <div class="mb-3">
                        <label for="formFile" class="form-label">image</label>
                        <input class="form-control" name="image" type="file" id="formFile" value="{{$product->image}}">
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