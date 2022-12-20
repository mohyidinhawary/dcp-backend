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
            "phone_number"=>"required",
        "address"=>"required",
        "experience_years"=>"required",
        "experiences"=>"required",
        "Medical_consultations"=>"required",
            
        "Professional_consulting"=>"required",
            "Psychological_counseling"=>"required",
            "Family_counseling"=>"required",
        "management_consulting"=>"required"
        
        ]);
        // create expert+save
        $expert_details=new ExpertDetails();
        
       $expert_details->phone_number=$request->phone_number;
       $expert_details->address=$request->address;
       $expert_details->experience_years=$request->experience_years;
       $expert_details->experiences=$request->experiences;
       $expert_details->Medical_consultations=$request->Medical_consultations;
       $expert_details->Professional_consulting=$request->Professional_consulting;
       $expert_details->Psychological_counseling=$request->Psychological_counseling;
       $expert_details->Family_counseling=$request->Family_counseling;
       $expert_details->management_consulting=$request->management_consulting;

        $expert_details->save();
        // send response
        return response()->json([
        'status'=>1,
        'massege'=>'expert details  enrolled succsessfully'
        
        ],200);
            }
}
