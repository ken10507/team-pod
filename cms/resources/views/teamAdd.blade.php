
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
  <h1>チーム追加ページ</h1>
  
  <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- チーム登録フォーム -->
        <!--<form action="{{ url('/teamAdd/add') }}" method="POST" class="form-horizontal">-->
        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/teamAdd/add') }}">
            {{ csrf_field() }}
          <fieldset>  
            
            <!-- チーム名 -->
            <div class="form-group">
                <label for="team" class="col-sm-3 control-label">チーム名</label>
                
                <div class="col-sm-6">
                    <input type="text" name="team_name" id="team-name" class="form-control">
                </div>
            </div>
            
            <!-- チーム詳細 -->
            <div class="form-group">
                <label for="team" class="col-sm-3 control-label">紹介文</label>
                
                <div class="col-sm-6">
                    <textarea name="team_desc" id="team_desc" type="text" placeholder="チームの目的,開発手法...etc" class="form-control" cols="50" rows="8" maxlength="1000"></textarea>
                    <!--<input type="text" name="team_desc" id="team_desc" class="form-control">-->
                </div>
            </div>
            
            <!-- チームイメージ名 -->
            <div class="form-group">
            <label for="team" class="col-sm-2 control-label">チームイメージ画像</label>
                <div class="col-sm-10">
                  <input name="team_img" class="form-control" type="file">
                </div>
            </div>
            
            <!-- チームイメージ名 -->
            <div class="form-group">
            <label for="team" class="col-sm-2 control-label">チームロゴ画像</label>
                <div class="col-sm-10">
                  <input name="team_logo" class="form-control" type="file">
                </div>
            </div>
            
            <!-- チーム登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i>チームクリエイト
                    </button>
                </div>
            </div>
            </fieldset> 
        </form>
        
    </div>

@endsection




