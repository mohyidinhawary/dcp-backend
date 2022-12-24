<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expert;
use Illuminate\Support\Facades\DB;
use App\Models\ExpertMessage;

class UserSubjectController extends Controller
{
    public function SendMassege(Request $request,$id1,$id2){
        $request->validate([
            "subject"=>"required",
            "expert_name"=>"required",
            "description"=>"required",
        ]);
        $user=User::where('id',$id1)->first();
        $expert=Expert::where('id',$id2)->first();
        // create massege+save
    //     $massege=new UserSubject();
    //    $massege->user_id=$id1;
    //     $massege->subject=$request->subject;
    //     $massege->expert_name=$request->expert_name;
        
    //     $massege->description=$request->description;
    //     $massege->expert_id=$id2;
    //     $user->save();
    //     $expert->save();
    //     $massege->save();
if(!$name=Expert::where("name" , "=" , $request->expert_name)->first()){
    return response()->json([
        'status'=>0,
        'message'=>'invaild'
    ]);
}
else{
    $massege=new UserSubject();
    $massege->user_id=$id1;
     $massege->subject=$request->subject;
     $massege->expert_name=$request->expert_name;
     
     $massege->description=$request->description;
     $massege->expert_id=$id2;
     $user->save();
     $expert->save();
     $massege->save();
        // send response
        return response()->json([
            'status'=>1,
            'massege'=>'message sent succsessfully'
    
            ],200);
}
}
public function GetMessagesOutgoing($id){
    $user_messages_outgoing=DB::table('users_messages')->where('user_id',$id)->select('id','subject','expert_id','expert_name','description',)->get();
    
    return response()->json([
       
        'outgoing'=>$user_messages_outgoing
    
        ],200);
        }
        public function DeleteMessage($id1,$id2){
            $massege=DB::table('users_messages')->where('user_id',$id1)->where('id',$id2)->delete();
            return response()->json([
               
                'massege'=>'message deleted succsessfully'
        
                ],200);
        }

        public function GetMessages($id){
            $messages=DB::table('experts_messages')->where('user_id',$id)->select('expert_id','subject','description',)->get();
            
            return response()->json([
               
                'inbox'=>$messages
            
                ],200);
                }

                public function UserAnswer(Request $request,$id1,$id2){
                    $request->validate([
                        "user_answer"=>"",
                        
                    ]);
                    $answer=ExpertMessage::where('user_id',$id1)->where('expert_id',$id2)->first();
                   
                    $answer->user_answer=$request->user_answer;
                    $answer->save();

return response()->json([
               
                'massege'=>'answer sent succsessfully',
            
                ],200);

                }
                
}