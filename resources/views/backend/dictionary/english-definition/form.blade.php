{{-- Form Card --}}
<div class="card center" id="form-card">
     <div class="card-body">

          <h1></h1>
          {{-- English Definition --}}
          <div class="form-group">
               {!! Form::label('englishDefinition' , 'تعریف انگلیسی', ['class' => ['text-right', 'd-block']]) !!}
               {!! Form::textArea('englishDefinition' , null ,['class' => 'form-control', 'id' => 'english-editor',
                    'value' => old('englishDefinition')])
               !!}

               @if ($errors->has('englishDefinition'))
                    <span class="text-danger text-center d-block">{{$errors->first('englishDefinition')}}</span>
               @endif
          </div>

     </div>
     <!-- /Card Body -->
</div>
<br><br>
<!-- /Card -->
{{-- Buttons for creating(or editing) and cancelling --}}
<div class="text-center">
     <button type="submit" class="btn btn-primary">{{$definition->exists ? 'بروزرسانی' : 'ایجاد'}}</button>
     <a href="{{route('word.show', $word->id)}}" class="btn btn-success">بازگشت</a>
</div>