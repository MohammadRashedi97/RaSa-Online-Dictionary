<div class="col-xs-12">
     <div class="box">
          <div class="box-body">
               @include('partials.message')
               <p><b style="color: red">Note : </b>You can Write both English and Persian Definitions for a word. or you can write only on of them. but you Must fill at least one of them.</p>

               <div class="form-group {{$errors->has('word') ? 'has-error' : ''}}">
                    {!! Form::label('word' , 'Word') !!}
                    {!! Form::text('word' , null , ['class' => 'form-control']) !!}

                    @if ($errors->has('word'))
                    <span class="text-danger">{{$errors->first('word')}}</span>
                    @endif
               </div>
               <br>

               <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                    {!! Form::select('category_id' , App\Category::pluck('name' , 'id') , null ,
                    ['class' => 'form-control' , 'placeholder' => 'Choose Category'])
                    !!}

                    @if ($errors->has('category_id'))
                    <span class="text-danger">{{$errors->first('category_id')}}</span>
                    @endif
               </div>
               <br>

               <div class="form-group {{$errors->has('persianDefinition') ? 'has-error' : ''}}">
                    {!! Form::label('persianDefinition' , 'Persian Definition') !!}
                    {!! Form::textArea('persianDefinition' , null , ['class' => 'form-control' , 'id' => 'persian-editor']) !!}

                    @if ($errors->has('persianDefinition'))
                    <span class="text-danger">{{$errors->first('persianDefinition')}}</span>
                    @endif
               </div>
               <br>

               <div class="form-group {{$errors->has('englishDefinition') ? 'has-error' : ''}}">
                    {!! Form::label('englishDefinition' , 'English Definition') !!}
                    {!! Form::textArea('englishDefinition' , null , ['class' => 'form-control', 'id' => 'english-editor']) !!}

                    @if ($errors->has('englishDefinition'))
                    <span class="text-danger">{{$errors->first('englishDefinition')}}</span>
                    @endif
               </div>

               <div class="form-group {{$errors->has('example') ? 'has-error' : ''}}">
                    {!! Form::label('example' , 'Example') !!}
                    {!! Form::textArea('example' , null , ['class' => 'form-control', 'id' => 'example-editor']) !!}

                    @if ($errors->has('example'))
                    <span class="text-danger">{{$errors->first('example')}}</span>
                    @endif
               </div>

               <div class="form-group {{$errors->has('meaning') ? 'has-error' : ''}}">
                    {!! Form::label('meaning' , 'Example Meaning') !!}
                    {!! Form::textArea('meaning' , null , ['class' => 'form-control', 'id' => 'meaning-editor']) !!}

                    @if ($errors->has('meaning'))
                    <span class="text-danger">{{$errors->first('meaning')}}</span>
                    @endif
               </div>
          </div>

     </div>

</div>

<div class="text-center">
     <button type="submit" class="btn btn-primary">{{$word->exists ? 'Update' : 'Create'}}</button>
     <a href="{{route('backend.dictionary.index')}}" class="btn btn-success">Cancel</a>
</div>