
<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
<div class='main_box' style="max-width: 1440px;">
  <div class="item_box" style="width: 64%; margin: auto;">    
  <h1>ポートフォリオ</h1>
    <div>
         <div class="item-image" style="width: 100%;">
            <img src="/uploadItem/{{ $item->item_img }}" style="width:100%;">
         </div>
         <h3>{{ $item->title }}</h3>
         <p>詳細：{{ $item->item_desc }}</p>
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
             @endforeach
         </div>
        <a class="btn-info btn-lg" href="{{ $item->item_url}}" target="_balnk">サービスのページを開く</a>
    </div>
 </div>
</div>
@endsection




