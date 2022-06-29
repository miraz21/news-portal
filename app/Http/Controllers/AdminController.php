<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
   public function adminDashboard()
   {
        Session::put('admin_page', 'dashboard');
        return view ('admin.dashboard');
    }
}
