<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Social;

use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
    public function social()
    {
    if(Auth::id())
    {
    if(Auth::user()->usertype==1)
    {
       Session::put('admin_page','social');
       $social=Social::first();
       return view('admin.theme.social',compact('social'));
    }
    else{
    return redirect()->back();
    }
    }
    else{
    return redirect('login');
    }
    }
    
    // public function social()
    // {
    //     Session::put('admin_page','social');
    //     $social=Social::first();
    //     return view('admin.theme.social',compact('social'));
    // }

    public function socialUpdate(Request $request, $id)
    {
        $social=Social::findOrFail($id);
        $data=$request->all();
        $social->facebook=$data['facebook'];
        $social->google=$data['google'];
        $social->linkedin=$data['linkedin'];
        $social->twitter=$data['twitter'];
        $social->priterest=$data['priterest'];

        $social->save();
        Session::flash('success_message', 'Social Settings Has Been Updated Successfully');
        return redirect()->back();
    }
}
