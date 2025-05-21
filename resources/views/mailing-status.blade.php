
  <div style="height: 200px;">
    <div class="profile">
      <div class="title">
        Here's Your Listjoe Link to get a downline:
      </div>
      <div class="link"><a href="#" onclick="window.prompt('Press ctrl+c to copy your affiliate link to clipboard.','http://listjoe.com/aff/{{ Auth::user()->username }}')">http://listjoe.com/aff/{{ Auth::user()->username }}</a></div>
      <div class="line">
        <div class="name">Membership: </div>
        <div class="value">
          {{ ucfirst( Auth::user()->membership) }}
          (send up to {{ Auth::user()->membership()->credits_max }} emails every  {{ Auth::user()->membership()->mailing_freq }} days.)</div>
        </div>
        <div class="line">
          <div class="name">Mailing Status:</div>
          <div class="value">
           {{ App\Mailing::getHumanNextMailing(Auth::user()) }}
         </div>
       </div>
       <div class="line">
        <div class="name">Total Credits:</div>
        <div class="value">{{ Auth::user()->credits }} (<a href="/members/buycredits">buy more credits</a>)</div>
      </div>
      <div class="line">
        <div class="name">Referrals:</div>
        <div class="value">{{ App\Helpers\Downline::getCount(Auth::user()) }}(<a href="/members/downline">view</a>) (<a href="/members/upgrade">upgrade</a>)</div>
      </div>
    </div>