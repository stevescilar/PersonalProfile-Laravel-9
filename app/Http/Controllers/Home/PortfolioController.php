<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;
Use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function homePortfolio(){
        $portfolios = Portfolio::latest()->get();
        return view ('admin.portfolio.index', compact('portfolios'));
    }

    public function addPortfolio(){
        return view ('admin.portfolio.add_portfolio');
    }

    // store portfolio data
    public function StoreData(Request $request){
        // validation
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_desc' => 'required',

        ],[
            // custom  error message
            'portfolio_name.required' => 'Portfolio Name is required'
        ]);
 
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // resize image
            Image::make($image)->resize(1020,519)->save('upload/portfolio_images/' .$name_gen);
            $save_url = 'upload/portfolio_images/' .$name_gen;

            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_desc' => $request->portfolio_desc,
                'portfolio_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
            'message' => 'Portfolio Updated Successfully',
            'alert-type' =>'success'
        );
            
        return redirect()->route('home.portfolio')->with($notification);
            
    }

    public function EditPortfolio($id) {
        $portfolio = Portfolio::findOrFail($id);
        return view ('admin.portfolio.edit', compact('portfolio'));

    }

    public function UpdateData(Request $request){

        $portfolio_id =  $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // resize image
            Image::make($image)->resize(1020,519)->save('upload/portfolio_images/' .$name_gen);
            $save_url = 'upload/portfolio_images/' .$name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_desc' => $request->portfolio_desc,
                'portfolio_image' => $save_url,
            ]);

            $notification = array(
            'message' => 'Portfolio Updated Successfully',
            'alert-type' =>'success'
            );
            
        return redirect()->route('home.portfolio')->with($notification);

        } else {
           Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_desc' => $request->portfolio_desc,
            ]);

            $notification = array(
            'message' => 'Portfolio Updated without image Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('home.portfolio')->with($notification);

        } //end else

    }//end method

    // DeleteData

    public function DeleteData($id){
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;

        unlink($img);
        Portfolio::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Portfolio Data  deleted Successfully',
        'alert-type' =>'success'
        );

    return redirect()->route('home.portfolio')->with($notification);
    }

    public function PortfolioDetails($id){

        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio.details',compact('portfolio'));

    }


}


