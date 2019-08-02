@extends('layouts.backend.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body text-center">
                        <h3>This is the dashboard for Rasa Dictionary</h3>
                        <p class="lead text-muted">Welcome {{Auth::user()->name}}</p>

                        <h4>Add Something!</h4>
                        <p><a href="{{route('backend.dictionary.create')}}" class="btn btn-primary">Write a new word</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@section('script')
     <script type="text/javascript">
          $('#dashboard').addClass('active');
     </script>
@endsection