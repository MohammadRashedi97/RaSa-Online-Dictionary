<div class="col-xs-12">
     <div class="box">
          <div class="box-body">
               @include('partials.message')
               {{-- Category --}}
               <div class="form-group">
                    {{ Form::select('category_id' , App\Category::pluck('name' , 'id') , null ,
                         ['class' => ['form-control', $errors->has('category_id') ? 'is-invalid' : ''] ,
                         'placeholder' => 'انتخاب موضوع', 'value' => old('category_id')])
                    }}

                    @if ($errors->has('category_id'))
                         <span class="text-danger text-center d-block">{{$errors->first('category_id')}}</span>
                    @endif
               </div>
               <br>

               {{-- Persian Definition --}}
               <div class="form-group">
                    {{ Form::label('persianDefinition' , 'معنای فارسی', ['class' => ['text-right', 'd-block']]) }}
                    {{ Form::textArea('persianDefinition' , null ,['class' => 'form-control', 'id' => 'persian-editor',
                         'value' => old('persianDefinition')])
                    }}

                    @if ($errors->has('persianDefinition'))
                         <span class="text-danger text-center d-block">{{$errors->first('persianDefinition')}}</span>
                    @endif
               </div>

          </div>
          <!-- /Card Body -->
     </div>
</div>
<br><br>
<!-- /Card -->
{{-- Buttons for creating(or editing) and cancelling --}}
<div class="text-center">
     <button type="submit" class="btn btn-primary">{{$definition->exists ? 'بروزرسانی' : 'ایجاد'}}</button>
     <a href="{{route('word.show', $word->id)}}" class="btn btn-success">بازگشت</a>
</div>