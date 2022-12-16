<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        // create expert+save
        $expert=new Expert();
        $expert->name=$request->name;
        $expert->email=$request->email;
        $expert->password=bcrypt($request->password);
        $expert->phone_number=$request->phone_number;
        $expert->address=$request->address;
        $expert->role=$request->role;
        $expert->experiences=$request->experiences;
        $expert->save();
        // send response
        return response()->json([
        'status'=>1,
        'massege'=>'expert registered succsessfully'
        
        ],200);
    }

    //this an api for expert login (Post)
    public function Login(Request $request){
        $request -> validate([
            "email" => "required|email",
            "password" =>"required"
        ]);
        $expert = Expert::where("email" , "=" , $request -> email)-> first();

        if(isset($expert->id) ){
            if(Hash::check($request -> password , $expert ->password)){
               $token1 = $expert -> createToken("API TOKEN")->plainTextToken;
                return response() ->json([
                    "status" =>1,
                    'massege'=>"Expert logged in",
                    "token"=>$token1
                ]);
            }
            else
            {
                return response() ->json([
                    "status"=>0,
                    'massege'=>"wrong password"
                ]);
            }
        }
        else{
        return response() -> json([
            "status" => 0,
            'massege'=>"Expert not found"
        ],404);
    }
    } //this is an api for expert logout (get)
    public function Logout(){
        auth()->Logout();
        return response()->json([
            'status'=>1,
            'message'=>'user logged out '
        ]);
        
    }
    public function Profile(){
        $expert_data=auth()->user();
        return response()->json([
            'status'=>1,
            'message'=>'expert profile data',
            'use data'=>$expert_data
        ]);
    }
}
