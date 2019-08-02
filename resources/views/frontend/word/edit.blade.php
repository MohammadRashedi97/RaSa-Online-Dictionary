@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Edit an Existing Word')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">Edit an Existing Word</h1>

     {{-- Form for creating a new word (PUT) --}}
     {!! Form::model($word,[
          'method' => 'PUT',
          'route' => ['word.update' , $word->id],
          'files' => TRUE,
          'id'    => 'word-form'
     ])!!}

     {{-- Including form --}}
     @include('frontend.word.edit-form')

     {!! Form::close() !!}

@endsection