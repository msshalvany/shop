<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\File;
class adminController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins =  admin::orderBy('created_at','desc')->get();
        return view('admin.admins.admin',['admins'=>$admins]);
    }
    public function logout()
    {
        session()->flush();
        return redirect('');
    }
    public function dashbord()
    {
       return view('admin.dashbord');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.add');
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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'levele' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = public_path('/shop/img');
            $file->move($location, $filename);
        }
        $image = "/shop/img/" . $filename;
        admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'levele' => $request->levele,
            'password'=>$request->password,
            'image' => $image,
        ]);
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = admin::find($id);
        return view('admin.admins.edit', ['admin' => $admin,]);
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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'levele' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image=null;
        if ($request->file('image')!=null) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $previmage = admin::find($id)->image;
            $previmage = substr($previmage, 1);
            File::delete($previmage);
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = public_path('/shop/img');
            $file->move($location, $filename);
            $image = "/shop/img/" . $filename;
        } else {
            $filename = admin::find($id);
            $filename = $filename->image;
            $image = $filename;
        }
        admin::find($id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $image,
            'levele'=>$request->levele,
        ]);
        return redirect()->action([adminController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = admin::find($id)->image;
        $image = substr($image, 1);
        File::delete($image);
        admin::where('id', $id)->delete();
        return redirect()->action([adminController::class,'index']);
    }
}
