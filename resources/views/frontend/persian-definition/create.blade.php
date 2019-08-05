@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Add a New Definition to Dictionary')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">ایجاد یک کلمه جدید</h1>

     {{-- Form for creating a new word (POST) --}}
     {{ Form::model($definition,[
     'method' => 'POST',
     'route' => ['persian.store', $word->id],
     'files' => TRUE,
     'id' => 'persian-form'
     ])}}

     {{-- Including form --}}
     @include('frontend.persian-definition.form')

     {{ Form::close() }}

@endsection

{{-- Ckedtor Script --}}
@section('script')
<script>
     CKEDITOR.replace( 'persian-editor', {
          language: 'fa',
          contentsLangDirection: 'rtl',
     });
</script>
@endsection