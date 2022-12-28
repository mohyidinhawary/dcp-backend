<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ExpertAvailability;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;


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
            "Medical_consulting"=>"",
            "Professional_consulting"=>"",
            "Psychological_consulting"=>"",
            "Family_consulting"=>"",
            "management_consulting"=>"",
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
        $expert->Medical_consulting=$request->Medical_consulting;
        $expert->Professional_consulting=$request->Professional_consulting;
        $expert->Psychological_consulting=$request->Psychological_consulting;
        $expert->Family_consulting=$request->Family_consulting;
        $expert->management_consulting=$request->management_consulting;
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
    public function ShowReservations($id){
       $expert=ExpertAvailability::where('expert_id',$id)->whereNot('user_id',NULL)->get();
       if(!($c=ExpertAvailability::where('expert_id',$id)->select('user_id')->first()))
       {
            return response()->json([
                "message"=>"no reservations"
            ]);
       }
       return response()->json([
            "your reservations is :"=>$expert
       ]);
    }

}
