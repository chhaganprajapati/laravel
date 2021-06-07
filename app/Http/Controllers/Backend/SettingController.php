<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function SocialSetting(){
        $social = DB::table('socials')->first();
        return view('backend.setting.social',compact('social'));
    }

    public function SocialUpdate(Request $request,$id){

        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkdin'] = $request->linkdin;
        $data['instagram'] = $request->instagram;
        DB::table('socials')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Social Settings Updated Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('social.setting')->with($notification);

    }
}
