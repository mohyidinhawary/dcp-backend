<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ExpertDetails;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    // this is an api for user register and the http request method will be (post)
    public function Register(Request $request){
//validation
$request->validate([
    "name"=>"required",
    "email"=>"required|email|unique:users",
    "password"=>"required|confirmed"
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
        $experts1=DB::table('experts')->where('role1','=',1)
        ->select('name')
        ->get();
        $experts2=DB::table('experts')->where('role2','=',2)
        ->select('name')
        ->get();
        $experts3=DB::table('experts')->where('role3','=',3)
        ->select('name')
        ->get();
        $experts4=DB::table('experts')->where('role4','=',4)
        ->select('name')
        ->get();
        $experts5=DB::table('experts')->where('role5','=',5)
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




            public function getExpertDetails($id){
 
                $consultant = DB::table('experts')->where('experts.id',$id)->select('id','name','email','phone_number','address','role','experiences','experience_years')
                ->get();
                 return response()->json($consultant);
             }

}