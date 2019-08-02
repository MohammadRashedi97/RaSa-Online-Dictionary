@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Add a New Definition to Dictionary')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">Create a New Definition</h1>

     {{-- Form for creating a new word (POST) --}}
     {!! Form::model($definition,[
     'method' => 'POST',
     'route' => ['english.store', $word->id],
     'files' => TRUE,
     'id' => 'definition-form'
     ])!!}

     {{-- Including form --}}
     @include('frontend.english-definition.form')

     {!! Form::close() !!}

@endsection

{{-- Ckedtor Script --}}
@section('script')
<script>
     CKEDITOR.replace('english-editor');
</script>
@endsection