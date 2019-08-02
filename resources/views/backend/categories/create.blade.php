@extends('layouts.backend.main')

@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Categories<small>Add new category</small></h1>
          <ol class="breadcrumb">
               <li>
                    <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
               </li>
               <li><a href="{{route('backend.categories.index')}}">Categories</a></li>
               <li class="active">Add new category</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="row">
               {!! Form::model($category,[
                    'method' => 'POST',
                    'route' => 'backend.categories.store',
                    'files' => TRUE,
                    'id'    => 'category-form'
               ])!!}

               @include('backend.categories.form')

               {!! Form::close() !!}

          </div>
     </section>

</div>
@endsection