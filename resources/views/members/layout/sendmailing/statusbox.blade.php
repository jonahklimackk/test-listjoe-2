  <div class="description">
    <h1 style="font-size: 21px;">Contact Your Fellow ListJoe Members</h1>
    <div class="your_privil sendmail_block">
      <img src="/img/sendmail1.png" class="headimg"/>
      <div class="cont">
        <div class="line">
          <div class="name">Last Mailing</div>
          <div class="value">
           {{ App\Models\Mailing::getHumanLastMailing(Auth::user()) }}
         </div>
       </div>
       <div class="line">
        <div class="name">Mailing Status</div>
        <div class="value">
          {{ App\Models\Mailing::getHumanNextMailing(Auth::user()) }}
        </div>
      </div>
      <div class="line">
        <div class="name">Mailing Bonus</div>
        <div class="value">
         Your email automatically reaches {{ Auth::user()->membership()->mailing_bonus }} on this mailing.<br/>

         @if(Auth::user()->membership == 'free')
         <a href="/members/upgrade" class="href1">Click here to increase your bonus recipients  </a>
         @endif
       </div>
              <div class="line">
              </div>
       <div class="line">
        <div class="name">Max Recipients</div>
        <div class="value">You can reach a maximum {{ Auth::user()->membership()->credits_max }} people per mailing</div>
      </div>

    </div>
    <div class="line">
      <div class="name">Current Mailing Frequency</div>
      <div class="value">Send a mailing every {{ Auth::user()->membership()->mailing_freq }} days.
        @if(Auth::user()->membership == 'free')
        <br>
        <a href="/members/upgrade" class="href1">Click here to mail every 3 days.</a>
      </div>

      @endif
    </div>
  </div>
</div>