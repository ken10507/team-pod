
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
  <div class='main_box' style="width: 1440px;">
      <div class="item_box" style="width: 64%; margin: auto;">
      <h1>チーム一覧</h1>
      @foreach($teams as $team)
      <div class="thumbnail" style="width: 300px; display: inline-block;">
                <div class="team-image">
                    <img src="/uploadTeam/{{ $team->team_img }}" style="width:100%; max-height:240px; min-height:240px;">
                </div>
            <h3 style="width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $team->team_name }}</h3>    
             <div>
                   @foreach( $team->users as $user)
                    <form style="display:table-cell; text-align:center" method="post" action="{{ url('/user') }}">{{ csrf_field() }}<input type="image" src="/upload/{{ $user->user_img }}" class="img-circle" style="width: 3rem; height: 3rem; border-radius: 50%;"/><input type="hidden" name="user_id" value="{{$user->id}}"/></form>
                   @endforeach
             </div>
            <form style="display:table-cell; text-align:center" method="post" action="{{ url('/team') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$team->id}}"/><button style="width:110px; height:38px; border-radius: 10px; " class="btn btn-primary" type="submit">詳細</button></form>
        </div>
      @endforeach
      </div>
  </div>
@endsection




