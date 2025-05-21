
@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')
<?php
// dump($key1);  
?>

<!-- this stupid fucking wrapper is what keeps it aligned, but for the home page its before the spotlight ads, on other pages, it's after wtf -->
<div class="wrapper">
  <script>
    var timeleft = 100949;

    $(document).ready(changeTimeLeft)
    window.setInterval("changeTimeLeft()", 1000);
  </script>

  @include('members.layout.spotlight-ads')




  <div style="height: 200px;">
    <div class="profile">
      <div class="title">
        Here's Your Listjoe Link to get a downline:
      </div>
      <div class="link"><a href="#" onclick="window.prompt('Press ctrl+c to copy your affiliate link to clipboard.','http://listjoe.com/aff/{{ Auth::user()->username }}')">http://listjoe.com/aff/{{ Auth::user()->username }}</a> </div>
      <div class="line">
        <div class="name">Membership: </div>
        <div class="value">

          <?php          
          $membership = App\Models\Membership::where('name',Auth::user()->membership)->get()->first();
          ?>
          {{ ucfirst($membership->name) }} <br>

          Your mailing bonus is {{ $membership->mailing_bonus }} people every  {{ $membership->mailing_freq }} days.</div>
        </div>
        <div class="line">
          <div class="name">Mailing Status:</div>
          <div class="value">
           {{ App\Models\Mailing::getHumanNextMailing(Auth::user()) }}
         </div>
       </div>
       <div class="line">
        <div class="name">Total Credits:</div>
        <div class="value">{{ Auth::user()->credits }} (<a href="/members/buycredits">buy more credits</a>)</div>
      </div>
      <div class="line">
        <div class="name">Referrals:</div>
        <div class="value">{{ App\Helpers\Downline::getCount(Auth::user()) }} (<a href="/members/downline">view</a>) (<a href="/members/upgrade">upgrade</a>)</div>
      </div>
    </div>


  </div>
  {{-- the abovecloses div sthl height 200 abov e  --}}

  <div class="description">
    <h1>How Do I Get Started?</h1>
    <br><br>

<!--             @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&  ! Auth::user()->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (Auth::user()->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif -->


    <div class="par">
      List Joe is an extremely easy-to-use and profitable email marketing service.
      To get started, all you have to do is go to the <b><a href="/sendmail">Send Mail</a></b> page and do the following:
      <ul style="list-style-type: disc;margin: 16px 30px;font-weight: bold">
        <li>
          Enter the link that you are advertising
        </li>
        <li>
          Copy and paste your email and subject line into the email box
        </li>
        <li>
          And add the amount of credits you want to spend
        </li>
      </ul>
    </div>
    <div class="par">
      Then click send, and presto: <b>Your email ad will be sent out to tons targeted internet marketers!</b>
    </div>
    <div class="par">
      Plus, you can see how the number of recipients as well as how many emails were opened and how many were clicked.<b><a href="/mail_history">Mail History</a></b>, We are the only mailer that tracks the open  rate.
    
    </div>
<br><br>
    <h1>How to Maximize Your Results</h1>
  <br><br>
    <div class="par">
      List Joe is a credit-based mailer. That means you need credits to send out your emails, and each credit is worth 1 email.
      To earn more credits, be sure to read the emails in your inbox and click on the links,
      that way you will always have credits to send out more ads at List Joe.
    </div>
    <div class="par" >
      <b>IMPORTANT: Make sure to click ‘this is not spam’ for your first email so your email provider knows you are expecting our mail.</b>
    </div>
    <div class="par">
      Don’t want to read emails to earn credits? That’s ok! We have some great upgrade
      options that you can purchase. 
      You won’t ever have to read a single email. <b><a href="/members/upgrade">Upgrade now</a></b>
    </div>
    <div class="par">
      Don't forget about the backend ads. Bronze and silver members can place Spotlight Ads and Top Member Ads. Gold also gets Login ads and Top Email Ads. <b>The Login Ad is a proven ad that gets results.</b> All upgraded members don't have ads in their emails.
    </div>
    <div class="par">
      <b><a href="/members/upgrade">Upgrade now</a></b>
    </div>
    <div class="par">
      There is also another powerful way to earn money with List Joe.
      When you signed up you were given an affiliate link which you can use to promote and earn huge commissions.
      We have some amazing marketing tools you can use to help you with your campaigns, access them <b><a href="/members/reftools">here</a></b>.
    </div>
    <div class="par">
      Regards,<br>
      Jonah Klimack<br>
      Listjoe.com
  </div>
       <div class="par"><b>P.S.</b> If you plan on advertising ListJoe you should definitely upgrade becauses free members only get 15% commission, bronze gets 25%, silver gets 35% and gold gets 50%. <b> <i>You have to upgrade before your downline does in order to get the higher commissions.</i></b>
      </div>
  </div>



<script src="/livewire/livewire.js" data-csrf="@csrf" data-update-uri="/livewire/update" data-navigate-once="true"> </script>
 
  @include('members.layout.footer')










