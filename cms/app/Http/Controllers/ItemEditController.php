<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemEditController extends Controller
{
    //
    // 基本処理
     public function index(){
        return view('itemEdit');
    }
}
