<div class="col-xs-12">
     <div class="box">
          <div class="box-body">
               @include('partials.message')
               {{-- Example --}}
               <div class="form-group">
                    {{ Form::label('example' , 'مثال', ['class' => ['text-right', 'd-block']]) }}
                    {{ Form::textArea('example' , null ,['class' => 'form-control', 'id' => 'example-editor',
                              'value' => old('example')])
                         }}

                    @if ($errors->has('example'))
                    <span class="text-danger text-center d-block">{{$errors->first('example')}}</span>
                    @endif
               </div>
               <br>

               {{-- Meaning --}}
               <div class="form-group">
                    {{ Form::label('meaning' , 'معنای مثال', ['class' => ['text-right', 'd-block']]) }}
                    {{ Form::textArea('meaning' , null ,['class' => 'form-control', 'id' => 'meaning-editor',
                              'value' => old('meaning')])
                         }}

                    @if ($errors->has('meaning'))
                    <span class="text-danger text-center d-block">{{$errors->first('meaning')}}</span>
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
     <button type="submit" class="btn btn-primary">{{$example->exists ? 'بروزرسانی' : 'ایجاد'}}</button>
     <a href="{{route('backend.dictionary.show', $word->id)}}" class="btn btn-success">بازگشت</a>
</div>