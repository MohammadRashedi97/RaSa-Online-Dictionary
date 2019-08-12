@extends('layouts.backend.main')

@section('title' , 'RaSa Online Dictionary - Edit an Existing Definition')

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
               {{-- Form for creating a new word (POST) --}}
               {!! Form::model($definition,[
               'method' => 'PUT',
               'route' => ['backend.english.update', $word->id, $definition->id],
               'files' => TRUE,
               'id' => 'english-form'
               ])!!}

               {{-- Including form --}}
               @include('backend.dictionary.english-definition.form')

               {!! Form::close() !!}
          </div>
     </section>

</div>
@endsection

{{-- Ckedtor Script --}}
@section('script')
<script>
     CKEDITOR.replace('english-editor');
</script>
@endsection