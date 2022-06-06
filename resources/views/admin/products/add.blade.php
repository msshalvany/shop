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
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">price</label>
                            <input type="text" name="price" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">discription</label>
                            <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">discount</label>
                            <input type="number" name="discount" class="form-control" max="100" min="0" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">تعداد</label>
                            <input type="number" name="count" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">pic</label>
                            <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                        </div>
                        <h3>مشخصات فنی</h3>
                        <div style="display: flex;justify-content: space-around;flex-wrap: wrap">
                            <label for="exampleInputPassword1">نام مشخصه</label>
                            <input type="text" id="key" class="form-control" id="exampleInputPassword1">
                            <label for="exampleInputPassword1">مقدار مشخصه</label>
                            <input type="text" id="val" class="form-control" id="exampleInputPassword1">
                            <input type="hidden" id="attrbute" name="attrbute">
                            <button onclick="crateTR(event)" style="margin-top: 12px;" type="submit" name="btn"
                                class="btn btn-info">اضافه مشخصه</button>
                            <script>
                                let arrayTable = {}
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
                                        trdel.addEventListener("click", function(){
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
                                    }
                                    arrayTable[key]=val
                                    document.getElementById('attrbute').value=JSON.stringify(arrayTable)
                                    console.log(document.getElementById('attrbute').value);
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

                            </tbody>
                        </table>
                        <button style="margin-top: 12px;" type="submit" name="btn" class="btn btn-info">اضافه
                            کردن</button>
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
