@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')

<!-- you see how I have to put one fucking div to make it all work -->
{{-- </div> --}}
{{-- sometimes on, sometimes not --}}


<div class="wrapper">
  <style>
    .spotlights_side {
      position: relative;
      margin-top: 150px;
    }

  </style>
  <div class="settings_gmail">
    We recommend Gmail for all of our members. No other email provider is delivering as well as Gmail.
    To prevent your account from ending up in bounce mode on a regular basis,
    we would recommend signing up for a Gmail account.
  </div>


  <br/><br/>  <br/>
  <br/><br/>  <br/>


  <div class="description">
    <h1 style="padding: 3px 20px;">Account Settings</h1>
  </div>




  <form method="post" id="settingsForm" class="settform" action="/members/settings">

    @csrf

  @include('members.layout.form-feedback')


      <!-- full name -->
    <div class="line">
      <label for="name" class="input_label">Name</label>
      <input type="text" name="name" id="first_name" value="{{ $user['name'] }}">
    </div>


    <!-- first name -->
<!--     <div class="line">
      <label for="first_name" class="input_label">First Name</label>
      <input type="text" name="first_name" id="first_name" value="{{ $user['first_name'] }}">
    </div>
 -->
    <!-- last name -->
<!--     <div class="line">
      <label for="last_name" class="input_label">Last Name</label>
      <input type="text" name="last_name" id="last_name" value="{{ $user['last_name'] }}">
    </div>
 -->
    <!-- email -->
    <div class="line">
      <label for="email" class="input_label">Contact email</label>
      <input type="email" name="email" id="email" value="{{ $user['email'] }}">
    </div>

    <!-- list email -->
    <div class="line">
      <label for="list_email" class="input_label">List E-mail</label>
      <input type="email" name="list_email" id="list_email" value="{{ $user['list_email'] }}" autocomplete="off">
    </div>

    <!-- paypal_email -->
    <div class="line">
      <label for="paypal_email" class="input_label">Paypal E-mail</label>
      <input type="email" name="paypal_email" id="paypal_email" value="{{ $user['paypal_email'] }}"autocomplete="off">
    </div>

    <!-- solidtrustpay email -->
<!--     <div class="line">
      <label for="solidtrustpay_email" class="input_label">Solid
      TrustPay E-mail</label>
      <input type="email" name="solidtrustpay_email" id="solidtrustpay_email" value="{{ $user['solidtrustpay_email'] }}" autocomplete="off">
    </div> -->

    <!-- password -->
    <div class="line" class="input_label">
      <label for="password" class="input_label">Listjoe Password</label>
      <input type="password" name="password" id="password" value="" type="password" autocomplete="off">
    </div>

    <!-- password confirmation -->
    <div class="line" class="input_label">
      <label for="password_confirmation">Confirm Listjoe Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" value="" type="text" autocomplete="off">
    </div>

    @include('members.layout.form-errors')

    <div style="text-align: center">
      <button class="blue_button">Save</button>

    </div>

<br><br>
Please note that your contact email is the one you use to login to
Listjoe.
    <br/><br/>

    <div class="line">

      <label for="">Membership</label>
      <div class="main-settings-value">
        <b>{{ $user->membership }}</b>
        @if ($user->membership != 'gold')
        <b>(</b><a href="/members/upgrade">upgrade now</a><b>)</b>
        @endif
      </div>
    </div>


    <div class="line">
      <label for="">Credits Left</label>
      <div class="main-settings-value">
        <b>{{ $user->credits }}</b>
        <b>(</b><a href="/members/buycredits">buy more credits</a><b>)</b>
      </div>
    </div>


    <div class="line">
      <label>
        <!-- Account Status -->
      </label>
      <div class="main-settings-value">
        <b>{{ $user->status }}</b>
        <p class="main-settings-inactive_notice">
        </p>




      </div>

    </div>
  </form>

  <!-- <a href="#" id="goto_vacation">Click here to turn ON vacation mode.</a> -->

  <br/><br/><br/><br/><br/><br/>

  <script>
    $(document).ready(function(){

      $('#goto_vacation').click(function(){
        if(confirm('Are you sure you want go on vacation mode? You will not be able to send messages while you on vacation mode')) {
          document.location = '/members/go_to_vacation';
        }
      })
    })
  </script>                </div>

  <style>
    .content > .wrapper {
      width: 499px;
    }
  </style>

  @include('members.layout.sidebar-spotlight')
  @include('members.layout.footer')