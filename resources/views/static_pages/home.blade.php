@extends('layouts.default')
@section('title', '美化页面')
@section('content')
  <div class="jumbotron">
    <h1>Hello Laravel</h1>
    <p class="lead">
      你现在所看到的是 <a href="https://www.baidu.com">Laravel 入门教程</a>的示例项目主页
    </p>
    <p>
      一切将从这里开始
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('users.create') }}" role="button">现在注册</a>
    </p>
  </div>
@stop
