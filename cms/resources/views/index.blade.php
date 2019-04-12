
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
  <div class='main_box' style="max-width: 1440px;">
      <div class="item_box" style="width: 64%; margin: auto;">
        <h1>TOPページ</h1>
          <div class="btn_box" style="height:70px;">
            <a class="btn-info btn-lg" href="{{ url('/team/list') }}">チームを探す</a>
            <a class="btn-info btn-lg" href="{{ url('/user/list') }}">ユーザーを探す</a>
          </div>
        <div class="list_box" style="width: 30%;">  
            <!--カテゴリ検索-->
            <a href="#menuOne" class="list-group-item" data-toggle="collapse" data-target="#menuOne" data-parent="#menu">
            <span class="glyphicon glyphicon-th-list">カテゴリーから絞る</span>
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
            </a>
              <div id="menuOne" class="sublinks collapse">
                  @foreach($categories as $category)
                  <form method="post" action="{{ url('/search/category') }}">{{ csrf_field() }}<input type="hidden" name="category" value="{{$category->id}}"/><button class="list-group-item" type="submit">{{$category->name}}</button></form>
                  @endforeach
              </div>
              
            <!--開発言語検索-->
            <a href="#menuOne" class="list-group-item" data-toggle="collapse" data-target="#menuTwo" data-parent="#menu">
            <span class="glyphicon glyphicon-th-list">開発言語から絞る</span>
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
            </a>
            <div id="menuTwo" class="sublinks collapse">
              @foreach($languages as $language)
              <form method="post" action="{{ url('/search/language') }}">{{ csrf_field() }}<input type="hidden" name="language" value="{{$language->id}}"/><button class="list-group-item" type="submit">{{$language->name}}</button></form>
              @endforeach
            </div> 
            
            <!--開発期間検索-->
            <a href="#menuOne" class="list-group-item" data-toggle="collapse" data-target="#menuThree" data-parent="#menu">
            <span class="glyphicon glyphicon-th-list">期間から絞る</span>
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
            </a>
            <div id="menuThree" class="sublinks collapse">
              @foreach($periods as $period)
              <form method="post" action="{{ url('/search/period') }}">{{ csrf_field() }}<input type="hidden" name="period" value="{{$period->id}}"/><button class="list-group-item" type="submit">{{$period->name}}</button></form>
              @endforeach
            </div> 
        </div>
        <h2>ポートフォリオ一覧</h2>
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
                 <div>
                     @foreach( $item->teams as $team)
                     <p>チーム名：{{ $team->team_name }}</p>
                       @foreach( $team->users as $user)
                        <form style="display:table-cell; text-align:center" method="post" action="{{ url('/user') }}">{{ csrf_field() }}<input type="image" src="/upload/{{ $user->user_img }}" class="img-circle" style="width: 3rem; height: 3rem; border-radius: 50%;"/><input type="hidden" name="user_id" value="{{$user->id}}"/></form>
                       @endforeach
                     @endforeach
                 </div>
                <form style="display:table-cell; text-align:center" method="post" action="{{ url('/item') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$item->id}}"/><button style="width:110px; height:38px; border-radius: 10px; " class="btn btn-primary" type="submit">詳細</button></form>
                <form style="display:table-cell; text-align:center" method="post" action="{{ url('/team') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$team->id}}"/><button style="width:110px; height:38px; border-radius: 10px; " class="btn btn-primary" type="submit">開発チーム</button></form>
            </div>
        @endforeach
  </div>
@endsection




