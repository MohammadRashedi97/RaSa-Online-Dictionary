@extends('layouts.backend.main')

@section('content')
<div class="content-wrapper">
     @include('partials.message')
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Dictionary<small>Display All Categories</small></h1>
          <ol class="breadcrumb">
               <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
               </li>
               <li><a href="{{route('backend.categories.index')}}">Categories</a></li>
               <li class="active">All Categories</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="row">
               <div class="col-xs-12">
                    <div class="box">
                         <div id="add-word" class="text-center">
                              <a href="{{route('backend.categories.create')}}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-plus"></i> <span>Add New Category</span></a>
                         </div>
                         <div class="box-header clearfix">
                         </div>
                         <div class="box-body text-center">
                              @if(!$categories->count())
                              <div class="alert alert-danger">
                                   <strong>No Record Found</strong>
                              </div>
                              @else
                              <table class="table table-bordered" id="words-table">
                                   <thead>
                                        <tr>
                                             <td>Edit & Delete</td>
                                             <td>Category Name</td>
                                             <td>Category ID</td>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                             <td>
                                                  {!! Form::open(['method' => 'DELETE' ,
                                                  'route' => ['backend.categories.destroy' , $category->id]])
                                                  !!}
                                                  <a href="{{route('backend.categories.edit' , $category->id)}}"
                                                       class="btn btn-xs btn-default">
                                                       <i class="fa fa-edit"></i>
                                                  </a>
                                                  <button onclick="return confirm('Are You Sure?')" type="submit"
                                                       class="btn btn-xs btn-danger">
                                                       <i class="fa fa-trash"></i>
                                                  </button>
                                                  {!! Form::close() !!}
                                             </td>
                                             <td style="font-size: 20px;">{{$category->name}}</td>
                                             <td>{{$category->id}}</td>
                                        </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                              @endif
                         </div>
                         <!-- /Box Body -->
                         <div class="box-footer clearfix text-center">
                              {{ $categories->links() }}
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
     $('#categories').addClass('active');
</script>
@endsection