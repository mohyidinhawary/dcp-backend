<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expert;
use Illuminate\Support\Facades\DB;
class FavoriteController extends Controller
{
    public function AddExpert(Request $request,$id){
        $request->validate([
        "expert_name"=>"required",
        "Medical_consulting"=>"",
            "Professional_consulting"=>"",
            "Psychological_consulting"=>"",
            "Family_consulting"=>"",
            "management_consulting"=>""
        ]);
        // craete course
        $favorite=new Favorite();
        
        $favorite->user_id=$id;
        $favorite->expert_name=$request->expert_name;
        $favorite->Professional_consulting=$request->Professional_consulting;
        $favorite->Psychological_consulting=$request->Psychological_consulting;
        $favorite->Family_consulting=$request->Family_consulting;
        $favorite->management_consulting=$request->management_consulting;
       
        $favorite->save();
        
        // response
        if(!$expert = Expert::where("name" , "=" , $request->expert_name)-> first()){

            return response()->json([
                'status'=>0,
                'message'=>'invaild'
            ]);
        }
        
        return response()->json([
        'status'=>1,
        'message'=>'expert added successfully'
        ],200);
        
    } 
    
}
