@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Edit an Existing Definition')

@section('content')

     <br>
     {{-- Form Title --}}
     <h1 class="text-center" style="color: brown;">ویرایش تعریف انگلیسی</h1>

     {{-- Form for creating a new word (POST) --}}
     {!! Form::model($definition,[
     'method' => 'PUT',
     'route' => ['english.update', $word->id, $definition->id],
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