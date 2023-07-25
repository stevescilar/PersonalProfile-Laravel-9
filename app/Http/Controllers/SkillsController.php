<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;


class SkillsController extends Controller
{
    public function MySkill(){
        $skillPage = Skill::all();

        return view('admin.skills.my_skill',compact('skillPage'));
    }

    public function updateSkill(Request $request){
        // $skills_id = $request->id;

        if($request->file('skill_img')){
            $image = $request->file('skill_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/skills/'.$name_gen);
            $save_url = 'upload/skills'.$name_gen;

            Skill::findOrFail($skills_id)->insert([
                'skill_name' => $request->skill_name,
                'skill_img' => $request->$save_url,
            ]);

            $notification = array(
            'message' => 'Your Skills have been Updated Successfully',
            'alert-type' =>'success'
            );

        return redirect()->back()->with($notification);
        }else{
             Skill::findOrFail($skills_id)->insert([
                'skill_name' => $request->skill_name,
            ]);
            $notification = array(
            'message' => 'Your Skills have been Updated Successfully w/o image',
            'alert-type' =>'success'
            );
        return redirect()->back()->with($notification);

        }
    }
}
