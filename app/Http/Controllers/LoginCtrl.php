<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginCtrl extends Controller
{
    public function __construct()
    {

    }

    public function login()
    {
        return view('login');
    }

    public function validateLogin(Request $request)
    {
        $login = User::where('username',$request->username)->first();
        if($login){
            if(Hash::check($request->password,$login->password)){
                Session::put('user',$login);
                Session::put('isLogin',true);
                return redirect('/');
            }else{
                return redirect()->back()->with('error',true);
            }
        }else{
            return redirect()->back()->with('error',true);
        }
    }
}
