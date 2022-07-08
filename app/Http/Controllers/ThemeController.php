<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Theme;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use Image;

class ThemeController extends Controller
{
    public function theme()
    {
    if(Auth::id())
    {
    if(Auth::user()->usertype==1)
    {
      Session::put('admin_page','theme');
      $theme=Theme::first();
      return view('admin.theme.theme',compact('theme'));
    }
 
    else{
    return redirect()->back();
    }
    }
    else{
    return redirect('login');
    }
    }

 // public function theme()
 // {
 //    Session::put('admin_page','theme');
 //    $theme=Theme::first();
 //    return view('admin.theme.theme',compact('theme'));
 // }

     public function themeUpdate(Request  $request, $id)
     {
        $data = $request->all();
        $theme = Theme::findOrFail($id);
        $theme->site_title = $data['site_title'];


        $slug = Str::slug($data['site_title']);
        $random = rand(1,999999);
        if($request->hasFile('header_logo')){
            $image_tmp = $request->file('header_logo');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug . '-' . $random . '.' . $extension;
                $image_path = 'uploads/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->header_logo = $filename;
            }
        }

        $slug = "footer-logo";
        $random = rand(1,999999);
        if($request->hasFile('footer_logo')){
            $image_tmp = $request->file('footer_logo');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug . '-' . $random . '.' . $extension;
                $image_path = 'uploads/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->footer_logo = $filename;
            }
        }


        $slug = "favicon";
        $random = rand(1,999999);
        if($request->hasFile('favicon')){
            $image_tmp = $request->file('favicon');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug . '-' . $random . '.' . $extension;
                $image_path = 'uploads/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->favicon = $filename;
            }
        }

        $theme->save();
        Session::flash('success_message', 'Theme Settings Has Been Updated Successfully');
        return redirect()->back();
    }
}
