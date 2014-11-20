@extends('layout.admin_main')

@section('body-content')
{{ Form::open(array('route' => array('user-cretae-post'), 'files'=>true)) }} 


    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Name</label>
                                            {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Full Name') ) }}

											@if($errors->has('name'))
											<button type="button" class="btn btn-warning">{{ $errors->first('name') }}</button>
												
											@endif
                                        </div>

                                        <label>Email</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Email')) }}
                                           @if($errors->has('email'))
											<button type="button" class="btn btn-warning">{{ $errors->first('email') }}</button>
				
											@endif
                                        </div>

                                        <div class="form-group">
                                            <label>User Name</label>
                                            {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'User Name') ) }}

											@if($errors->has('username'))
											<button type="button" class="btn btn-warning">{{ $errors->first('username') }}</button>
				
											@endif
                                        </div>

                                        <div class="form-group">
									    <label>Password</label>
                                         {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'User Name') ) }}

                                            @if($errors->has('username'))
                                            <button type="button" class="btn btn-warning">{{ $errors->first('username') }}</button>
                
                                            @endif
									  </div>
									

									<div class="form-group">
									    <label>Re-Password</label>
									    <input type="password" class="form-control" name="password_again" placeholder="Re-Password">
									  </div>
									  @if($errors->has('password_again'))
											<button type="button" class="btn btn-warning">{{ $errors->first('password_again') }}</button>
				
											@endif
                                        <button type="submit" class="btn btn-success">Submit Button</button>
                                        <button type="reset" class="btn btn-info">Reset Button</button>
                                    </form>
                                </div>
                               
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
    
{{ Form::close() }}

@stop