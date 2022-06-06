<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function login(Request $req)
    {
        $inpute = $req->only('email', 'password');
        $user = User::where('email', $inpute['email'])->where('password', $inpute['password'])->first();
        if ($user) {
            session(['User' => ['id' => $user->id, 'username' => $user->username, 'email' => $user->email, 'password' => $user->password, 'image' => $user->image,'box_product_id'=>$user->box_product_id]]);
            return 1;
        } else {
            return 0;
        }
    }
    public function logout()
    {
        session()->forget('User');
        return redirect()->back();
    }


    public function RegesterUser(Request $request)

    {
        return view('shop.user.regester');
    }



    public function store(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required",
            'password' => "required",
            'phon' => "required|numeric",
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('/shop/img');
                $file->move($location, $filename);
            }
            $image = "/shop/img/" . $filename;
            session(["dateUser"=>[
                'username' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phon' => $request->phon,
                'image'=>$image,
            ]]);
            session(["code"=>123]);
            return view('shop.user.verify');    
        }
    }


    public function verify(Request $request)
    {
       $code =  $request->code;
       if ($code == session()->get('code')) {
           User::create(session()->get('dateUser'));
           session()->forget("code");
           session(['User'=>session()->get('dateUser')]);
           session()->forget("dateUser");
           return 1;
       } else {
           return 0;
       }
       
    }
}
