<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class UserController extends Controller
{
    // 基本処理
     public function index(Request $request){
         
                $user = User::find($request->user_id);
                
            return view('user',[
            'user'=>$user
            ]);
    }
    
    // リスト処理
     public function list(){
         
         $users = User::get();
                
                
            return view('userList',[
            'users'=>$users
            ]);
    }
    
    // 編集ページ遷移処理
     public function edit(){
        return view('userEdit');
    }
    
     //プロフィール情報更新処理
    public function update(Request $request){
        //バリデーション
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);
        // //バリデーション:エラー
        // if ($validator->fails()) {
        // return redirect('/userEdit')
        //     ->withInput()
        //     ->withErrors($validator);
        // }
        
        $user = Auth::user();
        
        //プロフィール画像のファイル名取得
        $file = $request->file('user_img');
        if( !empty($file) ){
            //ファイル名を取得
            $filename = $file->getClientOriginalName();
            //ファイル名をpublic/uploadフォルダに保存
            $move = $file->move('./upload/',$filename);
        }else{
            $filename = "$user->user_img";
        }
        
        $auth = Auth::user()->id;
        $user = User::find($auth);
        $user->name = $request->name;
        $user->user_img = $filename;
        $user->email = $request->email;
        $user->web_url = $request->web_url;
        $user->desc = $request->desc;
        $user->save();
        return redirect('/myPage');
    }
}
