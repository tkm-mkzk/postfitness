@extends('layouts.app')

@section('content')
  <div class="container">
    @include('user.user')
    @include('user.tabs', ['hasBlogs' => false, 'hasLikes' => false])
    @foreach($followings as $person)
      @include('user.person')
    @endforeach
  </div>
@endsection
