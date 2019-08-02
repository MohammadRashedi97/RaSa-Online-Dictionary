<div class="col-xs-12">
     <div class="box">
          <div class="box-body">
               @include('partials.message')
               <p><b style="color: red">Note : </b>You can Write both English and Persian Definitions for a word. or you can write only on of them. but you Must fill at least one of them.</p>

               <div class="form-group {{$errors->has('englishEntry') ? 'has-error' : ''}}">
                    {!! Form::label('englishEntry' , 'Word Name') !!}
                    {!! Form::text('englishEntry' , null , ['class' => 'form-control']) !!}

                    @if ($errors->has('englishEntry'))
                    <span class="text-danger">Word can't be empty.</span>
                    @endif
               </div>
               <br>

               <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                    {!! Form::select('category_id' , App\Category::pluck('name' , 'id') , null ,
                    ['class' => 'form-control' , 'placeholder' => 'Choose Category'])
                    !!}

                    @if ($errors->has('category_id'))
                    <span class="text-danger">The category is required.</span>
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
          </div>

     </div>

</div>

<div class="text-center">
     <button type="submit" class="btn btn-primary">{{$word->exists ? 'Update' : 'Create'}}</button>
     <a href="{{route('backend.dictionary.index')}}" class="btn btn-success">Cancel</a>
</div>