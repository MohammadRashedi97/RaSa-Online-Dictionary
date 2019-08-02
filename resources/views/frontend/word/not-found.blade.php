@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary')

{{-- Word not found view --}}
@section('content')
    <div class="text-center" id="not-found">
        <br><br><br><br><br>
         <h1>Word Not Found!</h1>
         <i class="fa fa-arrow-down" style="font-size: 38px;margin-top: 15px;"></i>
         @include('layouts.frontend.search')
         <br><br><br><br><br><br><br><br><br>
    </div>
@endsection