<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\HomeSlide;

use Image;

class AboutController extends Controller
{
    public function AboutMe(){
        // find the id
        $aboutPage = About::find(1);

        return view('admin.about.aboutme', compact('aboutPage'));
    } //end method

    // update function
    public function UpdateAbout(Request $request){
        
        $about_id = $request->id;

        if ($request->file('about_img')){
            $image = $request->file('about_img');
            // change name
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(720,720)->save('upload/about/' .$name_gen);
            $save_url = 'upload/about/' .$name_gen;

            // when updating all data
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'desc' => $request->desc,
                'about_img' => $save_url,
            ]);
            // after successful update show notification
            $notification = array(
            'message' => 'The About Page has been Updated Successfully',
            'alert-type' =>'success'
            );

        return redirect()->back()->with($notification);
        }else{
            # code...update without image
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'desc' => $request->desc,
            ]);
            // after successful update show notification
            $notification = array(
            'message' => 'The About Page has been Updated Successfully [Without Image]',
            'alert-type' =>'info'
            );

            return redirect()->back()->with($notification);
        } //end method

    }// end  function

    public function aboutFull(){
        $aboutPage = About::find(1);

        return view('frontend.home_all.about_full', compact('aboutPage'));
    }
}

