@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br><br>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <hr>
                    <a  href="{{route('index')}}" class="btn btn-primary">Search For Something</a>
                    <a href="{{route('word.create')}}" class="btn btn-primary float-right">+ Add Word</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
