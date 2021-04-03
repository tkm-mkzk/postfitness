@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('体重') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('weight.create') }}">
                    <button type="submit" class="btn btn-primary">
                        記録
                    </button>
                    </form>

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">日付</th>
                        <th scope="col">体重</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($weights as $weight)
                    @if( ( $weight->user_id ) === ( Auth::user()->id ) )
                    <tr>
                    <th>{{ $weight->date }}</th>
                    <td>{{ $weight->weight }}</td>
                    <td>
                        @if(Auth::user()->id === $weight->user_id)
                        <form class="text-center" method="GET" action="{{ route('weight.edit', ['id' => $weight->id ]) }}">
                        @csrf
                        <input class="btn btn-info" type="submit" value="編集">
                        </form>
                        <form class="text-center" method="POST" action="{{ route('weight.destroy', ['id' => $weight->id ]) }}" id="delete_{{ $weight->id }}">
                        @csrf
                        <input class="btn btn-danger" type="submit" value="削除">
                        </form>
                        @endif
                    </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                    </table>
                    {{ $weights->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
