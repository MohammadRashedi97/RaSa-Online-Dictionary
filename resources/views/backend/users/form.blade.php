<div class="col-xs-12">
     <div class="box">
          <div class="box-body">
               <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name') !!}
                    {!! Form::text('name' , null , ['class' => 'form-control']) !!}

                    @if ($errors->has('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
               </div>

               <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('email') !!}
                    {!! Form::text('email' , null , ['class' => 'form-control']) !!}

                    @if ($errors->has('email'))
                    <span class="help-block">{{$errors->first('email')}}</span>
                    @endif
               </div>

               <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label('password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}

                    @if ($errors->has('password'))
                    <span class="help-block">{{$errors->first('password')}}</span>
                    @endif
               </div>

               <div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : ''}}">
                    {!! Form::label('password_confirmation') !!}
                    {!! Form::password('password_confirmation' , ['class' => 'form-control']) !!}

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                    @endif
               </div>

               <div class="form-group {{$errors->has('role') ? 'has-error' : ''}}">
                    {!! Form::label('role') !!}
                    @if($user->exists && ($user->id == config('cms.default_user_id') || isset($hideRoleDropDown)))
                         {!! Form::hidden('role' , $user->roles->first()->id) !!}
                         <p class="form-control-static">{{ $user->roles->first()->display_name }}</p>
                    @else
                         {!! Form::select('role' , App\Role::pluck('display_name', 'id') , $user->exists ? $user->roles->first()->id : null ,
                                        ['class' => 'form-control' , 'placeholder' => 'Select User Role'])
                         !!}
                    @endif

                    @if ($errors->has('role'))
                    <span class="help-block">{{$errors->first('role')}}</span>
                    @endif
               </div>

          </div>
          <!-- /Box Body -->
          <div class="box-footer text-center">
               <button type="submit" class="btn btn-primary">{{$user->exists ? 'Update' : 'Save'}}</button>
               <a href="{{route('backend.users.index')}}" class="btn btn-default">Cancel</a>
          </div>
     </div>
     <!-- /Box -->
</div>