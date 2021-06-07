<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function Index(){
        $district = DB::table('districts')->orderBy('id','desc')->paginate(3);
        return view('backend.district.index',compact('district'));
    }

    public function AddDistrict(){
        return view('backend.district.create');
    }

    public function StoreDistrict(Request $request){
        $validateData = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_hin' => 'required|unique:districts|max:255',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;
        DB::table('districts')->insert($data);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('district')->with($notification);
    }

    public function EditDistrict($id){
        $district = DB::table('districts')->where('id',$id)->first();
        return view('backend.district.edit',compact('district'));
    }

    public function UpdateDistrict(Request $request,$id){
        $validateData = $request->validate([
            'district_en' => 'required|max:255',
            'district_hin' => 'required|max:255',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;
        DB::table('districts')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'district Updated Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('district')->with($notification);
    }

    public function DeleteDistrict($id){
        DB::table('districts')->where('id',$id)->delete();

        $notification = array(
            'message' => 'district Deleted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('district')->with($notification);
    }
}
