<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
class FavoriteController extends Controller
{
    public function AddExpert($id1,$id2){
        $favorite=new Favorite();
        if(DB::table('favorites')->where('user_id',$id1)->first()&&DB::table('favorites')->where('expert_id',$id2)->first()){
            return response()->json([
                "message"=>"already added"
            ]);
        }
        $favorite->user_id=$id1;
        $favorite->expert_id=$id2;
        $favorite->save();
        return response()->json([
        'status'=>1,
        'message'=>'expert added successfully'
        ],200); 
    } 
    public function deleteExpert($id1,$id2){
        $favorite=Favorite::where('expert_id',$id1)->where('user_id',$id2)->delete();
    } 
}
