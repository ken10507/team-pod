@extends('layouts.app')

@section('content')
    
  <h1>メンバー追加ページ</h1>
  <h2>チームID{{ $team->id }}</h2>
  <p>招待したい人のメールアドレスを一人ずつ入力してください。</p>
  <p>＊登録済みユーザーの場合は自動で登録が完了します。</p>
  <p>＊未登録ユーザーの場合は招待メールが送信されます。</p>
  <p>＊招待メールから会員登録を行えば自動でチームに追加されます。</p>
  <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- item登録フォーム -->
        <!--<form action="{{ url('/itemAdd/add') }}" method="POST" class="form-horizontal">-->
        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/memberAdd/add') }}">
            {{ csrf_field() }}
          <fieldset>  
          
            <!-- メールアドレス入力フォーム1-->
            <div class="form-group">
                <label for="item" class="col-sm-3 control-label">メールアドレス</label>
                
                <div class="col-sm-6">
                    <input type="text" name="mail" id="mail" value="" class="form-control">
                </div>
            </div>
            
            <!--裏側でチームIDを持たせておく-->
            <input type="hidden" name="team_id" value="{{$team->id}}"/>
            
            <!-- チーム登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i>招待
                    </button>
                </div>
            </div>
            
          </fieldset>  
        </form>
        
    </div>

@endsection




