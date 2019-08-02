{{-- Form Card --}}
<div class="card center" id="form-card">
     <div class="card-body">

          {{-- Example --}}
          <div class="form-group">
               {!! Form::label('example' , 'Example') !!}
               {!! Form::textArea('example' , null , ['class' => 'form-control' , 'id' => 'example-editor',
                    'value' => old('example')])
               !!}

               @if ($errors->has('example'))
                    <span class="text-danger">{{$errors->first('example')}}</span>
               @endif
          </div>
          <br>

          {{-- Meaning --}}
          <div class="form-group">
               {!! Form::label('meaning' , 'Meaning') !!}
               {!! Form::textArea('meaning' , null ,['class' => 'form-control', 'id' => 'meaning-editor',
                    'value' => old('meaning')])
               !!}

               @if ($errors->has('meaning'))
                    <span class="text-danger">{{$errors->first('meaning')}}</span>
               @endif
          </div>

     </div>
     <!-- /Card Body -->
</div>
<br><br>
<!-- /Card -->
{{-- Buttons for creating(or editing) and cancelling --}}
<div class="text-center">
     <button type="submit" class="btn btn-primary">{{$example->exists ? 'Update' : 'Create'}}</button>
     <a href="{{route('index')}}" class="btn btn-success">Cancel</a>
</div>