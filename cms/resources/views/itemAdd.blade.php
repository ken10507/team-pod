
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
  <h1>アイテム追加ページ</h1>
  <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- item登録フォーム -->
        <!--<form action="{{ url('/itemAdd/add') }}" method="POST" class="form-horizontal">-->
        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/itemAdd/add') }}">
            {{ csrf_field() }}
          <fieldset>  
            <!-- item名 -->
            <div class="form-group">
                <label for="item" class="col-sm-3 control-label">ポートフォリオ名</label>
                
                <div class="col-sm-6">
                    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control">
                </div>
            </div>
            
            <!-- サービスイメージ名 -->
            <div class="form-group">
            <label for="item" class="col-sm-2 control-label">サービスイメージ画像</label>
                <div class="col-sm-10">
                  <input name="item_img" class="form-control" type="file">
                </div>
            </div>
            
            <!-- サービスURL -->
            <div class="form-group">
                <label for="item" class="col-sm-3 control-label">サービスURL</label>
                
                <div class="col-sm-6">
                    <input type="text" name="item_url" id="item_url" value="" class="form-control">
                </div>
            </div>
            
             <!--チーム詳細 -->
            <div class="form-group">
                <label for="item" class="col-sm-3 control-label">詳細(1000文字以内)</label>
                
                <div class="col-sm-6">
                    <textarea name="item_desc" id="item_desc" type="text" placeholder="サービスの概要,クライアント,開発コスト,技術的なことなど...etc" class="form-control" cols="50" rows="8" maxlength="1000"></textarea>
                    <!--<input type="text" name="item_desc" id="item_desc" class="form-control">-->
                </div>
            </div>
            
             <!--カテゴリ -->
            <div class="form-group">
                <label for="item" class="col-sm-3 control-label">カテゴリ</label>
                <select name="categories" id="categories" class="form-control">
                  @foreach($categorise as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
            </div>
            
            <!--言語 -->
            <div class="form-group">
                <label for="item" class="col-sm-3 control-label">使用言語</label>
                <select name="languages" id="languages" class="form-control">
                  @foreach($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                  @endforeach
                </select>
            </div>
            
            <!--期間 -->
            <div class="form-group">
                <label for="item" class="col-sm-3 control-label">開発期間</label>
                <select name="periods" id="periods" class="form-control">
                  @foreach($periods as $period)
                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                  @endforeach
                </select>
            </div>
            
            <!--裏側で所有しているチームデータ-->
            <input type="hidden" name="team_id" id="team_id" value="{{$teams}}" class="form-control">
            
            <!-- チーム登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i>登録
                    </button>
                </div>
            </div>
          </fieldset>  
        </form>
        
    </div>
@endsection




