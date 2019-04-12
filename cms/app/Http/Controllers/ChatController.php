<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Chat;
use Auth;

class ChatController extends Controller
{
    //
    public function index(Request $request){
        
        $chats = Chat::query();
        $chats->where('team_id',$request->team_id); 
        $chats->where('user_id',$request->auth_id);
        $post = $chats->first();// user_id が 1 のもの且つstatus が 1 のものだけを取得する
        
        
        $team = Team::where('id',$request->team_id)->first();
        $user = Auth::user();
        
        
        if ($post === null) {
            
        
            // chatテーブル情報登録
            $chat = new Chat;
            $chat->team_id = $request->team_id;
            $chat->user_id = $request->auth_id;
            $chat->name = $request->name;
            $chat->team_name = $request->team_name;
            $chat->save();
            
             return view('chat',[
                'team'=>$team,
                'user'=>$user
                ]); 
                
        }else{
            
            return view('chat',[
                'team'=>$team,
                'user'=>$user
                ]);
            
        }
        
    }
    
    public function chatAdmin(Request $request){
        
        $team_id = $request->team_id;
        $user_id = $request->user_id;
        
         return view('chatAdmin',[
        'team'=>$team_id,
        'user'=>$user_id
        ]); 
    }
}
