<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExpertMessage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expert;
use Illuminate\Support\Facades\DB;
use App\Models\UserSubject;
class ExpertMessageController extends Controller
{
    public function SendMassege(Request $request,$id1,$id2){
        $request->validate([
            "subject"=>"required",
            "user_name"=>"required",
            "description"=>"required",
        ]);
        $user=User::where('id',$id2)->first();
        $expert=Expert::where('id',$id1)->first();
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
if(!$name=User::where("name" , "=" , $request->user_name)->first()){
    return response()->json([
        'status'=>0,
        'message'=>'invaild'
    ]);
}
else{
    $massege=new ExpertMessage();
    $massege->expert_id=$id1;
    $massege->user_id=$id2;
     $massege->subject=$request->subject;
     $massege->user_name=$request->user_name;
     
     $massege->description=$request->description;

     $massege->user_id=$id2;
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
    $expert_messages_outgoing=DB::table('experts_messages')->where('expert_id',$id)->select('id','subject','user_id','user_name','description',)->get();
    
    return response()->json([
       
        'outgoing'=>$expert_messages_outgoing
    
        ],200);
        }

        public function DeleteMessage($id1,$id2){
            $massege=DB::table('experts_messages')->where('expert_id',$id1)->where('id',$id2)->delete();
            return response()->json([
               
                'massege'=>'message deleted succsessfully'
        
                ],200);
        }

        public function GetMessages($id){
            $messages=DB::table('users_messages')->where('expert_id',$id)->select('user_id','subject','description',)->get();
            
            return response()->json([
               
                'inbox'=>$messages
            
                ],200);
                }

                public function ExpertAnswer(Request $request,$id1,$id2){
                    $request->validate([
                        "expert_answer"=>"",
                        
                    ]);
                    $answer=UserSubject::where('expert_id',$id1)->where('user_id',$id2)->first();
                   
                    $answer->expert_answer=$request->expert_answer;
                    $answer->save();

return response()->json([
               
                'massege'=>'answer sent succsessfully',
            
                ],200);

                }
}
