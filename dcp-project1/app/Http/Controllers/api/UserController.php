<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Expert;
use App\Models\Rating;
use App\Models\ExpertAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class UserController extends Controller
{
    // this is an api for user register and the http request method will be (post)
    public function Register(Request $request){
        
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|confirmed",
        ]);
        // create user+save
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        // send response
        return response()->json([
        'status'=>1,
        'massege'=>'user registered succsessfully'

        ],200);
    }
    
    //  this is an api for user login (Post)
    public function Login(Request $request){
        //validation
        $request->validate([
            "email"=>"required|email",
            "password"=>"required",
            //verify user + token
            
        ]);
         //verify user + token
        if(!$token=auth()->guard('user-api')->attempt(["email"=>$request->email,"password"=>$request->password])){
            return response()->json([
                'status'=>0,
                'message'=>'invaild'
            ]);
        }
            // response
            return response()->json([
                'status'=>1,
                'message'=>'logged in successfully',
                'token'=>$token
            ]);
    }
    
    //get
    public function Profile(){
        $user_data=auth()->user();
        return response()->json([
            'status'=>1,
            'message'=>'user profile data',
            'use data'=>$user_data
        ]);
        
    }
    //  this is an api for user logout (get)
    public function Logout(){
        auth()->guard('user-api')->Logout();
        return response()->json([
            'status'=>1,
            'message'=>'user logged out '
        ]);
        
    }
    
    public function BrowseConsultingExperts(){
        $experts1=DB::table('experts')->where('Medical_consulting','=',true)
        ->select('name')
        ->get();
        $experts2=DB::table('experts')->where('Professional_consulting','=',true)
        ->select('name')
        ->get();
        $experts3=DB::table('experts')->where('Psychological_consulting','=',true)
        ->select('name')
        ->get();
        $experts4=DB::table('experts')->where('Family_consulting','=',true)
        ->select('name')
        ->get();
        $experts5=DB::table('experts')->where('management_consulting','=',true)
        ->select('name')
        ->get();
        return response()->json([
           
            'Consulting'=>[
                "Medical_consultations"=>$experts1,
                "Professional_consulting"=>$experts2,
                "Psychological_counseling"=>$experts3,
                "Family_counseling"=>$experts4,
                "management_consulting"=>$experts5
            ]
        ]);
           
    }
    public function getExpertsDetails(){
        $consultant = DB::table('experts')->select('id','name','email','phone_number','address','session_price','avg_rate','Medical_consulting','Professional_consulting','Psychological_consulting','Family_consulting','management_consulting','experiences','experience_years')
            ->get();
        return response()->json($consultant);
    }
    public function getExpertDetails($id){
        $consultant = DB::table('experts')->where('experts.id',$id)->select('id','name','email','phone_number','address','session_price','avg_rate','Medical_consulting','Professional_consulting','Psychological_consulting','Family_consulting','management_consulting','experiences','experience_years')
            ->get();
        return response()->json($consultant);
    }
    public function search(Request $request){
        $request->validate([
           "name"=>"required"
        ]);
        
        if(!$consultant= Expert::where("name" , "=" , $request->name)->select('name')-> first()){

            return response()->json([
                'status'=>0,
                'message'=>'invaild'
            ]);
        }
        else
        {   
            return response()->json([
                'status'=>1,
                
                'Expert is'=> $consultant
            ]);
        }
    }
    //     else
    //     return response()->json([
    //         'status'=>0,
    //         'message'=>'No expert with the same name '
    //     ]);
    // }
//payment methodes
    public function addToWallet(Request $request){
        $request->validate([
            "email"=>"required|email",
            "cash"=>"required"
        ]);
        $user=User::where('email',$request->email)->first();
        $cash=$request->cash;
        if(!$user){
            return response()->json([
                "message"=>"wronng email"
            ]);
        }
        $user -> wallet+=$cash;
        $user->save();
        return response()->json([
            "message"=>"cash has been added successfully"
        ]);
    } 
    public function pay($id,Request $request){
        $request->validate([
            "email"=>"required|email"
        ]);
        // $admin1=User::where('id',$id)->first();
        // $admin2=Expert::where('email',$request->email)->first();
        // $admin1->wallet-=($admin2->session_price);
        // $admin2->wallet+=($admin2->session_price);
        // $admin1->save();
        // $admin2->save();
        if($admin1=User::where('wallet',0)->first()){
            
            return response()->json([
                "message"=>"you cannot pay because your wallet is empty"
            ]);
        }
        else{
        $admin1=User::where('id',$id)->first();
        $admin2=Expert::where('email',$request->email)->first();
        $admin1->wallet-=($admin2->session_price);
        $admin2->wallet+=($admin2->session_price);
        $admin1->save();
        $admin2->save();
        
        return response()->json([
            "message"=>"payment has been done successfully"
        ]);
    }
    }
//reservation methodes
    public function AvailableTime($id){
     
        $user=ExpertAvailability::where('expert_id',$id)->where('user_id',null)->select('day','date','from','to')->get();
        return response()->json([
            "message"=>$user
        ]);
    }    
    public function Reservation($id1,$id2){
        $res1=ExpertAvailability::where('id',$id2)->first();
        if(!($res1->user_id)){
            $res1->user_id=$id1;
            $res1->save();
            return response()->json([
                "message"=>"done",
                "message"=>$res1
            ]);
        }
        else{
            return response()->json([
                "message"=>"already taken"
            ]);
        }
    }  
    public function rating(Request $request,$id1,$id2){
        $request->validate([
            "rate"=>"required"
        ]);
        $rate=new Rating();
        $rate->user_id=$id1;
        $rate->expert_id=$id2;
        if(DB::table('ratings')->where('user_id',$id1)->first()&&DB::table('ratings')->where('expert_id',$id2)->first()){
            return response()->json([
                "message"=>"already rated"
            ]);
        }
        $rate->rate=$request->rate;
        $rate->save();
        return response()->json([
            "message"=>"rated"
        ]);
    }                                                                
}