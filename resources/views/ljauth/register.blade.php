
@extends('sales.layout.app')


@section('content')


  <div class="headline5">
    Your message will be sent to 1000 of our Listjoe members,<br/>people who are looking forward to getting your ad.
  </div>

  <div class="headline6">
    Before we send your message, please tell us your<br/>
    desired Listjoe username and an email address <br/>
    that you will use to receive our ads: <span class="ques">(?)</span>
  </div>


  <form class="signup_form" method="post" action="{{ route('register') }}">

   @csrf
   <div class="background"></div>
   <div class="cont">
    <div class="h">Join Now!</div>
    <div class="line">
      <label for="fname">First name:</label>
      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

      @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>



    <div class="line">
      <label for="username">Username:</label>
      <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" required>

      @if ($errors->has('username'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('username') }}</strong>
      </span>
      @endif
    </div>


    <div class="line">
      <label for="password">Password:</label>

      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

      @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>



<!-- 
    <div class="line">
      <label for="password_confirmation">Confirm</label>

      <input id="password_confirmation" type="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

      @if ($errors->has('password_confirmation'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
      </span>
      @endif
    </div> -->


    <div class="line">
      <label for="email">Email:</label>

      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

      @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>


    <input type="checkbox" name="agree" id="agree" style="margin-left: 96px;"/>
    <label for="agree" style="width: 350px;font-size: 14px;">I agree to the ListJoe.com <a href="/terms" style="color: #F8EE76" target="_blank">Terms </a> and <a href="/privacy" style="color: #F8EE76" target="_blank">Privacy Policy</a></label>
  </div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

  <div style="text-align: center;padding-top: 16px;">
  <button class="big_yellow_button" id="submit" >
    <b style="padding: 0px 1px;">Send My Ad, Joe!</b><i></i></div>
</button>
</div>



</form>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<div>&nbsp;</div>
<div>&nbsp;</div>



<!-- <div class="headline4">
  <p>
    List Joe is an email marketing service, which means real people will receive your emails and read them.
    However, when you sign up you also agree to receive emails that you can read and earn more advertising credits.
    You should expect 20-30 emails a day, so we recommend using a special gmail address to handle the volume.
    If you don't want to receive this volume of email then please do not join.
    However, it is 100% risk free, there is an easy one-click unsubscribe button in every email.
  </p>
</div>
 -->



<!-- 
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div> -->

<!--                         <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                          </div> -->

      <!--                     <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            -->


            @endsection
