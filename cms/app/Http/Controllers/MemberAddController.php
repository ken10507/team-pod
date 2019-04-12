<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Item;
use App\User;
use Auth;
use Mail;
use App\Mail\SampleNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class MemberAddController extends Controller
{
    // 基本処理
     public function index(Request $request){
         
         //  チーム情報を保持
         $team = Team::where('id',$request->id)->first();
         
         return view('memberAdd', [
        'team'=>$team
        ]); 
    }
    
    
    // メンバー追加処理
    public function add (Request $request){
        //以下に登録処理を記述（Eloquentモデル）
        
        // チーム情報登録
        $teams = Team::where('id',$request->team_id)->get()->first();
        $teams->id = $teams->id;
        $teams->save();
        
        
        // ユーザー情報の登録
        $users = User::where('email',$request->mail)->get()->first();
        if( !empty($users) ){
            $users->id = $users->id;
            $users->save();
            // リレーションで中間テーブル登録処理
            $teams->users()->save($users);
            
        }else{
            // メールで会員登録へ
            $name = Auth::user()->name;
            $team_name = $teams->team_name;
            $team_id = $teams->id;
            $to = $request->mail;
            Mail::to($to)->send(new SampleNotification($name,$team_name,$team_id));
        }
        
        
        // // チームとアイテムの情報をそのまま持っていく
        // $team = Team::where('id',$request->team_id)->get();
        // $item = $teams->items;
        
          return view('memberAdd', [
            'team'=>$teams
            ]); 
        
        
    }
    
    
    public function index2($id){
        
        $tema_id = $id;
        
         return view('userAdd',[
             'id'=>$tema_id
             ]); 
    }
    
    public function thanks(Request $request){
        
         return view('thnaks'); 
    }
    
    
    public function add2(Request $request){
         
        // ユーザー情報登録
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_img = $request->user_img;
        $user->password = bcrypt($request->password);
        $user->save(); 
        
        // チーム情報取得
        $teams = Team::where('id',$request->team_id)->first();
        
        // 登録済ユーザー情報取得
        $users = User::where('email',$request->email)->first();
        
        // リレーションで中間テーブル登録処理
        $users->teams()->save($teams); 
         
         return view('thanks');
    }
    
    
}
