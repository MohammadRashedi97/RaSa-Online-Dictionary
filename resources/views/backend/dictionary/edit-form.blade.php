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

</div>

<div class="text-center">
     <button type="submit" class="btn btn-primary">{{$word->exists ? 'Update' : 'Create'}}</button>
     <a href="{{route('backend.dictionary.index')}}" class="btn btn-success">Cancel</a>
</div>

<br><br>