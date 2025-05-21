@extends('sales.layout.app')


@section('content')

<div>&nbsp;</div>



<div class="sing-login-frame">
  <form method="POST" class="sing-login_form form_active" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @csrf
    <div class="sing-member_login">Member Login</div>




    <div class="main-content-login_form-line">
     <div class="main-content-login_form-line-name">Username</div>
     <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" required>

     @if ($errors->has('username'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('username') }}</strong>
    </span>
    @endif
  </div>




  <div class="main-content-login_form-line">
    <div class="main-content-login_form-line-name">Password:</div>

      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

      @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif

    </div>



    <div>
      <input type="checkbox" id="agree" name="remember" value="1" class="sing-content-signup_form-radio_login" />

      <label for="agree" class="sing-content-signup_form-radio_label_login">Remember me</label>

      <!-- <div class="small_yellow_button" style="margin-left: 56px;" id="submitLogin"> -->
        <button class="small_yellow_button" style="margin-left: 56px;">
        <b style="padding: 0 37px;">Login</b><i></i></div>
      </button>
    <!-- </div> -->
    <br/>
    <br/>
    <a href="#" class="sing-login_forgot">Forgot Your Password?</a>
    <a href="#" class="sing-login_resend">Resend Confirmations Emails</a>
  </form>
</div>



@endsection