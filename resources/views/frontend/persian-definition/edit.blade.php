@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Edit an Existing Definition')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">ویرایش معنای فارسی</h1>

     {{-- Form for creating a new word (POST) --}}
     {!! Form::model($definition,[
     'method' => 'PUT',
     'route' => ['persian.update', $word->id, $definition->id],
     'files' => TRUE,
     'id' => 'persian-form'
     ])!!}

     {{-- Including form --}}
     @include('frontend.persian-definition.form')

     {!! Form::close() !!}

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