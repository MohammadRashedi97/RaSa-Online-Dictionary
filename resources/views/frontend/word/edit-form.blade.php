{{-- Form Card --}}
<div class="card center" id="form-card">
     <div class="card-body">

          {{-- English Entry --}}
          <div class="form-group">
               <label for="word">Word</label>
               {!! Form::text('word' , null , ['class' => ['form-control', $errors->has('word') ? 'is-invalid' : ''],
                    'value' => old('word')])
               !!}

               {{-- Display errors if present --}}
               @if ($errors->has('word'))
                    <span class="text-danger">Word field is required.</span>
               @endif
          </div>
          <br>
     </div>
     <!-- /Card Body -->
</div>
<br><br>
<!-- /Card -->
{{-- Buttons for creating(or editing) and cancelling --}}
<div class="text-center">
     <button type="submit" class="btn btn-primary">{{$word->exists ? 'Update' : 'Create'}}</button>
     <a href="{{route('index')}}" class="btn btn-success">Cancel</a>
</div>