@extends('members.layout.sales-header')



@section('content')

@include('members.layout.sales-menu')



<!-- Load Stripe.js on your website. -->
<script src="https://js.stripe.com/v3"></script>


<div class="wrapper">
  f<style>
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
  <div class="menu_button">
    MENU
    <div class="down"></div>
  </div>
  <div class="upgrade_page">
    <h1>Are You Ready to Effortlessly Make More Money <br/>
      And Ultimately Get The Free, Internet Marketing <br/>
      Lifestyle You Deserve?
    </h1>\<div class="par">
    <div class="par">From Jonah - Founder, Listjoe</div>
    <div class="par" align="center">I can't offer this price for much longer. So this really is a One Time Offer.</div>
    
    <div class="par">
      Upgraded members can <b><i>email up to 5,000 prospects per month</i></b> without earning a single credit,
      plus have access to up to <u>4 different ways to advertise</u> on List Joe, on complete auto-pilot.
    </div>

    <h2>Just think what that kind advertising can do for your business...</h2>
    <div class="par"> Why not let List Joe start building your business for you?
      Check out the monthly upgrade options below and see which one works best for
    you. </div> <div class="price_table">    
      <table> 
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="price" style="width: 190px;"><s>$27</s> <font color="red">$13.50!</font></td> <td> 
            <a href="https://buy.stripe.com/28oeXScMJ9dB3AcaEH" Style="background-color:#6772E5;color:#FFF;padding:8px
            12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
            Buy Now  
          </a>
        </td> 
      </tr> 
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="price" style="width: 190px;"><s>$47</s> <font color="red">$23.50!</font></td> <td> 
          <a href="https://buy.stripe.com/14kg1W3c9ahF9YA9AE" Style="background-color:#6772E5;color:#FFF;padding:8px
          12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
          Buy Now  
        </a>
      </td> 
    </tr> 
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="price" style="width: 190px;"><s>$67</s> <font color="red">$33.50!</font></td> <td> 
        <a href="https://buy.stripe.com/bIY02Y4gdgG35IkfZ3" Style="background-color:#6772E5;color:#FFF;padding:8px
        12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
        Buy Now  
      </a>
    </td> 
  </tr> 
</tr> 
<tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td class="price" style="width: 190px;"><s>$197</s> <font color="red">$98.50!</font></td> <td> 
    <a href="https://buy.stripe.com/6oEg1W9AxdtR2w814a" Style="background-color:#6772E5;color:#FFF;padding:8px
    12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
    Buy Now  
  </a>
</td> 
</tr> 


<tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td class="price" style="width: 190px;"><s>$297</s> <font color="red">$148.50!</font> </td> <td> 
    <a href="https://buy.stripe.com/5kA4jefYV2PdfiU5kr" Style="background-color:#6772E5;color:#FFF;padding:8px
    12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
    Buy Now  
  </a>
</td> 
</tr> 

</table>
</div>
<br/> <div class="par"> Plus, it’s 100% risk free. If you do not like your
  upgrade for any reason, just send us a support ticket and we will send you a
  refund for that month and, if you wish, close the account  no questions asked!
</div> <div class="par"> Still not convinced? Well, there are too many benefits
of a List Joe upgrade to mention here. Click below to learn more. </div>

<div class="big_yellow_button" id="show_benefits"><b>Please, explain ALL the benefits of List Joe Upgrade</b><i></i></div>
<div class="hidden" style="display: none">
  <h1>
    Seven More Stunning Reasons Why Upgrading <br/>
    at List Joe Will Ultimately Get You The Free, <br/>
    Internet Marketing Lifestyle You Deserve!
  </h1>
  <div class="par">
    IF you're a multiple product promoter, one of the most ESSENTIAL skills you need is to recognize
    opportunities where you can pay a little bit of money to make a lot more back... This is one of those times.<br/>
    Each one of these member features, if taken alone, will earn you MORE money than you're paying for the actual membership.
  </div>

  <h3>1. Email up to 500 People Every 3 Days Immediately After Upgrading!</h3>
  <div class="par">
    Imagine sending your ad to 500 people <u>every 3 days</u>.
  </div>
  <div class="par">
    <center><i><b>That means you can send your ad 10 times a month, so you'll reach <u>5000 people!</u></b></i></center>
  </div>
  <div class="par">
    A typical email solo ad to a high-quality list with hundreds of REAL, active readers costs about $27!
  </div>
  <div class="par">
    You get 10 of these!  That's a vallue of $270!
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
  <div class="par">
    I think so.
  </div>
  <div class="par">
    What if you made an average of 10 sales per month? You are in effect, spending $27.00 to make $300.
    <b><i>This is seed money that could be used to launch other Internet Marketing Projects!</i></b>
  </div>

  <h3>2. Get 1000s of Spotlight Ad Impressions!</h3>
  <div class="par">
    Upgraded members have the opportunity to place their ads in the <u>Member Spotlight</u> section.
    These ads appear at the TOP of every page on List Joe, and have your profile picture included. That’s right, fully branded ads!
  </div>
  <div class="par" style="text-align: center">
    Here’s what your ad will look like:<br/><br/>
    <img src="/img/upgrade_spotlight.png"/>
  </div>
  <div class="par">
    The total impressions are shared between all upgraded members only. We currently estimate that you will get anywhere from 500 - 1000 impressions per month for your ads!
  </div>
  <div class="par">
    <b>Diversification is key.</b> You can promote several products and opportunities all at once. It will grow your downline in various business opportunities, build your list, or just plain make you more money.
  </div>

  <h3>3. Fully Customized Text, Colours, Styles, and Images in Every Email!</h3>
  <div class="par"> As a <i>free</i> member, you can only have limited access to
  List Joe’s fully customizable and branded email templates. </div> <div
  class="par"> If you upgrade you will fully unlock this feature and be able to
