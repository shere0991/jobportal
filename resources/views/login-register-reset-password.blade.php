<div id="message"></div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
<center><div class="panel-heading"><small>Login/Register to</small> <strong class="text-aqua"> Feemaa Tech</strong></div></center>
                <div class="modal-header" align="center">
                 <!--  class="img-circle" id="img_logo" -->
                    {{-- <img   src="{{ asset('storage/admin/images/company-logo.png') }}"> --}}
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button> -->
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div><br>
                            <div id="has-email" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="login_username" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="login_password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                  </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button id="loginbtn" type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-in"></i> Login</button>
                            </div>
                            <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link text-aqua">Lost Password?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link text-aqua">Register</button>
                            </div>
                        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" action="{{ route('password.email') }}" style="display:none;" method="POST">
                      {{ csrf_field() }}
                        <div class="modal-body">
                            <div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Type your e-mail.</span>
                            </div><br>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="lost_email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button id="sendbtn" type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link text-aqua">Log In</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link text-aqua">Register</button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
              <form id="register-form" action="{{ route('register') }}" method="POST" style="display:none;">
                {{ csrf_field() }}
                  <div class="modal-body">
                      <div id="div-register-msg">
                          <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                          <span id="text-register-msg">Register an account.</span>
                      </div>
                  <div class="form-group{{ $errors->has('FirstName') ? ' has-error' : '' }}">
                  <input id="FirstName" type="text" class="form-control" name="FirstName" value="{{ old('FirstName') }}" required autofocus placeholder="First Name">
                  @if ($errors->has('FirstName'))
                      <span class="help-block">
                          <strong>{{ $errors->first('FirstName') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('LastName') ? ' has-error' : '' }}">
                    <input id="LastName" type="text" class="form-control" name="LastName" value="{{ old('LastName') }}" required autofocus placeholder="Last Name">
                    @if ($errors->has('LastName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('LastName') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="register_email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Phone') ? ' has-error' : '' }}">
                    <input id="Phone" type="text" class="form-control" name="Phone" value="{{ old('Phone') }}" required autofocus placeholder="Phone">
                    @if ($errors->has('Phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Phone') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('Company') ? ' has-error' : '' }}">
                    <input id="Username" type="text" class="form-control" name="Company" value="{{ old('Company') }}" required autofocus placeholder="Present Company">
                    @if ($errors->has('Company'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Company') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Possition') ? ' has-error' : '' }}">
                    <input id="Possition" type="text" class="form-control" name="Possition" value="{{ old('Possition') }}" required autofocus placeholder="Designation">
                    @if ($errors->has('Possition'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Possition') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Username') ? ' has-error' : '' }}">
                    <input id="register_username" type="text" class="form-control" name="Username" value="{{ old('Username') }}" required autofocus placeholder="Username">
                    @if ($errors->has('Username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                
                    <input id="register_password" type="password" class="form-control" name="password" required placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Password Confirmation">
                </div>   
                        </div>
                  <div class="modal-footer">
                      <div>
                          <button id="registerbtn" type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa send"></i> Register</button>
                      </div>
                      <div>
                          <a href="#" id="register_login_btn" type="button" class="btn btn-link text-aqua">Log In</a>
                          <a id="register_lost_btn" href="#" class="btn btn-link text-aqua">Lost Password?</a>
                      </div>
                  </div>
              </form>
              <!-- End | Register Form -->
              
          </div>
          <!-- End # DIV Form -->
          
      </div>
  </div>
</div>