<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Language;
use App\Period;

class ItemController extends Controller
{
    // 基本処理
     public function index(Request $request){
         
         // リレーション用アイテム取得
        //  $items = Item::where('id',$request->id)->get()->first();
         
         // アイテムの情報取得
         $item = Item::where('id',$request->id)->first();
         
         // チーム付随情報取得
        //  $category = $items->categories;
        //  $language = $items->languages;
        //  $period = $items->periods;
         
         
        return view('item', [
            'item'=>$item
        ]);
    }
}