stand out from the crowd. </div> <div class="par"> I’m sure you’ve noticed by
  now that the future of email marketing (and all online marketing!) is branding.
  And as an upgraded member at List Joe, you can fully control and customize your
brand in every email. </div> <div class="par"> You can unlock this and every
other feature by choosing one of the monthly upgrade options below: </div> <div class="price_table">    
      <table> 
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="price" style="width: 190px;"><s>$27</s> <font color="red">$13.50!</font></td> <td> 
            <a href="https://buy.stripe.com/28oeXScMJ9dB3AcaEH" Style="background-color:#6772E5;color:#FFF;padding:8px
            12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
            Buy Now  
          </a>
        </td> 
      </tr> 
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="price" style="width: 190px;"><s>$47</s> <font color="red">$23.50!</font></td> <td> 
          <a href="https://buy.stripe.com/14kg1W3c9ahF9YA9AE" Style="background-color:#6772E5;color:#FFF;padding:8px
          12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
          Buy Now  
        </a>
      </td> 
    </tr> 
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="price" style="width: 190px;"><s>$67</s> <font color="red">$33.50!</font></td> <td> 
        <a href="https://buy.stripe.com/bIY02Y4gdgG35IkfZ3" Style="background-color:#6772E5;color:#FFF;padding:8px
        12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
        Buy Now  
      </a>
    </td> 
  </tr> 
</tr> 
<tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td class="price" style="width: 190px;"><s>$197</s> <font color="red">$98.50!</font></td> <td> 
    <a href="https://buy.stripe.com/6oEg1W9AxdtR2w814a" Style="background-color:#6772E5;color:#FFF;padding:8px
    12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
    Buy Now  
  </a>
</td> 
</tr> 


<tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td class="price" style="width: 190px;"><s>$297</s> <font color="red">$148.50!</font> </td> <td> 
    <a href="https://buy.stripe.com/5kA4jefYV2PdfiU5kr" Style="background-color:#6772E5;color:#FFF;padding:8px
    12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
    Buy Now  
  </a>
</td> 
</tr> 

