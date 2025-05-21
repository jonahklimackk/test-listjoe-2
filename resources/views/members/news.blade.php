<div class="news">
  <div class="up"></div>
  <div class="down"></div>
  <div class="wr">

    @foreach(App\News::getAllItems() as $news)
    <div class="item">
      <div class="date">
        {{ $news->getDate($loop->index) }}     </div>
        <div class="text">
          {{ $news->getHeadline($loop->index) }}
          {{ $news->getBody($loop->index) }}
        </div>
      </div>
      @endforeach


      {{-- Keep these old posts for re-importing into DB --}}

      <div class="item">
        <div class="date">
          May 28, 2017
        </div>
        <div class="text">
          Add Yourself To The Pre-Launch List - <a href="http://100Listbuilders.com">100Listbuilders.com!</a> Fully Automate your listbuilder promotion! Listjoe is included!                    </div>
        </div>
        <div class="item">
          <div class="date">
            May 28, 2017
          </div>
          <div class="text">
            50,000 credits, 2 solo ads, and a one year gold subscription, for a very low price! <a href="http://listjoe.com/members/oto/id/11">click here for details</a>
          </div>
        </div>
        <div class="item">
          <div class="date">
            Dec 19, 2014
          </div>
          <div class="text">
            1 Day Left! <a href="http://sn.im/29iwx9o">Click Here</a> For Our Upcoming FREE Q & A Webinar. Nothing to sell, just answers to any questions. Ask anonymously if you want, and see our answers tomorrow, live.
          </div>
        </div>
        <div class="item">
          <div class="date">
            Dec 18, 2014
          </div>
          <div class="text">
            The Santa Joe promotion is on!  New members get 2500 credits and you get 1000 credits for the referral! Click on Grow Your Downline, then click Affiliate Tools from the drop down. Scroll down and find the Santa Joe splash page. It Works!  Earn $100 on OTO upgrades ($25 if you're a free member). This ends January 1st so get in some mailings or change some links while you can!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Jan 23, 2014
          </div>
          <div class="text">
            Great news, ListJoe finally has Solo ads available. You can now email the ENTIRE list at LISTJOE!!

            You can find them under Send Mail on the nav menu. Try them out today
          </div>
        </div>
        <div class="item">
          <div class="date">
            Aug 12, 2013
          </div>
          <div class="text">
            Not really news, but, I just want to send out a big THANK YOU for being a part of the List Joe community. We appreciate it!
          </div>
        </div>
        <div class="item">
          <div class="date">
            May 16, 2013
          </div>
          <div class="text">
            2 days left for the Login 1 year gold special.  You have until midnight Friday to get 1 year of gold membership and 50,000 credits. You can only grow your business if you advertise! If you're sending mail already, why not send to the max and upgrade to the highest level at our lowest ever price.  To purchase, log out and log back in.
          </div>
        </div>
        <div class="item">
          <div class="date">
            Jan 24, 2013
          </div>
          <div class="text">
            Great News! We put together a SWEET bonus at another massive list builder for you. Grab yours now (plz dont share the link, its for List Joe Members ONLY!)--> http://adlabsinc.com/lj5kbonus
          </div>
        </div>
        <div class="item">
          <div class="date">
            Dec 21, 2012
          </div>
          <div class="text">
            DID YOU KNOW? Right now you can earn 1000 credits per referral until Jan 1st! It does not matter what promo method you use but we suggest the Santa Joe splash page (Grow Your Downline - Affiliate Tools - Splashes). Happy Holidays!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Dec 19, 2012
          </div>
          <div class="text">
            Earn 1000 credits per referral with our brand New SANTA JOE Promo Tool! Click Grow Your Downline on the left, then click Affiliate Tools, then the Splash Pages tab. Scroll down and use "Santa Joe" splash.
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 18, 2012
          </div>
          <div class="text">
            Webinar REPLAY - some quoted as saying "Best I've ever heard on how to make money with Listbuilders".  Get it free right now, no opt-in required at http://jonahklimack.com
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 13, 2012
          </div>
          <div class="text">
            Tune Into the Webinar Jonah is holding to answer any questions you might have about Listbuilding and Listjoe!  Info at www.getlivetraining.com. Send questions and reserve your spot at http://jonahklimack.com/janetwebinar
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 12, 2012
          </div>
          <div class="text">
            Mailer is working great now! All mailing are going out on schedule and getting 6-8% click-thru rates :)

            Thank you for helping make List Joe 3.0 a huge success!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 05, 2012
          </div>
          <div class="text">
            Mailer update: Mailer is moving a bit slow due to the re-launch and high volume. We hope to have it moving fast in a couple days. Please be patient, every email will be sent!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 05, 2012
          </div>
          <div class="text">
            Support Update: We finally caught up, 2 people working full-time did the trick! Expect responses within 24hrs MAX (probably much sooner). Thanks for your patience!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 03, 2012
          </div>
          <div class="text">
            Update regarding support: Please be patient, we have a lot of support questions to get through. We should get through them all very soon. We promise we will respond to every single ticket as soon as possible. Thanks!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 02, 2012
          </div>
          <div class="text">
            The mailer is working now, however, its a bit slow due to high volume. It will pick up shortly and your mailings will be sent soon.

            Thanks for joining List Joe 3.0 - be sure to send us a testimonial and tell us what you think about it!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 02, 2012
          </div>
          <div class="text">
            Why arent you receiving emails from List Joe yet?

            Thats because List Joe is re-launching right now, so the mailer is currently not activated. We will be activating it very soon. All messages are in a queue right now and will be sent out in order. Wait till you see how the emails look, they are awesome!
          </div>
        </div>
        <div class="item">
          <div class="date">
            Oct 01, 2012
          </div>
          <div class="text">
            List Joe is Back! It had its difficulties, but its now better than ever. List Joe 3.0 is growing fast, and I want to send you a warm welcome and wish you the best of luck with your online business :)
          </div>
        </div>
      </div>
    </div>

