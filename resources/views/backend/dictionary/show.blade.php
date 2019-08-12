@extends('layouts.backend.main')

@section('content')
<div class="content-wrapper">
    @include('partials.message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dictionary<small>Display Everything for {{$word->word}}</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li><a href="{{route('backend.dictionary.index')}}">Dictionary</a></li>
            <li class="active">{{$word->word}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body text-center">
                        <h3 class="alert alert-success">Persian Definitions</h3>
                        @if(!$persianDefinitions->count())
                        <div class="alert alert-danger">
                            <strong>No Persian Definition Found</strong>
                        </div>
                        @else
                            <a href="{{route('backend.persian.create', $word->id)}}" class="btn btn-primary">+ Add New Persian Definition</a>
                            <br><br>
                            <table class="table table-bordered" id="words-table">
                                <thead>
                                    <tr>
                                        <td>Edit & Delete</td>
                                        <td>ID</td>
                                        <td>Word</td>
                                        <td>Category</td>
                                        <td>Definition</td>
                                        <td>Author</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($persianDefinitions as $persianDefinition)
                                    <tr>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE' ,
                                            'route' => ['backend.persian.destroy' , $word->id, $persianDefinition->id]])
                                            !!}
                                                <a href="{{route('backend.persian.edit' , [$word->id, $persianDefinition->id])}}" class="btn btn-xs btn-default">
                                                        <i class="fa fa-edit"></i>
                                                </a>
                                                <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{{$persianDefinition->id}}</td>
                                        <td>{{$word->word}}</td>
                                        <td>{{$persianDefinition->category->name}}</td>
                                        <td style="direction: rtl;">{!! str_limit($persianDefinition->persianDefinition, $limit = 50, $end = '...') !!}</td>
                                        <td>{{$persianDefinition->user->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <br><br><br>


                        <h3 class="alert alert-warning">English Definitions</h3>
                        @if(!$englishDefinitions->count())
                        <div class="alert alert-danger">
                            <strong>No English Definition Found</strong>
                        </div>
                        @else
                            <a href="{{route('backend.english.create', $word->id)}}" class="btn btn-primary">+ Add New English Definition</a>
                            <br><br>
                            <table class="table table-bordered" id="words-table">
                                <thead>
                                    <tr>
                                        <td>Edit & Delete</td>
                                        <td>ID</td>
                                        <td>Word</td>
                                        <td>Definition</td>
                                        <td>Author</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($englishDefinitions as $englishDefinition)
                                    <tr>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE' ,
                                            'route' => ['backend.english.destroy' , $word->id, $englishDefinition->id]])
                                            !!}
                                                <a href="{{route('backend.english.edit' , [$word->id, $englishDefinition->id])}}" class="btn btn-xs btn-default">
                                                        <i class="fa fa-edit"></i>
                                                </a>
                                                <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{{$englishDefinition->id}}</td>
                                        <td>{{$word->word}}</td>
                                        <td>{!! str_limit($englishDefinition->englishDefinition, $limit = 50, $end = '...') !!}</td>
                                        <td>{{$englishDefinition->user->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif


                        <br><br><br>


                        <h3 class="alert alert-danger">Examples</h3>
                        @if(!$examples->count())
                        <div class="alert alert-danger">
                            <strong>No Examples Found</strong>
                        </div>
                        @else
                            <a href="{{route('backend.example.create', $word->id)}}" class="btn btn-primary">+ Add New Example</a>
                            <br><br>
                            <table class="table table-bordered" id="words-table">
                                <thead>
                                    <tr>
                                        <td>Edit & Delete</td>
                                        <td>ID</td>
                                        <td>Word</td>
                                        <td>Example</td>
                                        <td>Meaning</td>
                                        <td>Author</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($examples as $example)
                                    <tr>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE' ,
                                            'route' => ['backend.example.destroy' , $word->id, $example->id]])
                                            !!}
                                                <a href="{{route('backend.example.edit' , [$word->id, $example->id])}}" class="btn btn-xs btn-default">
                                                        <i class="fa fa-edit"></i>
                                                </a>
                                                <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{{$example->id}}</td>
                                        <td>{{$word->word}}</td>
                                        <td>{!! str_limit($example->example, $limit = 50, $end = '...') !!}</td>
                                        <td style="direction: rtl;">{!! str_limit($example->meaning, $limit = 50, $end = '...') !!}</td>
                                        <td>{{$example->user->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                    <!-- /Box Body -->
                    {{-- <div class="box-footer clearfix text-center">
                        {{ $words->links() }}
                    </div> --}}
                </div>
                <!-- /Box -->
            </div>
        </div>
    </section>

</div>

@endsection