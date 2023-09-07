<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog(){
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index',compact('blogs'));
    }

    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();

        return view('admin.blogs.create',compact('categories'));
    }

    public function StoreBlog(Request $request){
         // validation
        $request->validate([
            'blog_title' => 'required',
            'blog_desc' => 'required',

        ],[
            // custom  error message
            'blog_title.required' => 'The Blog title is required',
            'blog_desc.required' => 'Description is required'
        ]);
 
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // resize image
            Image::make($image)->resize(430,327)->save('upload/blog_images/' .$name_gen);
            $save_url = 'upload/blog_images/' .$name_gen;

            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_desc' => $request->blog_desc,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
            'message' => 'blog added Successfully',
            'alert-type' =>'success'
        );
            
        return redirect()->route('all.blog')->with($notification);
            
    }
}
