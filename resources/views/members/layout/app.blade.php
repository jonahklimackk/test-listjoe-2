
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ListJoe Members Area</title>
        <link rel="stylesheet" href="/css/reset.css" type="text/css" />
        <link rel="stylesheet" href="/css/main.css" type="text/css" />
        <script type="text/javascript" src="/js/jquery.min.7.1.js"></script>
        <script type="text/javascript" src="/js/global.js"></script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-35191250-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </head>
    <body>
        <div id="fb-root"></div>
        <!--
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=158655317520785";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
      -->
        

        <div class="header">
            <div class="background"></div>
            <div class="city"></div>
            <a href="/members"><img src="/img/logo.png" class="logo"/></a>
            <div class="linebottom"></div>
            @include('members.layout.profile-block')
        </div>


        <div class="main">          
            <div class="content"> 
                <div class="sidebar">
                    <ul class="menu">
                        <li>
                            <a>Your account</a>
                            <ul>                                
                                <li><a href="/members/">Home</a>
                                <li><a href="/members/upgrade">Upgrade</a>
                                <li><a href="/members/settings">Account settings</a>
                                <li><a href="/members/testimonial">Add Testimonial</a>
                                <li><a href="/members/delete">Cancel Account</a>
                              
                <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            </ul>
                        </li>
                        <li>
                            <a>Send mail</a>
                            <ul>
                                <li><a href="/sendmail">Send mail</a>
                                <li><a href="/mail_history">Mail History And Tracking</a>
                                <li><a href="/members/buycredits">Buy credits</a>
                                <li><a href="/members/solos">Send Solo</a></li>
                                <li><a href="/members/buy_solos">Buy Solo</a></li>
                            </ul>
                        <li>
                            <a>Profile</a>
                            <ul>
                                <li><a href="/members/profile">Your profile</a>
                                <li><a href="/members/editprofile">Edit profile</a>
                            </ul>
                        <li>
                            <a>Backend Ads</a>
                            <ul>
                                <li><a href="/members/spotlight">Spotlight Ads</a>
                                <li><a href="/members/topmemberads">Top Members Ads</a>
                                <li><a href="/members/loginads">Login Ads</a>
                                <li><a href="/members/topemail">Top Email ads</a>
                            </ul>
                        <li>
                            <a>Grow Your Downline</a>
                            <ul>
                                <li><a href="/members/reftools">Affiliate Tools</a>
                                <li><a href="/members/downline">Downline</a>
                                <li><a href="/members/earnings">Commissions</a>
                                <li><a href="/members/affiliatestat">Affiliate Stats</a>
                            </ul>
                        <li>
                            <a>Other List Builders</a>
                            <ul>
                                <li><a href="/members/recommendedlb">Recommended List Builders</a>
                            </ul>
                        <li>
                            <a>Support</a>
                            <ul>
                                <li><a href="/support/knowledgebase.php">F.A.Q.</a>
                                <li><a href="/members/submit-ticket">Submit Ticket</a>
                            </ul>
                    </ul>
                                                                        <div class="sidebar_vda">
                                <div class="head">
                                    <a href="/members/profile/u/robertthomason" class="name">
                                        Robert&nbsp;Thomason                                    </a>
                                    <div class="rating">Joe Rating: 100%</div>
                                </div>
                                <div class="text">
                                    <div class="title">
                                        Need Cash Now?                                    </div>
                                    <div class="desc1">EZ Traffic, EZ List Building, And</div>
                                    <div class="desc2">EZ Commissions.</div>
                                </div>
                                <div class="url">
                                    <a href="http://tinyurl.com/9nbj9xu" id="url" target="_blank">
                                                                                www.tinyurl.com                                    </a>
                                </div>
                            </div>
                                                    <div class="sidebar_vda">
                                <div class="head">
                                    <a href="/members/profile/u/hpm" class="name">
                                        Herchel&nbsp;Phillips                                    </a>
                                    <div class="rating">Joe Rating: 41%</div>
                                </div>
                                <div class="text">
                                    <div class="title">
                                        SUCCESS STARTS HERE                                    </div>
                                    <div class="desc1">Your success will start when you</div>
                                    <div class="desc2">start building your own list.</div>
                                </div>
                                <div class="url">
                                    <a href="http://cashtrackbar.com/r/didyoulightin" id="url" target="_blank">
                                                                                www.cashtrackbar.com                                    </a>
                                </div>
                            </div>
                                                            </div>
                <div class="wrapper">
                    <script>
        var timeleft = 139683;

        $(document).ready(changeTimeLeft)
        window.setInterval("changeTimeLeft()", 1000);
