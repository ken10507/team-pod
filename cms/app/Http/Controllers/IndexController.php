<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book; 
use App\User; 
use App\Item;
use App\Language;
use App\Period;
use App\Category;
use Auth;
use Validator;

class IndexController extends Controller
{
    // 基本処理
    public function index(){
        // アイテム全情報取得
        $items = Item::get();
        
        // カテゴリー全情報取得
        $categories = Category::get();
        
        // 開発言語全情報取得
        $languages = Language::get();
        
        // 開発期間全情報取得
        $periods = Period::get();
        
        return view('index', [
        'items'=>$items,
        'categories'=>$categories,
        'languages'=>$languages,
        'periods'=>$periods,
        ]); 
    }
    
    // カテゴリー検索処理
    public function category(Request $request){
        
        // 対象カテゴリを取得
        $categories = Category::where('id',$request->category)->first(); 
        // 紐付くItemを取得
        $results = $categories->items()->get();
        
        return view('search',[
            'results'=>$results,
            ]);
    }
    
    // 言語検索処理
    public function language(Request $request){
        
        // 対象カテゴリを取得
        $languages = Language::where('id',$request->language)->first(); 
        // 紐付くItemを取得
        $results = $languages->items()->get();
        
        return view('search',[
            'results'=>$results,
            ]);
            
    }
    
    // 開発期間検索処理
    public function period(Request $request){
        
        // 対象カテゴリを取得
        $periods = Period::where('id',$request->period)->first(); 
        // 紐付くItemを取得
        $results = $periods->items()->get();
        
        return view('search',[
            'results'=>$results,
            ]);
            
    }
    
    
    
}
