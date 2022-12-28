<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExpertAvailability;
use Carbon\Carbon;
use Illuminate\Http\Request;
class ExpertAvailabilityController extends Controller
{
    public function AddTimes(Request $request,$id){
        //validation
        $request->validate([  
        "day"=>"required",
        "date"=>"required",
        "from"=>"required"
        ]);
       
        // create user+save
        $available=new ExpertAvailability();
        $available->expert_id=$id;
        $e=ExpertAvailability::where('expert_id',$id)->where('day',$request->day)->where('date',$request->date)->where('from',$request->from)->first();
        if($e)
        {
            return response()->json([
                "message"=>"you added this time"
            ]);
        }
        $available->day=$request->day;
        $available->date=$request->date;
        $available->from=$request->from;
        $test=Carbon::createFromFormat('G:i:s',$available->from);
        $test=$test->addHour();
        $available->to=$test;
        $available->save();
        // send response
        return response()->json([
        'status'=>1,
        'massege'=>'Times added successfully'
        
        ],200);
        }
   
}
