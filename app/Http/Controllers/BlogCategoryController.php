<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function AllCategory(){

        $blogCats = BlogCategory::latest()->get();
        return view ('admin.blogCats.index',compact('blogCats'));

    }

    public function AddCat(){
        return view ('admin.blogCats.create');
    }

    public function StoreCategory(Request $request){
        // validate data
        $request->validate([
            'blog_category' => 'required'
        ]);

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ],[
            // custom  error message
            'portfolio_name.required' => 'Portfolio Name is required'
        ]);
        $notification = array(
            'message' => 'Category inserted Successfully',
            'alert-type' =>'success'
        );
    return redirect()->route('all.category')->with($notification);
    }

    public function EditCat($id){
        // get data of the Id using findOrFail
        $blogCats = BlogCategory::findOrFail($id);
        return view('admin.blogCats.edit',compact('blogCats'));
    }

    public function UpdateCat(Request $request){
        // we get the requested data
        //we use a specific id

        $blogCats_id = $request->id;

        BlogCategory::findOrFail($blogCats_id)->update([
            'blog_category'=> $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' =>'success'
            );
            
        return redirect()->route('all.category')->with($notification);
    }

    public function  DeleteCat($id){
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Blog Category  Data  deleted Successfully',
        'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }
    
}
