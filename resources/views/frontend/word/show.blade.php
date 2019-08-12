@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary')

@section('search')
@include('partials.message')
@include('layouts.frontend.search')
@endsection

@section('content')
{{-- The whole content container --}}
<div id="word-definitions">

     {{-- title-Word and pronounciations --}}
     <div id="word-title">
          <div class="row">
               <div class="col-4">
                    <h1 id="word" style="display: inline">
                         {!! $word->word !!}
                    </h1>
               </div>

               <div class="col-4 text-center" style="margin-top: 20px;">
                    <span><a id="edit-link" href="{{route('word.edit', $word->id)}}">ویرایش کلمه</a></span>
               </div>

               <div class="col-4">
                    <i class="fa fa-volume-up float-right" id="pronounce-US"> US</i>
                    <i class="fa fa-volume-up float-right" id="pronounce-UK"> UK</i>
               </div>
          </div>
     </div>

     <hr class="blue-hr">

     <div lang="fa" class="text-right" style="direction: rtl;">
          <div class="section-title" style="position: relative;top:-2px;">
               بررسی واژه
          </div>
     </div>

     @if (count($persianDefinitions) === 0)
          <br>
          <a href="{{route('persian.create', $word->id)}}" class="btn btn-success add-definition center" style="width: 250px;margin-top: 20px;">
               یک معنای فارسی اضافه کنید +
          </a>
     @else
          <div id="persian-definitions">

               {{-- list definitions for each category --}}
               @foreach($categories as $category)

                    <br>

                    <div class="category-box">

                         @if($loop->first)
                              @auth
                                   <a href="{{route('persian.create', $word->id)}}" class="btn btn-success add-definition">اضافه کردن معنای فارسی جدید +</a>
                              @endauth
                         @endif

                         {{-- Don't echo category name if it's عمومی --}}
                         @if($category->name != 'عمومی')
                              <h3 class="text-center category-header">{{ $category->name }}</h3>
                         @endif

                         {{-- Echo definitions in each category --}}
                         @foreach ($persianDefinitions as $persianDefinition)

                              @if($persianDefinition->category_id == $category->id)

                                   {{-- Persian Definition --}}
                                   <div lang="fa" class="text-right persian-definition">
                                        <b style="color: #7D1874;font-size: 20px;">معنی : </b>
                                        {!! $persianDefinition->persianDefinition !!}
                                   </div>

                                   {{-- <br> --}}

                                   {{-- Botton row containing edit and delete buttons and like and dislike buttons --}}
                                   <div class="row">

                                        {{-- Edit Button --}}
                                        <div class="col-4">
                                             @auth
                                             <a href="{{route('persian.edit' , [$word->id, $persianDefinition->id])}}"
                                                  class="btn btn-success edit">ویرایش</a>
                                             @endauth
                                        </div>

                                        {{-- Row Containing Like and Dislike Buttons --}}
                                        <div class="col-4">
                                             <div class="row">

                                                  {{-- Like Button --}}
                                                  <div class="col-6 text-right">
                                                       <div class="persian-like-div" data-id="{{$persianDefinition->id}}">
                                                            <i style="color: green;cursor: pointer" class="fa fa-thumbs-up"></i>
                                                            <span class="like">{{ $persianDefinition->like_count }}</span>
                                                       </div>
                                                  </div>

                                                  {{-- Dislike Button --}}
                                                  <div class="col-6 text-left">
                                                       <div class="persian-dislike-div" data-id="{{$persianDefinition->id}}">
                                                            <i style="color: red;cursor: pointer" class="fa fa-thumbs-down"></i>
                                                            <span class="dislike">{{ $persianDefinition->dislike_count }}</span>
                                                       </div>
                                                  </div>

                                             </div>
                                        </div>

                                        {{-- Delete Button --}}
                                        <div class="col-4 text-right">
                                             @role('admin')
                                                  {{ Form::open(['method' => 'DELETE' ,
                                                                 'route' => ['persian.destroy', $word->id, $persianDefinition->id]])
                                                                 }}
                                                  <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger delete">
                                                       حذف
                                                  </button>
                                                  {{ Form::close() }}
                                             @endrole
                                        </div>

                                   </div>

                                   <br>
                                   @if (!$loop->last)
                                        <hr class="sky-hr">
                                   @endif

                              @endif

                         @endforeach
                    </div>

                    @if (!$loop->last)
                    <hr class="blue-hr" style="margin-top: -4px;">
                    @endif

               @endforeach
          </div>
     @endif


     <hr class="blue-hr" style="margin-top: -4px;">
     <div lang="fa" class="text-right" style="direction: rtl;">
          <div class="section-title" style="position: relative;top:-2px;">
               تعاریف واژه
          </div>
     </div>


     @if (count($englishDefinitions) === 0)
          <br>
          <a href="{{route('english.create', $word->id)}}" class="btn btn-success add-definition center" style="width: 250px;margin-top: 20px;">
               یک تعریف انگلیسی اضافه کنید +
          </a>
     @else
          <div id="english-definitions">

               <br>

               @auth
                    <a href="{{route('english.create', $word->id)}}" class="btn btn-success add-definition">
                         اضافه کردن تعریف انگلیسی جدید +
                    </a>
               @endauth

               @foreach ($englishDefinitions as $englishDefinition)

                    <div class="english-definition">
                         <b style="font-size: 20px;display: inline;color: #7D1874;"> &bull; تعریف : </b>
                         {!! $englishDefinition->englishDefinition !!}
                    </div>

                    <div class="row">

                         {{-- Edit Button --}}
                         <div class="col-4">
                              @auth
                                   <a href="{{route('english.edit' , [$word->id, $englishDefinition->id])}}" class="btn btn-success edit">
                                        ویرایش
                                   </a>
                              @endauth
                         </div>

                         {{-- Row Containing Like and Dislike Buttons --}}
                         <div class="col-4">
                              <div class="row">

                                   {{-- Like Button --}}
                                   <div class="col-6 text-right">
                                        <div class="english-like-div" data-id="{{$englishDefinition->id}}">
                                             <i style="color: green;cursor: pointer" class="fa fa-thumbs-up"></i>
                                             <span class="like">{{ $englishDefinition->like_count }}</span>
                                        </div>
                                   </div>

                                   {{-- Dislike Button --}}
                                   <div class="col-6 text-left">
                                        <div class="english-dislike-div" data-id="{{$englishDefinition->id}}">
                                             <i style="color: red;cursor: pointer" class="fa fa-thumbs-down"></i>
                                             <span class="dislike">{{ $englishDefinition->dislike_count }}</span>
                                        </div>
                                   </div>

                              </div>
                         </div>

                         {{-- Delete Button --}}
                         <div class="col-4 text-right">
                              @role('admin')
                                   {{ Form::open(['method' => 'DELETE' ,
                                   'route' => ['english.destroy' , $word->id, $englishDefinition->id]])
                                   }}
                                   <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger delete">
                                        حذف
                                   </button>
                                   {{ Form::close() }}
                              @endrole
                         </div>
                    </div>

                    <br>

                    @if (!$loop->last)
                         <hr class="sky-hr">
                    @endif

               @endforeach
          </div>

     @endif


     <hr class="blue-hr" style="margin-top: -4px;">
     <div lang="fa" class="text-right" style="direction: rtl;">
          <div class="section-title" style="position: relative;top:-2px;">
               مثال ها
          </div>
     </div>

     @if (count($examples) === 0)
          <br>
          <a href="{{route('example.create', $word->id)}}" class="btn btn-success add-definition center" style="width: 250px;margin-top: 20px;">
               یک مثال جدید اضافه کنید +
          </a>
     @else

          <div id="examples">

               <br>

               @auth
                    <a href="{{route('example.create', $word->id)}}" class="btn btn-success add-definition">
                         اضافه کردن مثال جدید +
                    </a>
               @endauth

               @foreach ($examples as $example)

                    <div class="example">
                         <b style="color:#7D1874;">مثال : </b> {!! $example->example !!}
                    </div>

                    <div class="meaning text-right">
                         @if(!empty($example->meaning))
                         <b style="color:#7D1874;"> ترجمه : </b> {!! $example->meaning !!}
                         @endif
                    </div>

                    <div class="row">

                         {{-- Edit Button --}}
                         <div class="col-4">
                              @auth
                                   <a href="{{route('example.edit' , [$word->id, $example->id])}}"
                                   class="btn btn-success edit">ویرایش</a>
                              @endauth
                         </div>

                          {{-- Row Containing Like and Dislike Buttons --}}
                         <div class="col-4">
                              <div class="row">

                                   {{-- Like Button --}}
                                   <div class="col-6 text-right">
                                        <div class="example-like-div" data-id="{{$example->id}}">
                                             <i style="color: green;cursor: pointer" class="fa fa-thumbs-up"></i>
                                             <span class="like">{{ $example->like_count }}</span>
                                        </div>
                                   </div>

                                   {{-- Dislike Button --}}
                                   <div class="col-6 text-left">
                                        <div class="example-dislike-div" data-id="{{$example->id}}">
                                             <i style="color: red;cursor: pointer" class="fa fa-thumbs-down"></i>
                                             <span class="dislike">{{ $example->dislike_count }}</span>
                                        </div>
                                   </div>

                              </div>
                         </div>

                         {{-- Delete Button --}}
                         <div class="col-4 text-right">
                              @role('admin')
                                   {{ Form::open(['method' => 'DELETE' ,
                                   'route' => ['example.destroy' , $word->id, $example->id]])
                                   }}
                                   <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger delete">
                                        حذف
                                   </button>
                                   {{ Form::close() }}
                              @endrole
                         </div>

                    </div>

                    <br>

                    @if (!$loop->last)
                         <hr class="sky-hr">
                    @endif

               @endforeach
          </div>

     @endif

</div>
@endsection

{{-- Script for like and dislike functionality --}}
@section('script')
<script src="{{ asset('/js/like.js') }}"></script>
@endsection