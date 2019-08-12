@extends('layouts.backend.main')

@section('title' , 'RaSa Online Dictionary - Add a New Definition to Dictionary')

@section('content')
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Dictionary<small>Add New Example</small></h1>
          <ol class="breadcrumb">
               <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
               </li>
               <li><a href="{{route('backend.dictionary.index')}}">Dictionary</a></li>
               <li class="active">Add new example</li>
          </ol>
     </section>

      <!-- Main content -->
     <section class="content">
          <div class="row">
               {{-- Form for creating a new word (POST) --}}
               {{ Form::model($example,[
               'method' => 'POST',
               'route' => ['backend.example.store', $word->id],
               'files' => TRUE,
               'id' => 'example-form'
               ])}}

               {{-- Including form --}}
               @include('backend.dictionary.example.form')

               {{ Form::close() }}
          </div>
     </section>

</div>
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