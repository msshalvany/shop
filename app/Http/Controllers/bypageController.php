<?php

namespace App\Http\Controllers;

use App\Mail\verefy;
use App\Models\Product;
use App\Models\product_byed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class bypageController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $comment =  DB::table('comments')->where('peoduct_id',$id)->get();
        for ($i=0; $i < count($comment); $i++) { 
            $comment[$i]->user_id=User::find($comment[$i]->user_id);
        }
        Product::find($id)->increment('viseted');
        $attr = json_decode($product->attrbute);
        return view('shop.by',["product"=>$product,'comment'=>$comment,'attrbute'=>$attr]);
    }

    public function by(Request $request,$id)
    {
         $request->validate([
            'name' => 'required|max:55',
            'phon' => 'required|numeric',
            'address' => 'required|max:255',
         ]);
            product_byed::insert([
               "name"=>$request->name,
               "peoduct_id"=>$id,
               "phon"=>$request->phon,
               "address"=>$request->address,
               "city"=>$request->city
           ]);
            Product::find($id)->increment('byed');
            return redirect()->back()->with('byed',1);
    }
    public function idia($id,Request $request)
    {
        DB::table('comments')->insert([
            "peoduct_id"=>$id,
            'user_id'=>session()->get('User')['id'],
            "comment"=>$request->comment
        ]);
        $idiaArray = json_decode(Product::find($id)->idia);
        array_push($idiaArray,$request->idia);
        Product::find($id)->update([
            "idia"=>json_encode($idiaArray)
        ]);
        session('byed',true);
        return redirect()->back();
    }
    public function add_shop_box(Request $request){
        $user = User::find($request->user);
        $array =json_decode($user->box_product_id);
        array_push($array,$request->product);
        $array = json_encode($array);
        User::find($request->user)->update([
            'box_product_id'=>$array
        ]);
        $user = User::find($request->user);
        session(['User' => $user]);
    }
    public function bybox(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|max:55',
            'phon' => 'required|numeric',
            'address' => 'required|max:255',
         ]);
        $products = json_decode(User::find($request->id)->box_product_id);
        $productsid = [];
        foreach ($products as $item) {
            $productsid [] = $item->id;
        }
        foreach ($productsid as $item) {
            product_byed::insert([
                "name"=>$request->name,
                "peoduct_id"=>$item,
                "phon"=>$request->phon,
                "address"=>$request->address,
                "city"=>$request->city
            ]);
            Product::find($item)->increment('byed');
        }
        User::find($request->id)->update([
            'box_product_id'=> '[]'
        ]);
        return redirect()->back()->with('byed',1);
    }
}
