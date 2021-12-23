<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Cookie;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('login');
    }

    public function check_login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            ]);

            $admin=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
            if($admin>0){
                $adminData=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->get();
                session(['adminData'=>$adminData]);
    
                if($request->has('rememberme')){
                    Cookie::queue('adminuser',$request->username,1440);
                    Cookie::queue('adminpwd',$request->password,1440);
                }
                Session::flash('success','Login Successfully!');
                return redirect('admin');
            }else{
                Session::flash('error','Invalid Username/Password!!!');
                return redirect('admin/login');
            }
    }

    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
