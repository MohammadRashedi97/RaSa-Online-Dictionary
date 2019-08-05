{{-- Form Card --}}
<div class="card center" id="form-card">
     <div class="card-body">

          {{-- English Entry --}}
          <div class="form-group">
               <label for="word" class="text-center d-block">کلمه</label>
               {!! Form::text('word' , null , ['class' => ['form-control', $errors->has('word') ? 'is-invalid' : ''],
                    'value' => old('word')])
               !!}

               {{-- Display errors if present --}}
               @if ($errors->has('word'))
                    <span class="text-danger text-center d-block">{{$errors->first('word')}}</span>
               @endif
          </div>
          <br>

          {{-- Category --}}
          <div class="form-group">
               {!! Form::select('category_id' , App\Category::pluck('name' , 'id') , null ,
                    ['class' => ['form-control', $errors->has('category_id') ? 'is-invalid' : ''] ,
                    'placeholder' => 'موضوع', 'value' => old('category_id')])
               !!}

               @if ($errors->has('category_id'))
                    <span class="text-danger text-center d-block">{{$errors->first('category_id')}}</span>
               @endif
          </div>
          <br>

          {{-- Persian Definition --}}
          <div class="form-group">
               {!! Form::label('persianDefinition' , 'معنای فارسی', ['class' => ['text-right', 'd-block']]) !!}
               {!! Form::textArea('persianDefinition' , null , ['class' => 'form-control' , 'id' => 'persian-editor',
                    'value' => old('persianDefinition')])
               !!}

               @if ($errors->has('persianDefinition'))
                    <span class="text-danger text-center d-block">{{$errors->first('persianDefinition')}}</span>
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
     <button type="submit" class="btn btn-primary">{{$word->exists ? 'بروزرسانی' : 'ایجاد'}}</button>
     <a href="{{route('index')}}" class="btn btn-success">بازگشت</a>
</div>