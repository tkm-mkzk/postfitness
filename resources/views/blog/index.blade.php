@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('トレーニング一覧') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('blog.create') }}">
                    <button type="submit" class="btn btn-primary">
                        新規記録
                    </button>
                    </form>

                    <form method="GET" action="{{ route('blog.index') }}" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" name='search' type="search" placeholder="キーワード" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                    </form>

                    <div class="container">
                        @foreach($blogs as $blog)
                            @include('blog.card')
                        @endforeach
                    </div>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
