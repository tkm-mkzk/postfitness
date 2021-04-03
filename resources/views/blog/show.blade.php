@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('詳細') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">タイトル</th>
                            {{-- <th scope="col">鍛えた部位</th> --}}
                            <th scope="col">内容</th>
                            <th scope="col">投稿日時</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <th>{{ $blog->title }}</th>
                        {{-- <td>{{ $blog->target_site }}</td> --}}
                        <td>{{ $blog->content }}</td>
                        <td>{{ $blog->created_at }}</td>
                        </tr>
                        </tbody>
                    </table>

                    @if(Auth::user()->id === $blog->user_id)
                    <form class="text-center" method="GET" action="{{ route('blog.edit', ['id' => $blog->id ]) }}">
                    @csrf

                    <input class="btn btn-info" type="submit" value="編集">
                    </form>

                    <form class="text-center" method="POST" action="{{ route('blog.destroy', ['id' => $blog->id ]) }}" id="delete_{{ $blog->id }}">
                    @csrf
                    <a href="#" class="btn btn-danger" data-id="{{ $blog->id }}" onclick="deletePost(this);">削除</a>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除していいですか?')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
