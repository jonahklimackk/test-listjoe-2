@extends('members.layout.sales-header')



@section('content')

@include('members.layout.sales-menu')


<div class="wrapper">
  <style>
    .sidebar_vda {
      display: none;
    }
    .content > .wrapper {
      margin-left: -27px;
      width: 100%;
    }
    .content > .sidebar {
      margin-top: 31px;
      margin-left: 3px;
      position: absolute;
    }
    .content > .sidebar > .menu {
      background: white;
      display: none;
      box-shadow: gray 0px 0px 22px;
      padding: 3px;
      height: 370px;
    }
    .menu_button {
      color: white;
      font-size: 16px;
      font-family: NewJune-Bold;
      background: #1D70C3;
      position: absolute;
      cursor: pointer;
      left: 0px;
      padding: 9px 145px 6px 11px;
      top: 0px;
      border-radius: 0 0 4px 4px;
    }
    .menu_button > .down {
      background: url('/img/menu_arrow_down.png');
      width: 22px;
      height: 11px;
      position: absolute;
      right: 23px;
      top: 9px;
    }
    .upgrade_page {
      width: 880px;
      margin: 50px auto;
    }
    .upgrade_page h1,
    .upgrade_page h2{
      color: #1163a0;
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .upgrade_page h1{
      font-size: 24px;
      margin-top: 50px;
    }
    .upgrade_page h2 {
      font-size: 22px;
      margin-top: 30px;
    }
    .upgrade_page h3{
      font-size: 18px;
      color: #1163a0;
      text-align: left;
      font-weight: bold;
      margin: 40px 0 20px 0;
    }
    .upgrade_page .par {
      margin-bottom: 20px;
      font-size: 16px;
      line-height: 20px;
    }
    .upgrade_page .price_table {
      background: url('/img/upgrade_table.png');
      height: 434px;
      width: 852px;
      padding: 13px 0 0 28px;
    }
    .upgrade_page .price_table .price {
      color: #0c5e9f;
      font-size: 23px;
      font-weight: bold;
      text-shadow: white 0 1px;
    }
    .upgrade_page .price_table table {
      margin-left: 384px;
      width: 459px;
    }
    .upgrade_page .price_table td {
      height: 88px;
      vertical-align: middle;
    }
    .upgrade_page .price_table td.button {
      text-align: center;
      padding: 0 44px;
    }
    .upgrade_page .price_table .payza,
    .upgrade_page .price_table .paypal {
      height: 31px;
      width: 74px;
      cursor: pointer;
      float: left;
      margin: 0 8px;
      display: none;
    }
    .upgrade_page .price_table .payza {
      background: url("/img/payza.png");
    }
    .upgrade_page .price_table .paypal {
      background: url("/img/paypal.png");
    }
    .upgrade_page .your_benefits {
      margin: 0 auto;
    }
    .upgrade_page .your_benefits thead {
      background: #DBEFFE;
    }
    .upgrade_page .your_benefits td{
      border: 1px solid #808080;
      padding: 5px 10px;
      text-shadow: white 0 1px;
      vertical-align: middle;
      text-align: center;
    }
    .upgrade_page .your_benefits .yes,
    .upgrade_page .your_benefits .no {
      height: 24px;
      width: 24px;
      margin: 0 auto;
    }
    .upgrade_page .your_benefits .yes {
      background: url("/img/upgrade_yes.png");
    }
    .upgrade_page .your_benefits .no {
      background: url("/img/upgrade_no.png");
    }
    .upgrade_page .list {
      list-style-type: disc;
    }
    .upgrade_page .list li {
      padding-left: 30px;
    }
    .upgrade_page .red_caption {
      color:#ed1c24;
      font-size: 24px;
      text-align: center;
      font-weight: bold
    }
  </style>

  <div align="center">
    <div class="upgrade_page">
      <table width="500">
        <tr>
          <td>


            <h1>
              10 Stunning Reasons Why Upgrading <br/>
              at List Joe Will Ultimately Get You The Free, <br/>
              Internet Marketing Lifestyle You Deserve!
            </h1><h1>
              <font color="red">
                Grab One Of Just <s>20</s> &nbsp;<s>12</s> 7 Available - 
                <br>Deeply Discounted Membership Rates <br>
              And Ad Packages For A Limited Time!</font>
            </h1>
              <br><br>
            <div class="par">If you ever wanted to make a substantial income from
              a very small investment <b><i>you are reading the right offer!</i> But you have to act now.</b>
            </div>
            <div class="par">
              IF you're a multiple product promoter, one of the most ESSENTIAL skills you need is to recognize
              opportunities where you can pay a little bit of money to make a lot more back... This is one of those times.<br/>

            </div>
            <div class="par">
              Each one of these features, if taken alone, will earn you MORE <b> money than you're paying for the <i>actual membership.</i></b>
            </div>


            <div align="center">
              <table width="300"><tr><td>
                <h1>1. Email up to 3000 People Every 3 Days <br> <font color="red"> For 1 year!</font> And Immediately After Upgrading!</h1>
              </td></tr></table>
            </div>

            <br>
            <div class="par">
              Imagine sending your ad to 3000 people <u>every 3 days</u> for 1 year. Where would you be.
            </div>
            <div class="par">
              <center><i><b>This means you can send your ad 10 times a month, so you'll reach <u>30,000  people!</u></b></i></center>
            </div>
            <div class="par">For 1 year? that's 360,000 people.
              <div class="par">
                A typical email solo ad to a high-quality list with thousands of REAL, active readers costs about $27!
              </div>
              <div class="par">
                You get 60 of these!  That's a value of $1020!!
              </div>
              <div class="par" style="margin-left: 85px">
                <b>Remember, this is NOT the same as a safelist where nobody is reading you ad.</b><br/>
                Members earn credits for clicking a link in your email ad, so they will actually <b>open and read</b> your emails.
                <div class="par"> screenshot of open rate
                </div>


              </div>
              <div class="par">
                <b>What this feature boils down to, is that if you are selling a $30 product, you only need 3 sales and you are in profit!</b>
              </div>
              <div class="par">
                Do you think you can make MORE than 3 sales every month if you're sending your ad out to 5,000 people?
              </div>
              <div class="par">What about for 1 year.</div>
              <div class="par">
                I think so.
              </div>
              <div class="par">
                What if you made an average of 10 sales per month? You are in effect, spending $27.00 to make $300, times 6 that's $1,800 in profit.
                <b><i>This is seed money that could be used to launch other Internet Marketing Projects!</i></b>
              </div>


              <div align="center">
                <table width="300"><tr><td>
                  <h1>2. Get 1000s of Spotlight Ad Impressions!</h1>
                </td></tr></table>
              </div>


              <div class="par">
                Upgraded members have the opportunity to place their ads in the <u>Member Spotlight</u> section.
                These ads appear at the TOP of every page on List Joe, and have your profile picture included. That’s right, fully branded ads!

              </div>
              <div class="par" style="text-align: center">
                Here’s what your ads will look like:
              </div>
              <div align="center">

                <img src="/img/upgrade_spotlight.png"/>
              </div>
              <br>
              <div class="par">
                The total impressions are shared between all upgraded members only. We currently estimate that you will get anywhere from 500 - 1000 impressions per month for your ads!
              </div>
              <div class="par">
                <b>Diversification is key.</b> You can promote several products and opportunities all at once. It will grow your downline in various business opportunities, build your list, or just plain make you more money.
              </div>

              <div class="par" align="center">
                You also get to place this ad:
              </div>

              <div align="center">
                <table width="300"><tr><td>
                  <h1>3. Get 1000s of Top Member Ad Impressions!</h1>
                </td></tr></table>
              </div>

              <div class="par">

                These are also show in the member's area, right underneath the menu. So people can't miss them.
                As long as you are upgraded, these ads will be shown.  You're getting visitors to your site on auto-pilot!
              </div>

              <div align="center">
                <img src="/img/top-member-ad.jpg">
              </div>
              <br>
              <div class="par">  The clickthrough rates are fairly high. You will get signups from this ad!
              </div>



              <div align="center">
                <table width="300"><tr><td>
                  <h1>4. Fully Customized Text, Colours, Styles, and Images in Every Email!</h1>
                </td></tr></table>
              </div>





              <div class="par"> As a <i>free</i> member, you can only have limited access to
              List Joe’s fully customizable and branded email templates. </div> <div
              class="par"> If you upgrade you will fully unlock this feature and be able to
            stand out from the crowd. </div> <div class="par"> I’m sure you’ve noticed by
              now that the future of email marketing (and all online marketing!) is branding.
              And as an upgraded member at List Joe, you can fully control and customize your
            brand in every email. </div> <div class="par"> You can unlock this and every
            other feature by purchasing this amazing offer today.</div> 

            <div align="center">
              <img src="/img/html-ad.png">
            </div>
            


              <div align="center">
                <table width="300"><tr><td>
                   <h1>5. Get Paid MORE To Build Your Lists!</h1>
                </td></tr></table>
              </div>


           


            <div class="par">
              As a <i>free</i> member, you can only earn a limited commission when you refer people who upgrade or purchase the OTO.
            </div>
            <div class="par">
              If you upgrade you'll earn much, much more, up to $50 per referral!
            </div>
            <div class="par">
              So why not get <i>paid</i> while building your lists?
            </div>
            <div class="par">
              Plus, referring people will be very very easy, since we add random un-referred List Joe members to your downline!
            </div>


              <div align="center">
                <table width="300"><tr><td>
            
            <h1>6. Promote ANY Product in All the Emails Sent out at List Joe!</h1>
                </td></tr></table>
              </div>
            <div class="par">
              We include a top ad in every email that is sent between members. This top ad is shared amongst gold members only, much in the same way as the member spotlight ads.
            </div>

            <div align="center">
            <img src="/img/top-email-ad.jpg" width="480">
</div>


            <div class="par">
              This is yet ANOTHER great way for you to get traffic from listjoe.
            </div>


              <div align="center">
                <table width="300"><tr><td>
                  <h1>7. Earn Auto-Pilot Commissions and Get Random Referrals! </h1>
                </td></tr></table>
              </div>



            <div class="par">
              If an un-referred member goes to the home page at ListJoe.com, they are automatically redirected to a RANDOM upgraded member's page. It could be you! If the visitor joins, he or she is placed in your downline as though you personally referred them.
            </div>
            <div class="par" style="font-size: 18px;font-weight: bold">
              When they upgrade YOU will earn up to $50 in commissions!
            </div>
            <div class="par" style="margin-left: 85px">
              <b>Here's the thing:</b> Unlike other referral programs, when an active member joins your organization, he or she not only sparks
              <b><u>activity</u></b> in your personal ListJoe.com downline, but also in your downline for ALL of your other programs combined!
              In most cases, this person will be building you SEVERAL massive lists! Sometimes all it takes is ONE <b><i>super affiliate</i></b> to launch your
              exponential growth into the stratosphere!
            </div>

                          <div align="center">
                <table width="300"><tr><td>
                  <h1>8. Backend Your Top Performing Program With A Login Ad</h1>
                </td></tr></table>
              </div>

           



            <div class="par">
              Do you have a MAIN program or product that you like to promote? <b>Here's your chance to really push it to the next level</b>.
            </div>
            <div class="par">
              If you upgrade  you can place a recommendation ad in the member's area which is shown to new members RIGHT AFTER they LOGIN to ListJoe.com. I'm sure you've seen a few ads already since you have to login to see this page. Your ad could be there too.
            </div>
            <div class="par">
             <b> Make just a few sales per month with your login ad and you are paying for your membership in full!</b>

              <i>Here's what they'll see when they login:</i>
              <br><br>  
              <br>
              <div align="center">
                <img src="/img/login-ad.png" width="480">
              </div>

                          <div align="center">
                <table width="300"><tr><td>
              
              <h1>9. Get  40 Solo Ad Tokens - $197 Value!</h1>
                </td></tr></table>
              </div>

           





              <div class="par">
                Do you have a MAIN program or product that you like to promote? <b>Here's your chance to really push it to the next level</b>.
              </div>

              <div class="par">
                If you upgrade through our special offer right now, we'll let you mail to the entire list 40 times! <b>Normally this goes for $97</b> but it's yours <i>FREE</i> just for taking this deal.
              </div>
              <div class="par">
                <b>Remember</b> You can send out a solo ad anytime you want. You could send out 5 in a row if you want. 
              </div>

               <div class="par">
              <b>Current Live Count of Members is {{ App\Models\User::count() }} people.</b>
            </div>
              <table><tr><td>
               <img src="/img/solo-tokens.jpg" width="480">
             </td>
             <td> <img src="/img/solo-ads.jpg">
             </td></tr></table>
             <div class="par">
               <b> Make just a one or two sales per mailing and you are in profit!</b>
             </div>




                          <div align="center">
                <table width="300"><tr><td>
              
           
             <h1>10. 50,000 Credits!</h1>
                </td></tr></table>
              </div>          


                                   <div align="center">
              <table><tr><td>
               <img src="/img/buycredits.png" width="480">
             </td>
             </tr></table>
           </div> 


             <div class="par">
              Get 150,000 credits normally costs $97
              yours FREE with this ad package.

            </div>

            <br>
            <div class="par red_caption">
              Our Special Deal and Why <br>There's No Risk With Our Guarantee!
            </div>
            <br>
            <div class="par">
              If on any given month you are unsatisfied with the your membership, then please let us know immediately.
              We'll promptly refund you for that month, no questions asked, absolutely no hassle.
            </div>
            <div class="par" style="margin-left:85px">
              You get:<br/><br/>
              <ul class="list" >
                <li><b>Email 3000 people every third day for 1 year - that's 60 mailings for a value of $27 per mailing, or <i>$1620 for 1 year!</i></b></li>
                <li>Enhanced Commissions! Earn 50% on each sale</li>
                <li>Get Thousands Of Impressions with Spotlight and Member Ads both run automatically</li>
                <li>Earn Through Top Email Ads in emails sent by free members</li>
                <li><b>40 Solo Ads! Worth $197! </b></li>
                <li>Access To Email Up To 3000 Random Members <i>Immediately and every 3 days for 1 year!</i></li>
                <li> <b><i>150,000 credits! - value of $197 </i></b></li>
                <li>1 year of gold membership, valued at $297 1 year! 
                  <li> Rich Text Html editor for your mailings
                    <li>And More!</li>

                  </ul>
                </div>
                <div class="par">
                  And you have absolutely no risk with our guarantee!
                </div>
                <div class="par">
                  Go ahead and give it a try. Upgrade to pro right now.
                </div>
                <br><br>
                <div class="par red_caption">
                  This may or may not be available for much longer! There are only a few slots left!
                </div>



                <div class="par red_caption">
                  All orders processed on a SECURE server. <br/>
                  Please make your selection to begin.
                </div>
                <h3>
                  <div align="center">
                    Not<s>$197 </s> <br><div></div> 
                    <br>for $1500 worth of advertising ! <br>
                    <i>Gold Membership for 1 year - value of $297</i> <br>
                    <b>40 Solo Ads</b> - value of $197<BR>
                    <b><I>150,000 credits! - value of $197</I></b><BR>
                    Order Now!<BR>
                    Just <s>$197</s> $97!

                  </h3>  </div>
                  <div class="par">
                    <div align="center">
                     <a href="https://buy.stripe.com/9AQ7vq5khahF6Mo9B7" Style="background-color:#6772E5;color:#FFF;padding:8px
                     12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
                     Buy Now  
                   </a>

                   </div></div>

                   <br><br>

                   <div class="par">
                    The Bottom Line is this:
                  </div>
                  <div class="par">
                    You get to keep paying $97 for 1 year of gold for as long as you want. Even when Listjoe.com grows and grows
                  you'll have this discounted ad machine sending you traffic everyday all day.</div>
                </div>
              </div>
            </div>



            <div align="center"><font color="red"><h1>
              You will not be shown this offer again!
              There are just <s>20</s> &nbsp;<s>12</s> 7 Available 
            </h1></font>
          </div>

          <div align="center"> <br><br>
            <div class="ad"style="width: 250px; font-size: 12px">
              <a href="/dashboard">No thanks, take me to member's area...</a>
            </div>
          </div>
          <br>
          <br>
        </td>
      </tr>
    </table>
  </div>
</div>
</div>

@endsection