<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExpertDetails;
use Illuminate\Http\Request;

class ExpertDetailsController extends Controller
{
    public function ExpertDetailsEnroll(Request $request){
        //validation
        $request->validate([
            "photo"=>"",
        "experiences"=>"required",
        "details_of_experiences"=>"required",
        "phone_number"=>"required",
        "address"=>"required",
        "available_times_during_the_week"=>"required",
        "type_of_Consulting"=>"required"
        ]);
        // create expert+save
        $expert_details=new ExpertDetails();
        // if($request->hasfile('photo')){
        //     $file=$request->file('photo');
        //     $extension=$file->getClientOriginalExtension();
        //     $filename=time() . '.' . $extension;
        //     $file->move('uploads/expert_details/',$filename);
        //     $expert_details->photo=$filename;

        // }
        // else{
        //     return $request;
        //     $expert_details->photo='';
        // }
        $expert_details->experiences=$request->experiences;
        $expert_details->details_of_experiences=$request->details_of_experiences;
        $expert_details->phone_number=$request->phone_number;
        $expert_details->address=$request->address;
        $expert_details->available_times_during_the_week=$request->available_times_during_the_week;
        $expert_details->type_of_Consulting=$request->type_of_Consulting;
        $expert_details->save();
        // send response
        return response()->json([
        'status'=>1,
        'massege'=>'expert details  enrolled succsessfully'
        
        ],200);
            }
}
