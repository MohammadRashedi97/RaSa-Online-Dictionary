@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary')

@section('search')
     @include('partials.message')
     @include('layouts.frontend.search')
@endsection

@section('content')
<div id="word-definitions">
     {{-- title-Word and pronounciations --}}
     <div id="word-title" class="text-center">
          <h1>{{$term}}</h1>
     </div>

     <hr class="blue-hr">

     <div lang="fa" class="text-right" style="direction: rtl;">
          <div class="section-title" style="position: relative;top:-2px;">
               کلمات متناظر
          </div>
     </div>

     <br>

     @foreach ($words as $word)
          <div class="card text-center">
               <div class="card-header">
                    معرفی کلمه
               </div>
               <div class="card-body">
                    <h5 class="card-title text-center">{!! $word->word !!}</h5>
                    <div class="card-text text-right" style="direction: rtl">
                         {!! str_limit($word->persianDefinitions[0]->persianDefinition, $limit = 70, $end = '...') !!}
                    </div>
                    <a href="{{route('word.show', $word->id)}}" class="btn btn-primary">مشاهده واژه</a>
               </div>
          </div>
     @endforeach
     <br><br>
</div>
@endsection