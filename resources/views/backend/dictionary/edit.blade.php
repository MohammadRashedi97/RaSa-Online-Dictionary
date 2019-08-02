@extends('layouts.backend.main')

@section('content')
<!-- Main content -->
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Dictionary<small>Add New Word</small></h1>
          <ol class="breadcrumb">
               <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
               </li>
               <li><a href="{{route('backend.dictionary.index')}}">Dictionary</a></li>
               <li class="active">Add new word</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="row">
               {!! Form::model($word,[
                    'method' => 'PUT',
                    'route' => ['backend.dictionary.update', $word->id],
                    'files' => TRUE,
                    'id'    => 'word-form'
               ])!!}

               @include('backend.dictionary.form')

               {!! Form::close() !!}
               </div>

          </div>
     </section>

</div>
@endsection

@section('script')
<script>
     CKEDITOR.replace( 'persian-editor', {
          language: 'fa',
          contentsLangDirection: 'rtl',
     });

     CKEDITOR.replace('english-editor');
</script>
@endsection