</script>
<div class="spotlights">
    <img src="/img/spotlights_ads.png" class="label"/>
    <img src="/img/spotlights_ads_l.png" class="la"/>
    <img src="/img/spotlights_ads_r.png" class="ra"/>
    <div class="slide_left"></div>
    <div class="slide_right"></div>
    <div class="ads">
        <div class="wr">
                            <div class="ad">
                    <a href='http://listjoe.com/members/profile/u/chazzer'>
                    <img src='http://listjoe.com/upload/43c85761b4635005aec16fa944f1702d.jpg' width='40' height='40' class='photo'/>
                </a>
                    <div class="info">
                        <a href="/members/profile/u/chazzer" class="name">
                            Robert&nbsp;Smith                        </a>
                        <img class="star" src="/img/spotlights_ads_star.png"/>
                        <div class="rating">Joe Rating: 10%</div>
                    </div>
                    <div class="title">Do You Trypto?</div>
                    <div class="text">Get paid to travel and earn too</div>
                    <div class="text">Costs nothing to check it out</div>

                    <div class="href">
                                                <a href="http://workwithrobsmith.com/partyjoe" target="_blank">www.workwithrobsmith.com</a>
                    </div>
                </div>   
                            <div class="ad">
                    <a href='http://listjoe.com/members/profile/u/ertankoca'>
                    <img src='http://www.gravatar.com/avatar/21e08a88b1aa7bf0bca657680603e709?s=40&d=mm&r=g' width='40' height='40' class='photo'/>
                </a>
                    <div class="info">
                        <a href="/members/profile/u/ertankoca" class="name">
                            Ertugrul&nbsp;                        </a>
                        <img class="star" src="/img/spotlights_ads_star.png"/>
                        <div class="rating">Joe Rating: 13%</div>
                    </div>
                    <div class="title">$5,000 In A Week?</div>
                    <div class="text">Learn How To Make $5K This Week</div>
                    <div class="text">Get Free Access</div>

                    <div class="href">
                                                <a href="https://partners.aversity.com/scripts/mx2eczgla?pid=8026&lp=95719c01&chan=c" target="_blank">www.partners.aversity.com</a>
                    </div>
                </div>   
                            <div class="ad">
                    <a href='http://listjoe.com/members/profile/u/tia16'>
                    <img src='http://listjoe.com/upload/e3ceb526207a388bbe60045e0bb78f8d.jpg' width='40' height='40' class='photo'/>
                </a>
                    <div class="info">
                        <a href="/members/profile/u/tia16" class="name">
                            Bunmi Ayeni&nbsp;                        </a>
                        <img class="star" src="/img/spotlights_ads_star.png"/>
                        <div class="rating">Joe Rating: 13%</div>
                    </div>
                    <div class="title">This Is INSANE!!!.</div>
                    <div class="text">2.2 BTC In Just 20 Days..</div>
                    <div class="text">For just a payment of $130..</div>

                    <div class="href">
                                                <a href="https://goo.gl/N9AvjK" target="_blank">www.goo.gl</a>
                    </div>
                </div>   
                            <div class="ad">
                    <a href='http://listjoe.com/members/profile/u/bigsignups'>
                    <img src='http://listjoe.com/upload/37ae95f9ee11c53c9711adfe64e77f7c.jpg' width='40' height='40' class='photo'/>
                </a>
                    <div class="info">
                        <a href="/members/profile/u/bigsignups" class="name">
                            Candace&nbsp;Lee                        </a>
                        <img class="star" src="/img/spotlights_ads_star.png"/>
                        <div class="rating">Joe Rating: 20%</div>
                    </div>
                    <div class="title">Need Paying Signups?</div>
                    <div class="text">I Enrolled 34 People In One Week</div>
                    <div class="text">All Thanks To This Ad Site!</div>

                    <div class="href">
                                                <a href="http://residualrotator2.com/url/rotator/admin_2" target="_blank">www.residualrotator2.com</a>
                    </div>
                </div>   
                            <div class="ad">
                    <a href='http://listjoe.com/members/profile/u/bydesign'>
                    <img src='http://listjoe.com/upload/fc2dbb8720f0288e4d716987df83f87d.jpg' width='40' height='40' class='photo'/>
                </a>
                    <div class="info">
                        <a href="/members/profile/u/bydesign" class="name">
                            Lenhard&nbsp;                        </a>
                        <img class="star" src="/img/spotlights_ads_star.png"/>
                        <div class="rating">Joe Rating: 21%</div>
                    </div>
                    <div class="title">7K His First Month</div>
                    <div class="text">A 20 something year old kid, who</div>
                    <div class="text">Made $7,242.95 1st Month, no exp.</div>

                    <div class="href">
                                                <a href="http://businessathomeonline.com" target="_blank">www.businessathomeonline.com</a>
                    </div>
                </div>   
                    </div>
    </div>
