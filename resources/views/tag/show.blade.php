@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('トレーニング一覧') }}</div>
                <div class="card-body">

                    <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
                    <div class="card-text text-right">
                        {{ $tag->blogs->count() }}件
                    </div>

                    @foreach($tag->blogs as $blog)
                        @include('blog.card')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
