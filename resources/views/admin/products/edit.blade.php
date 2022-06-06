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
                     <div class="form-group">
                        <label for="exampleInputPassword1">تعداد</label>
                        <input type="number" name="count" class="form-control" id="exampleInputPassword1" value="{{$product->count}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">discount</label>
                        <input type="number" name="discount" class="form-control" max="100" min="0" value="{{$product->discount}}" id="exampleInputPassword1">
                    </div>
                     <div class="mb-3">
                        <label for="formFile" class="form-label">image</label>
                        <input class="form-control" name="image" type="file" id="formFile" value="{{$product->image}}">
                      </div>
                     <div style="display: flex;justify-content: space-around;flex-wrap: wrap">
                        <label for="exampleInputPassword1">نام مشخصه</label>
                        <input type="text" id="key" class="form-control" id="exampleInputPassword1">
                        <label for="exampleInputPassword1">مقدار مشخصه</label>
                        <input type="text" id="val" class="form-control" id="exampleInputPassword1">
                        <input type="hidden" id="attrbute" name="attrbute" value="{{$attrbute}}">
                        <button onclick="crateTR(event)" style="margin-top: 12px;" type="submit" name="btn"
                            class="btn btn-info">اضافه مشخصه</button>
                        <script>
                            let arrayTable
                            if (document.getElementById('attrbute').value=='[]') {
                                arrayTable={}
                            }else{
                                arrayTable =JSON.parse(document.getElementById('attrbute').value)
                                
                            }
                            var crateTR = (e) => {
                                e.preventDefault()
                                var key = document.getElementById('key').value
                                var val = document.getElementById('val').value
                                if (key != '' && val != '') {
                                    let tr = document.createElement('tr');
                                    let trkey = document.createElement('td')
                                    let trval = document.createElement('td')
                                    let trdel = document.createElement('td')
                                    trkey.textContent = key
                                    trval.textContent = val
                                    trdel.textContent= 'delete'
                                    trdel.className= 'deleteTr'
                                    trdel.addEventListener("click", function deleteTr(){
                                        trdel.parentElement.remove()
                                        let target =  trdel.parentElement.childNodes[0].innerHTML;
                                        delete arrayTable[target]
                                    });
                                    document.getElementById('table').appendChild(tr)
                                    tr.appendChild(trkey)
                                    tr.appendChild(trval)
                                    tr.appendChild(trdel)
                                    document.getElementById('key').value = ''
                                    document.getElementById('val').value = ''
                                    arrayTable[key]=val
                                    document.getElementById('attrbute').value=JSON.stringify(arrayTable)
                                    console.log(document.getElementById('attrbute').value);
                                }
                               
                                
                            }
                        </script>
                    </div>
                     <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">نام مشخصه</th>
                                <th scope="col">مقدار مشخصه</th>
                                <th scope="col">حدف</th>
                            </tr>
                        </thead>
                        <tbody id="table">
                                @foreach (json_decode($attrbute) as $item=>$key)
                                <tr>
                                    <td>{{$item}}</td>
                                    <td>{{$key}}</td>
                                    <td onclick="let target=this.parentElement.childNodes[1].innerHTML;delete arrayTable[target]; this.parentElement.remove();document.getElementById('attrbute').value=JSON.stringify(arrayTable)" class="deleteTr">delete</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
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