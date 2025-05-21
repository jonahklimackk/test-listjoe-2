
@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')



<div class="wrapper">

    @include('members.layout.spotlight-ads')
  <div class="description">
    <h1>Downline</h1>
    <div class="par">
      <h2>Your List Joe Downline</h2>
      Building your downline is one of the best ways to make money and build your brand at List Joe.
      Here are <u>4 awesome reasons</u> to build your List Joe Downline:
    </div>
    <div class="par">
      <h2>Huge Commissions</h2>
      List Joe is one of the highest converting list builders on the market,
      so whenever your downline buys one of our offers <b>you get a commission (up to $100!)</b>.
      Our upgraded members earn up to <i>4xs bigger commissions</i>,
      so be sure to upgrade <a href="/members/upgrade">here</a> if you haven't upgraded already.
    </div>
    <div class="par">
      <h2>Build your OWN list</h2>
      Everyone you refer will go into your downline,
      which you can email straight from List Joe, and add them to every email you send.
    </div>
<!--    <div class="par">
        <h2>Free credits</h2>
        We instantly add 250 free credits whenever you refer a member.
        That’s right, with every member you refer you get free credits!
      </div>-->
      <div class="par">
        <h2>Build many downlines at once</h2>
        This is probably the BIGGEST reason to promote List Joe.
        Be sure to sign up to <a href="/members/recommendedlb">our recommended list builder page</a>,
        and when your downline does the same, they will enter your downline on the new site.
        Yes  that means you can be earning commissions at many different sites just by promoting one link!
      </div>
      <div class="par">
        Here is your current downline. Anyone you have already added will be shown here, and anyone you add in the future.
      </div>
    </div>

    <style>
      .main_table td, .main_table th {
        padding: 10px 70px;
      }
      .hh {
        width: 288px;
        height: 29px;
        background: url('/img/downline.png');
        position: absolute;
        margin-top: -23px;
        margin-left: 1px;
      }
      .hh span {
        color: white;
        font-weight: bold;
        font-size: 12px;
        margin-left: 192px;
        position: relative;
        top: 2px;
        text-shadow: rgba(0, 0, 0, 0.4) 1px 1px 3px;
        text-transform: uppercase;
      }
    </style>
    <div class="hh">
      <span>{{  App\Helpers\Downline::getCount(Auth::user()) }} members</span>
    </div>
    <table class="main_table">
      <thead>
        <tr>
          <th>Level #</th>
          <th>Referral Count</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Level 1</td>
          <td>
            <a style="margin-left:20px" href="/members/downline/level/1">
              {{  App\Helpers\Downline::getCountOnLv(Auth::user(),1) }}
            </a>
          </td>
        </tr>
        <tr>
          <td>Level 2</td>
          <td>
            <a style="margin-left:20px" href="/members/downline/level/2">
              {{  App\Helpers\Downline::getCountOnLv(Auth::user(),2) }}
            </a>
          </td>
        </tr>
        <tr>
          <td>Level 3</td>
          <td>
            <a style="margin-left:20px" href="/members/downline/level/3">
              {{  App\Helpers\Downline::getCountOnLv(Auth::user(),3) }}
            </a>
          </td>
        </tr>
        <tr>
          <td>Level 4</td>
          <td>
            <a style="margin-left:20px" href="/members/downline/level/4">
              {{  App\Helpers\Downline::getCountOnLv(Auth::user(),4) }}
            </a>
          </td>
        </tr>
        <tr>
          <td>Level 5</td>
          <td>
            <a style="margin-left:20px" href="/members/downline/level/5">
              {{  App\Helpers\Downline::getCountOnLv(Auth::user(),5) }}
            </a>
          </td>
        </tr>
        <tr>
          <td>Level 6</td>
          <td>
            <a style="margin-left:20px" href="/members/downline/level/6">
              {{  App\Helpers\Downline::getCountOnLv(Auth::user(),6) }}
            </a>
          </td>
        </tr>
      </tbody>
    </table>

    <br/>

    <div class="description">
      <h1>Send an email to your downline now:</h1>

      <div class="par">
        Fill in the subject line and the content of your email and
        send an email to your downline below.
        Sending emails to your downline is free and you don't use any credits.
        You can send one email per 24 hours to your downline.
      </div>
      <div class="par">
        <b>Since you earn a commission every time someone in your downline upgrades<b/>,
          it's a great idea to remind them about the extra benefits of upgrading with Listjoe.
        </div>


        <form class="main-content-mail" method="post">
          <b style="padding-right: 10px;">Subject:</b>
          <input name="subject" style="width: 340px;" value=""/>
          <br/>
          <b>Message:</b>
          <br/>
          <textarea name="message" style="width: 643px;height: 157px;margin-top: 6px;"></textarea>
          <br/>
          <div class="blue_button" data-submit="main-content-mail">Send message to your downline</div>
        </form>
      </div>
    </div>

  </div>
</div>

@include('members.layout.footer')