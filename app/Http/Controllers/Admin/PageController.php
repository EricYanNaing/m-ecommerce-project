<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showDashboard(){
        return view('admin.dashboard');
    }
    public function showLogin(){
        return view('admin.login');
    }
}
