
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
  <div class='main_box' style="width: 1440px;">
      <div class="item_box" style="width: 64%; margin: auto;">
  @foreach($results as $result)
  <div class="thumbnail" style="width: 300px; display: inline-block;">
                    <div class="item-image">
                        <img src="/uploadItem/{{ $result->item_img }}" style="width:100%; max-height:240px; min-height:240px;">
                    </div>
                <h3>{{ $result->title }}</h3>    
                <div>
                     @foreach( $result->categories as $category)
                     <p>カテゴリ：{{ $category->name }}</p>
                     @endforeach
                 </div>
                 <div>
                     @foreach( $result->languages as $language)
                     <p>開発言語：{{ $language->name }}</p>
                     @endforeach
                 </div>
                 <div>
                     @foreach( $result->periods as $period)
                     <p>開発期間：{{ $period->name }}</p>
                     @endforeach
                 </div>
                 <div>
                     @foreach( $result->teams as $team)
                     <p>チーム名：{{ $team->team_name }}</p>
                       @foreach( $team->users as $user)
                        <form style="display:table-cell; text-align:center" method="post" action="{{ url('/user') }}">{{ csrf_field() }}<input type="image" src="/upload/{{ $user->user_img }}" class="img-circle" style="width: 3rem; height: 3rem; border-radius: 50%;"/><input type="hidden" name="user_id" value="{{$user->id}}"/></form>
                       @endforeach
                     @endforeach
                 </div>
                <form style="display:table-cell; text-align:center" method="post" action="{{ url('/item') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$result->id}}"/><button style="width:110px; height:38px; border-radius: 10px; " class="btn btn-primary" type="submit">詳細</button></form>
                <form style="display:table-cell; text-align:center" method="post" action="{{ url('/team') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$team->id}}"/><button style="width:110px; height:38px; border-radius: 10px; " class="btn btn-primary" type="submit">開発チーム</button></form>
            </div>
  @endforeach
 </div> 
 </div> 
@endsection




