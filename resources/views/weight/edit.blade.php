@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('体重編集') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('weight.update', ['id' => $weight->id ]) }}">
                    @csrf
                    日付<br>
                    <input type="date" name="date" value="{{ $weight->date }}">
                    <br>
                    体重<br>
                    <input type="number" name="weight" step="0.1" value="{{ $weight->weight }}">
                    <br>
                    <input class="btn btn-info" type="submit" value="更新">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
