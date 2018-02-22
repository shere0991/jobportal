@extends('admin.layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
@endpush
@section('navbar')
@include('admin.layouts.partial.top-navbar')
@endsection
@section('main-content')
  <div class="tile">
    @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
  <div class="tile-header">
    <h2 style="color: white; opacity: .75; font-size: 3rem; display: flex; justify-content: center; align-items: center; text-align: center; height: 100%;">Reset Password</h2>
  </div>
  
  <div class="tile-body">
    <form id="form" class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                {{ csrf_field() }}
      <label class="form-input{{ $errors->has('email') ? ' has-error' : '' }}">
        <i class="material-icons">person</i>
        <input id="email" type="email"  name="email" value="{{ old('email') }}" required>
        <span class="label">Enter Email</span>
        <span class="underline"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </label>
      
      <div class="submit-container clearfix" style="margin-top: 2rem;">          
        <center><button id="submit" role="button" type="submit" class="btn btn-irenic " tabindex="0">
          <span>Send Password Reset Link</span>
        </button></center>
        
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
{{-- <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Admin Reset Password</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                {{ csrf_field() }}

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

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('js/admin-login.js') }}"></script>
@endpush