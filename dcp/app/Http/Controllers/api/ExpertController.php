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
        "password"=>"required|confirmed"
    ]);
    // create user+save
    $expert=new Expert();
    $expert->name=$request->name;
    $expert->email=$request->email;
    $expert->password=bcrypt($request->password);
    $expert->save();
    // send response
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
            if(!$token=auth()->attempt(["email"=>$request->email,"password"=>$request->password])){
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
        auth()->Logout();
        return response()->json([
            'status'=>1,
            'message'=>'user logged out '
        ]);
        
    }
}
