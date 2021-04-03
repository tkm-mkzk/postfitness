@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('体重記録') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('weight.store') }}">
                    @csrf
                    日付<br>
                    <input type="date" name="date">
                    <br>
                    体重<br>
                    <input type="number" name="weight" step="0.1">
                    <br>
                    <input class="btn btn-info" type="submit" value="記録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
