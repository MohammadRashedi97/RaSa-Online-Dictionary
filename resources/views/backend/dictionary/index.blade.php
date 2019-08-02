@extends('layouts.backend.main')

@section('content')
<div class="content-wrapper">
    @include('partials.message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dictionary<small>Display All Dictionary Words</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li><a href="{{route('backend.dictionary.index')}}">Dictionary</a></li>
            <li class="active">All Words</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header clearfix">
                        <div>
                            <p class="text-center" style="font-weight: bold;font-size: 20px;color: red;">Navigation Links</p>
                            @foreach (range('A', 'Z') as $char)
                                <a href="{{route('backend.alphabetNavigation', $char)}}" id="capital-link">{{$char}}</a>
                            @endforeach
                        </div>
                        <div id="add-word" class="text-center">
                            <a href="{{route('backend.dictionary.create')}}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-plus"></i> <span>Add New Word</span></a>
                        </div>
                    </div>
                    <div class="box-body text-center">
                        @if(!$words->count())
                        <div class="alert alert-danger">
                            <strong>No Record Found</strong>
                        </div>
                        @else
                            <table class="table table-bordered" id="words-table">
                                <thead>
                                    <tr>
                                        <td>Edit & Delete</td>
                                        <td>ID</td>
                                        <td>Word</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($words as $word)
                                    <tr>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE' ,
                                            'route' => ['backend.dictionary.destroy' , $word->id]])
                                            !!}
                                                <a href="{{route('backend.dictionary.edit' , $word->id)}}" class="btn btn-xs btn-default">
                                                        <i class="fa fa-edit"></i>
                                                </a>
                                                <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{{$word->id}}</td>
                                        <td>
                                            <a href="{{route('backend.dictionary.show', $word->id)}}">
                                                {{$word->word}}
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!-- /Box Body -->
                    <div class="box-footer clearfix text-center">
                        {{ $words->links() }}
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
     $('#dictionary').addClass('active');
</script>
@endsection