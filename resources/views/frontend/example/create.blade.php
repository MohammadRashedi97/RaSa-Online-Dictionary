@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Add a New Example to Dictionary')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">ایجاد مثال جدید</h1>

     {{-- Form for creating a new word (POST) --}}
     {!! Form::model($example,[
     'method' => 'POST',
     'route' => ['example.store', $word->id],
     'files' => TRUE,
     'id' => 'example-form'
     ])!!}

     {{-- Including form --}}
     @include('frontend.example.form')

     {!! Form::close() !!}

@endsection

{{-- Ckedtor Script --}}
@section('script')
<script>
     CKEDITOR.replace( 'meaning-editor', {
          language: 'fa',
          contentsLangDirection: 'rtl',
     });

     CKEDITOR.replace('example-editor');
</script>
@endsection