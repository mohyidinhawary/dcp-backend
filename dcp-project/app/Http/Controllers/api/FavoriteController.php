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
    public function AddExpert(Request $request){
        $request->validate([
        "expert_name"=>"required",
        "role1"=>"",
        "role2"=>"",
        "role3"=>"",
        "role4"=>"",
        "role5"=>"",
        
        
    
        
        ]);
        // craete course
        $favorite=new Favorite();
        $favorite->user_id=auth()->user()->id;
        $favorite->expert_name=$request->expert_name;
        $favorite->role1=$request->role1;
        $favorite->role2=$request->role2;
        $favorite->role3=$request->role3;
        $favorite->role4=$request->role4;
        $favorite->role5=$request->role5;
       
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
