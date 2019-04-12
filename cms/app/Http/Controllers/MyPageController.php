<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;
use App\Chat;
use Validator;


class MyPageController extends Controller
{
    // 基本処理
     public function index(){
        $users = Auth::user();
        $teams = $users->teams;
        $chats = Chat::where('user_id',$users->id)->get();
        
        return view('myPage', [
        'teams'=>$teams,
        'chats'=>$chats,
        ]); 
    }
}
