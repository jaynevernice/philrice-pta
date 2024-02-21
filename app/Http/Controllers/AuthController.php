<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make('123456'));

        // para hindi bumalik sa login page kung talagang nakalog in na
        if(!empty(Auth::check())) {
            if(Auth::user()->user_type == 'super_admin') {
                return redirect('/super_admin/dashboard');
            } else if(Auth::user()->user_type == 'admin') {
                return redirect('/admin/dashboard');
            } else if (Auth::user()->user_type == 'encoder'){
                return redirect('/encoder/dashboard');
            } else if (Auth::user()->user_type == 'rcef_user'){
                return redirect('/rcef_user/dashboard');
            }     
        }

        return view('login');
    }

    public function AuthLogin(Request $request)
    {
        // dd($request->all());

        // $remember = !empty($request->remember) ? true : false;

        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->user_type == 'super_admin') {
                return redirect('/super_admin/dashboard');
            } else if(Auth::user()->user_type == 'admin') {
                return redirect('/admin/dashboard');
            } else if (Auth::user()->user_type == 'encoder'){
                return redirect('/encoder/dashboard');
            } else if (Auth::user()->user_type == 'rcef_user'){
                return redirect('/rcef_user/dashboard');
            }             
        } else {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
        // return redirect(url(''));
    }
}
