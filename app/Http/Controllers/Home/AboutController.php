<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use App\Models\HomeSlide;
use Illuminate\Support\Carbon;

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

    // multi image /portfolio

    public function toolsOfWork(){
        return view('admin.about.gallery');
    }

    public function StoreGallery(Request $request){
            $image = $request->file('multi_img');

            foreach($image as $multi_img) {
                $name_gen=hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
                Image::make($multi_img)->resize(220,220)->save('upload/tools/' .$name_gen);
                $save_url = 'upload/tools/' .$name_gen;

                // when updating all data
                MultiImage::insert([
                    
                    'multi_img' => $save_url,
                    'created_at' => Carbon::now()
                ]);
                // after successful update show notification
                $notification = array(
                'message' => 'Your Tools 0f work have been inserted Successfully',
                'alert-type' =>'success'
                );
            } //end of foreach

            return redirect()->route('all.about.gallery')->with($notification);


    }
    

    public function AllGallery(){
        $images = MultiImage::all();
        
        return view('admin.about.all_images',compact('images'));
    }

    public function editGallery($id){
        $editData =MultiImage::findOrFail($id);

        return view('admin.about.edit',compact('editData'));


    }

    public function updateGallery(Request $request){
        $multi_img_id = $request->id;

        if ($request->file('multi_img')){
            $image = $request->file('multi_img');
            // change name
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220,220)->save('upload/tools/' .$name_gen);
            $save_url = 'upload/tools/' .$name_gen;

            // when updating all data
            MultiImage::findOrFail($multi_img_id)->update([
            
                'multi_img' => $save_url,
            ]);
            // after successful update show notification
            $notification = array(
            'message' => 'Image/logo has been Updated Successfully',
            'alert-type' =>'success'
            );

        return redirect()->route('all.about.gallery')->with($notification);
        }
    }


    public function deleteGallery($id){
        $image = MultiImage::findOrFail($id);
        $img = $image->multi_img;

        unlink($img);
        MultiImage::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Image/logo has been deleted Successfully',
        'alert-type' =>'success'
        );

    return redirect()->route('all.about.gallery')->with($notification);
    }
}

