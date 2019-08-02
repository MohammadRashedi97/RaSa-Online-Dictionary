@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Add a New Word to Dictionary')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">Create a New Word</h1>

     {{-- Form for creating a new word (POST) --}}
     {!! Form::model($word,[
     'method' => 'POST',
     'route' => 'word.store',
     'files' => TRUE,
     'id' => 'word-form'
     ])!!}

     {{-- Including form --}}
     @include('frontend.word.create-form')

     {!! Form::close() !!}

@endsection

{{-- Ckedtor Script --}}
@section('script')
<script>
     CKEDITOR.replace( 'persian-editor', {
          language: 'fa',
          contentsLangDirection: 'rtl',
     });

     // CKEDITOR.replace('english-editor');
</script>
@endsection