</table>
</div>

                  <h3>4. Get Paid MORE To Build Your Lists!</h3>
                  <div class="par">
                    As a <i>free</i> member, you can only earn a limited commission when you refer people who upgrade or purchase the OTO.
                  </div>
                  <div class="par">
                    If you upgrade you'll earn much, much more, up to $100s per referral!
                  </div>
                  <div class="par">
                    So why not get <i>paid</i> while building your lists?
                  </div>
                  <div class="par">
                    Plus, referring people will be very very easy, since we add random un-referred List Joe members to your downline!
                  </div>

                  <h3>5. Promote ANY Product in All the Emails Sent out at List Joe!</h3>
                  <div class="par">
                    We include a top ad in every email that is sent between members. This top ad is shared amongst gold members only, much in the same way as the member spotlight ads.
                  </div>
                  <div class="par">
                    This is yet ANOTHER great way for you to diversify your income. We currently estimate that you will get anywhere from 3000 to 5000 impressions per month for your email ads!
                  </div>

                  <h3>6. Earn Auto-Pilot Commissions and Get Random Referrals! </h3>
                  <div class="par">
                    If an un-referred member goes to the home page at ListJoe.com, they are automatically redirected to a RANDOM upgraded member's page. It could be you! If the visitor joins, he or she is placed in your downline as though you personally referred them.
                  </div>
                  <div class="par" style="font-size: 18px;font-weight: bold">
                    When they upgrade YOU will earn up to $100 in commissions!
                  </div>
                  <div class="par" style="margin-left: 85px">
                    <b>Here's the thing:</b> Unlike other referral programs, when an active member joins your organization, he or she not only sparks
                    <b><u>activity</u></b> in your personal ListJoe.com downline, but also in your downline for ALL of your other programs combined!
                    In most cases, this person will be building you SEVERAL massive lists! Sometimes all it takes is ONE <b><i>super affiliate</i></b> to launch your
                    exponential growth into the stratosphere!
                  </div>

                  <h3>7. Backend Your Top Performing Program With A Login Ad</h3>
                  <div class="par">
                    Do you have a MAIN program or product that you like to promote? <b>Here's your chance to really push it to the next level</b>.
                  </div>
                  <div class="par">
                    If you upgrade to Gold, you can place a recommendation ad in the member's area which is shown to new members RIGHT AFTER they LOGIN to ListJoe.com. I'm sure you've seen a few ads already since you have to login to see this page. Your ad could be there too.
                  </div>
                  <div class="par">
                    Make just a few sales per month with your login ad and you are paying for your membership in full!
                  </div>
                  <div class="par red_caption">
                    Do You Want Bronze, Silver or Gold Membership?
                  </div>
                  <div class="par">
                    Even though you can make a lot of money with your pro ListJoe.com membership, and even though GOLD membership is obviously the way to go, if you're cash strapped, you might want to start with our lower level membership and work yourself up
                  </div>
                  <div class="par">
                    If not, I encourage you to upgrade to gold right away. You are possibly missing out on commissions as you read this.
                  </div>
                  <div class="par">
                    This table summarizes all of the member features, and what each level of membership brings you.
                  </div>
                  <table class="your_benefits">
                    <thead>
                      <tr>
                        <td>Your Benefits</td>
                        <td>Free</td>
                        <td>Bronze</td>
                        <td>Silver</td>
                        <td>Gold</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="text-align: left">
                          Mail Frequency
                        </td>
                        <td>
                          Every 7 days
                        </td>
                        <td>
                          Every 3 days
                        </td>
                        <td>
                          Every 3 days
                        </td>
                        <td>
                          Every 3 days
                        </td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Bonus Prospects Emailed per Month</td>
                        <td>0</td>
                        <td>5000</td>
                        <td>15,000 </td>
                        <td>30,000</td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Bonus Credits Added to Every Email</td>
                        <td><div class="no"></div></td>
                        <td>500</td>
                        <td>1500</td>
                        <td>3000</td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Random Members Added to Downline</td>
                        <td><div class="no"></div></td>
                        <td><div class="yes"></div></td>
                        <td><div class="yes"></div></td>
                        <td><div class="yes">X</div></td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Higher Commissions for Referring Paid Members</td>
                        <td><div class="no">15%</div></td>
                        <td><div class="yes">25%</div></td>
                        <td><div class="yes">35%</div></td>
                        <td><div class="yes">50%</div></td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Fully Customized and Branded Emails</td>
                        <td><div class="no"></div></td>
                        <td><div class="yes">X</div></td>
                        <td><div class="yes">X</div></td>
                        <td><div class="yes">X</div></td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Get Spotlight Ad impressions</td>
                        <td><div class="no"></div></td>
                        <td><div class="no"></div></td>
                        <td><div class="no"></div></td>
                        <td><div class="yes">X</div></td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Get Your Login Ad displayed when members log into ListJoe</td>
                        <td><div class="no"></div></td>
                        <td><div class="no"></div></td>
                        <td><div class="no"></div></td>
                        <td><div class="yes">X</div></td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Top Email Ads in Emails Sent Between Members</td>
                        <td><div class="no"></div></td>
                        <td><div class="no">X</div></td>
                        <td><div class="no">X</div></td>
                        <td><div class="yes">X</div></td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Full Access to Integrated Top Member ads</td>
                        <td><div class="no"></div></td>
                        <td><div class="yes">X</div></td>
                        <td><div class="yes">X</div></td>
                        <td><div class="yes">X</div></td>
                      </tr>
                      <tr>
                        <td style="text-align: left">Priority support</td>
                        <td><div class="no"></div></td>
                        <td><div class="yes">X</div></td>
                        <td><div class="yes">X</div></td>
                        <td><div class="yes">X</div></td>
                      </tr>
                    </tbody>
                  </table>
                  <br/><br/>
                  <div class="par red_caption">
                    Our Special Deal and Why There's No Risk With Our Guarantee!
                  </div>
                  <div class="par">
                    If on any given month you are unsatisfied with the your membership, then please let us know immediately.
                    We'll promptly refund you for that month, no questions asked, absolutely no hassle.
                  </div>
                  <div class="par" style="margin-left:85px">
                    You get:<br/><br/>
                    <ul class="list" >
                      <li>Free Referrals from our home page traffic!</li>
                      <li>Enhanced Commissions!</li>
                      <li>Place Spotlight Ads</li>
                      <li>Earn Through Email Ads</li>
                      <li>Extra Backend Promotion Spots for Your Best Performing Product</li>
                      <li>Access To Email Up To 3000 Random Members Immediately!</li>
                      <li>And More!</li>
                    </ul>
                  </div>
                  <div class="par">
                    And you have absolutely no risk with our guarantee!
                  </div>
                  <div class="par">
                    Go ahead and give it a try. Upgrade to pro right now by choosing your option below.
                  </div>
                  <div class="par red_caption">
                    Check Out Our Special 6 Month Discount Offers
                  </div>
                  <div class="par red_caption">
                    These may or may not be available for much longer.
                  </div>
                  <div class="par red_caption">
                    All orders processed on a SECURE server. <br/>
                    Please make your selection to begin.
                  </div>
                  <div class="price_table">    
      <table> 
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="price" style="width: 190px;"><s>$27</s> <font color="red">$13.50!</font></td> <td> 
            <a href="https://buy.stripe.com/28oeXScMJ9dB3AcaEH" Style="background-color:#6772E5;color:#FFF;padding:8px
            12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
            Buy Now  
          </a>
        </td> 
      </tr> 
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="price" style="width: 190px;"><s>$47</s> <font color="red">$23.50!</font></td> <td> 
          <a href="https://buy.stripe.com/14kg1W3c9ahF9YA9AE" Style="background-color:#6772E5;color:#FFF;padding:8px
          12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
          Buy Now  
        </a>
      </td> 
    </tr> 
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="price" style="width: 190px;"><s>$67</s> <font color="red">$33.50!</font></td> <td> 
        <a href="https://buy.stripe.com/bIY02Y4gdgG35IkfZ3" Style="background-color:#6772E5;color:#FFF;padding:8px
        12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
        Buy Now  
      </a>
    </td> 
  </tr> 
