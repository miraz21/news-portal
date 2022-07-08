<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
   public function adminDashboard()
    {
    if(Auth::id())
    {
    if(Auth::user()->usertype==1)
    {
      Session::put('admin_page', 'dashboard');
      return view ('admin.dashboard');
    }

    else{
    return redirect()->back();
    }
    }
    else{
    return redirect('login');
    }
    }

   // public function adminDashboard()
   // {
   //      Session::put('admin_page', 'dashboard');
   //      return view ('admin.dashboard');
   //  }
}
