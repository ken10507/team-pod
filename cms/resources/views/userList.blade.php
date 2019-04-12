
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
  <div class='main_box' style="width: 1440px;">
      <div class="item_box" style="width: 64%; margin: auto;">
        <h1>ユーザー一覧</h1>
  @foreach($users as $user)
  <!--プロフィールエリア-->
        <div class="col-sm-4" style="text-align: center;">
          <div class="thumbnail" style="width: 200px; margin: auto; margin-top: 24px;">
          <div class="user-image">
            <img src="/upload/{{ $user->user_img }}" class="img-circle" style="width: 15rem; height: 15rem; border-radius: 50%;">
          </div>
          <address>
            <strong>{{ $user->name }}</strong>
            <br>
            <a href="{{ $user->web_url }}" target="_balnk">webサイト</a>
          </address>
          <address>
            <form style="text-align:center" method="post" action="{{ url('/user') }}">{{ csrf_field() }}<input type="hidden" name="user_id" value="{{$user->id}}"/><button style="width:110px; height:38px; border-radius: 10px; " class="btn btn-primary" type="submit">詳細</button></form>
          </address>
          </div>
        </div>
  @endforeach
  </div>
 </div> 
@endsection




