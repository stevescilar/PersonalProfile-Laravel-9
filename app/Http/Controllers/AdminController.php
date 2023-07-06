<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logged Out  Successfully',
            'alert-type' =>'success'
        );

        return redirect('/')->with($notification);
    }

    public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email= $request->email;

        // image insert & manipulations
        if ($request->file('profile_image')){
            $file = $request->file('profile_image');

            // store with unique name -- can put this in generation of invoices
            $filename = date('YmdHi').$file->getClientOriginalName();
            // move file to a specific folder
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }


    // change password
    public function ChangePassword(){

        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request) {
        $validatedData =$request->validate([
            'oldpassword'  => 'required',
            'newpassword'  => 'required',
            'password_confirmation'  =>'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user =User::where('id','=',Auth::user()->id)->firstOrFail();
            $user -> password = Hash::make($request->newpassword);
            $user->update();


            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
            // auth()->logout();

        }else{
            session()->flash('message','Wrong old password!');
            return redirect()->back();
        }

    }
}
