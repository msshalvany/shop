<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProduct = Product::orderBy('created_at','desc')->paginate(4);
        return view('admin.products.index', ['product' => $allProduct]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'count' => 'required|numeric',
            'discount'=>'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = public_path('/shop/img');
            $file->move($location, $filename);
        }
        $image = "/shop/img/" . $filename;
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'count'=>$request->count,
            'discount'=>$request->discount,
            'image' => $image,
            'attrbute'=>$request->attrbute
        ]);
        return redirect()->route('Product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $attr = json_decode($product->attrbute);
        return view('admin.products.show',['product'=>$product,'attrbute'=>$attr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Product = Product::find($id);
        $attr = $Product->attrbute;
        return view('admin.products.edit', ['product' => $Product,'attrbute'=>$attr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'count' => 'required|numeric',
            'discount'=>'required|numeric'
        ]);
        $image=null;
        if ($request->file('image')!=null) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $previmage = Product::find($id)->image;
            $previmage = substr($previmage, 1);
            File::delete($previmage);
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = public_path('/shop/img');
            $file->move($location, $filename);
            $image = "/shop/img/" . $filename;
        } else {
            $filename = Product::find($id);
            $filename = $filename->image;
            $image = $filename;
        }
    
        Product::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image,
            'count'=>$request->count,
            'discount'=>$request->discount,
            'attrbute' => $request->attrbute
        ]);
        return redirect()->route('Product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Product::find($id)->image;
        $image = substr($image, 1);
        File::delete($image);
        Product::where('id', $id)->delete();
        return redirect()->route('Product.index');
    }
    public function byedList()
    {
        $product = DB::table('product_byed')->paginate(8);
        return view('admin.products.byed',['product'=>$product]);
    }
    public function search(Request $request)
    {
        $product =Product::where('name','like', '%'. $request->search.'%')->orWhere('description','like', '%'. $request->search.'%')->paginate(8);
        if ($request->search=='') {
            return redirect()->back();
        }
        return view('shop.search',['product'=>$product]);
    }
    public function category($category)
    {
        $categoryNumber=0;
        switch ($category) {
            case 'mobile':
                $categoryNumber=1;
            break;
            case 'computer':
                $categoryNumber=2;
            break;
            case 'homeApp':
                $categoryNumber=3;
            break;
            case 'asidApp':
                $categoryNumber=4;
            break;
            case 'game':
                $categoryNumber=5;
            break;
        }
        $productDis = Product::where('category',$category)->orderBy('discount','desc')->where('discount','!=','0')->paginate(9);
        $productExpi= Product::where('category',$category)->orderBy('price','desc')->paginate(9);
        $productChi= Product::where('category',$category)->orderBy('price')->paginate(9);
        $productBy= Product::where('category',$category)->orderBy('byed','desc')->paginate(9);
        return view('shop.category',['categoryNumber'=>$categoryNumber,'productDis'=>$productDis,'productExpi'=>$productExpi,'productBy'=>$productBy,'productChi'=>$productChi]);
    }
}
