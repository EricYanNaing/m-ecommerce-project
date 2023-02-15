<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login(){
        \request()->validate([
           'email' => "required",
           'password' => "required",
        ]);

        $cre = \request()->only('email','password');
        if ((auth()->guard('admin')->attempt($cre))){
            return redirect('/admin')->with('success','Welcome Admin');
        };
        return redirect()->back()->with('error','Email & Password dont match');
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('/');
    }
    public function showDashboard(){
        return view('admin.dashboard');
    }
    public function showLogin(){
        return view('admin.login');
    }
}
