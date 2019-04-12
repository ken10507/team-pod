
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
 <div class='main_box' style="max-width: 1440px;">
      <div class="item_box" style="width: 64%; margin: auto;">   
  
  <div style="display: flex;">
    <div style="width: 40%;">
      <!--プロフィールエリア-->
        <div class="col-sm-4" style="text-align: center;">
          <div class="thumbnail" style="width: 320px; margin: auto; margin-top: 24px;">
          <h3 class="mt-4">プロフィール</h3>
          <div class="user-image">
            <img src="/upload/{{ $user->user_img }}" class="img-circle" style="width: 15rem; height: 15rem; border-radius: 50%;">
          </div>
          <address>
            <strong>{{ $user->name }}</strong>
            <br>
            <a href="{{ $user->web_url }}" target="_balnk">webサイト</a>
          </address>
          <address>
             紹介文
             <br>
             <p>{{ $user->desc}}</p>
          </address>
          </div>
        </div>
    </div>    
       
    <div style="width: 60%;"> 
        <h2>所属チーム一覧</h2>
        @foreach($user->teams as $team)
        <div class="thumbnail">
            <p>チーム名{{ $team->team_name }}</p>
            <p>チーム詳細{{ $team->team_desc }}</p>
            <form style="display:table-cell; text-align:center" method="post" action="{{ url('/team') }}">{{ csrf_field() }}<input type="hidden" name="id" value="{{$team->id}}"/><button style="width:110px; height:38px; border-radius: 10px; margin-left:60px;" class="btn btn-primary" type="submit">チーム画面</button></form>
        </div>
        @endforeach
    </div>    
  </div>    
</div>
</div>
        
        
  
@endsection




