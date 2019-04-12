<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Team;
use App\Item;
use App\Chat;
use App\Category;
use App\Language;
use App\Period;


class ItemAddController extends Controller
{
    //
    // 基本処理
     public function index(Request $request){
         
         //  チームIDを保持
         $teams = $request->id;
         //  カテゴリーデータ取得
         $categories = Category::get();
         //  言語データ取得
         $languages = Language::get();
         //  期間データ取得
         $periods = Period::get();
         
         return view('itemAdd', [
        'teams'=>$teams,
        'categorise'=>$categories,
        'languages'=>$languages,
        'periods'=>$periods,
        ]); 
    }
    
    // item追加処理
    public function add (Request $request){
        
        // $this->validate($request, [
        //     'title'  => 'required',
        //     'item_img' => 'file|image',
        //     'item_url' => 'url',
        //     'item_desc' => 'required|string',
        // ]);
        
        
         //バリデーション
        $validator = Validator::make($request->all(), [
            'title'  => 'required',
            'item_img' => 'file|image',
            'item_url' => 'url',
            'item_desc' => 'required|string',
        ]);
        
        //バリデーション:エラー 
        if ($validator->fails()) {
            return view("/itemAdd",[
                'teams'=>$request->team_id,
                ])
                ->withInput()
                ->withErrors($validator);
        }
        
        
        //以下に登録処理を記述（Eloquentモデル）
        //プロフィール画像のファイル名取得
        $file = $request->file('item_img');
        if( !empty($file) ){
            //ファイル名を取得
            $filename = $file->getClientOriginalName();
            //ファイル名をpublic/uploadフォルダに保存
            // $path = $request->file('item_img')->storeAs('public/upload/', $filename);
            // $move = $file->move('./upload/',$filename);
            $move = $file->move('./uploadItem/',$filename);
        }else{
            $x = rand(1, 10);
            $filename = "TeamMarket$x.jpg";
        }
        
        
        // Eloquent モデル
        // item情報登録
        $items = new Item;
        $items->title = $request->title;
        $items->item_desc = $request->item_desc;
        $items->item_img = $filename;
        $items->item_url = $request->item_url;
        $items->save(); 
        
        // チーム情報登録
        $teams = Team::where('id',$request->team_id)->get()->first();
        $teams->id = $teams->id;
        $teams->save();
        
        // カテゴリー情報登録
        $categories = Category::where('id',$request->categories)->get()->first();
        $categories->id = $categories->id;
        $categories->save();
        
        // 言語情報登録
        $languages = Language::where('id',$request->languages)->get()->first();
        $languages->id = $languages->id;
        $languages->save();
        
        // 開発期間情報登録
        $periods = Language::where('id',$request->periods)->get()->first();
        $periods->id = $periods->id;
        $periods->save();
        
        // リレーションで中間テーブル登録処理
        $teams->items()->save($items);
        $items->categories()->save($categories);
        $items->languages()->save($languages);
        $items->periods()->save($periods);
        
        // チームとアイテムの情報をそのまま持っていく
        $team = Team::where('id',$request->team_id)->get();
        $item = $teams->items;
        
        // チャットの情報
        $chats = Chat::where('team_id',$request->team_id)->get();
        
          return view('team', [
            'teams'=>$team,
            'items'=>$item,
            'chats'=>$chats
            ]); 
        
        
    }

}