<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function login(Request $req)
    {
        $inpute = $req->only('email', 'password');
        $user = admin::where('email', $inpute['email'])->where('password', $inpute['password'])->first();
        if ($user) {
            session(['Admin'=>[$user->username,'username'=>$user->username,'email'=>$user->email,'password'=> $user->password,'levele'=> $user->levele,'image'=> $user->image,]]);
            return redirect('admin/dashbord');
        }else{
            return redirect('admin/dashbord');
        }
    }
}
