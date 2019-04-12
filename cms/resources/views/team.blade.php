
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
<div class='main_box' style="max-width: 1440px;">
  <div class="item_box" style="width: 64%; margin: auto;">
  <div>
    @foreach($teams as $team)
      <div class="thumbnail">
      チームID{{ $team->id }}
      チーム名{{ $team->team_name }}
      チーム詳細{{ $team->team_desc }}
      チームメイン画像
      <div class="item-image" style="width: 300px;">
          <img src="/uploadTeam/{{ $team->team_img }}" style="width:100%;">
      </div>
      チームlogo画像
      <div class="item-image" style="width: 300px;">
          <img src="/uploadTeamLogo/{{ $team->team_logo }}" style="width:100%;">
      </div>
      @if(Auth::check())
        @if($team->users()->where('user_id',Auth::user()->id)->exists() !== false)
        <form style="display:table-cell; text-align:center" method="post" action="{{ url('/itemAdd') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$team->id}}"/><button style="width:150px; height:38px; border-radius: 10px; margin-left:60px;" class="btn btn-primary" type="submit">ポートフォリオ登録</button></form>
        <form style="display:table-cell; text-align:center" method="post" action="{{ url('/teamEdit') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$team->id}}"/><button style="width:110px; height:38px; border-radius: 10px; margin-left:60px;" class="btn btn-primary" type="submit">チーム編集</button></form>
        <form style="display:table-cell; text-align:center" method="post" action="{{ url('/memberAdd') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$team->id}}"/><button style="width:110px; height:38px; border-radius: 10px; margin-left:60px;" class="btn btn-primary" type="submit">メンバー追加</button></form>
        @endif
        @else
      @endif  
      @if(Auth::check())
        <!--チャットボタン-->
          <form style="display:table-cell; text-align:center" method="post" action="{{ url('/chat') }}">
                   
                   {{ csrf_field() }}
                   <input type="hidden" name="team_id" value="{{$team->id}}"/>
                   <input type="hidden" name="auth_id" value="{{Auth::user()->id}}"/>
                   <input type="hidden" name="name" value="{{Auth::user()->name}}"/>
                   <input type="hidden" name="team_name" value="{{$team->team_name}}"/>
            @if($team->users()->where('user_id',Auth::user()->id)->exists() === false)
            <button style="width:110px; height:38px; border-radius: 10px; margin-left:60px;" class="btn btn-primary" type="submit">お問い合わせ</button>
            @else
            <button style="width:110px; height:38px; border-radius: 10px; margin-left:60px; opacity: 0.5;" class="btn btn-primary" disabled="disabled">お問い合わせ</button>
            @endif
          </form>
        @else
        <!--ログイン画面へ飛ばす-->
        <a href="{{ url('/register') }}"><button　style="width:110px; height:38px; border-radius: 10px; margin-left:60px;" id="application" type="" class="btn btn-primary">チャット</button></a>
      @endif
      </div>
      <!--メンバー表示エリア-->
      <div>
        <h3>メンバー</h3>
        @foreach( $team->users as $user)
          <form style="display:table-cell; text-align:center" method="post" action="{{ url('/user') }}">{{ csrf_field() }}<input type="image" src="/upload/{{ $user->user_img }}" class="img-circle" style="width: 8rem; height: 8rem; border-radius: 50%;"/><input type="hidden" name="user_id" value="{{$user->id}}"/></form>
        @endforeach
      </div>
      
    @endforeach
    
    
    <!--所有ポートフォリオエリア-->
    <div>
      <h2>ポートフォリオ</h2>
      <div>
          @foreach($items as $item)
          <div class="thumbnail" style="width: 300px; display: inline-block;">
                    <div class="item-image">
                        <img src="/uploadItem/{{ $item->item_img}}" style="width:100%; max-height:240px; min-height:240px;">
                    </div>
                <h3 style="width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $item->title }}</h3>
                <div>
                     @foreach( $item->categories as $category)
                     <p>カテゴリ：{{ $category->name }}</p>
                     @endforeach
                 </div>
                 <div>
                     @foreach( $item->languages as $language)
                     <p>開発言語：{{ $language->name }}</p>
                     @endforeach
                 </div>
                 <div>
                     @foreach( $item->periods as $period)
                     <p>開発期間：{{ $period->name }}</p>
                     @endforeach
                 </div>
                <form style="display:table-cell; text-align:center" method="post" action="{{ url('/item') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$item->id}}"/><button style="width:110px; height:38px; border-radius: 10px; " class="btn btn-primary" type="submit">詳細</button></form>
            </div>
          @endforeach
      </div>
    </div>
      
    <!--メンバー側所有チャットエリア--> 
  @if(Auth::check())  
    @if($team->users()->where('user_id',Auth::user()->id)->exists() !== false)
      <div>
        <h2>チャットルーム一覧(メンバーのみ表示)</h2>
        @foreach($chats as $chat)
          <div class="thumbnail">
            {{$chat->name}}さんからのお問い合わせ
          <form style="display:table-cell; text-align:center" method="post" action="{{ url('/chatAdmin') }}">
            {{ csrf_field() }}
            <input type="hidden" name="team_id" value="{{ $chat->team_id }}"/>
            <input type="hidden" name="user_id" value="{{ $chat->user_id }}"/>
            <button style="width:110px; height:38px; border-radius: 10px; margin-left:60px;" class="btn btn-primary" type="submit">ルームへ</button>
          </form>
          </div>
        @endforeach
      </div>
     @endif 
     @else
  @endif    
  </div>
</div>
</div>
@endsection