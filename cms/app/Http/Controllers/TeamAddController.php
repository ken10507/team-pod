<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Validator;
use Auth;

class TeamAddController extends Controller
{
    //
    // 基本処理
     public function index(){
        return view('teamAdd');
    }
    
    // 追加処理
    public function add(Request $request){
        
        //  //バリデーション
        // $validator = Validator::make($request->all(), [
        //     'team_name'        => 'required',
        //     'team_desc'     => 'required',
        // ]);
        
        // //バリデーション:エラー
        // if ($validator->fails()) {
        //     return redirect('/itemAdd')
        //         ->withInput()
        //         ->withErrors($validator);
        // }

         //以下に登録処理を記述（Eloquentモデル）
        // Eloquent モデル
        
        //チーム画像のファイル名取得
        $file1 = $request->file('team_img');
        if( !empty($file1) ){
            //ファイル名を取得
            $filename1 = $file1->getClientOriginalName();
            //ファイル名をpublic/uploadフォルダに保存
            $move = $file1->move('./uploadTeam/',$filename1);
        }else{
            $filename1 = "3_White_logo_on_color1_176x69.png";
        }
        
        //ロゴ画像のファイル名取得
        $file2 = $request->file('team_logo');
        if( !empty($file2) ){
            //ファイル名を取得
            $filename2 = $file2->getClientOriginalName();
            //ファイル名をpublic/uploadフォルダに保存
            $move = $file2->move('./uploadTeamLogo/',$filename2);
        }else{
            $filename2 = "3_White_logo_on_color1_176x69.png";
        }
        
        // ユーザー情報登録
        $users = \Auth::user();
        $users->id = $users->id;
        $users->save();
        
        // チーム情報登録
        $teams = new Team;
        $teams->team_name = $request->team_name;
        $teams->team_desc = $request->team_desc;
        $teams->leader_id = $users->id;
        $teams->team_img = $filename1;
        $teams->team_logo = $filename2;
        $teams->save(); 
        
        
        // リレーションで中間テーブル登録処理
        $teams->users()->save($users);
        return redirect('/myPage');
    }
    
}
