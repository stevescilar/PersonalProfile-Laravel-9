<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Image;
use Illuminate\Support\Carbon;


class SkillsController extends Controller
{
    public function MySkill(){
        $skills = Skill::all();
        $skillPage = Skill::all();

        return view('admin.skills.my_skill',compact('skillPage','skills'));
    }

    public function updateSkill(Request $request){
        // $skills_id = $request->id;
        // $data = Skill::all();
        // $data -> skill_name = $request->skill_name;
        if($request->file('skill_img')){
            $image = $request->file('skill_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/skills/'.$name_gen);
            $save_url = 'upload/skills'.$name_gen;
            // edit this method its wrong

            Skill::insert([
                'skill_name' => $request->skill_name,
                'skill_img' => $save_url,
                'created_at'=> Carbon::now()
            ]);
        }
        $notification = array(
        'message' => 'Your Skills have been Updated Successfully',
        'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);

       
    }
}