</tr> 
<tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td class="price" style="width: 190px;"><s>$197</s> <font color="red">$98.50!</font></td> <td> 
    <a href="https://buy.stripe.com/6oEg1W9AxdtR2w814a" Style="background-color:#6772E5;color:#FFF;padding:8px
    12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
    Buy Now  
  </a>
</td> 
</tr> 


<tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td class="price" style="width: 190px;"><s>$297</s> <font color="red">$148.50!</font> </td> <td> 
    <a href="https://buy.stripe.com/5kA4jefYV2PdfiU5kr" Style="background-color:#6772E5;color:#FFF;padding:8px
    12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
    Buy Now  
  </a>
</td> 
</tr> 

</table>
</div>
                                  </div>
                                </div>
                                <script>

                                  function buy(plan)
                                  {
                                    var stripe = Stripe('pk_test_Hftuw18q2xHaKfcILtFIo6tr00J9CPG3hU');

                                    var checkoutButton = document.getElementById('checkout-button-plan_'+plan);
                                    checkoutButton.addEventListener('click', function () {
    // When the customer clicks on the button, redirect
    // them to Checkout.
                                      stripe.redirectToCheckout({
                                        items: [{plan: 'plan_'+plan, quantity: 1}],

      // Do not rely on the redirect to the successUrl for fulfilling
      // purchases, customers may not always reach the success_url after
      // a successful payment.
      // Instead use one of the strategies described in
      // https://stripe.com/docs/payments/checkout/fulfillment
                                        successUrl: 'http://killthespammer.com/success',
                                        cancelUrl: 'http://killthespammer.com/canceled',
                                        clientReferenceId: '{{ Auth::user()->id }}|'+plan,
                                        customerEmail: '{{ Auth::user()->email }}'
                                      })
                                      .then(function (result) {
                                        if (result.error) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer.
                                          var displayError = document.getElementById('error-message');
                                          displayError.textContent = result.error.message;
                                        }
                                      });
                                    });
                                  }

                                </script>



                                <script>
                                  $('#show_benefits').click(function(){
                                    $('.hidden').slideDown('slow')
                                  })

                                </script>
                  <div align="center"><font color="red"><h1>
                    You will not be shown this offer again!
                    Special Relaunch offers. I may take this down anytime.</h1></font>
                  </div>


                                @endsection