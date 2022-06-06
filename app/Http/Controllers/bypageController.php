<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
           DB::table('product_byed')->insert([
               "naem"=>$request->name,
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
    }
}
