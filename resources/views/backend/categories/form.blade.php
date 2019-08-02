<div class="col-xs-12">
     <div class="box">
          <div class="box-body">
               <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name' , 'Category Name') !!}
                    {!! Form::text('name' , null , ['class' => 'form-control']) !!}

                    @if ($errors->has('title'))
                    <span class="help-block">{{$errors->first('title')}}</span>
                    @endif
               </div>
          </div>
          <!-- /Box Body -->
          <div class="box-footer text-center">
               <button type="submit" class="btn btn-primary">{{$category->exists ? 'Update' : 'Save'}}</button>
               <a href="{{route('backend.categories.index')}}" class="btn btn-default">Cancel</a>
          </div>
     </div>
     <!-- /Box -->
</div>