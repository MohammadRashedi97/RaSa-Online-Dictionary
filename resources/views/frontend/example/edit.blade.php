@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Edit an Existing Example')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">ویرایش مثال</h1>

     {{-- Form for creating a new word (PUT) --}}
     {!! Form::model($example,[
          'method' => 'PUT',
          'route' => ['example.update', $word->id, $example->id],
          'files' => TRUE,
          'id'    => 'example-form'
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