@extends('admin.layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
@endpush
@section('navbar')
@include('admin.layouts.partial.top-navbar')
@endsection
@section('main-content')
  <div class="tile">
<center>
    <span>Login to <strong class="text-aqua">MADINA GROUP</strong></span>
</center>
  <div class="tile-header text-center"><br>
    {{-- <h2 style="color: white; opacity: .75; font-size: 4rem; display: flex; justify-content: center; align-items: center; text-align: center; height: 100%;"><small></small>Job Portal</h2> --}}
    <img src="{{ asset('storage/admin/madina-group.png') }}" alt="Logo">
  </div>
  
  <div class="tile-body">
    <form id="form" class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}
      <label class="form-input{{ $errors->has('email') ? ' has-error' : '' }}">
        <i class="material-icons">person</i>
        {{-- <input type="text" autofocus="true" required /> --}}
         <input id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus >

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <span class="label">Username</span>
        <span class="underline"></span>
      </label>
      
      <label class="form-input{{ $errors->has('password') ? ' has-error' : '' }}">
        <i class="material-icons">lock</i>
        {{-- <input type="password" required /> --}}
        <input id="password" type="password" name="password" required >

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <span class="label">Password</span>
        <div class="underline"></div>
      </label>
      <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                    </div>
      <div class="submit-container clearfix" style="margin-top: 2rem;">          
        <button id="submit" role="button" type="submit" class="btn btn-irenic float-right" tabindex="0">
          <span>SIGN IN</span>
        </button>
         <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                            Forgot Your Password?
                        </a>
        <div class="login-pending">
          <div class=spinner>
            <span class="dot1"></span>
            <span class="dot2"></span>
          </div>
          
          <div class="login-granted-content">
            <i class="material-icons">done</i>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
{{-- <div class="col-md-7 col-md-offset-3">
    <div class="page-header"></div>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Login</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="inputEmail3" class="col-sm-3 control-label">E-Mail Address</label>

                  <div class="col-sm-8 col-md-8">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-sm-3 control-label">Password</label>

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
                  <div class="col-sm-offset-3 col-sm-8 col-md-8">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
</div> --}}
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('js/admin-login.js') }}"></script>
@endpush
