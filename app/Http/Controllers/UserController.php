<?php

namespace App\Http\Controllers;

use App\Mail\verefy;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function login(Request $req)
    {
        $inpute = $req->only('email', 'password');
        $user = User::where('email', $inpute['email'])->where('password', $inpute['password'])->first();
        if ($user) {
            session(['User' => $user]);
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
        if (User::where('email',$request->email)->first()) {
             return redirect()->back()->with('status', 'Profile updated!');
        }
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
            $code = rand(1,9999);
            session(["code"=>$code]);
            Mail::to($request->email)->send(new verefy());
            return view('shop.user.verify');    
        }
    }


    public function verify(Request $request)
    {
       $code =  $request->code;
       if ($code == session()->get('code')) {
           User::create([
            'username' =>session()->get('dateUser')['username'],
            'email' => session()->get('dateUser')['email'],
            'password' => session()->get('dateUser')['password'],
            'phon' => session()->get('dateUser')['phon'],
            'image'=>session()->get('dateUser')['image'],
           ]);
           $user = User::where('email',session()->get('dateUser')['email'])->first();
           session(['User'=> $user]);
           session()->forget("code");
           session()->forget("dateUser");
           return 1;
       } else {
        return 0;
       }
       
    }
    public function get_pro_box(Request $request)
    {
        return User::find($request->id)->box_product_id;
    }
    public function resetassword()
    {
        return view('shop.user.resetpassword');
    }
    public function sendresetpass(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user) {
            $codepass =  rand(1,9999);
            session(["codepass"=>$codepass,'emailforchangpss'=>$request->email]);
            Mail::to($request->email)->send(new verefy());
            return 1;
        }else{
            return 0;
        }
    }
    public function verifypass(Request $request)
    {
        if (session()->get('codepass')==$request->codepass) {
            session(['changpasstr'=>1]);
            return 1;
        }else{
           return 0;
        }
    }
    public function changpass()
    {
        return view('shop.user.changpass');
    }
    public function passwordchang(Request $request)
    {
        User::where('email',session()->get('emailforchangpss'))->update([
            "password"=>$request->password,
        ]);
        session()->forget("emailforchangpss");
        session()->forget("codepass");
        session()->forget("changpasstr");
        return redirect('/');
    }
}
