@extends('layouts.app')
@section('content')

<h1>会員登録が完了しました！！</h1>
<p>以下よりTeam-podにログインしましょう！</p>

<a href="{{ url('/login') }}">Login</a>
@endsection
