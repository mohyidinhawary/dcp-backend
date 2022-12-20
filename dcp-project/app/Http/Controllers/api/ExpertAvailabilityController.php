<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExpertAvailability;
use Illuminate\Http\Request;

class ExpertAvailabilityController extends Controller
{
    public function AddTimes(Request $request){
        //validation
        $request->validate([
            
        "today"=>"required",
        "date"=>"required",
        "from"=>"required",
        "to"=>"required"
        ]);
        // create user+save
        $avilable=new ExpertAvailability();
        $avilable->today=$request->today;
        $avilable->date=$request->date;
        $avilable->from=$request->from;
        $avilable->to=$request->to;
        $avilable->save();
        // send response
        return response()->json([
        'status'=>1,
        'massege'=>'Times added successfully'
        
        ],200);
            }
   
}
