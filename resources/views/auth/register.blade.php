@extends('layouts.app')
@section('navbar')
@include('layouts/partial/top-navbar')
@endsection
@section('main-content')
 <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Register</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('FirstName') ? ' has-error' : '' }}">
                  <label for="FirstName" class="col-sm-3 control-label">First Name</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="FirstName" type="text" class="form-control" name="FirstName" value="{{ old('FirstName') }}" required autofocus placeholder="First Name">
                    @if ($errors->has('FirstName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('FirstName') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('LastName') ? ' has-error' : '' }}">
                  <label for="LastName" class="col-sm-3 control-label">Last Name</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="LastName" type="text" class="form-control" name="LastName" value="{{ old('LastName') }}" required autofocus placeholder="Last Name">
                    @if ($errors->has('LastName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('LastName') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-sm-3 control-label">email</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('Phone') ? ' has-error' : '' }}">
                  <label for="Phone" class="col-sm-3 control-label">Phone</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="Phone" type="text" class="form-control" name="Phone" value="{{ old('Phone') }}" required autofocus placeholder="Phone">
                    @if ($errors->has('Phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Phone') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('Company') ? ' has-error' : '' }}">
                  <label for="Company" class="col-sm-3 control-label">Present Company</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="Username" type="text" class="form-control" name="Company" value="{{ old('Company') }}" required autofocus placeholder="Present Company">
                    @if ($errors->has('Company'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Company') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('Possition') ? ' has-error' : '' }}">
                  <label for="Possition" class="col-sm-3 control-label">Designation</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="Possition" type="text" class="form-control" name="Possition" value="{{ old('Possition') }}" required autofocus placeholder="Designation">
                    @if ($errors->has('Possition'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Possition') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('Username') ? ' has-error' : '' }}">
                  <label for="Username" class="col-sm-3 control-label">Username</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="Username" type="text" class="form-control" name="Username" value="{{ old('Username') }}" required autofocus placeholder="Username">
                    @if ($errors->has('Username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Username') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="Password" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-8 col-md-8">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="password-confirm" class="col-sm-3 control-label">Password Confirm</label>
                  <div class="col-sm-8 col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Password Confirmation">
                  </div>
                </div>
                {{-- <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-8 col-md-8">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div> --}}
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Register</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
{{--     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
