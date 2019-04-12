
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
  <h1>ユーザー編集ページ</h1>
  <div class="row" style="width: 90%; margin: 0 auto;">
    <div class="col-md-4" style="width: 100%;">
      <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/userEdit/update') }}">
        {{ csrf_field()}}
        <fieldset>

          <!-- Form Name -->
          <legend>プロフィール編集</legend>
          
          <div class="form-group">
            <label for="user_img" class="col-sm-2 control-label">プロフィール画像登録</label>
            <div class="col-sm-10">
              <img src="upload/{{ Auth::user()->user_img }}" width="100">
              <input  name="user_img" class="form-control" type="file" value="{{ Auth::user()->user_img }}">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">名前</label>
            <div class="col-sm-10">
              <input name="name" type="text" placeholder="名前" class="form-control" value="{{ Auth::user()->name }}">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">email</label>
            <div class="col-sm-10">
              <input name="email" type="text" placeholder="email" class="form-control" value="{{ Auth::user()->email }}">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">webURL</label>
            <div class="col-sm-10">
              <input name="web_url" type="text" placeholder="web_url" class="form-control" value="{{ Auth::user()->web_url }}">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">自己紹介文(1000文字以内)</label>
            <div class="col-sm-10">
              <textarea name="desc" type="text" placeholder="自己紹介文" class="form-control" cols="50" rows="8" maxlength="1000">{{ Auth::user()->desc }}</textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
@endsection




