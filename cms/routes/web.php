<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Book;
use Illuminate\Http\Request;

// Route::get('/', function () {
//       return view('index');
//  });

// TOPページ
Route::get('/', 'IndexController@index');
Route::post('/search/category', 'IndexController@category');
Route::post('/search/language', 'IndexController@language');
Route::post('/search/period', 'IndexController@period');


// マイページ
Route::get('/myPage', 'MyPageController@index');


// ユーザー詳細ページ
Route::post('/user', 'UserController@index');
Route::get('/user/list', 'UserController@list');

// ユーザー編集ページ
Route::get('/userEdit', 'UserController@edit');
Route::post('/userEdit/update', 'UserController@update');

// アイテム詳細ページ
Route::post('/item', 'ItemController@index');
// アイテム追加ページ
Route::post('/itemAdd', 'ItemAddController@index');
Route::post('/itemAdd/add', 'ItemAddController@add');
// アイテム編集ページ
Route::get('/itemEdit', 'ItemEditController@index');


// チーム詳細ページ
Route::post('/team', 'TeamController@index');
Route::get('/team/list', 'TeamController@list');

// チーム追加ページ
Route::get('/teamAdd', 'TeamAddController@index');
Route::post('/teamAdd/add', 'TeamAddController@add');
// チーム編集ページ
Route::post('/teamEdit', 'TeamEditController@index');

// メンバー追加ページ
Route::post('/memberAdd', 'MemberAddController@index');
Route::post('/memberAdd/add', 'MemberAddController@add');
// 会員登録とチーム追加同時処理
Route::get('/memberAdd/newmt/{id}', 'MemberAddController@index2');
Route::post('/memberAdd/add2', 'MemberAddController@add2');
// サンキューページ
Route::get('/thanks', 'MemberAddController@thanks');

// チャットページ
Route::post('/chat', 'ChatController@index');
Route::post('/chatAdmin', 'ChatController@chatAdmin');



Auth::routes();

Route::get('/home', 'IndexController@index');
