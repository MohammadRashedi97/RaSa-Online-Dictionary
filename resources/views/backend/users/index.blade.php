@extends('layouts.backend.main')

@section('content')
<div class="content-wrapper">
     @include('partials.message')
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Users<small>Display All Users</small></h1>
          <ol class="breadcrumb">
               <li>
                    <a href="{{url('/backend/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
               </li>
               <li><a href="{{route('backend.users.index')}}">Users</a></li>
               <li class="active">All Users</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="row">
               <div class="col-xs-12">
                    <div class="box">
                         <div class="box-header clearfix">
                              <div class="text-center">
                                   <a href="{{route('backend.users.create')}}" class="btn btn-success"><i
                                             class="fa fa-plus"></i> Add New User</a>
                              </div>
                         </div>
                         <div class="box-body text-center">
                              @if(!$users->count())
                              <div class="alert alert-danger">
                                   <strong>No Record Found</strong>
                              </div>
                              @else
                              <table class="table table-bordered" id="words-table">
                                   <thead>
                                        <tr>
                                             <td>Edit & Delete</td>
                                             <td>ID</td>
                                             <td>Username</td>
                                             <td>Email</td>
                                             <td>Role</td>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                             <td>
                                                  {!! Form::open(['method' => 'DELETE' ,
                                                  'route' => ['backend.users.destroy' , $user->id]])
                                                  !!}
                                                  <a href="{{route('backend.users.edit' , $user->id)}}"
                                                       class="btn btn-xs btn-default">
                                                       <i class="fa fa-edit"></i>
                                                  </a>
                                                  <button onclick="return confirm('Are You Sure?')" type="submit"
                                                       class="btn btn-xs btn-danger">
                                                       <i class="fa fa-trash"></i>
                                                  </button>
                                                  {!! Form::close() !!}
                                             </td>
                                             <td style="font-size: 20px;">{{$user->id}}</td>
                                             <td>{{$user->name}}</td>
                                             <td>{{$user->email}}</td>
                                             <td>{{$user->roles[0]->display_name}}</td>
                                        </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                              @endif
                         </div>
                         <!-- /Box Body -->
                         <div class="box-footer clearfix">
                              {{ $users->links() }}
                         </div>
                    </div>
                    <!-- /Box -->
               </div>
          </div>
     </section>

</div>
@endsection

@section('script')
<script type="text/javascript">
     $('ul.pagination').addClass("no-margin pagination-sm");
     $('#users').addClass('active');
</script>
@endsection