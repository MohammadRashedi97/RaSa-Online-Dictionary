@extends('layouts.backend.main')

@section('title' , 'MyBlog | Add New User')
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Users<small>Add new User</small></h1>
          <ol class="breadcrumb">
               <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
               </li>
               <li><a href="{{route('backend.users.index')}}">Users</a></li>
               <li class="active">Add new User</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="row">
               {!! Form::model($user,[
                    'method' => 'POST',
                    'route' => 'backend.users.store',
                    'files' => TRUE,
                    'id'    => 'user-form'
               ])!!}

               @include('backend.users.form')

               {!! Form::close() !!}
               </div>

          </div>
     </section>

</div>
@endsection