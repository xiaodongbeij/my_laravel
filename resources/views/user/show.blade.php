@extends('layouts.default')
@section('title', $user->name)

@section('content')
  <div class="row">
    <div class="offset-md-2 col-md-8">
      <section class="user_info">
        @include('shared._usre_info', ['user' => $user])
      </section>
      <section class="status">
        @if ($statuses->count() > 0)
          <ul class="list-unstyled">
            @foreach ($statuses as $status)
              @include('shared._status')
            @endforeach
          </ul>
          <div class="mt-5">
            {!! $statuses->render() !!}
          </div>
        @else
          <p>没有数据！</p>
        @endif
      </section>
    </div>
  </div>
@stop