</div>








@yield('content')











        <div class="footer">
            <div class="background"></div>
            <ul class="footer-menu">
                <ul>
                    <li><b>YOUR ACCOUNT</b>
                    <li><a href="/members/">Home</a>
                    <li><a href="/members/upgrade">Upgrade</a>
                    <li><a href="/members/settings">Account settings</a>
                    <li><a href="/members/testimonial">Add Testimonial</a>
                    <li><a href="/members/delete">Cancel Account</a>
                    <li><a href="/login/out">Logout</a>
                </ul>
                <ul>
                    <li><b>SEND MAIL</b>
                    <li><a href="/sendmail">Send mail</a>
                    <li><a href="/mail_history">Mail History And Tracking</a>
                    <li><a href="/members/buycredits">Buy credits</a>
                </ul>
                <ul>
                    <li><b>PROFILE</b>
                    <li><a href="/members/profile">Your profile</a>
                    <li><a href="/members/editprofile">Edit profile</a>
                </ul>
                <ul>
                    <li><b>BACKEND ADS</b>
                    <li><a href="/members/spotlight">Spotlight Ads</a>
                    <li><a href="/members/topmemberads">Top Members Ads</a>
                    <li><a href="/members/loginads">Login Ads</a>
                    <li><a href="/members/topemail">Top Email ads</a>
                </ul>
                <ul>
                    <li><b>GROW YOUR DOWNLINE</b>
                    <li><a href="/members/reftools">Affiliate Tools</a>
                    <li><a href="/members/downline">Downline</a>
                    <li><a href="/members/earnings">Commissions</a>
                    <li><a href="/members/affiliatestat">Affiliate Stats</a>
                </ul>
                <ul>
                    <li><b>OTHER LIST BUILDERS</b>
                    <li><a href="/members/recommendedlb">Recommended List Builders</a>
                </ul>
                <ul>
                    <li><b>SUPPORT</b>
                    <li><a href="/support/knowledgebase.php">F.A.Q.</a>
                    <li><a href="/members/submit-ticket">Submit Ticket</a>
                </ul>
            </ul>
            <div class="copyright">Copyright © 2018 Ad Labs Inc. All rights reserved.</div>
            <div style="position: absolute;top: 116px;left: 50%;margin-left: 150px;"><div class="fb-like-box" data-href="http://www.facebook.com/pages/ListJoecom/393262234020776" data-width="292" data-show-faces="false" data-stream="false" data-header="false"></div></div>
        </div>
    </body>
</html>