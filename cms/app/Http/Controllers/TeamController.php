<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;
use App\Item;
use App\Chat;
use App\User;
use Auth;

class TeamController extends Controller
{
    //
    // 基本処理
     public function index(Request $request){
       
        // リレーション用チーム取得
        $teams = Team::where('id',$request->id)->first();
        
        // チームの情報取得
        $team = Team::where('id',$request->id)->get();
        
        // アイテム情報取得
        $items = $teams->items;
        
        // チーム所有のチャット情報
        $chats = Chat::where('team_id',$request->id)->get();
        
        
                  
    //   return view('team',);
      return view('team', [
        'teams'=>$team,
        'items'=>$items,
        'chats'=>$chats
        ]); 
    }
    
    // リスト処理
     public function list(){
         
         $teams = Team::get();
                
            return view('teamList',[
            'teams'=>$teams
            ]);
    }
    
    
    
    
    
    
    
}
