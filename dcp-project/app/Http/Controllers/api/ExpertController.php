<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
   // this is an api for expert register and the http request method will be (post)
   public function Register(Request $request){
    //validation
    $request->validate([
        "name"=>"required",
        "email"=>"required|email|unique:experts",
        "password"=>"required|confirmed",
        "phone_number"=>"required",
        "address"=>"required",
        "experiences"=>"required",
        "experience_years"=>"required",
        "session_price"=>"required",
        "role1"=>"",
        "role2"=>"",
        "role3"=>"",
        "role4"=>"",
        "role5"=>"",
    ]);
    // create expert+save
    $expert=new Expert();
    $expert->name=$request->name;
    $expert->email=$request->email;
    $expert->password=bcrypt($request->password);
    $expert->phone_number=$request->phone_number;
    $expert->address=$request->address;
    $expert->experiences=$request->experiences;
    $expert->experience_years=$request->experience_years;
    $expert->session_price=$request->session_price;
    $expert->role1=$request->role1;
    $expert->role2=$request->role2;
    $expert->role3=$request->role3;
    $expert->role4=$request->role4;
    $expert->role5=$request->role5;
    $expert->save();
    
    return response()->json([
    'status'=>1,
    'massege'=>'expert registered succsessfully'
    
    ],200);
    }

        //this an api for expert login (Post)
    public function Login(Request $request){
            //validation
        $request->validate([
            "email"=>"required|email",
            "password"=>"required",
                //verify expert + token   
        ]);
             //verify  + token
        if(!$token=auth()->guard('expert-api')->attempt(["email"=>$request->email,"password"=>$request->password])){
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
        //this is an api for expert logout (get)
    public function Logout(){
        auth()->guard('expert-api')->Logout();
        return response()->json([
            'status'=>1,
            'message'=>'expert logged out '
        ]);
        
    }
}
